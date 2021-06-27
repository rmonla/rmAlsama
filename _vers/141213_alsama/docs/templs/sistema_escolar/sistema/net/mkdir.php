<?php
include("funciones.php");
nologin();
	if(isset($_POST['nom_carpeta'])){
		$nueva_carpeta=$_POST['nom_carpeta'];
		$dni=$_SESSION['usuario_alumno'];
                $ruta="uploads/".$dni."/".$nueva_carpeta;
                mkdir($ruta, 0777);
		echo "Se ha creado la Nueva Carpeta ".$nueva_carpeta." correctamente";
		echo "<br> <a href='f_mkdir.php'>Volver</a>";
	}else{
	echo "Ingrese un nombre para la Nueva Carpeta";
	}
?>
