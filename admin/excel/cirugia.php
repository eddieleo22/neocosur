
<div class="ficha panel panel-default">
  <div class="panel-body">
		<!-- Inicio del Contenido -->
		<form id="excelCentro" method="post" action="excel/excel_centro/descarga_cirugia.php" >
		<div class="panel-body">
		 <div class="row">
	      	<div class="col-lg-3">
			<h4>Fecha de nacimiento	</h4>	        				
	      	</div>
			<div class="col-lg-2">
			<span class="input-group-addon" id="basic-addon2">desde</span>
	        <input type="date" min="1" step="1" id="fecha_desde_cirugia" name="fecha_desde_cirugia" class="form-control input-sm">
            	
	      	</div>
			<div class="col-lg-2">
			<span class="input-group-addon" id="basic-addon2">hasta</span>
	        	<input type="date" min="1" step="1" id="fecha_hasta_cirugia" name="fecha_hasta_cirugia" class="form-control input-sm">
            	
	      	</div>
			<div class="col-lg-2">
	        	<select name="periodosCirugia" id="periodosCirugia" class="form-control input-sm">
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
				<br><br>
				<div class="row col-lg-6">
					<table class="table table-striped table-bordered col-lg-12">
						<thead>
							<tr style="text-align: center;" class="success">
								<td colspan="2"><h5><b>Centros</b></h5></td>
							</tr>
						</thead>
						<tbody>
						<tr>
						<td>
						<label><input type="checkbox" id="checkTodosCirugia" class="detalle_alveolar_cirugia" /> Marcar/Desmarcar Todos</label>
						</td>
						</tr>
							<?php
							while($arrN = $arCirugia->fetch_array())
								{
							?>
							<tr style="text-align: left;">
								<td>
								<input type="checkbox" name="nombre[]" value="<?php echo $arrN["c_id_centro"]; ?>" class="detalle_alveolar_cirugia" >
								<label class="control-label"><?php echo utf8_encode($arrN["c_nombre"]); ?></label>
								
								</td>
								
							</tr>
							<?php 
								}
							?>
							
						</tbody>
					</table>
				</div>

				<div class="row col-lg-5 col-lg-offset-1">
					<div class="alert alert-info" role="alert">
  						<input type="checkbox" name="cirugia" value="1" class="detalle_alveolar" >
						Cirugía 	
  					</div>

				</div>
			</div>
		</div>
	</div>
	</form>
  </div>
</div>

<!-- Inicio de JavaScript -->


<script>
$('document').ready(function(){
   $("#checkTodosCirugia").change(function () {
      //$("input:checkbox").prop('checked', $(this).prop("checked"));
	 $("input[class='detalle_alveolar_cirugia']").prop('checked', $(this).prop("checked"));
	 // $('nombre.detalle_alveolar_ingreso').prop('checked', $(this).prop("checked"));
     //$('input[name*=nombre').prop('checked', $(this).prop("checked"));
  });
});
$(document).ready(function(){
    $('#periodosCirugia').change(function () {
        var fecha_desde = new Date();
        var fecha_hasta = new Date();
		
        switch($(this).val()){
            case '1':
                //Año en curso
                $('#fecha_desde_cirugia').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_cirugia').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '2':
                //ultimos dos años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-2);
                $('#fecha_desde_cirugia').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_cirugia').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '5':
                //ultimos cinco años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-5);
                $('#fecha_desde_cirugia').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_cirugia').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '10':
                //ultimos diez años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-10);
                $('#fecha_desde_cirugia').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta_cirugia').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '0':
                //Todos
                $('#fecha_desde_cirugia').val(''); 
                $('#fecha_hasta_cirugia').val('');
                break;
        }
        
    });
});
</script>
