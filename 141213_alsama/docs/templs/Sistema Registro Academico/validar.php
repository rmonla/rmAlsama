<?php
session_start();
if(!isset($_SESSION["ingreso"]) || $_SESSION["ingreso"] != "si")
{
$texto = "USTED NO ES USUARIO, NO INTENTE INGRESAR ASI...";
header("location: index.php?msj=$texto");
exit;
}
?>