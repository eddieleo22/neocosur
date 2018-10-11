<form action="Negocio/centroBO.php" method="post" >
<div class="ficha panel panel-default">
  <div class="panel-body">
 
    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Seguimiento</h4>

    <div class="col-lg-6">

      <div class="form-group row">
        <label for="seguimiento" class="col-lg-7 control-label">Seguimiento Neonatal</label>
        <label for="seguimiento" class="control-label radio-inline col-lg-2">
          <input type="radio" name="seguimiento" value="1" <?php si($seguimiento);  ?>> Sí
        </label>
        <label for="seguimiento" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="seguimiento" value="0" <?php no($seguimiento);  ?>> No
        </label>
		<input type="radio" name="seguimiento" value="null" style="display:none" <?php check($seguimiento);  ?>>
      </div>

      <div class="form-group row">
        <label for="duracion_seguimiento" class="col-lg-7 control-label">Duración Seguimiento</label>
        <div class="col-lg-5">
          <input type="number" min="1" name="duracion_seguimiento" value="<?php echo $duracion_seguimiento ;  ?>" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group row">
        <label for="estimados" class="col-lg-7 control-label">Número de niños estimados por año</label>
        <div class="col-lg-5">
          <input type="number" min="1" name="estimados" value="<?php echo $estimados ;  ?>" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group row">
        <label for="oftalmologo" class="col-lg-7 control-label">Oftalmólogo</label>
          <label for="oftalmologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oftalmologo" value="1" <?php si($oftalmologo);  ?>> Sí
          </label>
          <label for="oftalmologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oftalmologo" value="0" <?php no($oftalmologo);  ?>> No
          </label>
		  <input type="radio" name="oftalmologo" value="null" style="display:none" <?php check($oftalmologo);  ?>>
      </div>

      <div class="form-group row">
        <label for="otorrinolaringologo" class="col-lg-7 control-label">Otorrinolaringólogo</label>
          <label for="otorrinolaringologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="otorrinolaringologo" value="1" <?php si($otorrinolaringologo);  ?>> Sí
          </label>
          <label for="otorrinolaringologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="otorrinolaringologo" value="0" <?php no($otorrinolaringologo);  ?>> No
          </label>
		  <input type="radio" name="otorrinolaringologo" value="null" style="display:none" <?php check($otorrinolaringologo);  ?>>
      </div>

      <div class="form-group row">
        <label for="neurologo" class="col-lg-7 control-label">Neurólogo</label>
          <label for="neurologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="neurologo" value="1" <?php si($neurologo);  ?>> Sí
          </label>
          <label for="neurologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="neurologo" value="0" <?php no($neurologo);  ?>> No
          </label>
		  <input type="radio" name="neurologo" value="null" style="display:none" <?php check($neurologo);  ?>>
      </div>

      <div class="form-group row">
        <label for="broncopulmonar" class="col-lg-7 control-label">Broncopulmonar</label>
          <label for="broncopulmonar" class="control-label radio-inline col-lg-2">
            <input type="radio" name="broncopulmonar" value="1" <?php si($broncopulmonar);  ?>> Sí
          </label>
          <label for="broncopulmonar" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="broncopulmonar" value="0" <?php no($broncopulmonar);  ?>> No
          </label>
		  <input type="radio" name="broncopulmonar" value="null" style="display:none" <?php check($broncopulmonar);  ?>>
      </div>

      <div class="form-group row">
        <label for="fonoaudiologo" class="col-lg-7 control-label">Fonoaudiólogo</label>
          <label for="fonoaudiologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="fonoaudiologo" value="1" <?php si($fonoaudiologo);  ?>> Sí
          </label>
          <label for="fonoaudiologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="fonoaudiologo" value="0" <?php no($fonoaudiologo);  ?>> No
          </label>
		  <input type="radio" name="fonoaudiologo" value="null" style="display:none" <?php check($fonoaudiologo);  ?>>
      </div>

      <div class="form-group row">
        <label for="kinesiologo" class="col-lg-7 control-label">Kinesiólogo</label>
          <label for="kinesiologo" class="control-label radio-inline col-lg-2">
            <input type="radio" name="kinesiologo" value="1" <?php si($kinesiologo);  ?>> Sí
          </label>
          <label for="kinesiologo" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="kinesiologo" value="0" <?php no($kinesiologo);  ?>> No
          </label>
		  <input type="radio" name="kinesiologo" value="null" style="display:none" <?php check($kinesiologo);  ?>>
      </div>

      <div class="form-group row">
        <label for="oxigeno_domicilio" class="col-lg-7 control-label">Oxígeno domiciliario</label>
          <label for="oxigeno_domicilio" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxigeno_domicilio" value="1" <?php si($oxigeno_domicilio);  ?>> Sí
          </label>
          <label for="oxigeno_domicilio" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_domicilio" value="0" <?php no($oxigeno_domicilio);  ?>> No
          </label>
		  <input type="radio" name="oxigeno_domicilio" value="null" style="display:none" <?php check($oxigeno_domicilio);  ?>>
      </div>

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idOcultoCentro" id="idOcultoCentro" value="<?php echo $idCentro ?>"/>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" name="segui" class="btn btn-success">Guardar</button>
    </div>        
  </div>
</div>
</form>