<?php

error_reporting(0);
include '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();
//var_dump($cone);
/*
include '../../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
*/
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	session_start();
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
}


extract($_GET);
		 static  $Trimestres = array(array(1, 12),array(1, 3), array(4, 6), array(7, 9), array(10, 12),);
		
        $id_centro = $cone->test_input($id4);        
        $id_trimestre =$cone->test_input($id2); //$this->request('id_trimestre');
        $año = $cone->test_input($id);//$this->request('anio');
        //$campo = 'PAT_NEONA_HIC'; 
		$miarray = explode(',', $campo);  
        $condicion = array();

        if ($id_centro != '') {
				$condicion[] = "( `c`.`c_id_centro` = $id_centro and  i.ID_ESTADO_FICHA = 179 )";
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
		$rows = array();
		$rows2 = array();
		for($x=0;$x <$contador;$x++)
		{
			if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro  
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						
						WHERE	(($miarray[$x] > 0) $condicion )
						
						 ";
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						
						
						WHERE	(($miarray[$x] > 0) $condicion )
						
						 ";
			}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 					 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( pa.$miarray[$x] = 1) $condicion
						)";
				}
			 
			}		// NUEVA QUERY 	 NO 	

		if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_NO = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro  
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR						
						
						WHERE	(( e.$miarray[$x] = 0) $condicion	)"; 
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_NO = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( p.$miarray[$x] = 0) $condicion	)"; 
			}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
				$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 					 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( pa.$miarray[$x] = 0) $condicion	)";
						
				}
			 
			}
			 	
		 if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro  
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR						
						WHERE	(   (  e.$miarray[$x] =-1  or 
											   e.$miarray[$x] = 3  or 
											(  isnull(e.$miarray[$x]) ) 
									      ) 
										$condicion
									) "; 
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(   (  p.$miarray[$x] =-1  or 
											   p.$miarray[$x] = 3  or 
											(  isnull(p.$miarray[$x]) ) 
									      ) 
										$condicion
									) "; 
			}
			else if ($miarray[$x]=='FALLECE_SALA_PARTO'){
				$sql_SINF = "SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro 					 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(   (  pa.$miarray[$x] =-1  or 
											   pa.$miarray[$x] = 3  or 
											(  isnull(pa.$miarray[$x]) ) 
									      ) 
										$condicion
									) "; 
				}
			
		/*
		echo "<br> SI <br>";
		echo $sql_SI;
		echo "<br> NO<br>";
		echo $sql_NO;
		echo "<br> S/N <br>";
		echo $sql_SINF;
		echo "<br> <br>";*/
		
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
		
		$results_SI= $retorno1->fetch_assoc();
		$results_NO= $retorno2->fetch_assoc();
		$results_SINF= $retorno3->fetch_assoc();
		//var_dump($retorno1->fetch_array());
		//var_dump($retorno1->fetch_array());
		//var_dump($results_NO);
			//$rows = array();
	     	$row = array();
			
            
            $row['tramo'] = $miarray2[$x];// leyenda tabla 
			//$etiqueta[$x]= $row['tramo'];
			
			$row['leyenda']=$miarray3[$x]; //  leyenda grafico
			$etiquetaGrafico[$x]= $row['leyenda'];
			 //var_dump($row['leyenda']);
			//$row['tramo'] = $miarray[$x];
			//echo " <br> SI numero -> ".$results_SI['n'];
			//echo " <br> NO numero -> ".$results_NO[0]['n'];
			//
			
			//$p[0][$x]=$row['P'] = $results_SI[0]['n'];
			$row['p'] = $results_SI['n'];// presenta numero
			$row['NP'] = $results_NO['n'];// no  presenta numero
			$row['s__n'] = $results_SINF['n']; // sin info  numero
			
			$row['tr']=$results_SI['n'] + $results_NO['n']; // total registro  
			
			$row['tn'] = $results_SI['n'] + $results_NO['n']+ $results_SINF['n']; // total niños
			$row['_P']= ($row['p'] >0) ? round(($row['p'] / $row['tn']) *100 ):0;//PRESENTA %
			$row['_F']= ($row['NP'] >0) ? round(($row['NP'] / $row['tn']) *100) :0;// NO PRESENTA %
			$row['s_n']=($row['sn'] >0) ? round(($row['sn'] / $row['tn']) *100):0;// SIN INFO %
			$row ["tabla"] =[$row['p'],$row['_P'],$row['NP'],$row['_F'],$row['tr'],$row['sn'],$row['s_n'],$row['tn']  ];
			$rows[]=$row;
		}	
		foreach ($rows as $key => $value) {
			
				$rows[$key]['si'] = ($value['p'] > 0) ? round(($value['p'] / $value['tn']) * 100) : 0;
				$rows[$key]['no'] = ($value['NP'] > 0) ? round(($value['NP'] / $value['tn']) * 100) : 0;
				$rows[$key]['sn'] = ($value['s__n'] > 0) ? round(($value['s__n'] / $value['tn']) * 100) : 0;
				
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
				$si[0][$i]=$rows[$i]["p"];
				$no[1][$i]=$rows[$i]["NP"];
				$sn[2][$i]=$rows[$i]["s__n"]; 
				
				$valores1[$i]= $si[0][$i];
				$valores2[$i]= $no[1][$i];
				$valores3[$i]= $sn[2][$i];
				//echo "<br>  S__N valor value['s__n']-->   ".$rows[$i]["s__n"];
				//echo "<br>  SN valor value['sn']-->   ".$rows[$i]["sn"];
				$tabla [$i]= [$rows[$i]["p"] , $rows[$i]["_P"] , $rows[$i]["NP"] , $rows[$i]["_F"], $rows[$i]["tr"],$rows[$i]["s__n"],$rows[$i]["sn"],$rows[$i]["tn"]]; 
				//echo "<br> tablaT 111 -> ".$tabla[$i];
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
			
      
	
         $where = (count($condicion2) > 0) ? ' AND ' : '  ';
        $condicion2 = $where . join(' AND ', $condicion2);
	for($x=0;$x <$contador;$x++)
		{
		if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR
						
						
						WHERE	(($miarray[$x] > 0) $condicion2 )
						
						 ";
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_SI = "	SELECT 	count(*) as n FROM 	`ingreso` i 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						
						
						WHERE	(($miarray[$x] > 0) $condicion2 ) ;
						
						 ";
			}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
					$sql_SI = "SELECT 	count(*) as n FROM 	`ingreso` i 				 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( pa.$miarray[$x] = 1) $condicion2
						)";
				}
			 
			}		// NUEVA QUERY 	 NO 	

		if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_NO = "	SELECT 	count(*) as n FROM 	`ingreso` i 
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR						
						
						WHERE	(( e.$miarray[$x] = 0) $condicion2	)"; 
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_NO = "	SELECT 	count(*) as n FROM 	`ingreso` i 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( p.$miarray[$x] = 0) $condicion2	)"; 
			}
			else
			{
				if ($miarray[$x]=='FALLECE_SALA_PARTO'){
				$sql_NO = "SELECT 	count(*) as n FROM 	`ingreso` i 					 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(( pa.$miarray[$x] = 0) $condicion2	)";
				
				}
			 
			}
			 	
		 if ($miarray[$x]=='NUMERO_TRANSFUSIONES' )
			{
				//NUMERO_SEPSIS_CLINICAS  tabla  neonatal
				//NUMERO_TRANSFUSIONES  tabla  evolucion 
			$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i
						inner join centro c on c.c_id_centro = i.id_centro  
						inner join  evolucion_tratamiento e  on  e.ID_NEOCOSUR=i.ID_NEOCOSUR						
						WHERE	(   (  e.$miarray[$x] =-1  or 
											   e.$miarray[$x] = 3  or 
											(  isnull(e.$miarray[$x]) ) 
									      ) 
										$condicion2
									) "; 
			}
			else if($miarray[$x]=='NUMERO_SEPSIS_CLINICAS' || $miarray[$x]=='HIC' 
					|| $miarray[$x]=='LEUCOMALACIA' || $miarray[$x]=='OXIGENO_36_SEMANAS'   
					|| $miarray[$x]=='ENTEROCOLITIS_' || $miarray[$x]=='CIRUGIA_ROP_OJO_IZQ' 
					|| $miarray[$x]=='SEPSIS_PRECOZ' || $miarray[$x]=='CLINICA_SDR'
					|| $miarray[$x]=='DUCTUS' || $miarray[$x]=='CLINICA_SDR'    ){
						$sql_SINF = "	SELECT 	count(*) as n FROM 	`ingreso` i 
						inner join  patologias_neonatales p  on  p.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(   (  p.$miarray[$x] =-1  or 
											   p.$miarray[$x] = 3  or 
											 isnull(p.$miarray[$x]) ) 
									      
										$condicion2
									) "; 
			}
			else if ($miarray[$x]=='FALLECE_SALA_PARTO'){
				$sql_SINF = "SELECT 	count(*) as n FROM 	`ingreso` i 					 
						inner join  antecedentes_parto pa  on  pa.ID_NEOCOSUR=i.ID_NEOCOSUR 
						WHERE	(   (  pa.$miarray[$x] =-1  or 
											   pa.$miarray[$x] = 3  or 
											(  isnull(pa.$miarray[$x]) ) 
									      ) 
										$condicion2
									) "; 
				}
		/*
		echo "<br> TOTALES <br>";
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
		
		$results_SI= $retorno1->fetch_assoc();
		$results_NO= $retorno2->fetch_assoc();
		$results_SINF= $retorno3->fetch_assoc();
		//var_dump($retorno1->fetch_array());
		//var_dump($retorno1->fetch_array());
		//var_dump($results_NO);
			//$rows = array();
	     	$row = array();
			
            
            $row['tramo'] = $miarray2[$x];// leyenda tabla 
			$etiqueta[$x]= $row['tramo'];
			
			$row['leyenda']=$miarray3[$x]; //  leyenda grafico
			//$etiquetaGraficoT[$x]= $row['leyenda'];
			 //var_dump($row['leyenda']);
			//$row['tramo'] = $miarray[$x];
			$row['P'] = $results_SI['n'];
			$row['p'] = $results_SI['n'];// presenta numero
			$row['NP'] = $results_NO['n'];// no  presenta numero
			$row['s__n'] = $results_SINF['n']; // sin info  numero
			//$valores1T[$x]= $p[0][$x];
			//$valores2T[$x]= $np[1][$x];
			//$valores3T[$x]= $sn[2][$x];
			$row['tr']=$results_SI['n'] + $results_NO['n']; // total registro  
			
			$row['tn'] = $results_SI['n'] + $results_NO['n']+ $results_SINF['n']; // total niños
			$row['_P']= ($row['p'] >0) ? round(($row['p'] / $row['tn']) *100 ):0;//PRESENTA %
			$row['_F']= ($row['NP'] >0) ? round(($row['NP'] / $row['tn']) *100) :0;// NO PRESENTA %
			$row['s_n']=($row['sn'] >0) ? round(($row['sn'] / $row['tn']) *100):0;// SIN INFO %
			$tablaT["tabla"] =[$row['p'],$row['_P'],$row['NP'],$row['_F'],$row['tr'],$row['sn'],$row['s_n'],$row['tn']  ];
			$rows2[]=$row;
		}	
	
	foreach ($rows2 as $key => $value) {
				$rows2[$key]['si'] = ($value['p'] > 0) ? round(($value['p'] / $value['tn']) * 100) : 0;
				$rows2[$key]['no'] = ($value['NP'] > 0) ? round(($value['NP'] / $value['tn']) * 100) : 0;
				$rows2[$key]['sn'] = ($value['s__n'] > 0) ? round(($value['s__n'] / $value['tn']) * 100) : 0;
			}
			
			$si= array();
			$no= array();
			$sn= array(); 
			//echo "<br> <br>contar ".count($rows2);
			for ( $i=0; $i < count($rows2);$i++) {
				
				$row = $rows2[$i];
				$etiquetaT [$i]= $rows2[$i]["tramo"];
				
				$si[0][$i]=$rows2[$i]["p"];
				$no[1][$i]=$rows2[$i]["NP"];
				$sn[2][$i]=$rows2[$i]["sn"]; 
				
				$valores1T[$i]= $si[0][$i]; 
				$valores2T[$i]= $no[1][$i];
				$valores3T[$i]= $sn[2][$i];
				$tablaT[$i]= [$rows2[$i]["p"] , $rows2[$i]["_P"] , $rows2[$i]["NP"] , $rows2[$i]["_F"], $rows2[$i]["tr"],$rows2[$i]["s__n"],$rows2[$i]["sn"],$rows2[$i]["tn"]]; 
				//echo "<br> tablaT -> ".$tablaT[$i];
			}
	
	
	$jsondata["data"]["valores"]=[$valores1 ,$valores2,$valores3];
	$jsondata["data"]["etiqueta"]=$etiqueta ;
	$jsondata["data"]["etiquetaGrafico"]=$etiquetaGrafico ;
	$jsondata["data"]["tabla"]=$tabla ;
	//$etiquetaT=$etiquetaT ;
	$jsondata["data"]["etiquetaT"]=$etiquetaT;
	$jsondata["data"]["etiquetaGraficoT"]=$etiquetaGrafico;
	$jsondata["data"]["valoresT"]=[$valores1T ,$valores2T,$valores3T];
	$jsondata["data"]["tablaT"]=$tablaT;
	echo json_encode($jsondata, JSON_FORCE_OBJECT);
	//echo json_encode($rows, JSON_FORCE_OBJECT);
	 //die(json_encode($rows));
	
	
    //}
?>