<?php 
session_start();
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/centroDAO.php';
include 'ayuda.php';

if($_SESSION["perfil"]=="Colaborador"){
	$filtro ="  and c_id_centro = ".$_SESSION["id_centro"];
}
else {
	$filtro ="";
}


$cone = new ConexionDAO();
$dao= new centroDAO($cone);
$arr= $dao->listar($filtro);
$arIngreso=$dao->listar($filtro);
$arSegui=$dao->listar($filtro);
$arCentro =$dao->listar($filtro);
$arSepsis =$dao->listar($filtro);
$arCirugia =$dao->listar($filtro);
$arHospital =$dao->listar($filtro);
include 'head.php'; 

?>

<div class="container">
  <!-- Inicio del Contenido -->
     <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">

      <div class="col-lg-10">
        <h2>Descarga Excel</h2>

      </div>

    </div>

    <div id="tabs" class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
		
          <li role="presentation" class="active" >
            <a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">
              Ingreso
            </a>
          </li>
		 
		  <li role="presentation"  >
            <a href="#seguimiento" aria-controls="profile" role="tab" data-toggle="tab">
              Seguimiento
            </a>
          </li>
          <li role="centro" >
            <a href="#centro" aria-controls="profile" role="tab" data-toggle="tab">
              Centro
            </a>
          </li>
          <li role="cirugia" >
            <a href="#cirugia" aria-controls="profile" role="tab" data-toggle="tab">
              Cirugía
            </a>
          </li>
		<li role="sepsis" >
            <a href="#sepsis" aria-controls="profile" role="tab" data-toggle="tab">
              Sepsis
            </a>
        </li>
		<li role="hospital" >
            <a href="#hospital" aria-controls="profile" role="tab" data-toggle="tab">
              Hospitalización
            </a>
        </li>
        </ul>
      </div>
      <div class="col-lg-12">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="ingreso">
            <?php include 'excel/ingreso.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="seguimiento">
            <?php include 'excel/seguimiento.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="centro">
            <?php include 'excel/centro.php'; ?>
          </div>
		 <div role="tabpanel" class="tab-pane" id="cirugia">
            <?php include 'excel/cirugia.php'; ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="sepsis">
            <?php include 'excel/sepsis.php'; ?>
          </div>
		  <div role="tabpanel" class="tab-pane" id="hospital">
            <?php include 'excel/hospital.php'; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del Contenido -->  
</div>    

<?php
  include 'footer.php';
?>     
<!-- Inicio de JavaScript -->



<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>
<script src="../js/admin/seguimiento.js"></script>
<script src="../js/admin/ficha_ingreso.js"></script>
<script src="../js/neocosur.js"></script>
<script>
  $( "#tabs" ).tabs();
  $('[data-toggle="tooltip"]').tooltip();
  
  </script>

  