<?php
$regre = $_SERVER['HTTP_REFERER'];
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

if(isset($_POST["agregar"]))
{
$nombre = (isset($_POST["materia"]))? $_POST["materia"]:'';
$grado  = (isset($_POST["grado"]))? $_POST["grado"]:'';

require("conectar.php");

$inser = "insert into materia values(NULL,'$nombre','$grado')";

if(mysql_query($inser))
{
	header("location: $regre");
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
	text-align: right;
}
.doble {
	font-family: "Comic Sans MS";
	font-size: 24px;
	text-align: center;
}
#aaa {
	text-align: center;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="doble">Agregar Materia.</td>
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
		$carrera = (isset($_POST["carrera"]))?$_POST["carrera"]:'';
		$grado = (isset($_POST["grado"]))?$_POST["grado"]:'';
		
		$sql="select * from carrera";
		$ejecuta=mysql_query($sql);
		  
		echo"<select name='carrera'  onChange='submit();'><option>==Seleccione Su Carrera==";
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
		  $oculto2 = (isset($_POST["oculto2"]))?$_POST["oculto2"]:'';
		  if($oculto2==1)
	  {
		  ?></td>
    </tr>
    <tr>
      <td class="letra">Seleccione Su Grado:</td>
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
		  echo "<input name=oculto3 type=hidden value=1>";
		  }
		  else
		  {
			  echo mysql_error();
		  //echo "Este Carrera no tiene grados agregados actualmente.";
		  }
	  }
	  $oculto3 = (isset($_POST["oculto3"]))?$_POST["oculto3"]:'';
	  if($oculto3==1)
	  {
	  ?></td>
    </tr>
  </table>
  <table width="700" border="0" align="center">
    <tr>
      <td width="345">&nbsp;</td>
      <td width="345">&nbsp;</td>
    </tr>
    <tr>
      <td class="letra">Nombre de la Materia:</td>
      <td><label>
        <input name="materia" type="text" id="materia" size="40">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="doble"><input type="submit" name="agregar" id="agregar" value="Agregar Materia" /></td>
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