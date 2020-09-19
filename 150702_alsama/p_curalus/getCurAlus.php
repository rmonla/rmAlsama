<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
  /*<®> Recepción <®>*/
    if ( !$idcur = estaono('idcur') ) exit;
  /*<®> Imprimo los opts <®>*/
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
        echo "<option value='$ida'>$alu</option>";
      }
?>