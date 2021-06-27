<?php
if($conexion=mysql_connect("localhost","root","")){
	//Conexión establecida correctamente
}else{
	echo "<br>No ha podido realizarse la conexión<br>";
        //IR A PÁGINA DE ERROR
}

$bd="colegio";

/*<®> fx conexion <®>*/
	/**
	 * Función que retorna la conexion de la BD.
	 */
function conexion(){
	/* Inicilizo  las variables de conexion */
		$mysql_host       = "localhost";
		$mysql_usuario    = "root";
		$mysql_contrasena = "";
		$basedatos        = "colegio";
	/* Conecto al motor de base de datos */
		if (!($conexion_mysql = mysql_connect($mysql_host, $mysql_usuario,$mysql_contrasena))){
			/*ERROR*/
			$msj = 'No se pudo establecer la conexión con la BD.';
			echo $msj;
			exit;
		}
	/* Selecciono la base de datos */
		if (!mysql_select_db($basedatos, $conexion_mysql)){
			/*ERROR*/
			$msj = 'No se pudo seleccionar la BD.';
			echo $msj;
			exit;
		}	
	return $conexion_mysql;
}
/*<®> fx ejecutar <®>*/
	/**
	 * Función que retorna registros desde una consulta SQL.
	 */
function ejecutar($sql){
	if (!$rs = mysql_query($sql, conexion())) return false;
	return $rs;
}
?>