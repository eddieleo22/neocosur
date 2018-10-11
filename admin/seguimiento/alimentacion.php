<?php
error_reporting(0);
include 'capaDAO/alimentacionDAO.php';

$dao = new alimentacionDAO($cone);
$fila = $dao->buscarId($idControl);

$lactea= $fila['ID_ALIMENTACION_LACTEA'];
$formula=$fila['ID_FORMULA_UTILIZADA'];
$anios=$fila['EDAD_INTRODUCCION_SOLIDO_AGNO'];
$meses=$fila['EDAD_INTRODUCCION_SOLIDO_MESES'];
?>
<div class="ficha panel panel-default">
  <div class="panel-body">
    <form method="post" action="Negocio/alimentacionBO.php">
      <button class="btn btn-success active subtitulo" type="button" id="sec_connatales"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Alimentación</button>

      <div class="row">
        <div class="col-lg-7">
          <p class="col-lg-12">* Considerar EC hasta los 2 años y luego edad cronológica </p>
          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Alimentación láctea
			<span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Mixta = Leche Materna mas Fórmula."></span>
			</label>
            <div class="col-lg-6">
              <select name="lactea" class="form-control input-sm">
                <option value="null">Seleccione</option>
                <?php cargarSelect("alimentacion_param",$cone,"id_alimentacion","descripcion",$lactea);?>
              </select> 
            </div>
          </div>
                                  
          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Fórmula utilizada</label>
            <div class="col-lg-6">
              <select name="formula" class="form-control input-sm">
                <option value="null">Seleccione</option>
                <?php cargarSelect("formulautilizada",$cone,"id_formula","descripcion",$formula);?>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Edad introducción de sólidos</label>
            <div class="col-lg-3">
              <div class="input-group">
                <input type="number" min="0" step="1" value ="<?=$anios; ?>" name="anios" class="form-control input-sm">
                <div class="input-group-addon input-sm">años</div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="input-group">
                <input type="number" min="0" max="11" step="1" name="meses" value ="<?= $meses; ?>" class="form-control input-sm">
                <div class="input-group-addon input-sm">meses</div>
              </div>
            </div>

          </div>


        </div>
                                   
        <div class="col-lg-5">

        </div>
      </div>

    

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idOculto" value="<?= $idControl; ?>" class="form-control input-sm"  >
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>   
  </form>      
  </div>
</div>