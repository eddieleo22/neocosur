jQuery(document).ready(function(){


	

// Mostrar/Ocultar Sub-formularios
// ===========================================

// Ocultar subformularios
// -------------------------------------------
	$(".sub-form").hide();


// Malformación
// -------------------------------------------
	$( "#malformacion_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".malformaciones").show();
    	}});
	$( "#malformacion_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".malformaciones").hide();
    		$("input[name*='malformaciones']").removeProp("checked");
    		$("textarea[name*='obs_malformaciones']").val("");
    	}});
	$( "#otros_conna" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{

    		$("#cual_otro_connas").show();
    	}
		else {
			$("#cual_otro_connas").hide();
			$("input[name*='cual_otro_conna']").val("");
		}
		
		});
	
	if( $( "#otros_conna" ).prop("checked") )
    	{
    		$(".cual_otro_connas").show();
    	}
		else {
			$("#cual_otro_connas").hide();
			$("input[name*='cual_otro_conna']").val("");
		}
		
	
	
    $("#sec_evolucion_posterior").hide();
// Ocultar subformularios
// -------------------------------------------
	$(".sub-form").hide();

    $("#sec_evolucion_posterior").hide();
    $("#sec_evaluacion_auditiva_normal_no").hide();
    $("#sec_digestivo").hide();
    $("#sec_renal").hide();
    $("#sec_neurologico").hide();

    $("#sec_2anios").hide();
    $("#sec_2anios_psicomotor").hide();
    $("#sec_2anios_psicomotor_antes").hide();
    $("#sec_2a7anios_psicomotor").hide();
    $("#sec_2anios_neurodesarrollo").hide();


// Secciones 
// -------------------------------------------
    $("#evolucion_posterior").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#funcion_auditiva").removeClass("active btn-success");
        $("#funcion_auditiva").addClass("btn-default");

        $("#sec_funcion_auditiva").fadeOut('fast');
        $("#sec_evolucion_posterior").fadeIn('slow');

    });

    $("#funcion_auditiva").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#evolucion_posterior").removeClass("active btn-success");
        $("#evolucion_posterior").addClass("btn-default");

        $("#sec_funcion_auditiva").fadeIn('slow');
        $("#sec_evolucion_posterior").fadeOut('fast');
    });

    $("#respiratorio").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#digestivo").removeClass("active btn-success");
        $("#digestivo").addClass("btn-default");

        $("#renal").removeClass("active btn-success");
        $("#renal").addClass("btn-default");

        $("#neurologico").removeClass("active btn-success");
        $("#neurologico").addClass("btn-default");

        $("#sec_respiratorio").fadeIn('slow');
        $("#sec_digestivo").fadeOut('fast');
        $("#sec_renal").fadeOut('fast');
        $("#sec_neurologico").fadeOut('fast');

    });

    $("#digestivo").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#respiratorio").removeClass("active btn-success");
        $("#respiratorio").addClass("btn-default");

        $("#renal").removeClass("active btn-success");
        $("#renal").addClass("btn-default");

        $("#neurologico").removeClass("active btn-success");
        $("#neurologico").addClass("btn-default");

        $("#sec_digestivo").fadeIn('slow');
        $("#sec_respiratorio").fadeOut('fast');
        $("#sec_renal").fadeOut('fast');
        $("#sec_neurologico").fadeOut('fast');
    });

    $("#renal").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#respiratorio").removeClass("active btn-success");
        $("#respiratorio").addClass("btn-default");

        $("#digestivo").removeClass("active btn-success");
        $("#digestivo").addClass("btn-default");

        $("#neurologico").removeClass("active btn-success");
        $("#neurologico").addClass("btn-default");

        $("#sec_renal").fadeIn('slow');
        $("#sec_respiratorio").fadeOut('fast');
        $("#sec_digestivo").fadeOut('fast');
        $("#sec_neurologico").fadeOut('fast');
    });

    $("#neurologico").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#respiratorio").removeClass("active btn-success");
        $("#respiratorio").addClass("btn-default");

        $("#digestivo").removeClass("active btn-success");
        $("#digestivo").addClass("btn-default");

        $("#renal").removeClass("active btn-success");
        $("#renal").addClass("btn-default");

        $("#sec_neurologico").fadeIn('slow');
        $("#sec_respiratorio").fadeOut('fast');
        $("#sec_digestivo").fadeOut('fast');
        $("#sec_renal").fadeOut('fast');
    });

    $("#40semanas").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#2anios").removeClass("active btn-success");
        $("#2anios").addClass("btn-default");

        $("#2anios_psicomotor").removeClass("active btn-success");
        $("#2anios_psicomotor").addClass("btn-default");

        $("#2anios_psicomotor_antes").removeClass("active btn-success");
        $("#2anios_psicomotor_antes").addClass("btn-default");

        $("#2a7anios_psicomotor").removeClass("active btn-success");
        $("#2a7anios_psicomotor").addClass("btn-default");

        $("#2anios_neurodesarrollo").removeClass("active btn-success");
        $("#2anios_neurodesarrollo").addClass("btn-default");

        $("#sec_40semanas").fadeIn('slow');
        $("#sec_2anios").fadeOut('fast');
        $("#sec_2anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_psicomotor_antes").fadeOut('fast');
        $("#sec_2a7anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_neurodesarrollo").fadeOut('fast');

    });

    $("#2anios").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#40semanas").removeClass("active btn-success");
        $("#40semanas").addClass("btn-default");

        $("#2anios_psicomotor").removeClass("active btn-success");
        $("#2anios_psicomotor").addClass("btn-default");

        $("#2anios_psicomotor_antes").removeClass("active btn-success");
        $("#2anios_psicomotor_antes").addClass("btn-default");

        $("#2a7anios_psicomotor").removeClass("active btn-success");
        $("#2a7anios_psicomotor").addClass("btn-default");

        $("#2anios_neurodesarrollo").removeClass("active btn-success");
        $("#2anios_neurodesarrollo").addClass("btn-default");

        $("#sec_40semanas").fadeOut('fast');
        $("#sec_2anios").fadeIn('slow');
        $("#sec_2anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_psicomotor_antes").fadeOut('fast');
        $("#sec_2a7anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_neurodesarrollo").fadeOut('fast');

    });

    $("#2anios_psicomotor").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#40semanas").removeClass("active btn-success");
        $("#40semanas").addClass("btn-default");

        $("#2anios").removeClass("active btn-success");
        $("#2anios").addClass("btn-default");

        $("#2anios_psicomotor_antes").removeClass("active btn-success");
        $("#2anios_psicomotor_antes").addClass("btn-default");

        $("#2a7anios_psicomotor").removeClass("active btn-success");
        $("#2a7anios_psicomotor").addClass("btn-default");

        $("#2anios_neurodesarrollo").removeClass("active btn-success");
        $("#2anios_neurodesarrollo").addClass("btn-default");

        $("#sec_40semanas").fadeOut('fast');
        $("#sec_2anios").fadeOut('fast');
        $("#sec_2anios_psicomotor").fadeIn('slow');
        $("#sec_2anios_psicomotor_antes").fadeOut('fast');
        $("#sec_2a7anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_neurodesarrollo").fadeOut('fast');

    });

    $("#2anios_psicomotor_antes").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#2anios").removeClass("active btn-success");
        $("#2anios").addClass("btn-default");

        $("#2anios_psicomotor").removeClass("active btn-success");
        $("#2anios_psicomotor").addClass("btn-default");

        $("#40semanas").removeClass("active btn-success");
        $("#40semanas").addClass("btn-default");

        $("#2a7anios_psicomotor").removeClass("active btn-success");
        $("#2a7anios_psicomotor").addClass("btn-default");

        $("#2anios_neurodesarrollo").removeClass("active btn-success");
        $("#2anios_neurodesarrollo").addClass("btn-default");

        $("#sec_2anios_psicomotor_antes").fadeIn('slow');
        $("#sec_2anios").fadeOut('fast');
        $("#sec_2anios_psicomotor").fadeOut('fast');
        $("#sec_40semanas").fadeOut('fast');
        $("#sec_2a7anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_neurodesarrollo").fadeOut('fast');

    });

    $("#2a7anios_psicomotor").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#2anios").removeClass("active btn-success");
        $("#2anios").addClass("btn-default");

        $("#2anios_psicomotor").removeClass("active btn-success");
        $("#2anios_psicomotor").addClass("btn-default");

        $("#2anios_psicomotor_antes").removeClass("active btn-success");
        $("#2anios_psicomotor_antes").addClass("btn-default");

        $("#40semanas").removeClass("active btn-success");
        $("#40semanas").addClass("btn-default");

        $("#2anios_neurodesarrollo").removeClass("active btn-success");
        $("#2anios_neurodesarrollo").addClass("btn-default");

        $("#sec_2a7anios_psicomotor").fadeIn('slow');
        $("#sec_2anios").fadeOut('fast');
        $("#sec_2anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_psicomotor_antes").fadeOut('fast');
        $("#sec_40semanas").fadeOut('fast');
        $("#sec_2anios_neurodesarrollo").fadeOut('fast');

    });

    $("#2anios_neurodesarrollo").click(function()
    {
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#2anios").removeClass("active btn-success");
        $("#2anios").addClass("btn-default");

        $("#2anios_psicomotor").removeClass("active btn-success");
        $("#2anios_psicomotor").addClass("btn-default");

        $("#2anios_psicomotor_antes").removeClass("active btn-success");
        $("#2anios_psicomotor_antes").addClass("btn-default");

        $("#2a7anios_psicomotor").removeClass("active btn-success");
        $("#2a7anios_psicomotor").addClass("btn-default");

        $("#40semanas").removeClass("active btn-success");
        $("#40semanas").addClass("btn-default");

        $("#sec_2anios_neurodesarrollo").fadeIn('slow');
        $("#sec_2anios").fadeOut('fast');
        $("#sec_2anios_psicomotor").fadeOut('fast');
        $("#sec_2anios_psicomotor_antes").fadeOut('fast');
        $("#sec_2a7anios_psicomotor").fadeOut('fast');
        $("#sec_40semanas").fadeOut('fast');

    });


// Función Auditiva - Pesquisa antes del alta
// -------------------------------------------

    $("#pesquisa_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
    	{
            $("#sec_pesquisa_si").show();
            $("#pesquisa_alta_1, #pesquisa_alta_2, #pesquisa_alta_3").hide();
        }
    });

    $("#pesquisa_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
    	{
            $("input[name*='pesquisa_alta_1']").removeProp("checked");
            $("input[name*='pesquisa_alta_2']").removeProp("checked");
            $("input[name*='pesquisa_alta_3']").removeProp("checked");

            $("#check_pesquisa_alta_1,#check_pesquisa_alta_2, #check_pesquisa_alta_3").removeProp("checked");

            $("#pesquisa_alta_1, #pesquisa_alta_2, #pesquisa_alta_3").hide();
            $("#sec_pesquisa_si").hide();
        }
    });


    $("#check_pesquisa_alta_1").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
    	{
            $("#pesquisa_alta_1").show();
    	}
        else
        {
            $("#pesquisa_alta_1").hide();
            $("input[name*='pesquisa_alta_1']").removeProp("checked");

		}
    });

    $("#check_pesquisa_alta_2").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#pesquisa_alta_2").show();
        }
        else
        {
            $("#pesquisa_alta_2").hide();
            $("input[name*='pesquisa_alta_2']").removeProp("checked");

        }
    });

    $("#check_pesquisa_alta_3").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#pesquisa_alta_3").show();
        }
        else
        {
            $("#pesquisa_alta_3").hide();
            $("input[name*='pesquisa_alta_3']").removeProp("checked");

        }
    });

// FunciÃ³n Auditiva - EvaluciÃ³n Auditiva
// -------------------------------------------

    $("#evaluacion_auditiva_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_evaluacion_auditiva_si").show();
        }
    });

    $("#evaluacion_auditiva_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
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
        }
    });

    $("#evaluacion_auditiva_normal_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_evaluacion_auditiva_normal_no").show();
        }
    });

    $("#evaluacion_auditiva_normal_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_evaluacion_auditiva_normal_no").hide();
        }
    });

    $("#audiometria_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_audiometria_si").show();
        }
    });

    $("#audiometria_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_audiometria_si").hide();
            $("input[name*='audiometria_normal']").removeProp("checked");
        }
    });

    $("#peat_automatizados_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_peat_automatizados_si").show();
        }
    });

    $("#peat_automatizados_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_peat_automatizados_si").hide();
            $("input[name*='peat_automatizados_normal']").removeProp("checked");
        }
    });

    $("#peat_extendidos_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_peat_extendidos_si").show();
        }
    });

    $("#peat_extendidos_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_peat_extendidos_si").hide();
            $("input[name*='peat_extendidos_normal']").removeProp("checked");
        }
    });

    $("#hipoacusia_izquierdo").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_izquierdo").show();
        }
    });

    $("#normal_izquierdo").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_izquierdo").hide();
            $("select[name*='grado_izquierdo']").val("0");
        }
    });

    $("#hipoacusia_derecho").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_derecho").show();
        }
    });

    $("#normal_derecho").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_derecho").hide();
            $("select[name*='grado_derecho']").val("0");
        }
    });

// FunciÃ³n Auditiva - ConfirmaciÃ³n de diagnÃ³stico Oido Izquierdo
// --------------------------------------------------------------
    $("#confirmacion_diagnostico_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_confirmacion_diagnostico_si").show();
        }
    });

    $("#confirmacion_diagnostico_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
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
        }
    });

    $("#hipoacusia_izquierdo_confirmacion").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_izquierdo_confirmacion").show();
        }
    });

    $("#normal_izquierdo_confirmacion").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
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

        }
    });

    $("#tratamiento_izquierdo_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_tratamiento_izquierdo_si").show();
        }
    });

    $("#tratamiento_izquierdo_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_tratamiento_izquierdo_si").hide();
            $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();

            $("input[name*='cual_izquierdo']").removeProp("checked");
            $("input[name*='terapia_auditiva_izquierdo_confirmacion']").removeProp("checked");
            $("input[name*='cual_terapia_izquierda']").removeProp("checked");
        }
    });

    $("#terapia_auditiva_izquierdo_confirmacion_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_terapia_auditiva_izquierdo_confirmacion_si").show();
        }
    });

    $("#terapia_auditiva_izquierdo_confirmacion_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("input[name*='cual_terapia_izquierda']").removeProp("checked");
            $("#sec_terapia_auditiva_izquierdo_confirmacion_si").hide();
        }
    });


// FunciÃ³n Auditiva - ConfirmaciÃ³n de diagnÃ³stico Oido Derecho
// --------------------------------------------------------------

    $("#normal_derecho_confirmacion").click(function(){
        var $input = $(this);
        if($input.prop("checked"))
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
        }
    });

    $("#hipoacusia_derecho_confirmacion").click(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_hipoacusia_derecho_confirmacion").show();
        }
    });

    $("#tratamiento_derecho_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_tratamiento_derecho_si").show();
        }
    });

    $("#tratamiento_derecho_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_tratamiento_derecho_si").hide();
            $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();

            $("input[name*='cual_derecho']").removeProp("checked");
            $("input[name*='terapia_auditiva_derecho_confirmacion']").removeProp("checked");
            $("input[name*='cual_terapia_derecho']").removeProp("checked");;
        }
    });

    $("#terapia_auditiva_derecho_confirmacion_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_terapia_auditiva_derecho_confirmacion_si").show();
        }
    });

    $("#terapia_auditiva_derecho_confirmacion_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("input[name*='cual_terapia_derecho']").removeProp("checked");
            $("#sec_terapia_auditiva_derecho_confirmacion_si").hide();
        }
    });



// FunciÃ³n Visual
// --------------------------------------------------------------

    $("#evaluacion_posterior_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_evaluacion_posterior_si").show();
        }
    });

     $("#evaluacion_posterior_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
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
            

        }
    });

     $("#cirugia_izquierdo_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_izquierdo_si").show();
        }
     });

     $("#cirugia_izquierdo_no, #cirugia_izquierdo_s_i").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_izquierdo_si").hide();
            $("select[name*='cual_izquierdo']").val("0");
        }
     });

     $("#cirugia_derecho_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_derecho_si").show();
        }
     });

     $("#cirugia_derecho_no, #cirugia_derecho_s_i").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_derecho_si").hide();
            $("select[name*='cual_derecho']").val("0");
        }
     });

     $("#instancia_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_instancia_si").show();
        }
     });

     $("#instancia_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_instancia_si").hide();
            $("#sec_oftalmologica_no").hide();
            $("#sec_cirugia_izquierdo_diagnostico_si").hide();
            $("#sec_cirugia_derecho_diagnostico_si").hide();

            $("input[name*='oftalmologica']").removeProp("checked");

            $("select[name*='cual_izquierdo_rop']").val("0");
            $("select[name*='cual_derecho_rop']").val("0");

            $("input[name*='cirugia_izquierdo_diagnostico']").removeProp("checked");
            $("input[name*='rop_izquierdo_diagnostico']").removeProp("checked");

            $("input[name*='cirugia_derecho_diagnostico']").removeProp("checked");
            $("input[name*='rop_derecho_diagnostico']").removeProp("checked");
        }
     });

     $("#oftalmologica_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_oftalmologica_no").show();
        }
     });

     $("#oftalmologica_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_oftalmologica_no").hide();
            $("#sec_cirugia_izquierdo_diagnostico_si").hide();
            $("#sec_cirugia_derecho_diagnostico_si").hide();

            $("select[name*='cual_izquierdo_rop']").val("0");
            $("select[name*='cual_derecho_rop']").val("0");

            $("input[name*='cirugia_izquierdo_diagnostico']").removeProp("checked");
            $("input[name*='rop_izquierdo_diagnostico']").removeProp("checked");

            $("input[name*='cirugia_derecho_diagnostico']").removeProp("checked");
            $("input[name*='rop_derecho_diagnostico']").removeProp("checked");
        }
     });

     $("#cirugia_izquierdo_diagnostico_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_izquierdo_diagnostico_si").show();
        }
     });

     $("#cirugia_izquierdo_diagnostico_no, #cirugia_izquierdo_diagnostico_s_i").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_izquierdo_diagnostico_si").hide();

            $("select[name*='cual_izquierdo_rop']").val("0");
        }
     });

     $("#cirugia_derecho_diagnostico_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_derecho_diagnostico_si").show();
        }
     });

    $("#cirugia_derecho_diagnostico_no, #cirugia_derecho_diagnostico_s_i").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cirugia_derecho_diagnostico_si").hide();
            $("select[name*='cual_derecho_rop']").val("0");
        }
    });

    $("#requiere_cirugia_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_requiere_cirugia_si").show();
        }
    });

    $("#requiere_cirugia_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_requiere_cirugia_si").hide();

            $("textarea[name*='observaciones']").val("");
            $("select[name*='requiere_cirugia_cual']").val("0");
        }
    });


// Respiratorio
// -------------------------------------------

    $("#diureticos_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_diureticos_si").show();
        }
    });

    $("#diureticos_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_diureticos_si").hide();
            $("input[name*='fecha_suspension'], input[name*='fecha_inicio']").val("");
        }
    });


// Digestivo
// -------------------------------------------

    $("#ostomia_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_ostomia_si").show();
        }
    });

    $("#ostomia_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_ostomia_si").hide();
            $("#sec_reconstitucion_si").hide();

            $("select[name*='ostomia_cual']").val("0");
            $("input[name*='reconstitucion']").removeProp("checked");
            $("input[name*='fecha_reconstitucion']").val("");
        }
    });

    $("#reconstitucion_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_reconstitucion_si").show();
        }
    });

    $("#reconstitucion_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_reconstitucion_si").hide();

            $("input[name*='fecha_reconstitucion']").val("");
        }
    });


// Renal
// -------------------------------------------

    $("#profilaxis_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_profilaxis_si").show();
        }
    });

    $("#profilaxis_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_profilaxis_si").hide();

            $("input[name*='fecha_inicio_profilaxis'], input[name*='fecha_suspension_profilaxis']").val("");
        }
    });


    $("#imagenes_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_imagenes_si").show();
        }
    });

    $("#imagenes_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
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
        }
    });

    $("#eco_renal").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_eco_renal").show();
        }
        else
        {
            $("#sec_eco_renal").hide();
            $("input[name*='eco_renal_alteracion']").removeProp("checked");
            $("textarea[name*='describa_eco_renal']").val("");
        }
    });

    $("#cintigrafia").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_cintigrafia").show();
        }
        else
        {
            $("#sec_cintigrafia").hide();
            $("input[name*='cintigrafia_alteracion']").removeProp("checked");
            $("textarea[name*='describa_cintigrafia']").val("");
        }
    });

    $("#uretrocistografia").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_uretrocistografia").show();
        }
        else
        {
            $("#sec_uretrocistografia").hide();
            $("input[name*='uretrocistografia_alteracion']").removeProp("checked");
            $("textarea[name*='describa_uretrocistografia']").val("");
        }
    });

    $("#presion_si").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_presion_si").show();
        }
    });

    $("#presion_no").change(function(){
        var $input = $(this);
        if($input.prop("checked"))
        {
            $("#sec_presion_si").hide();
            $("input[name*='alteracion']").removeProp("checked");
        }
    });



// NeurolÃ³gica
// --------------------------------------------------------------

    $("#hic_si").change(function(){
        if( $("#hic_si").prop("checked") )
        {
            $("#sec_hic_si").show();
        }
    });

    $("#hic_no").change(function(){
        if( $("#hic_no").prop("checked") )
        {
            $("#sec_hic_si").hide();
            $("select[name*='hic_grado']").val("0");
        }
    });

    $("#hic_s_i").change(function(){
        if( $("#hic_s_i").prop("checked") )
        {
            $("#sec_hic_si").hide();
            $("select[name*='hic_grado']").val("0");
        }
    });

    $("#hidrocefalia_si").change(function(){
        if( $("#hidrocefalia_si").prop("checked") )
        {
            $("#sec_hidrocefalia_si").show();
        }
    });

    $("#hidrocefalia_no").change(function(){
        if( $("#hidrocefalia_no").prop("checked") )
        {
            $("#sec_hidrocefalia_si").hide();
            $("input[name*='valvula']").removeProp("checked");
        }
    });

    $("#convulsiones_si").change(function(){
        if( $("#convulsiones_si").prop("checked") )
        {
            $("#sec_convulsiones_si").show();
        }
    });

    $("#convulsiones_no").change(function(){
        if( $("#convulsiones_no").prop("checked") )
        {
            $("#sec_convulsiones_si").hide();
            $("input[name*='tratamiento']").removeProp("checked");
            $("input[name*='fecha_tratamiento']").val("");
        }
    });


// EvaluaciÃ³n del Neurodesarrollo
// --------------------------------------------------------------

    $("#hic_40semanas_si").change(function(){
        if( $("#hic_40semanas_si").prop("checked") )
        {
            $("#sec_hic_40semanas_si").show();
        }
    });

    $("#hic_40semanas_no").change(function(){
        if( $("#hic_40semanas_no").prop("checked") )
        {
            $("#sec_hic_40semanas_si").hide();
            $("select[name*='hic_40semanas_grado']").val("");
        }
    });

    $("#rop_40semanas_si").change(function(){
        if( $("#rop_40semanas_si").prop("checked") )
        {
            $("#sec_rop_40semanas_si").show();
        }
    });

    $("#rop_40semanas_no").change(function(){
        if( $("#rop_40semanas_no").prop("checked") )
        {
            $("#sec_rop_40semanas_si").hide();
            $("select[name*='rop_40semanas_grado']").val("");
        }
    });

    $("#2anios_vision_no").change(function(){
        if( $("#2anios_vision_no").prop("checked") )
        {
            $("#sec_2anios_vision_no").show();
        }
    });

    $("#2anios_vision_si").change(function(){
        if( $("#2anios_vision_si").prop("checked") )
        {
            $("#sec_2anios_vision_no").hide();
            $("input[class*='vision_normal_no']").removeProp("checked");
        }
    });


    $("#2anios_audiocion_no").change(function(){
        if( $("#2anios_audiocion_no").prop("checked") )
        {
            $("#sec_2anios_audiocion_no").show();
        }
    });

    $("#2anios_audiocion_si").change(function(){
        if( $("#2anios_audiocion_si").prop("checked") )
        {
            $("#sec_2anios_audiocion_no").hide();
            $("input[name*='audiocion_neurologo_2anios_no']").removeProp("checked");
        }
    });
	if( $("#2anios_audiocion_si").prop("checked") )
        {
            $("#sec_2anios_audiocion_no").hide();
            $("input[name*='audiocion_neurologo_2anios_no']").removeProp("checked");
        }
		
    $("#2anios_paralisis_si").change(function(){
        if( $("#2anios_paralisis_si").prop("checked") )
        {
            $("#sec_2anios_paralisis_si").show();
        }
    });

    $("#2anios_paralisis_no").change(function(){
        if( $("#2anios_paralisis_no").prop("checked") )
        {
            $("#sec_2anios_paralisis_si").hide();
            $("input[name*='2anios_paralisis_si']").removeProp("checked");
            $("input[name*='paralisis_neurologo_2anios_si']").removeProp("checked");
        }
    });
	if( $("#2anios_paralisis_no").prop("checked") )
        {
            $("#sec_2anios_paralisis_si").hide();
            $("input[name*='2anios_paralisis_si']").removeProp("checked");
            $("input[name*='paralisis_neurologo_2anios_si']").removeProp("checked");
        }

    $("#2anios_otros_si").change(function(){
        if( $("#2anios_otros_si").prop("checked") )
        {
            $("#sec_2anios_otros_si").show();
        }
    });

    $("#2anios_otros_no").change(function(){
        if( $("#2anios_otros_no").prop("checked") )
        {
            $("#sec_2anios_otros_si").hide();
            $("input[class*='2anios_otros_si']").removeProp("checked");
        }
    });

    $("#2anios_psicomotor_examen_no").change(function(){
        if( $("#2anios_psicomotor_examen_no").prop("checked") )
        {
            $("#sec_2anios_psicomotor_examen_no").show();
        }
    });

    $("#2anios_psicomotor_examen_si").change(function(){
        if( $("#2anios_psicomotor_examen_si").prop("checked") )
        {
            $("#sec_2anios_psicomotor_examen_no").hide();
            $("#sec_2anios_auditiva_no").hide();
            $("#sec_2anios_cirugia_si").hide();
            $("#sec_2anios_lenguaje_si").hide();
			
			$("input[class*='motora_psicomotor_2anios']").removeProp("checked");
            
            $("input[name*='auditiva']").removeProp("checked");
            $("select[name*='2anios_hipoacusia']").val("");
            $("input[name*='visual']").removeProp("checked");
            $("input[name*='cirugia']").removeProp("checked");
            $("textarea[name*='2anios_cirugia_si_descripcion']").val("");
            $("input[name*='2anios_lenguaje']").removeProp("checked");
            $("select[name*='2anios_lenguaje_si_tipo']").val("");
            $("input[name*='2anios_cefalia']").removeProp("checked");
            $("input[class*='2anios_otros']").removeProp("checked");
            $("input[name*='2anios_neurorehabilitaciÃ³n']").removeProp("checked");
            $("input[name*='lenguaje_retra_2anios']").removeProp("checked");
            $("input[name*='neurorehabilitacion_2anios']").removeProp("checked");
        }
    });
	
	
	if( $("#2anios_psicomotor_examen_si").prop("checked") )
        {
            $("#sec_2anios_psicomotor_examen_no").hide();
            $("#sec_2anios_auditiva_no").hide();
            $("#sec_2anios_cirugia_si").hide();
            $("#sec_2anios_lenguaje_si").hide();
			
			$("input[class*='motora_psicomotor_2anios']").removeProp("checked");
            
            $("input[name*='auditiva']").removeProp("checked");
            $("select[name*='2anios_hipoacusia']").val("");
            $("input[name*='visual']").removeProp("checked");
            $("input[name*='cirugia']").removeProp("checked");
            $("textarea[name*='2anios_cirugia_si_descripcion']").val("");
            $("input[name*='2anios_lenguaje']").removeProp("checked");
            $("select[name*='2anios_lenguaje_si_tipo']").val("");
            $("input[name*='2anios_cefalia']").removeProp("checked");
            $("input[class*='2anios_otros']").removeProp("checked");
            $("input[name*='2anios_neurorehabilitaciÃ³n']").removeProp("checked");
            $("input[name*='lenguaje_retra_2anios']").removeProp("checked");
            $("input[name*='neurorehabilitacion_2anios']").removeProp("checked");
        }

    $("#2anios_auditiva_no").change(function(){
        if( $("#2anios_auditiva_no").prop("checked") )
        {
            $("#sec_2anios_auditiva_no").show();
        }
    });

    $("#2anios_auditiva_si").change(function(){
        if( $("#2anios_auditiva_si").prop("checked") )
        {
            $("#sec_2anios_auditiva_no").hide();
            $("select[name*='2anios_hipoacusia']").val("");
        }
    });

    $("#2anios_cirugia_si").change(function(){
        if( $("#2anios_cirugia_si").prop("checked") )
        {
            $("#sec_2anios_cirugia_si").show();
        }
    });

    $("#2anios_cirugia_no").change(function(){
        if( $("#2anios_cirugia_no").prop("checked") )
        {
            $("#sec_2anios_cirugia_si").hide();
            $("textarea[name*='2anios_cirugia_si_descripcion']").val("");
        }
    });

    $("#2anios_lenguaje_si").change(function(){
        if( $("#2anios_lenguaje_si").prop("checked") )
        {
            $("#sec_2anios_lenguaje_si").show();
        }
    });

    $("#2anios_lenguaje_no").change(function(){
        if( $("#2anios_lenguaje_no").prop("checked") )
        {
            $("#sec_2anios_lenguaje_si").hide();
            $("select[name*='2anios_lenguaje_si_tipo']").val("");
        }
    });



    $("#0a24semanas_si").change(function(){
        if( $("#0a24semanas_si").prop("checked") )
        {
            $("#sec_0a24semanas_si").show();
        }
    });

    $("#0a24semanas_no").change(function(){
        if( $("#0a24semanas_no").prop("checked") )
        {
            $("#sec_0a24semanas_si").hide();

            $("#eedp").removeProp("checked"); 			
			$("#sec_eedp").hide();
            $("#sec_eedp_normal_si").hide();
            $("input[name*='fech_eedp_a2a']").val("");      
            $("input[name*='anios_eedp_a2a']").val("");
            $("input[name*='meses_eedp_a2a']").val("");
            $("input[name*='puntaje_eedp_a2a']").val("");
            $("input[name*='normal_eedp_a2a']").removeProp("checked");
            $("textarea[name*='observacion_eedp_a2a']").val("");
		
		

            $("#eais").removeProp("checked");
            $("#sec_eais").hide();
            $("#sec_eais_normal_si").hide();
            $("input[name*='fech_eais']").val("");      
            $("input[name*='anios_eais']").val("");
            $("input[name*='meses_eais']").val("");
            $("input[name*='puntaje_eais']").val("");
            $("input[name*='normal_eais_a2a']").removeProp("checked");
            $("textarea[name*='observacion_eais_a2a']").val("");

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
            $("input[name*='fech_asq_a2a']").val("");      
            $("input[name*='anios_asq_a2a']").val("");
            $("input[name*='meses_asq_a2a']").val("");
            $("input[name*='puntaje_asq_a2a']").val("");
            $("input[name*='normal_asq_a2a']").removeProp("checked");
            $("textarea[name*='observacion_asq_a2a']").val("");

        }
    });

    $("#eedp").change(function(){
        if( $("#eedp").prop("checked") )
        {
            $("#sec_eedp").show();
        }
        else
        {
            $("#sec_eedp").hide();
            $("#sec_eedp_normal_si").hide();
            $("input[name*='fech_eedp_a2a']").val("");      
            $("input[name*='anios_eedp_a2a']").val("");
            $("input[name*='meses_eedp_a2a']").val("");
            $("input[name*='puntaje_eedp_a2a']").val("");
            $("input[name*='normal_eedp_a2a']").removeProp("checked");
            $("textarea[name*='observacion_eedp_a2a']").val("");
        }
    });

    $("#eedp_normal_si").change(function(){
        if( $("#eedp_normal_si").prop("checked") )
        {
            $("#sec_eedp_normal_si").show();
        }
    });

    $("#eedp_normal_no").change(function(){
        if( $("#eedp_normal_no").prop("checked") )
        {
            $("#sec_eedp_normal_si").hide();
            $("textarea[name*='eddp_observacion']").val("");
        }
    });

     $("#eais").change(function(){
        if( $("#eais").prop("checked") )
        {
            $("#sec_eais").show();
        }
        else
        {
			
			$("#sec_eais").hide();
            $("#sec_eais_normal_si").hide();
            $("input[name*='fech_eais']").val("");      
            $("input[name*='anios_eais']").val("");
            $("input[name*='meses_eais']").val("");
            $("input[name*='puntaje_eais']").val("");
            $("input[name*='normal_eais_a2a']").removeProp("checked");
            $("textarea[name*='observacion_eais_a2a']").val("");
			/*
            $("#sec_eais").hide();
            $("#sec_eais_normal_si").hide();
            $("input[name*='fecha_eais']").val("");      
            $("input[name*='eais_edad_anios']").val("");
            $("input[name*='eais_edad_meses']").val("");
            $("input[name*='eais_puntaje']").val("");
            $("input[name*='eais_normal']").removeProp("checked");
            $("textarea[name*='eais_observacion']").val("");*/
        }
    });

    $("#eais_normal_si").change(function(){
        if( $("#eais_normal_si").prop("checked") )
        {
            $("#sec_eais_normal_si").show();
        }
    });

    $("#eais_normal_no").change(function(){
        if( $("#eais_normal_no").prop("checked") )
        {
            $("#sec_eais_normal_si").hide();
            $("textarea[name*='eais_observacion']").val("");
        }
    });

    $("#cat").change(function(){
        if( $("#cat").prop("checked") )
        {
            $("#sec_cat").show();
        }
        else
        {
            $("#sec_cat").hide();
            $("#sec_cat_normal_si").hide();
            $("input[name*='fech_cat_a2a']").val("");      
            $("input[name*='anios_cat_a2a']").val("");
            $("input[name*='meses_cat_a2a']").val("");
            $("input[name*='puntaje_cat_a2a']").val("");
            $("input[name*='normal_cat_a2a']").removeProp("checked");
            $("textarea[name*='observacion_cat_a2a']").val("");
        }
    });

    $("#cat_normal_si").change(function(){
        if( $("#cat_normal_si").prop("checked") )
        {
            $("#sec_cat_normal_si").show();
        }
    });

    $("#cat_normal_no").change(function(){
        if( $("#cat_normal_no").prop("checked") )
        {
            $("#sec_cat_normal_si").hide();
            $("textarea[name*='observacion_cat_a2a']").val("");
        }
    });

    $("#asq").change(function(){
        if( $("#asq").prop("checked") )
        {
            $("#sec_asq").show();
        }
        else
        {
            $("#sec_asq").hide();
            $("#sec_asq_normal_si").hide();
            $("input[name*='fech_asq_a2a']").val("");      
            $("input[name*='anios_asq_a2a']").val("");
            $("input[name*='meses_asq_a2a']").val("");
            $("input[name*='puntaje_asq_a2a']").val("");
            $("input[name*='normal_asq_a2a']").removeProp("checked");
            $("textarea[name*='observacion_asq_a2a']").val("");
        }
    });

    $("#asq_normal_si").change(function(){
        if( $("#asq_normal_si").prop("checked") )
        {
            $("#sec_asq_normal_si").show();
        }
    });

    $("#asq_normal_no").change(function(){
        if( $("#asq_normal_no").prop("checked") )
        {
            $("#sec_asq_normal_si").hide();
            $("textarea[name*='observacion_asq_a2a']").val("");
        }
    });

    $("#2a7anios_tepsi_si").change(function(){
        if( $("#2a7anios_tepsi_si").prop("checked") )
        {
            $("#sec_2a7anios_tepsi_si").show();
        }
    });

    $("#2a7anios_tepsi_no").change(function(){
        if( $("#2a7anios_tepsi_no").prop("checked") )
        {
            $("#sec_2a7anios_tepsi_si").hide();
            $("input[name*='2a7anios_tepsi_normal']").removeProp("checked");
            $("input[name*='2a7anios_tepsi_fecha']").val("");
            $("input[name*='2a7anios_tepsi_edad_anios']").val("");
            $("input[name*='2a7anios_tepsi_edad_meses']").val("");
            $("input[name*='2a7anios_tepsi_puntaje']").val("");
        }
    });

    $("#2a7anios_bayley_si").change(function(){
        if( $("#2a7anios_bayley_si").prop("checked") )
        {
            $("#sec_2a7anios_bayley_si").show();
        }
    });

    $("#2a7anios_bayley_no").change(function(){
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
        }
    });

    $("#2a7anios_bayley_version_2").change(function(){
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
        }
    });

    $("#2a7anios_bayley_version_3").change(function(){
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
        }
    });

    $("#retraso_lenguaje_si").change(function(){
        if( $("#retraso_lenguaje_si").prop("checked") )
        {
            $("#sec_retraso_lenguaje_si").show();
        }
    });

    $("#retraso_lenguaje_no").change(function(){
        if( $("#retraso_lenguaje_no").prop("checked") )
        {
            $("#sec_retraso_lenguaje_si").hide();
            $("input[name*='retraso_lenguaje_tipo']").removeProp("checked");
            $("input[name*='retraso_lenguaje_rehab']").removeProp("checked");
        }
    });

    $("#retraso_expresivo_si").change(function(){
        if( $("#retraso_expresivo_si").prop("checked") )
        {
            $("#sec_retraso_expresivo_si").show();
        }
    });

    $("#retraso_expresivo_no").change(function(){
        if( $("#retraso_expresivo_no").prop("checked") )
        {
            $("#sec_retraso_expresivo_si").hide();
            $("input[name*='retraso_expresivo_rehab']").removeProp("checked");
        }
    });

    $("#coeficiente_si").change(function(){
        if( $("#coeficiente_si").prop("checked") )
        {
            $("#sec_coeficiente_si").show();
        }
    });

    $("#coeficiente_no").change(function(){
        if( $("#coeficiente_no").prop("checked") )
        {
            $("#sec_coeficiente_si").hide();

            $("input[name*='coeficiente_fecha_1']").val("");
            $("input[name*='coeficiente_edad_anios_1']").val("");
            $("input[name*='coeficiente_edad_meses_1']").val("");
            $("input[name*='coeficiente_verbal_1']").val("");
            $("input[name*='coeficiente_manipulativa_1']").val("");
            $("input[name*='coeficiente_total_1']").val("");

        }
    });


    $("#coeficiente_no").change(function(){
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

        }
    });

    $("#motora_guresa_si").change(function(){
        if( $("#motora_guresa_si").prop("checked") )
        {
            $("#sec_motora_guresa_si").show();
        }
    });

    $("#motora_guresa_no").change(function(){
        if( $("#motora_guresa_no").prop("checked") )
        {
            $("#sec_motora_guresa_si").hide();
            $("select[name*='motora_guresa_nivel']").val("");
        }
    });

    $("#paralisis_1").change(function(){
        if( $("#paralisis_1").prop("checked") )
        {
            $("#sec_paralisis_1").show();
        }
    });
	

    $("#paralisis_2").change(function(){
        if( $("#paralisis_2").prop("checked") )
        {
            $("#sec_paralisis_1").hide();
            $("input[name*='paralisis_1']").removeProp("checked");
            $("input[name*='paralisis_cual_neurodesarollo_2anios']").removeProp("checked");
			
        }
    });

    $("#paralisis_3").change(function(){
        if( $("#paralisis_3").prop("checked") )
        {
            $("#sec_paralisis_1").hide();
            $("input[name*='paralisis_1']").removeProp("checked");
			$("input[name*='paralisis_cual_neurodesarollo_2anios']").removeProp("checked");
        }
    });

    $("#paralisis_4").change(function(){
        if( $("#paralisis_4").prop("checked") )
        {
            $("#sec_paralisis_1").hide();
            $("input[name*='paralisis_1']").removeProp("checked");
			$("input[name*='paralisis_cual_neurodesarollo_2anios']").removeProp("checked");
        }
    });

    $("#paralisis_5").change(function(){
        if( $("#paralisis_5").prop("checked") )
        {
            $("#sec_paralisis_1").hide();
            $("input[name*='paralisis_1']").removeProp("checked");
			$("input[name*='paralisis_cual_neurodesarollo_2anios']").removeProp("checked");
        }
    });



// Vacunas
// --------------------------------------------------------------

    $("#opcionales_si").change(function(){
        if( $("#opcionales_si").prop("checked") )
        {
            $("#sec_opcionales_si").show();
        }
    });

    $("#opcionales_no").change(function(){
        if( $("#opcionales_no").prop("checked") )
        {
            $("#sec_opcionales_si").hide();
            $("#sec_vacunas_opcionales_otras").hide();
            $("input[class*='vacunas_opcionales']").removeProp("checked");
            $("textarea[name*='vacunas_opcionales_otras_cuales']").val("");
        }
    });


    $("#vacunas_opcionales_otras").change(function(){
        if( $("#vacunas_opcionales_otras").prop("checked") )
        {
            $("#sec_vacunas_opcionales_otras").show();
        }
        else
        {
            $("#sec_vacunas_opcionales_otras").hide();
            $("textarea[name*='vacunas_opcionales_otras_cuales']").val("");
        }
    });



// Perdida del Paciente
// --------------------------------------------------------------

    $("#fallece_si").change(function(){
        if( $("#fallece_si").prop("checked") )
        {
            $("#sec_fallece_si").show();
        }
    });

    $("#fallece_no").change(function(){
        if( $("#fallece_no").prop("checked") )
        {
            $("#sec_fallece_si").hide();
            $("select[name*='fallece_si_lugar']").val("");
            $("input[name*='fecha_fallecimiento']").val("");
            $("input[name*='edad_fallecimiento_anios']").val("");
            $("input[name*='edad_fallecimiento_meses']").val("");
            $("textarea[name*='fallecimiento_observaciones']").val("");
        }
    });


    $("#perdida_si").change(function(){
        if( $("#perdida_si").prop("checked") )
        {
            $("#sec_perdida_si").show();
        }
    });

    $("#perdida_no").change(function(){
        if( $("#perdida_no").prop("checked") )
        {
            $("#sec_perdida_si").hide();
            $("select[name*='perdida_causa']").val("");
        }
    });


// Hospitalización
// --------------------------------------------------------------

    $(document).on("click",".diagnostico_hospitalizacion",function(){
        var $input = $(this);
        var parent = $(this).parents().get(1);
        if($input.val()== "65")
        {  
            $(parent).find(".otro_diagnostico_hospitalizacion").hide();          
            $(parent).find(".respiratorio_diagnostico_hospitalizacion").show();

            $(parent).find("input[name*='hospitalizacion_otro']").val('');
        }
        else if($input.val()== "69")
        {
            $(parent).find(".otro_diagnostico_hospitalizacion").show();
            $(parent).find(".respiratorio_diagnostico_hospitalizacion").hide();

            $(parent).find("input[type*='radio']").removeProp('checked');
            //$(parent).find("select").val('0');
        }
        else
        {
            $(parent).find(".otro_diagnostico_hospitalizacion").hide();
            $(parent).find(".respiratorio_diagnostico_hospitalizacion").hide();

            $(parent).find("input[name*='hospitalizacion_otro']").val('');
            $(parent).find("input[type*='radio']").removeProp('checked');
            //$(parent).find("select").val('0');
        }
    });



 $("#agregar_tabla_hospitalizacion").on('click', function(){
        var ultimaFila = $("#tabla_hospitalizacion tbody tr:eq(-1)");

        $( ultimaFila ).clone().removeClass('fila_oculta').appendTo("#tabla_hospitalizacion tbody");

        var numFila = $("#tabla_hospitalizacion tbody tr").length;
        var num = numFila-1;
        $("#tabla_hospitalizacion tbody tr:eq(-1) td:eq(0)").html(num);
        $("#tabla_hospitalizacion tbody tr:eq(-1)").find(".sub-form").hide();
    });

    $(document).on("click",".eliminar",function(){
        var parent = $(this).parents().get(1);
        $(parent).remove();
    });





// Fin de funciÃ³n principal
});