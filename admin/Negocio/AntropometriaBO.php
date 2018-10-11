<?php
error_reporting(0);
include '../capaEntidades/antropometria.php'; 
include '../capaDAO/antropometriaDAO.php';
include '../capaDAO/ConexionDAO.php';
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

		$dao = new antropometriaDAO($cone);
		$arr = $dao->buscarId($idOculto);
		$existe = $arr["ID_NEOCOSUR"];


		$ant = new antropometria();
		$ant->ID_NEOCOSUR=$cone->test_input($idOculto);
		$ant->CIRC_CRANEO_28_DIAS=$cone->test_input($craneo_28);
		$ant->CIRC_CRANEO_36_SEM=$cone->test_input($craneo_36);
		$ant->CIRC_CRANEO_7_DIAS=$cone->test_input($craneo_7);
		$ant->CIRC_CRANEO_ALTA_DIAS=$cone->test_input($alta_craneo);
		$ant->EDAD_ALTA_DIAS=$cone->test_input($alta_dias);
		$ant->PESO_28_DIAS=$cone->test_input($pesos_28);
		$ant->PESO_36_SEM=$cone->test_input($pesos_36);
		$ant->PESO_7_DIAS=$cone->test_input($pesos_7);
		$ant->PESO_ALTA_DIAS=$cone->test_input($alta_peso);
		$ant->TALLA_28_DIAS=$cone->test_input($talla_28);
		$ant->TALLA_36_SEM=$cone->test_input($talla_36);
		$ant->TALLA_7_DIAS=$cone->test_input($talla_7);
		$ant->TALLA_ALTA_DIAS=$cone->test_input($alta_talla);
		$idOculto = $cone->test_input($idOculto);
		if ($existe==''){
			$dao->guarda($ant);
			
		   echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=antropometria#antropometria");
					</script>'; 
		}
		else {
			$dao->actualizar($ant);
		  
			echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=antropometria#antropometria");
					</script>';   
		}
}
