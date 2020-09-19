<?php
include("funciones.php");
nologin();

$dir_alumno=$_GET['dir_alumno'];
$nombre=$_GET['nom_alumno'];
$apellido=$_GET['ape_alumno'];

echo "<h2><img src='img/archivos.gif'> Subidas de ".$nombre." ".$apellido."</h2>";

$directorio=opendir("../net/".$dir_alumno."/");
$total_archivos=0;
while ($archivo=readdir($directorio))//obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        if($archivo==".." or $archivo=="."){
	}else{
	echo "<a href='../net/".$dir_alumno."/".$archivo."'>[".$archivo."]</a><br>"; //si is a dir v$
    	}
    }
    else
    {
        echo  "<a href='../net/".$dir_alumno."/".$archivo."'>".$archivo."</a><br>";
	$total_archivos=$total_archivos+1;
    }
}
echo "<hr>";
echo "El alumno ha subido ".$total_archivos." archivos";
?>
