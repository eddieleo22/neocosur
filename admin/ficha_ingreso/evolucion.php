<?php
error_reporting(0);
include 'capaDAO/evolucion_tratamientoDAO.php';
include 'capaDAO/cirugiaDAO.php';
include '../ayuda.php';
$dao = new evolucion_tratamientoDAO($cone);
//print_r($dao);
//echo "id".$dao->buscarId($id);
 

$daoCiru = new cirugiaDAO($cone);
$ar = $dao->buscarId($id);
//var_dump($ar);
//print_r($daoCiru);die;
$arC=$daoCiru->buscarId($id); 
// var_dump($arC->fetch_array());
//$idOculto =	$ar['ID_NEOCOSUR'];
 $vm_convencional =	$ar['VM_CONVENCIONAL'];
$duracion_vm_horas =	$ar['VM_CONVENCIONAL_HORAS'];
 $duracion_vm_dias=	$ar['VM_CONVENCIONAL_DIAS'];
$uci_intubado =	$ar['VM_CONVENCIONAL_INGRESO'];
$terapia_sdr =	$ar['VM_CONVENCIONAL_TERAPIA_SDR'];
$otro =	$ar['VM_CONVENCIONAL_OTRO'];
$vm_alta_frecuencia =	$ar['VM_ALTA_FRECUENCIA']; 
 $duracion_vm_alta_horas=	$ar['VM_ALTA_FRECUENCIA_HORAS'];
 $duracion_vm_alta_dias=	$ar['VM_ALTA_FRECUENCIA_DIAS'];
 $uso_oxigeno=	$ar['USO_OXIGENO'];
 $duracion_oxigeno_horas =	$ar['USO_OXIGENO_HORAS'];
 $duracion_oxigeno_dias=	$ar['USO_OXIGENO_DIAS'];
$cpap =	$ar['CPAP'];
 $duracion_cpap_horas=	$ar['CPAP_HORAS'];
 $duracion_cpap_dias=	$ar['CPAP_DIAS'];
 $inicio_sdr=	$ar['CPAP_TRATAMIENTO_'];
 $detalle_inicio_sdr=	$ar['CPAP_TRAT_INICIO_SDR'];
	//$ar['CPAP_TRAT_INICIO_SDR_TERAPEUTICO	
$post_extubacion=	$ar['CPAP_POST_EXTUBACION'];
$apnea =	$ar['CPAP_TRATAMIENTO_APNEA'];
 $vnni=	$ar['VENTILACION_NASAL_NO_INVASIVA'];
 $duracion_vnni_horas=	$ar['VENTILACION_NASAL_NO_INVASIVA_HORAS'];
 $duracion_vnni_dias=	$ar['VENTILACION_NASAL_NO_INVASIVA_DIAS']; 
	$primario_sdr=$ar['VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR'];
	$postextubacion=$ar['VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION'];
	$trat_apnea=$ar['VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA'];
	// Medicamentos !!	
$surfactante =	$ar['RECIBE_SURFACTANTE'];
 $profilactico=	$ar['RECIBE_SURFACTANTE_PROFILACTICO'];
 $selectivo=	$ar['RECIBE_SURFACTANTE_SELECTIVO'];
$insure =	$ar['RECIBE_SURFACTANTE_INSURE'];
 $hrs_dosis=	$ar['RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS'];
$num_dosis =	$ar['RECIBE_SURFACTANTE_CANTIDAD_DOSIS'];
 $indometacina=	$ar['INDOMETACINA'];
 $profilactico_indo=	$ar['INDOMETACINA_PROFILACTICO'];
 $tratamiento_indo=	$ar['INDOMETACINA_TRATAMIENTO'];
 $tratamiento_apnea=	$ar['TRATAMIENTO_APNEA'];
 $cafeina_apnea =	$ar['TRATAMIENTO_APNEA_CAFEINA'];
 $aminofilina_apnea=	$ar['TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA'];
 $paracetamol=	$ar['PARACETAMOL'];
 $ibuprofeno=	$ar['IBUPROFENO'];
$corticoides =	$ar['CORTICOIDES_POST_NATAL'];
 $antibioticos=	$ar['ANTIBIOTICO_MENOR_72_HORAS'];
 $eritropoyetina=	$ar['ERITROPOYETINA'];
 $oxido=	$ar['OXIDO_NITRICO'];
 $num_transfusiones=	$ar['NUMERO_TRANSFUSIONES'];
 $num_cursos=	$ar['NUMERO_CURSOS_ANTIBIOTICOS'];
 $eg_post_natal=	$ar['EG_POST_NATAL_TERMINO_XANTINAS'];
	//cateteres	
$arteria =	$ar['CATETERES_'];
$hrs_arterial =	$ar['CATETER_ARETERIA_UMBILICAL_HORAS'];
 $dias_arterial=	$ar['CATETER_ARTERIA_UMBILICAL_DIAS'];
$vena =	$ar['CATETER_VENA_UMBILCAL'];
 $hrs_vena=$ar['CATETER_VENA_UMBILICAL_HORAS'];
 $dias_vena =	$ar['CATETER_VENA_UMBILICAL_DIAS'];
 $venoso_central=	$ar['CATETER_VENOSO_CENTRAL'];
$hrs_venoso_central =	$ar['CATETER_VENOSO_CENTRAL_HORAS'];
 $dias_venoso_central=	$ar['CATETER_VENOSO_CENTRAL_DIAS'];
 $percutaneo=	$ar['CATETER_PRECUTANEO'];
 $hrs_percutaneo=	$ar['CATETER_PRECUTANEO_HORAS'];
 $dias_percutaneo=	$ar['CATETER_PERCUTANEO_DIAS'];		
 $alimentacion=	$ar['ALIMENTACION_PARENTAL_TOTAL_DIAS'];
 $enteral=	$ar['ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS'];
 $aminoacidos=	$ar['INICIO_AMINOACIDOS_EDAD_DIAS'];		
 $lipidos=	$ar['INIC'];
 $enteral_100=	$ar['ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS'];
$leche_fortificante=	$ar['FORTIFICANTE_LECHE_MATERNA'];
 $leche=	$ar['LECHE_MATERNA_HOSPITALIZACION'];
 $leche_donada=	$ar['LECHE_DONADA'];
 $leche_madre=	$ar['LECHE_MADRE'];
 $formula_7_dias=	$ar['LECHE_MAT_HOSP_'];
$formula_14_dias =	$ar['LECHE_MAT_HOSP_FORMULA_14_DIAS'];
 $formula_28_dias=	$ar['LECHE_MAT_HOSP_FORMULA_28_DIAS'];
 $formula_36_sem=	$ar['LECHE_MAT_HOSP_FORMULA_36_SEM'];
 $materna_7_dias=	$ar['LECHE_MAT_'];
$materna_14_dias =	$ar['LECHE_MAT_HOSP_14_DIAS'];
 $materna_28_dias=	$ar['LECHE_MAT_HOSP_28_DIAS'];
$materna_36_sem =	$ar['LECHE_MAT_HOSP_36_SEM'];
$observaciones_alimentacion=$ar['OBSERVACION_EVAL_TRATAMIENTO'];
?>
<div class="ficha panel panel-default" id="evolucion_tratamiento">
  	<div class="panel-body">
	  	<form action="Negocio/EvolucionBO.php" method="post" name="prueba">

	    	<button class="btn btn-success active subtitulo" type="button" id="sec_respiratorio"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Soporte Respiratorio <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si duración de soporte es < 1 día, ingresar sólo horas.<br>Si duración de soporte es > 1 día, ingresar días completos."></span></button>

	    	<button class="btn btn-default  subtitulo" type="button" id="sec_medicamentos"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Medicamentos</button>

	    	<button class="btn btn-default  subtitulo" type="button" id="sec_cateteres"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Catéteres <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Si duraci�n es < 1 día, ingresar sólo horas.<br>Si duración es > 1 día, ingresar días completos."></span></button>

	    	<button class="btn btn-default  subtitulo" type="button" id="sec_cirugia"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Cirugía</button>

	    	<button class="btn btn-default  subtitulo" type="button" id="sec_alimentacion"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Alimentación</button>

	    	<button class="btn btn-default  subtitulo" type="button" id="sec_observaciones"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Observaciones</button>

	    	<div id="respiratorio"> 

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="vm_convencional" class="col-lg-5 control-label">VM Convencional</label>
			          	<label for="vm_convencional" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="vm_convencional" value="1" id="vm_convencional_si" <?php si($vm_convencional);  ?> > Sí
			          	</label>
			          	<label for="vm_convencional" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="vm_convencional" value="0" id="vm_convencional_no" <?php no($vm_convencional);  ?> > No
			          	</label>
						<input type="radio" name="vm_convencional" value="null" id="vm_convencional_no" style="display:none" <?php check($vm_convencional);  ?> > 
			        </div>

			        <div class="form-group col-lg-6 sub-form duracion_vm">
			        	<label for="duracion_vm" class="col-lg-5 control-label">Duración VM Conv.</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vm_horas" value="<?php echo $duracion_vm_horas; ?>" class="form-control input-sm detalle_vm_convencional" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vm_dias" value="<?php echo $duracion_vm_dias; ?>" class="form-control input-sm detalle_vm_convencional" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>

        				<div class="checkbox">
				            <label for="" class="control-label txt_izq col-lg-8 margin-left">
				              <input type="checkbox" value="" name ='uci_intubado' <?php si($uci_intubado);  ?> class="detalle_vm_convencional">
				              Ingreso a UCI intubado
				            </label>
				            <label for="" class="control-label txt_izq col-lg-8 margin-left">
				              <input type="checkbox" value="" name ='terapia_sdr' <?php si($terapia_sdr);  ?> class="detalle_vm_convencional">
				              Terapia SDR
				            </label>
				            <label for="" class="control-label txt_izq col-lg-8 margin-left">
                                                <input type="checkbox" value="" name ='otro' <?php si($otro);  ?> class="detalle_vm_convencional">
				              Otro
				            </label>
				        </div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="vm_alta_frecuencia" class="col-lg-5 control-label">VM Alta Frecuencia</label>
			          	<label for="vm_alta_frecuencia" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="vm_alta_frecuencia" value="1" id="vm_alta_frecuencia_si" <?php si($vm_alta_frecuencia);  ?> > Sí
			          	</label>
			          	<label for="vm_alta_frecuencia" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="vm_alta_frecuencia" value="0" id="vm_alta_frecuencia_no" <?php no($vm_alta_frecuencia);  ?>>  No
			          	</label>
						<input type="radio" name="vm_alta_frecuencia" value="null" id="vm_alta_frecuencia_no" style="display:none" <?php check($vm_alta_frecuencia);?> >
			        </div>

			        <div class="form-group col-lg-6 sub-form duracion_vm_alta">
			        	<label for="duracion_vm_alta" class="col-lg-5 control-label">Duración VM Alta Frec.</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vm_alta_horas" value="<?php echo $duracion_vm_alta_horas;  ?>"   class="form-control input-sm detalle_vm_alta_frecuencia" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vm_alta_dias" value="<?php echo $duracion_vm_alta_dias;?>" class="form-control input-sm detalle_vm_alta_frecuencia" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
        			</div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="uso_oxigeno" class="col-lg-5 control-label">Uso de oxígeno</label>
			          	<label for="uso_oxigeno" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="uso_oxigeno" value="1" id="uso_oxigeno_si" <?php si($uso_oxigeno);?> > Sí
			          	</label>
			          	<label for="uso_oxigeno" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="uso_oxigeno" value="0" id="uso_oxigeno_no" <?php no($uso_oxigeno);?>> No
			          	</label>
				<input type="radio" name="uso_oxigeno" value="null" id="uso_oxigeno" style="display:none" <?php check($uso_oxigeno);?> >
			        </div>

			        <div class="form-group col-lg-6 sub-form duracion_oxigeno">
			        	<label for="duracion_oxigeno" class="col-lg-5 control-label">Duración oxígeno</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_oxigeno_horas" value="<?php echo $duracion_oxigeno_horas;?>" class="form-control input-sm detalle_duracion_oxigeno" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="200" step="1" name="duracion_oxigeno_dias" value="<?php echo $duracion_oxigeno_dias;?>" class="form-control input-sm detalle_duracion_oxigeno" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
        			</div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="cpap" class="col-lg-5 control-label">CPAP</label>
			          	<label for="cpap" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="cpap" value="1" id="cpap_si"<?php si($cpap) ?>> Sí
			          	</label>
			          	<label for="vm_convencional" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="cpap" value="0" id="cpap_no" <?php no($cpap) ?> > No
			          	</label>
						<input type="radio" name="cpap" value="null" id="cpap_no" style="display:none" <?php check($cpap);  ?>  >
			        </div>

			        <div class="form-group col-lg-6 sub-form duracion_cpap">
			        	<label for="duracion_cpap" class="col-lg-5 control-label">Duración CPAP</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_cpap_horas"value="<?php echo $duracion_cpap_horas;?>" class="form-control input-sm detalle_cpap" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_cpap_dias" value="<?php echo $duracion_cpap_dias;?>" class="form-control input-sm detalle_cpap" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>

        				<div class="checkbox">
			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="inicio_sdr" <?php si($inicio_sdr) ?> class="detalle_cpap" id="inicio_sdr">
			              		Trat. inicio SDR
			            	</label>
			            	
			            	<div class="clearfix visible-lg-block"></div>

			            	<div class="col-lg-offset-1 col-lg-11 sub-form detalle_inicio_sdr">

			            		<label for="detalle_inicio_sdr" class="control-label radio-inline col-lg-12">
					            	<input type="radio" name="detalle_inicio_sdr" value="1" id="" <?php  si($detalle_inicio_sdr) ?>> Profiláctico
					          	</label>
					          	<div class="clearfix visible-lg-block"></div>
					          	<label for="detalle_inicio_sdr" class="control-label radio-inline col-lg-12" >
					            	<input type="radio" name="detalle_inicio_sdr" value="0" id="" <?php no($detalle_inicio_sdr) ?>> Terapéutico
					          	</label>
								<input type="radio" name="detalle_inicio_sdr" value="null" id="" style="display:none" <?php check($detalle_inicio_sdr);  ?>>
			            	</div>

			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="post_extubacion" <?php si($post_extubacion) ?> class="detalle_cpap">
			             		Post extubación
			            	</label>
			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="apnea" <?php si($apnea) ?>  class="detalle_cpap">
			              		Trat. apnea
			            	</label>
			          	</div>
			        </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="vnni" class="col-lg-5 control-label">Vent. nasal no invasiva (VNNI)</label>
			          	<label for="vnni" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="vnni" value="1" id="vnni_si"  <?php si($vnni);?> > Sí
			          	</label>
			          	<label for="vnni" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="vnni" value="0" id="vnni_no" <?php no($vnni);?> > No
			          	</label>
						<input type="radio" name="vnni" value="null" id="" style="display:none" <?php check($vnni);?> >
			        </div>

			        <div class="form-group col-lg-6 sub-form duracion_vnni">
			        	<label for="duracion_vnni" class="col-lg-5 control-label">Duración VNNI</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vnni_horas" value="<?php echo $duracion_vnni_horas;?>"  class="form-control input-sm detalle_duracion_vnni" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="duracion_vnni_dias" value="<?php echo $duracion_vnni_dias;?>" class="form-control input-sm detalle_duracion_vnni" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
						
						<div class="checkbox">
			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="primario_sdr" <?php si($primario_sdr) ?> class="detalle_duracion_vnni" id="inicio_sdr">
			              		Como tratamiento primario SDR
			            	</label>
			            	
			            	<div class="clearfix visible-lg-block"></div>


			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="postextubacion" <?php si($postextubacion) ?> class="detalle_duracion_vnni">
			             		Postextubacion
			            	</label>
			            	<label for="" class="control-label txt_izq col-lg-12 margin-left">
			              		<input type="checkbox" value="1" name="trat_apnea" <?php si($trat_apnea) ?>  class="detalle_duracion_vnni">
			              		Como tratamiento apnea
			            	</label>
			          	</div> 
						
						
						
        			</div>
					


	    		</div>

	    		

	    	</div>

	    	<div id="medicamentos"> 

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="surfactante" class="col-lg-5 control-label">Recibe Surfactante</label>
			          	<label for="surfactante" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="surfactante" value="1" id="surfactante_si" <?php si($surfactante);?> > Sí
			          	</label>
			          	<label for="surfactante" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="surfactante" value="0" id="surfactante_no" <?php no($surfactante);?> > No
			          	</label>
						<input type="radio" name="surfactante" value="null" id="" style="display:none" <?php check($surfactante);?>>
			        </div>

			        <div class="form-group col-lg-6 sub-form detalle_surfactante">

			        	<div class="checkbox">
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="1" name="profilactico" <?php si($profilactico);?> class="detalle_surfactante">
				              En atención inmediata
				            </label>
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="1"  name="selectivo" <?php si($selectivo);?> class="detalle_surfactante">
				              Selectivo
				            </label>
				            <label for="" class="control-label txt_izq col-lg-12 margin-left"> 
				              <input type="checkbox" value="1"  name="insure" <?php si($insure);?> class="detalle_surfactante">
				              Insure <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Intubación - Surfactante - Extubación a CPAP."></span>
				            </label>
				        </div>

			        	<label for="hrs_dosis" class="col-lg-6 control-label">Edad 1° dosis Surf</label>
          				<div class="col-lg-5 input-group linea">
            				<input type="number" min="0" max="100" step="1" name="hrs_dosis" value="<?php echo $hrs_dosis; ?>" class="form-control input-sm detalle_surfactante" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
          				</div>
          				<label for="dosis" class="col-lg-6 control-label">N° dosis Surfactante</label>
          				<div class="col-lg-5 input-group linea">
            				<select name="num_dosis" class="form-control input-sm detalle_surfactante" id="" >
			                	<option value="">Seleccione</option>
									<?php cargarSelect("dosis_surfactante_param",$cone,"id_dosis_surfactante","descripcion",$num_dosis);?>
								
			                </select> 
          				</div>
				    </div>

			    </div>


			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="indometacina" class="col-lg-5 control-label">Indometacina</label>
			          	<label for="indometacina" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="indometacina" value="1" id="indometacina_si" <?php si($indometacina);?>> Sí
			          	</label>
			          	<label for="indometacina" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="indometacina" value="0" id="indometacina_no"<?php no($indometacina);?>> No
			          	</label>
			          	<label for="indometacina" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="indometacina" value="-1" id="indometacina_s_i" <?php sn($indometacina);?>> S/I
			          	</label>
						<input type="radio" name="indometacina" value="null" id="indometacina_s_i" style="display:none" <?php check($indometacina);  ?>>
			        </div>

			        <div class="form-group col-lg-6 sub-form detalle_indometacina">

			        	<div class="checkbox">
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="" name="profilactico" <?php si($profilactico);?>  class="detalle_indometacina">
				              Profiláctico
				            </label>
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox" value="" name="tratamiento_indo" <?php si($tratamiento_indo);?> class="detalle_indometacina">
				              Tratamiento
				            </label>
				        </div>

				    </div>

			    </div>


			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="tratamiento_apnea" class="col-lg-5 control-label">Tratamiento Apnea</label>
			          	<label for="tratamiento_apnea" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="tratamiento_apnea" value="1" id="tratamiento_apnea_si" <?php si($tratamiento_apnea);?>> Sí
			          	</label>
			          	<label for="tratamiento_apnea" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="tratamiento_apnea" value="0" id="tratamiento_apnea_no" <?php no($tratamiento_apnea);?>> No
			          	</label>
						<input type="radio" name="tratamiento_apnea" value="null" id="tratamiento_apnea_no" style="display:none" <?php check($tratamiento_apnea);  ?>> 
			        </div>

			        <div class="form-group col-lg-6 sub-form detalle_tratamiento_apnea">

			        	<div class="checkbox">
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox"  name="cafeina_apnea" <?php si($cafeina_apnea);?> value="" class="detalle_tratamiento_apnea">
				              Cafeína
				            </label>
				            <label for="" class="control-label txt_izq col-lg-12 margin-left">
				              <input type="checkbox"  name="aminofilina_apnea" <?php si($aminofilina_apnea);?> value="" class="detalle_tratamiento_apnea">
				              Aminofilina - teofilina
				            </label>
				        </div>

				    </div>

			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="paracetamol" class="col-lg-5 control-label">Paracetamol</label>
			          	<label for="paracetamol" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="paracetamol" value="1" id="paracetamol_si" <?php si($paracetamol) ;?>  > Sí
			          	</label>
			          	<label for="paracetamol" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="paracetamol" value="0" id="paracetamol_no" <?php no($paracetamol) ;?>  > No
			          	</label>
			          	<label for="paracetamol" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="paracetamol" value="-1" id="paracetamol_s_i" <?php sn($paracetamol) ;?>  > S/I
			          	</label>
						<input type="radio" name="paracetamol" value="null" id="paracetamol_s_i" style="display:none" <?php check($paracetamol);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="ibuprofeno" class="col-lg-5 control-label">Ibuprofeno</label>
			          	<label for="ibuprofeno" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="ibuprofeno" value="1" id="ibuprofeno_si" <?php si($ibuprofeno) ;?>  > Sí
			          	</label>
			          	<label for="ibuprofeno" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="ibuprofeno" value="0" id="ibuprofeno_no" <?php no($ibuprofeno) ;?>  > No
			          	</label>
			          	<label for="ibuprofeno" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="ibuprofeno" value="0" id="ibuprofeno_s_i" <?php sn($ibuprofeno) ;?>  > S/I
			          	</label>
						<input type="radio" name="ibuprofeno" value="null" id="" style="display:none" <?php check($ibuprofeno);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="corticoides" class="col-lg-5 control-label">Corticoides post natal</label>
			          	<label for="corticoides" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="corticoides" value="1" id="corticoides_si" <?php si($corticoides) ;?>  > Sí
			          	</label>
			          	<label for="corticoides" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="corticoides" value="0" id="corticoides_no" <?php no($corticoides) ;?>  > No
			          	</label>
						<input type="radio" name="corticoides" value="null" id="" style="display:none" <?php check($corticoides);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="antibioticos" class="col-lg-5 control-label">Antib. < 72 horas</label>
			          	<label for="antibioticos" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="antibioticos" value="1" id="antibioticos_si" <?php si($antibioticos) ;?>  > Sí
			          	</label>
			          	<label for="antibioticos" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="antibioticos" value="0" id="antibioticos_no" <?php no($antibioticos) ;?>  > No
			          	</label>
						<input type="radio" name="antibioticos" value="null" id="" style="display:none" <?php check($antibioticos);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="eritropoyetina" class="col-lg-5 control-label">Eritropoyetina</label>
			          	<label for="eritropoyetina" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="eritropoyetina" value="1" id="eritropoyetina_si" <?php si($eritropoyetina) ;?>  > Sí
			          	</label>
			          	<label for="eritropoyetina" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="eritropoyetina" value="0" id="eritropoyetina_no" <?php no($eritropoyetina) ;?>  > No
			          	</label>
						<input type="radio" name="eritropoyetina" value="null" id="" style="display:none" <?php check($eritropoyetina);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="oxido" class="col-lg-5 control-label">Óxido Nítrico</label>
			          	<label for="oxido" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="oxido" value="1" id="oxido_si" <?php si($oxido) ;?>  > Sí
			          	</label>
			          	<label for="oxido" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="oxido" value="0" id="oxido_no" <?php no($oxido) ;?>  > No
			          	</label>
						<input type="radio" name="oxido" value="null" id="" style="display:none" <?php check($oxido);  ?>  >
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="num_transfusiones" class="col-lg-5 control-label">N° transfusiones <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Registrar sólo transfusiones de glóbulos rojos o sangre."></span></label>
			          	<div class="col-lg-3">
			          		<input type="number"  value="<?php echo $num_transfusiones;?>" min="0" step="1" name="num_transfusiones" class="form-control input-sm">
			          	</div>
			        </div>
			    </div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="num_cursos" class="col-lg-5 control-label">N° cursos antibióticos</label>
			          	<div class="col-lg-3">
			          		<input type="number" value="<?php echo $num_cursos;  ?>"  min="0" step="1" name="num_cursos" class="form-control input-sm">
				        </div>
				    </div>
				</div>

			    <div class="col-lg-12">
	    			<div class="form-group col-lg-6">
			          	<label for="eg_post_natal" class="col-lg-5 control-label">Sem. EC Post natal término xantinas</label>
			          	<div class="input-group linea col-lg-3">
			          		<input type="number" min="0" max="999" step="1"  value="<?php echo $eg_post_natal;  ?>" name="eg_post_natal" class="form-control input-sm" aria-describedby="basic-addon2">
                    		<span class="input-group-addon" id="basic-addon2">sem.</span>
                    	</div>
			        </div>
			    </div>

	    	</div>

	    	<div id="cateteres">

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="arteria" class="col-lg-5 control-label">Arteria umbilical</label>
			          	<label for="arteria" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="arteria" value="1" id="arteria_si" <?php si($arteria) ;?>  > Sí
			          	</label>
			          	<label for="arteria" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="arteria" value="0" id="arteria_no" <?php no($arteria) ;?>  > No
			          	</label>
						<input type="radio" name="arteria" value="null" id="arteria_no" style="display:none" <?php check($arteria);  ?> >
			        </div>

			        <div class="form-group col-lg-6 detalle_arteria sub-form">

			        	<label for="hrs_arterial" class="col-lg-5 control-label">Duración Cat. Arterial</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" value="<?php echo $hrs_arterial;  ?>" step="1" name="hrs_arterial" class="form-control input-sm detalle_arteria" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
            			</div>
            			<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $dias_arterial;  ?>" name="dias_arterial" class="form-control input-sm detalle_arteria" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
				    </div>

			    </div>

			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="vena" class="col-lg-5 control-label">Vena umbilical</label>
			          	<label for="vena" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="vena" value="1" id="vena_si" <?php si($vena) ;?>  > Sí
			          	</label>
			          	<label for="vena" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="vena" value="0" id="vena_no" <?php no($vena) ;?>  > No
			          	</label>
						<input type="radio" name="vena" value="null" id="" style="display:none" <?php check($vena);  ?> >
			        </div>

			        <div class="form-group col-lg-6 sub-form detalle_vena">

			        	<label for="hrs_vena" class="col-lg-5 control-label">Duración Cat. Venoso</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $hrs_vena;  ?>" name="hrs_vena" class="form-control input-sm detalle_vena" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
            			</div>
            			<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $dias_vena;  ?>" name="dias_vena" class="form-control input-sm detalle_vena" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
				    </div>

			    </div>

			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="venoso_central" class="col-lg-5 control-label">Venoso central</label>
			          	<label for="venoso_central" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="venoso_central" value="1" id="venoso_central_si" <?php si($venoso_central) ;?>  > Sí
			          	</label>
			          	<label for="venoso_central" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="venoso_central" value="0" id="venoso_central_no" <?php no($venoso_central) ;?>  > No
			          	</label>
						<input type="radio" name="venoso_central" value="null" id="" style="display:none" <?php check($venoso_central);  ?> >
			        </div>

			        <div class="form-group col-lg-6 detalle_venoso_central sub-form">

			        	<label for="hrs_venoso_central" class="col-lg-5 control-label">Duración Cat. Venoso</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $hrs_venoso_central;  ?>"  name="hrs_venoso_central" class="form-control input-sm detalle_venoso_central" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
            			</div>
            			<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1"  value="<?php echo $dias_venoso_central;  ?>" name="dias_venoso_central" class="form-control input-sm detalle_venoso_central" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
				    </div>

			    </div>

			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="percutaneo" class="col-lg-5 control-label">Percutáneo</label>
			          	<label for="percutaneo" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="percutaneo" value="1" id="percutaneo_si" <?php si($percutaneo) ;?>  > Sí
			          	</label>
			          	<label for="percutaneo" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="percutaneo" value="0" id="percutaneo_no" <?php no($percutaneo) ;?>  > No
			          	</label>
						<input type="radio" name="percutaneo" value="null" id="" style="display:none" <?php check($percutaneo);  ?> >
			        </div>

			        <div class="form-group col-lg-6 detalle_percutaneo sub-form">

			        	<label for="hrs_percutaneo" class="col-lg-5 control-label">Duración Cat. Percutáneo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Total de horas/días con catéter percutáneo (Silastic) o cateter central (yugular, femoral, o subclavio)."></span></label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $hrs_percutaneo;  ?>" name="hrs_percutaneo" class="form-control input-sm detalle_percutaneo" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">hrs.</span>
            			</div>
            			<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $dias_percutaneo;  ?>" name="dias_percutaneo" class="form-control input-sm detalle_percutaneo" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
          				</div>
				    </div>

			    </div>

	    	</div>

	    	<div id="cirugia">

	    		<table class="table table-bordered" id="tabla_cirugia">
		            <thead>
		            	<tr>
		                	<td class="col-lg-1"></td>
		                	<td class="col-lg-2">Edad</td>
		                	<td class="col-lg-4">Cirugía</td>
		                	<td class="col-lg-4"></td>
		                	<td class="col-lg-1"></td>
		              	</tr>
		            </thead>
		            <tbody>
					<?php
					
					//if($arc!=null){ $arc!=null &&
						while( $arr = $arC->fetch_array())
						 {
					   
						?>
						<tr>
						<td></td>
						<td><?php echo $arr['edad']; ?></td>
						<td><?php echo utf8_encode($arr['descripcion']); ?></td>
						<td><?php echo $arr['otro']; ?></td>
						<td>
						<a href ="regCentros.php?idCirugia=<?php echo $arr['id_cirugia'] ?>&idOculto=<?php echo $id; ?>" style='background:url("../img/eliminar.jpg") left center no-repeat;padding-left:12px;width:26; height:23px '></a>
						<input type="hidden" name="idCirugia" id="idCirugia" value="<?php echo $arr['id_cirugia'] ?>" />
						</td>
						</tr>
						<?php
							}
						//}
						?>
		              <tr class="fila_oculta">
		                <td></td>
		                <td>
		                  <div class="input-group linea">
		                    <input type="number" min="0" max="999" step="1"   name="detalle_cirugia_dias[]" class="form-control input-sm detalle_sepsis_tardia" aria-describedby="basic-addon2">
		                    <span class="input-group-addon" id="basic-addon2">días</span>
		                  </div>
		                </td>
		                  
		                <td>
		                  	<select name="detalle_cirugia[]" class="form-control input-sm detalle_sepsis_tardia detalle_cirugia" id="detalle_cirugia">
		                    	<option value="null">Seleccione</option>
		                    	<?php cargarSelect("cirugia_param",$cone,"id_cirugia_param","descripcion",$detalle_cirugia);?>
		                  	</select> 
		                </td>

		                <td>
		                  	<div class="col-lg-5 sub-form detalle_cirugia_otro">
		                    	<label for="detalle_cirugia_otro" class="txt_izq control-label">Si es otro, cuál?</label>
		                  	</div>
		                  	<div class="col-lg-7 detalle_cirugia_otro sub-form">
		                    	<input type="text" name="detalle_cirugia_otro[]" class="form-control input-sm">
		                  	</div>
		                </td>
		                <td><button type="button" class="btn btn-danger btn-xs eliminar"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
		              </tr>
		            </tbody>
		        </table>

		        <div class="col-lg-2">
		        	<button type="button" class="btn btn-info" id="agregar_tabla_cirugia">Agregar Cirugía</button>
		        </div>

	    	</div>

	    	<div id="alimentacion"> 

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">

			        	<label for="alimentacion" class="col-lg-5 control-label">Total alim. parenteral</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $alimentacion;  ?>"  name="alimentacion" class="form-control input-sm" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
            			</div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">

			        	<label for="aminoacidos" class="col-lg-5 control-label">Edad inicio aminoácidos</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $aminoacidos;  ?>" name="aminoacidos" class="form-control input-sm" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
            			</div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">

			        	<label for="lipidos" class="col-lg-5 control-label">Edad inicio lípidos</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $lipidos; ?>" name="lipidos" class="form-control input-sm" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
            			</div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">

			        	<label for="enteral" class="col-lg-5 control-label">Edad inicio alim. enteral</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $enteral; ?>"  name="enteral" class="form-control input-sm" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
            			</div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">

			        	<label for="enteral_100" class="col-lg-5 control-label">Edad 100 ml/kg alim. enteral</label>
          				<div class="col-lg-3 input-group linea">
            				<input type="number" min="0" max="100" step="1" value="<?php echo $enteral_100; ?>"  name="enteral_100" class="form-control input-sm" aria-describedby="basic-addon2">
            				<span class="input-group-addon" id="basic-addon2">días</span>
            			</div>
				    </div>

	    		</div>

	    		<div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="leche" class="col-lg-5 control-label">Leche Materna durante hospitalización</label>
			          	<label for="leche" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="leche" value="1" id="leche_si" <?php si($leche) ;?>  > Sí
			          	</label>
			          	<label for="leche" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="leche" value="0" id="leche_no" <?php no($leche) ;?>  > No
			          	</label>
						<input type="radio" name="leche" value="null" id="leche_no" style="display:none" <?php check($leche);  ?> >
			        </div>
			    </div>

				
				
				
				
			    <div class="col-lg-9 sub-form detalle_leche">						
						<label for="" class="control-label txt_izq col-lg-8 col-lg-offset-2 margin-left">
						  <input type="checkbox" name="leche_donada" value="1" class="leches" <?php echo   si($leche_donada); ?>>
						  Donada
						</label>
						<label for="" class="control-label txt_izq col-lg-8 col-lg-offset-2 margin-left">
						  <input type="checkbox" name="leche_madre" value="1" class="leches" <?php echo si($leche_madre); ?>>
						  De su madre
						</label>						
						
			        <div class="form-group">
				        <table>
				        	<thead>
				        		<tr>
				        			<td colspan="2" class="col-lg-6">Fórmula</td>
				        			<td colspan="2" class="col-lg-6">Leche Materna</td>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<tr>
				        			<td class="col-lg-3">A los 7 días</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0"  step="0.1" value="<?php echo $formula_7_dias; ?>" step="1" name="formula_7_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        			<td class="col-lg-3">A los 7 días</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0" step="0.1"  value="<?php echo $materna_7_dias; ?>" name="materna_7_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        		</tr>

				        		<tr>
				        			<td class="col-lg-3">A los 14 días</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $formula_14_dias; ?>" name="formula_14_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        			<td class="col-lg-3">A los 14 días</td>
				        			<td class="col-lg-3">
				        				<div class=" input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $materna_14_dias; ?>" name="materna_14_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        		</tr>

				        		<tr>
				        			<td class="col-lg-3">A los 28 días</td>
				        			<td class="col-lg-3">
				        				<div class=" input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $formula_28_dias; ?>" name="formula_28_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        			<td class="col-lg-3">A los 28 días</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $materna_28_dias; ?>" name="materna_28_dias" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        		</tr>

				        		<tr>
				        			<td class="col-lg-3">A las 36 semanas o alta</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $formula_36_sem; ?>" name="formula_36_sem" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        			<td class="col-lg-3">A las 36 semanas o alta</td>
				        			<td class="col-lg-3">
				        				<div class="input-group linea">
				            				<input type="number" min="0" step="0.1" value="<?php echo $materna_36_sem; ?>" name="materna_36_sem" class="form-control input-sm detalle_leche" aria-describedby="basic-addon2">
				            				<span class="input-group-addon" id="basic-addon2">ml/kg/día</span>
				            			</div>
				        			</td>
				        		</tr>


				        	</tbody>
				        </table>
			        </div>


			    </div>

			    <div class="col-lg-12">

	    			<div class="form-group col-lg-6">
			          	<label for="leche_fortificante" class="col-lg-5 control-label">Fortificante leche materna</label>
			          	<label for="leche_fortificante" class="control-label radio-inline col-lg-2">
			            	<input type="radio" name="leche_fortificante" value="1" id="" <?php si($leche_fortificante) ;?>  > Sí
			          	</label>
			          	<label for="leche_fortificante" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="leche_fortificante" value="0" id="" <?php no($leche_fortificante) ;?>  > No
			          	</label>
			          	<label for="leche_fortificante" class="control-label radio-inline col-lg-2" >
			            	<input type="radio" name="leche_fortificante" value="-1" id="" <?php sn($leche_fortificante) ;?>  > S/I
			          	</label>
						<input type="radio" name="leche_fortificante" value="null" id="" style="display:none" <?php check($leche_fortificante);  ?> > 
			        </div>

			    </div>

	    	</div>

	    	<div id="observaciones">
	    		<div class="col-lg-12">
	    			<div class="form-group">
			          	<label for="vm_convencional" class="col-lg-5 control-label">
Observaciones evol. y tratamiento</label>
		            	<div>
		                  <textarea class="form-control" name="observaciones_alimentacion" rows="5"><?php echo $observaciones_alimentacion; ?></textarea>
		              </div>
			        </div>
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




