<?php
error_reporting(0);
require '../../capaDAO/ConexionDAO.php';
$cone = new ConexionDAO();

include '../../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);

extract($_POST);

$cant_nombre= count($nombre);

$inner = " ";
$and =" "  ; 
$query ="select ";
$where = " where  1 ";
	if($cant_nombre>=2){
		$and .= " and c_id_centro in  (  ";
		for ($i=0 ; $i< $cant_nombre ; $i++){
		$id .= $nombre[$i].",";	
		
		
		}
		
		$id=substr($id,0, -1);
	
		$id=$cone->test_input($id) ;
		$id=$filtro->process($id) ;
		$and.= $id." )  ";
	}
	else if($cant_nombre==1)
	 {
		$nombre[0] =$cone->test_input($nombre[0]);
		$nombre[0] =$filtro->process($nombre[0]);
		$and .= " and c_id_centro = ".$nombre[0]."  " ;
	 }
	 


if(isset($ingreso)=='1' ){ 
	$qingreso = "
			i.ID_CENTRO,
			i.ID_GENERO as 'Género',
			i.ID_TIPO_PARTO as 'Tipo de parto',
			i.TALLA_NACIMIENTO as 'Talla',
			i.APGAR_1 as 'Apgar 1',
			i.EDAD_GESTACIONAL as 'Edad gest.Fur',
			
			i.NUMERO_FICHA_MEDICA as 'Nº de ficha médica',
			i.FECHA_NACIMIENTO as 'Fecha de Nacimiento',
			i.ID_PRESENTACION as 'Presentación',
			i.PESO_NACIMIENTO as 'Peso nacimiento',
			i.CIRC_CRANEO_NACIMIENTO as 'Cir. cráneo',
			i.APGAR_5 as 'Apgar 5' ,"  ;
	$query .= $qingreso;
	$inner .= "  ";
	
}

	
if(isset($prenatales)=='1'  ){
	$qprenatal ="
			EDAD_MATERNA as 'Edad Materna' ,
			ANIO_ESCOLARIDAD as 'Años de escolaridad' , 
			ID_NIVEL_EDUCACION as 'Nivel educacional' ,
			ID_PARIDAD as 'Paridad' , 
			TABAQUISMO as 'Tabaquismo' ,
			CONTROL_EMBARAZO as 'Control de embarazo' , 
			GEST_PRIMER_CONTROL as 'Semanas de gestación al primer control' ,
			DIABETES as 'Diabetes' , 
			DIABETES_GESTACIONAL AS 'Diabetes gestacional' ,
			HIPERTENSION_ARTERIAL as 'Hipertensión Arterial' ,
			HIPERTENSION_EMBARAZO as 'Hipertensión en el embarazo' , 
			MEDICAMENTOS AS 'Medicamentos' ,
			MULTIPLE as 'Multiple' , 
			ID_MULTIPLE_LUGAR as 'Lugar' , 
			RETARDO_CREC_INTRA_UTERINO as 'Retardo Crecimiento Intrauterino' , 
			RUPTURA_PRE_MEMBRANA_DIAS as 'Ruptura membrana días' ,
			RUPTURA_PRE_MEMBRANA_HORAS as 'Ruptura membrana hrs.' ,
			ANTIBIOTICO_PRENATAL as 'Antibiótico Prenatal' ,
			CORTICOIDE_PRENATAL as 'Corticoide prenatal' ,
			CORTICOIDE_PRENATAL_CURSO_INCOM as 'Completo(1)/Incompleto(0)' , 
			CORTICOIDE_PRENATAL_UN_CURSO as '1 curso (1) / más de 1 curso(0)' ,   
			CORIOAMNIONITIS as 'Corioamnionitis' , 
			SULFATO_MG as 'Sulfato de Magnesio' ,
			SULFATO_MG_NEURO as '¿Uso como neuroprotector?' ,
			ALTERACION_DOPLER_FETAL as 'Alteración del doppler fetal' ,
			FLUJO_REVERSO_VENA_UMBILICAL as 'Flujo reverso en arteria umbilical' ,
			DUCTUS_VENOSO_ALTERADO as 'Ductus venoso alterado' , 
			DILATACION_CEREBRAL_MEDIA as 'Dilatación cerebral media' , 
			OTRA_ALTERACION as 'Otra alteración' , 
			OBSERVACIONES_PRENATALES as 'Observaciones prenatales' 	,";
	$query .=$qprenatal; 	

	$inner .= " inner  join antecedentes_prenatales pre  on pre.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}

if(isset($parto)=='1'  ){
	$qparto = "    
		OXIGENO_FLUJO_LIBRE as 'Oxigeno a presión positiva' , 
		VENTILACION_MASC as 'Vent.masc.' , 
		INTUBACION as 'Intubación' , 
		MASAJE_CARDIACO as 'Masaje card.' ,
		ADRENALINA as 'Adrenalina' , 
		MLF_MAYOR as 'Malformación congénita mayor' ,
		MLF_COMPROMETE_VIDA as 'Compromete la vida' ,
		MLF_NERVIOSO_CENTRAL as 'Defectos del Sistema Nervioso Central' ,
		MLF_NER_ANE as 'Anencefalia', 
		MLF_NER_MIELO as 'Mielo-meningocele' , 
		MLF_NER_HIDRA as 'Hidranencefalia' , 
		MLF_NER_HIDRO as 'Hidrocefalia Congénita' , 
		MLF_NER_HOLO as 'Holo-prosencefalia' ,
		MLF_DEF_CARDIACOS as 'Defectos cardíacos' , 
		MLF_CAR_TRON as 'Tronco arterioso' , 
		MLF_CAR_VAS as 'Transposición de los grandes vasos' , 
		MLF_CAR_FALL as 'Tetralogía de Fallot' , 
		MLF_CAR_UNI as 'Ventrículo único' , 
		MLF_CAR_DOB as 'Doble salida de ventrículo derecho' , 
		MLF_CAR_CAN as 'Canal atrio-ventricular completo' , 
		MLF_CAR_ATRE as 'Atresia pulmonar' , 
		MLF_CAR_TRI as 'Artesia tricuspíde' , 
		MLF_CAR_HIPO as 'Hipoplasia de corazón izquierdo' ,
		MLF_CAR_AORT as 'Interrupción del arco aórtico' , 
		MLF_CAR_ANO as 'Anomalía total del retorno venoso pulmonar' ,
		MLF_DEF_GASTRO as 'Defectos gastrointestinales' ,
		MLF_GST_PAL as 'Fisura de paladar' ,
		MLF_GST_FIS as 'Fístula Traqueo-Esofágica' ,
		MLF_GST_DUO as 'Atresia Duodenal' , 
		MLF_GST_YEY as 'Atresia Yeyunal' ,
		MLF_GST_LLE as 'Atresia lleal' ,
		MLF_GST_REC as 'Atresia de intestino grueso y recto' ,
		MLF_GST_ANO as 'Ano imperforado' ,
		MLF_GST_ONF as 'Onfalocele' ,
		MLF_GST_GAS as 'Gastrosquisis' , 
		MLF_DEF_URINARIOS as 'Defectos genitourinarios' , 
		MLF_URI_AGE as 'Agnesia Renal Bilateral' , 
		MLF_URI_DIS as 'Displasia Renal o Riñon poliquístico / multi-quístico bilateral' , 
		MLF_URI_URO as 'Uropatía obstructiva con Hidronefrosis congénita' ,
		MLF_URI_ECT as 'Ectrofia vesical' , 
		MLF_DEF_CROMOSOMICA as'Anomalías cromosómicas' ,
		MLF_CRO_13 as 'Trisomía 13' ,
		MLF_CRO_18 as 'Trisomía 18' ,
		MLF_CRO_21 as 'Trisomía 21' ,
		MLF_OTROS_DEF as 'Otros defectos' , 
		MLF_OTR_ESQ as 'Displasia esquelética' ,
		MLF_OTR_HER as 'Hernia diafragmática congénita' ,
		MLF_OTR_HID as 'Hidrops fetal' , 
		MLF_OTR_SEC as 'Secuencia de Potter' , 
		MLF_OTR_ERR as 'Errores congénitos del metabolismo' ,
		MLF_OTR_MIO as 'Distrofia miotónica' , 
		MALF_OTROS_CUAL as 'si es otro, ¿cuál?' ,
		OBSERVACIONES as 'Observaciones MCM' ,
		SCORE_NEOCOSUR as 'Score Neocosur' , 
		part.FALLECE_SALA_PARTO as 'Fallece en Sala de Parto',";
	$query .= $qparto; 
	$inner .= " inner  join antecedentes_parto part on part.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}

if(isset($neonatales)=='1' ){
	$qneonatal = " 
		CLINICA_SDR as 'Clínica SDR ',
		HIC as 'HIC',
		ID_HIC_GRADO as 'HIC (Grado)',
        RADIOGRAFIA_TORAX_ALTERADA as 'Radiografía tórax alterada',
        OXIGENO_28_DIAS as 'Oxígeno 28 días',
        OXIGENO_36_SEMANAS as 'Oxígeno 36 sem.',
        ID_SEVERIDAD_DISPLACIA as 'Severidad Displasia BP ',
        RUP_ALVEOLAR as 'Rup. Alveolar',
        RUP_ALVEOLAR_NEUMOTORAX as 'Neumotórax',
        RUP_ALVEOLAR_NEUMOMEDIASTINO as 'Neumomediastino',
        RUP_ALVEOLAR_EFISEMA_INTERSTICIAL as 'Enfisema Intersticial',
        ECO_CEREBRAL_MENOR_7_DIAS as 'Eco cerebral < 7 días',
        ECO_CEREBRAL_7_21_DIAS as 'Eco cerebral 7-21 días',
        ECO_CREBRAL_MAYOR_21_DIAS as 'Eco cerebral > 21 días',
        LEUCOMALACIA as 'Leucomalacia',
        HIDROCEFALIA as 'Hidrocefalia',
        CONVULSIONES as 'Convulsiones',
        DUCTUS as 'Ductus',
        DG_ENTEROCOLITIS_DIAS as 'Enterocolitis días',
        DUCTUS_CLINICO as 'Clínico',
        DUCTUS_ECOGRAFICO as 'Ecográfico', 
        ENTEROCOLITIS_ as 'ECN ',
        PERFORACION_INTESTINAL as 'Perf. intestin',
       neo.HEMORRAGIA_PULMONAR as 'Hemorragia Pulmonar',
        EVALUACION_OFTALMOLOGICA_PREVIA_ALTA as 'Evaluación previa al alta',
        ROP_OJO_IZQ as 'ROP',
        ID_LOCALIZACION_OJO_IZQ as 'Localización',
        ID_SEVERIDAD_OJO_IZQ as 'Severidad',
        ENF_PLUS_OJO_IZQ as 'Enf. Plus',
        CIRUGIA_ROP_OJO_IZQ as 'Cirugía ROP',
        ID_TIPO_CIRUGIA_ROP_OJO_IZQ as ' Cirugía ROP ¿Cuál?',
        PRIMER_FONDO_OJO_DIAS as 'Primer fondo ojo días',
        BEVACIZUMAB as 'Bevacizumab',
        SEPSIS_PRECOZ as 'Sepsis Precoz ',
        ID_TIPO_GERMEN_PRECOZ as 'Germen',
        SEPSIS_PRECOZ_HEMOCULTIVO as  'Hemocultivo',
        SEPSIS_PRECOZ_LCR_POSITIVO as 'LCR positivo',
        SEPSIS_TARDIA as 'Sepsis Tardía',
        NUMERO_SEPSIS_CLINICAS as 'N° de sepsis clínicas',
        EVA_PESQUISA as 'Pesquisa antes del alta',
        EVA_AUTO as 'Potenciales Evocados del Tronco Cerebral (PEAT) Automatizados',
        EVA_AUTO_NOR as '(PEAT) Automatizados Normal',
        EVA_EXT as 'Potenciales Evocados del Tronco Cerebral (PEAT) Extendidos',
        EVA_EXT_NOR as '(PEAT) Extendidos Normal ',
        EVA_EMI as 'Emisiones Otoacústicas',
        EVA_EMI_NOR as 'Emisiones Otoacústicas Normal'," ;
	$query .=$qneonatal; 
	$inner .= " inner  join patologias_neonatales neo on neo.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}

if(isset($evolucion)=='1'  ){
	$qevolucion = "
	VM_CONVENCIONAL AS 'VM Convencional',
		VM_CONVENCIONAL_HORAS as 'VM Convencional hrs.',
        VM_CONVENCIONAL_DIAS as ' VM Convencional días',
        VM_CONVENCIONAL_INGRESO as 'Ingreso a UCI intubado',
        VM_CONVENCIONAL_TERAPIA_SDR as 'Terapia SDR',
        VM_CONVENCIONAL_OTRO as 'Otro',
        VM_ALTA_FRECUENCIA as 'VM Alta Frecuencia',
        VM_ALTA_FRECUENCIA_HORAS as 'Duración VM Alta Frecuencia hrs.',
        VM_ALTA_FRECUENCIA_DIAS as 'Duración VM Alta Frecuencia días',
        USO_OXIGENO as 'Uso de oxígeno ',
        USO_OXIGENO_HORAS as 'Duración oxígeno hrs',
        USO_OXIGENO_DIAS as 'Duración oxígeno días',
        CPAP as 'CPAP',
        CPAP_HORAS as 'Duración CPAP hrs.',
        CPAP_DIAS as 'Duración CPAP días',
        CPAP_TRATAMIENTO_ as 'Trat.inicio SDR',
        CPAP_TRAT_INICIO_SDR as 'Profiláctico (1)/Terapéutico(0)',
        CPAP_POST_EXTUBACION as 'Post extubación',
        CPAP_TRATAMIENTO_APNEA as 'Trat apnea',
        VENTILACION_NASAL_NO_INVASIVA as 'Vent. nasal no invasiva (VNNI)',
        VENTILACION_NASAL_NO_INVASIVA_HORAS as 'Vent. Nasal no Inv. hrs.',
        VENTILACION_NASAL_NO_INVASIVA_DIAS as 'Vent. Nasal no Inv. días',
        VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR 'Como tratamiento primario SDR',
        VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION as 'Postextubacion',
        VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA as 'Trat.apnea',
        RECIBE_SURFACTANTE as 'Recibe Surfactante', 
        RECIBE_SURFACTANTE_PROFILACTICO as 'En atención inmediata',
        RECIBE_SURFACTANTE_SELECTIVO as 'Selectivo',
        RECIBE_SURFACTANTE_INSURE as 'Insure',
        RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS as 'Edad 1° dosis Surf hrs.',
        RECIBE_SURFACTANTE_CANTIDAD_DOSIS as 'N° dosis Surfactante',
        PARACETAMOL as 'Paracetamol',
        INDOMETACINA as 'Indometacina',
        INDOMETACINA_PROFILACTICO as 'Profiláctico',
        INDOMETACINA_TRATAMIENTO as 'Tratamiento',
        IBUPROFENO as 'Ibuprofeno',
        CORTICOIDES_POST_NATAL as 'Corticoides post natal',
        ANTIBIOTICO_MENOR_72_HORAS as 'Antib. < 72 horas',
        ERITROPOYETINA as 'Eritropoyetina',
        OXIDO_NITRICO as 'Óxido Nítrico',
        NUMERO_TRANSFUSIONES as 'N° transfusiones',
        NUMERO_CURSOS_ANTIBIOTICOS as 'N° cursos antibióticos',
        TRATAMIENTO_APNEA as 'Tratamiento Apnea',
        TRATAMIENTO_APNEA_CAFEINA as 'Cafeína',
        TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA 'Aminofilina-teofilina',
        EG_POST_NATAL_TERMINO_XANTINAS as 'Sem. EC Post natal término xantinas.',
		CATETERES_ as ' Arteria umbilical ', 
        CATETER_ARETERIA_UMBILICAL_HORAS as 'Duración Cat. Arterial hrs.',
        CATETER_ARTERIA_UMBILICAL_DIAS as 'Duración Cat. Arterial días',
        CATETER_VENA_UMBILCAL as 'Vena umbilical',
        CATETER_VENA_UMBILICAL_HORAS as 'umbilical hrs',
        CATETER_VENA_UMBILICAL_DIAS as 'umbilical días',
        CATETER_VENOSO_CENTRAL as 'Venoso central',
        CATETER_VENOSO_CENTRAL_HORAS as 'Venoso hrs.',
        CATETER_VENOSO_CENTRAL_DIAS as 'Venoso días',
        CATETER_PRECUTANEO as 'Catéter Percutáneo',
        CATETER_PRECUTANEO_HORAS as 'Catéter Percutáneo hrs',
        CATETER_PERCUTANEO_DIAS as 'Catéter Percutáneo días',
        ALIMENTACION_PARENTAL_TOTAL_DIAS as 'Total alim. parenteral días',
		INICIO_AMINOACIDOS_EDAD_DIAS as 'Edad inicio aminoácidos días',
        ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS as 'Edad inicio lípidos días',
		INIC as 'Edad inicio alim. enteral',
        ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS as 'Edad 100 ml/kg alim. enteral días',
        LECHE_MATERNA_HOSPITALIZACION as 'Leche Materna durante hospitalización',
        LECHE_DONADA as 'Donada',
        LECHE_MADRE as 'De su madre',
        LECHE_MAT_HOSP_ as 'Formula 7 días ml/kg/día',
        LECHE_MAT_HOSP_FORMULA_14_DIAS as 'Formula 14 dias ml/kg/día',
        LECHE_MAT_HOSP_FORMULA_28_DIAS as 'Formula 28 dias ml/kg/día',
        LECHE_MAT_HOSP_FORMULA_36_SEM as 'Formula 36 semana o alta ml/kg/día',
        LECHE_MAT_ as 'Leche Materna 7 dias ml/kg/día',
        LECHE_MAT_HOSP_14_DIAS as 'Leche Materna 14 dias ml/kg/día',
        LECHE_MAT_HOSP_28_DIAS as 'Leche Materna 28 dias ml/kg/día',
        LECHE_MAT_HOSP_36_SEM as 'Leche Materna 36 semana o alta  ml/kg/día',
        FORTIFICANTE_LECHE_MATERNA as 'Fortificante leche materna',
        OBSERVACION_EVAL_TRATAMIENTO as 'Observaciones evol. y tratamiento',";
	$query .= $qevolucion; 
	$inner .= " inner  join evolucion_tratamiento evo_tra on evo_tra.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}

if(isset($antropometria)=='1'  ){
	$qantropometria = "
		PESO_7_DIAS as 'Peso 7 días g.',
		PESO_28_DIAS as 'Peso 28 días g.',
        PESO_36_SEM as 'Peso 36 semanas g.',
        TALLA_7_DIAS as 'talla 7 días cm',
        TALLA_28_DIAS as 'talla 28 días cm',
        TALLA_36_SEM as 'talla 36 semanas cm',
        PESO_ALTA_DIAS as 'Peso alta',
        TALLA_ALTA_DIAS as 'Talla alta cm.',
		EDAD_ALTA_DIAS as 'Edad alta',
        CIRC_CRANEO_7_DIAS as 'Cir. Cráneo 7 días cm',
        CIRC_CRANEO_28_DIAS as 'Cir. Cráneo 28 días cm',
        CIRC_CRANEO_36_SEM as 'Cir. Cráneo 36 semanas cm',
        CIRC_CRANEO_ALTA_DIAS as 'Cir. Cráneo alta',";
	$query .= $qantropometria; 
	$inner .= " inner  join antropometria antro  on antro.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}
if(isset($alta )=='1'  ){
	$qinformacion = "
			
		FECCHA_ALTA_FALLECE AS 'Fecha alta o fallece',
		ID_DESTINO as 'Destino',
        OXIGENO_DOMICILIARIO as 'Oxígeno domiciliario al alta',
        FALLECE_MENOR_DIA_HORAS as 'si fallece < 1 día horas',
        AUTOPSIA as 'Autopsia',
        RESULTADO_AUTOPSIA as 'Resultado autopsia',
        CAUSA_PROBABLE_MALFORMACIONES as 'Causa probable Malformaciones congénitas',
		CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA as 'Causa probable anomalías cromosómicas',
        CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA as 'Causa probable Infecciosa',
        CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA as 'Causa Respiratoria',
        CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA 'Causa Cardíaca',
        CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO as 'Causa Sistema nervioso central',
        CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA as 'Causa Hemorrágica',
        CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL as 'Causa Accidental (lesiones no intencionales)',
        OBSERVACIONES_CAUSA_PROBABLE_MUERTE as 'Observaciones causa probable de muerte',";
	$query .= $qinformacion; 
	$inner .= " inner  join informacion_alta  info_alta  on info_alta.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}
if(isset($estado )=='1'  ){
	$qestado = "			
	estado_ficha as 'Estado de Ficha ',
	nombreEstado as 'Cambio de Estado' ,";
	$query .= $qestado; 
	$inner .= " inner  join estado_ficha  estado  on estado.ID_NEOCOSUR = i.ID_NEOCOSUR  ";
}
$filtroFecha = " " ;

$fecha_desde_ingreso=$cone->test_input($fecha_desde_ingreso) ;
$fecha_hasta_ingreso=$cone->test_input($fecha_hasta_ingreso) ;

if ($fecha_desde_ingreso!= '' && $fecha_hasta_ingreso!= '' ){
	$filtroFecha = " and i.FECHA_NACIMIENTO between '". $fecha_desde_ingreso."' and  '". $fecha_hasta_ingreso."' " ;
	
}
else if ($fecha_desde_ingreso!= '' ){
	$filtroFecha = " and i.FECHA_NACIMIENTO = '". $fecha_desde_ingreso."' ";
	
}
else if ($fecha_hasta_ingreso!= '' ){
	$filtroFecha = "   and i.FECHA_NACIMIENTO = '". $fecha_hasta_ingreso."' ";
	
}

$fecha_desde_ingreso; 
$fecha_hasta_ingreso;


if(trim($query)=="select"){
	$query .= " 'sin datos' ";
	$limite="  limit 0,1 ";
	
}
else {
	$query.= " i.ID_NEOCOSUR as 'Identificador Neocosur' "	;
}


$query=substr($query,0, -1);
$query .= "
		
	
	FROM  ingreso  i    
		inner join centro c on c.c_id_centro = i.id_centro   ".$inner." ".$where."   ".$and."  ".$filtroFecha .$limite. " ;"  ;
	

 		

$cone->Abrir();
$retorno =$cone->select($query);	
$info_campo = $retorno->fetch_fields(); 
$field=$retorno->field_count;
$cone->Cerrar(); 		
	

//

$db_record = 'excel_ficha';
// optional where query

// filename for export
$csv_filename = 'export_'.$db_record.'_'.date('Y-m-d').'.csv';
$csv_export = '';
foreach ($info_campo as $valor) {
			 $csv_export.= utf8_decode($valor->name.';');
   
        }

$csv_export.= '
';


// loop through database query and fill export variable
while($row = $retorno->fetch_array()) {
  // create line with field values
  for($i = 0; $i < $field; $i++) {
    $csv_export.= '"'.$row[$i].'";';
  }	
  $csv_export.= '
';	
}
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);

?>