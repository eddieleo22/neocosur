/*NEOCOSUR */

body {
	font-family: Arial, Helvetica, sans-serif; 
	font-size: 12px;
	color: #023C8A;
	line-height:17px;
	/* Scrollbar s�lo visible en Explorer a partir de su versi�n 5.5 */
	scrollbar-face-color: #FFFFFF;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-3dlight-color: #FAFAFA;
	scrollbar-darkshadow-color: #CCCCCC;
	scrollbar-shadow-color: #CCCCCC;
	scrollbar-arrow-color: #999999;
	scrollbar-track-color: #FFFFFF;
}

a {
	color: #0356C7;
	font-weight: bold;
	text-decoration: underline;
}

a:hover {
	color: #CA6F13;
	text-decoration: underline;
}


/* Contenedores principales */

#wrapper {
	text-align:left;
	width: 98%;
	margin: 0 auto;
	padding-left: 0px;
	padding-right: 0px;
}

#wrapper_registro {
	text-align:left;
	width: 750px;
	margin: 0 auto;
	padding-left: 0px;
	padding-right: 0px;
}

#wrapper_graficos {
	text-align:center;
	width: 920px;
	margin: 0 auto;
	padding-left: 0px;
	padding-right: 0px;
	background-color:#FFF;
}





/* T�tulos y subt�tulos de Ficha. */
.titulo_ficha {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15pt;
	font-weight: bold;
	color: #03449A;
	text-decoration: none;
	text-align: left;
	line-height: auto;}
	
.encabezado_columnas {/*ex fuente*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #023C8A;
	text-decoration: none;
	font-weight: bold;
	line-height: 15px;}
	
a.encabezado_columnas:link, a.encabezado_columnas:active,a.encabezado_columnas:visited{color: #023C8A;text-decoration: underline;font-weight: bold;}
a.encabezado_columnas:hover{color: #CA6F13;text-decoration: underline;font-weight: bold;}
	
.seccionesFicha {/*secciones en Ficha*/
	font-weight:bold;
	background-color:#cae0f5;
	padding:3px;
	text-align: left;
	line-height: 19px;
	}
	
.subtituloFicha {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	color: #03449A;
	text-decoration: none;
	text-align: left;
	line-height: auto;
	border-bottom: 1px dotted #03449A;}
	
.bottom {
	font-weight:bold;
	padding:3px;
	text-align: center;
	line-height: 19px;
	}
	

/*L�neas y espaciadores*/

.linea_azul{
	border-top: 1px dotted #03449A;
}

.spacer{
	height:2;
}

/* Texto azul principal y sus estados. */
.texto {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #023C8A;
	text-decoration: none;
	line-height: 17px;
	text-align:left;
	font-weight: normal;
	}

a.texto:link, a.texto:active, a.texto:visited{color: #0356C7;text-decoration: underline;font-weight: bold;}
a.texto:hover{color: #CA6F13;text-decoration: underline;font-weight: bold;}


/* Otros estilos para cuerpo de texto */
.saber {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
	text-decoration: none;
	font-weight: normal;
	line-height: 15px;}

a.saber:link, a.saber:active,a.saber:visited{color: #0356C7;text-decoration: underline;font-weight: bold;}
a.saber:hover{color: #CA6F13;text-decoration: underline;font-weight: bold;}


/* Estados, textos destacados */	
.azulino, .CasoNuevo{ /*Caso nuevo*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0000FD;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;}
	
.rojo,.Enrevisión { /*En revisi�n*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;}
	
.verde, .Digitacióncompleta { /*Digitaci�n completa*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #037221;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;}

.naranjo, .DatosIncompleto{ /*Datos incompleto*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #CA6F13;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;
	}	

.negro, .CasoCerrado { /*Caso cerrado*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;}
	
.gris { /*Caso hist�rico*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	line-height: 15px;
	font-weight: normal;}
	
	


	
/* Fuente peque�a para recuadros, pie de p�gina o pie de fotos. */
.pie {
font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	text-decoration: none;
	font-weight: bold;
		line-height: 13px;}

a.pie:link, a.pie:active, a.pie:visited{color: #03449A;text-decoration: underline;}
a.pie:hover{color: #CA6F13;text-decoration: underline;}


/* Contenedores, campos y botones de formularios. */
#content_form {
	background-color:#ecf1f6;
	padding:3px;
	}
	
#content_listado {
	background-color:#ecf1f6;
	padding:0px;
	}
	
#buscador {
	background-color:#ecf1f6;
	padding:0px;
	}

input{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	
}

.campos {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	}
	
.cifra {/*2 a 3 d�gitos*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:25px;
	}
	
.cifra2 {/*4 a 5 d�gitos*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:45px;
	}
	
.fecha {/*10 d�gitos*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:70px;
	}

.boton{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #2a61a8; 
	float: right;
		
}

.botonCentral{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #2a61a8; 
	float: center;
		
}

.selectFijo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:200px;
	}
	
.selectFijo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:260px;
	}
	
.selectFijo3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #2a61a8;
	width:510px;
	}
 /* Alineaciones */
.fltrt { 
	float: right;
	margin-left: 10px;
}
.fltlft { 
	float: left;
	margin-right: 10px;
}
.clearfloat { /* para �ltimo elemento antes de cerrar un contenedor */
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
}


/* Tooltip Box*/
div#vtip {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	line-height: 15px;
	display: none;
	position: absolute;
	padding: 8px 10px;
	left: 15px;
	background-color: #FFFF99;
	border: 1px solid #FF9900;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	z-index: 9999;
}
div#vtip #vtipArrow {
	position: absolute;
	top: -9px;
	left: 10px;
	z-index: 10000;
}

/* Tablacebra*/
tr.impar { background-color: #EAEAEA; font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: #023C8A;}

tr.par{ background-color: #FFFFFF; font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: #023C8A;}

/*Tabs*/
div.demo {
	padding:0px;
}

/*Alertas portadas*/
#cajaAmarilla {background-color:#f7f7d5;
line-height:20px; 
width:410px; 
padding: 12px; margin:20px 0 0 45px}

#titulos_portadas{margin:30px 0 0 187px}

/*tabla grafic*/
#espacio_graficos {
	text-align:left;
	width: 920px;
	margin: 0 auto;
	padding-left: 0px;
	padding-right: 0px;
}
.linea_borde{
border-top:1px solid #336699}

/*espacio portadas*/
#espacio_portadas {
	text-align:left;
	width: 500px;
	margin: 0px;
	padding-left: 0px;
	padding-right: 0px;
}

/*botonescajadestacado*/
a.botonVerd {
            background: transparent url(../../images/boton-a.gif) no-repeat scroll top right;
            font: bold 10px Verdana, Arial, Helvetica, sans-serif;
			color:#0356cc;
			/*text-align:center;*/
			text-decoration:none;
            display: block;
            float: right;
            height: 26px;
            margin-right: 0px;/*15px*/
            padding-right: 14px; /* sliding doors padding, permite que el largo del bot�n se adapte al texto */
}
a.botonVerd:hover {
            background-position: bottom right;
            outline: none;
}
a.botonVerd span {
            background: transparent url(../../images/boton-span.gif) no-repeat;
            display: block;
            font: bold 10px Verdana, Arial, Helvetica, sans-serif;
			line-height: 13px;
			padding: 5px 0 5px 15px;
			
}

a.botonVerd:hover span {
            background-position: bottom left;
	line-height: 13px;
            padding: 5px 0 5px 15px;color:#ff6600;text-decoration:none;
}
/* titulo filtros graficos mortalidad*/
.titulo_graficos {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
	color: #03449A;
        background-image: "url(fondo001.jpg)";
        
}

.caja_graficos{    
    borde-color: #00419A;
    border: solid 1px; 
    width:450px;
}

.grafico1{
    background: url(fondo_grafico1.jpg) ; 
    position: relative;width:450px;height:300px;    
}
            
            
.grafico1122 {
	display: list-item;
	list-style-image: url(fondo_grafico1.jpg);
	list-style-position: inside;
	letter-spacing: -1000em;
	font-size: 1pt;
	color: #fff;
	}            
.grafico2{
    border:1px green solid; 
    position: absolute; 
    left: 64px; 
    height: 210px; 
    width: 16px; 
    top: 28px;
   
}
.grafico3{
    position: absolute; 
    top: 1px
}
            