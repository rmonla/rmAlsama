<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'curalunot';
  /*<®> Recepción <®>*/
    $b  = estaono('b');
    $l  = estaono('l');
    $pa = estaono('pa');
    $pu = estaono('pu');
  /*<®> Armo la string where si es una búsqueda. <®>*/
    $wre = $b? "WHERE $k LIKE '%$b%'": '';
  /*<®> Armo la consulta <®>*/
    $q = "SELECT 
            can.id,
            ca.idcur,
            cu.cur,
            CONCAT_WS(', ', a.ape, a.nom) alu,
            DATE_FORMAT(can.fnot, '%d-%m-%Y') fnot,
            nt.nott,
            can.obs 
          FROM curalunots can
          INNER JOIN curalus ca ON ca.id = can.idcuralu
          INNER JOIN curs    cu ON cu.id = ca.idcur
          INNER JOIN pers    a  ON a.id  = ca.idper
          INNER JOIN notts   nt ON nt.id = can.idnott
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
        $alu = '<b>'.$rg['alu'].'</b>';
        $not = array();
        if ( $v = $rg['nott'] ) $not[] = "Nota: <b>$v</b>";
        if ( $v = $rg['fnot'] ) $not[] = "Fecha: <b>$v</b>";
        if ( $v = $rg['obs'] ) $not[]  = "Observacion: <b>$v</b>";
        $not = ( $not )? '<ul><li>'.implode('</li><li>', $not).'</ul>': '';
          
        $fs[$idcur]['alus'][$idf]['clase'] = $clase;
        $fs[$idcur]['alus'][$idf]['alu']   = $alu;
        $fs[$idcur]['alus'][$idf]['not']   = $not;
      }

      foreach ($fs as $idcur => $cur) {
        $cur   = $fs[$idcur]['cur'];
        $alus  = $fs[$idcur]['alus'];
        $rspan = count($alus);
        $i = 0;
        foreach ($alus as $idf => $fdat) {
          $clase = $fdat['clase'];
          $alu   = $fdat['alu'];
          $not   = $fdat['not'];
          if ( !$i ) {
            echo
            "<tr class='$clase' id='id$k"."_$idf'>
              <td rowspan='$rspan'>$cur</td>
              <td>$alu</td>
              <td>$not</td>
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
              <td>$alu</td>
              <td>$not</td>
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
