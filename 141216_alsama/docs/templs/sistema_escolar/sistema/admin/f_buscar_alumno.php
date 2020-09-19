<?php
include("funciones.php");
nologin();
include("conexion.php");
?>
<h2><img src="img/lupa.gif" height="40px" width="40px">Buscar Alumno</h2>
<form method="post" action="buscar_alumno.php"> Seleccione curso: 

<select name="curso">
        <?php
        include("conexion.php");
        $registro=mysql_query("select id_curso,curso,especialidad from curso",$conexion);
        while($tcurso=mysql_fetch_array($registro)){
                echo "<option value='".$tcurso['curso']."'>".$tcurso['curso']." ".$tcurso['especialidad']."</option>";
        }
        ?>
</select>
<br>
<input type="submit" value="Buscar">
</form>

