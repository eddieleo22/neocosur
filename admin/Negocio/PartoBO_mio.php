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
}
extract($_POST);

$cone = new ConexionDAO();
$r=nulo($_POST);
 // es observaciones
//$idOculto=2;
$parto = new antecedentes_parto(
$idOculto ,
  $r['oxigeno'],
  $r['vent_masc'],
  $r['intubacion'],
  $r['masaje'],
  $r['adrenalina'],
  $r['malformacion'],
   $compromete,
	c($sistema_nervioso),
	c($anecefalia),
	c($mielo),
	c($hidranencefalia),
	c($hidrocefalia),
	c($holo),
  c($cardiacos),
	c($tronco),
	c($transposicion),
	c($fallot),
	c($ventriculo_unico),
	c($doble_ventriculo_derecho),
	c($canal_atrio),
	c($atresia_pulmonar),
	c($atresia_tricuspide),
	c($hipoplasia),
	c($interrupcion),
	c($anomalia_retorno),
  c($gastrointestinales),
	c($fisura_paladar),
	c($fistula),
	c($atresia_duodenal),
	c($atresia_yeyunal),
	c($atresia_ileal),
	c($atresia_intestino),
	c($ano_imperforado),
	c($onfalocele),
	c($gastrosquisis),
  c($genitourinarios),
	c($agenesia),
	c($renal),
	c($uropatia),
	c($ectrofia_vesical),
  c($cromosomica),
	c($trisomia_13),
	c($trisomia_18),
	c($trisomia_21),
	c($otro_defecto),
	c($displasia_esqueletica),
	c($hernia),
	c($hidrops),
	c($potter),
	c($errores_congenitas),
	c($distrofia_miotonica),
	"$cual_defecto",
  $r['score'],
  $r['fallece'],
  "$obs_malformaciones"
  );
$ingreso = new ingreso();	
$dao = new antecedentes_partoDAO($cone);
$daoIngreso =  new IngresoDAO($cone);
// ver si existe o  es primera vez 
$arregloBD = $dao->buscarId($idOculto);  
//var_dump($arregloBD);

if($arregloBD['ID_NEOCOSUR']==''){

	$dao->guarda($parto);
	$ingreso->ID_NEOCOSUR=$idOculto;
	$ingreso->FALLECE_SALA_PARTO=$r['fallece'];
  //  $daoIngreso->actualizarFallece($ingreso);
	echo '<script type="text/javascript">
			window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=parto#parto");
			</script>';  
}
else{

	$dao->actualizar($parto);
	$ingreso->ID_NEOCOSUR=$idOculto;
	$ingreso->FALLECE_SALA_PARTO=$r['fallece'];
	
   $daoIngreso->actualizarFallece($ingreso);
	echo '<script type="text/javascript">
			window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=parto#parto");
			</script>'; 
}






