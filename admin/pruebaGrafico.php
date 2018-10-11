<?php
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();

//mortalidad($id, $id2, $id3, $id4);
		 static  $Trimestres = array(array(0,0),array(1, 3), array(4, 6), array(7, 9), array(10, 12),array(1, 12));
	//function  mortalidad($id_centro,$año,$tramo,$id_trimestre)
	//{
		  
			 
			$año = "2014";

			$condicion = array();
			$id_centro =2;
			if ($id_centro != '') {
				$condicion[] = "( `c`.`c_id_centro` = $id_centro and  i.ID_ESTADO_FICHA = 179 )";
			}
			else
			{
				$condicion[] = "( i.ID_ESTADO_FICHA = 179 )";
			}
			$tramo ='semana';
			if ($tramo == 'semana') {
				$condicion[] = '( `i`.`EDAD_GESTACIONAL` BETWEEN `t`.`desde` AND `t`.`hasta`) ';
				$tabla = " `SEMANAS` `t` ";
			} else { 
				$condicion[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
				$tabla = " `TRAMOS` `t` ";
			}

			if ($año != '') {
				$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = '$año')";
			} else {
				$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = 2012 )";
				
			}
			$id_trimestre='1';
			if ($id_trimestre != '') {
				$trimestre = $Trimestres[$id_trimestre];
				$condicion[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
			}
			else
			{
			$condicion[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN 1 AND 12 )"; 
			}

			$where = (count($condicion) > 0) ? ' AND ' : '  ';
			$condicion = $where . join(' AND ', $condicion);

		   $sql = "SELECT
		`t`.`NOMBRE` AS `nombre`,
		(
			SELECT
				count(`i`.`ID_NEOCOSUR`)
			FROM
				`ingreso` `i`
				inner join informacion_alta  ia 
				on  ia.ID_NEOCOSUR=i.ID_NEOCOSUR
				inner join usuario us on us.us_id_user = i.ID_RESPONSABLE_INGRESO_DATOS 
				inner join  centro c on c.c_id_centro = us.us_id_centro
			WHERE
				(
					(
						`ia`.`ID_DESTINO` = 212
					) $condicion
							)
		) AS `Si`,
		(
			SELECT
				count(`i`.`ID_NEOCOSUR`)
			FROM
				`ingreso` `i`
				inner join informacion_alta  ia 
				on  ia.ID_NEOCOSUR=i.ID_NEOCOSUR
				inner join usuario us on us.us_id_user = i.ID_RESPONSABLE_INGRESO_DATOS 
				inner join  centro c on c.c_id_centro = us.us_id_centro
			WHERE
				(
					(
						`ia`.`ID_DESTINO` != 212
					) $condicion
				)
		) AS `No`,
		(
			SELECT
				count(`i`.`ID_NEOCOSUR`)
			FROM
				`ingreso` `i`
				inner join informacion_alta  ia 
				on  ia.ID_NEOCOSUR=i.ID_NEOCOSUR
				inner join usuario us on us.us_id_user = i.ID_RESPONSABLE_INGRESO_DATOS 
				inner join  centro c on c.c_id_centro = us.us_id_centro
			WHERE
				(
					(
						(
							`ia`.`ID_DESTINO` = -1 or `ia`.`ID_DESTINO` = 3  or isnull(`ia`.`ID_DESTINO`)
						)
						
					) $condicion
				)
		) AS `S_N`,
		(
			SELECT
				count(`i`.`ID_NEOCOSUR`) 
			FROM
				`ingreso` `i`
				inner join informacion_alta  ia 
				on  ia.ID_NEOCOSUR=i.ID_NEOCOSUR
				inner join usuario us on us.us_id_user = i.ID_RESPONSABLE_INGRESO_DATOS 
				inner join  centro c on c.c_id_centro = us.us_id_centro
			WHERE
				(
									(1=1)
					 $condicion
				)
		) AS `total`
			FROM
			$tabla
				";
				//echo $sql;
			  // $results = DbBase::raw_connect()->fetch_all($sql, db::DB_ASSOC);

			$cone->Abrir();
			$retorno = $cone->select($sql);						
			//$results = $retorno->fetch_assoc();
			//$fecha=  echo "query 40 semanas  <br>".;
			$cone->Cerrar();
			//print_r($results);
			   //$results = DbBase::raw_connect()->fetch_all($sql, db::DB_ASSOC);

			$rows = array();
			//foreach ($results as $item) {
			while($retorno!=null && $item = $retorno->fetch_array()){
	//            if ($id_centro != '') {
				//AKIII	
				$row = array();
				$row['tramo'] = $item['nombre'];
				
				$row['f'] = $item['Si'];
				//$row['f'] = 1200; 
				$row['si'] = $item['Si'];
				$row['no'] = $item['No'];
				$row['nf'] = $item['No'];
				$row['tr'] = $item['Si'] + $item['No'];
				$row['sn'] = $item['S_N'];
				$row['s_n'] = $item['S_N'];
				$row['total'] = $item['total'];
				$row['tn'] = $item['Si'] + $item['No'] + $item['S_N'];
				$rows[] = $row;
	//            } else {
	//                @$rows[$item->id_tramo - 1]['tramo'] = $item['nombre'];
	//                @$rows[$item->id_tramo - 1]['si']+= $item['Si'];
	//                @$rows[$item->id_tramo - 1]['no']+=$item['No'];
	//                @$rows[$item->id_tramo - 1]['sn']+= $item['S_N'];
	//                @$rows[$item->id_tramo - 1]['total']+= $item['total'];
	//            }
			}
			//echo "<br> <br> aers<br>";
			//print_r($rows);
			foreach ($rows as $key => $value) {
				$rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
				$rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
				$rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
			}
			$etiqueta = array();
			$valores = array();
			$tabla = array();
			$jsondata["success"]=true;
			$jsondata["data"]["etiqueta"]=true;
			for ( $i=0; $i < count($rows);$i++) {
				
				$row = $rows[$i];
				$etiqueta [$i]= $rows[$i]["tramo"];
				$valores [$i]= array($rows[$i]["f"].",".$rows[$i]["nf"].",".$rows[$i]["s_n"]);
				$tabla [$i]= array($rows[$i]["f"].",".$rows[$i]["si"].",".$rows[$i]["nf"].",".$rows[$i]["no"].",".$rows[$i]["tr"].",".$rows[$i]["s_n"].",".$rows[$i]["sn"].",".$rows[$i]["tn"]);
				//echo "<br>tramo ->  ".$rows[$i]["tramo"];
				/*
					f -> fallecen 
					si -> % fallecen
					nf -> no fallecen
					no -> % no fallecen 
					tr -> total registro
					s_n -> sin informacion
					sn -> %  sin informacion
					tn -> %  total  niños					
				*/
				
			 
			}
			$jsondata["data"]["etiqueta"]=$etiqueta;
			$jsondata["data"]["valores"]=$valores;
			$jsondata["data"]["tabla"]=$tabla;
			header('Content-type: application/json; charset=utf-8;');
			echo json_encode($jsondata, JSON_FORCE_OBJECT);
			//echo "<br> ";
			//print_r($etiqueta);
			//echo "<br> ";
			//print_r($valores);
			//echo "<br> ";
			//print_r($tabla);
			//var_dump($rows['sn']);
			//die(json_encode($rows));
			//die(json_encode($data));
	//}
	
	
	/*
	public function resumen($id_centro,$año,$tramo,$id_trimestre,$campo) {
       
		/*
	   $this->setRenderMode(View::RENDER_NONE);
        $id_centro = $this->request('id_centro');
        $año = $this->request('id_centro');
        $tramo = $this->request('tramo');
        $id_trimestre = $this->request('id_trimestre');
        $año = $this->request('anio');
        //$campo = 'PAT_NEONA_HIC';
		$campo = $this->request('condicion');*/

      /*  $condicion = array();

        if ($id_centro != '') {
            $condicion[] = "( `c`.`c_id_centro` = $id_centro and  i.ID_ESTADO_FICHA = 179 )";
        }
		else
		{
			$condicion[] = "( i.ID_ESTADO_FICHA = 179 )";
		}
        if ($tramo == 'semana') { 
            $condicion[] = '( `i`.`EDAD_GESTACIONAL` BETWEEN `t`.`desde` AND `t`.`hasta`) ';
            $tabla = " `SEMANAS_CONDICION` `t` ";
        } else {
            $condicion[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
            $tabla = " `TRAMOS` `t` ";
        }

        if ($año != '') {
            $condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = $año)";
        } else {
			$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = 2012 )";
            
        }
        if ($id_trimestre != '') {
            $trimestre = $Trimestres[$id_trimestre];
            $condicion[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
        }
         $where = (count($condicion) > 0) ? ' AND ' : '  ';
        $condicion = $where . join(' AND ', $condicion);
		
		
		
		if ($campo=='PAT_NEONA_MED_NUM_TRANSFUS' || $campo=='PAT_NEONA_SEP_PRECOZ')
		{
		$sql = "SELECT 	`t`.`nombre` AS `nombre`,
		ifnull(	
		( SELECT count(0) AS `count(*)`	FROM `ING`
			WHERE ((`ING`.`$campo` >= 1) $condicion)	),0 ) AS `Si`,
	ifnull(
		( SELECT count(0) AS `count(*)` FROM `ING`
			WHERE ( (`ING`.`$campo` = 0) $condicion ) ),0 ) AS `No`,
	ifnull(
		( SELECT count(0) AS `count(*)` FROM `ING` 	
		WHERE (	(isnull(`ING`.`$campo`) )  $condicion	)
		),0 ) AS `S_N` 
        FROM
        $tabla";
        
		}
		else
		{
		$sql = "SELECT 	`t`.`nombre` AS `nombre`,
		ifnull(	
		( SELECT count(0) AS `count(*)`	FROM `ING`
			WHERE ((`ING`.`$campo` = 1) $condicion)	),0 ) AS `Si`,
	ifnull(
		( SELECT count(0) AS `count(*)` FROM `ING`
			WHERE ( (`ING`.`$campo` = 0) $condicion ) ),0 ) AS `No`,
	ifnull(
		( SELECT count(0) AS `count(*)` FROM `ING` 	
		WHERE (	(`ING`.`$campo` = -1 or `ING`.`$campo` = 3 or isnull(`ING`.`$campo`) )  $condicion	)
		),0 ) AS `S_N` 
        FROM
        $tabla";
		}
		
			//echo $sql;
        $results = DbBase::raw_connect()->fetch_all($sql, db::DB_ASSOC);
		//Debug::dump($results);
        $rows = array();
        foreach ($results as $item) {
            $row = array();
            $row['tramo'] = $item['nombre'];
            $row['f'] = $item['Si'];
			$row['f'] = $item['Si'];
            $row['si'] = $item['Si'];
            $row['no'] = $item['No'];
            $row['nf'] = $item['No'];
            $row['tr'] = $item['Si'] + $item['No'];
            $row['sn'] = $item['S_N'];
            $row['s_n'] = $item['S_N'];
            $row['total'] = $item['Si'] + $item['No'] + $item['S_N'];
            $row['tn'] = $item['Si'] + $item['No'] + $item['S_N'];
            $rows[] = $row;
        }

        foreach ($rows as $key => $value) {
            $rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
            $rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
            $rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
        }
        die(json_encode($rows));
    }*/
?>