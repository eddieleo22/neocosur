<?php 
session_start();
//session_destroy();
//error_reporting(0);

include 'capaDAO/IngresoDAO.php';



extract($_POST);

$dao = new IngresoDAO($cone);


$daoControl =  new ingresoControlDAO($cone);

$fila = $dao->buscarFichaSegId($idNeocosur);

$edadCrono = $fila['EDAD_CRONOLOGICA'];



//print_r($fila);

$nombres =$fila['NOMBRES'];
$materno = $fila['APELLIDO_MATERNO'];
$paterno = $fila['APELLIDO_PATERNO'];
$fechaNacimiento = $fila['FECHA_NACIMIENTO'];
$numero =$fila['NUMERO_FICHA_MEDICA'];
//$rut =$fila['RUT_DNI'];
$edad =$fila ['EDAD_GESTACIONAL'];
$responsable = $fila['ID_RESPONSABLE_INGRESO_DATOS'];
$peso =$fila['PESO_NACIMIENTO'];
$talla = $fila['TALLA_NACIMIENTO'];
$craneo = $fila['CIRC_CRANEO_NACIMIENTO'];
$apgar1 = $fila['APGAR_1'];
$apgar5 = $fila['APGAR_5'];
$edadGest=$fila['EDAD_GESTACIONAL'];
if($fila['ID_GENERO']=='1' ){
	$genero = 'Masculino';
}
else if($fila['ID_GENERO']=='0' ){
	$genero = 'Femenino';
}
else if($fila['ID_GENERO']=='3' ){
	$genero = 'Ambiguo';
}
else {
	$genero = 'S/I';
	
}
$_SESSION["sexo"] = $genero;
$centro = $fila['c_nombre'];
$tipoCentro = $fila['c_tipo'] !='' && $fila['c_tipo']==1 ? 'Privado':'Público';
$edadCrono = $fila['EDAD_CRONOLOGICA'];
$multiple = $fila['MULTIPLE'] =='1' ? 'Si' : 'No';
$fechaAlta=$fila['FECCHA_ALTA_FALLECE'];
//$type;


$filaControl  =$idControl!='' ? $daoControl->buscarFichaIdSeg($idNeocosur,$idControl):null;

$fIngreso =$filaControl['FECHA_INGRESO_PROGRAMA'];

if( $fIngreso!=''){
	
	$lectura=" readOnly";
		
}


//$_SESSION["perfil"]="Administrador";

if($_SESSION["perfil"] =='Administrador' || $_SESSION["perfil"] =='Supervisor' ){
	
			$type='type="date" ';
		

		
}
else 
{
		if($filaControl['FECHA_INGRESO_PROGRAMA']==''){
			$type='type="date"  ';
		}
		else {
			$type='type="text"  readonly ';
		}
}



?>

<div class="ficha panel panel-default">
  <div class="panel-body">
  <form action="Negocio/controlingresoBO.php" method="post" name="ingresoControlForm" >
  <!-- Nacimiento--> <input name="txt_fec_nacimiento"  id="txt_fec_nacimiento"  type="hidden"  value="<?=$fechaNacimiento; ?>"/>
  <!-- Alta--><input name="txt_fec_crono"  id="txt_fec_crono"  type="hidden" value="<?=$fechaAlta; ?>"/>
  <!-- 40 Sem--><input name="edadCrono"  id="txt_fec_40_EG"  type="hidden" value="<?php echo $edadCrono; ?>"/>
   <input name="edadCrono"  id="edadCrono"  type="hidden" value="<?=$edadCrono; ?>"/>
		<input name="fechaCombo"  id="fechaCombo"  type="hidden" value="<?=$fechaCombo; ?>"/>
    <h4><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Datos del Ingreso</h4>
    <div class="col-lg-6">
                              
      <div class="form-group">
        <label for="nombres" class="col-lg-5 control-label">Nombres</label>
        <div class="col-lg-7">
          <input type="text" name="nombres"  value="<?php echo $nombres; ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>
                               
      <div class="form-group">
        <label for="paterno" class="col-lg-5 control-label">Apellido Paterno</label>
        <div class="col-lg-7">
          <input type="text" name="paterno" value="<?php echo $paterno; ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>
                               
      <div class="form-group">
        <label for="materno" class="col-lg-5 control-label">Apellido Materno</label>
        <div class="col-lg-7">
          <input type="text" name="materno" value="<?php echo $materno; ?>"  class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="centro" class="col-lg-5 control-label">Centro de Origen</label>
        <div class="col-lg-7">
          <input type="text" name="centro"  value="<?php echo utf8_encode($centro); ?>" class="form-control input-sm" contenteditable="false" disabled> 
        </div>
      </div>

      <div class="form-group">
        <label for="servicio" class="col-lg-5 control-label">Servicio</label>
        <div class="col-lg-7">
          <input type="text" name="servicio" class="form-control input-sm" value="<?php echo $tipoCentro;;//$filaControl['FECHA_INGRESO_PROGRAMA'];; ?>"  contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="fecha_ingreso" class="col-lg-5 control-label">Fecha Ingreso Programas</label>
        <div class="col-lg-7">
		<input  type ="date" name="ingreso_control" id="ingreso_control" class="form-control input-sm" value="<?php echo $fIngreso; ?>"   required >
         
        </div>
      </div>

    </div>
                               
    <div class="col-lg-6">
      <div class="form-group">
        <label for="id" class="col-lg-7 control-label">Identificador Neocosur</label>
        <div class="col-lg-5">
          <input type="text" name="id" class="form-control input-sm"  value="<?php echo $idNeocosur; ?>" contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="edad_gest" class="col-lg-7 control-label">Edad gest. FUR:</label>
        <div class="col-lg-5">
          <input type="number" min="0" name="edad_gest" value="<?php echo $edad; ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>
                               
      <div class="form-group">
        <label for="fecha_nacimiento" class="col-lg-7 control-label">Fecha de Nacimiento</label>
        <div class="col-lg-5">
          <input type="date" name="fech_nacimiento" value="<?php echo $fechaNacimiento; ?>"  class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="genero" class="col-lg-7 control-label">Género</label>
        <div class="col-lg-5">
          <input type="text" name="genero" value="<?php echo $genero; ?>"  class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="40_sem" class="col-lg-7 control-label">Fecha 40 sem. EG</label>
        <div class="col-lg-5">
          <input type="date" name="40_sem" value="<?php echo $edadCrono; ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="multiple" class="col-lg-7 control-label">Múltiple</label>
        <div class="col-lg-5">
          <input type="text" name="multiple" value="<?php echo $multiple ?>" class="form-control input-sm" contenteditable="false" disabled>
        </div>
      </div>
    </div> 	
	<input type="hidden" name="fechita_control" value  = "<?php  echo($fechaActual); ?>" id ="fechita_control"  >
	<input type="hidden" min="0" step="1" id ="anio" name="anio"  value="" readOnly  class="form-control input-sm" aria-describedby="basic-addon2">
	<input type="hidden" min="0" max="11" step="1" id ="meses" name="meses" value="" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
	<input type="hidden" min="0" step="1" name="anio2" id ="anio2"   value="" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
	<input type="hidden" min="0" max="11" step="1" id ="meses2" name="meses2" value="" readOnly class="form-control input-sm" aria-describedby="basic-addon2">
    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur ?>" class="form-control input-sm"  >
	<input type="hidden" name="message" id="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="messageBD" id="messageBD" value="" class="form-control input-sm"  >
	<input type="hidden" name="idControl" id="idControl" value="<?php echo $idControl ?>" class="form-control input-sm"  >
	<input type="hidden" name="idResponsable" value="<?php echo $_SESSION['id_responsable']; ?>" class="form-control input-sm"  >
	
    <?php  
	/*if ($idControl==''){
		echo '<button type="submit" name="ingresoControl" id="ingresoControl" value="" class="btn btn-success">Iniciar Control</button>';
	}*/
	
	?>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
	<button type="submit" name="ingresoControl" id="ingresoControl" value="" class="btn btn-success">Iniciar Control</button>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
/*$('#fecha_control').change(function(){
			
			cal_fecha($('#txt_fec_crono').val(), 'anio','meses',$('#fecha_control').val(),'DATOS_CONTROL');			
			cal_fecha($('#txt_fec_nacimiento').val(), 'anio2','meses2',$('#fecha_control').val(),'DATOS_CONTROL');			
		});*/

		

</script>
