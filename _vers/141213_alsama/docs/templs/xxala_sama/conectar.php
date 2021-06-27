<?php
if($conexion=mysql_connect("localhost","root","")){
	//Conexión establecida correctamente
}else{
	echo "<br>No ha podido realizarse la conexión<br>";
        //IR A PÁGINA DE ERROR
}

$bd="colegio";
?>