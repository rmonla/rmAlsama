<?php  
  /*<®> Includes <®>*/
    include_once('fxs.php');
  /*<®> Menú según perfil <®>*/
    switch ( usrperfil() ) {
      case '1':
?> <!-- Perfil Administrador -->
        <ul dst="wrap">
          <li><a href="./">Inicio</a></li>
          <li><a opt="admpers" href="#">Personas</a></li>
          <li><a opt="admcurs" href="#">Cursos</a></li>
          <li><a opt="sis" href="#">Sistema</a></li>
        </ul>
<?php  
        break;
      case '2':
?> <!-- Perfil Usuario -->
        <ul dst="wrap">
          <li><a href="./">Inicio</a></li>
          <li><a opt="admcurs" href="#">Cursos</a></li>
        </ul>
<?php
        break;
      default:
?> <!-- Sin Perfil -->
        <ul dst="wrap">
          <li><a href="./">Inicio</a></li>
        </ul>
<?php
        break;
    }
?>
