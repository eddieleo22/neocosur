<?php 
session_start();
error_reporting(0);
include 'ayuda.php';
if($_SESSION["perfil"]=="Colaborador"){
	$filtro ="  and c_id_centro = ".$_SESSION["id_centro"];
}
else {
	$filtro ="";
}



include 'head.php'; 

?>

<div class="container">
  <!-- Inicio del Contenido -->
     <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">
      <div class="col-lg-10">
        <h2>Gráficos</h2>

      </div>

    </div>

    <div id="tabs" class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
		
          <li role="presentation" class="active" >
            <a href="#mortalidad" aria-controls="profile" role="tab" data-toggle="tab">
              Mortalidad
            </a>
          </li>
		 
		  <li role="presentation"  >
            <a href="#morbilidad" aria-controls="profile" role="tab" data-toggle="tab">
              Morbilidad
            </a>
          </li>
          <li role="centro" >
            <a href="#resumen" aria-controls="profile" role="tab" data-toggle="tab">
              Resumen por Condición
            </a>
          </li>
          
		
        </ul>
      </div>
      <div class="col-lg-12">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="mortalidad">
            <?php include 'graficos/mortalidad.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="morbilidad">
            <?php //include 'graficos/morbilidad.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="resumen">
            <?php //include 'graficos/resumen.php'; ?>
          </div>

          
        </div>
      </div>
    </div>
    <!-- Fin del Contenido -->  
</div>    

<?php
 // include 'footer.php';
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

  