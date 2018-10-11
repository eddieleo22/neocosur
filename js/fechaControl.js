function cal_fecha(date, year, month, now, algoritmo)
{
	
	//date : valor fecha origen a procesar
	//year: nombre del campo destino año
	//month: nombre del campo destino mes
	//now : valor fecha del objeto que emite el evento
	//algoritmo: esquema de calculo: DATOS_CONTROL, EC_HASTA_2	
	//alert('algoritmo='+algoritmo);
	
		if(typeof algoritmo == 'undefined'){
			algoritmo = 'DATOS_CONTROL';
		}
	
	//var edad_gest=document.getElementById('oculto_gest').value;
	
	var mes_cronologico =document.getElementById('anio2').value; 
	var fecha_control="";
		if (algoritmo == 'DATOS_CONTROL'){
			fecha_control=document.getElementById('fecha_control').value;
		}
	var fecha_40=document.getElementById('txt_fec_crono').value;
	var fecha_40_EG = document.getElementById('txt_fec_40_EG').value;
	
	//alert(fecha_40_EG);	
	//var ec_anio_control1 = document.getElementById('ec_anio_control1').value; 
	//alert(fecha_40);
	//alert(edad_gest+ "primero");
	
	var mes_gest=0;
	var resultado=0;
	var mes_resultado=0;
	var anioEC=0;
	var fecha2 = null;
	
	var anio_cronologico = 0;
	var mes_cronologico = 0;
	console.log('\n ### fecha2='+fecha2+" ### \n");
	if(typeof now == 'undefined'){
		var actual = new Date();
		fecha2 = actual.getDay()+''+actual.getMonth()+''+actual.getYear();
	} else {
		fecha2 = now.replace('-','');	
	}

    var fecha1 = date.replace('-','');
    fecha1 = fecha1.replace('-','');
    fecha2 = fecha2.replace('-','');
    fecha2 = fecha2.replace('-','');
    console.log('fecha1=' + fecha1 + ', fecha2='+fecha2);
    var diaActual = fecha2.substr(6, 2); 
    var mesActual = fecha2.substr(4, 2); 
    var anioActual = fecha2.substr(0, 4); 
														
    var diaInicio = fecha1.substr(6, 2); 
    var mesInicio = fecha1.substr(4, 2); 
    var anioInicio = fecha1.substr(0, 4); 
	console.log("SIN fecha_40_EG = "+fecha_40_EG);
    fecha_40_EG = fecha_40_EG.replace('-','');
	fecha_40_EG = fecha_40_EG.replace('-','');
	console.log("REPLACe  fecha_40_EG = "+fecha_40_EG);
    var diaInicioEG = fecha_40_EG.substr(5, 3); 
    var mesInicioEG = fecha_40_EG.substr(4, 2); 
    var anioInicioEG = fecha_40_EG.substr(0, 4);
    
    console.log('diaInicioEG='+diaInicioEG+',mesInicioEG='+mesInicioEG+',anioInicioEG='+anioInicioEG);
    
	var arreglo_dias_mes = new Array();		
	arreglo_dias_mes =[31,28,31,30,31,30,31,31,30,31,30,31];
	
   //CALCULO DE LA EDAD CRONOLOGICA =============================================================================	
    var b = 0; 
    var mes = mesInicio-1; 
    if(mes==1)
	{ 
					if((anioActual%4==0 && anioActual%100!=0) || anioActual%400==0)
					{ 
						b = 29; 
					}else{ 
						b = 28; 
					} 
   	} 
    else 
	{
				b=arreglo_dias_mes[mes];
  	} 
	console.log("anioInicio "+anioInicio);
	console.log("anioActual "+anioActual);
	console.log("mesInicio "+mesInicio);
	console.log("mesActual "+mesActual);
	console.log("diaInicio "+diaInicio);
	console.log("diaActual "+diaActual);
    if((anioInicio>anioActual) || (anioInicio==anioActual && mesInicio>mesActual) || 
        (anioInicio==anioActual && mesInicio == mesActual && diaInicio>diaActual))
	{ 
		//<div class="alert alert-info" id="error-fecha" style ="display :none">La fecha de control debe ser posterior a fecha alta</div>
		//document.getElementById('error-fecha').style=block;
		//document.getElementById('button').disabled=true;
        //alert("La fecha de control debe ser posterior a fecha alta"); 
		//document.getElementById('button').disabled=true;
		document.getElementById('fecha_control').value='';
		document.getElementById(year).value='';
        document.getElementById(month).value='';
		document.getElementById('anio').value='';
        document.getElementById('meses').value='';  
		
		/*alert("primera vez F1"+fecha1 + "primera vez F2"+fecha2);
		fecha1=null;
		
		alert("segunda vez F1"+fecha1 + "segunda vez F2"+fecha2);*/
    }
	else
	{ 
	 //alert("mesInicio="+mesInicio+",anioInicio="+anioInicio+",mesActual="+mesActual+",anioActual="+anioActual);
        if(mesInicio <= mesActual)
		{ 
            anios = anioActual - anioInicio; 			
            if(diaInicio <= diaActual)
			{ 
                meses = mesActual - mesInicio; 
                dies = diaActual - diaInicio;
            }else
			{ 
                if(mesActual == mesInicio){ 
                    anios = anios - 1; 
                } 
                meses = (mesActual - mesInicio - 1 + 12) % 12; 
                dies = b-(diaInicio-diaActual);
			} 
        }else
		{ 
            anios = anioActual - anioInicio - 1; 		
            if(diaInicio > diaActual){ 
                meses = mesActual - mesInicio -1 +12; 
                dies = b - (diaInicio-diaActual); 
            }else{ 
				meses = mesActual - mesInicio + 12; 
                dies = diaActual - diaInicio;
			} 
        } 
		
		
              // alert(anioNac + "ANIOEC"+ anioEC);   
		//document.getElementById('button').disabled=false;
		
		anio_cronologico = anios;	
		mes_cronologico = meses;
	
		if (algoritmo=='DATOS_CONTROL')
		{
				if(anios=="-1" && meses=="11")
				{
					document.getElementById(year).value="0";
					document.getElementById(month).value="0";
				}
				else 
				{
					document.getElementById(year).value=anios;
					document.getElementById(month).value=meses;
				}
		}
		
//========================= FIN CALCULO EDAD CRONOLOGICO

//CALCULO DE LA EDAD GESTACIONAL  =============================================================================	
	
	
		var b = 0; 
		var mes = mesInicioEG-1; 
		if(mes==1)
		{ 
						if((anioActual%4==0 && anioActual%100!=0) || anioActual%400==0)
						{ 
							b = 29; 
						}else
						{ 
							b = 28; 
						} 
		 } 
		else 
		{
				b=arreglo_dias_mes[mes];
		} 
     
	//alert("mesInicioEG="+mesInicioEG+",\n anioInicioEG="+anioInicioEG+",\n mesActual="+mesActual+",\n anioActual="+anioActual);
        if(mesInicioEG <= mesActual)
		{ 
            aniosEG = anioActual - anioInicioEG; 
			
            if(diaInicioEG <= diaActual){ 
                mesesEG = mesActual - mesInicioEG; 
                diesEG = diaActual - diaInicioEG; 
				

				
            }else
			{ 
                if(mesActual == mesInicioEG)
				{ 
                    aniosEG = aniosEG - 1;  
                } 
                mesesEG = (mesActual - mesInicioEG - 1 + 12) % 12; 
                diesEG = b-(diaInicioEG-diaActual);
            } 
        }
		else
		{ 
            aniosEG = anioActual - anioInicioEG - 1; 
		
            if(diaInicioEG > diaActual)
			{ 
                mesesEG = mesActual - mesInicioEG -1 +12; 
                diesEG = b - (diaInicioEG-diaActual); 
				

            }
			else
			{			
                mesesEG = mesActual - mesInicioEG + 12; 
                diesEG = diaActual - diaInicioEG; 
				
			 
            } 
        }    
		//document.getElementById('button').disabled=false;
        
		if (algoritmo=='DATOS_CONTROL'){
			if(aniosEG=="-1" && mesesEG=="11")
				{
					document.getElementById('anio').value="0";
					document.getElementById('meses').value="0";
				}
				else
				{
					document.getElementById('anio').value=aniosEG;
					document.getElementById('meses').value=mesesEG;
				}
			
		}
        
	
	
//========================= FIN CALCULO EDAD GESTACIONAL         
        
	//======== OTROS ALGORITMOS
			
		if (algoritmo=='EC_HASTA_2')
		{
			
			if (anio_cronologico>=2)
			{
				if(anio_cronologico=="-1" && mes_cronologico=="11")
				{
					document.getElementById(year).value="0";
					document.getElementById(month).value="0";
				}
				else 
				{
					document.getElementById(year).value=anio_cronologico;
					document.getElementById(month).value=mes_cronologico;
				}
				
			}
			else
			{
				if(aniosEG=="-1" && mesesEG=="11")
				{
					document.getElementById(year).value="0";
					document.getElementById(month).value="0";
				}
				else 
				{
					document.getElementById(year).value=aniosEG;
					document.getElementById(month).value=mesesEG;
				}
						
			}
		} 		
	}
}