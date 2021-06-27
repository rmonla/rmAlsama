<?php
include("funciones.php");
nologin();//llama a la funcion que verifica si esta logueado o no

$borrar=$_GET['ruta'];//obtiene el nombre del archivo a borrar, 
			//que fue pasado como parametro en un hipervinculo

echo "<br>";
echo "<form method='post' action='eliminar.php?ruta=".$borrar."'>";
echo "Esta seguro que desa eliminar a:<br><b>".$borrar."</b><br>del sistema ?";
echo "<input type='submit' value='Si'> &nbsp <a href='f_eliminar.php'>NO</a>";
echo "</form>";

?>
