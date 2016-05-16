$(document).ready(function(){
  $("#login_button_top").click(function(){
    $('form').attr('action', 'login');
    $('#login_button').attr('value', 'Log In');
    $('.sign_up_name').css('display', 'none');
  });

  $("#sign_up_button_top").click(function(){
    $('form').attr('action', 'sign_up');
    $('#login_button').attr('value', 'Sign Up');
    $('.sign_up_name').css('display', 'block');
  });
});