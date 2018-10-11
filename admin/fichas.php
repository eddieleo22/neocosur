<?php 


error_reporting(0);

include 'ayuda.php';
include '../admin/capaDAO/ConexionDAO.php';

include '../admin/capaDAO/fichasDAO.php';
session_start();

if($_SESSION['token']==''){
	
	salir($_SESSION["token"]);
}

include '../admin/capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
/*$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);*/



extract($_POST);
//var_dump($_SESSION);
//echo "<br> <br> usuario --> ".$_SESSION["usuario"];
//$cone = new ConexionDAO();
$cone = ConexionDAO::get_instance();
include 'head.php'; 
$identificador;
$ap_paterno;
$ap_materno;
$num_ficha;
$peso_desde;
$peso_hasta;
$fDesde;
$fHasta;


$joinCentro =" inner join centro on us_id_centro=c_id_centro ";
$joinCentro=" inner join perfil_user on us_id_perfil=pf_id_perfil";
$joinPais=" inner join pais p on  p.id_Pais=c.c_id_pais ";
$filtro =" ";
$filtroPais= " ";
$filtroCentro=" ";
$filtroEstado = " ";
$estado;

$centro = $cone->test_input($centro);
//$centro = $filtro->process($centro);
$pais = $cone->test_input($pais);
//$pais =  $filtro->process($pais);
$estado = $cone->test_input($estado);
//$estado = $filtro->process($estado);
$ap_paterno = $cone->test_input($ap_paterno);
//$ap_paterno = $filtro->process($ap_paterno);
$ap_materno = $cone->test_input($ap_materno);
//$ap_materno = $filtro->process($ap_materno);
$identificador = $cone->test_input($identificador);
//$identificador = $filtro->process($identificador);
$fecha_hasta = $cone->test_input($fecha_hasta);
//$fecha_hasta = $filtro->process($fecha_hasta);
$fecha_desde = $cone->test_input($fecha_desde);
//$fecha_desde = $filtro->process($fecha_desde);
$num_ficha = $cone->test_input($num_ficha);
//$num_ficha = $filtro->process($num_ficha);
$peso_desde = $cone->test_input($peso_desde);
//$peso_desde = $filtro->process($peso_desde);
$peso_hasta = $cone->test_input($peso_hasta);
//$peso_hasta = $filtro->process($peso_hasta);



if(trim($_SESSION["perfil"]) =="Administrador" ||  trim($_SESSION["perfil"]) =="Supervisor"){
	;
	
	
	if($centro!='0' && $centro!=''){
		$filtroCentro= "   and  c.c_id_centro= $centro "; 
		$centro="";
	}
    if($pais!='0'  &&  $pais!=''){
		
		$filtroPais =" and p.id_Pais=  ".$pais ; 
		$paisSelect = $pais ; ;
		//$pais="";
	}
	
	if($estado!='0'  &&  $estado!=''){
		$filtroEstado =" and co.ID_CONDICION_INGRESO= $estado " ; 
	}
}
else {
	$pais= $_SESSION["pais"]!=''?  $_SESSION["pais"]:$pais;
	$centro= $_SESSION["id_centro"]!=''?  $_SESSION["id_centro"]:$centro;
	if($centro!='0' && $centro!=''){
		$filtroCentro.= "   and  c.c_id_centro= $centro "; 
	}
	if($pais!='0'  &&  $pais!=''){
		$filtroPais =" and p.id_Pais= $pais " ; 
	}
	if($estado!='0'  &&  $estado!=''){
		$filtroEstado =" and co.ID_CONDICION_INGRESO= $estado " ; 
	}
}


if($ap_paterno!=''){
	$filtro.= " and APELLIDO_PATERNO = '$ap_paterno' "; 
}
if($ap_materno!=''){
	$filtro.= " and APELLIDO_MATERNO = '$ap_materno' "; 
}

if($identificador!=''){
	$filtro.= " and i.ID_NEOCOSUR = $identificador "; 
}

if($fecha_hasta !='' && $fecha_desde!=''){
	$filtro .= " and  FECHA_NACIMIENTO between '$fecha_desde' and '$fecha_hasta' ";
}
else if( $fecha_desde!='' ){
		
	$filtro .= " and FECHA_NACIMIENTO = '$fecha_desde' ";
}
else if( $fecha_hasta!='' ){
		
	$filtro .= " and FECHA_NACIMIENTO = '$fecha_hasta' ";
}

if($num_ficha!=''){
	$filtro.= " and NUMERO_FICHA_MEDICA = $num_ficha "; 
}
if($peso_desde !='' && $peso_hasta!=''){
	$filtro .= " and  PESO_NACIMIENTO  between 	 $peso_desde and $peso_hasta";
}
else if( $peso_desde!='' ){
		
	$filtro .= " and PESO_NACIMIENTO = $peso_desde ";
}
else if( $peso_hasta!='' ){
		
	$filtro .= " and PESO_NACIMIENTO = $peso_hasta ";
}

//echo "idCENTRO --> ".$centro."<br> <br>";
$dao = new fichasDAO($cone);

$retorno = $dao->buscarFicha($filtroCentro,$filtroPais ,$filtro,$filtroEstado);

 
?>

<div class="container">
  <!-- Inicio del Contenido -->
    <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">

      	<div class="col-lg-10">
        	<h2>Mantenedor de Fichas</h2>
      	</div>
		<?php 

		if(trim($_SESSION["perfil"]) !="Administrador" &&  trim($_SESSION["perfil"]) !="Supervisor")
			{
		?>
      	<div class="col-lg-2">
			<div class="btn-group" role="group" aria-label="">
			  	<a class="btn btn-warning btn-sm" href="ficha_ingreso.php" role="button">
			  		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Nueva Ficha
			  	</a>
			</div>
		</div>
	<?php 	} ?>
    </div>
	<form id="frmBuscador" method="post">
    <div class="row panel panel-info">
    	<div class="col-lg-12">
    		<h4>Buscador</h4>  
    	</div>
		                          
	    
	    <div class="form-group col-lg-6">

	    	<label for="ap_paterno" class="col-lg-5 control-label">Apellido paterno</label>
	        <div class="col-lg-7">
	        	<input type="text" name="ap_paterno" class="form-control input-sm">
	        </div>

	        <label for="ap_materno" class="col-lg-5 control-label">Apellido materno</label>
	        <div class="col-lg-7">
	        	<input type="text" name="ap_materno" class="form-control input-sm">
	        </div>

	    </div>

	    <div class="form-group col-lg-6">

	    	<label for="identificador" class="col-lg-5 control-label">Identificador Neocosur</label>
	        <div class="col-lg-7">
	        	<input type="number" min="0" step="1" name="identificador" class="form-control input-sm">
	        </div>

	        <label for="num_ficha" class="col-lg-5 control-label">N° Ficha médica</label>
	        <div class="col-lg-7">
	        	<input type="number" min="0" step="1" name="num_ficha" class="form-control input-sm">
	        </div>

	    </div>

	    <div class="clearfix visible-lg-block"></div>

	    <div class="form-group col-lg-6">
			
			<label for="peso_desde" class="col-lg-5 control-label">Peso al nacer</label>
          	<div class="col-lg-3 input-group linea">
            	<input type="number" min="1" step="1" name="peso_desde" class="form-control input-sm" aria-describedby="basic-addon2">
            	<span class="input-group-addon" id="basic-addon2">desde</span>
          	</div>
          	<div class="col-lg-3 input-group linea">
            	<input type="number" min="1" step="1" name="peso_hasta" class="form-control input-sm" aria-describedby="basic-addon2">
            	<span class="input-group-addon" id="basic-addon2">hasta</span>
          	</div>

          	<label for="nacimiento_desde" class="col-lg-5 control-label">Fecha de nacimiento</label>
          	<div class="col-lg-3 input-group linea">
            	<input type="date" min="1" step="1" id="fecha_desde" name="fecha_desde" class="form-control input-sm">
            	<span class="input-group-addon" id="basic-addon2">desde</span>
          	</div>
			<label for="nacimiento_desde" class="col-lg-5 control-label"></label>
          	<div class="col-lg-3 input-group linea">
            	<input type="date" min="1" step="1" id="fecha_hasta" name="fecha_hasta" class="form-control input-sm">
            	<span class="input-group-addon" id="basic-addon2">hasta</span>
          	</div>

        </div>

        <div class="form-group col-lg-6">

	    	<label for="periodo" class="col-lg-5 control-label">Período</label>
	        <div class="col-lg-7">
	        	<select name="periodos" id="periodos" class="form-control input-sm">
	        		<option selected="selected">Seleccione</option>
					<option value="1">Año en curso</option>
					<option value="2">Últimos 2 años</option>
					<option value="5">Últimos 5 años</option>
					<option value="10">Últimos 10 años</option>
					<option value="0">Todos los años</option>
	        	</select>
	        </div>

	    </div>

	    <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-lg-6">

	    	<label for="pais" class="col-lg-5 control-label">País Centro</label>
	        <div class="col-lg-7">
	        	<select name="pais" class="form-control input-sm">
	        		<option value="">Seleccione</option>
					<?php 
					if($pais==''){
						cargarSelect("pais",$cone,"id_Pais","descripcion",$pais);
					}
					else {
						cargarSelectSinPermiso("pais",$cone,"id_Pais","descripcion",$pais);
					}
					
					?>
	        	</select>
	        </div>

	        <label for="centro" class="col-lg-5 control-label">Centro de origen </label>
	        <div class="col-lg-7">
	        	<select name="centro" class="form-control input-sm">
	        		<option value="">Seleccione</option>
					<?php 
					if($centro==''){
						cargarTodosCentros("centro",$cone,"c_id_centro","c_nombre",$centro);
					}
					else {
						cargarSelectSinPermiso("centro",$cone,"c_id_centro","c_nombre",$centro);
					}
					//cargarSelect("centro",$cone,"c_id_centro","c_nombre",$centro);?>
	        	</select>
	        </div>

	    </div>

	    <div class="form-group col-lg-6">

	    	<label for="estado" class="col-lg-5 control-label">Estado Ficha</label>
	        <div class="col-lg-7">
	        	<select name="estado" class="form-control input-sm">
	        		<option value="">Seleccione</option>
					<?php cargarSelect("condicion_ingreso",$cone,"ID_CONDICION_INGRESO","ESTADO_FICHA",$estado);?>
	        	</select>
	        </div>

	    </div>

	    <div class="form-group col-lg-offset-5">
	    	<button type="submit" class="btn btn-success">Buscar</button>
	    </div>

    </div>
</form>
    <div class="row ">
    	<h4>Listado Fichas</h4> 
			<table id="tbl_fichas" class="display order-column" cellspacing="0" width="100%">
		        <thead>
		            <tr style="text-align:center;">
		                <th class="col-lg-1">Identificador Neocosur</th>
		                <th class="col-lg-1">Nombre</th>
		                <th class="col-lg-1">País</th>
		                <th class="col-lg-1">Fecha nacimiento</th>
		                <th class="col-lg-1">Peso al nacer</th>
		                <th class="col-lg-1">Apgar 1</th>
		                <th class="col-lg-1">Apgar 5</th>
		                <th class="col-lg-1">N° Ficha médica</th>
		                <th class="col-lg-1">Fallece Sala</th>
		                <th class="col-lg-1">Estado</th>
		                <th class="col-lg-1">N° Controles</th>
		                <th class="col-lg-1">Agregar Control</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr style="text-align:center;">
		                <th>Identificador Neocosur</th>
		                <th>Nombre</th>
		                <th>País</th>
		                <th>Fecha nacimiento</th>
		                <th>Peso al nacer</th>
		                <th>Apgar 1</th>
		                <th>Apgar 5</th>
		                <th>N° Ficha médica</th>
		                <th>Fallece Sala</th>
		                <th>Estado</th>
		                <th>N° Controles</th>
		                <th>Agregar Control</th>
		            </tr>
		        </tfoot>
		        <tbody>
				<?php
				while($arrN = $retorno->fetch_array())
				{
					$contador=$dao->contarControles($arrN["ID_NEOCOSUR"]);
					?>
	
				<tr id="<?php echo $arrN["ID_NEOCOSUR"] ?>">
		                <td style="text-align: right;"><a href="ficha_ingreso.php?id_neocosur=<?php echo $arrN["ID_NEOCOSUR"] ?>"><?php echo $arrN["ID_NEOCOSUR"] ?></a> </td>
		                <td><?php echo $arrN["NOMBRES"];  ?> </td>
		                <td><?php echo utf8_encode($arrN["descripcion"]);  ?>
						<span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" aria-hidden="true"
						title="<?php echo $arrN["c_nombre"]; ?>" data-original-title="<?php echo $arrN["c_nombre"]; ?>."></span>
						
						</td>
		                <td style="text-align: center;"><?php echo $arrN["FECHA_NACIMIENTO"] ?></td>
		                <td style="text-align: right;"><?php echo $arrN["peso"] ?></td>
		                <td style="text-align: center;"><?php echo $arrN["APGAR_1"] ?></td>
		                <td style="text-align: center;"><?php echo $arrN["APGAR_1"] ?></td>
		                <td style="text-align: center;"><?php echo $arrN["NUMERO_FICHA_MEDICA"] ?></td>
		                <td style="text-align: center;"><?php echo $arrN["ID_DESTINO"]=='0' ? 'Si':'No'; ?></td>
		                <td><?php echo utf8_encode($arrN["ESTADO_FICHA"]); ?></td>
		                <td style="text-align: center;"><?php echo $contador["controles"]; ?></td>
						<td style="text-align: center;">
		                <?php if ($arrN["ESTADO_FICHA"]=='Caso Cerrado'  && $arrN['ID_DESTINO']!='212')
							{
						?>
												
						<a class="btn btn-success btn-xs" href="control.php?idNeocosur=<?php echo $arrN["ID_NEOCOSUR"] ?>&idControl=" role="button" >
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						</a> 
						
						<?php 
							}
							else 
							{ 
								echo "-";		
							}
						?>
						</td>
		            </tr>
				<?php 
				} 
				?> 
		        </tbody>
		    </table>
		</div>


</div>
<br><br>
<?php
  include 'footer.php';
?>     
<!-- Inicio de JavaScript -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>
<script src="../js/admin/ficha_ingreso.js"></script>
<script src="../js/data_table.min.js"></script>
<script src="../js/data_table_button.js"></script>
<script src="../js/data_table_bootstrap.js"></script>
<script src="../js/jjszip.min.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/data_table_print.js"></script>
<script src="../js/neocosur.js"></script>
<script>
  	$(document).ready(function() {

  		$('#tbl_fichas').DataTable({
	    	dom: 'Bfrtip',
	        buttons: [
	            'excelHtml5',
	            'print'
	        ]
		});

 
	   	$('#tbl_fichas tbody').on( 'click', 'tr .ficha', function () {
	       	var id = $(this).parent().prop('id');
	       	window.location.href = "ficha_ingreso.php?id=" + id;
	    } );


	    
	} );

  	function agregarControl(id){
	    window.location.href = "agregar_control.php?id" + id;
	};

</script>
<script>
$(document).ready(function(){
    $('#periodos').change(function () {
        var fecha_desde = new Date();
        var fecha_hasta = new Date();
        switch($(this).val()){
            case '1':
                //Año en curso
                $('#fecha_desde').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '2':
                //ultimos dos años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-2);
                $('#fecha_desde').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '5':
                //ultimos cinco años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-5);
                $('#fecha_desde').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '10':
                //ultimos diez años
                fecha_desde.setFullYear(fecha_desde.getFullYear()-10);
                $('#fecha_desde').val($.datepicker.formatDate('yy-01-01', fecha_desde));
                $('#fecha_hasta').val($.datepicker.formatDate('yy-mm-dd', fecha_hasta));
                break;
            case '0':
                //Todos
                $('#fecha_desde').val('');
                $('#fecha_hasta').val('');
                break;
        }
        
    });
});
</script>
</body>
</html>