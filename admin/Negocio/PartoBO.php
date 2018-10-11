<?php

error_reporting(0);
require '../capaDAO/ConexionDAO.php';

include '../capaEntidades/antecedentes_parto.php'; 
include '../capaDAO/antecedentes_partoDAO.php';
include '../capaEntidades/ingreso.php';
include '../capaDAO/IngresoDAO.php';
include '../ayuda.php';

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

$r=nulo($_POST);
 // es observaciones
//$idOculto=2;
$idOculto=$cone->test_input($idOculto);
$parto = new antecedentes_parto(
$cone->test_input($idOculto) ,
  $cone->test_input($r['oxigeno']),
  $cone->test_input($r['vent_masc']),
  $cone->test_input($r['intubacion']),
  $cone->test_input($r['masaje']),
  $cone->test_input($r['adrenalina']),
  $cone->test_input($r['malformacion']),
   $cone->test_input($compromete),
	$cone->test_input(c($sistema_nervioso)),
	$cone->test_input(c($anecefalia)),
	$cone->test_input(c($mielo)),
	$cone->test_input(c($hidranencefalia)),
	$cone->test_input(c($hidrocefalia)),
	$cone->test_input(c($holo)),
  $cone->test_input(c($cardiacos)),
	$cone->test_input(c($tronco)),
	$cone->test_input(c($transposicion)),
	$cone->test_input(c($fallot)),
	$cone->test_input(c($ventriculo_unico)),
	$cone->test_input(c($doble_ventriculo_derecho)),
	$cone->test_input(c($canal_atrio)),
	$cone->test_input(c($atresia_pulmonar)),
	$cone->test_input(c($atresia_tricuspide)),
	$cone->test_input(c($hipoplasia)),
	$cone->test_input(c($interrupcion)),
	$cone->test_input(c($anomalia_retorno)),
  $cone->test_input(c($gastrointestinales)),
	$cone->test_input(c($fisura_paladar)),
	$cone->test_input(c($fistula)),
	$cone->test_input(c($atresia_duodenal)),
	$cone->test_input(c($atresia_yeyunal)),
	$cone->test_input(c($atresia_ileal)),
	$cone->test_input(c($atresia_intestino)),
	$cone->test_input(c($ano_imperforado)),
	$cone->test_input(c($onfalocele)),
	$cone->test_input(c($gastrosquisis)),
  $cone->test_input(c($genitourinarios)),
	$cone->test_input(c($agenesia)),
	$cone->test_input(c($renal)),
	$cone->test_input(c($uropatia)),
	$cone->test_input(c($ectrofia_vesical)),
  $cone->test_input(c($cromosomica)),
	$cone->test_input(c($trisomia_13)),
	$cone->test_input(c($trisomia_18)),
	$cone->test_input(c($trisomia_21)),
	$cone->test_input(c($otro_defecto)),
	$cone->test_input(c($displasia_esqueletica)),
	$cone->test_input(c($hernia)),
	$cone->test_input(c($hidrops)),
	$cone->test_input(c($potter)),
	$cone->test_input(c($errores_congenitas)),
	$cone->test_input(c($distrofia_miotonica)),
	$cone->test_input("$cual_defecto"),
  $cone->test_input($r['score']),
  $cone->test_input($r['fallece']),
  $cone->test_input($obs_malformaciones)
  );
  
$ingreso = new ingreso();	
$dao = new antecedentes_partoDAO($cone);
$daoIngreso =  new IngresoDAO($cone);
// ver si existe o  es primera vez 
$idOculto=$cone->test_input($idOculto);
$arregloBD = $dao->buscarId($idOculto);  
//var_dump($arregloBD);

	if($arregloBD['ID_NEOCOSUR']==''){

		$dao->guarda($parto);
		$ingreso->ID_NEOCOSUR=$cone->test_input($idOculto);
		$ingreso->FALLECE_SALA_PARTO=$cone->test_input($r['fallece']);

		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=parto#parto");
				</script>';  
	}
	else{

		$dao->actualizar($parto);
		$ingreso->ID_NEOCOSUR=$cone->test_input($idOculto);
		$ingreso->FALLECE_SALA_PARTO=$cone->test_input($r['fallece']);
		
	   $daoIngreso->actualizarFallece($ingreso);
		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=parto#parto");
				</script>'; 
	}
	
		
}






