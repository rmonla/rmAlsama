<form method="post" action="alta_materia">
Curso:<select name="curso">
<?php
include("funciones.php");
nologin();
include("conexion.php");
$select="select id_curso,curso,especialidad from curso";
$registro=mysql_query($select,$conexion);
while($curso=mysql_fetch_array($registro)){
	echo "<option value='".$curso['id_curso']."'>".$curso['curso']." ".$curso['especialidad']."</option>";
}

?>
	</select>
<br>
Nombre Materia:<input type="text" name="materia"><br>
Carga Horaria: <input type="number" name="cmod"><br>
		<br>
<input type="submit" value="Agregar">

</form>
