<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Recepción <®>*/
		if ( !$opt = estaono('opt') ) exit;
		$k = $opt;
	/*<®> Acceso rápido <®>*/
		$f = "../p_$k/$k.php";
		if ( file_exists($f) )
			include_once $f;
		else {
	/*<®> Acceso por opciones <®>*/
			$opts = array(
				'concursos' => '../p_concs/concs.php'
			);	
		/*<®> Ejecuto <®>*/
			if ( isset($opts[$opt]) )
				include_once $opts[$opt];
			else
				echo "<h1>Opción no Encontrada</h1>";
		}	
?>