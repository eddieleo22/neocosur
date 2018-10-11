<?php
error_reporting(0);
include 'capaDAO/perdida_pacienteDAO.php';

$dao = new perdida_pacienteDAO($cone);
$fila = $dao->buscarId($idControl) ;
$idOculto = $fila['ID_CONTROL'];
$fallece = $fila['FALLECE_SEGUIMIENTO'];
$fallece_si_lugar = $fila['ID_LUGAR_FALLECE'];
$fecha_fallecimiento=$fila['FECHA_FALLECE'];
$edad_fallecimiento_anios=$fila['EDAD_FELLECE_AGNOS'];
$edad_fallecimiento_meses = $fila['EDAD_FELLECE_MESES']; 
$fallecimiento_observaciones=$fila['OBSERVACIONES'];
$perdida_paciente=$fila['PERDIDA_PACIENTE']; 
$perdida_causa =$fila['ID_CAUSA_PERDIDA']; 


?>

<div class="ficha panel panel-default">
  	<div class="panel-body">
    	<form action="Negocio/perdidaBO.php" method="post" >
     		<button class="btn btn-success active subtitulo" type="button" id="perdida"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Perdidad del Paciente</button>

     		<div class="row" id="sec_perdida">
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Fallece durante el seguimiento</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="fallece" value="1" <?php si($fallece );?> id="fallece_si"> Sí
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="fallece" value="0" <?php no($fallece );?> id="fallece_no"> No
				            </label>
     					</div>
     				</div>
     				<div id="sec_fallece_si" class="sub-form col-lg-6">
     					<div class="form-group">
     						<label class="control-label col-lg-4">Lugar donde fallece</label>
     						<div class="col-lg-8">
     							<select class="form-control input-sm" name="fallece_si_lugar" >
     								<option value="0">Seleccione</option>
     								<?php cargarSelect("fallece_segui_param",$cone,"id_fallece_segui_param","descripcion",$fallece_si_lugar);?>
     							</select>
     						</div>
     					</div>

     					<div class="form-group">
     						<label class="control-label col-lg-4">Fecha</label>
     						<div class="col-lg-8">
     							<input type="date" name="fecha_fallecimiento" value="<?php echo $fecha_fallecimiento; ?>" class="form-control input-sm">
     						</div>
     					</div>
     					<div class="form-group">
     						<label class="control-label col-lg-4">Edad al momento de fallecer</label>
     						<div class="col-lg-8">
     							<div class="col-lg-5 input-group linea">
		                            <input type="number" min="0" step="1" name="edad_fallecimiento_anios"  value="<?php echo $edad_fallecimiento_anios; ?>"  class="form-control input-sm" aria-describedby="basic-addon2">
		                            <span class="input-group-addon" id="basic-addon2">años</span>
		                         </div>
		                         <div class="col-lg-5 input-group linea">
		                            <input type="number" min="0" max="11" step="1" name="edad_fallecimiento_meses" value="<?php echo $edad_fallecimiento_meses; ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		                            <span class="input-group-addon" id="basic-addon2">meses</span>
		                        </div>
		                        <div class="col-lg-12">
		                        	<p>(EC hasta 2 años)</p>
		                        </div>
     						</div>
     					</div>
     					<div class="form-group">
     						<label class="control-label col-lg-4">Observaciones</label>
     						<div class="col-lg-8">
     							<textarea class="form-control col-lg-12" rows="3" name="fallecimiento_observaciones" ><?php echo $fallecimiento_observaciones; ?></textarea>
     						</div>
     					</div>
     				</div>
     			</div>

     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Pérdida del Paciente
						<span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Se considerará luego de un año de inasistencia."></span>
						</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="perdida_paciente" value="1" <?php si($perdida_paciente); ?> id="perdida_si"> Sí
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="perdida_paciente" value="0" <?php no($perdida_paciente); ?>id="perdida_no"> No
				            </label>
     					</div>
     				</div>
     				<div id="sec_perdida_si" class="col-lg-6 sub-form">
     					<div class="form-group">
     						<label class="control-label col-lg-4">Causa</label>
     						<div class="col-lg-8">
     							<select class="form-control input-sm" name="perdida_causa" >
     								<option value="0">Seleccione</option>
     								<?php cargarSelect("perdida_segui_param",$cone,"id_perdida_segui_param","descripcion",$perdida_causa);?>
     							</select>
     						</div>
     					</div>
     				</div>
     			</div>
   				
     		</div>
     		<div class=" col-lg-offset-10 col-lg-2">
			<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
				<input type="hidden" name="idOculto" id="idOculto" value="<?= $idControl; ?>"/> 
				<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
				<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      			<button type="submit" class="btn btn-success">Guardar</button>
    		</div> 
  		</form>
	</div>
</div>

     