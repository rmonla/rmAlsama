<?php
$conexion=mysql_connect("127.0.0.1","root","pescado");
mysql_select_db("website",$conexion);
$reg_dni=mysql_query("select dni from alumno where dni='$_POST[dni]'",$conexion);
$reg_clave=mysql_query("select clave from alumno where clave='$_POST[clave]'",$conexion);

if($reg_dni2=mysql_fetch_array($reg_dni) && $reg_clave2=mysql_fetch_array($reg_clave)){
  echo "Login exitoso";
  session_start();
  setcookie($_REQUEST['dni'],$_REQUEST['clave'],0);
  if(isset($_COOKIE['dni'])){
    include("holamundo.php");
  }
}
else{
  echo "Usuario o Password incorrectos";
}

?>
