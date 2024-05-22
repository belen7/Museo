<?php
SESSION_START();
IF(!ISSET($_SESSION["dnioperador"])){
    header("location:index.php");
    exit();
}
require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
     
     include('header.php');

?>
<section>
        <?php
        $sql="SELECT iniciadortramite.tipoini, tramite.idtramite ,tramite.fechainicio, tipo.descripcion, escuela.nombre FROM iniciadortramite, tramite, tipo, escuela WHERE iniciadortramite.id=tramite.idiniciador AND tipo.idtipo=tramite.idtipo and iniciadortramite.id=escuela.idresponsable";
        $result=mysqli_query($conex,$sql);
        if(mysqli_num_rows($result)>0){
        ?>
      <div class="container">
        <div class="text-center my-5"><h3>Listado de tramites Escolares</h3></div>
        <table class="table table-striped table-hover">
        <a class="btn btn-primary btn-sm my-3" href="form_insertarDatosEscolares.php">Agregar</a>
      </div>
  <thead>
      <tr>
        <th scope="col">Numero de tramite</th>
        <th scope="col">Fecha</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Nombre de la escuela</th>
      </tr>
  </thead>
  <?php
  while($fila=mysqli_fetch_array($result)){
  ?>
    <tbody>
      <tr>
          <td><?php echo $fila['idtramite'];?></td>
          <td><?php echo $fila['fechainicio'];?></td>
          <td><?php echo $fila['descripcion'];?></td>
          <td><?php echo $fila['nombre'];?></td>
          <td><a class="me-3 btn btn-outline-success btn-sm" href="form_editar.php?idusuario=<?php echo $fila['idusuario'];?>">Editar</a>
            <a class="btn btn-outline-danger btn-sm" href="form_borrar.php?idusuario=<?php echo $fila['idusuario'];?>">Eliminar</a></td></tr>
        </tr>
    </tbody>
  <?php
  }}
  ?>
</table>
</div>

</section>

<?php
  include('footer.php');
?>
 
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>