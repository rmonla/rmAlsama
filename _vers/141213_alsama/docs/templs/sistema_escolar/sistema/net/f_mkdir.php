<?php
include("funciones.php");
nologin();//funcion que verifica si esta logueado o no
?>

<form method="post" action="mkdir.php">
<table><tr>
<td>Nombre de Nueva Carpeta:</td><td> <input type="text" name="nom_carpeta"> </td>
</tr>
<tr>
<td> <input type="submit" value="Nueva Carpeta"> </td>
</tr>
</form>
