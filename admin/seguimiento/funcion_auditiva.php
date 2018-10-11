<?php
error_reporting(0);
include 'capaDAO/funcion_auditivaDAO.php';
include 'capaDAO/patologias_neonatalesDAO.php';
$daoPN = new patologias_neonatalesDAO($cone);
$dao = new funcion_auditivaDAO($cone);
$fila = $dao->buscarId($idControl);
$filaPesquisa=$dao->pesquisa($idNeocosur);

$ar = $daoPN->buscarId($idNeocosur);
//echo "<br> <br> PESQUISA_ANTES_DEL_ALTA --->".$filaPesquisa['PESQUISA_ANTES_DEL_ALTA'];
if($ar['EVA_PESQUISA']=='1'){
	$pesquisa=$ar['EVA_PESQUISA'];
	$check_pesquisa_alta_1=$ar['EVA_AUTO'];
	$pesquisa_alta_1=$ar['EVA_AUTO_NOR'];
	$check_pesquisa_alta_2=$ar['EVA_EXT'];
	$pesquisa_alta_2=$ar['EVA_EXT_NOR'];
	$check_pesquisa_alta_3= $ar['EVA_EMI'];
	$pesquisa_alta_3=$ar['EVA_EMI_NOR'];

	$disabled= " disabled ";
	
}
else {
//var_dump($fila);
$idOculto=$fila['ID_CONTROL'];
	//Funcion AUDITIVA 
$pesquisa=$filaPesquisa['PESQUISA_ANTES_DEL_ALTA']='0';// ? $fila['PESQUISA_ANTES_DEL_ALTA'] : $filaPesquisa['PESQUISA_ANTES_DEL_ALTA'];
$check_pesquisa_alta_1=$filaPesquisa['PEAT_AUTOMATIZADOS']==''? $fila['PEAT_AUTOMATIZADOS']: $filaPesquisa['PEAT_AUTOMATIZADOS'];
$pesquisa_alta_1=$filaPesquisa['PEAT_ATOMATIZADOS_NORMAL']==''? $fila['PEAT_ATOMATIZADOS_NORMAL']: $filaPesquisa['PEAT_ATOMATIZADOS_NORMAL'];
$check_pesquisa_alta_2=$filaPesquisa['PEAT_EXTENDIDOS']==''? $fila['PEAT_EXTENDIDOS']: $filaPesquisa['PEAT_EXTENDIDOS'];
$pesquisa_alta_2=$filaPesquisa['PEAT_EXTENDIDOS_NORMAL']==''? $fila['PEAT_EXTENDIDOS_NORMAL']: $filaPesquisa['PEAT_EXTENDIDOS_NORMAL'];
$check_pesquisa_alta_3=$filaPesquisa['EMISIONES_OTOACUSTICAS']==''? $fila['EMISIONES_OTOACUSTICAS']: $filaPesquisa['EMISIONES_OTOACUSTICAS'];
$pesquisa_alta_3=$filaPesquisa['EMISIONES_OTOACUSTICAS_NORMAL']==''? $fila['EMISIONES_OTOACUSTICAS_NORMAL']: $filaPesquisa['EMISIONES_OTOACUSTICAS_NORMAL'];
	$disabled= " disabled ";

}



	//Evolucion Posterior
$evaluacion_auditiva=$fila['EVALUACION_AUDITIVA'];
$fecha=$fila['FECHA_EVALUACION'];
$evaluacion_auditiva_normal=$fila['EVALUACION_NORMAL'];
$audiometria=$fila['POST_AUDIO'];
$audiometria_normal=$fila['POST_AUDIO_NORMAL'];
$peat_automatizados=$fila['POST_PEAT_AUTO'];
$peat_automatizados_normal=$fila['POST_PEAT_AUTO_NORMAL'];
$peat_extendidos=$fila['POST_PEAT_EXT'];
$peat_extendidos_normal=$fila['POST_PEAT_EXT_NORMAL'];
$oido_izquierdo=$fila['POST_OIDO_IZQ'];
$grado_izquierdo=$fila['POST_OIDO_IZQ_GRADO'];
$oido_derecho=$fila['POST_OIDO_DER'];
$grado_derecho=$fila['POST_OIDO_DER_GRADO'];
	
$confirmacion_diagnostico=$fila['CONFIRMACION_DIAGNOSTICO'];
$fecha_confirmacion=$fila['FECHA_DIAGNOSTICO'];
$oido_izquierdo_confirmacion=$fila['CONF_OIDO_IZQ_RESUL'];
$grado_izquierdo_confirmacion=$fila['CONF_OIDO_IZQ_GRADO'];
$tipo_alteracion_izquierdo=$fila['CONF_OIDO_IZQ_NEURO'];
$tipo_alteracion_izq_De=$fila['CONF_OIDO_IZQ_DE'];
$tratamiento_izquierdo=$fila['CONF_OIDO_IZQ_TRAT'];
$cual_izquierdo_audif=$fila['CONF_OIDO_IZQ_AUDIF'];
$cual_izquierdo_cocle=$fila['CONF_OIDO_IZQ_COCLE'];
$terapia_auditiva_izquierdo_confirmacion=$fila['CONF_OIDO_IZQ_TERA'];
$cual_terapia_izquierda_verb=$fila['CONF_OIDO_IZQ_VERB'];
$cual_terapia_izquierda_sena=$fila['CONF_OIDO_IZQ_SENA'];
$cual_terapia_izquierda_otro=$fila['CONF_OIDO_IZQ_OTRO'];
$observaciones_oido_izquierdo=$fila['CONF_OIDO_IZQ_OBS'];
	
$oido_derecho_confirmacion=$fila['CONF_OIDO_DER_RESUL'];
$grado_derecho_confirmacion=$fila['CONF_OIDO_DER_GRADO'];
$tipo_alteracion_derecho_neuro=$fila['CONF_OIDO_DER_NEURO'];
$tipo_alteracion_derecho_de=$fila['CONF_OIDO_DER_DE'];
$tratamiento_derecho=$fila['CONF_OIDO_DER_TRAT'];
$cual_derecho_audif=$fila['CONF_OIDO_DER_AUDIF'];
$cual_derecho_cocle=$fila['CONF_OIDO_DER_COCLE'];
$terapia_auditiva_derecho_confirmacion=$fila['CONF_OIDO_DER_TERA'];
$cual_terapia_derecho_verb=$fila['CONF_OIDO_DER_VERB'];
$cual_terapia_derecho_sena=$fila['CONF_OIDO_DER_SENA'];
$cual_terapia_derecho_otro=$fila['CONF_OIDO_DER_OTRO'];
$observaciones_oido_derecho=$fila['CONF_OIDO_DER_OBS'];
$cual_terapia_derecho_sena=$fila['CONF_OIDO_DER_SENA'];
$cual_terapia_derecho_otro=$fila['CONF_OIDO_DER_OTRO'];
$observaciones_oido_derecho=$fila['CONF_OIDO_DER_OBS'];

?>

 <style>
    .cnt{
      width:1160px;
      background-color:#DDAADD;
      margin:0px;
      padding:15px;
      font-weight:bold
    }
    .trans{
      background-color:rgba(0, 187, 0, 0.02);
      color:#CC0000;
      position:absolute;
      text-align:center;
      top:-8;
      left:-455px;
      padding:5px;
      font-size:25px;
      font-weight:bold;
      width:855px;
	  height: 200px;
    }
  </style>


<div class="ficha panel panel-default">
  <div class="panel-body">
    <form method="post" action="Negocio/auditivaBO.php">
      <button class="btn btn-success active subtitulo" type="button" id="funcion_auditiva"  ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Función Auditiva</button>
	<?php 
	if($ar['EVA_PESQUISA']=='0' || $ar['EVA_PESQUISA']=='')
	{
	?>
      <button class="btn btn-default subtitulo" type="button" id="evolucion_posterior"  ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Evolución Posterior</button>
	<?php 
	}  	 
	?>
      <div class="row">
        <div class="row">
          <div id="sec_funcion_auditiva">
		  
            <div class="col-lg-5">
			<div class="trans" style="z-index:1;filter:alpha(opacity=60);float:left;-moz-opacity:.60;opacity:.60">
  
				</div>
              <div class="form-group">
                <label for="" class="col-lg-12 control-label">Pesquisa antes del alta</label>
                <label class="control-label radio-inline col-lg-offset-1 col-lg-2">
                <input type="radio" name="pesquisa" value="1"   <?php  si($pesquisa);   ?> id="pesquisa_si"  > Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="pesquisa" value="0"  <?php  no($pesquisa); ?> id="pesquisa_no" <?php  $chekedPesquisa;; ?>> No
                </label>
              </div>
            </div>

            <div class="col-lg-7 form-group sub-form" id="sec_pesquisa_si">

              <label class="col-lg-12 control-label">Evaluación al alta</label>
			  
				
              <div class="row">
                <div class="checkbox col-lg-12">
                  <label class="control-label txt_izq col-lg-12">
                    <input name="check_pesquisa_alta_1" type="checkbox" value="1"  <?php  si($check_pesquisa_alta_1 ); ?> id="check_pesquisa_alta_1" <?php  echo $disabled; ?>>
                    Potenciales Evocados del Tronco Cerebral (PEAT) Automatizados
                  </label>
                  <div class="col-lg-8">
                    <div id="pesquisa_alta_1">
                      <label class="col-lg-4 control-label">¿Normal?</label>

                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_1" value="1"  <?php  si($pesquisa_alta_1 );  ?> <?php  echo $disabled; ?> > Sí
                      </label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_1" value="0"  <?php  no($pesquisa_alta_1 );  ?> <?php  echo $disabled; ?>> No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="checkbox col-lg-12">
                  <label class="control-label txt_izq col-lg-12">
                    <input name="check_pesquisa_alta_2" type="checkbox" value="1"  <?php  si($check_pesquisa_alta_2 ); ?>  <?php  echo $disabled; ?> id="check_pesquisa_alta_2">
                    Potenciales Evocados del Tronco Cerebral (PEAT) Extendidos
                  </label>
                  <div class="col-lg-8">
                    <div id="pesquisa_alta_2">
                      <label class="col-lg-4 control-label">¿Normal?</label>

                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_2" value="1"  <?php  si($pesquisa_alta_2 ); ?> <?php  echo $disabled; ?> > Sí
                      </label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_2" value="0"  <?php  no($pesquisa_alta_2 ); ?> <?php  echo $disabled; ?>> No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="checkbox col-lg-12">
                  <label class="control-label txt_izq col-lg-12">
                    <input name="check_pesquisa_alta_3" type="checkbox" value="1"  <?php  si($check_pesquisa_alta_3 ); ?> id="check_pesquisa_alta_3" <?php  echo $disabled; ?> >
                    Emisiones Otoacústicas
                  </label>
                  <div class="col-lg-8">
                    <div id="pesquisa_alta_3">
                      <label class="col-lg-4 control-label">¿Normal?</label>

                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_3" value="1"  <?php  si ($pesquisa_alta_3 ); ?> <?php  echo $disabled; ?>> Sí
                      </label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="pesquisa_alta_3" value="0"  <?php  no($pesquisa_alta_3 );  ?> <?php  echo $disabled; ?>> No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>     
    
        <div class="row">

          <div id="sec_evolucion_posterior">

            <div class="col-lg-3">
                <div class="form-group">
                  <label class="col-lg-12 control-label">Evaluación Auditiva</label>
                  <label class="control-label radio-inline col-lg-offset-2 col-lg-2">
                    <input type="radio" name="evaluacion_auditiva" value="1"  <?php  si ($evaluacion_auditiva );  ?> id="evaluacion_auditiva_si"> Sí
                  </label>
                  <label class="control-label radio-inline col-lg-2" >
                    <input type="radio" name="evaluacion_auditiva" value="0"  <?php  no($evaluacion_auditiva );  ?> id="evaluacion_auditiva_no"> No
                  </label>
                </div>
            </div>

            <div class="col-lg-9">
                <div id="sec_evaluacion_auditiva_si" class="sub-form row">
                  <div class="form-group col-lg-6">
                    <label class="control-label col-lg-3">Fecha</label>
                    <div class="col-lg-6">
                      <input type="date" name="fecha" class="form-control input-sm" value="<?php echo $fecha; ?>">
                    </div>
                  </div>

                  <div class="form-group col-lg-6">
                    <label class="col-lg-4 control-label">Normal</label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="evaluacion_auditiva_normal" value="1"  <?php  si ($evaluacion_auditiva_normal );  ?> id="evaluacion_auditiva_normal_si"> Sí
                    </label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="evaluacion_auditiva_normal" value="0"  <?php  no($evaluacion_auditiva_normal );  ?> id="evaluacion_auditiva_normal_no"> No
                    </label>
                  </div>
                </div>
            </div>
            
            <div class="col-lg-9 col-lg-offset-3">

                <div id="sec_evaluacion_auditiva_normal_no" >
                
                  <div class="row">
                      <div class="form-group col-lg-6">
                        <label class="control-label col-lg-6">Audiometría</label>
                        <div class="col-lg-6">
                          <label class="control-label radio-inline col-lg-5">
                            <input type="radio" name="audiometria" value="1"  <?php  si ($audiometria );  ?> id="audiometria_si">
                            Sí
                          </label>
                          <label class="control-label radio-inline col-lg-5">
                            <input type="radio" name="audiometria" value="0"  <?php  no($audiometria );  ?> id="audiometria_no">
                            No
                          </label>
                        </div>
                      </div>

                      <div class="form-group col-lg-6 sub-form" id="sec_audiometria_si">
                        <label class="col-lg-4 control-label">Normal</label>
                        <label class="control-label radio-inline col-lg-3">
                          <input type="radio" name="audiometria_normal" value="1"  <?php  si ($audiometria_normal );  ?>> Sí
                        </label>
                        <label class="control-label radio-inline col-lg-3">
                          <input type="radio" name="audiometria_normal" value="0"  <?php  no($audiometria_normal );  ?>> No
                        </label>
                      </div>
                  </div>
                 
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-lg-6">PEAT automatizados</label>
                      <div class="col-lg-6">
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="peat_automatizados" value="1"  <?php  si ($peat_automatizados );  ?> id="peat_automatizados_si">
                          Sí
                        </label>
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="peat_automatizados" value="0"  <?php  no($peat_automatizados );  ?> id="peat_automatizados_no">
                          No
                        </label>
                      </div>
                    </div>

                    <div class="form-group col-lg-6 sub-form" id="sec_peat_automatizados_si">
                      <label class="col-lg-4 control-label">Normal</label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="peat_automatizados_normal" value="1"  <?php  si ($peat_automatizados_normal );  ?>> Sí
                      </label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="peat_automatizados_normal" value="0"  <?php  no($peat_automatizados_normal );  ?>> No
                      </label>
                    </div>
                  </div>

                  <div class="row">
                    
                    <div class="form-group col-lg-6">
                      <label class="control-label col-lg-6">PEAT extendidos</label>
                      <div class="col-lg-6">
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="peat_extendidos" value="1"  <?php  si ($peat_extendidos );  ?> id="peat_extendidos_si">
                          Sí
                        </label>
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="peat_extendidos" value="0"  <?php  no($peat_extendidos );  ?> id="peat_extendidos_no">
                          No
                        </label>
                      </div>
                    </div>

                    <div class="form-group col-lg-6 sub-form" id="sec_peat_extendidos_si">
                      <label class="col-lg-4 control-label">¿Normal?</label>
                      <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="peat_extendidos_normal" value="1"  <?php  si ($peat_extendidos_normal );  ?>> Sí
                      </label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="peat_extendidos_normal" value="0"  <?php  no($peat_extendidos_normal );  ?>> No
                      </label>
                    </div>

                  </div>
          
                  <div class="row">

                    <div class="form-group col-lg-6">
                      <label class="control-label col-lg-6">Oído Izquierdo</label>
                      <div class="col-lg-6">
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="oido_izquierdo" value="1" <?php  si ($oido_izquierdo );  ?> id="normal_izquierdo"> Normal
                        </label>

                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="oido_izquierdo" value="0" <?php  no($oido_izquierdo );  ?> id="hipoacusia_izquierdo"> Hipoacusia
                        </label>
                      </div>      
                    </div>

                    <div class="form-group col-lg-6 sub-form" id="sec_hipoacusia_izquierdo">
                      <label class="col-lg-3 control-label">Grado</label>
                      <div class="col-lg-9">
                        <select class="form-control input-sm col-lg-8" name="grado_izquierdo">
						 <option value="null">Seleccione</option>
                         <?php cargarSelect("grado_auditiva",$cone,"id_grado","descripcion",$grado_izquierdo);?>
                        </select>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 ">
                      <label class="control-label col-lg-6">Oído Derecho</label>
                      <div class="col-lg-6">
                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="oido_derecho" value="1"  <?php  si($oido_derecho );  ?> id="normal_derecho"> Normal
                        </label>

                        <label class="control-label radio-inline col-lg-5">
                          <input type="radio" name="oido_derecho" value="0" <?php  no($oido_derecho );  ?>id="hipoacusia_derecho"> Hipoacusia
                        </label>
                      </div>      
                    </div>

                    <div class="form-group col-lg-6 sub-form" id="sec_hipoacusia_derecho">
                      <label class="col-lg-3 control-label">Grado</label>
                      <div class="col-lg-9">
                        <select class="form-control input-sm col-lg-8" name="grado_derecho">
						<option value="null">Seleccione</option>
                           <?php cargarSelect("grado_auditiva",$cone,"id_grado","descripcion",$grado_derecho);?>
                        </select>
                      </div>
                    </div>

                  </div>

                </div>
            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label class="col-lg-12 control-label">Confirmación de diagnóstico</label>
                <label class="control-label radio-inline col-lg-offset-2 col-lg-2">
                  <input type="radio" name="confirmacion_diagnostico" value="1"  <?php  si ($confirmacion_diagnostico );  ?> id="confirmacion_diagnostico_si"> Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="confirmacion_diagnostico" value="0"  <?php  no($confirmacion_diagnostico );  ?> id="confirmacion_diagnostico_no"> No
                </label>
              </div>
            </div>

            <div class="col-lg-9">

              <div id="sec_confirmacion_diagnostico_si" class="sub-form row">
                <div class="form-group col-lg-6">
                  <label class="control-label col-lg-3">Fecha</label>
                  <div class="col-lg-6">
                    <input type="date" name="fecha_confirmacion" class="form-control input-sm" value="<?php echo  $fecha_confirmacion;  ?>" >
                  </div>
                </div>

                <div class="form-group col-lg-6">
                  <label class="col-lg-4 control-label">Oído Izquierdo</label>
                  <label class="control-label radio-inline col-lg-3">
                    <input type="radio" name="oido_izquierdo_confirmacion" value="1"  <?php  si($oido_izquierdo_confirmacion );?> id="normal_izquierdo_confirmacion"> Normal
                  </label>

                  <label class="control-label radio-inline col-lg-3">
                    <input type="radio" name="oido_izquierdo_confirmacion" value="0" <?php  no($oido_izquierdo_confirmacion );?>id="hipoacusia_izquierdo_confirmacion"> Hipoacusia
                  </label>     
                </div>

                <div id="sec_hipoacusia_izquierdo_confirmacion" class="sub-form">
                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="col-lg-4 control-label">Grado</label>
                    <div class="col-lg-7">
                      <select class="form-control input-sm col-lg-8" name="grado_izquierdo_confirmacion">
                        <option value="null">Seleccione</option>
                        <?php cargarSelect("grado_auditiva",$cone,"id_grado","descripcion",$grado_izquierdo_confirmacion);?>
                        </select>
                      </select>
                    </div>
                  </div>
              
                  <div class="col-lg-6 col-lg-offset-6">
                    <label class="control-label col-lg-4">Tipo de alteración</label>
                    <div class="checkbox col-lg-8">
                      <label class="control-label txt_izq col-lg-12">
                        <input name="tipo_alteracion_izquierdo" type="checkbox" value="1"  <?php  si($tipo_alteracion_izquierdo );?>>
                        Neurosensorial
                      </label>

                      <label class="control-label txt_izq col-lg-12">
                        <input name="tipo_alteracion_izq_De" type="checkbox" value="1"  <?php  si($tipo_alteracion_De );?>>
                        De Conducción
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="col-lg-4 control-label">Necesidad de Tratamiento</label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="tratamiento_izquierdo" value="1"  <?php  si ($tratamiento_izquierdo );  ?> id="tratamiento_izquierdo_si"> Sí
                    </label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="tratamiento_izquierdo" value="0"  <?php  no($tratamiento_izquierdo );  ?> id="tratamiento_izquierdo_no"> No
                    </label>
                  </div>

                  <div id="sec_tratamiento_izquierdo_si" class="sub-form">
                    <div class="col-lg-6 col-lg-offset-6">
                      <label class="control-label col-lg-4">¿Cuál(es)?</label>
                      <div class="checkbox col-lg-8">
                        <label class="control-label txt_izq col-lg-12">
                          <input name="cual_izquierdo_audif" type="checkbox" value="1" <?php  si ($cual_izquierdo_audif );  ?>>
                          Implementación de audífonos
                        </label>

                        <label class="control-label txt_izq col-lg-12">
                          <input name="cual_izquierdo_cocle" type="checkbox" value="1" <?php  si ($cual_izquierdo_cocle );  ?>>
                          Implante coclear
                        </label>
                      </div>
                    </div>                    

                    <div class="col-lg-6 col-lg-offset-6">
                      <label class="control-label col-lg-4">Terapia auditiva</label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="terapia_auditiva_izquierdo_confirmacion" value="1"  <?php  si ($terapia_auditiva_izquierdo_confirmacion );  ?> id="terapia_auditiva_izquierdo_confirmacion_si"> Sí
                      </label>
                      <label class="control-label radio-inline col-lg-1">
                        <input type="radio" name="terapia_auditiva_izquierdo_confirmacion" value="0"  <?php  no($terapia_auditiva_izquierdo_confirmacion );  ?> id="terapia_auditiva_izquierdo_confirmacion_no"> No
                      </label>
                    </div>              

                    <div id="sec_terapia_auditiva_izquierdo_confirmacion_si" class="sub-form">
                      <div class="col-lg-6 col-lg-offset-6">
                        <label class="col-lg-4 control-label">¿Cuál(es)?</label>
                        <div class="checkbox col-lg-8">
                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_izquierda_verb" type="checkbox" value="1" <?php  si($cual_terapia_izquierda_verb ); ?>>
                            Verbal
                          </label>
                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_izquierda_sena" type="checkbox" value="1" <?php  si($cual_terapia_izquierda_sena ); ?>>
                            Seña
                          </label>
                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_izquierda_otro" type="checkbox" value="1" <?php  si($cual_terapia_izquierda_otro ); ?>>
                            Otro
                          </label>
                        </div>
                      </div>
                    </div>      
                  </div>
                
                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="control-label col-lg-12">Observaciones</label>
                    <textarea class="form-control col-lg-12" rows="3" name="observaciones_oido_izquierdo"><?php echo $observaciones_oido_izquierdo; ?></textarea>
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group col-lg-6 col-lg-offset-6">
                  <label class="col-lg-4 control-label">Oído Derecho</label>
                  <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="oido_derecho_confirmacion" value="1"  <?php  si($oido_derecho_confirmacion );  ?> id="normal_derecho_confirmacion"> Normal
                  </label>

                  <label class="control-label radio-inline">
                    <input type="radio" name="oido_derecho_confirmacion" value="0"  <?php  si($oido_derecho_confirmacion );  ?>id="hipoacusia_derecho_confirmacion"> Hipoacusia
                  </label>
                </div>      
                
                <div id="sec_hipoacusia_derecho_confirmacion" class="sub-form">
                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="col-lg-4 control-label">Grado</label>
                    <div class="col-lg-7">
                      <select class="form-control input-sm col-lg-8" name="grado_derecho_confirmacion">
                      <option value="null">Seleccione</option>
                      <?php cargarSelect("grado_auditiva",$cone,"id_grado","descripcion",$grado_derecho_confirmacion);?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6 col-lg-offset-6">
                    <label class="control-label col-lg-4">Tipo de alteración</label>
                    <div class="checkbox col-lg-8">
                      <label class="control-label txt_izq col-lg-12">
                        <input name="tipo_alteracion_derecho_neuro" type="checkbox" value="1" <?php  si($tipo_alteracion_derecho_neuro );  ?> >
                        Neurosensorial
                      </label>

                      <label class="control-label txt_izq col-lg-12">
                        <input name="tipo_alteracion_derecho_de" type="checkbox" value="1" <?php  si($tipo_alteracion_derecho_de);  ?>>
                        De Conducción
                      </label>
                    </div>
                  </div>

                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="col-lg-4 control-label">Necesidad de Tratamiento</label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="tratamiento_derecho" value="1"  <?php  si ($tratamiento_derecho );  ?> id="tratamiento_derecho_si"> Sí
                    </label>
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="tratamiento_derecho" value="0"  <?php  no($tratamiento_derecho );  ?> id="tratamiento_derecho_no"> No
                    </label>
                  </div>

                  <div id="sec_tratamiento_derecho_si" class="sub-form">
                    <div class="col-lg-6 col-lg-offset-6">
                      <label class="control-label col-lg-4">¿Cuál(es)?</label>
                      <div class="checkbox col-lg-8">
                        <label class="control-label txt_izq col-lg-12">
                          <input name="cual_derecho_audif" type="checkbox" value="1" <?php  si ($cual_derecho_audif );  ?>>
                          Implementación de audífonos
                        </label>

                        <label class="control-label txt_izq col-lg-12">
                          <input name="cual_derecho_cocle" type="checkbox" value="1" <?php  si ($cual_derecho_cocle );  ?>>
                          Implante coclear
                        </label>
                      </div>
                    </div>                    

                    <div class="col-lg-6 col-lg-offset-6">
                      <label class="control-label col-lg-4">Terapia auditiva</label>
                      <label class="control-label radio-inline col-lg-3">
                        <input type="radio" name="terapia_auditiva_derecho_confirmacion" value="1"  <?php  si ($terapia_auditiva_derecho_confirmacion );  ?> id="terapia_auditiva_derecho_confirmacion_si"> Sí
                      </label>
                      <label class="control-label radio-inline col-lg-1">
                        <input type="radio" name="terapia_auditiva_derecho_confirmacion" value="0"  <?php  no($terapia_auditiva_derecho_confirmacion );  ?> id="terapia_auditiva_derecho_confirmacion_no"> No
                      </label>
                    </div>              

                    <div id="sec_terapia_auditiva_derecho_confirmacion_si" class="sub-form">
                      <div class="col-lg-6 col-lg-offset-6">
                        <label class="control-label col-lg-4">¿Cuál(es)?</label>
                        <div class="checkbox col-lg-8">
                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_derecho_verb" type="checkbox" value="1"  <?php  si ($cual_terapia_derecho_verb );  ?>>
                            Verbal
                          </label>

                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_derecho_sena" type="checkbox" value="1"  <?php  si ($cual_terapia_derecho_sena );  ?>>
                            Seña
                          </label>

                          <label class="control-label txt_izq col-lg-12">
                            <input name="cual_terapia_derecho_otro" type="checkbox" value="1"  <?php  si ($cual_terapia_derecho_otro );  ?>>
                            Otro
                          </label>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-lg-6 col-lg-offset-6">
                    <label class="control-label col-lg-12">Observaciones</label>
                    <textarea class="form-control col-lg-12" rows="3" name="observaciones_oido_derecho"><?php echo $observaciones_oido_derecho;  ?></textarea>
                  </div>

                </div>
                
              </div>
            </div>
          </div>
              
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