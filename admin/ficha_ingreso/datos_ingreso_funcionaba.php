<?php
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
print_r($fila);
$nombre =$fila['NOMBRES'];
$materno = $fila['APELLIDO_MATERNO'];
$paterno = $fila['APELLIDO_PATERNO'];
$fecha = $fila['FECHA_NACIMIENTO'];
$numero =$fila['NUMERO_FICHA_MEDICA'];
$rut =$fila['RUT_DNI'];
$edad =$fila ['EDAD_GESTACIONAL'];
$responsable = $fila['ID_RESPONSABLE_INGRESO_DATOS'];
$peso =$fila['PESO_NACIMIENTO'];
$talla = $fila['TALLA_NACIMIENTO'];
$craneo = $fila['CIRC_CRANEO_NACIMIENTO'];
$apgar1 = $fila['APGAR_1'];
$apgar5 = $fila['APGAR_5'];
?>

<div class="ficha panel panel-default">
  <div class="panel-body">
      <form action="Negocio/IngresoBO.php" method="post">
      <h4> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Datos del Ingreso</h4>

      <div class="col-lg-12">
                                    
        <div class="form-group col-lg-6">
          <label for="nombres" class="col-lg-5 control-label">Nombres</label>
          <div class="col-lg-7">
              <input type="text" name="nombres"  value="<?php echo $nombre; ?>" class="form-control input-sm">
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label for="id" class="col-lg-5 control-label" >Identificador Neocosur 
            <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true" title="Código numerico que el sistema otorga a un paciente y permite identificarlo en la base de datos."></span>
          </label>
          
          <div class="col-lg-7">
            <input type="text" name="identificador" class="form-control input-sm" value="<?php echo $id; ?>" disabled="disabled">
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>
                                 
        <div class="form-group col-lg-6">
          <label for="paterno" class="col-lg-5 control-label">Apellido Paterno</label>
          <div class="col-lg-7">
            <input type="text" name="paterno" value="<?php echo $paterno; ?>"  class="form-control input-sm" required>
          </div>
        </div>
   
        <div class="form-group col-lg-6">
          <label for="num_ficha" class="col-lg-5 control-label">N° de ficha médica:</label>
          <div class="col-lg-7"> 
              
              <input type="text" name="num_ficha" value="<?php echo $numero; ?>" class="form-control input-sm"  >
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>
                                 
        <div class="form-group col-lg-6">
          <label for="materno" class="col-lg-5 control-label">Apellido Materno</label>
          <div class="col-lg-7">
            <input type="text" name="materno" value="<?php echo $materno; ?>"  class="form-control input-sm" required>
          </div>
        </div>
      

        <div class="form-group col-lg-6">
          <label for="fecha_nacimiento" class="col-lg-5 control-label">Fecha de Nacimiento</label>
          <div class="col-lg-7">
            <input type="date" name="fecha_nacimiento" value="<?php echo $fecha; ?>" class="form-control input-sm" required>
          </div>
        </div>  

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="genero" class="col-lg-5 control-label">Género</label>
          <div class="col-lg-7">
            <select name="genero" class="form-control input-sm">
              <option value="0">Selecciones</option>
              <option value="1" selected="selected">Femenino</option>
             
            </select> 
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label for="presentacion" class="col-lg-5 control-label">Presentación</label>
          <div class="col-lg-7">
            <select name="presentacion" class="form-control input-sm">
              <option value="0">Seleccione</option>
              <option value="1" selected="selected">Cefálica</option>
            </select> 
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="tipo_parto" class="col-lg-5 control-label">Tipo de parto</label>
          <div class="col-lg-7">
            <select name="tipoParto" class="form-control input-sm">
              <option value="0">Seleccione</option>
              <option value="1">Espontánea</option>
            </select> 
          </div>
        </div> 


        <div class="form-group col-lg-6">
          <label for="peso" class="col-lg-5 control-label">Peso nacimiento</label>            
          <div class="col-lg-6 input-group linea">
            <input type="number" min="400" max="1500" step="1" value="<?php echo $peso; ?>"  name="peso" class="form-control input-sm" aria-describedby="basic-addon2" required>
            <span class="input-group-addon" id="basic-addon2">g.</span>
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="talla" class="col-lg-5 control-label">Talla</label>            
          <div class="col-lg-6 input-group linea">
            <input type="number" min="0" step="1" name="talla" value="<?php echo $talla; ?>"  class="form-control input-sm" aria-describedby="basic-addon2" required>
            <span class="input-group-addon" id="basic-addon2">cm.</span>
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label for="craneo" class="col-lg-5 control-label">Cir. cráneo</label>            
          <div class="col-lg-6 input-group linea">
            <input type="number" min="0" step="1" name="craneo" value="<?php echo $craneo; ?>"  class="form-control input-sm" aria-describedby="basic-addon2" required>
            <span class="input-group-addon" id="basic-addon2">cm.</span>
          </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">
          <label for="apgar1" class="col-lg-5 control-label">Apgar 1</label>
          <div class="col-lg-7">
            <input type="number" min="0" max="10" step="1" name="apgar1"  value="<?php echo $apgar1; ?>"  class="form-control input-sm" >
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label for="apgar5" class="col-lg-5 control-label">Apgar 5</label>
          <div class="col-lg-7">
            <input type="number" min="0" max="10" step="1" name="apgar5" value="<?php echo $apgar5; ?>"  class="form-control input-sm" >
          </div>
        </div>


      </div>    

      <div class=" col-lg-offset-10 col-lg-2">
      <input type="hidden" name="idOculto" id="idoculto" value="<?php echo $id ?>"/>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>       
  </div>
</div>
