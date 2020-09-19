<?php
function nologin(){
	session_start();
	if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
        header("Location: index.php");
	}
}
/*function obtener($arg1,$arg2,$arg3,$arg4){
	for($i=0;$i<=3;$i++){
		$var.$i=$_REQUEST['$arg.$i'];
		$obtenidos[]=$var.$i;
	}
	return $obtenidos[];
}
*/
?>
