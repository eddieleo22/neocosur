<?php
error_reporting(0);
session_start();
include 'capaDAO/ConexionDAO.php';

$cone = new ConexionDAO();
	if(trim($_SESSION["perfil"]) =="Administrador" ||  trim($_SESSION["perfil"]) =="Supervisor"){
		$centro="";
	}
	else {
		
		$centro= $_SESSION["id_centro"]!=''?  $_SESSION["id_centro"]:$centro;
	}
	
	
	
	function obtener_lista_anios($adelanta=0){
    $anios = array();
    for($i = date("Y"); $i >= date("Y") - 5; $i--){
        $anios[] = array($i, $i + $adelanta);
    }
    return $anios;
}
$test = obtener_lista_anios(1); //los años a adelantar lo cambias logicamente.

?>


<html>

<head> 
  
    <script src="graficos/js/Chart.bundle.js"></script>
    <script src="graficos/js/utils.js"></script>
	<script src="graficos/js/jquery.min.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="graficos/graficos.css">
	<style>
	.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('graficos/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
		}
	</style>
</head>

<body>
<div class="loader"></div>
        <script>
                var id=0;
                var selection;
				var allData = [];
                var datas0 = [];
                var datas1 = [];
                var datas2 = [];
				var etiquetas = [];
                var barChartData;
				
				var allDataT = [];
                var datas0T = [];
                var datas1T = [];
                var datas2T = [];
				var etiquetasT = [];
                var barChartDataT;
				
				
				
				var contador1 = 0;	
				var contador2 = 0;	
				
				//
			    //
                var laTerribleFuncion = function(graf, id, id2, id3, id4, id5){    
					
				//
                var ajax_url = "graficos/datos/pruebaGrafico.php";                
                var ajax_request = new XMLHttpRequest();
                graph = JSON.parse(graf).toString();
                id = JSON.parse(id).toString();
                id2 = JSON.parse(id2).toString();
                id3 = id3;//JSON.parse(id3).toString();
                id4 = JSON.parse(id4).toString();
				id5 = JSON.parse(id5).toString();
                params = "id=" + id + "&id2=" + id2 + "&id3=" + id3 + "&id4=" + id4 + "&id5=" + id5 + "&graph=" + graph;				
                ajax_url += '?' + params;
				console.log("ajax_urlAERSH "+ajax_url);
                ajax_request.onreadystatechange = function() {
                    if (ajax_request.readyState == 4 ) {
                        response = JSON.parse( ajax_request.responseText );
						console.log("response 1 "+response.success);
						//etiquetas.reset();//=null;
                        if(response.success){
							$(".loader").fadeOut("slow");
                            for ( et in response.data.etiqueta ) {
                                etiquetas[et] = response.data.etiqueta[et];          
								//							
                            }
							
                            for ( dt in response.data.valores ) {
								allData = response.data.tabla;
								console.log("allData "+allData);	
								console.log("response.data.valores[dt]  "+response.data.valores[dt] );
                                for ( dts in response.data.valores[dt] ) {
								console.log("dt "+dt );
                                    if(dt == 0){
                                        datas0[dts] = response.data.valores[dt][dts];
										console.log("datas0[dts] "+datas0[dts] );
                                    }
                                    else if(dt == 1){
                                        datas1[dts] = response.data.valores[dt][dts];
										console.log("datas1[dts] "+datas1[dts] );
                                    }
                                    else if(dt == 2){
                                        datas2[dts] = response.data.valores[dt][dts];
										console.log("datas2[dts] "+datas2[dts] );
                                    }
                                }                                    
                            }
							//allData = [datas0,datas1,datas2];
							//tabla1(etiquetas,allData);
                        }
						console.log("graph-> uno > "+graph );
						
                        if( graf == 1 ){
						//console.log("etiquetas-> uno > "+etiquetas.length );
						var et = etiquetas;
						console.log("et> "+et );
						if(id3=='semana'){
							console.log("etiquetas if -> uno > "+etiquetas.length );
						console.log("id3 if > "+id3 );
							//etiquetas=et.substring(0,8);
							etiquetas.splice(8,4);
						}
						console.log("etiquetas-> uno > "+etiquetas.length );
						console.log("id3> "+id3 );
						
								window.myBar.data = 
								{
										labels: etiquetas,
										datasets: [{
											label: 'Fallece(F)',
											backgroundColor: window.chartColors.red,
											data: datas0                 
										}, {
											label: 'No Fallece (N/F)',
											backgroundColor: window.chartColors.blue,
											data: datas1
										}, {
											label: 'Sin Información (S/I)',
											backgroundColor: window.chartColors.green,
											data: datas2
										}]
								
								};
							window.myBar.update();
							tabla1(etiquetas,allData);
						}
						
                    }
               }
               
            ajax_request.open( "GET", ajax_url);
            ajax_request.send();
        
        
        };
		
			var laTerribleFuncion2 = function(graf2, id, id2, id3, id4, id5){  
                var ajax_url = "graficos/datos/pruebaGrafico.php";                
                //var ajax_url = "graficos/datos/personas.php";                
                var ajax_request = new XMLHttpRequest();
                graph2 = JSON.parse(graf2).toString();
                id = JSON.parse(id).toString();
                id2 = JSON.parse(id2).toString();
                id3 = id3;//JSON.parse(id3).toString();
                id4 = JSON.parse(id4).toString();
				id5 = JSON.parse(id5).toString();
                params = "id=" + id + "&id2=" + id2 + "&id3=" + id3 + "&id4=" + id4 + "&id5=" + id5 + "&graph=" + graph2;				
                ajax_url += '?' + params;
				console.log("****** NEOCOSUR  TOTAL ******");
				console.log("ajax_url2 "+ajax_url);
                ajax_request.onreadystatechange = function() {
                    if (ajax_request.readyState == 4 ) {
                        response = JSON.parse( ajax_request.responseText );
                        if(response.success){
							$(".loader").fadeOut("slow");
                            for ( et in response.data.etiquetaT ) {
                                etiquetasT[et] = response.data.etiquetaT[et];    
								console.log("ETIQUETAS Total  "+etiquetasT[et]);		
                            }
                            for ( dt in response.data.valoresT ) {
								allDataT = response.data.tablaT;
                                for ( dts in response.data.valoresT[dt] ) {
                                    if(dt == 0){
                                        datas0T[dts] = response.data.valoresT[dt][dts];
                                    }
                                    else if(dt == 1){
                                        datas1T[dts] = response.data.valoresT[dt][dts];
                                    }
                                    else if(dt == 2){
                                        datas2T[dts] = response.data.valoresT[dt][dts];
                                    }
                                }                                    
                            }
							//allData = [datas0,datas1,datas2];
							console.log(" TOTAL toda la tabla "+response.data.tablaT);
							//tabla2(etiquetasT,allDataT);
                        }
                        if(graf2 == 2 ){
							if(id3=='semana'){
							console.log("etiquetas if -> uno > "+etiquetasT.length );
						console.log("id3 if > "+id3 );
							//etiquetas=et.substring(0,8);
							etiquetasT.splice(8,4);
						}
								window.myBar2.data = {
								labels: etiquetasT,
								datasets: [{
									label: 'Fallece(F)',
									backgroundColor: window.chartColors.red,
									data: datas0T                 
								}, {
									label: 'No Fallece (N/F)',
									backgroundColor: window.chartColors.blue,
									data: datas1T
								}, {
									label: 'Sin Información (S/I)',
									backgroundColor: window.chartColors.green,
									data: datas2T
								}]

							};
							window.myBar2.update();
							tabla2(etiquetasT,allDataT);
						}
                    }
               }
               //var ctx2 = document.getElementById("canvasFijo").getContext("2d");
			   //context.clearRect(0, 0, ctx2.width, ctx2.height);
            ajax_request.open( "GET", ajax_url);
            ajax_request.send();
        
        
        };
		
        
        
    window.onload = function() { 
       
       construirCanvas(1,1);       
       construirCanvas(2,2);
	   
	
    };
     

     
    
    function construirCanvas(id, grafico){
			var selection1 = document.getElementById("opcGraficos").value;
			var selection2 = document.getElementById("opcGraficos2").value;
			var selection3 = document.getElementById("opcGraficos3").value;
			var selection4 = document.getElementById("opcGraficos4").value;
			var selection5 = 0;//document.getElementById("opcGraficos4").value;
        if(grafico == 1){
            //laTerribleFuncion(1,0,0,0,0,0);
			laTerribleFuncion(1,selection1,selection2,selection3,selection4,selection5);
            var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        title:{
                            display:true,
                            text: "Total Centro"
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });
			
        }
        else{
            //laTerribleFuncion2(2,0,0,0,0,0);
			
            laTerribleFuncion2(2,selection1,selection2,selection3,selection4,selection5);
            var ctx2 = document.getElementById("canvasFijo").getContext("2d");
			
                window.myBar2 = new Chart(ctx2, {
                    type: 'bar',
                    data: barChartDataT,
                    options: {
                        title:{
                            display:true,
                            text:"Totales Neocosur"
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });
        }
		//	
    }
		
		function generarGrph(){
			$(".loader").show();
			$("table").remove();
			var selection1 = document.getElementById("opcGraficos").value;
			var selection2 = document.getElementById("opcGraficos2").value;
			var selection3 = document.getElementById("opcGraficos3").value;
			var selection4 = document.getElementById("opcGraficos4").value;
			var selection5 =0;// document.getElementById("opcGraficos5").value;			
			
			laTerribleFuncion(1,selection1,selection2,selection3,selection4,selection5);
			laTerribleFuncion2(2,selection1,selection2,selection3,selection4,selection5);
			
			//laTerribleFuncion2(2,0,0,0,0,0);		
		}
        
		function limpiar(){
			var ctx2 = document.getElementById("canvasFijo").getContext("2d");
			alert(ctx2);
			context.clearRect(0, 0, ctx2.width, ctx2.height);
			
		}
		function tabla2(etiqTabla, datosTabla) {
		var mybody = document.getElementsByTagName("body")[0];
		var tableHeder = ["F", "%F", "NF","%NF","Total reg.", "S/I", "%S/I", "Total Ninios"];
		div = document.getElementById("dos");
        mytable     = document.createElement("table");
        mytablebody = document.createElement("tbody");
		for(var h = 0; h < 1; h++) {
			mycurrent_row = document.createElement("tr");
			mycurrent_cell = document.createElement("td");
			currenttext = document.createTextNode("");
			mycurrent_cell.appendChild(currenttext);
			mycurrent_row.appendChild(mycurrent_cell);
			for(var g = 0; g < tableHeder.length; g++) {
			mycurrent_cell = document.createElement("td");
			currenttext = document.createTextNode(tableHeder[g]);
			mycurrent_cell.appendChild(currenttext);
			mycurrent_row.appendChild(mycurrent_cell);
			}
			mytablebody.appendChild(mycurrent_row);	
		}			
			//console.log("");
			var count = Object.keys(datosTabla).length;
			console.log("cantidad en tabla "+count);
			//for ( dt in datosTabla[0] ) {
			for ( i=0; i< count;i++ ) {
			
				mycurrent_row = document.createElement("tr");
				mycurrent_cell = document.createElement("td");
				currenttext = document.createTextNode(etiqTabla[i]);
				mycurrent_cell.appendChild(currenttext);
				mycurrent_row.appendChild(mycurrent_cell);
				
				for ( dts in datosTabla[i] ) {
				//console.log("datosTabla[dt][dts] AERS 	 -> "+datosTabla[i][dts]);
					mycurrent_cell = document.createElement("td");
					currenttext = document.createTextNode(datosTabla[i][dts]);
					mycurrent_cell.appendChild(currenttext);
					mycurrent_row.appendChild(mycurrent_cell);
				
				}
            mytablebody.appendChild(mycurrent_row);
        }
        mytable.appendChild(mytablebody);
		
		if(contador2 < count ){	
			mytable.appendChild(mytablebody);
			div.appendChild(mytable);
			
			mybody.appendChild(div);
			//mybody.appendChild(mytable);
			
			//mybody.appendChild(div);
			//mybody.appendChild(mytable);
			contador2 += 1;
			
		}
		else if (contador2 > 1){
			mytable.appendChild(mytablebody);
			div.appendChild(mytable);
			
			mybody.appendChild(div);
		}
        mytable.setAttribute("border","1");
		mytable.setAttribute("name","nameTabla");
		mytable.setAttribute("style","float:left");
    }
		
		
		
		function tabla1(etiqTabla, datosTabla) {
		var mybody = document.getElementsByTagName("body")[0];
		var tableHeder = ["F", "%F", "NF","%NF","Total reg.", "S/I", "%S/I", "Total Ninios"];
		div = document.getElementById("uno");
        mytable     = document.createElement("table");
        mytablebody = document.createElement("tbody");
		for(var h = 0; h < 1; h++) {
			mycurrent_row = document.createElement("tr");
			mycurrent_cell = document.createElement("td");
			currenttext = document.createTextNode("");
			mycurrent_cell.appendChild(currenttext);
			mycurrent_row.appendChild(mycurrent_cell);
			for(var g = 0; g < tableHeder.length; g++) {
			mycurrent_cell = document.createElement("td");
			currenttext = document.createTextNode(tableHeder[g]);
			mycurrent_cell.appendChild(currenttext);
			mycurrent_row.appendChild(mycurrent_cell);
			}
			mytablebody.appendChild(mycurrent_row);	
		}			
			//console.log("");
			var count = Object.keys(datosTabla).length;
			console.log("cantidad en tabla "+count);
			//for ( dt in datosTabla[0] ) {
			for ( i=0; i< count;i++ ) {
			
				mycurrent_row = document.createElement("tr");
				mycurrent_cell = document.createElement("td");
				currenttext = document.createTextNode(etiqTabla[i]);
				mycurrent_cell.appendChild(currenttext);
				mycurrent_row.appendChild(mycurrent_cell);
				
				for ( dts in datosTabla[i] ) {
				//console.log("datosTabla[dt][dts] AERS 	 -> "+datosTabla[i][dts]);
					mycurrent_cell = document.createElement("td");
					currenttext = document.createTextNode(datosTabla[i][dts]);
					mycurrent_cell.appendChild(currenttext);
					mycurrent_row.appendChild(mycurrent_cell);
				
				}
            mytablebody.appendChild(mycurrent_row);
        }
        mytable.appendChild(mytablebody); 
		console.log("contador !!	 -> "+contador1);
			console.log("count !!	 -> "+count);
		if(contador1 < count){	
			mytable.appendChild(mytablebody);
			div.appendChild(mytable);
			
			mybody.appendChild(div);
			//mybody.appendChild(mytable);
			
			//mybody.appendChild(div);
			//mybody.appendChild(mytable);
			contador1 += 1;
			
		}
		else {
			mytable.appendChild(mytablebody);
			div.appendChild(mytable);
			 
			mybody.appendChild(div);
		}
        mytable.setAttribute("border","1");
		mytable.setAttribute("name","nameTabla");
		mytable.setAttribute("style","float:left");
    }
		function imprimir(btn){
            //filterPanel.collapse(Ext.Component.DIRECTION_TOP);
            //filterPanel.hide();
            window.print();
            //filterPanel.show();
	}
		
    </script>
<div class="ficha panel panel-default">
  <div class="panel-body">
    <form >
   
           
            <div class="row">
                <div class="campos_select">
				
                    <select id="opcGraficos" name="opcGraficos" class="form-control input-sm" required>
                       
						<?php
						foreach($test as $k => $v){
								echo '<option value='.$v[0].'>'.$v[0].'</option>';
							}
						?>
                    </select>
                </div>
                <div class="campos_select">
                    <select id="opcGraficos2" name="opcGraficos2" class="form-control input-sm">
                        <option value="0">Seleccione Trimestre</option>
                       <?php cargarSelect("trimestres",$cone,"ID_TRIMESTRE","NOMBRE",$opcGraficos2);?>
                    </select>
                </div>
                <div class="campos_select">
                    <select id="opcGraficos3" name="opcGraficos3" class="form-control input-sm">
                        <option value="0">Seleccione Tramo </option>
                        <option value="peso">Peso</option>
                        <option value="semana">Semana</option>
                        
                    </select>
                </div>
                <div class="campos_select">
                    <select id="opcGraficos4" name="opcGraficos4" class="form-control input-sm">
                       
                        <?php 
					if($centro==''){
						echo' <option value="0">Seleccione Centro </option>';
						cargarSelect("centro",$cone,"c_id_centro","c_nombre",$centro);
					}
					else {
						
						cargarSelectSinPermiso("centro",$cone,"c_id_centro","c_nombre",$centro);
					}
					//cargarSelect("centro",$cone,"c_id_centro","c_nombre",$centro);?>
                    </select>
                </div>
                <!--div class="campos_select">
                    <select id="opcGraficos5" name="opcGraficos5" class="form-control input-sm">
                        <option value="0">Seleccione</option>
                        <option value="1">Opcion 1</option>
                        <option value="2">Opcion 2</option>
                        <option value="3">Opcion 3</option>
                    </select>
                </div-->
                
                <input type="button" class="button" onclick="generarGrph();" value="Ver grafico"/>
				<button id="button-1014-btnEl" type="button" onclick="imprimir(this);"  hidefocus="true" role="button" autocomplete="off" class="button">
				<span id="button-1014-btnInnerEl" class="x-btn-inner" style="">Imprimir</span>
				<span id="button-1014-btnIconEl" class="x-btn-icon" style="background-image: url(../images/print.png);">&nbsp;</span>
				</button>
            </div>
				<div class="canvas_box">
                    <canvas id="canvas"></canvas>
                </div>  
    
                <div class="canvas_box">
                    <canvas id="canvasFijo"></canvas>
                </div>
				<div  id="uno" style="float:left;margin-left:6%">
					
					</div>
				<div  id="dos" style="float:right;margin-right:14%" >
						
				</div>
                
    </form>
 
	</div>
	
</div>
</body>
</html>

