<?php
include("funciones.php");
nologin();
$ruta=$_SESSION['usuario_docente'];
move_uploaded_file($_FILES['foto']['tmp_name'],"uploads/".$ruta."/".$_FILES['foto']['name']);
?> 
