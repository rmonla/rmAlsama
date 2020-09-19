<?php
include("funciones.php");
nologin();
include("conexion.php");
$registros=mysql_query("select nro_curso from alumno where nro_documento='$_SESSION[usuario_alumno]'",$conexion);
if($alumno=mysql_fetch_array($registros)){
	$nro_curso=$alumno['nro_curso'];
}

$dni=$_SESSION['usuario_alumno'];//obtiene el dni del alumno que se logueo en el sistema
copy($_FILES['img_perfil']['tmp_name'],"uploads/".$nro_curso."/".$dni."/img_perfil/perfil.gif");//copia la imagen subida, que esta en un directorio temporal
												//en el servidor web a uploads/74/38454566/img_perfil/perfil.gif

header("Location: f_subir_img_perfil.php");//redirige otra vez al formulario de cambio de la imagen del perfil
?>
