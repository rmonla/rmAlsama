<?php
include("funciones.php");
nologin();
include("conexion.php");
$registros=mysql_query("select nro_curso from alumno where nro_documento='$_SESSION[usuario_alumno]'",$conexion);
if($alumno=mysql_fetch_array($registros)){
	$nro_curso=$alumno['nro_curso'];
}

$dni=$_SESSION['usuario_alumno'];
move_uploaded_file($_FILES['foto']['tmp_name'],"uploads/".$nro_curso."/".$dni."/".$_FILES['foto']['name']);
header("Location: mis_subidas.php");
?>
