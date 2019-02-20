<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * funcion para rescatar valroes radio
 * @param type $arreglo
 * @return string
 */


function nulo($arreglo){
    
 foreach ($arreglo as $key => $value) {    
     //echo "nombre ".$key. " valor ".$value;
    if ($value=='-2' || $value=='') {
      $arreglo[$key] = "NULL";  
      //echo "pasooooo if ".$value."<br>";
    }
    else if($value !='' ){
        $arreglo[$key] =$value ;
       // echo "pasooooo else  " .$value."<br>";
       // echo "<br><br>  valor de check [".$arreglo[$key]."]  <br><br> ";
    }
    else{
        $arreglo[$key] = "NULL";
           // echo "pasooooo else ".$value."<br>";
    }  
    
    
}
return $arreglo;
    
}
 

/**
 * funcion para rescatar valroes checkbox
 * @param type $var
 * @return string
 */
function c($var){
    
 $vari;
 
if(isset($var)){
    $vari = isset($var);
    //echo "if  ".isset($var);
    
}
else {
    $vari = "NULL";
   //echo "valor ".$vari; 
}
return $vari;    
}


function si($var){
    $cheked='';
    //echo "variable qloa --> ".$var;
    if($var=='0' || $var=='-1' || $var=='' || $var=='null' || $var=='NULL'){
     $cheked="" ;   
    }
    else{
      $cheked='checked="checked"';   
    }
    
    echo $cheked;
    
}

function no($var){
    $cheked='';
    //echo "variable qloa --> ".$var;
    if($var=='1' || $var=='-1' || $var=='null'  || $var==''){
     $cheked="" ;   
    }
    else{
      $cheked='checked="checked"';   
    }
    
    echo $cheked;
    
}

function sn($var){
    $cheked='';
    //echo "variable qloa --> ".$var;
    if($var=='1' || $var=='0' || $var=='null' || $var==''){
     $cheked="" ;   
    }
    else{
      $cheked='checked="checked"';   
    }
    
    echo $cheked;
    
}
/**
 * Metodo que deja el check principal oculto seleccionado
 * por defecto
 * @param type $var
 * @return string
 */

function check($var){
    $cheked='';
    if($var=='' || $var =='null'){
       $cheked='checked="checked"';  
    }
    echo $cheked;
}

function cargarSelectSinPermiso($tabla,$cone,$value,$descrip,$idABuscar){
		 $query="select $value,$descrip from $tabla ";
		$cone->Abrir();
		$retorno = $cone->select($query);	
		 $selected=" ";
		while($arr = $retorno->fetch_array())
		 {
			//$row[]=$arr;
			if($idABuscar==$arr[$value]){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>");
			}
			/*else{
				
				echo "<option value ='{$arr[$value]}' >{$arr[$descrip]}</option>";
			} */
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }		
		$cone->Cerrar();
		//var_dump($row );
		//return $row;
}
function cargarTodosCentros($tabla,$cone,$value,$descrip,$idABuscar){
	
		  $query="select $value,$descrip from $tabla 
		 where activo =1 
		   ";
		$cone->Abrir();
		$retorno = $cone->select($query);	
		 $selected=" ";
		while($arr = $retorno->fetch_array())
		 {
			//$row[]=$arr;
			if($idABuscar==$arr[$value]){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>");
			}
			else{
				
				echo utf8_encode("<option value ='{$arr[$value]}' >{$arr[$descrip]}</option>");
			}
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }		
		$cone->Cerrar();
		//var_dump($row );
		//return $row;
}


function cargarSelect($tabla,$cone,$value,$descrip,$idABuscar){
	$order=" " ;
	if($tabla=="alimentacion_param"){
		$order =" order by orden  asc";
	}
	if($tabla=="pais"){
		$order =" order by descripcion  asc";
	}
		  $query="select $value,$descrip from $tabla 
		 where activo =1 
		 $order ";
		$cone->Abrir();
		$retorno = $cone->select($query);	
		 $selected=" ";
		while($arr = $retorno->fetch_array())
		 {
			//$row[]=$arr;
			if($idABuscar==$arr[$value]){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>");
			}
			else{
				
				echo utf8_encode("<option value ='{$arr[$value]}' >{$arr[$descrip]}</option>");
			}
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }		
		$cone->Cerrar();
		//var_dump($row );
		//return $row;
}


function cargarEstados($cone,$idABuscar,$perfil){
		if($perfil=="Colaborador"){
			$condicion = "  and  ID_CONDICION_INGRESO in (176,177,178)";
		}
		if($perfil=="Supervisor"){
			$condicion = " and  ID_CONDICION_INGRESO in (176,177,178,179,180,368)";
		}
		if($perfil=="Administrador"){
			$condicion = "   ";
		}
		$query="SELECT * FROM `condicion_ingreso` where 1
			$condicion
			";
		$cone->Abrir();
		$retorno = $cone->select($query);	
		 $selected=" ";
			 
		while($arr = $retorno->fetch_array())
		 {
			 $idEstado=$arr["ID_CONDICION_INGRESO"];
			 $descripcion=$arr["ESTADO_FICHA"];
			//$row[]=$arr;
			if($idABuscar==$idEstado){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='".$idEstado."' {$selected} >".$descripcion."</option>");
			}
			else{
				
				echo utf8_encode("<option value ='".$idEstado."' >".$descripcion."</option>");
			}
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }	
		$cone->Cerrar();
		//var_dump($row );
		//return $row;
}

function listarControlesActivos($row,$idABuscar){
	//var_dump($row);
	while($arr = $row->fetch_array())
		 {
			 if($arr['nombre_control']=='Control 1'){
				 $control ="Control 40 semanas ";
			 }
			 else if($arr['nombre_control']=='Control 2'){
				 $control ="Control 6 meses ";
			 }
			 else if($arr['nombre_control']=='Control 3'){
				 $control ="Control 12 meses ";
			 }
			 else if($arr['nombre_control']=='Control 4'){
				 $control ="Control 18 meses ";
			 }
			 else if($arr['nombre_control']=='Control 5'){
				 $control ="Control 24 meses ";
			 }
			 else if($arr['nombre_control']=='Control 6'){
				 $control ="3 años ";
			 }
			  else if($arr['nombre_control']=='Control 7'){
				 $control ="4 años ";
			 }
			  else if($arr['nombre_control']=='Control 8'){
				 $control ="5 años ";
			 }
			 else if($arr['nombre_control']=='Control 9'){
				 $control ="6 años ";
			 }
			 else if($arr['nombre_control']=='Control 10'){
				 $control ="7 años ";
			 }
			//$row[]=$arr;
			if($idABuscar==$arr[$ID_CONTROL]){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='".$arr['ID_CONTROL']."' {$selected} >".$control."</option>");
			}
			else{
				
				echo utf8_encode("<option value ='".$arr['ID_CONTROL']."' >".$control."</option>");
			}
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }
}

function listarControlesInactivos($row,$idABuscar){
	$contador=0;
	//echo "<br><br> prueba fuck <br><br>";
	//var_dump($row->fetch_array());
	while($arr = $row->fetch_array())
		 {
			 $contador ++;
			//$row[]=$arr;
			console.log("id a buscar "+$idABuscar);
			console.log("ID_CONTROL "+$arr[$ID_CONTROL]);
			if($idABuscar==$arr[$ID_CONTROL]){
				$selected=" selected=selected";
				echo utf8_encode("<option value ='".$arr['ID_CONTROL']."' {$selected} >  Control  ".$contador." </option>");
			}
			else{
				console.log("ID_CONTROL "+$arr[$ID_CONTROL]);
				echo utf8_encode("<option value ='".$arr['ID_CONTROL']."' > Control  ".$contador."</option>");
			}
		//echo "<option value ='{$arr[$value]}' {$selected} >{$arr[$descrip]}</option>";
		 }
}



function encriptar($cadena){
    $key='9999';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
 
}
 
function desencriptar($cadena){
     $key='9999';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

function readOnly($var){
	if($var!=null && $var !=''){
		echo "  readOnly ";
	}
	
}

function salir($token){

	echo '<script type="text/javascript"> 
			window.location.assign("../admin/exit.php?token='.$token.');
			</script>';
	header("location: ../admin/exit.php?token=".$token."");
}

function  divSi($var){
	if( $var=='1' ){
		echo " class='onLoad oculto' ";
	}
	else {
		echo "";
	}
}

function ocultarBoton($estado,$perfil){
	session_start();
	$style="";
	
	if($estado=="179" && $perfil!="Administrador"){
		echo $style ="style ='display:none';";
	}
	
}

function ceros($str){

	if(strlen($str)>=2){
		return $str;
	}
	else if (strlen($str)==1){
		return "0".$str;
	}
	else {
		return "--";
	}
}

function validaControlValidoCrono($mensaje){
	$retorno ="";
	
	if($mensaje=='40 semanas'){
		$retorno ="0-0-40 semanas";
	}
	else if($mensaje=='6 meses'){
		$retorno ="0-6-6 meses";
	}
	else if($mensaje=='12 meses'){
		$retorno ="1-0-12 meses";
	}
	else if($mensaje=='18 meses'){
		$retorno ="1-6-18 meses";
	}
	else if($mensaje=='24 meses'){ 
		$retorno ="2-0-24 meses";
	}
	else if($mensaje=='3 años'){
		$retorno ="3-0-3 años";
	}
	else if($mensaje=='4 años'){
		$retorno ="4-0-4 años";
	}
	else if($mensaje=='5 años'){
		$retorno ="5-0-5 años";
	}
	else if($mensaje=='6 años'){
		$retorno ="5-0-6 años";
	}
	else if($mensaje=='7 años'){
		$retorno ="7-0-7 años";
	}
	return $retorno;
}
 
 /**NIÑOOOS */
 function Peso_Edad_Percentiles_Nac_a_2_ninos($sql_peso_edad_hasta_2){
		$points_peso_edad_hasta_2 = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2 = array();
	$ar_edad_peso_edad_hasta_2 = array(); 
	$cont_peso_edad_hasta_2 = array();
	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {
	$points_peso_edad_hasta_2[] = $rs;
	$edad = ((($points_peso_edad_hasta_2[$i]['edad_corre_en_meses'])/(24))*(722-63))+63;
	$peso = (((($points_peso_edad_hasta_2[$i][peso]-1500)/1000 )/15)*(71-444))+444;
	array_push($ar_peso_peso_edad_hasta_2,$peso);
	array_push($ar_edad_peso_edad_hasta_2,$edad);		
	$cont_peso_edad_hasta_2[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}//fin while
	return $cont_peso_edad_hasta_2;
 }
 
 function IMC_Edad_Puntuacion_Nac_5_Ninos($sql_IMC_x_edad_v2){
	 $points_IMC_x_edadz = array();
	$i = 0;
	$ar_IMC_IMC_x_edadz = array();
	$ar_edad_IMC_x_edadz = array(); 
	$cont_IMC_x_edadz = array();	
	while ($sql_IMC_x_edad_v2!=null && $rs = $sql_IMC_x_edad_v2->fetch_array()) {
	$points_IMC_x_edadz[] = $rs;
	$edad = (((($points_IMC_x_edadz[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	$IMC = (((($points_IMC_x_edadz[$i][IMC]-9.2)/1 )/13.6)*(71-444))+444; 
	array_push($ar_IMC_IMC_x_edadz,$IMC);
	array_push($ar_edad_IMC_x_edadz,$edad); 
	$cont_IMC_x_edadz[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_IMC_x_edadz;
 }
 function Peso_Edad_Puntuacion_Nac_a_2_ninos($sql_peso_edad_hasta_2)
 {
	 $points_peso_edad_hasta_2z = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2z = array();
	$ar_edad_peso_edad_hasta_2z = array(); 
	$cont_peso_edad_hasta_2z = array();	
	while ($sql_peso_edad_hasta_2!=null && $rs = $sql_peso_edad_hasta_2->fetch_array()) {
	$points_peso_edad_hasta_2z[] = $rs;
	$edad = ((($points_peso_edad_hasta_2z[$i][edad_corre_en_meses])/(24))*(722-63))+63;		
	$peso = (((($points_peso_edad_hasta_2z[$i][peso]-1500)/1000 )/16.4)*(71-440))+440;
	array_push($ar_peso_peso_edad_hasta_2z,$peso);
	array_push($ar_edad_peso_edad_hasta_2z,$edad);		
	$cont_peso_edad_hasta_2z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_hasta_2z;
 }
 function Peso_Edad_Percentiles_2a5_ninos($sql_peso_edad_de_2_a_5) 
 {
	 $points_peso_edad_de_2_a_5 = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5 = array();
	$ar_edad_peso_edad_de_2_a_5 = array(); 
	$cont_peso_edad_de_2_a_5 = array();
	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {
	$points_peso_edad_de_2_a_5[] = $rs;
	$edad = ((($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8500)/1000 )/16)*(71-444))+444;
	array_push($ar_peso_peso_edad_de_2_a_5,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5,$edad);		
	$cont_peso_edad_de_2_a_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_de_2_a_5;
 }
 
 function Peso_Edad_Puntuacion_2a5_ninos($sql_peso_edad_de_2_a_5)
 {
	 $points_peso_edad_de_2_a_5z = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5z = array();
	$ar_edad_peso_edad_de_2_a_5z = array(); 
	$cont_peso_edad_de_2_a_5z = array();	
	while ($sql_peso_edad_de_2_a_5!=null && $rs = $sql_peso_edad_de_2_a_5->fetch_array()) {
	$points_peso_edad_de_2_a_5z[] = $rs;
	$edad = ((($points_peso_edad_de_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	$peso = (((($points_peso_edad_de_2_a_5[$i][peso]-8000)/1000 )/20)*(71-444))+444;
	array_push($ar_peso_peso_edad_de_2_a_5z,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5z,$edad);		
	$cont_peso_edad_de_2_a_5z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	 return $cont_peso_edad_de_2_a_5z;
 }
 
 
 
 function Peso_Edad_Percentiles_Nac_a_5_ninos($sql_peso_edad_menos_5)
 {
	 $points_peso_edad_menos_5 = array();
	$i = 0;
	$ar_peso_peso_edad_menos_5 = array();
	$ar_edad_peso_edad_menos_5 = array(); 
	$cont_peso_edad_menos_5 = array();	
	while ($sql_peso_edad_menos_5!=null && $rs = $sql_peso_edad_menos_5->fetch_array()) {
	$points_peso_edad_menos_5[] = $rs;
	$edad = ((($points_peso_edad_menos_5[$i][edad_corre_en_meses]-0)/(60-0))*(722-63))+63;
	$peso = (((($points_peso_edad_menos_5[$i][peso]-1000)/1000 )/24)*(71-444))+444;
	array_push($ar_peso_peso_edad_menos_5,$peso);
	array_push($ar_edad_peso_edad_menos_5,$edad);		
	$cont_peso_edad_menos_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_menos_5;
 }
 
 
 function Estatura_Edad_Percentiles_2a5_Nino($sql_long_estat_edad_2_a_5)
 {
	 $points_long_estat_edad_2_a_5 = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5 = array();
	$ar_edad_long_estat_edad_2_a_5 = array(); 
	$cont_long_estat_edad_2_a_5 = array();	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {
	$points_long_estat_edad_2_a_5[] = $rs;
	$edad = ((($points_long_estat_edad_2_a_5[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5[$i][talla]-80)/5)/8)*(71-444))+444; 	
	array_push($ar_long_long_estat_edad_2_a_5,$long);
	array_push($ar_edad_long_estat_edad_2_a_5,$edad);		
	$cont_long_estat_edad_2_a_5[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_2_a_5;
 }
 
 function Estatura_Edad_Puntuacion_2a5_Nino($sql_long_estat_edad_2_a_5)
 {
	$points_long_estat_edad_2_a_5z = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5z = array();
	$ar_edad_long_estat_edad_2_a_5z = array(); 
	$cont_long_estat_edad_2_a_5z = array();	
	while ($sql_long_estat_edad_2_a_5!=null && $rs = $sql_long_estat_edad_2_a_5->fetch_array()) {
	$points_long_estat_edad_2_a_5z[] = $rs;
	$edad = ((($points_long_estat_edad_2_a_5z[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;
	$long = (((($points_long_estat_edad_2_a_5z[$i][talla]-76)/5)/9.8)*(71-444))+444;
	array_push($ar_long_long_estat_edad_2_a_5z,$long);
	array_push($ar_edad_long_estat_edad_2_a_5z,$edad);		
	$cont_long_estat_edad_2_a_5z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	} 
	return $cont_long_estat_edad_2_a_5z;
 }
 
 
 function Longitud_edad_Percentiles_Nac_Ninos($sql_long_estat_edad_hasta_2)
 {
		$points_long_estat_edad_hasta_2 = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2 = array();
	$ar_edad_long_estat_edad_hasta_2 = array(); 
	$cont_long_estat_edad_hasta_2 = array();
	while ( $rs = $sql_long_estat_edad_hasta_2->fetch_array()) {
	$points_long_estat_edad_hasta_2[] = $rs;
	$edad = (($points_long_estat_edad_hasta_2[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2[$i][talla]-45)/5)/10 )*(71-444))+444;
	array_push($ar_long_long_estat_edad_hasta_2,$long);
	array_push($ar_edad_long_estat_edad_hasta_2,$edad);
		
	$cont_long_estat_edad_hasta_2[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_hasta_2;
 }
 
 
 function Longitud_edad_Puntuacion_Nac_Ninos($sql_long_estat_edad_hasta_2_v2)
 {
	 $points_long_estat_edad_hasta_2z = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2z = array();
	$ar_edad_long_estat_edad_hasta_2z = array(); 
	$cont_long_estat_edad_hasta_2z = array();
	while ($rs = $sql_long_estat_edad_hasta_2_v2->fetch_array()) { 
	$points_long_estat_edad_hasta_2z[] = $rs;
	$edad = (($points_long_estat_edad_hasta_2z[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2z[$i][talla]-42)/5)/11.2 )*(71-444))+444;
	array_push($ar_long_long_estat_edad_hasta_2z,$long);
	array_push($ar_edad_long_estat_edad_hasta_2z,$edad);		
	$cont_long_estat_edad_hasta_2z[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_hasta_2z;
 }
 
 function Peso_Longitud_Percentiles_Nac_2_Ninos($sql_peso_x_longitud)
 {
	 $points_peso_x_longitud = array();
	$i = 0;
	$ar_long_peso_x_longitud = array();
	$ar_peso_peso_x_longitud = array(); 
	$cont_peso_x_longitud = array();	
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud->fetch_array()) {
	$points_peso_x_longitud[] = $rs;
	$peso = ((((($points_peso_x_longitud[$i][peso]-1000)/1000 )/22)*(71-444))+444); 
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitud[$i][talla]-45)/5)/13)*(722-63))+63)); 
	array_push($ar_long_peso_x_longitud,$long);
	array_push($ar_peso_peso_x_longitud,$edad);		
	$cont_peso_x_longitud[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_longitud;
	 
 }
 
 function Peso_Longitud_Puntuacion_Nac_2_Ninos($sql_peso_x_longitud_v2)
 {
	 $points_peso_x_longitudz = array();
	$i = 0;
	$ar_long_peso_x_longitudz = array();
	$ar_peso_peso_x_longitudz = array(); 
	$cont_peso_x_longitudz = array();
	while ($sql_peso_x_longitud!=null && $rs = $sql_peso_x_longitud_v2->fetch_array()) {
	$points_peso_x_longitudz[] = $rs;
	$peso = ((((($points_peso_x_longitudz[$i][peso]-1000)/1000 )/24)*(71-444))+444);
	$long = (((((($points_peso_x_longitudz[$i][talla]-45)/5)/13)*(722-63))+63));
	array_push($ar_long_peso_x_longitudz,$long);
	array_push($ar_peso_peso_x_longitudz,$edad);		
	$cont_peso_x_longitudz[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_longitudz;
 }
 
 function Peso_Estatura_Percentiles_2a5_Ninos($sql_peso_x_estatura){
	 $points_peso_x_estatura = array();
	$i = 0;
	$ar_long_peso_x_estatura = array();
	$ar_peso_peso_x_estatura = array(); 
	$cont_peso_x_estatura = array();	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {
	$points_peso_x_estatura[] = $rs;
	$long = (((($points_peso_x_estatura[$i][talla]-65)/5)/11)*(722-63))+63;
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estatura[$i][peso]-5000)/1000)/23)*(71-444))+444;
	array_push($ar_long_peso_x_estatura,$long);
	array_push($ar_peso_peso_x_estatura,$peso);		
	$cont_peso_x_estatura[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_estatura;
	 
 }
 
 
 function Peso_Estatura_Puntuacion_2a5_Ninos($sql_peso_x_estatura){
	 $points_peso_x_estaturaz = array();
	$i = 0;
	$ar_long_peso_x_estaturaz = array();
	$ar_peso_peso_x_estaturaz = array(); 
	$cont_peso_x_estaturaz = array();	
	while ($sql_peso_x_estatura!=null && $rs = $sql_peso_x_estatura->fetch_array()) {
	$points_peso_x_estaturaz[] = $rs;
	$long = (((($points_peso_x_estaturaz[$i][talla]-65)/5)/11)*(722-63))+63;	
	
	$peso = (((($points_peso_x_estaturaz[$i][peso]-5000)/1000)/26)*(71-444))+444;
	array_push($ar_long_peso_x_estaturaz,$long);
	array_push($ar_peso_peso_x_estaturaz,$peso);		
	$cont_peso_x_estaturaz[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_estaturaz;
 }
 
 /**
 IMC_Edad_Percentiles_Nac_5_Ninos()
 */
 function IMC_Edad_Percentiles_Nac_5_Ninos($sql_IMC_x_edad){
	 $points_IMC_x_edad = array();
	$i = 0;
	$ar_IMC_IMC_x_edad = array();
	$ar_edad_IMC_x_edad = array(); 
	$cont_IMC_x_edad = array();
	
	while ($sql_IMC_x_edad!=null && $rs = $sql_IMC_x_edad->fetch_array()) {
	$points_IMC_x_edad[] = $rs;
	$edad = (((($points_IMC_x_edad[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;
	$IMC = (((($points_IMC_x_edad[$i][IMC]-9.6)/1 )/11.7)*(71-444))+444;
	array_push($ar_IMC_IMC_x_edad,$IMC);
	array_push($ar_edad_IMC_x_edad,$edad);		
	$cont_IMC_x_edad[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_IMC_x_edad;
 }
 
 
 function CC_Edad_Puntuacion_Ninos($sql_CC_x_edad){
	 $points_CC_x_edad = array();
	$i = 0;
	$ar_CC_CC_x_edad = array();
	$ar_edad_CC_x_edad = array(); 
	$cont_CC_x_edad = array();	
	while ($sql_CC_x_edad!=null && $rs = $sql_CC_x_edad->fetch_array()) {
	$points_CC_x_edad[] = $rs;
	$edad = (((($points_CC_x_edad[$i][edad_corre_en_meses])-0)/(60-0))*(713-66))+66;	
	$CC = (((($points_CC_x_edad[$i][Craneo]-30)/1 )/26)*(84-445))+445;
	array_push($ar_CC_CC_x_edad,$CC);
	array_push($ar_edad_CC_x_edad,$edad);		
	$cont_CC_x_edad[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $CC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_CC_x_edad;
 }
 
 
 
 ///********** MUJERES ******************************//////
 
 function Peso_Edad_Percentiles_Nac_a_2_ninas($sql_peso_edad_hasta_2_v2_m)
{
			$points_peso_edad_hasta_2m = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2m = array();
	$ar_edad_peso_edad_hasta_2m = array(); 
	$cont_peso_edad_hasta_2m = array();	
	while ($sql_peso_edad_hasta_2_v2_m!=null && $rs = $sql_peso_edad_hasta_2_v2_m->fetch_array()) {
	$points_peso_edad_hasta_2m[] = $rs;
	$edad = ((($points_peso_edad_hasta_2m[$i][edad_corre_en_meses])/(24))*(717-63))+63; 
	$peso = (((($points_peso_edad_hasta_2m[$i][peso]-1400)/1000 )/14.2)*(71-444))+444; 
	array_push($ar_peso_peso_edad_hasta_2m,$peso);
	array_push($ar_edad_peso_edad_hasta_2m,$edad);		
	$cont_peso_edad_hasta_2m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_hasta_2m;			
}
 
 
 
 function Peso_Edad_Puntuacion_Nac_a_2_ninas($sql_peso_edad_hasta_2_v2_zm){
	 $points_peso_edad_hasta_2zm = array();
	$i = 0;
	$ar_peso_peso_edad_hasta_2zm = array();
	$ar_edad_peso_edad_hasta_2zm = array(); 
	$cont_peso_edad_hasta_2zm = array();
	while ($sql_peso_edad_hasta_2_v2_zm!=null && $rs = $sql_peso_edad_hasta_2_v2_zm->fetch_array()) {
	$sql_peso_edad_hasta_2;
	$points_peso_edad_hasta_2zm[] = $rs;
	$edad = ((($points_peso_edad_hasta_2zm[$i][edad_corre_en_meses])/(24))*(722-63))+63;
	$peso = (((($points_peso_edad_hasta_2zm[$i][peso]-1400)/1000 )/16.6)*(73-440))+440;
	array_push($ar_peso_peso_edad_hasta_2zm,$peso);
	array_push($ar_edad_peso_edad_hasta_2z,$edad);		
	$cont_peso_edad_hasta_2zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	} 
	return $cont_peso_edad_hasta_2zm;
 }
 
 function Peso_Edad_Percentiles_2a5_ninas($sql_peso_edad_de_2_a_5_v2_m)
 {
		$points_peso_edad_de_2_a_5m = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5m = array();
	$ar_edad_peso_edad_de_2_a_5m = array(); 
	$cont_peso_edad_de_2_a_5m = array();	
	while ($sql_peso_edad_de_2_a_5_v2_m!=null && $rs = $sql_peso_edad_de_2_a_5_v2_m->fetch_array()) {
	$points_peso_edad_de_2_a_5m[] = $rs;
	$edad = ((($points_peso_edad_de_2_a_5m[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;	
	$peso = (((($points_peso_edad_de_2_a_5m[$i][peso]-8400)/1000 )/17.2)*(71-444))+444;
	array_push($ar_peso_peso_edad_de_2_a_5m,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5m,$edad);		
	$cont_peso_edad_de_2_a_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_de_2_a_5m; 
 }
 
 function Peso_Edad_Puntuacion_2a5_ninas($sql_peso_edad_de_2_a_5_v2_mz)
 {
	$points_peso_edad_de_2_a_5zm = array();
	$i = 0;
	$ar_peso_peso_edad_de_2_a_5zm = array();
	$ar_edad_peso_edad_de_2_a_5zm = array(); 
	$cont_peso_edad_de_2_a_5zm = array();	
	while ($sql_peso_edad_de_2_a_5_v2_mz!=null && $rs = $sql_peso_edad_de_2_a_5_v2_mz->fetch_array()) {
	$sql_peso_edad_de_2_a_5;
	$points_peso_edad_de_2_a_5zm[] = $rs;
	$edad = ((($points_peso_edad_de_2_a_5zm[$i][edad_corre_en_meses]-24)/(60-24))*(722-63))+63;	
	$peso = (((($points_peso_edad_de_2_a_5zm[$i][peso]-7000)/1000 )/23)*(71-444))+444;
	array_push($ar_peso_peso_edad_de_2_a_5zm,$peso);
	array_push($ar_edad_peso_edad_de_2_a_5zm,$edad);		
	$cont_peso_edad_de_2_a_5zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_edad_de_2_a_5zm;
 }
 
 function Peso_Edad_Percentiles_Nac_a_5_ninas($sql_peso_edad_menos_5_v2_m)
 {
	 $points_peso_edad_menos_5m = array();
	$i = 0;
	$ar_peso_peso_edad_menos_5m = array();
	$ar_edad_peso_edad_menos_5m = array(); 
	$cont_peso_edad_menos_5m = array();	
	while ($sql_peso_edad_menos_5_v2_m!=null && $rs = $sql_peso_edad_menos_5_v2_m->fetch_array()) {
	$points_peso_edad_menos_5m[] = $rs;
	$edad = ((($points_peso_edad_menos_5m[$i][edad_corre_en_meses]-0)/(60-0))*(722-63))+63;	
	$peso = (((($points_peso_edad_menos_5m[$i][peso]-1000)/1000 )/24)*(71-444))+444;
	array_push($ar_peso_peso_edad_menos_5m,$peso);
	array_push($ar_edad_peso_edad_menos_5m,$edad);		
	$cont_peso_edad_menos_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	} 
	return $cont_peso_edad_menos_5m;
	 
 }
 
 
 function Estatura_Edad_Percentiles_2a5_Nina($sql_long_estat_edad_2_a_5_v2_m)
 {
	$points_long_estat_edad_2_a_5m = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5m = array();
	$ar_edad_long_estat_edad_2_a_5m = array(); 
	$cont_long_estat_edad_2_a_5m = array();	
	while ($sql_long_estat_edad_2_a_5_v2_m!=null && $rs = $sql_long_estat_edad_2_a_5_v2_m->fetch_array()) {
	$points_long_estat_edad_2_a_5m[] = $rs;
	$edad = ((($points_long_estat_edad_2_a_5m[$i][edad_corre_en_meses]-24)/(60-24))*(721-63))+63;	
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5m[$i][talla]-77)/5)/8.66)*(71-444))+444;
	array_push($ar_long_long_estat_edad_2_a_5m,$long);
	array_push($ar_edad_long_estat_edad_2_a_5m,$edad);		
	$cont_long_estat_edad_2_a_5m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_2_a_5m;
 }
 
 function Estatura_Edad_Puntuacion_2a5_Nina($sql_long_estat_edad_2_a_5_v2_zm)
 {
	 $points_long_estat_edad_2_a_5zm = array();
	$i = 0;
	$ar_long_long_estat_edad_2_a_5zm = array();
	$ar_edad_long_estat_edad_2_a_5zm = array(); 
	$cont_long_estat_edad_2_a_5zm = array();	
	while ($sql_long_estat_edad_2_a_5_v2_zm!=null && $rs = $sql_long_estat_edad_2_a_5_v2_zm->fetch_array()) {
	$points_long_estat_edad_2_a_5zm[] = $rs;
	$edad = ((($points_long_estat_edad_2_a_5zm[$i][edad_corre_en_meses]-24)/(60-24))*(720-63))+63;
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_2_a_5zm[$i][talla]-76)/5)/9.8)*(71-444))+444; 
	array_push($ar_long_long_estat_edad_2_a_5zm,$long);
	array_push($ar_edad_long_estat_edad_2_a_5zm,$edad);		
	$cont_long_estat_edad_2_a_5zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_2_a_5zm;
 }
 function Longitud_edad_Percentiles_Nac_Ninas($sql_long_estat_edad_hasta_2_v2_m)
 {
	 	$points_long_estat_edad_hasta_2m = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2m = array();
	$ar_edad_long_estat_edad_hasta_2m = array(); 
	$cont_long_estat_edad_hasta_2m = array(); 
	while ( $rs = $sql_long_estat_edad_hasta_2_v2_m->fetch_array()) {
	$points_long_estat_edad_hasta_2m[] = $rs;
	$edad = (($points_long_estat_edad_hasta_2m[$i][edad_corre_en_meses]/(24))*(722-68))+68;	 
	$long = (((($points_long_estat_edad_hasta_2m[$i][talla]-45)/5)/10 )*(71-444))+444;
	array_push($ar_long_long_estat_edad_hasta_2m,$long);
	array_push($ar_edad_long_estat_edad_hasta_2m,$edad);		
	$cont_long_estat_edad_hasta_2m[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_hasta_2m;
 }
 
 
 
 function Longitud_edad_Puntuacion_Nac_Ninas($sql_long_estat_edad_hasta_2_v2_mz)
 {
	 
	$points_long_estat_edad_hasta_2zm = array();
	$i = 0;
	$ar_long_long_estat_edad_hasta_2zm = array();
	$ar_edad_long_estat_edad_hasta_2zm = array(); 
	$cont_long_estat_edad_hasta_2zm = array();	
	while ($rs = $sql_long_estat_edad_hasta_2_v2_mz->fetch_array()) {
	$points_long_estat_edad_hasta_2zm[] = $rs;
	$edad = (($points_long_estat_edad_hasta_2zm[$i][edad_corre_en_meses]/(24))*(722-63))+63;
	/*verificar la formula de la talla*/
	$long = (((($points_long_estat_edad_hasta_2zm[$i][talla]-42)/5)/11.4 )*(71-444))+444;
	array_push($ar_long_long_estat_edad_hasta_2zm,$long);
	array_push($ar_edad_long_estat_edad_hasta_2zm,$edad);		
	$cont_long_estat_edad_hasta_2zm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $long, 'r' => 5, 'fill' => 'blue', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_long_estat_edad_hasta_2zm;
 }
 
 function Peso_Longitud_Percentiles_Nac_2_Ninas($sql_peso_x_longitud_v2_m)
 {
	 $points_peso_x_longitudm = array();
	$i = 0;
	$ar_long_peso_x_longitudm = array();
	$ar_peso_peso_x_longitudm = array(); 
	$cont_peso_x_longitudm = array();	
	while ($sql_peso_x_longitud_v2_m!=null && $rs = $sql_peso_x_longitud_v2_m->fetch_array()) {
	$points_peso_x_longitudm[] = $rs;  
	$peso = ((((($points_peso_x_longitudm[$i][peso]-1000)/1000 )/22)*(71-444))+444); 
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitudm[$i][talla]-45)/5)/13)*(722-63))+63)); 
	array_push($ar_long_peso_x_longitudm,$long);
	array_push($ar_peso_peso_x_longitudm,$edad);		
	$cont_peso_x_longitudm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_longitudm;
 }
 
 
 function Peso_Longitud_Puntuacion_Nac_2_Ninas($sql_peso_x_longitud_v2_mz)
 {
	 
	$points_peso_x_longitudzm = array();
	$i = 0;
	$ar_long_peso_x_longitudzm = array();
	$ar_peso_peso_x_longitudzm = array(); 
	$cont_peso_x_longitudzm = array();	
	while ($sql_peso_x_longitud_v2_mz!=null && $rs = $sql_peso_x_longitud_v2_mz->fetch_array()) {
	$points_peso_x_longitudzm[] = $rs;
	$peso = ((((($points_peso_x_longitudzm[$i][peso]-1000)/1000 )/24)*(71-444))+444);
	/*verificar la formula de la talla*/
	$long = (((((($points_peso_x_longitudzm[$i][talla]-45)/5)/13)*(722-63))+63));
	array_push($ar_long_peso_x_longitudzm,$long);
	array_push($ar_peso_peso_x_longitudzm,$edad);		
	$cont_peso_x_longitudzm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_longitudzm;
 }
 
 
 
 function Peso_Estatura_Percentiles_2a5_Ninas($sql_peso_x_estatura_v2_m)
 {
	 
	$points_peso_x_estaturam = array();
	$i = 0;
	$ar_long_peso_x_estaturam = array();
	$ar_peso_peso_x_estaturam = array(); 
	$cont_peso_x_estaturam = array();	
	while ($sql_peso_x_estatura_v2_m!=null && $rs = $sql_peso_x_estatura_v2_m->fetch_array()) {
	$points_peso_x_estaturam[] = $rs;
	$long = (((($points_peso_x_estaturam[$i][talla]-65)/5)/11)*(722-63))+63;	
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estaturam[$i][peso]-5000)/1000)/24)*(71-444))+444;
	array_push($ar_long_peso_x_estaturam,$long);
	array_push($ar_peso_peso_x_estaturam,$peso);		
	$cont_peso_x_estaturam[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_estaturam;
	 
 }
 
 function Peso_Estatura_Puntuacion_2a5_Ninas($sql_peso_x_estatura_v2_mz)
 {
	 $points_peso_x_estaturazm = array();
	$i = 0;
	$ar_long_peso_x_estaturazm = array();
	$ar_peso_peso_x_estaturazm = array(); 
	$cont_peso_x_estaturazm = array();	
	while ($sql_peso_x_estatura_v2_mz!=null && $rs = $sql_peso_x_estatura_v2_mz->fetch_array()) {
	$points_peso_x_estaturazm[] = $rs;
	$long = (((($points_peso_x_estaturazm[$i][talla]-65)/5)/11)*(722-63))+63;
	/*verificar la formula de la talla*/
	$peso = (((($points_peso_x_estaturazm[$i][peso]-4500)/1000)/27.5)*(71-444))+444;
	array_push($ar_long_peso_x_estaturazm,$long);
	array_push($ar_peso_peso_x_estaturazm,$peso);		
	$cont_peso_x_estaturazm[$i] = array('type' => 'circle', 'cx' => $long, 'cy' => $peso, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_peso_x_estaturazm;
 }
 
 
 function IMC_Edad_Percentiles_Nac_5_Ninas($sql_IMC_x_edad_v2_m)
 {
	$points_IMC_x_edadm = array();
	$i = 0;
	$ar_IMC_IMC_x_edadm = array();
	$ar_edad_IMC_x_edadm= array(); 
	$cont_IMC_x_edadm = array();	
	while ($sql_IMC_x_edad_v2_m!=null && $rs = $sql_IMC_x_edad_v2_m->fetch_array()) {
	$points_IMC_x_edadm[] = $rs;
	$edad = (((($points_IMC_x_edadm[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;	
	$IMC = (((($points_IMC_x_edadm[$i][IMC]-9.6)/1 )/11.8)*(71-444))+444;
	array_push($ar_IMC_IMC_x_edadm,$IMC);
	array_push($ar_edad_IMC_x_edadm,$edad);		
	$cont_IMC_x_edadm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_IMC_x_edadm;
 }
 
 
 function IMC_Edad_Puntuacion_Nac_5_Ninas($sql_IMC_x_edad_v2_mz)
 {
	 
	$points_IMC_x_edadzm = array();
	$i = 0;
	$ar_IMC_IMC_x_edadzm = array();
	$ar_edad_IMC_x_edadzm = array(); 
	$cont_IMC_x_edadzm = array();
	while ($sql_IMC_x_edad_v2_mz!=null && $rs = $sql_IMC_x_edad_v2_mz->fetch_array()) {
	$points_IMC_x_edadzm[] = $rs;
	$edad = (((($points_IMC_x_edadzm[$i][edad_corre_en_meses])-0)/(60-0))*(722-63))+63;	
	$IMC = (((($points_IMC_x_edadzm[$i][IMC]-9.2)/1 )/13.6)*(71-444))+444; 
	array_push($ar_IMC_IMC_x_edadzm,$IMC);
	array_push($ar_edad_IMC_x_edadzm,$edad);		
	$cont_IMC_x_edadzm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $IMC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_IMC_x_edadzm;
 }
 
 function CC_Edad_Puntuacion_Ninas($sql_CC_x_edad_v2_m)
 {
	 
	$points_CC_x_edadm = array();
	$i = 0;
	$ar_CC_CC_x_edadm = array();
	$ar_edad_CC_x_edadm = array(); 
	$cont_CC_x_edadm = array();
	
	while ($sql_CC_x_edad_v2_m!=null && $rs = $sql_CC_x_edad_v2_m->fetch_array()) {

	$points_CC_x_edadm[] = $rs;
	$edad = (((($points_CC_x_edadm[$i][edad_corre_en_meses])-0)/(60-0))*(714-66))+66;	 
	$CC = (((($points_CC_x_edadm[$i][Craneo]-30)/1 )/25.4)*(84-444))+444; 
	array_push($ar_CC_CC_x_edadm,$CC);
	array_push($ar_edad_CC_x_edadm,$edad);		
	$cont_CC_x_edadm[$i] = array('type' => 'circle', 'cx' => $edad, 'cy' => $CC, 'r' => 5, 'fill' => 'red', 'stroke' => 'none');
	$i = $i + 1;
	}
	return $cont_CC_x_edadm;
 }
 

?>