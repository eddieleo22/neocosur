<?php
error_reporting(0);
include '../capaDAO/ConexionDAO.php';
include '../capaEntidades/alimentacion.php'; 
include '../capaDAO/alimentacionDAO.php';
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

			$dao =  new alimentacionDAO($cone);
			$alimentacion = new alimentacion();
			$alimentacion->ID_CONTROL=$cone->test_input($idOculto);	
			$alimentacion->ID_ALIMENTACION_LACTEA=$cone->test_input($lactea);
			$alimentacion->ID_FORMULA_UTILIZADA=$cone->test_input($formula);
			$alimentacion->EDAD_INTRODUCCION_SOLIDO_AGNO=$cone->test_input($anios);
			$alimentacion->EDAD_INTRODUCCION_SOLIDO_MESES=$cone->test_input($meses);


			$idOculto = $cone->test_input($idOculto);	
			$datos = $dao->buscarId($idOculto);
			if($datos==null )
			{
				$dao->guarda($alimentacion);
				echo '<script type="text/javascript">
						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=alimentacion&message='.$message.'#alimentacion");
						</script>';
				
			}
			else
			{
				$dao->actualizar($alimentacion);
				echo '<script type="text/javascript">
						window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=alimentacion&message='.$message.'#alimentacion");
						</script>';
				
			}
}

