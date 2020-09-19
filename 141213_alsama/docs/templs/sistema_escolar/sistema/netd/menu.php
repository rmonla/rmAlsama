<?php
include("funciones.php");
nologin();
$dni=$_SESSION['usuario_docente'];
        include("conexion.php");
        $registros=mysql_query("select nombre,apellido,nro_documento from docente where nro_documento='$dni'",$conexion);
        if($docente=mysql_fetch_array($registros)){
                $nom=$docente['nombre'];
                $apellido=$docente['apellido'];
        }
        mysql_close($conexion);
        echo "<table border=1 align='center' cellspacing='0' cellpadding='4'><tr><td align='center'> <img src='uploads/".$dni."/img_perfil/perfil.gif'height='50px' width='50px'> </td></tr>";
        echo "<tr><td><b>".$nom." ".$apellido."</b></td></tr></table>";
?>

<a href="subir.php" target="contenido"><img src="img/up.gif" width="20px" height="20px">Subir Archivo</a>
<br>
<?php
$ruta_upload="uploads/".$_SESSION['usuario_docente']."/";
echo "<a href='mis_subidas.php' target='contenido'><img src='img/archivos.gif' width='18px' height='18px'>Mis Subidas</a>";
echo "<br>";
echo "<a href='f_eliminar.php' target='contenido'><img src='img/f_del.gif' height='20px' width='20px'>Eliminar</a>";
echo "<br>";
?>

<hr>
<img src="img/admin.gif"><b>Administracion:</b><br>
<a href="f_subir_img_perfil.php" target="contenido"><img src="../admin/img/p1.gif" height="22px" width="22px">Imagen de Perfil</a><br>
<a href="f_passwd.php" target="contenido"><img src="img/clave.gif" height="22px" width="22px">Cambiar Clave</a><br>
<a href="f_buscar_alumno.php" target="contenido"><img src="img/lupa.gif" height="22px" width="22px">Buscar Alumno</a>
<hr>
<a href="salir.php"><img src="img/salir.gif" height="20px" width="20px">Salir</a>
