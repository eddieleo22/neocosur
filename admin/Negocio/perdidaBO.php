<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/perdida_paciente.php';
include '../capaDAO/perdida_pacienteDAO.php';
include '../ayuda.php';




extract($_POST);

$cone = new ConexionDAO();

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

	$dao =  new perdida_pacienteDAO($cone);
	$perdida = new perdida_paciente();	
	$idOculto=$cone->test_input($idOculto);
	$perdida->ID_CONTROL =$cone->test_input($idOculto);
	$perdida->FALLECE_SEGUIMIENTO= $cone->test_input($fallece);
	$perdida->ID_LUGAR_FALLECE= $cone->test_input($fallece_si_lugar);
	$perdida->FECHA_FALLECE= $cone->test_input($fecha_fallecimiento);
	$perdida->EDAD_FELLECE_AGNOS= $cone->test_input($edad_fallecimiento_anios);
	$perdida->EDAD_FELLECE_MESES=  $cone->test_input($edad_fallecimiento_meses);
	$perdida->OBSERVACIONES=  $cone->test_input($fallecimiento_observaciones);
	$perdida->ID_PERDIDA_PACIENTE= $cone->test_input($perdida_paciente);
	$perdida->ID_CAUSA_PERDIDA=  $cone->test_input($perdida_causa);
	 
	$idOculto=$cone->test_input($idOculto);
	$idNeocosur=$cone->test_input($idNeocosur);
	$datos = $dao->buscarId($idOculto);

		if($datos==null )
		{
			$dao->guarda($perdida); 
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=perdida&message='.$message.'#perdida");
					</script>';
		}
		else
		{
			$dao->actualizar($perdida);

			 echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=perdida&message='.$message.'#perdida");
					</script>';
			
		}
	
		
}
