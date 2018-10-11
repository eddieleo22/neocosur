<div class="ficha panel panel-default">
  <div class="panel-body">
 
    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Estadísticas</h4>

    <div class="col-lg-6">
    
      <div class="form-group">
        <label for="total_plazas" class="col-lg-7 control-label">Número total de plazas</label>
        <div class="col-lg-5">
          <input type="number" name="total_plazas" value="" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group">
        <label for="total_partos" class="col-lg-7 control-label">Total de partos</label>
        <div class="col-lg-5">
          <input type="number" name="total_partos" value="" class="form-control input-sm">
        </div>
      </div>
      
      <div class="form-group">
        <label for="mortalidad_global" class="col-lg-7 control-label">Mortalidad Neonatal Global</label>
        <div class="input-group linea col-lg-4">
          <input type="number" min="1" max="100" step="0.1" name="mortalidad_global" class="form-control input-sm" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2">%</span>
        </div>
      </div>

      <div class="form-group">
        <label for="plazas_uci" class="col-lg-7 control-label">Número de plazas UCI</label>
        <div class="col-lg-5">
          <input type="number" name="plazas_uci" value="" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group">
        <label for="partos_menor" class="col-lg-7 control-label">Partos <= 1500 gr.</label>
        <div class="input-group linea col-lg-4">
          <input type="number" min="1" max="100" step="0.1" name="partos_menor" class="form-control input-sm" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2">%</span>
        </div>
      </div>
 
      <div class="form-group">
        <label for="mortalidad_menor" class="col-lg-7 control-label">Mortalidad <= 1500 gr.</label>
        <div class="input-group linea col-lg-4">
          <input type="number" min="1" max="100" step="0.1" name="mortalidad_menor" class="form-control input-sm" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2">%</span>
        </div>
      </div>            
      

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    
  </div>
</div>