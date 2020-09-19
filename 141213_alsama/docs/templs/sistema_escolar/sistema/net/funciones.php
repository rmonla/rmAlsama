<?php
//fichero de funciones
function nologin(){//funcion no login(), verifica si el visitante esta logueado o no
	session_start();//inicia las variables de sesion
	if(empty($_SESSION['usuario_alumno']) && empty($_SESSION['clave_alumno'])){//si las variables de sesion estan vacias
											//es decir, el visitante no ingreso ni usuario ni clave
	//entonces lo redirige a index.php
        header("Location: index.php");
	}
}
?>
