<?php  
  /*<®> Includes <®>*/
    include_once('../php/fxs.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head></head>
	<body>
		<div id="rightside">
			<h1>
				Administración
			</h1>
			<p dst="contentalt">
        <?php if ( usrperfil() == 1 ){ ?>
          <a opt="curs" class="nav active" href="#">Cursos</a> 
            <span class="hide">|</span> 
          <a opt="curdocs" class="nav" href="#">Docentes</a> 
            <span class="hide">|</span> 
        <?php } ?>
        <a opt="curtems" class="nav" href="#">Temas</a> 
          <span class="hide">|</span> 
        <a opt="curalunots" class="nav" href="#">Notas</a> 
          <span class="hide">|</span> 
        <a opt="curalus" class="nav" href="#">Alumnos</a> 
          <span class="hide">|</span>
			</p>
		</div>
		<div id="contentalt">
		</div>
		<div class="clearingdiv">&nbsp;</div>
	</body>
</html>