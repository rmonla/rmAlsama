<?php
function nologin(){
	session_start();
	if(empty($_SESSION['usuario_docente']) && empty($_SESSION['clave_docente'])){
        header("Location: index.php");
	}
}
?>
