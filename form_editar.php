<?php
SESSION_START();
IF(!ISSET($_SESSION["dniadmin"])){
    header("location:index.php");
    exit();
}
require_once "conexion.php";

include('conexion.php');
  $id=$_GET['idusuario'];
  $sql="SELECT usuario.*, persona.*,roles.* FROM usuario,persona,roles WHERE usuario.idRol=roles.idRol and usuario.idusuario=persona.idusuario and usuario.idusuario = $id";
  $result=mysqli_query($conex,$sql);
  //die($sql);
  $fila=mysqli_fetch_array($result);

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
  <div class="text-center mt-5 mb-2"><h2>Editar Datos Personales</h2></div>	
  <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
  	
  <form class="row g-3" action="editar.php" method="post">
    <input type="hidden" class="form-control" name="idusuario" id="idusuario" value="<?php echo $fila['idusuario']?>" required>
  
  <div class="col-sm-6">
    <label for="nombre" class="form-label">* Nombre</label>
    <input type="text" class="form-control" name="nomyap" id="nomyap" value="<?php echo $fila['nomyap']?>" placeholder="Ingresa tu Nombre" required>
  </div>
   <div class="col-sm-6 mb-3">
    <label for="dni" class="form-label">* DNI</label>
    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos numéricos" value="<?php echo $fila['dni']?>" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="email" class="form-label">* Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico" value="<?php echo $fila['email']?>" required >
  </div>

  <?php if( isset($_SESSION['dniadmin'])){
            if($_SESSION['dniadmin']==$fila['dni']){?>
              <div class="col-sm-6 mb-3">
                <label for="clave" class="form-label">* Clave</label>
                <input type="text" class="form-control" name="clave" id="clave" placeholder="Ingresa una clave de 8 caracteres como mínimo" value="<?php echo $_SESSION['miclave']?>" required>
              </div>  
  <?php }}; ?>

  <div class="col-sm-6 mb-3">
    <label for="clave" class="form-label">* Telefono</label>
    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingresa un telefono sin el 0 y sin 15" value="<?php echo $fila['telefono']?>" required>
  </div> 
  
  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary" name="actualizar" id="actualizar">Actualizar</button>
  
  </div>
  
  </form>

  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>