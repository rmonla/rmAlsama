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
.centro {
	text-align: right;
	font-family: "Comic Sans MS";
}
.letter {
	text-align: center;
	font-family: BATAVIA;
}

-->
</style>
<form name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td width="345">&nbsp;</td>
      <td width="345">&nbsp;</td>
    </tr>
    <tr>
      <td class="centro">Seleccione Su Carrera:</td>
      <td>
	  <?php 
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
      <td class="centro">Seleccione Su Grado:</td>
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
      <td class="centro">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="700" border="1" align="center" cellspacing="0" cellpadding="0" bordercolor="#000000">
    <tr>
      <td width="632" bgcolor="#0066CC" class="letter">NOMBRE DE LA MATERIA</td>
      <td colspan="2" bgcolor="#0066CC" class="letter">ACCIONES</td>
    </tr>
  <?php
require("conectar.php");

$grado = $_POST["grado"];
$_pagi_sql = "select * from materia where cod_grado = $grado";

$_pagi_cuantos = 6;
require("paginator.inc.php");
$eje_mat = mysql_query($_pagi_sql);
$con_mat = mysql_num_rows($eje_mat);

    if($con_mat > 0)
	{
		while($ver_mat = mysql_fetch_array($_pagi_result))
		{
	?>
    
    <tr>
      <td><font face="Comic Sans MS" size="+1"><?php echo $ver_mat["nombre_materia"]; ?></font></td>
      <td width="30"><a href="editar_materia.php?codigo=<?php echo $ver_mat["cod_materia"]; ?>"><img src="iconos/edi.png" width="30" height="30" border="0"></a></td>
      <td width="30"><a href="eliminar_materia.php?codigo=<?php echo $ver_mat["cod_materia"]; ?>"  onclick="return confirm('Desea Eliminar esta Seccion')"><img src="iconos/eliminar.png" width="30" height="30" border="0"></a></td>
    </tr>
    <?php
		}
	}
	else
	{
	?>
    
    
    <tr>
      <td colspan="3" align="center"><font face="Comic Sans MS" size="+2" color="#FF0000">NO SE HAN ENCONTRADO RESULTADOS EN LA BUSQUEDA</font></td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td colspan="3" align="center"><font face="Comic Sans MS" size="-1"><?php echo $_pagi_navegacion ?></font></td>
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