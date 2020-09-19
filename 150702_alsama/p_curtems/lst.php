<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'curtem';
  /*<®> Recepción <®>*/
    $b  = estaono('b');
    $l  = estaono('l');
    $pa = estaono('pa');
    $pu = estaono('pu');
  /*<®> Armo la string where si es una búsqueda. <®>*/
    $wre = $b? "WHERE $k LIKE '%$b%'": '';
  /*<®> Armo la consulta <®>*/
    $q = "SELECT 
            ct.id,
            ct.idcur,
            cu.cur,
            DATE_FORMAT(ct.ftem, '%d-%m-%Y') ftem,
            ct.curtem,
            ct.est
          FROM curtems ct
          INNER JOIN curs cu ON cu.id = ct.idcur
          ORDER BY cu.cur, ct.ftem
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
      $clase = 'ligth';
      $ant   = '';
      $fs    = array();
      
      while ($rg = $rs->fetch_assoc()) {
        $idcur = $rg['idcur'];
        $idf   = $rg['id'];
        $clase = ($clase == 'dark')? 'ligth' : 'dark';
        if ( $ant != $idcur ){
          $cur    = '<b>'.$rg['cur'].'</b>';
          $fs[$idcur]['cur'] = $cur;
          $fs[$idcur]['tems'] = array();
          $ant = $idcur;
        }
        $tems = array();
        if ( $v = $rg['ftem'] )   $tems[] = "Fecha: <b>$v</b>";
        if ( $v = $rg['curtem'] ) $tems[] = "Tema: <b>$v</b>";
        if ( $v = $rg['est'] )    $tems[] = "Estado: <b>$v</b>";
        $tems = ( $tems )? '<ul><li>'.implode('</li><li>', $tems).'</ul>': '';
          
        $fs[$idcur]['tems'][$idf]['clase'] = $clase;
        $fs[$idcur]['tems'][$idf]['tem']   = $tems;
      }

      foreach ($fs as $idcur => $cur) {
        $cur   = $fs[$idcur]['cur'];
        $tems  = $fs[$idcur]['tems'];
        $rspan = count($tems);
        $i = 0;
        foreach ($tems as $idf => $fdat) {
          $clase = $fdat['clase'];
          $tem   = $fdat['tem'];
          if ( !$i ) {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td rowspan='$rspan'>$cur</td>
              <td>$tem</td>
              <td class='center'>
                <button 
                  title   = 'Modificar'
                  dst     = 'middle'
                  id      = 'id$k"."_$idf; ?>'
                  onclick = 'abm(this)'
                  >...
                </button>
              </td>
            </tr>";
          } else {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td>$tem</td>
              <td class='center'>
                <button 
                  title   = 'Modificar'
                  dst     = 'middle'
                  id      = 'id$k"."_$idf; ?>'
                  onclick = 'abm(this)'
                  >...
                </button>
              </td>
            </tr>";
          }
          $i++;
        }
      }
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
