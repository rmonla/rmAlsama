<?php
include("funciones.php");
nologin();//llama a la funcion nologin() que verifica si esta logueado o no
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<frameset cols='15%,80%*'>
		<frame name='menu' src='menu.php'>
		<frameset rows='10%,70%*'>
			<frame name='top' src='top.php'>
			<frame name='contenido' src='contenido.php'> 
	</frameset>
	</frameset> 
</html>
