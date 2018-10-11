<?php 
error_reporting(0);
include 'capaDAO/patologias_neonatalesDAO.php';
include 'capaDAO/sepsisDAO.php';
include '../ayuda.php';
//hola();
$dao = new patologias_neonatalesDAO($cone);

$ar = $dao->buscarId($id);


$sdr = $ar['CLINICA_SDR'];
$radio_torax = $ar['RADIOGRAFIA_TORAX_ALTERADA'];
$oxigeno_28 = $ar['OXIGENO_28_DIAS'];
$oxigeno_36 = $ar['OXIGENO_36_SEMANAS'];
$alveolar = $ar['RUP_ALVEOLAR'];
$alveo_neumotorax = $ar['RUP_ALVEOLAR_NEUMOTORAX'];
$alveo_neumomedia = $ar['RUP_ALVEOLAR_NEUMOMEDIASTINO'];
$alveo_enfisema = $ar['RUP_ALVEOLAR_EFISEMA_INTERSTICIAL'];
$eco_cerebral_1 = $ar['ECO_CEREBRAL_MENOR_7_DIAS'];
$eco_cerebral_2 = $ar['ECO_CEREBRAL_7_21_DIAS'];
$eco_cerebral_3 = $ar['ECO_CREBRAL_MAYOR_21_DIAS'];
$hic = $ar['HIC'];
$grado = $ar['ID_HIC_GRADO'];
$leucomalacia =	$ar['LEUCOMALACIA'];
$hidrocefalia = $ar['HIDROCEFALIA'];
$convulsiones =	$ar['CONVULSIONES'];
$ductus = $ar['DUCTUS'];
$duct_clin = $ar['DUCTUS_CLINICO'];
$duc_ecog = $ar['DUCTUS_ECOGRAFICO'];
$enterocolitis = $ar['DG_ENTEROCOLITIS_DIAS'];
$ecn = $ar['ENTEROCOLITIS_'];
$intestin = $ar['PERFORACION_INTESTINAL'];
$hemorragia_pulmonar=	$ar['HEMORRAGIA_PULMONAR'];

$previa_alta = $ar['EVALUACION_OFTALMOLOGICA_PREVIA_ALTA'];
$rop_izq = $ar['ROP_OJO_IZQ'];
$zona_izq = $ar['ID_LOCALIZACION_OJO_IZQ'];
$severidad_izq = $ar['ID_SEVERIDAD_OJO_IZQ'];
$plus_izq = $ar['ENF_PLUS_OJO_IZQ'];
$cirugia_izq = $ar['CIRUGIA_ROP_OJO_IZQ'];
$detalle_cirugia_izq =	$ar['ID_TIPO_CIRUGIA_ROP_OJO_IZQ'];

$rop_der = $ar['ROP_OJO_DER'];
$zona_der = $ar['ID_LOCALIZACION_OJO_DER'];
$displasia = $ar['ID_SEVERIDAD_DISPLACIA'];
$plus_der = $ar['ENF_PLUS_OJO_DER'];
$cirugia_der =	$ar['CIRUGIA_ROP_OJO_DER'];
$detalle_cirugia_der =	$ar['ID_TIPO_CIRUGIA_ROP_OJO_DER'];
$fondo_ojo = $ar['PRIMER_FONDO_OJO_DIAS'];
$bevacizumab = $ar['BEVACIZUMAB'];
$sepsis_precoz = $ar['SEPSIS_PRECOZ'];
$germen = $ar['ID_TIPO_GERMEN_PRECOZ'];
$hemocultivo = $ar['SEPSIS_PRECOZ_HEMOCULTIVO'];
$lcr_positivo =	$ar['SEPSIS_PRECOZ_LCR_POSITIVO'];
$sepsis_tardia = $ar['SEPSIS_TARDIA'];
$num_sepsis = $ar['NUMERO_SEPSIS_CLINICAS'];
$severidad_der = $ar['ID_SEVERIDAD_OJO_DER'];
$pesquisa=$ar['EVA_PESQUISA'];
$peat_automatizados=$ar['EVA_AUTO'];
$peat_automatizados_normal=$ar['EVA_AUTO_NOR'];
$peat_extendidos=$ar['EVA_EXT'];
$peat_extendidos_normal=$ar['EVA_EXT_NOR'];
$emisiones= $ar['EVA_EMI'];
$emisiones_normal=$ar['EVA_EMI_NOR'];

$daoSepsis = new sepsisDAO($cone);

//print_r($daoCiru);die;
$arC=$daoSepsis->buscarId($id); 
?>
<div class="ficha panel panel-default" id="patologias_neonatales">
  <div class="panel-body">
  <form action="Negocio/NeonatalesBO.php" method="post">
    <button class="btn btn-success active subtitulo" type="button" id="sec_principal_neonatales"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Patologías Neonatales</button>

    <button class="btn btn-default subtitulo" type="button" id="sec_oftalmologica"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Evaluación oftalmológica</button>

    <button class="btn btn-default subtitulo" type="button" id="sec_sepsis"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Sepsis</button>

    <button class="btn btn-default subtitulo" type="button" id="sec_auditivo"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Evaluación Auditiva</button>


    <div id="principal_neonatales"> 
    
      <div class="col-lg-12">    

        <div class="form-group col-lg-6">
          <label for="sdr" class="col-lg-5 control-label">Clínica SDR 
          <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Si: Presenta quejido, retracción, aleteo nasal, respiración paradojal, cianosis o requerimientos de 02 en las primeras 24 horas."></span>
          </label>
          <label for="sdr" class="control-label radio-inline col-lg-2">
              <input type="radio" name="sdr" value="1" <?php  si($sdr); ?> > Sí
          </label>
          <label for="sdr" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="sdr" value="0" <?php  no($sdr); ?> > No
          </label>
            <input type="radio" name="sdr" value="null"  style="display:none" <?php check($sdr); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="radio_torax" class="col-lg-5 control-label">Radiografía tórax alterada 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Si: En las primeras 24 horas tiene opacidad difusa, patrón reticulonodular, infiltrado alveolar o volumen pulmonar disminuido."></span>
          </label>
          <label for="radio_torax" class="control-label radio-inline col-lg-2">
            <input type="radio" name="radio_torax" value="1" <?php  si($radio_torax); ?> > Sí
          </label>
          <label for="radio_torax" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="radio_torax" value="0" <?php  no($radio_torax); ?> > No
          </label>
            <input type="radio" name="radio_torax" value="null"  style="display:none" <?php check($radio_torax); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="oxigeno_28" class="col-lg-5 control-label">Oxígeno 28 días 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Si: Recibe O2 por más de 28 días."></span>
          </label>
          <label for="oxigeno_28" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxigeno_28" value="1" <?php  si($oxigeno_28); ?> > Sí
          </label>
          <label for="oxigeno_28" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_28" value="0" <?php  no($oxigeno_28); ?> > No
          </label>
          <label for="oxigeno_28" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_28" value="-1" <?php sn($oxigeno_28); ?> > S/I
          </label>
            <input type="radio" name="oxigeno_28" value="null"  style="display:none" <?php check($oxigeno_28); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="oxigeno_36" class="col-lg-5 control-label">Oxígeno 36 sem. 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Se refiere a requerimientos de O2 a las 36 semanas de EC. <br>S/I: Si es trasladado."></span>
          </label>
          <label for="oxigeno_36" class="control-label radio-inline col-lg-2">
            <input type="radio" name="oxigeno_36" value="1" <?php  si($oxigeno_36); ?> > Sí
          </label>
          <label for="oxigeno_36" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_36" value="0" <?php  no($oxigeno_36); ?> > No
          </label>
          <label for="oxigeno_36" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="oxigeno_36" value="-1" <?php  sn($oxigeno_36); ?> > S/I
          </label>
            <input type="radio" name="oxigeno_36" value="null"  style="display:none" <?php check($oxigeno_36); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="displasia" class="col-lg-5 control-label">Severidad Displasia BP 
          <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Se definida en manual operativo. <br>
          Leve: Sin req O2 a 36 semanas.<br>
          Moderada: Req O2 pero <30% a 36 semanas.<br>
          Severa: Req O2 > 36 semanas o CPAP o V Mec. a las 36 semanas.<br>
          Sin información (S/I): Si el RN fallece o es trasladado antes de las 36 semanas."></span>
          </label>
          <div class="col-lg-7">
            <select name="displasia" class="form-control input-sm">
                <option value="">Seleccione</option>
               <?php cargarSelect("severidad_param",$cone,"id_severidad_param","descripcion",$displasia);?>
            </select>
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="alveolar" class="col-lg-5 control-label">Rup. Alveolar</label>
          <label for="alveolar" class="control-label radio-inline col-lg-2">
            <input type="radio" name="alveolar" value="1" <?php  si($alveolar); ?> id="alveolar_si" > Sí
          </label>
          <label for="alveolar" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="alveolar" value="0" <?php  no($alveolar); ?> id="alveolar_no"> No
          </label>
          <label for="alveolar" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="alveolar" value="-1" <?php  sn($alveolar); ?> id="alveolar_s_i"> S/I
          </label>
          <input type="radio" name="alveolar" value="null"  style="display:none" <?php check($alveolar); ?>>
        </div>

       <div class="form-group col-lg-6 sub-form cual_alveolar">
          <label for="cual_alveolar" class="col-lg-5 control-label">¿Cuál?</label>
          <div class="checkbox">
            <label for="" class="control-label txt_izq col-lg-12 margin-left">
              <input type="checkbox" name="alveo_neumotorax" value="1" class="detalle_alveolar" <?php  si($alveo_neumotorax); ?>>
              Neumotórax
            </label>
            <label for="" class="control-label txt_izq col-lg-12 margin-left">
              <input type="checkbox" name="alveo_neumomedia" value="1" class="detalle_alveolar" <?php  si($alveo_neumomedia); ?>>
              Neumomediastino
            </label>

            <label for="" class="control-label txt_izq col-lg-12 margin-left">
              <input type="checkbox" name="alveo_enfisema" value="1" class="detalle_alveolar" <?php  si($alveo_enfisema); ?>>
              Enfisema Intersticial
            </label>
          </div>            
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="eco_cerebral_1" class="col-lg-5 control-label">Eco cerebral < 7 días</label>
          <label for="eco_cerebral_1" class="control-label radio-inline col-lg-2">
            <input type="radio" name="eco_cerebral_1" value="1" <?php  si($eco_cerebral_1); ?> > Sí
          </label>
          <label for="eco_cerebral_1" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="eco_cerebral_1" value="0" <?php  no($eco_cerebral_1); ?> > No
          </label>
          <input type="radio" name="eco_cerebral_1" value="null"  style="display:none" <?php check($eco_cerebral_1); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="eco_cerebral_2" class="col-lg-5 control-label">Eco cerebral 7-21 días</label>
          <label for="eco_cerebral_2" class="control-label radio-inline col-lg-2">
            <input type="radio" name="eco_cerebral_2" value="1" <?php  si($eco_cerebral_2); ?> > Sí
          </label>
          <label for="eco_cerebral_2" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="eco_cerebral_2" value="0" <?php  no($eco_cerebral_2); ?> > No
          </label>
          <input type="radio" name="eco_cerebral_2" value="null"  style="display:none" <?php check($eco_cerebral_2); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="eco_cerebral_3" class="col-lg-5 control-label">Eco cerebral > 21 días</label>
          <label for="eco_cerebral_3" class="control-label radio-inline col-lg-2">
            <input type="radio" name="eco_cerebral_3" value="1" <?php  si($eco_cerebral_3); ?> > Sí
          </label>
          <label for="eco_cerebral_3" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="eco_cerebral_3" value="0" <?php  no($eco_cerebral_3); ?> > No
          </label>
          <input type="radio" name="eco_cerebral_3" value="null"  style="display:none" <?php check($eco_cerebral_3); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="hic" class="col-lg-5 control-label">HIC (Grado)
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" 
            title="Diagnóstico por ultrasonografía o autopsia grados 1 a 4 según Papille.<br>
            Sin información se utiliza cuando RN fallece precozmente y no se realiza ECO."></span>
          </label>
          <label for="hic" class="control-label radio-inline col-lg-2">
            <input type="radio" name="hic" id ="hic_si" value="1" <?php  echo si($hic); ?> > Sí
          </label>
          <label for="hic" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="hic" id ="hic_no" value="0" <?php echo  no($hic); ?> > No
          </label>
          <label for="hic" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="hic" id="hic_s_i" value="-1" <?php  sn($hic); ?>> S/I
          </label>
            <input type="radio" name="hic" value="null"  style="display:none" <?php check($hic); ?> >
        </div>

        <div class="form-group col-lg-6 sub-form hic_grado">    
          <label for="grado" class="col-lg-5 control-label">Grado</label>
          <div class="col-lg-7">
            <select name="grado" class="form-control input-sm">
              <option value="">Seleccione</option>
              <?php cargarSelect("neonatal_hic_grado_param",$cone,"id_neonatal_hic_grado_param","descripcion",$grado);?>
            </select> 
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="leucomalacia" class="col-lg-5 control-label">Leucomalacia</label>
          <label for="leucomalacia" class="control-label radio-inline col-lg-2">
            <input type="radio" name="leucomalacia" value="1" <?php  si($leucomalacia); ?> > Sí
          </label>
          <label for="leucomalacia" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="leucomalacia" value="0" <?php  no($leucomalacia); ?> > No
          </label>
          <input type="radio" name="leucomalacia" value="null"  style="display:none" <?php check($leucomalacia); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="hidrocefalia" class="col-lg-5 control-label">Hidrocefalia</label>
          <label for="hidrocefalia" class="control-label radio-inline col-lg-2">
            <input type="radio" name="hidrocefalia" value="1" <?php echo si($hidrocefalia); ?> > Sí
          </label>
          <label for="hidrocefalia" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="hidrocefalia" value="0" <?php  echo no($hidrocefalia); ?> > No
          </label>
          <input type="radio" name="hidrocefalia" value="null"  style="display:none" <?php check($hidrocefalia); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="convulsiones" class="col-lg-5 control-label">Convulsiones</label>
          <label for="convulsiones" class="control-label radio-inline col-lg-2">
            <input type="radio" name="convulsiones" value="1" <?php  si($convulsiones); ?> > Sí
          </label>
          <label for="convulsiones" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="convulsiones" value="0" <?php  no($convulsiones); ?> > No
          </label>
          <input type="radio" name="convulsiones" value="null"  style="display:none" <?php check($convulsiones); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="ductus" class="col-lg-5 control-label">Ductus</label>
          <label for="ductus" class="control-label radio-inline col-lg-2">
            <input type="radio" name="ductus" value="1" <?php  si($ductus); ?> id="ductus_si" > Sí
          </label>
          <label for="ductus" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="ductus" value="0" <?php  no($ductus); ?> id="ductus_no" > No
          </label>
          <label for="ductus" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="ductus" value="-1" <?php sn($ductus); ?> id="ductus_s_i" > S/I
          </label>
          <input type="radio" name="ductus" value="null"  style="display:none" <?php check($ductus); ?> >
        </div>

        <div class="form-group col-lg-6 sub-form ductus">
          <label for="cual_ductus" class="col-lg-12 control-label">¿Cuál?</label>
          <div class="checkbox">
            <label for="" class="control-label txt_izq col-lg-12 margin-left">
              <input type="checkbox" name="duct_clin" value="1" class="detalle_ductus" <?php  si($duct_clin); ?>>
              Clínico
            </label>
            <label for="" class="control-label txt_izq col-lg-12 margin-left">
              <input type="checkbox" name="duct_ecog" value="1" class="detalle_ductus" <?php  si($duc_ecog); ?>>
              Ecográfico
            </label>
          </div>            
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="enterocolitis" class="col-lg-5 txt_izq control-label">Dg. Enterocolitis</label>
          <div class="col-lg-6 input-group linea">
              <input type="number" min="1" max="100" step="1" name="enterocolitis" value="<?php echo $enterocolitis; ?>" class="form-control input-sm">
            <span class="input-group-addon" id="basic-addon2">días</span>
          </div>
        </div>  

        <div class="clearfix visible-lg-block"></div>


        <div class="form-group col-lg-6">
          <label for="ecn" class="col-lg-5 control-label">ECN 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si: Radipgrafía con neumatosis o perforación o diagnóstivo en cirugía o anatomía patológica."></span>
          </label>
          <label for="ecn" class="control-label radio-inline col-lg-2">
            <input type="radio" name="ecn" value="1" <?php  si($ecn); ?> > Sí
          </label>
          <label for="ecn" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="ecn" value="0" <?php  no($ecn); ?> > No
          </label>
            <input type="radio" name="ecn" value="null"  style="display:none" <?php check($ecn); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="intestin" class="col-lg-5 control-label">Perf. intestin</label>
          <label for="intestin" class="control-label radio-inline col-lg-2">
            <input type="radio" name="intestin" value="1" <?php  si($intestin); ?> > Sí
          </label>
          <label for="intestin" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="intestin" value="0" <?php  no($intestin); ?> > No
          </label>
          <input type="radio" name="intestin" value="null"  style="display:none" <?php check($intestin); ?> >
        </div>
		<div class="clearfix visible-lg-block"></div>
	<div class="form-group col-lg-6">
			          	<label for="hemorragia_pulmonar" class="col-lg-5 control-label">Hemorragia Pulmonar</label>
			          	<label for="hemorragia_pulmonar" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="hemorragia_pulmonar" value="1" id="hemorragia_pulmonar_si"<?php si($hemorragia_pulmonar);?>  > Sí
			          	</label>
			          	<label for="vnni" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="hemorragia_pulmonar" value="0" id="hemorragia_pulmonar_no" <?php no($hemorragia_pulmonar);?>> No
			          	</label>
						<input type="radio" name="hemorragia_pulmonar" value="null" id="hemorragia_pulmonar_no" style="display:none" <?php check($hemorragia_pulmonar);?>>
	</div>	
      </div>

    </div>

    <div id="oftalmologica">
      <div class="col-lg-12">    

        <div class="form-group col-lg-6">
          <label for="previa_alta" class="col-lg-5 control-label">Evaluación previa al alta</label>
          <label for="previa_alta" class="control-label radio-inline col-lg-2">
            <input type="radio" name="previa_alta" value="1" id="previa_alta_si"  <?php  si($previa_alta); ?> > Sí
          </label>
          <label for="previa_alta" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="previa_alta" value="0"  id="previa_alta_no"  <?php  no($previa_alta); ?> > No
          </label>
          <input type="radio" name="previa_alta" value="null"  style="display:none" <?php check($previa_alta); ?> >
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-10 sub-form tabla_previa_alta">
          <table class="table table-bordered">
            <thead>
              <tr>
                
                <td>ROP</td>
                <td>Localización 
                  <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Esquema del fondo de ojo para la clasificación de la retinopatía del prematuro."></span>
				  <a rel="shadowbox;width=603;height=403;" title="Esquema del fondo de ojo para la clasificaci�n de la Retinopat�a del prematuro" href="img/esquema.html">
				  <img src="img/eye--plus.ico"></a>
                </td>
                <td>Severidad</td>
                <td>Enf. Plus</td>
                <td>Cirugía ROP</td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>
                  <label for="rop_izq" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta"  value="1" <?php  si($rop_izq); ?> > Sí
                  </label>
                  <label for="rop_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta" value="0" <?php  no($rop_izq); ?> > No
                  </label>
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta"  value="null"  style="display:none" <?php check($rop_izq); ?> >
                </td>
                <td>
                  <select name="zona_izq" class="form-control input-sm detalle_tabla_previa_alta">
                    <option value="">Seleccione</option>
                    <?php cargarSelect("localizacion_neonatal_param",$cone,"id_localizacion_neonatal_param","descripcion",$zona_izq);?>
                  </select> 
                </td>
                <td>
                  <select name="severidad_izq" class="form-control input-sm detalle_tabla_previa_alta">
                    <option value="">Seleccione</option>
                    <?php cargarSelect("severidad_neonatal_param",$cone,"id_severidad_neonatal_param","descripcion",$severidad_izq);?>
                  </select> 
                </td>
                <td>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="plus_izq" class="detalle_tabla_previa_alta" value="1" <?php  si($plus_izq); ?> > Sí
                  </label>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="plus_izq" value="0" class="detalle_tabla_previa_alta" <?php  no($plus_izq); ?>  > No
                  </label>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="plus_izq" value="-1" class="detalle_tabla_previa_alta" <?php  sn($plus_izq); ?> > S/I
                  </label>
                    <input type="radio" name="plus_izq" value="null" class="detalle_tabla_previa_alta"  style="display:none" <?php check($plus_izq); ?> >
                </td>
                <td>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="cirugia_izq" value="1" <?php  si($cirugia_izq); ?> id="cirugia_izq_si" class="detalle_tabla_previa_alta"  > Sí
                  </label>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="cirugia_izq" value="0" <?php  no($cirugia_izq); ?> id="cirugia_izq_no" class="detalle_tabla_previa_alta" > No
                  </label>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="cirugia_izq" value="-1" <?php  sn($cirugia_izq); ?> id="cirugia_izq_s_i" class="detalle_tabla_previa_alta"> S/I
                  </label>
                    <input type="radio" name="cirugia_izq" value="null"  style="display:none" <?php check($cirugia_izq); ?> id="cirugia_izq_s_i" class="detalle_tabla_previa_alta"> 
                  <div class="clearfix visible-lg-block"></div>
                  
                  <div id="detalle_cirugia_izq" class="sub-form">
                    <label for="detalle_cirugia_izq" class="txt_izq control-label">¿Cuál?</label>
                    <select name="detalle_cirugia_izq" class="form-control input-sm detalle_tabla_previa_alta" id="cual_cirugia_izq">
                      <option value="">Seleccione</option>
					 <?php cargarSelect("cirugia_neonatal_param",$cone,"id_cirugia_neonatal_param","descripcion",$detalle_cirugia_izq);?>
                  </select> 
                    </select> 
                  </div>

                </td>
              </tr>
              <!--<tr>
                <td>Derecho</td>
                <td>
                  <label for="rop_der" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="rop_der" value="1" <?php  si($rop_der); ?> class="detalle_tabla_previa_alta"  > Sí
                  </label>
                  <label for="rop_der" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="rop_der" value="0" <?php  no($rop_der); ?> class="detalle_tabla_previa_alta"  > No
                  </label>
                    <input type="radio" name="rop_der" value="null"  style="display:none" <?php check($rop_der); ?> class="detalle_tabla_previa_alta"  > Sí
                </td>
                <td>
                  <select name="zona_der" class="form-control input-sm detalle_tabla_previa_alta">
                    <option value="0">Seleccione</option>
                    <option value="1">Zona I</option>
                    <option value="2">Zona II</option>
                  </select> 
                </td>
                <td>
                  <select name="severidad_der" class="form-control input-sm detalle_tabla_previa_alta">
                    <option value="0">Seleccione</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select> 
                </td>
                <td>
                  <label for="plus_der" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="plus_der" value="1" <?php  si($plus_der); ?> class="detalle_tabla_previa_alta" > Sí
                  </label>
                  <label for="plus_der" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="plus_der" value="0" <?php  no($plus_der); ?> class="detalle_tabla_previa_alta"  > No
                  </label>
                  <label for="plus_der" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="plus_der" value="-1" <?php  sn($plus_der); ?> class="detalle_tabla_previa_alta" > S/I
                  </label>
                    <input type="radio" name="plus_der" value="null"  style="display:none" <?php check($plus_der); ?> class="detalle_tabla_previa_alta"  >
                </td>
                <td>
                  <label for="cirugia_der" class="control-label radio-inline col-lg-3">
                    <input type="radio" name="cirugia_der" value="1" <?php  si($cirugia_der); ?> id="cirugia_der_si" class="detalle_tabla_previa_alta"  > Sí
                  </label>
                  <label for="cirugia_der" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="cirugia_der" value="0" <?php  no($cirugia_der); ?> id="cirugia_der_no" class="detalle_tabla_previa_alta"  > No
                  </label>
                  <label for="cirugia_der" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="cirugia_der" value="-1" <?php  sn($cirugia_der); ?> id="cirugia_der_s_i" class="detalle_tabla_previa_alta" > S/I
                  </label>
                    <input type="radio" name="cirugia_der" value="null"  style="display:none" <?php check($cirugia_der); ?> id="cirugia_der_s_i" class="detalle_tabla_previa_alta" >
                  <div class="clearfix visible-lg-block"></div>
                  
                  <div id="detalle_cirugia_der" class="sub-form">
                    <label for="detalle_cirugia_der" class="txt_izq control-label">¿Cuál?</label>
                    <select name="detalle_cirugia_der" class="form-control input-sm detalle_tabla_previa_alta" id="cual_cirugia_der">
                      <option value="0">Seleccione</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select> 
                  </div>

                </td>
              </tr>-->
            </tbody>
          </table>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="fondo_ojo" class="col-lg-5 control-label">1<sup>er</sup> fondo ojo</label>
          <div class="col-lg-3 input-group linea">
            <input type="number" min="1" max="100" step="1" value="<?php echo $fondo_ojo; ?>" name="fondo_ojo" class="form-control input-sm" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">días</span>
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="bevacizumab" class="col-lg-5 control-label">Bevacizumab</label>
          <label for="bevacizumab" class="control-label radio-inline col-lg-2">
            <input type="radio" name="bevacizumab" value="1" <?php  si($bevacizumab); ?> > Sí
          </label>
          <label for="bevacizumab" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="bevacizumab" value="0" <?php  no($bevacizumab); ?> > No
          </label>
          <input type="radio" name="bevacizumab" value="null"  style="display:none" <?php check($bevacizumab); ?> > 
        </div>

      </div>
    </div>

    <div id="sepsis">
      <div class="col-lg-12">

        <div class="form-group col-lg-6">
          <label for="sepsis_precoz" class="col-lg-5 control-label">Sepsis Precoz 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si: Hemocultivo positivo en primeras 72 horas de vida."></span>
          </label>
          <label for="sepsis_precoz" class="control-label radio-inline col-lg-2">
            <input type="radio" name="sepsis_precoz" value="1" <?php  si($sepsis_precoz); ?> id="sepsis_precoz_si"  > Sí
          </label>
          <label for="sepsis_precoz" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="sepsis_precoz" value="0" <?php  no($sepsis_precoz); ?> id="sepsis_precoz_no"  > No
          </label>
            <input type="radio" name="sepsis_precoz" value="null"  style="display:none" <?php check($sepsis_precoz); ?> id="sepsis_precoz_si"  >
        </div>

        <div class="form-group col-lg-6 sub-form" id="detalle_sepsis_precoz">
          <label for="germen" class="col-lg-2 control-label">Germen</label>
          <div class="col-lg-10">
              <select name="germen" class="form-control input-sm detalle_sepsis_precoz">
                <option value="">Seleccione</option>
                <?php cargarSelect("sepsi_germen_param",$cone,"id_sepsi_germen_param","descripcion",$germen);?>
              </select> 
            </div>

          <div class="checkbox">
            <label for="" class="control-label txt_izq col-lg-8 col-lg-offset-4 margin-left">
              <input type="checkbox" name="hemocultivo" value="" class="detalle_sepsis_precoz" <?php echo   si($hemocultivo); ?>>
              Hemocultivo
            </label>
            <label for="" class="control-label txt_izq col-lg-8 col-lg-offset-4 margin-left">
              <input type="checkbox" name="lcr_positivo" value="" class="detalle_sepsis_precoz" <?php echo si($lcr_positivo); ?>>
              LCR positivo
            </label>
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="sepsis_tardia" class="col-lg-5 control-label">Sepsis Tardía 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si: Hemocultivo positivo después de las 72 horas de vida y antibióticos por más de 5 días o menos si fallece."></span>
          </label>
          <label for="sepsis_tardia" class="control-label radio-inline col-lg-2">
            <input type="radio" name="sepsis_tardia" value="1" <?php  si($sepsis_tardia); ?> id="sepsis_tardia_si"  > Sí
          </label>
          <label for="sepsis_tardia" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="sepsis_tardia" value="0" <?php  no($sepsis_tardia); ?> id="sepsis_tardia_no"  > No
          </label>
            <input type="radio" name="sepsis_tardia" value="null"  style="display:none" <?php check($sepsis_tardia); ?> id="sepsis_tardia_si"  >
        </div>
        
        <div class="clearfix visible-lg-block"></div>
        
        <div class="form-group col-lg-6">
          <div class="form-group" id="num_sepsis">
            <label for="num_sepsis" class="col-lg-5 txt_izq control-label">N° de sepsis clínicas 
              <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Cuadro clínico de spesis, pero con cultivo negativo y tratado por más de 5 días o menos si fallece."></span>
            </label>
            <div class="col-lg-3">
                <input type="number" min="1" max="99" step="1" name="num_sepsis" value="<?php echo $num_sepsis; ?>" class="form-control input-sm">
            </div>
          </div>  
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group sub-form" id="detalle_sepsis_tardia">
          <table class="table table-bordered" id="tabla_sepsis">
            <thead>
              <tr>
                <td class="col-lg-1"></td>
                <td class="col-lg-2">Edad</td>
                <td class="col-lg-2">Germen</td>
                <td class="col-lg-4"></td>
                <td class="col-lg-3"></td>
                <td class="col-lg-1"></td>
              </tr>
            </thead>
            <tbody>
			<?php
					while($arC!=null && $arr = $arC->fetch_array())
					 {
					   
						?>
						<tr>
						<td></td>
						<td><?php echo $arr['dias']; ?></td>
						<td><?php echo $arr['descripcion']; ?></td>
						<td><?php echo $arr['otro']; ?></td>
						<td><?php   if($arr['he_lcr']!=''){ echo $arr['he_lcr']=='0' ? 'Hemocultivo':'LCR positivo';} ?></td>
						<td>
						<a href ="regCentros.php?id_sepsis=<?php echo $arr['id_sepsis'] ?>&idOculto=<?php echo $id; ?>" style='background:url("../img/eliminar.jpg") left center no-repeat;padding-left:12px;width:26; height:23px '></a>
						<input type="hidden" name="id_sepsis" id="idCirugia" value="<?php echo $arr['id_sepsis'] ?>" />
						</td>
						</tr>
						<?php
						}
						?>
			
              <tr class="fila_oculta">
                <td></td>
                <td>
                  <div class="input-group linea">
                    <input type="number" min="1" max="999" step="1" name="detalle_sepsis_tardia_dias[]" class="form-control input-sm detalle_sepsis_tardia" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">días</span>
                  </div>
                </td>
                  
                <td>
                  <select name="detalle_sepsis_tardia_germen[]" class="form-control input-sm detalle_sepsis_tardia detalle_sepsis_tardia_germen" id="">
                    <option value="">Seleccione</option> 
                <?php cargarSelect("sepsis_param",$cone,"id_sepsis_param","descripcion",$detalle_sepsis_tardia_germen);?>
                  </select> 
                </td>

                <td>
                  <div class="sub-form detalle_sepsis_tardia_otro">
                    <label for="detalle_sepsis_tardia_otro" class="txt_izq control-label">Si es otro, cuál?</label>
                  </div>
                  <div class="col-lg-7 sub-form detalle_sepsis_tardia_otro">
                    <input type="text" name="detalle_sepsis_tardia_otro[]" value="<?php echo $detalle_sepsis_tardia_otro; ?>" class="form-control input-sm detalle_sepsis_tardia_otro">
                  </div>
                </td>
                <td>
                  <!--
                  <label for="sepsis_tardia_tipo" class="control-label radio-inline col-lg-6" >
                    <input type="radio" name="sepsis_tardia_tipo" value="hemocultivo" id="sepsis_tardia_hemocultivo"> Hemocultivo
                    <input type="radio" name="sepsis_tardia_tipo" value="lcr" id="sepsis_tardia_lcr"> LCR positivo
                  </label>
                -->
                </td>
                <td><button type="button" class="btn btn-danger btn-xs eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
              </tr>

              
            </tbody>
          </table>

          <div class="col-lg-2">
            <button type="button" class="btn btn-info" id="agregar_tabla_sepsis">Agregar Sepsis</button>
          </div>
        </div>

      </div>
    </div>

    <div id="auditivo">
      <div class="col-lg-6">
        <div class="form-group col-lg-12">

          <label for="" class="col-lg-4 control-label">Pesquisa antes del alta</label>
          <label for="" class="control-label radio-inline col-lg-2">
            <input type="radio" name="pesquisa" value="1" class="" id="pesquisa_si"  <?php si($pesquisa);  ?> > Sí
          </label>
          <label for="" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="pesquisa" value="0" class="" id="pesquisa_no"  <?php no($pesquisa);  ?> > No
          </label>
			<input type="radio" name="pesquisa" value="null" style="display:none" <?php check($pesquisa);  ?>> 
        </div>
      </div>
        <div class="col-lg-6" id="tabla_auditivo">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td colspan="3"><h5><b>Evaluación al alta</b></h5></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-lg-1"><input type="checkbox" name="peat_automatizados" value="" class="form-check-input check-auditivo" id="peat_automatizados" <?php si($peat_automatizados);  ?> ></td>
                <td class="col-lg-4">Potenciales Evocados del Tronco Cerebral (PEAT) Automatizados
                </td>
                <td class="col-lg-2">
                  <div id="peat_automatizados_cel">
                    ¿Normal?<br>
                    <label for="" class="control-label radio-inline col-lg-1">
                      <input type="radio" name="peat_automatizados_normal" value="1" class="check-auditivo"  <?php si($peat_automatizados_normal);  ?>> Sí
                    </label>
                    <label for="" class="control-label radio-inline col-lg-1" >
                      <input type="radio" name="peat_automatizados_normal" value="0" class="check-auditivo" <?php no($peat_automatizados_normal);  ?> > No
                    </label>
					<input type="radio" name="peat_automatizados_normal" value="null" style="display:none" <?php check($peat_automatizados_normal);  ?>> 
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-lg-1"><input type="checkbox" name="peat_extendidos" value="" class="form-check-input check-auditivo" id="peat_extendidos"  <?php si($peat_extendidos);  ?>></td>
                <td class="col-lg-4">Potenciales Evocados del Tronco Cerebral (PEAT) Extendidos
                </td>
                <td class="col-lg-2">

                  <div id="peat_extendidos_cel">
                    ¿Normal?<br>
                    <label for="" class="control-label radio-inline col-lg-1">
                      <input type="radio" name="peat_extendidos_normal" value="1" class="check-auditivo" <?php si($peat_extendidos_normal);  ?>> Sí
                    </label>
                    <label for="" class="control-label radio-inline col-lg-1" >
                      <input type="radio" name="peat_extendidos_normal" value="0" class="check-auditivo" <?php no($peat_extendidos_normal);  ?>> No
                    </label>
					<input type="radio" name="peat_extendidos_normal" value="null" style="display:none" <?php check($peat_extendidos_normal);  ?>> 
                  </div>
                  
                </td>
              </tr>
              <tr>
                <td class="col-lg-1"><input type="checkbox" name="emisiones" value="" class="form-check-input check-auditivo" id="emisiones" <?php si($emisiones);  ?>></td>
                <td class="col-lg-4">Emisiones Otoacústicas
                </td>
                <td class="col-lg-2" >
                  <div id="emisiones_cel">
                    ¿Normal?<br>
                    <label for="" class="control-label radio-inline col-lg-1">
                      <input type="radio" name="emisiones_normal" value="1" class="check-auditivo" <?php si($emisiones_normal);  ?>> Sí
                    </label>
                    <label for="" class="control-label radio-inline col-lg-1" >
                      <input type="radio" name="emisiones_normal" value="0" class="check-auditivo" <?php no($emisiones_normal);  ?>> No
                    </label>
					<input type="radio" name="emisiones_normal" value="null" style="display:none" <?php check($emisiones_normal);  ?>> 
                  </div>
                  
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<!--input type="hidden" name="idOculto" id="idOculto" value=""-->
      <input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success" name="idOculto" id="idOculto"  value="<?php echo $id; ?>" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
    </div>
    </form>       
  </div>
</div>