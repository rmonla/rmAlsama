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
$seccion        = $_POST["seccion"];
$codigo_alum    = $_POST["carnet"];
$nombre_alum    = $_POST["nombre_alumno"];
$apellido_alum  = $_POST["apellido_alumno"];
$direccion_alum = $_POST["direccion_alumno"];
$telefono_alum  = $_POST["telefono_alumno"];
$sexo_alum      = $_POST["sexo_alumno"];
$email_alum     = $_POST["correo_alumno"];
$nombre_resp    = $_POST["nombre_resp"];
$apellido_resp  = $_POST["apellido_resp"];
$direccion_resp = $_POST["direccion_resp"];
$telefono_resp  = $_POST["telefono_resp"];
$sexo_resp      = $_POST["sexo_resp"];
$usuario        = $_POST["usuario"];
$password       = $_POST["password"];
$imagen         = $_FILES["imagen"]["name"];

require("conectar.php");

copy($_FILES["imagen"]["tmp_name"],"imagen_usuario/".$_FILES["imagen"]["name"]);
$inser_alum = "insert into alumno values($codigo_alum,'$nombre_alum','$apellido_alum','$direccion_alum','$telefono_alum','$sexo_alum','$email_alum','$usuario','$seccion')";

$inser_resp = "insert into responsable values(NULL,'$nombre_resp','$apellido_resp','$direccion_resp','$telefono_resp','$sexo_resp',$codigo_alum)";
mysql_query($inser_resp);

$inser_usu = "insert into usuario values('$usuario','$password','3','$imagen','$nombre_alum $apellido_alum')";
mysql_query($inser_usu);

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
-->
</style>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="700" border="0" align="center">
    <tr>
      <td width="345">&nbsp;</td>
      <td width="345">&nbsp;</td>
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
      <td><?php 
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
	  $oculto3 = (isset($_POST["oculto3"])) ? $_POST["oculto3"] : '' ;
	  if($oculto3==1)
	  {
	  ?>
      
      </td>
    </tr>
    <tr>
      <td class="leter">Seleccione Su Seccion:</td>
      <td><?php
	 
		require ("conectar.php");
		  $seccion = (isset($_POST['seccion'])) ? $_POST['seccion'] : '' ;
		  //$seccion = $_POST['seccion'];
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#99CC66" class="letra">Agregar Alumno(a).</td>
    </tr>
    <tr>
      <td colspan="2" class="cne"><div id="CollapsiblePanel1" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">Datos Personales</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td class="leter">Carnet:</td>
              <td><label>
                <input name="carnet" type="text" id="carnet" size="15">
              </label></td>
            </tr>
            <tr>
              <td width="345" class="leter">Nombre:</td>
              <td width="345"><label>
                <input type="text" name="nombre_alumno" id="nombre_alumno">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Apellido:</td>
              <td><label>
                <input type="text" name="apellido_alumno" id="apellido_alumno">
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Direccion:</p></td>
              <td><label>
                <textarea name="direccion_alumno" id="direccion_alumno" cols="45" rows="5"></textarea>
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Telefono(casa o Celular):</p></td>
              <td><label>
                <input type="text" name="telefono_alumno" id="telefono_alumno">
              </label></td>
            </tr>
            <tr>
              <td class="leter"><p>Sexo:</p></td>
              <td><label>
                <select name="sexo_alumno" id="sexo_alumno">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </label></td>
            </tr>
            <tr>
              <td class="leter">Correo Electronico</td>
              <td><label>
                <input type="text" name="correo_alumno" id="correo_alumno">
              </label></td>
            </tr>
          </table>
        </div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div id="CollapsiblePanel2" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">Datos del Responsable</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td width="346" class="leter">Nombre:</td>
              <td width="344"><label>
                <input type="text" name="nombre_resp" id="nombre_resp">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Apellido:</td>
              <td><label>
                <input type="text" name="apellido_resp" id="apellido_resp">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Direccion:</td>
              <td><label>
                <textarea name="direccion_resp" id="direccion_resp" cols="45" rows="5"></textarea>
              </label></td>
            </tr>
            <tr>
              <td class="leter">Telefono(casa o celular):</td>
              <td><label>
                <input type="text" name="telefono_resp" id="telefono_resp">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Sexo:</td>
              <td><label>
                <select name="sexo_resp" id="sexo_resp">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </label></td>
            </tr>
          </table>
        </div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div id="CollapsiblePanel4" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">Datos Generales</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td width="345" class="leter">Usuario:</td>
              <td width="345"><label>
                <input type="text" name="usuario" id="usuario">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Password:</td>
              <td><label>
                <input type="text" name="password" id="password">
              </label></td>
            </tr>
            <tr>
              <td class="leter">Imagen:</td>
              <td><label>
                <input type="file" name="imagen" id="imagen">
                </label></td>
            </tr>
            <tr>
              <td colspan="2" class="cntr"><input type="submit" name="agregar" id="agregar" value="Agregar Alumno"></td>
              </tr>
            </table>
        </div>
      </div></td>
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
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", {contentIsOpen:false});
var CollapsiblePanel4 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel4", {contentIsOpen:false});
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
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