<?php

error_reporting(0);
include '../capaEntidades/hospitalizacion.php';
include '../capaDAO/hospitalizacionDAO.php';
include '../capaDAO/ConexionDAO.php'; 


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

$diagnostico_hospitalizacion=$diagnostico_hospitalizacion;
$hospitalizacion_o2 = $hospitalizacion_o2;
$hospitalizacion_o2 = $hospitalizacion_o2;
$hospitalizacion_ventilacion_noin=$hospitalizacion_ventilacion_noin;
$hospitalizacion_ventilacion_in=$hospitalizacion_ventilacion_in;
$hospitalizacion_ventilacion_in_seleccion=$hospitalizacion_ventilacion_in_seleccion;
$hospitalizacion_domicilario=$hospitalizacion_domicilario;
$hospitalizacion_02_in_seleccion=$hospitalizacion_02_in_seleccion;
$hospitalizacion_otro=$hospitalizacion_otro;
$fecha_hospitalizacion=$fecha_hospitalizacion;
$dias_hospitalizacion=$dias_hospitalizacion;
$anios_hospitalizacion=$anios_hospitalizacion;
$meses_hospitalizacion=$meses_hospitalizacion;


$daoHosp= new hospitalizacionDAO($cone);
$idOculto=$cone->test_input($idOculto);
$arr = $daoHosp->buscarObserId($idOculto);

for($i=1;$i< count($diagnostico_hospitalizacion);$i++) {
	
	$hospitalizacion= new hospitalizacion();
	$arreglo[0][$i]=$diagnostico_hospitalizacion[$i];
	if($i>=2){
		$arreglo[1][$i]=$hospitalizacion_o2[$i];
		$arreglo[2][$i]=$hospitalizacion_ventilacion_noin[$i];
		$arreglo[3][$i]=$hospitalizacion_ventilacion_in[$i];
		$arreglo[5][$i]=$hospitalizacion_domicilario[$i];
	}
	else {
		$arreglo[1][$i]=$hospitalizacion_o2[0];
		$arreglo[2][$i]=$hospitalizacion_ventilacion_noin[0];
		$arreglo[3][$i]=$hospitalizacion_ventilacion_in[0];
		$arreglo[5][$i]=$hospitalizacion_domicilario[0];
	}
	
	
	
	$arreglo[4][$i]=$hospitalizacion_ventilacion_in_seleccion[$i];
	
	$arreglo[6][$i]=$hospitalizacion_02_in_seleccion[$i];
	$arreglo[7][$i]=$hospitalizacion_otro[$i];
	$arreglo[8][$i]=$fecha_hospitalizacion[$i];
	$arreglo[9][$i]=$dias_hospitalizacion[$i];
	$arreglo[10][$i]=$anios_hospitalizacion[$i];
	$arreglo[11][$i]=$meses_hospitalizacion[$i];
	
	$hospitalizacion->ID_CONTROL=$cone->test_input($idOculto);
	$hospitalizacion->ID_DIAGNOSTICO=$cone->test_input($arreglo[0][$i]);
	$hospitalizacion->DIAG_O2= $cone->test_input($arreglo[1][$i]);
	$hospitalizacion->DIAG_NO_INVASIVA=$cone->test_input($arreglo[2][$i]);
	$hospitalizacion->DIAG_INVASIVA=$cone->test_input($arreglo[3][$i]);
	$hospitalizacion->DIAG_INVASIVA_ID=$cone->test_input($arreglo[4][$i]);
	$hospitalizacion->DIAG_O2_DOMICILIO=$cone->test_input($arreglo[5][$i]);
	$hospitalizacion->DIAG_O2_DOMICILIO_ID=$cone->test_input($arreglo[6][$i]);
	$hospitalizacion->DIAG_CUAL=$cone->test_input($arreglo[7][$i]);
	$hospitalizacion->FECHA=$cone->test_input($arreglo[8][$i]);
	$hospitalizacion->DIA=$cone->test_input($arreglo[9][$i]);
	$hospitalizacion->EDAD_AGNOS=$cone->test_input($arreglo[10][$i]);
	$hospitalizacion->EDAD_MESES=$cone->test_input($arreglo[11][$i]);
	
	
	$daoHosp->guarda($hospitalizacion);
	
}
//die;
$existe=$cone->test_input($arr["ID_CONTROL"]);
$idNeocosur=$cone->test_input($idNeocosur);
$idOculto=$cone->test_input($idOculto);
$hospital= new hospitalizacion();
	if ($existe==''){
		$hospital->ID_CONTROL=$cone->test_input($idOculto);
		$hospital->OBSERVACIONES=$cone->test_input($observaciones_hospitalizaciones);
		$daoHosp->guardaObser($hospital);
		echo '<script type="text/javascript">
				window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=hospitalizacion&message='.$message.'#hospitalizacion");
				</script>'; 
	}
	else {
		$hospital->ID_CONTROL=$cone->test_input($idOculto);
		$hospital->OBSERVACIONES=$cone->test_input($observaciones_hospitalizaciones);
		$daoHosp->actualizarObser($hospital);
		//$id =$dao->getId();   
		echo '<script type="text/javascript">
				window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=hospitalizacion&message='.$message.'#hospitalizacion");
				</script>';   
	}	
		
}
