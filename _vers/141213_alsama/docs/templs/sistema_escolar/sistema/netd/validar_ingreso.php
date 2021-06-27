<?php
/*<®> Includes <®>*/
	include_once 'fxs.php';
/*<®> Variables <®>*/
	$usr = isset($_POST['usuario'])? $_POST['usuario'] : '';
	$pas = isset($_POST['clave'])? $_POST['clave'] : '';
/*<®> Verifico si se recivió los datos <®>*/
	if (!$usr or !$pas) {
		$msj = "El USUARIO o la CLAVE no pueden estar vac&iacute;os.";
		mostrarMSJ($msj, 'index.php');
	}
/*<®> Cargo los datos del usuario <®>*/
	$q = "SELECT * FROM alumno WHERE nro_documento = '$usr'";
	if (!$rs = ejecutar($q)) {
		$msj = "El DOCUMENTO no se encuentra&oacute; en la base de datos de alumnos.";
		mostrarMSJ($msj, 'index.php');
	} else {
		$rg = mysql_fetch_array($rs);
		/*<®> Verifico la clave <®>*/
		$pas_bd = $rg['nro_rand'];
		if ($pas != $pas_bd) {
			$msj = "La CLAVE es incorrecta, int&eacute;ntelo nuevamente.";
			mostrarMSJ($msj, 'index.php');
		} else {
			/*<®> Cargo los datos de sesión <®>*/
			session_start();
			$_SESSION['usuario_docente'] = $rg['nro_documento'];
			$_SESSION['clave_docente']   = $rg['clave'];
			$_SESSION['aux_nombre']     = $rg['nombre'];
			/*<®> Redirijo a la página de alumnos <®>*/
			header("Location: index2.php");
		}
	}
?>
