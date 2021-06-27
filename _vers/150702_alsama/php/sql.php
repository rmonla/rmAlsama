<?php  
	/*<®> Includes <®>*/
		include_once('fxs.php');
	/*<®> Verifico lo enviado <®>*/
		$modo = estaono('modo');
		$frm  = estaono('frm');
	/*<®> Predetermino Variables <®>*/
		$msj = '';
		if ( !$modo || !$frm ) exit;
		else {
			/*<®> Cargo el array de forms <®>*/
				$k = substr($frm, 3); // abmtel -> tel
				$tbl = $k.'s'; // tel -> tels
				$ks_que_no = array('per', 'pertut', 'curdoc', 'curalu', 'curalunot');
				if( !in_array($k, $ks_que_no) )
					$req[$frm][] = $k;// $req['abmtel'][] = 'tel'
				/*<®> Algunos requeridos especiales <®>*/
          $req['abmper'][]    = 'docn';
          $req['abmpertut'][] = 'idpera';
          $req['abmcurdoc'][] = 'idper';
          $req['abmcuralu'][] = 'idper';
          $req['abmcuralunot'][] = 'idcuralu';
			/*<®> Obtengo las columnas de la tabla <®>*/
				$q = "SHOW FIELDS FROM $tbl";
				if ( $rs = ejecuta_sql($q) ){
					/*<®> Cargo los datos que vienen 
					según su columna de la tabla <®>*/
					while ( $rg = $rs->fetch_assoc() ) {
						$c = $rg['Field'];
						if ( isset($_POST[$c]) ) 
							$d[$c] = $_POST[$c];
					}
					if ( !isset($d) ) exit;
				}
			/*<®> Armo la string sql según $modo <®>*/
				switch ($modo) {
					case 'a':
						/*<®> Verifico los requeridos <®>*/
							if (!req($req[$frm], $d)){
								echo "No se recibió algún campo clave para agregar el registro.";
								exit;
							}
						/*<®> Formateo los datos <®>*/
							$d = datFormat($tbl, $d);
						/*<®> Armo las string de columnas y valores <®>*/
							foreach ($d as $k => $v) {
								if ( $k != 'id' ){
									$str_c[] = "$k";
									$str_v[] = "'$v'";
								}
							}
						/*<®> Verifico si se rebieron valores <®>*/
							if ( !isset($str_v) ) exit;
						/*<®> Concateno <®>*/
							$str_c = implode(',', $str_c);
							$str_v = implode(',', $str_v);
						/*<®> Ejecuto la consulta <®>*/
							$q = "INSERT INTO $tbl ($str_c) VALUES ($str_v)";
							if ( $rs = ejecuta_sql($q, false) )
								echo "Se agregó correctamente el registro.";
							else
								echo "No se pudo ejecutar la consulta.";
						break;
					case 'b':
							if ( !$id = estaono('id') ){
								echo "No se obtuvo el id del registro a eliminar.";
								exit;
							}
							$qs = arr_qs_del($tbl, $id);
							foreach ($qs as $q) 
								if( !$rs = ejecuta_sql($q, false) )
									echo "Error al tratar eliminar el registro";
							echo "Se eliminó correctamente el registro.";
							break;
					case 'm':
						/*<®> Verifico los requeridos <®>*/
							$id = estaono('id');
							$vreq = req($req[$frm], $d);
							if ( !$id || !$vreq ){
								echo "No se recibió algún campo clave para modificar el registro.<br>";
								//print_r($req[$frm]);
								//print_r($_POST);
								exit;
							}
						/*<®> Formateo los datos <®>*/
							$d = datFormat($tbl, $d);
						/*<®> Armo la string de datos <®>*/
							/*<®> Cargo array de str_d <®>*/
								foreach ($d as $k => $v)
									if ( $k != 'id' ) 
										$str_d[] = "$k='$v'";
								if ( !isset($str_d) ) exit;
								/*<®> Concateno <®>*/
									$str_d = implode(',', $str_d);
							/*<®> Ejecuto la consulta <®>*/
								$q = "UPDATE $tbl SET $str_d WHERE id='$id'";
								//var_dump($q);
								//exit;
								if( $rs = ejecuta_sql($q, false) )
									echo "Se actualizó correctamente el registro.";
								else
									echo "No se pudo ejecutar la consulta.";
						break;
				}
		}
function req($arrKeys, $arrDatos, $novacias = true){
	if(!count(array_intersect($arrKeys, array_keys($arrDatos))) == count($arrKeys))
		return false;
	if ($novacias)
		foreach ($arrKeys as $key)
			if(!$arrDatos[$key])
				return false;
	return true;
}
function arr_qs_del ($tbl, $id){
	switch ($tbl) {
		case 'edits':
				//$q[] = "DELETE FROM `tits` WHERE idedit = '$id'";
				$q[] = "DELETE FROM `tels` WHERE ori = 'idedit_$id'";
				$q[] = "DELETE FROM `edits` WHERE id = '$id';";
			break;
		default:
				$q[] = "DELETE FROM $tbl WHERE id='$id'";
			break;
	}
	return $q;
}
function datFormat($tbl, $dats){
	/*<®> Campos para formatear <®>*/
    $f['pers']       = array('fnac' => 'fecha');
    $f['curtems']    = array('ftem' => 'fecha');
    $f['curalunots'] = array('fnot' => 'fecha');
	/*<®> Recorro los dats <®>*/
		foreach ($dats as $k => $v)
			if ( $k != 'id' ) 
				if ( isset($f[$tbl][$k]) )
					$dats[$k] = formatv($v, $f[$tbl][$k]);
	/*<®> Retorno el resultado <®>*/
		return $dats;
}
function formatv($v, $f){
	switch ($f) {
    case 'fecha':
        return date('Y-m-d', strtotime($v));
      break;
		
		default:
			# code...
			break;
	}
}
?>