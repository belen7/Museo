
<?php
SESSION_START();
IF(!ISSET($_SESSION["dniadmin"])){
    header("location:index.php");
    exit();
}
require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion Datos Formulario</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
 
<?php
     
  include('header.php');

?>
                    
<!-- Index.php contiene un Formulario --> 
   
  <section>
   
    <div class="container mt-2 mb-5">
    <div class="text-center mt-5 mb-2"><h2>Datos Personales</h2></div>	
    <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
      
    <form class="row g-3" action="insertar_datos.php" method="post">
    
      <div class="col-sm-6">
        <label for="nombre" class="form-label">* Nombre y Apellido</label>
        <input type="text" class="form-control" name="nomyap" id="nomyap" placeholder="Ingresa tu Nombre" required>
      </div>
    
      <div class="col-sm-6 mb-3">
        <label for="dni" class="form-label">* DNI</label>
        <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos numéricos" required>
      </div>
    
      <div class="col-sm-6 mb-3">
        <label for="telefono" class="form-label">* telefono</label>
        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese telefono sin el 0 y sin el 15" required>
      </div>
      <div class="col-sm-6 mb-3">
        <label for="telefono" class="form-label">* Direccion</label>
        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese su direccion" required>
      </div>
      
      <div class="col-sm-6 mb-3">
        <label for="email" class="form-label">* Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico" required>
      </div>
        
      <div class="col-sm-6 mb-3">
        <label for="clave" class="form-label">* Clave</label>
        <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingresa una clave de 8 caracteres como mínimo" required>
      </div>  
      <div class="col-sm-6 mb-3">
        <label for="descripcion" class="form-label">* Tipo de Rol</label>
        <select class="form-select" id="descripcion" name="descripcion" required>
                <option value='' disabled selected>Selecciona tu perfil</option>
                <option value=1 >Administrador</option>
                <option value=2 >Operador</option>
                <option value=3 >Invitado</option>
        </select>
      </div> 
      
      <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Enviar</button>
      
      </div>
    
    </form>
    
      
    <?php
      
      // Uso de GET para mostrar Mensaje resultante 

      if (isset($_GET["mensaje"])){

          if($_GET["mensaje"]!="ok"){

            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
            
          }else{

            header('refresh:3; url=http://localhost/ProgI_Actividad/listado.php');
            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>";  
          
          }  
      } 
    ?> 
    



  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>