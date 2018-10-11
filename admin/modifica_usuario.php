<?php 
error_reporting(0);
session_start();
include '../admin/capaDAO/ConexionDAO.php';
include 'capaDAO/usuarioDAO.php';
include 'capaEntidades/usuario.php';
include 'ayuda.php';


if($_SESSION['token']==''){
	salir($_SESSION["token"]);;
} 
$cone = new ConexionDAO();
$dao= new usuarioDAO($cone);
$usuario = new usuario();

$idUsuario= $cone->test_input($_GET['idUsuario']); 
//$idUsuario= $_GET['idUsuario']; 
$ar = $dao->buscarId($idUsuario);

if(!$ar){
salir($_SESSION["token"]);;
}
$nombres=$ar['us_nombres'];
$paterno=$ar['us_ape_paterno'];
$materno=$ar['us_ape_materno'];
$name=$ar['us_usuario'];
$pass=desencriptar($ar['us_password']);
$centro=$ar['us_id_centro'];
$cargo=$ar['us_id_perfil'];
//$estado=$ar[''];encriptar
$us_fecha_crea=$ar['us_fecha_crea'];
$us_fecha_modi=$ar['us_fecha_modi'];
$us_activo=$ar['us_activo'];
include 'head.php'; 

?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-12">
	        	<h1>Modificar Usuario</h1>
	      	</div>
		</div>

		<div id="tabs" class="row">
	      <div class="col-lg-12">
	        <ul class="nav nav-tabs" role="tablist">
	          <li role="presentation" class="active"><a href="#basicos" aria-controls="profile" role="tab" data-toggle="tab">Datos Básicos</a></li>
	          <li role="presentation"><a href="#permisos" aria-controls="permisos" role="tab" data-toggle="tab">Permisos</a></li>
	        </ul>
	      </div>
	      <div class="col-lg-12">
	        <div class="tab-content">
	          <div role="tabpanel" class="tab-pane active" id="basicos">
	            <?php include 'usuarios/basicos_d.php'; ?>
	          </div>

	          <div role="tabpanel" class="tab-pane" id="permisos">

	            <?php  include 'usuarios/permisos_d.php'; ?>
	          </div>

	        </div>
	      </div>
	    </div>
	</div>

<?php
  include 'footer.php';
?>
<!-- Inicio de JavaScript -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>

<script>
  $( "#tabs" ).tabs();
</script>

</body>
</html>