<?php
	include("funciones.php");
	nologin();
?>

<h2> <img src='img/del.gif'><img src='img/p2.gif'> Quitar Alumno</h2>
<form name='bajaAlumno' action='baja_alumno_confirmar.php' method='post'>
<table>
<tr><td>DNI:</td></tr>
<tr><td> <input type='text' name='dni'> </td></tr>
</table>
<input type='submit' value='Baja Alumno'>
</form>
</body>
</html>
