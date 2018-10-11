<?php
error_reporting(0);
include '../capaEntidades/estado_ficha.php'; 
include '../capaDAO/estadoDAO.php';
include '../capaDAO/ConexionDAO.php';
include '../capaEntidades/ingreso.php';
include '../capaDAO/IngresoDAO.php';
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

		$dao = new estadoDAO($cone);
		$daoIngreso =  new IngresoDAO($cone);

		$idOculto =$cone->test_input($idOculto);

		$arr = $dao->buscarId($idOculto);// la entidad ni la base de datos no tiene id_neocusur
		$id_est = $arr["ID_NEOCOSUR"];
		$p = $_POST;
		$ingreso = new ingreso();	
		$est = new estado_ficha();

		$est->nombreEstado = $cone->test_input($nombreEstado);
		$est->ESTADO_FICHA = $cone->test_input($cambiar_estado);
		$est->ID_NEOCOSUR = $cone->test_input($idOculto);

			if ($id_est==''){
				$dao->guarda($est);
				
				$ingreso->ID_NEOCOSUR=$cone->test_input($idOculto);
				$ingreso->ID_ESTADO_FICHA=$cone->test_input($cambiar_estado);
				$daoIngreso->actualizaEstado($ingreso);
				echo '<script type="text/javascript">
						window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=estado#estado");
						</script>';
			}
			else {
				$dao->actualizar($est);
				$id =$dao->getId(); 
				$ingreso->ID_NEOCOSUR=$cone->test_input($idOculto);
				$ingreso->ID_ESTADO_FICHA=$cone->test_input($cambiar_estado);
				$daoIngreso->actualizaEstado($ingreso);
				echo '<script type="text/javascript">
						window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=estado#estado");
						</script>';   
			}
}
		