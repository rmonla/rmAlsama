<?php
	include("funciones.php");
	nologin();
	include("conexion.php");

	$curso=$_POST['curso'].$_POST['division'];
	$especialidad=$_POST['especialidad'];
	$preceptor=$_POST['preceptor'];

	$insert="insert into curso(curso,especialidad,id_preceptor) values ('$curso','$especialidad','$preceptor')";
	mysql_query($insert,$conexion);
	mysql_close($conexion);
	echo "<h3>El curso ".$curso." se ha dado de alta en el sistema</h3> <br><br> <a href='f_alta_curso.php'>Volver</a>";
	$ruta="../net/uploads/".$curso;
        mkdir($ruta, 0777);
?>
