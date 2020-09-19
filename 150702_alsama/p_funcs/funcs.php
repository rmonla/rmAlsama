<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Predetermino <®>*/
		$k = 'func';
?>
<!-- ####################################### -->
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<h1>FUNCIONES</h1>
		<table id="tbl_<?php echo $k;?>s">
		  <thead>
				<tr>
		      <th width="100%">FUNCION</th>
		      <th>
		      	<button 
              title   = "Agregar"
              dst     = "middle" 
              id      = "id<?php echo $k.'_0'; ?>" 
              onclick = "abm(this);"
              >+
		      	</button>
		      </th>
		    </tr>
		  </thead>
		  <tbody id="lst_<?php echo $k;?>s">
				<?php include_once "lst.php"; ?>
		  </tbody>
		</table>
	</body>
</html>
<!-- ####################################### -->
