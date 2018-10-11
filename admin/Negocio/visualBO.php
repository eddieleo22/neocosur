<?php
error_reporting(0);
include '../capaDAO/ConexionDAO.php';
include '../capaEntidades/funcion_visual.php';
include '../capaDAO/funcion_visualDAO.php';
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

	$dao =  new funcion_visualDAO($cone);
	$visual = new funcion_visual();
	$idOculto= $cone->test_input($idOculto);
	$visual->ID_CONTROL=$cone->test_input($idOculto);	
	//Funcion AUDITIVA 
	$visual->EVA_ALTA=$cone->test_input($evaluacion_posterior);
	$visual->ROP_IZQ=$cone->test_input($rop_izquierdo);
	$visual->ID_LOCALIZACION_IZQ=$cone->test_input($localizacion_izquierdo);
	$visual->ID_SEVERIDAD_IZQ=$cone->test_input($severidad_izquierdo);
	$visual->ENF_PLUS_IZQ=$cone->test_input($plus_izquierdo);
	$visual->CIRUGIA_ROP_IZQ=$cone->test_input($cirugia_izquierdo);
	$visual->ID_CIRUGIA_ROP_IZQ=$cone->test_input($cual_izquierdo);
	$visual->ROP_DER=$cone->test_input($rop_derecho);
	$visual->ID_LOCALIZACION_DER=$cone->test_input($localizacion_derecho);
	$visual->ID_SEVERIDAD_DER=$cone->test_input($severidad_derecho);
	$visual->ENF_PLUS_DER=$cone->test_input($plus_derecho);
	$visual->CIRUGIA_ROP_DER=$cone->test_input($cirugia_derecho);
	$visual->ID_CIRUGIA_ROP_DER=$cone->test_input($cual_derecho);
	$visual->BEVACIZUMAB=$cone->test_input($bevacizumab);
	$visual->INSTANCIA_EVAL_40_SEM_EC=$cone->test_input($instancia);
	$visual->INSTANCIA_EVAL_40_SEM_EC_DIAG_NORMAL=$cone->test_input($oftalmologica);
	$visual->INSTANCIA_EVAL_40_SEM_ROP_IZQ=$cone->test_input($rop_izquierdo_diagnostico);
	$visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_IZQ=$cone->test_input($cirugia_izquierdo_diagnostico);
	$visual->ID_CIRUGIA_EVAL_40_SEM_EC_IZQ=$cone->test_input($cual_izquierdo_rop);
	$visual->INSTANCIA_EVAL_40_SEM_ROP_DER=$cone->test_input($cual_izquierdo_rop);
	$visual->INSTANCIA_EVAL_40_SEM_CIRUGIA_DER=$cone->test_input($cirugia_derecho_diagnostico);
	$visual->ID_CIRUGIA_EVAL_40_SEM_EC_DER=$cone->test_input($cual_derecho_rop);
	$visual->REQUIERE_CIRUGIA=$cone->test_input($requiere_cirugia);
	$visual->ID_CIRUGIA=$cone->test_input($requiere_cirugia_cual);
	$visual->OBSERVACIONES=$cone->test_input($observaciones);
	$visual->CEGUERA_OJO_IZQ=$cone->test_input($ceguera_izquierdo);
	$visual->CEGUERA_OJO_DER=$cone->test_input($ceguera_derecho);


	$idOculto= $cone->test_input($idOculto);
	$idNeocosur= $cone->test_input($idNeocosur);
	$datos = $dao->buscarId($idOculto);

		if($datos==null )
		{
			$dao->guarda($visual);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=visual&message='.$message.'#visual");
					</script>';
			
		}
		else
		{
			$dao->actualizar($visual);
			echo '<script type="text/javascript">
					window.location.assign("../control.php?idNeocosur='.$idNeocosur.'&idControl='.$idOculto.'&url=visual&message='.$message.'#visual");
					</script>';
			
		}
	
}
	