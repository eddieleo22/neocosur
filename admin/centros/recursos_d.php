<form action="Negocio/centroBO.php" method="post" >
<div class="ficha panel panel-default">
  <div class="panel-body">
 
    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Recursos</h4>

    <div class="col-lg-6">
    
      <div class="form-group row">
        <label for="ventilacion" class="col-lg-6 control-label">Ventilación Alta frecuencia</label>
        <label for="ventilacion" class="control-label radio-inline col-lg-2">
          <input type="radio" name="ventilacion" value="1" <?php si($ventilacion);  ?>> Sí
        </label>
        <label for="ventilacion" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="ventilacion" value="0" <?php no($ventilacion);  ?>> No
        </label>
        <label for="ventilacion" class="control-label radio-inline col-lg-1" >
          <input type="radio" name="ventilacion" value="-1" <?php sn($ventilacion);  ?>> S/I
        </label>
		<input type="radio" name="ventilacion" value="null" style="display:none" <?php check($ventilacion);  ?>>
      </div>

      <div class="form-group row">
        <label for="oxido" class="col-lg-6 control-label">Oxido Nítrico</label>
          <label for="oxido" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxido" value="1"  <?php si($oxido);  ?>> Sí
          </label>
          <label for="oxido" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxido" value="0" <?php no($oxido);  ?>> No
          </label>
          <label for="oxido" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="oxido" value="-1" <?php sn($oxido);  ?>> S/I
          </label>
		  <input type="radio" name="oxido" value="null" style="display:none" <?php check($oxido);  ?>>
      </div>

      <div class="form-group row">
        <label for="cirugia_general" class="col-lg-6 control-label">Cirugía General</label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-2">
            <input type="radio" name="cirugia_general" value="1" <?php si($cirugia_general);  ?>> Sí
          </label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="cirugia_general" value="0" <?php no($cirugia_general);  ?>> No
          </label>
          <label for="cirugia_general" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="cirugia_general" value="-1" <?php sn($cirugia_general);  ?>> S/I
          </label>
		  <input type="radio" name="cirugia_general" value="null" style="display:none" <?php check($cirugia_general);  ?>>
      </div>

      <div class="form-group row">
        <label for="cirugia_cardiaca" class="col-lg-6 control-label">Cirugía cardíaca</label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-2">
            <input type="radio" name="cirugia_cardiaca" value="1" <?php si($cirugia_cardiaca);?>> Sí
          </label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="cirugia_cardiaca" value="0" <?php no($cirugia_cardiaca);  ?>> No
          </label>
          <label for="cirugia_cardiaca" class="control-label radio-inline col-lg-1" >
            <input type="radio" name="cirugia_cardiaca" value="-1" <?php sn($cirugia_cardiaca);  ?>> S/I
          </label>
		  <input type="radio" name="cirugia_cardiaca" value="null" style="display:none" <?php check($cirugia_cardiaca);  ?>>
      </div>


    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idOcultoCentro" id="idOcultoCentro" value="<?php echo $idCentro ?>"/>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" name="recurso" class="btn btn-success">Guardar</button>
    </div>
       
  </div>
</div>
</form>