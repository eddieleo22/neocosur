<?php 
session_start();
if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include 'capaDAO/centroDAO.php';
include 'capaEntidades/cirugia.php';
include 'capaDAO/cirugiaDAO.php';
include 'capaDAO/sepsisDAO.php';
include 'capaDAO/hospitalizacionDAO.php';
include 'ayuda.php';

include 'capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);



$id= $_GET['idCentro'];
$id= $filtro->process($id);
$var= $_GET['estado'];
$var= $filtro->process($var);
//$id= $_GET['idCentro'];
//$var = $_GET['estado'];
echo "paso ";
$cone = new ConexionDAO();
$dao = new centroDAO($cone);
$daoCirugia=new cirugiaDAO($cone);
$daoSepsis=new sepsisDAO($cone);
$daoHosp=new hospitalizacionDAO($cone);

if($id!="" && $var!=""){
$id= $cone->test_input($id);
$var= $cone->test_input($var);

$dao->cambiarEstado($id,$var);
echo '<script type="text/javascript">
			window.location.assign("centros.php");
			</script>';

}			




$idCirugia = $_GET['idCirugia'];
$idCirugia = $filtro->process($idCirugia);
$idOculto = $_GET['idOculto'];
$idOculto = $filtro->process($idOculto);
$id_sepsis = $_GET['id_sepsis'];
$id_sepsis = $filtro->process($id_sepsis);
$idHospital = $_GET['idHospital'];
$idHospital = $filtro->process($idHospital);
$idNeocosur = $_GET['idNeocosur'];
$idNeocosur = $filtro->process($idNeocosur);
$idControl = $_GET['idControl'];
$idControl =$filtro->process($idControl);


if($idCirugia!='' ){
$idCirugia= $cone->test_input($idCirugia);
$idOculto= $cone->test_input($idOculto);
		
		$daoCirugia->eliminar($idCirugia);
		echo '<script type="text/javascript">
			window.location.assign("ficha_ingreso.php?id_neocosur='.$idOculto.'&url=evolucion#evolucion");
			</script>';
		
	}
	
	if($id_sepsis!='' ){		
	$id_sepsis= $cone->test_input($id_sepsis);
	$idOculto= $cone->test_input($idOculto);
		$daoSepsis->eliminar($id_sepsis);		
		echo '<script type="text/javascript">			
				window.location.assign("ficha_ingreso.php?id_neocosur='.$idOculto.'&url=neonatales#neonatales");			
				</script>';	
	}	
	if($idHospital!='' )	{
		$idHospital= $cone->test_input($idHospital);
		$idNeocosur= $cone->test_input($idNeocosur);
		$idControl= $cone->test_input($idControl);
			$daoHosp->eliminar($idHospital);		
			echo '<script type="text/javascript">	
				window.location.assign("control.php?idNeocosur='.$idNeocosur.'&idControl='.$idControl.'&url=hospitalizacion#hospitalizacion");			
				</script>';			
	}
?>