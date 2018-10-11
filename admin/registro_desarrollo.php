<?php
session_start();
error_reporting(0);
include 'capaDAO/graficoCurvas.php';
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/IngresoDAO.php';
include 'ayuda.php';


if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}

include '../admin/capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);


$cone = new ConexionDAO();
$dao = new graficoCurvasDAO($cone);
$daoI =  new IngresoDAO($cone);

        $idControl = $cone->test_input($_GET['idControl']);
        $idControl =  $filtro->process($idControl);
        $idNeocosur = $cone->test_input($_GET['idNeocosur']);
        $idNeocosur = $filtro->process($idNeocosur);
		$centro = $cone->test_input($_GET['idCentro']);  
		$centro = $filtro->process($centro);
$fila = $daoI->buscarFichaId($idNeocosur);

$nombres =$fila['NOMBRES'];
$materno = $fila['APELLIDO_MATERNO'];
$paterno = $fila['APELLIDO_PATERNO'];
$fecha = $fila['FECHA_NACIMIENTO'];
$numero =$fila['NUMERO_FICHA_MEDICA'];
$rut =$fila['RUT_DNI'];
$edad =$fila ['EDAD_GESTACIONAL'];
$responsable = $fila['ID_RESPONSABLE_INGRESO_DATOS'];
$peso =$fila['PESO_NACIMIENTO'];
$talla = $fila['TALLA_NACIMIENTO'];
$craneo = $fila['CIRC_CRANEO_NACIMIENTO'];
$apgar1 = $fila['APGAR_1'];
$apgar5 = $fila['APGAR_5'];
$edadGest=$fila['EDAD_GESTACIONAL'];
$genero = $fila['ID_GENERO'];
if($genero==1){
	$genero_get ='MASCULINO';
}
else if ($genero==2){
	$genero_get ='FEMENINO';
}
else if ($genero==3){
	$genero_get ='AMBIGUO';
}
$presentacion=$fila['ID_PRESENTACION'];
$tipoParto=$fila['ID_TIPO_PARTO'];
$estado= $fila['ID_ESTADO_FICHA'];

if($genero_get == 'MASCULINO')
{
	$call_scripts = "window.onload=inicio_ninos;";
}else
{
	if ($genero_get == 'FEMENINO'){
		$call_scripts = "window.onload=inicio_ninas;";
	}else{
		
		if($genero_get=='AMBIGUO'){
			$call_scripts =  "window.onload=inicio_ninos;";	
			
		}
	}
}

#longitud/estatura x edad
$sql_long_estat_edad_hasta_2 = $dao->queryCurvas_Longitud_Edad($idNeocosur,$centro);
$sql_long_estat_edad_hasta_2_v2 = $dao->queryCurvas_Longitud_Edad($idNeocosur,$centro);
$sql_long_estat_edad_hasta_2_v2_m = $dao->queryCurvas_Longitud_Edad($idNeocosur,$centro);
$sql_long_estat_edad_hasta_2_v2_mz = $dao->queryCurvas_Longitud_Edad($idNeocosur,$centro);

// TALLA POR EDAD  2 a 5 

$sql_long_estat_edad_2_a_5 = $dao->queryCurvas_Talla_Edad($idNeocosur,$centro);
$sql_long_estat_edad_2_a_5_v2_m = $dao->queryCurvas_Talla_Edad($idNeocosur,$centro);
$sql_long_estat_edad_2_a_5_v2_zm = $dao->queryCurvas_Talla_Edad($idNeocosur,$centro);

//echo $long_estat_edad_2_a_5;

#peso x edad
$sql_peso_edad_hasta_2 = $dao->queryCurvasPesoEdad($idNeocosur,$centro);
$sql_peso_edad_hasta_2_v2 = $dao->queryCurvasPesoEdad($idNeocosur,$centro);
$sql_peso_edad_hasta_2_v2_m = $dao->queryCurvasPesoEdad($idNeocosur,$centro);
$sql_peso_edad_hasta_2_v2_zm = $dao->queryCurvasPesoEdad($idNeocosur,$centro);

$sql_peso_edad_de_2_a_5 = $dao->queryCurvas_Peso_Edad_2_5($idNeocosur,$centro);
$sql_peso_edad_de_2_a_5_v2_m = $dao->queryCurvas_Peso_Edad_2_5($idNeocosur,$centro);
$sql_peso_edad_de_2_a_5_v2_mz = $dao->queryCurvas_Peso_Edad_2_5($idNeocosur,$centro);
 
$sql_peso_edad_menos_5 = $dao->queryCurvasPeso_edad_menos_5($idNeocosur,$centro);
$sql_peso_edad_menos_5_v2_m = $dao->queryCurvasPeso_edad_menos_5($idNeocosur,$centro);

#peso_x_longitud 2 años 

$sql_peso_x_longitud = $dao->queryCurvasPeso_x_Estatura_2anios($idNeocosur,$centro);
$sql_peso_x_longitud_v2 = $dao->queryCurvasPeso_x_Estatura_2anios($idNeocosur,$centro);
$sql_peso_x_longitud_v2_mz = $dao->queryCurvasPeso_x_Estatura_2anios($idNeocosur,$centro);
$sql_peso_x_longitud_v2_m = $dao->queryCurvasPeso_x_Estatura_2anios($idNeocosur,$centro);

#peso x estatura
$sql_peso_x_estatura = $dao->queryCurvasPeso_x_Estatura($idNeocosur,$centro);
$sql_peso_x_estatura_v2_m = $dao->queryCurvasPeso_x_Estatura($idNeocosur,$centro);
$sql_peso_x_estatura_v2_mz = $dao->queryCurvasPeso_x_Estatura($idNeocosur,$centro);


#IMC x edad
$sql_IMC_x_edad = $dao->queryCurvas_IMC_Edad($idNeocosur,$centro);
$sql_IMC_x_edad_v2 = $dao->queryCurvas_IMC_Edad($idNeocosur,$centro);
$sql_IMC_x_edad_v2_m = $dao->queryCurvas_IMC_Edad($idNeocosur,$centro);
$sql_IMC_x_edad_v2_mz = $dao->queryCurvas_IMC_Edad($idNeocosur,$centro);

#CC x edad
$sql_CC_x_edad = $dao->queryCurvas_CC_x_edad($idNeocosur,$centro);
$sql_CC_x_edad_v2_m = $dao->queryCurvas_CC_x_edad($idNeocosur,$centro);

/**************************************************************************/
# inicio query peso_edad_hasta_2 
	$cont_peso_edad_hasta_2=Peso_Edad_Percentiles_Nac_a_2_ninos($sql_peso_edad_hasta_2);
	//fin while
# fin query peso_edad_hasta_2
# inicio query peso_edad_hasta_2 Puntuación
	$cont_peso_edad_hasta_2z=Peso_Edad_Puntuacion_Nac_a_2_ninos($sql_peso_edad_hasta_2);
# fin query peso_edad_hasta_2

# inicio query peso_edad_de_2_a_5 
	$cont_peso_edad_de_2_a_5=Peso_Edad_Percentiles_2a5_ninos($sql_peso_edad_de_2_a_5) ;
# fin query peso_edad_de_2_a_5

# inicio query peso_edad_de_2_a_5 Puntuación
	$cont_peso_edad_de_2_a_5z = Peso_Edad_Puntuacion_2a5_ninos($sql_peso_edad_de_2_a_5);
# fin query peso_edad_de_2_a_5

# inicio query peso_edad_menos_5 
	$cont_peso_edad_menos_5=Peso_Edad_Percentiles_Nac_a_5_ninos($sql_peso_edad_menos_5);
# fin query peso_edad_menos_5


/*Fin de las querys peso_edad */
/*Se realizan los querys para longitud/estatura x edad */
////echo "<pre>".$long_estat_edad_hasta_2."</pre>".mysql_error();
//echo "<pre>".$long_estat_edad_2_a_5."</pre>".mysql_error();

# inicio query long_estat_edad_2_a_5 
	$cont_long_estat_edad_2_a_5=Estatura_Edad_Percentiles_2a5_Nino($sql_long_estat_edad_2_a_5);
# fin query long_estat_edad_2_a_5


# inicio query long_estat_edad_2_a_5 Puntuación
	$cont_long_estat_edad_2_a_5z=Estatura_Edad_Puntuacion_2a5_Nino($sql_long_estat_edad_2_a_5);
# fin query long_estat_edad_2_a_5

# inicio query long_estat_edad_hasta_2 
	$cont_long_estat_edad_hasta_2=Longitud_edad_Percentiles_Nac_Ninos($sql_long_estat_edad_hasta_2);
# fin query long_estat_edad_hasta_2


# inicio query long_estat_edad_hasta_2 Puntuación
	$cont_long_estat_edad_hasta_2z=Longitud_edad_Puntuacion_Nac_Ninos($sql_long_estat_edad_hasta_2_v2);
	//fin while
# fin query long_estat_edad_hasta_2

/*Fin de las querys longitud/estatura x edad */
/**************************************************************************/
/**************************************************************************/
/*Se realizan los querys para peso_x_longitud */
	$cont_peso_x_longitud=Peso_Longitud_Percentiles_Nac_2_Ninos($sql_peso_x_longitud);
# fin query peso_x_longitud

# inicio query peso_x_longitud Puntuación
	$cont_peso_x_longitudz=Peso_Longitud_Puntuacion_Nac_2_Ninos($sql_peso_x_longitud);
# fin query peso_x_longitud
# inicio query peso_x_longitud 
	$cont_peso_x_estatura=Peso_Estatura_Percentiles_2a5_Ninos($sql_peso_x_estatura);
# fin query peso_x_estatura
# inicio query peso_x_longitud Puntuación 
	$cont_peso_x_estaturaz=Peso_Estatura_Puntuacion_2a5_Ninos($sql_peso_x_estatura);
# fin query peso_x_estatura 
# inicio query IMC_x_edad 
	$cont_IMC_x_edad=IMC_Edad_Percentiles_Nac_5_Ninos($sql_IMC_x_edad);
# fin query IMC_x_edad
# inicio query IMC_x_edad Puntuación 
	$cont_IMC_x_edadz=IMC_Edad_Puntuacion_Nac_5_Ninos($sql_IMC_x_edad_v2);
# fin query IMC_x_edad
# inicio query CC_x_edad 
	$cont_CC_x_edad=CC_Edad_Puntuacion_Ninos($sql_CC_x_edad);
# fin query CC_x_edad

///********** MUJERES ** **************/// 

/************************** ********************************/
# inicio query peso_edad_hasta_2 mujer
	$cont_peso_edad_hasta_2m=Peso_Edad_Percentiles_Nac_a_2_ninas();
# fin query peso_edad_hasta_2

# inicio query peso_edad_hasta_2 Puntuación
	$cont_peso_edad_hasta_2zm=Peso_Edad_Puntuacion_Nac_a_2_ninas($sql_peso_edad_hasta_2_v2_zm);
# fin query peso_edad_hasta_2

# inicio query peso_edad_de_2_a_5 
$cont_peso_edad_de_2_a_5m=Peso_Edad_Percentiles_2a5_ninas($sql_peso_edad_de_2_a_5_v2_m); 
# fin query peso_edad_de_2_a_5
# inicio query peso_edad_de_2_a_5 Puntuación
	$cont_peso_edad_de_2_a_5zm =  Peso_Edad_Puntuacion_2a5_ninas($sql_peso_edad_de_2_a_5_v2_mz);
# fin query peso_edad_de_2_a_5 

# inicio query peso_edad_menos_5 
	$cont_peso_edad_menos_5m= Peso_Edad_Percentiles_Nac_a_5_ninas($sql_peso_edad_menos_5_v2_m) ;
# fin query peso_edad_menos_5
/*Fin de las querys peso_edad */ 

/**************************************************** ********/
# inicio query long_estat_edad_2_a_5 
	$cont_long_estat_edad_2_a_5m= Estatura_Edad_Percentiles_2a5_Nina($sql_long_estat_edad_2_a_5_v2_m)  ;
# fin query long_estat_edad_2_a_5

# inicio query long_estat_edad_2_a_5 Puntuación

	
	$cont_long_estat_edad_2_a_5zm= Estatura_Edad_Puntuacion_2a5_Nina($sql_long_estat_edad_2_a_5_v2_zm);

# inicio query long_estat_edad_hasta_2 	
	$cont_long_estat_edad_hasta_2m =Longitud_edad_Percentiles_Nac_Ninas($sql_long_estat_edad_hasta_2_v2_m)   ;
# fin query long_estat_edad_hasta_2

# inicio query long_estat_edad_hasta_2 Puntuación
	$cont_long_estat_edad_hasta_2zm =Longitud_edad_Puntuacion_Nac_Ninas($sql_long_estat_edad_hasta_2_v2_mz)   ;
# fin query long_estat_edad_hasta_2

/*Fin de las querys longitud/estatura x edad */
/**************************************************************************/

# inicio query peso_x_longitud 	
	$cont_peso_x_longitudm = Peso_Longitud_Percentiles_Nac_2_Ninas($sql_peso_x_longitud_v2_m);
# fin query peso_x_longitud

# inicio query peso_x_longitud Puntuación
	$cont_peso_x_longitudzm =Peso_Longitud_Puntuacion_Nac_2_Ninas($sql_peso_x_longitud_v2_mz) ;
# fin query peso_x_longitud
# inicio query peso_x_longitud 
	$cont_peso_x_estaturam = Peso_Estatura_Percentiles_2a5_Ninas($sql_peso_x_estatura_v2_m) ;
# fin query peso_x_estatura
# inicio query peso_x_longitud Puntuación
	$cont_peso_x_estaturazm =Peso_Estatura_Puntuacion_2a5_Ninas($sql_peso_x_estatura_v2_mz);
# fin query peso_x_estatura

# inicio query IMC_x_edad 	
	$cont_IMC_x_edadm  =  IMC_Edad_Percentiles_Nac_5_Ninas($sql_IMC_x_edad_v2_m) ;
# fin query IMC_x_edad

# inicio query IMC_x_edad Puntuación
	$cont_IMC_x_edadzm = IMC_Edad_Puntuacion_Nac_5_Ninas($sql_IMC_x_edad_v2_mz) ;
# fin query IMC_x_edad
# inicio query CC_x_edad $sql_IMC_x_edad
	$cont_CC_x_edadm =  CC_Edad_Puntuacion_Ninas($sql_CC_x_edad_v2_m);
# fin query CC_x_edad

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta  http-equiv ="Content-Type" content ="text/html; charset=utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registro antropom&eacute;trico</title>
        <script language="JavaScript" src="scripts/scripts.js"></script>
        <script type="text/javascript" src="scripts/jquery-1.js"></script><!-- Simpletip-->
        <script language="javascript" src="scripts/listaAyudas.js" type="text/javascript"></script>
        <script language="javascript" src="scripts/vtip.js" type="text/javascript"></script>
        <script language="javascript" src="scripts/raphael-min.js" type="text/javascript"></script>
        <script type="text/javascript" src="scripts/niftycube.js"></script>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link href="css/niftyCorners.css" rel="stylesheet" type="text/css">
		 <script type="text/javascript" src="scripts/niftycube.js"></script>
		 <style type="text/css">
          
        </style>
<?php 
//echo "Juaaaaaan";
//
//die();
//?>        
        <script language="JavaScript">

function abrirDiv2(nombre) {
	
   eldiv = document.getElementById(nombre);
   eldiv.style.display = 'block';  // para desplegar (none para ocultar)
}

/**************************************************************************/
/*Se realizan los scripts para peso_edad  de niños y niñas*/


		var paper_1;
		
		function Peso_Edad_Percentiles_2a5_ninas()
		{
			console.log("\n **  Peso_Edad_Percentiles_2a5_ninas **\n");
                Nifty("div#encabezado_tabla","medium");
                AplicarCebra();
				paper_1 = Raphael(["notepad_1", 800, 500,  {
				type: "image",
				src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_2a5_ninas.jpg",
				x: 0, 
				y: 0,
				width: 800,
				height: 500
			},
			<?php  
				  foreach ($cont_peso_edad_de_2_a_5m as $key ) {
						echo ",";
						echo json_encode($key);
					};
			       
			?>
			
				]);	
		}



		function Peso_Edad_Percentiles_Nac_a_2_ninas()
		{
				console.log("\n **  Peso_Edad_Percentiles_Nac_a_2_ninas **\n");
                Nifty("div#encabezado_tabla","medium");
				
				paper_1 = Raphael(["notepad_2", 800, 500,  {
				type: "image",
				src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_Nac_a_2_ninas.jpg",
				x: 0, 
				y: 0,
				width: 800,
				height: 500
			},
			<?php  
				  foreach ($cont_peso_edad_hasta_2m as $key ) {
						echo ",";
						echo json_encode($key);
					};
			?>
				]);	
				
            }


			function Peso_Edad_Percentiles_Nac_a_5_ninas()
			{
				console.log("\n **  Peso_Edad_Percentiles_Nac_a_5_ninas **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_3", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_Nac_a_5_ninas.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_menos_5m as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}	

			function Peso_Edad_Puntuacion_2a5_ninas()
			{
					console.log("\n **  Peso_Edad_Percentiles_Nac_a_5_ninas **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_4", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Puntuacion_2a5_ninas.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_de_2_a_5zm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}

			function Peso_Edad_Puntuacion_Nac_a_2_ninas()
			{
				console.log("\n **  Peso_Edad_Puntuacion_Nac_a_2_ninas **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_5", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Puntuacion_Nac_a_2_ninas.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_hasta_2zm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}											
/*************************/
/*Para Niños*/

		function Peso_Edad_Percentiles_2a5_ninos()
		{
				console.log("\n **  Peso_Edad_Percentiles_2a5_ninos **\n");
                Nifty("div#encabezado_tabla","medium");
                AplicarCebra();
				
				paper_1 = Raphael(["notepad_1", 800, 500,  {
				type: "image",
				src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_2a5_ninos.jpg",
				x: 0, 
				y: 0,
				width: 800,
				height: 500
			},
			<?php  
				  foreach ($cont_peso_edad_de_2_a_5 as $key ) {
						echo ",";
						echo json_encode($key);
					};
			?>

				]);	
		}
		
				

		function Peso_Edad_Percentiles_Nac_a_2_ninos()
		{
				console.log("\n **  Peso_Edad_Percentiles_Nac_a_2_ninos  **\n");
                Nifty("div#encabezado_tabla","medium");
                AplicarCebra();
				
				paper_1 = Raphael(["notepad_2", 800, 500,  {
				type: "image",
				src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_Nac_a_2_ninos.jpg",
				x: 0, 
				y: 0,
				width: 800,
				height: 500
			},
			<?php  
				  foreach ($cont_peso_edad_hasta_2 as $key ) {
						echo ",";
						echo json_encode($key);
					};
			?>

				]);	
				
            }


			function Peso_Edad_Percentiles_Nac_a_5_ninos()
			{
					console.log("\n **  Peso_Edad_Percentiles_Nac_a_5_ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_3", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Percentiles_Nac_a_5_ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_menos_5 as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}	

			function Peso_Edad_Puntuacion_2a5_ninos()
			{
					console.log("\n **  Peso_Edad_Puntuacion_2a5_ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_4", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Puntuacion_2a5_ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_de_2_a_5z as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}

			function Peso_Edad_Puntuacion_Nac_a_2_ninos()
			{
					console.log("\n **  Peso_Edad_Puntuacion_Nac_a_2_ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_5", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_edad/Peso_Edad_Puntuacion_Nac_a_2_ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_edad_hasta_2z as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}											




/*scripts de longitud-estatura x edad */
//inicio longitud-estatura x edad	
		//var paper_1;

	//niñas		
			function Estatura_Edad_Percentiles_2a5_Nina()
			{
					console.log("\n **  Estatura_Edad_Percentiles_2a5_Nina  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_6", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Estatura_Edad_Percentiles_2a5_Nina.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_2_a_5m as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
				
			function Estatura_Edad_Puntuacion_2a5_Nina()
			{
					console.log("\n **  Estatura_Edad_Puntuacion_2a5_Nina  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_7", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Estatura_Edad_Puntuacion_2a5_Nina.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_2_a_5zm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
			function Longitud_edad_Percentiles_Nac_Ninas()
			{
					console.log("\n **  Longitud_edad_Percentiles_Nac_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_8", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Longitud_edad_Percentiles_Nac_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_hasta_2m as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
				
			function Longitud_edad_Puntuacion_Nac_Ninas()
			{
					console.log("\n **  Longitud_edad_Puntuacion_Nac_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_9", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Longitud_edad_Puntuacion_Nac_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_hasta_2zm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}	

																
	//niños
	
			function Estatura_Edad_Percentiles_2a5_Nino()
			{
					console.log("\n **  Estatura_Edad_Percentiles_2a5_Nino  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_6", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Estatura_Edad_Percentiles_2a5_Nino.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_2_a_5 as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}

			function Estatura_Edad_Puntuacion_2a5_Nino()
			{
					console.log("\n **  Estatura_Edad_Puntuacion_2a5_Nino  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_7", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Estatura_Edad_Puntuacion_2a5_Nino.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_2_a_5z as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
			function Longitud_edad_Percentiles_Nac_Ninos()
			{
					console.log("\n **  Longitud_edad_Percentiles_Nac_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_8", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Longitud_edad_Percentiles_Nac_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_long_estat_edad_hasta_2 as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}

																						
	
			function Longitud_edad_Puntuacion_Nac_Ninos()
			{
					console.log("\n **  Longitud_edad_Puntuacion_Nac_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_9", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/longitud_estatura/Longitud_edad_Puntuacion_Nac_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
				//var_dump($cont_long_estat_edad_hasta_2z);
					  foreach ($cont_long_estat_edad_hasta_2z as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}	
	
					
//fin longitud-estatura x edad	


// inicio de peso x longitud

	//niñas
			function Peso_Longitud_Percentiles_Nac_2_Ninas()
			{
					console.log("\n **  Peso_Longitud_Percentiles_Nac_2_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_10", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_longitud/Peso_Longitud_Percentiles_Nac_2_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_longitudm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
				
			function Peso_Longitud_Puntuacion_Nac_2_Ninas()
			{
					console.log("\n **  Peso_Longitud_Puntuacion_Nac_2_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_11", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_longitud/Peso_Longitud_Puntuacion_Nac_2_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_longitudzm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}				
	
	
	//niños
			function Peso_Longitud_Percentiles_Nac_2_Ninos()
			{
					console.log("\n **  Peso_Longitud_Percentiles_Nac_2_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_10", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_longitud/Peso_Longitud_Percentiles_Nac_2_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					
					  foreach ($cont_peso_x_longitud as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					console.log("\n **  PASO CTM !!! >>>____ Peso_Longitud_Percentiles_Nac_2_Ninos  **\n");
					
				}
				
			function Peso_Longitud_Puntuacion_Nac_2_Ninos()
			{
					console.log("\n **  Peso_Longitud_Puntuacion_Nac_2_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_11", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_longitud/Peso_Longitud_Puntuacion_Nac_2_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_longitudz as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}					
	
 	
// fin de peso x longitud	



// inicio de peso x estatura

		//niña
			function Peso_Estatura_Percentiles_2a5_Ninas()
			{
					console.log("\n **  Peso_Estatura_Percentiles_2a5_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_12", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_estatura/Peso_Estatura_Percentiles_2a5_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_estaturam as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
			function Peso_Estatura_Puntuacion_2a5_Ninas()
			{
					console.log("\n **  Peso_Estatura_Puntuacion_2a5_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_13", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_estatura/Peso_Estatura_Puntuacion_2a5_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_estaturazm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}				
				


		//niño
			function Peso_Estatura_Percentiles_2a5_Ninos()
			{
					console.log("\n **  Peso_Estatura_Percentiles_2a5_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_12", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_estatura/Peso_Estatura_Percentiles_2a5_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_estatura as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}											

			function Peso_Estatura_Puntuacion_2a5_Ninos()
			{
					console.log("\n **  Peso_Estatura_Puntuacion_2a5_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_13", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/peso_estatura/Peso_Estatura_Puntuacion_2a5_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_peso_x_estaturaz as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}


//fin de peso x estatura


//inicio IMC
	//niñas
			function IMC_Edad_Percentiles_Nac_5_Ninas()
			{
					console.log("\n **  IMC_Edad_Percentiles_Nac_5_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_14", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/imc/IMC_Edad_Percentiles_Nac_5_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_IMC_x_edadm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}	
				
				
			function IMC_Edad_Puntuacion_Nac_5_Ninas()
			{
					console.log("\n **  IMC_Edad_Puntuacion_Nac_5_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_15", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/imc/IMC_Edad_Puntuacion_Nac_5_Ninas.jpg",
																	  
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_IMC_x_edadzm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}				

	//niños	
			function IMC_Edad_Percentiles_Nac_5_Ninos()
			{
					console.log("\n **  IMC_Edad_Percentiles_Nac_5_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_14", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/imc/IMC_Edad_Percentiles_Nac_5_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_IMC_x_edad as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}

			function IMC_Edad_Puntuacion_Nac_5_Ninos()
			{
					console.log("\n **  IMC_Edad_Puntuacion_Nac_5_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_15", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/imc/IMC_Edad_Puntuacion_Nac_5_Ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_IMC_x_edadz as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
				
//fin IMC
		//Inicio CC
		
			function CC_Edad_Puntuacion_Ninas()
			{
					console.log("\n **  CC_Edad_Puntuacion_Ninas  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_16", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/circunferencia_craneo/cc01_ninas.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_CC_x_edadm as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
		
			function CC_Edad_Puntuacion_Ninos()
			{
					console.log("\n **  CC_Edad_Puntuacion_Ninos  **\n");
					Nifty("div#encabezado_tabla","medium");
					AplicarCebra();
					
					paper_1 = Raphael(["notepad_16", 800, 500,  {
					type: "image",
					src: "images/imagenes_curvas/circunferencia_craneo/cc01_ninos.jpg",
					x: 0, 
					y: 0,
					width: 800,
					height: 500
				},
				<?php  
					  foreach ($cont_CC_x_edad as $key ) {
							echo ",";
							echo json_encode($key);
						};
				?>
	
					]);	
					
				}
				
//fin CC

	
			function inicio_ninas(){
			
				Peso_Edad_Percentiles_2a5_ninas(); 
				Peso_Edad_Percentiles_Nac_a_2_ninas();
				Peso_Edad_Percentiles_Nac_a_5_ninas();
				Peso_Edad_Puntuacion_2a5_ninas();
				Peso_Edad_Puntuacion_Nac_a_2_ninas();
				
				//talla x edad
				Estatura_Edad_Percentiles_2a5_Nina();
				Estatura_Edad_Puntuacion_2a5_Nina();
				Longitud_edad_Percentiles_Nac_Ninas();
				Longitud_edad_Puntuacion_Nac_Ninas();
				
				//peso x longitud
				Peso_Longitud_Percentiles_Nac_2_Ninas();
				Peso_Longitud_Puntuacion_Nac_2_Ninas();
				
				//peso x estatura
				Peso_Estatura_Percentiles_2a5_Ninas();
				Peso_Estatura_Puntuacion_2a5_Ninas();
				
				//IMC x edad
				IMC_Edad_Percentiles_Nac_5_Ninas();
				IMC_Edad_Puntuacion_Nac_5_Ninas();
				
				//Circunferencia craneana
				CC_Edad_Puntuacion_Ninas();

			}
			
			function inicio_ninos(){
				console.log("\n **  inicio_ninos  **\n");
				//peso edad
				Peso_Edad_Percentiles_2a5_ninos();
				Peso_Edad_Percentiles_Nac_a_2_ninos();
				Peso_Edad_Percentiles_Nac_a_5_ninos();
				Peso_Edad_Puntuacion_2a5_ninos();
				Peso_Edad_Puntuacion_Nac_a_2_ninos();
				
				//talla x edad
				Estatura_Edad_Percentiles_2a5_Nino();
				Estatura_Edad_Puntuacion_2a5_Nino();
				Longitud_edad_Percentiles_Nac_Ninos();
				Longitud_edad_Puntuacion_Nac_Ninos();
				
				//peso x longitud
				Peso_Longitud_Percentiles_Nac_2_Ninos();
				Peso_Longitud_Puntuacion_Nac_2_Ninos();
				
				//peso x estatura
				Peso_Estatura_Percentiles_2a5_Ninos();
				Peso_Estatura_Puntuacion_2a5_Ninos();
				
				//IMC x edad
				IMC_Edad_Percentiles_Nac_5_Ninos();
				IMC_Edad_Puntuacion_Nac_5_Ninos();
				
				//Circunferencia craneana
				CC_Edad_Puntuacion_Ninos();

			}
			
			//window.onload=inicio_ninos;
			
			<?php echo $call_scripts;?>

/**************************************************************************/
/*Termino de los scripts para peso_edad niño y niña */			


        </script> 



           
        <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            <!--
            div#encabezado_tabla {
                width:100%;
                font-weight:bold;
                color:#FFF;
                background-color:#0065a8;
                padding:1px;
                text-align: center;
                line-height: 24px;}
            .point {
                width: 5px;
                height: 5px;
                overflow: hidden;
                background-color: #008000;
                position: absolute;
            }
.negrita {
	font-weight: bold;
}
#wrapper_registro #form1 #encabezado_tabla #content_listado div table tr td .TablaCebra tr td {
	font-weight: bold;
}

            -->
        </style>
    </head>
<body>

        <div id="wrapper_registro">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="titulo_ficha">Registro antropom&eacute;trico</td>
                    <td width="140" align="right"><img src="../img/neocosur.jpg" width="140" height="33" alt="Neocosur" /></td>
                </tr>
            </table>
            <form id="form1" name="F" method="post" action="">
                <div class="saber">&nbsp;Imprimir<a href="javascript:window.print();"><img src="images/print.png" alt="Imprimir" width="16" height="16" hspace="3" border="0"/></a></div>
                <br />
                <div id="encabezado_tabla">REGISTRO HIST&Oacute;RICO DEL PACIENTE
                    <div class="texto" id="content_listado">
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td width="130">Nombres:</td>
                                <td width="230"><?php echo($nombres); ?></td>
                                <td width="160">Apellido Paterno:</td>
                                <td><?php echo ($paterno); ?></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno:</td>
                                <td><?php echo ($materno); ?></td>
                                <td>Fecha de nacimiento:</td>
                                <td><?php echo ($fecha); ?></td>
                            </tr>
                            <tr>
                                <td>Identificador Neocosur:</td>
                                <td><?php echo ($idNeocosur); ?><img src="images/help.png" width="16" height="16" align="absmiddle" class="vtip" id="help_5"/></td>
                                <td> </td>
                                <td> </td>
                            </tr>
                             <tr>
                                <td>G&eacute;nero:</td>
                                <td><?php echo ($genero_get); ?></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table><div align="center">
                            <br />
                            <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td bgcolor="#83B6E9"><table width="100%" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
									
                                            <tr>
                                                <td width="110" bgcolor="#D5E6F7"><strong>Edad</strong> <span class="negrita">corregida</span></td>
                                                <td width="110" valign="middle" bgcolor="#D5E6F7"><strong>Edad</strong> Cronológica<br/></td>
                                              <td width="70" align="center" bgcolor="#D5E6F7"><strong>Peso</strong></td>
                                                <td width="80" align="center" bgcolor="#D5E6F7"><strong>Talla</strong></td>
                                                <td width="80" align="center" bgcolor="#D5E6F7"><strong>Cir. Craneana</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>Calificaci&oacute;n OMS</strong></td>
                                                <td width="70" align="center" bgcolor="#D5E6F7"><strong>IMC</strong></td>
                                            </tr>

                                            <?php

											
											$result=$dao->queryTabla($idNeocosur);
											
                                            //Debug::dump($sql);
                                            $points = array(); 
											$rs0 =$result->fetch_assoc();
											if($rs0["TALLA_7_DIAS"]!=""){
												?>
  <tr>
			  
								<td valign='top'>7 días</td>
                                <td valign='top'><?php //echo $edad_ano_corre ." ". $edad_mes_corre; ?></td>
								<td align='center' valign='top'><?php echo $rs0["PESO_7_DIAS"]; ?>g.</td>
								<td align='center' valign='top'><?php echo $rs0["TALLA_7_DIAS"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $rs0["CIRC_CRANEO_7_DIAS"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $oms; ?></td>
								<td align='center' valign='top'><?php echo $imc; ?></td>
				
			              </tr>
<?
}
											if($rs0["TALLA_28_DIAS"]!=""){
?>
  <tr>
			  
								<td valign='top'>28 días</td>
                                <td valign='top'><?php //echo $edad_ano_corre ." ". $edad_mes_corre; ?></td>
								<td align='center' valign='top'><?php echo $rs0["PESO_28_DIAS"]; ?>g.</td>
								<td align='center' valign='top'><?php echo $rs0["TALLA_28_DIAS"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $rs0["CIRC_CRANEO_28_DIAS"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $oms; ?></td>
								<td align='center' valign='top'><?php echo $imc; ?></td>
				
			              </tr>
												<?
												}

											if($rs0["TALLA_36_SEM"]!=""){
												?>
  <tr>
			  
								<td valign='top'>36 días</td>
                                <td valign='top'><?php //echo $edad_ano_corre ." ". $edad_mes_corre; ?></td>
								<td align='center' valign='top'><?php echo $rs0["TALLA_36_SEM"]; ?>g.</td>
								<td align='center' valign='top'><?php echo $rs0["PESO_36_SEM"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $rs0["CIRC_CRANEO_36_SEM"]; ?>cm.</td>
								<td align='center' valign='top'><?php echo $oms; ?></td>
								<td align='center' valign='top'><?php echo $imc; ?></td>
				
			              </tr>
											<?php
											}

											//var_dump($result);
											$result2=$dao->queryTabla($idNeocosur);
                                            while ($rs = $result2->fetch_array()) {
												
											 $edad_ano = $rs['Anos_Cro'];
											 $edad_mes = $rs['Meses_Cro'];
											 $edad_ano_corre = $rs['Anos_Corre'];
											 $edad_mes_corre = $rs['Meses_Corre'];											 
											 $genero = $rs['Genero'];
											 $peso = $rs['Peso'];
											 $talla = $rs['Talla'];
											 $cir_crn = $rs['Craneo'];
											 $oms = $rs['OMS'];
											 if ($oms==31){
											 $oms="EUTROFICO";
											  }
											  if ($oms==32){
											 $oms="RIESGO NUTRICIONAL";
											  }
											  if ($oms==33){
											 $oms="DESNUTRICION";
											  }
											  if ($oms==34){
											 $oms="SOBREPESO";
											  }
											  if ($oms==35){
											 $oms="OBESIDAD";
											  }
											  if ($oms==36){
											 $oms="TALLA BAJA";
											 }
											
											 
											 $imc = $rs['IMC'];
										?>
										
                                           <tr>
			  					<td valign='top'><?php echo utf8_encode($edad_ano_corre ." ". $edad_mes_corre); ?></td>
								<td valign='top'><?php echo utf8_encode($edad_ano ." ". $edad_mes); ?></td>
								<td align='center' valign='top'><?php echo $peso; ?>g.</td>
								<td align='center' valign='top'><?php echo $talla; ?>cm.</td>
								<td align='center' valign='top'><?php echo $cir_crn; ?>cm.</td>
								<td align='center' valign='top'><?php echo $oms; ?></td>
								<td align='center' valign='top'><?php echo $imc; ?></td>
				
			              </tr><?php  } ?>
                                            
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <p>
                                <br />                                
                                <img src="images/curvas.png" alt="Ver registro histórico" width="16" height="16" align="absmiddle" /> 
                                <?php
								
								 if(($genero_get=='FEMENINO') or ($genero_get=='MASCULINO')){ ?>
                                <a href="javascript:void(0)" class="saber" id="ver_grafico" onClick="abrirDiv2('icurvas');">Ver Curvas de Crecimiento OMS del paciente</a><br />
                                <?php }else{ ?>
								<a href="javascript:void(0)" class="saber" id="ver_grafico" >No hay curvas para este tipo de g&eacute;nero</a><br />
								<?php	} ?>
                                <strong><span class="pie">(Por EC hasta 2 a&ntilde;os)
                                    </span></strong><br />
                                <br />
                            </p>
                            <div id=icurvas style="DISPLAY: none; MARGIN-LEFT: 0em"><table width="98%" border="0" cellpadding="3" cellspacing="1" bgcolor="#83B6E9">
                                    <tr>
                                        <td align="left" background="../images/encabezado.gif" bgcolor="#D5E6F7"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="texto">
                                                <tr>
                                                    <td><strong>Curvas de Crecimiento OMS</strong></td>
                                                    <td align="right"><a href="javascript:void(0)"><img src="images/close.png" alt="Cerrar curvas" width="16" height="16" border="0" onClick="cerrarDiv2('icurvas');"/></a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="d7d8df">
                                    <tr><td><div id="notepad_1" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_2" style="width: 800px; height: 500px;"></div></td></tr> 
									<tr><td><div id="notepad_3" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_4" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_5" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_6" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_7" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_8" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_9" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_10" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_11" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_12" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_13" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_14" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_15" style="width: 800px; height: 500px;"></div></td></tr>
                                    <tr><td><div id="notepad_16" style="width: 800px; height: 500px;"></div></td></tr>
                                </table>
                            </div>
                            <span class="bottom">
                                <br />
                                <input name="button11" type="button" class="botonCentral" id="button11" onclick="window.close()" value="Cerrar" />
                            </span>
                        </div>
                        <br />
                    </div>
                </div>
            </form>
        </div>
        
        <script>
            vtip();
        </script>
    </body>
</html>