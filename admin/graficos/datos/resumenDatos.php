<?php

error_reporting(0);
include '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();
//var_dump($cone);
//echo "asdsad".$cone;
include '../../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
extract($_GET);
		 static  $Trimestres = array(array(1, 12),array(1, 3), array(4, 6), array(7, 9), array(10, 12),);
		
        $id_centro =  $cone->test_input($id4);        
        $id_trimestre = $cone->test_input($id2); //$this->request('id_trimestre');
        $año =  $cone->test_input($id);//$this->request('anio');
        $campo =  $cone->test_input($id5); 
        $tramo =  $cone->test_input($id3); 
        $condicion = array();
	

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
				$tabla = " `semanas_condicion` `t` ";
			} else { 
				$condicion[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
				$tabla = " `tramos` `t` ";
	     }

        if ($año != '') {
			$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = '$año')";
		} else {
			$condicion[] = "(YEAR (`i`.`FECHA_NACIMIENTO`) = 2013 )";
		}	
       if ($id_trimestre != '') {
            $trimestre = $Trimestres[$id_trimestre];
            $condicion[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
        }
         $where = (count($condicion) > 0) ? ' AND ' : '  ';
        $condicion = $where . join(' AND ', $condicion);
		
		
		// NUEVO 
		
		if ($campo=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql = " SELECT 	`t`.`nombre` AS `nombre`,
					ifnull(	
					( 	
						SELECT count(0) AS `count(*)`
						FROM 	`ingreso` i
									inner join centro c on c.c_id_centro = i.id_centro  
									inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE ((`$campo` >= 1) $condicion)	),0 ) 
							AS `Si`,
						ifnull(
							( SELECT count(0) AS `count(*)` 
								FROM 	`ingreso` i
											inner join centro c on c.c_id_centro = i.id_centro  
											inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
								WHERE ( (`$campo` = 0) $condicion ) ),0 ) AS `No`,
						ifnull(
							( SELECT count(0) AS `count(*)`
								FROM 	`ingreso` i
											inner join centro c on c.c_id_centro = i.id_centro 
											inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
							WHERE (	(isnull(`$campo`) )  $condicion	) ),0 ) 
							AS `S_N` 
					FROM
					$tabla";
			}
			else if($campo=='NUMERO_SEPSIS_CLINICAS' || $campo=='HIC' 
					|| $campo=='LEUCOMALACIA' || $mcampo=='OXIGENO_36_SEMANAS'   
					|| $campo=='ENTEROCOLITIS_' || $campo=='CIRUGIA_ROP_OJO_IZQ' 
					|| $campo=='SEPSIS_PRECOZ' || $campo=='CLINICA_SDR'
					|| $campo=='DUCTUS' || $campo=='CLINICA_SDR'    ){
						$sql = "SELECT 	`t`.`nombre` AS `nombre`,
							ifnull(	
							( 	
								SELECT count(0) AS `count(*)`
								FROM 	`ingreso` i
											inner join centro c on c.c_id_centro = i.id_centro 
											inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
								WHERE ((`$campo` >= 1) $condicion)	),0 ) 
									AS `Si`,
								ifnull(
									( SELECT count(0) AS `count(*)` 
										FROM 	`ingreso` i
													inner join centro c on c.c_id_centro = i.id_centro 
													inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR  
										WHERE ( (`$campo` = 0) $condicion ) ),0 ) AS `No`,
								ifnull(
									( SELECT count(0) AS `count(*)`
										FROM 	`ingreso` i
													inner join centro c on c.c_id_centro = i.id_centro
													inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
									WHERE (	(isnull(`$campo`) )  $condicion	) ),0 ) 
									AS `S_N` 
							FROM
							$tabla";				
			}
			else if ($campo=='FALLECE_SALA_PARTO'){
					$sql = "SELECT 	`t`.`nombre` AS `nombre`,
								ifnull(	
								( 	
									SELECT count(0) AS `count(*)`
									FROM 	`ingreso` i
												inner join centro c on c.c_id_centro = i.id_centro 
												inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
									WHERE ((parto.$campo >= 1) $condicion)	),0 ) 
										AS `Si`,
									ifnull(
										( SELECT count(0) AS `count(*)` 
											FROM 	`ingreso` i
														inner join centro c on c.c_id_centro = i.id_centro 
														inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
											WHERE ( (parto.$campo = 0) $condicion ) ),0 ) AS `No`,
									ifnull(
										( SELECT count(0) AS `count(*)`
											FROM 	`ingreso` i
														inner join centro c on c.c_id_centro = i.id_centro
														inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
										WHERE (	(isnull(parto.$campo) )  $condicion	) ),0 ) 
										AS `S_N` 
								FROM
								$tabla";
				}
		// FIN NUEVO 
		
	
		//echo "asdsad ";
		//echo $sql."<br> <br>";
		$cone->Abrir();
		//echo $sql;
		$retorno = $cone->select($sql);			
		//var_dump($retorno1);	
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();	
        //$results = $retorno->fetch_assoc();
		//Debug::dump($results);
        $rows = array();
        $rows2 = array();
		
		$etiqueta = array();
		$etiquetaTabla = array();
		$valores1 = array();
		$valores2 = array();
		$valores3 = array();
		$tabla1 = array();
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
		
		//echo "<br><br><br>  cantidad results ".count($retorno);
		while($retorno!=null && $item = $retorno->fetch_assoc()){
        //foreach ($results as $item) {
            $row = array();
            $row['tramo'] = $item['nombre'];
            $row['f'] = $item['Si'];
			$row['f'] = $item['Si'];// presenta numero
            $row['si'] = $item['Si'];// si presenta se sacara porcentaje
            $row['no'] = $item['No'];// no presenta se sacara porcentaje
            $row['nf'] = $item['No'];// no presenta numero
            $row['tr'] = $item['Si'] + $item['No'];// total registro tabla
            $row['sn'] = $item['S_N']; // sin infor se sacara porcentaje
            $row['s_n'] = $item['S_N'];// sin infor en numero
            $row['total'] = $item['Si'] + $item['No'] + $item['S_N']; // todos en tabla
            $row['tn'] = $item['Si'] + $item['No'] + $item['S_N']; // TOTAL NIÑOS
            $rows[] = $row;
        }

        foreach ($rows as $key => $value) {
            $rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
            $rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
            $rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
        }
		//echo "<br><br><br>  cantidad filas ".count($rows);
		for ( $i=0; $i < count($rows);$i++) {
				$etiqueta [$i]= $rows[$i]["tramo"];
				$si[0][$i]=$rows[$i]["f"];
				$no[1][$i]=$rows[$i]["nf"];
				$sn[2][$i]=$rows[$i]["s_n"]; 
				$valores1[$i]= $si[0][$i];
				$valores2[$i]= $no[1][$i];
				$valores3[$i]= $sn[2][$i];
				//echo "<br><br><br>  valores3[i] ".$valores3[$i];
				$tabla1 [$i]= [$rows[$i]["f"] , $rows[$i]["si"] , $rows[$i]["nf"] , $rows[$i]["no"], $rows[$i]["tr"],$rows[$i]["s_n"],$rows[$i]["sn"],$rows[$i]["tn"]];
				
				
			 
		}
		/////// ############### TOTAL 
		
		        
        $id_trimestre =$id2; //$this->request('id_trimestre');
        $año = $id;//$this->request('anio');
        $campo = $id5; 
        $tramo = $id3; 

	
	//echo json_encode($rows, JSON_FORCE_OBJECT);
	 //die(json_encode($rows));
	//public function resumenDataAction() {
        /*$this->setRenderMode(View::RENDER_NONE);
        $id_centro = $this->request('id_centro');
        $año = $this->request('id_centro');
        $tramo = $this->request('tramo');
        $id_trimestre = $this->request('id_trimestre');
        $año = $this->request('anio');
        //$campo = 'PAT_NEONA_HIC';
		$campo = $this->request('condicion');*/

        $condicion2 = array();
		$id_centro2='-1';
        if ($id_centro2 != '')  {
			$condicion2[] = "( i.ID_ESTADO_FICHA = 179 )";
		}
	
        if ($tramo == 'semana') {
				$condicion2[] = '( `i`.`EDAD_GESTACIONAL` BETWEEN `t`.`desde` AND `t`.`hasta`) ';
				$tabla = " `semanas_condicion` `t` ";
			} else { 
				$condicion2[] = '( `i`.`PESO_NACIMIENTO` BETWEEN `t`.`minimo` AND `t`.`maximo`) ';
				$tabla = " `tramos` `t` ";
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
         $where = (count($condicion2) > 0) ? ' AND ' : '  ';
        $condicion2 = $where . join(' AND ', $condicion2);
		
		
		
		// NUEVO TOTAL
		
		if ($campo=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sqlT = " SELECT 	`t`.`nombre` AS `nombre`,
					ifnull(	
					( 	
						SELECT count(0) AS `count(*)`
						FROM 	`ingreso` i 
									inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE ((`$campo` >= 1) $condicion2)	),0 ) 
							AS `Si`,
						ifnull(
							( SELECT count(0) AS `count(*)` 
								FROM 	`ingreso` i 
											inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
								WHERE ( (`$campo` = 0) $condicion2 ) ),0 ) AS `No`,
						ifnull(
							( SELECT count(0) AS `count(*)`
								FROM 	`ingreso` i 
											inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR 
							WHERE (	(isnull(`$campo`) )  $condicion2	) ),0 ) 
							AS `S_N` 
					FROM
					$tabla";
			}
			else if($campo=='NUMERO_SEPSIS_CLINICAS' || $campo=='HIC' 
					|| $campo=='LEUCOMALACIA' || $mcampo=='OXIGENO_36_SEMANAS'   
					|| $campo=='ENTEROCOLITIS_' || $campo=='CIRUGIA_ROP_OJO_IZQ' 
					|| $campo=='SEPSIS_PRECOZ' || $campo=='CLINICA_SDR'
					|| $campo=='DUCTUS' || $campo=='CLINICA_SDR'    ){
						$sqlT = "SELECT 	`t`.`nombre` AS `nombre`,
							ifnull(	
							( 	
								SELECT count(0) AS `count(*)`
								FROM 	`ingreso` i 
											inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
								WHERE ((`$campo` >= 1) $condicion2)	),0 ) 
									AS `Si`,
								ifnull(
									( SELECT count(0) AS `count(*)` 
										FROM 	`ingreso` i 
													inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR  
										WHERE ( (`$campo` = 0) $condicion2 ) ),0 ) AS `No`,
								ifnull(
									( SELECT count(0) AS `count(*)`
										FROM 	`ingreso` i 
													inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
									WHERE (	(isnull(`$campo`) )  $condicion2	) ),0 ) 
									AS `S_N` 
							FROM
							$tabla";				
			}
			else if ($campo=='FALLECE_SALA_PARTO'){
					$sqlT = "SELECT 	`t`.`nombre` AS `nombre`,
								ifnull(	
								( 	
									SELECT count(0) AS `count(*)`
									FROM 	`ingreso` i 
												inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
									WHERE ((parto.$campo >= 1) $condicion2)	),0 ) 
										AS `Si`,
									ifnull(
										( SELECT count(0) AS `count(*)` 
											FROM 	`ingreso` i 
														inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
											WHERE ( (parto.$campo = 0) $condicion2 ) ),0 ) AS `No`,
									ifnull(
										( SELECT count(0) AS `count(*)`
											FROM 	`ingreso` i 
														inner join  antecedentes_parto parto  on  parto.ID_NEOCOSUR=i.ID_NEOCOSUR 
										WHERE (	(isnull(parto.$campo) )  $condicion2	) ),0 ) 
										AS `S_N` 
								FROM
								$tabla";
				}
		// FIN NUEVO TOTAL
		//echo " TOTAL AER <br> <br>";
		//echo $sqlT;
		$cone->Abrir();
		//echo $sql;
		$retorno = $cone->select($sqlT);			
		//var_dump($retorno1);	
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();	
        //$results = $retorno->fetch_assoc();
		//Debug::dump($results);
        $rows = array(); 
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
		
		//echo "<br><br><br>  cantidad results ".count($retorno);
		while($retorno!=null && $item = $retorno->fetch_assoc()){
        //foreach ($results as $item) {
            $row = array();
            $row['tramo'] = $item['nombre'];
            $row['f'] = $item['Si'];
			$row['f'] = $item['Si'];// presenta numero
            $row['si'] = $item['Si'];// si presenta se sacara porcentaje
            $row['no'] = $item['No'];// no presenta se sacara porcentaje
            $row['nf'] = $item['No'];// no presenta numero
            $row['tr'] = $item['Si'] + $item['No'];// total registro tabla
            $row['sn'] = $item['S_N']; // sin infor se sacara porcentaje
            $row['s_n'] = $item['S_N'];// sin infor en numero
            $row['total'] = $item['Si'] + $item['No'] + $item['S_N']; // todos en tabla
            $row['tn'] = $item['Si'] + $item['No'] + $item['S_N']; // TOTAL NIÑOS
            $rows[] = $row;
        }

        foreach ($rows as $key => $value) {
            $rows[$key]['si'] = ($value['si'] > 0) ? round(($value['si'] / $value['total']) * 100) : 0;
            $rows[$key]['no'] = ($value['no'] > 0) ? round(($value['no'] / $value['total']) * 100) : 0;
            $rows[$key]['sn'] = ($value['sn'] > 0) ? round(($value['sn'] / $value['total']) * 100) : 0;
        }
		//echo "<br><br><br>  cantidad filas ".count($rows);
		for ( $i=0; $i < count($rows);$i++) {
				$etiquetaT [$i]= $rows[$i]["tramo"];
				$si[0][$i]=$rows[$i]["f"];
				$no[1][$i]=$rows[$i]["nf"];
				$sn[2][$i]=$rows[$i]["s_n"]; 
				$valores1T[$i]= $si[0][$i];
				$valores2T[$i]= $no[1][$i];
				$valores3T[$i]= $sn[2][$i];
				//echo "<br><br><br>  valores3[i] ".$valores3[$i];
				$tablaT [$i]= [$rows[$i]["f"] , $rows[$i]["si"] , $rows[$i]["nf"] , $rows[$i]["no"], $rows[$i]["tr"],$rows[$i]["s_n"],$rows[$i]["sn"],$rows[$i]["tn"]];
				
				
			 
		}
		
		
		$jsondata["data"]["valores"]=[$valores1 ,$valores2,$valores3];
		$jsondata["data"]["etiqueta"]=$etiqueta ;
		$jsondata["data"]["tabla"]=$tabla1 ;
		$jsondata["data"]["valoresT"]=[$valores1T ,$valores2T,$valores3T];
		$jsondata["data"]["etiquetaT"]=$etiquetaT ;
		$jsondata["data"]["tablaT"]=$tablaT ;
		echo json_encode($jsondata, JSON_FORCE_OBJECT);
        //echo json_encode($rows,JSON_FORCE_OBJECT);
	/*$jsondata["data"]["valores"]=[$valores1 ,$valores2,$valores3];
	$jsondata["data"]["etiqueta"]=$etiqueta ;
	$jsondata["data"]["etiquetaGrafico"]=$etiquetaGrafico ;
	$jsondata["data"]["tabla"]=$tabla ;
	$etiquetaT=$etiqueta ;
	$jsondata["data"]["etiquetaT"]=$etiquetaT;
	$jsondata["data"]["valoresT"]=[$valores1 ,$valores2,$valores3];
	$jsondata["data"]["tablaT"]=$tabla;
	echo json_encode($jsondata, JSON_FORCE_OBJECT);*/
   // }
	
    //}
?>