<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'curalu';
  /*<®> Recepción <®>*/
    $b  = estaono('b');
    $l  = estaono('l');
    $pa = estaono('pa');
    $pu = estaono('pu');
  /*<®> Armo la string where si es una búsqueda. <®>*/
    $wre = $b? "WHERE $k LIKE '%$b%'": '';
  /*<®> Armo la consulta <®>*/
    $q = "SELECT 
            ca.id,
            ca.idcur,
            cu.cur,
            CONCAT_WS(', ', a.ape, a.nom) alu,
            a.telf atelf, a.telc atelc, a.email aemail, a.fb afb
          FROM curalus ca
          INNER JOIN curs cu ON cu.id = ca.idcur
          INNER JOIN pers a  ON a.id  = ca.idper
          ORDER BY cu.cur, ca.idcur, a.ape, a.nom
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
          $fs[$idcur]['alus'] = array();
          $ant = $idcur;
        }
        $alu    = '<b>'.$rg['alu'].'</b>';
        $alus = array();
        if ( $v = $rg['atelf'] )  $alus[] = "Tel. Fijo: <b>$v</b>";
        if ( $v = $rg['atelc'] )  $alus[] = "Tel. Cel.: <b>$v</b>";
        if ( $v = $rg['aemail'] ) $alus[] = "E-Mail: <b>$v</b>";
        if ( $v = $rg['afb'] )    $alus[] = "Facebook: <b>$v</b>";
        $alus = ( $alus )? '<ul><li>'.implode('</li><li>', $alus).'</ul>': '';
          
        $fs[$idcur]['alus'][$idf]['clase'] = $clase;
        $fs[$idcur]['alus'][$idf]['alu'] = $alu.$alus;
      }

      foreach ($fs as $idcur => $cur) {
        $cur   = $fs[$idcur]['cur'];
        $alus  = $fs[$idcur]['alus'];
        $rspan = count($alus);
        $i = 0;
        foreach ($alus as $idf => $fdat) {
          $clase = $fdat['clase'];
          $alu   = $fdat['alu'];
          $boton = ( usrperfil() == 1 )?
              "<td class='center'>
                <button 
                  title   = 'Modificar'
                  dst     = 'middle'
                  id      = 'id$k"."_$idf; ?>'
                  onclick = 'abm(this)'
                  >...
                </button>
              </td>" : '';
          
          if ( !$i ) {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td rowspan='$rspan'>$cur</td>
              <td>$alu</td>
              $boton
            </tr>";
          } else {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td>$alu</td>
              $boton
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
