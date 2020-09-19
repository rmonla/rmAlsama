<?php
include("funciones.php");
nologin();
include("conexion.php");

$registros=mysql_query("select * from alumno where nro_documento='$_POST[dni]'",$conexion);
//verificando que el dni del alumno no este registrado en la base de datos
if($alumno=mysql_fetch_array($registros)>0){
	echo "<h3>El alumno ".$alumno['nombre']." ya esta registrado</h3>";
}
//si no esta registrado que lo registre siempre y cuando haya ingresado dni y las claves ingresadas coincidan
else{
	if(isset($_POST['dni'])){
		//creacion del numero randomico (clave de acceso)
		$nro_rand=rand(1000,9999);
    		//concatenacion de la fecha de nacimiento con formato de dd/mm/yyyy
    		$fechanac=$_POST['dia_nacimiento']."/".$_POST['mes_nacimiento']."/".$_POST['anio_nacimiento'];
    		mysql_query("insert into alumno(nombre,apellido,fecha_nacimiento,direccion,ciudad,nro_documento,sexo,email,especialidad,nro_rand) values('$_POST[nombre]','$_POST[apellido]','$fechanac','$_POST[direccion]','$_POST[ciudad]','$_POST[dni]','$_POST[sexo]','$_POST[email]','$_POST[radio_vinculo]','$nro_rand')",$conexion);
    		mysql_close($conexion);

    		$remitente="noresponder@torrentflux.zapto.org";
    		$destino=$_POST['email'];
    		$asunto="Confirmacion del registro en Tecnica 3";
    		$mensaje="Hola ".$_POST['nombre']." te has registrado correctamente en el sitio de la escuela.<br>"."\n /n"." Tu clave de acceso al sistema es: <h3>".$nro_rand."</h3> ";
    		$encabezados="From: $remitente\nReply-To: $remitente\nContent-Type: text/html; charset=iso-8859-1" ;
    		mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;

    		echo "<h3>Te has registrado correctamente</h3><b> Recibiras un email con tus datos en ".$_REQUEST['email']."</b>";
  		}
}
?>
