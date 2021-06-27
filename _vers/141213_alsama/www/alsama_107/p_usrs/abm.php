<?php  
  //var pass = CryptoJS.MD5(txt)
  //pass.toString()
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Recepción <®>*/
    $k    = 'usr';
    $titk = 'USUARIO';
    $idk  = "id$k";
    $id   = estaono('id', false);
    $frm  = "abm$k";
    $tbl  = $k.'s';
    //var_dump($id);
  /*<®> Cargo el registro o predetermino vars. <®>*/
    $c = array(
      'id'    => '',
      'usr'   => '',
      'idper' => '',
      'perf'  => ''
    );
    foreach ($c as $k2 => $v) $d[$k2] = '';
    if ( $id ){
      $q = "SELECT * FROM $tbl WHERE id = '$id'";
      if ( $rs = ejecuta_sql($q) )
        if ( $rg = $rs->fetch_assoc() )
          foreach ($c as $k2 => $v) $d[$k2] = $rg[$k2];
    } 
?>
<html>
  <head>
    <!-- <script src="js/jquery.maskedinput.js" type="text/javascript"></script> -->
    <script>
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
            <th>PERSONA</th>
            <td>
              <select 
                class = "dat"
                name  = "idper" 
                id    = "idper">
                <?php opts('pers', "CONCAT_WS(', ', ape, nom)", $d['idper']); ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>PERFIL TIPO</th>
            <td>
              <select 
                class = "dat"
                name  = "perf" 
                id    = "perf">
                <option value="2">Profesor</option>
                <option value="1" <?php echo ($d['perf'] == 1)? 'selected' : ''; ?>>Administrador</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>USUARIO</th>
            <td>
              <input 
                class = "dat"
                name  = "usr" 
                id    = "usr"
                value = "<?php echo $d['usr']; ?>"
                type  = "text"
                >
            </td>
          </tr>
          <tr>
            <th>CONTRASEÑA</th>
            <td>
              <button 
                dst     = "middle"
                opt     = '<?php echo $tbl; ?>'
                onclick = "newPass(this)"
                >Cambiar contraseña
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      
      <div id="bots_<?php echo $frm; ?>" class="right">
        <?php  
        if ($modo == 'm') {
        ?>
          <button 
            dst     = "middle"
            opt     = '<?php echo $tbl; ?>'
            onclick = "enviar(this)"
            >Modificar
          </button>
          <button 
            dst     = "middle"
            opt     = '<?php echo $tbl; ?>'
            tit     = '<?php echo $titk; ?>'
            onclick = "confirma(this);"
            >Eliminar
          </button>
        <?php  
        } else {
        ?>
          <button 
            dst     = "middle"
            opt     = '<?php echo $tbl; ?>'
            onclick = "enviar(this);"
            >Agregar
          </button>
        <?php } ?>
          <button 
            dst     = "middle"
            opt     = '<?php echo $tbl; ?>'
            onclick = "salir(this);"
            >Salir
          </button>
      </div>

    </div>
  </body>
</html>  