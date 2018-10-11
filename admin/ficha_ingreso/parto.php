<?php
error_reporting(0);

include 'capaDAO/antecedentes_partoDAO.php';
//include 'ayuda.php';

//var_dump($cone);
//echo 'asdasda '.$id;
$dao = new antecedentes_partoDAO($cone);

//print_r($dao);
$ar = $dao->buscarId($id);
//echo "<br><br><br>";
//var_dump($ar);
  $oxigeno=$ar['OXIGENO_FLUJO_LIBRE'];
  $vent_masc=$ar['VENTILACION_MASC'];
  $intubacion=$ar['INTUBACION'];
  $masaje=$ar['MASAJE_CARDIACO'];
  $adrenalina=$ar['ADRENALINA'];
  $malformacion=$ar['MLF_MAYOR'];
  $compromete=$ar['MLF_COMPROMETE_VIDA'];
	$sistema_nervioso=$ar['MLF_NERVIOSO_CENTRAL'];
	$anecefalia=$ar['MLF_NER_ANE'];
	$mielo=$ar['MLF_NER_MIELO'];
	$hidranencefalia=$ar['MLF_NER_HIDRA'];
	$hidrocefalia=$ar['MLF_NER_HIDRO'];
	$holo=$ar['MLF_NER_HOLO'];
  $cardiacos=$ar['MLF_DEF_CARDIACOS'];
	$tronco=$ar['MLF_CAR_TRON'];
	$transposicion=$ar['MLF_CAR_VAS'];
	$fallot=$ar['MLF_CAR_FALL'];
	$ventriculo_unico=$ar['MLF_CAR_UNI'];
	$doble_ventriculo_derecho=$ar['MLF_CAR_DOB'];
	$canal_atrio=$ar['MLF_CAR_CAN'];
	$atresia_pulmonar=$ar['MLF_CAR_ATRE'];
	$atresia_tricuspide=$ar['MLF_CAR_TRI'];
	$hipoplasia=$ar['MLF_CAR_HIPO'];
	$interrupcion=$ar['MLF_CAR_AORT'];
	$anomalia_retorno=$ar['MLF_CAR_ANO'];
  $gastrointestinales=$ar['MLF_DEF_GASTRO'];
	$fisura_paladar=$ar['MLF_GST_PAL'];
	$fistula=$ar['MLF_GST_FIS'];
	$atresia_duodenal=$ar['MLF_GST_DUO'];
	$atresia_yeyunal=$ar['MLF_GST_YEY'];
	$atresia_ileal=$ar['MLF_GST_LLE'];
	$atresia_intestino=$ar['MLF_GST_REC'];
	$ano_imperforado=$ar['MLF_GST_ANO'];
	$onfalocele=$ar['MLF_GST_ONF'];
	$gastrosquisis=$ar['MLF_GST_GAS'];
  $genitourinarios=$ar['MLF_DEF_URINARIOS'];
	$agenesia=$ar['MLF_URI_AGE'];
	$renal=$ar['MLF_URI_DIS'];
	$uropatia=$ar['MLF_URI_URO'];
	$ectrofia_vesical=$ar['MLF_URI_ECT'];
  $cromosomica=$ar['MLF_DEF_CROMOSOMICA'];
	$trisomia_13=$ar['MLF_CRO_13'];
	$trisomia_18=$ar['MLF_CRO_18'];
	$trisomia_21=$ar['MLF_CRO_21'];
  $otro_defecto=$ar['MLF_OTROS_DEF'];
	$displasia_esqueletica=$ar['MLF_OTR_ESQ'];
	$hernia=$ar['MLF_OTR_HER'];
	$hidrops=$ar['MLF_OTR_HID'];
	$potter=$ar['MLF_OTR_SEC'];
	$errores_congenitas=$ar['MLF_OTR_ERR'];
	$distrofia_miotonica=$ar['MLF_OTR_MIO'];
	$cual_defecto=$ar['MALF_OTROS_CUAL'];
  $score=$ar['SCORE_NEOCOSUR'];
  $fallece=$ar['FALLECE_SALA_PARTO'];
  $observaciones=$ar['OBSERVACIONES'];
  
//echo "valooor".$otro_defecto;
?>

<div class="ficha panel panel-default">
  <div class="panel-body">
  <form name="ingreso"  method="post" action="Negocio/PartoBO.php">
    <button class="btn btn-success active subtitulo" type="button" ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Atención Inmediata</button>

    <div class="col-lg-12">

      <div class="form-group col-lg-6">
        <label for="oxigeno" class="col-lg-5 control-label">Oxígeno a presión positiva</label>
        <label for="oxigeno" class="control-label radio-inline col-lg-2">
          <input type="radio" name="oxigeno" value="1" <?php si($oxigeno);  ?>> Sí
        </label>
        <label for="oxigeno" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="oxigeno" value="0" <?php no($oxigeno);  ?>> No
        </label>
		 <input type="radio" name="oxigeno" value="null"  style="display:none"<?php check($oxigeno);  ?>>
      </div>

      <div class="clearfix visible-lg-block"></div>

      <div class="form-group col-lg-6">
        <label for="vent_masc" class="col-lg-5 control-label">Vent. masc.</label>
        <label for="vent_masc" class="control-label radio-inline col-lg-2">
          <input type="radio" name="vent_masc" value="1" <?php si($vent_masc);  ?>> Sí
        </label>
        <label for="vent_masc" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="vent_masc" value="0" <?php no($vent_masc);  ?>> No
        </label>
		<input type="radio" name="vent_masc" value="null" style="display:none" <?php check($vent_masc);  ?>> 
      </div>

      <div class="clearfix visible-lg-block"></div>

      <div class="form-group col-lg-6">
        <label for="intubacion" class="col-lg-5 control-label">Intubación</label>
        <label for="intubacion" class="control-label radio-inline col-lg-2">
          <input type="radio" name="intubacion" value="1" <?php si($intubacion);  ?>> Sí
        </label>
        <label for="intubacion" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="intubacion" value="0" <?php no($intubacion);  ?>> No
        </label>
		<input type="radio" name="intubacion" value="null" style="display:none" <?php check($intubacion);  ?>>
      </div>
      
      <div class="clearfix visible-lg-block"></div>

      <div class="form-group col-lg-6">
        <label for="masaje" class="col-lg-5 control-label">Masaje card.</label>
        <label for="masaje" class="control-label radio-inline col-lg-2">
          <input type="radio" name="masaje" value="1"  <?php si($masaje);  ?>> Sí
        </label>
        <label for="masaje" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="masaje" value="0"  <?php no($masaje);  ?>> No
        </label>
		<input type="radio" name="masaje" value="null" style="display:none" <?php check($masaje);  ?>>
      </div>

      <div class="clearfix visible-lg-block"></div>

      <div class="form-group col-lg-6">
        <label for="adrenalina" class="col-lg-5 control-label">Adrenalina</label>
        <label for="adrenalina" class="control-label radio-inline col-lg-2">
          <input type="radio" name="adrenalina" value="1" <?php si($adrenalina);  ?>> Sí
        </label>
        <label for="adrenalina" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="adrenalina" value="0" <?php no($adrenalina);  ?>> No
        </label>
		<input type="radio" name="adrenalina" value="null" style="display:none" <?php check($adrenalina);  ?>>
      </div>
	
	
      <div class="clearfix visible-lg-block" ></div>

      <div class="form-group col-lg-6">
        <label for="malformacion" class="col-lg-5 control-label">Malformación congénita mayor</label>
        <label for="malformacion" class="control-label radio-inline col-lg-2">
          <input type="radio" name="malformacion" value="1" id="malformacion_si" onClick="calc_scre();" <?php si($malformacion);  ?>> Sí
        </label>
        <label for="malformacion" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="malformacion" value="0" id="malformacion_no" onClick="calc_scre();" <?php no($malformacion);  ?>> No
        </label>
        <label for="malformacion" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="malformacion" value="-1" id="malformacion_s_i" onClick="calc_scre();" <?php sn($malformacion);  ?>> S/I
        </label>
		<input type="radio" name="malformacion" value="null" id="malformacion_s_i" style="display:none" <?php check($malformacion);  ?>> 
      </div>
      
      <div class="form-group col-lg-6 sub-form compromete">
        <label for="compromete" class="control-label radio-inline col-lg-5">
          <input type="radio" name="compromete" value="0" id="compromete_no" onClick="calc_scre();" <?php no($compromete);  ?>> No compromete la vida
        </label>
        <label for="compromete" class="control-label radio-inline col-lg-5" >
          <input type="radio" name="compromete"  value="1" id="compromete_si" onClick="calc_scre();" <?php si($compromete);  ?>> Compromete la vida
        </label>
		<input type="radio" name="compromete" value="null" id="fallece_sala_no" style="display:none"  <?php check($compromete);  ?>>
        <div class="form-group sub-form detalle_compromete">
             
          <div class="checkbox">
            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" id="sistema_nervioso" name="sistema_nervioso" class="detalle_compromete" value="" <?php si($sistema_nervioso);  ?>>
              Defectos del Sistema Nervioso Central
            </label>

            <div class="col-lg-offset-1 sub-form" id="detalle_sistema_nervioso">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="anecefalia" class="detalle_sistema_nervioso" value="" <?php si($anecefalia);  ?>>
                Anencefalia
              </label>
          
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="mielo" class="detalle_sistema_nervioso" value="mielo" <?php si($mielo);  ?> >
                Mielo-meningocele
              </label>

              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="hidranencefalia" class="detalle_sistema_nervioso" value="" <?php si($hidranencefalia);  ?>>
                Hidranencefalia
              </label>

              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="hidrocefalia" class="detalle_sistema_nervioso" value="" <?php si($hidrocefalia);  ?> >
                Hidrocefalia Congénita
              </label>

              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="holo" class="detalle_sistema_nervioso" value="" <?php si($holo);  ?>>
                Holo-prosencefalia
              </label>
            </div>

            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" name="cardiacos" class="detalle_compromete" id="cardiacos" value="" <?php si($cardiacos);  ?>>
              Defectos cardíacos
            </label>

            <div class="col-lg-offset-1 sub-form" id="detalle_defectos_cardiacos">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="tronco" class="detalle_defectos_cardiacos" value="" <?php si($tronco);  ?>>
                Tronco arterioso
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="transposicion" class="detalle_defectos_cardiacos" value="" <?php si($transposicion);  ?>>
                Transposición de los grandes vasos
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="fallot" class="detalle_defectos_cardiacos" value="" <?php si($fallot);?> >
                Tetralogía de Fallot
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="ventriculo_unico" class="detalle_defectos_cardiacos" value="" <?php si($ventriculo_unico);?>>
                Ventrículo único
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="doble_ventriculo_derecho" class="detalle_defectos_cardiacos" value="" <?php si($doble_ventriculo_derecho);?>>
                Doble salida de ventrículo derecho
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="canal_atrio" class="detalle_defectos_cardiacos" value="" <?php si($canal_atrio);?>>
                Canal atrio-ventricular completo
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_pulmonar" class="detalle_defectos_cardiacos" value="" <?php si($atresia_pulmonar);?>>
                Atresia pulmonar
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_tricuspide" class="detalle_defectos_cardiacos" value="" <?php si($atresia_tricuspide);?>>
                Artesia tricuspíde
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="hipoplasia" class="detalle_defectos_cardiacos" value="" <?php si($hipoplasia);?>>
                Hipoplasia de corazón izquierdo
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="interrupcion" class="detalle_defectos_cardiacos" value=""  <?php si($interrupcion);?>>
                Interrupción del arco aórtico
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="anomalia_retorno" class="detalle_defectos_cardiacos" value="" <?php si($anomalia_retorno);?>>
                Anomalía total del retorno venoso pulmonar
              </label>
            </div>

            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" name="gastrointestinales" class="detalle_compromete" id="defectos_gastrointestinal" value="" <?php si($gastrointestinales);?>>
              Defectos gastrointestinales
            </label>

            <div class="col-lg-offset-1 sub-form" id="detalle_defectos_gastrointestinal">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="fisura_paladar" class="detalle_defectos_gastrointestinal" value="" <?php si($fisura_paladar);?>>
                Fisura de paladar
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="fistula" class="detalle_defectos_gastrointestinal" value="" <?php si($fistula);?>>
                Fístula Traqueo-Esofágica
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_duodenal" class="detalle_defectos_gastrointestinal" value="" <?php si($atresia_duodenal);?>>
                Atresia Duodenal
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_yeyunal" class="detalle_defectos_gastrointestinal" value="" <?php si($atresia_yeyunal);?>>
                Atresia Yeyunal
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_ileal" class="detalle_defectos_gastrointestinal" value="" <?php si($atresia_ileal);?>>
                Atresia Ileal
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="atresia_intestino" class="detalle_defectos_gastrointestinal" value="" <?php si($atresia_intestino);?>>
                Atresia de intestino grueso y recto
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="ano_imperforado" class="detalle_defectos_gastrointestinal" value="" <?php si($ano_imperforado);?>>
                Ano imperforado
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="onfalocele" class="detalle_defectos_gastrointestinal" value="onfalocele" <?php si($onfalocele);?>>
                Onfalocele
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="gastrosquisis" class="detalle_defectos_gastrointestinal" value=""  <?php si($gastrosquisis);?>>
                Gastrosquisis
              </label>
            </div>

            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" name="genitourinarios" class="detalle_compromete" id="detalle_compromete" value="" <?php si($genitourinarios);?>>
              Defectos genitourinarios
            </label>
            <div class="col-lg-offset-1 sub-form" id="detalle_defectos_genitourinarios">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="agenesia" class="detalle_defectos_genitourinarios" value="" <?php si($agenesia);?>>
                Agenesia Renal Bilateral
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="renal" class="detalle_defectos_genitourinarios" value="renal" <?php si($renal);?>>
                Displasia Renal o Riñon poliquístico / multi-quístico bilateral
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="uropatia" class="detalle_defectos_genitourinarios" value="" <?php si($uropatia);?>>
                Uropatía obstructiva con Hidronefrosis congénita
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="ectrofia_vesical" class="detalle_defectos_genitourinarios" value="" <?php si($ectrofia_vesical);?>>
                Ectrofia vesical
              </label>
            </div>

            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" name="cromosomica" id="cromosomica" class="detalle_compromete" value="" <?php si($cromosomica);?>>
              Anomalías cromosómicas
            </label>

            <div class="col-lg-offset-1 sub-form" id="detalle_defectos_cromosomicas">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="trisomia_13" class="detalle_defectos_cromosomicas" value="" <?php si($trisomia_13);?>>
                Trisomía 13
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="trisomia_18" class="detalle_defectos_cromosomicas" value="" <?php si($trisomia_18);?>>
                Trisomía 18
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="trisomia_21" class="detalle_defectos_cromosomicas" value="" <?php si($trisomia_21);?>>
                Trisomía 21
              </label>
            </div>

            <label for="" class="control-label txt_izq col-lg-12">
              <input type="checkbox" name="otro_defecto" id="otro_defecto" class="detalle_compromete" value=""  <?php si($otro_defecto);?>>
              Otros defectos
            </label>

            <div class="col-lg-offset-1 sub-form" id="detalle_defectos_otros">
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="displasia_esqueletica" class="detalle_defectos_otros" value="" <?php si($displasia_esqueletica);?>>
                Displasia esquelética
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="hernia" class="detalle_defectos_otros" value="" <?php si($hernia);?>>
                Hernia diafragmática congénita
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="hidrops" class="detalle_defectos_otros" value="" <?php si($hidrops);?>>
                Hidrops fetal
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="potter" class="detalle_defectos_otros" value="" <?php si($potter);?>>
                Secuencia de Potter
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="errores_congenitas" class="detalle_defectos_otros" value="" <?php si($errores_congenitas);?>>
                Errores congénitos del metabolismo
              </label>
              <label for="" class="control-label txt_izq col-lg-12">
                <input type="checkbox" name="distrofia_miotonica" class="detalle_defectos_otros" value="" <?php si($distrofia_miotonica);?>>
                Distrofia miotónica
              </label>
            </div>


            <div id="cual_defecto" class="sub-form">
              <label for="cual_defecto" class="col-lg-3 txt_izq control-label">Si es otro, cuál?</label>
                <div class="col-lg-9">
                  <input type="text" name="cual_defecto" value="<?php echo $cual_defecto; ?>" class="form-control input-sm">
                </div>
            </div>  
            </div>

            <label for="obs_malformaciones" class="col-lg-12 control-label">
              Observaciones
            </label>
            <div>
              <textarea class="form-control" name="obs_malformaciones" rows="null"><?php echo $observaciones; ?></textarea>
            </div>
          </div>
        </div>
      
      <div class="clearfix visible-lg-block" ></div>    

      <div class="form-group col-lg-6">
        <label for="score" class="col-lg-5 control-label">Score Neocosur</label>
        <div class="col-lg-7">
          <input type="number" min="0" max="10" step="0.001" name="score" id="score" value="<?php echo round($score,3) ; ?>" class="form-control input-sm" >
        </div>
      </div>

      <div class="clearfix visible-lg-block" ></div>

      <div class="form-group col-lg-6">
        <label for="fallece" class="col-lg-5 control-label">Fallece en Sala de Parto</label>
        <label for="fallece" class="control-label radio-inline col-lg-2">
          <input type="radio" name="fallece" value="1" id="fallece_sala_si" <?php si($fallece);  ?>> Sí
        </label>
        <label for="fallece" class="control-label radio-inline col-lg-2" >
          <input type="radio" name="fallece" value="0" id="fallece_sala_no__" <?php no($fallece);  ?>> No
        </label>
		<input type="radio" name="fallece" value="null" id="fallece_sala_no_"  style="display:none" <?php check($fallece);  ?>>
      </div>
    </div>

    <div class=" col-lg-offset-10 col-lg-2">
         <input type="hidden" name="idOculto" id="idoculto" value="<?php echo $id; ?>"/>
		 <input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
    </div>
    </form>       
  </div>
</div>
