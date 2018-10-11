<?php 

session_start();
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/ingresoControlDAO.php';
include 'ayuda.php';
/*
include '../admin/capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);
*/
extract($_GET);

$cone = new ConexionDAO();

$daoControl =  new ingresoControlDAO($cone);
if($_GET["message"]!=null){
$messageNumero = substr($_GET["message"],0,2); 
$messageLetra = substr($_GET["message"],3,6); 
}

$letrasYNumeros = '#^[a-z]*[0-9][a-z0-9]*$#i';
$letras  = "/^[a-z]+$/i";;
$numeros = "/^[[:digit:]]+$/";

/*
		if(!(preg_match($numeros,$_GET["idNeocosur"]))==1){ 	
				salir($_SESSION["token"]);
		}
		else if($_GET["idControl"]!='' && !(preg_match($numeros,$_GET["idControl"]))==1){ 
				salir($_SESSION["token"]);		
		}
		else if($messageLetra!='' &&  !(preg_match($letras,$messageLetra))==1){ 	
				salir($_SESSION["token"]);
		}
		else if($messageNumero!='' && !(preg_match($numeros,$messageNumero))==1){ 	
				salir($_SESSION["token"]);
		}
*/
	

$url = $_GET['url'];

$idNeocosur=$cone->test_input($_GET['idNeocosur']);// ;$_GET["idNeocosur"];
//$idNeocosur=$filtro->process($idNeocosur);
$idControl=$_GET['idControl']==""? "-1":$cone->test_input($_GET['idControl']);
//$idControl=$filtro->process($idControl);
$fechaControlOK;
$retornoCentro =$daoControl->retornoCentro($idNeocosur); 
$_SESSION["id_centro"] = $retornoCentro['ID_CENTRO'];
$idCentro=$_SESSION["id_centro"];


if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}

$retornoNoOk =$daoControl->listarControles(0,$idNeocosur);
$fila = $daoControl->buscarFichaSegId($idNeocosur);
$edadCrono = $fila['EDAD_CRONOLOGICA'];


$combo=$daoControl->buscarFechaControl1($idNeocosur);
$fechaCombo=$combo["FECHA_INGRESO_PROGRAMA"];
$idControlCombo=$combo["ID_CONTROL"];

$fechaActual=date("Y-m-d");
/*
echo "idControl ".$idControl;
echo "<br>fechaActual ".$fechaActual;

echo "<br>idControlCombo ".$idControlCombo;
echo "<br>edadCrono ".$edadCrono;
echo "<br>fechaCombo ".$fechaCombo."<br>";*/

//$idControlCombo ='18';
//echo " <br><br> CANTIDAD cantidad ".strlen($idControlCombo) ;

if($fechaCombo>=$edadCrono ||  $fechaActual>=$edadCrono ){
	$idValido=$daoControl->buscarFechaControl('40 semanas',$idNeocosur); 
	$mensaje='40 semanas';	
	$mensajeBD='40 semanas';	
	$Sem40='value="'.$idControlCombo."#".$edadCrono."#".$mensaje."#".$mensajeBD.'"'; 
}
else {

	$idValido=$daoControl->buscarFechaControl('40 semanas',$idNeocosur);
	$Sem40='value="'.$idControlCombo.'" disabled style="background-color: #B0C4D0"';

}



$nuevafecha6 = strtotime ( '+6 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha6 = date ( 'Y-m-d' , $nuevafecha6 );
$idValido6=$daoControl->buscarFechaControl('6 meses',$idNeocosur);


/*echo " <br> idValido6 ".$idValido6;
echo " <br>nueva fecha 6".$nuevafecha6;
echo " <br>fecha actual 6  ".$fechaActual; */


$interval=strtotime($fechaActual) - strtotime($edadCrono); 
 $redo= round($interval / 86400);
 $mes =$redo/30;
 $mesNeuro =$redo/30;
 
$nuevafecha12 = strtotime ( '+12 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha12 = date ( 'Y-m-d' , $nuevafecha12 );
$idValido12=$daoControl->buscarFechaControl('12 meses',$idNeocosur);
$idValido12 =$idValido12 ;

$nuevafecha18 = strtotime ( '+18 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha18 = date ( 'Y-m-d' , $nuevafecha18 );
$idValido18=$daoControl->buscarFechaControl('18 meses',$idNeocosur);

$nuevafecha24 = strtotime ( '+24 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha24 = date ( 'Y-m-d' , $nuevafecha24 );
$idValido24=$daoControl->buscarFechaControl('24 meses',$idNeocosur);


$nuevafecha36 = strtotime ( '+36 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha36 = date ( 'Y-m-d' , $nuevafecha36 );
$idValido36=$daoControl->buscarFechaControl('36 meses',$idNeocosur);


$nuevafecha48 = strtotime ( '+48 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha48 = date ( 'Y-m-d' , $nuevafecha48 );
$idValido48=$daoControl->buscarFechaControl('48 meses',$idNeocosur);


$nuevafecha48 = strtotime ( '+48 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha48 = date ( 'Y-m-d' , $nuevafecha48 );
$idValido48=$daoControl->buscarFechaControl('48 meses',$idNeocosur);


$nuevafecha60 = strtotime ( '+60 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha60 = date ( 'Y-m-d' , $nuevafecha60 );
$idValido60=$daoControl->buscarFechaControl('60 meses',$idNeocosur);


$nuevafecha72 = strtotime ( '+72 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha72 = date ( 'Y-m-d' , $nuevafecha72 );
$idValido72=$daoControl->buscarFechaControl('72 meses',$idNeocosur);

$nuevafecha84 = strtotime ( '+84 month' , strtotime ( $edadCrono ) ) ;
$nuevafecha84 = date ( 'Y-m-d' , $nuevafecha84 );
$idValido84=$daoControl->buscarFechaControl('84 meses',$idNeocosur);
 
$select ="";
if($idValido6!="" || $mes>=6){  
	$mensaje="6 meses"; 
	$mensajeBD="6 meses"; 
	$seis='value="'.$idValido6."#".$nuevafecha6."#".$mensaje."#".$mensajeBD.'"'; 
	
}
else {
	 $seis='value="'.$idValido6.'" disabled style="background-color: #B0C4D0"';
}

if($idValido12!="" || $mes>=12){ 
	$mensaje="12 meses"; 
	$mensajeBD="12 meses"; 
	$doce='value="'.$idValido12."#".$nuevafecha12."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $doce='value="'.$idValido12.'" disabled style="background-color: #B0C4D0"';
}

if($idValido18!="" || $mes>=18){ 
	$mensaje="18 meses"; 
	$mensajeBD="18 meses"; 
	$m18='value="'.$idValido18."#".$nuevafecha18."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m18='value="'.$idValido18.'" disabled style="background-color: #B0C4D0"';
}

if($idValido24!="" || $mes>=24 ){ 
	$mensaje="24 meses"; 
	$mensajeBD="24 meses"; 
	$m24='value="'.$idValido24."#".$nuevafecha24."#".$mensaje."#".$mensajeBD.'"'; 
	
}
else {
	 $m24='value="'.$idValido24.'" disabled style="background-color: #B0C4D0"';
}


if($idValido36!="" || $mes>=36 ){
	$m36='value="'.$idValido36.'"'; 
	$mensaje=" 3 años"; 
	$mensajeBD="36 meses"; 
	$m36='value="'.$idValido36."#".$nuevafecha36."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m36='value="'.$idValido36.'" disabled style="background-color: #B0C4D0"';
}

if($idValido48!="" || $mes>=48 ){
	$m48='value="'.$idValido48.'"'; 
	$mensaje=" 4 años";
	$mensajeBD="48 meses";
	$m48='value="'.$idValido48."#".$nuevafecha48."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m48='value="'.$idValido48.'" disabled style="background-color: #B0C4D0"';
}

if($idValido60!="" || $mes>=60 ){
	$m60='value="'.$idValido60.'"'; 
	$mensaje="60 meses";
	$m60='value="'.$idValido60."#".$nuevafecha60."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m60='value="'.$idValido60.'" disabled style="background-color: #B0C4D0"';
}


if($idValido72!="" || $mes>=72 ){
	$m72='value="'.$idValido72.'"';
	$mensaje="72 meses";
	$m72='value="'.$idValido72."#".$nuevafecha72."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m72='value="'.$idValido72.'" disabled style="background-color: #B0C4D0"';
}


if($idValido84!="" || $mes>=84 ){
	$m84='value="'.$idValido84.'"'; 
	$mensaje="84 meses";
	$m84='value="'.$idValido84."#".$nuevafecha84."#".$mensaje."#".$mensajeBD.'"'; 
}
else {
	 $m84='value="'.$idValido84.'" disabled style="background-color: #B0C4D0"';
}
  
include 'head.php'; 

if($url=='ingreso'){
	$ingreso = 'class="active"';
}
if($url=='control'){
	$control = 'class="active"';
}
if($url=='connatales'){
	 $connatales = 'class="active"';
}
if($url=='familiares'){
	$familiares = 'class="active"';
}
if($url=='antropometria'){
	 $antropometria = 'class="active"';
}
if($url=='alimentacion'){
	 $alimentacion = 'class="active"';
}
if($url=='auditiva'){
	 $auditiva = 'class="active"';
}
if($url=='visual'){
	 $visual = 'class="active"';
}
if($url=='compromiso'){
	 $compromiso = 'class="active"';
}
if($url=='evaluacion'){
	 $evaluacion = 'class="active"';
}
if($url=='vacunas'){
	 $vacunas = 'class="active"';
}
if($url=='perdida'){
	 $perdida = 'class="active"';
}
if($url=='hospitalizacion'){
	 $hospitalizacion = 'class="active"';
}

if($url=='ficha'){
	 $ficha = 'class="active"';
}

if($url==""){
	$ingreso = 'class="active"';
}


$_SESSION["control"]=$message;;
//echo "<br><br> control session [".$_SESSION["control"]."]";

?>



<script language="JavaScript"> 
<!-- 
function MM_openBrWindow(theURL,winName,features) { //v2.0 
window.open(theURL,winName,features); 
} 
</script>
<script language="JavaScript">


function cambiarUrlNoOK(idNeo)
{ 

 //var select = document.getElementById("Cambio"), //El <select>
       // value = select.value, //El valor seleccionado
       // text = select.options[select.selectedIndex].innerText; 
	   
	   //El texto de la opción seleccionada
	  var  select = document.getElementById("controles_nook");
	var idControl=document.controless.controles_nook.value;
	console.log(" \n\n   id Control -> "+ idControl);
	console.log(" \n\n   id Control -> "+ select.options[select.selectedIndex].innerText);
  mensaje = select.options[select.selectedIndex].innerText;
 location.href="control.php?idNeocosur="+idNeo+"&idControl="+idControl+"&message="+mensaje+"";
 

}

function cambiarUrlOK(idNeo)
{ 

var valor=document.controless.controles_activo.value;
console.log("valor del combo "+valor);
var arr = valor.split("#");
var nuevoIdControl = arr[0];
var nuevaFecha = arr[1];
var nuevoMensaje = arr[2];
var mensajeBD = arr[3];
/*
var nuevoId =  valor.substr(0,1);
console.log("valor del nuevoId substring 0,1  "+nuevoId);
var tiene =nuevoId.indexOf('0')>=0 || nuevoId.indexOf('-')>=0 ? true : false;
console.log("valor var  tiene  "+tiene);
console.log("valor var  tiene  "+nuevoId);
if(tiene){
	nuevoId = valor.substr(0,1); 
}
else {
	nuevoId = valor.substr(0,2); 
} */
//console.log("valor var nuevoId  Despues "+nuevoId);
//fecha = valor.substring(2,12);
//console.log("valor var fecha "+fecha);
//console.log("valor var valor "+valor);
//mensaje = valor.substr(12,valor.length-12 );
//console.log("valor var mensaje "+mensaje);
//console.log("\n\n\n\n ");
 

document.ingresoControlForm.fechita_control.value = nuevaFecha;
//var fechaControl =document.ingresoControlForm.fechita_control.value ;
//location.href="control.php?idNeocosur="+idNeo+"&idControl="+idControl+"";
if(nuevoIdControl >0){
	//console.log("\n\n\n\n ");
	//console.log("   mensaje "+ mensaje);
		
	//url= 'control.php?idNeocosur='+idNeo+'&idControl='+nuevoId+'';

	
	location.href="control.php?idNeocosur="+idNeo+"&idControl="+nuevoIdControl+"&message="+nuevoMensaje+"";;
		console.log("\n\n\n\n paso ??  ");
}
else {
	var hoy = new Date();
var dd = hoy.getDate();
var mm = hoy.getMonth()+1; //hoy es 0!
var yyyy = hoy.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

hoy = yyyy+'-'+mm+'-'+dd;	 

	$('#idControl').val('-1');
	$('#messageBD').val(mensajeBD);
	$('#message').val(nuevoMensaje);
	
	
	
	if($('#messageBD').val()!=''){
	$('#ingreso_control').val(hoy); 
	}
	

if($('#fechita_control').val()!=''){
		cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fechita_control').val(),'DATOS_CONTROL');			
        cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fechita_control').val(),'DATOS_CONTROL');
	}
	else {
		//alert("Else -> "+$('#fecha_control').val());
		$('#fechita_control').change(function(){
			
			cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fechita_control').val(),'DATOS_CONTROL');			
			cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fechita_control').val(),'DATOS_CONTROL');	
					
		});
	}
	
}

	document.getElementById("fechaLabel").innerHTML = nuevoMensaje;	
	//location.href="control.php?idNeocosur="+idNeo+"&idControl="+nuevoId+"&message="+mensaje+"";;
	
	//$("#link_ingreso").on('click', clickPrincipal);
	//$('#link_ingreso').removeAttr('onclick');
	//$('#link_ingreso').attr('onClick', 'clickPrincipal();');
	$('#link_ingreso').toggle(clickPrincipal);
	//$("#controles_activo").focus();
	//tdocument.getElementById("controles_activo").focus();
	$("#link_control").hide();
	$("#link_connatales").hide();
	$("#link_familiares").hide();
	$("#link_antro").hide();
	$("#link_alimentacion").hide();
	$("#link_auditiva").hide();
	$("#link_visual").hide();
	$("#link_compromiso").hide();
	$("#link_evaluacion").hide();
	$("#link_vacunas").hide();
	$("#link_hospitalizacion").hide();
	$("#link_perdida").hide();
	$("#link_ficha").hide();
	$('#ingresoControl').val(nuevoMensaje);
	
	

}
function clickPrincipal(){
	$("#link_ingreso").addClass("active");
	
	$("#link_ingreso").removeClass("btn-default");
    $("#link_ingreso").addClass("ui-tabs-active");
    $("#link_ingreso").addClass("ui-state-active");
	//alert($(this).hide());
	$("#control").removeClass("btn-default");
	$("#control").removeClass("active");
	$("#control").css("display", "none");
	$("#control").attr("aria-hidden","true").hide();
	
	$("#connatales").removeClass("btn-default");
	$("#connatales").removeClass("active");
	$("#connatales").css("display", "none");
	$("#connatales").attr("aria-hidden","true").hide();
	
	$("#familiares").removeClass("btn-default");
	$("#familiares").removeClass("active");
	$("#familiares").css("display", "none");
	$("#familiares").attr("aria-hidden","true").hide();
	
	$("#antropometria").removeClass("btn-default");
	$("#antropometria").removeClass("active");
	$("#antropometria").css("display", "none");
	$("#antropometria").attr("aria-hidden","true").hide();
	
	$("#alimentacion").removeClass("btn-default");
	$("#alimentacion").removeClass("active");
	$("#alimentacion").css("display", "none");
	$("#alimentacion").attr("aria-hidden","true").hide();
	
	
	$("#auditiva").removeClass("btn-default");
	$("#auditiva").removeClass("active");
	$("#auditiva").css("display", "none");
	$("#auditiva").attr("aria-hidden","true").hide();
	
	$("#visual").removeClass("btn-default");
	$("#visual").removeClass("active");
	$("#visual").css("display", "none");
	$("#visual").attr("aria-hidden","true").hide();
	
	$("#compromiso").removeClass("btn-default");
	$("#compromiso").removeClass("active");
	$("#compromiso").css("display", "none");
	$("#compromiso").attr("aria-hidden","true").hide();
	
	$("#evaluacion").removeClass("btn-default");
	$("#evaluacion").removeClass("active");
	$("#evaluacion").css("display", "none");
	$("#evaluacion").attr("aria-hidden","true").hide();
	
	$("#vacunas").removeClass("btn-default");
	$("#vacunas").removeClass("active");
	$("#vacunas").css("display", "none");
	$("#vacunas").attr("aria-hidden","true").hide();
	
	$("#hospitalizacion").removeClass("btn-default");
	$("#hospitalizacion").removeClass("active");
	$("#hospitalizacion").css("display", "none");
	$("#hospitalizacion").attr("aria-hidden","true").hide();
	
	$("#perdida").removeClass("btn-default");
	$("#perdida").removeClass("active");
	$("#perdida").css("display", "none");
	$("#perdida").attr("aria-hidden","true").hide();
	
	$("#ficha").removeClass("btn-default");
	$("#ficha").removeClass("active");
	$("#ficha").css("display", "none");
	$("#ficha").attr("aria-hidden","true").hide();
	$("#ingresoControl").css("display", "block");
	 /*$(this).removeClass("btn-default"); 
	$(this).removeClass("active");
	$(this).css("display", "none");
	$(this).attr("aria-hidden","true").hide();
	control,connatales,familiares,antropometria,alimentacion,auditiva,
		  visual,compromiso,evaluacion,vacunas,hospitalizacion,perdida,ficha
	*/
	
	$("#link_ingreso").show();
	$("#ingreso").attr("aria-hidden","false").show;;
	$("#ingreso").css("display", "block");
	$("#ingreso").addClass("active");
	//alert("paso ");
}
window.onload = function() { 
if($('#fecha_control').val()!=''){
		cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fecha_control').val(),'DATOS_CONTROL');			
        cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fecha_control').val(),'DATOS_CONTROL');
	}
//$('#ingreso_control').val($('#fecha_control').val());
//$('#ingreso_control').prop('readonly', true);

if($("#idControl").val()=="-1"){
		$("#ingresoControl").css("display", "block");	
	}
	else {
		$("#ingresoControl").val("Guardar");	
		$("#ingresoControl").css("display", "block");	
	}


};


</script>
<div id="container" class="container">
  <!-- Inicio del Contenido -->
    <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">

      <div class="col-lg-10">
        <h2>Control de Seguimiento <label id="fechaLabel" name="message"> <?php echo $message; ?> </label></h2>
		<form name="controless" >
		
		<div class="col-lg-4">
		<select name="controles_activo" class="form-control input-sm" onchange="cambiarUrlOK(<?php echo $idNeocosur;?>);">
		<option value="0">Lista de Controles Según Protocolo</option>
		<option <?php echo $Sem40; ?>> 40 semanas</option>
		<option <?php echo $seis;   ?>>6 meses</option>
		<option <?php echo $doce;   ?>>12 meses</option>
		<option <?php echo $m18; ?> > 18 meses</option>
		<option <?php echo $m24; ?> >24 meses</option>
		<option <?php echo $m36; ?> >3 años</option>
		<option <?php echo $m48; ?> >4 años</option>
		<option <?php echo $m60; ?> >5 años</option>
		<option <?php echo $m72; ?> >6 años</option>
		<option <?php echo $m84; ?> >7 años</option>
			
                <?php //listarControlesActivos($retornoOk,"controles_activo");?>             
		</select>
		</div>
		<div class="col-lg-4"> 
				<select name="controles_nook" id ="controles_nook" class="form-control input-sm" onchange="cambiarUrlNoOK(<?php echo $idNeocosur;?>);">                
				 <option value="0">Lista de Controles Optativos</option>				 
					 <?php 					
					 listarControlesInactivos($retornoNoOk,"controles_nook");					 
					 ?>           
				</select>
		</div>
		<div class="col-lg-4"> 
				<a class="btn btn-success btn-xs" href="control.php?idNeocosur=<?php echo $idNeocosur; ?>&amp;idControl=" role="button">
				<span class="glyphicon glyphicon-plus" aria-hidden="true">  Nuevo Control</span>
				</a>
		</div>
		</form>
      </div>

    </div>

    <div id="tabs" class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
		<?php
		if($idControl=="" || $idControl=="-1"){
		?>
          <li role="presentation" <?php echo $ingreso; ?>  id="link_ingreso"  name ="link_ingreso" >
            <a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">
              Datos del Ingreso
            </a>
          </li>
		  <?php 
		  }
			else{	
		   ?>
		  <li role="presentation" <?php echo $ingreso; ?> id="link_ingreso"  name ="link_ingreso">
            <a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">
              Datos del Ingreso
            </a>
          </li>
          <li role="presentation" <?php echo $control; ?> id="link_control">
            <a href="#control" aria-controls="profile" role="tab" data-toggle="tab">
              Datos del Control
            </a>
          </li>
          <li role="presentation" <?php echo $connatales; ?> id="link_connatales">
            <a href="#connatales" aria-controls="profile" role="tab" data-toggle="tab">
              Antecedentes Connatales
            </a>
          </li>
          <li role="presentation" <?php echo $familiares; ?> id="link_familiares">
            <a href="#familiares" aria-controls="profile" role="tab" data-toggle="tab">
              Antecedentes Familiares a Seguimiento
            </a>
          </li>
          <li role="presentation" <?php echo $antropometria; ?> id="link_antro">
            <a href="#antropometria" aria-controls="profile" role="tab" data-toggle="tab">
              Antropometría
            </a>
          </li>
          <li role="presentation" <?php echo $alimentacion; ?> id="link_alimentacion">
            <a href="#alimentacion" aria-controls="profile" role="tab" data-toggle="tab">
              Alimentación
            </a>
          </li>
          <li role="presentation" <?php echo  $auditiva; ?> id="link_auditiva"  >
            <a href="#auditiva" aria-controls="profile" role="tab" data-toggle="tab">
              Función Auditiva
            </a>
          </li>
          <li role="presentation" <?php echo  $visual; ?> id="link_visual">
            <a href="#visual" aria-controls="profile" role="tab" data-toggle="tab">
              Función Visual
            </a>
          </li>
          <li role="presentation" <?php echo $compromiso; ?> id="link_compromiso">
            <a href="#compromiso" aria-controls="profile" role="tab" data-toggle="tab">
              Compromiso de Otros Sistemas
            </a>
          </li>
          <li role="presentation" <?php echo $evaluacion; ?> id="link_evaluacion" >
            <a href="#evaluacion" aria-controls="profile" role="tab" data-toggle="tab">
              Evaluación del Neurodesarrollo
            </a>
          </li>
          <li role="presentation" <?php echo $vacunas; ?> id="link_vacunas"  >
            <a href="#vacunas" aria-controls="profile" role="tab" data-toggle="tab">
              Vacunas
            </a>
          </li>
          <li role="presentationes" <?php echo $hospitalizacion; ?> id="link_hospitalizacion" >
            <a href="#hospitalizacion" aria-controls="profile" role="tab" data-toggle="tab">
              Hospitalizaciones del Período
            </a>
          </li>
          <li role="presentation" <?php echo  $perdida; ?> id="link_perdida" >
            <a href="#perdida" aria-controls="profile" role="tab" data-toggle="tab">
              Pérdida del Paciente
            </a>
          </li>
          <li role="presentation" <?php echo  $ficha; ?> id="link_ficha" >
            <a href="#ficha" aria-controls="profile" role="tab" data-toggle="tab">
              Datos de Ficha
            </a>
          </li>
		  <?php 
			}
		  ?>
        </ul>
      </div>
      <div class="col-lg-12">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="ingreso">
            <?php include 'seguimiento/datos_ingreso.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane"   id="control"> 
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
		  <div role="tabpanel" class="tab-pane" id="compromiso">
		  <?php include 'seguimiento/otros_sistemas.php'; ?>
          </div>
		  <div role="tabpanel" class="tab-pane" id="evaluacion">
		  <?php include 'seguimiento/neurodesarrollo.php'; ?>
          </div>		  
		  <div role="tabpanel" class="tab-pane" id="vacunas">
		  <?php include 'seguimiento/vacunas.php'; ?>
          </div>
		  <div role="tabpanel" class="tab-pane" id="hospitalizacion">
		  <?php include 'seguimiento/hospitalizaciones.php'; ?>
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

  if( $("#eco_renal").prop("checked") )
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
  
  // Malformación
// -------------------------------------------
 if( $("#malformacion_si").prop("checked") ) 
 {
    	var $input = $( this );
    	$("#cual_otro_conna").show();
    		$(".malformaciones").show();

		$("#cual_otro_conna").show();
		
	
    	
	} ; 
	
	if( $("#otros_conna").prop("checked")  )
    	{
    		$("cual_otro_conna").show();
    	};
if( $("#malformacion_no").prop("checked") ) 
	{
    	
    		$(".malformaciones").hide();
    		$("input[name*='malformaciones']").removeProp("checked");
    		$("textarea[name*='obs_malformaciones']").val("");
    	
	};
	
    	
		
	

});

</script>

</body>
</html>
