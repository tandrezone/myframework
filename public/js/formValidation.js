/**
 * Valida forms
 * Procura os inputs dentro dos forms, se algum dos inputs tiver class mandatory procura pelo conteudo se for vazio despoleta erro
 * Se tiver class numeric procura se tem class numeric
 */
$('.submit').click(function() {
  $('form').find('input').each(function( index, el ) {
      if($(el).hasClass('mandatory')){
        if($(el).val() == ''){
          $(el).css('border','1px solid red');
          $('.error').html('Este Campo não pode estar vazio');
          error = 1;
        }
      }
      if($(el).hasClass('numeric')){
        if(!$.isNumeric($(el).val())){
          $(el).css('border','1px solid red');
          $('.error').html('Este Campo é numerico');
          error = 1;
        }
      }
  });
	if(error == 1){
    error = 0;
    return false;
  } else {
    $('form').submit();
  }
});
