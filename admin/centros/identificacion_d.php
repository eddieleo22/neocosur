<form action="Negocio/centroBO.php" method="post" >
<div class="ficha panel panel-default">
  <div class="panel-body">
 
    <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Identificación</h4>

    <div class="col-lg-6">
    
      <div class="form-group">
        <label for="fecha_creacion" class="col-lg-5 control-label">Fecha de Creación</label>
        <div class="col-lg-7">
          <input type="input" name="fecha_creacion" value="<?php echo $fecha_creacion ;  ?>" disabled="disabled" class="form-control input-sm">
        </div>
      </div>
                              
      <div class="form-group">
        <label for="nombre" class="col-lg-5 control-label">Nombre</label>
        <div class="col-lg-7">
          <input type="text" name="nombre" value="<?php echo utf8_encode($nombre) ;  ?>" class="form-control input-sm">
        </div>
      </div>
                               
      <div class="form-group">
        <label for="codigo" class="col-lg-5 control-label">Código Centro</label>
        <div class="col-lg-7">
          <input type="text" name="codigo" value="<?php echo $codigo ;  ?>" class="form-control input-sm">
        </div>
      </div>
                               
      <div class="form-group">
        <label for="pais" class="col-lg-5 control-label">País</label>
        <div class="col-lg-7"> 
          <select name="pais" class="form-control input-sm">
            <option value="null">Seleccione</option>
            <?php cargarSelect("pais",$cone,"id_Pais","descripcion",$pais);?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="universidad" class="col-lg-5 control-label">Universidad</label>
        <div class="col-lg-7">
          <input type="text" name="universidad"  value="<?php echo $universidad ;  ?>" class="form-control input-sm">
        </div>
      </div>

      <div class="form-group">
        <label for="tipo" class="col-lg-5 control-label">Tipo</label>
        <label for="tipo" class="control-label radio-inline col-lg-3">
          <input type="radio" name="tipo" value="1" <?php si($tipo);  ?>> Privado
        </label>
        <label for="tipo" class="control-label radio-inline col-lg-3" >
          <input type="radio" name="tipo" value="0" <?php no($tipo);  ?>> Público
        </label>
		<input type="radio" name="tipo" value="null" style="display:none" <?php check($tipo);  ?> >
      </div>

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idOcultoCentro" id="idOcultoCentro" value="<?php echo $idCentro ?>"/>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" name ="identi" class="btn btn-success">Guardar</button>
    </div>
      
  </div>
</div>

</form>