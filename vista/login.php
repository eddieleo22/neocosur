<?php include 'head.php'; ?>

<div class="container-fluid">
  <!-- Sección Header -->
  <?php include 'header.php'; ?>

  <div class="container">
    
    <div class="row ">
      <div class="col">
        
      </div>
      <div class="col">

        <div class="row text-center login" >
          <h1 class="display-4 ">Login</h1>
        </div>
        <form action="../admin/Negocio/loginBO.php" method="post">
          <div class="form-group">
            <label>Usuario</label>
            <input type="usuario"  name="usuario" class="form-control"  placeholder="usuario">
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="contraseña">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>

      </div>
      <div class="col">
        
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

