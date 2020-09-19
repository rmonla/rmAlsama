function enviar(b) {
  var url  = 'php/sql.php';
  var dats = $.param($('.dat'));
  var dst  = $('#'+$( b ).attr('dst'));
  $.post(url, dats, function(data){
    dst.html(data);
    setTimeout(function() {salir(b)}, 1500);
  });
};