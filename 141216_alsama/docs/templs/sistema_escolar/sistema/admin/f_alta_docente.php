<?php
	include("funciones.php");
	nologin();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<h2> <img src='img/add.gif'><img src='img/p1.gif'> Agregar Docente</h2>
<form name='altaAlumno' action='alta_docente.php' method='post'>
<table>
<tr>
<td>Nombre:</td>
<td><input type='text' name='nombre' value='' /></td>
</tr>
<tr>
<td>Apellido:</td>
<td><input type='text' name='apellido' value='' /></td>
</tr>
<tr>
<td>Fecha de nacimiento:</td>
<td>
Dia:<?php
	$i;
	echo "<select name='dia'>";
	for($i=1;$i<=31;$i++){
	echo "<option value='".$i."'>".$i."</option>";
	}
	echo "</select>";
	?>
Mes:<?php
        $i;
        echo "<select name='mes'>";
        for($i=1;$i<=12;$i++){
        echo "<option value='".$i."'>".$i."</option>";
        }
        echo "</select>";
        ?>
Anio: <?php
        $i;
        echo "<select name='anio'>";
        for($i=2013;$i>=1900;$i--){
        echo "<option value='".$i."'>".$i."</option>";
        }
        echo "</select>";
        ?>
</td>
</tr>
<tr>
<td>Dirección</:td>
<td><input type='text' name='direccion' value='' /></td>
</tr>
<tr>
<td>Ciudad:</td>
<td><input type='text' name='ciudad' value='' /></td>
</tr>
<tr>
<td><b>DNI:</b></td>
<td><input type='text' name='dni' value='' /></td>
</tr>
<tr>
<td>Sexo:</td>
<td>Masculino<input type='radio' name='sexo' value='M'><br>
Femenino <input type='radio' name='sexo' value='F'></td>
</tr>
<tr>
<td>Email:</td>
<td><input type='text' name='email'></td>
</tr>
<tr>
<td>Telefono:</td>
<td><input type='text' name='telefono'></td>
</tr>


<tr>
<td><input type='submit' name='Enviar' value='Alta Docente'>
</td>
<td></td>
</tr>
</table>
</form>
</body>
</html>
