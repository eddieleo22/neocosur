<?php
session_start();
include 'head.php'; 
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include 'capaDAO/centroDAO.php';
include 'ayuda.php';


$cone = new ConexionDAO();
$dao = new centroDAO($cone);

if($_SESSION['id_responsable']==''){
	salir();
}

$centros= "";



?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-10">
	        	<h2>Mantenedor de Centros</h2>
	      	</div>
			<div class="col-lg-2">
				<div class="btn-group" role="group" aria-label="">
				  	<a class="btn btn-warning btn-sm" href="nuevo_centro.php" role="button">
				  		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Nuevo Centro
				  	</a>
				</div>
			</div>
		</div>

		<div class="row">
			<table id="tbl_centros" class="display" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Código Centro</th>
		                <th>Nombre</th>
		                <th>País</th>
		                <th>Servicio</th>
		                <th>Seguimiento</th>
		                <th>Caso nuevo</th>
		                <th>Datos incompletos</th>
		                <th>En revisión</th>
		                <th>Caso cerrado</th>
		                <th>Eliminado</th>
		                <th>Total</th>
		                <th>Fichas</th>
		                <th>Acciones</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>Código Centro</th>
		                <th>Nombre</th>
		                <th>País</th>
		                <th>Servicio</th>
		                <th>Seguimiento</th>
		                <th>Caso nuevo</th>
		                <th>Datos incompletos</th>
		                <th>En revisión</th>
		                <th>Caso cerrado</th>
		                <th>Eliminado</th>
		                <th>Total</th>
		                <th>Fichas</th>
		                <th>Acciones</th>
		            </tr>
		        </tfoot>
		        <tbody>
              <?php
					$arN=$dao->rescataNombre();
					
					while($arrN = $arN->fetch_array())
					 {
						 
						$arC=$dao->tablaResumen($arrN['c_nombre']);
						
						?> 
						<tr>
						<td><?php echo $arrN['c_cod_centro']?> </td>
						<td><?php echo utf8_encode($arrN['c_nombre'])?></td>
		                <td><?php echo $arrN['descripcion']?></td>
		                <td><?php echo ($arrN['c_tipo']!=''|| $arrN['c_tipo']!='null') && $arrN['c_tipo']=='1'? 'Privado':'Público' ; ?></td>
		                <td>Si</td>
		                <td><?php echo $arC!=null ? $arC['Caso Cerrado']:0;  ?></td>
		                <td><?php echo $arC!=null ? $arC['Datos Incompletos']:0; ?></td>
		                <td><?php echo $arC!=null ? $arC['Caso Cerrado']:0; ?></td>
		                <td><?php echo $arC!=null ? $arC['En revision']:0;; ?></td>
		                <td><?php echo $arC!=null ? $arC['Eliminado']:0; ?></td>
						<td><?php echo $arC!=null ? $arC['total']:0; ?></td>
		                <td><a href="#">Ir a las fichas</a></td>
		                <td>
		                	<a class="btn btn-warning btn-xs" href="centro.php?idCentro=<?php echo $arrN['c_id_centro'];  ?>" role="button" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
		                	<?php 
							$idCentro=$arrN['c_id_centro'];
							$estado = $arrN['c_activo'];
								if($estado==0){
									echo '<a class="btn btn-success btn-xs" href="regCentros.php?idCentro='.$idCentro.'&estado=1" role="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>';
								}
								else{
									echo '<a class="btn btn-danger btn-xs"  href="regCentros.php?idCentro='.$idCentro.'&estado=0" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
								}
							?>
							
							
							
							
		                </td>
		            </tr>
					<?php
					}
					?>
		            
		        </tbody>
		    </table>
		</div>
	</div>
<br><br><br>
<?php
  include 'footer.php';
?>
<!-- Inicio de JavaScript -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>
<script src="../js/data_table.min.js"></script>
<script src="../js/data_table_button.js"></script>
<script src="../js/jjszip.min.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/data_table_print.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

    	$('#tbl_centros').DataTable({
	    	dom: 'Bfrtip',
	        buttons: [
	            'excelHtml5',
	            'print'
	        ]
		});

		$('#tbl_centros tbody').on( 'click', 'tr .centro', function () {
	       	var id = $(this).parent().prop('id');
	       	window.location.href = "centro.php?id=" + id;
	    } );

	    

	} );
	function estado(id){
		   alert("Debe cambiar estado del centro. Id: " + id);
		};
</script>

</body>
</html>