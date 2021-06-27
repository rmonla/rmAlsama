<?php
if(isset($_POST["agregar"]))
{
$seccion		= $_POST["seccion"];
$codigo_alum	= $_POST["carnet"];
$nombre_alum	= $_POST["nombre_alumno"];
$apellido_alum	= $_POST["apellido_alumno"];
$direccion_alum	= $_POST["direccion_alumno"];
$telefono_alum	= $_POST["telefono_alumno"];
$sexo_alum		= $_POST["sexo_alumno"];
$email_alum		= $_POST["correo_alumno"];
$codigo			= $_GET["codigo"];

require("conectar.php");


$inser_alum = "update alumno set
			   nombre_alum 		= '$nombre_alum',
			   apellido_alum	= '$apellido_alum',
			   direccion_alum	= '$direccion_alum',
			   telefono_alum	= '$telefono_alum',
			   sexo_alum		= '$sexo_alum',
			   email			= '$email_alum'
			   where cod_alumno	= $codigo";


if(mysql_query($inser_alum))
{
	header("location: ver_alumno.php");
	exit;
}
else
{
	echo mysql_error();
}
}
else
{
require("conectar.php");
$codi = $_GET["codigo"];
$sel = "select * from carrera as a, grado as b, seccion as c, responsable as d, usuario as e, alumno as f
			 where a.cod_carrera = b.cod_carrera and b.cod_grado = c.cod_grado and e.usuario = f.usuario and 
			 f.cod_alumno = d.cod_alumno and f.cod_alumno = $codi";
$eje = mysql_query($sel);
$ver = mysql_fetch_array($eje);
?>
<style type="text/css">
<!--
.letra {
	font-size: 24px;
	text-align: center;
	font-family: "Comic Sans MS";
}
.leter {
	text-align: right;
	font-family: "Comic Sans MS";
}
cndd {
	text-align: center;
}
.cntr {
	text-align: center;
}
.bbb {
	font-weight: bold;
}
-->
</style>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="700" border="0" align="center">
    <tr>
      <td width="256">&nbsp;</td>
      <td width="442">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="letra">Datos Requeridos.</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Carrera:</td>
      <td class="bbb"><font face="Comic Sans MS" size="-1"><?php echo $ver["nombre_carrera"]; ?></font></td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Grado:</td>
      <td class="bbb"><font face="Comic Sans MS" size="-1"><?php echo $ver["nombre_grado"]; ?></font></td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Seccion:</td>
      <td class="bbb"><font face="Comic Sans MS" size="-1"><?php echo $ver["nombre_seccion"]; ?></font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#99CC66" class="letra">Actualizar Alumno(a).</td>
    </tr>
    <tr>
      <td colspan="2" class="cne"><div id="CollapsiblePanel1" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">Datos Personales</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td class="leter">Carnet:</td>
              <td><label>
                <input name="carnet" type="text" disabled="disabled" id="carnet" size="15" readonly="readonly" value="<?php echo $ver["cod_alumno"]; ?>">
              </label></td>
            </tr>
            <tr>
              <td width="345" class="leter">Nombre:</td>
              <td width="345"><label>
                <input type="text" name="nombre_alumno" id="nombre_alumno" value="<?php echo $ver["nombre_alum"]; ?>">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Apellido:</td>
              <td><label>
                <input type="text" name="apellido_alumno" id="apellido_alumno" value="<?php echo $ver["apellido_alum"]; ?>">
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Direccion:</p></td>
              <td><label>
                <textarea name="direccion_alumno" id="direccion_alumno" cols="45" rows="5"><?php echo $ver["direccion_alum"]; ?></textarea>
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Telefono(casa o Celular):</p></td>
              <td><label>
                <input type="text" name="telefono_alumno" id="telefono_alumno" value="<?php echo $ver["telefono_alum"]; ?>">
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Sexo:</p></td>
              <td><label>
                <select name="sexo_alumno" id="sexo_alumno"><option><?php echo $ver["sexo_alum"]; ?></option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </label></td>
            </tr>
            <tr>
              <td class="leter">Correo Electronico</td>
              <td><label>
                <input type="text" name="correo_alumno" id="correo_alumno" value="<?php echo $ver["email"]; ?>">
              </label></td>
            </tr>
          </table>
        </div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="letra"><span class="cntr">
        <input type="submit" name="agregar" id="agregar" value="Actualizar Alumno" />
      </span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  <span class="cntr">
</span>
</form>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
<?php
	  }
?>