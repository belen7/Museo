<?php
session_start();
include ("conexion.php");
IF(!ISSET($_SESSION["dniadmin"])){
    header("location:index.php");
    exit();
}
require_once "conexion.php";
if(!isset($_GET['mensaje'])){
    $id=$_GET['idusuario'];
}else{
    $id=$_SESSION['dniadmin'];
}
$sql = "SELECT usuario.*, persona.*,roles.* FROM usuario,persona,roles WHERE usuario.idRol=roles.idRol and usuario.idusuario=persona.idusuario and usuario.idusuario = $id";
$result = mysqli_query($conex, $sql);
$fila = mysqli_fetch_array($result);
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
    <div class="text-center mt-5 mb-2"><h2>Los datos a eliminar son</h2></div>	
    <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
  	
    <form class="row g-3" action="borrar.php" method="post">
    
      <div class="col-sm-6">
        <label for="nombre" class="form-label">* Nombre y Apellido</label>
        <input type="text" class="form-control" name="nomyap" id="nomyap"  value = "<?php echo $fila['nomyap']?>" disabled>
      </div>
    
      <div class="col-sm-6 mb-3">
        <label for="dni" class="form-label">* DNI</label>
        <input type="text" class="form-control" name="dni" id="dni" value = "<?php echo $fila['dni']?>"disabled >
      </div>
    
      <div class="col-sm-6 mb-3">
        <label for="telefono" class="form-label">* telefono</label>
        <input type="text" class="form-control" name="telefono" id="telefono"  value = "<?php echo $fila['telefono']?>"disabled>
      </div>
      <div class="col-sm-6 mb-3">
        <label for="telefono" class="form-label">* Direccion</label>
        <input type="text" class="form-control" name="direccion" id="direccion"  value = "<?php echo $fila['direccion']?>"disabled>
      </div>
      <div class="col-sm-6 mb-3">
        <label for="email" class="form-label">* Email</label>
        <input type="text" class="form-control" name="email" id="email"  value = "<?php echo $fila['email']?>"disabled>
      </div>
        
      <div class="col-sm-6 mb-3">
        <label for="clave" class="form-label">* Clave</label>
        <input type="password" class="form-control" name="clave" id="clave"  value = "<?php echo $fila['clave']?>" disabled>
      </div>  
      <div class="col-sm-6 mb-3">
        <label for="descripcion" class="form-label">* Tipo de Rol</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion"  value = "<?php echo $fila['descripcion']?>"disabled>
      </div> 
      
      <div class="col-sm-6">
        <input type="hidden" class="form-control" name="idusuario" id="idusuario"   value = "<?php echo $fila['idusuario']?>" required>
      </div>
      
      <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Eliminar</button>
      
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