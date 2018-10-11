<?php
error_reporting(0);

include 'capaDAO/vacunasDAO.php';

$dao = new vacunasDAO($cone);
$fila = $dao->buscarId($idControl) ;

$idOculto= $fila['ID_CONTROL'];
$calendario= $fila['DIA_CALENDARIO'];
$opcionales= $fila['VACUNAS_OPCIONALES'];
$rotavirus= $fila['ROTAVIRUS'];
$hepatitisA= $fila['HEPATITIS_A'];
$neumococo = $fila['NEUMOCOCO'] ;
$meningitis= $fila['MENINGITIS_C'] ;
$otras = $fila['OTRAS'] ;
$vacunas_opcionales_otras_cuales = $fila['CUAL_ES']  ;
$palivizumab =  $fila['PALIVIZUMAB'] ;

?>

<div class="ficha panel panel-default">
  	<div class="panel-body">
    	<form action="Negocio/vacunasBO.php" method="post" >
     		<button class="btn btn-success active subtitulo" type="button" id="vacunas"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Vacunas</button>

     		<div class="row" id="sec_vacunas">
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Al día en Calendario</label>
     					<div class="col-lg-8">
     						<label class="control-label radio-inline col-lg-2">
				                <input type="radio" name="calendario" value="1" <?php si($calendario );  ?>> Sí
				            </label>
				            <label class="control-label radio-inline col-lg-2" >
				                <input type="radio" name="calendario" value="0" <?php no($calendario );  ?>> No
				            </label>
     					</div>
     				</div>
     			</div>
     			<div class="row">
     				<div class="col-lg-6 form-group">
     					<label class="control-label col-lg-4">Vacunas opcionales</label>
     					<div class="col-lg-8 form-group">
     						<label class="control-label radio-inline col-lg-2">
				            	<input type="radio" name="opcionales" value="1" <?php si($opcionales );  ?> id="opcionales_si"> Sí
				        	</label>
				        	<label class="control-label radio-inline col-lg-2" >
				            	<input type="radio" name="opcionales" value="0" <?php no($opcionales );  ?> id="opcionales_no"> No
				        	</label>
     					</div>
     				</div>
     				<div id="sec_opcionales_si" class="sub-form col-lg-6">
     					<div class="row form-group">
	     					<label class="control-label col-lg-4">Vacunas</label>
	     					<div class="col-lg-8">
	     						<div class="form-group checkbox col-lg-12">
					                <label class="control-label txt_izq col-lg-12">
					                	<input name="rotavirus" type="checkbox" value="1" <?php si($rotavirus );  ?> class="vacunas_opcionales">
					                  	Rotavirus
					                </label>
					                <label class="control-label txt_izq col-lg-12">
					                  	<input name="hepatitisA" type="checkbox" value="1" <?php si($hepatitisA );  ?> class="vacunas_opcionales">
					                  	Hepatitis A
					                </label>
					                <!--label class="control-label txt_izq col-lg-12">
					                  	<input name="neumococo" type="checkbox" value="1" <?php si($neumococo );  ?> class="vacunas_opcionales">
					                  	Neumococo
					                </label-->
					                <label class="control-label txt_izq col-lg-12">
					                  	<input name="meningitis" type="checkbox" value="1" <?php si($meningitis );  ?> class="vacunas_opcionales">
					                  	Meningitis C
					                </label>
					                <label class="control-label txt_izq col-lg-12">
					                  	<input name="otras" type="checkbox" value="1" <?php si($otras );  ?> id="vacunas_opcionales_otras" class="vacunas_opcionales">
					                  	Otras
					                </label>
					                <div id="sec_vacunas_opcionales_otras" class="col-lg-12 sub-form">
					                	<label class="control-label col-lg-4">¿Cuál(es)?</label>
					                	<div class="col-lg-8">
					                		<textarea class="form-control col-lg-12" rows="3" name="vacunas_opcionales_otras_cuales" ><?php echo $vacunas_opcionales_otras_cuales ; ?></textarea>
					                	</div>
					                </div>
					            </div>
	     					</div>
	     				</div>
	     				<div class="row form-group">
	     					<label class="control-label col-lg-4">Anticuerpo monoclonal</label>
	     					<div class="col-lg-8">
	     						<div class="form-group checkbox col-lg-12">
					                <label class="control-label txt_izq col-lg-12">
					                	<input name="palivizumab" type="checkbox" value="1" <?php si($palivizumab );  ?> class="vacunas_opcionales">
					                  	Palivizumab
					                </label>
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

     