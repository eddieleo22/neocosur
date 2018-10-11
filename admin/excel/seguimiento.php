
<div class="ficha panel panel-default">
  <div class="panel-body">
		<!-- Inicio del Contenido -->
		
		<form id="excelSegui" method="post"  action="excel/excel_centro/descarga_seguimiento.php">
		<div class="panel-body">
		 <div class="row">
	      	<div class="col-lg-3">
			<h4>Fecha de nacimiento	</h4>	        				
	      	</div>
			<div class="col-lg-2">
			<span class="input-group-addon" id="basic-addon2">desde</span>
	        <input type="date" min="1" step="1" id="fecha_desde_segui" name="fecha_desde_segui" class="form-control input-sm">
            	
	      	</div>
			<div class="col-lg-2">
			<span class="input-group-addon" id="basic-addon2">hasta</span>
	        	<input type="date" min="1" step="1" id="fecha_hasta_segui" name="fecha_hasta_segui" class="form-control input-sm">
            	
	      	</div>
			<div class="col-lg-2">
	        	<select name="periodosSegui" id="periodosSegui" class="form-control input-sm">
	        		<option selected="selected">Seleccione</option>
					<option value="1">Año en curso</option>
					<option value="2">Últimos 2 años</option>
					<option value="5">Últimos 5 años</option>
					<option value="10">Últimos 10 años</option>
					<option value="0">Todos los años</option>
	        	</select>
	        </div>
			<div class="col-lg-3">
			<button type="submit" class="btn btn-success" >Descagar excel</button>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				
				<div class="row col-lg-4">
					<table class="table table-striped table-bordered col-lg-12">
						<thead>
							<tr style="text-align: center;" class="success">
								<td class="col-lg-10"><h5><b>Centros</b></h5></td>
							</tr>
						</thead>
						<tbody>
						<tr>
						<td>
						<label><input type="checkbox" id="checkTodosSeguimiento" class="detalle_alveolar_seguimiento" /> Marcar/Desmarcar Todos</label>
						</td>
						</tr>
							<?php
							while($arrN = $arSegui->fetch_array())
								{
							?>
							<tr style="text-align: left;">
								<td>
								<input type="checkbox" name="nombre[]" value="<?php echo $arrN["c_id_centro"]; ?>" class="detalle_alveolar_seguimiento" >
								<label class="control-label"><?php echo utf8_encode($arrN["c_nombre"]); ?></label>
								
								</td>
								
							</tr>
							<?php 
								}
							?>
							
						</tbody>
					</table>
				</div>

				<div class="row col-lg-8" >
					<table style="text-align: rigth; border-collapse: separate;border-spacing:  5px 15px;">
						
						<tbody>
							<tr style="text-align: center;">
							<td ></td>
							<td ></td>
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="ingreso" value="1" class="detalle_alveolar" >							
								Datos del Ingreso 						
								</td>	
							<td style="" ></td>
							<td style="border-spacing:  5px 15px;"></td>	
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="control" value="1" class="detalle_alveolar" >							
								Datos del Control 							
								</td>
							<td></td>
							<td></td>
								<td class="alert alert-info" role="alert">	
								<input type="checkbox" name="connatales" value="1" class="detalle_alveolar" >							
								 Antecedentes Connatales								
								</td>								
							</tr>
							<tr style="text-align: center;">
							<td ></td>
							<td ></td>
								<td class="alert alert-success" role="alert" >	
								<input type="checkbox" name="familiar" value="1" class="detalle_alveolar" >							
								Antecedentes Familiares Control Actual					
								</td>	
							<td style="" ></td>
							<td style="border-spacing:  5px 15px;"></td>	
								<td class="alert alert-success" role="alert" >	
								<input type="checkbox" name="antropometria" value="1" class="detalle_alveolar" >							
								Antropometría						
								</td>
							<td></td>
							<td></td>
								<td class="alert alert-success" role="alert">	
								<input type="checkbox" name="alimentacion" value="1" class="detalle_alveolar" >							
								Alimentación							
								</td>								
							</tr>
							<tr style="text-align: center;">
							<td ></td>
							<td ></td>
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="auditiva" value="1" class="detalle_alveolar" >							
								Función Auditiva							
								</td>	
							<td  ></td>
							<td ></td>	
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="visual" value="1" class="detalle_alveolar" >							
								 Función Visual					
								</td>
							<td></td>
							<td></td>
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="compromiso" value="1" class="detalle_alveolar" >							
								 Compromiso de Otros Sistemas							
								</td>								
							</tr>
							<tr >
							<td ></td>
							<td ></td>
								<td class="alert alert-success" role="alert" >	
								<input type="checkbox" name="neurodesarollo" value="1" class="detalle_alveolar" >							
								 Evaluación del Neurodesarrollo								
								</td>	
							<td ></td>
							<td ></td>	
								<td class="alert alert-success" role="alert" >	
								<input type="checkbox" name="vacunas" value="1" class="detalle_alveolar" >							
								 Vacunas							
								</td>
							<td></td>
							<!--td></td>
								<td class="alert alert-success" role="alert" >	
								<input type="checkbox" name="periodo" value="1" class="detalle_alveolar" >							
								 Hospitalizaciones del Período							
								</td>								
							</tr-->
							
							<tr >
							<td ></td>
							<td ></td>
								<td class="alert alert-info" role="alert" >	
								<input type="checkbox" name="paciente" value="1" class="detalle_alveolar" >							
								Pérdida del Paciente						
								</td>	
							<td ></td>
							<td ></td>	
								<td >	
								<!--  class="alert alert-info" role="alert"  input type="checkbox" name="ficha" value="1" class="detalle_alveolar" >							
								 Datos de Ficha							-->
								</td>
							<td></td>
							<td></td>
								<td  >	 						
								</td>								
							</tr>
							
							
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

<!-- Inicio de JavaScript -->

<script>
$('document').ready(function(){
   $("#checkTodosSeguimiento").change(function () {
      //$("input:checkbox").prop('checked', $(this).prop("checked"));
	 $("input[class='detalle_alveolar_seguimiento']").prop('checked', $(this).prop("checked"));
	 // $('nombre.detalle_alveolar_ingreso').prop('checked', $(this).prop("checked"));
     //$('input[name*=nombre').prop('checked', $(this).prop("checked"));
  });
});
$(document).ready(function(){
    $('#periodosSegui').change(function () {
        var fecha_desde = new Date();
        var fecha_hasta = new Date();
		
        switch($(this).val()){
            case '1':
                //Año en curso
                $('#fecha_desde_segui').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_segui').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '2':
                //ultimos dos años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-2);
                $('#fecha_desde_segui').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_segui').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '5':
                //ultimos cinco años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-5);
                $('#fecha_desde_segui').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_segui').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '10':
                //ultimos diez años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-10);
                $('#fecha_desde_segui').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_segui').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '0':
                //Todos
                $('#fecha_desde_segui').val('');
                $('#fecha_hasta_segui').val('');
                break;
        }
        
    });
});
</script>
