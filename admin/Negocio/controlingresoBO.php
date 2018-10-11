<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/control.php'; 
include '../capaDAO/ingresoControlDAO.php';
include '../ayuda.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	session_start();
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
		$r=nulo($_POST);
	$cone = new ConexionDAO();

	extract($_POST);

	$dao =  new ingresoControlDAO($cone);
	$control = new control();		
	$control->FECHA_INGRESO_PROGRAMA=$cone->test_input($ingreso_control);	 
	$control->FECHA_CONTROL=$cone->test_input($fechita_control);

	$control->ID_RESPONSABLE=$cone->test_input($idResponsable);

		$idControl= $cone->test_input($idControl);
		if($idControl=='' ||  $idControl=='-1'){
			$nombrecontrol=$cone->test_input($ingresoControl);
			$control->ID_NEOCOSUR=$cone->test_input($idNeocosur);		 
			if($nombrecontrol!=''){ 			
				if($anio<=2 && $meses <=11){
					$ar= explode("-",validaControlValidoCrono($nombrecontrol)); 
					$angio =$ar[0] ;
					$mes=$ar[1] ;
					$nomControl= $ar[2];
					$control->EDAD_CORREGIDA_AGNOS=$cone->test_input($anio);
					$control->EDAD_CORREGIDA_MESES=$cone->test_input($meses);				
					$control->EDAD_CRONOLOGICA_AGNOS=$cone->test_input($anio2);
					$control->EDAD_CRONOLOGICA_MESES=$cone->test_input($meses2);
					$control->ID_CONTROL=$cone->test_input($idControl);	
					$control->VALIDO='1';
					$control->nombre_control=$cone->test_input($messageBD);	 				
				}
				else { 
					$ar= explode("-",validaControlValidoCrono($nombrecontrol)); 
					$angio =$ar[0] ;
					$mes=$ar[1] ;
					$nomControl= $ar[2];
					$control->EDAD_CORREGIDA_AGNOS=$cone->test_input($anio);
					$control->EDAD_CORREGIDA_MESES=$cone->test_input($meses);
					$control->EDAD_CRONOLOGICA_AGNOS=$cone->test_input($anio2);
					$control->EDAD_CRONOLOGICA_MESES=$cone->test_input($meses2);
					$control->ID_CONTROL=$cone->test_input($idControl);	
					$control->VALIDO='1';
					$control->nombre_control=$cone->test_input($messageBD); 
				}
			}
			else { 
					$control->EDAD_CORREGIDA_AGNOS=$cone->test_input($anio);
					$control->EDAD_CORREGIDA_MESES=$cone->test_input($meses);
					$control->EDAD_CRONOLOGICA_AGNOS=$cone->test_input($anio2);
					$control->EDAD_CRONOLOGICA_MESES=$cone->test_input($meses2);
					$control->ID_CONTROL=$cone->test_input($idControl);	
					$control->VALIDO='0';
					$control->nombre_control=''; 
			 
			}
			$idNeocosur= $cone->test_input($idNeocosur);
			$dao->guarda($control);
			$id =$dao->getId();
			echo '<script type="text/javascript">
				window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$id.'&url=ingreso&message='.$message.'#ingreso");
				</script>';
			
		}
		else {
			$idNeocosur= $cone->test_input($idNeocosur);
		echo '<script type="text/javascript">
				window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idControl.'&url=ingreso&message='.$message.'#ingreso");
				</script>';	
		}

}

