<div class="ficha panel panel-default">
  <div class="panel-body">

    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Seguimiento</h4>

    <div class="col-lg-6">

      <div class="form-group row">
        <label for="seguimiento" class="col-lg-7 control-label">Seguimiento Neonatal</label>
        <label for="seguimiento" class="control-label radio-inline col-lg-2">
          <input type="radio" name="seguimiento" value="1"> Sí
        </label>
        <label for="seguimiento" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="seguimiento" value="0"> No
        </label>
      </div>

      <div class="form-group row">
        <label for="duracion_seguimiento" class="col-lg-7 control-label">Duración Seguimiento</label>
        <div class="col-lg-5">
          <input type="number" min="1" name="duracion_seguimiento" value="" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group row">
        <label for="estimados" class="col-lg-7 control-label">Número de niños estimados por año</label>
        <div class="col-lg-5">
          <input type="number" min="1" name="estimados" value="" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group row">
        <label for="oftalmologo" class="col-lg-7 control-label">Oftalmólogo</label>
          <label for="oftalmologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oftalmologo" value="1"> Sí
          </label>
          <label for="oftalmologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oftalmologo" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="otorrinolaringologo" class="col-lg-7 control-label">Otorrinolaringólogo</label>
          <label for="otorrinolaringologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="otorrinolaringologo" value="1"> Sí
          </label>
          <label for="otorrinolaringologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="otorrinolaringologo" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="neurologo" class="col-lg-7 control-label">Neurólogo</label>
          <label for="neurologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="neurologo" value="1"> Sí
          </label>
          <label for="neurologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="neurologo" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="broncopulmonar" class="col-lg-7 control-label">Broncopulmonar</label>
          <label for="broncopulmonar" class="control-label radio-inline col-lg-2">
            <input type="radio" name="broncopulmonar" value="1"> Sí
          </label>
          <label for="broncopulmonar" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="broncopulmonar" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="fonoaudiologo" class="col-lg-7 control-label">Fonoaudiólogo</label>
          <label for="fonoaudiologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="fonoaudiologo" value="1"> Sí
          </label>
          <label for="fonoaudiologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="fonoaudiologo" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="kinesiologo" class="col-lg-7 control-label">Kinesiólogo</label>
          <label for="kinesiologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="kinesiologo" value="1"> Sí
          </label>
          <label for="kinesiologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="kinesiologo" value="0"> No
          </label>
      </div>

      <div class="form-group row">
        <label for="oxigeno_domicilio" class="col-lg-7 control-label">Oxígeno domiciliario</label>
          <label for="oxigeno_domicilio" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxigeno_domicilio" value="1"> Sí
          </label>
          <label for="oxigeno_domicilio" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_domicilio" value="0"> No
          </label>
      </div>

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
       
  </div>
</div>