<?php
require("validar.php");
require("conectar.php");

if(isset($_POST["agregar"]))
{
$titulo 		= $_POST["titulo"];
$descripcion	= $_POST["descripcion"];
$fecha			= $_POST["fecha"];
$imagen			= $_FILES["imagen"]["name"];
$codigo 		= $_GET["codigo"];

if(empty($imagen))
{
$inser = "update noticias
		  set
		  titulo			= '$titulo',
		  descripcion		= '$descripcion',
		  fecha_realizacion	= '$fecha'
		  where cod_noticia = $codigo";	
}
else
{
copy($_FILES["imagen"]["tmp_name"],"imagen_noticias/".$_FILES["imagen"]["name"]);

$inser = "update noticia
		  set
		  titulo			= '$titulo',
		  descripcion		= '$descripcion',
		  fecha_realizacion	= '$fecha',
		  imagen_noticia	= '$imagen'
		  where cod_noticia = $codigo";	

}

if(mysql_query($inser))
{
	header("location: ver_noticia.php");
	exit;
}
else
{
	echo mysql_error();
}
}
else
{
$codi = $_GET["codigo"];	
$sel_noti = "select * from noticias where cod_noticia = $codi";
$eje_noti = mysql_query($sel_noti);
$ver_noti = mysql_fetch_array($eje_noti);
?>
<style>
.centro
{
	text-align:center;
	font-family:"Comic Sans MS";
	font-size:24px;
}
.derecha
{
	text-align:right;
	font-family:"Comic Sans MS";
}
.izquierda
{
	text-align:left;
	font-family:"Comic Sans MS";
}
</style>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="700" border="0" align="center" cellspacing="0">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="centro">Agregar Noticia.</td>
    </tr>
    <tr>
      <td width="348">&nbsp;</td>
      <td width="348">&nbsp;</td>
    </tr>
    <tr>
      <td class="derecha">Titulo:</td>
      <td><label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $ver_noti["titulo"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td class="derecha">Descripcion:</td>
      <td><label>
        <textarea name="descripcion" id="descripcion" cols="45" rows="5"><?php echo $ver_noti["descripcion"]; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="derecha">Fecha de Realizacion:</td>
      <td><label>
        <input type="text" name="fecha" id="fecha" value="<?php echo $ver_noti["fecha_realizacion"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td class="derecha">Imagen de la Noticia:</td>
      <td><label>
        <input type="file" name="imagen" id="imagen" <?php echo $ver_noti["imagen_noticia"]; ?>>
      </label></td>
    </tr>
    <tr>
      <td class="derecha">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="centro"><label>
        <input type="submit" name="agregar" id="agregar" value="Actualizar Noticia">
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>