<?php 

error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/evolucion_tratamiento.php'; 
include '../capaDAO/evolucion_tratamientoDAO.php';
include '../capaEntidades/cirugia.php';
include '../capaDAO/cirugiaDAO.php';
include '../ayuda.php';


//
// Evolucion Tratamiento
// Soporte !!
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	session_start();
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
		
		
	extract($_POST);

// cambiar camppo en bd CPAP_TRAT_INICIO_SDR_PROFILACTICO por CPAP_TRAT_INICIO_SDR
// eliminar campo bd CPAP_TRAT_INICIO_SDR_TERAPEUTICO

$evo = new evolucion_tratamiento();
$cone = new ConexionDAO();
$evo->ID_NEOCOSUR=$cone->test_input($idOculto);

$evo->VM_CONVENCIONAL= $cone->test_input($vm_convencional);
	$evo->VM_CONVENCIONAL_HORAS=$cone->test_input($duracion_vm_horas);
	$evo->VM_CONVENCIONAL_DIAS= $cone->test_input($duracion_vm_dias);
	$evo->VM_CONVENCIONAL_INGRESO=$cone->test_input(c($uci_intubado));
	$evo->VM_CONVENCIONAL_TERAPIA_SDR=$cone->test_input(c($terapia_sdr));
	$evo->VM_CONVENCIONAL_OTRO=$cone->test_input(c($otro));
$evo->VM_ALTA_FRECUENCIA=$cone->test_input($vm_alta_frecuencia);
	$evo->VM_ALTA_FRECUENCIA_HORAS= $cone->test_input($duracion_vm_alta_horas);
	$evo->VM_ALTA_FRECUENCIA_DIAS= $cone->test_input($duracion_vm_alta_dias);
	
$evo->USO_OXIGENO= $cone->test_input($uso_oxigeno);
	$evo->USO_OXIGENO_HORAS= $cone->test_input($duracion_oxigeno_horas) ;
	$evo->USO_OXIGENO_DIAS= $cone->test_input($duracion_oxigeno_dias);
$evo->CPAP=$cone->test_input($cpap);
	$evo->CPAP_HORAS= $cone->test_input($duracion_cpap_horas);
	$evo->CPAP_DIAS= $cone->test_input($duracion_cpap_dias);
	
	$evo->CPAP_TRATAMIENTO_= $cone->test_input($inicio_sdr);
	$evo->CPAP_TRAT_INICIO_SDR= $cone->test_input($detalle_inicio_sdr);

	$evo->CPAP_POST_EXTUBACION=$cone->test_input($post_extubacion);
	$evo->CPAP_TRATAMIENTO_APNEA=$cone->test_input($apnea);
$evo->VENTILACION_NASAL_NO_INVASIVA= $cone->test_input($vnni);
	$evo->VENTILACION_NASAL_NO_INVASIVA_HORAS= $cone->test_input($duracion_vnni_horas);
	$evo->VENTILACION_NASAL_NO_INVASIVA_DIAS= $cone->test_input($duracion_vnni_dias);
	$evo->VENTILACION_NASAL_NO_INVASIVA_PRIMARIO_SDR= $cone->test_input($primario_sdr);
	$evo->VENTILACION_NASAL_NO_INVASIVA_POSTEXTUBACION= $cone->test_input($postextubacion);
	$evo->VENTILACION_NASAL_NO_INVASIVA_TRAT_APNEA= $cone->test_input($trat_apnea);

// Medicamentos !!
$evo->RECIBE_SURFACTANTE=$cone->test_input($surfactante);
	$evo->RECIBE_SURFACTANTE_PROFILACTICO= $cone->test_input(c($profilactico));
	$evo->RECIBE_SURFACTANTE_SELECTIVO= $cone->test_input(c($selectivo));
	$evo->RECIBE_SURFACTANTE_INSURE=$cone->test_input(c($insure));
	$evo->RECIBE_SURFACTANTE_EDAD_PRIMERA_DOSIS= $cone->test_input($hrs_dosis);
	$evo->RECIBE_SURFACTANTE_CANTIDAD_DOSIS=$cone->test_input($num_dosis);
$evo->INDOMETACINA= $cone->test_input($indometacina);
	$evo->INDOMETACINA_PROFILACTICO= $cone->test_input(c($profilactico_indo));
	
	$evo->INDOMETACINA_TRATAMIENTO= $cone->test_input(c($tratamiento_indo));

$evo->TRATAMIENTO_APNEA= $cone->test_input($tratamiento_apnea);
	$evo->TRATAMIENTO_APNEA_CAFEINA= $cone->test_input(c($cafeina_apnea));
	$evo->TRATAMIENTO_APNEA_AMINOFILINA_TEOFILINA= $cone->test_input(c($aminofilina_apnea));
$evo->PARACETAMOL= $cone->test_input($paracetamol);
$evo->IBUPROFENO= $cone->test_input($ibuprofeno);
$evo->CORTICOIDES_POST_NATAL=$cone->test_input($corticoides);
$evo->ANTIBIOTICO_MENOR_72_HORAS= $cone->test_input($antibioticos);
$evo->ERITROPOYETINA= $cone->test_input($eritropoyetina);
$evo->OXIDO_NITRICO= $cone->test_input($oxido);
$evo->NUMERO_TRANSFUSIONES= $cone->test_input($num_transfusiones);
$evo->NUMERO_CURSOS_ANTIBIOTICOS= $cone->test_input($num_cursos);
$evo->EG_POST_NATAL_TERMINO_XANTINAS= $cone->test_input($eg_post_natal);
//cateteres
$evo->CATETERES_=$cone->test_input($arteria);
	$evo->CATETER_ARETERIA_UMBILICAL_HORAS=$cone->test_input($hrs_arterial);
	$evo->CATETER_ARTERIA_UMBILICAL_DIAS= $cone->test_input($dias_arterial);
$evo->CATETER_VENA_UMBILCAL=$cone->test_input($vena);
	$evo->CATETER_VENA_UMBILICAL_HORAS=	$cone->test_input($hrs_vena);
	$evo->CATETER_VENA_UMBILICAL_DIAS= $cone->test_input($dias_vena);
$evo->CATETER_VENOSO_CENTRAL= $cone->test_input($venoso_central);
	$evo->CATETER_VENOSO_CENTRAL_HORAS=$cone->test_input($hrs_venoso_central);
	$evo->CATETER_VENOSO_CENTRAL_DIAS= $cone->test_input($dias_venoso_central);
$evo->CATETER_PRECUTANEO= $cone->test_input($percutaneo);
	$evo->CATETER_PRECUTANEO_HORAS= $hrs_percutaneo;
	$evo->CATETER_PERCUTANEO_DIAS= $cone->test_input($dias_percutaneo);
	
$evo->ALIMENTACION_PARENTAL_TOTAL_DIAS= $cone->test_input($alimentacion);
$evo->ALIMENTACION_PARENTAL_EDAD_INICIO_DIAS=$cone->test_input($lipidos);
$evo->INICIO_AMINOACIDOS_EDAD_DIAS=$cone->test_input($aminoacidos);

$evo->INIC=$cone->test_input($enteral);
$evo->ALIMENTACION_PARENTAL_100_ML_EDAD_DIAS= $cone->test_input($enteral_100);
$evo->FORTIFICANTE_LECHE_MATERNA=$cone->test_input($leche_fortificante);
$evo->LECHE_MATERNA_HOSPITALIZACION= $cone->test_input($leche);
$evo->LECHE_DONADA= $cone->test_input($leche_donada);
$evo->LECHE_MADRE= $cone->test_input($leche_madre);
$evo->LECHE_MAT_HOSP_= $cone->test_input($formula_7_dias);
$evo->LECHE_MAT_HOSP_FORMULA_14_DIAS=$cone->test_input($formula_14_dias);
$evo->LECHE_MAT_HOSP_FORMULA_28_DIAS= $cone->test_input($formula_28_dias);
$evo->LECHE_MAT_HOSP_FORMULA_36_SEM= $cone->test_input($formula_36_sem);
$evo->LECHE_MAT_= $cone->test_input($materna_7_dias);
$evo->LECHE_MAT_HOSP_14_DIAS=$cone->test_input($materna_14_dias);
$evo->LECHE_MAT_HOSP_28_DIAS= $cone->test_input($materna_28_dias);
$evo->LECHE_MAT_HOSP_36_SEM=$cone->test_input($materna_36_sem);
$evo->OBSERVACION_EVAL_TRATAMIENTO =$cone->test_input($observaciones_alimentacion);
//$cone= new ConexionDAO();
$dao = new evolucion_tratamientoDAO($cone);
 


//echo " id ocutlo -> ".$idOculto;die;
$idOculto=$cone->test_input($idOculto);
$existe =  $dao->buscarId($idOculto);

//echo "<br> asdasd "; die;
		if($existe==null){
			/*$dias=$detalle_cirugia_dias;
			$detalle=$detalle_cirugia;
			$otro=$detalle_cirugia_otro;
			
			$daoCirugia=new cirugiaDAO($cone);
			for($i=1;$i< count($dias);$i++) {
				
				$cirugia= new cirugia();
				
				$arreglo[0][$i]=$dias[$i];
				$arreglo[1][$i]=$detalle[$i];
				$arreglo[2][$i]=$otro[$i];
				$cirugia->ID_NEOCOSUR=$cone->test_input($idOculto);
				$cirugia->EDAD=$cone->test_input($arreglo[0][$i]);
				$cirugia->DETALLE=$cone->test_input($arreglo[1][$i]);
				$cirugia->OTRO=$cone->test_input($arreglo[2][$i]);
				
				$daoCirugia->guarda($cirugia);die;
				
			}
			*/
			$dao->guarda($evo);
			echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=evolucion#evolucion");
					</script>';
		}
		else {
			 
			$dias=$detalle_cirugia_dias;
			$detalle=$detalle_cirugia;
			$otro=$detalle_cirugia_otro;

			$daoCirugia=new cirugiaDAO($cone);
			for($i=1;$i< count($dias);$i++) {
				$cirugia= new cirugia();
				$arreglo[0][$i]=$dias[$i];
				$arreglo[1][$i]=$detalle[$i];
				$arreglo[2][$i]=$otro[$i];
				$cirugia->ID_NEOCOSUR=$cone->test_input($idOculto);
				$cirugia->EDAD=$cone->test_input($arreglo[0][$i]);
				$cirugia->DETALLE=$cone->test_input($arreglo[1][$i]);
				$cirugia->OTRO=$cone->test_input($arreglo[2][$i]);
				$daoCirugia->guarda($cirugia);
				
			}
		 
			$dao->actualizar($evo);
			
			echo '<script type="text/javascript">
					window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=evolucion#evolucion");
					</script>';
		   
		}

	
}
