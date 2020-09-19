<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

if(isset($_POST["agregar"]))
{
$seccion = (isset($_POST["nombre"]))? $_POST["nombre"]:'';
$grado = (isset($_POST["grado"]))? $_POST["grado"]:'';
require("conectar.php");

$inser = "insert into seccion values(NULL,'$seccion',$grado)";

if(mysql_query($inser))
	{
		header("location: ver_seccion.php");
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
.letra {
	font-family: "Comic Sans MS";
	font-size: 24px;
	text-align: center;
}
.new {
	font-family: "Comic Sans MS";
	text-align: right;
}
.centro {	text-align: center;
	font-family: "Comic Sans MS";
	font-size: 24px;
}
.letra1 {	font-family: "Comic Sans MS";
	text-align: right;
}
.centerrr {
	text-align: center;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="centro">Datos Requeridos.</td>
    </tr>
    <tr>
      <td width="344">&nbsp;</td>
      <td width="346">&nbsp;</td>
    </tr>
    <tr>
      <td class="letra1">Seleccione Su Carrera:</td>
      <td><?php 
		require ("conectar.php");
		$carrera = (isset($_POST["carrera"]))? $_POST["carrera"]:'';
		$grado = (isset($_POST["grado"]))? $_POST["grado"]:'';
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
		  echo "<input name=oculto2 type=hidden value=1>";
		  }
		  else
		  {
		  echo mysql_error();
		  }
		   $oculto2 = (isset($_POST["oculto2"]))? $_POST["oculto2"]:'';
		   if($oculto2==1)
	  {
		  ?></td>
    </tr>
    <tr>
      <td class="letra1">Seleccione Su Grado:</td>
      <td><?php
	 
		require ("conectar.php");
		  
		$sql_grado="select * from grado where cod_carrera = $carrera";
		$ejecuta_grado=mysql_query($sql_grado);
		  
		echo"<select name=grado onChange='submit();'><option>==Seleccione Su Grado==";
		  if($ejecuta_grado>0)
			{
				  while($todo_grado=mysql_fetch_array($ejecuta_grado))
				  {
					echo "<option value='$todo_grado[cod_grado]' " ;
             			if($todo_grado["cod_grado"]==$grado)
			 				{
				 				echo "selected='selected'";
			 				}
		echo ">";
					echo $todo_grado["nombre_grado"]; 
					
        		 }
				 
		  echo"</select>";
		  echo "<input name=oculto type=hidden value=1>";
		  }
		  else
		  {
			  echo mysql_error();
		  //echo "Este Carrera no tiene grados agregados actualmente.";
		  }
	  }
	  ?></td>
    </tr>
    <tr>
      <td class="letra1">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php
    $oculto = (isset($_POST["oculto"]))? $_POST["oculto"]:'';
    if($oculto==1)
	{
	?>
    <tr>
      <td colspan="2" bgcolor="#99CC66" class="centro">Agregar Seccion.</td>
    </tr>
    <tr>
      <td class="letra1">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="letra1"><span class="new">Nombre de la Seccion:</span></td>
      <td><input name="nombre" type="text" id="nombre" size="40" /></td>
    </tr>
    <tr>
      <td class="letra1">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="centerrr"><span class="letra">
        <input type="submit" name="agregar" id="agregar" value="Agregar Seccion" />
      </span></td>
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