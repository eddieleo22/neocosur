<?php include 'head.php'; ?>

<div class="container-fluid">
  <!-- Sección Header -->
  <?php include 'header.php'; ?>

  <div class="container">
    <img src="../img/home_neocosur.jpg" id="img_home">
  </div>

  <div class="container">
    <div class="row" id="home_icons">
      <div class="col-3">
        
      </div>
 
      <div class="col-2 home_cuadro_1" id="">
        <a href="publicaciones.php"><i data-feather="globe"></i></a>
        <p>
          Publicaciones
        </p>  
      </div>
      <div class="col-2 home_cuadro_2" id="">
        <a href="integrantes.php"><i data-feather="log-in"></i></a>
        <p>
          Integrantes
        </p>  
      </div>
      <div class="col-2 home_cuadro_3" id="">
        <a href="login.php"><i data-feather="users"></i></a>
        <p>
          Ingreso
        </p>  
      </div>
      <div class="col-6">
        
      </div>
    </div>
  </div>  
    <?php
      include 'footer.php';
    ?>
</div>
 

     
<!-- Inicio de JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>
      feather.replace({ class: 'foo bar', 'height': 50, 'width': 50, 'stroke-width': 1 })
</script>
</body>
</html>

