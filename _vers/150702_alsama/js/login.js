/*<®> Inicialización <®>*/
  $( document ).ready( function(){
    login();
	})

/*<®> fx login <®>*/
	/**
	 * Función que verifica el logín del usuario
   * y carga si es necesario el formulario de login.
	 */
	function login(){
    var dst = $( '#login' );
    var url = 'login.php';
    var dts = $.param($('.dat'));
    $.post(url, dts, function(data){
      dst.html(data);
      $('#mainmenu').load('php/mnu.php', function(){mnus()});
    });
	}
/*<®> fx newPass <®>*/
  /**
   * Función que borra el botón de cambiar contraseña
   * por el imput.
   */
  function newPass(ctr){
    //console.log($(ctr).parent());
    var dst = $(ctr).parent();
    dst.html('');
    var i1 = $('<input>')
                .attr({type: 'password'})
                .on({
                  keyup: function(){
                    i2.val(CryptoJS.MD5(i1.val()));
                  }
                })
                .appendTo(dst)
    var i2 = $('<input>')
                .attr({
                  class: 'dat',
                  type:  'password',
                  name:  'pass'
                })
                .hide()
                .appendTo(dst)
  }
