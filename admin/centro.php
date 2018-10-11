<?php 
session_start();
include 'head.php'; 
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include 'capaDAO/centroDAO.php';
include 'ayuda.php';


include '../admin/capaEntidades/class.inputfilter.php';

$filtro = new InputFilter();
/*
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
*/
if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}
$cone = new ConexionDAO(); 
$dao= new centroDAO($cone);



$idCentro= isset($_GET['idCentro']) == '' ? '-1' : $cone->test_input($_GET['idCentro']); ;
//$idCentro=  $filtro->process($idCentro);

$ar=$dao->buscarId($idCentro);

$idOcultoCentro=$ar['c_id_centro'];
$fecha_creacion =$ar['c_fecha_crea'];
$nombre =$ar['c_nombre'];
$codigo =$ar['c_cod_centro'];
$pais =$ar['c_id_pais'];
$universidad =$ar['c_universidad'];
$tipo =$ar['c_tipo'];
$total_plazas=$ar['c_est_total_plaza'];
$total_partos =$ar['c_est_total_parto'];
$mortalidad_global =$ar['c_est_morta_neona'];
$plazas_uci =$ar['c_est_plaza_uci'];
$partos_menor =$ar['c_est_parto_1500'];
$mortalidad_menor =$ar['c_est_morta_1500'];
$ventilacion =$ar['c_re_frecuencia'];
$oxido =$ar['c_re_oxido'];
$cirugia_general =$ar['c_re_cir_general'];
$cirugia_cardiaca =$ar['c_re_cir_cardiaca'];
$seguimiento =$ar['c_seg_neo'];
$duracion_seguimiento =$ar['c_seg_dura'];
$estimados  =$ar['c_seg_nino']; 
$oftalmologo =$ar['c_seg_ofta'];
$otorrinolaringologo =$ar['c_seg_otorri'];
$neurologo =$ar['c_seg_neuro'];
$broncopulmonar =$ar['c_seg_bronco'];
$fonoaudiologo =$ar['c_seg_fono'];
$kinesiologo =$ar['c_seg_kine'];
$oxigeno_domicilio =$ar['c_seg_oxi'];
$c_fecha_mod_admin =$ar['c_fecha_mod_admin'];
$c_fecha_mod =$ar['c_fecha_mod'];

$url=$_GET['url'];
//$url=$filtro->process($url);;
if($url=='identificacion'){
	$identificacion = 'class="active"';
}
else if($url=='estadisticas'){
	$estadisticas = 'class="active"';
}
else if($url=='recursos'){
	$recursos = 'class="active"';
}
else if($url=='seguimiento'){
	$seguim = 'class="active"';
}

?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-12">
	        	<h2>Centro</h2>
	      	</div>
		</div>
		
		<input  type ="hidden" name="perfil"  value ="<?php echo $_SESSION["perfil"]; ?>">
		<input  type ="hidden" name="c_fecha_mod_admin"  value ="<?php echo $c_fecha_mod_admin; ?>">
		<input  type ="hidden" name="c_fecha_mod"  value ="<?php echo $c_fecha_mod; ?>">
		<div id="tabs" class="row">
	      <div class="col-lg-12">
	        <ul class="nav nav-tabs" role="tablist">
	          <li role="presentation" <?php echo $identificacion; ?> ><a href="#identificacion" aria-controls="profile" role="tab" data-toggle="tab">Identificación</a></li>
	          <li role="presentation" <?php echo $estadisticas; ?> ><a href="#estadisticas" aria-controls="profile" role="tab" data-toggle="tab">Estadísticas</a></li>
	          <li role="presentation" <?php echo $recursos; ?> ><a href="#recursos" aria-controls="messages" role="tab" data-toggle="tab">Recursos</a></li>
	          <li role="presentation" <?php echo $seguim; ?>  class="dinamico_fallece"><a href="#seguimiento" aria-controls="settings" role="tab" data-toggle="tab">Seguimiento</a></li>
	        </ul>
	      </div>
	      <div class="col-lg-12">
	        <div class="tab-content">
	          <div role="tabpanel" class="tab-pane active" id="identificacion">
	            <?php include 'centros/identificacion_d.php'; ?>
	          </div>

	          <div role="tabpanel" class="tab-pane" id="estadisticas">

	            <?php include 'centros/estadisticas_d.php'; ?>
	          </div>

	          <div role="tabpanel" class="tab-pane" id="recursos">
	            <?php include 'centros/recursos_d.php'; ?>
	          </div>

	          <div role="tabpanel" class="tab-pane" id="seguimiento">
	            <?php include 'centros/seguimiento_d.php'; ?>
	          </div>

	        </div>
	      </div>
		  <input type="hidden" name="idOculto" id="idoculto" value="<?php echo $idOcultoCentro ?>"/>
		  
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