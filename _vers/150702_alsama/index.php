<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>
      Al Sama
    </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/css.css" type="text/css" media="screen">
    <style type="text/css">
      #container {
      /*
      background-color:#8b8b8b;
      background-image:none;
      */
      background-image: url(img/header.jpg);
      }
      #mainmenu {
      background-color:#f8f8f8;
      margin-left:20px;
      border:1px solid #505050;
      }
      #wrap {
      background-color:#FFF;
      padding-top:30px;
      border-top:1px solid #505050;
      border-bottom:1px solid #505050;
      }
      #mainmenu a:hover,#mainmenu a.current,#footer {
      background-image:none;
      }
    </style>
    <link type="text/css" href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="sitename">
        <h1>
          AlSama
        </h1>
        <h2>
          Escuela de Danzas del Medio Oriente
        </h2>
      </div>
      <div id="mainmenu">
        <?php include_once 'php/mnu.php'; ?>
      </div>
      <div id="wrap">
        <div id="contentalt">
          <div id="left">
            <h3>
              Cursos y Carreras
            </h3>
            <ul>
              <li>Curso o Carrera 1</li>
              <li>Curso o Carrera 2</li>
              <li>Curso o Carrera 3</li>
              <li>Curso o Carrera 4</li>
            </ul>
            <img id="xphotos" src="img/photos.png" alt="djset">
          </div>
            <a href="#"><img src="img/logo.png" alt="djset"></a>
          <div id="login"></div>
        </div>
        <div class="clearingdiv">
          &nbsp;
        </div>
      </div>
    </div>
    <div id="footer">
      © 2014 Al Sama | Design by <a href="#"></a>
    </div>
  </body>
</html>