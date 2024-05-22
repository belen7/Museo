
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
 
      <?php
        include('header.php');

      ?>
      
            
    
   <!-- Index.php contiene el Formulario de Inicio de Sesion del Sitio Web--> 

   <!-- El Formulario de Inicio de Sesion se utiliza para distintos tipos de usuarios como por Ejemplo Administradores y Clientes--> 
   
  <section>
  
  <div class="container mt-3 mb-5">
  <div class="row">
  <div class="col-12 col-md-2"></div>
  <div class="col-12 col-md-8">
  <div class="mt-5 text-center"><h3>Inicio de Sesión</h3></div>

  
  <form action="validar_datoacceso.php" method="post">
  
  <div class="mb-3">
    <label for="dni" class="form-label">* DNI Usuario:</label>
    <input type="text" class="form-control" name="dni" id="dni" value="" placeholder="Ingresa 8 dígitos Numéricos" pattern="[0-9]{8}" title="Ingrese sólo 8 dígitos Numéricos" required>
  </div>
  <div class="mb-3">
    <label for="clave" class="form-label">* Clave:</label>
    <input type="password" class="form-control" name="clave" id="clave" minlength="8" value="" placeholder="Ingresa contraseña de al menos 8 caracteres" required>
  </div>

  <div class="mb-5 pb-3">
     <label for="perfil" class="form-label">* Perfil</label>
     <select class="form-select" id="roles" name="roles" required>
            <option value='' disabled selected>Selecciona tu perfil</option>
            <option value=1 >Administrador</option>
            <option value=2 >Operador</option>
            <option value=3 >Invitado</option>
     </select>
  </div>

  <div class="text-center mt-5 pt-5"><button type="submit" class="btn btn-primary" name="btn_ingresar">Ingresar</button></div>
  </form>
  
  
  <?php
    
    // Uso de GET para mostrar Mensaje de error resultante del Inicio de Sesion

    if (isset($_GET['msjerror'])){
       
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>El DNI o la Clave son Incorrectos! Intente Nuevamente!!!</strong></div></div>"; 
         
      }
    
  ?> 


  <div class="col-12 col-md-2"></div>
  	
  </div>
  </div>
  </div>

  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>