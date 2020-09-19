<?php
include("funciones.php");
nologin();
?>
<form action="subir_archivo.php" method="post" enctype="multipart/form-data">
<h3><img src="img/up.gif">Subir Archivo</h3>
Seleccione el archivo:<br> 
<br>
<input type="file" name="foto">
<br><br>
<input type="submit" value="Enviar">
</form>

