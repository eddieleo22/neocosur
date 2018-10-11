

<?php

include '../ficha/funciones/funciones_ingreso.php';

$idcentro = $_POST["idcentro"];
$nombre_centro = "";

conectar();
$consulta = "";
$consulta = mysql_query("
SELECT * 
FROM ING
LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR
");


$consulta2 = "";
$consulta2 = mysql_query("
select NOM_CNT from CNT where IDE_CNT=$idcentro limit 1
");
desconectar();

while ($row = mysql_fetch_assoc($consulta2)) {
    $nombre_centro = $row['NOM_CNT'];
}


$totalregistrosING = 0;
$peso = 0;







//valores por defecto
$fila501_600=0;
$fila501_6002=0;
$fila501_6003=100;
//2 $fila601_700
$fila601_700=0;
$fila601_7002=0;
$fila601_7003=100;
//3 $fila701_800
$fila701_800=0;
$fila701_8002=0;
$fila701_8003=100;
//4 $fila801_900
$fila801_900=0;
$fila801_9002=0;
$fila801_9003=100;
//5 $fila901_1000
$fila901_1000=0;
$fila901_10002=0;
$fila901_10003=100;
//6 $fila1001_1100
$fila1001_1100=0;
$fila1001_11002=0;
$fila1001_11003=100;
//7 $fla1101_1200
$fla1101_1200=0;
$fla1101_12002=0;
$fla1101_12003=100;
//8 $fila1201_1300
$fila1201_1300=0;
$fila1201_13002=0;
$fila1201_13003=100;
//9 $fila1301_1400
$fila1301_1400=0;
$fila1301_14002=0;
$fila1301_14003=100;
//10 $fila1401_1500
$fila1401_1500=0;
$fila1401_15002=0;
$fila1401_15003=100;
//11 $fila1401_1500
$filatotal=0;
$filatotal2=0;
$filatotal3=100;





//1 $fila501_600
$fila501_600=81;
$fila501_6002=19;
$fila501_6003=100-$fila501_600-$fila501_6002;
//2 $fila601_700
$fila601_700=59;
$fila601_7002=30;
$fila601_7003=100-$fila601_700-$fila601_7002;
//3 $fila701_800
$fila701_800=52;
$fila701_8002=48;
$fila701_8003=100-$fila701_800-$fila701_8002;
//4 $fila801_900
$fila801_900=53;
$fila801_9002=47;
$fila801_9003=100-$fila801_900-$fila801_9002;
//5 $fila901_1000
$fila901_1000=31;
$fila901_10002=69;
$fila901_10003=100-$fila901_1000-$fila901_10002;
//6 $fila1001_1100
$fila1001_1100=41;
$fila1001_11002=50;
$fila1001_11003=100-$fila1001_1100-$fila1001_11002;
//7 $fla1101_1200
$fla1101_1200=60;
$fla1101_12002=40;
$fla1101_12003=100-$fla1101_1200 -$fla1101_12002 ;
//8 $fila1201_1300
$fila1201_1300=20;
$fila1201_13002=80;
$fila1201_13003=100-$fila1201_1300-$fila1201_13002;
//9 $fila1301_1400
$fila1301_1400=30;
$fila1301_14002=70;
$fila1301_14003=100-$fila1301_1400-$fila1301_14002;
//10 $fila1401_1500
$fila1401_1500=18;
$fila1401_15002=82;
$fila1401_15003=100-$fila1401_1500-$fila1401_15002;
//11 $fila1401_1500
$filatotal=50;
$filatotal2=50;
$filatotal3=100-$filatotal-$filatotal2;




while ($row = mysql_fetch_assoc($consulta)) {
    //echo "DATOS $peso";
    $ANT_PARTO_PESO_NAC = $row['ANT_PARTO_PESO_NAC']; //ANTENCEDENTES DEL PARTO EL PESO QUE SE CONSIDERO ES EL PESO AL NACER
    //echo "DATOS $ANT_PARTO_PESO_NAC";
    $totalregistrosING = $totalregistrosING + 1;

    if ($ANT_PARTO_PESO_NAC >= 501 && $ANT_PARTO_PESO_NAC < 600) {
        $peso501_600 = 0;
    }
}



echo "total de registros $totalregistrosING";
$row['IDE_CNT'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Estadísticas de Mortalidad por Peso (500 a 1.500 g.)</title>
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
.grafico2{
border:1px green solid; position: absolute; left: 64px; height: 210px; width: 16px; top: 28px;
}
.grafico3{
    position: absolute; top: -20px
}
        </style>


    </head>

    <body>

        <div id="wrapper_graficos">
            <div id="espacio_graficos">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="40" class="titulo_ficha">Estadísticas de Mortalidad por Peso 
                            (500 a 1.500 g.)</td>
                        <td width="140" align="right"><img src="../../images/logo_textopeq.gif" width="140" height="33" alt="Neocosur" /></td>
                    </tr>
                </table>

                <div class="saber">&nbsp;Imprimir<a href="javascript:window.print();"><img src="../../images/print.png" alt="Imprimir" width="16" height="16" hspace="3" border="0"/></a> 
                    &nbsp;Ver Gráfico de Morbilidad<a href="grafico2.htm"><img src="../../images/grafico.png" alt="Ver Gráfico" width="16" height="16" hspace="3" border="0"/></a></div>
                <br />

                <div class="caja_graficos" >
                    <table width="100%">
                        <tr>
                            <td class ="titulo_graficos" bgcolor="#D5E6F7" align="center">Totales Hospital Clinico  <?php echo $nombre_centro; ?><span class="pie"></span></td>
                        </tr>
                    </table>
                    <div style="background-color: #D5E6F6; width: 400px; position: absolute; top: 30px; z-index: 1000; ">
                       Totales Hospital Clinico  <?php echo $nombre_centro; ?> 
                    </div>
                    <!-- ************************************************************************** -->
                    <!-- ************************************************************************** -->
                    <!-- ************************************************************************** -->
                    <div class="grafico1" >

                        <div class="grafico2" >
                            
                            <div class="grafico3"><?php echo $fila501_600; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila501_600; ?>%; width: 100%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila501_600; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila501_6002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila501_6002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila501_6003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila501_6003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila501_6003); ?>%</div>
                                
                            </div>
                        </div> 
                        <!-- 2 $fila601_700************************************************************************** -->
                        <div style="border:1px green solid; position: absolute; left: 101px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila601_700; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila601_700; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila601_700; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila601_7002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila601_7002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila601_7003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila601_7003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila601_7003); ?>%</div>
                                
                            </div>
                        </div> 
                        <!-- 3 $fila701_800************************************************************************** -->
                        <div style="border:1px green solid; position: absolute; left: 135px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila701_800; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila701_800; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila701_800; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila701_8002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila701_8002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila701_8003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila701_8003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila701_8003); ?>%</div>
                                
                            </div>
                        </div> 
                        <!-- 4 $fila801_900************************************************************************** -->
                        <div style="border:1px green solid; position: absolute; left: 169px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila801_900; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila801_900; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila801_900; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila801_9002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila801_9002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila801_9003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila801_9003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila801_9003); ?>%</div>
                                
                            </div>
                        </div> 
                        
                        <!-- 5 $fila901_1000************************************************************************** -->
                        <div style="border:1px green solid; position: absolute; left: 203px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila901_1000; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila901_1000; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila901_1000; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila901_10002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila901_10002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila901_10003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila901_10003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila901_10003); ?>%</div>
                                
                            </div>
                        </div> 
                        
                        <!-- 6 $fila1001_1100************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 238px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila1001_1100; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1001_1100; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila1001_1100; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1001_11002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1001_11002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila1001_11003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila1001_11003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1001_11003); ?>%</div>
                                
                            </div>
                        </div> 
                        <!-- 7 ************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 273px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fla1101_1200; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fla1101_1200; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fla1101_1200; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fla1101_12002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fla1101_12002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fla1101_12003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fla1101_12003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fla1101_12003); ?>%</div>
                                
                            </div>
                        </div>

                        <!-- 8 ************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 307px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila1201_1300; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1201_1300; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila1201_1300; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1201_13002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1201_13002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila1201_13003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila1201_13003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1201_13003); ?>%</div>
                                
                            </div>
                        </div>
                        <!-- 9 $fila1301_1400************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 343px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila1301_1400; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1301_1400; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila1301_1400; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1301_14002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1301_14002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila1301_14003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila1301_14003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1301_14003); ?>%</div>
                                
                            </div>
                        </div>
                        
                        <!-- 10 $fila1301_1400************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 376px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $fila1401_1500; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1401_1500; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $fila1401_1500; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1401_15002); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1401_15002); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($fila1401_15003==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila1401_15003); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($fila1401_15003); ?>%</div>
                                
                            </div>
                        </div>
                        
                        <!-- 11 $fila1301_1400************************************************************************** -->
                        
                        <div style="border:1px green solid; position: absolute; left: 411px; height: 210px; width: 16px; top: 28px">
                            
                            <div style="position: absolute; top: -20px"><?php echo $filatotal; ?></div>

                            <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $filatotal; ?>%;">
                                <div style="height: 50%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo $filatotal; ?>%</div>
                                
                            </div>

                            <div style="background-color: #99CDFF; bottom: 0px; height: <?php echo ($filatotal2); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($filatotal2); ?>%</div>
                                
                            </div>
                            <?php 
                                $mostrar="";
                                if ($filatotal3==0) {$mostrar="none";}
                            ?>
                            <div style="display: <?php echo $mostrar; ?>; background-color: #99FFCD; bottom: 0px; height: <?php echo ($filatotal3); ?>%">
                                <div style="height: 40%"></div>
                                <div class="rotate" style="position: absolute;"><?php echo ($filatotal3); ?>%</div>
                                
                            </div>
                        </div>
                        
                    <!-- ************************************************************************** -->
                    <!-- ************************************************************************** -->
                    <!-- ************************************************************************** -->   
                    </div>
                    

                                        
                    <div style="background: url(fondo_grafico2.jpg) no-repeat;width:450px;height:100px">

                    </div>

                </div>
                <br>

                    <table width="920" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                            <td align="center"><img src="../../images/images_graficos/graf_a_mortal.gif" width="453" height="397" /></td>
                            <td align="center"><img src="../../images/images_graficos/graf_b_mortal.gif" width="453" height="397" /></td>
                        </tr>
                        <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr> 
                            <td valign="top"><div id="encabezado_tabla">Detalle Hospital Clínico Universidad 
                                    Católica 
                                    <div class="texto" id="content_listado"> 
                                        <div align="center"> 
                                            <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                <tr> 
                                                    <td bgcolor="#83B6E9"><table width="450" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
                                                            <tr> 
                                                                <td bgcolor="#D5E6F7"><strong>Rango de peso (g.) </strong><span class="pie"></span></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>F</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>%F</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>NF</strong></td>
                                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>% 
                                                                        NF</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>Total reg. 
                                                                    </strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>S/I</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>% S/I </strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>Total niños 
                                                                    </strong></td>
                                                            </tr>
                                                            <tr> 
                                                                <td width="110" valign="top" bgcolor="#D5E6F7"><strong>501-600</strong></td>
                                                                <td align="center" valign="top">60</td>
                                                                <td align="center" valign="top">60</td>
                                                                <td align="center" valign="top">40</td>
                                                                <td align="center" valign="top">40</td>
                                                                <td align="center" valign="top">100</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>601-700</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>701-800</strong></td>
                                                                <td align="center" valign="top">10</td>
                                                                <td align="center" valign="top">10</td>
                                                                <td align="center" valign="top">90</td>
                                                                <td align="center" valign="top">90</td>
                                                                <td align="center" valign="top">100</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>801-900</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">30</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">30</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">70</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">70</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>901-1000</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1001-1100</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">40</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">40</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">60</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">60</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1101-1200</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1201-1300</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1301-1400</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1401-1500</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">100</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="eaeaea" class="linea_borde"><strong>TOTAL</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>500</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>50%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>500</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>50%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>1000</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>1000</strong></td>
                                                            </tr>
                                                        </table></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div></td>
                            <td valign="top"> <div id="encabezado_tabla2">Detalle Neocosur 
                                    <div class="texto" id="content_listado"> 
                                        <div align="center"> 
                                            <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                                <tr> 
                                                    <td bgcolor="#83B6E9"><table width="450" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
                                                            <tr> 
                                                                <td width="110" bgcolor="#D5E6F7"><strong>Rango de peso 
                                                                        (g.) </strong><span class="pie"></span></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>F</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>%F</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>NF</strong></td>
                                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>% 
                                                                        NF</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>Total reg. 
                                                                    </strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>S/I</strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>% S/I </strong></td>
                                                                <td align="center" bgcolor="#D5E6F7"><strong>Total niños 
                                                                    </strong></td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>501-600</strong></td>
                                                                <td align="center" valign="top">600</td>
                                                                <td align="center" valign="top">60</td>
                                                                <td align="center" valign="top">400</td>
                                                                <td align="center" valign="top">40</td>
                                                                <td align="center" valign="top">10000</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>601-700</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">200</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">800</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>701-800</strong></td>
                                                                <td align="center" valign="top">100</td>
                                                                <td align="center" valign="top">10</td>
                                                                <td align="center" valign="top">900</td>
                                                                <td align="center" valign="top">90</td>
                                                                <td align="center" valign="top">10000</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">0</td>
                                                                <td align="center" valign="top">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>801-900</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">300</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">30</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">700</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">70</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>901-1000</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">800</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">200</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1001-1100</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">400</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">40</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">600</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">60</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1101-1200</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">500</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">500</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1201-1300</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">800</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">200</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1301-1400</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">500</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">500</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">50</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="#D5E6F7"><strong>1401-1500</strong></td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">800</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">80</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">200</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">20</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                <td align="center" valign="top" bgcolor="#FFFFFF">10000</td>
                                                            </tr>
                                                            <tr> 
                                                                <td valign="top" bgcolor="eaeaea" class="linea_borde"><strong>TOTAL</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>5000</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>50%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>5000</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>50%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>10000</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0%</strong></td>
                                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $totalregistrosING; ?></strong></td>
                                                            </tr>
                                                        </table></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div></td>
                        </tr>
                    </table>

            </div>
            <p class="bottom">
                <input name="button11" type="button" class="botonCentral" id="button11" onclick="window.close()" value="Cerrar" />
            </p>

        </div></body>
</html>

