<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'nott';
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
            nott
          FROM notts
          $wre 
          ORDER BY nott
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
        $id   = $rg['id'];
        $nott = $rg['nott'];
        if ( $b ){
          $r = "<busc>$b</busc>";
          $nott = str_ireplace($b, $r, $nott);
        }
      ?>
      <tr class="<?php echo $clase; ?>" id='id<?php echo $k."_".$id; ?>'>
        <td><?php echo $nott; ?></td>
        <td class="center">
          <button 
            title   = "Modificar"
            dst     = "middle"
            id      = 'id<?php echo $k."_".$id; ?>'
            onclick = "abm(this)"
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
