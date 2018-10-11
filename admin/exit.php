<?php

session_start();
//var_dump($_SESSION);
//echo "<br> rtoken qlo ".$_GET["token"];
//$_SESSION["token"]="95c31852217ed23d7952a396f5d29331" ;
 if (isset($_GET["token"]) && $_GET["token"] == $_SESSION["token"]) {
		session_unset();
		session_destroy();
		ob_start();
		ob_end_flush(); 
		echo '<script type="text/javascript"> 
			window.location.assign("../vista/login.php");
			</script>';
		header("location:../vista/login.php");
		
		//include '../vista/login.php';
		//include 'home.php';
		//exit();
 }
?>