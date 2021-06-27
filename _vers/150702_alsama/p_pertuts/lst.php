<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'pertut';
  /*<®> Recepción <®>*/
    $b  = estaono('b');
    $l  = estaono('l');
    $pa = estaono('pa');
    $pu = estaono('pu');
  /*<®> Armo la string where si es una búsqueda. <®>*/
    $wre = $b? "WHERE $k LIKE '%$b%'": '';
  /*<®> Armo la consulta <®>*/
    $q = "SELECT 
            at.id,
            at.idpera,
            CONCAT_WS(', ', a.ape, a.nom) alu,
            a.telf atelf, a.telc atelc, a.email aemail, a.fb afb,
            CONCAT_WS(', ', t.ape, t.nom) tut,
            t.telf ttelf, t.telc ttelc, t.email temail, t.fb tfb
          FROM pertuts at
          INNER JOIN pers a ON a.id = at.idpera 
          INNER JOIN pers t ON t.id = at.idpert
          ORDER BY a.ape, a.nom, at.idpera, t.ape, t.nom
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
      $aluant = '';
      $fs = array();
      
      while ($rg = $rs->fetch_assoc()) {
        $idpera = $rg['idpera'];
        $idf    = $rg['id'];
        $clase  = ($clase == 'dark')? 'ligth' : 'dark';
        if ( $aluant != $idpera ){
          $alu    = '<b>'.$rg['alu'].'</b>';
          $conta = array();
          if ( $v = $rg['atelf'] )  $conta[] = "Tel. Fijo: <b>$v</b>";
          if ( $v = $rg['atelc'] )  $conta[] = "Tel. Cel.: <b>$v</b>";
          if ( $v = $rg['aemail'] ) $conta[] = "E-Mail: <b>$v</b>";
          if ( $v = $rg['afb'] )    $conta[] = "Facebook: <b>$v</b>";
          $conta = ( $conta )? '<ul><li>'.implode('</li><li>', $conta).'</ul>': '';
          $fs[$idpera]['alu'] = $alu.$conta;
          $fs[$idpera]['tuts'] = array();
          $aluant = $idpera;
        }

        $tut    = '<b>'.$rg['tut'].'</b>';
        $contt = array();
        if ( $v = $rg['ttelf'] )  $contt[] = "Tel. Fijo: <b>$v</b>";
        if ( $v = $rg['ttelc'] )  $contt[] = "Tel. Cel.: <b>$v</b>";
        if ( $v = $rg['temail'] ) $contt[] = "E-Mail: <b>$v</b>";
        if ( $v = $rg['tfb'] )    $contt[] = "Facebook: <b>$v</b>";
        $contt = ( $contt )? '<ul><li>'.implode('</li><li>', $contt).'</ul>': '';
          
        $fs[$idpera]['tuts'][$idf]['clase'] = $clase;
        $fs[$idpera]['tuts'][$idf]['tut'] = $tut.$contt;
      }

      foreach ($fs as $ida => $alu) {
        $alu   = $fs[$ida]['alu'];
        $tuts  = $fs[$ida]['tuts'];
        $rspan = count($tuts);
        $i = 0;
//echo '<pre>'.var_dump($alu, $tuts).'</pre>';
//exit;
        foreach ($tuts as $idf => $fdats) {
          $clase = $fdats['clase'];
          $tut   = $fdats['tut'];
          if ( !$i ) {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td rowspan='$rspan'>$alu</td>
              <td>$tut</td>
              <td class='center'>
                <button 
                  title   = 'Modificar'
                  dst     = 'contentalt'
                  id      = 'id$k"."_$idf; ?>'
                  onclick = 'abm(this)'
                  >...
                </button>
              </td>
            </tr>";
          } else {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td>$tut</td>
              <td class='center'>
                <button 
                  title   = 'Modificar'
                  dst     = 'contentalt'
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
