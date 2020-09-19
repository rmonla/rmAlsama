<?php
	include("conexion.php");
	include("funciones.php");
	nologin();

	$select_docente="select nombre,apellido,nro_documento,id from docente";
	$docente=mysql_query("$select_docente",$conexion);
?>
	<h2> <img src="img/add.gif"> <img src="img/curso.gif" height="48px" width="48px"> Agregar Curso</h2>
	<form method='post' action='alta_curso.php'>
	<table>
	<tr>
	<td>Curso:</td><td>     <select name='curso'>
				<option value='1'>1</option>
        	                <option value='2'>2</option>
                	        <option value='3'>3</option>
                        	<option value='4'>4</option>
                       	   <option value='5'>5</option>
                     	   <option value='6'>6</option>
               		   <option value='7'>7</option>

				</select></td>

	<td>Division:</td><td> <select name='division'>
        	                <option value='1'>1</option>
                	        <option value='2'>2</option>
              	          <option value='3'>3</option>
                      	  <option value='4'>4</option>
                      	  <option value='5'>5</option>
                      	  <option value='6'>6</option>
                      	  <option value='7'>7</option>

                        </select></td>

	</tr>
	<tr>
	<td>Especialidad: </td><td> <input type='radio' name='especialidad' value='Ciclo Basico'>Ciclo Basico</td>
	</tr>
	<tr>
	<td> </td><td> <input type='radio' name='especialidad' value='Informatica'>Informatica</td>
	</tr>
	<tr>
	<td> </td><td> <input type='radio' name='especialidad' value='Electromecanica'>Electromecanica</td>
	</tr>
	<tr>
	<td> </td><td> <input type='radio' name='especialidad' value='Construcciones'>Construcciones</td>
	</tr>

	<tr>
	<td>Preceptor/a a cargo:</td><td>
		<?php
		echo "<select name='preceptor'>";
		while($reg=mysql_fetch_array($docente)){
			echo "<option value='";
			echo $reg['id'];
			echo "'>";
			echo $reg['nombre'];
			echo " ";
			echo $reg['apellido'];
			echo " DNI:";
			echo $reg['nro_documento'];
			echo "</option>
			";
		}
		echo "</select>";
		?>
	</td>
	</tr>
	</table>
<input type="submit" value="Agregar Curso">
	</form>
