<?php
include("funciones.php");//incluye el fichero funciones.php
nologin();//llama a la funcion nologin() que se encuentra en funciones.php
/*
	si el usuario no esta logueado, la funcion
	no login lo hecha de la pagina, y lo redirige	
	al portal de ingreso
*/
echo "<br><h3>Bienvenido de nuevo, ".$_SESSION['aux_nombre']."</h3>";//muestra un mensaje con el nombre del usuario logueado
?>
