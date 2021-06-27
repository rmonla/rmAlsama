<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Predetermino <®>*/
		$k = 'per';
	/*<®> Recepción <®>*/
		$b  = estaono('b');
		$l  = estaono('l');
		$pa = estaono('pa');
		$pu = estaono('pu');
	/*<®> Armo la string where si es una búsqueda. <®>*/
		$wre = $b? "WHERE $k LIKE '%$b%'": '';
	/*<®> Armo la consulta <®>*/
		$q = "SELECT 
						id, 
            CONCAT_WS(', ', ape, nom) per,
						CONCAT_WS(': ', doct, docn) doc,
						YEAR(CURDATE())-YEAR(fnac) edad,
            domi,
            telf,
            telc,
            email,
            fb,
            obs
					FROM pers
					$wre 
					ORDER BY ape, nom
					";
	/*<®> Cuento registros para paginar <®>*/
		$l = $l? : 100;
		$pags = ( $rs = ejecuta_sql($q) )?
							ceil($rs->num_rows / $l) : 1;
	/*<®> Armo el LIMIT <®>*/
		$pa = ( $pa > $pags )? $pags : $pa;
		$p = ( $pa > 1 )? ($pa - 1) * $l : 0;
		$lim = "LIMIT $p,$l";// LIMIT 0,10
	/*<®> Cargo los registros <®>*/
		$q = "$q $lim";
		if($rs = ejecuta_sql($q)){
  		$clase  = 'ligth';
      while ($rg = $rs->fetch_assoc()) {
        $clase = ($clase == 'dark')? 
                  'ligth' : 'dark';
        $id    = $rg['id'];
        $per   = '<b>'.$rg['per'].'<b>';
        $doc   = $rg['doc'];
        $edad  = $rg['edad'];
        $domi  = $rg['domi'];
        $obs   = $rg['obs'];

  		  $cont = array();
        if ( $v = $rg['telf'] )  $cont[] = "Tel. Fijo: <b>$v</b>";
        if ( $v = $rg['telc'] )  $cont[] = "Tel. Cel.: <b>$v</b>";
        if ( $v = $rg['email'] ) $cont[] = "E-Mail: <b>$v</b>";
        if ( $v = $rg['fb'] )    $cont[] = "Facebook: <b>$v</b>";
        
        $cont = ( $cont )? '<ul><li>'.implode('</li><li>', $cont).'</ul>': '';

				if ( $b ){
					$r = "<busc>$b</busc>";
					$usr = str_ireplace($b, $r, $usr);
				}
  		?>
			<tr class="<?php echo $clase; ?>" id='id<?php echo $k."_".$id; ?>'>
				<td><?php echo $per; ?></td>
        <td class="center"><?php echo $doc; ?></td>
        <td class="center"><?php echo $edad; ?></td>
        <td><?php echo $cont; ?></td>
        <td><?php echo $domi; ?></td>
        <td><?php echo $obs; ?></td>
				<td class="center">
          <button 
            title="Modificar"
            dst="contentalt"
            id='id<?php echo $k."_".$id; ?>'
            onclick="abm(this)"
            >...
          </button>
        </td>
			</tr>
	  	<?php
  		}
			?>
		<?php 
		}
		?>
		<script>
			//botsTbl('tbl_<?php echo $k;?>s');
			<?php  
				$paginar = false;
				if ( !$b && !$pa ) $paginar = true;
				if ( $pu > $pags ) $paginar = true;
				if ( $pags > $pu ) $paginar = true;
				if( $paginar ) echo "//pags($pags);";
			?>
		</script>
