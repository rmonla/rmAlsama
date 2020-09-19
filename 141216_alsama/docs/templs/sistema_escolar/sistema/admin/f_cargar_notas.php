<?php
	include("conexion.php");
	include("funciones.php");
	nologin();
?>
<img src="img/notas.gif">
<br>
<form method="post" action="cargar_notas.php">
<table>
<tr>
<td>DNI Alumno:</td><td> <input type="text" name="dni"> </td>
</tr>
<tr>
<td> <input type="submit" value="Cargar"> </td>
</tr>
</table>
</form>
