<?php
SESSION_START();
IF(!ISSET($_SESSION["dniadmin"])){
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
        $sql="SELECT usuario.*, roles.descripcion, persona.nomyap FROM usuario, roles, persona WHERE roles.idRol=usuario.idRol AND usuario.idusuario=persona.idusuario ORDER BY idusuario";
        $result=mysqli_query($conex,$sql);
        if(mysqli_num_rows($result)>0){
        ?>
      <div class="container">
        <div class="text-center my-5"><h3>Listado Usuarios</h3></div>
        <table class="table table-striped table-hover">
        <a class="btn btn-primary btn-sm my-3" href="form_agregar.php">Agregar</a>
      </div>
  <thead>
      <tr>
        <th scope="col">Dni</th>
        <th scope="col">Nombre y Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Tipo de usuario</th>
        <th scope="col">Acciones</th>
      </tr>
  </thead>
  <?php
  while($fila=mysqli_fetch_array($result)){
  ?>
    <tbody>
      <tr>
          <td><?php echo $fila['dni'];?></td>
          <td><?php echo $fila['nomyap'];?></td>
          <td><?php echo $fila['email'];?></td>
          <td><?php echo $fila['descripcion'];?></td>
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