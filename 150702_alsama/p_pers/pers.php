<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'per';
?>
<!-- ####################################### -->
<html>
  <head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <h1 class="center">PERSONAS</h1>
    <table id="tbl_<?php echo $k;?>s">
      <thead>
        <tr>
          <th width="25%">PERSONA</th>
          <th width="10%">DOCUMENTO</th>
          <th width="5%">EDAD</th>
          <th width="20%">CONTACTO</th>
          <th width="20%">DOMICILIO</th>
          <th width="20%">OBSERVACIONES</th>
          <?php if ( usrperfil() == 1 ){ ?>
            <th>
              <button 
                title="Agregar"
                dst="contentalt" 
                id="id<?php echo $k.'_0'; ?>" 
                onclick="abm(this);"
                >+
              </button>
            </th>
          <?php } ?>
        </tr>
      </thead>
      <tbody id="lst_<?php echo $k;?>s">
        <?php include_once "lst.php"; ?>
      </tbody>
    </table>
  </body>
</html>
<!-- ####################################### -->
