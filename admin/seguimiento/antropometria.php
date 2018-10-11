<?php 
session_start();
include 'capaDAO/antropometria_controlDAO.php';

$dao = new antropometria_controlDAO($cone);


$fila=$dao->buscarId($idControl);
//var_dump($fila);


$peso=$fila['PESO'];
$talla=$fila['TALLA'];
$circunferencia=$fila['CIRCUNFERENCIA_CRANEO'];
$imc=$fila['IMC'];
$estad_nutricional=$fila['OMS'];
$talla_baja=$fila['TALLA_BAJA'];
$Microcefalia=$fila['MICROCEFALIA'];
$Macrocefalia=$fila['MACROCEFALIA']; 


?>
<script language="JavaScript" type="text/JavaScript">
function calc_IMC()
{	 
	var peso	= document.getElementById('peso').value;
	var talla	= document.getElementById('talla').value; 
		if (peso==0 || peso==null || talla==null || talla==0)               
		 {
			document.getElementById('imc').value='';
			return
		}		
		
	var x  				= (peso/1000)/((talla*talla)/10000); 
		document.getElementById('imc').value=	x.toFixed(1);							
}	
</script>
<div class="ficha panel panel-default">
  <div class="panel-body">
    <form action="Negocio/antroControlBO.php" method="post">
      <button class="btn btn-success active subtitulo" type="button" id="sec_antropometría"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Antropometría</button>

      <div class="row">
        <div class="col-lg-8">

          <div class="form-group">
            <label class="control-label col-lg-12">Antropometría control actual <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="<b>Peso:</b> Indicar pesos en gramos sin separador de miles. Ej. 1300. <br/> <b>Talla y Cir. Cráneo:</b> Indicar medición en centímetros con más de un decimal. Ej. 32,2 y comadecimal si corresponde. <br>Hasta el control de los 2 años, se utiliza la Edad Corregida (EC). En controles posterioes se utiliza la edad cornológica del niño."></span></label>

            <table cellpadding="3" cellspacing="3">
              <thead>
                <tr>
                  <td class="col-lg-3"><label for="" class="col-lg-2 control-label">Peso</label></td>
                  <td class="col-lg-3"><label for="" class="col-lg-2 control-label">Talla</label></td>
                  <td class="col-lg-3"><label for="" class="col-lg-2 control-label">Cir. Craneana</label></td>
                  <td class="col-lg-3"><label for="" class="col-lg-2 control-label">IMC</label></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-lg-3">
                    <div class="input-group">
                      <input type="number" min="0" step="1" name="peso" id="peso"  onchange="calc_IMC()" value="<?= $peso ?>"; class="form-control input-sm">
                      <div class="input-group-addon input-sm">g.</div>
                    </div>
                  </td>

                  <td class="col-lg-3">
                    <div class="input-group">
                      <input type="number" min="0" step="0.01" name="talla" id="talla" onchange="calc_IMC()" value="<?= $talla ?>" class="form-control input-sm">
                      <div class="input-group-addon input-sm">cm</div>
                    </div>
                  </td>

                  <td class="col-lg-3">
                    <div class="input-group">
                      <input type="number" min="0" step="0.1" name="circunferencia" value="<?= $circunferencia ?>" class="form-control input-sm">
                      <div class="input-group-addon input-sm">cm</div>
                    </div>
                  </td>

                  <td class="col-lg-3">
                    <div class="input-group">
                      <input type="number" min="0" step="1" name="imc" id="imc"  value="<?= $imc ?>" class="form-control input-sm" readonly>
                    </div>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>

          <div class="clearfix"></div>

          <div class="form-group">
            <label for="" class="col-lg-12 control-label">Estado nutricional según OMS</label>
            <div class="col-lg-6">
             <select name="estad_nutricional" class="form-control input-sm">
			 <option value="">Seleccione</option>
                <?php cargarSelect("oms",$cone,"ID_OMS","DESC_OMS",$estad_nutricional);?>
              </select> 
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="form-group checkbox col-lg-12">

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="talla_baja" type="checkbox" value="" <?php si($talla_baja); ?>>
              Talla Baja
            </label>
            <label for="" class="control-label txt_izq col-lg-12">
              <input name="Microcefalia" type="checkbox" value="" <?php si($Microcefalia); ?>>
              Microcefalia
            </label>
            <label for="" class="control-label txt_izq col-lg-12">
              <input name="Macrocefalia" type="checkbox" value="" <?php si($Macrocefalia); ?>>
              Macrocefalia
            </label>
          </div>

          <div class="clearfix"></div>

          <div class="form-group">
            <label class="control-label col-lg-12">Registro antropométrico</label>
            <a class="btn btn-default" href="javascript:void(0)" 
		
		onclick="MM_openBrWindow('registro_desarrollo.php?idNeocosur=<?= $idNeocosur; ?>&idControl=<?=$idControl; ?>&idCentro=<?= $idCentro; ?>','','scrollbars=yes,resizable=yes,width=790,height=440,top=0, left=0')"  
		role="button" target="_blank"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Ver Registro Histórico</a>
            <p class="col-lg-12">* Para que los datos del control actual aparezcan en el regstro histórico, grabe los datos de esta sección.</p>
          </div>

        </div>

               
        <div class="col-lg-4">

        </div>
      </div>

    

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idOculto" id="idOculto" value="<?= $idControl; ?>"/> 
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>   
  </form>      
  </div>
</div>