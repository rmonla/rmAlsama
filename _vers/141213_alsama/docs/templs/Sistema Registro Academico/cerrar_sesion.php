<?php
require("validar.php");
session_destroy();
$texto = "Sesion Cerrada";
header("location: index.php?msj=$texto");
exit;

?>