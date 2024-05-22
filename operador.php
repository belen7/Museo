<?php 
session_start();
if(!ISSET($_SESSION["dnioperador"])){
    header("location:index.php");
    exit();
}
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

<body>
<?php
        include('header.php');

      ?>
    <h1>Esta es la interfaz del operador</h1>
    <?php
echo "El dni del operador: ",$_SESSION["dnioperador"];
?>
<!--<a href="salir.php">CERRAR SESION </a>-->
<?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
