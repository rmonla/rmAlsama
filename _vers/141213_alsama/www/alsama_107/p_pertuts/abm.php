<?php  
	//var pass = CryptoJS.MD5(txt)
  //pass.toString()
  /*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Recepción <®>*/
    $k    = 'pertut';
    $titk = 'TUTOR';
    $idk  = "id$k";
    $id   = estaono('id', false);
    $frm  = "abm$k";
    $tbl  = $k.'s';
    //var_dump($id);
  /*<®> Cargo el registro o predetermino vars. <®>*/
    $c = array(
      'id'     => '',
      'idpera' => '',
      'idpert' => ''
    );
    foreach ($c as $k2 => $v) $d[$k2] = '';
    if ( $id ){
      $q = "SELECT * FROM $tbl WHERE id = '$id'";
      if ( $rs = ejecuta_sql($q) )
        if ( $rg = $rs->fetch_assoc() )
          foreach ($c as $k2 => $v) $d[$k2] = $rg[$k2];
    } 
    /*<®> Estética <®>*/
      //$d['fnac'] = date('d/m/Y', strtotime($d['fnac']));
    //var_dump($q, $id, $d);
?>
<html>
	<head>
		<!-- <script src="js/jquery.maskedinput.js" type="text/javascript"></script> -->
		<script>
    	/*<®> Inicio <®>*/
        $( document ).ready( function(){
        });
      var modo = $('#<?php echo $frm ?> .dat[name=modo]').val();
	  </script>
	</head>
	<body>
		<div id="<?php echo $frm; ?>">
			<?php  
				$tit = 'Alta de '.$titk;
				$modo = 'a';
				if ( $id && $id != '0' ){
					$tit = 'Modficar '.$titk;
					$modo = 'm';
					echo "<input class='dat' type='hidden' name='id' value='$id'>";
				}
			?>
			<input class='dat' type="hidden" name="modo" value="<?php echo $modo; ?>">
			<input class='dat' type="hidden" name="frm" value="<?php echo $frm; ?>">
			<h1><?php echo $tit; ?></h1>
			<table>
				<tbody>
          <tr>
            <th>ALUMNO</th>
            <td>
              <select class='dat' name="idpera" id="idpera">
                <?php opts('pers', "CONCAT_WS(', ', ape, nom)", $d['idpera']); ?>
              </select>
            </td>
          </tr>
					<tr>
						<th>TUTOR</th>
						<td>
              <select class='dat' name="idpert" id="idpert">
                <?php opts('pers', "CONCAT_WS(', ', ape, nom)", $d['idpert']); ?>
              </select>
            </td>
					</tr>
          <?php  
            foreach ($c as $k3 => $v)
              if ( $v ){
                $dat = ( isset($d) && isset($d[$k3]) )? $d[$k3] : '';
                echo"
          <tr>
            <th>$v</th>
            <td><input class='dat' type='text' name='$k3' value='$dat' size='50'></td>
          </tr>
					";
							}
					?>
				</tbody>
			</table>
			<div id="bots_<?php echo $frm; ?>" class="right">
        <?php  
        if ($modo == 'm') {
        ?>
          <button 
            dst     = "contentalt"
            opt     = '<?php echo $tbl; ?>'
            onclick = "enviar(this)"
            >Modificar
          </button>
          <button 
            dst     = "contentalt"
            opt     = '<?php echo $tbl; ?>'
            tit     = '<?php echo $titk; ?>'
            onclick = "confirma(this);"
            >Eliminar
          </button>
        <?php  
        } else {
        ?>
          <button 
            dst     = "contentalt"
            opt     = '<?php echo $tbl; ?>'
            onclick = "enviar(this);"
            >Agregar
          </button>
        <?php } ?>
          <button 
            dst     = "contentalt"
            opt     = '<?php echo $tbl; ?>'
            onclick = "salir(this);"
            >Salir
          </button>
      </div>

		</div>
	</body>
</html>	