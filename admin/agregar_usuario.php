<?php 
session_start();
error_reporting(0);
include 'ayuda.php';
include '../admin/capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();
include 'head.php';


if($_SESSION['token']==''){
	salir($_SESSION["token"]);;
} 

 ?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-12">
	        	<h2>Usuario</h2>
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
	            <?php include 'usuarios/basicos.php'; ?>
	          </div>

	          <div role="tabpanel" class="tab-pane" id="permisos">

	            <?php  include 'usuarios/permisos.php'; ?>
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