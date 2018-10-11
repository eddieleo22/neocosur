<?php
error_reporting(0);

require '../capaDAO/ConexionDAO.php';

include '../capaEntidades/ingreso.php';

include '../capaEntidades/informacion_alta.php';
include '../capaEntidades/estado_ficha.php';
//include '../capaEntidades/class.inputfilter.php';
include '../capaDAO/informacion_altaDAO.php';
include '../capaDAO/IngresoDAO.php';
include '../ayuda.php';
include '../capaDAO/estadoDAO.php';
/*
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$r=nulo($_POST);*/

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



		extract($_POST);

		$estadoINF = new estadoDAO($cone);
		$daoAlta = new informacion_altaDAO($cone);
		$idOculto=$cone->test_input($idOculto) ;
		if($idOculto!=""){
		$estadoR = $estadoINF->buscarId($idOculto);
		$estadoUpda = $estadoR['ESTADO_FICHA'];
		}
		$dao =  new IngresoDAO($cone);
		$alta =  new informacion_alta();
		$estado =  new estado_ficha();
		$ingreso = new ingreso();		
		$ingreso->NOMBRES=$cone->test_input($nombres) ;
		$ingreso->ID_CENTRO=$cone->test_input($id_centro) ;
		$ingreso->APELLIDO_PATERNO=$cone->test_input($paterno) ;
		$ingreso->APELLIDO_MATERNO=$cone->test_input($materno) ;
		$ingreso->FECHA_NACIMIENTO=$cone->test_input($fecha_nacimiento) ;
		$ingreso->NUMERO_FICHA_MEDICA=$cone->test_input($num_ficha) ;
		$ingreso->ID_RESPONSABLE_INGRESO_DATOS=$cone->test_input($idResponsable) ;

		$ingreso->FALLECE_SALA_PARTO='0' ;
		$ingreso->ID_GENERO=$cone->test_input($genero) ;
		$ingreso->ID_PRESENTACION=$cone->test_input($presentacion) ;
		$ingreso->ID_TIPO_PARTO=$cone->test_input($tipoParto) ;
		$ingreso->PESO_NACIMIENTO=$cone->test_input($peso) ;
		$ingreso->TALLA_NACIMIENTO=$cone->test_input($talla) ;
		$ingreso->CIRC_CRANEO_NACIMIENTO=$cone->test_input($craneo) ;
		$ingreso->APGAR_1=$cone->test_input($apgar1) ;
		$ingreso->APGAR_5=$cone->test_input($apgar5) ;
		$ingreso->EDAD_GESTACIONAL=$cone->test_input($edad_gest);
			if($idOculto==""){
				
					$ingreso->ID_ESTADO_FICHA='176';
					
					$dao->guarda($ingreso);

					$id =$dao->getId();
					$alta->ID_NEOCOSUR=$id;
					$daoAlta->guardaIngreso($alta);
					$estado->nombreEstado = $cone->test_input('Caso Nuevo');
					$estado->ESTADO_FICHA = $cone->test_input('176');
					$estado->ID_NEOCOSUR = $cone->test_input($id);
					$estadoINF->guarda($estado);
					
					echo '<script type="text/javascript">
						window.location.assign("../ficha_ingreso.php?id_neocosur='.$id.'");
						</script>';


			}
			else {

				$ingreso->ID_ESTADO_FICHA=$estadoUpda;
				
				$ingreso->ID_NEOCOSUR=$idOculto;
					
				
			  if ($dao->actualizar($ingreso)>0){
				
				
					echo '<script type="text/javascript">
						window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=ingreso#ingreso");
						</script>';
			   }
				
				
			}
}


?>