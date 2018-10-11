<?php
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/usuario.php';
include '../capaDAO/usuarioDAO.php';
include '../capaDAO/User.php';
include '../ayuda.php';

include '../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
/*$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);*/
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	session_start();
	/*
	echo "<br> _SESSION csrf -->> ".$_SESSION['csrf'];
	echo "<br> POST csrf -->> ".$_POST['csrf'];
	echo "<br> _SESSION csrf -->> ".$_SESSION['token'];
	*/
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
			
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
		
	
		extract($_POST);
	$name=$_POST['usuario'];
	$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
	$con = new ConexionDAO();
	$dao= new usuarioDAO($con);
	$usuario = new usuario();

	$user = new User($name); 
	$idUsuario= $con->test_input($idUsuario); 
	
		// $usuario->us_usuario= crearUsuario($nombres,$paterno); die;
	if( $idUsuario==''){
		$usuario->us_id_perfil= $con->test_input($cargo);
		$usuario->us_id_centro=$con->test_input($centro);
		$usuario->us_nombres=$con->test_input($nombres);
		$usuario->us_ape_paterno=$con->test_input($paterno);
		$usuario->us_ape_materno=$con->test_input($materno);
		//$usuario->us_usuario= $con->test_input($name);
		$usuario->us_usuario= crearUsuario($nombres,$paterno);
		$usuario->us_email='';
		$usuario->us_password=$con->test_input($pass);
		$usuario->us_fecha_crea=$con->test_input($fecha);
		$usuario->us_activo=$con->test_input($estado);


			
			$user->guarda($usuario);	
			//echo 
			$id =$user->getId();
			echo '<script type="text/javascript"> 
					window.location.assign("../modifica_usuario.php?idUsuario='.$id.'");
					</script>'; 
	}
	if(isset($_POST['basicos']) && $idUsuario!=''){
		
		$idUsuario= $con->test_input($idUsuario);
		$ar =$dao->buscarId($idUsuario);
		
		$usuario->us_id_user=$con->test_input($idUsuario);
		$usuario->us_nombres=$nombres;
		//$usuario->us_nombres=$con->test_input($nombres);
		$usuario->us_ape_paterno=$paterno;
		//$usuario->us_ape_paterno=$con->test_input($paterno);
		//$usuario->us_ape_materno=$con->test_input($materno);
		$usuario->us_ape_materno=$materno;
		//$usuario->us_usuario= crearUsuario($nombres,$paterno);;
		$usuario->us_usuario= $ar['us_usuario'];;
		$usuario->us_email='';
		$usuario->us_password=$pass;
		$usuario->us_fecha_modi=$con->test_input($fecha);	
		$usuario->us_id_perfil= $con->test_input($cargo);
		$usuario->us_id_centro=$con->test_input($centro);
		$usuario->us_activo=$con->test_input($estado);
		$user->actualizarBasico($usuario);
		//$dao->actualizarBasico($usuario);	

		echo '<script type="text/javascript"> 
					window.location.assign("../modifica_usuario.php?idUsuario='.$idUsuario.'");
					</script>'; 
	}

	if(isset($_POST['permi']) && $idUsuario!=''){

		$idUsuario= $con->test_input($idUsuario);
		$ar =$dao->buscarId($idUsuario);
		
		$usuario->us_id_user=$con->test_input($idUsuario);
		//$usuario->us_nombres=$con->test_input($nombres);
		$usuario->us_nombres=$nombres;
		$usuario->us_ape_paterno=$con->test_input($paterno);
		$usuario->us_ape_materno=$con->test_input($materno);
		$usuario->us_usuario= $ar['us_usuario'];;;
		$usuario->us_email='';
		$usuario->us_password=$con->test_input($pass);
		$usuario->us_fecha_modi=$con->test_input($fecha);	
		$usuario->us_id_perfil= $con->test_input($cargo);
		$usuario->us_id_centro=$con->test_input($centro);
		$usuario->us_activo=$con->test_input($estado); 	 	 	
		$dao->actualizarPermiso($usuario);	
		echo '<script type="text/javascript"> 
					window.location.assign("../modifica_usuario.php?idUsuario='.$idUsuario.'");
					</script>'; 
			
	}	
		
}

function crearUsuario($nombres,$apellidos){
	$numero=rand(100,999);
	//echo "<br>  numero--> ".$numero;
	//echo "<br>  nombres--> ".$nombres;
	$nombres = trim($nombres);
	$nombres = explode(" ", $nombres);
	$nombres = $nombres[0];
	$nombres = trim($nombres);
	$nombres =reemplazar($nombres);
	//echo "<br>   Replace nombres--> ".$nombres;
	//echo "<br>  nombres--> ".$nombres;
	$apellidos = trim($apellidos);
	$apellidos = explode(" ", $apellidos);
	$apellidos = $apellidos[0];
	$apellidos = trim($apellidos);
	$apellidos =reemplazar($apellidos);
	//echo "<br>   Replace nombres--> ".$nombres;
	
	$str = $nombres.".".$apellidos.$numero;
	$str = strtolower($str);
	//echo "<br> #########  USER --> ".$str."  ######### ";
	return $str;
	
}

function reemplazar($str){
	
	$str = trim($str);
	$str = str_ireplace("á","a",$str);
	$str = str_ireplace("Á","A",$str);
	$str = str_ireplace("é","e",$str);
	$str = str_ireplace("É","E",$str);
	$str = str_ireplace("í","i",$str);
	$str = str_ireplace("Í","I",$str);
	$str = str_ireplace("ó","o",$str);
	$str = str_ireplace("Ó","O",$str);
	$str = str_ireplace("ú","u",$str);
	$str = str_ireplace("Ú","U",$str);
	$str = str_ireplace("ñ","n",$str);
	$str = str_ireplace("Ñ","N",$str);
	$str = str_ireplace("'","",$str);
	$str = str_ireplace("´","",$str);
	$str = str_ireplace("_","",$str);
	
	return $str;
	
}
?>