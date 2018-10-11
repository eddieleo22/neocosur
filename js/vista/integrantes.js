jQuery(document).ready(function(){

	// Mostrar / Ocultar tabs Paises
	// ===========================================================
	$("#btn_argentina").addClass("active");
	$("#accordion_brasil, #accordion_chile, #accordion_peru, #accordion_paraguay, #accordion_uruguay").hide();
	

	$("#btn_argentina").click(function(){
		$("#btn_brasil, #btn_chile, #btn_peru, #btn_paraguay, #btn_uruguay").removeClass("active");
		$(this).addClass("active");
		$("#accordion_argentina").show();
		$("#accordion_brasil, #accordion_chile, #accordion_peru, #accordion_paraguay, #accordion_uruguay").hide();
		
	});

	$("#btn_brasil").click(function(){
		$("#btn_argentina, #btn_chile, #btn_peru, #btn_paraguay, #btn_uruguay").removeClass("active");
		$(this).addClass("active");
		$("#accordion_brasil").show();
		$("#accordion_argentina, #accordion_chile, #accordion_peru, #accordion_paraguay, #accordion_uruguay").hide();
		
	});

	$("#btn_chile").click(function(){
		$("#btn_brasil, #btn_argentina, #btn_peru, #btn_paraguay, #btn_uruguay").removeClass("active");
		$(this).addClass("active");
		$("#accordion_chile").show();
		$("#accordion_brasil, #accordion_argentina, #accordion_peru, #accordion_paraguay, #accordion_uruguay").hide();
		$("#btn_brasil, #btn_argentina, #btn_peru, #btn_paraguay, #btn_uruguay").removeClass("active");
	});

	$("#btn_peru").click(function(){
		$("#btn_brasil, #btn_chile, #btn_argentina, #btn_paraguay, #btn_uruguay").removeClass("active");
		$(this).addClass("active");
		$("#accordion_peru").show();
		$("#accordion_brasil, #accordion_chile, #accordion_argentina, #accordion_paraguay, #accordion_uruguay").hide();
	});

	$("#btn_paraguay").click(function(){
		$("#btn_brasil, #btn_chile, #btn_peru, #btn_argentina, #btn_uruguay").removeClass("active");
		$(this).addClass("active");
		$("#accordion_paraguay").show();
		$("#accordion_brasil, #accordion_chile, #accordion_peru, #accordion_argentina, #accordion_uruguay").hide();
	});

	$("#btn_uruguay").click(function(){
		$("#btn_brasil, #btn_chile, #btn_peru, #btn_paraguay, #btn_argentina").removeClass("active");
		$(this).addClass("active");
		$("#accordion_uruguay").show();
		$("#accordion_brasil, #accordion_chile, #accordion_peru, #accordion_paraguay, #accordion_argentina").hide();
	});


});