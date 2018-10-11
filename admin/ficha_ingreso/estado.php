<?php
session_start();
include 'capaDAO/estadoDAO.php';
//echo "paso";
$dao = new estadoDAO($cone);

//echo "id--->".$id;
//$dao->buscarId($id);
$ar = $dao->buscarId($id);

$ID_NEOCOSUR =	$idOculto;
$estado_ficha = $ar['ESTADO_FICHA'];
$cambiar_estado = $ar['cambiar_estado'];
$nombreEstado = $ar['nombreEstado']; 
?>

<script>
function cambiar(){
    var select = document.getElementById("cambiar_estado"), //El <select>
        value = select.value, //El valor seleccionado
        text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
		document.getElementById("nombreEstado").value=text;
		//alert("text"+text);
}
</script>
<div class="ficha panel panel-default">
  	<div class="panel-body">
	  	<form action="Negocio/EstadoBO.php" method="post">
	  		<button class="btn btn-success active subtitulo" type="button" ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Estado de Ficha</button>

	    	<div id="informacion_alta">

				<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="estado_ficha" class="col-lg-6 control-label">Estado de Ficha</label>
						<div class="col-lg-6">
					       	<input type="text" name="nombreEstado" id ="nombreEstado" value="<?php echo $nombreEstado; ?>" class="form-control input-sm" readonly>
					    </div>
					    <label for="estado_ficha" class="col-lg-6 control-label">Cambio de Estado</label>
						<div class="col-lg-6">
							<select name="cambiar_estado"  onchange="cambiar()" class="form-control input-sm" id="cambiar_estado">
								<option value="">Seleccione</option>
								
				               	<?php cargarEstados( $cone,$estado_ficha,$perfil);?>
				               	<?php //cargarEstados("condicion_ingreso",$cone,"ID_CONDICION_INGRESO","ESTADO_FICHA",$estado_ficha);?>
				            </select>
						</div> 
						<label for="estado_ficha" class="col-lg-6 control-label">Responsable</label>
						<div class="col-lg-6">
					       	<input type="text" name="responsable" id ="responsable" value="<?php echo $_SESSION['usuario']; ?>" class="form-control input-sm" readonly>
					    </div>
						
					</div>

				</div>

	    	</div>

	   		<div class=" col-lg-offset-10 col-lg-2">
                        <input type="hidden" name="idOculto" id="idOculto" value="<?php echo $id; ?>"/> 
						<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
	          	<button type="submit" class="btn btn-success" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
	        </div> 

	    </form>
	</div>
</div>