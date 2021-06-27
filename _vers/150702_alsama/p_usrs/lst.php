<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Predetermino <®>*/
		$k = 'usr';
	/*<®> Recepción <®>*/
		$b  = estaono('b');
		$l  = estaono('l');
		$pa = estaono('pa');
		$pu = estaono('pu');
	/*<®> Armo la string where si es una búsqueda. <®>*/
		$wre = $b? "WHERE $k LIKE '%$b%'": '';
	/*<®> Armo la consulta <®>*/
		$q = "SELECT 
						u.id, 
						u.usr,
						CONCAT_WS(', ', p.ape, p.nom) per,
            u.perf
					FROM usrs u
          INNER JOIN pers p ON p.id = u.idper
					$wre 
					ORDER BY usr
					";
	/*<®> Cuento registros para paginar <®>*/
		$l = $l? : 10;
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
        $id  = $rg['id'];
        $usr = $rg['usr'];
        $per = utf8_encode($rg['per']);
        $perf = ($rg['perf'] == 1)? 'Administrador' : 'Profesor';
				if ( $b ){
					$r = "<busc>$b</busc>";
					$usr = str_ireplace($b, $r, $usr);
				}
  		?>
			<tr class="<?php echo $clase; ?>" id='id<?php echo $k."_".$id; ?>'>
				<td class="center"><?php echo $usr; ?></td>
        <td><?php echo $per; ?></td>
				<td class="center"><?php echo $perf; ?></td>
				<td class="center">
          <button 
            title="Modificar"
            dst="middle"
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
