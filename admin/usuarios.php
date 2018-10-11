<?php 
session_start();
error_reporting(0); 
include 'ayuda.php';
include '../admin/capaDAO/ConexionDAO.php';
include '../admin/capaDAO/usuarioDAO.php';


include '../admin/capaEntidades/class.inputfilter.php';
$filtro = new InputFilter();
$_POST = $filtro->process($_POST);
$_GET = $filtro->process($_GET);

extract($_POST);
//var_dump($_SESSION);

if($_SESSION['token']==''){
	salir($_SESSION["token"]);
}
//var_dump($_POST);
$cone = new ConexionDAO();
$daoUser=new usuarioDAO($cone);
$pais;//=$pais==''? $_SESSION["pais"]:$pais;
$centro;//=$centro =='' ? $_SESSION["id_centro"]:$centro;
$cargo;//=$cargo==''? $_SESSION["perfil"]:$cargo;
//$cargo="Administrador";
$filtroPrincipal="";
$joinPerfil=" inner join perfil_user on us_id_perfil=pf_id_perfil";
$joinCentro =" inner join centro on us_id_centro=c_id_centro ";
//echo "que poasoooo ---> ".isset($_REQUEST["pais"]) ;
// ############## Filtro  de usuarios cuando viene con algun cargo especifico o mas filtro segun login #############################
// Falta agregar mas filtros

$pais = $cone->test_input($pais);
$centro = $cone->test_input($centro);
$centro = $cone->test_input($centro);
if($cargo=='Administrador' || $cargo=='Supervisor' ){
	$filtroPrincipal.=" 1";
}
else{
	if( $pais!="0" && $pais!=''){
			$filtroPrincipal .=" and c_id_pais ='".$pais."'";
		}
	else if(isset($_REQUEST["centro"]) && $centro!="0"){
			$filtroPrincipal .=" and c_id_centro ='".$centro."'";
		}
	else {
		$filtroPrincipal.=" 1";
	}
	//$filtroPrincipal.="1 and c_id_pais =$pais and  c_id_centro =$centro ; ";
	
}
$queryPrincipal="select * from usuario inner join centro on us_id_centro=c_id_centro 
					$joinPerfil 
				where  $filtroPrincipal 	";


include 'head.php';


// ############## Filtro  de usuarios cuando se presiona el boton Buscar #############################

$query;
$filtro="";
$filtroCentro="";
$nombre = $cone->test_input($nombre);
$ap_paterno = $cone->test_input($ap_paterno);
$ap_materno = $cone->test_input($ap_materno);
$usuario = $cone->test_input($usuario);
$estado = $cone->test_input($estado);
$cargo = $cone->test_input($cargo);
$pais = $cone->test_input($pais);
$cargo = $cone->test_input($cargo);
	if(isset($_REQUEST["nombre"]) && $nombre!=""){
		$filtro .=" and us_nombres ='".$nombre."'";
	}
	if(isset($_REQUEST["ap_paterno"]) && $ap_paterno!=""){
		$filtro .=" and 	us_ape_paterno ='".$ap_paterno."'";
	}
	if(isset($_REQUEST["ap_materno"]) && $ap_materno!=""){
		$filtro .=" and 	us_ape_materno ='".$ap_materno."'";
	}
	if(isset($_REQUEST["usuario"]) && $usuario!=""){
		$filtro .=" and us_usuario ='".$usuario."'";
	}
	if(isset($_REQUEST["estado"]) && $estado!=""){
		if($estado=="2"){
			$filtro .=" and us_activo in (0,1) ";
		}
		else{
			$filtro .=" and us_activo ='".$estado."'";
		}
	}
	if(isset($_REQUEST["cargo"]) && $cargo!="0"){
		$filtroCentro .=" and us_id_perfil ='".$cargo."'";
	}
	if( $pais!="0" && $pais!=''){
		$filtroCentro .=" and c_id_pais ='".$pais."'";
	}
	if(isset($_REQUEST["centro"]) && $centro!="0"){
		$filtroCentro .=" and c_id_centro ='".$centro."'";
	}
	
	if($filtro==""){
		$query="select  *  from usuario WHERE 1 ";
	}
	else if($filtroCentro!="" ){
		if($filtroCentro!="" && $filtro!="" ){
			$query="select  *  from usuario $joinCentro 
				$joinPerfil
			WHERE 1 ".$filtroCentro."  ".$filtro;
		}
		else{
			$query= "select *  from usuario $joinCentro 
					$joinPerfil
			WHERE 1 ".$filtroCentro;
		}
	}
	else{
			$query= "select  *  from usuario 
				$joinPerfil
			WHERE 1 ".$filtro;
	}
 ?>

<div class="container">
  <!-- Inicio del Contenido -->
    <?php include 'header.php'; ?>
    <!-- Inicio de Título -->
    <div class="row">

      <div class="col-lg-10">
        <h2>Mantenedor de Usuarios</h2>
      </div>

      <div class="col-lg-2">
			<div class="btn-group" role="group" aria-label="">
			  	<a class="btn btn-warning btn-sm" href="agregar_usuario.php" role="button">
			 		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Nuevo Usuario
			  	</a>
			</div>
		</div>

    </div>
    <div class="row panel panel-info">
	<form id="frmBuscador" method="post">
    	<div class="col-lg-12">
    		<h4>Buscador</h4>  
    	</div>
		                          
	    
	    <div class="form-group col-lg-6">

	    	<label for="nombre" class="col-lg-5 control-label">Nombre</label>
	        <div class="col-lg-7">
	        	<input type="text" name="nombre" class="form-control input-sm">
	        </div>

	    	<label for="ap_paterno" class="col-lg-5 control-label">Apellido paterno</label>
	        <div class="col-lg-7">
	        	<input type="text" name="ap_paterno" class="form-control input-sm">
	        </div>

	        <label for="ap_materno" class="col-lg-5 control-label">Apellido materno</label>
	        <div class="col-lg-7">
	        	<input type="text" name="ap_materno" class="form-control input-sm">
	        </div>

	        <label for="usuario" class="col-lg-5 control-label">Usuario</label>
	        <div class="col-lg-7">
	        	<input type="text" name="usuario" class="form-control input-sm">
	        </div>

	    </div>

	    <div class="form-group col-lg-6">

	    	<label for="pais" class="col-lg-5 control-label">País Centro</label>
	        <div class="col-lg-7">
	        	<select name="pais" class="form-control input-sm">
	        		<option value="0">Seleccione</option>
					<?php cargarSelect("pais",$cone,"id_Pais","descripcion",$pais);?>
	        	</select>
	        </div>

	        <label for="centro" class="col-lg-5 control-label">Centro de origen</label>
	        <div class="col-lg-7">
	        	<select name="centro" class="form-control input-sm">
	        		<option value="0">Seleccione</option>
					<?php  (cargarSelect("centro",$cone,"c_id_centro","c_nombre",$centro));?>
	        	</select>
	        </div>

	        <label for="cargo" class="col-lg-5 control-label">Cargo</label>
	        <div class="col-lg-7">
	        	<select name="cargo" class="form-control input-sm">
	        		<option value="0">Seleccione</option>
					<?php cargarSelect("perfil_user",$cone,"pf_id_perfil","pf_descripcion",$cargo);?>
	        	</select>
	        </div>

	        <label for="estado" class="col-lg-5 control-label">Estado</label>
	        <div class="col-lg-7">
	        	<select name="estado" class="form-control input-sm">
	        		<?php cargarSelect("estados",$cone,"id_estado","es_descripcion",$estado);?>
	        		<option value="2">Todos</option>
	        	</select>
	        </div>

	    </div>

	    <div class="clearfix visible-lg-block"></div>

	    <div class="form-group col-lg-offset-5">
	    	<button type="submit" name="buscar" class="btn btn-success">Buscar</button>
	    </div>
	</form>
    </div>

    <div class="row ">
    	<h4>Listado de Usuarios</h4> 
			<table id="tbl_usuarios" class="display" cellspacing="0" width="100%">
		        <thead>
		            <tr style="text-align:center;">
		                <th class="col-lg-1">Id</th>
		                <th class="col-lg-1">Usuario</th>
		                <th class="col-lg-1">Nombre</th>
		                <th class="col-lg-1">Apellido Paterno</th>
		                <th class="col-lg-1">Apellido Materno</th>
		                <th class="col-lg-1">Cargo</th>
		                <th class="col-lg-1">Estado</th>
		                <th class="col-lg-1">Acciones</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr style="text-align:center;">
		                <th class="col-lg-1">Id</th>
		                <th class="col-lg-1">Usuario</th>
		                <th class="col-lg-1">Nombre</th>
		                <th class="col-lg-1">Apellido Paterno</th>
		                <th class="col-lg-1">Apellido Materno</th>
		                <th class="col-lg-1">Cargo</th>
		                <th class="col-lg-1">Estado</th>
		                <th class="col-lg-1">Acciones</th>
		            </tr>
		        </tfoot>
		        <tbody>
				<?php
					if(isset($_POST['buscar'])){
						$arrPrincipal=$daoUser->filtroUsuario($query);
					}else{
						$arrPrincipal=$daoUser->filtroUsuario($queryPrincipal);
					}
				
					//$arrPrincipal=$daoUser->filtroUsuario($queryPrincipal);
					while($arr = $arrPrincipal->fetch_array())
					 {
					?>
						 
              		<tr id="<?php echo $arr["us_id_user"]; ?>">
		                <td class="ficha" style="text-align: center;"><?php echo $arr["us_id_user"]; ?></td>
		                <td class="ficha"><?php echo $arr["us_usuario"]; ?></td>
		                <td class="ficha"><?php echo $arr["us_nombres"]; ?></td>
		                <td class="ficha"><?php echo $arr["us_ape_paterno"]; ?></td>
		                <td class="ficha"><?php echo $arr["us_ape_materno"]; ?></td>
		                <td class="ficha"><?php echo $arr["pf_descripcion"]; ?></td>
		                <td class="ficha"><?php echo $arr["us_activo"]==1?"Activo":"Inactivo"; ?></td>
		                <td style="text-align: center;"><a class="btn btn-success btn-xs" href="#" role="button" ><span class="glyphicon glyphicon-pencil" onclick="editarUsuario(<?php echo $arr["us_id_user"]; ?>)" aria-hidden="true"></span></a> </td>
		            </tr>
				<?php
					 }
				?>
		           
		        </tbody>
		    </table>
		</div>


</div>

<br><br><br>
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
<script src="../js/jjszip.min.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/data_table_print.js"></script>
<script src="../js/neocosur.js"></script>
<script>
  	$(document).ready(function() {

  		$('#tbl_usuarios').DataTable({
	    	dom: 'Bfrtip',
	        buttons: [
	            'excelHtml5',
	            'print'
	        ]
		});

 
	   	$('#tbl_usuarios tbody').on( 'click', 'tr .ficha', function () {
	       	var id = $(this).parent().prop('id');
	       	window.location.href = "modifica_usuario.php?idUsuario=" + id;
	    } );


	    
	} );

  	function editarUsuario(id){
	    window.location.href = "modifica_usuario.php?idUsuario=" + id;
	};

</script>

</body>
</html>

