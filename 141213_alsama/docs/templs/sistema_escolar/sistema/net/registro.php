<!DOCTYPE html>
<html>
<head>

<style type="text/css">
A:link{text-decoration: none;}
A:visited{text-decoration:none;}
A:active{text-decoration:none;}
A:hover{text-decoration:none;}
</style>
</head>
<body>
<script type="text/javascript">
	fecha = new Date();
	document.write(fecha);
</script>
<h3 align="center">Portal de Registro</h3>
<hr>
<table align="center">
<form action="registrando.php" method="post">
<tr>
	<td>
	<h4>Tus datos:</h4>
	</td>
<tr>
	<td> 
	<input type="text" name="nombre" placeholder="Nombre" required="required">
	</td> 
	<td>
	<input type="text" name="apellido" placeholder="Apellido" required="required">
	</td>
</tr>
<tr>
<td> Email: </td> <td> <input type="text" name="email" required="required" placeholder="Email"> </td>
</tr>
<tr>
<td> Direccion:</td><td> <input type="text" name="direccion"> </td>
</tr>
<tr>
<td> Ciudad:</td><td> <input type="text" name="ciudad"> </td>
</tr>
<tr>
	<td> 
	Fecha de nacimiento: 
	</td>
</tr>
<tr>
	<td>
	Dia:<select name="dia_nacimiento"> 
  		<?php
		$f;
		for($f=1;$f<=31;$f++){
		echo "<option value='$f'>$f</option>";
		}
		?> 
  	</select> 
	</td>
	<td>
	Mes:<select name="mes_nacimiento">
		<?php
		$f;
		for($f=1;$f<=12;$f++){
		echo "<option  value='$f'>$f</option>";
		}
		?>
	</select>
	</td>
	<td>
	Año:<select name="anio_nacimiento">
		<?php
		$f;
		for($f=2013;$f>=1900;$f--){
		echo "<option value='$f'>$f</option>";
		}
		?>
	</select>
	</td>
</tr>
<tr>
<td>Sexo:<select name="sexo"><option value="hombre">Hombre</option><option value="mujer">Mujer</option></select> </td>
</tr>
<tr>
<td>DNI:</td>
</tr>
<tr>
<td><input type="text" name="dni" required="required" placeholder="DNI"> </td>
</tr>

<tr>
<td>
Especialidad de preferencia:
</td>
<td>
<input type="radio" name="radio_vinculo" value="informatica">Informatica<br>
<input type="radio" name="radio_vinculo" value="construcciones">Construcciones<br>
<input type="radio" name="radio_vinculo" value="electromecanica">Electromecanica<br>
</td>
</tr>
<tr>
<td>
<input type="submit" value="Registrarse!">
</td>
</tr>
</form>
</table>
<hr>

</body>
</html>
