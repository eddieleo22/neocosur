<?php 
session_start();
include 'head.php'; 
error_reporting(0);
include '../admin/capaDAO/ConexionDAO.php';
include 'capaDAO/centroDAO.php';
include 'ayuda.php';
//
if($_SESSION['id_responsable']==''){
	salir();
}
$cone = new ConexionDAO(); 
$dao= new centroDAO($cone);
$centro= $_SESSION["centro"];


if($_SESSION["perfil"]=='Colaborador'){
$fila = $dao->alertaColab($centro);
$var = " and c.c_id_centro =".$_SESSION["id_centro"];

}
else {
	//var_dump($dao);
$var = " ";
$fila=$dao->alertaAdmin(); 
}

include ("../../neocosur_contenido/rules.php");

 $funcionBusqueda = new rules();
 if(isset($_GET["tipo_archivo"]))$tipo = '30';
 
 if(! isset($tipo)) $tipo = "0";
 
 $funcionBusca = new rules();
 if ($_GET["id_tema"]==''){
    $_GET["id_tema"]= '30';
 }
 $tem=$funcionBusca->BuscaDetalleTema($conn, $_GET["id_tema"]);
 
 if(isset($_POST["BTAgregar"])){
   $tema= $_POST["tema"];
   $fecha = date("Y-m-d");
   $funcionAgrega = new rules();
   $resp = $funcionAgrega->AgregaComentarioTema($conn,$_POST["titulo"],$_POST["autor"],$_POST["correo"],$fecha, $_POST["comentario"], $tema);
 }else{
    $tema = $_GET["id_tema"];
 }
 
if((!isset($_POST["BTBuscar"]))&&(!isset($_GET["BTBuscar"]))){
//-------Listar por un tema especifico-------//
 $funcionBusca = new rules();
 $row=$funcionBusca->BuscaDetalleTema($conn, $tema);

 $autor_tema= $funcionBusqueda->BuscaAutortema($conn, $tema);
  $_SESSION["link_archivos"]= "archivos.php?id_tema=".$tema;
  if(isset($_SESSION["link_tem"])) $_SESSION["link_principal"]= $_SESSION["link_tem"];
  
  if (isset($_SESSION['id_usuario'])) {
      $usuario = $_SESSION["id_usuario"];
      $perfil =  $_SESSION["per_usuario"];
      $nombre =  $_SESSION["nom_usuario"];
	  
	  $sql = $funcionBusqueda->ListarArchivos($conn, $tema, $perfil, $usuario, $tipo);	  
      $sql_com = $funcionBusqueda->ComentariosTema($conn, $tema, $perfil, $usuario);
	  	    	 
  }else{ //usuario publico
     $sql = $funcionBusqueda->ListarArchivos($conn, $tema, "0", $usuario, $tipo);
     $sql_com = $funcionBusqueda->ComentariosTema($conn, $tema, "0", $usuario);
  }	 

 $comentarios=$row["comentarios"];
 $autor=$autor_tema;

	 
}else{
//-------------------------Listar segun Busqueda ------------------------------//
   if(isset($_POST["buscado"])) $buscado = $_POST["buscado"]; else $buscado = $_GET["buscado"]; //parametros principales
   if(isset($_POST["opcion"])) $opcion = $_POST["opcion"]; else $opcion = $_GET["opcion"]; //parametros principales

   $_SESSION["link_archivos"]= "archivos.php?buscado=".$buscado."&opcion=".$opcion."&BTBuscar=Buscar Archivos" ;
   $_SESSION["link_principal"]= "busqueda_archivos.php?buscado=".$buscado."&opcion=".$opcion;

 if (isset($_SESSION['id_usuario'])) {
   $usuario = $_SESSION["id_usuario"];
   $perfil =  $_SESSION["per_usuario"];
   $nombre =  $_SESSION["nom_usuario"];
   $sql = $funcionBusqueda->ListarArchivosBusq($conn, $buscado, $usuario, $opcion, $perfil, $tipo);
	  	    	 
  }else //usuario publico
       $sql = $funcionBusqueda->ListarArchivosBusq($conn, $buscado, "-1", $opcion, "0", $tipo);
  	 
}






 ?>

  	
	<div class="container">
		<!-- Inicio del Contenido -->
		<?php include 'header.php'; ?>
		 <div class="row">
	      	<div class="col-lg-12">
	        	<h2>Manuales Operativos</h2>
	      	</div>
		</div>


				
 <?php 
   if(mysqli_num_rows($sql) == 0){
   			  			
   }else
    while ($archivo = mysqli_fetch_array($sql)) { 
        $texto= $archivo["bajada"];
	  //$texto = substr($archivo["bajada"], 0, 65);
	  //$texto = $texto."...";	  
   ?>
      <div class="row noticia">
        <div class="col-lg-12">
          <h5 class="card-title"><?php echo $archivo["titulo"]; ?></h5>
          <p><?php echo $texto; ?></p>
          <button type="button" class="btn btn-info"><a href="../../neocosur_contenido/bajando.php?archivo=<?php echo $archivo["nom_archivo"];?>" target="_blank">Descargar</a></button> 
          <!--button type="button" class="btn btn-default">Descargar</button-->
        </div>
        
      </div>
      <br />
     <?php } ?>  



	</div>

<?php
  include 'footer.php';
?>
<!-- Inicio de JavaScript -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/npm.js"></script>

<script>
  
</script>

</body>
</html>