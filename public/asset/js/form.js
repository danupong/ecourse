function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

(function ( $ ) {
	$.fn.autoFormLabel = function() {
		$(this).focus(function(){
			$(this).parent().find('label').show();
			$(this).parent().find('.ph_label').hide();
		});

		$(this).parent().find('.ph_label').click(function(){
			if(!$(this).parent().find('input').is(':disabled')){
				$(this).parent().find('input').focus();
			}
		});

		$(this).blur(function(){
			if($(this).val()==''){
				$(this).parent().find('label').hide();
				$(this).parent().find('.ph_label').show();
			}
		});

		$($(this).get().reverse()).each(function(){
			if($(this).val().length > 0){
				$(this).parent().find('input').focus();
			}
		});
	}

}( jQuery ));