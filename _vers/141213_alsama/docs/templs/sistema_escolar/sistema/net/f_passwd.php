<?php
include("funciones.php");
nologin();//funcion para verificar si esta logueado o no
?>
<head>
	<script type="text/javascript">
	function verificar(clave2){//funcion verificar
		var clave1 = document.getElementById('clave1');//guarda en clave1 el contenido del input clave1
		if(clave1.value != clave2){//si clave1 es distinta a clave2 hace esto
			document.getElementById('mensaje').innerHTML="<font color='red'><b>Las claves no coinciden</b></font>";//no coinciden
		}else{//sino, dice que si coinciden
			document.getElementById('mensaje').innerHTML="<font color='green'><b>OK</b></font>";
		}
	}
	</script>
</head>

<form method="post" action="passwd.php">
<h3><img src="img/clave.gif">Cambiar Clave</h3>
<table>
<tr><td>
Clave Actual:</td><td> <input type="password" name="clave_actual"></td></tr>
<tr>
<td>
 &nbsp </td>
</tr>
<tr><td>
Clave Nueva:</td><td> <input type="password" name="clave1" id="clave1"></td></tr>
<tr><td>
<!-- 
//al hacer clic en el input clave2, se llama a la funcion verificar y se le pasa como parametro el contenido del input clave2
-->
Reingrese Clave Nueva:</td><td> <input type="password" name="clave2" id="clave2" onkeyup="verificar(this.value);"> <span id="mensaje"></span></td></tr>
</table>
<input type="submit" value="Cambiar Clave">
</form>
