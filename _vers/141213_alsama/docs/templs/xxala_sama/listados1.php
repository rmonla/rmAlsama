<?php
//Nombre del documento
$f = fopen("notas.pdf", "w");

//Abro el documento
$g = pdf_open($f);

//Dimensiones del documento A5
$ancho_p = 595;
$alto_p = 842;


//Función que escribe triánguos
function triangulo($g,$x,$y,$alto,$ancho,$rojo,$verde,$azul){
	pdf_setrgbcolor_fill($g,$rojo,$verde,$azul);
	pdf_moveto($g,$x,$y);
	pdf_lineto($g,$x+($ancho/2),$y+$alto);
	pdf_lineto($g,$x+$ancho,$y);
	pdf_fill($g);
}
//Conectar con la base de datos
$conexion=mysql_connect("localhost","root","");
$bd="colegio";

$consulta="select * from alumnos where id_curso = ".$_GET["curso"]." and id_especialidad=".$_GET["especialidad"];
$result = mysql_db_query($bd,$consulta);

//número de alumnos en la consulta
$numero_filas = mysql_num_rows($result);

for($i=1;$i<=$numero_filas;$i++){
$mostrar = mysql_fetch_array($result);
	pdf_begin_page($g, $ancho_p, $alto_p);

//Tamaño y fuente de letra
pdf_set_font($g, "Courier", 19,"host", 0 );

//Color de la letra usando colores RGB
pdf_setcolor($g,"fill","rgb", 1.0, 0, 0);

//Título - texto,x1,y1,ancho,alto,alineación
pdf_show_boxed($g, "al sama" , 200, 770, 200, 30, "center");

//Nombre del alumno
pdf_set_font($g, "Courier", 9,"host", 0 );
pdf_setcolor($g,"fill","rgb", 0, 0, 1.0);
pdf_show_boxed($g, "Alumno: ".$mostrar[3].", ".$mostrar[2] , 10, 700, 200, 30, "center");
pdf_setcolor($g,"fill","rgb", 0, 0,0);
//Notas del alumno
$consulta="select * from notas,modulos where notas.id_modulo=modulos.id_modulo and id_alumno = '".$mostrar[1]."'";
$result1 = mysql_db_query($bd,$consulta);

	//nombres de los campos
	pdf_show_boxed($g, "Módulos", 20, 670, 200, 30, "left");
	pdf_show_boxed($g, "n1", 240, 670, 200, 30, "left");
	pdf_show_boxed($g, "r1", 270, 670, 200, 30, "left");
	pdf_show_boxed($g, "n2", 300, 670, 200, 30, "left");
	pdf_show_boxed($g, "r2", 330, 670, 200, 30, "left");
	pdf_show_boxed($g, "n3", 360, 670, 200, 30, "left");
	pdf_show_boxed($g, "r3", 390, 670, 200, 30, "left");
	pdf_show_boxed($g, "Ordinaria", 410, 670, 200, 30, "left");
	pdf_show_boxed($g, "Extraordinaria", 470, 670, 200, 30, "left");

	//Línea --> x,y
	pdf_moveto($g,10,685);
	pdf_lineto($g,585,685);
	pdf_stroke($g);

$base = 650;

while($mostrar1 = mysql_fetch_array($result1)){
	//relleno de los campos
	pdf_show_boxed($g, $mostrar1[12]." : ", 20, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[2], 240, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[3], 270, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[4], 300, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[5], 330, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[6], 360, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[7], 390, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[8], 430, $base, 200, 30, "left");
	pdf_show_boxed($g, $mostrar1[9], 500, $base, 200, 30, "left");

	$base = $base - 20;
}

//Marco del título
pdf_rect($g, 100, 772, 485, 30);
pdf_stroke($g);

//Línea --> x,y
pdf_moveto($g,10,760);
pdf_lineto($g,585,760);
pdf_stroke($g);

//Círculo --> pdf_circle($g, x, y, r)
pdf_circle($g,65,790,25);
pdf_stroke($g);

pdf_circle($g,65,790,20);
pdf_stroke($g);

//Triángulos --> x,y,alto,ancho,rojo,verde,azul
triangulo($g,50,780,25,15,0,0,0.5);
triangulo($g,57,780,20,15,0,0.5,0);
triangulo($g,65,780,25,15,0.5,0,0);

pdf_end_page($g);
}
pdf_close($g);
echo "<script>window.open('notas.pdf','_self','')</script>";
?>

