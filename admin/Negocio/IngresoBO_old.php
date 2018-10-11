<?php

require '../capaDAO/ConexionDAO.php';
include '../capaEntidades/ingreso.php';
include '../capaDAO/IngresoDAO.php';
include '../ayuda.php';

$r=nulo($_POST);

 




/*foreach ($_POST as $key => $value) {    
    if($value==''){
       $arr[$key] =  'null';
    }
    else{
        $arr[$key] = $value;
    } 
    
}*/
//echo $nombres;


//die;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//die;
//$arreglo = extract($_POST);
//$arreglo 
echo "<br> Conexion PRENA";
$cone = new ConexionDAO();

echo "<br> ";
 
echo "aers222;".$id."<br> <br>";

$idEstado=179;
extract($_POST);

//$ingreso = new ingreso($nombres, $paterno, $materno, $fecha_nacimiento, $num_ficha, $rut_dni, $edad_gest, 12, $idEstado, $fecha_nacimiento);
echo "paso 1 ";

$id=$_GET["id_neocosur"];

//var_dump($prenatales);
 //   print_r($prenatales);die;
//print_r(new IngresoDAO());
$dao =  new IngresoDAO($cone);
//$daoPre= new antecedentes_prenatalesDAO();
echo "oculto --> ".$idOculto;
//print_r($dao);die;

$ingreso = new ingreso($nombres,$paterno,$materno,$fecha_nacimiento ,
        $num_ficha,$genero,$presentacion,$tipoParto,$peso,
        $talla,$craneo,$apgar1,$apgar5,'1',179,'1');

if($idOculto==""){
   
    //echo "paso 2";die;
   //$conexion = new ConexionDAO(); 
   //print_r($conexion);die;
    //print_r($dao->guarda($ingreso,$conexion));die;
        if ($dao->guarda($ingreso)>0){
            echo "paso 2";
       
        $id =$dao->getId();
        
        header("location: ../ficha_ingreso.php?id_neocosur=".$id."");
        
        }
        else
        {
            
             header("location: ../ficha_ingreso.php");
        }
        
}
else {
   
    //print_r($prenatales);die;
    /*
//print_r($prenatales);


//print_r($daoPre);
$prenatales->setANIO_ESCOLARIDAD('null');

    $conexion = new ConexionDAO(); 
    */
    $ingreso->setId_NEOCOSUR($idOculto);
     echo "<br>paso 2 ".$ingreso->getAPELLIDO_PATERNO();
    //$prenatales->setID_NEOCOSUR($idOculto);
    //$prenatales->setANIO_ESCOLARIDAD('null');
    //$daoPre->actualizar($prenatales,$conexion);
    //echo "paso 3 ";
    //echo "numero --> ".$num_ficha;die;
    if ($dao->actualizar($ingreso)){
     
    // $daoPre->actualizar($prenatales,$conexion);
    /*session_start();
    $_SESSION["id_neocosur ;*/
    //$id =$_SESSION["id_neocosur;
   
    
    
    header("location: ../ficha_ingreso.php?id_neocosur=".$idOculto."");
    unset($dao);
    }
}