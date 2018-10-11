<?php
        

//pruebas varias solo valores datos etc prueba de graficos de barra con respecto de las variables.
       
        
include '../../conn/conexion.php';

$sql = "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR    
    ";

//echo $idcentro;
$idcentro = $_GET["idcentro"];
$opcion_edad_peso = $_GET["opcion_edad_peso"];

$opcion_ano = $_GET["opcion_ano"];
$opcCondicion = $_GET["opcCondicion"];

//echo $opctrimestre;
//echo $opcion_ano;

$nombre_centro = "";

$sqlT= "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR   
    WHERE 1
    ";



$sql = "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR    
    where 1
    ";


if (!$idcentro==0){ //SE FILTRA POR CENTRO QUE ELIGIO Y FUE OBLIGADO A ELEJIR SU CENTRO
    $sql = $sql." AND IDE_CNT = $idcentro";
}

if ($opcion_edad_peso==1){ $sql = $sql." AND BAS_EDAD_GEST >= 20 AND BAS_EDAD_GEST <=36"; }

if (!$opcion_ano==0){
    $sql = $sql." AND YEAR(ING.BAS_FEC_NAC_PCT)>=$opcion_ano AND YEAR(ING.BAS_FEC_NAC_PCT)<=$opcion_ano";
}
//if ($opcCondicion==1){ $sql = $sql." AND (ING.ANT_PARTO_FALLECE_SALA=1 or SGM.PERD_PACIEN_FALLE_SEG=1) "; }



conectar();
$consulta = "";
$consulta = mysql_query($sql);

$consultaNeocosur  = mysql_query($sqlT);

$consulta2 = "";
$consulta2 = mysql_query("
select NOM_CNT from CNT where IDE_CNT=$idcentro limit 1
");
desconectar();



//******************************************************************************
//valores por defecto de los graficos seccionados por peso
//******************************************************************************
        $fila11=0;
        $fila12=0;
        $fila13=100;
        $fila21=0;
        $fila22=0;
        $fila23=100;
        $fila31=0;
        $fila32=0;
        $fila33=100;
        $fila41=0;
        $fila42=0;
        $fila43=100;
        $filaT1=0;
        $filaT2=0;
        $filaT3=100;
        //*************************************************************
        //valores por defecto de los graficos seccionados por peso
        //*************************************************************
        $sw1=0; //501-600
        $sw2=0; //601-700
        $sw3=0; //701-800
        $sw4=0; //801-900

        $sw10=0; //1401-1500

        $cont1=0;
        $cont11=0;
        $cont12=0;
        $cont13=0;

        $cont2=0;
        $cont21=0;
        $cont22=0;
        $cont23=0;

        $cont3=0;
        $cont31=0;
        $cont32=0;
        $cont33=0;

        $cont4=0;
        $cont41=0;
        $cont42=0;
        $cont43=0;

        $contT=0;
        $contT1=0;
        $contT2=0;
        $contT3=0;
//***************************************************************************
//definicion de variables valores por defecto antes del grafico de mortalidad
//***************************************************************************
while ($row = mysql_fetch_assoc($consulta2)) {
$nombre_centro = $row['NOM_CNT']; //nombre del centro al cual pertenece
}



while ($row = mysql_fetch_assoc($consulta)) {
    /*$PAT_NEONA_LEUCOMALACIA = $row['PAT_NEONA_LEUCOMALACIA'];       //Leucomalacia  FILA2
    $PAT_NEONA_OXI_36_SEM = $row['PAT_NEONA_OXI_36_SEM'];           //Leucomalacia  fila3
    $PAT_NEONA_ECN = $row['PAT_NEONA_ECN'];                         //ECN  FILA4
    $PAT_NEONA_OFT_OJO_IZQ_ROP = $row['PAT_NEONA_OFT_OJO_IZQ_ROP']; //  FILA5
    $PAT_NEONA_OFT_OJO_DER_ROP = $row['PAT_NEONA_OFT_OJO_DER_ROP']; //  FILA5
    $PAT_NEONA_SEP_PRECOZ = $row['PAT_NEONA_SEP_PRECOZ'];                     //FILA6
    $PAT_NEONA_SEP_NUM_SEP_CLINICAS = $row['PAT_NEONA_SEP_NUM_SEP_CLINICAS'];                     //FILA7
    $PAT_NEONA_CLINICA_SDR = $row['PAT_NEONA_CLINICA_SDR'];         //FILA8
    $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA'];   //Leucomalacia  FILA9
    $PAT_NEONA_DUCTUS = $row['PAT_NEONA_DUCTUS'];   //Leucomalacia  FILA10     
     */
    
    $BAS_EDAD_GEST = $row['BAS_EDAD_GEST'];   //  FILA11
    $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA'];   //  FILA11
    $condicion001=0;
    if ($opcCondicion==1){
        if ($ANT_PARTO_FALLECE_SALA==1){
            $condicion001 = 1;
            $condicion002 = 0;
            $condicion003 = 0;
        }else{
            if ($ANT_PARTO_FALLECE_SALA==0){
                $condicion001 = 0;
                $condicion002 = 1;
                $condicion003 = 0;
            }else{
                    $condicion001 = 0;
                    $condicion002 = 0;
                    $condicion003 = 1;
            }
        }        
    }
    //echo "*".$BAS_EDAD_GEST ."**".$ANT_PARTO_FALLECE_SALA; echo "***"; echo $condicion003." - ";
    
    //****************************************************************************************************
    if ($BAS_EDAD_GEST >=20 && $BAS_EDAD_GEST <=24){
        $cont1++;
        
        if ($condicion001==1){ $cont11++; }
        if ($condicion002==1){ $cont12++; }
        if ($condicion003==1){ $cont13++; }

    }
  
    if ($BAS_EDAD_GEST >=25 && $BAS_EDAD_GEST <=28){
        $cont2++;
        if ($condicion001==1){ $cont21++; }
        if ($condicion002==1){ $cont22++; } 
        if ($condicion003==1){ $cont23++; }
    }
    if ($BAS_EDAD_GEST >=29 && $BAS_EDAD_GEST <=32){
        $cont3++;
        if ($condicion001==1){ $cont31++; }
        if ($condicion002==1){ $cont32++; }
        if ($condicion003==1){ $cont33++; }
        
    }
    if ($BAS_EDAD_GEST >=33 && $BAS_EDAD_GEST <=36){
        $cont4++;
        if ($condicion001==1){ $cont41++; }
        if ($condicion002==1){ $cont42++; }
        if ($condicion003==1){ $cont43++; }

    }
    $contT++;
    if ($condicion001==1){ $contT1++; }
    if ($condicion002==1){ $contT2++; } 
    if ($condicion003==1){ $contT3++; }
    
}
//******************************************************************************
//********** Asignacion de valores de variables que intervienen en el grafico y tabla
//******************************************************************************

    //1 $fila501_600
    if (!$cont1==0){
        $fila11=number_format( ($cont11*100)/$cont1 ,0);
        $fila12=number_format( ($cont12*100)/$cont1 ,0);
        $fila13=number_format( 100-$fila11-$fila12 ,0);
    }
    
    //2 $fila601_700
    if (!$cont2==0){
        $fila21=number_format( ($cont21*100)/$cont2 ,0);
        $fila22=number_format( ($cont22*100)/$cont2 ,0);
        $fila23=number_format( 100-$fila21-$fila22 ,0);
    }
    //3 $fila701_800
    if (!$cont3==0){
        $fila31=number_format( ($cont31*100)/$cont3 ,0);
        $fila32=number_format( ($cont32*100)/$cont3 ,0);
        $fila33=number_format( ($cont33*100)/$cont3 ,0);

        
    }
    //4 $fila801_900
    if (!$cont4==0){
        $fila41=number_format( ($cont41*100)/$cont4 ,0);
        $fila42=number_format( ($cont42*100)/$cont4 ,0);
        $fila43=number_format( 100-$fila41-$fila42 ,0);
    }

    

    //11 $fila1401_1500
    if (!$contT==0){    
        $filatotal=number_format( ($contT1*100)/$contT ,0);
        $filatotal2=number_format( ($contT2*100)/$contT,0);
        $filatotal3=number_format( 100-$filatotal-$filatotal2,0);
    }
 

//******************************************************************************
//********** Asignacion de valores de variables que intervienen en el grafico y tabla
//******************************************************************************

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Estadísticas de Morbilidad</title>
        <script language="JavaScript" src="../../scripts/scripts.js"></script>
        <script type="text/javascript" src="../../scripts/jquery-1.js"></script><!-- Simpletip-->
        <script type="text/javascript" src="niftycube.js"></script>
        <script language="JavaScript">
            window.onload=function(){
                Nifty("div#encabezado_tabla","medium");
                Nifty("div#encabezado_tabla2","medium");
                AplicarCebra();
            }

        </script>    
        
        <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="estilo.css" type="text/css" media="print" />

        <style type="text/css">
            <!--
            div#encabezado_tabla {
                width:450px;
                font-weight:bold;
                color:#FFF;
                background-color:#0065a8;
                padding:1px;
                text-align: center;
                line-height: 17px;}

            div#encabezado_tabla2 {
                width:450px;
                font-weight:bold;
                color:#FFF;
                background-color:#0065a8;
                padding:1px;
                text-align: center;
                line-height: 17px;}

            .rotate {-webkit-transform: rotate(90deg);	
                     -moz-transform: rotate(270deg);
                     -ms-transform: rotate(90deg);
                     -o-transform: rotate(90deg);
                     transform: rotate(90deg);
                    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            }
            -->
            
            .grafico1{
    background: url(fondo_grafico1.jpg) no-repeat; position: relative;width:450px;height:300px;
    
}

        </style>


    </head>

    <body>

        <div id="wrapper_graficos">
            <div id="espacio_graficos">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="40" class="titulo_ficha">Estadísticas de HIC por Edad Gestacional FUR. (20 a 36 semanas)</td>
                        <td width="140" align="right"><img src="../../images/logo_textopeq.gif" width="140" height="33" alt="Neocosur" /></td>
                    </tr>
                </table>

                <div class="saber">&nbsp;Imprimir<a href="javascript:window.print();"><img src="../../images/print.png" alt="Imprimir" width="16" height="16" hspace="3" border="0"/></a> 
                    &nbsp;Ver Gráfico de Mortalidad
                <a href="graficos1.php?idcentro=<?php echo $idcentro; ?>&opcion_edad_peso=<?php echo $opcion_edad_peso; ?>&opcion_ano=<?php echo $opcion_ano; ?>&opctrimestre=<?php echo $opctrimestre; ?>"><img src="../../images/grafico.png" alt="Ver Gráfico" width="16" height="16" hspace="3" border="0"/></a>
                </div>
                <br />
                
                <!-- ************************************************************************************************************* -->
                <!-- ************************************************************************************************************* -->
                <!-- ************************************************************************************************************* -->
                <!-- ************************************************************************************************************* -->
                <!-- ************************************************************************************************************* -->
                <table>
                <tr>
                
                    <td>                
                    <table>
                        <tr><td>
                                
                            <div style="position: relative;width:370px;height:414px; left: 40px; border:1px solid #769DCD;" >
                                
                                <img src="fondoentero3.jpg" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/> 
                                 
                                <div  style="position: absolute; top: 5px; left: 150px; font-weight: bold; color: #03449A; font-size: 10pt; " >Totales <?php echo $nombre_centro; ?></div> <!-- Titulo -->

                                <div style="position: relative;width:14px;height:300px; " >
                                    
                                    
                                    <!--1 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila11;
                                    $top3=$fila11+$fila12;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 128px; height: 210px; width: 14px; top: 64px;" >
<?php $display_numcolum="none"; ?>                                        
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >1</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont1; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila11; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila11; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila12); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila12); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila12); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila13==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila13); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila13); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila13); ?>%</div>

                                        </div>
                                    </div>
                                    <!--2 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila21;
                                    $top3=$fila21+$fila22;
                                    ?>
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 165px; height: 210px; width: 14px; top: 64px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >2</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont2; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila21; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila21; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila22); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila22); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila22); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila23==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila23); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila23); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila23); ?>%</div>

                                        </div>
                                    </div>
                                    <!--3 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila31;
                                    $top3=$fila31+$fila32;

                                    //$top2=67;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 202px; height: 210px; width: 14px; top: 64px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >3</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont3; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila31; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila31; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila32); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila32); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila32); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila33==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila33); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila33); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila33); ?>%</div>

                                        </div>
                                    </div>
                                    <!--4 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila41;
                                    $top3=$fila41+$fila42;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 238px; height: 210px; width: 14px; top: 64px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >4</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont4; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila41; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila41; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila42); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila42); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila42); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila43==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila43); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila43); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila43); ?>%</div>

                                        </div>
                                    </div>
                                    
                                    <!--12 -->
                                    <?php 
                                    //sumar totales nomas con el objetivo de cuadrar la tabla                                    
                                    /*
                                    $contadorT1 = $cont11 + $cont21 + $cont31 + $cont41 ;
                                    $contadorT2 = $cont12 + $cont22 + $cont32 + $cont42 ;
                                    $contadorT3 = $cont13 + $cont23 + $cont33 + $cont43 ;
                                    $contadorT = $cont1 + $cont2 + $cont3 + $cont4 + $cont5;

                                    if (!$contadorT==0 && 1==2){
                                        $filaT1=number_format( ($contadorT1*100)/$contadorT ,0);
                                        $filaT2=number_format( ($contadorT2*100)/$contadorT ,0);
                                        $filaT3=number_format( ($contadorT3*100)/$contadorT ,0);                                        
                                    }
                                     * 
                                     */
                                    ?>    
                                    

                                    <?php 
                                    $top1=0;
                                    $top2=$filaT1;
                                    $top3=$filaT1+$filaT2;
                                    ?>
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 275px; height: 210px; width: 14px; top: 64px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >12</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $contT; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $filaT1; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $filaT1; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($filaT2); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($filaT2); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($filaT2); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($filaT3==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($filaT3); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($filaT3); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($filaT3); ?>%</div>

                                        </div>
                                    </div>
                                    <!-- -->
                                    
                                </div>
                            </div>    
                        </td></tr>
                        <tr>
                            <td>
                            <!-- ***************************************************************************** -->
                            <br>
                            <table width="920" border="0" cellpadding="0" cellspacing="0">                                    
                                    <tr> 
                                        <td valign="top"><div id="encabezado_tabla">Detalle Hospital Clínico Universidad de 
                                            Chile <br />
                                            Condición: HIC 
                                            <div class="texto" id="content_listado"> 
                                            <div align="center"> 
                                                <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                <tr> 
                                                    <td bgcolor="#83B6E9"><table width="450" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
                                                    <tr> 
                                                        <td width="110" bgcolor="#D5E6F7"><strong>Rango</strong><span class="pie"></span></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>P</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>%P</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>NP</strong></td>
                                                        <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>% 
                                                            NP</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>Total<br />
                                                        reg.</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>S/I</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>% S/I</strong></td>
                                                        <td align="center" bgcolor="#D5E6F7"><strong>Total<br />
                                                        niños</strong></td>
                                                        </tr>
                                                        <tr> 
                                                        <td valign="top" bgcolor="#D5E6F7"><strong>20-24</strong></td>
                                                        <td align="center" valign="top"><?php echo $cont11; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila11; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont12; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila12; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                        <td align="center" valign="top"><?php echo $cont13; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila13; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                        </tr>
                                                        <tr> 
                                                        <td valign="top" bgcolor="#D5E6F7"><strong>25-28</strong></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont21; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila21; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont22; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila22; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont23; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila23; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                        </tr>
                                                        <tr> 
                                                        <td valign="top" bgcolor="#D5E6F7"><strong>29-32</strong></td>
                                                        <td align="center" valign="top"><?php echo $cont31; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila31; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont32; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila32; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                        <td align="center" valign="top"><?php echo $cont33; ?></td>
                                                        <td align="center" valign="top"><?php echo $fila33; ?>%</td>
                                                        <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                        </tr>
                                                        <tr> 
                                                        <td valign="top" bgcolor="#D5E6F7"><strong>33-36</strong></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont41; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila41; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont42; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila42; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont43; ?></td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila43; ?>%</td>
                                                        <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                        </tr>
                                                        <tr> 
                                                        <td valign="top" bgcolor="#eaeaea" class="linea_borde"><strong>TOTALES</strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT1; ?></strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT1; ?>%</strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT2; ?></strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT2; ?>%</strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT3; ?></strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT3; ?>%</strong></td>
                                                        <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                        </tr>
                                                    </table></td>
                                                </tr>
                                                </table>
                                            </div>
                                            </div>
                                        </div></td>
                                    </tr>
                                    </table>                           
                            <!-- ***************************************************************************** -->
                            </td>                                
                        </tr>
                    </table>
                    </td>
<!-- ************************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************************** -->
                            <?php
                            //******************************************************************************
                            //valores por defecto de los graficos seccionados por peso
                            //******************************************************************************
                            
                            ?>
<!-- ************************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************************** -->











                    

                </tr>

                </table>
                <!-- ************************************************************************************************************************** -->
                <!-- ************************************************************************************************************************** -->
                <!-- ************************************************************************************************************************** -->
                <!-- ************************************************************************************************************************** -->
                <!-- ************************************************************************************************************************** -->
                
                <br>


            </div>
            <p class="bottom">
                <input name="button11" type="button" class="botonCentral" id="button11" onclick="location.href = 'filtro2.php'" value="Cerrar" />
            </p>

        </div></body>
    
</html>




