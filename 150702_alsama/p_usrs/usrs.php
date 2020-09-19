<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
	/*<®> Predetermino <®>*/
		$k = 'usr';
?>
<!-- ####################################### -->
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<h1>USUARIOS</h1>
		<table id="tbl_<?php echo $k;?>s">
		  <thead>
				<tr>
		      <th width="30%">USUARIO</th>
          <th width="50%">PERSONA</th>
		      <th width="20%">PERFIL</th>
		      <th>
		      	<button 
		      		title="Agregar"
              dst="middle" 
		      		id="id<?php echo $k.'_0'; ?>" 
		      		onclick="abm(this);"
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
