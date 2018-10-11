<div class="ficha panel panel-default">
  	<div class="panel-body">
    	<form>
     		<button class="btn btn-success active subtitulo" type="button" id="ficha"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Datos de Ficha</button>

     		<div class="row" id="sec_ficha">
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Responsable ingreso de datos</label>
     					<div class="col-lg-8">
     						<input type="text" name="responsable" class="form-control input-sm" value="<?php echo  $_SESSION["usuario"]; ?>" readonly="readonly">
     						
     					</div>
     				</div>
     			</div>   				
     		</div>
     		<div class=" col-lg-offset-10 col-lg-2">
			<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      			<button type="submit" class="btn btn-success">Guardar</button>
				<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
    		</div> 
  		</form>
	</div>
</div>

     