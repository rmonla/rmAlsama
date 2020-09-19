<?php  
  /*<®> Includes <®>*/
    include_once 'limpiagetpost.php';
  /*<®> Predetermino <®>*/
    date_default_timezone_set('America/Argentina/La_Rioja');
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    
  
  /*<®> fx una_mysqli <®>*/
    /**
     * Función que crea una istancia de mysqli.
     */
    function una_mysqli(){
      /* Inicilizo  las variables de conexion */
        $dominio = $_SERVER['HTTP_HOST'];
        switch ($dominio) {
          case '127.0.0.1': 
              //Se está ejecutando en mi pc.
              $host   = "127.0.0.1";
              $usr    = "root";
              $pass   = "";
              $bdatos = "alsama_v105";
            break;
          case 'localhost': 
              //Se está ejecutando en mi pc.
              $host   = "localhost";
              $usr    = "root";
              $pass   = "";
              $bdatos = "alsama_v105";
            break;
        }
      $mysqli = new mysqli($host, $usr, $pass, $bdatos);
      if ($mysqli->connect_errno) {
        echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      return $mysqli;
    }
  /*<®> fx ejecuta_sql <®>*/
    /**
     * Función que ejecuta una consulta SQL en la BD.
     */
    function ejecuta_sql($q, $contar = true){
      $mysqli = una_mysqli();
      if ( !$res = $mysqli->query($q) )
        echo "Falló la ejecución de la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
      
      if ( $contar )
        if ( $res->num_rows < '1' )
          $res = false;
      
      $mysqli->close();
      return $res;
    }
  /*<®> fx estaono <®>*/
    /**
     * Función que verifica si se envió 
     * por POST o GET una variable
     */
    function estaono($nomvar, $porpost = true){
      $drec = ($porpost)? $_POST : $_GET;
      return (isset($drec[$nomvar]))? $drec[$nomvar] : false;
    }
  /*<®> fx opts <®>*/
      /**
       * Función que retorna los
       * options para select
       */
      function opts($tbl, $cv, $sted = '', $wre = '', $ck = '', $order = ''){
        $wre   = $wre ? "WHERE $wre" : '';
        $ck    = $ck  ? : 'id';
        $order = $order ? : "$cv";
        $q     = "SELECT $ck k, $cv v FROM $tbl $wre ORDER BY $order";
        if ( $rs = ejecuta_sql($q) )
          while ( $rg = $rs->fetch_assoc() ){
            $s = ( $sted && $rg['k'] == $sted )? 'selected' : '';
            //echo "<option value='".$rg['k']."' $s >".utf8_encode($rg['v'])."</option>";
            echo "<option value='".$rg['k']."' $s >".$rg['v']."</option>";
          }
      } 
  /*<®> fx usradmin <®>*/
    /**
     * Función que returna true o false si el usuario
     * logeado tiene perfil administrador.
     */
    function usrperfil(){
      
      return ( isset($_SESSION['perf']) )? $_SESSION['perf'] : 0;
    }
?>

