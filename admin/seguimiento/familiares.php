<?php 
error_reporting(0);
include 'capaDAO/antecedentes_familiaresDAO.php';

$dao = new antecedentes_familiaresDAO($cone);
$fila = $dao->buscarId($idNeocosur);


if($fila['ID_APORTA_INFO_FAMILIAR']!=''){
$desab='disabled';
}
$aporta_informacion=$fila['ID_APORTA_INFO_FAMILIAR'];
$cuidador_responsable=$fila['ID_CUIDADOR_RESPONSABLE'];
$pais_residencia=$fila['ID_PAIS_RESIDENCIA'];
$ciudad=$fila['ID_CIUDAD'];
$comuna=$fila['COMUNA'];
$nivel_madre=$fila['ID_NIVEL_EDUCACIONAL_MADRE'];
$ocupacion_madre=$fila['ID_OCUPACION_MADRE'];
$nivel_padre=$fila['ID_NIVEL_EDUCACIONAL_PADRE'];
$ocupacion_padre=$fila['ID_OCUPACION_PADRE'];
$cant_ninos=$fila['NUMERO_NINOS_FAMILIA'];
$migracion_madre=$fila['MIGRACION_MADRE'];
$migracion_desde_madre=$fila['MIGRACION_MADRE_DESDE'];
$migracion_padre=$fila['MIGRACION_PADRE'];
$migracion_desde_padre=$fila['MIGRACION_PADRE_DESDE'];


?>
<script language="JavaScript" type="text/JavaScript">
//alert("VALOR"+$("#pais_residencia").val());

    $(document).ready(function(){
        $("#pais_residencia").change(function(event){ 
            var id = $("#pais_residencia").find(':selected').val(); 
            $("#ciudad").load('seguimiento/genera-select.php?id='+id);
        });
    });
</script>
<div class="ficha panel panel-default">
  <div class="panel-body">
    <form action="Negocio/familiarBO.php" method="post">
      <button class="btn btn-success active subtitulo" type="button" id="sec_familiares"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Antecedentes Familiares Control Actual</button>

      <div class="row">
        <div class="col-lg-6">

          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Quién aporta la información</label>
            <div class="col-lg-6">
              <select name="aporta_informacion" class="form-control input-sm" <?php echo $desab; ?>>
			  <option value="null">Seleccione</option>
                <?php cargarSelect("cuidador_control",$cone,"ID_CUIDADOR","DESC_CUIDA",$aporta_informacion);?>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Cuidador responsable</label>
            <div class="col-lg-6">
              <select name="cuidador_responsable" class="form-control input-sm" <?php echo $desab; ?>>
			   <option value="null">Seleccione</option>
                <?php cargarSelect("cuidador_control",$cone,"ID_CUIDADOR","DESC_CUIDA",$cuidador_responsable);?>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-lg-6 control-label">País de residencia</label>
            <div class="col-lg-6">
              <select name="pais_residencia"   id="pais_residencia" class="form-control input-sm" <?php echo $desab; ?>>
                <option value="null">Seleccione</option>
               <?php cargarSelect("pais",$cone,"ID_PAIS","descripcion",$pais_residencia);?>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-lg-6 control-label">Ciudad</label>
            <div class="col-lg-6">
              <select name="ciudad" id="ciudad"  class="form-control input-sm" <?php echo $desab; ?>>
                <option value="null">Seleccione</option>
                <?php cargarSelect("ciudad",$cone,"ID_CIU","DESC_CIU",$ciudad);?>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="paterno" class="col-lg-6 control-label">Comuna o Barrio</label>
            <div class="col-lg-6">
              <input type="text" name="comuna" class="form-control input-sm" value="<?= $comuna; ?>" <?php echo $desab; ?>>
            </div>
          </div>

          <div class="form-group">
            <label for="paterno" class="col-lg-6 control-label">N° de niños (<18 años) del grupo familiar <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Menores de 18 años del grupo familiar, no incluyendo al paciente."></span></label>
            <div class="col-lg-6">
              <input type="number" min="0" step="1" name="cant_ninos" class="form-control input-sm" value="<?= $cant_ninos; ?>" <?php echo $desab; ?>>
            </div>
          </div>

        </div>
         
		<div class="form-group">
            <label for="paterno" class="col-lg-6 control-label">Es la madre nacida en este país </label>
            <div class="col-lg-3"> 
				  <label for="previa_alta" class="control-label radio-inline col-lg-2">
					<input type="radio" name="migracion_madre" value="1" id="migracion_madre_si"  <?php  si($migracion_madre); ?>  <?php echo $desab; ?>> Sí
				  </label>
				  <label for="previa_alta" class="control-label radio-inline col-lg-2" >
					<input type="radio" name="migracion_madre" value="0"  id="migracion_madre_no"  <?php  no($migracion_madre); ?> <?php echo $desab; ?> > No
				  </label>
				
            </div>
			<div class="col-lg-3 sub-form" id="madre_si"> 	
					<div class="input-group">
				<div class="input-group-addon input-sm">Desde cuándo </div>
                <input type="number" min="0" step="1" value="<?php  echo $migracion_desde_madre; ?>" name="migracion_desde_madre" class="form-control input-sm" <?php echo $desab; ?>>
                <div class="input-group-addon input-sm">años</div>
              </div>
				
            </div>
          </div>
		  <div class="form-group">
            <label for="paterno" class="col-lg-6 control-label">Es el padre nacido en este país </label>
            <div class="col-lg-3"> 
				  <label for="previa_alta" class="control-label radio-inline col-lg-2">
					<input type="radio" name="migracion_padre" value="1" id="migracion_padre_si"  <?php  si($migracion_padre); ?> <?php echo $desab; ?>  > Sí
				  </label>
				  <label for="previa_alta" class="control-label radio-inline col-lg-2" >
					<input type="radio" name="migracion_padre" value="0"  id="migracion_padre_no"  <?php  no($migracion_padre); ?>  <?php echo $desab; ?> > No
				  </label>
				
            </div>
			 <div class="col-lg-3 sub-form" id="padre_si"> 	
					<div class="input-group">
				<div class="input-group-addon input-sm">Desde cuándo </div>
                <input type="number" min="0" step="1" value="<?php  echo $migracion_desde_padre; ?>" name="migracion_desde_padre" class="form-control input-sm" <?php echo $desab; ?>>
                <div class="input-group-addon input-sm">años</div>
              </div>
				
            </div>
          </div>
		 <br><br><br><br><br><br>
        <div class="col-lg-6">
          <table>
            <thead>
              <tr>
                <td colspan="2">
                  <label class="control-label">Familiar Nivel educacional</label>
                </td>
                <td>
                  <label class="control-label">Ocupación principal</label>
                </td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-lg-2">Madre</td>
                <td class="col-lg-5">
                  <select name="nivel_madre" class="form-control input-sm" <?php echo $desab; ?>>
                     <option value="null">Seleccione</option>
                    <?php cargarSelect("educacion",$cone,"ID_EDUCA","DESC_EDU",$nivel_madre);?>
                  </select>
                </td>
                <td class="col-lg-5">
                  <select name="ocupacion_madre" class="form-control input-sm" <?php echo $desab; ?>>
                    <option value="null">Seleccione</option>
                    <?php cargarSelect("ocupacion_control",$cone,"ID_OCUPA","DESC_OCUPA",$ocupacion_madre);?>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="col-lg-2">Padre</td>
                <td class="col-lg-5">
                  <select name="nivel_padre" class="form-control input-sm" <?php echo $desab; ?>>
                     <option value="null">Seleccione</option>
                    <?php cargarSelect("educacion",$cone,"ID_EDUCA","DESC_EDU",$nivel_padre);?>
                  </select>
                </td>
                <td class="col-lg-5">
                  <select name="ocupacion_padre" class="form-control input-sm"  <?php echo $desab; ?> >
                    <option value="null">Seleccione</option>
                    <?php cargarSelect("ocupacion_control",$cone,"ID_OCUPA","DESC_OCUPA",$ocupacion_padre);?>
                  </select>
                </td>
              </tr>
			  <tr>
                <td class="col-lg-2"></td>
                <td class="col-lg-5">
                 
                </td>
                <td class="col-lg-5">
                  
                </td>
              </tr>
			  <tr>
                <td class="col-lg-2"></td>
                <td class="col-lg-5">
                 
                </td>
                <td class="col-lg-5">
                  
                </td>
              </tr>
			 
              </tr>
			  
			  
            </tbody>
          </table>
        </div>
      </div>
    

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idOculto" id="idOculto" value="<?= $idControl; ?>"/>  
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
	<?php 
	if ($fila['ID_NEOCOSUR']=='')
	{
	?>
	<button type="submit" class="btn btn-success">Guardar</button>
	<?php 
	}
	?>
    </div>   
  </form>      
  </div>
</div>