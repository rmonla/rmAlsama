<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'curdoc';
  /*<®> Recepción <®>*/
    $b  = estaono('b');
    $l  = estaono('l');
    $pa = estaono('pa');
    $pu = estaono('pu');
  /*<®> Armo la string where si es una búsqueda. <®>*/
    $wre = $b? "WHERE $k LIKE '%$b%'": '';
  /*<®> Armo la consulta <®>*/
    $q = "SELECT 
            cd.id,
            cd.idcur,
            cu.cur,
            CONCAT_WS(', ', d.ape, d.nom) doc,
            d.telf dtelf, d.telc dtelc, d.email demail, d.fb dfb
          FROM curdocs cd
          INNER JOIN curs cu ON cu.id = cd.idcur
          INNER JOIN pers d  ON d.id  = cd.idper
          ORDER BY cu.cur, cd.idcur, d.ape, d.nom
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
          $fs[$idcur]['docs'] = array();
          $ant = $idcur;
        }
        $doc    = '<b>'.$rg['doc'].'</b>';
        $docs = array();
        if ( $v = $rg['dtelf'] )  $docs[] = "Tel. Fijo: <b>$v</b>";
        if ( $v = $rg['dtelc'] )  $docs[] = "Tel. Cel.: <b>$v</b>";
        if ( $v = $rg['demail'] ) $docs[] = "E-Mail: <b>$v</b>";
        if ( $v = $rg['dfb'] )    $docs[] = "Facebook: <b>$v</b>";
        $docs = ( $docs )? '<ul><li>'.implode('</li><li>', $docs).'</ul>': '';
          
        $fs[$idcur]['docs'][$idf]['clase'] = $clase;
        $fs[$idcur]['docs'][$idf]['doc'] = $doc.$docs;
      }

      foreach ($fs as $idcur => $cur) {
        $cur   = $fs[$idcur]['cur'];
        $docs  = $fs[$idcur]['docs'];
        $rspan = count($docs);
        $i = 0;
        foreach ($docs as $idf => $fdat) {
          $clase = $fdat['clase'];
          $doc   = $fdat['doc'];
          if ( !$i ) {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td rowspan='$rspan'>$cur</td>
              <td>$doc</td>
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
              <td>$doc</td>
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
