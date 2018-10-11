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
		$nombre[0]=$cone->test_input($nombre[0]) ;
		$nombre[0]=$filtro->process($nombre[0]) ;
		$and .= " and c_id_centro = ".$nombre[0]."  " ;
	 }
	 


if(isset($ingreso)=='1' ){ 
	$qingreso = "
				distinct (cont.ID_NEOCOSUR) as 'id neocosur', 
				c.c_nombre as centro,
				c_tipo as ' Tipo ', 
				cont.FECHA_INGRESO_PROGRAMA as 'fecha ingreso programa',
				EDAD_GESTACIONAL as ' edad gest. FUR' ,
				FECHA_NACIMIENTO as 'fecha nacimiento',
				i.ID_GENERO as ' genero',
				DATE_FORMAT( DATE_ADD(FECHA_NACIMIENTO , INTERVAL ((40-EDAD_GESTACIONAL)*7) DAY), '%Y-%m-%d') AS 'Fecha 40 semana EG',
				pr.MULTIPLE	,"  ;
	$query .= $qingreso;
	$inner .= "  inner join antecedentes_prenatales  pr on  pr.ID_NEOCOSUR  =  i.ID_NEOCOSUR  ";
	
}

	
if(isset($control)=='1'  ){
	$qcontrol ="
			
			FECHA_CONTROL  as 'fecha control',
			EDAD_CORREGIDA_AGNOS  as ' año corregido',
			EDAD_CORREGIDA_MESES  as ' mes corregido',
			EDAD_CRONOLOGICA_AGNOS  as 'año cronologico',
			EDAD_CRONOLOGICA_MESES as ' mes cronologico',
			c.c_nombre as centro,
			c_tipo as servicio,";
	$query .=$qcontrol; 	

	$inner .= " ";
}

if(isset($connatales)=='1'  ){
	$qconnatales = "    
		conna.ID_PARIDAD as 'paridad',
		ID_CALIFICACION_ESTADO_NUTRICIONAL as 'estado nutricional',
		MALFORMACIONES_CONGENITAS as 'malformacion congenitas',
		MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO as 'Defectos del Sistema Nervioso Central',
		MALF_CONGENITAS_DEFECTOS_CARDIACOS as 'Defectos cardíacos',
		MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES as 'Defectos gastrointestinales',
		MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS as 'Defectos genitourinarios',
		MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS as 'Defectos cromosómicas',
		MALF_CONGENITAS_OTROS_DEFECTOS as 'Otros defectos',
		MALF_CONGENITAS_OTRO_CUAL as 'Si es otro, cuál?',
		conna.OBSERVACIONES,";
	$query .= $qconnatales; 
	$inner .= " left join antecedentes_connatales  conna on conna.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($familiar)=='1' ){
	$qfamiliar = " 
		ID_APORTA_INFO_FAMILIAR as 'Quién aporta la información',
		ID_CUIDADOR_RESPONSABLE as 'Cuidador responsable',
        ID_PAIS_RESIDENCIA as 'País de residencia',
        ID_CIUDAD as 'Ciudad',
        COMUNA as 'Comuna o Barrio',
        NUMERO_NINOS_FAMILIA as 'N° de niños (<18 años) del grupo familiar ',
        MIGRACION_MADRE as 'Es la madre nacida en este país',
        MIGRACION_MADRE_DESDE as 'Desde cuándo años',
        MIGRACION_PADRE as 'Es el padre nacido en este país',
        MIGRACION_PADRE_DESDE as 'Desde cuándo años',
        ID_NIVEL_EDUCACIONAL_MADRE as 'Nivel educacional Madre',
        ID_NIVEL_EDUCACIONAL_PADRE as 'Nivel educacional Padre',
        ID_OCUPACION_MADRE as 'Ocupación principal Madre',
        ID_OCUPACION_PADRE as 'Ocupación principal'," ;
	$query .=$qfamiliar; 
	$inner .= " left join antecedentes_familiares fami on fami.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($antropometria)=='1'  ){
	$qantropometria = "
		PESO as 'Peso g.',
		TALLA as 'Talla cm',
        CIRCUNFERENCIA_CRANEO as 'Cir.Craneana cm',
        IMC as 'IMC',
        OMS as 'Estado nutricional según OMS',
        TALLA_BAJA as 'Talla Baja',
        MICROCEFALIA as 'Microcefalia',
        MACROCEFALIA as 'Macrocefalia',";
	$query .= $qantropometria; 
	$inner .= " left join antropometria_control antro on antro.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($alimentacion)=='1'  ){
	$qalimentacion = "
		ID_ALIMENTACION_LACTEA as 'Alimentación láctea',
		ID_FORMULA_UTILIZADA as 'Fórmula utilizada',
        EDAD_INTRODUCCION_SOLIDO_AGNO as 'Edad introducción de sólidos años',
        EDAD_INTRODUCCION_SOLIDO_MESES as 'Edad introducción de sólidos meses',";
	$query .= $qalimentacion; 
	$inner .= " left join alimentacion  ali  on ali.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($auditiva )=='1'  ){
	$qauditiva = "			
				PESQUISA_ANTES_DEL_ALTA as 'Pesquisa antes del alta',		
				PEAT_AUTOMATIZADOS as 'Potenciales Evocados del Tronco Cerebral (PEAT) Automatizados',			
				PEAT_ATOMATIZADOS_NORMAL as '¿Normal?',
				PEAT_EXTENDIDOS as 'PEAT extendidos',	
				PEAT_EXTENDIDOS_NORMAL as '¿Normal?',
				EMISIONES_OTOACUSTICAS as 'Emisiones Otoacústicas',		
				EMISIONES_OTOACUSTICAS_NORMAL as '¿Normal?'	,
				EVALUACION_AUDITIVA as 'Evaluación Auditiva',
				FECHA_EVALUACION as 'Fecha',
				EVALUACION_NORMAL as 'Normal',
				POST_AUDIO as 'Audiometría',
				POST_AUDIO_NORMAL as 'Normal',
				POST_PEAT_AUTO as 'PEAT automatizados',
				POST_PEAT_AUTO_NORMAL as 'Normal',
				POST_PEAT_EXT as 'PEAT extendidos',
				POST_PEAT_EXT_NORMAL as 'Normal',
				POST_OIDO_IZQ as 'Oído Izquierdo',
				POST_OIDO_IZQ_GRADO as 'Grado',
				POST_OIDO_DER as 'Oído Derecho',
				POST_OIDO_DER_GRADO as 'Grado',
				CONFIRMACION_DIAGNOSTICO as 'Confirmación de diagnóstico',
				FECHA_DIAGNOSTICO as ' Fecha Diagnostico',
				CONF_OIDO_IZQ_RESUL as 'Confirmación Oído Izquierdo',
				CONF_OIDO_IZQ_GRADO as 'Grado Confirmación',
				CONF_OIDO_IZQ_NEURO as 'Alteración Neurosensorial',
				CONF_OIDO_IZQ_DE as 'Alteración De Conducción',
				CONF_OIDO_IZQ_TRAT as 'Necesidad de Tratamiento',
				CONF_OIDO_IZQ_AUDIF as 'Implementación de audífonos',
				CONF_OIDO_IZQ_COCLE as 'Implante coclear',
				CONF_OIDO_IZQ_TERA as 'Terapia auditiva',
				CONF_OIDO_IZQ_VERB as 'Verbal',
				CONF_OIDO_IZQ_SENA as 'Seña',
				CONF_OIDO_IZQ_OTRO as 'Otro',
				CONF_OIDO_IZQ_OBS as 'Observaciones',
				CONF_OIDO_DER_RESUL as 'Confirmación Oído Derecho',
				CONF_OIDO_DER_GRADO as 'Grado Confirmación',
				CONF_OIDO_DER_NEURO as 'Alteración Neurosensorial',
				CONF_OIDO_DER_DE  as 'Alteración De Conducción',
				CONF_OIDO_DER_TRAT  as 'Necesidad de Tratamiento',
				CONF_OIDO_DER_AUDIF  as 'Implementación de audífonos',
				CONF_OIDO_DER_COCLE  as 'Implante coclear',
				CONF_OIDO_DER_TERA  as 'Terapia auditiva',
				CONF_OIDO_DER_VERB  as 'Verbal',
				CONF_OIDO_DER_SENA  as 'Seña',
				CONF_OIDO_DER_OTRO as 'Otro',
				CONF_OIDO_DER_OBS  as 'Observaciones',";
	$query .= $qauditiva; 
	$inner .= " left join funcion_auditiva auditiva on auditiva.ID_CONTROL = cont.ID_CONTROL  ";
}
if(isset($visual )=='1'  ){
	$qvisual = "			
		EVA_ALTA as 'Evaluación posterior al alta',
		ROP_IZQ as 'ROP',
        ID_LOCALIZACION_IZQ as 'Localización',
        ID_SEVERIDAD_IZQ as 'Severidad',
        ENF_PLUS_IZQ as 'Enf. Plus',
        CIRUGIA_ROP_IZQ as 'Cirugía ROP',
        INSTANCIA_EVAL_40_SEM_EC as 'Instancia de Evaluación',
        REQUIERE_CIRUGIA as 'Requiere cirugía',
        ID_CIRUGIA as 'Cirugia',
        ID_CIRUGIA_ROP_IZQ as '¿Cuál Cirugía ROP?',
        visual.OBSERVACIONES as 'Observaciones',
        CEGUERA_OJO_IZQ as 'Ojo Izquierdo',
        CEGUERA_OJO_DER as 'Ojo Derecho',";
	$query .= $qvisual; 
	$inner .= " left join funcion_visual  visual  on visual.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($compromiso )=='1'  ){
	$qcompromiso = "			
		O2 as 'O2',
		BRONCODILATADORES as 'Broncodilatadores',
        CORTICOIDES_INHALATORIOS as 'Corticoides inhalatorios',
        FECHA_SUSPENSION_OX as 'Fecha suspensión oxígeno domiciliario',
        OSTOMIA as 'Ostomía',
        ID_TIPO_OSTOMIA as '¿Cuál?',
        RECONSTRUCCION_TRANSITO as 'Reconstitución del tránsito',
        FECHA_RECONSTRUCCION_TRANSITO as 'Fecha Reconstitución del tránsito',
        PROFILAXIS_ANTIBIOTICA as 'Requiere Profilaxis Antibiótica',
        PROFILAXIS_FECHA_SUSPENSION as 'Fecha de suspensión',
        ESTUDIO_IMAGENES as 'Estudio imágenes',
        ESTUDIO_ECO_RENAL as 'Estudio Eco renal',
        ESTUDIO_ECO_RENAL_ALTERACION as 'Alteración Eco renal',
        ESTUDIO_ECO_RENAL_ALTERACION_DESCRIP as 'Describa Eco renal',
        CINTIGRAFIA as 'Cintigrafía',
        CINTIGRAFIA_ALTERACION as 'Alteración Cintigrafía',
        CINTIGRAFIA_ALTERACION_DESCRIP as 'Describa Cintigrafía',
        URETROCISTOGRAFIA as 'Uretrocistografía',
        URETROCISTOGRAFIA_ALTERACION as 'Alteración Uretrocistografía',
        URETROCISTOGRAFIA_ALTERACION_DESCRIP as 'Describa Uretrocistografía',
        CONTROL_PRESION_ARTERIAL as 'Control de presión arterial',
        ALTERACION_ALGUN_EVENTO as 'Alteración en algún evento',
        NEURO_HIC_GRADO as 'HIC (Grado)',
        NEURO_HIC_GRADO_CUAL as 'Grado',
        NEURO_LEUCOMALACIA as 'Leucomalacia',
        NEURO_HIDROCEFALIA as 'Hidrocefalia',
        NEURO_HIDROCEFALIA_VALVULA as 'Válvula derivativa',
        CONVULSIONES_POST_ALTA as 'Convulsiones post-alta',
        REQUIERE_TRATAMIENTO as '¿Requiere tratamiento?',
        FECHA_SUSPENSION_TRAT as 'Fecha de suspensión tratamiento anterior',";
	$query .= $qcompromiso; 
	$inner .= " left join compromiso_otros  otros  on otros.ID_CONTROL = cont.ID_CONTROL  ";
}

if(isset($neurodesarollo )=='1'  ){
	$qneurodesarollo = "			
        NEUROLOGICA_2_VISION as 'Visión Normal',
        NEUROLOGICA_2_VISION_CEGUERA as 'Ceguera',
        NEUROLOGICA_2_VISION_ESTRABISMO as 'Estrabismo',
        NEUROLOGICA_2_VISION_REFRACCION as 'Vicios de refracción con uso de lentes',
        NEUROLOGICA_2_AUDICION as 'Audición Normal',
        NEUROLOGICA_2_AUDICION_NO as 'Hipoacusia Unilateral',
        NEUROLOGICA_2_MOTORA as 'Función Motora',
        NEUROLOGICA_2_PARALISIS as 'Parálisis Cerebral',
        NEUROLOGICA_2_PARALISIS_SI as 'Diplegia',
        NEUROLOGICA_2_COGNITIVA as 'Situación Cognitiva',
        NEUROLOGICA_2_OTROS as 'Otros',
        NEUROLOGICA_2_OTROS_CONVULSIVO as 'Sindrome convulsivo en tratamiento',
	    NEUROLOGICA_2_OTROS_HIDROCEFALIA as 'Hidrocefalia con válvula derivativa', 
        PSICOMOTOR_2_EXAMEN as 'Resumen del Desarrollo Psicomotor a los 2 años de EC Examen Normal',
		PSICOMOTOR_2_EX_HIPO as 'Hipotonía',
        PSICOMOTOR_2_EX_HIPER as 'Hipertonía',
        PSICOMOTOR_2_EX_FOCA as 'Focalización',
        PSICOMOTOR_2_EXA_HEMI as 'Hemisíndrome',
        PSICOMOTOR_2_AUDITIVA_SEN as 'Auditiva Normal',
        PSICOMOTOR_2_AUDITIVA_SEN_HIPO as 'Hipoacusia (Grado)',
        PSICOMOTOR_2_AUDITIVA_SEN_VISUAL as 'Visual Uso de lentes',
        PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA as 'Cirugía',
        PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA_DESCI as 'Describe Cirugía',
        PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA as 'Retraso del lenguaje',
        PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA_SI as 'Tipo Retraso del lenguaje',
        PSICOMOTOR_2_AUDITIVA_OTRO_CEFALIA 'Otros hallazgos',
        PSICOMOTOR_2_AUDITIVA_OTRO_ALTERA as 'Alteración de conducta',
        PSICOMOTOR_2_AUDITIVA_NEURO as 'Neurorehabilitación',
        PSICOMOTOR_2_AUDITIVA_OTRO_SINDRO as 'Sindrome Convulsivo',
        PSICOMOTOR_2A7ANIOS_TEPSI as 'TEPSI',
        PSICOMOTOR_2A7ANIOS_TEP_NORMAL as 'TEPSI Normal',
        PSICOMOTOR_2A7ANIOS_TEP_FECHA as 'Fecha de aplicación TEPSI',
        PSICOMOTOR_2A7ANIOS_TEP_ANIOS as 'Edad TEPSIS años',
        PSICOMOTOR_2A7ANIOS_TEP_MESES as 'Edad TEPSIS meses',
        PSICOMOTOR_2A7ANIOS_TEP_PUNTAJE as 'Puntaje TEPSIS',
        PSICOMOTOR_2A7ANIOS_BAYLE as 'Bayley',
        PSICOMOTOR_2A7ANIOS_BAYLE_VERSION as 'Versión aplicada Bayley',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA as 'Fecha de aplicación 2',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS as 'Edad versión 2 años',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES as 'Edad versión 2 meses',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_MENTAL as 'Escala Mental',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA as 'Escala Motora',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_CONDUCTA as 'Escala de Conducta',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL as 'Normal',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA_3 as 'Fecha de aplicación 3',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS_3 as 'Edad versión 3 años',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES_3 as 'Edad versión 3 meses',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA_3 as 'Escala Motora versión 3',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_COGNI_3 as 'Escala de Cognitiva',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_LENG_3 as 'Escala de Lenguaje',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_SOCIO_3 as 'Escala Socio-emocional',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_COMPOR_3 as 'Escala Comport. adaptativo',
        PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL_3 as 'Normal',
        PSICOMOTOR_A3ANIOS_RET_LENG as 'Retraso de lenguaje (Niños hasta los 3 años)',
        PSICOMOTOR_A3ANIOS_RET_LENG_TIPO as 'Tipo retraso ',
        PSICOMOTOR_A3ANIOS_RET_LENG_REHAB as 'Rehab. fonoaudiológica',
		PSICOMOTOR_3ANIOS_RET_EXPRESIVO as 'Trastorno expresivo de lenguaje (Niños sobre los 3 años)',
		PSICOMOTOR_3ANIOS_RET_EXPRESIVO_REHAB as 'Rehab. fonoaudiológica',
		PSICOMOTOR_2A4ANIOS_COEFICIENTE as 'Evaluación Coeficiente intelectual (WPPSI-R)',
		PSICOMOTOR_2A4ANIOS_COE_FECHA_1 as 'Fecha de aplicación (WPPSI-R)',
		PSICOMOTOR_2A4ANIOS_COE_ANIOS_1 as 'Edad años',
		PSICOMOTOR_2A4ANIOS_COE_MESES_1 as 'Edad meses',
		PSICOMOTOR_2A4ANIOS_COE_VERB_1 as 'Área Verbal',
		PSICOMOTOR_2A4ANIOS_COE_MANIPU_1 as 'Área Manipulativa 1 ',
		PSICOMOTOR_2A4ANIOS_COE_TOTAL_1 as 'Total',
		PSICOMOTOR_2A4ANIOS_COE_FECHA_2 as 'Fecha de aplicación Manipulativa',
		PSICOMOTOR_2A4ANIOS_COE_ANIOS_2 as 'Edad años',
		PSICOMOTOR_2A4ANIOS_COE_MESES_2 as 'Edad meses',
		PSICOMOTOR_2A4ANIOS_COE_VERB_2 as 'Área Verbal',
		PSICOMOTOR_2A4ANIOS_COE_MANIPU_2 as 'Área Manipulativa 2 ',
		PSICOMOTOR_2A4ANIOS_COE_PROCESA_2 as 'Velocidad Procesamiento',
		PSICOMOTOR_2A4ANIOS_COE_LENGUAJE_2 as 'Velocidad Procesamiento',
		PSICOMOTOR_2A4ANIOS_OTRO_MSCA as 'MSCA (McCarthy Scale of Children’s Abilities)',
		PSICOMOTOR_2A4ANIOS_OTRO_SCQ as 'SCQ (Social Communicaton Questionnarie)',
		PSICOMOTOR_2A4ANIOS_OTRO_MCHAT as 'MCHAT (Modified Checklist for Autism in Toddlers)',
		PSICOMOTOR_2A4ANIOS_OTRO_VABS as 'VABS-II (Vineland Adaptative Behaviour Scales)',
		PSICOMOTOR_2A4ANIOS_OTRO_GMFCS as 'GMFCS (Gross motor functional classification Scale) ',
		PSICOMOTOR_2A4ANIOS_OTRO_OBSERV as 'OBSERVACIONES', 
		NEURODESAROLLO_2ANIOS_MOTORA as 'Compromiso función motora gruesa',
		NEURODESAROLLO_2ANIOS_MOTORA_NIVEL as 'Nivel función',
		NEURODESAROLLO_2ANIOS_PARALISIS as 'Tipo de Parálisis cerebral',
		NEURODESAROLLO_2ANIOS_PARALISIS_CUAL as '¿Cuál?',
		NEURODESAROLLO_2ANIOS_OTROS_TRANSTORNOS as 'Otros transtornos Conductual',
		NEURODESAROLLO_2ANIOS_OTROS_LENGUAJE as 'Otros transtornos de Lenguaje',
		NEURODESAROLLO_2ANIOS_OTROS_APRENDIZAJE as 'Otros transtornos De aprendizaje y/o atencionales',";
	$query .= $qneurodesarollo; 
	$inner .= " left join evaluacion_neurodesarrollo  neuro  on neuro.ID_CONTROL = cont.ID_CONTROL  ";
}
if(isset($vacunas )=='1'  ){
	$qvacunas = "			
		DIA_CALENDARIO as 'Al día en Calendario',
		VACUNAS_OPCIONALES as 'Vacunas opcionales',
        ROTAVIRUS as 'Rotavirus',
        HEPATITIS_A as 'Hepatitis A',
        MENINGITIS_C as 'Meningitis C',
        OTRAS as 'Otras',
        CUAL_ES as '¿Cuál(es)?',
        PALIVIZUMAB as 'Palivizumab',";
	$query .= $qvacunas; 
	$inner .= " left join vacunas  vacu  on vacu.ID_CONTROL = cont.ID_CONTROL  ";
}
// FALTA HOSPITALIZACION
if(isset($periodo )=='1'  ){
	$qperiodo = "			
	estado_ficha as 'Estado de Ficha ',
	nombreEstado as 'Cambio de Estado' ,";

}
if(isset($paciente )=='1'  ){
	$qpaciente = "			
		FALLECE_SEGUIMIENTO as 'Fallece durante el seguimiento',
		ID_LUGAR_FALLECE as 'Lugar donde fallece',
        FECHA_FALLECE as 'Fecha fallece',
        EDAD_FELLECE_AGNOS as 'Edad al momento de fallecer años',
        EDAD_FELLECE_MESES as 'Edad al momento de fallecer meses',
        perdida.OBSERVACIONES as 'Observaciones',
        ID_CAUSA_PERDIDA as 'Causa',
        PERDIDA_PACIENTE as 'Pérdida del Paciente ',";
	$query .= $qpaciente; 
	$inner .= " left join perdida_paciente  perdida  on perdida.ID_CONTROL = cont.ID_CONTROL  ";
}
if(isset($ficha )=='1'  ){
	$qficha = "			
	estado_ficha as 'Estado de Ficha ',
	nombreEstado as 'Cambio de Estado' ,";

}

$filtroFecha = " " ;
$fecha_desde_segui=$cone->test_input($fecha_desde_segui) ;
$fecha_desde_segui=$filtro->process($fecha_desde_segui) ;
$fecha_hasta_segui=$cone->test_input($fecha_hasta_segui) ;
$fecha_hasta_segui=$filtro->process($fecha_hasta_segui) ;


if ($fecha_desde_segui!= '' && $fecha_hasta_segui!= '' ){
	$filtroFecha = " and FECHA_CONTROL between '". $fecha_desde_segui."' and  '". $fecha_hasta_segui."' " ;
	
}
else if ($fecha_desde_segui!= '' ){
	$filtroFecha = " and FECHA_CONTROL = '". $fecha_desde_segui."' ";
	
}
else if ($fecha_hasta_segui!= '' ){
	$filtroFecha = "   and FECHA_CONTROL = '". $fecha_hasta_segui."' ";
	
}

$fecha_desde_segui;
$fecha_hasta_segui;



if(trim($query)=="select"){
	$query .= " ' sin datos' ";
	$limite=" limit 0,1 "  ;
	
}
else {
	$query.= " i.ID_NEOCOSUR as 'Identificador Neocosur' "	;
}


$query=substr($query,0, -1);
$query .= "  ,c_id_centro
		
	
	FROM  control cont 
		inner join ingreso i on cont.ID_NEOCOSUR  =  i.ID_NEOCOSUR 
		inner join centro c on c.c_id_centro = i.id_centro 
		
		
		".$inner." ".$where."  ".$and."  ".$filtroFecha .$limite." ;";
	


$cone->Abrir();
$retorno =$cone->select($query);	

$field=$retorno->field_count;

$info_campo = $retorno->fetch_fields(); 
$cone->Cerrar(); 



$db_record = 'excel_seguimiento';
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