function  llama_ok(menjsaje)

{
	alert(menjsaje);
	
	}


function cambiar3(item) {//iconos mas-menos
   obj=document.getElementById(item);
   visible=(obj.style.display!="none")
   key=document.getElementById("x" + item);
   if (visible) {
     obj.style.display="none";
     key.innerHTML="<img src='../../images/mas.png' width='16' height='16' hspace='3' vspace='0' border='0' align='absmiddle'>";
   } else {
      obj.style.display="block";
      key.innerHTML="<img src='../../images/menos.png' width='16' height='16' hspace='3' vspace='0' border='0' align='absmiddle'>";
   }
}
 
function abrirDiv2(nombre) {
	
   eldiv = document.getElementById(nombre);
   eldiv.style.display = 'block';  // para desplegar (none para ocultar)
}

function cerrarDiv2(nombre) {
   eldiv = document.getElementById(nombre);
   eldiv.style.display = 'none'; 
}

 function abrirDivSelect(valor, nombre) {
   eldiv = document.getElementById(nombre);
   
   
 // alert(valor);
   if (valor=="Domicilio") 
       eldiv.style.display = 'block';  
	else if (valor=="Otro") 
       eldiv.style.display = 'block';  
	else if (valor=="3") 
       eldiv.style.display = 'block';  
	else if (valor=='219')
	 	eldiv.style.display = 'block'; 
	else if (valor=='221')
		eldiv.style.display = 'block'; 
		else if (valor=='358')
		eldiv.style.display = 'block'; 
		else if (valor=='37')
		eldiv.style.display = 'block'; 
		else if (valor=='239')
		eldiv.style.display = 'block'; 
		else if (valor=='-1')
		eldiv.style.display = 'block';  
else{

       eldiv.style.display = 'none';  }

}

 function abrirDivSelect2(valor, nombre) {//Funciona como complemento de función anterior, cuando los valores corresponden al mismo select
   eldiv = document.getElementById(nombre);
   if (valor=="Fallece") 
       eldiv.style.display = 'block';  
else
       eldiv.style.display = 'none';  

}

function abrirDivSelect3(valor, nombre) {//Funciona como complemento a la primera, cuando los valores corresponden al mismo select
   eldiv = document.getElementById(nombre);
   if (valor=="Respiratorio") 
       eldiv.style.display = 'block';  
else
       eldiv.style.display = 'none';  

}

function AplicarCebra () {
var tables = document.getElementsByTagName("table");
for (var i = 0; i < tables.length; i++) {
if (tables[i].className.match(/TablaCebra/)) {
TablaCebra(tables[i]);
}
}
}
function TablaCebra (table) {
var current = "impar";
var trs = table.getElementsByTagName("tr");
for (var i = 0; i < trs.length; i++) {
trs[i].className += " " + current;
current = current == "par" ? "impar" : "par";
}
}


function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");z}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
 
//Checkboxes dinámicos Ficha Seguimiento
function habilitaDeshabilita(form)
{
    if (form.screening_peat_automat_alta.checked == true)
    {
    abrirDiv2('si_peat_automatizado_alta')
    }
 
    if (form.screening_peat_automat_alta.checked == false)
    {
    cerrarDiv2('si_peat_automatizado_alta')
    }
	
	if (form.screening_peat_extend_alta.checked == true)
    {
    abrirDiv2('si_peat_extendido_alta')
    }
 
    if (form.screening_peat_extend_alta.checked == false)
    {
    cerrarDiv2('si_peat_extendido_alta')
    }
	
	if (form.screening_emisiones_alta.checked == true)
    {
    abrirDiv2('si_emisiones_otoacusticas_alta')
    }
 
    if (form.screening_emisiones_alta.checked == false)
    {
    cerrarDiv2('si_emisiones_otoacusticas_alta')
    }
 // Screening posterior al alta
  if (form.screening_peat_automat_posterior.checked == true)
    {
    abrirDiv2('si_peat_automatizado_posterior')
    }
 
    if (form.screening_peat_automat_posterior.checked == false)
    {
    cerrarDiv2('si_peat_automatizado_posterior')
    }
	
	if (form.screening_peat_extend_posterior.checked == true)
    {
    abrirDiv2('si_peat_extendido_posterior')
    }
 
    if (form.screening_peat_extend_posterior.checked == false)
    {
    cerrarDiv2('si_peat_extendido_posterior')
    }
	
	if (form.screening_emisiones_posterior.checked == true)
    {
    abrirDiv2('si_emisiones_otoacusticas_posterior')
    }
 
    if (form.screening_emisiones_posterior.checked == false)
    {
    cerrarDiv2('si_emisiones_otoacusticas_posterior')
    }
	
 // Función renal
 if (form.estudio_ecorenal.checked == true)
    {
    abrirDiv2('si_ecorenal')
    }
 
    if (form.estudio_ecorenal.checked == false)
    {
    cerrarDiv2('si_ecorenal')
    }
	
	if (form.estudio_cintigrafia.checked == true)
    {
    abrirDiv2('si_cintigrafia')
    }
 
    if (form.estudio_cintigrafia.checked == false)
    {
    cerrarDiv2('si_cintigrafia')
    }
	
	if (form.estudio_uretrocistografia.checked == true)
    {
    abrirDiv2('si_uretrocistografia')
    }
 
    if (form.estudio_uretrocistografia.checked == false)
    {
    cerrarDiv2('si_uretrocistografia')
    }
// Malformaciones congénitas
 if (form.otros_defectos.checked == true)
    {
    abrirDiv2('si_otra_malformacion')
    }
 
    if (form.otros_defectos.checked == false)
    {
    cerrarDiv2('si_otra_malformacion')
    }

// Evaluación del Neurodesarrollo
 if (form.eva_eedp.checked == true)
    {
    abrirDiv2('si_eedp')
    }
 
    if (form.eva_eedp.checked == false)
    {
    cerrarDiv2('si_eedp')
    }
	
 if (form.eva_eais.checked == true)
    {
    abrirDiv2('si_eais')
    }
 
    if (form.eva_eais.checked == false)
    {
    cerrarDiv2('si_eais')
    }
	
	
 if (form.eva_catclams.checked == true)
    {
    abrirDiv2('si_catclams')
    }
 
    if (form.eva_catclams.checked == false)
    {
    cerrarDiv2('si_catclams')
    }
	
 if (form.eva_asq.checked == true)
    {
    abrirDiv2('si_asq')
    }
 
    if (form.eva_asq.checked == false)
    {
    cerrarDiv2('si_asq')
    }
	
// Vacunas
 if (form.otras_vacunas.checked == true)
    {
    abrirDiv2('si_otrasvacunas')
    }
 
    if (form.otras_vacunas.checked == false)
    {
    cerrarDiv2('si_otrasvacunas')
    }

}

//Checkboxes dinámicos Ficha Ingreso
function habilitaDeshabilita2(form)
{


// CPAP, Trat. inicio SDR
 if (form.trat_sdr.checked == true)
    {
    abrirDiv2('si_sdr')
    }
 
    if (form.trat_sdr.checked == false)
    {
    cerrarDiv2('si_sdr')
    }	
	
}

function habilitadeshabilita3(form)
{

// Causa probable de muerte
 if (form.paro_cardio.checked == true)
    {
    abrirDiv2('si_paro')
    }
 
    if (form.paro_cardio.checked == false)
    {
    cerrarDiv2('si_paro')
    }
	
if (form.causa_otra.checked == true)
    {
    abrirDiv2('si_otracausa')
    }
 
    if (form.causa_otra.checked == false)
    {
    cerrarDiv2('si_otracausa')
    }	
}

function habilitadeshabilita4(form)
{


	// Malformaciones congénitas
 if (form.def_otros.checked == true)
    {
    abrirDiv2('si_otra_malformacion')
    }
 
    if (form.def_otros.checked == false)
    {
    cerrarDiv2('si_otra_malformacion')
    }	
}