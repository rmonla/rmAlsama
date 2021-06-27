/*<®> fx validar <®>*/
  /**
   * Función que verifica si son valores
   * correctos según el control.
   */
  var textvalid = "";
  var valis = {
                abmper:{
                  fnac: function(c){
                    var fvalid = function(v){
                      var f1 = new Date(v);
                      var a1 = f1.getFullYear();
                      var f2 = new Date();
                      var a2 = f2.getFullYear()-6;
                      if ( a1 <= a2) return 0;
                      return 1;
                    }
                    if ( fvalid($(c).val()) ){
                      textvalid = "La edad de la persona no puede ser menor a 6 años.";
                      return false;
                    } else return true;
                  },
                  ape: function(c){
                    if ( $(c).val() == "" ){
                      textvalid = "El APELLIDO no puede quedar en blanco.";
                      return false;
                    } else return true;
                  },
                  nom: function(c){
                    if ( $(c).val() == "" ){
                      textvalid = "El NOMBRE no puede quedar en blanco.";
                      return false;
                    } else return true;
                  }
                }
              };
  
  function validar(){
    var salida = true;
    var grup = $("[id^='abm'] .dat:visible:first").parents('div').attr('id');
    var ctrls = $("[id='"+grup+"'] .dat:visible");
    var tips = $( "#dialog_temp" );

    $.each(ctrls, function(){
      console.log(valis[grup]);
      var valido = (!valis[grup] || !valis[grup][this.name])? true : valis[grup][this.name](this);
      if ( !valido ){
        this.focus();
        tips
          .hide()
          .text( textvalid )
          .toggle(500)
          .addClass( "ui-state-highlight" );
        setTimeout(function() {
          tips
            .removeClass( "ui-state-highlight", 1500 )
            .toggle(500);
        }, 500 );
        //console.log('ERROR en ' + grup + '_' + this.name);
        salida = false;
        return false; //corto el bucle.
        }
    });      
    return salida;
  }

