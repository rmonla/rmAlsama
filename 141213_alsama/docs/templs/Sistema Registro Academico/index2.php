<?php
$usuario  = $_POST["usuario"];
$password = $_POST["password"];


if(isset($_POST["enviar"]))
{

require("conectar.php");

$sql = "SELECT *
        FROM usuario
		WHERE usuario = '$usuario' AND password='$password'";
$con = mysql_query($sql);
$tot = mysql_num_rows($con);
if($tot>0)
  {
   $ver = mysql_fetch_array($con);
    session_start();
	header("location: pasarela.php");
	$_SESSION["usuario"] = $ver["usuario"];
    $_SESSION["nombre_completo"] = $ver["nombre_completo"];
	$_SESSION["ingreso"] = "si";
	$_SESSION["nivel"]= $ver["nivel"];
	$_SESSION["imagen"]= $ver["imagen"];
   exit;
  }
  else
  {
  $texto = "Usuario o Contrasenia Invalidos";
  header("location: index.php?msj=$texto&correo=$usuario");
  exit;
  }
}else
{
}
?>
