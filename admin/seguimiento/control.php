<?php 
session_start();
//session_destroy();
//error_reporting(0);
//include 'capaDAO/ingresoControlDAO.php';
//include 'capaDAO/IngresoDAO.php'; 
$daoControl =  new ingresoControlDAO($cone);
$fila = $dao->buscarFichaSegId($idNeocosur);
$edadCrono = $fila['EDAD_CRONOLOGICA'];

extract($_POST);

$daoControl =  new ingresoControlDAO($cone);

$filaControl  =$daoControl->buscarFichaIdSeg($idNeocosur,$idControl);

if($filaControl!=null){
	
	$fechaControl = $filaControl['FECHA_CONTROL'];
	$anio=$filaControl['EDAD_CORREGIDA_AGNOS'];
	$meses= $filaControl['EDAD_CORREGIDA_MESES'];
	$anio2=$filaControl['EDAD_CRONOLOGICA_AGNOS'];
	$meses2=$filaControl['EDAD_CRONOLOGICA_MESES'];
	$nombre_control=$filaControl['nombre_control'];
	
}

$_SESSION['edad_corre_meses']=$meses;
$_SESSION['edad_corre_anio']=$anio;
$_SESSION['edad_crono_anio2']=$anio2;
$_SESSION['nombre_control']=$nombre_control;

if($fechaControlOK40!=''){
	$fechaControl=$fechaControlOK;
}
if (!($fechaControl=='0000-00-00' ||   $fechaControl=='')){
	$lecturafechaControl=" readOnly";
	//echo "<br>paso ";
}



?>


<div class="ficha panel panel-default">
  <div class="panel-body">
  <form action="Negocio/controlingresoBO.php" method="post" name="controlForm" >
 
<!--Nacimiento--> <input name="txt_fec_nacimiento"  id="txt_fec_nacimiento"  type="hidden"  value="<?=$fecha; ?>"/>
  <!--Alta--><input name="txt_fec_crono"  id="txt_fec_crono"  type="hidden" value="<?=$fechaAlta; ?>"/>
  <!--40 Sem--><input name="edadCrono"  id="txt_fec_40_EG"  type="hidden" value="<?php echo $edadCrono; ?>"/>
    <button class="btn btn-success active subtitulo" type="button" id="sec_datos_control"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Datos del Control</button>

    <div class="row">
    <div class="col-lg-7">
      <div class="form-group">
        <label for="centro" class="col-lg-5 control-label">Centro de Control</label>
        <div class="col-lg-7">
          <input type="text" name="centro" value="<?= utf8_encode($centro); ?>" class="form-control input-sm" contenteditable="false" disabled >
        </div>
      </div>
                              
      <div class="form-group">
        <label for="servicio" class="col-lg-5 control-label">Servicio</label>
        <div class="col-lg-7">
          <input type="text" name="servicio" value="<?=$tipoCentro; ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>
                               
      <div class="form-group">
        <label for="fecha_control" class="col-lg-5 control-label">Fecha Control</label>
        <div class="col-lg-7">
          <input type="date" name="fechitas_control" id ="fecha_control" value="<?php echo $fechaControl;?>" <?php echo $lecturafechaControl; ?> class="form-control input-sm">
        </div>
      </div>
                               
      <div class="form-group">
          <label for="edad" class="col-lg-5 control-label">Edad corregida (EC) <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="La edad corregida se base en la edad qie el niño tendría si hubiera nacido en la fecha prevista de parto. <br/> El sistema calcula la EC del niño en base a la fecha de nacimiento, la edad gestiacional al momento de nacer y la fecha en que se realiza el control de seguimiento."></span></label>
        <div class="col-lg-3 input-group linea">
          <input type="input" min="0" step="1" id ="anio" name="anio"  value="<?= $anio;?>" readOnly  class="form-control input-sm" aria-describedby="basic-addon2">
           <span class="input-group-addon" id="basic-addon2">años</span>
          </div>

          <div class="col-lg-3 input-group linea">
            <input type="input" min="0" max="11" step="1" id ="meses" name="meses" value="<?= $meses;?>" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">meses</span>
          </div>
      </div>

      <div class="form-group">
        <label for="edad2" class="col-lg-5 control-label">Edad cronológica</label>
        <div class="col-lg-3 input-group linea">
          <input type="input" min="0" step="1" name="anio2" id ="anio2"   value="<?= $anio2;?>" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
           <span class="input-group-addon" id="basic-addon2">años</span>
          </div>

          <div class="col-lg-3 input-group linea">
            <input type="input" min="0" max="11" step="1" id ="meses2" name="meses2" value="<?= $meses2;?>" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">meses</span>
          </div>
      </div>
    </div>                   
    <div class="col-lg-5">
        <a class="btn btn-default" href="javascript:void(0)" 
		
		onclick="MM_openBrWindow('seguimiento/cronograma_ui.html','','scrollbars=yes,resizable=yes,width=790,height=440,top=0, left=0')"  
		role="button" target="_blank"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Ver Cronograma de Seguimiento</a>
    </div>
    </div>
    
    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="idControl" value="<?php echo $idControl ?>" class="form-control input-sm"  >
	<input type="hidden" name="idResponsable" value="<?php echo $_SESSION['id_responsable']; ?>" class="form-control input-sm"  >
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
     <?php
	 if ($idControl==''){
	 echo '<button type="submit" name ="control" class="btn btn-success">Guardar</button>';
	 }
	 ?>
    </div>
    </form>       
  </div>
</div>
<script type="text/javascript">

$('#fecha_control').change(function(){
			
			cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fecha_control').val(),'DATOS_CONTROL');			
			cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fecha_control').val(),'DATOS_CONTROL');			
		});

/*		
$(document).ready(function(){ 
	if($('#fecha_control').val()!=''){
		cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fecha_control').val(),'DATOS_CONTROL');			
        cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fecha_control').val(),'DATOS_CONTROL');
	}
	else {
		$('#fecha_control').change(function(){
			
			cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fecha_control').val(),'DATOS_CONTROL');			
			cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fecha_control').val(),'DATOS_CONTROL');			
		});
	}
	
});*/
</script>