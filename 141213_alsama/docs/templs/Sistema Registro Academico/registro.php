<?php 
if (isset($_POST["registrar"]))
{
$email 		= $_POST["email"];	
$password 	= $_POST["password"];
$nombre 	= $_POST["nombre"];

require("conectar.php");

$inser = "insert into usuario values('$email','$password',0,'$nombre','asd.jpg')";

if(mysql_query($inser))
	{
	header("location: index.php");
	exit;
	}
	else
	{
		echo mysql_error();
	}
}
else
{
?>
<style type="text/css">
<!--
.w {
	text-align: center;
}
.l {
	text-align: right;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="600" border="0" align="center">
    <tr>
      <td width="295">&nbsp;</td>
      <td width="295">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="w">Registro de usuarios</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="l">E-Mail:</td>
      <td><label>
        <input type="text" name="email" id="email">
      </label></td>
    </tr>
    <tr>
      <td class="l">Contrasenia:</td>
      <td><input type="text" name="password" id="password"></td>
    </tr>
    <tr>
      <td class="l">Nombre Completo</td>
      <td><input type="text" name="nombre" id="nombre"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="w"><label>
        <input type="submit" name="registrar" id="registrar" value="Registrarse">
      </label></td>
    </tr>
  </table>
</form>
<?php 
}
?>