<?php
define('APP_PATH',dirname(dirname(dirname(__FILE__))));
define('CORE_PATH',APP_PATH."/library/core");
require_once(CORE_PATH.'/bootstrap_externo.php');
include '../../conn/conexion.php';


//echo $idcentro;
$opcion_ano = $_POST["opcion_ano"];
$opctrimestre = $_POST["opctrimestre"];
$opcion_edad_peso = $_POST["opcion_edad_peso"];
$idcentro = $_POST["idcentro"];


echo "opcion_ano: " . $opcion_ano . "<BR>";
echo "opctrimestre: " . $opctrimestre . "<BR>";
echo "opcion_edad_peso: " . $opcion_edad_peso . "<BR>";
echo "idcentro: " . $idcentro . "<BR>";


//SELECT 	* FROM vista_GRAFICO_FALLECE
$sql = "
			SELECT 	*
			FROM vista_GraficoFallece
			where centro = " . $idcentro
;
$VistaGraficoFallece = new VistaGraficoFallece();

$filas = $VistaGraficoFallece->find_all_by_sql($sql);





echo "<pre>" . $sql . "</pre>" . mysql_error();
echo "<pre>";
print_r(json_encode($filas));
echo "</pre>";

echo "<br>";

die();

if ($opcion_edad_peso == 1) {
    $titulo_graf_sel = "Estadísticas de Mortalidad por Edad (20 – 36 semanas)";
} else {
    $titulo_graf_sel = "Estadísticas de Mortalidad por Peso (500 a 1.500 g.)";
}
//echo $opctrimestre;
//echo $opcion_ano;

$nombre_centro = "";

$sqlT = "
    SELECT * 
    FROM ING 
    where  ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500
    ";

if (!$opcion_ano == 0) {
    $sqlT = $sqlT . " AND YEAR(ING.BAS_FEC_NAC_PCT)>=$opcion_ano AND YEAR(ING.BAS_FEC_NAC_PCT)<=$opcion_ano";
}
if ($opctrimestre == 1) {
    $sqlT = $sqlT . " AND MONTH (ING.BAS_FEC_NAC_PCT)>=1 AND MONTH (ING.BAS_FEC_NAC_PCT)<=3";
}
if ($opctrimestre == 2) {
    $sqlT = $sqlT . " AND MONTH (ING.BAS_FEC_NAC_PCT)>=4 AND MONTH (ING.BAS_FEC_NAC_PCT)<=6";
}
if ($opctrimestre == 3) {
    $sqlT = $sqlT . " AND MONTH (ING.BAS_FEC_NAC_PCT)>=7 AND MONTH (ING.BAS_FEC_NAC_PCT)<=9";
}
if ($opctrimestre == 4) {
    $sqlT = $sqlT . " AND MONTH (ING.BAS_FEC_NAC_PCT)>=10 AND MONTH (ING.BAS_FEC_NAC_PCT)<=12";
}





$sql = "
				SELECT * 
				FROM ING
				where 1
    				";
if (!$idcentro == 0) { //SE FILTRA POR CENTRO QUE ELIGIO Y FUE OBLIGADO A ELEJIR SU CENTRO
    $sql = $sql . " 	AND IDE_CNT = $idcentro 
				";
}

if ($opcion_edad_peso == 1) { //se filtran por edad 20 a 36 semanas BAS_EDAD_GEST
    $sql = $sql . " 	AND BAS_EDAD_GEST >= 20 
					AND BAS_EDAD_GEST <=36
				";
}
$sql = $sql . " 	AND ANT_PARTO_PESO_NAC >= 500 
					AND ANT_PARTO_PESO_NAC <= 1500 
				";
//if ($opcion_edad_peso==2){ //se filtran por peso 500 a 1500 gr ANT_PARTO_PESO_NAC
//    $sql = $sql." AND ANT_PARTO_PESO_NAC >= 500 AND ANT_PARTO_PESO_NAC <=1500";
//}

if (!$opcion_ano == 0) {
    $sql = $sql . " 	AND YEAR(ING.BAS_FEC_NAC_PCT)>=$opcion_ano 
					AND YEAR(ING.BAS_FEC_NAC_PCT)<=$opcion_ano 
				";
}
if ($opctrimestre == 1) {
    $sql = $sql . " 	AND MONTH (ING.BAS_FEC_NAC_PCT)>=1 
					AND MONTH (ING.BAS_FEC_NAC_PCT)<=3 
				";
}
if ($opctrimestre == 2) {
    $sql = $sql . " 	AND MONTH (ING.BAS_FEC_NAC_PCT)>=4 
					AND MONTH (ING.BAS_FEC_NAC_PCT)<=6 
				";
}
if ($opctrimestre == 3) {
    $sql = $sql . " 	AND MONTH (ING.BAS_FEC_NAC_PCT)>=7 
					AND MONTH (ING.BAS_FEC_NAC_PCT)<=9 
				";
}
if ($opctrimestre == 4) {
    $sql = $sql . " 	AND MONTH (ING.BAS_FEC_NAC_PCT)>=10 
					AND MONTH (ING.BAS_FEC_NAC_PCT)<=12 
				";
}

conectar();
$consulta = "";
$consulta = mysql_query($sql);

echo "<pre>" . $sql . "</pre>" . mysql_error();

$consultaNeocosur = mysql_query($sqlT);

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

    if ($ANT_PARTO_PESO_NAC >= 501 && $ANT_PARTO_PESO_NAC <= 600) {
        $sw1 = 1;
        $cont1 = $cont1 + 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont11++;
        } else {
            $cont12++;
        }
    }


    if ($ANT_PARTO_PESO_NAC >= 601 && $ANT_PARTO_PESO_NAC <= 700) {
        $cont2 = $cont2 + 1;
        $sw2 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont21++;
        } else {
            $cont22++;
        }
    }


    if ($ANT_PARTO_PESO_NAC >= 701 && $ANT_PARTO_PESO_NAC <= 800) {
        $cont3 = $cont3 + 1;
        $sw3 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont31++;
        } else {
            $cont32++;
        }
    }

    if ($ANT_PARTO_PESO_NAC >= 801 && $ANT_PARTO_PESO_NAC <= 900) {
        $cont4 = $cont4 + 1;
        $sw4 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont41++;
        } else {
            $cont42++;
        }
    }

    if ($ANT_PARTO_PESO_NAC >= 901 && $ANT_PARTO_PESO_NAC <= 1000) {
        $cont5 = $cont5 + 1;
        $sw5 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont51++;
        } else {
            $cont52++;
        }
    }
    if ($ANT_PARTO_PESO_NAC >= 1001 && $ANT_PARTO_PESO_NAC <= 1100) {
        $cont6 = $cont6 + 1;
        $sw6 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont61++;
        } else {
            $cont62++;
        }
    }
    if ($ANT_PARTO_PESO_NAC >= 1101 && $ANT_PARTO_PESO_NAC <= 1200) {
        $cont7 = $cont7 + 1;
        $sw7 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont71++;
        } else {
            $cont72++;
        }
    }

    if ($ANT_PARTO_PESO_NAC >= 1201 && $ANT_PARTO_PESO_NAC <= 1300) {
        $cont8 = $cont8 + 1;
        $sw8 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont81++;
        } else {
            $cont82++;
        }
    }

    if ($ANT_PARTO_PESO_NAC >= 1301 && $ANT_PARTO_PESO_NAC <= 1400) {
        $cont9 = $cont9 + 1;
        $sw9 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont91++;
        } else {
            $cont92++;
        }
    }

    if ($ANT_PARTO_PESO_NAC >= 1401 && $ANT_PARTO_PESO_NAC <= 1500) {
        $cont10 = $cont10 + 1;
        $sw10 = 1;
        if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
            $cont101++;
        } else {
            $cont102++;
        }
    }

    $contT = $contT + 1;
    if ($ANT_PARTO_FALLECE_SALA == 1 || $PERD_PACIEN_FALLE_SEG == 1) {
        $contT1++;
    } else {
        $contT2++;
    }
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
        <title><?php echo $titulo_graf_sel; ?></title>
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


    </head>

    <body>

        <div id="wrapper_graficos">
            <div id="espacio_graficos">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="40" class="titulo_ficha"><?php echo $titulo_graf_sel; ?></td>
                        <td width="140" align="right"><img src="../../images/logo_textopeq.gif" width="140" height="33" alt="Neocosur" /></td>
                    </tr>
                </table>

                <div class="saber">&nbsp;Imprimir<a href="javascript:window.print();"><img src="../../images/print.png" alt="Imprimir" width="16" height="16" hspace="3" border="0"/></a> 
                    &nbsp;Ver Gráfico de Morbilidad
                    <a href="graficos2.php?idcentro=<?php echo $idcentro; ?>&opcion_edad_peso=<?php echo $opcion_edad_peso; ?>&opcion_ano=<?php echo $opcion_ano; ?>&opctrimestre=<?php echo $opctrimestre; ?>"><img src="../../images/grafico.png" alt="Ver Gráfico" width="16" height="16" hspace="3" border="0"/></a>
                </div>
                <br />

                <!-- ************************************************************************************************************* -->
                <table>



                </table>

                <br>


            </div>
            <p class="bottom">
                <input name="button11" type="button" class="botonCentral" id="button11" onclick="location.href = 'filtro1.php'" value="Cerrar" />
            </p>

        </div></body>
</html>

