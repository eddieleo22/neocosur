<!-- Inicio de Header --><?php  error_reporting(0); ?>



  <div class="container">
    <div class="row">
      <div id="logo" class="col-8 float-left">
        <img src="../img/neocosur.jpg" width="224" height="72">
        <a href="index.php?sitio=es" ><img src="../img/banderas/espanol.png" width="35" height="22" alt="idioma español" border="0" /></a> <a href="index.php?sitio=en" > <img src="../img/banderas/ingles.png" width="35" height="22" alt="idioma español" border="0" /></a></div>
      <div id="banderas" class="col-4 float-right">
        <div class="row">
          <div class="col-2"><img src="../img/banderas/argentina.png" width="30px"></div>
          <div class="col-2"><img src="../img/banderas/uruguay.png" width="30px"></div> 
          <div class="col-2"><img src="../img/banderas/peru.png" width="30px"></div>
          <div class="col-2"><img src="../img/banderas/paraguay.png" width="30px"></div>
          <div class="col-2"><img src="../img/banderas/chile.png" width="30px"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="menu_publico">

    <div class="container">
      <div class="row" >
        <!-- Inicio del Menu -->
        <ul class="nav">
        <?php 
			  session_start();
			  if ($_GET['sitio']){
				//  echo "entro acá---------------";
			  $_SESSION['sitio'] = $_GET['sitio'];
			  }
			  			// print_r($_SESSION); 
		if ($_SESSION['sitio']=='en'){?>
          <li class="nav-item">          
            <a class="nav-link" href="index.php" id="btn_inicio">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="neocosur.php">Background</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="estructura.php">Organization</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="integrantes.php">Members</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="score.php">Score Neocosur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="revistas.php">Journal</a>
          </li>
          <li>
            <a class="nav-link" href="publicaciones.php">Publications</a>
          </li>
          <?php } else{
			   ?>
           <li class="nav-item">         
            <a class="nav-link" href="index.php" id="btn_inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="neocosur.php">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="estructura.php">Estructura</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="integrantes.php">Integrantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="score.php">Cálculo Score</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="revistas.php">Revista Neocosur</a>
          </li>
          <li>
            <a class="nav-link" href="publicaciones.php">Publicaciones Neocosur</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
<!-- Fin de Header -->