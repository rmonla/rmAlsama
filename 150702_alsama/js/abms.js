function abm(b) {
  var idtk = $( b ).attr('id');
  var t  = (idt = idtk.split('_'))? idt[0] : 0;
  t = t.slice(2)+'s';
  if ( idt ) { var k = idt[1]; }
  var dst  = $('#'+$( b ).attr('dst'));
  //console.log(t, k, dst);
  var dats = {opt: 'abm', tbl: t, id: k};
  var url = 'php/ir.php';
  $.post(url, dats, function(data){dst.html(data)});
};