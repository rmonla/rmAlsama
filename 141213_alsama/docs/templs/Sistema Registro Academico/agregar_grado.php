<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

$carrera = (isset($_POST["carrera"]))? $_POST["carrera"]: '';
if(isset($_POST["agregar"]))
{
require("conectar.php");
$nombre = (isset($_POST["nombre"]))? $_POST["nombre"]: '';

$inser = "insert into grado values(NULL,'$nombre',$carrera)";

if(mysql_query($inser))
	{
		header("location: ver_grado.php");
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
.centro {
	text-align: center;
	font-family: "Comic Sans MS";
	font-size: 24px;
}
.letra {
	font-family: "Comic Sans MS";
	text-align: right;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="centro">Datos Requeridos</td>
    </tr>
    <tr>
      <td width="344">&nbsp;</td>
      <td width="346">&nbsp;</td>
    </tr>
    <tr>
      <td class="letra">Seleccione Su Carrera:</td>
      <td>
	  <?php 
		require ("conectar.php");
		  
		$sql="select * from carrera";
		$ejecuta=mysql_query($sql);
		  
		echo"<select name=carrera onChange='submit();'><option>==Seleccione Su Carrera==";
		  if($ejecuta>0)
			{
				  while($todo=mysql_fetch_array($ejecuta))
				  {
					echo "<option value='$todo[cod_carrera]' " ;
             			if($todo["cod_carrera"]==$carrera)
			 				{
				 				echo "selected='selected'";
			 				}
		echo ">";
					echo $todo["nombre_carrera"]; 
					
        		 }
				 
		  echo"</select>";
		  echo "<input name=oculto type=hidden value=1>";
		  }
		  else
		  {
		  echo mysql_error();
		  }
		  ?>
          </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <?php
  $oculto = (isset($_POST["oculto"])) ? $_POST["oculto"] : '' ;
  if($oculto==1)
  {
  ?>
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#99CC66" class="centro">Agregar Grado</td>
    </tr>
    <tr>
      <td width="245">&nbsp;</td>
      <td width="245">&nbsp;</td>
    </tr>
    <tr>
      <td class="letra">Nombre del Grado:</td>
      <td><label>
        <input name="nombre" type="text" id="nombre" size="40">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="centro"><label>
        <input type="submit" name="agregar" id="agregar" value="Agregar Grado">
      </label></td>
    </tr>
  </table>
</form>
<?php
  }
}
  }
  else
  {
	  	  ?>
	  <script>
      alert('El Periodo ya esta Cerrado, Abra uno Nuevo');
      </script>
	  <?php
  }
?>