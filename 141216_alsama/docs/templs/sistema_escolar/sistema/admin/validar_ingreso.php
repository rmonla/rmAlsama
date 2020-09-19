<?php
session_start();
include("conexion.php");

$registros=mysql_query("select usuario,clave from  clave_admin",$conexion);

if($tabla=mysql_fetch_array($registros))
{
  if($tabla['clave']==$_POST['clave'] && $tabla['usuario']==$_POST['usuario']){
    echo "Login Exitoso";
    header("Location: index2.php");
	 //crea la sesion
    $_SESSION['usuario']=$_REQUEST['usuario'];
    $_SESSION['clave']=$_REQUEST['clave'];
  }
  else {
    echo "Usuario o Clave incorrecta";
  }
}
?>
