<?php 
include 'capaDAO/informacion_altaDAO.php';

$dao = new informacion_altaDAO($cone);
$ar = $dao->buscarId($id);

$ID_NEOCOSUR = $idOculto;
$fecha_alta = $ar['FECCHA_ALTA_FALLECE'];
$destino = $ar['ID_DESTINO'];
$oxigen_domicilio = $ar['OXIGENO_DOMICILIARIO'];
$fallece_horas = $ar['FALLECE_MENOR_DIA_HORAS'];
$autopsia = $ar['AUTOPSIA'];// Este elemento no existe en la base
$resultado_autopsia = $ar['RESULTADO_AUTOPSIA'];
$situacion_muerte = $ar['ID_SITUACION_MUERTE'];
$observaciones_situacion_muerte = $ar['OBSERVACIONES_'];
$causaMal = $ar['CAUSA_PROBABLE_MALFORMACIONES'];// Este elemento no existe en la base
$causaAno = $ar['CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA'];
$paro_cardiorespiratorio = $ar['CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO'];
$otra_causa_muerte = $ar['CAUSA_PROBABLE_SITUACION_MUERTE_OTRA'];
$causa_paro_infec = $ar['CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA'];
$causa_paro_resp = $ar['CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA'];
$causa_paro_card = $ar['CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA'];
$causa_paro_sis = $ar['CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO'];
$causa_paro_hem = $ar['CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA'];
$causa_paro_acc = $ar['CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL'];
$detalle_otra_causa_muerte = $ar['CAUSA_PROBABLE_SITUACION_MURTE_CAUSA'];
$observaciones_causa_probable_muerte = $ar['OBSERVACIONES_CAUSA_PROBABLE_MUERTE'];
//$ = $ar['CAUSA_PROBABLE_'];
//var_dump($ar);
?>


<div class="ficha panel panel-default">
  	<div class="panel-body">
	  	<form action="Negocio/altaBO.php" method="post">
	  		<button class="btn btn-success active subtitulo" type="button" id="sec_informacion_alta"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Información del Alta </button>

	  		<button class="btn btn-default subtitulo" type="button" id="sec_fallece"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Fallecimiento </button>

	    	<div id="informacion_alta">
	    		<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="fecha_alta" class="col-lg-6 control-label">Fecha alta o fallece</label>
						<div class="col-lg-6">
							<input type="date" name="fecha_alta" value="<?php echo $fecha_alta;  ?>" id="fecha_alta" class="form-control input-sm" onChange="calc_alta();">
						</div>
					</div>

				</div>

				<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="destino" class="col-lg-6 control-label">Destino</label>
						<div class="col-lg-6">
	            			<select name="destino" value="<?php echo $destino; ?>" class="form-control input-sm detalle_surfactante" id="destino">
				               	<option value="">Seleccione</option>
				               	<?php cargarSelect("destino_param",$cone,"id_destino_param","descripcion",$destino);?>
				            </select> 
				        </div>
					</div>

					<div class="sub-form form-group col-lg-6 detalle_destino_domicilio">
						<label for="oxigen_domicilio" class="col-lg-6 control-label">Oxígeno domiciliario al alta</label>
				        <label for="oxigen_domicilio" class="control-label radio-inline col-lg-2">
				          	<input type="radio" name="oxigen_domicilio" value="1" <?php  si($oxigen_domicilio); ?>  > Sí
				        </label>
				        <label for="oxigen_domicilio" class="control-label radio-inline col-lg-2" >
				           	<input type="radio" name="oxigen_domicilio" value="0" <?php  no($oxigen_domicilio); ?>  > No
				        </label>
                                                <input type="radio" name="oxigen_domicilio" value="null" style="display:none" <?php check($oxigen_domicilio); ?>  >
					</div>

				</div>
	    	</div>
	    	
	    	<div id="fallecimiento">

	    		<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="fallece_horas" class="col-lg-6 control-label">Si fallece < 1 día</label>
						<div class="input-group col-lg-3">
	            			<input type="number" min="0" max="23" step="1" name="fallece_horas" value="<?php echo $fallece_horas;  ?>" class="form-control input-sm" aria-describedby="basic-addon2">
	            			<span class="input-group-addon" id="basic-addon2">horas</span>
	          			</div>
					</div>
				</div>

				<div class="col-lg-12">

					<div class="form-group col-lg-6">
						<label for="autopsia" class="col-lg-6 control-label">Autopsia</label>
				        <label for="autopsia" class="control-label radio-inline col-lg-2">
				          	<input type="radio" name="autopsia" value="1" <?php  si($autopsia); ?> id="autopsia_si"> Sí
				        </label>
				        <label for="autopsia" class="control-label radio-inline col-lg-2" >
				           	<input type="radio" name="autopsia" value="0" <?php  no($autopsia); ?>  id="autopsia_no"> No
				        </label>
                            <input type="radio" name="autopsia" value="null" style="display:none" <?php check($autopsia); ?>  id="autopsia_no" >
					</div>

					<div class="form-group col-lg-6 sub-form resultado_autopsia">
						<label for="resultado_autopsia" class="col-lg-6 control-label">Resultado autopsia</label>
				        <div>
		                  <textarea class="form-control" name="resultado_autopsia" value="" rows="3"><?php echo $resultado_autopsia; ?></textarea>
		              </div>
					</div>

				</div>

				<!--div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="situacion_muerte" class="col-lg-6 control-label">Situación de muerte</label>
						<div class="col-lg-6">
	            			<select name="situacion_muerte" value="<?php echo $situacion_muerte; ?>" class="form-control input-sm detalle_surfactante " id="situacion_muerte">
				               	<option value="0">Seleccione</option>
				               	<option value="1">Retiro soporte vital</option>
				            </select> 
				        </div>
					</div>

	    		</div>

	    		<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="observaciones_situacion_muerte" class="col-lg-6 control-label">Observaciones Situación de muerte</label>
						<div>
		                	<textarea class="form-control" name="observaciones_situacion_muerte" value="" rows="3"><?php echo $observaciones_situacion_muerte ?></textarea>
		              </div>
					</div>

	    		</div-->

	    		<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
			         	<label for="cuasa_muerte" class="col-lg-5 control-label">Causa probable de muerte</label>
			          	<div class="checkbox">
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
                                                <input type="checkbox" value="" onClick="calc_scre();" class="" name="causaMal" <?php si($causaMal);  ?> >
				              Malformaciones congénitas que comprometen la vida
				            </label>
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="" class="" name="causaAno"  <?php si($causaAno);  ?>>
				              Anomalías cromosómicas
				            </label>

				            <!--label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="" class="" name="paro_cardiorespiratorio" id="paro_cardiorespiratorio" <?php si($paro_cardiorespiratorio);  ?>> 
				              Paro cardiorespiratorio no traumático
				            </label-->    

				            <!--label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="" class="" name="otra_causa_muerte" id="otra_causa_muerte" <?php si($otra_causa_muerte);  ?>>
				              Otra
				            </label-->
			            

			          	</div>            
			        </div>

			        <div class="form-group col-lg-6 " >
			        	<div class="causa_paro form">
			        		<label for="causa_paro" class="col-lg-5 control-label">Patologías Adquiridas</label>
				            <div class="checkbox">
				            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
					              	<input type="checkbox" value="" name="causa_paro_infec" id="causa_paro_infec" class="causa_paro" <?php si($causa_paro_infec);  ?>>
					              		Infecciosa
					            </label>
					            <label for="" class="control-label txt_izq col-lg-12 margin-left">
					              	<input type="checkbox" value="" name="causa_paro_resp" id="causa_paro_resp" class="causa_paro" <?php si($causa_paro_resp);  ?>>
					              		Respiratoria
					            </label>
					            <label for="" class="control-label txt_izq col-lg-12 margin-left">
					              	<input type="checkbox" value="" name="causa_paro_card" class="causa_paro" <?php si($causa_paro_card);  ?>>
					              		Cardíaca
					            </label>
					            <label for="" class="control-label txt_izq col-lg-12 margin-left">
					              	<input type="checkbox" value="" name="causa_paro_sis" id="causa_paro_sis" class="causa_paro" <?php si($causa_paro_sis);  ?>>
					              		Sistema nervioso central
					            </label>
					            <label for="" class="control-label txt_izq col-lg-12 margin-left">
					              	<input type="checkbox" value="" name="causa_paro_hem" id="causa_paro_hem" class="causa_paro" <?php si($causa_paro_hem);  ?>>
					              		Hemorrágica
					            </label>
					            <label for="" class="control-label txt_izq col-lg-12 margin-left ">
					              	<input type="checkbox" value="" name="causa_paro_acc" id="causa_paro_acc" class="causa_paro" <?php si($causa_paro_acc);  ?>>
					              		Accidental (lesiones no intencionales) 
					            </label>
				        	</div>
			            
				        </div>

				        <div class="form-group sub-form detalle_otra_causa_muerte">
			            	<label for="causa_paro" class="col-lg-5 control-label">Si es otra la causa, cúal?</label>
			            	<div class="col-lg-7">
					          	<input type="text" name="detalle_otra_causa_muerte" value="<?php echo $detalle_otra_causa_muerte;  ?>" class="form-control input-sm ">
					        </div>
			            </div>

			        </div>

	    		</div>

	    		<div class="col-lg-12">

			    	<div class="form-group col-lg-6">
						<label for="observaciones_causa_probable_muerte" class="control-label">Observaciones causa probable de muerte</label>
						<div>
		                	<textarea class="form-control" name="observaciones_causa_probable_muerte" value="" rows="3"><?php echo $observaciones_causa_probable_muerte;  ?></textarea>
		              	</div>
					</div>

	    		</div>
	    	</div>

	   		<div class=" col-lg-offset-10 col-lg-2">
                        <input type="hidden" name="idOculto" id="idOculto" value="<?php echo $id; ?>"/>
				<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
				<input type="hidden" name="alta_dias_alta" id="alta_dias_alta"   /> 
	          	<button type="submit" class="btn btn-success" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
	        </div> 

	    </form>
	</div>
</div>