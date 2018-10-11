<?php
error_reporting(0);
include 'capaDAO/graficoCurvas.php';
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/IngresoDAO.php';
$cone = new ConexionDAO();
$dao = new graficoCurvasDAO($cone);
$daoI =  new IngresoDAO($cone);

//print_r($dao);


        $idControl = ($_GET['idControl']);
        $idNeocosur = $_GET['idNeocosur'];
		$centro = ($_GET['idCentro']); 
$fila = $daoI->buscarFichaId($idNeocosur);
//print_r($fila);
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






/*
Para las curvas se debe considerar:
	Edad corregida: hasta los 2 años
	Edad Cronologica: Desde 2 años en adelante
*/

//Consultas que contienen los puntos a utilizar en los graficos.

#longitud/estatura x edad
#longitud/estatura x edad
$long_estat_edad_hasta_2 =" crono_anos <= 2 and edad_corre_en_meses<>'' 
 order by talla asc, edad_corre_en_meses asc";
$sql_long_estat_edad_hasta_2 = $dao->queryCurvas($idNeocosur,$centro,$long_estat_edad_hasta_2,$idControl);

$long_estat_edad_2_a_5 =" edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 and edad_corre_en_meses<>''
 or (Corre_anos=2 and Corre_meses=0)  
 order by talla asc, edad_corre_en_meses asc";
$sql_long_estat_edad_2_a_5 = $dao->queryCurvas($idNeocosur,$centro,$long_estat_edad_2_a_5,$idControl);

//echo $long_estat_edad_2_a_5;

#peso x edad
$peso_edad_hasta_2 =" edad_crono_en_meses < 24 and peso >=1500 and 
edad_corre_en_meses<>'' or 
(Corre_anos=2 and Corre_meses=0) 
order by peso asc, edad_corre_en_meses asc";
$sql_peso_edad_hasta_2 = $dao->queryCurvas($idNeocosur,$centro,$peso_edad_hasta_2,$idControl);

//echo $peso_edad_hasta_2;


$peso_edad_de_2_a_5_1 =" edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 o
rder by peso asc, edad_corre_en_meses asc";
$peso_edad_de_2_a_5_2 =" edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 or 
  (Corre_anos=2 and Corre_meses=0) 
  order by peso asc, edad_corre_en_meses asc 
order by peso asc, edad_corre_en_meses asc";
$sql_peso_edad_de_2_a_5 = $dao->queryCurvasUnion($idNeocosur,$centro,$peso_edad_de_2_a_5_1,$peso_edad_de_2_a_5_2,$idControl);
 

$peso_edad_menos_5_1 =" crono_anos <= 2 and edad_corre_en_meses < 24 and 
edad_corre_en_meses<>'' 
order by peso asc, edad_corre_en_meses asc";
$peso_edad_menos_5_2 =" crono_anos >= 2  and edad_corre_en_meses <= 60 and 
edad_corre_en_meses<>''
 order by peso asc, edad_corre_en_meses asc ";
$sql_peso_edad_menos_5 = $dao->queryCurvasUnion($idNeocosur,$centro,$peso_edad_menos_5_1,$peso_edad_menos_5_2,$idControl);

#peso_x_longitud
$peso_x_longitud =" edad_corre_en_meses <= 24  and edad_corre_en_meses<>'' or (Corre_anos=2 and Corre_meses=0) 
order by peso asc, talla asc";
$sql_peso_x_longitud = $dao->queryCurvas($idNeocosur,$centro,$peso_x_longitud,$idControl);

#peso x estatura
$peso_x_estatura =" edad_corre_en_meses >= 24 and edad_corre_en_meses <= 60 and edad_corre_en_meses<>'' 
or (Corre_anos=2 and Corre_meses=0) 
order by peso asc, talla asc";
$sql_peso_x_estatura = $dao->queryCurvas($idNeocosur,$centro,$peso_x_estatura,$idControl);


#IMC x edad

$IMC_x_edad_1 =" crono_anos < 2 and  edad_corre_en_meses < 24 and edad_corre_en_meses<>'' 
 order by edad_corre_en_meses asc, IMC asc";
$IMC_x_edad_2 =" crono_anos >= 2  and edad_corre_en_meses <= 60 and edad_corre_en_meses<>''  
order by edad_corre_en_meses asc, IMC asc";
$sql_IMC_x_edad = $dao->queryCurvasUnion($idNeocosur,$centro,$IMC_x_edad_1,$IMC_x_edad_2,$idControl);



#CC x edad

$CC_x_edad_1 =" crono_anos < 2 and  edad_corre_en_meses < 24 and  edad_corre_en_meses<>''
 order by edad_corre_en_meses asc, Craneo asc";
$CC_x_edad_2 =" crono_anos >= 2  and edad_corre_en_meses <= 60 and edad_corre_en_meses<>''
 order by edad_corre_en_meses asc, Craneo asc";
$sql_IMC_x_edad = $dao->queryCurvasUnion($idNeocosur,$centro,$CC_x_edad_1,$CC_x_edad_2,$idControl);

/**************************************************************************/
/*Se realizan los querys para peso_edad */
//echo "<pre>".$peso_edad_hasta_2."</pre>".mysql_error();
//echo "<pre>".$peso_edad_de_2_a_5."</pre>".mysql_error();
//echo "<pre>".$peso_edad_menos_5."</pre>".mysql_error();


# inicio query peso_edad_hasta_2 

	$points_peso_edad_hasta_2 = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2 = array();
	$ar_edad_peso_edad_hasta_2 = array(); 
	$cont_peso_edad_hasta_2 = array();
	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {

	$points_peso_edad_hasta_2[] = $rs;
//echo "peso_edad_hasta_2"."<br>";
	//echo "peso: ";	
	//print_r($points_peso_edad_hasta_2[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_hasta_2[$i]['edad_corre_en_meses'])/(24))*(722-63))+63;
	//echo $points_peso_edad_hasta_2[$i][edad_corre_en_meses]."<br>";
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_hasta_2[$i][peso]-1500)/1000 )/15)*(71-444))+444;
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_hasta_2,$peso);
	array_push($ar_edad_peso_edad_hasta_2,$edad);
		
	$cont_peso_edad_hasta_2[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_hasta_2


# inicio query peso_edad_hasta_2 Puntuación

	$points_peso_edad_hasta_2z = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2z = array();
	$ar_edad_peso_edad_hasta_2z = array(); 
	$cont_peso_edad_hasta_2z = array();
	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {

	$points_peso_edad_hasta_2z[] = $rs;
//echo "peso_edad_hasta_2"."<br>";
	//echo "peso: ";	
	//print_r($points_peso_edad_hasta_2[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_hasta_2z[$i][edad_corre_en_meses])/(24))*(722-63))+63;
	//echo $points_peso_edad_hasta_2[$i][edad_corre_en_meses]."<br>";
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_hasta_2z[$i][peso]-1500)/1000 )/16.4)*(71-440))+440;
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_hasta_2z,$peso);
	array_push($ar_edad_peso_edad_hasta_2z,$edad);
		
	$cont_peso_edad_hasta_2z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_hasta_2




# inicio query peso_edad_de_2_a_5 

	$points_peso_edad_de_2_a_5 = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5 = array();
	$ar_edad_peso_edad_de_2_a_5 = array(); 
	$cont_peso_edad_de_2_a_5 = array();
	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {

	$points_peso_edad_de_2_a_5[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_de_2_a_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_de_2_a_5,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5,$edad);
		
	$cont_peso_edad_de_2_a_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_de_2_a_5


# inicio query peso_edad_de_2_a_5 Puntuación

	$points_peso_edad_de_2_a_5z = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5z = array();
	$ar_edad_peso_edad_de_2_a_5z = array(); 
	$cont_peso_edad_de_2_a_5z = array();
	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {

	$points_peso_edad_de_2_a_5z[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_de_2_a_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8000)/1000 )/20)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_de_2_a_5z,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5z,$edad);
		
	$cont_peso_edad_de_2_a_5z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_de_2_a_5





# inicio query peso_edad_menos_5 

	$points_peso_edad_menos_5 = array();
	$i = 0;
	$ar_peso_peso_edad_menos_5 = array();
	$ar_edad_peso_edad_menos_5 = array(); 
	$cont_peso_edad_menos_5 = array();
	
	while ($sql_peso_edad_menos_5!=null && $rs = $sql_peso_edad_menos_5->fetch_array()) {

	$points_peso_edad_menos_5[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_menos_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_menos_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_menos_5[$i][edad_corre_en_meses]-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_menos_5[$i][peso]-1000)/1000 )/24)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_menos_5,$peso);
	array_push($ar_edad_peso_edad_menos_5,$edad);
		
	$cont_peso_edad_menos_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_menos_5


/*Fin de las querys peso_edad */
/**************************************************************************/



/**************************************************************************/
/*Se realizan los querys para longitud/estatura x edad */
////echo "<pre>".$long_estat_edad_hasta_2."</pre>".mysql_error();
//echo "<pre>".$long_estat_edad_2_a_5."</pre>".mysql_error();

# inicio query long_estat_edad_2_a_5 

	$points_long_estat_edad_2_a_5 = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5 = array();
	$ar_edad_long_estat_edad_2_a_5 = array(); 
	$cont_long_estat_edad_2_a_5 = array();
	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {

	$points_long_estat_edad_2_a_5[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_2_a_5[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";


	$edad = ((($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5[$i][talla]-80)/5)/8)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_2_a_5,$long);
	array_push($ar_edad_long_estat_edad_2_a_5,$edad);
		
	$cont_long_estat_edad_2_a_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_2_a_5


# inicio query long_estat_edad_2_a_5 Puntuación

	$points_long_estat_edad_2_a_5z = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5z = array();
	$ar_edad_long_estat_edad_2_a_5z = array(); 
	$cont_long_estat_edad_2_a_5z = array();
	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {

	$points_long_estat_edad_2_a_5z[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_2_a_5[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";


	$edad = ((($points_long_estat_edad_2_a_5z[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5z[$i][talla]-76)/5)/9.8)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_2_a_5z,$long);
	array_push($ar_edad_long_estat_edad_2_a_5z,$edad);
		
	$cont_long_estat_edad_2_a_5z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_2_a_5



# inicio query long_estat_edad_hasta_2 
	$points_long_estat_edad_hasta_2 = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2 = array();
	$ar_edad_long_estat_edad_hasta_2 = array(); 
	$cont_long_estat_edad_hasta_2 = array();
	while ($sql_edad_hasta_2!=null && $rs = $sql_long_estat_edad_hasta_2->fetch_array()) {
	$points_long_estat_edad_hasta_2[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_hasta_2[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = (($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2[$i][talla]-45)/5)/10 )*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_hasta_2,$long);
	array_push($ar_edad_long_estat_edad_hasta_2,$edad);
		
	$cont_long_estat_edad_hasta_2[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_hasta_2


# inicio query long_estat_edad_hasta_2 Puntuación

	$points_long_estat_edad_hasta_2z = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2z = array();
	$ar_edad_long_estat_edad_hasta_2z = array(); 
	$cont_long_estat_edad_hasta_2z = array();
	while ($sql_edad_hasta_2!=null && $rs = $sql_long_estat_edad_hasta_2->fetch_array()) { 

	$points_long_estat_edad_hasta_2z[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_hasta_2[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = (($points_long_estat_edad_hasta_2z[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2z[$i][talla]-42)/5)/11.2 )*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_hasta_2z,$long);
	array_push($ar_edad_long_estat_edad_hasta_2z,$edad);
		
	$cont_long_estat_edad_hasta_2z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_hasta_2



/*Fin de las querys longitud/estatura x edad */
/**************************************************************************/





/**************************************************************************/
/*Se realizan los querys para peso_x_longitud */
//echo "<pre>".$peso_x_longitud."</pre>".mysql_error();

# inicio query peso_x_longitud 

	$points_peso_x_longitud = array();
	$i = 0;
	$ar_long_peso_x_longitud = array();
	$ar_peso_peso_x_longitud = array(); 
	$cont_peso_x_longitud = array();
	
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud->fetch_array()) {

	$points_peso_x_longitud[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_longitud[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_longitud[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_longitud[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$peso = ((((($points_peso_x_longitud[$i][peso]-1000)/1000 )/22)*(71-444))+444);
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";	
	
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitud[$i][talla]-45)/5)/13)*(722-63))+63));
	//echo $points_peso_y_longitud[$i][talla]."<br>";

	array_push($ar_long_peso_x_longitud,$long);
	array_push($ar_peso_peso_x_longitud,$edad);
		
	$cont_peso_x_longitud[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_longitud


# inicio query peso_x_longitud Puntuación

	$points_peso_x_longitudz = array();
	$i = 0;
	$ar_long_peso_x_longitudz = array();
	$ar_peso_peso_x_longitudz = array(); 
	$cont_peso_x_longitudz = array();
	
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud->fetch_array()) {

	$points_peso_x_longitudz[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_longitud[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_longitud[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_longitud[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$peso = ((((($points_peso_x_longitudz[$i][peso]-1000)/1000 )/24)*(71-444))+444);
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";	
	
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitudz[$i][talla]-45)/5)/13)*(722-63))+63));
	//echo $points_peso_y_longitud[$i][talla]."<br>";

	array_push($ar_long_peso_x_longitudz,$long);
	array_push($ar_peso_peso_x_longitudz,$edad);
		
	$cont_peso_x_longitudz[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_longitud



/*Fin de las querys peso_x_longitud */
/**************************************************************************/



/**************************************************************************/
/*Se realizan los querys para peso_x_estatura */
//echo "<pre>".$peso_x_estatura."</pre>".mysql_error();

# inicio query peso_x_longitud 

	$points_peso_x_estatura = array();
	$i = 0;
	$ar_long_peso_x_estatura = array();
	$ar_peso_peso_x_estatura = array(); 
	$cont_peso_x_estatura = array();
	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {

	$points_peso_x_estatura[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_estatura[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_estatura[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_estatura[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$long = (((($points_peso_x_estatura[$i][talla]-65)/5)/11)*(722-63))+63;
	
	//echo "eje X long : " . $long."<br>";		
	
	
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estatura[$i][peso]-5000)/1000)/23)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje X peso : " . $peso."<br>";

	array_push($ar_long_peso_x_estatura,$long);
	array_push($ar_peso_peso_x_estatura,$peso);
		
	$cont_peso_x_estatura[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_estatura


# inicio query peso_x_longitud Puntuación

	$points_peso_x_estaturaz = array();
	$i = 0;
	$ar_long_peso_x_estaturaz = array();
	$ar_peso_peso_x_estaturaz = array(); 
	$cont_peso_x_estaturaz = array();
	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {

	$points_peso_x_estaturaz[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_estatura[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_estatura[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_estatura[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$long = (((($points_peso_x_estaturaz[$i][talla]-65)/5)/11)*(722-63))+63;
	
	//echo "eje X long : " . $long."<br>";		
	
	
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estaturaz[$i][peso]-5000)/1000)/26)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje X peso : " . $peso."<br>";

	array_push($ar_long_peso_x_estaturaz,$long);
	array_push($ar_peso_peso_x_estaturaz,$peso);
		
	$cont_peso_x_estaturaz[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_estatura




/*Fin de las querys peso_x_estatura */
/**************************************************************************/


/**************************************************************************/
/*Se realizan los querys para IMC x edad */
////echo "<pre>".$IMC_x_edad."</pre>".mysql_error();


# inicio query IMC_x_edad 


	$points_IMC_x_edad = array();
	$i = 0;
	$ar_IMC_IMC_x_edad = array();
	$ar_edad_IMC_x_edad = array(); 
	$cont_IMC_x_edad = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_IMC_x_edad[] = $rs;
	//echo "IMC_x_edad"."<br>";
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_IMC_x_edad[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$IMC = (((($points_IMC_x_edad[$i][IMC]-9.6)/1 )/11.7)*(71-444))+444;
	//echo "eje Y IMC : " . $IMC."<br>";

	array_push($ar_IMC_IMC_x_edad,$IMC);
	array_push($ar_edad_IMC_x_edad,$edad);
		
	$cont_IMC_x_edad[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

# fin query IMC_x_edad

# inicio query IMC_x_edad Puntuación


	$points_IMC_x_edadz = array();
	$i = 0;
	$ar_IMC_IMC_x_edadz = array();
	$ar_edad_IMC_x_edadz = array(); 
	$cont_IMC_x_edadz = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_IMC_x_edadz[] = $rs;
	//echo "IMC_x_edad"."<br>";
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_IMC_x_edadz[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$IMC = (((($points_IMC_x_edadz[$i][IMC]-9.2)/1 )/13.6)*(71-444))+444;
	//echo "eje Y IMC : " . $IMC."<br>";

	array_push($ar_IMC_IMC_x_edadz,$IMC);
	array_push($ar_edad_IMC_x_edadz,$edad);
		
	$cont_IMC_x_edadz[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

# fin query IMC_x_edad



/**************************************************************************/
/*Se realizan los querys para CC x edad */
////echo "<pre>".$CC_x_edad."</pre>".mysql_error();


# inicio query CC_x_edad 

	$points_CC_x_edad = array();
	$i = 0;
	$ar_CC_CC_x_edad = array();
	$ar_edad_CC_x_edad = array(); 
	$cont_CC_x_edad = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_CC_x_edad[] = $rs;
	//echo "IMC_x_edad"."<br>";
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_CC_x_edad[$i][edad_corre_en_meses])-0)/(60-0))*(713-66))+66;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$CC = (((($points_CC_x_edad[$i][Craneo]-30)/1 )/26)*(84-445))+445;
	//echo "eje Y CC : " . $CC."<br>";

	array_push($ar_CC_CC_x_edad,$CC);
	array_push($ar_edad_CC_x_edad,$edad);
		
	$cont_CC_x_edad[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $CC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

# fin query CC_x_edad


///********** MUJERES ******************************//////


/**************************************************************************/
/*Se realizan los querys para peso_edad */
//echo "<pre>".$peso_edad_hasta_2."</pre>".mysql_error();
//echo "<pre>".$peso_edad_de_2_a_5."</pre>".mysql_error();
//echo "<pre>".$peso_edad_menos_5."</pre>".mysql_error();


# inicio query peso_edad_hasta_2 mujer

	$points_peso_edad_hasta_2m = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2m = array();
	$ar_edad_peso_edad_hasta_2m = array(); 
	$cont_peso_edad_hasta_2m = array();
	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {

	$points_peso_edad_hasta_2m[] = $rs;
//echo "peso_edad_hasta_2"."<br>";
	//echo "peso: ";	
	//print_r($points_peso_edad_hasta_2[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_hasta_2m[$i][edad_corre_en_meses])/(24))*(717-63))+63;
	//echo $points_peso_edad_hasta_2[$i][edad_corre_en_meses]."<br>";
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_hasta_2m[$i][peso]-1400)/1000 )/14.2)*(71-444))+444;
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_hasta_2m,$peso);
	array_push($ar_edad_peso_edad_hasta_2m,$edad);
		
	$cont_peso_edad_hasta_2m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_hasta_2


# inicio query peso_edad_hasta_2 Puntuación

	$points_peso_edad_hasta_2zm = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2zm = array();
	$ar_edad_peso_edad_hasta_2zm = array(); 
	$cont_peso_edad_hasta_2zm = array();
	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {
	$sql_peso_edad_hasta_2;
	$points_peso_edad_hasta_2zm[] = $rs;
//echo "peso_edad_hasta_2"."<br>";
	//echo "peso: ";	
	//print_r($points_peso_edad_hasta_2[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_hasta_2zm[$i][edad_corre_en_meses])/(24))*(722-63))+63;
	//echo $points_peso_edad_hasta_2[$i][edad_corre_en_meses]."<br>";
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_hasta_2zm[$i][peso]-1400)/1000 )/16.6)*(73-440))+440;
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_hasta_2zm,$peso);
	array_push($ar_edad_peso_edad_hasta_2z,$edad);
		
	$cont_peso_edad_hasta_2zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_hasta_2




# inicio query peso_edad_de_2_a_5 

	$points_peso_edad_de_2_a_5m = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5m = array();
	$ar_edad_peso_edad_de_2_a_5m = array(); 
	$cont_peso_edad_de_2_a_5m = array();
	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {

	$points_peso_edad_de_2_a_5m[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_de_2_a_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_de_2_a_5m[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_de_2_a_5m[$i][peso]-8400)/1000 )/17.2)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_de_2_a_5m,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5m,$edad);
		
	$cont_peso_edad_de_2_a_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_de_2_a_5


# inicio query peso_edad_de_2_a_5 Puntuación

	$points_peso_edad_de_2_a_5zm = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5zm = array();
	$ar_edad_peso_edad_de_2_a_5zm = array(); 
	$cont_peso_edad_de_2_a_5zm = array();
	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {
	$sql_peso_edad_de_2_a_5;
	$points_peso_edad_de_2_a_5zm[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_de_2_a_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_de_2_a_5zm[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_de_2_a_5zm[$i][peso]-7000)/1000 )/23)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_de_2_a_5zm,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5zm,$edad);
		
	$cont_peso_edad_de_2_a_5zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_de_2_a_5





# inicio query peso_edad_menos_5 

	$points_peso_edad_menos_5m = array();
	$i = 0;
	$ar_peso_peso_edad_menos_5m = array();
	$ar_edad_peso_edad_menos_5m = array(); 
	$cont_peso_edad_menos_5m = array();
	
	while ($sql_peso_edad_menos_5!=null && $rs = $sql_peso_edad_menos_5->fetch_array()) {
	$points_peso_edad_menos_5m[] = $rs;

	//echo "peso: ";	
	//print_r($points_peso_edad_menos_5[$i][peso]);
	//echo "<br> edad: ";
	//print_r($points_peso_edad_menos_5[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = ((($points_peso_edad_menos_5m[$i][edad_corre_en_meses]-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$peso = (((($points_peso_edad_menos_5m[$i][peso]-1000)/1000 )/24)*(71-444))+444;
	//echo "eje Y peso : " . $peso."<br>";

	array_push($ar_peso_peso_edad_menos_5m,$peso);
	array_push($ar_edad_peso_edad_menos_5m,$edad);
		
	$cont_peso_edad_menos_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_edad_menos_5


/*Fin de las querys peso_edad */
/**************************************************************************/



/**************************************************************************/
/*Se realizan los querys para longitud/estatura x edad */
////echo "<pre>".$long_estat_edad_hasta_2."</pre>".mysql_error();
//echo "<pre>".$long_estat_edad_2_a_5."</pre>".mysql_error();

# inicio query long_estat_edad_2_a_5 

	$points_long_estat_edad_2_a_5m = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5m = array();
	$ar_edad_long_estat_edad_2_a_5m = array(); 
	$cont_long_estat_edad_2_a_5m = array();
	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {

	$points_long_estat_edad_2_a_5m[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_2_a_5[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";


	$edad = ((($points_long_estat_edad_2_a_5m[$i][edad_corre_en_meses]-24)/(60-24))*(721-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5m[$i][talla]-77)/5)/8.66)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_2_a_5m,$long);
	array_push($ar_edad_long_estat_edad_2_a_5m,$edad);
		
	$cont_long_estat_edad_2_a_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_2_a_5


# inicio query long_estat_edad_2_a_5 Puntuación

	$points_long_estat_edad_2_a_5zm = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5zm = array();
	$ar_edad_long_estat_edad_2_a_5zm = array(); 
	$cont_long_estat_edad_2_a_5zm = array();
	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {

	$points_long_estat_edad_2_a_5zm[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_2_a_5[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]);			
	//echo "<br>";


	$edad = ((($points_long_estat_edad_2_a_5zm[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5zm[$i][talla]-76)/5)/9.8)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_2_a_5zm,$long);
	array_push($ar_edad_long_estat_edad_2_a_5zm,$edad);
		
	$cont_long_estat_edad_2_a_5zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_2_a_5



# inicio query long_estat_edad_hasta_2 
	
	$points_long_estat_edad_hasta_2m = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2m = array();
	$ar_edad_long_estat_edad_hasta_2m = array(); 
	$cont_long_estat_edad_hasta_2m = array();
	while ($sql_edad_hasta_2!=null && $rs = $sql_long_estat_edad_hasta_2->fetch_array()) {


	$points_long_estat_edad_hasta_2m[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_hasta_2[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = (($points_long_estat_edad_hasta_2m[$i][edad_corre_en_meses]/(24))*(722-68))+68;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2m[$i][talla]-45)/5)/10 )*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_hasta_2m,$long);
	array_push($ar_edad_long_estat_edad_hasta_2m,$edad);
		
	$cont_long_estat_edad_hasta_2m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_hasta_2


# inicio query long_estat_edad_hasta_2 Puntuación

	$points_long_estat_edad_hasta_2zm = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2zm = array();
	$ar_edad_long_estat_edad_hasta_2zm = array(); 
	$cont_long_estat_edad_hasta_2zm = array();
	
	while ($sql_edad_hasta_2!=null && $rs = $sql_edad_hasta_2->fetch_array()) {

	$points_long_estat_edad_hasta_2zm[] = $rs;

	//echo "talla: ";	
	//print_r($points_long_estat_edad_hasta_2[$i][talla]);
	//echo "<br> edad: ";
	//print_r($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]);			
	//echo "<br>";

	$edad = (($points_long_estat_edad_hasta_2zm[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2zm[$i][talla]-42)/5)/11.4 )*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje Y long : " . $long."<br>";

	array_push($ar_long_long_estat_edad_hasta_2zm,$long);
	array_push($ar_edad_long_estat_edad_hasta_2zm,$edad);
		
	$cont_long_estat_edad_hasta_2zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query long_estat_edad_hasta_2



/*Fin de las querys longitud/estatura x edad */
/**************************************************************************/





/**************************************************************************/
/*Se realizan los querys para peso_x_longitud */
//echo "<pre>".$peso_x_longitud."</pre>".mysql_error();

# inicio query peso_x_longitud 

	$points_peso_x_longitudm = array();
	$i = 0;
	$ar_long_peso_x_longitudm = array();
	$ar_peso_peso_x_longitudm = array(); 
	$cont_peso_x_longitudm = array();
	
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud->fetch_array()) {

	$points_peso_x_longitudm[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_longitud[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_longitud[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_longitud[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$peso = ((((($points_peso_x_longitudm[$i][peso]-1000)/1000 )/22)*(71-444))+444);
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";	
	
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitudm[$i][talla]-45)/5)/13)*(722-63))+63));
	//echo $points_peso_y_longitud[$i][talla]."<br>";

	array_push($ar_long_peso_x_longitudm,$long);
	array_push($ar_peso_peso_x_longitudm,$edad);
		
	$cont_peso_x_longitudm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_longitud


# inicio query peso_x_longitud Puntuación

	$points_peso_x_longitudzm = array();
	$i = 0;
	$ar_long_peso_x_longitudzm = array();
	$ar_peso_peso_x_longitudzm = array(); 
	$cont_peso_x_longitudzm = array();
	
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud->fetch_array()) {
	$points_peso_x_longitudzm[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_longitud[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_longitud[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_longitud[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$peso = ((((($points_peso_x_longitudzm[$i][peso]-1000)/1000 )/24)*(71-444))+444);
	//echo $points_peso_edad_hasta_2[$i][peso]."<br>";	
	
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitudzm[$i][talla]-45)/5)/13)*(722-63))+63));
	//echo $points_peso_y_longitud[$i][talla]."<br>";

	array_push($ar_long_peso_x_longitudzm,$long);
	array_push($ar_peso_peso_x_longitudzm,$edad);
		
	$cont_peso_x_longitudzm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_longitud



/*Fin de las querys peso_x_longitud */
/**************************************************************************/



/**************************************************************************/
/*Se realizan los querys para peso_x_estatura */
//echo "<pre>".$peso_x_estatura."</pre>".mysql_error();

# inicio query peso_x_longitud 

	$points_peso_x_estaturam = array();
	$i = 0;
	$ar_long_peso_x_estaturam = array();
	$ar_peso_peso_x_estaturam = array(); 
	$cont_peso_x_estaturam = array();
	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {

	$points_peso_x_estaturam[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_estatura[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_estatura[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_estatura[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$long = (((($points_peso_x_estaturam[$i][talla]-65)/5)/11)*(722-63))+63;
	
	//echo "eje X long : " . $long."<br>";		
	
	
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estaturam[$i][peso]-5000)/1000)/24)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje X peso : " . $peso."<br>";

	array_push($ar_long_peso_x_estaturam,$long);
	array_push($ar_peso_peso_x_estaturam,$peso);
		
	$cont_peso_x_estaturam[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_estatura


# inicio query peso_x_longitud Puntuación

	$points_peso_x_estaturazm = array();
	$i = 0;
	$ar_long_peso_x_estaturazm = array();
	$ar_peso_peso_x_estaturazm = array(); 
	$cont_peso_x_estaturazm = array();
	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {
	$points_peso_x_estaturazm[] = $rs;

	//echo "talla: ";	
	//print_r($points_peso_x_estatura[$i][talla]);
	//echo "<br> peso: ";
	//print_r($points_peso_x_estatura[$i][peso]);			
	//echo "<br>";

//	$edad = ((($points_peso_x_estatura[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$long = (((($points_peso_x_estaturazm[$i][talla]-65)/5)/11)*(722-63))+63;
	
	//echo "eje X long : " . $long."<br>";		
	
	
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estaturazm[$i][peso]-4500)/1000)/27.5)*(71-444))+444;
	//$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(84-444))+444;
	
	//echo "eje X peso : " . $peso."<br>";

	array_push($ar_long_peso_x_estaturazm,$long);
	array_push($ar_peso_peso_x_estaturazm,$peso);
		
	$cont_peso_x_estaturazm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while
# fin query peso_x_estatura




/*Fin de las querys peso_x_estatura */
/**************************************************************************/


/**************************************************************************/
/*Se realizan los querys para IMC x edad */
////echo "<pre>".$IMC_x_edad."</pre>".mysql_error();


# inicio query IMC_x_edad 


	$points_IMC_x_edadm = array();
	$i = 0;
	$ar_IMC_IMC_x_edadm = array();
	$ar_edad_IMC_x_edadm= array(); 
	$cont_IMC_x_edadm = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_IMC_x_edadm[] = $rs;
	//echo "IMC_x_edad"."<br>";
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_IMC_x_edadm[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$IMC = (((($points_IMC_x_edadm[$i][IMC]-9.6)/1 )/11.8)*(71-444))+444;
	//echo "eje Y IMC : " . $IMC."<br>";

	array_push($ar_IMC_IMC_x_edadm,$IMC);
	array_push($ar_edad_IMC_x_edadm,$edad);
		
	$cont_IMC_x_edadm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

# fin query IMC_x_edad

# inicio query IMC_x_edad Puntuación


	$points_IMC_x_edadzm = array();
	$i = 0;
	$ar_IMC_IMC_x_edadzm = array();
	$ar_edad_IMC_x_edadzm = array(); 
	$cont_IMC_x_edadzm = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_IMC_x_edadzm[] = $rs;
	//echo "IMC_x_edad"."<br>";$
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_IMC_x_edadzm[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$IMC = (((($points_IMC_x_edadzm[$i][IMC]-9.2)/1 )/13.6)*(71-444))+444;
	//echo "eje Y IMC : " . $IMC."<br>";

	array_push($ar_IMC_IMC_x_edadzm,$IMC);
	array_push($ar_edad_IMC_x_edadzm,$edad);
		
	$cont_IMC_x_edadzm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

# fin query IMC_x_edad



/**************************************************************************/
/*Se realizan los querys para CC x edad */
////echo "<pre>".$CC_x_edad."</pre>".mysql_error();


# inicio query CC_x_edad $sql_IMC_x_edad


	$points_CC_x_edadm = array();
	$i = 0;
	$ar_CC_CC_x_edadm = array();
	$ar_edad_CC_x_edadm = array(); 
	$cont_CC_x_edadm = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {

	$points_CC_x_edadm[] = $rs;
	//echo "IMC_x_edad"."<br>";
	//echo "IMC: ";	
	//print_r($points_IMC_x_edad[$i][IMC]);
	//echo "<br> edad: ";
	//print_r($points_IMC_x_edad[$i][edad_crono_en_meses]);			
	//echo "<br>";

	$edad = (((($points_CC_x_edadm[$i][edad_corre_en_meses])-0)/(60-0))*(714-66))+66;
	
	//echo "eje X Edad : " . $edad."<br>";		
	
	$CC = (((($points_CC_x_edadm[$i][Craneo]-30)/1 )/25.4)*(84-444))+444;
	//echo "eje Y CC : " . $CC."<br>";

	array_push($ar_CC_CC_x_edadm,$CC);
	array_push($ar_edad_CC_x_edadm,$edad);
		
	$cont_CC_x_edadm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $CC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');

	$i = $i + 1;

	}//fin while

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
				console.log("\n **  inicio_ninas  **\n");
				//Peso_Edad_Percentiles_2a5_ninas(); 
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