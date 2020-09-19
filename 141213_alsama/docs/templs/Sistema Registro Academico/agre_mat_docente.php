<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

$codigo  = $_GET["codigo"];
$codigo2 = $_GET["cod_doc"];


require("conectar.php");

$inser = "insert into docente_mat values(NULL,'$codigo2','$codigo')";
mysql_query($inser);
header("location: ver_materias2.php");
exit;
  }
  else
  {
	  	  ?>
	  <script>
      alert('El Periodo ya esta Cerrado, Abra uno Nuevo');
      </script>
	  <?php
  }
?>