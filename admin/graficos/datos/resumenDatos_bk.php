<?php

error_reporting(0);
include '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();
//var_dump($cone);
//echo "asdsad".$cone;
extract($_GET);
		 static  $Trimestres = array(array(1, 12),array(1, 3), array(4, 6), array(7, 9), array(10, 12),);
	//function  mortalidad($id_centro,$año,$tramo,$id_trimestre)
//	{
		  
			 
			$año = $id;
			$id_trimestre=$id2;
			$tramo =$id3;
			$id_centro=$id4;
			$condicion = array();
			
			if ($id_centro != '') {
				$condicion[] = "( `c`.`c_id_centro` = $id_centro and  i.ID_ESTADO_FICHA = 179 )";
			}
			else
			{
				$condicion[] = "( i.ID_ESTADO_FICHA = 179 )";
			}
			
			if ($tramo == 'semana') {
				$condicion[] = '( `i`.`EDAD_GESTACIONAL` BETWEEN `t`.`desde` AND `t`.`hasta`) ';
				$tabla = " `semanas` `t` ";
			} else { 
				$condicion[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
				$tabla = " `TRAMOS` `t` ";
			}

			if ($año != '') {
				$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = '$año')";
			} else {
				$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = 2012 )";
				
			}
			
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
				
		$id_centro2='-1';
		
		$condicion2 = array();
		if ($tramo == 'semana') {
				$condicion2[] = '( `i`.`EDAD_GESTACIONAL` BETWEEN `t`.`desde` AND `t`.`hasta`) ';
				$tabla = " `semanas` `t` ";
			} else { 
				$condicion2[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
				$tabla = " `TRAMOS` `t` ";
			}

			if ($año != '') {
				$condicion2[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = '$año')";
			} else {
				$condicion2[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = 2012 )";
				
			}
			
			if ($id_trimestre != '') {
				$trimestre = $Trimestres[$id_trimestre];
				$condicion2[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
			}
			else
			{
			$condicion2[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN 1 AND 12 )"; 
			}
		
		if($id_centro2=='-1'){
			$condicion2[] = "(  i.ID_ESTADO_FICHA = 179 )";
		}
		/*if ($id_centro2 <= '') {
				
			}
			else
			{
				$condicion[] = "( i.ID_ESTADO_FICHA = 179 )";
			}*/
			
		
		$where = (count($condicion2) > 0) ? ' AND ' : '  ';
			$condicion2 = $where . join(' AND ', $condicion2);
				
		$sql2 = "SELECT
		`t`.`NOMBRE` AS `nombre`,
		(
			SELECT
				count(`i`.`ID_NEOCOSUR`)
			FROM
				`ingreso` `i`
				inner join informacion_alta  ia 
				on  ia.ID_NEOCOSUR=i.ID_NEOCOSUR
				inner join usuario us on us.us_id_user = i.ID_RESPONSABLE_INGRESO_DATOS 
			
			WHERE
				(
					(
						`ia`.`ID_DESTINO` = 212
					) $condicion2
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
				
			WHERE
				(
					(
						`ia`.`ID_DESTINO` != 212
					) $condicion2
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
				
			WHERE
				(
					(
						(
							`ia`.`ID_DESTINO` = -1 or `ia`.`ID_DESTINO` = 3  or isnull(`ia`.`ID_DESTINO`)
						)
						
					) $condicion2
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
				
			WHERE
				(
									(1=1)
					 $condicion2
				)
		) AS `total`
			FROM
			$tabla
				"; 
			


				
			$cone->Abrir();
			$retorno = $cone->select($sql);				
			$cone->Cerrar();

			$rows = array();
			while($retorno!=null && $item = $retorno->fetch_array()){
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

			}
			foreach ($rows as $key => $value) {
				$rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
				$rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
				$rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
			}
			$etiqueta = array();
			$valores1 = array();
			$valores2 = array();
			$valores3 = array();
			$tabla = array();
			$si= array();
			$no= array();
			$sn= array();
			$jsondata["success"]=true;
			$jsondata["data"]["etiqueta"]=true; 
			for ( $i=0; $i < count($rows);$i++) {
				
				$row = $rows[$i];
				$etiqueta [$i]= $rows[$i]["tramo"];
				$si[0][$i]=$rows[$i]["si"];
				$no[1][$i]=$rows[$i]["no"];
				$sn[2][$i]=$rows[$i]["sn"]; 
				$valores1[$i]= $si[0][$i];
				$valores2[$i]= $no[1][$i];
				$valores3[$i]= $sn[2][$i];
				$tabla [$i]= [$rows[$i]["f"] , $rows[$i]["si"] , $rows[$i]["nf"] , $rows[$i]["no"], $rows[$i]["tr"],$rows[$i]["s_n"],$rows[$i]["sn"],$rows[$i]["tn"]];
				
				
			 
			}
			
			
			// QUERY TOTAL NEOCOSUR ******************* //
			//echo $sql2;
			//echo $sql;
			$cone->Abrir();
			$retorno2 = $cone->select($sql2);				
			$cone->Cerrar();

			$rows = array();
			while($retorno2!=null && $item = $retorno2->fetch_array()){
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

			}
			foreach ($rows as $key => $value) {
				$rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
				$rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
				$rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
			}
			$etiquetaT = array();
			$valores1T = array();
			$valores2T = array();
			$valores3T = array();
			$tablaT = array();
			$si= array();
			$no= array();
			$sn= array();
			$jsondata["success"]=true;
			$jsondata["data"]["etiqueta"]=true; 
			for ( $i=0; $i < count($rows);$i++) {			
				$row = $rows[$i];
				$etiquetaT [$i]= $rows[$i]["tramo"];
				$si[0][$i]=$rows[$i]["si"];
				$no[1][$i]=$rows[$i]["no"];
				$sn[2][$i]=$rows[$i]["sn"]; 
				$valores1T[$i]= $si[0][$i];
				$valores2T[$i]= $no[1][$i];
				$valores3T[$i]= $sn[2][$i];
				$tablaT [$i]= [$rows[$i]["f"] , $rows[$i]["si"] , $rows[$i]["nf"] , $rows[$i]["no"], $rows[$i]["tr"],$rows[$i]["s_n"],$rows[$i]["sn"],$rows[$i]["tn"]];
			 
			}
		
			
			//** FIN QUERY TOTAL NEOCSUR *************///

			$jsondata["data"]["etiqueta"]=$etiqueta;
			$jsondata["data"]["valores"]=[$valores1 ,$valores2,$valores3];
			$jsondata["data"]["tabla"]=$tabla;
			$jsondata["data"]["etiquetaT"]=$etiquetaT;
			$jsondata["data"]["valoresT"]=[$valores1T ,$valores2T,$valores3T];
			$jsondata["data"]["tablaT"]=$tablaT;
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