<?php
$borrar=$_GET['ruta'];//obtiene el nombre del archivo a borrar
	if(unlink($borrar)){//si borro el archivo correctamente hace lo siguiente:
		echo "Se ha borrado ".$borrar." correctamente";//mensaje de exito
		echo "<br> <a href='f_eliminar.php'>Volver</a>";//para volver
	}else{//si no se ha podido borrar muestra esto:
		echo "No se ha podido borrar el archivo: ".$borrar;//mensaje de fallo
		echo "<br> <a href='f_eliminar.php'>Volver</a>";//para volver
	}
?>
