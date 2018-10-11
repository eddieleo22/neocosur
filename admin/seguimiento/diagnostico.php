<div class="ficha panel panel-default">
  	<div class="panel-body">
    	<form>
     		<button class="btn btn-success active subtitulo" type="button" id="diagnostico"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Diagnóstico en esta Evaluación</button>

     		<div class="row" id="sec_diagnostico">
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Calificación nutricional</label>
     					<div class="col-lg-8">
     						<select class="form-control input-sm col-lg-12">
     							<option value="0"></option>
     							<option value="1">Opción</option>
     						</select>
     					</div>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Desarrollo psicomotor</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="desarrollo_psicomotor" value=""> Normal
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="desarrollo_psicomotor" value=""> Anormal
				            </label>
     					</div>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Observaciones</label>
     					<div class="col-lg-8">
     						<textarea class="form-control col-lg-12" rows="3" name="" ></textarea>
     					</div>
     				</div>
     			</div>

     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-12">Plan</label>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Interconsulta</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="interconsulta" value="si"> Sí
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="interconsulta" value="no"> No
				            </label>
     					</div>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Exámenes</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="examenes" value="si"> Sí
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="examenes" value="no"> No
				            </label>
     					</div>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Indicaciones</label>
     					<div class="col-lg-8">
     						<textarea class="form-control col-lg-12" rows="3" name="" ></textarea>
     					</div>
     				</div>
     			</div>
   				
     		</div>
               <div class=" col-lg-offset-10 col-lg-2">
			   <input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
                    <button type="submit" class="btn btn-success">Guardar</button>
               </div> 
  		</form>
	</div>
</div>

     