<?php

error_reporting(0);
include '../capaEntidades/patologias_neonatales.php'; 
include '../capaDAO/patologias_neonatalesDAO.php';
include '../capaDAO/ConexionDAO.php';
include '../ayuda.php';
include '../capaDAO/sepsisDAO.php';
include '../capaEntidades/sepsis.php';

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

$cone = new ConexionDAO();
$dao = new patologias_neonatalesDAO($cone);

$idOculto=$cone->test_input($idOculto);
$arr = $dao->buscarId($idOculto);

$existe = $cone->test_input($arr["ID_NEOCOSUR"]);

$p = $_POST;
   
	
$neo = new patologias_neonatales();

$neo -> BEVACIZUMAB  = $cone->test_input($p['bevacizumab']);
$neo -> CIRUGIA_ROP_OJO_DER  = $cone->test_input($p['cirugia_der']);
$neo -> CIRUGIA_ROP_OJO_IZQ  = $cone->test_input($p['cirugia_izq']);
$neo -> CLINICA_SDR  = $cone->test_input($p['sdr']);
$neo -> CONVULSIONES  = $cone->test_input($p['convulsiones']);
$neo -> DG_ENTEROCOLITIS_DIAS  = $cone->test_input($p['enterocolitis']);
$neo -> DUCTUS  = $cone->test_input($p['ductus']);
$neo -> DUCTUS_CLINICO  = $cone->test_input(c($duct_clin));
$neo -> DUCTUS_ECOGRAFICO  = $cone->test_input($p['duct_ecog']);
$neo -> ECO_CEREBRAL_7_21_DIAS  = $cone->test_input($p['eco_cerebral_2']);
$neo -> ECO_CEREBRAL_MENOR_7_DIAS  = $cone->test_input($p['eco_cerebral_1']);
$neo -> ECO_CREBRAL_MAYOR_21_DIAS  = $cone->test_input($p['eco_cerebral_3']);
$neo -> ENF_PLUS_OJO_DER  = $cone->test_input($p['plus_der']);
$neo -> ENF_PLUS_OJO_IZQ  = $cone->test_input($p['plus_izq']);
$neo -> ENTEROCOLITIS_  = $cone->test_input($p['ecn']);
$neo -> EVALUACION_OFTALMOLOGICA_PREVIA_ALTA  = $cone->test_input($p['previa_alta']);
$neo -> HIDROCEFALIA  = $cone->test_input($p['hidrocefalia']);
$neo -> HIC  = $cone->test_input($p['hic']);
$neo -> ID_HIC_GRADO  = $cone->test_input($p['grado']);
$neo -> ID_LOCALIZACION_OJO_DER  = $cone->test_input($p['zona_der']);
$neo -> ID_LOCALIZACION_OJO_IZQ  = $cone->test_input($p['zona_izq']);
$neo -> ID_NEOCOSUR = $cone->test_input($idOculto);
$neo -> ID_SEVERIDAD_DISPLACIA  = $cone->test_input($p['displasia']);
$neo -> ID_SEVERIDAD_OJO_DER  = $cone->test_input($p['severidad_der']);
$neo -> ID_SEVERIDAD_OJO_IZQ  = $cone->test_input($p['severidad_izq']);
$neo -> ID_TIPO_CIRUGIA_ROP_OJO_DER  = $cone->test_input($p['cirugia_der']);
$neo -> ID_TIPO_CIRUGIA_ROP_OJO_IZQ  = $cone->test_input($p['detalle_cirugia_izq']);
$neo -> ID_TIPO_GERMEN_PRECOZ  = $cone->test_input($p['germen']);
$neo -> SEPSIS_PRECOZ_HEMOCULTIVO  = $cone->test_input(c($hemocultivo));
$neo -> SEPSIS_PRECOZ_LCR_POSITIVO  = $cone->test_input(c($lcr_positivo));
$neo -> SEPSIS_TARDIA  = $cone->test_input($p['sepsis_tardia']);
$neo -> RADIOGRAFIA_TORAX_ALTERADA = $cone->test_input($p['radio_torax']);
$neo -> OXIGENO_28_DIAS = $cone->test_input($p['oxigeno_28']);
$neo -> OXIGENO_36_SEMANAS = $cone->test_input($p['oxigeno_36']);
$neo -> LEUCOMALACIA = $cone->test_input($p['leucomalacia']);
$neo -> RUP_ALVEOLAR = $cone->test_input($p['alveolar']);
$neo -> RUP_ALVEOLAR_NEUMOTORAX = $cone->test_input($p['alveo_neumotorax']);
$neo -> RUP_ALVEOLAR_NEUMOMEDIASTINO = $cone->test_input($p['alveo_neumomedia']);
$neo -> RUP_ALVEOLAR_EFISEMA_INTERSTICIAL = $cone->test_input($p['alveo_enfisema']);
$neo -> PERFORACION_INTESTINAL = $cone->test_input($p['intestin']);
$neo -> HEMORRAGIA_PULMONAR = $cone->test_input($p['hemorragia_pulmonar']);
$neo -> ROP_OJO_IZQ = $cone->test_input($p['rop_izq']);
$neo -> ROP_OJO_DER = $cone->test_input($p['rop_der']);
$neo -> PRIMER_FONDO_OJO_DIAS = $cone->test_input($p['fondo_ojo']);
$neo -> SEPSIS_PRECOZ = $cone->test_input($p['sepsis_precoz']);
$neo -> NUMERO_SEPSIS_CLINICAS = $cone->test_input($p['num_sepsis']);
$neo -> EVA_PESQUISA = $cone->test_input($pesquisa);
$neo -> EVA_AUTO = $cone->test_input(c($peat_automatizados));
$neo -> EVA_AUTO_NOR = $cone->test_input($peat_automatizados_normal);
$neo -> EVA_EXT = $cone->test_input(c($peat_extendidos));
$neo -> EVA_EXT_NOR = $cone->test_input($peat_extendidos_normal);
$neo -> EVA_EMI = $cone->test_input(c($emisiones));
$neo -> EVA_EMI_NOR = $cone->test_input($emisiones_normal);

echo "<br> <br> dias --> ".$detalle_sepsis_tardia_dias;

$dias = $detalle_sepsis_tardia_dias;
$germen=$detalle_sepsis_tardia_germen;
$otro=$detalle_sepsis_tardia_otro;
//$tipo=$sepsis_tardia_tipo1;



$daoSepsis= new sepsisDAO($cone);
$consultaSepsis=$daoSepsis->buscarId($idOculto);

$contar = $consultaSepsis->num_rows;

	for($i=1;$i< count($dias);$i++) {
		$suma= $contar+$i;

		if($contar==0){
		$vari = $_POST["sepsis_tardia_tipo".$i];
		}
		else {
			$vari = $_POST["sepsis_tardia_tipo".$suma];
		}
		$sepsis= new sepsis();
		$arreglo[0][$i]=$dias[$i];
		$arreglo[1][$i]=$germen[$i];
		$arreglo[2][$i]=$otro[$i];

		$arreglo[3][$i]=$cone->test_input($vari);
		$sepsis->ID_NEOCOSUR=$cone->test_input($idOculto);
		$sepsis->DIAS=$cone->test_input($arreglo[0][$i]);
		$sepsis->TIPOGERMEN=$cone->test_input($arreglo[1][$i]);
		$sepsis->OTRO=$cone->test_input($arreglo[2][$i]);
		$sepsis->HE_LCR=$cone->test_input($arreglo[3][$i]);
		
		$daoSepsis->guarda($sepsis);
		
	}

	if ($existe==''){
		$dao->guarda($neo);
		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=neonatales#neonatales");
				</script>'; 
	}
	else {
		$dao->actualizar($neo);
	  
		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=neonatales#neonatales");
				</script>';    
	}	
		
}
