<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['clave'])){
  header("Location: index2.php");
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<a href="../">Volver</a>
<table align="center">
<h3 align="center">INGRESO AL SISTEMA | Admin <img src="img/admin.gif" height="50px" width="45px"><img align="center" src="img/key.gif" height="40px" width="40px">
</h3>

  <tr>
<form method="post" action="validar_ingreso.php">
    <td> Usuario: </td><td> <input type="text" name="usuario" required="required"> </td>
  </tr>
  <tr>
    <td> Clave: </td> <td><input type="password" name="clave" required="required">  </td>
  </tr>
  <tr>
    <td> <input type="submit" value="Ingresar"> </td><td> <a href="#">Si olvido su clave, haga clic aqui.</a></td>
  </tr>
</table>
</form>
<br>
<hr>
<br>
<i>2013 - Informatica</i>

</body>
</html>