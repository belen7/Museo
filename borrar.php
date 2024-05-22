<?php
include ("conexion.php");

	$id = $_POST['idusuario'];
    //echo $id;
       
   
   $sql="DELETE FROM persona WHERE  persona.idusuario = $id";
    $result = mysqli_query($conex, $sql);
    
    if(mysqli_affected_rows($conex)>0){
        $sql="DELETE  FROM usuario WHERE usuario.idusuario = $id";
        //die($sql);
        $result = mysqli_query($conex, $sql);
    }
    //die($sql);
 
	
	header("location:usuario.php");
?>