

<div class="ficha panel panel-default">
  <div class="panel-body">
 <form action="Negocio/usuarioBO.php" method="post" name="centro" onSubmit="return validarPasswd()">
    <h4><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Datos Básicos</h4>
	<h4><span  id ="mensaje" aria-hidden="true"></span> </h4>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="nombres" class="col-lg-5 control-label">Nombres</label>
        <div class="col-lg-7">
          <input type="text" name="nombres" value="<?php echo $nombres ; ?>" class="form-control input-sm" contenteditable="false" required >
        </div>
      </div>
                               
      <div class="form-group">
        <label for="paterno" class="col-lg-5 control-label">Apellido Paterno</label>
        <div class="col-lg-7">
          <input type="text" name="paterno" value="<?php echo $paterno ; ?>" class="form-control input-sm" contenteditable="false"  required>
        </div>
      </div>
                               
      <div class="form-group">
        <label for="materno" class="col-lg-5 control-label">Apellido Materno</label>
        <div class="col-lg-7">
          <input type="text" name="materno" value="<?php echo $materno ; ?>" class="form-control input-sm" contenteditable="false" >
        </div>
      </div>

      </div>

      <div class="col-lg-6">

      <div class="form-group">
        <label for="usuario" class="col-lg-5 control-label">Usuario</label>
        <div class="col-lg-7">
          <input type="text" name="usuario" value="<?php echo $name ; ?>" class="form-control input-sm" contenteditable="false"  disabled>
        </div>
      </div>

      <div class="form-group">
        <label for="pass" class="col-lg-5 control-label">Contraseña</label>
        <div class="col-lg-7">
          <input type="password" name="pass" id ="pass1"  minlength="8" value="<?php echo $pass ; ?>" class="form-control input-sm" contenteditable="false" >
		  <span id="campoOK"></span>
        </div>
      </div>

      <div class="form-group">
        <label for="pass2" class="col-lg-5 control-label">Repita Contraseña</label>
        <div class="col-lg-7">
          <input type="password" name="pass2" id ="pass2" minlength="8" value="<?php echo $pass ; ?>" class="form-control input-sm" contenteditable="false" >
		  <span id="campoOK"></span>
        </div>
      </div>

    </div>

    <div class=" col-lg-offset-10 col-lg-2">
	<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $idUsuario ?>"/>
	<input type="hidden" name="csrf" value="<?php echo  $_SESSION['csrf'];; ?>" /> 
      <button type="submit" name="basicos" value="<?php echo $basicos ; ?>" class="btn btn-success">Guardar</button>
    </div>
    </form>
  </div>
</div>

<script type="text/javascript">
function validarPasswd(){
	p1 = document.getElementById('pass1').value;
	p2=document.getElementById('pass2').value;
	if (p1 != p2) {
		
		  mensaje = document.getElementById('mensaje');
		  mensaje.style.color = '#c10000';
		  mensaje.innerText = "Password Deben ser iguales";
		  return false;
		} else {
		  return true; 
		}
	
}


document.getElementById('pass1').addEventListener('input', function(evt) {
		const campo = evt.target,
		  valido = document.getElementById('campoOK'),

		  regex = /^(?=.*\d)(?=.*[a-záéíóúüñ])/;

		//Se muestra un texto válido/inválido a modo de ejemplo
		if (regex.test(campo.value)) {
		valido.innerText = "";
		} else {
		valido.style.color = '#c10000';
		valido.innerText = "Debe Contener letras y números";

		}
});

document.getElementById('pass2').addEventListener('input', function(evt) {
		const campo = evt.target,
		  valido = document.getElementById('campoOK'),

		  regex = /^(?=.*\d)(?=.*[a-záéíóúüñ])/;

		//Se muestra un texto válido/inválido a modo de ejemplo
		if (regex.test(campo.value)) {
		valido.innerText = "";
		} else {
		valido.style.color = '#c10000';
		valido.innerText = "Debe Contener letras y números";

		}
});


    </script>