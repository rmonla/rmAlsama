<?php
	include("funciones.php");
	nologin();
$fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['anio'];
  //si las variables no estan vacias hace esto
  if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['direccion']) && isset($_POST['ciudad']) && isset($_POST['dni']) && isset($_POST['sexo']) && isset($_POST['email'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
    $ciudad=$_POST['ciudad'];
    $dni=$_POST['dni'];
    $sexo=$_POST['sexo'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];
    $nro_rand=1234;

    include("conexion.php");

    $sql="select nro_documento from docente where nro_documento='$dni'";
    $result=mysql_query($sql);
    //si el docente ya existe hace esto
    if (mysql_num_rows($result)>0)
      {
      echo "<h3>ERROR, el docente ya existe</h3>";
      //si no existe lo agrega
      }else{
        mysql_query("insert into docente (nombre,apellido,fecha_nacimiento,direccion,ciudad,nro_documento,sexo,email,telefono,nro_rand) values ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$ciudad', '$dni', '$sexo', '$email','$telefono','$nro_rand')",$conexion);
        echo mysql_error($conexion);
        //echo "<h3>El docente ".$nombre." ".$apellido." se ha dado de alta en el sistema correctamente</h3>";
        //echo "<br> <a href='f_alta_docente.php'>Volver</a>";
	$ruta="../netd/uploads/".$dni;
        mkdir($ruta, 0777);

	$ruta_imagen_perfil=$ruta."/img_perfil";//configura la ruta de creacion del directorio para las imagenes del perfil
        mkdir($ruta_imagen_perfil, 0777);
        header("Location: f_alta_docente.php");
      }
    mysql_close($conexion);
    }else{
      echo "Hay Campos Vacios, asegurese de rellenar todos";
    }
?>
