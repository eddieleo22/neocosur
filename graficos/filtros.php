<?php 
include '../ficha/funciones/funciones_ingreso.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Neocosur - Grupo Colaborativo</title>

<link href="../../css/estilo_public.css" rel="stylesheet" type="text/css" />
<link href="../../css/estilo.css" rel="stylesheet" type="text/css" />
<!--Menumatic-->
<link rel="stylesheet" href="../../css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" src="niftycube.js"></script>

<script type="text/javascript">
<!--
window.onload=function(){ 
Nifty("div#destacado","big");
Nifty("div#menuIzquierdo","medium top");
Nifty("div#cajaAmarilla","medium");//redondea bordes de div
Nifty("div#encabezado_tabla","medium");
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<style type="text/css">
<!--
div#encabezado_tabla {
	width:430px;
	font-weight:bold;
	color:#FFF;
	background-color:#0065a8;
	padding:1px;
	text-align: center;
	line-height: 24px;
	margin-left:40px;
}

-->
</style>

</head>

<body class="tresColumnas">

<div id="container">
  <div id="header">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td height="35">Bienvenido <strong>Administrador</strong></td>
        <td align="right"><img src="../../images/iconos_sup2.gif" width="177" height="26" border="0" /></td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="206" valign="top"><img src="../../images/logo_home_chico2.jpg" width="206" height="117" /></td>
        <td width="509" align="left" valign="top"><img src="../../images/vineta_arriba_socios.jpg" width="509" height="117" /></td>
        <td width="205" align="center" valign="top"> 
          <div id="login">
            <table border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="../../images/images_portadas/encabezado_login5.gif" width="170" height="34" /></td>
              </tr>
              <tr> 
                <form id="form1" name="form1" method="post" action="">
                  <td align="center" bgcolor="#DCEBFA"> <table width="90%" border="0" cellpadding="2" cellspacing="0" class="saber">
                      <tr> 
                        <td height="40" colspan="2"> <input name="button" type="button" class="botonCerrars" id="button" onclick="MM_goToURL('parent','../../index.html');return document.MM_returnValue" value="Cerrar Sesión" /> 
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left"><img src="../../images/arrow_right.gif" width="10" height="8" border="0" align="absmiddle" /><a href="javascript:void(0)" class="saber">Cambiar 
                          contraseña</a></td>
                      </tr>
                    </table></td>
                </form>
              </tr>
              <tr> 
                <td><img src="../../images/bottom_login.gif" width="170" height="8" /></td>
              </tr>
            </table>
          </div></td>
      </tr>
    </table>
    <table width="100%" cellspacing="0" background="../../images/menu_nav_fondo3.gif">
      <tr>
        <td height="35" align="center"><ul id="nav">
            <li><a href="#">Acerca de Neocosur</a> 
              <ul>
                <li><a href="../../p_historia.html">Historia</a></li>
                <li><a href="../../p_estructura.html">Estructura</a></li>
                <li><a href="../../p_integrantes.html">Integrantes</a></li>
                <li><a href="../../p_estrategia.html">Estrategia</a></li>
              </ul>
            </li>
            <li><a href="../../p_publicaciones.html">Publicaciones</a></li>
            <li><a href="#">Proyectos</a> 
              <ul>
                <li><a href="../../p_proyectos_historico_individual.html">Variaciones 
                  en duración de hospitalización</a></li>
                <li><a href="#">Proyecto Emita</a></li>
                <li><a href="#">Evaluación Stress padres</a></li>
                <li><a href="#">Factores asociados a la abstención terapéutica</a></li>
                <li><a href="../../p_proyectos_historicos.html">Históricos</a></li>
              </ul>
            </li>
            <li><a href="#">Score Neocosur</a> 
              <ul>
                <li><a href="../../p_score_calculo.html">Cálculo en línea</a></li>
                <li><a href="../../p_score_aplicacion.html">Aplicación Benchmarking</a></li>
              </ul>
            </li>
            <li><a href="../../p_noticia_confiltro.html">Noticias</a></li>
            <li><a href="../../p_evento_confiltro.html">Eventos</a></li>
          </ul></td>
      </tr>
    </table>
    <div align="left"></div>
    <!-- end #header -->
  </div>
 
 <div id="sidebar1">
    <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Gestión de Fichas  <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="javascript:void(0)">Mantenedor de Centros</a></li>
        <li><a href="javascript:void(0)">Mantenedor de Fichas</a></li>
        <li><a href="javascript:void(0)">Datos en Excel</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>
   <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Administrar Sitio  <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="javascript:void(0)">Crear contenidos</a></li>
        <li><a href="javascript:void(0)">Administrar contenido</a></li>
        <li><a href="javascript:void(0)">Administrar usuarios</a></li>
		<li><a href="javascript:void(0)">Etc.</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>
   <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Estadísticas  <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="graficos/graficos1.php">Morbilidad y Mortalidad</a></li>
        <li><a href="javascript:void(0)">Resumen por Condición</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>
   <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Sistema Informático   <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="javascript:void(0)">Descripción</a></li>
        <li><a href="javascript:void(0)">Manuales</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>   <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Publicaciones  <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="javascript:void(0)">Estatutos Neocosur</a></li>
        <li><a href="javascript:void(0)">Informes Reunión Anual</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>   <div id="menuIzquierdo">
	<div class="menuIzquierdoCaja">Comunidad   <img src="../../images/arrow_down_over.gif" /></div> </div>
      
    <div class="botonesMenuizq"> 
      <ul>
        <li><a href="javascript:void(0)">Foro Neocosur</a></li><span class="clearfloat">&nbsp;</span>
      </ul>
</div>


      <br class="clearfloat" />
   
     
    <!-- end #sidebar1 -->
  </div>
 
 
 
  
  <div class="titulo_graficos">ESTADISTICAS DETALLE NEOCOSUR
      <!-- <img src="../../images/titulo_portada_colaborador.jpg" width="722" height="41" />  -->
  </div>
  
  <div id="sidebar2">
    <div id="destacado"><img src="../../images/tit_destacamos3.gif" width="90" height="16" /> 
      <table border="0" class="contenido_novedades">
        <tr>
          <td valign="top"><p align="center"><img src="../../images/images_portadas/imagen_ejemplo.gif" width="142" height="150"/></p>
            <a href="javascript:void(0)" class="subtitulo_destacado">12° Encuentro de Colaboradores de la Red Neocosur </a><br />
            <em>Buenos Aires, Agosto 2011</em>
            <br /><br />
            Informe del Cómite Directivo, que detalla los principales temas tratados 
            en el encuentro realizado los días 19 y 20 de agosto de 2011 <br />
                    <br />
                    
            <a href="javascript:void(0)" class="botonVerd"><span><img src="../../images/icon_pdf.png" width="16" height="16" border="0" align="absmiddle" /> 
            Ver publicación</span></a> <br /></td>
        </tr>
      </table>
      <br class="clearfloat" />
</div>
    
<div class="clear"></div>
<!-- end #sidebar2 --></div>
  <div id="mainContent">

<div id="espacio_portadas">
  <div id="wrapper">
  <form id="form1" name="F" method="post" action="graficos1.php">
   
    <div id="encabezado_tabla">Parámetros para las estadísticas
      <div class="texto" id="content_listado"> 
        <div align="center"> 
                <table width="430" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
              <td bgcolor="#eaeaea">
                  <table width="100%" border="0" cellpadding="3" cellspacing="0" class="TablaCebra">

                  <tr> 
                          <td width="100px" align="right" bgcolor="#eaeaea"><strong>Años</strong></td>
                          <td align="left" bgcolor="#eaeaea">
                                <!-- <SELECT NAME="selCombo" SIZE=1 onChange="javascript:alert('prueba');"> -->
                                <SELECT NAME="selCombo" SIZE=1 onChange="">    
                                <OPTION VALUE="link pagina 1">Todos los años</OPTION>
                                <?php
                                $anoactual = date ("Y");  
                                
                                for ( $i = 1 ; $i <= 20 ; $i ++) {
                                ?>    
                                <OPTION VALUE="link pagina 2"><?php echo $anoactual; ?></OPTION>
                                <?php
                                $anoactual = $anoactual - 1;
                                }
                                ?>
                                </SELECT> 
                          </td>
                  </tr>
                  <tr> 
                          <td align="right" bgcolor="#eaeaea"><strong>Trimestre</strong></td>
                    <td align="left" valign="top" bgcolor="#eaeaea">
                            
                            
                    <select name="trimestre" class="campos" id="hic_grado">
                        <option value="0">Seleccione</option>
                        <OPTION VALUE="1">Primer Trimestre</OPTION>
                        <OPTION VALUE="2">Segundo Trimestre</OPTION>
                        <OPTION VALUE="3">Tercer Trimestre</OPTION>
                        <OPTION VALUE="4">Cuarto Trimestre</OPTION>
                   </select>                            
                            
                            
                            
                       </td>
                  </tr>
                  <tr> 
                          <td align="right"  bgcolor="#eaeaea"><strong>Opcion 
                            </strong></td>
                          <td align="left" valign="top" bgcolor="#eaeaea">
                                <select name="opcionn" class="campos" id="hic_grado">
                                <option value="0">Seleccione</option>
                                <OPTION VALUE="1">Edad, 20 – 36 semanas</OPTION>
                                <OPTION VALUE="2">Peso. 500 – 1500 gr.</OPTION>
                                </select> 
                              
                                    <select name="hic_grado" class="campos" id="hic_grado">

                                    <option value="000">Seleccione</option>

                                    <?php
                                        conectar();
                                        $consulta = "";

                                        $consulta= mysql_query("
                                        SELECT * FROM `CNT`
                                        ");
                                        desconectar();             

                                        while($row= mysql_fetch_assoc($consulta)) {
                                            echo "<option value=\"".$row['IDE_CNT']."\">".$row['SERVICIO']."</option>";
                                        }
                                    ?> 

                                </select>  
                              
                          </td>
                  </tr>
                      

                </table>
                  <br>
                      <center>
                          <input name="primerboton" type="submit" value="Ver gráficos estadísticos" />
                      </center>                    
                        <br>
                    <center>
                        <input name="primerboton" type="button" value="Volver  a inicio" />
                    </center>
<br><br>
                        
                  
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
</form>  </div>

    <!--
  <div id="cajaAmarilla"> 
        <table>
          <tr valign="top"> 
            <td><img src="../../images/images_portadas/icon_alerta.gif" /></td>
            <td> Informacion adicional</td>
          </tr>
          
        </table>
    </div>
</div>
-->

    
  
  
 
 
    <!-- end #mainContent -->
  </div>
<br class="clearfloat" />
   <div id="footer">
    <p>&copy; Neocosur - Grupo Colaborativo del Conosur. Todos los derechos reservados.</p>
  <!-- end #footer --></div>
<!-- end #container --></div>
<!-- Load the Mootools Framework Menumatic-->
	<!--<script src="http://www.google.com/jsapi"></script><script>google.load("mootools", "1.2.1");</script>	-->
<script src="../../scripts/mootools-1.2.1-core-nc.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- Load the MenuMatic Class -->
	<script src="../../scripts/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- Create a MenuMatic Instance -->
	<script type="text/javascript" >
		window.addEvent('domready', function() {			
			var myMenu = new MenuMatic();
		});	

	</script>
</body>
</html>
