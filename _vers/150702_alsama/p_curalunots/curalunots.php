<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'curalunot';
?>
<!-- ####################################### -->
<html>
  <head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <h1 class="center">NOTAS DE ALUMNOS</h1>
    <div id="left">
      <a href="#"><img src="img/logo.png" alt="djset"></a>
    </div>
    <div id="middle">
      <table id="tbl_<?php echo $k;?>s">
        <thead>
          <tr>
            <th width="30%">CURSO</th>
            <th width="30%">ALUMNO</th>
            <th width="40%">NOTA</th>
            <th>
              <button 
                title   = "Agregar"
                dst     = "middle" 
                id      = "id<?php echo $k.'_0'; ?>" 
                onclick = "abm(this);"
                >+
              </button>
            </th>
          </tr>
        </thead>
        <tbody id="lst_<?php echo $k;?>s">
          <?php include_once "lst.php"; ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
<!-- ####################################### -->

