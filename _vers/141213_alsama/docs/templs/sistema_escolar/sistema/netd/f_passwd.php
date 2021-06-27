<?php
include("funciones.php");
nologin();
?>
<head>
	<script type="text/javascript">
	function verificar(clave2){
		var clave1 = document.getElementById('clave1');
		if(clave1.value != clave2){
			document.getElementById('mensaje').innerHTML="<font color='red'><b>Las claves no coinciden</b></font>";
		}else{
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
Reingrese Clave Nueva:</td><td> <input type="password" name="clave2" id="clave2" onkeyup="verificar(this.value);"> <span id="mensaje"></span></td></tr>
</table>
<input type="submit" value="Cambiar Clave">
</form>
