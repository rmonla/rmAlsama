<?php
include("funciones.php");
nologin();//funcion q verifica si el visitante esta logueado o no

echo "<h3><img src='img/del_dir.gif' width='35px' height='35px'> Eliminar Archivos</h3>";//muestra el titulo del formulario
$directorio=opendir("uploads/".$_SESSION['nro_curso']."/".$_SESSION['usuario_alumno']."/");//entra a la carpeta del alumno y asigna su contenido a la variable
												//$directorio
$total_archivos=0;//variable que va a acumular el total de archivos
while ($archivo=readdir($directorio))//obtenemos un archivo y luego otro sucesivamente con el loop while
{
	if(is_dir($archivo)){//la funcion is_dir() recibe como parametro un objeto, y si el objeto es un directorio la funcion retorna true
				// no se muestra el directorio. Ver en linux los directorio de enlace simbolico de atras (..) y (.)
	}else{
		if($archivo=="img_perfil"){
			//no hace nada
			}else{
			//sino es un directorio, imprime el nombre y un enlace hacia el objeto o archivo
			echo  "<a href='eliminar_confirmar.php?ruta=uploads/".$_SESSION['nro_curso']."/".$_SESSION['usuario_alumno']."/".$archivo."'>".$archivo."</a><br>";
			$total_archivos=$total_archivos+1;//le suma uno al total de archivos
			}
	}
}
echo "<hr>";//linea
echo $_SESSION['aux_nombre']." has subido ".$total_archivos." archivos";// Mensaje: usuario, has subido 12 archivos
?>
