<?php 
error_reporting(0);
include '../capaEntidades/informacion_alta.php';
include '../capaDAO/informacion_altaDAO.php';
include '../capaDAO/ConexionDAO.php';
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
$dao = new informacion_altaDAO($cone);
$daoIngreso =  new IngresoDAO($cone); 
$idOculto= $cone->test_input($idOculto);
$arr = $dao->buscarId($idOculto);
$id_alta = $cone->test_input($arr["ID_NEOCOSUR"]);
$p = $_POST;

$alta = new informacion_alta();

$alta->CAUSA_PARIO_CARDIORESPIRATORIO_SIST_NERVIOSO = $cone->test_input(c($causa_paro_sis));
$alta->CAUSA_PARO_CARDIORESPIRATORIO_ACCIDENTAL= $cone->test_input(c($causa_paro_acc));
$alta->CAUSA_PARO_CARDIORESPIRATORIO_CARDIACA= $cone->test_input(c($causa_paro_card));
$alta->CAUSA_PARO_CARDIORESPIRATORIO_HEMORRAGICA= $cone->test_input(c($causa_paro_hem));
$alta->CAUSA_PARO_CARDIORESPIRATORIO_INFECCIOSA= $cone->test_input(c($causa_paro_infec));
$alta->CAUSA_PARO_CARDIORESPIRATORIO_RESPIRATORIA= $cone->test_input(c($causa_paro_resp));
$alta->CAUSA_PROBABLE_MALFORMACIONES= $cone->test_input(c($causaMal));
$alta->CAUSA_PROBABLE_ANOMALIAS_CROMOSOMICA= $cone->test_input(c($causaAno));
$alta->CAUSA_PROBABLE_PARO_CARDIORESPIRATORIO= $cone->test_input(c($paro_cardiorespiratorio));
$alta->CAUSA_PROBABLE_SITUACION_MUERTE_OTRA= $cone->test_input(c($otra_causa_muerte));
$alta->CAUSA_PROBABLE_SITUACION_MURTE_CAUSA= $cone->test_input($p['detalle_otra_causa_muerte']);
$alta->FALLECE_MENOR_DIA_HORAS= $cone->test_input($p['fallece_horas']);
$alta->FECCHA_ALTA_FALLECE= $cone->test_input($p['fecha_alta']);
$alta->ID_DESTINO= $cone->test_input($p['destino']);
$alta->ID_NEOCOSUR = $cone->test_input($idOculto);
$alta->ID_SITUACION_MUERTE= $cone->test_input($p['situacion_muerte']);
$alta->OBSERVACIONES_= $cone->test_input($p['observaciones_situacion_muerte']); 
$alta->OBSERVACIONES_CAUSA_PROBABLE_MUERTE= $cone->test_input($p['observaciones_causa_probable_muerte']);
$alta->OXIGENO_DOMICILIARIO= $cone->test_input($p['oxigen_domicilio']);
$alta->AUTOPSIA= $cone->test_input($p['autopsia']);
$alta->RESULTADO_AUTOPSIA= $cone->test_input($p['resultado_autopsia']);

$ingreso = new ingreso();	 
	if ($id_alta==''){ 
		$dao->guarda($alta); 
		if($p['destino']=='fallece'){
			$ingreso->ID_NEOCOSUR=$idOculto;
			$ingreso->FALLECE_SALA_PARTO='1';
			$daoIngreso->actualizarFallece($ingreso);
		}
		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=alta#alta");
				</script>';
	   
	}
	else { 
		$dao->actualizar($alta); 
		if($p['destino']=='fallece'){ 
			$ingreso->ID_NEOCOSUR=$idOculto;
			$ingreso->FALLECE_SALA_PARTO='1';
			$daoIngreso->actualizarFallece($ingreso);  
		}
		echo '<script type="text/javascript">
				window.location.assign("../ficha_ingreso.php?id_neocosur='.$idOculto.'&url=alta#alta");
				</script>'; 
	}
}
