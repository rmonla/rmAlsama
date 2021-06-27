<?php
$regre = $_SERVER['HTTP_REFERER'];
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

require("validar.php");

$usuario     = $_SESSION["usuario"];
$cod_alumno  = $_POST["cod_alumno"];
$cod_materia = $_POST["cod_materia"];
$nota_1      = $_POST["nota1"];
$nota_2      = $_POST["nota2"];
$nota_3      = $_POST["nota3"];


require("conectar.php");

$abc = "SELECT * 
        FROM nota
        WHERE cod_materia = $cod_materia and cod_alumno = $cod_alumno";
$abc2 = mysql_query($abc);

/*if(mysql_num_rows($abc2))
{
	echo "<script>
		  location.href = $regre
		  alert('Alumno con nota ya Agregada')
		  </script>";
}
else
{
*/$sql = "INSERT INTO nota
        VALUES
		(NULL,'$nota_1','$nota_2','$nota_3','$cod_alumno','$cod_materia')";

//}
if(mysql_query($sql))
{
header("location: $regre");
exit;
}else{
echo mysql_error();
}
  }else
  {
	  	  ?>
	  <script>
      alert('El Periodo ya esta Cerrado, Abra uno Nuevo');
      </script>
	  <?php
  }
?>