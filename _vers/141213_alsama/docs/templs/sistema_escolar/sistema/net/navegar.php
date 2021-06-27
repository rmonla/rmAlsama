<?php
include("funciones.php");
nologin();

$ruta=$_GET['ruta'];

$directorio=opendir($ruta);
while ($archivo=readdir($directorio))//obtenemos un archivo y luego otro sucesivamente
{
	echo  "<a href='eliminar_confirmar.php?ruta=uploads/".$_SESSION['usuario_alumno']."/".$archivo."'>".$archivo."</a><$
}

?>
