<?php
include("funciones.php");
nologin();

$borrar=$_GET['ruta'];

echo "<br>";
echo "<form method='post' action='eliminar.php?ruta=".$borrar."'>";
echo "Esta seguro que desa eliminar a:<br><b>".$borrar."</b><br>del sistema ?";
echo "<input type='submit' value='Si'> &nbsp <a href='f_eliminar.php'>NO</a>";
echo "</form>";

?>
