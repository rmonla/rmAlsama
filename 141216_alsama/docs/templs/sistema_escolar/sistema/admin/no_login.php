<?php
include("funciones.php");
session_start();//para usar las variables globales

if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
        header("Location: index.php");
}
?>

