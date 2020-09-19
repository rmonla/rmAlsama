<?php
include("funciones.php");
session_start();//para usar las variables globales

if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
        header("Location: index.php");
}

include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<h2> <img src='img/add.gif'><img src='img/p1.gif'> Agregar Alumno</h2>
<form name='altaAlumno' action='alta_alumno.php' method='post'>
<table>
<tr>
<td>Nombre:</td>
<td><input type='text' name='nombre' autofocus></td>
</tr>
<tr>
<td>Apellido:</td>
<td><input type='text' name='apellido' value='' /></td>
</tr>
<tr>
<td>Curso:</td><td> <?php
		echo "<select name='curso'>";
		$registros=mysql_query("select * from curso",$conexion);
		while ($curso=mysql_fetch_array($registros))
		{
  			echo "<option value='".$curso['curso']."'>".$curso['curso']." ".$curso['especialidad']."</option>";
		}
		echo "</select>";
		?>
</td></tr>
<tr>
<td>Fecha de nacimiento:</td>
<td>Dia:<?php 
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
Año:<?php
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
<td>Direccion:</td><td> <input type="text" name="direccion"></td>
</tr>
<tr>
<td>Ciudad: </td><td> <input type="text" name="ciudad"></td>
</tr>
<tr>
<td><b>DNI: </b></td><td> <input type="text" name="dni"></td>
</tr>
<tr>
<td>Sexo: </td><td> <input type="radio" name="sexo" value="M">Masculino</td>
</tr>
<tr>
<td> </td><td> <input type="radio" name="sexo" value="F">Femenino</td>
</tr>
<tr>
<td>Email: </td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>Telefono:</td><td> <input type="text" name="telefono"> </td>
</tr>
<tr>
<td>Especialidad: </td><td> <input type="radio" name="especialidad" value="Ciclo_Basico">Ciclo Basico</td>
</tr>
<tr>
<td> </td><td> <input type="radio" name="especialidad" value="Informatica">Informatica</td>
</tr>
<tr>
<td> </td><td> <input type="radio" name="especialidad" value="Electromecanica">Electromecanica</td>
</tr>
<tr>
<td> </td><td> <input type="radio" name="especialidad" value="Construcciones">Construcciones</td>
</tr>

</table>
<input type="submit" value="Agregar Alumno">
</form>
