<?php
  //include("validar.php"); // script para validar la sesión
  //extract($_REQUEST);
?>
<?php
if(isset($_POST["boton"]))
{
$dia=$_POST["carrera"];
$bloquenum=$_POST["bloquenum"];
$aula= $_POST["aula"];

require("conecta.php");
if ($dia=='Seleccione' and $bloquenum=='Seleccione')
{
header("location:disponibilidad.php");
exit();
}
else
{
header ("location: REP_aula.php?day=$dia&blo=$bloquenum");
exit();
}
}else{
?>
<style type="text/css">
<!--
.Estilo1 {
	color: #000000;
	font-style: italic;
	font-weight: bold;
}
body {
	background-color: #CCCCCC;
}
-->
</style>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="416" height="175" border="0" align="center" cellspacing="3">
  <tr>
    <td width="408"><form name="form1" method="post" action="">
      <table width="405" height="161" border="0" cellspacing="3" background="Imagenes/Rep_Horario.png">
        <tr>
          <td colspan="3"><div align="center"><span class="Estilo1">SELECCIONAR DIA Y BLOQUE</span></div></td>
          </tr>
        <tr>
          <td width="172"><div align="right"><em><strong>DIA</strong></em></div></td>
          <td width="6">&nbsp;</td>
          <td width="211">
		  <?php 
		  require ("conectar.php");
		  
		$sql="select * from carrera";
		  $ejecuta=mysql_query($sql);
		  
		  echo"<select name=carrera onChange='submit();'><option>Seleccione";
		  if($ejecuta>0)
		  {
		  while($todo=mysql_fetch_array($ejecuta))
		  {
		  ?>
            <?php echo "<option value='$todo[cod_carrera]' " ;?>
            <?php if($todo["cod_carrera"]==$dia){ echo "selected='selected'";} ?>
><?php echo $todo["nombre_carrera"]; 
        }
		  echo"</select>";
		  }
		  else
		  {
		  echo mysql_error();
		  }
		  ?> </td>
        </tr>
        <tr>
          <td><div align="right"><em><strong>BLOQUE</strong></em></div></td>
          <td>&nbsp;</td>
          <td><?php
           
		   require("conecta.php");
		   
		  $dia=$_POST["dia"];
		   
		$sql="select * from ch_bloquenum where id_dia='$dia'";
		  $ejecuta=mysql_query($sql);
		  
		  echo"<select name=bloquenum onChange='submit();'><option>Seleccione";
		  if($ejecuta>0)
		  {
		  while($todo=mysql_fetch_array($ejecuta))
		  {
		  ?>
            <?php echo "<option value='$todo[id_bloquenum]'";?>
            <?php if($todo["id_bloquenum"]==$bloquenum){ echo "selected='selected'";} ?>
><?php echo $todo[numero]; 
        
		  }
		  echo"</select>";
		  
		  }
		  else
		  {
		  echo mysql_error();
		  }
		  
		  ?>
<?php  $bloquenum = $_POST["bloquenum"]; ?></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input type="submit" name="boton" id="boton" value="CONSULTAR">
          </div></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
<?php
}
?>