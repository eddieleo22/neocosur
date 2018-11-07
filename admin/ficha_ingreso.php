<?php 
session_start();
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/centroDAO.php';
include '../admin/capaEntidades/UserValidate.php';
include 'ayuda.php'; 

$validate= new UserValidate();


if($_SESSION['token']==''){
	
	salir($_SESSION["token"]);
}
if(isset($_GET["id_neocosur"]) && $_GET["id_neocosur"] !="")
{
	
	$validate->set_id($_GET["id_neocosur"]); 
		if($validate->get_error_list()){
			salir($_SESSION["token"]);
		}
}



/*
$letrasYNumeros = '#^[a-z]*[0-9][a-z0-9]*$#i';
$numeros = "/^[[:digit:]]+$/";
if($_GET["id_neocosur"]!=""){
		if(!(preg_match($numeros,$_GET["id_neocosur"]))==1){ 				
			salir($_SESSION["token"]);
		}
	}
*/
/*
include '../admin/capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);*/

$estado =$_SESSION["estado"];
$perfil=$_SESSION["perfil"];
$cone = new ConexionDAO();
$daoCentro= new centroDAO($cone);

//echo "id antes --> ".$_GET["id_neocosur"];
$id= isset($_GET["id_neocosur"]) !='' ? $cone->test_input($_GET["id_neocosur"]) : '-1';
$centrosPorFicha=$daoCentro->rescataNombrePorIdFicha($id);
$nombreCentroPorFicha=$centrosPorFicha["c_nombre"]!="" ? utf8_encode($centrosPorFicha["c_nombre"]) : "Ficha sin Centro asociado" ;
//var_dump($centrosPorFicha);
//$id= $filtro->process($id);
//echo " <br>id despues nuevo --> ".$cone->test_input($id);
//echo " <br>id despues --> ".addslashes(limpiarCadena($id));
//$id=addslashes(limpiarCadena($id));






function limpiarCadena($valor)
{
	$valor = str_ireplace("SELECT","",$valor);
	$valor = str_ireplace("COPY","",$valor);
	$valor = str_ireplace("DELETE","",$valor);
	$valor = str_ireplace("DROP","",$valor);
	$valor = str_ireplace("DUMP","",$valor);
	$valor = str_ireplace(" OR ","",$valor);
	$valor = str_ireplace("%","",$valor);
	$valor = str_ireplace("LIKE","",$valor);
	$valor = str_ireplace("--","",$valor);
	$valor = str_ireplace("^","",$valor);
	$valor = str_ireplace("[","",$valor);
	$valor = str_ireplace("]","",$valor);
	$valor = str_ireplace("\ ","",$valor);
	$valor = str_ireplace("!","",$valor);
	$valor = str_ireplace("¡","",$valor);
	$valor = str_ireplace("?","",$valor);
	$valor = str_ireplace("=","",$valor);
	$valor = str_ireplace("&","",$valor);
	$valor = str_ireplace("'","",$valor);
	return $valor;
}





if($_SESSION['id_responsable']==''){
	salir();
}
$url = $_GET["url"];


if($url=='ingreso'){
	$ingreso='class="active"';
}
else if ($url=='prenatales'){
	$prenatales='class="active"';
}
else if ($url=='parto'){
	$parto='class="active"';
}
else if ($url=='neonatales'){
	$neonatales=' active ';
}
else if ($url=='evolucion'){
	$evolucion=' active ';
}
else if ($url=='antropometria'){
	$antropometria=' active ';
}
else if ($url=='alta'){
	$alta='class="active"';
}
else if ($url=='estado'){
	$estado='class="active"';
}
else {
	$pintar='';
	$prenatales='';
}

 if($url==''){
	 $ingreso='class="active"';
 }
	 
 
include 'head.php'; 
?>
<script language="JavaScript" type ="text/javascript">

	function calc_scre()
     {
		var peso	= document.getElementById('peso').value;
		var edad	= document.getElementById('edad_gest').value;
		var apgar_1	= document.getElementById('apgar1').value;
		var sexo	= document.getElementById('genero').value;
		var c_cort_prenatal_SI = document.getElementById('cort_prenatal_si').checked;
		var c_cort_prenatal_NO = document.getElementById('cort_prenatal_no').checked;
		var c_cort_prenatal_SN = document.getElementById('cort_prenatal_s_i').checked;
		var c_cort_prenatal_incom = document.getElementById('completo_no').checked;
		var c_cort_prenatal_com = document.getElementById('completo_si').checked;
		var c_cort_prenatal_com_1c = document.getElementById('radio26_cort_com_1').checked;
		var c_cort_prenatal_com_mc = document.getElementById('radio26_cort_com_2').checked;
		var valor_reset     =   0;
		//var cort_mal_for =      null;
		//var usu_corticoides =      null;
		/*
		alert (
				"\n valor de c_cort_prenatal_SI ->  "+c_cort_prenatal_SI
			+	"\n valor de c_cort_prenatal_incom ->  "+c_cort_prenatal_incom
			+	"\n valor de c_cort_prenatal_com_1c ->  "+c_cort_prenatal_com_1c 
				
		
				); 		
				*/
			if (c_cort_prenatal_NO)
				{                	
                	usu_corticoides = 1;
                }
                 if (c_cort_prenatal_SI && c_cort_prenatal_incom)
                {
                	usu_corticoides = 3;
                }
                if (c_cort_prenatal_SI && c_cort_prenatal_com)
                {
					 
                		usu_corticoides = 2; 
                	
                }	
				if (c_cort_prenatal_SI && c_cort_prenatal_incom && c_cort_prenatal_com_mc)
                {
					usu_corticoides = 4; 
                	
                }
			
			var  c_malf_SI = document.getElementById('malformacion_si').checked;    
			var  c_malf_NO = document.getElementById('malformacion_no').checked;
			var  c_malf_cv_SI = document.getElementById('compromete_si').checked;    
			var  c_malf_cv_NO = document.getElementById('compromete_no').checked;
			/*	
			alert("  c_malf_SI " + c_malf_SI
				 + "\n c_malf_NO " +c_malf_NO			
				 + "\n c_malf_cv_SI " +c_malf_cv_SI			 		
				 + "\n c_malf_cv_NO " +c_malf_cv_NO			 		
				);*/
				
		if (c_malf_SI && c_malf_cv_SI){
 			cort_mal_for = 1;
 		}
 		else if ((c_malf_SI && c_malf_cv_NO)||c_malf_NO){
 			cort_mal_for = 0;
 		}
         // alert("\n cort_mal_for-> "+cort_mal_for);      
				//alert(sexo);
		
if (peso==0 || peso==null || apgar_1==null || edad==null  || edad==0 || cort_mal_for=='-1' || sexo==null || usu_corticoides==null || cort_mal_for==null)               
 {document.getElementById('score').value='';
                    return}
				
              //  if(peso		==null 	|| 	peso	==''){peso=0;}
              //  if(edad		==null 	|| 	edad	==''){edad=0;}
               // if(apgar_1	==null 	|| 	apgar_1	==''){apgar_1=0;}
               // if(sexo		==null 	||	sexo	==''){sexo=0;}

                if (sexo=='1'){sexo=0; calculo=1;}
                if (sexo=='2'){sexo=1; calculo=1;} //else{sexo=0;}
				if (sexo=='3'){sexo=0; calculo=1;}
              /*  if(document.getElementById('radio111').checked==true && document.getElementById('malf_congenita').checked==true)
                {if (document.getElementById('malf_congenita').checked==true){cort_mal_for=1;}else{cort_mal_for=0;}} */
				
                var Peso 			= peso ;			//MiForm.Peso.value;
                var EG 				= edad;				//MiForm.EG.value;
                var Apgar 			= apgar_1;			//MiForm.Apgar.value
                var MC 				= cort_mal_for;		//MiForm.MC.value
                var Esteroides 			= usu_corticoides;	//MiForm.Esteroides.value
                var Mujer 			= sexo;				//MiForm.Mujer.value
				
				//alert ('peso:'+ Peso + 'edad:'+ EG + 'Apgar1:' + Apgar + 'MC:'+ MC + 'est:' + Esteroides + 'sexo:'+ Mujer);
				//alert("\n Esteroides"+ Esteroides);
                if (Esteroides==null || valor_reset=='3')
                {document.getElementById('score').value='';
                    return}
	
				 // privado
                var x  				= Math.exp(8.378-((0.331*Peso)/100)-(0.132*EG)-(0.265*Apgar)+(3.419*MC)-(0.302*Esteroides)-(0.474*Mujer));
                // publico
                //var x  				= Math.exp(8.378-0.331*Peso/100-0.132*EG-0.265*Apgar+3.419*MC+3.419*MC-0.302*Esteroides-0.474*Mujer);
			  // var p  = (8.378-0.331*Peso/100-0.132*EG-0.265*Apgar+3.419*MC -0.302*Esteroides-0.474*Mujer);
               //alert ( p ); 
			   //var x  			= Math.exp(8.378-0.331*Peso/100-0.132*EG-0.265*Apgar+3.419*MC+3.419*MC-0.302*Esteroides-0.474*Mujer);
			   
                var tot				= ( 1000 * x / ( 1 + x ) ) / 1000;
                
                
				if (calculo==0){tot=''}  
				var total = tot.toString();
				var total = total.substring(0,5);
				//alert(tot);
					document.getElementById('score').value=	total;
	}


</script>
<div class="container">
  <!-- Inicio del Contenido -->
    <?php include 'header.php'; 
	
	
	?>
    <!-- Inicio de Título -->
    
    <div class="row">
        
      <div class="col-lg-10">
        <h2>Ficha de Ingreso</h2><h4><?php echo $nombreCentroPorFicha;?></h4>
		
      </div>
                
      <div class="col-lg-2"> 
      </div>
    </div>

    <div id="tabs" class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
          
		  <?php 
            if($id=='-1'){
           ?>
					<li role="presentation" class="active"><a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">Datos del Ingreso</a></li>
					
			<?php  } 
            else{
				
				?>
				
					<li role="presentation" <?php echo $ingreso; ?>><a href="#ingreso" aria-controls="profile" role="tab" data-toggle="tab">Datos del Ingreso</a></li>
					<li role="presentation" <?php echo $prenatales; ?> ><a href="#prenatales" aria-controls="profile" role="tab" data-toggle="tab">Antecedentes Prenatales</a></li>
					<li role="presentation" <?php echo $parto; ?> ><a href="#parto" aria-controls="messages" role="tab" data-toggle="tab">Atención Inmediata</a></li>
					<li role="presentation"  class="dinamico_fallece <?php echo $neonatales; ?>" ><a href="#neonatales" aria-controls="settings" role="tab" data-toggle="tab">Patologías Neonatales</a></li>
					<li role="presentation"   class="dinamico_fallece <?php echo $evolucion; ?> "><a href="#evolucion" aria-controls="settings" role="tab" data-toggle="tab">Evolución y Tratamiento</a></li>
					<li role="presentation"  class="dinamico_fallece <?php echo $antropometria; ?>"><a href="#antropometria" aria-controls="settings" role="tab" data-toggle="tab">Antropometría</a></li>
					<li role="presentation" <?php echo $alta; ?> ><a href="#alta" aria-controls="settings" role="tab" data-toggle="tab">Información del Alta</a></li>
					<li role="presentation" <?php echo $estado; ?> ><a href="#estado" aria-controls="settings" role="tab" data-toggle="tab">Estado de Ficha</a></li>
					<?php  }
            ?>
          
        </ul>
      </div>
      <div class="col-lg-12">
          
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="ingreso">
            <?php 
			
            if($id=='-1'){
				include 'ficha_ingreso/datos_ingreso.php'; 
            }
            else{
				include 'ficha_ingreso/datos_ingreso_d.php'; 
            }
            ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="prenatales">
            <?php 
            include 'ficha_ingreso/prenatales.php';            
            ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="parto">
            <?php include 'ficha_ingreso/parto.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="neonatales">
            <?php include 'ficha_ingreso/neonatales.php'; ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="evolucion">
            <?php include 'ficha_ingreso/evolucion.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="antropometria">
            <?php include 'ficha_ingreso/antropometria.php'; ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="alta">
            <?php include 'ficha_ingreso/alta.php'; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="estado">
            <?php include 'ficha_ingreso/estado.php'; ?>
          </div>

        </div>
      </form>
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
<script src="../js/admin/ficha_ingreso.js"></script>
<script src="../js/neocosur.js"></script>
<script>
  $( "#tabs" ).tabs();
  $('[data-toggle="tooltip"]').tooltip(); 
  
  jQuery(document).ready(function(){

  if( $( "#diabetes_si" ).prop("checked") )
  {
    $(".diabetes").show();
  };

  if( $( "#ht_art_si" ).prop("checked") )
  {
    $(".ht_art").show();
  };

  if( $( "#multiple_si" ).prop("checked") )
  {
    $(".multiple").show();
  };

  if( $( "#cort_prenatal_si" ).prop("checked") )
  {
    $(".cort_prenatal").show();

    if( $("#completo_si").prop( "checked" ) )
    {
      $(".completo").show();
    };
  };

  if( $( "#completo_si" ).prop("checked") )
  {
    $(".completo").show();
  };

  if( $("#malformacion_si").prop("checked") )
  {
    $(".compromete").show();
  };

  if( $("#compromete_si").prop("checked") )
  {
    $(".detalle_compromete").show();
  };

  if( $("#sistema_nervioso").prop("checked") )
  {
    $("#detalle_sistema_nervioso").show();
  };

  if( $("#cardiacos").prop("checked") )
  {
    $("#detalle_defectos_cardiacos").show();
  };

  if( $("#defectos_gastrointestinal").prop("checked") )
  {
    $("#detalle_defectos_gastrointestinal").show();
  };

  if( $("#detalle_compromete").prop("checked") )
  {
    $("#detalle_defectos_genitourinarios").show();
  };

  if( $("#cromosomica").prop("checked") )
  {
    $("#detalle_defectos_cromosomicas").show();
  };

  if( $("#otro_defecto").prop("checked") )
  {
    $("#cual_defecto").show();
    $("#detalle_defectos_otros").show();
  };

  if(  $("#fallece_sala_si").prop("checked") )
  {
    $(".dinamico_fallece").hide();
    $('#patologias_neonatales .sub-form').hide();
    $('#evolucion_tratamiento .sub-form').hide();
    $('#antropometria .sub-form').hide();
  };

  if(  $( "#hic_si" ).prop("checked") )
  {
    $(".hic_grado").show();
  };

  if( $("#alveolar_si").prop("checked") )
  {
    $(".cual_alveolar").show();
  };
      
  if( $( "#ductus_si" ).prop("checked") )
  {
    $(".ductus").show();
  };

  if( $( "#previa_alta_si" ).prop("checked") )
  {
    $(".tabla_previa_alta").show();
  };
      
  if( $( "#cirugia_izq_si" ).prop("checked") )
  {
    $("#detalle_cirugia_izq").show();
  };

  if($( "#cirugia_der_si" ).prop("checked") )
  {
    $("#detalle_cirugia_der").show();
  };

  if( $( "#sepsis_precoz_si" ).prop("checked") )
  {
    $("#detalle_sepsis_precoz").show();
  };

  if( $( "#sepsis_tardia_si" ).prop("checked") )
  {
    $("#detalle_sepsis_tardia").show();
  };
  if( $( "#pesquisa_si" ).prop("checked") )
  {
	  var $input = $(this);
	  if($("#emisiones").prop("checked")){
		  $("#emisiones_cel").show();
		  
	  }
	  if($("#peat_extendidos").prop("checked")){
		  $("#peat_extendidos_cel").show();
		  
	  }
	  if($("#peat_automatizados").prop("checked")){
		  $("#peat_automatizados_cel").show();
		  
	  }
    $("#tabla_auditivo").show();
	
  };
  

  if($( "#vm_convencional_si" ).prop("checked") )
  {
    $(".duracion_vm").show();
  };

  if( $( "#vm_alta_frecuencia_si" ).prop("checked") )
  {
    $(".duracion_vm_alta").show();
  };

  if( $( "#uso_oxigeno_si" ).prop("checked") )
  {
    $(".duracion_oxigeno").show();
  };

  if( $( "#cpap_si" ).prop("checked") )
  {
    $(".duracion_cpap").show();
  };

  if( $( "#vnni_si" ).prop("checked") )
  {
    $(".duracion_vnni").show();
  };

  if( $( "#surfactante_si" ).prop("checked") )
  {
    $(".detalle_surfactante").show();
  };

  if( $( "#indometacina_si" ).prop("checked") )
  {
    $(".detalle_indometacina").show();
  };

  if( $( "#tratamiento_apnea_si" ).prop("checked") )
  {
    $(".detalle_tratamiento_apnea").show();
  };

  if( $( "#arteria_si" ).prop("checked") )
  {
    $(".detalle_arteria").show();
  };

  if( $( "#vena_si" ).prop("checked") )
  {
    $(".detalle_vena").show();
  };

  if( $( "#venoso_central_si" ).prop("checked") )
  {
    $(".detalle_venoso_central").show();
  };

  if( $( "#percutaneo_si" ).prop("checked") )
  {
    $(".detalle_percutaneo").show();
  };

  if( $( ".detalle_cirugia" ).val()== "otro")
  {            
    $(parent).find(".detalle_cirugia_otro").show();
  };

  if( $( "#leche_si" ).prop("checked") )
  {
    $(".detalle_leche").show();
  };

  if( $( "#destino" ).val() == "domicilio" )
  {
    $(".detalle_destino_domicilio").show();
    $("#sec_fallece").hide();
  }
  else if ( $( "#destino" ).val() == 'fallece')
  {
    $("#sec_fallece").show();
    $(".detalle_destino_domicilio").hide();
  };

  if( $( "#autopsia_si" ).prop("checked") )
  {
    $(".resultado_autopsia").show();
  };

  if( $( "#paro_cardiorespiratorio" ).prop("checked") )
  {
    $(".causa_paro").show();
  };

  if( $( "#otra_causa_muerte" ).prop("checked") )
  {
    $(".detalle_otra_causa_muerte").show();
  };

  if( $( "#seleccion_responsable" ).val() == "otro" )
  {
    $("#responsable").val("");
    $("#responsable").removeProp("readonly");
  };

  if( $( "#doppler_fetal_si" ).prop("checked") )
  {
    $(".doppler_fetal").show();
  };

});
</script>

</body>
</html>

