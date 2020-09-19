<?php
/* Inicio Verificador de Login */
session_start();
if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
	header("Location: index.php");
}
/* Fin Verificador de Login */
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
