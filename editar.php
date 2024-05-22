<?php
include ('conexion.php');

$id=$_POST['idusuario'];
$nomyap =$_POST['nomyap'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
$telefono=$_POST['telefono'];

$sql="UPDATE usuario,persona SET  persona.nomyap='$nomyap',persona.dni='$dni',usuario.email='$email',usuario.clave='$clave',persona.telefono='$telefono' WHERE usuario.idusuario=persona.idusuario and usuario.idusuario = $id";
 $result=mysqli_query($conex,$sql);
//die($sql);
header("location:usuario.php");

 //die($sql);

        
     


?>
