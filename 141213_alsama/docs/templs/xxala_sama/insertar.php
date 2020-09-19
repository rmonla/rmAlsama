<?php
session_name('Colegio');
session_start();
session_register('consulta');

include("funciones.php");

$tabla = $_GET["opc"];

//averiguo el número de columnas de la tabla
$resultado = Consulta("select * from ".$tabla);
$numero_columnas = mysql_num_fields($resultado);
?>
<?php
	echo "<form action=\"insertar1.php?opc=".$tabla."\" method=\"POST\" target=\"_self\">";
?>

<table border="0" cellpadding="2" cellspacing="2" align="center" bgcolor="#455372">
  <tbody>
<tr>
<td style="text-align:center;height:30px;color:#ffffff;font-size:20px;">Insertar el siguiente registro<hr></td>
</tr>
    <tr><td colspan="2" rowspan="1" id="cc" style="vertical-align:middle;text-align:center">

<table border="0" align="center" cellpadding="2" cellspacing="2" align="center">
  <tbody>
    <tr>
      <td rowspan="1" <?php echo "colspan=".($numero_columnas) ?> id="listado1"><? echo strtoupper($tabla); ?></td>
    </tr>

<?php

//Cabecera de la tabla con los nombres de los campos
$mostrar = mysql_fetch_array($resultado);

crear_formulario($tabla,$vacio);
?>
  </tbody>
</table>

</td></tr>
<tr>
<td style="text-align:center;height:30px;"><input type="submit" value="Guardar"> &nbsp;&nbsp; <input type="button" name="cancelar" value="Cancelar" 
<?php
echo "onclick=\"window.open('index2.php?acc=listar&opc=".$tabla."','_self','')\">";
?>
</td>
</tr>
</tbody></table>
</form>
