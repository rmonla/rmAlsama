<?php
require("validar.php");
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {


?>
<?php

if(isset($_POST["agregar"]))
{
	$materias = $_POST["materia"];
	$seccions = $_POST["seccion"];
	header("location: mostrar_alumnos.php?materia=$materias&seccion=$seccions");
	exit;
}
else
{
	echo mysql_error();
}
?>
<style type="text/css">
<!--
.BATAVIA {
	font-family: BATAVIA;
	text-align: center;
}
.leter {	text-align: right;
	font-family: "Comic Sans MS";
}
.CC {
	text-align: center;
	font-family: BATAVIA;
}
ddd {
	text-align: center;
}
nada {
	text-align: center;
}
nada {
	text-align: center;
}
#nada {
	text-align: center;
}
-->
</style>
<?php
require("conectar.php");
$usuario = $_SESSION["usuario"];
$sel_usu = "select * from docente where usuario = '$usuario'";
$eje_usu = mysql_query($sel_usu);
$ver_usu = mysql_fetch_array($eje_usu);
?>

<form id="form1" name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="CC">LISTAR ALUMNOS(AS).</td>
    </tr>
    <tr>
      <td width="347" class="leter">Seleccione Su Carrera:</td>
      <td width="343"><?php 
		require ("conectar.php");
		$carrera = (isset($_POST["carrera"])) ? $_POST["carrera"] : '' ;
		//$carrera = $_POST["carrera"];
		$grado = (isset($_POST["grado"])) ? $_POST["grado"] : '' ;
		//$grado = $_POST["grado"];
		
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
		  $oculto2 = (isset($_POST["oculto2"])) ? $_POST["oculto2"] : '' ;
		  if($oculto2==1)
	  {
		  ?></td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Grado:</td>
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
	  $oculto3 = (isset($_POST["oculto2"])) ? $_POST["oculto2"] : '' ;
	  if($oculto3==1)
	  {
	  ?></td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Seccion:</td>
      <td><?php
	 
		require ("conectar.php");
		  $seccion = (isset($_POST['seccion']))? $_POST['seccion']:'';
		$sql_seccion="select * from seccion where cod_grado = $grado";
		$ejecuta_seccion=mysql_query($sql_seccion);
		  
		echo"<select name=seccion onChange='submit();'><option>==Seleccione Su Seccion==";
		  if($ejecuta_seccion>0)
			{
				  while($todo_seccion=mysql_fetch_array($ejecuta_seccion))
				  {
					echo "<option value='$todo_seccion[cod_seccion]' " ;
             			if($todo_seccion["cod_seccion"]==$seccion)
			 				{
				 				echo "selected='selected'";
			 				}
		echo ">";
					echo $todo_seccion["nombre_seccion"]; 
					
        		 }
				 
		  echo"</select>";
		  echo "<input name=oculto4 type=hidden value=1>";
		  }
		  else
		  {
			  echo mysql_error();
		  //echo "Este Carrera no tiene grados agregados actualmente.";
		  }
	  }
	  $oculto4 = (isset($_POST["oculto4"])) ? $_POST["oculto4"] : '' ;
	  if($oculto4==1)
	  {
	  ?></td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Materia: </td>
      <td><?php
	 
		require ("conectar.php");
		  $usu = $ver_usu["cod_docente"];
		  $materia = (isset($_POST['materia']))?$_POST['materia']:'';
		$sql_materia="select * from docente_mat as a, materia as b 
					  where a.cod_materia = b.cod_materia and a.cod_docente = $usu and b.cod_grado = $grado";
		$ejecuta_materia=mysql_query($sql_materia);
		  
		echo"<select name=materia onChange='submit();'><option>==Seleccione Su Materia==";
		  if($ejecuta_materia>0)
			{
				  while($todo_materia=mysql_fetch_array($ejecuta_materia))
				  {
					echo "<option value='$todo_materia[cod_materia]' " ;
             			if($todo_materia["cod_materia"]==$materia)
			 				{
				 				echo "selected='selected'";
			 				}
		echo ">";
					echo $todo_materia["nombre_materia"]; 
					
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
	  $oculto = (isset($_POST["oculto"])) ? $_POST["oculto"] : '' ;
	  if($oculto==1)
	  {
	  ?></td>
    </tr>
    <tr>
      <td colspan="2" class="CC"><label>
        <input type="submit" name="agregar" id="agregar" value="Ver Alumnos" />
      </label></td>
    </tr>
  </table>
</form>

<?php
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
