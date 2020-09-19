<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Predetermino <®>*/
    $k = 'cur';
?>
<!-- ####################################### -->
<html>
  <head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <h1 class="center">CURSOS</h1>
    <div id="left">
      <a href="#"><img src="img/logo.png" alt="djset"></a>
    </div>
    <div id="middle">
      <table id="tbl_<?php echo $k;?>s">
        <thead>
          <tr>
            <th width="80%">CURSO</th>
            <th width="20%">PLAN</th>
          <?php if ( usrperfil() == 1 ){ ?>
            <th>
              <button 
                title   = "Agregar"
                dst     = "contentalt" 
                id      = "id<?php echo $k.'_0'; ?>" 
                onclick = "abm(this);"
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
    </div>
  </body>
</html>
<!-- ####################################### -->
