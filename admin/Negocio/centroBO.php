<?php
session_start();
error_reporting(0);
require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/centro.php';
include '../capaDAO/centroDAO.php';

// Evolucion Tratamiento
// Soporte !!
/*
include '../capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);*/
//echo "<br> antes del if ";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//echo "<br> if server ";
	//echo "<br> <br><br>";
	//var_dump($_POST);
	session_start();
	//echo "<br> <br>session --->>> ";
	//var_dump($_SESSION);;
    if ((!isset($_SESSION['csrf']) || $_SESSION['csrf'] !== $_POST['csrf'])
		|| (isset($_SESSION['token'])=="" ))
		{
				//echo "<br>  if problema token  ";
			throw new Exception('CSRF attack ');
			$key = sha1(microtime());
			header ("Location: ../exit.php?token=".$key."");
		}
			extract($_POST);

		// cambiar camppo en bd CPAP_TRAT_INICIO_SDR_PROFILACTICO por CPAP_TRAT_INICIO_SDR
		// eliminar campo bd CPAP_TRAT_INICIO_SDR_TERAPEUTICO
		//
		$centro = new centro();
		//echo "<br>   creo centro ";
		$cone = new ConexionDAO();
		//echo "<br>   creo cone ";
		$dao = new centroDAO($cone);
		//echo "<br>   creo DAO ";
		 $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
		$fechaMod=strftime( "%Y-%m-%d-%H-%M-%S", time() ); 
		$c_fecha_admin=strftime( "%Y-%m-%d-%H-%M-%S", time() ); 

		$idOcultoCentro= $cone->test_input($idOcultoCentro);
		//echo "<br>  id OCULTO ";

		if(isset($_POST['identi']) && $idOcultoCentro!=''){
			$url = 'identificacion';
		}
		if(isset($_POST['estadi']) && $idOcultoCentro!=''){
			$url = 'estadisticas';
		}
		if(isset($_POST['recurso']) && $idOcultoCentro!=''){
			$url = 'recursos';
		}
		if(isset($_POST['segui']) && $idOcultoCentro!=''){
			$url = 'seguimiento';
		}


		if(isset($_POST['identi']) && $idOcultoCentro!=''){
			$centro->c_id_centro=$cone->test_input($idOcultoCentro);
			$centro->c_id_centro=$cone->test_input($idOcultoCentro);

			
		$centro->c_fecha_crea=$cone->test_input($fecha);
		$centro->c_nombre=$cone->test_input($nombre) ;
		$centro->c_cod_centro=$cone->test_input($codigo) ;
		$centro->c_id_pais=$cone->test_input($pais) ;
		$centro->c_universidad=$cone->test_input($universidad) ;
		$centro->c_tipo=$cone->test_input($tipo) ;
		$centro->c_fecha_mod=$cone->test_input($fechaMod) ;	

		$dao->actualizarIdenti($centro);
		echo '<script type="text/javascript">
					window.location.assign("../centro.php?idCentro='.$idOcultoCentro.'&url=identificacion#identificacion");
					</script>';

		}
		//

		if(isset($_POST['estadi']) && $idOcultoCentro!=''){
		$centro->c_id_centro=$cone->test_input($idOcultoCentro);
		$centro->c_est_total_plaza=$cone->test_input($total_plazas);
		$centro->c_est_total_parto=$cone->test_input($total_partos);
		$centro->c_est_morta_neona=$cone->test_input($mortalidad_global) ;
		$centro->c_est_plaza_uci=$cone->test_input($plazas_uci) ;
		$centro->c_est_parto_1500=$cone->test_input($partos_menor) ;
		$centro->c_est_morta_1500=$cone->test_input($mortalidad_menor) ;
		$centro->c_fecha_mod=$cone->test_input($fechaMod) ;
		$dao->actualizarEstadi($centro);
		echo '<script type="text/javascript">
					window.location.assign("../centro.php?idCentro='.$idOcultoCentro.'&url=estadisticas#estadisticas");
					</script>';


		}
		if(isset($_POST['recurso']) && $idOcultoCentro!=''){
		$centro->c_id_centro=$cone->test_input($idOcultoCentro);
		$centro->c_re_frecuencia=$cone->test_input($ventilacion) ;
		$centro->c_re_oxido=$cone->test_input($oxido) ;
		$centro->c_re_cir_general=$cone->test_input($cirugia_general) ;
		$centro->c_re_cir_cardiaca=$cone->test_input($cirugia_cardiaca) ;
		$centro->c_fecha_mod=$cone->test_input($fechaMod) ;
		$dao->actualizarRecu($centro);
		echo '<script type="text/javascript">
					window.location.assign("../centro.php?idCentro='.$idOcultoCentro.'&url=recursos#recursos");
					</script>';
		}

		if(isset($_POST['segui']) && $idOcultoCentro!=''){
		$centro->c_id_centro=$cone->test_input($idOcultoCentro);
		$centro->c_seg_neo=$cone->test_input($seguimiento) ;
		$centro->c_seg_dura=$cone->test_input($duracion_seguimiento) ;
		$centro->c_seg_nino=$cone->test_input($estimados) ; 
		$centro->c_seg_ofta=$cone->test_input($oftalmologo) ;
		$centro->c_seg_otorri=$cone->test_input($otorrinolaringologo) ;
		$centro->c_seg_neuro=$cone->test_input($neurologo) ;
		$centro->c_seg_bronco=$cone->test_input($broncopulmonar) ;
		$centro->c_seg_fono=$cone->test_input($fonoaudiologo) ;
		$centro->c_seg_kine=$cone->test_input($kinesiologo) ;
		$centro->c_seg_oxi=$cone->test_input($oxigeno_domicilio) ;
		$centro->c_fecha_mod=$cone->test_input($fechaMod) ;
		$dao->actualizarSegui($centro);
		echo '<script type="text/javascript">
					window.location.assign("../centro.php?idCentro='.$idOcultoCentro.'&url=seguimiento#seguimiento");
					</script>';
		} 


		if($idOcultoCentro==''){
		$centro->c_fecha_crea=$cone->test_input($fecha);
		$centro->c_nombre=$cone->test_input($nombre);
		$centro->c_cod_centro=$cone->test_input($codigo);
		$centro->c_id_pais=$cone->test_input($pais);
		$centro->c_universidad=$cone->test_input($universidad);
		$centro->c_tipo=$cone->test_input($tipo);
		$centro->c_est_total_plaza=$cone->test_input($total_plazas);
		$centro->c_est_total_parto=$cone->test_input($total_partos);
		$centro->c_est_morta_neona=$cone->test_input($mortalidad_global);
		$centro->c_est_plaza_uci=$cone->test_input($plazas_uci);
		$centro->c_est_parto_1500=$cone->test_input($partos_menor);
		$centro->c_est_morta_1500=$cone->test_input($mortalidad_menor);
		$centro->c_re_frecuencia=$cone->test_input($ventilacion);
		$centro->c_re_oxido=$cone->test_input($oxido);
		$centro->c_re_cir_general=$cone->test_input($cirugia_general);
		$centro->c_re_cir_cardiaca=$cone->test_input($cirugia_cardiaca);
		$centro->c_seg_neo=$cone->test_input($seguimiento);
		$centro->c_seg_dura=$cone->test_input($duracion_seguimiento);
		$centro->c_seg_nino=$cone->test_input($estimados); 
		$centro->c_seg_ofta=$cone->test_input($oftalmologo);
		$centro->c_seg_otorri=$cone->test_input($otorrinolaringologo);
		$centro->c_seg_neuro=$cone->test_input($neurologo);
		$centro->c_seg_bronco=$cone->test_input($broncopulmonar);
		$centro->c_seg_fono=$cone->test_input($fonoaudiologo);
		$centro->c_seg_kine=$cone->test_input($kinesiologo);

		$centro->c_seg_oxi=$cone->test_input($oxigeno_domicilio);
			$dao->guarda($centro);
			$id =$dao->getId();
			echo '<script type="text/javascript">
					window.location.assign("../centro.php?idCentro='.$id.'&url='.$url.'#'.$url.'");
					</script>';

		}

}

