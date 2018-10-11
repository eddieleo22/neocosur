<?php
error_reporting(0);

include 'capaDAO/funcion_visualDAO.php';

$dao = new funcion_visualDAO($cone);
$fila = $dao->buscarId($idControl);


 $query = "SELECT * FROM patologias_neonatales WHERE `ID_NEOCOSUR`=? ";
               // echo "query ".$query;
	$cone->Abrir();
	 //$retorno = $cone->select($query);						
	//	$ar = $retorno->fetch_assoc(); 
	//$cone->Cerrar();

 
		$sentencia = $cone->prepare($query);
		$sentencia->bind_param("i", $idNeocosur );		
		$sentencia->execute();
		$resultado = $sentencia->get_result();
		$ar = $resultado->fetch_assoc(); 				
		$cone->Cerrar();
	
	
$idOculto=$fila['ID_CONTROL'];
	//Funcion AUDITIVA 

if($ar['EVALUACION_OFTALMOLOGICA_PREVIA_ALTA']=='1'){
$previa_alta = $ar['EVALUACION_OFTALMOLOGICA_PREVIA_ALTA'];
$rop_izq = $ar['ROP_OJO_IZQ'];
$zona_izq = $ar['ID_LOCALIZACION_OJO_IZQ'];
$severidad_izq = $ar['ID_SEVERIDAD_OJO_IZQ'];
$plus_izq = $ar['ENF_PLUS_OJO_IZQ'];
$cirugia_izq = $ar['CIRUGIA_ROP_OJO_IZQ'];
$detalle_cirugia_izq =	$ar['ID_TIPO_CIRUGIA_ROP_OJO_IZQ'];	
$mostrarPost='style="display:none"';
	}	
else
{

$previa_alta='0';
$evaluacion_posterior=	$fila['EVA_ALTA'];
$rop_izquierdo  =	$fila['ROP_IZQ'];
$localizacion_izquierdo  =	$fila['ID_LOCALIZACION_IZQ'];
$severidad_izquierdo =	$fila['ID_SEVERIDAD_IZQ'];
$plus_izquierdo  =	$fila['ENF_PLUS_IZQ'];
$cirugia_izquierdo  =	$fila['CIRUGIA_ROP_IZQ'];
$cual_izquierdo  =	$fila['ID_CIRUGIA_ROP_IZQ'];
}
$rop_derecho  =	$fila['ROP_DER'];
$localizacion_derecho  =	$fila['ID_LOCALIZACION_DER'];
$severidad_derecho  =	$fila['ID_SEVERIDAD_DER'];
$plus_derecho  =	$fila['ENF_PLUS_DER'];
$cirugia_derecho  =	$fila['CIRUGIA_ROP_DER'];
$cual_derecho  =	$fila['ID_CIRUGIA_ROP_DER'];
$bevacizumab  =	$fila['BEVACIZUMAB'];
$instancia  =	$fila['INSTANCIA_EVAL_40_SEM_EC'];
$oftalmologica  =	$fila['INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL'];
$rop_izquierdo_diagnostico  =	$fila['INSTANCIA_EVAL_40_SEM_ROP_IZQ'];
$cirugia_izquierdo_diagnostico =	$fila['INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ'];
$cual_izquierdo_rop =	$fila['ID_CIRUGIA_EVAL_40_SEM_EC_IZQ'];
$cual_izquierdo_rop  =	$fila['INSTANCIA_EVAL_40_SEM_ROP_DER'];
$cirugia_derecho_diagnostico =	$fila['INSTANCIA_EVAL_40_SEM_CIRUGIA_DER'];
$cual_derecho_rop =	$fila['ID_CIRUGIA_EVAL_40_SEM_EC_DER'];
$requiere_cirugia =	$fila['REQUIERE_CIRUGIA'];
$requiere_cirugia_cual =	$fila['ID_CIRUGIA'];
$observaciones =	$fila['OBSERVACIONES'];
$ceguera_izquierdo  =	$fila['CEGUERA_OJO_IZQ'];
$ceguera_derecho =	$fila['CEGUERA_OJO_DER'];


?>

<div class="ficha panel panel-default">
  <div class="panel-body">
    <form method="post" action="Negocio/visualBO.php">
      <button class="btn btn-success active subtitulo" type="button" id="sec_funcion_auditiva"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Función Visual</button>

      <div id="sec_funcon_visual" class="row">
        <div class="col-lg-12">
          <p>Programa de detección Precoz de Retinopatía del Prematuro (ROP)</p>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-6">
            <label class="col-lg-6 control-label">Evaluación previa al alta</label>
            <div class="col-lg-6"> 
				  <label for="previa_alta" class="control-label radio-inline col-lg-2">
					<input type="radio" name="previa_alta" value="1" id="previa_alta_si"  <?php  si($previa_alta); ?>  disabled> Sí
				  </label>
				  <label for="previa_alta" class="control-label radio-inline col-lg-2" >
					<input type="radio" name="previa_alta" value="0"  id="previa_alta_no"  <?php  no($previa_alta); ?> disabled > No
				  </label>
				  <input type="radio" name="previa_alta" value="null"  style="display:none" <?php check($previa_alta); ?> >
            </div>
        </div>
      </div>
		<div class="clearfix visible-lg-block"></div>
	  
		 <div class="form-group col-lg-10 sub-form tabla_previa_alta">
          <table class="table table-bordered">
            <thead>
              <tr>
                
                <td>ROP</td>
                <td>Localización 
                  <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Esquema del fondo de ojo para la clasificación de la retinopatía del prematuro."></span>
				  
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
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta"  value="1" <?php  si($rop_izq); ?> disabled > Sí
                  </label>
                  <label for="rop_izq" class="control-label radio-inline col-lg-3" >
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta" value="0" <?php  no($rop_izq); ?> disabled> No
                  </label>
                    <input type="radio" name="rop_izq" class="detalle_tabla_previa_alta"  value="null"  style="display:none" <?php check($rop_izq); ?>disabled >
                </td>
                <td>
                  <select name="zona_izq" class="form-control input-sm detalle_tabla_previa_alta" disabled>
                    <option value="null">Seleccione</option>
                    <?php cargarSelect("localizacion_neonatal_param",$cone,"id_localizacion_neonatal_param","descripcion",$zona_izq);?>
                  </select> 
                </td>
                <td>
                  <select name="severidad_izq" class="form-control input-sm detalle_tabla_previa_alta" disabled>
                    <option value="null">Seleccione</option>
                    <?php cargarSelect("severidad_neonatal_param",$cone,"id_severidad_neonatal_param","descripcion",$severidad_izq);?>
                  </select> 
                </td>
                <td>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3">
                    <input disabled type="radio" name="plus_izq" class="detalle_tabla_previa_alta" value="1" <?php  si($plus_izq); ?> > Sí
                  </label>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3" >
                    <input disabled type="radio" name="plus_izq" value="0" class="detalle_tabla_previa_alta" <?php  no($plus_izq); ?>  > No
                  </label>
                  <label for="plus_izq" class="control-label radio-inline col-lg-3" >
                    <input disabled type="radio" name="plus_izq" value="-1" class="detalle_tabla_previa_alta" <?php  sn($plus_izq); ?> > S/I
                  </label>
                    <input disabled type="radio" name="plus_izq" value="null" class="detalle_tabla_previa_alta"  style="display:none" <?php check($plus_izq); ?> >
                </td>
                <td>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3">
                    <input disabled type="radio" name="cirugia_izq" value="1" <?php  si($cirugia_izq); ?> id="cirugia_izq_si" class="detalle_tabla_previa_alta"  > Sí
                  </label>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3" >
                    <input disabled type="radio" name="cirugia_izq" value="0" <?php  no($cirugia_izq); ?> id="cirugia_izq_no" class="detalle_tabla_previa_alta" > No
                  </label>
                  <label for="cirugia_izq" class="control-label radio-inline col-lg-3" >
                    <input disabled type="radio" name="cirugia_izq" value="-1" <?php  sn($cirugia_izq); ?> id="cirugia_izq_s_i" class="detalle_tabla_previa_alta"> S/I
                  </label>
                    <input disabled type="radio" name="cirugia_izq" value="null"  style="display:none" <?php check($cirugia_izq); ?> id="cirugia_izq_s_i" class="detalle_tabla_previa_alta"> 
                  <div class="clearfix visible-lg-block"></div>
                  
                  <div id="detalle_cirugia_izq" class="sub-form">
                    <label for="detalle_cirugia_izq" class="txt_izq control-label">¿Cuál?</label>
                    <select name="detalle_cirugia_izq" disabled  class="form-control input-sm detalle_tabla_previa_alta" id="cual_cirugia_izq">
                      <option value="null">Seleccione</option>
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
	
	
      <div class="row" <?php echo $mostrarPost;?> >
        <div class="form-group col-lg-6">
            <label class="col-lg-6 control-label">Evaluación posterior al alta</label>
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="evaluacion_posterior" value="1"  <?php  si($evaluacion_posterior);  ?> id="evaluacion_posterior_si"> Sí
            </label>
            <label for="" class="control-label radio-inline col-lg-2" >
              <input type="radio" name="evaluacion_posterior" value="0"  <?php  no($evaluacion_posterior);  ?> id="evaluacion_posterior_no"> No
            </label>
          </div>
      </div>

      <div id="sec_evaluacion_posterior_si" class="row col-lg-12 sub-form " style="dysplay:block">
        <table >
          <thead>
            <tr style="vertical-align: top; text-align: center;">
              <td class="col-lg-1"><label class="control-label">Ojo</label></td>
              <td class="col-lg-2"><label class="control-label">ROP</label></td>
              <td class="col-lg-2"><label class="control-label">Localización</label></td>
              <td class="col-lg-2"><label class="control-label">Severidad</label></td>
              <td class="col-lg-2"><label class="control-label">Enf. Plus</label></td>
              <td class="col-lg-3"><label class="control-label">Cirugía ROP</label></td>
            </tr>
          </thead>
          <tbody>
            <tr style="vertical-align: top">
              <td class="col-lg-1"><label class="control-label"></label></td>
              <td class="col-lg-2">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="rop_izquierdo" value="1"  <?php  si($rop_izquierdo);  ?>> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="rop_izquierdo" value="0"  <?php  no($rop_izquierdo);  ?>> No
                  </label>
                </div>
              </td>
              <td class="col-lg-2">
                <select class="form-control input-sm" name="localizacion_izquierdo">
                  <option value="null"  >Seleccione</option>
                  <?php cargarSelect("localizacion_visual",$cone,"id_localizacion","descripcion",$localizacion_izquierdo);?>
                </select>
              </td>
              <td class="col-lg-2">
                <select class="form-control input-sm" name="severidad_izquierdo">
                  <option value="null" >Seleccione</option>
                  <?php cargarSelect("severidad_visual",$cone,"id_severidad","descripcion",$severidad_izquierdo);?>
                </select>
              </td>
              <td class="col-lg-2">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_izquierdo" value="1"  <?php  si($plus_izquierdo);  ?>> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_izquierdo" value="0"  <?php  no($plus_izquierdo);  ?>> No
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_izquierdo" value="-1"  <?php  sn($plus_izquierdo);  ?>> S/I
                  </label>
                </div>
              </td>
              <td class="col-lg-3">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_izquierdo" value="1"  <?php  si($cirugia_izquierdo);  ?> id="cirugia_izquierdo_si"> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_izquierdo" value="0"  <?php  no($cirugia_izquierdo);  ?> id="cirugia_izquierdo_no"> No
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_izquierdo" value="-1"  <?php  sn($cirugia_izquierdo);  ?> id="cirugia_izquierdo_s_i"> S/I
                  </label>
                </div>
                <div id="sec_cirugia_izquierdo_si" class="form-group row sub-form">
                  <label class="control-label col-lg-12">¿Cuál?</label>
                    <select class="form-control input-sm" name="cual_izquierdo">
                    <option value="null"  >Seleccione</option>
                  <?php cargarSelect("cirugia_rop_visual",$cone,"id_cirugia_rop","descripcion",$cual_izquierdo);?>
                  </select>
                </div>
              </td>
            </tr>
            <!--tr style="vertical-align: top">
              <td class="col-lg-1"><label class="control-label">Derecho</label></td>
              <td class="col-lg-2">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="rop_derecho" value="1"  <?php  si($rop_derecho);  ?>> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="rop_derecho" value="0"  <?php  no($rop_derecho);  ?>> No
                  </label>
                </div>
              </td>
              <td class="col-lg-2">
                <select class="form-control input-sm" name="localizacion_derecho">
                  <option value="0"  >Seleccione</option>
                  <?php cargarSelect("localizacion_visual",$cone,"id_localizacion","descripcion",$localizacion_derecho);?>
                </select>
              </td>
              <td class="col-lg-2">
                <select class="form-control input-sm" name="severidad_derecho">
                  <option value="0"  >Seleccione</option>
                  <?php cargarSelect("severidad_visual",$cone,"id_severidad","descripcion",$severidad_derecho);?>
                </select>
              </td>
              <td class="col-lg-2">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_derecho" value="1"  <?php  si($plus_derecho);  ?>> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_derecho" value="0"  <?php  no($plus_derecho);  ?>> No
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="plus_derecho" value="-1"  <?php  sn($plus_derecho);  ?>> S/I
                  </label>
                </div>
              </td>
              <td class="col-lg-3">
                <div class="form-group">
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_derecho" value="1"  <?php  si($cirugia_derecho);  ?> id="cirugia_derecho_si"> Sí
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_derecho" value="0"  <?php  no($cirugia_derecho);  ?> id="cirugia_derecho_no"> No
                  </label>
                  <label class="control-label radio-inline">
                    <input type="radio" name="cirugia_derecho" value="-1"  <?php  sn($cirugia_derecho);  ?> id="cirugia_derecho_s_i"> S/I
                  </label>
                </div>
                <div id="sec_cirugia_derecho_si" class="form-group row sub-form">
                  <label class="control-label col-lg-12">¿Cuál?</label>
                  <select class="form-control input-sm" name="cual_derecho">
                    <option value="0"  >Seleccione</option>
                  <?php cargarSelect("cirugia_rop_visual",$cone,"id_cirugia_rop","descripcion",$cual_derecho);?>
                  </select>
                </div>
              </td>
            </tr-->
          </tbody>
        </table>

        

        <div class="row col-lg-12">
          <div class="col-lg-12 form-group">
            <label class="control-label">Evaluación en controles</label>
          </div>
          <div class="col-lg-3 form-group">
            <label class="control-label">Instancia de Evaluación</label>
            <p>A 40 sem. EC</p>
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="instancia" value="1"  <?php  si($instancia);  ?> id="instancia_si"> Sí
            </label>
            <label class="control-label radio-inline col-lg-2" >
              <input type="radio" name="instancia" value="0"  <?php  no($instancia);  ?> id="instancia_no"> No
            </label>
          </div>
          <div id="sec_instancia_si" class="sub-form">
            <div class="col-lg-3 form-group">
              <label class="control-label">Diagnóstico</label>
              <p>Normal y alta oftalmológica</p>
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="oftalmologica" value="1"  <?php  si($oftalmologica);  ?> id="oftalmologica_si"> Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="oftalmologica" value="0"  <?php  no($oftalmologica);  ?> id="oftalmologica_no"> No
              </label>
            </div>

            <div class="col-lg-6 form-group sub-form" id="sec_oftalmologica_no">
              <label class="control-label col-lg-12">ROP</label>
              
              <table>
                <thead>
                  <tr>
                    <td class="col-lg-2">Ojo</td>
                    <td class="col-lg-2">ROP</td>
                    <td class="col-lg-2">Cirugía</td>
                    <td class="col-lg-6"></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-lg-2">Izquierdo</td>
                    <td class="col-lg-2">
                      
                        <div class="col-lg-12">
                          <label class="control-label radio-inline">
                            <input type="radio" name="rop_izquierdo_diagnostico" value="1"  <?php  si($rop_izquierdo_diagnostico);  ?>> Sí
                          </label>
                        </div>
                        <div class="col-lg-12">
                          <label class="control-label radio-inline">
                            <input type="radio" name="rop_izquierdo_diagnostico" value="0"  <?php  no($rop_izquierdo_diagnostico);  ?>> No
                          </label>
                        </div>
                        
                      
                    </td>
                    <td class="col-lg-2">
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_izquierdo_diagnostico" value="1"  <?php  si($cirugia_izquierdo_diagnostico);  ?> id="cirugia_izquierdo_diagnostico_si"> Sí
                        </label>
                      </div>
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_izquierdo_diagnostico" value="0"  <?php  no($cirugia_izquierdo_diagnostico);  ?> id="cirugia_izquierdo_diagnostico_no"> No
                        </label>
                      </div>
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_izquierdo_diagnostico" value="-1"  <?php  sn($cirugia_izquierdo_diagnostico);  ?> id="cirugia_izquierdo_diagnostico_s_i"> S/I
                        </label>
                      </div>
                      
                    </td>
                    <td class="col-lg-6">
                      <div id="sec_cirugia_izquierdo_diagnostico_si" class="sub-form">
                        <label class="control-label">¿Cuál?</label>
                        <select class="form-control input-sm" name="cual_izquierdo_rop">
                        <option value="null"   >Seleccione</option>
                        <?php cargarSelect("cirugia_param_40semana",$cone,"id_cirugia_param_40semana","descripcion",$cual_izquierdo_rop);?>
                      </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-lg-2">Derecho</td>
                    <td class="col-lg-2">
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="rop_derecho_diagnostico" value="1"  <?php  si($rop_derecho_diagnostico);  ?>> Sí
                        </label>
                      </div>
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="rop_derecho_diagnostico" value="0"  <?php  no($rop_derecho_diagnostico);  ?>> No
                        </label>
                      </div>
                      
                    </td>
                    <td class="col-lg-2">
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_derecho_diagnostico" value="1"  <?php  si($cirugia_derecho_diagnostico);  ?> id="cirugia_derecho_diagnostico_si"> Sí
                        </label>
                      </div>
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_derecho_diagnostico" value="0"  <?php  no($cirugia_derecho_diagnostico);  ?> id="cirugia_derecho_diagnostico_no"> No
                        </label>
                      </div>
                      <div class="col-lg-12">
                        <label class="control-label radio-inline">
                          <input type="radio" name="cirugia_derecho_diagnostico" value="-1"  <?php  sn($cirugia_derecho_diagnostico);  ?> id="cirugia_derecho_diagnostico_s_i"> S/I
                        </label>
                      </div>
                      
                    </td>
                    <td class="col-lg-6">
                      <div id="sec_cirugia_derecho_diagnostico_si" class="sub-form">
                        <label class="control-label">¿Cuál?</label>
                        <select class="form-control input-sm" name="cual_derecho_rop">
                        <option value="null"  >Seleccione</option>
                        <?php cargarSelect("cirugia_param_40semana",$cone,"id_cirugia_param_40semana","descripcion",$cual_derecho_rop);?>
                      </select>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
          
          
        </div>

        <div class="row">

          <div class="col-lg-6 form-group">
            <label class="control-label col-lg-6">Requiere cirugía</label>
            <label class="control-label radio-inline col-lg-2">
              <input type="radio" name="requiere_cirugia" value="1"  <?php  si($requiere_cirugia);  ?> id="requiere_cirugia_si"> Sí
            </label>
            <label class="control-label radio-inline col-lg-2" >
              <input type="radio" name="requiere_cirugia" value="0"  <?php  no($requiere_cirugia);  ?> id="requiere_cirugia_no"> No
            </label>
          </div>

          <div class="col-lg-6 form-group sub-form" id="sec_requiere_cirugia_si">
            <select class="form-control input-sm" name="requiere_cirugia_cual">
              <option value="null" ></option>
              <?php cargarSelect("re_cirugia_visual_param",$cone,"id_re_cirugia_visual_param","descripcion",$requiere_cirugia_cual);?>
            </select>
            <label class="control-label col-lg-12">Observaciones</label>
            <textarea class="form-control col-lg-12" rows="3" name="observaciones"> <?php echo $observaciones; ?>
            </textarea>
          </div>

        </div>

        <div class="row col-lg-12">
          <div class="col-lg-6">
            <label class="control-label">Otras Patologías</label>
            <table>
              <thead>
                <tr>
                  <td class="col-lg-3"><label class="control-label">Ojo</label></td>
                  <td class="col-lg-6"><label class="control-label">Ceguera</label></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-lg-3"><label class="control-label">Izquierdo</label></td>
                  <td class="col-lg-6">
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="ceguera_izquierdo" value="1"  <?php  si($ceguera_izquierdo);  ?>> Sí
                    </label>
                    <label class="control-label radio-inline col-lg-2" >
                      <input type="radio" name="ceguera_izquierdo" value="0"  <?php  no($ceguera_izquierdo);  ?>> No
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="col-lg-3"><label class="control-label">Derecho</label></td>
                  <td class="col-lg-6">
                    <label class="control-label radio-inline col-lg-3">
                      <input type="radio" name="ceguera_derecho" value="1"  <?php  si($ceguera_derecho);  ?>> Sí
                    </label>
                    <label class="control-label radio-inline col-lg-2" >
                      <input type="radio" name="ceguera_derecho" value="0"  <?php  no($ceguera_derecho);  ?>> No
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
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