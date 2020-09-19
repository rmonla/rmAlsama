function salir(b) {
  var url  = 'php/conts.php';
  var dats = {opt: $( b ).attr('opt')};
  var dst  = $('#'+$( b ).attr('dst'));
  $.post(url, dats, function(data){dst.html(data)});
};