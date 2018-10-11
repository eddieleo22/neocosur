<?php

//error_reporting(0);
include 'capaDAO/antecedentes_prenatalesDAO.php';
//include '../ayuda.php';

 
 
//echo "<br> id ->>> ".$id;


$dao = new antecedentes_prenatalesDAO($cone);

$ar = $dao->buscarId($id);


$escolaridad=$ar['ANIO_ESCOLARIDAD'];
$educa=$ar['ID_NIVEL_EDUCACION'];
$paridad=$ar['ID_PARIDAD'];
$tabaquismo = $ar['TABAQUISMO'];
$embarazo = $ar['CONTROL_EMBARAZO'];
$gest_primer_control = $ar['GEST_PRIMER_CONTROL'];
$diabetes=$ar['DIABETES'];
$gestacional=$ar['DIABETES_GESTACIONAL'];
$hiper = $ar['HIPERTENSION_ARTERIAL'];
$hiperEmb=$ar['HIPERTENSION_EMBARAZO'];
$medicamentos = $ar['MEDICAMENTOS'];
$multiple=$ar['MULTIPLE'];
$lugar=$ar['ID_MULTIPLE_LUGAR'];
//$edadGest=$ar['EDAD_GESTACIONAL'];
$edadMa = $ar["EDAD_MATERNA"];
$retardo =$ar['RETARDO_CREC_INTRA_UTERINO'];
$rupDias=$ar['RUPTURA_PRE_MEMBRANA_DIAS'];
$ruphoras=$ar['RUPTURA_PRE_MEMBRANA_HORAS'];
$antibiotico=$ar['ANTIBIOTICO_PRENATAL'];
$corti =$ar['CORTICOIDE_PRENATAL'];
$imco=$ar['CORTICOIDE_PRENATAL_CURSO_INCOM'];
$curso =$ar['CORTICOIDE_PRENATAL_UN_CURSO'];
$corio =$ar['CORIOAMNIONITIS'];
$sulfato =$ar['SULFATO_MG'];
$sulfato_neuro =$ar['SULFATO_MG_NEURO'];
$doppler=$ar['ALTERACION_DOPLER_FETAL'];
$flujo=$ar['FLUJO_REVERSO_VENA_UMBILICAL'];
$ductus_venoso=$ar['DUCTUS_VENOSO_ALTERADO'];
$dila_media=$ar['DILATACION_CEREBRAL_MEDIA'];
$otra =$ar['OTRA_ALTERACION'];
$obs_doppler=$ar['OBSERVACIONES_PRENATALES'];
/*echo "<br> variable valor ->  ".$gestacional;
echo "si -> ".si($hiper)."fin <br>";
echo "no -> ".//no($hiper)."fin <br>";
echo "sn -> ".//sn($hiper)." fin <br>";
echo "check -> ".//check($hiper)." fin <br>";*/

?>

<div class="ficha panel panel-default">
  <div class="panel-body">

    <form name="ingreso"  method="post" action="Negocio/PrenatalesBO.php">
      <button class="btn btn-success active subtitulo" type="button" ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Antecedentes Prenatales</button>

      <div id="principal">
        <div class="col-lg-12">

          <div class="form-group col-lg-6">
            <label for="edad_maternal" class="col-lg-5 control-label">Edad Materna</label>
            <div class="col-lg-6">
                <input type="number" min="12" max="50" step="1" value="<?php echo $edadMa; ?>" name="edad_maternal" class="form-control input-sm">
            </div>
          </div> 

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="escolaridad" class="col-lg-5 control-label">Años de escolaridad</label>
            <div class="col-lg-6">
                <input type="number" min="1" max="12" step="1" name="escolaridad" value="<?php echo $escolaridad ?>"  class="form-control input-sm">
            </div>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="escolaridad" class="col-lg-5 control-label">Nivel educacional</label>
            <div class="col-lg-6">
              <select name="nivel_educacional" class="form-control input-sm">
                <option value="">Seleccione</option>
               <?php cargarSelect("educacion_param_ingr",$cone,"id_educacion_param_ingr","descripcion",$educa);?>
               
               
              </select> 
            </div>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="Paridad" class="col-lg-5 control-label">Paridad</label>
            <div class="col-lg-6">
              <select name="paridad" class="form-control input-sm">
                 <option value="" >Seleccione</option>
               <?php cargarSelect("paridad_param_ingre",$cone,"id_paridad_param_ingre","descripcion",$paridad);?>
              </select> 
            </div>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="tabaquismo" class="col-lg-5 control-label">Tabaquismo 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Si: Si madre declara que fuma, independiente de la cantidad o frecuencia."></span>
            </label>
            <label for="tabaquismo" class="control-label radio-inline col-lg-2"   >
              <input type="radio" name="tabaquismo" value="1" id="tabaquismo_si" <?php si($tabaquismo);  ?>> Sí
            </label>
            <label for="tabaquismo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="tabaquismo" value="0" id="tabaquismo_no" <?php no($tabaquismo);  ?> > No
            </label>
            <label for="tabaquismo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="tabaquismo" value="-1" id="tabaquismo_s/i" <?php sn($tabaquismo);  ?> > S/I
              <input type="radio" name="tabaquismo" value="null" id="" style="display:none" <?php check($tabaquismo);  ?>  > 
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>
          
          <div class="form-group col-lg-6">
            <label for="edad_maternal" class="col-lg-5 control-label">Control de embarazo 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Si: Tiene al menos un control prenatal."></span>
            </label>
            <label for="control_embarazo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="control_embarazo" value="1" id="control_embarazo_si" required  <?php si($embarazo);  ?>> Sí
            </label>
            <label for="control_embarazo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="control_embarazo" value="0" id="control_embarazo_no" <?php no($embarazo);  ?>> No
              <input type="radio" name="control_embarazo" value="null" id=""style="display:none" <?php check($embarazo);  ?> > 
            </label>
          </div>
		  
		  <div class="form-group col-lg-6 sub-form control_embarazo">
            <label for="gest_primer_control" class="col-lg-5 control-label">semanas de gestación al primer control</label>
            <label for="gest_primer_control" class="control-label radio-inline col-lg-2">
              <input type="number" name="gest_primer_control" min="1" max="99" step="1" value="<?= $gest_primer_control; ?>" class="form-control input-sm"  > 
            </label> 
		</div>
		  
		  
		  

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="diabetes" class="col-lg-5 control-label">Diabetes</label>
            <label for="diabetes" class="control-label radio-inline col-lg-2">
              <input type="radio" name="diabetes" value="1" id="diabetes_si" <?php si($diabetes);  ?>> Sí
            </label>
            <label for="diabetes" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="diabetes" value="0" id="diabetes_no" <?php no($diabetes);  ?>> No
            </label>
            <label for="diabetes" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="diabetes" value="-1" id="diabetes_s_i" <?php sn($diabetes); ?>> S/I
              <input type="radio" name="diabetes" value="null" id=""style="display:none" <?php check($diabetes);  ?> > 
            </label>
          </div>

          <div class="form-group col-lg-6 sub-form diabetes">
            <label for="diabetes_gestacional" class="col-lg-5 control-label">Diabetes gestacional</label>
            <label for="diabetes_gestacional" class="control-label radio-inline col-lg-2">
              <input type="radio" name="diabetes_gestacional" value="1" <?php si($gestacional); ?>> Sí
            </label>
            <label for="diabetes_gestacional" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="diabetes_gestacional"  value="0" <?php no($gestacional); ?>> No
              <input type="radio" name="diabetes_gestacional" value="null" id=""style="display:none" <?php check($gestacional); ?> > 
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group sub-form">
            <label for="medicamentos" class="col-lg-6 control-label">Diabetes Medicamentos</label>
            <label for="medicamentos" class="control-label radio-inline col-lg-2">
              <input type="radio" name="medicamentos" value="1" <?php si($medicamentos); ?>> Sí
            </label>
            <label for="medicamentos" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="medicamentos" value="0" <?php no($medicamentos); ?>> No
              <input type="radio" name="medicamentos" value="null" id=""style="display:none" <?php check($medicamentos); ?>>
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="ht_art" class="col-lg-5 control-label">Hipertensión Arterial</label>
            <label for="ht_art" class="control-label radio-inline col-lg-2">
              <input type="radio" name="ht_art" value="1" id="ht_art_si"  <?php si($hiper); ?> > Sí
            </label>
            <label for="ht_art" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="ht_art"  value="0" id="ht_art_no"  <?php no($hiper); ?>> No
              <input type="radio" name="ht_art" value="null" id="" style="display:none" <?php check($hiper); ?> >
            </label>
          </div>
        
          <div class="form-group col-lg-6 sub-form ht_art">
            <label for="ht_embarazo" class="col-lg-5 control-label">Hipertensión en el embarazo</label>
            <label for="ht_embarazo" class="control-label radio-inline col-lg-2">
              <input type="radio" name="ht_embarazo" value="1"  <?php si($hiperEmb); ?>> Sí
            </label>
            <label for="ht_embarazo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="ht_embarazo"  value="0"  <?php no($hiperEmb); ?>> No
              <input type="radio" name="ht_embarazo" value="null" id=""style="display:none" <?php check($hiperEmb); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6 sub-form ht_art">
            <label for="medicamentos" class="col-lg-5 control-label">Medicamentos</label>
            <label for="medicamentos" class="control-label radio-inline col-lg-2">
              <input type="radio" name="medicamentos" value="1"  <?php si($medicamentos); ?>  > Sí
            </label>
            <label for="medicamentos" class="control-label radio-inline col-lg-2"  >
                <input type="radio" name="medicamentos"  value="0" <?php no($medicamentos); ?> > No
                <input type="radio" name="medicamentos" value="null" id=""style="display:none" <?php check($medicamentos); ?> >
            </label>
          </div> 

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="multiple" class="col-lg-5 control-label">Múltiple</label>
            <label for="multiple" class="control-label radio-inline col-lg-2">
              <input type="radio" name="multiple" value="1" id="multiple_si" <?php si($multiple); ?>> Sí
            </label>
            <label for="multiple" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="multiple" value="0" id="multiple_no" <?php no($multiple); ?>> No
              <input type="radio" name="multiple" value="null" id=""style="display:none" <?php check($multiple); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          

          <div class="form-group col-lg-6 sub-form multiple">
            <label for="Paridad" class="col-lg-5 control-label">Lugar</label>
            <div class="col-lg-4">
              <select name="lugar" class="form-control input-sm">
                <option value="">Seleccione</option>
               <?php cargarSelect("multiple_lugar_param",$cone,"id_multiple_lugar_param","descripcion",$lugar);?>
              </select> 
            </div>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="rciu" class="col-lg-5 control-label">Retardo Crecimiento Intrauterino 
              <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Según diagnóstico en ficha materna independiente del parámetro usado."></span>
            </label>
            <label for="rciu" class="control-label radio-inline col-lg-2">
              <input type="radio" name="rciu" value="1"  <?php si($retardo); ?>  > Sí
            </label>
            <label for="rciu" class="control-label radio-inline col-lg-2"  >
              <input type="radio" name="rciu"  value="0" <?php no($retardo); ?>> No
              <input type="radio" name="rciu" value="null" id=""style="display:none" <?php check($retardo); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="rpm" class="col-lg-5 control-label">Ruptura Pre Membrana 
              <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Tiempo en días y horas de ruptura de membranas previo al parto."></span>
            </label>            
            <div class="col-lg-3 input-group linea">
              <input type="number" min="1" max="99" step="1" name="rpm_dias" value="<?php echo $rupDias ?>" class="form-control input-sm" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">días</span>
            </div>
            <div class="col-lg-3 input-group linea">
              <input type="number" min="1" max="23" step="1" name="rpm_hrs" value="<?php echo $ruphoras ?>" class="form-control input-sm" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">hrs.</span>
            </div>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="antibiotico" class="col-lg-5 control-label">Antibiótico Prenatal</label>
            <label for="antibiotico" class="control-label radio-inline col-lg-2">
              <input type="radio" name="antibiotico" value="1"  <?php si($antibiotico); ?>  > Sí
            </label>
            <label for="antibiotico" class="control-label radio-inline col-lg-2"  >
              <input type="radio" name="antibiotico"  value="0" <?php no($antibiotico); ?>> No
              <input type="radio" name="antibiotico" value="null" id=""style="display:none" <?php check($antibiotico); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="cort_prenatal" class="col-lg-5 control-label">Corticoide prenatal
			<span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true"   title="Como tratamiento de DBP."></span>
			</label>
            <label for="cort_prenatal" class="control-label radio-inline col-lg-2">
              <input type="radio" name="cort_prenatal" value="1" id="cort_prenatal_si" onClick="calc_scre()"   <?php si($corti); ?>> Sí
            </label>
            <label for="cort_prenatal" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="cort_prenatal" value="0" id="cort_prenatal_no" onClick="calc_scre()" <?php no($corti); ?>> No
            </label>
            <label for="cort_prenatal" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="cort_prenatal" value="-1" id="cort_prenatal_s_i" onClick="calc_scre()" <?php sn($corti); ?>> S/I
              <input type="radio" name="cort_prenatal" value="null" id=""style="display:none" <?php check($corti); ?> >
            </label>
          </div>

          <div class="form-group col-lg-6 sub-form cort_prenatal">
            <label for="completo" class="control-label radio-inline col-lg-3">
              <input type="radio" name="completo" value="1" id="completo_si" onClick="calc_scre()" <?php si($imco); ?>> Completo
            </label>
            <label for="completo" class="control-label radio-inline col-lg-3" >
              <input type="radio" name="completo" value="0" id="completo_no" onClick="calc_scre()" <?php no($imco); ?>> Incompleto
              <input type="radio" name="completo" value="null" id=""style="display:none" <?php check($imco); ?> >
            </label>
          </div>

          <div class="form-group col-lg-6 sub-form completo">
            <label for="curso" class="control-label radio-inline col-lg-3">
              <input type="radio" name="curso" id="radio26_cort_com_1" value="1" onClick="calc_scre()" <?php si($curso); ?>> 1 curso
            </label>
            <label for="curso" class="control-label radio-inline col-lg-3" >
              <input type="radio" name="curso" value="0" id="radio26_cort_com_2" onClick="calc_scre()" <?php no($curso); ?>> más de 1 curso
              <input type="radio" name="curso" value="null" id=""style="display:none" <?php check($curso); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="corioamnionitis" class="col-lg-5 control-label">Corioamnionitis 
              <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Según diagnóstico obstétrico."></span>
            </label>
            <label for="corioamnionitis" class="control-label radio-inline col-lg-2">
              <input type="radio" name="corioamnionitis" value="1"  <?php si($corio); ?>  > Sí
            </label>
            <label for="corioamnionitis" class="control-label radio-inline col-lg-2" <?php no($corio); ?>>
              <input type="radio" name="corioamnionitis"  value="0" <?php no($corio); ?>> No
              <input type="radio" name="corioamnionitis" value="null" id=""style="display:none" <?php check($corio); ?> >
            </label>
          </div>

          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="sulfato" class="col-lg-5 control-label">Sulfato de Magnesio 
              <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Según diagnóstico obstétrico."></span>
            </label>
            <label for="sulfato" class="control-label radio-inline col-lg-2">
              <input type="radio" name="sulfato" value="1" id="sulfato_si" <?php si($sulfato); ?>  > Sí
            </label>
            <label for="sulfato" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="sulfato" value="0" id="sulfato_no" <?php no($sulfato); ?>> No
              <input type="radio" name="sulfato" value="null" id=""style="display:none" <?php check($sulfato); ?> >
            </label>
          </div>
		 
		 <div class="form-group col-lg-6 sub-form sulfato">
            <label for="sulfato_uso_como" class="col-lg-5 control-label">¿Uso como neuroprotector?</label>
            <label for="sulfato_uso_como" class="control-label radio-inline col-lg-2">
              <input type="radio" name="sulfato_uso_como" value="1"  <?php si($sulfato_neuro); ?>> Sí
            </label>
            <label for="ht_embarazo" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="sulfato_uso_como"  value="0"  <?php no($sulfato_neuro); ?>> No
              <input type="radio" name="sulfato_uso_como" value="null" id=""style="display:none" <?php check($sulfato_neuro); ?> >
            </label>
		</div>
			
			
			
			
          <div class="clearfix visible-lg-block"></div>

          <div class="form-group col-lg-6">
            <label for="doppler" class="col-lg-5 control-label">Alteración del doppler fetal</label>
            <label for="doppler" class="control-label radio-inline col-lg-2">
              <input type="radio" name="doppler" value="1" id="doppler_fetal_si" <?php si($doppler); ?> > Sí
            </label>
            <label for="doppler" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="doppler"  value="0" id="doppler_fetal_no" <?php no($doppler); ?> > No
              <input type="radio" name="doppler" value="null" id=""style="display:none" <?php check($doppler); ?> >
            </label>
          </div>

          <div class="form-group col-lg-6 sub-form doppler_fetal">
            <div class="checkbox">
              <label for="" class="control-label txt_izq col-lg-12 margin-left">
                <input type="checkbox" value="1" class="doppler" name="flujo_reverso" <?php si($flujo); ?>>
                Flujo reverso en arteria umbilical
              </label>
			  
			<label for="" class="control-label txt_izq col-lg-12 margin-left">
                <input type="checkbox" value="1" class="doppler" name="ductus_venoso" <?php si($ductus_venoso); ?>>
                Ductus venoso alterado 
              </label>
              <label for="" class="control-label txt_izq col-lg-12 margin-left">
                  <input type="checkbox" value="1" class="doppler" name="dila_media" <?php si($dila_media); ?>>
                Dilatación cerebral media
              </label>

              <label for="" class="control-label txt_izq col-lg-12 margin-left">
                  <input type="checkbox" value="1" class="doppler" name="otra_altera" <?php si($otra); ?>>
                Otra alteración
              </label>
            </div>            
          </div>

          <div class="form-group col-lg-12">
            <label for="obs_doppler" class="control-label col-lg-5" >
              Observaciones prenatales
            </label>
            <div>
              <textarea class="form-control col-lg-12" name="obs_doppler" rows="5"><?php echo $obs_doppler ?></textarea>
            </div>
          </div>


        </div>

        <div class="clearfix visible-lg-block"></div>
      </div>

        <div class=" col-lg-offset-10 col-lg-2">
            <input type="hidden" name="idOculto" id="idoculto" value="<?php echo $id; ?>"/>
			<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
          <button type="submit" class="btn btn-success" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
        </div> 
    </form>
  </div>
</div>
