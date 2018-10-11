<div class="ficha panel panel-default">
  <div class="panel-body">
 
    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Recursos</h4>

    <div class="col-lg-6">
    
      <div class="form-group row">
        <label for="ventilacion" class="col-lg-6 control-label">Ventilación Alta frecuencia</label>
        <label for="ventilacion" class="control-label radio-inline col-lg-2">
          <input type="radio" name="ventilacion" value="1"> Sí
        </label>
        <label for="ventilacion" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="ventilacion" value="0"> No
        </label>
        <label for="ventilacion" class="control-label radio-inline col-lg-1" >
          <input type="radio" name="ventilacion" value="s_i"> S/I
        </label>
      </div>

      <div class="form-group row">
        <label for="oxido" class="col-lg-6 control-label">Oxido Nítrico</label>
          <label for="oxido" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxido" value="1"> Sí
          </label>
          <label for="oxido" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxido" value="0"> No
          </label>
          <label for="oxido" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="oxido" value="-1"> S/I
          </label>
      </div>

      <div class="form-group row">
        <label for="cirugia_general" class="col-lg-6 control-label">Cirugía General</label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-2">
            <input type="radio" name="cirugia_general" value="1"> Sí
          </label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="cirugia_general" value="0"> No
          </label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="cirugia_general" value="-1"> S/I
          </label>
      </div>

      <div class="form-group row">
        <label for="cirugia_cardiaca" class="col-lg-6 control-label">Cirugía cardíaca</label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-2">
            <input type="radio" name="cirugia_cardiaca" value="1"> Sí
          </label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="cirugia_cardiaca" value="0"> No
          </label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="cirugia_cardiaca" value="-1"> S/I
          </label>
      </div>


    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
         
  </div>
</div>