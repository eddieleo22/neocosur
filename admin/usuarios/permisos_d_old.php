<div class="ficha panel panel-default">
  <div class="panel-body">
   <form action="Negocio/usuarioBO.php" method="post" name="centro">
    <h4><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Permisos</h4>
    <div class="col-lg-6">
      <div class="form-group">

        <label for="centro" class="col-lg-5 control-label">Centro</label>
        <div class="col-lg-7">
          <select name="centro" class="form-control input-sm">
              <option value="0">Seleccione</option>
			  <?php cargarSelect("centro",$cone,"c_id_centro","c_nombre",$centro);?>
            </select>
        </div>
        <label for="nombres" class="col-lg-5 control-label">Cargo</label>
        <div class="col-lg-7">
          <select name="cargo" class="form-control input-sm">
              <?php cargarSelect("perfil_user",$cone,"pf_id_perfil","pf_descripcion",$cargo);?>
            </select>
        </div>

        <label for="estado" class="col-lg-5 control-label">Estado</label>
        <div class="col-lg-7">
          <select name="estado" class="form-control input-sm">
              <?php cargarSelect("estados",$cone,"id_estado","es_descripcion",$us_activo);?>
            </select>
        </div>

      </div>

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $idUsuario ?>"/>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit"  name="permi" class="btn btn-success">Guardar</button>
    </div>
    </form>
  </div>
</div>