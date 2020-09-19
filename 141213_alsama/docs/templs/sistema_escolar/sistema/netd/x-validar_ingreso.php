<?php
session_start();
include("conexion.php");

$registros=mysql_query("select nombre,nro_documento,nro_rand from docente where nro_documento='$_POST[usuario]'",$conexion);

if($tdocente=mysql_fetch_array($registros))
{
  if($tdocente['nro_rand']==$_POST['clave'] && $tdocente['nro_documento']==$_POST['usuario']){
    //crea la sesion
    $_SESSION['usuario_docente']=$_REQUEST['usuario'];
    $_SESSION['clave_docente']=$_REQUEST['clave'];
    $_SESSION['aux_nombre']=$tdocente['nombre'];
    header("Location: index2.php");
    mysql_close($conexion);
  }
  else {
    echo "Usuario o Clave incorrecta";
  }
}
?>
