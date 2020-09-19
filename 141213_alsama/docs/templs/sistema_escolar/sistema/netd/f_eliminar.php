<?php
include("funciones.php");
nologin();

echo "<h3><img src='img/f_del.gif' width='35px' height='35px'> Eliminar Archivos</h3>";
$directorio=opendir("uploads/".$_SESSION['usuario_docente']."/");
$total_archivos=0;
while ($archivo=readdir($directorio))//obtenemos un archivo y luego otro sucesivamente
{
	if(is_dir($archivo)){
	//
	}else{
		if($archivo=="img_perfil"){
			//no hace nada
		}else{
			echo  "<a href='eliminar_confirmar.php?ruta=uploads/".$_SESSION['usuario_docente']."/".$archivo."'>".$archivo."</a><br>";
			$total_archivos=$total_archivos+1;
		}
	}
}
echo "<hr>";
echo $_SESSION['aux_nombre']." has subido ".$total_archivos." archivos";
?>
