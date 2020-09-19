<?php
	include("conexion.php");
	include("funciones.php");
	nologin();
?>
<img src="img/viaje.gif">
<form method="post" action="crear_salida_educativa.php">
<br>
<table>
<tr>
<td>Titulo de la salida:</td><td> <input type="text" name="titulo_salida"> </td>
<tr>
<tr>
<td>Fecha Salida: </td><td>Fecha:
				<?php
				echo "<select name='dia'>";
				$i=1;
				for($i=1;$i<=31;$i++){
				echo "<option value='$i'>".$i."</option>
				";
				}
				echo "</select>";
				?>/
				<?php
                                echo "<select name='mes'>";
                                $i=1;
                                for($i=1;$i<=12;$i++){
                                echo "<option value='$i'>".$i."</option>
				";
                                }
                                echo "</select>";
                                ?>/
				<?php
                                echo "<select name='anio'>";
                                $i=1;
                                for($i=2013;$i>=1990;$i--){
                                echo "<option value='$i'>".$i."</option>
				";
                                }
                                echo "</select>";
                                ?>
			</td>
</tr>
<tr>
<td>Hora Salida: </td><td><?php
                                echo "<select name='hora_salida'>";
                                for($i=7;$i<=22;$i++){
                                echo "<option value='$i'>".$i."</option>
                                ";
                                }
                                echo "</select>";
                                ?>:
                                <?php
                                echo "<select name='minuto_salida'>";
                                for($i=0;$i<60;$i){
				echo "<option value='$i'>".$i."</option>
                                ";
				$i=$i+5;
                                }
				echo "<option value='59'>59</option>";
                                echo "</select>";
                                ?>
 </td>
<td>
Hora de llegada:
</td>
<td>
				<?php
				echo "<select name='hora_llegada'>";
                                for($i=7;$i<=22;$i++){
                                echo "<option value='$i'>".$i."</option>
                                ";
                                }
                                echo "</select>";
                                ?>:
                                <?php
                                echo "<select name='minuto_llegada'>";
                                
                                for($i=0;$i<60;$i){
                                echo "<option value='$i'>".$i."</option>
                                ";
                                $i=$i+5;
                                }
                                echo "<option value='59'>59</option>";
                                echo "</select>";
                                ?>

</td>
</tr>

<tr>
<td> Lugar Destino: </td><td> <input type="text" name="lugar_destino"> </td>
</tr>

<tr>
<td> Lugar Origen: </td> <td> <input type="text" name="lugar_origen"> </td>
</tr>



<tr>
<td> Descripcion: </td><td> <textarea rows="10" cols="50"></textarea> </td>
</tr>

<tr>
<td> Profesores a cargo:</td><td> </td>
</tr>

<tr>
<td> </td><td>  </td>
</tr>

<tr>
<td>  </td>
</tr>

<tr>
<td> </td> <td> <input type='submit' value='Crear Salida Educativa'> </td>
</tr>
</table>
</form>
