$(document).ready(function(){
  $(".glyphicon-search").click(function(){
    $("#hidden").slideToggle("1600");
  });

  $('#password, #repassword').on('keyup', function(){
    if($('#password').val() == $('#repassword').val()){
      $('#message').html('Matching').css('color', 'green');
      $('#submit').removeAttr('disabled', true);
    }else{
      $('#message').html('Not Matching').css('color', 'red');
      $('#submit').attr('disabled', true);
    }
  });

});
