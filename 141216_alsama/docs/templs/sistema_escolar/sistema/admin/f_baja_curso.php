<?php
	include("conexion.php");
	include("funciones.php");
	nologin();

	$select_docente="select nombre,apellido,nro_documento,id from docente";
	$docente=mysql_query("$select_docente",$conexion);
?>
	<h2> <img src="img/del.gif"> <img src="img/curso.gif" height="48px" width="48px"> Quitar Curso</h2>
<form method="post" action="baja_curso.php">
	<table>
	<tr>
	<td>Seleccione curso: </td><td>
					<?php
					$select="select * from curso";
					$registros=mysql_query($select,$conexion);
					echo "<select name='curso_del'>";
					while ($curso=mysql_fetch_array($registros))
					{
						echo "<option value='".$curso['id_curso']."'>".$curso['curso']." ".$curso['especialidad']."</option>";
					}
					echo "</select>";
					mysql_close($conexion);
					?>
</td>
</tr>
</table>
<input type="submit" value="Quitar Curso">
</form>
