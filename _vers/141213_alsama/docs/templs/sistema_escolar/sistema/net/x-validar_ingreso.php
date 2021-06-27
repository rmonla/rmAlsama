<?php
session_start();
var_dump($_SESSION);
include("conexion.php");

$registros=mysql_query("select nro_curso,nombre,nro_documento,nro_rand from alumno where nro_documento='$_POST[usuario]'",$conexion);

if($talumno=mysql_fetch_array($registros))
{
  if($talumno['nro_rand']==$_POST['clave'] && $talumno['nro_documento']==$_POST['usuario']){
    //crea la sesion
    $_SESSION['usuario_alumno']=$_REQUEST['usuario'];
    $_SESSION['clave_alumno']=$_REQUEST['clave'];
    $_SESSION['aux_nombre']=$talumno['nombre'];
    $_SESSION['nro_curso']=$talumno['nro_curso'];
    header("Location: index2.php");
    mysql_close($conexion);
  }
  else {
    echo "Usuario o Clave incorrecta";
  }
}
?>
