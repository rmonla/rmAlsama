<?php
include("funciones.php");
nologin();
?>
<head>
<script type="text/javascript">
        function verificar(){
		document.getElementById('gif').innerHTML="<img src='img/loading.gif'>";
        	}
</script>

</head>
<form action="subir_archivo.php" method="post" enctype="multipart/form-data">
<h3><img src="img/up.gif">Subir Archivo</h3>
Seleccione el archivo:<br> 
<br>
<input type="file" name="foto">
<br><br>
<input type="submit" onclick="verificar()" value="Subir">
<span id="gif"></span>
</form>
<span id="gif"></span>
