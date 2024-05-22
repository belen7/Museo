<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css">
    
</head>
<header> 
    <div class="mt-5">
    <h1>Formulario</h1>
    </div>
</header>
<body>
    <form action="validar_datoacceso.php" method="post">
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">DNI</label>
    <div class="col-sm-10">
      <input type="text" name="dni" class="form-control" id="staticEmail">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="clave" class="form-control" id="inputPassword">
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Enviar</button>
  </div>
  </div>
  </form>
  <?php
  if(isset($_GET["mensaje"])){
    echo "<div class='alert alert-danger'> Error!!!</div>";
  }
  ?>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>