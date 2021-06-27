<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {
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
<form id="form1" name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="CC">LISTAR ALUMNOS(AS).</td>
    </tr>
    <tr>
      <td width="347" class="leter">Seleccione Su Carrera:</td>
      <td width="343"><?php 
		require ("conectar.php");
		$carrera = (isset($_POST["carrera"]))? $_POST["carrera"]: '';
		$grado = (isset($_POST["grado"]))? $_POST["grado"]:'';
		
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
	  $oculto3 = (isset($_POST["oculto3"])) ? $_POST["oculto3"] : '' ;
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
  </table>
  <table width="700" border="1" align="center" cellspacing="0" cellpadding="0" bordercolor="#000000">
    <tr class="BATAVIA">
      <td width="241" bgcolor="#0099CC">NOMBRE COMPLETO</td>
      <td width="357" bgcolor="#0099CC">CARRERA</td>
      <td colspan="3" bgcolor="#0099CC">ACCIONES</td>
    </tr>
<?php
require("conectar.php");

$_pagi_sql = "select * from carrera as a, grado as b, seccion as c, alumno as d, usuario as e, responsable as f
			 where a.cod_carrera = b.cod_carrera and b.cod_grado = c.cod_grado and c.cod_seccion = d.cod_seccion
			 and d.cod_alumno = f.cod_alumno and e.usuario = d.usuario and d.cod_seccion=$seccion";

$_pagi_cuantos = 6;
require("paginator.inc.php");
$eje_alum = mysql_query($_pagi_sql);

$con_alum = mysql_num_rows($eje_alum);
if($con_alum>0)
{
	while($ver_alum = mysql_fetch_array($_pagi_result))
	{
?>
    <tr>
      <td><font face="Comic Sans MS" size="-1"><?php echo $ver_alum["nombre_alum"]." ". $ver_alum["apellido_alum"]; ?></font></td>
      <td><font face="Comic Sans MS" size="-1"><?php echo $ver_alum["nombre_carrera"]; ?></font></td>
      <td width="30"><a href="listar_alumno.php?codigo=<?php echo $ver_alum["cod_alumno"];  ?>"><img src="iconos/Lista_Carreras01.png" width="30" height="30" border="0" /></a></td>
      <td width="30"><a href="editar_alumno.php?codigo=<?php echo $ver_alum["cod_alumno"];  ?>"><img src="iconos/edi.png" width="30" height="30" border="0" /></a></td>
      <td width="30"><a href="eliminar_alumno.php?codigo=<?php echo $ver_alum["cod_alumno"];  ?>" onclick="return confirm('Desea Eliminar este Alumno(a)','Eliminar Alumno')"><img src="iconos/eliminar.png" width="30" height="30" border="0" /></a><a href="editar_alumno.php?codigo=<?php echo $ver_alum["cod_alumno"];  ?>"></a></td>
    </tr>
    
    <?php
	}
}
else
{
 ?>
    <tr>
      <td colspan="5" class="CC"><font color="#FF0000">La Consulta no Ha Generado Resultados.</font></td>
    </tr>
    <?php
}
 ?>
 <tr>
      <td colspan="5"><?php echo $_pagi_navegacion ?></td>
    </tr>
  </table>
  <p>
    <?php
	  }
?>
  </p>
</form>
<?php
  }
  else
  {	  ?>
	  <script>
      alert('El Periodo ya esta Cerrado, Abra uno Nuevo');
      </script>
	  <?php
  }
?>