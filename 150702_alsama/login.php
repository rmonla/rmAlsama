<?php  
  /*<®> Includes <®>*/
    include_once('php/fxs.php');
  /*<®> Recepción <®>*/
    $salir = estaono('Salir');
    $usr   = estaono('usr');
    $pass  = estaono('pass');

  /*<®> Funciones <®>*/
    function login(){
      global $usr, $pass, $salir;
      
      function cerrarSesssion(){
        // remove all session variables
        session_unset(); 
        return false;
      }
      
      if ( $salir ) {
        echo '<h3>Ud. ha salido del sistema</h3><br>';
        cerrarSesssion();
      }

      if ( isset($_SESSION['usr']) ) return true;
      //var_dump($usr, $pass);
      if ( $usr && $pass){
        $pass = md5($pass);
        $q = "SELECT 
                u.usr,
                u.idper,
                u.perf,
                (select CONCAT_WS(', ', p.ape, p.nom) from pers p where p.id = u.idper) nom 
              FROM usrs u
              WHERE u.usr='$usr' AND u.pass='$pass'";
        if ( $rs = ejecuta_sql($q) ){
          if ( $rg = $rs->fetch_assoc() ){
            $_SESSION['usr']   = $rg['usr'];
            $_SESSION['idper'] = $rg['idper'];
            $_SESSION['perf']  = $rg['perf'];
            $_SESSION['nom']   = utf8_encode($rg['nom']);
            //var_dump($_SESSION);
            return true;
          }
        } else echo '<h3>Nombre de usuario o contraseña incorrecta.</h3><br>';
      }
      cerrarSesssion();
    }
?>
<html>
  <head>
  </head>
  <body>
    <?php  
      if ( login() ){
        //echo $_SESSION['nom'].'<br>LOGEADO';
    ?>
      <div style="float: left; width: 30%;">
        <table>
          <tbody>
            <tr>
              <th>NOMBRE</th><td><?php echo $_SESSION['nom']; ?></td>
            </tr>
            <tr>
              <th>USUARIO</th><td><?php echo $_SESSION['usr']; ?></td>
            </tr>
            <tr>
              <th>PERFIL</th><td><?php echo ( usrperfil() == 1 )? 'Administrador' : 'Profesor'; ?></td>
            </tr>
          </tbody>
        </table>
      <p class="right">
        <input 
          class   = "dat"
          id      = "Salir" 
          name    = "Salir" 
          type    = "button" 
          onclick = "login();"
          value   = "Salir">
      </p>
      </div>
    <?php  
      } else {
        unset($_SESSION);
    ?>
      <p class="right">
        Usuario: <input class="dat" id="usr" name="usr" type="text" />
      </p>
      <p class="right">
        Contraseña: <input class="dat" id="pass" name="pass" type="password" />
      </p>
      <p class="right">
        <input 
          id      = "Ingresar" 
          name    = "Ingresar" 
          type    = "button" 
          onclick = "login();"
          value   = "Ingresar">
      </p>
    <?php 
      }
    ?>
  </body>
</html>