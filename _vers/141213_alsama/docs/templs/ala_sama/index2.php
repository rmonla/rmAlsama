<?php
// session_name('Colegio');
// session_start();
// session_register('id');
// session_register('nombre');

$tabla = $_GET["opc"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
  <title>Centro de control</title>
  <meta name="GENERATOR" content="Dev-PHP 2.0.12">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/css1.css" type="text/css">
  
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td id="titulo">AL SAMA </td>
    </tr>
    <tr><td id="profesor">&nbsp;&nbsp;&nbsp;Profesor : <?php  //echo $_SESSION['nombre']; ?></td></tr>
    <tr>
      <td id="menu">
&nbsp;<: : MEN&Uacute : :>&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=profesores" target="_self">
				Profesores
			</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=cursos" target="_self">
				Cursos
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=modulos" target="_self">
				M&oacute;dulos
			</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=especialidades" target="_self">
				Especialidades
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=clases" target="_self">
				Clases
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=alumnosde&opc=alumnos" target="_self">
				Notas
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listar&opc=alumnos" target="_self">
				Alumnos
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index2.php?acc=listados" target="_self">
				Documentos
			</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index.php" target="_self">
				Seleccionar profesor
			</a>            
      </td>
    </tr>
	<tr>
      <td id="cuerpo">
	  <br>
	<?php
		include($_GET["acc"].".php");
	?>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>