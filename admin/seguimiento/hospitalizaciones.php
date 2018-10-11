<?php
include 'capaDAO/hospitalizacionDAO.php';

$daoHosp= new hospitalizacionDAO($cone);
$hosObs= $daoHosp->buscarObserId($idControl);
$arC=$daoHosp->buscarId($idControl);

?>

<div class="ficha panel panel-default">
  	<div class="panel-body">
    	<form action="Negocio/hospitalizacionBO.php" method="post">
     		<button class="btn btn-success active subtitulo" type="button" id="hospitalizaciones"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Hospitalizaciones del Período</button>

     		<div class="row" id="sec_hospitalizaciones">
     			<div class="col-lg-12">
     				<table class="table table-bordered" id="tabla_hospitalizacion">
     					<thead>
     						<tr>
     							<td class="col-lg-1">Hosp.</td>
     							<td class="col-lg-4">Diagnóstico</td>
     							<td class="col-lg-2">Fecha</td>
     							<td class="col-lg-1">Día</td>
     							<td class="col-lg-3">
                    Edad al momento de hospitalización
                    <br>(EC hasta 2 años)
                  </td>
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
						<td><?php echo $arr['descripcion']; 
							if($arr['descripcion']=="OTRO"){
								echo " <br> Si es otro ¿cuál? ".$arr['DIAG_CUAL'];
							}
							else if($arr['descripcion']=="RESPIRATORIO"){
								$diag_o2=$arr['DIAG_O2']=='1' ? " Si":" No";
								$diag_ninvasiva=$arr['DIAG_NO_INVASIVA']=='1' ? " Si":" No";
								$diag_invasiva=$arr['DIAG_INVASIVA']=='1' ? " Si":" No";
								$diag_domicilio=$arr['DIAG_O2_DOMICILIO']=='1' ? " Si":" No";
								$tipo_invasiva=$arr['DIAG_INVASIVA_ID'];
								$tipo_domicilio=$arr['DIAG_O2_DOMICILIO_ID'];
								if($tipo_invasiva=="190"){
									$tipo_invasiva=" VM Convencional ";
								}
								else if($tipo_invasiva=="191"){									
									$tipo_invasiva=" Ventilación alta frecuencia ";
								}
								else if($tipo_invasiva=="192"){
									$tipo_invasiva=" ECMO ";
								}
								else {
									
									$tipo_invasiva=" - ";
								}
								if($tipo_invasiva=="187"){
									$tipo_invasiva=" VRS ";
								}
								else if($tipo_domicilio=="188"){									
									$tipo_domicilio=" Adenovirus ";
								}
								else if($tipo_domicilio=="362"){									
									$tipo_domicilio=" Bacteriano ";
								}
								else if($tipo_domicilio=="363"){									
									$tipo_domicilio=" Bordatella ";
								}
								else if($tipo_domicilio=="364"){									
									$tipo_domicilio=" Otros ";
								}
								else {									
									$tipo_domicilio=" - ";
								}
								
								echo " <br> Requiere O2 ? : ".$diag_o2;
								echo " <br> Requiere Ventilación mecánica no invasiva ".$diag_ninvasiva;
								echo " <br> Requiere Ventilación mecánica invasiva ".$diag_invasiva;
								echo " <br> Seleccione ".$tipo_invasiva;
								echo " <br> Requiere O2 domicilario ".$diag_domicilio ;
								echo " <br> ".$tipo_domicilio;
								
							}
						
						?>
						</td>
						<td><?php echo date("d-m-Y", strtotime($arr['FECHA']));?></td>					
                        <td ><?php echo $arr['DIA']; ?></td>
						<td>
						<?php echo $arr['EDAD_AGNOS']; ?> años  <?php echo $arr['EDAD_MESES']; ?> meses  
						
						</td>
						<td>
						<a href ="regCentros.php?idHospital=<?php echo $arr['ID_HOSPITALIZACION'] ?>&idControl=<?php echo $idControl; ?>&idNeocosur=<?php echo $idNeocosur; ?>" style='background:url("../img/eliminar.jpg") left center no-repeat;padding-left:24px;width:24; height:24px '></a>
						<input type="hidden" name="id_sepsis" id="idHospital" value="<?php echo $arr['ID_HOSPITALIZACION'] ?>" />
						</td>
						</tr>
						<?php
						}
						?>
						
						
     						<tr class="fila_oculta">
     							<td></td>
     							<td>
                    <select class="form-control input-sm diagnostico_hospitalizacion" name="diagnostico_hospitalizacion[]" >
                     
                      
					  <?php cargarSelect("hospitalizacion_param",$cone,"id_hospitalizacion_param","descripcion","");?>
                    </select>

                    <div class="sub-form respiratorio_diagnostico_hospitalizacion">
                      <div class="row">
                        <div class="form-group">
                          <label class="col-lg-7 control-label">Requiere O<sub>2</sub></label>
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="hospitalizacion_o2[]" value="1" > Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="hospitalizacion_o2[]" value="0"> No
                          </label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group">
                          <label class="col-lg-7 control-label">Requiere Ventilación mecánica no invasiva</label>
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="hospitalizacion_ventilacion_noin[]" value="1"> Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="hospitalizacion_ventilacion_noin[]" value="0"> No
                          </label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group">
                          <label class="col-lg-7 control-label">Requiere Ventilación mecánica invasiva</label>
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="hospitalizacion_ventilacion_in[]" value="1"> Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="hospitalizacion_ventilacion_in[]" value="0"> No
                          </label>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-lg-5 control-label">Seleccione</label>
                        <div class="col-lg-7">
                          <select class="form-control input-sm" name="hospitalizacion_ventilacion_in_seleccion[]">
                            <option value=""  >Seleccione</option>
							<?php cargarSelect("ventilacion_param",$cone,"id_ventilacion_param","descripcion",$hospitalizacion_ventilacion_in_seleccion);?>
                          </select>
                          </div>
                      </div>

                      <div class="row">
                        <div class="form-group">
                          <label class="col-lg-7 control-label">Requiere O<sub>2</sub> domicilario</label>
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="hospitalizacion_domicilario[]" value="1"> Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="hospitalizacion_domicilario[]" value="0"> No
                          </label>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-lg-5 control-label">Seleccione</label>
                        <div class="col-lg-7">
                          <select class="form-control input-sm" name="hospitalizacion_02_in_seleccion[]">
                            <option value="">Seleccione</option>
                            <?php cargarSelect("respiratoria_param",$cone,"id_respiratoria_param","descripcion",$hospitalizacion_02_in_seleccion);?>
                          </select>
                          </div>
                      </div>
                    </div>

                    <div class="sub-form otro_diagnostico_hospitalizacion">
                      <div class="row col-lg-12">
                        <div class="form-group">
                          <label class="col-lg-7 control-label">Si es otro ¿cuál?</label>
                          <input type="text" name="hospitalizacion_otro[]" class="form-control input-sm">
                        </div>
                      </div>
                    </div>
     							</td>
     							<td>
     								<input type="date" name="fecha_hospitalizacion[]" class="form-control input-sm">
     							</td>
                  <td>
                    <input type="number" max="99" min="0" name="dias_hospitalizacion[]" class="form-control input-sm"></td>

                  <td>
                    <div class="input-group col-lg-12">
                      <input type="number" min="0" step="1" name="anios_hospitalizacion[]" class="form-control input-sm col-lg-5">
                      <div class="input-group-addon input-sm">años</div>

                      <input type="number" min="0" max="11" step="1" name="meses_hospitalizacion[]" class="form-control input-sm col-lg-5">
                      <div class="input-group-addon input-sm">meses</div>
                    </div>
                  </td>

                  <td>
                    <button type="button" class="btn btn-danger btn-xs eliminar">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                  </td>

     						</tr>
     					</tbody>
     				</table>

            <div class=" row col-lg-offset-9 col-lg-2">
              <button type="button" class="btn btn-info" id="agregar_tabla_hospitalizacion">Agregar Hospitalización</button>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label">Observaciones</label>
                  <div>
                    <textarea class="form-control" name="observaciones_hospitalizaciones" rows="5"><?php echo $hosObs["observacion"];?></textarea>
                    </div>
                  </div>
              </div>
            </div>

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

     