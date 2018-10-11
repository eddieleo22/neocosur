<?php

error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/vacunas.php';
include '../capaDAO/vacunasDAO.php';
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
		
	extract($_POST);

	$cone = new ConexionDAO();
	 
	$dao =  new vacunasDAO($cone);
	$vacunas = new vacunas();	
	$idOculto= $cone->test_input($idOculto);
	$vacunas->ID_CONTROL =$cone->test_input($idOculto);
	$vacunas->DIA_CALENDARIO= $cone->test_input($calendario);
	$vacunas->VACUNAS_OPCIONALES= $cone->test_input($opcionales);
	$vacunas->ROTAVIRUS= $cone->test_input($rotavirus);
	$vacunas->HEPATITIS_A= $cone->test_input($hepatitisA);
	$vacunas->NEUMOCOCO=  $cone->test_input($neumococo);
	$vacunas->MENINGITIS_C=  $cone->test_input($meningitis);
	$vacunas->OTRAS= $cone->test_input($otras);
	$vacunas->CUAL_ES=  $cone->test_input($vacunas_opcionales_otras_cuales);
	$vacunas->PALIVIZUMAB=  $cone->test_input($palivizumab); 

	$idOculto= $cone->test_input($idOculto);
	$idNeocosur= $cone->test_input($idNeocosur);
	$datos = $dao->buscarId($idOculto);

		if($datos==null )
		{
			$dao->guarda($vacunas);

			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=vacunas&message='.$message.'#vacunas");
					</script>';
		}
		else
		{
			$dao->actualizar($vacunas);

			 echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=vacunas&message='.$message.'#vacunas");
					</script>';
			
		}
	
}
