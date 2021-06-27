<?php
//Conexión con el servidor
include("conectar.php");

//----------------------------------------------------------------------------------------
//-----------  FUNCIONES -----------------------------------------------------------------
//----------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------
//Ejecuta una consulta
//-----------------------------------------------------------------------------------------
function Consulta($consulta){
	global $bd;
	global $conexion;

	$result = ejecutar($consulta);
	//$result = mysql_db_query($bd,$consulta);
	

	//Detectar posibles errores
	if (mysql_errno($conexion)){
		$iderror = mysql_errno($conexion);
		$msgerror = mysql_error($conexion);

		//voy a quitar las comillas de la variable msgerror
		$msgerror = str_replace("'", " ", $msgerror); 
		
		echo "<script>window.open('error_sql.php?acc=error_sql&cu=error_sql&iderror=".$iderror."&msgerror=".$msgerror."&tabla=".$_GET["opc"]."','_self','')</script>";
	}else{
		return $result;
	}
}

//-----------------------------------------------------------------------------------------
//Devuelve un select con los tipos enum
//-----------------------------------------------------------------------------------------
function valores_enum($cadena,$valor_registro,$nombre_campo){
	preg_match_all("/\'(.*?)\'/",$cadena,$salida, PREG_SET_ORDER);

	$i=0;

	while($salida[$i][1] !=""){
		$salida_enum[$i+1] = $salida[$i][1];
		$i++;
	}

	$salida_enum[0] = ($i);

echo "<select name=\"".$nombre_campo."\">";

for($i=1;$i<=$salida_enum[0];$i++)
	if($valor_registro == $salida_enum[$i])
		echo "<option value=".$salida_enum[$i]." selected=\"true\">".$salida_enum[$i]."</option>";
	else
		echo "<option value=".$salida_enum[$i].">".$salida_enum[$i]."</option>";

echo "</select><br>";

	return $salida_enum;
}

//-----------------------------------------------------------------------------------------
//Crea un formulario a partir de una tabla de una base de datos
//-----------------------------------------------------------------------------------------
function crear_formulario($nombre_tabla,$registro){
$base="colegio";
$tabla=$nombre_tabla;

$conexion=mysql_connect ("localhost","root","");

mysql_select_db ($base, $conexion);

$resultado=mysql_query( "SHOW FIELDS from $tabla",$conexion);

//$Z=mysql_num_cols($resultado);

$contador = 0;

while($v=mysql_fetch_array ($resultado)){

$primaria = 0;

foreach($v as $clave=>$valor) {
	if(!is_int($clave)){
		//echo $clave." - ".$valor."<br>";
		if($clave == "Key" && $valor =="PRI")
			$primaria = 1;

		if($clave == "Field")
     			$nombre_campo = $valor;

		if($clave == "Type"){
			if(ereg("enum", $valor)) {$tipo = "enum";$temp=$valor;}
			if(ereg("tinyint", $valor)) $tipo = "tinyint";
			if(ereg("char", $valor)) $tipo = "char";
			if(ereg("int", $valor)) $tipo = "int";
			if(ereg("date", $valor)) $tipo = "date";
			
			preg_match_all("/\((.*?)\)/",$valor,   $salida, PREG_SET_ORDER);

			$tamano = $salida[0][1];
		}
		
		if($clave == "Default")
			$valor_defecto = $valor;

		if($clave == "Null"){
			if($valor != "YES")
				$nulo = "(*)";
			else
				$nulo = "";
		}
				
 	}
}

echo "<tr>";
$lectura = "";
if($tipo == "enum"){
	echo "<td id=\"listado2\" style=\"text-align:left;\">".$nombre_campo."</td>";
	echo "<td id=\"listado3\" style=\"text-align:left;\">";valores_enum($temp,$registro[$contador],$nombre_campo);echo"</td>";
}else{
	echo "<td id=\"listado2\" style=\"text-align:left;\">".$nombre_campo."</td>";

   	$ventana_ancho = "500px";

	//Si el campo es clave primaria bloqueo el input
	if($primaria==1)
		$lectura = "readonly";
	else
		$lectura = "";

	//Averiguar la tabla a la que tengo que llamar si es una clave externa
	switch($nombre_campo){
		case "id_curso":$ntabla = "cursos";break;
		case "id_modulo":$ntabla = "modulos";break;
		case "id_especialidad":$ntabla = "especialidades";break;
		case "id_profesor":$ntabla = "profesores";break;
		default: $ntabla = "no_tabla";
	}

	//Si el campo es clave externa de otra tabla llamamos a esa tabla
	if((substr($nombre_campo, 0, 3)=="id_") && $primaria==0){
		$llamar = "onclick=\"window.open('datos.php?tabla=".$ntabla."','_blank','scrollbars=1,width=".$ventana_ancho.",height=150px,top=100px,left=100px')\"> "."Haga clic en el campo para seleccionar los datos.";

		$lectura = "readonly";
	}else{
		$llamar = ">";
	}

	$caja = "<input ".$lectura." type=\"text\" name=\"".$nombre_campo."\" value=\"".$registro[$contador]."\" size=\"".$tamano."\" maxlength=\"".$tamano."\" ".$llamar.$nulo;

	echo "<td id=\"listado3\" style=\"text-align:left;\">".$caja."</td>";

}
	$contador++;
}
echo "</tr>";

echo "<tr>";
echo "<td  id=\"listado2\" colspan=\"2\" rowspan=\"1\">* El campo no se puede dejar vac&#237;o.</td>";
echo "</tr>";

mysql_close($conexion);

}
?>