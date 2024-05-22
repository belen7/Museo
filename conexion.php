<?php  
	 $servidor="localhost";
	 $usu="root";
	 $bd="regional";
     $pass="";
	$conex=mysqli_connect($servidor,$usu,$pass,$bd);
	if (!$conex){
		echo "error a la conexion";
	}
	mysqli_set_charset($conex,"utf8");	
	
?>