<?php include 'head.php'; ?>

<div class="container">
  <!-- Inicio del Contenido -->
    <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">

      	<div class="col-lg-10">
        	<h2>Nuevo Control de Seguimiento</h2>
      	</div>
    </div>

    <div id="tabs" class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">

          <li role="presentation" class="active">
            <a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">Datos del Ingreso</a>
          </li>
          <li role="presentation" class="active">
            <a href="#control" aria-controls="profile" role="tab" data-toggle="tab">Datos del Control</a>
          </li>
          <li role="presentation" class="active">
            <a href="#connatales" aria-controls="profile" role="tab" data-toggle="tab">Antecedentes Connatales</a>
          </li>
          <li role="presentation" class="active">
            <a href="#familiares" aria-controls="profile" role="tab" data-toggle="tab">Antecedentes Familiares Control Actual</a>
          </li>
          <li role="presentation" class="active">
            <a href="#antropometria" aria-controls="profile" role="tab" data-toggle="tab">Antropometría</a>
          </li>
          <li role="presentation" class="active">
            <a href="#alimentacion" aria-controls="profile" role="tab" data-toggle="tab">Alimentación</a>
          </li>
          <li role="presentation" class="active">
            <a href="#auditiva" aria-controls="profile" role="tab" data-toggle="tab">Función Auditiva</a>
          </li>
          <li role="presentation" class="active">
            <a href="#visual" aria-controls="profile" role="tab" data-toggle="tab">Función Visual</a>
          </li>
          <li role="presentation" class="active">
            <a href="#otros" aria-controls="profile" role="tab" data-toggle="tab">Compromiso de Otros Sistemas</a>
          </li>
          <li role="presentation" class="active">
            <a href="#neurodesarrollo" aria-controls="profile" role="tab" data-toggle="tab">Evaluación del Neurodesarrollo</a>
          </li>
          <li role="presentation" class="active">
            <a href="#vacunas" aria-controls="profile" role="tab" data-toggle="tab">Vacunas</a>
          </li>
          <li role="presentation" class="active">
            <a href="#hospitalizaciones" aria-controls="profile" role="tab" data-toggle="tab">Hospitalizaciones del Periodo</a>
          </li>
          <li role="presentation" class="active">
            <a href="#diagnostico" aria-controls="profile" role="tab" data-toggle="tab">Diagnóstico en esta Evaluación</a>
          </li>
          <li role="presentation" class="active">
            <a href="#perdida" aria-controls="profile" role="tab" data-toggle="tab">Pérdida del Paciente</a>
          </li>
          <li role="presentation" class="active">
            <a href="#ficha" aria-controls="profile" role="tab" data-toggle="tab">Datos de Ficha</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-12">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="ingreso">
            <?php include 'seguimiento/datos_ingreso.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="control">
            <?php include 'seguimiento/control.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="connatales">
            <?php include 'seguimiento/connatales.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="familiares">
            <?php include 'seguimiento/familiares.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="antropometria">
            <?php include 'seguimiento/antropometria.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="alimentacion">
            <?php include 'seguimiento/alimentacion.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="auditiva">
            <?php include 'seguimiento/funcion_auditiva.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="visual">
            <?php include 'seguimiento/funcion_visual.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="otros">
            <?php include 'seguimiento/otros_sistemas.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="neurodesarrollo">
            <?php include 'seguimiento/neurodesarrollo.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="vacunas">
            <?php include 'seguimiento/vacunas.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="hospitalizaciones">
            <?php include 'seguimiento/hospitalizaciones.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="diagnostico">
            <?php include 'seguimiento/diagnostico.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="perdida">
            <?php include 'seguimiento/perdida.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="ficha">
            <?php include 'seguimiento/ficha.php'; ?>
          </div>

        </div>
      </div>
    </div>
    <!-- Fin del Contenido -->  
  </div>

<?php
  include 'footer.php';
?>
<!-- Inicio de JavaScript -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>
<script src="../js/admin/seguimiento.js"></script>
<script src="../js/neocosur.js"></script>
<script>
  $( "#tabs" ).tabs();
  $('[data-toggle="tooltip"]').tooltip();


jQuery(document).ready(function(){

  if( $("#pesquisa_si").prop("checked") )
  {
    $("#sec_pesquisa_si").show();
    $("#pesquisa_alta_1, #pesquisa_alta_2, #pesquisa_alta_3").hide();
  };

  if( $("#pesquisa_no").prop("checked") )
  {
    $("input[name*='pesquisa_alta_1']").removeProp("checked");
    $("input[name*='pesquisa_alta_2']").removeProp("checked");
    $("input[name*='pesquisa_alta_3']").removeProp("checked");

    $("#check_pesquisa_alta_1,#check_pesquisa_alta_2, #check_pesquisa_alta_3").removeProp("checked");

    $("#pesquisa_alta_1, #pesquisa_alta_2, #pesquisa_alta_3").hide();
    $("#sec_pesquisa_si").hide();
  };


  if( $("#check_pesquisa_alta_1").prop("checked") )
  {
    $("#pesquisa_alta_1").show();
  }
  else
  {
    $("#pesquisa_alta_1").hide();
    $("input[name*='pesquisa_alta_1']").removeProp("checked");
  };

  if( $("#check_pesquisa_alta_2").prop("checked") )
  {
    $("#pesquisa_alta_2").show();
  }
  else
  {
    $("#pesquisa_alta_2").hide();
    $("input[name*='pesquisa_alta_2']").removeProp("checked");
  };

  if( $("#check_pesquisa_alta_3").prop("checked") )
  {
    $("#pesquisa_alta_3").show();
  }
  else
  {
    $("#pesquisa_alta_3").hide();
    $("input[name*='pesquisa_alta_3']").removeProp("checked");
  };

  if( $("#evaluacion_auditiva_si").prop("checked") )
  {
    $("#sec_evaluacion_auditiva_si").show();
  };

  if( $("#evaluacion_auditiva_no").prop("checked") )
  {
    $("#sec_evaluacion_auditiva_si").hide();
    $("#sec_evaluacion_auditiva_normal_no").hide();
    $("#sec_audiometria_si").hide();
    $("#sec_peat_automatizados_si").hide();
    $("#sec_peat_extendidos_si").hide();
    $("#sec_hipoacusia_izquierdo").hide();
    $("#sec_hipoacusia_derecho").hide();

    $("input[name*='fecha']").val("");

    $("input[name*='evaluacion_auditiva_normal']").removeProp("checked");
    $("input[name*='audiometria']").removeProp("checked");
    $("input[name*='audiometria_normal']").removeProp("checked");
    $("input[name*='peat_automatizados']").removeProp("checked");
    $("input[name*='peat_automatizados_normal']").removeProp("checked");
    $("input[name*='peat_extendidos']").removeProp("checked");
    $("input[name*='peat_extendidos_normal']").removeProp("checked");
    $("input[name*='oido_izquierdo']").removeProp("checked");
    $("input[name*='oido_derecho']").removeProp("checked");

    $("select[name*='grado_izquierdo']").val("0");
    $("select[name*='grado_derecho']").val("0");
  };

  if( $("#evaluacion_auditiva_normal_no").prop("checked") )
  {
    $("#sec_evaluacion_auditiva_normal_no").show();
  };

  if( $("#evaluacion_auditiva_normal_si").prop("checked") )
  {
    $("#sec_evaluacion_auditiva_normal_no").hide();
  };

  if( $("#audiometria_si").prop("checked") )
  {
    $("#sec_audiometria_si").show();
  };

  if( $("#audiometria_no").prop("checked") )
  {
    $("#sec_audiometria_si").hide();
    $("input[name*='audiometria_normal']").removeProp("checked");
  };

  if( $("#peat_automatizados_si").prop("checked") )
  {
    $("#sec_peat_automatizados_si").show();
  };

  if( $("#peat_automatizados_no").prop("checked") )
  {
    $("#sec_peat_automatizados_si").hide();
    $("input[name*='peat_automatizados_normal']").removeProp("checked");
  };

  if( $("#peat_extendidos_si").prop("checked") )
  {
    $("#sec_peat_extendidos_si").show();
  };

  if( $("#peat_extendidos_no").prop("checked") )
  {
    $("#sec_peat_extendidos_si").hide();
    $("input[name*='peat_extendidos_normal']").removeProp("checked");
  };

  if( $("#hipoacusia_izquierdo").prop("checked") )
  {
    $("#sec_hipoacusia_izquierdo").show();
  };

  if( $("#normal_izquierdo").prop("checked") )
  {
    $("#sec_hipoacusia_izquierdo").hide();
    $("select[name*='grado_izquierdo']").val("0");
  };

  if( $("#hipoacusia_derecho").prop("checked") )
  {
    $("#sec_hipoacusia_derecho").show();
  };

  if( $("#normal_derecho").prop("checked") )
  {
    $("#sec_hipoacusia_derecho").hide();
    $("select[name*='grado_derecho']").val("0");
  };

  if( $("#confirmacion_diagnostico_si").prop("checked") )
  {
    $("#sec_confirmacion_diagnostico_si").show();
  };

  if( $("#confirmacion_diagnostico_no").prop("checked"))
  {
    $("#sec_confirmacion_diagnostico_si").hide();
    $("#sec_hipoacusia_izquierdo_confirmacion").hide();
    $("#sec_tratamiento_izquierdo_si").hide();
    $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();

    $("input[name*='fecha_confirmacion']").val("");
    $("select[name*='grado_izquierdo_confirmacion']").val("0");
    $("textarea[name*='observaciones_oido_izquierdo']").val("");

    $("input[name*='oido_izquierdo_confirmacion']").removeProp("checked");
    $("input[name*='tipo_alteracion_izquierdo']").removeProp("checked");
    $("input[name*='tratamiento_izquierdo']").removeProp("checked");
    $("input[name*='cual_izquierdo']").removeProp("checked");
  
    $("input[name*='terapia_auditiva_izquierdo_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_izquierda']").removeProp("checked");

    $("#sec_hipoacusia_derecho_confirmacion").hide();
    $("#sec_tratamiento_derecho_si").hide();
    $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();
    $("select[name*='grado_derecho_confirmacion']").val("0");
    $("textarea[name*='observaciones_oido_derecho']").val("");

    $("input[name*='oido_derecho_confirmacion']").removeProp("checked");
    $("input[name*='tipo_alteracion_derecho']").removeProp("checked");
    $("input[name*='tratamiento_derecho']").removeProp("checked");
    $("input[name*='cual_derecho']").removeProp("checked");
    $("input[name*='terapia_auditiva_derecho_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_derecho']").removeProp("checked");
  };

  if( $("#hipoacusia_izquierdo_confirmacion").prop("checked") )
  {
    $("#sec_hipoacusia_izquierdo_confirmacion").show();
  };

  if( $("#normal_izquierdo_confirmacion").prop("checked") )
  {
    $("#sec_hipoacusia_izquierdo_confirmacion").hide();
    $("#sec_tratamiento_izquierdo_si").hide();
    $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();

    $("select[name*='grado_izquierdo_confirmacion']").val("0");
    $("textarea[name*='observaciones_oido_izquierdo']").val("");

    $("input[name*='tipo_alteracion_izquierdo']").removeProp("checked");
    $("input[name*='tratamiento_izquierdo']").removeProp("checked");
    $("input[name*='cual_izquierdo']").removeProp("checked");
    $("input[name*='terapia_auditiva_izquierdo_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_izquierda']").removeProp("checked");
  };

  if( $("#tratamiento_izquierdo_si").prop("checked") )
  {
    $("#sec_tratamiento_izquierdo_si").show();
  };


  if( $("#tratamiento_izquierdo_no").prop("checked") )
  {
    $("#sec_tratamiento_izquierdo_si").hide();
    $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();

    $("input[name*='cual_izquierdo']").removeProp("checked");
    $("input[name*='terapia_auditiva_izquierdo_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_izquierda']").removeProp("checked");
  };

  if( $("#terapia_auditiva_izquierdo_confirmacion_si").prop("checked") )
  {
    $("#sec_terapia_auditiva_izquierdo_confirmacion_si").show();
  };

  if( $("#terapia_auditiva_izquierdo_confirmacion_no").prop("checked") )
  {
    $("input[name*='cual_terapia_izquierda']").removeProp("checked");
    $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();
  };

  if( $("#normal_derecho_confirmacion").prop("checked") )
  {
    $("#sec_hipoacusia_derecho_confirmacion").hide();
    $("#sec_tratamiento_derecho_si").hide();
    $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();

    $("select[name*='grado_derecho_confirmacion']").val("0");
    $("textarea[name*='observaciones_oido_derecho']").val("");

    $("input[name*='tipo_alteracion_derecho']").removeProp("checked");
    $("input[name*='tratamiento_derecho']").removeProp("checked");
    $("input[name*='cual_derecho']").removeProp("checked");
    $("input[name*='terapia_auditiva_derecho_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_derecho']").removeProp("checked");
  };

  if( $("#hipoacusia_derecho_confirmacion").prop("checked") )
  {
    $("#sec_hipoacusia_derecho_confirmacion").show();
  };

  if( $("#tratamiento_derecho_si").prop("checked") )
  {
    $("#sec_tratamiento_derecho_si").show();
  };


  if( $("#tratamiento_derecho_no").prop("checked") )
  {
    $("#sec_tratamiento_derecho_si").hide();
    $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();

    $("input[name*='cual_derecho']").removeProp("checked");
    $("input[name*='terapia_auditiva_derecho_confirmacion']").removeProp("checked");
    $("input[name*='cual_terapia_derecho']").removeProp("checked");;
  };

  if( $("#terapia_auditiva_derecho_confirmacion_si").prop("checked") )
  {
    $("#sec_terapia_auditiva_derecho_confirmacion_si").show();
  };

  if( $("#terapia_auditiva_derecho_confirmacion_no").prop("checked") )
  {
    $("input[name*='cual_terapia_derecho']").removeProp("checked");
    $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();
  };

  if( $("#evaluacion_posterior_si").prop("checked") )
  {
    $("#sec_evaluacion_posterior_si").show();
  };

  if( $("#evaluacion_posterior_no").prop("checked") )
  {
    $("#sec_evaluacion_posterior_si").hide();
    $("#sec_instancia_si").hide();
    $("#sec_oftalmologica_no").hide();
    $("#sec_cirugia_izquierdo_diagnostico_si").hide();
    $("#sec_cirugia_derecho_diagnostico_si").hide();
    $("#sec_requiere_cirugia_si").hide();
    $("#sec_cirugia_izquierdo_si").hide();
    $("#sec_cirugia_derecho_si").hide();

    $("input[name*='rop_izquierdo']").removeProp("checked");
    $("input[name*='plus_izquierdo']").removeProp("checked");
    $("input[name*='cirugia_izquierdo']").removeProp("checked");
    $("input[name*='rop_derecho']").removeProp("checked");
    $("input[name*='plus_derecho']").removeProp("checked");
    $("input[name*='cirugia_derecho']").removeProp("checked");
    $("input[name*='bevacizumab']").removeProp("checked");
    $("input[name*='instancia']").removeProp("checked");
    $("input[name*='cirugia_izquierdo_diagnostico']").removeProp("checked");
    $("input[name*='rop_izquierdo_diagnostico']").removeProp("checked");
    $("input[name*='cirugia_derecho_diagnostico']").removeProp("checked");
    $("input[name*='rop_derecho_diagnostico']").removeProp("checked");
    $("input[name*='oftalmologica']").removeProp("checked");
    $("input[name*='requiere_cirugia']").removeProp("checked");
    $("input[name*='ceguera_izquierdo']").removeProp("checked");
    $("input[name*='ceguera_derecho']").removeProp("checked");
            
    $("select[name*='localizacion_izquierdo']").val("");
    $("select[name*='severidad_izquierdo']").val("");
    $("select[name*='cual_izquierdo']").val("");
    $("select[name*='localizacion_derecho']").val("");
    $("select[name*='severidad_derecho']").val("");
    $("select[name*='cual_derecho']").val("");
    $("select[name*='cual_izquierdo_rop']").val("0");
    $("select[name*='cual_derecho_rop']").val("0");
    $("select[name*='requiere_cirugia_cual']").val("0");

    $("textarea[name*='observaciones']").val("");      
  };

  if( $("#cirugia_izquierdo_si").prop("checked") )
  {
    $("#sec_cirugia_izquierdo_si").show();
  };

  if( $("#cirugia_derecho_diagnostico_no").prop("checked") || $("#cirugia_derecho_diagnostico_s_i").prop("checked") )
  {
    $("#sec_cirugia_derecho_diagnostico_si").hide();
    $("select[name*='cual_derecho_rop']").val("0");
  };

  if( $("#requiere_cirugia_si").prop("checked") )
  {
    $("#sec_requiere_cirugia_si").show();
  };

  if( $("#requiere_cirugia_no").prop("checked") )
  {
    $("#sec_requiere_cirugia_si").hide();

    $("textarea[name*='observaciones']").val("");
    $("select[name*='requiere_cirugia_cual']").val("0");
  };

  if ($("#diureticos_si").prop("checked") )
  {
    $("#sec_diureticos_si").show();
  };

  if( $("#diureticos_no").prop("checked") )
  {
    $("#sec_diureticos_si").hide();
    $("input[name*='fecha_suspension'], input[name*='fecha_inicio']").val("");
  };

  if( $("#ostomia_si").prop("checked") )
  {
    $("#sec_ostomia_si").show();
  };

  if( $("#ostomia_no").prop("checked") )
  {
    $("#sec_ostomia_si").hide();
    $("#sec_reconstitucion_si").hide();

    $("select[name*='ostomia_cual']").val("0");
    $("input[name*='reconstitucion']").removeProp("checked");
    $("input[name*='fecha_reconstitucion']").val("");
  };

  if( $("#reconstitucion_si").prop("checked") )
  {
    $("#sec_reconstitucion_si").show();
  };

  if( $("#reconstitucion_no").prop("checked") )
  {
    $("#sec_reconstitucion_si").hide();

    $("input[name*='fecha_reconstitucion']").val("");
  };


  if( $("#profilaxis_si").prop("checked") )
  {
    $("#sec_profilaxis_si").show();
  };

  if( $("#profilaxis_no").prop("checked") )
  {
    $("#sec_profilaxis_si").hide();

    $("input[name*='fecha_inicio_profilaxis'], input[name*='fecha_suspension_profilaxis']").val("");
  };

  if( $("#imagenes_si").prop("checked") )
  {
    $("#sec_imagenes_si").show();
  };

  if( $("#imagenes_no").prop("checked") )
  {
    $("#sec_imagenes_si").hide();
    $("#sec_eco_renal").hide();
    $("#sec_cintigrafia").hide();
    $("#sec_uretrocistografia").hide();

    $("input[name*='eco_renal'], input[name*='cintigrafia'], input[name*='uretrocistografia']").removeProp("checked");
           
    $("input[name*='eco_renal_alteracion']").removeProp("checked");
    $("textarea[name*='describa_eco_renal']").val("");

    $("input[name*='cintigrafia_alteracion']").removeProp("checked");
    $("textarea[name*='describa_cintigrafia']").val("");

    $("input[name*='uretrocistografia_alteracion']").removeProp("checked");
    $("textarea[name*='describa_uretrocistografia']").val("");
  };

  if( $("#eco_renal")t.prop("checked") )
  {
    $("#sec_eco_renal").show();
  }
  else
  {
    $("#sec_eco_renal").hide();
    $("input[name*='eco_renal_alteracion']").removeProp("checked");
    $("textarea[name*='describa_eco_renal']").val("");
  };

  if( $("#cintigrafia").prop("checked") )
  {
    $("#sec_cintigrafia").show();
  }
  else
  {
    $("#sec_cintigrafia").hide();
    $("input[name*='cintigrafia_alteracion']").removeProp("checked");
    $("textarea[name*='describa_cintigrafia']").val("");
  };

  if( $("#uretrocistografia").prop("checked") )
  {
    $("#sec_uretrocistografia").show();
  }
  else
  {
    $("#sec_uretrocistografia").hide();
    $("input[name*='uretrocistografia_alteracion']").removeProp("checked");
    $("textarea[name*='describa_uretrocistografia']").val("");
  };

  if( $("#presion_si").prop("checked") )
  {
    $("#sec_presion_si").show();
  };

  if( $("#presion_no").prop("checked") )
  {
    $("#sec_presion_si").hide();
    $("input[name*='alteracion']").removeProp("checked");
  };

  if( $("#hic_si").prop("checked") )
  {
    $("#sec_hic_si").show();
  };

  if( $("#hic_no").prop("checked") )
  {
    $("#sec_hic_si").hide();
    $("select[name*='hic_grado']").val("0");
  };

  if( $("#hic_s_i").prop("checked") )
  {
    $("#sec_hic_si").hide();
    $("select[name*='hic_grado']").val("0");
  };

  if( $("#hidrocefalia_si").prop("checked") )
  {
    $("#sec_hidrocefalia_si").show();
  };

  if( $("#hidrocefalia_no").prop("checked") )
  {
    $("#sec_hidrocefalia_si").hide();
    $("input[name*='valvula']").removeProp("checked");
  };

  if( $("#convulsiones_si").prop("checked") )
  {
    $("#sec_convulsiones_si").show();
  };

  if( $("#convulsiones_no").prop("checked") )
  {
    $("#sec_convulsiones_si").hide();
    $("input[name*='tratamiento']").removeProp("checked");
    $("input[name*='fecha_tratamiento']").val("");
  };

  if( $("#hic_40semanas_si").prop("checked") )
  {
    $("#sec_hic_40semanas_si").show();
  };

  if( $("#hic_40semanas_no").prop("checked") )
  {
    $("#sec_hic_40semanas_si").hide();
    $("select[name*='hic_40semanas_grado']").val("");
  };

  if( $("#rop_40semanas_si").prop("checked") )
  {
    $("#sec_rop_40semanas_si").show();
  };

  if( $("#rop_40semanas_no").prop("checked") )
  {
    $("#sec_rop_40semanas_si").hide();
    $("select[name*='rop_40semanas_grado']").val("");
  };

  if( $("#2anios_vision_no").prop("checked") )
  {
    $("#sec_2anios_vision_no").show();
  };

  if( $("#2anios_vision_si").prop("checked") )
  {
    $("#sec_2anios_vision_no").hide();
    $("input[class*='vision_normal_no']").removeProp("checked");
  };

  if( $("#2anios_audiocion_no").prop("checked") )
  {
    $("#sec_2anios_audiocion_no").show();
  };

  if( $("#2anios_audiocion_si").prop("checked") )
  {
    $("#sec_2anios_audiocion_no").hide();
    $("input[name*='2anios_audiocion_no']").removeProp("checked");
  };

  if( $("#2anios_paralisis_si").prop("checked") )
  {
    $("#sec_2anios_paralisis_si").show();
  };

  if( $("#2anios_paralisis_no").prop("checked") )
  {
    $("#sec_2anios_paralisis_si").hide();
    $("input[name*='2anios_paralisis_si']").removeProp("checked");
  };

  if( $("#2anios_otros_si").prop("checked") )
  {
    $("#sec_2anios_otros_si").show();
  };

  if( $("#2anios_otros_no").prop("checked") )
  {
    $("#sec_2anios_otros_si").hide();
    $("input[class*='2anios_otros_si']").removeProp("checked");
  };

  if( $("#2anios_psicomotor_examen_no").prop("checked") )
  {
    $("#sec_2anios_psicomotor_examen_no").show();
  };

  if( $("#2anios_psicomotor_examen_si").prop("checked") )
  {
    $("#sec_2anios_psicomotor_examen_no").hide();
    $("#sec_2anios_auditiva_no").hide();
    $("#sec_2anios_cirugia_si").hide();
    $("#sec_2anios_lenguaje_si").hide();

    $("input[class*='2anios_motora']").removeProp("checked");
    $("input[name*='auditiva']").removeProp("checked");
    $("select[name*='2anios_hipoacusia']").val("");
    $("input[name*='visual']").removeProp("checked");
    $("input[name*='cirugia']").removeProp("checked");
    $("textarea[name*='2anios_cirugia_si_descripcion']").val("");
    $("input[name*='2anios_lenguaje']").removeProp("checked");
    $("select[name*='2anios_lenguaje_si_tipo']").val("");
    $("input[name*='2anios_cefalia']").removeProp("checked");
    $("input[class*='2anios_otros']").removeProp("checked");
    $("input[name*='2anios_neurorehabilitación']").removeProp("checked");
  };

  if( $("#2anios_auditiva_no").prop("checked") )
  {
    $("#sec_2anios_auditiva_no").show();
  };

  if( $("#2anios_auditiva_si").prop("checked") )
  {
    $("#sec_2anios_auditiva_no").hide();
    $("select[name*='2anios_hipoacusia']").val("");
  };

  if( $("#2anios_cirugia_si").prop("checked") )
  {
    $("#sec_2anios_cirugia_si").show();
  };

  if( $("#2anios_cirugia_no").prop("checked") )
  {
    $("#sec_2anios_cirugia_si").hide();
    $("textarea[name*='2anios_cirugia_si_descripcion']").val("");
  };

  if( $("#2anios_lenguaje_si").prop("checked") )
  {
    $("#sec_2anios_lenguaje_si").show();
  };

  if( $("#2anios_lenguaje_no").prop("checked") )
  {
    $("#sec_2anios_lenguaje_si").hide();
    $("select[name*='2anios_lenguaje_si_tipo']").val("");
  };

  if( $("#0a24semanas_si").prop("checked") )
  {
    $("#sec_0a24semanas_si").show();
  };

  if( $("#0a24semanas_no").prop("checked") )
  {
    $("#sec_0a24semanas_si").hide();

    $("#eedp").removeProp("checked");
    $("#sec_eedp").hide();
    $("#sec_eedp_normal_si").hide();
    $("input[name*='fecha_eedp']").val("");      
    $("input[name*='eedp_edad_anios']").val("");
    $("input[name*='eedp_edad_meses']").val("");
    $("input[name*='eedp_puntaje']").val("");
    $("input[name*='eedp_normal']").removeProp("checked");
    $("textarea[name*='eedp_observacion']").val("");

    $("#eais").removeProp("checked");
    $("#sec_eais").hide();
    $("#sec_eais_normal_si").hide();
    $("input[name*='fecha_eais']").val("");      
    $("input[name*='eais_edad_anios']").val("");
    $("input[name*='eais_edad_meses']").val("");
    $("input[name*='eais_puntaje']").val("");
    $("input[name*='eais_normal']").removeProp("checked");
    $("textarea[name*='eais_observacion']").val("");

    $("#cat").removeProp("checked");
    $("#sec_cat").hide();
    $("#sec_cat_normal_si").hide();
    $("input[name*='fecha_cat']").val("");      
    $("input[name*='cat_edad_anios']").val("");
    $("input[name*='cat_edad_meses']").val("");
    $("input[name*='cat_puntaje']").val("");
    $("input[name*='cat_normal']").removeProp("checked");
    $("textarea[name*='cat_observacion']").val("");

    $("#asq").removeProp("checked");
    $("#sec_asq").hide();
    $("#sec_asq_normal_si").hide();
    $("input[name*='fecha_asq']").val("");      
    $("input[name*='asq_edad_anios']").val("");
    $("input[name*='asq_edad_meses']").val("");
    $("input[name*='asq_puntaje']").val("");
    $("input[name*='asq_normal']").removeProp("checked");
    $("textarea[name*='asq_observacion']").val("");
  };

  if( $("#eedp").prop("checked") )
  {
    $("#sec_eedp").show();
  }
  else
  {
    $("#sec_eedp").hide();
    $("#sec_eedp_normal_si").hide();
    $("input[name*='fecha_eedp']").val("");      
    $("input[name*='eedp_edad_anios']").val("");
    $("input[name*='eedp_edad_meses']").val("");
    $("input[name*='eedp_puntaje']").val("");
    $("input[name*='eedp_normal']").removeProp("checked");
    $("textarea[name*='eedp_observacion']").val("");
  };

  if( $("#eedp_normal_si").prop("checked") )
  {
    $("#sec_eedp_normal_si").show();
  };

  if( $("#eedp_normal_no").prop("checked") )
  {
    $("#sec_eedp_normal_si").hide();
    $("textarea[name*='eddp_observacion']").val("");
  };

  if( $("#eais").prop("checked") )
  {
    $("#sec_eais").show();
  }
  else
  {
    $("#sec_eais").hide();
    $("#sec_eais_normal_si").hide();
    $("input[name*='fecha_eais']").val("");      
    $("input[name*='eais_edad_anios']").val("");
    $("input[name*='eais_edad_meses']").val("");
    $("input[name*='eais_puntaje']").val("");
    $("input[name*='eais_normal']").removeProp("checked");
    $("textarea[name*='eais_observacion']").val("");
  };

  if( $("#eais_normal_si").prop("checked") )
  {
    $("#sec_eais_normal_si").show();
  };

  if( $("#eais_normal_no").prop("checked") )
  {
    $("#sec_eais_normal_si").hide();
    $("textarea[name*='eais_observacion']").val("");
  };

  if( $("#cat").prop("checked") )
  {
    $("#sec_cat").show();
  }
  else
  {
    $("#sec_cat").hide();
    $("#sec_cat_normal_si").hide();
    $("input[name*='fecha_cat']").val("");      
    $("input[name*='cat_edad_anios']").val("");
    $("input[name*='cat_edad_meses']").val("");
    $("input[name*='cat_puntaje']").val("");
    $("input[name*='cat_normal']").removeProp("checked");
    $("textarea[name*='cat_observacion']").val("");
  };

  if( $("#cat_normal_si").prop("checked") )
  {
    $("#sec_cat_normal_si").show();
  };

  if( $("#cat_normal_no").prop("checked") )
  {
    $("#sec_cat_normal_si").hide();
    $("textarea[name*='cat_observacion']").val("");
  };

  if( $("#asq").prop("checked") )
  {
    $("#sec_asq").show();
  }
  else
  {
    $("#sec_asq").hide();
    $("#sec_asq_normal_si").hide();
    $("input[name*='fecha_asq']").val("");      
    $("input[name*='asq_edad_anios']").val("");
    $("input[name*='asq_edad_meses']").val("");
    $("input[name*='asq_puntaje']").val("");
    $("input[name*='asq_normal']").removeProp("checked");
    $("textarea[name*='asq_observacion']").val("");
  };

  if( $("#asq_normal_si").prop("checked") )
  {
    $("#sec_asq_normal_si").show();
  };

  if( $("#asq_normal_no").prop("checked") )
  {
    $("#sec_asq_normal_si").hide();
    $("textarea[name*='asq_observacion']").val("");
  };

  if( $("#2a7anios_tepsi_si").prop("checked") )
  {
    $("#sec_2a7anios_tepsi_si").show();
  };

  if( $("#2a7anios_tepsi_no").prop("checked") )
  {
    $("#sec_2a7anios_tepsi_si").hide();
    $("input[name*='2a7anios_tepsi_normal']").removeProp("checked");
    $("input[name*='2a7anios_tepsi_fecha']").val("");
    $("input[name*='2a7anios_tepsi_edad_anios']").val("");
    $("input[name*='2a7anios_tepsi_edad_meses']").val("");
    $("input[name*='2a7anios_tepsi_puntaje']").val("");
  };

  if( $("#2a7anios_bayley_si").prop("checked") )
  {
    $("#sec_2a7anios_bayley_si").show();
  };

  if( $("#2a7anios_bayley_no").prop("checked") )
  {
    $("#sec_2a7anios_bayley_si").hide();
    $("#sec_2a7anios_bayley_version_2").hide();
    $("#sec_2a7anios_bayley_version_3").hide();

    $("input[name*='2a7anios_bayley_version']").removeProp("checked");
    $("input[name*='2a7anios_bayley_version_2_fecha']").val("");
    $("input[name*='2a7anios_bayley_version_2_edad_anios']").val("");
    $("input[name*='2a7anios_bayley_version_2_edad_meses']").val("");
    $("input[name*='2a7anios_bayley_version_2_mental']").val("");
    $("input[name*='2a7anios_bayley_version_2_motora']").val("");
    $("input[name*='2a7anios_bayley_version_2_conducta']").val("");
    $("input[name*='2a7anios_bayley_version_2_normal']").removeProp("checked");

    $("input[name*='2a7anios_bayley_version_3_fecha']").val("");
    $("input[name*='2a7anios_bayley_version_3_edad_anios']").val("");
    $("input[name*='2a7anios_bayley_version_3_edad_meses']").val("");
    $("input[name*='2a7anios_bayley_version_3_motora']").val("");
    $("input[name*='2a7anios_bayley_version_3_cognitiva']").val("");
    $("input[name*='2a7anios_bayley_version_3_lenguaje']").val("");
    $("input[name*='2a7anios_bayley_version_3_socio']").val("");
    $("input[name*='2a7anios_bayley_version_3_comportamiento']").val("");
    $("input[name*='2a7anios_bayley_version_3_normal']").removeProp("checked");
  };

  if( $("#2a7anios_bayley_version_2").prop("checked") )
  {
    $("#sec_2a7anios_bayley_version_2").show();
    $("#sec_2a7anios_bayley_version_3").hide();

    $("input[name*='2a7anios_bayley_version_3_fecha']").val("");
    $("input[name*='2a7anios_bayley_version_3_edad_anios']").val("");
    $("input[name*='2a7anios_bayley_version_3_edad_meses']").val("");
    $("input[name*='2a7anios_bayley_version_3_motora']").val("");
    $("input[name*='2a7anios_bayley_version_3_cognitiva']").val("");
    $("input[name*='2a7anios_bayley_version_3_lenguaje']").val("");
    $("input[name*='2a7anios_bayley_version_3_socio']").val("");
    $("input[name*='2a7anios_bayley_version_3_comportamiento']").val("");
    $("input[name*='2a7anios_bayley_version_3_normal']").removeProp("checked");
  };

  if( $("#2a7anios_bayley_version_3").prop("checked") )
  {
    $("#sec_2a7anios_bayley_version_2").hide();
    $("#sec_2a7anios_bayley_version_3").show();

    $("input[name*='2a7anios_bayley_version_2_fecha']").val("");
    $("input[name*='2a7anios_bayley_version_2_edad_anios']").val("");
    $("input[name*='2a7anios_bayley_version_2_edad_meses']").val("");
    $("input[name*='2a7anios_bayley_version_2_mental']").val("");
    $("input[name*='2a7anios_bayley_version_2_motora']").val("");
    $("input[name*='2a7anios_bayley_version_2_conducta']").val("");
    $("input[name*='2a7anios_bayley_version_2_normal']").removeProp("checked");
  };

  if( $("#retraso_lenguaje_si").prop("checked") )
  {
    $("#sec_retraso_lenguaje_si").show();
  };

  if( $("#retraso_lenguaje_no").prop("checked") )
  {
    $("#sec_retraso_lenguaje_si").hide();
    $("input[name*='retraso_lenguaje_tipo']").removeProp("checked");
    $("input[name*='retraso_lenguaje_rehab']").removeProp("checked");
  };

  if( $("#retraso_expresivo_si").prop("checked") )
  {
    $("#sec_retraso_expresivo_si").show();
  };

  if( $("#retraso_expresivo_no").prop("checked") )
  {
    $("#sec_retraso_expresivo_si").hide();
    $("input[name*='retraso_expresivo_rehab']").removeProp("checked");
  };     

  if( $("#coeficiente_si").prop("checked") )
  {
    $("#sec_coeficiente_si").show();
  };

  if( $("#coeficiente_no").prop("checked") )
  {
    $("#sec_coeficiente_si").hide();

    $("input[name*='coeficiente_fecha_1']").val("");
    $("input[name*='coeficiente_edad_anios_1']").val("");
    $("input[name*='coeficiente_edad_meses_1']").val("");
    $("input[name*='coeficiente_verbal_1']").val("");
    $("input[name*='coeficiente_manipulativa_1']").val("");
    $("input[name*='coeficiente_total_1']").val("");
  };

  if( $("#coeficiente_no").prop("checked") )
  {
    $("#sec_coeficiente_si").hide();

    $("input[name*='coeficiente_fecha_1']").val("");
    $("input[name*='coeficiente_edad_anios_1']").val("");
    $("input[name*='coeficiente_edad_meses_1']").val("");
    $("input[name*='coeficiente_verbal_1']").val("");
    $("input[name*='coeficiente_manipulativa_1']").val("");
    $("input[name*='coeficiente_total_1']").val("");

    $("input[name*='coeficiente_fecha_2']").val("");
    $("input[name*='coeficiente_edad_anios_2']").val("");
    $("input[name*='coeficiente_edad_meses_2']").val("");
    $("input[name*='coeficiente_verbal_2']").val("");
    $("input[name*='coeficiente_manipulativa_2']").val("");
    $("input[name*='coeficiente_procesamiento_2']").val("");
    $("input[name*='coeficiente_general_2']").val("");
  };

  if( $("#motora_guresa_si").prop("checked") )
  {
    $("#sec_motora_guresa_si").show();
  };

  if( $("#motora_guresa_no").prop("checked") )
  {
    $("#sec_motora_guresa_si").hide();
    $("select[name*='motora_guresa_nivel']").val("");
  };

  if( $("#paralisis_1").prop("checked") )
  {
    $("#sec_paralisis_1").show();
  };

  if( $("#paralisis_2").prop("checked") )
  {
    $("#sec_paralisis_1").hide();
    $("input[name*='paralisis_1']").removeProp("checked");
  };

  if( $("#paralisis_3").prop("checked") )
  {
    $("#sec_paralisis_1").hide();
    $("input[name*='paralisis_1']").removeProp("checked");
  };

  if( $("#paralisis_4").prop("checked") )
  {
    $("#sec_paralisis_1").hide();
    $("input[name*='paralisis_1']").removeProp("checked");
  };

  if( $("#paralisis_5").prop("checked") )
  {
    $("#sec_paralisis_1").hide();
    $("input[name*='paralisis_1']").removeProp("checked");
  };

  if( $("#opcionales_si").prop("checked") )
  {
    $("#sec_opcionales_si").show();
  };

  if( $("#opcionales_no").prop("checked") )
  {
    $("#sec_opcionales_si").hide();
    $("#sec_vacunas_opcionales_otras").hide();
    $("input[class*='vacunas_opcionales']").removeProp("checked");
    $("textarea[name*='vacunas_opcionales_otras_cuales']").val("");
  };

  if( $("#vacunas_opcionales_otras").prop("checked") )
  {
    $("#sec_vacunas_opcionales_otras").show();
  }
  else
  {
    $("#sec_vacunas_opcionales_otras").hide();
    $("textarea[name*='vacunas_opcionales_otras_cuales']").val("");
  };

  if( $("#fallece_si").prop("checked") )
  {
    $("#sec_fallece_si").show();
  };

  if( $("#fallece_no").prop("checked") )
  {
    $("#sec_fallece_si").hide();
    $("select[name*='fallece_si_lugar']").val("");
    $("input[name*='fecha_fallecimiento']").val("");
    $("input[name*='edad_fallecimiento_anios']").val("");
    $("input[name*='edad_fallecimiento_meses']").val("");
    $("textarea[name*='fallecimiento_observaciones']").val("");
  };

  if( $("#perdida_si").prop("checked") )
  {
    $("#sec_perdida_si").show();
  };

  if( $("#perdida_no").prop("checked") )
  {
    $("#sec_perdida_si").hide();
    $("select[name*='perdida_causa']").val("");
  };

});

</script>

</body>
</html>
