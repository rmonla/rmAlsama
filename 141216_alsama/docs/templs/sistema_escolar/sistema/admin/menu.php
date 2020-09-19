<?php
/* Inicio Verificador de Login */
session_start();
if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
	header("Location: index.php");
}
/* Fin Verificador de Login */
?>

<a href='index.php' target='_parent'><img src='img/home.gif' height='30px' width='30px'><b>INICIO</b></a>
<hr>
<img src='img/add.gif' height='15px' width='15px'>
<img src='img/del.gif' height='15px' width='15px'><b>Agregar y Quitar:</b><br>
<br>
<a href='f_alta_alumno.php' target='contenido'><img src='img/add.gif' height='15px' width='15px'><img src='img/p1.gif' height='15px' width='15px'>Agregar Alumno</a><br>
<a href='f_baja_alumno.php' target='contenido'><img src='img/del.gif' height='15px' width='15px'><img src='img/p2.gif' height='15px' width='15px'>Quitar Alumno</a>
<br><br>
<a href='f_alta_docente.php' target='contenido'><img src='img/add.gif' height='15px' width='15px'><img src='img/p1.gif' height='15px' width='15px'>Agregar Docente</a><br>
<a href='f_baja_docente.php' target='contenido'><img src='img/del.gif' height='15px' width='15px'><img src='img/p2.gif' height='15px' width='15px'>Quitar Docente</a>
<br><br>
<a href='f_alta_curso.php' target='contenido'><img src='img/add.gif' height='15px' width='15px'>Agregar Curso</a><br>
<a href='f_baja_curso.php' target='contenido'><img src='img/del.gif' height='15px' width='15px'>Quitar Curso</a><br><br>

<a href='f_alta_materia.php' target='contenido'><img src='img/add.gif' height='15px' width='15px'>Agregar Materias</a><br>
<a href='f_baja_materia.php' target='contenido'><img src='img/del.gif' height='15px' width='15px'>Quitar Materias</a>


<hr>
<img src='img/admin.gif' height='30px' width='30px'><b>Administracion:</b><br>
<br>
<a href='f_buscar_alumno.php' target='contenido'>Directorios de Alumnos</a>
<!--
<a href='f_crear_salida_educativa.php' target='contenido'><img src='img/viaje.gif' height='20px' width='20px'>Crear Salida Educativa</a><br>
<a href='f_cargar_notas.php' target='contenido'><img src='img/notas.gif' height='20px' width='20px'>Cargar Notas</a>
-->
<hr>
<img src='img/grafico.gif' height='30px' width='30px'><b>Estadisticas:</b><br>
<br>
<a href='f_total_alumnos_especialidad.php' target='contenido'><img src='img/buscar.gif' height='20px' width='20px'>Total Alumnos Especialidad</a><br>
<a href='total_cursos.php' target='contenido'><img src='img/curso.gif' height='20px' width='20px'>Total Cursos</a><br>
<a href='total_docentes.php' target='contenido'><img src='img/p1.gif' height='20px' width='20px'>Total Docentes</a><br>

<hr>
<a href='salir.php'><img src='img/salir.gif' height='30px' width='30px'>Salir</a>
