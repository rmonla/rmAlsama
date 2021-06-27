<?php
require("conectar.php");

$codigo = $_GET["codigo"];

$sel_alum = "select * from carrera as a, grado as b, seccion as c, alumno as d, usuario as e
			 where a.cod_carrera = b.cod_carrera and b.cod_grado = c.cod_grado and c.cod_seccion = d.cod_seccion and
			 e.usuario = d.usuario and d.cod_alumno = $codigo";
$eje_alum = mysql_query($sel_alum);
$ver_alum = mysql_fetch_array($eje_alum);

?>
<style type="text/css">
<!--
.der {
	text-align: right;
	font-family: "Comic Sans MS";
}
.CENTRO
{ 
text-align:center;
font-family: "BATAVIA";
}
.jjj {
	font-family: "Comic Sans MS";
	font-size: 14px;
	text-align: left;
}
-->
</style>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td colspan="5" bgcolor="#0099CC" class="CENTRO">NOMBRE COMPLETO: <?php echo $ver_alum["nombre_alum"]." ".$ver_alum['apellido_alum']; ?></td>
  </tr>
  <tr>
    <td width="27" rowspan="9" bgcolor="#CCCC66">&nbsp;</td>
    <td width="240" rowspan="8"><img src="imagen_usuario/<?php echo $ver_alum["imagen"]; ?>" width="254" height="210" border="0"></td>
    <td width="24" rowspan="9" bgcolor="#CCCC66">&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="232">&nbsp;</td>
  </tr>
  <tr>
    <td class="der">Bachillerato:</td>
    <td class="jjj"><?php echo $ver_alum["nombre_carrera"]; ?></td>
  </tr>
  <tr>
    <td class="der">Grado:</td>
    <td class="jjj"><?php echo $ver_alum["nombre_grado"]; ?></td>
  </tr>
  <tr>
    <td class="der">Seccion:</td>
    <td class="jjj"><?php echo $ver_alum["nombre_seccion"]; ?></td>
  </tr>
  <tr>
    <td class="der">Direccion:</td>
    <td class="jjj"><?php echo $ver_alum["direccion_alum"]; ?></td>
  </tr>
  <tr>
    <td class="der">Telefono:</td>
    <td class="jjj"><?php echo $ver_alum["telefono_alum"]; ?></td>
  </tr>
  <tr>
    <td class="der">Sexo:</td>
    <td class="jjj"><?php echo $ver_alum["sexo_alum"]; ?></td>
  </tr>
  <tr>
    <td class="der">Correo Electronico:</td>
    <td class="jjj"><?php echo $ver_alum["email"]; ?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCC66">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
