$(document).ready(function(e){
  $('#user_icon').click(function(){
    $.get( "/get_user_info", function( data ) {
      $('#edit_first_name').attr("value", data.first_name);
      $('#edit_last_name').attr("value", data.last_name);
      $('#edit_email').attr("value", data.email);
    }, "json");
    $('#user_info_box').fadeIn(300);
    $('#user_info_box').css('z-index','9999');
    $('#overlay').fadeIn(300);
  })
  $('#overlay').click(function(){
    $(this).fadeOut(300);
    $('#user_info_box').fadeOut(300);
  })
  var bedroom_counter = 1;
  $(".glyphicon-plus").click(function(){
    bedroom_counter ++;
    $('#add_bedroom').before('<div class="form-group"><label for="bedroom_' + bedroom_counter + '">Bedroom ' + bedroom_counter + ' Details:</label><input type = "text" name = "bedroom_' + bedroom_counter + '_details" class="form-control"></div>');
    $('#bedroom_body').find("div:nth-last-child(3)").hide().slideDown();
    console.log(bedroom_counter);
  });

  jquerySlideDown = function(element)
  {
      $('#' + element ).hide().slideDown();
  }

  jquerySlideUp = function()
  {
      $('#other').slideUp();
  }
});

function CheckColors(val){
      var select=document.getElementById('select');
      var element=document.getElementById('other');
      if(val=='other'){
        element.name = 'heating';
        select.name = '';
        jquerySlideDown('other');
      }
      else {
        jquerySlideUp();
        select.name = 'heating';
        element.name = '';
      }
    }
