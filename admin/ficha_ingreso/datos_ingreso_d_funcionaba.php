<?php
//print_r($dao);
//$id=$_GET["id_neocosur"];
//session_start();

include 'capaDAO/IngresoDAO.php';
//echo "<br> <br>  AERRS".$id; 
//

//include 'capaDAO/ConexionDAO.php';
//session_destroy();
//$id=$_GET["id_neocosur"];
//echo "holaaa".$id;
$dao = new IngresoDAO($cone);
//print_r($dao);
//echo "<br> <br>  AERRS".$id;
//$conexion = new ConexionDAO(); 
$fila = $dao->buscarFichaId($id);
//print_r($fila);
$nombre =$fila['NOMBRES'];
$materno = $fila['APELLIDO_MATERNO'];
$paterno = $fila['APELLIDO_PATERNO'];
$fecha = $fila['FECHA_NACIMIENTO'];
$numero =$fila['NUMERO_FICHA_MEDICA'];
$rut =$fila['RUT_DNI'];
$edad =$fila ['EDAD_GESTACIONAL'];
$responsable = $fila['ID_RESPONSABLE_INGRESO_DATOS'];
//unset($dao);

?>
<form name="ingreso"  method="post" action="Negocio/IngresoBO.php">
<div class="ficha panel panel-default">
  <div class="panel-body">
    <h4><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Datos del Ingreso</h4>

    <div class="col-lg-6">
    
      <div class="form-group">
        <label for="rut_dni" class="col-lg-5 control-label">Rut / DNI</label>
        <div class="col-lg-7">
            <input type="text" name="rut_dni" value="<?php echo $rut;?>"class="form-control input-sm">
        </div>
      </div>
                              
      <div class="form-group">
        <label for="nombres" class="col-lg-5 control-label">Nombres</label>
        <div class="col-lg-7">
            <input type="text" name="nombres" value="<?php echo $nombre;?>" class="form-control input-sm">
        </div>
      </div>
                               
      <div class="form-group">
        <label for="paterno" class="col-lg-5 control-label">Apellido Paterno</label>
        <div class="col-lg-7">
            <input type="text" name="paterno" value="<?php echo $paterno;?>"class="form-control input-sm">
        </div>
      </div>
                               
      <div class="form-group">
        <label for="materno" class="col-lg-5 control-label">Apellido Materno</label>
        <div class="col-lg-7">
            <input type="text" name="materno"  value="<?php echo $materno;?>"class="form-control input-sm">
        </div>
      </div>
    </div>
                               
    <div class="col-lg-6">
      <div class="form-group">
        <label for="id" class="col-lg-7 control-label">Identificador Neocosur</label>
        <div class="col-lg-5">
            <input type="text" name="id" value="<?php echo $id;?>" class="form-control input-sm"  contenteditable="false" disabled>
        </div>
      </div>
                    
      <div class="form-group">
        <label for="num_ficha" class="col-lg-7 control-label">N° de ficha médica:</label>
        <div class="col-lg-5">
            <input type="number" min="0" name="num_ficha" value="<?php echo $numero;?>" class="form-control input-sm" >
        </div>
      </div>

      <div class="form-group">
        <label for="edad_gest" class="col-lg-7 control-label">Edad gest. FUR:</label>
        <div class="col-lg-5">
            <input type="number" min="0" name="edad_gest" value="<?php echo $edad;?>" class="form-control input-sm" >
        </div>
      </div>
                               
      <div class="form-group">
        <label for="fecha_nacimiento" class="col-lg-7 control-label">Fecha de Nacimiento</label>
        <div class="col-lg-5">
            <input type="date" name="fecha_nacimiento"  value="<?php echo $fecha;?>" class="form-control input-sm">
        </div>
      </div>                
    </div>

    <div class=" col-lg-offset-10 col-lg-2">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>         
    <input type="hidden" name="idOculto" id="idoculto" value="<?php echo $id; ?>"/>
  </div>
</div>
</form>

