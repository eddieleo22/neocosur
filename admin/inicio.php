<?php 

include 'head.php'; 
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaEntidades/UserValidate.php';
include 'capaDAO/centroDAO.php';
include 'ayuda.php';
session_start();


if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}
$user = UserValidate::get_instanceUserValidate();
$cone = new ConexionDAO(); 
$dao= new centroDAO($cone);
$centro= $_SESSION["centro"];

if($_SESSION["perfil"]=='Colaborador'){
$fila = $dao->alertaColab($centro);
$var = " and c.c_id_centro =".$_SESSION["id_centro"];

}
else {
	//var_dump($dao);
$var = " ";
$fila=$dao->alertaAdmin(); 
}

$completa =$dao->completa($var);
$totalCompleta = $completa['total'];
$centroActuali= $dao->centroActu() =="" ? "0":  $dao->centroActu();
$total = $dao->completaTotal();
$totalReabierto = $dao->reAbierto();

 ?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-12">
	        	<h2>Alertas</h2>
	      	</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h4>Tabla Resumen de Casos Ingresados</h4>
				<div class="row col-lg-6">
					<table class="table table-striped table-bordered col-lg-12">
						<thead>
							<tr style="text-align: center;" class="success">
								<td class="col-lg-5"><h5><b>Fichas</b></h5></td>
								<td class="col-lg-5"><h5><b>Cantidad</b></h5></td>
							</tr>
						</thead>
						<tbody>
							<tr style="text-align: center;">
								<td><label class="control-label">Caso Nuevo </label></td>
								<td ><?php echo $fila['Caso Nuevo']!='' ? $fila['Caso Nuevo'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">Datos Incompletos</label></td>
								<td><?php echo $fila['Datos Incompletos']!='' ? $fila['Datos Incompletos'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">Digitación completa</label></td>
								<td><?php echo $fila['Digitación completa']!='' ? $fila['Digitación completa'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">Caso Cerrado</label></td> 
								<td><?php echo $fila['Caso Cerrado']!='' ? $fila['Caso Cerrado'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">En revisión</label></td>
								<td><?php echo $fila['En revision']!='' ? $fila['En revision'] : '0';?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">Eliminado</label></td>
								<td><?php echo $fila['Eliminado']!='' ? $fila['Eliminado'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;">
								<td><label class="control-label">Caso Reabierto</label></td>
								<td><?php echo $fila['Caso Reabierto']!='' ? $fila['Caso Reabierto'] : '0'; ?></td>
							</tr>
							<tr style="text-align: center;" class="info">
								<td><label class="control-label">Total ingresados</label></td>
								<td><?php echo $fila['total']!='' ? $fila['total'] : '0';?></td>
							</tr>
						</tbody>
					</table>
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
  
</script>

</body>
</html>