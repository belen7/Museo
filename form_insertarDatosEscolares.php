<?php
SESSION_START();
IF(!ISSET($_SESSION["dnioperador"])){
    header("location:index.php");
    exit();
}
require_once "conexion.php";
$sql="SELECT * FROM escuelaregional9 ORDER BY CUE";
$result=mysqli_query($conex, $sql);

$sql="SELECT * FROM tipo ORDER BY descripcion";
$result2=mysqli_query($conex, $sql);

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
    <div class="text-center mt-5 mb-2"><h2>Datos Tramite</h2></div>	
    <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
      
    <form class="row g-3" action="insertar_datosEscolares.php" method="post">
        <!-- ENVIA EL VALOR 20 CORRESPONDIENTE A ESCUELA -->
      <div>
        <input type="hidden" class="form-control" name="tipoini" id="tipoin" value=20 required>
      </div>
        <!-- CARGA TABLA TABLA ESCUELA -->
      <div class="col-sm-6 mb-3">
        <label for="nombre" class="form-label">* Nombre</label>
        <select class="form-select" id="nombre" name="nombre" required>
                <option value='' disabled selected>Seleccione la escuela</option>
               <?php while($fila=mysqli_fetch_assoc($result)){
                 echo "<option value='".$fila['nombreynumero'].$fila['CUE']."'>".$fila['nombreynumero']."</option>";
               }
              ?>
                
        </select>
      </div>
 
      <div class="col-sm-6 mb-3">
        <label for="fechainicio" class="form-label">* Fecha</label>
        <input type="date" class="form-control" name="fechainicio" id="fechainicio" placeholder="Ingrese fecha inicio de tramite" required>
      </div>
     <!-- CARGA TABLA TRAMITE -->

     <div class="col-sm-6 mb-3">
        <label for="idTipo" class="form-label">* Tipo de Tramite</label>
        <select class="form-select" id="idTipo" name="idTipo" required>
                <option value='' disabled selected>Seleccione el Tramite</option>
               <?php while($fila2=mysqli_fetch_assoc($result2)){
                 echo "<option value=".$fila2['idTipo'].">".$fila2['descripcion']."</option>";
               }
              ?>
                
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

            header('refresh:3; url=http://localhost/proyecto/listadoEscuela.php');
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