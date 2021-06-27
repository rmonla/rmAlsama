function confirma(b){
  var tit = $(b).attr('tit');
  var bcont = $(b).parent('div');
  var bcont_html_ini = bcont.html();
  bcont.html('');
  
  $('<p>')
    .append('A continuación se procederá a eliminar éste/a '+tit)
    .appendTo(bcont);  
  $('<h3>')
    .append('¿Desea continuar?')
    .appendTo(bcont);  
  $('<button>')
    .append('Si')
    .on('click', function(){
      $('.dat[name=modo]').val('b')
      enviar(b)
    })
    .appendTo(bcont);  
  $('<button>')
    .append('No')
    .on('click', function(){
      bcont.html(bcont_html_ini)
    })
    .appendTo(bcont);  
}