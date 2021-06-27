<?php  
	/*<®> Includes <®>*/
		include_once('../php/fxs.php');
?>
<h1>
	Clientes
</h1>
<table id="tbl_clis">
  <thead>
  	<tr>
  		<th colspan='4'>
  			<div id="" style="float: right;">
  				BUSCAR <input id="busc" type="text">
  			</div>
  		</th>
  	</tr>
    <tr>
      <th>Cliente</th>
      <th>Dirección</th>
      <th>C.P.</th>
      <th>Ciudad</th>
    </tr>
  </thead>
  <tbody id="tbl_clis_lst">
  	<?php include_once('clis_lst.php'); ?>
  </tbody>
</table>
<script type="text/javascript" src="clis/clis.js"></script>
