/*<®> Inicialización <®>*/
	$( document ).ready( function(){
		//mnus();
	 })

/*<®> fx mnu <®>*/
	/**
	 * Función que seleciona las opciones
	 * del menu
	 */
	function mnus(){
		$( '#mainmenu' ).find('[opt]').on( 'click', mnu );
	}
	function mnu(){
		var url    = 'php/conts.php';
		var dts    = {};
		dts['opt'] = $( this ).attr('opt');
		var dst    = $( this ).parents('ul').attr('dst');
		dst = $('#'+dst);
		$( this ).parents('ul').find('a').removeClass('active');
		$( this ).addClass('active');
		$.post(url, dts, function(data) {
			dst.html(data);
			smnus();
		});
	}
/*<®> fx smnu <®>*/
	/**
	 * Función que seleciona las opciones
	 * del sub menu
	 */
	function smnus(){
		$( '#rightside' ).find('a').on( 'click', smnu );
    $( '#rightside' ).find('a:first').click();
	}
	function smnu(){
		var opt = $( this ).attr('opt');
		var dst = $( this ).parents('p').attr('dst');
		dst = $('#'+dst);
		$( this ).parents('p').find('a').removeClass('active');
		$( this ).addClass('active');
		$.post(
			'php/conts.php', 
			{opt:opt}, 
			function(data) {
				dst.html(data);
		});
	}
