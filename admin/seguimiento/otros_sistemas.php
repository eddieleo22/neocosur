<?php
error_reporting(0);

include 'capaDAO/compromiso_otrosDAO.php';


$dao = new compromiso_otrosDAO($cone);
$fila = $dao->buscarId($idControl);
$filaOx = $dao->oxigeno($idNeocosur);
$filaOstomia = $dao->ostomia($idNeocosur);
$ostomia_Ostomia  =	$filaOstomia['OSTOMIA'];
$ostomia_cual_Ostomia   =	$filaOstomia['ID_TIPO_OSTOMIA'];
$reconstitucion_Ostomia   =	$filaOstomia['RECONSTRUCCION_TRANSITO'];
$fech_reconstitucion_Ostomia   =	$filaOstomia['FECHA_RECONSTRUCCION_TRANSITO'];



$o2_alta=$filaOx["oxi"];
$o2_36_sem=$filaOx["o36"];

$idOculto=$fila['ID_CONTROL'];
	//Compromiso_otros
$diureticos= $fila['DIURETICOS'];
$fech_inicio  =	$fila['FECHA_INICIO'];
$fech_suspension  =	$fila['FECHA_SUSPENSION'];
$o2 =	$fila['O2'];
$fecha_suspension_ox =	$fila['FECHA_SUSPENSION_OX'];
$broncodilatadores  =	$fila['BRONCODILATADORES'];
$corticoides  =	$fila['CORTICOIDES_INHALATORIOS'];
$ostomia  =	$fila['OSTOMIA'];
$ostomia_cual  =	$fila['ID_TIPO_OSTOMIA'];
$reconstitucion  =	$fila['RECONSTRUCCION_TRANSITO'];
$fech_reconstitucion  =	$fila['FECHA_RECONSTRUCCION_TRANSITO'];


$profilaxis_antibiotica  =	$fila['PROFILAXIS_ANTIBIOTICA'];
$profilaxis_fech_inicio  =	$fila['PROFILAXIS_FECHA_INICIO'];
$profilaxis_fech_suspension  =	$fila['PROFILAXIS_FECHA_SUSPENSION'];
$estudio_imagenes  =	$fila['ESTUDIO_IMAGENES'];
$eco_renal  =	$fila['ESTUDIO_ECO_RENAL'];
$estudio_eco_renal_alteracion  =	$fila['ESTUDIO_ECO_RENAL_ALTERACION'];
$describa_eco_renal  =	$fila['ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP'];
$cintigrafia =	$fila['CINTIGRAFIA'];
$cintigrafia_alteracion =	$fila['CINTIGRAFIA_ALTERACION'];
$describa_cintigrafia = $fila['CINTIGRAFIA_ALTERACION_DESCRIP'];
$uretrocistografia =	$fila['URETROCISTOGRAFIA'];
$uretrocistografia_alteracion = $fila['URETROCISTOGRAFIA_ALTERACION'];
$describa_uretrocistografia =	$fila['URETROCISTOGRAFIA_ALTERACION_DESCRIP'];
$control_presion_arterial =	$fila['CONTROL_PRESION_ARTERIAL'];
$alteracion_algun_evento =	$fila['ALTERACION_ALGUN_EVENTO'];


$hic_grado=$fila['NEURO_HIC_GRADO'];
$hic_grado_cual =$fila['NEURO_HIC_GRADO_CUAL'];
$leucomalacia=$fila['NEURO_LEUCOMALACIA'];
$hidrocefalia=$fila['NEURO_HIDROCEFALIA'];
$valvula=$fila['NEURO_HIDROCEFALIA_VALVULA'];

$convulsiones  =	$fila['CONVULSIONES_POST_ALTA'];
$tratamiento  =	$fila['REQUIERE_TRATAMIENTO'];
$fech_tratamiento  =	$fila['FECHA_SUSPENSION_TRAT'];


if($ostomia_Ostomia!=''){
	$ostomia = $ostomia_Ostomia;
	$ostomia_cual = $ostomia_cual_Ostomia;
	$reconstitucion = $reconstitucion_Ostomia;
	$fech_reconstitucion = $fech_reconstitucion_Ostomia;
	$disabled = " disabled ";
}	
else {
	$ostomia = $ostomia;
	$ostomia_cual = $ostomia_cual;
	$reconstitucion = $reconstitucion;
	$fech_reconstitucion = $fech_reconstitucion;
	$disabled = " disabled ";
}

?>


<div class="ficha panel panel-default">
  <div class="panel-body">
    <form action="Negocio/compromiso_otrosBO.php" method="post">
      <button class="btn btn-success active subtitulo" type="button" id="respiratorio"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Respiratorio</button>

      <button class="btn btn-default subtitulo" type="button" id="digestivo"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Digestivo </button>

      <button class="btn btn-default subtitulo" type="button" id="renal"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Renal </button>

      <button class="btn btn-default subtitulo" type="button" id="neurologico"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Neurológico </button>

      <div class="row" id="sec_respiratorio">

        <div class="col-lg-12 form-group">
          <label class="control-label">Requerimientos previos</label> 
        </div>
        
        <div class="form-group col-lg-6">

          <label class="col-lg-5 control-label">O<sub>2</sub> a las 36 sem. EC <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si utilizó 0<sub>2</sub> a las 36 semanas de EC, independiente del tiempo que lo requirió."></span></label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="o2_36_sem" value="1" <?php si($o2_36_sem ); ?> disabled="disabled"> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="o2_36_sem" value="0" <?php no($o2_36_sem ); ?> disabled="disabled"> No
            </label>
          </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-lg-6">
          <label class="col-lg-5 control-label">O<sub>2</sub> al alta</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="o2_alta" value="1" <?php si($o2_alta ); ?> disabled="disabled"> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="o2_alta" value="0" <?php no($o2_alta ) ?> disabled="disabled"> No
            </label>
          </div>
        </div>
        
        <div class="clearfix"></div>
        
        <!--div class="form-group col-lg-6" id="sec_diureticos">
          <label class="control-label col-lg-5">Diuréticos</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="diureticos" value="1" <?php si($diureticos ); ?> id="diureticos_si"> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="diureticos" value="0" <?php no($diureticos ) ?> id="diureticos_no"> No
            </label>
          </div>
        </div-->

        <div id="sec_diureticos_si" class="sub-form">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="control-label col-lg-5">Fecha inicio</label>
              <div class="col-lg-7">
                <input type="date" name="fech_inicio" value= "<?php   echo $fech_inicio; ?>"  class="form-control input-sm">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-lg-5">Fecha suspensión</label>
              <div class="col-lg-7">
                <input type="date" name="fech_suspension" value= "<?php   echo $fech_suspension; ?>"class="form-control input-sm">
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 form-group">
          <label class="control-label">Requerimiento en control actual</label> 
        </div>

        <div class="form-group col-lg-6">

          <label class="col-lg-5 control-label">O<sub>2</sub></label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="o2" id="o2_si" value="1" <?php si($o2); ?>> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="o2" id="o2_no" value="0" <?php no($o2 ) ?>> No
            </label>
          </div>
        </div>
		<div class="form-group sub-form" id="div_fecha_oxigeno">
            <label class="col-lg-5 control-label">Fecha suspensión oxígeno domiciliario</label>
            <div class="col-lg-3">
              <input type="date" name="fecha_suspension_ox" value="<?php echo  $fecha_suspension_ox;?>" class="form-control">
            </div>
          </div>
        <div class="clearfix"></div>

        <div class="form-group col-lg-6">
          <label class="col-lg-5 control-label">Broncodilatadores</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="broncodilatadores" value="1" <?php si($broncodilatadores ); ?>> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="broncodilatadores" value="0" <?php no($broncodilatadores ) ?>> No
            </label>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="form-group col-lg-6">
          <label class="col-lg-5 control-label">Corticoides inhalatorios</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="corticoides" value="1" <?php si($corticoides ); ?>> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="corticoides" value="0" <?php no($corticoides ) ?>> No
            </label>
          </div>
        </div>

      </div>

      <div class="row" id="sec_digestivo">
        
        <div class="form-group col-lg-6">
          <label class="control-label col-lg-5">Ostomía</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="ostomia" value="1" <?php si($ostomia ); echo $disabled; ?> id="ostomia_si" > Sí
            </label>

            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="ostomia" value="0" <?php no($ostomia ); echo $disabled; ?> id="ostomia_no"> No
            </label>
            
          </div>
        </div>

        <div id="sec_ostomia_si" class="col-lg-6 sub-form">

            <div class="form-group row">
              <label class="control-label col-lg-5">¿Cuál?</label>
              <div class="col-lg-7">
                <select class="form-control input-sm" name="ostomia_cual">
				<option value="null" > Seleccione </option>
				<?php cargarSelect("sistema_seg_osto_cual_param",$cone,"id_sistema_seg_osto_cual_param","descripcion",$ostomia_cual);?>
                </select>
              </div>
            </div>

            <div class="form-group row" >
              <label class="control-label col-lg-5">Reconstitución del tránsito</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="reconstitucion" value="1" <?php si($reconstitucion ); echo $disabled; ?> id="reconstitucion_si"> Sí
                </label>

                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="reconstitucion" value="0" <?php no($reconstitucion );echo $disabled; ?> id="reconstitucion_no"> No
                </label>
              </div>
            </div>

            <div id="sec_reconstitucion_si" class="row sub-form">
              <div class="form-group">
                <label class="control-label col-lg-5">Fecha</label>
                <div class="col-lg-7">
                  <input type="date" name="fech_reconstitucion" value="<?php echo  $fech_reconstitucion; echo $disabled; ?>" class="form-control">
                </div>
              </div>
            </div>
            
        </div>

      </div>


      <div class="row" id="sec_renal">

        <div class="form-group col-lg-6">
          <label class="col-lg-5 control-label">Requiere Profilaxis Antibiótica</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="profilaxis_antibiotica" value="1" <?php si($profilaxis_antibiotica); ?> id="profilaxis_si"> Sí
            </label>
            <label class="control-label radio-inline col-lg-2" >
              <input type="radio" name="profilaxis_antibiotica" value="0" <?php no($profilaxis_antibiotica ) ?> id="profilaxis_no"> No
            </label>
          </div>
        </div>

        <div class="col-lg-6 sub-form" id="sec_profilaxis_si">
          <!--div class="form-group row">
            <label class="col-lg-5 control-label">Fecha de inicio</label>
            <div class="col-lg-7">
              <input type="date" name="profilaxis_fech_inicio" value="<?php echo  $profilaxis_fech_inicio;?>" class="form-control">
            </div>
          </div-->

          <div class="form-group row">
            <label class="col-lg-5 control-label">Fecha de suspensión</label>
            <div class="col-lg-7">
              <input type="date" name="profilaxis_fech_suspension"  value="<?php echo  $profilaxis_fech_suspension;?>" class="form-control">
            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="form-group col-lg-6" >
          <label class="col-lg-5 control-label">Estudio imágenes </label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="estudio_imagenes" value="1" <?php si($estudio_imagenes ); ?> id="imagenes_si"> Sí
            </label>
            <label class="control-label radio-inline col-lg-2" >
              <input type="radio" name="estudio_imagenes" value="0" <?php no($estudio_imagenes ); ?> id="imagenes_no"> No
            </label>
          </div>
        </div>

        <div class="col-lg-6 sub-form form-group" id="sec_imagenes_si">

          <table>
            <thead>
              <tr style="vertical-align: top; text-align: center;">
                <td class="col-lg-3"><label class="control-label">Estudio</label></td>
                <td class="col-lg-6"><label class="control-label">Alteración</label></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="vertical-align: top">
                  <label class="control-label">
                    <input type="checkbox" name="eco_renal" id="eco_renal" value="1" <?php si($eco_renal ); ?>> Eco renal
                  </label>
                </td>
                <td style="vertical-align: top"> 
                  <div id="sec_eco_renal" class="sub-form">
                    <div class="col-lg-12 form-group">
                      <label class="control-label radio-inline">
                        <input type="radio" name="estudio_eco_renal_alteracion" value="1" <?php si($estudio_eco_renal_alteracion ); ?> id="eco_renal_alteracion_si"> Sí
                      </label>
                      <label class="control-label radio-inline" >
                        <input type="radio" name="estudio_eco_renal_alteracion" value="0" <?php no($estudio_eco_renal_alteracion ) ?> id="eco_renal_alteracion_no"> No
                      </label>
                    </div>

                    <div id="sec_eco_renal_alteracion_si" class="form-group">
                      <label class="control-label col-lg-12">Describa</label>
                      <textarea class="form-control col-lg-12" rows="3" name="describa_eco_renal"><?php echo $describa_eco_renal; ?></textarea>
                    </div>
                    
            
                  </div>
                </td>
              </tr>

              <tr>
                <td style="vertical-align: top">
                  <label class="control-label">
                    <input type="checkbox" name="cintigrafia" id="cintigrafia" value="1" <?php si($cintigrafia ); ?>> Cintigrafía
                  </label>
                </td>
                <td style="vertical-align: top">
                  <div id="sec_cintigrafia" class="sub-form" >
                    <div class="col-lg-12 form-group">
                      <label class="control-label radio-inline">
                        <input type="radio" name="cintigrafia_alteracion" value="1" <?php si($cintigrafia_alteracion ); ?> id="cintigrafian_alteracion_si"> Sí
                      </label>
                      <label class="control-label radio-inline" >
                        <input type="radio" name="cintigrafia_alteracion" value="0" <?php no($cintigrafia_alteracion ); ?> id="cintigrafia_alteracion_no"> No
                      </label>
                    </div>

                    <div id="sec_cintigrafia_alteracion_si" class="form-group">
                      <label class="control-label col-lg-12">Describa</label>
                      <textarea class="form-control col-lg-12" rows="3"  name="describa_cintigrafia"><?php echo $describa_cintigrafia; ?></textarea>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td style="vertical-align: top" class="form-group">
                  <label class="control-label">
                    <input type="checkbox" name="uretrocistografia" id="uretrocistografia" value="1" <?php si($uretrocistografia ); ?>> Uretrocistografía
                  </label>
                </td>
                <td style="vertical-align: top">
                  <div id="sec_uretrocistografia" class="sub-form">
                    <div class="col-lg-12 form-group">
                      <label class="control-label radio-inline">
                        <input type="radio" name="uretrocistografia_alteracion" value="1" <?php si($uretrocistografia_alteracion ); ?> id="uretrocistografia_alteracion_si"> Sí
                      </label>
                      <label class="control-label radio-inline" >
                        <input type="radio" name="uretrocistografia_alteracion" value="0" <?php no($uretrocistografia_alteracion ) ?> id="uretrocistografia_alteracion_no"> No
                      </label>
                    </div>

                    <div id="sec_uretrocistografia_alteracion_si" class="form-group">
                      <label class="control-label col-lg-12">Describa</label>
                      <textarea class="form-control col-lg-12" rows="3" name="describa_uretrocistografia"><?php echo $describa_uretrocistografia; ?></textarea>
                    </div>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-lg-6">
          <label class="col-lg-5 control-label">Control de presión arterial</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="presion" value="1" <?php si($control_presion_arterial ); ?> id="presion_si"> Sí
            </label>
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="presion" value="0" <?php no($control_presion_arterial ) ?> id="presion_no"> No
            </label>
          </div>
        </div>

        <div class="col-lg-6 sub-form" id="sec_presion_si">
          <label class="col-lg-5 control-label">Alteración en algún evento</label>
          <div class="col-lg-7">
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="alteracion_algun_evento" value="1" <?php si($alteracion_algun_evento  ); ?> > Sí
            </label>
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="alteracion_algun_evento" value="0" <?php no($alteracion_algun_evento  ) ?> > No
            </label>
          </div>

          <div class="col-lg-12 form-group">
            <p><label class="control-label">Visualizar curvas IPHA</label> 
            <a href="docs/BPLimitsChart.pdf" target="_blank">PBLOOD PRESSURE LIMITS CHARTS</a></p>
          </div>
        </div>

      </div>

      <div class="row" id="sec_neurologico">
        <div class="col-lg-12 form-group">
          <label class="control-label">Resumen Situación Neurológica a las 40 semanas</label>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-5">HIC (Grado)</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="hic_grado" value="1" <?php si($hic_grado ); ?> id="hic_si"> Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="hic_grado" value="0" <?php no($hic_grado ) ?> id="hic_no"> No
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="hic_grado" value="-1" id="hic_s_i" > S/I
              </label>
            </div>
          </div>

          <div class="form-group col-lg-6">
            <div id="sec_hic_si" class="sub-form">
              <label class="control-label col-lg-5">Grado</label>
              <div class="col-lg-7"> 
                <select name="hic_grado_cual" class="form-control col-lg-8 input-sm">
                  <option value="null" > Seleccione </option>
				<?php cargarSelect("sistema_seg_hic_grado_cual_param",$cone,"id_sistema_seg_hic_grado_cual_param","descripcion",$hic_grado_cual);?>
                </select>
              </div>
            </div>          
          </div>
        </div>
        
        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-5">Leucomalacia</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="leucomalacia" value="1" <?php si($leucomalacia ); ?>> Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="leucomalacia" value="0" <?php no($leucomalacia ) ?>> No
              </label>
            </div>
          </div>

          <div class="form-group col-lg-6">
                    
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-5">Hidrocefalia</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="hidrocefalia" value="1" <?php si($hidrocefalia ); ?> id="hidrocefalia_si"> Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="hidrocefalia" value="0" <?php no($hidrocefalia ) ?> id="hidrocefalia_no"> No
              </label>
            </div>
          </div>

          <div class="form-group col-lg-6">
            <div id="sec_hidrocefalia_si" class="sub-form">
              <label class="control-label col-lg-5">Válvula derivativa</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="valvula" value="1" <?php si($valvula ); ?>> Sí
                </label>
                <label for="" class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="valvula" value="0" <?php no($valvula ) ?>> No
                </label>
              </div>
            </div> 
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-5">Convulsiones
post-alta</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="convulsiones" value="1" <?php si($convulsiones ); ?> id="convulsiones_si"> Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="convulsiones" value="0" <?php no($convulsiones ) ?> id="convulsiones_no"> No
              </label>
            </div>
          </div>

          <div class="form-group col-lg-6">
            <div id="sec_convulsiones_si" class="sub-form">
              <label class="control-label col-lg-5">¿Requiere tratamiento?</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="tratamiento" value="1" <?php si($tratamiento ); ?>> Sí
                </label>
                <label for="" class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="tratamiento" value="0" <?php no($tratamiento ) ?>> No
                </label>
              </div>
              <div class="clearfix"></div>
              <label class="control-label col-lg-5">Fecha de suspensión tratamiento anterior</label>
              <div class="col-lg-7">
                <input type="date" name="fech_tratamiento" value="<?php echo  $fech_tratamiento;?>" class="form-control input-sm col-lg-8">
              </div>
            </div> 
          </div>
        </div>




      </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idControl" value="<?php echo $idControl ?>" class="form-control input-sm"  >
	<input type="hidden" name="idResponsable" value="<?php echo $_SESSION['id_responsable']; ?>" class="form-control input-sm"  >
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>   
  </form>      
  </div>
</div>