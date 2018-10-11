<?php
include 'capaDAO/antropometriaDAO.php';
//include '../ayuda.php';

//echo $id; 
$dao = new antropometriaDAO($cone);
$p = $dao->buscarId($id);
//var_dump($p);
$CIRC_CRANEO_28_DIAS = $p['CIRC_CRANEO_28_DIAS'];
$CIRC_CRANEO_36_SEM = $p['CIRC_CRANEO_36_SEM'];
$CIRC_CRANEO_7_DIAS = $p['CIRC_CRANEO_7_DIAS'];
$CIRC_CRANEO_ALTA_DIAS = $p['CIRC_CRANEO_ALTA_DIAS'];
$EDAD_ALTA_DIAS = $p['EDAD_ALTA_DIAS'];
$ID_NEOCOSUR=$idOculto;
$PESO_28_DIAS = $p['PESO_28_DIAS'];
$PESO_36_SEM = $p['PESO_36_SEM'];
$PESO_7_DIAS = $p['PESO_7_DIAS'];
$PESO_ALTA_DIAS = $p['PESO_ALTA_DIAS'];
$TALLA_28_DIAS = $p['TALLA_28_DIAS'];
$TALLA_36_SEM = $p['TALLA_36_SEM'];
$TALLA_7_DIAS = $p['TALLA_7_DIAS'];
$TALLA_ALTA_DIAS = $p['TALLA_ALTA_DIAS'];
?>
<div class="ficha panel panel-default" id="antropometria">
  	<div class="panel-body">
	  	<form name="antropometria"  method="post" action="Negocio/AntropometriaBO.php">

	  		<button class="btn btn-success active subtitulo" type="button" ><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span> Antropometría <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-html="true" aria-hidden="true" title="Los datos del nacimiento corresponde a los indicados en los antecedentes del parto.<br>Peso: Indicar pesos en gramos sin separador de miles.<br>Talla y Cir. Cráneo: Indicar medición en centímetros con no más de un decimal."></span></button>

	    	<div class="col-lg-12">
		    	<table class="col-lg-12">
		    		<thead>
		    			<tr>
		    				<td class="col-lg-3">Edad</td>
		    				<td class="col-lg-3">Peso</td>
		    				<td class="col-lg-3">Talla</td>
		    				<td class="col-lg-3">Cir. Cráneo</td>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<tr>
		    				<td><label for="alta_antropometria" class="control-label radio-inline" >7 días</label></td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="400" max="1500" step="0.1" name="pesos_7" value="<?php echo $PESO_7_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">g.</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="20" max="50" step="0.1" name="talla_7" value="<?php echo $TALLA_7_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="17" max="40" step="0.1" name="craneo_7" value="<?php echo $CIRC_CRANEO_7_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td><label for="alta_antropometria" class="control-label radio-inline" >28 días</label></td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="500" max="2400" step="0.1" name="pesos_28" value="<?php echo $PESO_28_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">g.</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="20" max="50" step="0.1" name="talla_28" value="<?php echo $TALLA_28_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="18" max="55" step="0.1" name="craneo_28" value="<?php echo $CIRC_CRANEO_28_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td><label for="alta_antropometria" class="control-label radio-inline" >36 semanas</label></td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="700" max="3800" step="0.1" name="pesos_36" value="<?php echo $PESO_36_SEM ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">g.</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="20" max="60" step="0.1" name="talla_36" value="<?php echo $TALLA_36_SEM ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="18" max="55" step="0.1" name="craneo_36" value="<?php echo $CIRC_CRANEO_36_SEM ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<label for="alta_antropometria" class="control-label radio-inline col-lg-2" >Alta</label>
		    					<div class="input-group linea col-lg-5">
                                                            <input type="number" min="1" max="999" step="0.1" name="alta_dias" value="<?php echo $EDAD_ALTA_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">días</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                     <input type="number" min="500" step="0.1" name="alta_peso" value="<?php echo $PESO_ALTA_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">g.</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="20" max="60" step="0.1" name="alta_talla" value="<?php echo $TALLA_ALTA_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    				<td>
		    					<div class="input-group linea col-lg-6">
                                                            <input type="number" min="17" max="55" step="0.1" name="alta_craneo" value="<?php echo $CIRC_CRANEO_ALTA_DIAS ?>" class="form-control input-sm" aria-describedby="basic-addon2">
		            				<span class="input-group-addon" id="basic-addon2">cm</span>
		          				</div>
		    				</td>
		    			</tr>
		    		</tbody>
		    	</table>

	   		</div>



	   		<div class=" col-lg-offset-10 col-lg-2">
                        <!--input type="hidden" name="idOculto" id="idOculto" value=""-->
						<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
	          	<button type="submit" class="btn btn-success" name="idOculto" id="idOculto"  value="<?php echo $id; ?>" <?php ocultarBoton($estado,$perfil);?>>Guardar</button>
	        </div> 

	    </form>
	</div>
</div>