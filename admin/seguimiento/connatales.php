<?php
session_start();
error_reporting(0);
include 'capaDAO/antecedentes_connatalesDAO.php';

if($_SESSION["sexo"]=='Masculino'){
$doc="niño.pdf";
}
else {
	$doc="niña.pdf";
}

$dao = new antecedentes_connatalesDAO($cone);
$fila = $dao->buscarId($idNeocosur);

$existe =  $dao->existeConnatales($idNeocosur);

$paridad=$fila['ID_PARIDAD'];
$nutricional=$fila['ID_CALIFICACION_ESTADO_NUTRICIONAL'];
$malformacion=$fila['MALFORMACIONES_CONGENITAS'];
$central=$fila['MALF_CONGENITAS_DEFECTOS_SISTEMA_NERVIOSO'];
$cardi=$fila['MALF_CONGENITAS_DEFECTOS_CARDIACOS'];
$gastro=$fila['MALF_CONGENITAS_DEFECTOS_GASTROINTESTINALES'];
$geni=$fila['MALF_CONGENITAS_DEFECTOS_GENITOURINARIOS'];
$cromo=$fila['MALF_CONGENTITAS_ANOMALIAS_CROMOSOMICAS'];
$otros_conna=$fila['MALF_CONGENITAS_OTROS_DEFECTOS'];
$cual_otro_conna=$fila['MALF_CONGENITAS_OTRO_CUAL'];
$obs_malformaciones=$fila['OBSERVACIONES'];

if($existe["cantidad"]>0){
	$disable = " disabled";
}
?>

<div class="ficha panel panel-default">
  <div class="panel-body">
    <form name="connatales"  method="post" action="Negocio/connatalesBO.php">
      <button class="btn btn-success active subtitulo" type="button" id="sec_connatales"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Antecedentes Connatales</button>

      <div class="row">

    <div class="col-lg-6">

      <div class="form-group">
        <label for="paridad" class="col-lg-6 control-label">Paridad</label>
        <div class="col-lg-6">
		
          <select name="paridad" class="form-control input-sm"  <?php  echo $disable;  ?> >
			<option value="">Seleccione</option>
            <?php   cargarSelect("paridad_control",$cone,"IDE_PAR_CONT","DESC_PAR",$paridad);?>
          </select> 
        </div>
      </div>
                              
      <div class="form-group">
        <label for="nutricional" class="col-lg-6 control-label">Calificación estado nutricional</label>
        <div class="col-lg-6">
          <select name="nutricional" class="form-control input-sm" <?php  echo $disable;  ?> >
			<option value="">Seleccione</option>
            <?php cargarSelect("nutricional_control",$cone,"ID_NUTRI","DESC_NUTRI",$nutricional);?>
          </select> 
        </div>
      </div>

      <div class="col-lg-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th colspan="2">Visualizar curvas</th>
            </tr> 
          </thead>
          <tbody> 
            <!--tr> 
                  <th>Alarcón - Pittaluga</th> 
                  <td><a href="docs/Alarcon_Pittaluga.pdf" target="_blank"> Percentiles de Peso, Talla, Perímetro Craneo o Índice poderal según EG </a></td> 
            </tr--> 
            <tr>
                  <th>T. Fenton</th> 
                  <td><a href="docs/fenton_<?=$doc;?>" target="_blank"> Fetal Infant Growth Chart for Preterm Infants </a></td> 
				  
            </tr>
			
          </tbody>
        </table>
		<table class="table table-bordered">
          <thead>
            <tr>
              <th colspan="2">Curva Intergrowth</th>
            </tr> 
          </thead>
          <tbody> 
            <!--tr> 
                  <th>Alarcón - Pittaluga</th> 
                  <td><a href="docs/Alarcon_Pittaluga.pdf" target="_blank"> Percentiles de Peso, Talla, Perímetro Craneo o Índice poderal según EG </a></td> 
            </tr--> 
            <tr>
                  <th>Peso</th> 
                  <td><a href="docs/curva_intergrowth/curva_peso_<?=$doc;?>" target="_blank"> Fetal Infant Growth Chart for Preterm Infants </a></td> 
				  
            </tr>
			<tr>
                  <th> Longitud</th> 
                  <td><a href="docs/curva_intergrowth/curva_longitud_<?=$doc;?>"  target="_blank"> Fetal Infant Growth Chart for Preterm Infants </a></td> 
				  
            </tr>
			<tr>
                  <th>Circunferencia craneana</th> 
                  <td><a href="docs/curva_intergrowth/curva_craneo_<?=$doc;?>" target="_blank"> Fetal Infant Growth Chart for Preterm Infants </a></td> 
				  
            </tr> 
          </tbody>
        </table>
      </div>

    </div>
                               
    <div class="col-lg-6">
      <div class="form-group col-lg-7">
          <label for="malformacion" class="col-lg-12 control-label">Malformación congenita</label>
          <label for="malformacion" class="control-label radio-inline col-lg-offset-2 col-lg-2">
            <input type="radio" name="malformacion" value="1" id="malformacion_si" <?php si($malformacion); ?>   <?php  echo $disable;  ?> > Sí
          </label>
          <label for="malformacion" class="control-label radio-inline col-lg-2" >
            <input type="radio" name="malformacion"  value="0" id="malformacion_no" <?php no($malformacion); ?> <?php  echo $disable;  ?>  > No
          </label>
		  <input type="radio" name="malformacion" value="null"  style="display:none" <?php check($malformacion); ?> <?php  echo $disable;  ?>  >
        </div>

        <div class="form-group sub-form col-lg-11 col-lg-offset-1 malformaciones">
          
          <div class="checkbox">
            <label for="" class="control-label txt_izq col-lg-12">
              <input name="central" type="checkbox" value=""  <?php si($central); ?>  <?php  echo $disable;  ?>  <?php  echo $disable;  ?>  >
              Defectos del Sistema Nervioso Central
            </label>

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="cardi" type="checkbox" value=""  <?php si($cardi); ?>  <?php  echo $disable;  ?> >
              Defectos cardíacos
            </label>

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="gastro" type="checkbox" value="" <?php si($gastro); ?>  <?php  echo $disable;  ?> >
              Defectos gastrointestinales
            </label>

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="geni" type="checkbox" value="" <?php si($geni); ?> <?php  echo $disable;  ?> >
              Defectos genitourinarios
            </label>

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="cromo" type="checkbox" value=""  <?php si($cromo); ?>  <?php  echo $disable;  ?> >
              Anomalías cromosómicas
            </label>

            <label for="" class="control-label txt_izq col-lg-12">
              <input name="otros_conna" id="otros_conna" type="checkbox" value="" <?php si($otros_conna); ?>  <?php  echo $disable;  ?> >
              Otros defectos 
            </label> 
				<div id="cual_otro_connas"  class="sub-form">
					<label for="cual_otro_conna" class="col-lg-3 txt_izq control-label">Si es otro, cuál?</label>
					<div class="col-lg-9">
						<input type="text" name="cual_otro_conna" value="<?=  $cual_otro_conna; ?>" class="form-control input-sm"  <?php  echo $disable;  ?>  >
					</div>
				</div>
          </div>

          <label for="obs_malformaciones" class="col-lg-1 control-label">
            Observaciones
          </label>
          <div>
              <textarea name="obs_malformaciones" rows="5" class="col-lg-12"  <?php  echo $disable;  ?>  ><?=  $obs_malformaciones; ?>  </textarea>
          </div>
        </div>
    </div>
      </div>  

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idNeocosur" value="<?php echo $idNeocosur; ?>" class="form-control input-sm"  >
	<input type="hidden" name="idOculto" value="<?=  $idControl; ?>" class="form-control input-sm"  >
	<input type="hidden" name="message" value="<?php echo $message ?>" class="form-control input-sm"  >
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>   
  </form>      
  </div>
</div>