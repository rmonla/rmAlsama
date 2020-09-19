<?php  
$input_arr = array(); 
foreach ($_POST as $key => $input_arr) 
	$_POST[$key] = addslashes(limpiarCadena($input_arr));
foreach ($_GET as $key => $input_arr) 
	$_GET[$key] = addslashes(limpiarCadena($input_arr));

function limpiarCadena($valor){
	$nopermitidos = array(
							"SELECT","COPY","DELETE","DROP","DUMP"," OR ","%",
							"LIKE","--","^","[","]","\\","!","¡","?","=","&");
	return str_replace($nopermitidos,"",$valor);
}

?>