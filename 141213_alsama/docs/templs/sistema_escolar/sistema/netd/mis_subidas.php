<?php
include("funciones.php");
nologin();

echo "<h3><img src='img/archivos.gif'> Mis Subidas</h3>";
$directorio=opendir("uploads/".$_SESSION['usuario_docente']."/");
$total_archivos=0;
while ($archivo=readdir($directorio))//obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        if($archivo==".." or $archivo=="."){
	}else{
	echo "<a href='uploads/".$_SESSION['usuario_docente']."/".$archivo."'>[".$archivo."]</a><br>"; //si is a dir v$
    	}
    }
    else
    {
	if($archivo=="img_perfil"){
		//no hace nada
	}else{
	        echo  "<a href='uploads/".$_SESSION['usuario_docente']."/".$archivo."'>".$archivo."</a><br>";
		$total_archivos=$total_archivos+1;
	}
    }
}
echo "<hr>";
echo $_SESSION['aux_nombre']." has subido ".$total_archivos." archivos";


?>
