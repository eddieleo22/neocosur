<?php
error_reporting(0);

require '../capaDAO/ConexionDAO.php';
include '../capaDAO/IngresoDAO.php';

include '../capaDAO/User.php';

include '../ayuda.php';

/*
include '../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
*/
//var_dump($_POST);
extract($_POST);

$cone = new ConexionDAO();
$dao = new IngresoDAO($cone);

$usuario ;
$password; 
$user = new User($usuario);
//$resp= $dao->login($usuario,$password);
//echo " <br> usuario --> ".$usuario;
//echo " <br> password --> ".$password;
$resp= $user->loginUser($usuario,$password,$cone);
//echo " <br> resp --> ".$resp;
	
// session_start();
//var_dump($_SESSION);

//die;
	if($resp>0){ 
		
		/*$_SESSION["pais"] = $resp['pais'];
		$_SESSION["centro"]=$resp['centro'];
		$_SESSION["perfil"] = $resp["perfil"];
		$_SESSION["id_responsable"]=$resp["id_responsable"];
		$_SESSION["id_centro"]=$resp["id_centro"];
		$_SESSION["usuario"]=$resp["usuario"]; */
		//$_SESSION["token"] = md5(uniqid(mt_rand(), true));


		if(trim($user->perfil) =="Estadistico"){
				echo '<script type="text/javascript"> 
				window.location.assign("../excel.php");
				</script>';
		}
		else {
			
		echo '<script type="text/javascript"> 
				window.location.assign("../inicio.php");
				</script>';
		}
	}
	else {
		echo '<script type="text/javascript"> 
				window.location.assign("../../vista/login.php");
				</script>';
		
}





