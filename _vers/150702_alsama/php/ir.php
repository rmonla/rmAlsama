<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Recepción <®>*/
    $opt = estaono('opt');
    if ( !$opt ) exit;
  /*<®> Acceso rápido <®>*/
    switch ($opt) {
      case 'abm':
          $tbl = estaono('tbl');
          $f = "../p_$tbl/abm.php";
          $dats = ( $id = estaono('id') )? "id=$id" : '';
        break;
      
      default:
        # code...
        break;
    }
    //var_dump($f, $dats);
		if ( file_exists($f) ){
      $dats = ( $dats )? "?$dats" : '' ;
			header("Location: $f$dats");
    }
		else {
    /*<®> Acceso por opciones <®>*/
			$opts = array(
				'sistema' => 'p_sis/sis.php'
			);	
		/*<®> Ejecuto <®>*/
			if ( isset($opts[$opt]) ){
				$f = $opts[$opt];
				header( "Location: $f" );
			}
			else
				echo "<h1>Opción no Encontrada</h1>";
		}	
?>