<?php
session_start();
error_reporting(0);
include 'capaDAO/evaluacion_neurodesarrolloDAO.php';

$dao = new evaluacion_neurodesarrolloDAO($cone);
$fila = $dao->buscarId($idControl);

$mes = $_SESSION['edad_corre_meses'];
$mescrono = 0;//$_SESSION['edad_crono_meses']; 
$aniocorre =0;// $_SESSION['edad_corre_anio'];
$aniocrono =0;// $_SESSION['edad_crono_anio']; 
//echo "<br> sesion control ".$_SESSION["control"];
$nombre_control=$_SESSION["control"];
//echo "<br>".$nombre_control."<br><br> ";
/*echo "<br><br> mescrono ".$mescrono;
echo "<br><br> aniocorre ".$aniocorre;
echo "<br><br> aniocrono ".$aniocrono; */
if($mes>=6 && $mes<=11){
	$asqI ="img/6";
}
else if($mes==12 && $mes<=17){
	$asqI ="img/12";
}
else if($mes==18 && $mes<=23){
	$asqI ="img/18";
}
else if($mes>=24){
	$asqI ="img/24";
}
$hic_40semanas=	$fila['HIC_40_SEMANA'];
$hic_40semanas_grado=$fila['ID_HIC_40_GRADO'];

$lpv_40semanas=$fila['LPV_40SEMANAS'];
$rop_40semanas=$fila['ROP_40_SEMANAS'];
$rop_40semanas_grado=	$fila['ROP_40_SEMANAS_GRADO'];
$bera_40semanas=	$fila['BERA_40SEMANAS'];
$vision_neurologo_2anios=	$fila['NEUROLOGICA_2_VISION'];
$vision_neurologo_2anios_Ceguera=	$fila['NEUROLOGICA_2_VISION_CEGUERA'];


$evision_neurologo_2anios_strabismo=	$fila['NEUROLOGICA_2_VISION_ESTRABISMO'];
$vision_neurologo_2anios_refraccion=	$fila['NEUROLOGICA_2_VISION_REFRACCION'];
$audicion_neurologo_2anios=	$fila['NEUROLOGICA_2_AUDICION'];
$audiocion_neurologo_2anios_no=	$fila['NEUROLOGICA_2_AUDICION_NO'];

$motora_neurologo_2anios=	$fila['NEUROLOGICA_2_MOTORA'];
$paralisis_neurologo_2anios=	$fila['NEUROLOGICA_2_PARALISIS'];
$paralisis_neurologo_2anios_si=	$fila['NEUROLOGICA_2_PARALISIS_SI'];
$cognitiva_neurologo_2anios=	$fila['NEUROLOGICA_2_COGNITIVA'];
$otros_neurologo_2anios=	$fila['NEUROLOGICA_2_OTROS'];
$otro_neurologo_2anios_convulsivo=	$fila['NEUROLOGICA_2_OTROS_CONVULSIVO'];
$otro_neurologo_2anios_hidrocefalia=	$fila['NEUROLOGICA_2_OTROS_HIDROCEFALIA'];


$examen_psicomotor_2anios=	$fila['PSICOMOTOR_2_EXAMEN'];
$hipo_motora_psicomotor_2anios=	$fila['PSICOMOTOR_2_EX_HIPO'];
$hiper_motora_psicomotor_2anios=	$fila['PSICOMOTOR_2_EX_HIPER'];
$foca_motora_psicomotor_2anios=	$fila['PSICOMOTOR_2_EX_FOCA'];
$hemi_motora_psicomotor_2anios=	$fila['PSICOMOTOR_2_EXA_HEMI'];
$auditiva_sen_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_SEN'];
$hipoacusia_sen_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_SEN_HIPO'];
$visual_sen_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_SEN_VISUAL'];
$cirugia_sen_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA'];
$cirugia_descripcion_sen_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_SEN_CIRUGIA_DESCI'];
$lenguaje_retra_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA'];
$lenguaje_si_retra_2_tipo2_anios=	$fila['PSICOMOTOR_2_AUDITIVA_RETRA_LENGUA_SI'];
$cefalia_otro_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_OTRO_CEFALIA'];
$sindro_otro_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_OTRO_SINDRO'];
$altera_otro_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_OTRO_ALTERA'];
$neurorehabilitacion_2anios=	$fila['PSICOMOTOR_2_AUDITIVA_NEURO'];
$meses_a2a_psicomotor 	=	$fila['PSICOMOTOR_A2ANIOS_MESES'];
$cual_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_CUAL'];
$fecha_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_FECHA'];
$anios_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_ANIOS'];
$meses_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_MESES'];
$puntaje_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_PUNTAJE'];
$normal_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_NORMAL'];
$observacion_eedp_a2a=	$fila['PSICOMOTOR_A2ANIOS_EEDP_OBSERVACION'];
$cual_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_CUAL'];


$fecha_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_FECHA'];
$anios_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_ANIOS'];
$meses_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_MESES'];
$puntaje_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_PUNTAJE'];
$normal_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_NORMAL'];
$observacion_eais_a2a=	$fila['PSICOMOTOR_A2ANIOS_EAIS_OBSERVACION'];
$cual_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_CUAL'];
$fecha_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_FECHA'];
$anios_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_ANIOS'];
$meses_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_MESES'];
$puntaje_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_PUNTAJE'];
$normal_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_NORMAL'];
$observacion_cat_a2a=	$fila['PSICOMOTOR_A2ANIOS_CAT_OBSERVACION'];
$cual_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_CUAL'];
$fecha_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_FECHA'];
$anios_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_ANIOS'];
$meses_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_MESES'];
$puntaje_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_PUNTAJE'];
$normal_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_NORMAL'];
$observacion_asq_a2a=	$fila['PSICOMOTOR_A2ANIOS_ASQ_OBSERVACION'];
$tepsi_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEPSI'];
$tepsi_normal_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEP_NORMAL'];
$tepsi_fecha_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEP_FECHA'];
$tepsi_anios_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEP_ANIOS'];
$tepsi_meses_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEP_MESES'];
$tepsi_puntaje_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_TEP_PUNTAJE'];
$bayley_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE'];
$bayley_version_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VERSION'];
$bayley_version_fecha_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA'];
$bayley_version_anios_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS'];
$bayley_version_meses_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES'];
$bayley_version_Mental_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_MENTAL'];
$bayley_version_motora_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA'];
$bayley_version_conducta_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_CONDUCTA'];
$bayley_version_normal_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL'];

$bayley_version_3_fecha_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_FECHA_3'];
$bayley_version_3_anios_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_ANIOS_3'];
$bayley_version_3_meses_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_MESES_3'];
$bayley_version_3_motora_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_MOTARA_3'];
$bayley_version_3_cognitiva_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_COGNI_3'];
$bayley_version_3_lenguaje_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_LENG_3'];
$bayley_version_3_socio_7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_SOCIO_3'];
$bayley_version_3_comportamiento_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_COMPOR_3'];
$bayley_version_3_normal_2a7anios=	$fila['PSICOMOTOR_2A7ANIOS_BAYLE_VER_NORMAL_3'];
$retraso_lenguaje_a3anios=	$fila['PSICOMOTOR_A3ANIOS_RET_LENG'];
$retraso_lenguaje_tipo_a3anios=	$fila['PSICOMOTOR_A3ANIOS_RET_LENG_TIPO'];
$retraso_lenguaje_rehab_a3anios=	$fila['PSICOMOTOR_A3ANIOS_RET_LENG_REHAB'];
$retraso_expresivo_3anios=	$fila['PSICOMOTOR_3ANIOS_RET_EXPRESIVO'];
$retraso_expresivo_rehab_3anios=	$fila['PSICOMOTOR_3ANIOS_RET_EXPRESIVO_REHAB'];
$coeficiente_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COEFICIENTE'];
$coeficiente_fecha_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_FECHA_1'];
$coeficiente_anios_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_ANIOS_1'];
$coeficiente_meses_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_MESES_1'];
$coeficiente_verbal_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_VERB_1'];
$coeficiente_manipulativa_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_MANIPU_1'];
$coeficiente_total_1_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_TOTAL_1'];
$coeficiente_fecha_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_FECHA_2'];
$coeficiente_anios_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_ANIOS_2'];
$coeficiente_meses_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_MESES_2'];
$coeficiente_verbal_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_VERB_2'];
$coeficiente_manipulativa_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_MANIPU_2'];
$coeficiente_procesamiento_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_PROCESA_2'];
$coeficiente_lenguaje_2_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_COE_LENGUAJE_2'];
$msca_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_MSCA'];
$scq_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_SCQ'];
$mchat_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_MCHAT'];
$vabs_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_VABS'];
$gmfcs_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_GMFCS'];
$otras_observaciones_2a4anios=	$fila['PSICOMOTOR_2A4ANIOS_OTRO_OBSERV'];
$motora_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_MOTORA'];
$motora_nivel_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_MOTORA_NIVEL'];
$paralisis_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_PARALISIS'];
$paralisis_cual_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_PARALISIS_CUAL'];
$otros_transtornos_conductual_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_OTROS_TRANSTORNOS'];
$otros_transtornos_lenguaje_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_OTROS_LENGUAJE'];
$otros_transtornos_aprendizaje_neurodesarollo_2anios=	$fila['NEURODESAROLLO_2ANIOS_OTROS_APRENDIZAJE'];

/*
*/
?>
<script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Ayuda ASQ', 'resizable=1,width=690,height=200');
    }

    </script>
	
	
	
	
<div class="ficha panel panel-default">
  <div class="panel-body">
    <form action="Negocio/evaluacion_neurodesarrolloBO.php" method="post" >
		<?php 
		 // if general logica solo para controles  protocolo
		 if($nombre_control=='40 semanas' || $nombre_control=='6 meses' || $nombre_control=='12 meses' 
			|| $nombre_control=='18 meses' ||  $nombre_control=='24 meses' ||  $nombre_control=='3 años' || $nombre_control=='4 años'
			|| $nombre_control=='5 años' ||  $nombre_control=='6 años' || $nombre_control=='7 años' ){
				if($nombre_control=='40 semanas'){
			 
				echo'<button class="btn btn-success active subtitulo" type="button" id="40semanas"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Situación Neurosensorial 40 semanas</button>';
				}
				else if($nombre_control=='6 meses' ||  $nombre_control=='12 meses' || $nombre_control=='18 meses'){	
				?>
							<script type="text/javascript">
					$(document).ready(function()
						{			
							 $("#link_evaluacion").click(function()
								{				
							$("#2anios_psicomotor_antes").addClass("active btn-success");;
							$("#sec_2anios_psicomotor_antes").css("display", "block");	 
								});
					
						});
					</script>
				  <button class="btn btn-default subtitulo" type="button" id="2anios_psicomotor_antes"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor antes de 2 años </button>
					
				<?php
				
				} else 	if($nombre_control=='24 meses' ||  $nombre_control=='3 años' || $nombre_control=='4 años'
			|| $nombre_control=='5 años' ||  $nombre_control=='6 años' || $nombre_control=='7 años'){
			?>
					
					<script type="text/javascript">
		$(document).ready(function()
			{			
				 $("#link_evaluacion").click(function()
					{				
				$("#2anios").addClass("active btn-success");;
				$("#sec_2anios").css("display", "block");	 
					});
		
			});
		</script>
	  <button class="btn btn-default subtitulo" type="button" id="2anios"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Situación Neurológica 2 años </button>
      <button class="btn btn-default subtitulo" type="button" id="2anios_psicomotor"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor 2 años </button>
      <button class="btn btn-default subtitulo" type="button" id="2a7anios_psicomotor"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor 2 a 7 años </button>
	  <button class="btn btn-default subtitulo" type="button" id="2anios_neurodesarrollo"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Situación Neurodesarrollo desde 2 años </button> 
		
					
			<?php
			
			
			}
		}
		
		 else {
			 
			 ?>
			 
	  <button class="btn btn-success active subtitulo" type="button" id="40semanas"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Situación Neurosensorial 40 semanas</button>
	  <button class="btn btn-default subtitulo" type="button" id="2anios_psicomotor_antes"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor antes de 2 años </button>
	  <button class="btn btn-default subtitulo" type="button" id="2anios"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Situación Neurológica 2 años </button>
      <button class="btn btn-default subtitulo" type="button" id="2anios_psicomotor"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor 2 años </button>
      <button class="btn btn-default subtitulo" type="button" id="2a7anios_psicomotor"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Desarrollo Psicomotor 2 a 7 años </button>
	  <button class="btn btn-default subtitulo" type="button" id="2anios_neurodesarrollo"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> Situación Neurodesarrollo desde 2 años </button> 
		
						
		<?php 
		}
		
		//if($mes>=24 && $mes<=84){
			
		
		?>
		
      <div class="row" id="sec_40semanas">

        <div class="col-lg-12 form-group">
          <label class="control-label">Resumen Situación Neurológica 40 semanas de EC</label> 
		  <input type="hidden" id="resumen_40" name ="resumen_40" value="resumen_40"> 
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">HIC</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="hic_40semanas" value="1" id="hic_40semanas_si" <?php si($hic_40semanas);?>  > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="hic_40semanas" value="0" id="hic_40semanas_no"<?php no($hic_40semanas);?>> No
              </label>
            </div>
          </div>

          <div id="sec_hic_40semanas_si" class="sub-form">
            <div class="form-group col-lg-6">
              <label class="control-label col-lg-5">Grado</label>
              <div class="col-lg-7">
                <select class="col-lg-8 input-sm form-control" name="hic_40semanas_grado">
                   <option value="null">Seleccione</option>
                    <?php cargarSelect("hic_neuro_segui_param",$cone,"id_hic_neuro_segui_param","descripcion",$hic_40semanas_grado);?>
                </select>
              </div>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">LPV</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="lpv_40semanas" value="1" <?php si($lpv_40semanas );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="lpv_40semanas" value="0" <?php no($lpv_40semanas );?> > No
              </label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">ROP</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="rop_40semanas" value="1" id="rop_40semanas_si" <?php si($rop_40semanas );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="rop_40semanas" value="0" id="rop_40semanas_no" <?php no($rop_40semanas );?> > No
              </label>
            </div>
          </div>

          <div id="sec_rop_40semanas_si" class="sub-form">
            <div class="form-group col-lg-6">
              <label class="control-label col-lg-5">Grado</label>
              <div class="col-lg-7">
                <select class="col-lg-8 input-sm form-control" name="rop_40semanas_grado">
                 <option value="null">Seleccione</option>
                    <?php cargarSelect("hic_neuro_segui_param",$cone,"id_hic_neuro_segui_param","descripcion",$rop_40semanas_grado);?>
                </select>
              </div>
            </div>
          </div> 
        </div>
          
        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">BERA alterado</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="bera_40semanas" value="1" <?php si($bera_40semanas );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="bera_40semanas" value="0" <?php no($bera_40semanas );?> > No
              </label>
            </div>
          </div>
        </div>

      </div>
		<?php// } ?>
      <div class="row" id="sec_2anios">

        <div class="col-lg-12 form-group">
          <label class="control-label">Resumen Situación Neurológica 2 años de EC</label> 
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Visión Normal</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="vision_neurologo_2anios" value="1" id="2anios_vision_si" <?php si($vision_neurologo_2anios );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="vision_neurologo_2anios" value="0" id="2anios_vision_no" <?php no($vision_neurologo_2anios );?> > No
              </label>
            </div>
          </div>

          <div id="sec_2anios_vision_no" class="sub-form">
            <div class="form-group col-lg-6">
              <div class="form-group checkbox col-lg-12">
                <label for="" class="control-label txt_izq col-lg-12">
                  <input name="vision_neurologo_2anios_Ceguera" type="checkbox" value="1" <?php si($vision_neurologo_2anios_Ceguera );?>  class="vision_normal_no">
                  Ceguera
                </label>
                <label for="" class="control-label txt_izq col-lg-12">
                  <input name="evision_neurologo_2anios_strabismo" type="checkbox" value="1" <?php si($evision_neurologo_2anios_strabismo );?>  class="vision_normal_no">
                  Estrabismo
                </label>
                <label for="" class="control-label txt_izq col-lg-12">
                  <input name="vision_neurologo_2anios_refraccion" type="checkbox" value="1" <?php si($vision_neurologo_2anios_refraccion );?> class="vision_normal_no">
                  Vicios de refracción con uso de lentes
                </label>
              </div>
            </div>
          </div> 
        </div>


        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Audición Normal</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="audicion_neurologo_2anios" value="1" id="2anios_audiocion_si" <?php si($audicion_neurologo_2anios );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="audicion_neurologo_2anios" value="0" id="2anios_audiocion_no" <?php no($audicion_neurologo_2anios );?> > No
              </label>
            </div>
          </div>

          <div id="sec_2anios_audiocion_no" class="sub-form">
            <div class="form-group col-lg-6">
              <div class="form-group checkbox col-lg-12">
                <label class="control-label radio-inline col-lg-5">
                  <input type="radio" name="audiocion_neurologo_2anios_no" value="1" <?php si($audiocion_neurologo_2anios_no );?>> Hipoacusia Unilateral 
                </label>
                <label for="" class="control-label radio-inline col-lg-5">
                  <input type="radio" name="audiocion_neurologo_2anios_no" value="0" <?php no($audiocion_neurologo_2anios_no );?>> Hipoacusia Bilateral 
                </label>
              </div>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="form-group col-lg-12">
            <label class="control-label col-lg-2">Función Motora</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="motora_neurologo_2anios" value="1" <?php si($motora_neurologo_2anios );?> > Normal
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="motora_neurologo_2anios" value="0" <?php no($motora_neurologo_2anios );?>> Hipotonía
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="motora_neurologo_2anios" value="-1" <?php sn($motora_neurologo_2anios );?> > Hipertonía
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="motora_neurologo_2anios" value="-2"> Ambas
              </label>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Parálisis Cerebral</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="paralisis_neurologo_2anios" value="1" id="2anios_paralisis_si" <?php si($paralisis_neurologo_2anios );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="paralisis_neurologo_2anios" value="0" id="2anios_paralisis_no" <?php no($paralisis_neurologo_2anios );?> > No
              </label>
            </div>
          </div>

          <div id="sec_2anios_paralisis_si" class="sub-form">
            <div class="form-group col-lg-6">
              <div class="form-group checkbox col-lg-12">
                <label class="control-label radio-inline col-lg-3">
                  <input type="radio" name="paralisis_neurologo_2anios_si" value="1" <?php si($paralisis_neurologo_2anios_si );?>> Diplegia
                </label>
                <label class="control-label radio-inline col-lg-3">
                  <input type="radio" name="paralisis_neurologo_2anios_si" value="0" <?php no($paralisis_neurologo_2anios_si );?>> Hemiplegia
                </label>
                <label class="control-label radio-inline col-lg-3">
                  <input type="radio" name="paralisis_neurologo_2anios_si" value="-1" <?php sn($paralisis_neurologo_2anios_si );?>> Quadriplegia
                </label>
              </div>
            </div>
          </div> 
        </div>

        <div class="row">
          <div class="form-group col-lg-12">
            <label class="control-label col-lg-2">Situación Cognitiva </label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="cognitiva_neurologo_2anios" value="1" <?php si($cognitiva_neurologo_2anios );?> > Normal
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="cognitiva_neurologo_2anios" value="0" <?php no($cognitiva_neurologo_2anios );?>> Anormal
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="cognitiva_neurologo_2anios" value="-1" <?php sn($cognitiva_neurologo_2anios );?>> Sospecha
              </label>
            </div>
          </div> 
        </div>


        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Otros</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="otros_neurologo_2anios" value="1" id="2anios_otros_si" <?php si($otros_neurologo_2anios );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="otros_neurologo_2anios" value="0" id="2anios_otros_no" <?php no($otros_neurologo_2anios );?> > No
              </label>
            </div>
          </div>

          <div id="sec_2anios_otros_si" class="sub-form">
            <div class="form-group col-lg-6">
              <div class="form-group checkbox col-lg-12">
                <label for="" class="control-label txt_izq col-lg-12">
                  <input name="otro_neurologo_2anios_convulsivo" type="checkbox" value="1" <?php si($otro_neurologo_2anios_convulsivo );?> class="2anios_otros_si">
                  Sindrome convulsivo en tratamiento
                </label>
                <label class="control-label txt_izq col-lg-12">
                  <input name="otro_neurologo_2anios_hidrocefalia" type="checkbox" value="1" <?php si($otro_neurologo_2anios_hidrocefalia );?>  class="2anios_otros_si">
                  Hidrocefalia con válvula derivativa
                </label>
              </div>
            </div>
          </div> 
        </div>

      </div>

      <div class="row" id="sec_2anios_psicomotor">
        <div class="col-lg-12 form-group">
          <label class="control-label">Resumen del Desarrollo Psicomotor a los 2 años de EC</label> 
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Examen Normal</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="examen_psicomotor_2anios" value="1" id="2anios_psicomotor_examen_si" <?php si($examen_psicomotor_2anios );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="examen_psicomotor_2anios" value="0" id="2anios_psicomotor_examen_no" <?php no($examen_psicomotor_2anios );?> > No
              </label>
            </div>
          </div>

          <div id="sec_2anios_psicomotor_examen_no" class="sub-form">
            <div class="form-group col-lg-6">
              <label class="control-label col-lg-3">Motora</label>
              <div class="form-group checkbox col-lg-9">
                <label class="control-label txt_izq col-lg-12">
                  <input  type="checkbox" value="1" <?php si($hipo_motora_psicomotor_2anios) ;?> name="hipo_motora_psicomotor_2anios" class="motora_psicomotor_2anios">
                  Hipotonía
                </label>
                <label class="control-label txt_izq col-lg-12">
                  <input  type="checkbox" value="1" <?php si($hiper_motora_psicomotor_2anios );?> name="hiper_motora_psicomotor_2anios" class="motora_psicomotor_2anios">
                  Hipertonía
                </label>
                <label class="control-label txt_izq col-lg-12">
                  <input  type="checkbox" value="1" <?php si($foca_motora_psicomotor_2anios );?>  name="foca_motora_psicomotor_2anios" class="motora_psicomotor_2anios">
                  Focalización
                </label>
                <label class="control-label txt_izq col-lg-12">
                  <input  type="checkbox" value="1" <?php si($hemi_motora_psicomotor_2anios );?>  name="hemi_motora_psicomotor_2anios" class="motora_psicomotor_2anios">
                  Hemisíndrome
                </label>
               
              </div>
            </div>

            <div class="form-group col-lg-6 col-lg-offset-6">
              <label class="control-label col-lg-3">Sensorial</label>
              <div class="form-group col-lg-9">
                <label class="control-label col-lg-4">Auditiva Normal</label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="auditiva_sen_2anios" type="radio" value="1" id="2anios_auditiva_si" <?php si($auditiva_sen_2anios );?>>
                  Si
                </label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="auditiva_sen_2anios" type="radio" value="0" id="2anios_auditiva_no" <?php no($auditiva_sen_2anios );?>>
                  No
                </label> 
              </div>
              <div class="form-group col-lg-9 col-lg-offset-3 sub-form" id="sec_2anios_auditiva_no">
                <label class="control-label col-lg-5">Hipoacusia (Grado)</label>
                <div class="col-lg-7">
                  <select class="form-control input-sm" name="hipoacusia_sen_2anios">
                    <option value="null">Seleccione</option>
					<?php cargarSelect("hipoacusia_grado_segui_param",$cone,"id_hipoacusia_grado_segui_param","descripcion",$hipoacusia_sen_2anios);?>
		
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-9 col-lg-offset-3">
                <label class="control-label col-lg-12">Visual</label>
                <label class="control-label col-lg-4">Uso de lentes</label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="visual_sen_2anios" type="radio" value="1" <?php si($visual_sen_2anios );?>>
                  Si
                </label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="visual_sen_2anios" type="radio" value="0" <?php no($visual_sen_2anios );?>>
                  No
                </label> 
              </div>

              <div class="form-group col-lg-9 col-lg-offset-3">
                <label class="control-label col-lg-4">Cirugía</label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="cirugia_sen_2anios" type="radio" value="1" id="2anios_cirugia_si" <?php si($cirugia_sen_2anios );?>>
                  Si
                </label>
                <label class="control-label txt_izq col-lg-2">
                  <input name="cirugia_sen_2anios" type="radio" value="0" id="2anios_cirugia_no"  <?php no($cirugia_sen_2anios );?>>
                  No
                </label> 
              </div>
              <div class="form-group col-lg-9 col-lg-offset-3 sub-form" id="sec_2anios_cirugia_si">
                <label class="control-label col-lg-4">Describe</label>
                <div class="col-lg-8">
                  <textarea class="form-control col-lg-12" rows="3" name="cirugia_descripcion_sen_2anios"><?php echo($cirugia_descripcion_sen_2anios );?></textarea>
                </div>
              </div>
            </div>

            <div class="form-group col-lg-6 col-lg-offset-6">
              <label class="control-label col-lg-3">Retraso del lenguaje</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="lenguaje_retra_2anios" value="1" id="2anios_lenguaje_si" <?php si($lenguaje_retra_2anios );?> > Sí
                </label>
                <label for="" class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="lenguaje_retra_2anios" value="0" id="2anios_lenguaje_no" <?php no($lenguaje_retra_2anios );?> > No
                </label>
              </div>
              <div class="form-group col-lg-9 col-lg-offset-3 sub-form" id="sec_2anios_lenguaje_si">
                <label class="control-label col-lg-5">Tipo</label>
                <div class="col-lg-7">
                  <select class="form-control input-sm" name="lenguaje_si_retra_2_tipo2_anios">
                    <option value="null">Seleccione</option>
                    <?php cargarSelect("retraso_segui_param",$cone,"id_retraso_segui_param","descripcion",$lenguaje_si_retra_2_tipo2_anios);?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group col-lg-6 col-lg-offset-6">
              <label class="control-label col-lg-3">Otros hallazgos</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-5">
                  <input type="radio" class="2anios_otros" name="cefalia_otro_2anios" value="1" id="2anios_microcefalia" <?php si($cefalia_otro_2anios );?>> Microcefalia
                </label>
                <label for="" class="control-label radio-inline col-lg-5" >
                  <input type="radio" class="2anios_otros" name="cefalia_otro_2anios" value="0" id="2anios_macrocefalia" <?php no($cefalia_otro_2anios );?>> Macrocefalia
                </label>
              </div>

              <div class="form-group checkbox col-lg-9">
                <label class="control-label txt_izq col-lg-12">
                  <input name="sindro_otro_2anios" type="checkbox" value="1" class="2anios_otros" <?php si($sindro_otro_2anios );?>>
                  Sindrome Convulsivo
                </label>
                <label class="control-label txt_izq col-lg-12">
                  <input name="altera_otro_2anios" type="checkbox" value="1" class="2anios_otros" <?php si($altera_otro_2anios );?>>
                  Alteración de conducta
                </label>               
              </div>
            </div>

            <div class="form-group col-lg-6 col-lg-offset-6">
              <label class="control-label col-lg-3">Neurorehabilitación</label>
              <div class="col-lg-7">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="neurorehabilitacion_2anios" value="1" <?php si($neurorehabilitacion_2anios );?> > Sí
                </label>
                <label for="" class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="neurorehabilitacion_2anios" value="0" <?php no($neurorehabilitacion_2anios );?> > No
                </label>
              </div>
            </div>

          </div> 
        </div>
      </div>
		<?php 
		 
		//if($mes>=6){
		//if($nombre_control=='control 2' ||  $nombre_control=='control 3' || $nombre_control=='control 4'){
		?>
      <div class="row" id="sec_2anios_psicomotor_antes">
        <div class="col-lg-12 form-group">
          <label class="control-label">Evaluación del Desarrollo Psicomotor antes de los 2 años de EC</label> 
		  <input type="hidden" id="psico_antes_2" name ="psico_antes_2" value="psico_antes_2"> 
        </div>
        <div class="row">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">0-24 meses</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="meses_a2a_psicomotor" value="1" id="0a24semanas_si" <?php si($meses_a2a_psicomotor );?> > Sí
              </label>
              <label for="" class="control-label radio-inline col-lg-2" >
                <input type="radio" name="meses_a2a_psicomotor" value="0" id="0a24semanas_no" <?php no($meses_a2a_psicomotor );?> > No
              </label>
            </div>
          </div>

          <div id="sec_0a24semanas_si" class="sub-form">
            <div class="col-lg-6">
              <div class="col-lg-12 form-group">
                <label class="control-label col-lg-12">¿Cuál?</label>
                <div class="col-lg-12">
                  <div class="form-group checkbox">
                    <label class="control-label txt_izq col-lg-12">
                      <input  type="checkbox" value="1" <?php si($cual_eedp_a2a );?> name="cual_eedp_a2a" class="edp_a2a" id="eedp">
                      (EEDP) Escala de Evaluación Desarrollo Psicomotor 
                    </label>
                    <div id="sec_eedp" class="sub-form">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Fecha de aplicación</label>
                        <div class="col-lg-8">
                          <input type="date" name="fech_eedp_a2a" value="<?php echo($fecha_eedp_a2a );?>" class="input-sm form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edad EC</label>
                        <div class="col-lg-8">
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" step="1" value="<?php echo($anios_eedp_a2a );?>" name="anios_eedp_a2a" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">años</span>
                          </div>
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" max="11" step="1" name="meses_eedp_a2a" value="<?php echo($meses_eedp_a2a );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">meses</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Puntaje</label>
                        <div class="col-lg-8">
                          <input type="number" name="puntaje_eedp_a2a" value="<?php echo($puntaje_eedp_a2a );?>" class="input-sm form-control" maxlength="3">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Normal</label>
                        <div class="col-lg-8 form-group">
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="normal_eedp_a2a" value="1" id="eedp_normal_si" <?php si($normal_eedp_a2a );?> > Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="normal_eedp_a2a" value="0" id="eedp_normal_no" <?php no($normal_eedp_a2a );?> > No
                          </label>
                        </div>
                      </div>
                      <div id="sec_eedp_normal_si" class="form-group sub-form">
                        <label class="control-label col-lg-4">Observación</label>
                        <div class="col-lg-8">
                          <textarea class="form-control col-lg-12" rows="3" name="observacion_eedp_a2a"><?php echo($observacion_eedp_a2a );?></textarea>
                        </div>
                      </div>       
                    </div>

                    <label class="control-label txt_izq col-lg-12">
                      <input  type="checkbox" value="1" name="cual_eais_a2a" <?php si($cual_eais_a2a );?> class="cual_eais_a2a" id="eais">
                      (EAIS) Escala argentina de Inteligencia Sensorio-motriz 
                    </label>
                    <div id="sec_eais" class="sub-form">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Fecha de aplicación</label>
                        <div class="col-lg-8">
                          <input type="date" name="fech_eais_a2a" value="<?php echo($fecha_eais_a2a );?>"  class="input-sm form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edad EC</label>
                        <div class="col-lg-8">
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" step="1" name="anios_eais_a2a" value="<?php echo($anios_eais_a2a );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">años</span>
                          </div>
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" max="11" step="1" name="meses_eais_a2a" value="<?php echo($meses_eais_a2a );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">meses</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Puntaje</label>
                        <div class="col-lg-8">
                          <input type="number" name="puntaje_eais_a2a"  value="<?php echo($puntaje_eais_a2a );?>" class="input-sm form-control" maxlength="3">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Normal</label>
                        <div class="col-lg-8 form-group">
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="normal_eais_a2a" value="1" id="eais_normal_si" <?php si($normal_eais_a2a );?> > Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="normal_eais_a2a" value="0" id="eais_normal_no" <?php no($normal_eais_a2a );?> > No
                          </label>
                        </div>
                      </div>
                      <div id="sec_eais_normal_si" class="form-group sub-form">
                        <label class="control-label col-lg-4">Observación</label>
                        <div class="col-lg-8">
                          <textarea class="form-control col-lg-12" rows="3" name="observacion_eais_a2a"><?php echo($observacion_eais_a2a );?></textarea>
                        </div>
                      </div>       
                    </div>

                    <label class="control-label txt_izq col-lg-12">
                      <input type="checkbox" value="1" name="cual_cat_a2a"  <?php si($cual_cat_a2a );?>  class="cual_cat_a2a" id="cat">
                      (CAT/CLAMS) Cognitive Adaptive Test (Clinical Linguistic and Auditory Milestone Scale)
                    </label>
                    <div id="sec_cat" class="sub-form">
                      <div class="form-group">
                        <label class="control-label col-lg-4">Fecha de aplicación</label>
                        <div class="col-lg-8">
                          <input type="date" name="fech_cat_a2a" value="<?php echo($fecha_cat_a2a );?>" class="input-sm form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edad EC</label>
                        <div class="col-lg-8">
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" step="1" name="anios_cat_a2a"  value="<?php echo($anios_cat_a2a );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">años</span>
                          </div>
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" max="11" step="1" name="meses_cat_a2a" value="<?php echo($meses_cat_a2a );?>"  class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">meses</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Puntaje</label>
                        <div class="col-lg-8">
                          <input type="number" name="puntaje_cat_a2a" value="<?php echo($puntaje_cat_a2a );?>" class="input-sm form-control" maxlength="3">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Normal</label>
                        <div class="col-lg-8 form-group">
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="normal_cat_a2a" value="1"  id="cat_normal_si" <?php si($normal_cat_a2a );?> > Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="normal_cat_a2a" value="0" id="cat_normal_no" <?php no($normal_cat_a2a );?> > No
                          </label>
                        </div>
                      </div>
                      <div id="sec_cat_normal_si" class="form-group sub-form">
                        <label class="control-label col-lg-4">Observación</label>
                        <div class="col-lg-8">
                          <textarea class="form-control col-lg-12" rows="3" name="observacion_cat_a2a"> <?php echo($observacion_cat_a2a );?></textarea>
                        </div>
                      </div>       
                    </div>

                    <label class="control-label txt_izq col-lg-12">
                      <input  type="checkbox" value="1" <?php si($cual_asq_a2a );?> name="cual_asq_a2a" class="cual_asq_a2a" id="asq">
                      (ASQ) Age and Stage Questionnaire 
					  
					   
                    </label>
                   <div id="sec_asq" class="sub-form">
				   <?php 
				  if($nombre_control=='control 2' ||  $nombre_control=='control 3' || $nombre_control=='control 4'){
				   ?>
				   <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true"  >
				    <a href="javascript:popUp('<?php echo $asqI;?>asq.jpg')">Ayuda</a></span>
				   <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Fecha de aplicación</label>
                        <div class="col-lg-8">
                          <input type="date" name="fech_asq_a2a"  value="<?php echo($fecha_asq_a2a );?>" class="input-sm form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edad EC</label>
                        <div class="col-lg-8">
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" step="1" name="anios_asq_a2a" value="<?php echo($anios_asq_a2a );?>"  class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">años</span>
                          </div>
                          <div class="col-lg-5 input-group linea">
                            <input type="number" min="0" max="11" step="1" name="meses_asq_a2a" value="<?php echo($meses_asq_a2a );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2">meses</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Puntaje</label>
                        <div class="col-lg-8">
                          <input type="number" name="puntaje_asq_a2a" value="<?php echo($puntaje_asq_a2a );?>"  class="input-sm form-control" maxlength="3">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Normal</label>
                        <div class="col-lg-8 form-group">
                          <label class="control-label radio-inline col-lg-2">
                            <input type="radio" name="normal_asq_a2a" value="1" id="asq_normal_si" <?php si($normal_asq_a2a );?> > Sí
                          </label>
                          <label class="control-label radio-inline col-lg-2" >
                            <input type="radio" name="normal_asq_a2a" value="0" id="asq_normal_no" <?php no($normal_asq_a2a );?> > No
                          </label>
                        </div>
                      </div>
                      <div id="sec_asq_normal_si" class="form-group sub-form">
                        <label class="control-label col-lg-4">Observación</label>
                        <div class="col-lg-8">
                          <textarea class="form-control col-lg-12" rows="3" name="observacion_asq_a2a"><?php echo($observacion_asq_a2a );?></textarea>
                        </div>
                      </div>       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>
      </div>
		<?php  //} ?> 
      <div class="row" id="sec_2a7anios_psicomotor">
        <div class="col-lg-12 form-group">
          <label class="control-label col-lg-12">Evaluación del Desarrollo Psicomotor 2 a 7 años</label> 
        </div>
        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">TEPSI</label>
            <div class="col-lg-8">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="tepsi_2a7anios" value="1" id="2a7anios_tepsi_si" <?php si($tepsi_2a7anios );?> > Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="tepsi_2a7anios" value="0" id="2a7anios_tepsi_no" <?php no($tepsi_2a7anios );?> > No
              </label>
            </div>
          </div>
          <div id="sec_2a7anios_tepsi_si" class="sub-form col-lg-6">
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Normal</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="tepsi_normal_2a7anios" value="1" id="2a7anios_tepsi_normal_si" <?php si($tepsi_normal_2a7anios );?> > Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="tepsi_normal_2a7anios" value="0" id="2a7anios_tepsi_normal_no" <?php no($tepsi_normal_2a7anios );?> > No
                </label>
              </div>
            </div>
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Fecha de aplicación</label>
              <div class="col-lg-8">
                <input type="date" name="tepsi_fecha_2a7anios" value="<?php echo($tepsi_fecha_2a7anios );?>" class="form-control input-sm">
              </div>
            </div>
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Edad</label>
              <div class="col-lg-8">
                <div class="col-lg-5 input-group linea">
                  <input type="number" min="0" step="1" name="tepsi_anios_2a7anios"  value="<?php echo($tepsi_anios_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                  <span class="input-group-addon" id="basic-addon2">años</span>
                </div>
                <div class="col-lg-5 input-group linea">
                  <input type="number" min="0" max="11" step="1" name="tepsi_meses_2a7anios" value="<?php echo($tepsi_meses_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                  <span class="input-group-addon" id="basic-addon2">meses</span>
                </div>
              </div>
            </div>
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Puntaje</label>
              <div class="col-lg-8">
                <input type="number" name="tepsi_puntaje_2a7anios" value="<?php echo($tepsi_puntaje_2a7anios );?>" maxlength="3" class="form-control input-sm">
              </div>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Bayley</label>
            <div class="col-lg-7">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="bayley_2a7anios" value="1" id="2a7anios_bayley_si" <?php si($bayley_2a7anios );?> > Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="bayley_2a7anios" value="0" id="2a7anios_bayley_no" <?php no($bayley_2a7anios );?> > No
              </label>
            </div>
          </div>
          <div id="sec_2a7anios_bayley_si" class="sub-form col-lg-6">
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Versión aplicada</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="bayley_version_2a7anios" value="1" <?php si($bayley_version_2a7anios );?> id="2a7anios_bayley_version_2"> II
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="bayley_version_2a7anios" value="0" <?php no($bayley_version_2a7anios );?> id="2a7anios_bayley_version_3"> III
                </label>
              </div>
            </div>
            <div id="sec_2a7anios_bayley_version_2" class="form-group sub-form col-lg-12">
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Fecha de aplicación</label>
                <div class="col-lg-8">
                  <input type="date" name="bayley_version_fech_2a7anios" value="<?php echo($bayley_version_fecha_2a7anios);?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Edad</label>
                <div class="col-lg-8">
                  <div class="col-lg-5 input-group linea">
                    <input type="number" min="0" step="1" name="bayley_version_anios_2a7anios" value="<?php echo($bayley_version_anios_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">años</span>
                  </div>
                  <div class="col-lg-5 input-group linea">
                    <input type="number" min="0" max="11" step="1" name="bayley_version_meses_2a7anios" value="<?php echo($bayley_version_meses_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">meses</span>
                  </div>
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala Mental</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_Mental_2a7anios" value="<?php echo($bayley_version_Mental_2a7anios );?>"  class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala Motora</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_motora_2a7anios" value="<?php echo($bayley_version_motora_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala de Conducta</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_conducta_2a7anios" value="<?php echo($bayley_version_conducta_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Normal</label>
                <div class="col-lg-8">
                  <label class="control-label radio-inline col-lg-2">
                    <input type="radio" name="bayley_version_normal_2a7anios" value="1" <?php si($bayley_version_normal_2a7anios );?>> Si
                  </label>
                  <label class="control-label radio-inline col-lg-2" >
                    <input type="radio" name="bayley_version_normal_2a7anios" value="0"  <?php no($bayley_version_normal_2a7anios );?> > No
                  </label>
                </div>
              </div>
            </div>


            <div id="sec_2a7anios_bayley_version_3" class="form-group sub-form col-lg-12">
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Fecha de aplicación</label>
                <div class="col-lg-8">
                  <input type="date" name="bayley_version_3_fech_2a7anios" value="<?php echo($bayley_version_3_fecha_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Edad</label>
                <div class="col-lg-8">
                  <div class="col-lg-5 input-group linea">
                    <input type="number" min="0" step="1" name="bayley_version_3_anios_2a7anios" value="<?php echo($bayley_version_3_anios_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">años</span>
                  </div>
                  <div class="col-lg-5 input-group linea">
                    <input type="number" min="0" max="11" step="1" name="bayley_version_3_meses_2a7anios" value="<?php echo($bayley_version_3_meses_2a7anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">meses</span>
                  </div>
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala Motora</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_3_motora_2a7anios" value="<?php echo($bayley_version_3_motora_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala de Cognitiva</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_3_cognitiva_2a7anios" value="<?php echo($bayley_version_3_cognitiva_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala de Lenguaje</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_3_lenguaje_2a7anios" value="<?php echo($bayley_version_3_lenguaje_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala Socio-emocional</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_3_socio_7anios" value="<?php echo($bayley_version_3_socio_7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Escala Comport. adaptativo</label>
                <div class="col-lg-8">
                  <input type="number" name="bayley_version_3_comportamiento_2a7anios" value="<?php echo($bayley_version_3_comportamiento_2a7anios );?>" class="form-control input-sm">
                </div>
              </div>
              <div class="row col-lg-12">
                <label class="control-label col-lg-4">Normal</label>
                <div class="col-lg-8">
                  <label class="control-label radio-inline col-lg-2">
                    <input type="radio" name="bayley_version_3_normal_2a7anios" value="1" <?php si($bayley_version_3_normal_2a7anios );?>> Si
                  </label>
                  <label class="control-label radio-inline col-lg-2" >
                    <input type="radio" name="bayley_version_3_normal_2a7anios" value="0"  <?php no($bayley_version_3_normal_2a7anios );?> > No
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Retraso de lenguaje<br>(Niños hasta los 3 años)</label>
            <div class="col-lg-8">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="retraso_lenguaje_a3anios" value="1" id="retraso_lenguaje_si" <?php si($retraso_lenguaje_a3anios );?> > Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="retraso_lenguaje_a3anios" value="0" id="retraso_lenguaje_no" <?php no($retraso_lenguaje_a3anios );?> > No
              </label>
            </div>
          </div>
          <div id="sec_retraso_lenguaje_si" class="col-lg-6 sub-form">
            <div class="col-lg-12 form-group">
              <div class="col-lg-12">
                <label class="control-label radio-inline col-lg-5">
                  <input type="radio" name="retraso_lenguaje_tipo_a3anios" value="1" <?php si($retraso_lenguaje_tipo_a3anios );?>> Expresivo
                </label>
                <label class="control-label radio-inline col-lg-6" >
                  <input type="radio" name="retraso_lenguaje_tipo_a3anios" value="0"  <?php no($retraso_lenguaje_tipo_a3anios );?> > Mixto (expresivo - comprensivo)
                </label>
              </div>
            </div>
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Rehab. fonoaudiológica</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="retraso_lenguaje_rehab_a3anios" value="1" <?php si($retraso_lenguaje_rehab_a3anios );?> > Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="retraso_lenguaje_rehab_a3anios" value="0" <?php no($retraso_lenguaje_rehab_a3anios );?> > No
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Trastorno expresivo de lenguaje<br>(Niños sobre los 3 años)</label>
            <div class="col-lg-8">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="retraso_expresivo_3anios" value="1" id="retraso_expresivo_si" <?php si($retraso_expresivo_3anios );?> > Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="retraso_expresivo_3anios" value="0" id="retraso_expresivo_no" <?php no($retraso_expresivo_3anios );?> > No
              </label>
            </div>
          </div>
          <div id="sec_retraso_expresivo_si" class="col-lg-6 sub-form">
            <div class="col-lg-12 form-group">
              <label class="control-label col-lg-4">Rehab. fonoaudiológica</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="retraso_expresivo_rehab_3anios" value="1" <?php si($retraso_expresivo_rehab_3anios );?> > Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="retraso_expresivo_rehab_3anios" value="0" <?php no($retraso_expresivo_rehab_3anios );?> > No
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
            <div class="form-group col-lg-6">
              <label class="control-label col-lg-4">Evaluación Coeficiente intelectual (WPPSI-R)</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="coeficiente_2a4anios" value="1" id="coeficiente_si" <?php si($coeficiente_2a4anios );?> > Sí
                </label>
                <label class="control-label radio-inline col-lg-2" >
                  <input type="radio" name="coeficiente_2a4anios" value="0" id="coeficiente_no" <?php no($coeficiente_2a4anios );?> > No
                </label>
              </div>
            </div>
            <div id="sec_coeficiente_si" class="sub-form col-lg-6">
              <div id="coeficiente_1">
                <div class="col-lg-12 form-group">
                  <div class="control-label col-lg-12"><p>Entre los 2 años 6 meses y los 3 años 11 meses</p></div>
                  <label class="control-label col-lg-4">Fecha de aplicación</label>
                  <div class="col-lg-8">
                    <input type="date" name="coeficiente_fech_1_2a4anios"  value ="<?php echo($coeficiente_fecha_1_2a4anios );?>" class="form-control input-sm" value="">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Edad</label>
                  <div class="col-lg-8">
                     <div class="col-lg-5 input-group linea">
                        <input type="number" min="0" step="1" name="coeficiente_anios_1_2a4anios"   value ="<?php echo($coeficiente_anios_1_2a4anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">años</span>
                      </div>
                      <div class="col-lg-5 input-group linea">
                        <input type="number" min="0" max="11" step="1" name="coeficiente_meses_1_2a4anios" value ="<?php echo($coeficiente_meses_1_2a4anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">meses</span>
                      </div>
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Área Verbal</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_verbal_1_2a4anios" value ="<?php echo($coeficiente_verbal_1_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Área Manipulativa</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_manipulativa_1_2a4anios"  value ="<?php echo($coeficiente_manipulativa_1_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Total</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_total_1_2a4anios" value ="<?php echo($coeficiente_total_1_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
              </div>

              <div id="coeficiente_2">
                <div class="col-lg-12 form-group">
                  <div class="control-label col-lg-12"><p>Entre los 4 y 7 años</p></div>
                  <label class="control-label col-lg-4">Fecha de aplicación</label>
                  <div class="col-lg-8">
                    <input type="date" name="coeficiente_fech_2_2a4anios" class="form-control input-sm" value="<?php echo($coeficiente_fecha_2_2a4anios );?>" >
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Edad</label>
                  <div class="col-lg-8">
                     <div class="col-lg-5 input-group linea">
                        <input type="number" min="0" step="1" name="coeficiente_anios_2_2a4anios" value="<?php echo($coeficiente_anios_2_2a4anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">años</span>
                      </div>
                      <div class="col-lg-5 input-group linea">
                        <input type="number" min="0" max="11" step="1" name="coeficiente_meses_2_2a4anios" value="<?php echo($coeficiente_meses_2_2a4anios );?>" class="form-control input-sm" aria-describedby="basic-addon2">
                        <span class="input-group-addon" id="basic-addon2">meses</span>
                      </div>
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Área Verbal</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_verbal_2_2a4anios" value="<?php echo($coeficiente_verbal_2_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Área Manipulativa</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_manipulativa_2_2a4anios" value="<?php echo($coeficiente_manipulativa_2_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Velocidad Procesamiento</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_procesamiento_2_2a4anios"  value="<?php echo($coeficiente_procesamiento_2_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="control-label col-lg-4">Lenguaje general</label>
                  <div class="col-lg-8">
                    <input type="number" maxlength="3" name="coeficiente_lenguaje_2_2a4anios"  value="<?php echo($coeficiente_lenguaje_2_2a4anios );?>" class="form-control input-sm">
                  </div>
                </div>
              </div>       
            </div>       
        </div>

        <div class="row col-lg-12">
            <div class="form-group col-lg-6">
              <label class="control-label col-lg-4">Otras evaluaciones de función mental</label>
              <div class="col-lg-8">
                <div class="form-group checkbox col-lg-12">
                  <label for="" class="control-label txt_izq col-lg-12">
                    <input name="msca_2a4anios" type="checkbox" value="1" <?php si($msca_2a4anios );?> class="otras_mental_2a4anios">
                    MSCA (McCarthy Scale of Children’s Abilities)
                  </label>
                  <label for="" class="control-label txt_izq col-lg-12">
                    <input name="scq_2a4anios" type="checkbox" value="1" <?php si($scq_2a4anios );?> class="otras_mental">
                    SCQ (Social Communicaton Questionnarie)
                  </label>
                  <label for="" class="control-label txt_izq col-lg-12">
                    <input name="mchat_2a4anios" type="checkbox" <?php si($mchat_2a4anios );?>  value="1" class="otras_mental">
                    MCHAT (Modified Checklist for Autism in Toddlers)
                  </label>
                  <label for="" class="control-label txt_izq col-lg-12">
                    <input name="vabs_2a4anios" type="checkbox" value="1"  <?php si($vabs_2a4anios );?> class="otras_mental">
                    VABS-II (Vineland Adaptative Behaviour Scales)
                  </label>
                  <label for="" class="control-label txt_izq col-lg-12">
                    <input name="gmfcs_2a4anios" type="checkbox" value="1" <?php si($gmfcs_2a4anios );?> class="otras_mental">
                    GMFCS (Gross motor functional classification Scale) 
                  </label>
                </div>
              </div>
              <label class="control-label col-lg-4">Observaciones</label>
              <div class="col-lg-8">
                <textarea class="form-control col-lg-12" rows="3" name="otras_observaciones_2a4anios"><?php echo($otras_observaciones_2a4anios );?></textarea>
              </div>         
            </div>
        </div>
      </div>

      <div class="row" id="sec_2anios_neurodesarrollo">
        <div class="col-lg-12 form-group">
          <label class="control-label col-lg-12">Situación del Neurodesarrollo a partir de los 2 años de EC</label>
        </div>
        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Compromiso función motora gruesa</label>
            <div class="col-lg-8">
              <label class="control-label radio-inline col-lg-2">
                <input type="radio" name="motora_neurodesarollo_2anios" value="1" id="motora_guresa_si" <?php si($motora_neurodesarollo_2anios );?> > Sí
              </label>
              <label class="control-label radio-inline col-lg-2" >
                <input type="radio" name="motora_neurodesarollo_2anios" value="0" id="motora_guresa_no" <?php no($motora_neurodesarollo_2anios );?> > No
              </label>
            </div>
          </div>
          <div id="sec_motora_guresa_si" class="col-lg-6 sub-form">
            <label class="control-label col-lg-4">Nivel</label>
            <div class="col-lg-8">
              <select class="form-control input-sm" name="motora_nivel_neurodesarollo_2anios">
					<option value="null">Seleccione</option>
                    <?php cargarSelect("motora_neuro_segui_param",$cone,"id_motora_neuro_segui_param","descripcion",$motora_nivel_neurodesarollo_2anios);?>
              </select>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label class="control-label col-lg-4">Tipo de Parálisis cerebral</label>
            <div class="col-lg-8">
              <label class="control-label col-lg-12">
                <input type="radio" name="paralisis_neurodesarollo_2anios" value="1" id="paralisis_1" <?php si($paralisis_neurodesarollo_2anios );?>> Espástica o Hipertónica
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_neurodesarollo_2anios" value="0" id="paralisis_2" <?php no($paralisis_neurodesarollo_2anios );?>> Discinética
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_neurodesarollo_2anios" value="-1" id="paralisis_3" <?php sn($paralisis_neurodesarollo_2anios );?>> Atáxica
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_neurodesarollo_2anios" value="-2" id="paralisis_4" <?php if($paralisis_neurodesarollo_2anios =="-2") echo "checked";?>> Hipotónica
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_neurodesarollo_2anios" value="-3" id="paralisis_5"<?php if($paralisis_neurodesarollo_2anios =="-3") echo "checked";?>> Mixta
              </label>
            </div>
          </div>
          <div id="sec_paralisis_1" class="col-lg-6 sub-form">
            <label class="control-label col-lg-4">¿Cuál?</label>
            <div class="col-lg-8">
              <label class="control-label col-lg-12">
                <input type="radio" name="paralisis_cual_neurodesarollo_2anios" value="1" <?php si($paralisis_cual_neurodesarollo_2anios );?> > Tetraplejía (tetraparesia) 
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_cual_neurodesarollo_2anios" value="0" <?php no($paralisis_cual_neurodesarollo_2anios );?> > Diplejía (diparesia) 
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_cual_neurodesarollo_2anios" value="-1" <?php sn($paralisis_cual_neurodesarollo_2anios );?> > Hemiplejía (hemiparesia) 
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_cual_neurodesarollo_2anios" value="-2" <?php si($paralisis_cual_neurodesarollo_2anios );?>> Triplejía (triparesia)
              </label>
              <label class="control-label col-lg-12" >
                <input type="radio" name="paralisis_cual_neurodesarollo_2anios" value="-3" <?php si($paralisis_cual_neurodesarollo_2anios );?>> Monoparesia
              </label>
            </div>
          </div>
        </div>

        <div class="row col-lg-12">
          <div class="col-lg-6">
            <div class="form-group col-lg-12">
              <label class="control-label col-lg-12"><p>Otros transtornos<br>(A registrar en controles después de los 6 años)</p></label>
              <label class="control-label col-lg-4">Conductual</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_conductual_neurodesarollo_2anios" value="1"   <?php si($otros_transtornos_conductual_neurodesarollo_2anios );?> > Sí 
                </label>
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_conductual_neurodesarollo_2anios" value="0"  <?php no($otros_transtornos_conductual_neurodesarollo_2anios );?> > No 
                </label>
              </div>       
            </div>
            <div class="form-group col-lg-12">
              <label class="control-label col-lg-4">De Lenguaje</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_lenguaje_neurodesarollo_2anios" value="1"   <?php si($otros_transtornos_lenguaje_neurodesarollo_2anios );?> > Sí 
                </label>
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_lenguaje_neurodesarollo_2anios" value="0"  <?php no($otros_transtornos_lenguaje_neurodesarollo_2anios );?> > No 
                </label>
              </div>       
            </div>
            <div class="form-group col-lg-12">
              <label class="control-label col-lg-4">De aprendizaje y/o atencionales</label>
              <div class="col-lg-8">
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_aprendizaje_neurodesarollo_2anios" value="1"   <?php si($otros_transtornos_aprendizaje_neurodesarollo_2anios );?> > Sí 
                </label>
                <label class="control-label radio-inline col-lg-2">
                  <input type="radio" name="otros_transtornos_aprendizaje_neurodesarollo_2anios" value="0"  <?php no($otros_transtornos_aprendizaje_neurodesarollo_2anios );?> > No 
                </label>
              </div>       
            </div>
          </div>
          
        </div>
      </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idOculto" id="idOculto" value="<?= $idControl; ?>"/> 
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>   
  </form>      
  </div>
</div>