<?php
        

//pruebas varias solo valores datos etc prueba de graficos de barra con respecto de las variables.
       
        
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
    WHERE 1
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
//$sql = $sql." AND ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500";
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
        $fila51=0;
        $fila52=0;
        $fila53=100;
        $fila61=0;
        $fila62=0;
        $fila63=100;
        $fila71=0;
        $fila72=0;
        $fila73=100;
        $fila81=0;
        $fila82=0;
        $fila83=100;
        $fila91=0;
        $fila92=0;
        $fila93=100;
        $fila101=0;
        $fila102=0;
        $fila103=100;
        $fila_111=0;
        $fila_112=0;
        $fila_113=100;
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

        $cont_11=0;
        $cont_111=0;
        $cont_112=0;
        $cont_113=0;

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
    $PAT_NEONA_LEUCOMALACIA = $row['PAT_NEONA_LEUCOMALACIA'];       //Leucomalacia  FILA2
    
    $PAT_NEONA_OXI_36_SEM = $row['PAT_NEONA_OXI_36_SEM'];           //Leucomalacia  fila3
    
    $PAT_NEONA_ECN = $row['PAT_NEONA_ECN'];                         //ECN  FILA4
    
    $PAT_NEONA_OFT_OJO_IZQ_ROP = $row['PAT_NEONA_OFT_OJO_IZQ_ROP']; //  FILA5
    $PAT_NEONA_OFT_OJO_DER_ROP = $row['PAT_NEONA_OFT_OJO_DER_ROP']; //  FILA5
    
    
    
    
    $PAT_NEONA_SEP_PRECOZ = $row['PAT_NEONA_SEP_PRECOZ'];                     //FILA6
    $PAT_NEONA_SEP_NUM_SEP_CLINICAS = $row['PAT_NEONA_SEP_NUM_SEP_CLINICAS'];                     //FILA7
    
    $PAT_NEONA_CLINICA_SDR = $row['PAT_NEONA_CLINICA_SDR'];         //FILA8
    
    $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA'];   //Leucomalacia  FILA9
    $PAT_NEONA_DUCTUS = $row['PAT_NEONA_DUCTUS'];   //Leucomalacia  FILA10
    
    $PAT_NEONA_MED_NUM_TRANSFUS = $row['PAT_NEONA_MED_NUM_TRANSFUS'];   //  FILA11
    
    //echo $PAT_NEONA_OXI_36_SEM;
    
    
    if ($ANT_PARTO_PESO_NAC >=501 && $ANT_PARTO_PESO_NAC <=600){
        $sw1=1;
        $cont1=$cont1+1;
        if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
            $cont11++;
        }else{
            $cont12++;
        }
    }
  
    if ($ANT_PARTO_FALLECE_SALA ==0){ //Todo lo que depende de que no fallesca
        
        //fila 1 $PAT_NEONA_ECN
        $cont1++;
        if ($PAT_NEONA_HIC ==1){ $cont11++; }
        if ($PAT_NEONA_HIC ==0){ $cont12++; }
        if ($PAT_NEONA_HIC ==2){ $cont13++; }
        
        //fila 2 $PAT_NEONA_ECN
        $cont2++;
        if ($PAT_NEONA_LEUCOMALACIA ==1){ $cont21++; }
        if ($PAT_NEONA_LEUCOMALACIA ==0){ $cont22++; }


        //fila 3 $PAT_NEONA_OXI_36_SEM
        $cont3++;
        if ($PAT_NEONA_OXI_36_SEM==1){ $cont31++; }
        if ($PAT_NEONA_OXI_36_SEM==0){ $cont32++; }
        if ($PAT_NEONA_OXI_36_SEM==2){ $cont33++; }
          
        //fila 4 $PAT_NEONA_ECN
        $cont4++;
        if ($PAT_NEONA_ECN ==1){ $cont41++; }
        if ($PAT_NEONA_ECN ==0){ $cont42++; }


        //fila 5 $PAT_NEONA_ECN
        $cont5++;
        if ($PAT_NEONA_OFT_OJO_IZQ_ROP ==1 || $PAT_NEONA_OFT_OJO_DER_ROP==1){ 
            $cont51++;             
        }else{
            if ($PAT_NEONA_OFT_OJO_IZQ_ROP ==0 || $PAT_NEONA_OFT_OJO_DER_ROP==0){ $cont52++; }        
        }
        
        
        //fila 6 $PAT_NEONA_ECN
        $cont6++;
        if ($PAT_NEONA_SEP_PRECOZ ==1){ $cont61++; }
        if ($PAT_NEONA_SEP_PRECOZ ==0){ $cont62++; }

        
        //fila 7 $PAT_NEONA_ECN
        $cont7++;
        if ($PAT_NEONA_SEP_NUM_SEP_CLINICAS >=1){ $cont71++; }
        if ($PAT_NEONA_SEP_NUM_SEP_CLINICAS ==0){ $cont72++; }

        
        
        //fila 8 $PAT_NEONA_ECN
        $cont8++;
        if ($PAT_NEONA_CLINICA_SDR ==1){ $cont81++; }
        if ($PAT_NEONA_CLINICA_SDR ==0){ $cont82++; }

        //fila 10 $PAT_NEONA_DUCTUS
        $cont10++;
        if ($PAT_NEONA_DUCTUS ==1){ $cont101++; }
        if ($PAT_NEONA_DUCTUS ==0){ $cont102++; }
        if ($PAT_NEONA_DUCTUS ==2){ $cont103++; }
        
        //fila 10 $PAT_NEONA_DUCTUS
        $cont_11++;
        if ($PAT_NEONA_MED_NUM_TRANSFUS >=1){ $cont_111++; }
        if ($PAT_NEONA_MED_NUM_TRANSFUS ==0){ $cont_112++; }
        
        
        
    }
    
    
    //fila 9 $ANT_PARTO_FALLECE_SALA
    $cont9++;
    if ($ANT_PARTO_FALLECE_SALA ==1){ $cont91++; }
    if ($ANT_PARTO_FALLECE_SALA ==0){ $cont92++; }
    
    
    
    
    $contT++;
    if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
        $contT1++;
    }else{
        $contT2++;
    }
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
        $fila33=number_format( 100-$fila31-$fila32 ,0);
    }
    //4 $fila801_900
    if (!$cont4==0){
        $fila41=number_format( ($cont41*100)/$cont4 ,0);
        $fila42=number_format( ($cont42*100)/$cont4 ,0);
        $fila43=number_format( 100-$fila41-$fila42 ,0);
    }
    //5 $fila901_1000
    if (!$cont5==0){
        $fila51=number_format( ($cont51*100)/$cont5 ,0);
        $fila52=number_format( ($cont52*100)/$cont5 ,0);
        $fila53=number_format( 100-$fila51-$fila52 ,0);
    }
    //6 $fila1001_1100
    if (!$cont6==0){
        $fila61=number_format( ($cont61*100)/$cont6 ,0);
        $fila62=number_format( ($cont62*100)/$cont6 ,0);
        $fila63=number_format( 100-$fila61-$fila62  ,0);
    }
    //7 $fla1101_1200
    if (!$cont7==0){
        $fila71=number_format( ($cont71*100)/$cont7 ,0);
        $fila72=number_format( ($cont72*100)/$cont7 ,0);
        $fila73=number_format( 100-$fila71 -$fila72  ,0);
    }
    //8 $fila1201_1300
    if (!$cont8==0){
        $fila81=number_format( ($cont81*100)/$cont8 ,0);
        $fila82=number_format( ($cont82*100)/$cont8 ,0);
        $fila83=number_format( 100-$fila81-$fila82 ,0);
    }
    //9 $fila1301_1400
    if (!$cont9==0){
        $fila91=number_format( ($cont91*100)/$cont9 ,0);
        $fila92=number_format( ($cont92*100)/$cont9 ,0);
        $fila93=number_format( 100-$fila91-$fila92 ,0);
    }
    //10 $fila1401_1500
    if (!$cont10==0){
        $fila101=number_format( ($cont101*100)/$cont10 ,0);
        $fila102=number_format( ($cont102*100)/$cont10 ,0);
        $fila103=number_format( 100-$fila101-$fila102 ,0);
    }
    //11
    if (!$cont_11==0){
        $fila_111=number_format( ($cont_111*100)/$cont_11 ,0);
        $fila_112=number_format( ($cont_112*100)/$cont_11 ,0);
        $fila_113=number_format( 100-$fila_111-$fila_112 ,0);
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
                        <td height="40" class="titulo_ficha">Estadísticas de Morbilidad</td>
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
                                
                            <div style="position: relative;width:458px;height:416px; border:1px solid #769DCD;" >
                                
                                <img src="fondoentero.jpg" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/> 
                                 
                                <div  style="position: absolute; top: 5px; left: 150px; font-weight: bold; color: #03449A; font-size: 10pt; " >Totales <?php echo $nombre_centro; ?></div> <!-- Titulo -->

                                <div style="position: relative;width:14px;height:300px; " >
                                    
                                    
                                    <!--1 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila11;
                                    $top3=$fila11+$fila12;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 57px; height: 210px; width: 14px; top: 57px;" >
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
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 93px; height: 210px; width: 14px; top: 57px;" >
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
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 127px; height: 210px; width: 14px; top: 57px;" >
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
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 162px; height: 210px; width: 14px; top: 57px;" >
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
                                    <!--5 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila51;
                                    $top3=$fila51+$fila52;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 197px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >5</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont1; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila51; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila51; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila52); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila52); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila52); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila53==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila53); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila53); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila53); ?>%</div>

                                        </div>
                                    </div>
                                    <!--6 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila61;
                                    $top3=$fila61+$fila62;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 230px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >6</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont6; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila61; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila61; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila62); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila62); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila62); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila63==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila63); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila63); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila63); ?>%</div>

                                        </div>
                                    </div>
                                    <!--7 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila71;
                                    $top3=$fila71+$fila72;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 264px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >7</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont7; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila71; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila71; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila72); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila72); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila72); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila73==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila73); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila73); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila73); ?>%</div>

                                        </div>
                                    </div>
                                    <!--8 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila81;
                                    $top3=$fila81+$fila82;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 299px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >8</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont8; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila81; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila81; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila82); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila82); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila82); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila83==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila83); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila83); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila83); ?>%</div>

                                        </div>
                                    </div>
                                    <!--9 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila91;
                                    $top3=$fila91+$fila92;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 333px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >9</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont9; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila91; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila91; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila92); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila92); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila92); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila93==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila93); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila93); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila93); ?>%</div>

                                        </div>
                                    </div>
                                    <!--10 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila101;
                                    $top3=$fila101+$fila102;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 366px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >10</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont10; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila101; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila101; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila102); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila102); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila102); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila103==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila103); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila103); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila103); ?>%</div>

                                        </div>
                                    </div>
                                    <!--11 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila_111;
                                    $top3=$fila_111+$fila_112;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 399px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >11</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont_11; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila_111; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila_111; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila_112); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila_112); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila_112); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila_113==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila_113); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila_113); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila_113); ?>%</div>

                                        </div>
                                    </div>
                                    <!--12 -->
                                    
                                    
                                    <?php 
                                    //sumar totales nomas con el objetivo de cuadrar la tabla                                    
                                    $contadorT1 = $cont11 + $cont21 + $cont31 + $cont41 + $cont51 + $cont61 + $cont71 + $cont81 + $cont91 + $cont101 + $cont_111;
                                    $contadorT2 = $cont12 + $cont22 + $cont32 + $cont42 + $cont52 + $cont62 + $cont72 + $cont82 + $cont92 + $cont102 + $cont_112;
                                    $contadorT3 = $cont13 + $cont23 + $cont33 + $cont43 + $cont53 + $cont63 + $cont73 + $cont83 + $cont93 + $cont103 + $cont_113;
                                    $contadorT = $cont1 + $cont2 + $cont3 + $cont4 + $cont5 + $cont6 + $cont7 + $cont8 + $cont9 + $cont10 + $cont_11;

                                    if (!$contadorT==0){
                                        $filaT1=number_format( ($contadorT1*100)/$contadorT ,0);
                                        $filaT2=number_format( ($contadorT2*100)/$contadorT ,0);
                                        $filaT3=number_format( ($contadorT3*100)/$contadorT ,0);                                        
                                    }
                                    ?>    

                                    <?php 
                                    $top1=0;
                                    $top2=$filaT1;
                                    $top3=$filaT1+$filaT2;
                                    ?>
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 433px; height: 210px; width: 14px; top: 57px;" >
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
                            <div id="encabezado_tabla">Detalle Hospital Clínico Universidad 
                                    Católica 
                                    <div class="texto" id="content_listado"> 
                                    <div align="center"> 
                                        <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                        <tr> 
                                            <td bgcolor="#83B6E9"><table width="450" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
                                                <tr > 
                                                <td width="110" bgcolor="#D5E6F7" ><strong>Condición</strong><span class="pie"></span></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>P</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>%P</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>NP</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>% 
                                                    NP</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>Total 
                                                    reg.</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>S/I</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>% S/I</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>Total 
                                                    niños</strong></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>HIC</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Leucomalacia</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>02 36 sem.</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>ECN</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Retinopatía</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont51; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila51; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont52; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila52; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont53; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila53; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Sepsis precoz</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont61; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila61; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont62; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila62; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont63; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila63; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Sepsis clínica<br />
                                                    </strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont71; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila71; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont72; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila72; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont73; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila73; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Clínica SDR<br />
                                                    </strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont81; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila81; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont82; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila82; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont83; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila83; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Fallece sala 
                                                    de partos</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont91; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila91; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont92; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila92; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont93; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila93; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Ductus</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont101; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila101; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont102; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila102; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont103; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila103; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Transfusiones</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_111; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_111; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_112; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_112; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_11; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_113; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_113; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_11; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#EAEAEA"  class="linea_borde"><strong>TOTALES</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT1; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT1; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT2; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT2; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT3; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT3; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT; ?></strong></td>
                                                </tr>
                                            </table></td>
                                        </tr>
                                        </table>
                                    </div>
                                    </div>
                                </div>                            
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
                                    $fila51=0;
                                    $fila52=0;
                                    $fila53=100;
                                    $fila61=0;
                                    $fila62=0;
                                    $fila63=100;
                                    $fila71=0;
                                    $fila72=0;
                                    $fila73=100;
                                    $fila81=0;
                                    $fila82=0;
                                    $fila83=100;
                                    $fila91=0;
                                    $fila92=0;
                                    $fila93=100;
                                    $fila101=0;
                                    $fila102=0;
                                    $fila103=100;
                                    $fila_111=0;
                                    $fila_112=0;
                                    $fila_113=100;
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

                                    $cont_11=0;
                                    $cont_111=0;
                                    $cont_112=0;
                                    $cont_113=0;

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



                            while ($row = mysql_fetch_assoc($consultaNeocosur)) {
                                $PAT_NEONA_LEUCOMALACIA = $row['PAT_NEONA_LEUCOMALACIA'];       //Leucomalacia  FILA2

                                $PAT_NEONA_OXI_36_SEM = $row['PAT_NEONA_OXI_36_SEM'];           //Leucomalacia  fila3

                                $PAT_NEONA_ECN = $row['PAT_NEONA_ECN'];                         //ECN  FILA4

                                $PAT_NEONA_OFT_OJO_IZQ_ROP = $row['PAT_NEONA_OFT_OJO_IZQ_ROP']; //  FILA5
                                $PAT_NEONA_OFT_OJO_DER_ROP = $row['PAT_NEONA_OFT_OJO_DER_ROP']; //  FILA5




                                $PAT_NEONA_SEP_PRECOZ = $row['PAT_NEONA_SEP_PRECOZ'];                     //FILA6
                                $PAT_NEONA_SEP_NUM_SEP_CLINICAS = $row['PAT_NEONA_SEP_NUM_SEP_CLINICAS'];                     //FILA7

                                $PAT_NEONA_CLINICA_SDR = $row['PAT_NEONA_CLINICA_SDR'];         //FILA8

                                $ANT_PARTO_FALLECE_SALA = $row['ANT_PARTO_FALLECE_SALA'];   //Leucomalacia  FILA9
                                $PAT_NEONA_DUCTUS = $row['PAT_NEONA_DUCTUS'];   //Leucomalacia  FILA10

                                $PAT_NEONA_MED_NUM_TRANSFUS = $row['PAT_NEONA_MED_NUM_TRANSFUS'];   //  FILA11

                                //echo $PAT_NEONA_OXI_36_SEM;


                                if ($ANT_PARTO_PESO_NAC >=501 && $ANT_PARTO_PESO_NAC <=600){
                                    $sw1=1;
                                    $cont1=$cont1+1;
                                    if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                        $cont11++;
                                    }else{
                                        $cont12++;
                                    }
                                }

                                if ($ANT_PARTO_FALLECE_SALA ==0){ //Todo lo que depende de que no fallesca

                                    //fila 1 $PAT_NEONA_ECN
                                    $cont1++;
                                    if ($PAT_NEONA_HIC ==1){ $cont11++; }
                                    if ($PAT_NEONA_HIC ==0){ $cont12++; }
                                    if ($PAT_NEONA_HIC ==2){ $cont13++; }

                                    //fila 2 $PAT_NEONA_ECN
                                    $cont2++;
                                    if ($PAT_NEONA_LEUCOMALACIA ==1){ $cont21++; }
                                    if ($PAT_NEONA_LEUCOMALACIA ==0){ $cont22++; }


                                    //fila 3 $PAT_NEONA_OXI_36_SEM
                                    $cont3++;
                                    if ($PAT_NEONA_OXI_36_SEM==1){ $cont31++; }
                                    if ($PAT_NEONA_OXI_36_SEM==0){ $cont32++; }
                                    if ($PAT_NEONA_OXI_36_SEM==2){ $cont33++; }

                                    //fila 4 $PAT_NEONA_ECN
                                    $cont4++;
                                    if ($PAT_NEONA_ECN ==1){ $cont41++; }
                                    if ($PAT_NEONA_ECN ==0){ $cont42++; }


                                    //fila 5 $PAT_NEONA_ECN
                                    $cont5++;
                                    if ($PAT_NEONA_OFT_OJO_IZQ_ROP ==1 || $PAT_NEONA_OFT_OJO_DER_ROP==1){ 
                                        $cont51++;             
                                    }else{
                                        if ($PAT_NEONA_OFT_OJO_IZQ_ROP ==0 || $PAT_NEONA_OFT_OJO_DER_ROP==0){ $cont52++; }        
                                    }


                                    //fila 6 $PAT_NEONA_ECN
                                    $cont6++;
                                    if ($PAT_NEONA_SEP_PRECOZ ==1){ $cont61++; }
                                    if ($PAT_NEONA_SEP_PRECOZ ==0){ $cont62++; }


                                    //fila 7 $PAT_NEONA_ECN
                                    $cont7++;
                                    if ($PAT_NEONA_SEP_NUM_SEP_CLINICAS >=1){ $cont71++; }
                                    if ($PAT_NEONA_SEP_NUM_SEP_CLINICAS ==0){ $cont72++; }



                                    //fila 8 $PAT_NEONA_ECN
                                    $cont8++;
                                    if ($PAT_NEONA_CLINICA_SDR ==1){ $cont81++; }
                                    if ($PAT_NEONA_CLINICA_SDR ==0){ $cont82++; }

                                    //fila 10 $PAT_NEONA_DUCTUS
                                    $cont10++;
                                    if ($PAT_NEONA_DUCTUS ==1){ $cont101++; }
                                    if ($PAT_NEONA_DUCTUS ==0){ $cont102++; }
                                    if ($PAT_NEONA_DUCTUS ==2){ $cont103++; }

                                    //fila 10 $PAT_NEONA_DUCTUS
                                    $cont_11++;
                                    if ($PAT_NEONA_MED_NUM_TRANSFUS >=1){ $cont_111++; }
                                    if ($PAT_NEONA_MED_NUM_TRANSFUS ==0){ $cont_112++; }



                                }


                                //fila 9 $ANT_PARTO_FALLECE_SALA
                                $cont9++;
                                if ($ANT_PARTO_FALLECE_SALA ==1){ $cont91++; }
                                if ($ANT_PARTO_FALLECE_SALA ==0){ $cont92++; }
                                if ($ANT_PARTO_FALLECE_SALA !=0 && $ANT_PARTO_FALLECE_SALA !=1){ $cont93++; }



                                $contT++;
                                if ($ANT_PARTO_FALLECE_SALA==1 || $PERD_PACIEN_FALLE_SEG==1){
                                    $contT1++;
                                }else{
                                    $contT2++;
                                }
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
                                    $fila33=number_format( 100-$fila31-$fila32 ,0);
                                }
                                //4 $fila801_900
                                if (!$cont4==0){
                                    $fila41=number_format( ($cont41*100)/$cont4 ,0);
                                    $fila42=number_format( ($cont42*100)/$cont4 ,0);
                                    $fila43=number_format( 100-$fila41-$fila42 ,0);
                                }
                                //5 $fila901_1000
                                if (!$cont5==0){
                                    $fila51=number_format( ($cont51*100)/$cont5 ,0);
                                    $fila52=number_format( ($cont52*100)/$cont5 ,0);
                                    $fila53=number_format( 100-$fila51-$fila52 ,0);
                                }
                                //6 $fila1001_1100
                                if (!$cont6==0){
                                    $fila61=number_format( ($cont61*100)/$cont6 ,0);
                                    $fila62=number_format( ($cont62*100)/$cont6 ,0);
                                    $fila63=number_format( 100-$fila61-$fila62  ,0);
                                }
                                //7 $fla1101_1200
                                if (!$cont7==0){
                                    $fila71=number_format( ($cont71*100)/$cont7 ,0);
                                    $fila72=number_format( ($cont72*100)/$cont7 ,0);
                                    $fila73=number_format( 100-$fila71 -$fila72  ,0);
                                }
                                //8 $fila1201_1300
                                if (!$cont8==0){
                                    $fila81=number_format( ($cont81*100)/$cont8 ,0);
                                    $fila82=number_format( ($cont82*100)/$cont8 ,0);
                                    $fila83=number_format( 100-$fila81-$fila82 ,0);
                                }
                                //9 $fila1301_1400
                                if (!$cont9==0){
                                    $fila91=number_format( ($cont91*100)/$cont9 ,0);
                                    $fila92=number_format( ($cont92*100)/$cont9 ,0);
                                    $fila93=number_format( 100-$fila91-$fila92 ,0);
                                }
                                //10 $fila1401_1500
                                if (!$cont10==0){
                                    $fila101=number_format( ($cont101*100)/$cont10 ,0);
                                    $fila102=number_format( ($cont102*100)/$cont10 ,0);
                                    $fila103=number_format( 100-$fila101-$fila102 ,0);
                                }
                                //11
                                if (!$cont_11==0){
                                    $fila_111=number_format( ($cont_111*100)/$cont_11 ,0);
                                    $fila_112=number_format( ($cont_112*100)/$cont_11 ,0);
                                    $fila_113=number_format( 100-$fila_111-$fila_112 ,0);
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
<!-- ************************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************************** -->











                    <td>                
                    <table>
                        <tr><td>
                                
                            <div style="position: relative;width:458px;height:416px; border:1px solid #769DCD;" >
                                
                                <img src="fondoentero.jpg" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/> 
                                <div  style="position: absolute; top: 5px; left: 150px; font-weight: bold; color: #03449A; font-size: 10pt; " >Totales Neocosur</div> <!-- Titulo -->
                                <div style="position: relative;width:14px;height:300px; " >
                                    
                                    
                                    <!--1 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila11;
                                    $top3=$fila11+$fila12;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 57px; height: 210px; width: 14px; top: 57px;" >
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
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 93px; height: 210px; width: 14px; top: 57px;" >
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
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 127px; height: 210px; width: 14px; top: 57px;" >
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
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 162px; height: 210px; width: 14px; top: 57px;" >
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
                                    <!--5 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila51;
                                    $top3=$fila51+$fila52;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 197px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >5</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont1; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila51; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila51; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila52); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila52); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila52); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila53==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila53); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila53); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila53); ?>%</div>

                                        </div>
                                    </div>
                                    <!--6 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila61;
                                    $top3=$fila61+$fila62;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 230px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >6</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont6; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila61; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila61; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila62); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila62); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila62); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila63==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila63); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila63); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila63); ?>%</div>

                                        </div>
                                    </div>
                                    <!--7 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila71;
                                    $top3=$fila71+$fila72;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 264px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >7</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont7; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila71; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila71; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila72); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila72); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila72); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila73==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila73); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila73); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila73); ?>%</div>

                                        </div>
                                    </div>
                                    <!--8 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila81;
                                    $top3=$fila81+$fila82;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 299px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >8</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont8; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila81; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila81; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila82); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila82); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila82); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila83==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila83); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila83); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila83); ?>%</div>

                                        </div>
                                    </div>
                                    <!--9 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila91;
                                    $top3=$fila91+$fila92;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 333px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >9</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont9; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila91; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila91; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila92); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila92); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila92); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila93==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila93); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila93); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila93); ?>%</div>

                                        </div>
                                    </div>
                                    <!--10 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila101;
                                    $top3=$fila101+$fila102;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 366px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >10</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont10; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila101; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila101; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila102); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila102); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila102); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila103==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila103); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila103); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila103); ?>%</div>

                                        </div>
                                    </div>
                                    <!--11 -->
                                    <?php 
                                    $top1=0;
                                    $top2=$fila_111;
                                    $top3=$fila_111+$fila_112;
                                    ?>
                                    
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 399px; height: 210px; width: 14px; top: 57px;" >
<div style="display: <?php echo $display_numcolum; ?>; position: absolute; top: -30px; color: #FF0000;" >11</div> <!-- numeros encabezado -->
                                        <div style="position: absolute; top: -20px" ><?php echo $cont_11; ?></div> <!-- numeros encabezado -->

                                        <div style=" bottom: 0px; height: <?php echo $fila_111; ?>%;">
                                            <img src="pixel1.gif" height="100%" width="100%" style="position: absolute; left: 0; top:0;"/>
                                            <div style="height: 50%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo $fila_111; ?>%</div>

                                        </div>

                                        <div style="bottom: 0px; height: <?php echo ($fila_112); ?>%">
                                            <img src="pixel2.gif" height="<?php echo ($fila_112); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top2; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila_112); ?>%</div>
                                        </div>
                                        <?php $mostrar=""; if ($fila_113==0) {$mostrar="none";} ?>
                                        <div style="display: <?php echo $mostrar; ?>; bottom: 0px; height: <?php echo ($fila_113); ?>%;">
                                            <img src="pixel3.gif" height="<?php echo ($fila_113); ?>%" width="100%" style="position: absolute; left: 0; top:<?php echo $top3; ?>;"/>
                                            <div style="height: 40%"></div>
                                            <div class="rotate" style="position: absolute;"><?php echo ($fila_113); ?>%</div>

                                        </div>
                                    </div>
                                    <!--12 -->
                                    
                                    
                                    <?php 
                                    //sumar totales nomas con el objetivo de cuadrar la tabla                                    
                                    $contadorT1 = $cont11 + $cont21 + $cont31 + $cont41 + $cont51 + $cont61 + $cont71 + $cont81 + $cont91 + $cont101 + $cont_111;
                                    $contadorT2 = $cont12 + $cont22 + $cont32 + $cont42 + $cont52 + $cont62 + $cont72 + $cont82 + $cont92 + $cont102 + $cont_112;
                                    $contadorT3 = $cont13 + $cont23 + $cont33 + $cont43 + $cont53 + $cont63 + $cont73 + $cont83 + $cont93 + $cont103 + $cont_113;
                                    $contadorT = $cont1 + $cont2 + $cont3 + $cont4 + $cont5 + $cont6 + $cont7 + $cont8 + $cont9 + $cont10 + $cont_11;
                                    
                                    if (!$contadorT==0){
                                        $filaT1=number_format( ($contadorT1*100)/$contadorT ,0);
                                        $filaT2=number_format( ($contadorT2*100)/$contadorT ,0);
                                        $filaT3=number_format( ($contadorT3*100)/$contadorT ,0);                                        
                                    }
                                    ?>    
                                    

                                    <?php 
                                    $top1=0;
                                    $top2=$filaT1;
                                    $top3=$filaT1+$filaT2;
                                    ?>
                                    <div style="border:1px solid #82BAEB; position: absolute; left: 433px; height: 210px; width: 14px; top: 57px;" >
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
                            <div id="encabezado_tabla">Detalle Hospital Clínico Universidad 
                                    Católica 
                                    <div class="texto" id="content_listado"> 
                                    <div align="center"> 
                                        <table width="98%" border="0" cellpadding="0" cellspacing="0">
                                        <tr> 
                                            <td bgcolor="#83B6E9"><table width="450" border="0" cellpadding="3" cellspacing="1" class="TablaCebra">
                                                <tr > 
                                                <td width="110" bgcolor="#D5E6F7" ><strong>Condición</strong><span class="pie"></span></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>P</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>%P</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>NP</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>% 
                                                    NP</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>Total 
                                                    reg.</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>S/I</strong></td>
                                                <td align="center" bgcolor="#D5E6F7"><strong>% S/I</strong></td>
                                                <td align="center" nowrap="nowrap" bgcolor="#D5E6F7"><strong>Total 
                                                    niños</strong></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>HIC</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Leucomalacia</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>02 36 sem.</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>ECN</strong></td>
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
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Retinopatía</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont51; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila51; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont52; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila52; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont53; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila53; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont5; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Sepsis precoz</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont61; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila61; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont62; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila62; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont63; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila63; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont6; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Sepsis clínica<br />
                                                    </strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont71; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila71; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont72; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila72; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont73; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila73; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont7; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Clínica SDR<br />
                                                    </strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont81; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila81; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont82; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila82; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont83; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila83; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont8; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Fallece sala 
                                                    de partos</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont91; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila91; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont92; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila92; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont93; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila93; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont9; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Ductus</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont101; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila101; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont102; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila102; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont103; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila103; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont10; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#D5E6F7"><strong>Transfusiones</strong></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_111; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_111; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_112; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_112; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_11; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_113; ?></td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $fila_113; ?>%</td>
                                                <td align="center" valign="top" bgcolor="#FFFFFF"><?php echo $cont_11; ?></td>
                                                </tr>
                                                <tr> 
                                                <td valign="top" bgcolor="#EAEAEA"  class="linea_borde"><strong>TOTALES</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT1; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT1; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT2; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT2; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT3; ?></strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $filaT3; ?>%</strong></td>
                                                <td align="center" valign="top" bgcolor="eaeaea" class="linea_borde"><strong><?php echo $contadorT; ?></strong></td>
                                                </tr>
                                            </table></td>
                                        </tr>
                                        </table>
                                    </div>
                                    </div>
                                </div>                            
                            <!-- ***************************************************************************** -->
                            </td>                                
                        </tr>
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




