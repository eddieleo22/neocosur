<?php	
session_start();

$inactivo=900;
	if(isset($_SESSION['tiempo'])){
			$vida_session=time()- $_SESSION['tiempo'];
				if($vida_session > $inactivo){
					
					header ("Location: exit.php?token=".$_SESSION["token"]."");
				}
		
	}
	$_SESSION['tiempo']=time();
	

      //$sql_pres = $funcionBusqueda->ListarArchivos($conn, $tema, "0", $usuario, "32");
 
?>
<!-- Inicio de Header -->
<div id="header" class="row">
  <div id="logo" class="col-lg-3"><img src="../img/neocosur.jpg" width="224" height="72"></div>
  <div id="banderas" class="col-lg-3 pull-right"><img src="../img/banderas.jpg" height="72"></div>
  <div class="col-lg-9"></div>
        
  <!-- Inicio de Menu -->
  <div id="menu_privado" class="row">
    <div class="col-lg-12">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
		
				if(trim($_SESSION["perfil"]) =="Estadistico"){
					echo "<ul class='nav navbar-nav'> 
								 <li class='dropdown'>
			   
			  
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Gestión de Fichas<span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  
                  <li><a href='excel.php'>Datos en Excel</a></li>
                </ul>
				</li>
				<li><a href='exit.php'> Salir</a></li>
						</ul>
			
						";
				}
				else {
			?>
            <ul class="nav navbar-nav">
			<li><a href="inicio.php">    inicio</a></li>
              <li class="dropdown">
			   
			  
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Fichas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                 
                  <?php
					session_start();
					if(trim($_SESSION["perfil"]) =="Administrador"){
				  ?>
				  <li><a href="centros.php">Mantenedor de Centros</a></li>
                  <li><a href="usuarios.php">Mantenedor de Usuarios</a></li>
                  
				  <?php
					}
				  ?>
				  <li><a href="fichas.php">Mantenedor de Fichas</a></li>
                  <li><a href="excel.php">Datos en Excel</a></li>
                </ul>
              </li>
              <li>
					<a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="caret"></span></a>
				 <ul class="dropdown-menu">
				  <li><a href="mortalidad.php">Mortalidad</a></li>
                  <li><a href="resumen.php">Resumen por Condición</a></li>
                  <li><a href="morbilidad.php">Morbilidad</a></li>
				</ul>
			  
			  
			  </li>
			  
			  
              <li><a href="manuales.php">Manuales Operativos</a></li>
              <!--li><a href="#">Foro Neocosur</a></li-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Presentaciones<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="presentacion.php?anno_reg=2014">Presentaciones B. Aires 2014</a></li>
                  <li><a href="presentacion.php?anno_reg=2015">Presentaciones B. Aires 2015</a></li>
                  <li><a href="presentacion.php?anno_reg=2013">Anteriores</a></li>
                </ul>
              </li>
              <li><a href="../../neocosur_contenido/intranet/galeria.php">Galería Fotos</a></li> 
             <?php
			 // ||  trim($_SESSION["perfil"]) =="Supervisor"
					session_start();
					if(trim($_SESSION["perfil"]) =="Administrador" ){
				  ?>
              <li><a href="../../neocosur_contenido/sesion.php">Mantenedor de Contenidos</a></li> 
           <?php 
				}
			?>
              
			  <li><a href="exit.php?token=<?php echo $_SESSION['token']; ?>">    Salir</a></li>
            </ul>
			<?php 
				}
			?>
          </div>
        </div>
      </nav>            
    </div>
  </div>
  <!-- Fin de Menu -->         
</div>
<!-- Fin de Header -->