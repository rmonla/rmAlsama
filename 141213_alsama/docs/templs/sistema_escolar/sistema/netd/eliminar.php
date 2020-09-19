<?php
$borrar=$_GET['ruta'];
	if(unlink($borrar)){
		echo "Se ha borrado ".$borrar." correctamente";
		echo "<br> <a href='f_eliminar.php'>Volver</a>";
	}else{
		echo "No se ha podido borrar el archivo: ".$borrar;
		echo "<br> <a href='f_eliminar.php'>Volver</a>";
	}
?>
