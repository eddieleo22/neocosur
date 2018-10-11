<?php
        //*************************************************************
        //valores por defecto de los graficos seccionados por peso
        //************************************************************* 
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
        //*************************************************************
        //valores por defecto de los graficos seccionados por peso
        //*************************************************************
        //sw por defecto por peso o seccion
        $sw1=0; //501-600
        $sw2=0; //601-700
        $sw3=0; //701-800
        $sw4=0; //801-900
        $sw5=0; //901-1000
        $sw6=0; //1001-1100
        $sw7=0; //1101-1200
        $sw8=0; //1201-1300
        $sw9=0; //1301-1400
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

        $cont5=0;
        $cont51=0;
        $cont52=0;
        $cont53=0;

        $cont6=0;
        $cont61=0;
        $cont62=0;
        $cont63=0;

        $cont7=0;
        $cont71=0;
        $cont72=0;
        $cont73=0;

        $cont8=0;
        $cont81=0;
        $cont82=0;
        $cont83=0;

        $cont9=0;
        $cont91=0;
        $cont92=0;
        $cont93=0;

        $cont10=0;
        $cont101=0;
        $cont102=0;
        $cont103=0;

        $contT=0;
        $contT1=0;
        $contT2=0;
        $contT3=0;
        //*************************************************************
        //definicion de variables valores por defecto antes del grafico de mortalidad
        //*************************************************************


include '../ficha/funciones/funciones_ingreso.php';


$sql = "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR    
    ";

//echo $idcentro;
$idcentro = $_GET["idcentro"];
$opcion_edad_peso = $_GET["opcion_edad_peso"];
$opcion_ano = $_GET["opcion_ano"];
$opctrimestre = $_GET["opctrimestre"];

//echo $opctrimestre;
//echo $opcion_ano;

$nombre_centro = "";

$sqlT= "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR    
    where  ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500
    ";

if (!$opcion_ano==0){
    $sqlT = $sqlT." AND YEAR(ING.BAS_FEC_NAC_PCT)>=$opcion_ano AND YEAR(ING.BAS_FEC_NAC_PCT)<=$opcion_ano";
}
if ($opctrimestre==1){
    $sqlT = $sqlT." AND MONTH (ING.BAS_FEC_NAC_PCT)>=1 AND MONTH (ING.BAS_FEC_NAC_PCT)<=3";
}
if ($opctrimestre==2){
    $sqlT = $sqlT." AND MONTH (ING.BAS_FEC_NAC_PCT)>=4 AND MONTH (ING.BAS_FEC_NAC_PCT)<=6";
}
if ($opctrimestre==3){
    $sqlT = $sqlT." AND MONTH (ING.BAS_FEC_NAC_PCT)>=7 AND MONTH (ING.BAS_FEC_NAC_PCT)<=9";
}
if ($opctrimestre==4){
    $sqlT = $sqlT." AND MONTH (ING.BAS_FEC_NAC_PCT)>=10 AND MONTH (ING.BAS_FEC_NAC_PCT)<=12";
}








$sql = "
    SELECT * 
    FROM ING
    LEFT JOIN SGM ON SGM.BAS_IDE_NEOCOSUR = ING.BAS_IDE_NEOCOSUR    
    where 1
    ";
if (!$idcentro==0){ //SE FILTRA POR CENTRO QUE ELIGIO Y FUE OBLIGADO A ELEJIR SU CENTRO
    $sql = $sql." AND IDE_CNT = $idcentro";
}

if ($opcion_edad_peso==1){ //se filtran por edad 20 a 36 semanas BAS_EDAD_GEST
    $sql = $sql." AND BAS_EDAD_GEST >= 20 AND BAS_EDAD_GEST <=36";
}
$sql = $sql." AND ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500";
//if ($opcion_edad_peso==2){ //se filtran por peso 500 a 1500 gr ANT_PARTO_PESO_NAC
//    $sql = $sql." AND ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500";
//}

if (!$opcion_ano==0){
    $sql = $sql." AND YEAR(ING.BAS_FEC_NAC_PCT)>=$opcion_ano AND YEAR(ING.BAS_FEC_NAC_PCT)<=$opcion_ano";
}
if ($opctrimestre==1){
    $sql = $sql." AND MONTH (ING.BAS_FEC_NAC_PCT)>=1 AND MONTH (ING.BAS_FEC_NAC_PCT)<=3";
}
if ($opctrimestre==2){
    $sql = $sql." AND MONTH (ING.BAS_FEC_NAC_PCT)>=4 AND MONTH (ING.BAS_FEC_NAC_PCT)<=6";
}
if ($opctrimestre==3){
    $sql = $sql." AND MONTH (ING.BAS_FEC_NAC_PCT)>=7 AND MONTH (ING.BAS_FEC_NAC_PCT)<=9";
}
if ($opctrimestre==4){
    $sql = $sql." AND MONTH (ING.BAS_FEC_NAC_PCT)>=10 AND MONTH (ING.BAS_FEC_NAC_PCT)<=12";
}

conectar();
$consulta = "";
$consulta = mysql_query($sql);
$consultaNeocosur  = mysql_query($sqlT);

$consulta2 = "";
$consulta2 = mysql_query("
select NOM_CNT from CNT where IDE_CNT=$idcentro limit 1
");
desconectar();


while ($row = mysql_fetch_assoc($consulta2)) {
$nombre_centro = $row['NOM_CNT']; //nombre del centro al cual pertenece
}



while ($row = mysql_fetch_assoc($consulta)) {
    $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA']; //fallece en la sala de parto
    $ANT_PARTO_PESO_NAC = $row['ANT_PARTO_PESO_NAC']; //peso al momento de nacer
    
    $PERD_PACIEN_FALLE_SEG = $row['PERD_PACIEN_FALLE_SEG']; //nombre del centro al cual pertenece
    
    if ($ANT_PARTO_PESO_NAC >=501 && $ANT_PARTO_PESO_NAC <=600){
        $sw1=1;
        $cont1=$cont1+1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont11++;
        }else{
            $cont12++;
        }
    }
    
    
    if ($ANT_PARTO_PESO_NAC >=601 && $ANT_PARTO_PESO_NAC <=700){
        $cont2=$cont2+1;
        $sw2=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont21++;
        }else{
            $cont22++;
        }
    }
    
    
    if ($ANT_PARTO_PESO_NAC >=701 && $ANT_PARTO_PESO_NAC <=800){
        $cont3=$cont3+1;
        $sw3=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont31++;
        }else{
            $cont32++;
        }        
    }
    
    if ($ANT_PARTO_PESO_NAC >=801 && $ANT_PARTO_PESO_NAC <=900){
        $cont4=$cont4+1;
        $sw4=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont41++;
        }else{
            $cont42++;
        }        
    }
    
    if ($ANT_PARTO_PESO_NAC >=901 && $ANT_PARTO_PESO_NAC <=1000){
        $cont5=$cont5+1;
        $sw5=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont51++;
        }else{
            $cont52++;
        }
    }
    if ($ANT_PARTO_PESO_NAC >=1001 && $ANT_PARTO_PESO_NAC <=1100){
        $cont6=$cont6+1;
        $sw6=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont61++;
        }else{
            $cont62++;
        }
    }
    if ($ANT_PARTO_PESO_NAC >=1101 && $ANT_PARTO_PESO_NAC <=1200){
        $cont7=$cont7+1;
        $sw7=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont71++;
        }else{
            $cont72++;
        }
    }
    
    if ($ANT_PARTO_PESO_NAC >=1201 && $ANT_PARTO_PESO_NAC <=1300){
        $cont8=$cont8+1;
        $sw8=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont81++;
        }else{
            $cont82++;
        }
    }
    
    if ($ANT_PARTO_PESO_NAC >=1301 && $ANT_PARTO_PESO_NAC <=1400){
        $cont9=$cont9+1;
        $sw9=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont91++;
        }else{
            $cont92++;
        }
    }
    
    if ($ANT_PARTO_PESO_NAC >=1401 && $ANT_PARTO_PESO_NAC <=1500){
        $cont10=$cont10+1;
        $sw10=1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont101++;
        }else{
            $cont102++;
        }
    }
    
    $contT = $contT + 1;
    if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
        $contT1++;
    }else{
        $contT2++;
    }
    
}
//1 $fila501_600
if (!$cont1==0){
    $fila501_600=number_format( ($cont11*100)/$cont1 ,0);
    $fila501_6002=number_format( ($cont12*100)/$cont1 ,0);
    $fila501_6003=number_format( 100-$fila501_600-$fila501_6002 ,0);
}
//2 $fila601_700
if (!$cont2==0){
    $fila601_700=number_format( ($cont21*100)/$cont2 ,0);
    $fila601_7002=number_format( ($cont22*100)/$cont2 ,0);
    $fila601_7003=number_format( 100-$fila601_700-$fila601_7002 ,0);
}
//3 $fila701_800
if (!$cont3==0){
    $fila701_800=number_format( ($cont31*100)/$cont3 ,0);
    $fila701_8002=number_format( ($cont32*100)/$cont3 ,0);
    $fila701_8003=number_format( 100-$fila701_800-$fila701_8002 ,0);
}
//4 $fila801_900
if (!$cont4==0){
    $fila801_900=number_format( ($cont41*100)/$cont4 ,0);
    $fila801_9002=number_format( ($cont42*100)/$cont4 ,0);
    $fila801_9003=number_format( 100-$fila801_900-$fila801_9002 ,0);
}
//5 $fila901_1000
if (!$cont5==0){
    $fila901_1000=number_format( ($cont51*100)/$cont5 ,0);
    $fila901_10002=number_format( ($cont52*100)/$cont5 ,0);
    $fila901_10003=number_format( 100-$fila901_1000-$fila901_10002 ,0);
}
//6 $fila1001_1100
if (!$cont6==0){
    $fila1001_1100=number_format( ($cont61*100)/$cont6 ,0);
    $fila1001_11002=number_format( ($cont62*100)/$cont6 ,0);
    $fila1001_11003=number_format( 100-$fila1001_1100-$fila1001_11002  ,0);
}
//7 $fla1101_1200
if (!$cont7==0){
    $fla1101_1200=number_format( ($cont71*100)/$cont7 ,0);
    $fla1101_12002=number_format( ($cont72*100)/$cont7 ,0);
    $fla1101_12003=number_format( 100-$fla1101_1200 -$fla1101_12002  ,0);
}
//8 $fila1201_1300
if (!$cont8==0){
    $fila1201_1300=number_format( ($cont81*100)/$cont8 ,0);
    $fila1201_13002=number_format( ($cont82*100)/$cont8 ,0);
    $fila1201_13003=number_format( 100-$fila1201_1300-$fila1201_13002 ,0);
}
//9 $fila1301_1400
if (!$cont9==0){
    $fila1301_1400=number_format( ($cont91*100)/$cont9 ,0);
    $fila1301_14002=number_format( ($cont92*100)/$cont9 ,0);
    $fila1301_14003=number_format( 100-$fila1301_1400-$fila1301_14002 ,0);
}
//10 $fila1401_1500
if (!$cont10==0){
    $fila1401_1500=number_format( ($cont101*100)/$cont10 ,0);
    $fila1401_15002=number_format( ($cont102*100)/$cont10 ,0);
    $fila1401_15003=number_format( 100-$fila1401_1500-$fila1401_15002 ,0);
}
//11 $fila1401_1500
if (!$contT==0){
    
    $filatotal=number_format( ($contT1*100)/$contT ,0);
    $filatotal2=number_format( ($contT2*100)/$contT,0);
    $filatotal3=number_format( 100-$filatotal-$filatotal2,0);

}
/*
$totalregistrosING = 0;
$peso = 0;

while ($row = mysql_fetch_assoc($consulta)) {
    //echo "DATOS $peso";
    $ANT_PARTO_PESO_NAC = $row['ANT_PARTO_PESO_NAC']; //ANTENCEDENTES DEL PARTO EL PESO QUE SE CONSIDERO ES EL PESO AL NACER
    //echo "DATOS $ANT_PARTO_PESO_NAC";
    $totalregistrosING = $totalregistrosING + 1;

    if ($ANT_PARTO_PESO_NAC >= 501 && $ANT_PARTO_PESO_NAC < 600) {
        $peso501_600 = 0;
    }
}
*/






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
                    &nbsp;Ver Gráfico de Morbilidad
                <a href="graficos2.php?idcentro=<?php echo $idcentro; ?>&opcion_edad_peso=<?php echo $opcion_edad_peso; ?>&opcion_ano=<?php echo $opcion_ano; ?>&opctrimestre=<?php echo $opctrimestre; ?>"><img src="../../images/grafico.png" alt="Ver Gráfico" width="16" height="16" hspace="3" border="0"/></a>
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

                            <div class="caja_graficos" >
                                <table width="100%">
                                    <tr>
                                        <td class ="titulo_graficos" bgcolor="#D5E6F7" align="center">Totales <?php echo $nombre_centro; ?><span class="pie"></span></td>
                                    </tr>
                                </table>
                                <!-- ************************************************************************** -->
                                <!-- ************************************************************************** -->
                                <!-- ************************************************************************** -->
                                <div class="grafico1" >

                                    <div class="grafico2" >

                                        <div class="grafico3"><?php echo $cont1; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila501_600; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila501_600; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila501_6002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila501_6002); ?>%">
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
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 101px; height: 210px; width: 16px; top: 28px">

                                        <div style="position: absolute; top: -20px"><?php echo $cont2; ?></div>

                                        <div style=" background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila601_700; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila601_700; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila601_7002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila601_7002); ?>%">
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila601_7002); ?>%</div>

                                        </div>
                                        <?php 
                                            $mostrar="";
                                            if ($fila601_7003==0) {$mostrar="none";}
                                        ?>
                                        <div style="display: <?php echo $mostrar; ?>;  background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila601_7003); ?>%">
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila601_7003); ?>%</div>

                                        </div>
                                    </div> 
                                    <!-- 3 $fila701_800************************************************************************** -->
                                    <div style="border:1px green solid; position: absolute; left: 135px; height: 210px; width: 16px; top: 28px">

                                        <div style="position: absolute; top: -20px"><?php echo $cont3; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila701_800; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila701_800; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila701_8002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila701_8002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont4; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila801_900; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila801_900; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila801_9002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila801_9002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont5; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila901_1000; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila901_1000; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila901_10002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila901_10002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont6; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1001_1100; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1001_1100; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1001_11002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1001_11002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont7; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fla1101_1200; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fla1101_1200; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fla1101_12002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fla1101_12002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont8; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1201_1300; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1201_1300; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1201_13002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1201_13002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont9; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1301_1400; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1301_1400; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1301_14002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1301_14002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont10; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1401_1500; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1401_1500; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1401_15002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1401_15002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $contT; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $filatotal; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $filatotal; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($filatotal2==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($filatotal2); ?>%">
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

                        </td></tr>
                        <tr><td>

                            <div id="encabezado_tabla">Detalle <?php echo $nombre_centro; ?>
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
                                                                    <td align="center" valign="top"><?php echo $cont11; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila501_600; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont12; ?> </td>
                                                                    <td align="center" valign="top"><?php echo $fila501_6002; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>601-700</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont21; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila601_700; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont22; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila601_7002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>701-800</strong></td>
                                                                    <td align="center" valign="top"><?php echo $cont31; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila701_800; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont32; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila701_8002; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>801-900</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont41; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila801_900; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont42; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila801_9002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>901-1000</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont51; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila901_1000; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont52; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila901_10002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1001-1100</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont61; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1001_1100; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont62; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1001_11002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1101-1200</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont71; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1101_1200; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont72; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1101_12002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1201-1300</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont81; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1201_1300; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont82; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1201_13002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1301-1400</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont91; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1301_1400; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont92; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1301_14002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1401-1500</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont101; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1401_1500; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont102; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1401_15002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="eaeaea" class="linea_borde"><strong>TOTAL</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT1; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filatotal; ?>%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT2; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filatotal2; ?>%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                            

                        </td></tr>

                    </table>
                    </td>
                    <!-- ************************************************************************************************************* -->
                    <!-- ************************************************************************************************************* -->
                    <!-- ************************************************************************************************************* -->
                    <!-- ************************************************************************************************************* -->
                    <!-- ************************************************************************************************************* -->
                    
                    <?php

                        //*************************************************************
                        //valores por defecto de los graficos seccionados por peso
                        //************************************************************* 
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
                        //*************************************************************
                        //valores por defecto de los graficos seccionados por peso
                        //*************************************************************
                        //sw por defecto por peso o seccion
                        $sw1=0; //501-600
                        $sw2=0; //601-700
                        $sw3=0; //701-800
                        $sw4=0; //801-900
                        $sw5=0; //901-1000
                        $sw6=0; //1001-1100
                        $sw7=0; //1101-1200
                        $sw8=0; //1201-1300
                        $sw9=0; //1301-1400
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

                        $cont5=0;
                        $cont51=0;
                        $cont52=0;
                        $cont53=0;

                        $cont6=0;
                        $cont61=0;
                        $cont62=0;
                        $cont63=0;

                        $cont7=0;
                        $cont71=0;
                        $cont72=0;
                        $cont73=0;

                        $cont8=0;
                        $cont81=0;
                        $cont82=0;
                        $cont83=0;

                        $cont9=0;
                        $cont91=0;
                        $cont92=0;
                        $cont93=0;

                        $cont10=0;
                        $cont101=0;
                        $cont102=0;
                        $cont103=0;

                        $contT=0;
                        $contT1=0;
                        $contT2=0;
                        $contT3=0;
                        //*************************************************************
                        //definicion de variables valores por defecto antes del grafico de mortalidad
                        //*************************************************************                    
                        while ($row = mysql_fetch_assoc($consultaNeocosur)) {
                            $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA']; //fallece en la sala de parto
                            $ANT_PARTO_PESO_NAC = $row['ANT_PARTO_PESO_NAC']; //peso al momento de nacer
                            $nombre_centro = $row['NOM_CNT']; //nombre del centro al cual pertenece
                            $PERD_PACIEN_FALLE_SEG = $row['PERD_PACIEN_FALLE_SEG']; //nombre del centro al cual pertenece

                            if ($ANT_PARTO_PESO_NAC >=501 && $ANT_PARTO_PESO_NAC <=600){
                                $sw1=1;
                                $cont1=$cont1+1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont11++;
                                }else{
                                    $cont12++;
                                }
                            }


                            if ($ANT_PARTO_PESO_NAC >=601 && $ANT_PARTO_PESO_NAC <=700){
                                $cont2=$cont2+1;
                                $sw2=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont21++;
                                }else{
                                    $cont22++;
                                }
                            }


                            if ($ANT_PARTO_PESO_NAC >=701 && $ANT_PARTO_PESO_NAC <=800){
                                $cont3=$cont3+1;
                                $sw3=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont31++;
                                }else{
                                    $cont32++;
                                }        
                            }

                            if ($ANT_PARTO_PESO_NAC >=801 && $ANT_PARTO_PESO_NAC <=900){
                                $cont4=$cont4+1;
                                $sw4=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont41++;
                                }else{
                                    $cont42++;
                                }        
                            }

                            if ($ANT_PARTO_PESO_NAC >=901 && $ANT_PARTO_PESO_NAC <=1000){
                                $cont5=$cont5+1;
                                $sw5=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont51++;
                                }else{
                                    $cont52++;
                                }
                            }
                            if ($ANT_PARTO_PESO_NAC >=1001 && $ANT_PARTO_PESO_NAC <=1100){
                                $cont6=$cont6+1;
                                $sw6=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont61++;
                                }else{
                                    $cont62++;
                                }
                            }
                            if ($ANT_PARTO_PESO_NAC >=1101 && $ANT_PARTO_PESO_NAC <=1200){
                                $cont7=$cont7+1;
                                $sw7=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont71++;
                                }else{
                                    $cont72++;
                                }
                            }

                            if ($ANT_PARTO_PESO_NAC >=1201 && $ANT_PARTO_PESO_NAC <=1300){
                                $cont8=$cont8+1;
                                $sw8=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont81++;
                                }else{
                                    $cont82++;
                                }
                            }

                            if ($ANT_PARTO_PESO_NAC >=1301 && $ANT_PARTO_PESO_NAC <=1400){
                                $cont9=$cont9+1;
                                $sw9=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont91++;
                                }else{
                                    $cont92++;
                                }
                            }

                            if ($ANT_PARTO_PESO_NAC >=1401 && $ANT_PARTO_PESO_NAC <=1500){
                                $cont10=$cont10+1;
                                $sw10=1;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $cont101++;
                                }else{
                                    $cont102++;
                                }
                            }

                            $contT = $contT + 1;
                            if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                $contT1++;
                            }else{
                                $contT2++;
                            }

                        }
                        //1 $fila501_600
                        if (!$cont1==0){
                            $fila501_600=number_format( ($cont11*100)/$cont1 ,0);
                            $fila501_6002=number_format( ($cont12*100)/$cont1 ,0);
                            $fila501_6003=number_format( 100-$fila501_600-$fila501_6002 ,0);
                        }
                        //2 $fila601_700
                        if (!$cont2==0){
                            $fila601_700=number_format( ($cont21*100)/$cont2 ,0);
                            $fila601_7002=number_format( ($cont22*100)/$cont2 ,0);
                            $fila601_7003=number_format( 100-$fila601_700-$fila601_7002 ,0);
                        }
                        //3 $fila701_800
                        if (!$cont3==0){
                            $fila701_800=number_format( ($cont31*100)/$cont3 ,0);
                            $fila701_8002=number_format( ($cont32*100)/$cont3 ,0);
                            $fila701_8003=number_format( 100-$fila701_800-$fila701_8002 ,0);
                        }
                        //4 $fila801_900
                        if (!$cont4==0){
                            $fila801_900=number_format( ($cont41*100)/$cont4 ,0);
                            $fila801_9002=number_format( ($cont42*100)/$cont4 ,0);
                            $fila801_9003=number_format( 100-$fila801_900-$fila801_9002 ,0);
                        }
                        //5 $fila901_1000
                        if (!$cont5==0){
                            $fila901_1000=number_format( ($cont51*100)/$cont5 ,0);
                            $fila901_10002=number_format( ($cont52*100)/$cont5 ,0);
                            $fila901_10003=number_format( 100-$fila901_1000-$fila901_10002 ,0);
                        }
                        //6 $fila1001_1100
                        if (!$cont6==0){
                            $fila1001_1100=number_format( ($cont61*100)/$cont6 ,0);
                            $fila1001_11002=number_format( ($cont62*100)/$cont6 ,0);
                            $fila1001_11003=number_format( 100-$fila1001_1100-$fila1001_11002  ,0);
                        }
                        //7 $fla1101_1200
                        if (!$cont7==0){
                            $fla1101_1200=number_format( ($cont71*100)/$cont7 ,0);
                            $fla1101_12002=number_format( ($cont72*100)/$cont7 ,0);
                            $fla1101_12003=number_format( 100-$fla1101_1200 -$fla1101_12002  ,0);
                        }
                        //8 $fila1201_1300
                        if (!$cont8==0){
                            $fila1201_1300=number_format( ($cont81*100)/$cont8 ,0);
                            $fila1201_13002=number_format( ($cont82*100)/$cont8 ,0);
                            $fila1201_13003=number_format( 100-$fila1201_1300-$fila1201_13002 ,0);
                        }
                        //9 $fila1301_1400
                        if (!$cont9==0){
                            $fila1301_1400=number_format( ($cont91*100)/$cont9 ,0);
                            $fila1301_14002=number_format( ($cont92*100)/$cont9 ,0);
                            $fila1301_14003=number_format( 100-$fila1301_1400-$fila1301_14002 ,0);
                        }
                        //10 $fila1401_1500
                        if (!$cont10==0){
                            $fila1401_1500=number_format( ($cont101*100)/$cont10 ,0);
                            $fila1401_15002=number_format( ($cont102*100)/$cont10 ,0);
                            $fila1401_15003=number_format( 100-$fila1401_1500-$fila1401_15002 ,0);
                        }
                        //11 $fila1401_1500
                        if (!$contT==0){

                            $filatotal=number_format( ($contT1*100)/$contT ,0);
                            $filatotal2=number_format( ($contT2*100)/$contT,0);
                            $filatotal3=number_format( 100-$filatotal-$filatotal2,0);

                        }                    
                    
                    
                    ?>
                    
                    
                    
                    <td>                
                    <table>
                        <tr><td>

                            <div class="caja_graficos" >
                                <table width="100%">
                                    <tr>
                                        <td class ="titulo_graficos" bgcolor="#D5E6F7" align="center">Totales Neocosur  <?php echo $nombre_centro; ?><span class="pie"></span></td>
                                    </tr>
                                </table>
                                <!-- ************************************************************************** -->
                                <!-- ************************************************************************** -->
                                <!-- ************************************************************************** -->
                                <div class="grafico1" >

                                    <div class="grafico2" >

                                        <div class="grafico3"><?php echo $cont1; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila501_600; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila501_600; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila501_6002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila501_6002); ?>%">
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
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 101px; height: 210px; width: 16px; top: 28px">

                                        <div style="position: absolute; top: -20px"><?php echo $cont2; ?></div>

                                        <div style=" background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila601_700; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila601_700; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila601_7002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila601_7002); ?>%">
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila601_7002); ?>%</div>

                                        </div>
                                        <?php 
                                            $mostrar="";
                                            if ($fila601_7003==0) {$mostrar="none";}
                                        ?>
                                        <div style="display: <?php echo $mostrar; ?>;  background-color: #99FFCD; bottom: 0px; height: <?php echo ($fila601_7003); ?>%">
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila601_7003); ?>%</div>

                                        </div>
                                    </div> 
                                    <!-- 3 $fila701_800************************************************************************** -->
                                    <div style="border:1px green solid; position: absolute; left: 135px; height: 210px; width: 16px; top: 28px">

                                        <div style="position: absolute; top: -20px"><?php echo $cont3; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila701_800; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila701_800; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila701_8002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila701_8002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont4; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila801_900; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila801_900; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila801_9002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila801_9002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont5; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila901_1000; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila901_1000; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila901_10002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila901_10002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont6; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1001_1100; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1001_1100; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1001_11002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1001_11002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont7; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fla1101_1200; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fla1101_1200; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fla1101_12002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fla1101_12002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont8; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1201_1300; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1201_1300; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1201_13002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1201_13002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont9; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1301_1400; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1301_1400; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1301_14002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1301_14002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $cont10; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $fila1401_1500; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila1401_1500; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($fila1401_15002==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($fila1401_15002); ?>%">
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

                                        <div style="position: absolute; top: -20px"><?php echo $contT; ?></div>

                                        <div style="background-color: #EAEAEA; bottom: 0px; height: <?php echo $filatotal; ?>%;">
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $filatotal; ?>%</div>

                                        </div>
                                        <?php $mostrar=""; if ($filatotal2==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; background-color: #99CDFF; bottom: 0px; height: <?php echo ($filatotal2); ?>%">
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

                        </td></tr>
                        <tr><td>

                            <div id="encabezado_tabla">Detalle Neocosur
                                        
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
                                                                    <td align="center" valign="top"><?php echo $cont11; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila501_600; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont12; ?> </td>
                                                                    <td align="center" valign="top"><?php echo $fila501_6002; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top"><?php echo $cont1; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>601-700</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont21; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila601_700; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont22; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila601_7002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont2; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>701-800</strong></td>
                                                                    <td align="center" valign="top"><?php echo $cont31; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila701_800; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont32; ?></td>
                                                                    <td align="center" valign="top"><?php echo $fila701_8002; ?>%</td>
                                                                    <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top">0</td>
                                                                    <td align="center" valign="top"><?php echo $cont3; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>801-900</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont41; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila801_900; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont42; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila801_9002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont4; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>901-1000</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont51; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila901_1000; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont52; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila901_10002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1001-1100</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont61; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1001_1100; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont62; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1001_11002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1101-1200</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont71; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1101_1200; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont72; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1101_12002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1201-1300</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont81; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1201_1300; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont82; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1201_13002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1301-1400</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont91; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1301_1400; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont92; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1301_14002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="#D5E6F7"><strong>1401-1500</strong></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont101; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1401_1500; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont102; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila1401_15002; ?>%</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF">0</td>
                                                                    <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                                </tr>
                                                                <tr> 
                                                                    <td valign="top" bgcolor="eaeaea" class="linea_borde"><strong>TOTAL</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT1; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filatotal; ?>%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT2; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filatotal2; ?>%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong>0%</strong></td>
                                                                    <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contT; ?></strong></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                            

                        </td></tr>

                    </table>
                    </td>
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
                <input name="button11" type="button" class="botonCentral" id="button11" onclick="location.href = 'filtro1.php'" value="Cerrar" />
            </p>

        </div></body>
</html>

