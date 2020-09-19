<?php
include("funciones.php");
nologin();
  $fecha_nacimiento=$_POST['dia']."/".$_POST['mes']."/".$_POST['anio'];
  if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($fecha_nacimiento) && isset($_POST['direccion']) && isset($_POST['ciudad']) && isset($_POST['dni']) && isset($_POST['sexo']) && isset($_POST['email']) && isset($_POST['curso'])){
    include("conexion.php");

    //obtener("nombre","apellido","direccion","ciudad");
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
    $ciudad=$_POST['ciudad'];
    $dni=$_POST['dni'];
    $sexo=$_POST['sexo'];
    $email=$_POST['email'];
    $curso=$_POST['curso'];
    $especialidad=$_POST['especialidad'];
    $nro_rand=1234;
    $nro_curso=$_POST['curso'];
    $telefono=$_POST['telefono'];

    $sql="select nro_documento from alumno where nro_documento='$dni'";
    $result=mysql_query($sql);
      if (mysql_num_rows($result)>0){
        echo "<h3>ERROR, el usuario ya existe</h3>";
      }else{
       
        $insert="INSERT INTO alumno (nombre,apellido,fecha_nacimiento,direccion,ciudad,nro_documento,sexo,email,especialidad,nro_rand,nro_curso,telefono) values ('$nombre','$apellido','$fecha_nacimiento','$direccion','$ciudad','$dni','$sexo','$email','$especialidad','$nro_rand','$nro_curso','$telefono')";
        mysql_query($insert,$conexion);
	$ruta2="../net/uploads/".$nro_curso."/".$dni;//configura la ruta de creacion del directorio de subida /net/uploads/26/38454566
	mkdir($ruta2, 0777);//crea la carpeta con permisos 777 en la ruta configurada en la variable ruta2
	$ruta_imagen_perfil=$ruta2."/img_perfil";//configura la ruta de creacion del directorio para las imagenes del perfil
        mkdir($ruta_imagen_perfil, 0777);
	//echo "<h3>El alumno se ha dado de alta en el sistema</h3><br><br><a href='f_alta_alumno.php'>Volver</a>";
	header("Location: f_alta_alumno.php");
      }
    mysql_close($conexion);
  }else{
  echo "Hay Campos Vacios, asegurese de rellenar todos";
  }

?>
