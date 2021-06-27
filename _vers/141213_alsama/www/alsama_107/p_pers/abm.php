<?php  
	//var pass = CryptoJS.MD5(txt)
  //pass.toString()
  /*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Recepción <®>*/
    $k    = 'per';
    $titk = 'PERSONA';
    $idk  = "id$k";
    $id   = estaono('id', false);
    $frm  = "abm$k";
    $tbl  = $k.'s';
    //var_dump($id);
  /*<®> Cargo el registro o predetermino vars. <®>*/
    $c = array(
      'id'    => '',
      'ape'   => 'APELLIDO',
      'nom'   => 'NOMBRE',
      'doct'  => 'DOC. TIPO',
      'docn'  => 'DOC. NRO.',
      'fnac'  => 'F.NAC.',
      'domi'  => 'DOMICILIO',
      'telf'  => 'TEL. FIJO',
      'telc'  => 'TEL. CEL.',
      'email' => 'E-MAIL',
      'fb'    => 'FACEBOOK',
      'obs'   => 'OBSERVACIONES'
    );
    foreach ($c as $k2 => $v) $d[$k2] = '';
    if ( $id ){
      $q = "SELECT * FROM $tbl WHERE id = '$id'";
      if ( $rs = ejecuta_sql($q) )
        if ( $rg = $rs->fetch_assoc() )
          foreach ($c as $k2 => $v) $d[$k2] = $rg[$k2];
    } 
    /*<®> Estética <®>*/
      $d['fnac'] = date('d/m/Y', strtotime($d['fnac']));
    //var_dump($q, $id, $d);
?>
<html>
	<head>
		<!-- <script src="js/jquery.maskedinput.js" type="text/javascript"></script> -->
		<script>
    	/*<®> Inicio <®>*/
        $( document ).ready( function(){
          $( '.dat[name=fnac]' ).datepicker({changeYear: true});
          $( '.dat[name=fnac]' ).mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
          $( '.dat[name=docn]' ).mask("99.999.999",{placeholder:"99.999.999"});
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