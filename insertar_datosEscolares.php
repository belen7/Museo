<?php
SESSION_START();
// Conexion a la Base de Datos Biblioteca 

 require_once "conexion.php";

 //Funcion de Validacion de Datos

 require_once "funcionesvalEsc.php";

!//die ($_POST['nombre']);



$error = "";

if(!empty(trim($_POST['nombre']))  && !empty(trim($_POST['idTipo']))){
	

	if (ValidacionDatos()){

        $nombre=substr($_POST['nombre'], 0, strlen($_POST['nombre'])-7); 
		$CUE = substr($_POST['nombre'],-7);
		//echo $nombre." ".$CUE; 
		$idTipo=$_POST['idTipo'];
		$idusuario = $_SESSION['idoperador'];
		$tipoini = $_POST['tipoini'];
		$fechainicio = $_POST['fechainicio'];
            
        $sql="INSERT INTO  iniciadortramite(tipoini) VALUES ($tipoini)";

        $result=mysqli_query($conex,$sql);

        //die($sql);

       if ($result){
			// INSERTA DATOS EN LA TABLA ESCUELA

			$ultimoid= mysqli_insert_id($conex);
			$sql="INSERT INTO escuela (nombre, CUE, idresponsable) VALUES ('$nombre', '$CUE' , $ultimoid)";
			$result=mysqli_query($conex,$sql);
            
			// INSERTA DATOS EN LA TABLA TRAMITE

			$sql="INSERT INTO tramite (fechainicio, idusuario, idiniciador, idTipo) VALUES ('$fechainicio', $idusuario, $ultimoid, $idTipo)";
			$result=mysqli_query($conex,$sql);
			//die($sql);
			

             //header("Location:listadoEscuela.php?mensaje=ok");

        }else{

			if(mysqli_errno($conex)==1062){
				$error.="Error CUE duplicado ";
				header("Location:index.php?mensaje=".$error);

			}else{
				$error.="Error en la insercion";
			}
            
        }
     
    }else{

		header("Location:index.php?mensaje=".$error);
	
	}	
	
	
}else{

	$error.="Faltan Datos ";
	header("Location:index.php?mensaje=".$error);
	
}



	

?>
