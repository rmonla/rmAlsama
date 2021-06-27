<?php  
  //var pass = CryptoJS.MD5(txt)
  //pass.toString()
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Recepción <®>*/
    $k    = 'curalunot';
    $titk = 'NOTA';
    $idk  = "id$k";
    $id   = estaono('id', false);
    $frm  = "abm$k";
    $tbl  = $k.'s';
    //var_dump($id);
  /*<®> Cargo el registro o predetermino vars. <®>*/
    $c = array(
      'id'       => '',
      'idcuralu' => '',
      'idnott'   => '',
      'fnot'     => '',
      'obs'      => ''
    );
    foreach ($c as $k2 => $v) $d[$k2] = '';
    if ( $id ){
      $q = "SELECT * FROM $tbl WHERE id = '$id'";
      if ( $rs = ejecuta_sql($q) )
        if ( $rg = $rs->fetch_assoc() )
          foreach ($c as $k2 => $v) $d[$k2] = $rg[$k2];
    } 
    /*<®> Estética <®>*/
      $d['fnot'] = ( $d['fnot'] )? date('d/m/Y', strtotime($d['fnot'])) : date('d/m/Y');
    //var_dump($q, $id, $d);
?>
<html>
  <head>
    <!-- <script src="js/jquery.maskedinput.js" type="text/javascript"></script> -->
    <script>
      /*<®> Inicio <®>*/
        $( document ).ready( function(){
          var modo = $('#<?php echo $frm ?> .dat[name=modo]').val();
          if ( modo == 'a' ){ cargarCurAlus() };
          $( '.dat[name=fnot]' ).datepicker({changeYear: true});
          $("[id^='abm'] #idcur").focus();
        });
        $( '#idcur' ).on('change', cargarCurAlus);
      /*<®> Funciones <®>*/
        function cargarCurAlus(){
          var dst   = $( '#idcuralu' );
          var idcur = $( '#idcur' ).val();
          $.post(
            'p_curalus/getCurAlus.php',
            {idcur: idcur}, 
            function(data) {
             dst.html(data);
          });
        }
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
            <th>CURSO</th>
            <td>
              <select 
                name  = "idcur" 
                id    = "idcur">
                <?php 
                  $idcuralu = $d['idcuralu'];
                  $q = "SELECT idcur FROM curalus WHERE id = '$idcuralu'";
                  if ( $rs = ejecuta_sql($q) )
                    $rg = $rs->fetch_assoc();
                  $idcur = ( isset( $rg['idcur'] ))? $rg['idcur'] : '';
                  opts('curs', 'cur', $idcur); 
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>ALUMNO</th>
            <td>
              <select 
                class = 'dat' 
                name  = "idcuralu" 
                id    = "idcuralu">
                <?php 
                  if ( $idcur ){
                    $q = "SELECT 
                            ca.id,
                            CONCAT_WS(', ', a.ape, a.nom) alu 
                          FROM curalus ca
                          INNER JOIN pers a ON a.id = ca.idper
                          WHERE idcur = '$idcur'
                          ";
                    if ( $rs = ejecuta_sql($q) )
                      while ( $rg = $rs->fetch_assoc() ){
                        $ida = $rg['id'];
                        $alu = $rg['alu'];
                        $sted = ( $ida == $d['idcuralu'] )? 'selected' : '';
                        echo "<option value='$ida' $sted>$alu</option>";
                      }
                  } else {
                    echo "<option value=''>Seleccione un Curso</option>";
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>NOTA</th>
            <td>
              <select 
                class = 'dat' 
                name  = "idnott" 
                id    = "idnott">
                <?php opts('notts', "nott", $d['idnott']); ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>FECHA</th>
            <td>
              <input 
                class = 'dat' 
                type  = 'text' 
                name  = 'fnot' 
                value = "<?php echo $d['fnot'] ?>">
            </td>
          </tr>
          <tr>
            <th>OBSERVACION</th>
            <td>
              <textarea 
                class = "dat"
                name  = "obs" 
                id    = "obs" 
                cols  = "30" 
                rows  = "10"><?php echo $d['obs']; ?></textarea>
            </td>
          </tr>
          <?php  
     //        foreach ($c as $k3 => $v)
     //          if ( $v ){
     //            $dat = ( isset($d) && isset($d[$k3]) )? $d[$k3] : '';
     //            echo"
     //      <tr>
     //        <th>$v</th>
     //        <td><input class='dat' type='text' name='$k3' value='$dat' size='50'></td>
     //      </tr>
          // ";
          //     }
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