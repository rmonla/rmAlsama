<?php
require("conectar.php");

$sel_noti = "select * from noticias";
$eje_noti = mysql_query($sel_noti);


?>
<style>
.centro
{
	text-align:center;
	font-family:"Comic Sans MS";
}

.centro2
{
	text-align:center;
	font-family:"Comic Sans MS";
	font-size:14px;
}

.centro3
{
	text-align:left;
	font-family:"Comic Sans MS";
	font-size:14px;
}

.left
{
	text-align:left;
	font-family:"Comic Sans MS";
}

.right
{
	text-align:right;
	font-family:"Comic Sans MS";
}

</style>

<p class="centro">NOTICIAS INSTITUCIONALES.</p>
<?php
while($ver_noti = mysql_fetch_array($eje_noti))
{
?>

<table width="449" border="0" align="center" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#0099CC" class="left">TITULO: <?php echo $ver_noti["titulo"]; ?></td>
  </tr>
  <tr>
    <td width="180" rowspan="3"><img src="imagen_noticias/<?php echo $ver_noti["imagen_noticia"] ?>" width="167" height="95"></td>
    <td width="376" class="left">DESCRIPCION:</td>
  </tr>
  <tr>
    <td height="46" class="centro3"><?php echo $ver_noti["descripcion"]; ?></td>
  </tr>
  <tr>
    <td height="21" class="centro3"><span class="left">FECHA:</span><?php echo $ver_noti["fecha_realizacion"]; ?></td>
  </tr>

</table>
<?php
}
?>