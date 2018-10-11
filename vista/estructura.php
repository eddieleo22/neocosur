<?php include 'head.php'; ?>

<div class="container-fluid">
  <!-- Inicio del Contenido -->
  <?php include 'header.php'; ?>
  
  <div class="container">
    <div class="row">
       <?php if($_SESSION['sitio'] == 'en'){         
	   $estructura = "ORGANIZATION";
	   $titulo1 = "The structure of Neocosur is composed of the following instances:";
	   $comite1 = "Steering Committee Members";
	   $comite2 = "Scientific Committee Members";
	   $comite3 = "Database unit";
	   $comite4 = "Others";
	   } else {
		$estructura = "ESTRUCTURA"; 
		$titulo1 = "La estructura de Neocosur esta compuesta de las siguientes instancias:";
		$comite1 = "Miembros del Comité Directivo"; 
		$comite2 = "Miembros del Comité Científico";
		$comite3 = "Unidad Base de Datos";
		$comite4 = "Otros";
	   }?>
       
      <h1 class="display-4"> <?php echo $estructura; ?></h1>
    </div>
    <div class="row">
      <blockquote class="blockquote col-12">
        <p class="mb-0">
         <?php echo $titulo1; ?></p>
      </blockquote>

      <div class="col-lg-6 float-left">
          <h4><?php echo $comite1; ?> 2014 - 2018</h4>
          <dl class="row">
            <dt class="col-6">José Luis Tapia</dt>
            <dd class="col-6">jlta@med.puc.cl (Presidente)</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Ivonne D’Apremont</dt>
            <dd class="col-6">ivonne.dapremont@gmail.com (Secretaria)</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Gabriel Musante</dt>
            <dd class="col-6">gabriel.musante@gmail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Aldo Bancalari</dt>
            <dd class="col-6">aldobancalari@gmail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Jorge Tavosnanska</dt>
            <dd class="col-6">jtavos@intramed.net.ar</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Jaime Zegarra</dt>
            <dd class="col-6">jaime.zegarra@upch.pe</dd>
          </dl>         
        </div>

        <div class="col-6 float-left">
          <h4><?php echo $comite2; ?></h4>
          <dl class="row">
            <dt class="col-6">Jorge Fabres</dt>
            <dd class="col-6">jfabres@gmail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Gonzalo Mariani</dt>
            <dd class="col-6">gonzalo.mariani@hiba.org.ar</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Patricia Mena</dt>
            <dd class="col-6">mena.n.patricia@mail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Claudio Solana</dt>
            <dd class="col-6">claudiosolana@gmail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Larisa Genes</dt>
            <dd class="col-6">larigenesf@hotmail.com</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Verónica Webb</dt>
            <dd class="col-6">dorawebb@upch.pe</dd>
          </dl>
        </div>
        <div class="clearfix d-none d-lg-block"></div>
        <div class="col-6 float-left">
          <h4><?php echo $comite3; ?></h4>
          <dl class="row">
            <dt class="col-6">Neonatólogos</dt>
            <dd class="col-6">jlta@med.puc.cl (Presidente)</dd>
          </dl>

          <dl class="row">
            <dt class="col-6">Enfermeras</dt>
            <dd class="col-6">Mariela Quezada (Chile) <br> Solange Rojas (Chile) <br> Paula Soto (Chile)</dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Estadísticos</dt>
            <dd class="col-lg-6">Claudia Musalem (Chile)</dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Matemáticos</dt>
            <dd class="col-lg-6">Guillermo Marshall (Chile) <br> José Zubizarrieta (Chile)</dd>
          </dl>
        </div>

        <div class="col-lg-6 float-left">
          <h4><?php echo $comite4; ?></h4>
          <dl class="row">
            <dt class="col-lg-6">Consejo Asesor</dt>
            <dd class="col-lg-6">José María Ceriani (Argentina)</dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Capítulo de Enfermería</dt>
            <dd class="col-lg-6">Coordinadoras Miriam Faunes (Chile) <br>Aldana Ávila (Argentina)<br> Secretaria Mariela Quezada (Chile)<br>
            Laura  Naveda  (Argentina)<br> Inés Roxana Maidana (Argentina)<br> Gilda Rivas (Argentina)<br> Rosangela Batista  (Brasil)<br> Nincy Armao (Paraguay)<br> Liz Ruiz Dìaz (Paraguay)<br> Ana Ulloa (Perú)<br> Natalia Fernandez  (Uruguay)<br> Solange Rojas (Chile)<br> Paula Soto (Chile) </dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Comité de Nutrición</dt>
            <dd class="col-lg-6">Patricia Mena (Chile)<br> Ricardo Uauy (Chile) <br> Patricia Vernal (Chile) <br> Daniela Masoli (Chile) <br> Debora Sabatelli (Argentina) <br>M. José Escalante (Chile) <br> Jaime Zegarra (Perú) <br> Gabriel Musante (Argentina) <br> Alejandro Dinerstain (Argentina) <br> Claudio Solana (Argentina)</dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Colaboradores externos</dt>
            <dd class="col-lg-6">Eduardo Bancalari (USA) <br> Waldemar Carlo (USA)</dd>
          </dl>

          <dl class="row">
            <dt class="col-lg-6">Revista Neocosur</dt>
            <dd class="col-lg-6">Editor (Argentina)</dd>
          </dl>

        </div>
    </div>
  </div>

    <!-- Fin del Contenido -->  
</div>    

<?php
  include 'footer.php';
?>

<!-- Inicio de JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


</body>
</html>

