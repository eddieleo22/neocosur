<?php

error_reporting(0);
include '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();
//var_dump($cone);
//echo "asdsad".$cone;
extract($_GET);
		 static  $Trimestres = array(array(1, 12),array(1, 3), array(4, 6), array(7, 9), array(10, 12),);
		
        $id_centro = $id4;        
        $id_trimestre =$id2; //$this->request('id_trimestre');
        $año = $id;//$this->request('anio');
        //$campo = 'PAT_NEONA_HIC'; 
		$miarray = explode(',', $campo);  
        $condicion = array();

        if ($id_centro != '') {
				$condicion[] = "( `i`.`id_centro` = $id_centro and  i.ID_ESTADO_FICHA = 179 )";
			}
		else
		{
			$condicion[] = "( i.ID_ESTADO_FICHA = 179 )";
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
			
        if ($id_trimestre != '') {
            $trimestre = $Trimestres[$id_trimestre];
            $condicion[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
        }
	
         $where = (count($condicion) > 0) ? ' AND ' : '  ';
        $condicion = $where . join(' AND ', $condicion);
		$campo = 'HIC,LEUCOMALACIA,OXIGENO_36_SEMANAS,ENTEROCOLITIS_,CIRUGIA_ROP_OJO_IZQ,SEPSIS_PRECOZ,NUMERO_SEPSIS_CLINICAS,CLINICA_SDR,FALLECE_SALA_PARTO,DUCTUS,NUMERO_TRANSFUSIONES';
		$miarray = explode(',', $campo);
		$contador=count($miarray);
		$campo2='HIC,Leucomalacia,02-36sem.,ECN,ROP OJO,Sepsis precoz,Sepsis tardía,Clínica SDR,Fallece sala de partos,Ductus,Transfusiones';
		$miarray2 = explode(',', $campo2);
		$campo3='HIC,LEU,02-36,ECN,ROPIZ,ROPOJ,SEPC,SDR,Falle,DUC,TRAN';
		$miarray3 = explode(',', $campo3);
		//echo "Contador --> ".$contador;
		$etiqueta = array();
		$etiquetaTabla = array();
		$valores1 = array();
		$valores2 = array();
		$valores3 = array();
		$tabla = array();
		$etiquetaT = array();
		$valores1T = array();
		$valores2T = array();
		$valores3T = array();
		$tablaT = array();
		$p= array();
		$pn= array();
		$sn= array();
		$jsondata["success"]=true;
		$jsondata["data"]["etiqueta"]=true; 
		for($x=0;$x <$contador;$x++)
		{
		if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{

				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i

						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(($miarray[$x] > 0) $condicion )
						
						 ";
			}else{
					if ( $miarray[$x]=='NUMERO_SEPSIS_CLINICAS')
						{
							//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
						$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i
									// inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
									
									WHERE	(($miarray[$x] > 0) $condicion )
									
									 ";				
							
				}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( pa.$miarray[$x] = 1) $condicion
						)";
				}
				else {
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( $miarray[$x] = 1) $condicion
						)";
				}
						
						//SELECT count(*)  as n  FROM `ING`
						//WHERE	( (`ING`.$miarray[$x] = 1) $condicion
						//)
			}
		if ($miarray[$x]=='FALLECE_SALA_PARTO'){
		$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( pa.$miarray[$x] = 0) $condicion
						)"; 
		}
		else {
					$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i
								inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
								inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
								inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
								
								WHERE	(( $miarray[$x] = 0) $condicion
								)"; 
					}
			 	
		 if ($miarray[$x]=='PAT_NEONA_MED_NUM_TRANSFUS' || $miarray[$x]=='NUMERO_SEPSIS_CLINICAS')
			{ 
							
				$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  isnull( $miarray[$x])) $condicion
									)
						
						 "; 
			}
		else
		{
			if ($miarray[$x]=='FALLECE_SALA_PARTO'){ 	
			$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  pa.$miarray[$x] =-1  or 
											   pa.$miarray[$x] = 3  or 
											(  isnull(pa.$miarray[$x]) ) 
									      ) 
										$condicion
									) "; 
			}
			else {
					$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  $miarray[$x] =-1  or 
											   $miarray[$x] = 3  or 
											(  isnull($miarray[$x]) ) 
									      ) 
										$condicion
									) "; 
			}
		}
		/*
		echo "<br> <br>";
		echo $sql_SI;
		echo "<br> <br>";
		echo $sql_NO;
		echo "<br> <br>";
		echo $sql_SINF;
		echo "<br> <br>";
		*/
		$cone->Abrir();
		
		$retorno1 = $cone->select($sql_SI);			
		//var_dump($retorno1);	
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();
		$retorno2 = $cone->select($sql_NO);		
		//var_dump($retorno2);		
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();
		$retorno3 = $cone->select($sql_SINF);				
		$cone->Cerrar();
		
		$results_SI= $retorno1->fetch_array();
		$results_NO= $retorno2->fetch_array();
		$results_SINF= $retorno3->fetch_array();
		//var_dump($retorno1->fetch_array());
		//var_dump($retorno1->fetch_array());
		//var_dump($results_NO);
			//$rows = array();
	     	$row = array();
			
            
            $row['tramo'] = $miarray2[$x];// leyenda tabla 
			$etiqueta[$x]= $row['tramo'];
			
			$row['leyenda']=$miarray3[$x]; //  leyenda grafico
			$etiquetaGrafico[$x]= $row['leyenda'];
			 //var_dump($row['leyenda']);
			//$row['tramo'] = $miarray[$x];
			$p[0][$x]=$row['P'] = $results_SI[0]['n'];
			$p[0][$x]=$row['p'] = $results_SI[0]['n'];// presenta numero
			$np[1][$x]=$row['NP'] = $results_NO[0]['n'];// no  presenta numero
			$sn[2][$x]=$row['sn'] = $results_SINF[0]['n']; // sin info  numero
			$valores1[$x]= $p[0][$x];
			$valores2[$x]= $np[1][$x];
			$valores3[$x]= $sn[2][$x];
			$row['tr']=$results_SI[0]['n'] + $results_NO[0]['n']; // total registro  
			
			$row['tn'] = $results_SI[0]['n'] + $results_NO[0]['n']+ $results_SINF[0]['n']; // total niños
			$row['_P']= ($row['p'] >0) ? round(($row['p'] / $row['tn']) *100 ):0;//PRESENTA %
			$row['_F']= ($row['NP'] >0) ? round(($row['NP'] / $row['tn']) *100) :0;// NO PRESENTA %
			$row['s_n']=($row['sn'] >0) ? round(($row['sn'] / $row['tn']) *100):0;// SIN INFO %
			$tabla[$x] =[$row['p'],$row['_P'],$row['NP'],$row['_F'],$row['tr'],$row['sn'],$row['s_n'],$row['tn']  ];
		}	
		
	//  ** QUERY TOTAL NEOCOSUR **
	$condicion2 = array();
		$id_centro=-1;
        if ($id_centro == '-1') {
				$condicion2[] = "( i.ID_ESTADO_FICHA = 179 )";
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
			
        if ($id_trimestre != '') {
            $trimestre = $Trimestres[$id_trimestre];
            $condicion2[] = "(MONTH(`i`.`FECHA_NACIMIENTO`) BETWEEN {$trimestre[0]} AND {$trimestre[1]})";
        }
	
         $where = (count($condicion2) > 0) ? ' AND ' : '  ';
        $condicion2 = $where . join(' AND ', $condicion2);
	for($x=0;$x <$contador;$x++)
		{
		if ($miarray[$x]=='NUMERO_TRANSFUSIONES' || $miarray[$x]=='NUMERO_SEPSIS_CLINICAS')
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(($miarray[$x] > 0) $condicion2
								)
						
						 ";
			}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( pa.$miarray[$x] = 1) $condicion2
						)";
				}
				else {
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( $miarray[$x] = 1) $condicion2
						)";
				}
						
						//SELECT count(*)  as n  FROM `ING`
						//WHERE	( (`ING`.$miarray[$x] = 1) $condicion2
						//)
			}
		if ($miarray[$x]=='FALLECE_SALA_PARTO'){
		$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						WHERE	(( pa.$miarray[$x] = 0) $condicion2
						)"; 
		}
		else {
					$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i
								inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
								inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
								inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
								
								WHERE	(( $miarray[$x] = 0) $condicion2
								)"; 
					}
			 	
		 if ($miarray[$x]=='PAT_NEONA_MED_NUM_TRANSFUS' || $miarray[$x]=='NUMERO_SEPSIS_CLINICAS')
			{ 
							
				$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  isnull( $miarray[$x])) $condicion2
									)
						
						 "; 
			}
		else
		{
			if ($miarray[$x]=='FALLECE_SALA_PARTO'){ 	
			$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  pa.$miarray[$x] =-1  or 
											   pa.$miarray[$x] = 3  or 
											(  isnull(pa.$miarray[$x]) ) 
									      ) 
										$condicion2
									) "; 
			}
			else {
					$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
								WHERE	(   (  $miarray[$x] =-1  or 
											   $miarray[$x] = 3  or 
											(  isnull($miarray[$x]) ) 
									      ) 
										$condicion2
									) "; 
			}
		}
		echo "<br> TOTALES <br>";
		echo $sql_SI;
		echo "<br> <br>";
		echo $sql_NO;
		echo "<br> <br>";
		echo $sql_SINF;
		echo "<br> <br>";
		die;
		$cone->Abrir();
		
		$retorno1 = $cone->select($sql_SI);			
		//var_dump($retorno1);	
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();
		$retorno2 = $cone->select($sql_NO);		
		//var_dump($retorno2);		
		//echo "<br> <br>";		
		$cone->Cerrar();
		$cone->Abrir();
		$retorno3 = $cone->select($sql_SINF);				
		$cone->Cerrar();
		
		$results_SI= $retorno1->fetch_array();
		$results_NO= $retorno2->fetch_array();
		$results_SINF= $retorno3->fetch_array();
		//var_dump($retorno1->fetch_array());
		//var_dump($retorno1->fetch_array());
		//var_dump($results_NO);
			//$rows = array();
	     	$row = array();
			
            
            $row['tramo'] = $miarray2[$x];// leyenda tabla 
			$etiquetaT[$x]= $row['tramo'];
			
			$row['leyenda']=$miarray3[$x]; //  leyenda grafico
			$etiquetaGraficoT[$x]= $row['leyenda'];
			 //var_dump($row['leyenda']);
			//$row['tramo'] = $miarray[$x];
			$p[0][$x]=$row['P'] = $results_SI[0]['n'];
			$p[0][$x]=$row['p'] = $results_SI[0]['n'];// presenta numero
			$np[1][$x]=$row['NP'] = $results_NO[0]['n'];// no  presenta numero
			$sn[2][$x]=$row['sn'] = $results_SINF[0]['n']; // sin info  numero
			$valores1T[$x]= $p[0][$x];
			$valores2T[$x]= $np[1][$x];
			$valores3T[$x]= $sn[2][$x];
			$row['tr']=$results_SI[0]['n'] + $results_NO[0]['n']; // total registro  
			
			$row['tn'] = $results_SI[0]['n'] + $results_NO[0]['n']+ $results_SINF[0]['n']; // total niños
			$row['_P']= ($row['p'] >0) ? round(($row['p'] / $row['tn']) *100 ):0;//PRESENTA %
			$row['_F']= ($row['NP'] >0) ? round(($row['NP'] / $row['tn']) *100) :0;// NO PRESENTA %
			$row['s_n']=($row['sn'] >0) ? round(($row['sn'] / $row['tn']) *100):0;// SIN INFO %
			$tablaT[$x] =[$row['p'],$row['_P'],$row['NP'],$row['_F'],$row['tr'],$row['sn'],$row['s_n'],$row['tn']  ];
		}	
	
	
	$jsondata["data"]["valores"]=[$valores1 ,$valores2,$valores3];
	$jsondata["data"]["etiqueta"]=$etiqueta ;
	$jsondata["data"]["etiquetaGrafico"]=$etiquetaGrafico ;
	$jsondata["data"]["tabla"]=$tabla ;
	$etiquetaT=$etiqueta ;
	$jsondata["data"]["etiquetaT"]=$etiquetaT;
	$jsondata["data"]["etiquetaGraficoT"]=$etiquetaGraficoT;
	$jsondata["data"]["valoresT"]=[$valores1T ,$valores2T,$valores3T];
	$jsondata["data"]["tablaT"]=$tablaT;
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
	//echo json_encode($rows, JSON_FORCE_OBJECT);
	 //die(json_encode($rows));
	
	
    //}
?>