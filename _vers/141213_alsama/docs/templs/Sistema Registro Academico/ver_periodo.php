<?php
require("validar.php");
require("conectar.php");

$sel_per = "select * from periodo";
$eje_per = mysql_query($sel_per);

?>
<style>
.letra
{
	text-align:center;
	font-family:BATAVIA;
}
.letra2
{
	text-align:left;
	font-family:"Comic Sans MS";
	font-size:14px;
}
.letra3
{
	text-align:center;
	font-family:"Comic Sans MS";
	font-size:14px;
}

</style>
<table width="700" border="1" align="center" cellspacing="0" bordercolor="#000000">
  <tr class="letra">
    <td width="312" bgcolor="#0099CC">PERIODO</td>
    <td width="81" bgcolor="#0099CC">ESTADO</td>
    <td colspan="3" bgcolor="#0099CC">ACCIONES</td>
  </tr>
  <?php
  while($ver_per = mysql_fetch_array($eje_per))
  {
  ?>
  <tr>
    <td class="letra2"><?php echo $ver_per["nombre_periodo"]; ?></td>
    <td class="letra2"><?php echo $ver_per["estado_periodo"]; ?></td>
    <td width="145" class="letra3">

      <?php
    if($ver_per["estado_periodo"]=='Activo')
	{
	?>
      <a href="cerrar_periodo.php" onClick="return confirm('Desea Cerrar este Periodo?')">[Cerrar Periodo]</a>
    <?php
	}
	else
	{
	?>
    <a href="reabrir_periodo.php" onClick="return confirm('Desea Re - Abrir este Periodo?')">[Re - abrir Periodo]</a>
    <?php
	}
	?>
   </td>
    <td width="76" class="letra3"><a href="editar_periodo.php?codigo=<?php echo $ver_per["cod_periodo"]; ?>" onClick="return confirm('Este Periodo esta Abierto, Desea Actualizarlo?')">[Actualizar]</a></td>
    <td width="64" class="letra3"><a href="eliminar_periodo.php?codigo=<?php echo $ver_per["cod_periodo"]; ?>"  onclick="return confirm('Desea Eliminar esta Seccion')">[Eliminar]</a></td>
  </tr>
  <?php
  }
  ?>
</table>
