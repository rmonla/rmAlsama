<?php
// session_name('Colegio');
 session_start();
// session_register('id');
// session_register('nombre');

if($_GET["prof"] == "no")
	echo "<script>window.open('index.php','_self','')</script>";

$_SESSION['id'] = $_GET["prof"];


include("funciones.php");

$resultado = Consulta("select apellidos,nombre from profesores where id_profesor = ".$_SESSION['id']);
$mostrar = mysql_fetch_array($resultado);

$_SESSION['nombre'] = $mostrar["apellidos"].", ".$mostrar["nombre"];

echo "<script>window.open('index2.php?acc=listar&opc=profesores','_self','')</script>";
?>
