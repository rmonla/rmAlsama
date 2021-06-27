<?php
include("funciones.php");
nologin();
include("conexion.php");
if($_POST['clave1'] != $_POST['clave2']){
	echo "Las claves no coinciden";
}else{
	$consulta=mysql_query("select nro_rand from alumno where nro_documento='$_SESSION[usuario_alumno]'",$conexion);
	if ($alumno=mysql_fetch_array($consulta))
	{
		if($alumno['nro_rand']==$_POST['clave_actual']){
			$registros=mysql_query("update alumno set nro_rand='$_REQUEST[clave2]' where nro_documento='$_SESSION[usuario_alumno]'",$conexion);
	        	echo "Clave Cambiada<br><br><a href='f_passwd.php'>Volver</a>";
		}else{
		echo "Clave Actual Incorrecta";
		}
	}else{
		echo "Clave Incorrecta";
	}
}
?>
