<?php
class Alumno {
  private $alumno=array();

  public function __construct($alumno()){
    $this->$alumno()=$alumno();
  }

  public function agregar(){
    include("conexion.php");
    
    $sql="select nro_documento from alumno where nro_documento='$alumno[dni]'";
    $result=mysql_query($sql);
      if (mysql_num_rows($result)>0){
        echo "<h3>ERROR, el usuario ya existe</h3>";
      }else{

        $insert="INSERT INTO alumno (nombre,apellido,fecha_nacimiento,direccion,ciudad,nro_documento,sexo,email,especialidad,nro_rand,nro_curso,telefono) values ('$alumno[nombre]','$alumno[apellido]','$alumno[fecha_nacimiento]','$alumno[direccion]','$alumno[ciudad]','$alumno[dni]','$alumno[sexo]','$alumno[email]','$alumno[especialidad]','$alumno[nro_rand]','$alumno[nro_curso]','$alumno[telefono]')";
        mysql_query($insert,$conexion);
        $ruta2="../net/uploads/".$nro_curso."/".$dni;//configura la ruta de creacion del directorio de subida /net/uploads/26/38454566
        mkdir($ruta2, 0777);//crea la carpeta con permisos 777 en la ruta configurada en la variable ruta2
        $ruta_imagen_perfil=$ruta2."/img_perfil";//configura la ruta de creacion del directorio para las imagenes del perfil
        mkdir($ruta_imagen_perfil, 0777);
        //echo "<h3>El alumno se ha dado de alta en el sistema</h3><br><br><a href='f_alta_alumno.php'>Volver</a>";
        header("Location: f_alta_alumno.php");
  	mysql_close($conexion);
      }
  }
}
?>
