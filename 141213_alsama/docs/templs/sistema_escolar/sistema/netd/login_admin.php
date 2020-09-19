<?php
$conexion=mysql_connect("127.0.0.1","root","pescado");
mysql_select_db("website",$conexion);
$reg_user=mysql_query("select usuario from usuario where usuario='$_REQUEST[usuario]'",$conexion);
$reg_pass=mysql_query("select password from usuario where password='$_REQUEST[password]'",$conexion);

if($reg_user2=mysql_fetch_array($reg_user) && $reg_pass2=mysql_fetch_array($reg_pass)){
  echo "Login exitoso";
  session_start();
  setcookie($_REQUEST['usuario'],$_REQUEST['password'],0);
  if(isset($_COOKIE['usuario'])){
    include("holamundo.php");
  }
}
else{
  echo "Usuario o Password incorrectos";
}

?>
