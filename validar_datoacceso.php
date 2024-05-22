<?php
session_start();
include "conexion.php";
$dni=$_POST["dni"];
$clave=$_POST["clave"];
$rol=$_POST["roles"];
$sql="select * from usuario where dni='$dni' and idrol=$rol";

$result=mysqli_query($conex, $sql);

if (mysqli_num_rows($result)==1){
    $fila=mysqli_fetch_assoc($result);

    if(password_verify($clave, $fila['clave'])){

        $_SESSION['miclave']=$clave;
       // echo $_SESSION['miclave'];

        switch ($fila["idRol"]){
            case 1: $_SESSION['dniadmin']=$dni;
            header('location:administrador.php');
            break;

            case 2: $_SESSION['dnioperador']=$dni;
            $_SESSION['idoperador']= $fila['idusuario'];
            header('location:operador.php');
            break;

            case 3:  $_SESSION['dniinvitado']=$dni;
            header('location:invitado.php');
        }
    }else{

        echo "Error datos de acceso incorrectos";
        header ("location:index.php?mensaje=error");
          
    }
}else{

 echo "Error datos de acceso incorrectos";
 header ("location:index.php?mensaje=error");

}