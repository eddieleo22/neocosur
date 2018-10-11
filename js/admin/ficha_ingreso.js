jQuery(document).ready(function(){


	

// Mostrar/Ocultar Sub-formularios
// ===========================================

// Ocultar subformularios
// -------------------------------------------
	$(".sub-form").hide();

    $("#malformacion_cognitiva").hide();
    $("#oftalmologica").hide();
    $("#sepsis").hide();
    $("#auditivo").hide();
    $("#medicamentos").hide();
    $("#cateteres").hide();
    $("#cirugia").hide();
    $("#alimentacion").hide();
    $("#observaciones").hide();
    $("#fallecimiento").hide();
    $("#sec_fallece").hide();
    $("#tabla_auditivo").hide();
    $("#peat_automatizados_cel, #peat_extendidos_cel, #emisiones_cel").hide();


// Diabetes
// -------------------------------------------
	$( "#diabetes_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".diabetes").show();
    	}});
	$( "#diabetes_no, #diabetes_s_i"  ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".diabetes").hide();
    		$("input[name*='diabetes_gestacional']").removeProp("checked");
    	}});

// Hipertensión Arterial
// -------------------------------------------
	$( "#ht_art_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".ht_art").show();
    	}});
	$( "#ht_art_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".ht_art").hide();
    		$("input[name*='ht_embarazo']").removeProp("checked");
			$("input[name*='medicamentos']").removeProp("checked");
    	}});

// Multiple
// -------------------------------------------
	$( "#multiple_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".multiple").show();
    	}});
	$( "#multiple_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".multiple").hide();
    		$("select[name*='lugar']").val("0");
    	}});

// Cort. prenatal
// -------------------------------------------
	$( "#cort_prenatal_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".cort_prenatal").show();
    		if( $("#completo_si").prop( "checked" ) ){
    			$(".completo").show();
    		}
    	}});
	$( "#cort_prenatal_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".cort_prenatal").hide();
    		$("#completo_si, #completo_no").removeProp("checked");
            $("input[name*='curso']").removeProp("checked");
    		$(".completo").hide();
    	}});
	$( "#cort_prenatal_s_i" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".cort_prenatal").hide();
    		$("#completo_si, #completo_no").removeProp("checked");
            $("input[name*='curso']").removeProp("checked");
    		$(".completo").hide();
    	}});

	$( "#completo_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".completo").show();
    		$("input[name*='curso']").removeProp("checked");

    	}});
	$( "#completo_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".completo").hide();
    		$("input[name*='curso']").removeProp("checked");
    	}});

		
//  sulfato MG 
// -------------------------------------------

	$( "#sulfato_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".sulfato").show();
    	}});
	$( "#sulfato_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".sulfato").hide();
    		$("input[name*='sulfato_uso_como']").removeProp("checked");
			$("input[name*='sulfato_uso_como']").removeProp("checked");
    	}});		
	if( $( "#sulfato_si" ).prop("checked") )
    	{
    		$(".sulfato").show();
    	}
	else  
    	{
    		$(".sulfato").hide();
    		$("input[name*='sulfato_uso_como']").removeProp("checked");
			$("input[name*='sulfato_uso_como']").removeProp("checked");
    	}
		
// EMBARAZO 
$( "#control_embarazo_si" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".control_embarazo").show();
    	}});
	$( "#control_embarazo_no" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".control_embarazo").hide();
			$("input[name*='gest_primer_control']").val("");
    	}});		
	if( $( "#control_embarazo_si" ).prop("checked") )
    	{
    		$(".control_embarazo").show();
    	}
	else  
    	{
    		$(".control_embarazo").hide();
    		$("input[name*='gest_primer_control']").val("");
    	}		
		
// Malformación
// -------------------------------------------
	$("#malformacion_si").change(function(){
		var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".compromete").show();
    	}
	});
	
	$( "#malformacion_no, #malformacion_s_i" ).change(function() {
    	var $input = $( this );
    	if( $input.prop("checked") )
    	{

            $("input[name*='cual_defecto']").val("");
            $("#cual_defecto").hide();
    		$(".compromete").hide();
    		$("input[name*='compromete']").removeProp("checked");
    		$(".detalle_compromete").hide();
    		$("input[class*='detalle_compromete']").removeProp("checked");
            $("textarea[name*='obs_malformaciones']").val("");

            $("#detalle_sistema_nervioso").hide();
            $("input[class*='detalle_sistema_nervioso']").removeProp("checked");
            $("#detalle_defectos_cardiacos").hide();
            $("input[class*='detalle_defectos_cardiacos']").removeProp("checked");
            $("#detalle_defectos_gastrointestinal").hide();
            $("input[class*='detalle_defectos_gastrointestinal']").removeProp("checked");
            $("#detalle_defectos_genitourinarios").hide();
            $("input[class*='detalle_defectos_genitourinarios']").removeProp("checked");
            $("#detalle_defectos_cromosomicas").hide();
            $("input[class*='detalle_defectos_cromosomicas']").removeProp("checked");
            $("#detalle_defectos_otros").hide();
            $("input[class*='detalle_defectos_otros']").removeProp("checked");
    	}});

	$("#compromete_si").change(function(){
		var $input = $( this );
    	if( $input.prop("checked") )
    	{
    		$(".detalle_compromete").show();
    	}
	});

	$("#compromete_no").change(function(){
		var $input = $( this );
    	if( $input.prop("checked") )
    	{

            $("input[name*='cual_defecto']").val("");
            $("#cual_defecto").hide();
    		$(".detalle_compromete").hide();
    		$("input[class*='detalle_compromete']").removeProp("checked");
            $("textarea[name*='obs_malformaciones']").val("");
            
            $("#detalle_sistema_nervioso").hide();
            $("input[class*='detalle_sistema_nervioso']").removeProp("checked");
            $("#detalle_defectos_cardiacos").hide();
            $("input[class*='detalle_defectos_cardiacos']").removeProp("checked");
            $("#detalle_defectos_gastrointestinal").hide();
            $("input[class*='detalle_defectos_gastrointestinal']").removeProp("checked");
            $("#detalle_defectos_genitourinarios").hide();
            $("input[class*='detalle_defectos_genitourinarios']").removeProp("checked");
            $("#detalle_defectos_cromosomicas").hide();
            $("input[class*='detalle_defectos_cromosomicas']").removeProp("checked");
            $("#detalle_defectos_otros").hide();
            $("input[class*='detalle_defectos_otros']").removeProp("checked");
    	}
	});


    $("#sistema_nervioso").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_sistema_nervioso").show();
        }
        else
        {
            $("#detalle_sistema_nervioso").hide();
            $("input[class*='detalle_sistema_nervioso']").removeProp("checked");
        }
    });

    $("#cardiacos").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_defectos_cardiacos").show();
        }
        else
        {
            $("#detalle_defectos_cardiacos").hide();
            $("input[class*='detalle_defectos_cardiacos']").removeProp("checked");
        }
    });

    $("#defectos_gastrointestinal").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_defectos_gastrointestinal").show();
        }
        else
        {
            $("#detalle_defectos_gastrointestinal").hide();
            $("input[class*='detalle_defectos_gastrointestinal']").removeProp("checked");
        }
    });

    $("#detalle_compromete").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_defectos_genitourinarios").show();
        }
        else
        {
            $("#detalle_defectos_genitourinarios").hide();
            $("input[class*='detalle_defectos_genitourinarios']").removeProp("checked");
        }
    });

    $("#cromosomica").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_defectos_cromosomicas").show();
        }
        else
        {
            $("#detalle_defectos_cromosomicas").hide();
            $("input[class*='detalle_defectos_cromosomicas']").removeProp("checked");
        }
    });


    $("#otro_defecto").change(function(){
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#cual_defecto").show();
            $("#detalle_defectos_otros").show();
        }
        else
        {
            $("#cual_defecto").hide();
            $("input[name*='cual_defecto']").val("");
            $("#detalle_defectos_otros").hide();
            $("input[class*='detalle_defectos_otros']").removeProp("checked");
        }
    });


// Fallece en sala de parto
// -------------------------------------------

    $("#fallece_sala_si").change(function(){
		
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".dinamico_fallece").hide();

            $("#patologias_neonatales input").val("");
            $("#patologias_neonatales textarea").val("");
            $("#patologias_neonatales input").removeProp("checked");
            $("#patologias_neonatales select").val("0");
            $('#patologias_neonatales .sub-form').hide();

            $("#evolucion_tratamiento input").val("");
            $("#evolucion_tratamiento textarea").val("");
            $("#evolucion_tratamiento input").removeProp("checked");
            $("#evolucion_tratamiento select").val("0");
			//alert($('#evolucion_tratamiento .sub-form'));
            $('#evolucion_tratamiento .sub-form').hide();
			
            $("#antropometria input").val("");
            $("#antropometria textarea").val("");
            $("#antropometria input").removeProp("checked");
            $("#antropometria select").val("0");
            $('#antropometria .sub-form').hide();

            $('#fecha_alta').prop("required", true);
            $('#destino').val("fallece");
            $('#destino').attr("disabled", true);
        }
    })
	
    $("#fallece_sala_no__").change(function(){ 
        var $input = $( this ); 
        if( $input.prop("checked") )
        {
            $(".dinamico_fallece").show();
            $('#fecha_alta').removeProp("required");
            $('#destino').val("0");
            $('#destino').attr("disabled", false);
			
			//$('#patologias_neonatales .sub-form').show();
			//$('#evolucion_tratamiento .sub-form').show();
			//$('#antropometria .sub-form').show();
			
        }
    })



// HIC (Grado)
// -------------------------------------------
    $( "#hic_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".hic_grado").show();
        }});
    $( "#hic_no, #hic_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".hic_grado").hide();
            $("select[name*='grado']").val('0');
        }});


// Rup. Alveolar
// -------------------------------------------
    $( "#alveolar_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".cual_alveolar").show();
        }});
    $( "#alveolar_no, #alveolar_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".cual_alveolar").hide();
            $("input[class*='detalle_alveolar']").removeProp("checked");
        }});


// Ductus
// -------------------------------------------
    $( "#ductus_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".ductus").show();
        }});
    $( "#ductus_no, #ductus_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".ductus").hide();
            $("input[class*='detalle_ductus']").removeProp("checked");
        }});

// Evaluación previa al alta
// -------------------------------------------
    $( "#previa_alta_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".tabla_previa_alta").show();
        }});

    $( "#previa_alta_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".tabla_previa_alta").hide();
            $("#detalle_cirugia_izq").hide();
            $("#detalle_cirugia_der").hide();
            $("input[class*='detalle_tabla_previa_alta']").removeProp("checked");
            $("select[class*='detalle_tabla_previa_alta']").val('0');
        }});

// Cirugia ojos
// -------------------------------------------
    $( "#cirugia_izq_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_cirugia_izq").show();
        }});

    $( "#cirugia_izq_no, #cirugia_izq_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_cirugia_izq").hide();
            $("select[id*='cual_cirugia_izq']").val('0');
        }});


    $( "#cirugia_der_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_cirugia_der").show();
        }});

    $( "#cirugia_der_no, #cirugia_der_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_cirugia_der").hide();
            $("select[id*='cual_cirugia_der']").val('0');
        }});

// Sepsis Precoz
// -------------------------------------------
    $( "#sepsis_precoz_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_sepsis_precoz").show();
        }});

    $( "#sepsis_precoz_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_sepsis_precoz").hide();
            $("input[class*='detalle_sepsis_precoz']").removeProp("checked");
            $("select[class*='detalle_sepsis_precoz']").val('0');
        }});

		

		
		
		
// Sepsis Tardía
// -------------------------------------------
    $( "#sepsis_tardia_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_sepsis_tardia").show();
        }});

    $( "#sepsis_tardia_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $("#detalle_sepsis_tardia").hide();
            $("input[class*='detalle_sepsis_tardia']").val('');
            $("select[class*='detalle_sepsis_tardia']").val('0');
            $("select[class*='detalle_sepsis_tardia']").val('0');
			//alert("llego"+ ($("#sepsis_tardia_hemocultivo").val()));
			 $("#sepsis_tardia_hemocultivo").removeProp("checked");
			 $("#sepsis_tardia_lcr").removeProp("checked");
        }});

    $(document).on("click",".detalle_sepsis_tardia_germen",function(){
        var $input = $(this);
        var parent = $(this).parents().get(1);
        if($input.val()== "258")
        {            
            $(parent).find(".detalle_sepsis_tardia_otro").show();
        }
        else
        {
            $(parent).find(".detalle_sepsis_tardia_otro").hide();
            $(parent).find("input[class*='detalle_sepsis_tardia_otro']").val('');
        }       
    });

    $( "#detalle_lrc_germen" ).change(function() {
        var $input = $( this );
        if( $input.val() == "otro" )
        {
            $(".detalle_lrc_otro").show();
        }
        else
        {
            $(".detalle_lrc_otro").hide();
            $("input[class*='detalle_lrc_otro']").val('');
        }
    });



// VM Convencional
// -------------------------------------------
    $( "#vm_convencional_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vm").show();
        }});
    $( "#vm_convencional_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vm").hide();
            $("input[class*='detalle_vm_convencional']").removeProp("checked");
            $("input[class*='detalle_vm_convencional']").val("");
        }});

// VM Alta Frecuencia
// -------------------------------------------
    $( "#vm_alta_frecuencia_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vm_alta").show();
        }});
    $( "#vm_alta_frecuencia_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vm_alta").hide();
            $("input[class*='detalle_vm_alta_frecuencia']").val("");
        }});


// Uso de Oxígeno
// -------------------------------------------
    $( "#uso_oxigeno_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_oxigeno").show();
        }});
    $( "#uso_oxigeno_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_oxigeno").hide();
            $("input[class*='detalle_duracion_oxigeno']").val("");
        }});


// CPAP
// -------------------------------------------
    $( "#cpap_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_cpap").show();
        }});
    $( "#cpap_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_cpap").hide();
            $("input[class*='detalle_cpap']").removeProp("checked");
            $("input[class*='detalle_cpap']").val("");

            $(".detalle_inicio_sdr").hide();
            $("input[name*='detalle_inicio_sdr']").removeProp("checked");
        }});

    $( "#inicio_sdr" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
			
            $(".detalle_inicio_sdr").show();
			 $("input[name*='detalle_inicio_sdr']").attr("required", "true");
        }
        else
        {
            $(".detalle_inicio_sdr").hide();
            $("input[name*='detalle_inicio_sdr']").removeProp("checked");
            $("input[name*='detalle_inicio_sdr']").removeProp("required","false");
        }
    });
   
	
        if( $( "#inicio_sdr" ).prop("checked") )
        {
            $(".detalle_inicio_sdr").show();
        }
        else
        {
            $(".detalle_inicio_sdr").hide();
            $("input[name*='detalle_inicio_sdr']").removeProp("checked");
        }
  

// VNNI
// -------------------------------------------
    $( "#vnni_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vnni").show();
        }});
    $( "#vnni_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".duracion_vnni").hide();
            $("input[class*='detalle_duracion_vnni']").val("");
			$("input[name*='detalle_inicio_sdr']").removeProp("checked");
			$("input[name*='primario_sdr']").removeProp("checked");
			$("input[name*='postextubacion']").removeProp("checked");
			$("input[name*='trat_apnea']").removeProp("checked");
			
           
        }});


// Recibe Surfactante
// -------------------------------------------
    $( "#surfactante_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_surfactante").show();
        }});
    $( "#surfactante_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_surfactante").hide();
            $("input[class*='detalle_surfactante']").val("");
            $("input[class*='detalle_surfactante']").removeProp("checked");
            $("select[class*='detalle_surfactante']").val("0");
        }});


// Indometacina
// -------------------------------------------
    $( "#indometacina_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_indometacina").show();
        }});
    $( "#indometacina_no, #indometacina_s_i" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_indometacina").hide();
            $("input[class*='detalle_indometacina']").removeProp("checked");
        }});


// Tratamiento Apnea
// -------------------------------------------
    $( "#tratamiento_apnea_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_tratamiento_apnea").show();
        }});
    $( "#tratamiento_apnea_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_tratamiento_apnea").hide();
            $("input[class*='detalle_tratamiento_apnea']").removeProp("checked");
        }});


// Arteria umbilical
// -------------------------------------------
    $( "#arteria_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_arteria").show();
        }});
    $( "#arteria_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_arteria").hide();
            $("input[class*='detalle_arteria']").val("");
        }});


// Vena umbilical
// -------------------------------------------
    $( "#vena_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_vena").show();
        }});
    $( "#vena_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_vena").hide();
            $("input[class*='detalle_vena']").val("");
        }});


// Venoso central
// -------------------------------------------
    $( "#venoso_central_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_venoso_central").show();
        }});
    $( "#venoso_central_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_venoso_central").hide();
            $("input[class*='detalle_venoso_central']").val("");
        }});


// Percutáneo
// -------------------------------------------
    $( "#percutaneo_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_percutaneo").show();
        }});
    $( "#percutaneo_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_percutaneo").hide();
            $("input[class*='detalle_percutaneo']").val("");
        }});

// Cirugía
// -------------------------------------------

    $(document).on("click",".detalle_cirugia",function(){
        var $input = $(this);
        var parent = $(this).parents().get(1);
        if($input.val()== "358")
        {            
            $(parent).find(".detalle_cirugia_otro").show();
        }
        else
        {
            $(parent).find(".detalle_cirugia_otro").hide();
            $(parent).find("input[name*='detalle_cirugia_otro']").val('');
        }
    });

// Leche
// -------------------------------------------
    $( "#leche_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_leche").show();
        }
    });
    $( "#leche_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_leche").hide();
            $("input[class*='detalle_leche']").val('');
			
			// $("input[name*='leche_donada']").removeProp("checked");
			// $("input[name*='leche_donada']").removeProp("checked");
			 $("input[class*='leches']").removeProp("checked");
			//leche_donada
        }
    });

// Destino
// -------------------------------------------
    if($( "#destino" ).val() =="209"){
		 $(".detalle_destino_domicilio").show();
            $("#sec_fallece").hide();

            $("#fallecimiento input").val("");
            $("#fallecimiento textarea").val("");
            $("#fallecimiento input").removeProp("checked");
            $("#fallecimiento select").val("0");
	}
	else if($( "#destino" ).val() =="212"){
		 $("#sec_fallece").show();
            $(".detalle_destino_domicilio").hide();
            $("input[name*='oxigen_domicilio']").removeProp("checked");
	}
    $( "#destino" ).change(function() {
        var $input = $( this );
        if( $input.val() == "209" )
        {
            $(".detalle_destino_domicilio").show();
            $("#sec_fallece").hide();

            $("#fallecimiento input").val("");
            $("#fallecimiento textarea").val("");
            $("#fallecimiento input").removeProp("checked");
            $("#fallecimiento select").val("0");
        }
        else if ($input.val() == '212')
        {
            $("#sec_fallece").show();
            $(".detalle_destino_domicilio").hide();
            $("input[name*='oxigen_domicilio']").removeProp("checked");
        }
        else
        {
            $(".detalle_destino_domicilio").hide();
            $("#sec_fallece").hide();
            $("input[name*='oxigen_domicilio']").removeProp("checked");

            $("#fallecimiento input").val("");
            $("#fallecimiento textarea").val("");
            $("#fallecimiento input").removeProp("checked");
            $("#fallecimiento select").val("0");
        }
    });

// Resultado Autopsia
// -------------------------------------------
    $( "#autopsia_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".resultado_autopsia").show();
        }
    });
    $( "#autopsia_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".resultado_autopsia").hide();
            $("textarea[name*='resultado_autopsia']").val("");
        }
    });


// Paro cardiorespiratorio no traumático
// -------------------------------------------
 $("#mostrarCausas").show();
    $( "#paro_cardiorespiratorio" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".causa_paro").show();
        }
        else
        {
            $(".causa_paro").show();
            $("input[class*='causa_paro']").removeProp("checked");
        }
    });

// Otra Causa de muerte
// -------------------------------------------
    $( "#otra_causa_muerte" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".detalle_otra_causa_muerte").show();
        }
        else
        {
            $(".detalle_otra_causa_muerte").hide();
            $("input[name*='detalle_otra_causa_muerte']").val("");
        }
    });


// Responsable
// -------------------------------------------
    $( "#seleccion_responsable" ).change(function() {
        var $input = $( this );
        if( $input.val() == "otro" )
        {
            $("#responsable").val("");
            $("#responsable").removeProp("readonly");
        }
        else
        {
            $("#responsable").val($input.val());
            $("#responsable").attr("readonly", true);
        }
    });


// Doppler Fetal
// -------------------------------------------
    $( "#doppler_fetal_si" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".doppler_fetal").show();
        }});
    $( "#doppler_fetal_no" ).change(function() {
        var $input = $( this );
        if( $input.prop("checked") )
        {
            $(".doppler_fetal").hide();
            $("input[class*='doppler']").removeProp("checked");
        }});

 // Tabla Auditivo
// -------------------------------------------
    $("#pesquisa_si").change(function(){
        var $input = $(this);
        if($input.prop("checked")){
            $("#tabla_auditivo").show();
        }
    });
    $("#pesquisa_no").change(function(){
        var $input = $(this);
        if($input.prop("checked")){
            $("#tabla_auditivo").hide();
            $("input[class*='check-auditivo']").removeProp("checked");
            $("#peat_automatizados_cel, #peat_extendidos_cel, #emisiones_cel").hide();
        }
    });

    $("#peat_automatizados").change(function(){
        var $input = $(this);
        if($input.prop("checked")){
            $("#peat_automatizados_cel").show();
        }
        else{
            $("#peat_automatizados_cel").hide();
            $("input[name*='peat_automatizados_normal']").removeProp("checked");
        }
    });

    $("#peat_extendidos").change(function(){
        var $input = $(this);
        if($input.prop("checked")){
            $("#peat_extendidos_cel").show();
        }
        else{
            $("#peat_extendidos_cel").hide();
            $("input[name*='peat_extendidos_normal']").removeProp("checked");
        }
    });

    $("#emisiones").change(function(){
        var $input = $(this);
        if($input.prop("checked")){
            $("#emisiones_cel").show();
        }
        else{
            $("#emisiones_cel").hide();
            $("input[name*='emisiones_normal']").removeProp("checked");
        }
    });





// Mostrar/Cambiar de Sub-Secciones
// ===========================================
    
    $("#sec_principal_neonatales").click(function(){

        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_oftalmologica, #sec_sepsis, #sec_auditivo").removeClass("active btn-success");
        $("#sec_oftalmologica, #sec_sepsis, #sec_auditivo").addClass("btn-default");
        
        $("#oftalmologica, #sepsis, #auditivo").fadeOut('fast');
        $("#principal_neonatales").fadeIn('slow');
    });

    $("#sec_oftalmologica").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_principal_neonatales, #sec_sepsis, #sec_auditivo").removeClass("active btn-success");
        $("#sec_principal_neonatales, #sec_sepsis, #sec_auditivo").addClass("btn-default");
        
        $("#principal_neonatales, #sepsis, #auditivo").fadeOut('fast');
        $("#oftalmologica").fadeIn('slow');
    });

    $("#sec_sepsis").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_oftalmologica, #sec_principal_neonatales, #sec_auditivo").removeClass("active btn-success");
        $("#sec_oftalmologica, #sec_principal_neonatales, #sec_auditivo").addClass("btn-default");

        $("#principal_neonatales, #oftalmologica, #auditivo").fadeOut('fast');
        $("#sepsis").fadeIn('slow');
    });

    $("#sec_auditivo").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_oftalmologica, #sec_principal_neonatales, #sec_sepsis").removeClass("active btn-success");
        $("#sec_oftalmologica, #sec_principal_neonatales, #sec_sepsis").addClass("btn-default");

        $("#principal_neonatales, #oftalmologica, #sepsis").fadeOut('fast');
        $("#auditivo").fadeIn('slow');
    });

    $("#sec_respiratorio").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_observaciones").removeClass("active btn-success");
        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_observaciones").addClass("btn-default");

        $("#medicamentos, #cateteres, #cirugia, #alimentacion, #observaciones").fadeOut('fast');
        $("#respiratorio").fadeIn('slow');
    });

    $("#sec_medicamentos").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_respiratorio, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_observaciones").removeClass("active btn-success");
        $("#sec_respiratorio, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_observaciones").addClass("btn-default");

        $("#respiratorio, #cateteres, #cirugia, #alimentacion, #observaciones").fadeOut('fast');
        $("#medicamentos").fadeIn('slow');
    });

    $("#sec_cateteres").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_medicamentos, #sec_respiratorio, #sec_cirugia, #sec_alimentacion, #sec_observaciones").removeClass("active btn-success");
        $("#sec_medicamentos, #sec_respiratorio, #sec_cirugia, #sec_alimentacion, #sec_observaciones").addClass("btn-default");

        $("#medicamentos, #respiratorio, #cirugia, #alimentacion, #observaciones").fadeOut('fast');
        $("#cateteres").fadeIn('slow');
    });

    $("#sec_cirugia").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_medicamentos, #sec_cateteres, #sec_respiratorio, #sec_alimentacion, #sec_observaciones").removeClass("active btn-success");
        $("#sec_medicamentos, #sec_cateteres, #sec_respiratorio, #sec_alimentacion, #sec_observaciones").addClass("btn-default");

        $("#medicamentos, #respiratorio, #respiratorio, #alimentacion, #observaciones, #cateteres").fadeOut('fast');
        $("#cirugia").fadeIn('slow');
    });

    $("#sec_alimentacion").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_respiratorio, #sec_observaciones").removeClass("active btn-success");
        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_respiratorio, #sec_observaciones").addClass("btn-default");

        $("#medicamentos, #respiratorio, #respiratorio, #cirugia, #observaciones, #cateteres").fadeOut('fast');
        $("#alimentacion").fadeIn('slow');
    });

    $("#sec_observaciones").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_respiratorio").removeClass("active btn-success");
        $("#sec_medicamentos, #sec_cateteres, #sec_cirugia, #sec_alimentacion, #sec_respiratorio").addClass("btn-default");

        $("#medicamentos, #respiratorio, #respiratorio, #cirugia, #alimentacion, #cateteres").fadeOut('fast');
        $("#observaciones").fadeIn('slow');
    });

    $("#sec_fallece").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_informacion_alta").removeClass("active btn-success");
        $("#sec_informacion_alta").addClass("btn-default");

        $("#informacion_alta").fadeOut('fast');
        $("#fallecimiento").fadeIn('slow');
    });

    $("#sec_informacion_alta").click(function(){
        $(this).removeClass("btn-default");
        $(this).addClass("active btn-success");

        $("#sec_fallece").removeClass("active btn-success");
        $("#sec_fallece").addClass("btn-default");

        $("#fallecimiento").fadeOut('fast');
        $("#informacion_alta").fadeIn('slow');
    });



// Métodos Varios
// ===========================================

    $("#agregar_tabla_sepsis").on('click', function(){
        var ultimaFila = $("#tabla_sepsis tbody tr:eq(-1)");

        $( ultimaFila ).clone().removeClass('fila_oculta').appendTo("#tabla_sepsis tbody");

        var numFila = $("#tabla_sepsis tbody tr").length;
        var num = numFila-1;
        $("#tabla_sepsis tbody tr:eq(-1) td:eq(0)").html("Sepsis " + num);
        $("#tabla_sepsis tbody tr:eq(-1) td:eq(4)").html('<label for="sepsis_tardia_tipo" class="control-label radio-inline" ><input type="radio" name="sepsis_tardia_tipo'+num+'" value="0" id="sepsis_tardia_hemocultivo"> Hemocultivo </label> <label for="sepsis_tardia_tipo" class="control-label radio-inline" > <input type="radio" name="sepsis_tardia_tipo'+num+'" value="1" id="sepsis_tardia_lcr"> LCR positivo</label>');
        $("#tabla_sepsis tbody tr:eq(-1)").find(".sub-form").hide();
    });

    $(document).on("click",".eliminar",function(){
        var parent = $(this).parents().get(1);
        $(parent).remove();
    });


    $("#agregar_tabla_cirugia").on('click', function(){
        var ultimaFila = $("#tabla_cirugia tbody tr:eq(-1)");

        $( ultimaFila ).clone().removeClass('fila_oculta').appendTo("#tabla_cirugia tbody");

        var numFila = $("#tabla_cirugia tbody tr").length;
        var num = numFila-1;
        $("#tabla_cirugia tbody tr:eq(-1) td:eq(0)").html("Cirugía " + num);
        $("#tabla_cirugia tbody tr:eq(-1)").find(".sub-form").hide();
    });

    $(document).on("click",".eliminar",function(){
        var parent = $(this).parents().get(1);
        $(parent).remove();
    });





// cierre de archivo
});