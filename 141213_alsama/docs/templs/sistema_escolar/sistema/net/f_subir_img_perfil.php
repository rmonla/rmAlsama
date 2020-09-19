<?php
include("funciones.php");
nologin();//funcion que verifica si esta logueado o no
include("conexion.php");//incluye el fichero que realiza la conexion a la base de datos
?>
<head>
<script type="text/javascript">
        function show_loading(){//funcion que muestra un gif de cargando...
                document.getElementById('gif').innerHTML="<img src='img/loading.gif'>";
                }
</script>

</head>
<form action="subir_img_perfil.php" method="post" enctype="multipart/form-data">
<h3><img src="../admin/img/p1.gif"><img src="img/up.gif">Subir Imagen de Perfil</h3>
Seleccione la imagen:<br>
<br>
<input type="file" name="img_perfil">
<br><br>
<!--onclick en el boton submit se llama a la funcion show_loading()-->
<input type="submit" onclick="show_loading()" value="Subir">
<span id="gif"></span>
</form>
<span id="gif"></span>
