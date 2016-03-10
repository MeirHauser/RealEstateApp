<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/house.css">
	<script type="text/javascript" src="/assets/js/house.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
  $(function() {
    $( "#accordion" ).accordion();
    $( "input[type=submit]" )
      .button()
      .click(function( event ) {
        event.preventDefault();
      });
  });
  </script>
	<style type="text/css">
	</style>
</head>
<body>
	<div class="container">
		<h2>Add A House</h2>
  	<form action ='submit_house' method = 'post'>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Location</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
          	  <p>Address:</p>
  			      <input type = 'text' name = 'address'>
  		        <p>City:</p>
  			      <input type = 'text' name = 'city'>
    			    <p>State:</p>
    			    <input type = 'text' name = 'state'>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Kitchen</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
            	<p>Style:</p>
    			    <input type = 'text' name = 'kitchen_style'>
    		      <p>Size:</p>
    			    <input type = 'text' name = 'kitchen_size'>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Bedroom</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
            	<p>Size:</p>
    			    <input type = 'text' name = 'bedroom_size'>
    			    <p>Number:</p>
    			    <input type = 'number' name = 'bedroom_number'>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Yards</a>
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <div class="panel-body">
            	<p>Front Yard:</p>
        			<input type = 'text' name = 'front_yard'>
        			<p>Backyard:</p>
        			<input type = 'text' name = 'backyard'>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Miscellaneous</a>
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse">
            <div class="panel-body">
            	<p>Sqaure Footage:</p>
        			<input type = 'number' name = 'square_footage'>
        			<p>Year Built:</p>
        			<input type = 'number' name = 'year_built'>
        			<p>Heating:</p>
    			    <input type = 'text' name = 'heating'>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Further Comments</a>
            </h4>
          </div>
          <div id="collapse6" class="panel-collapse collapse">
            <div class="panel-body">
            	<p>Comments:</p>
    		      <textarea rows="4" cols="50" name = 'comments'></textarea>
        	  </div>
          </div>
        </div>
      </div>
      <input type = 'submit' value = 'Add House' id = 'submit_button' class ='btn-success'>
    </form>
    <a href="/all_houses" id = 'all_houses'>Back to Houses</a>
  </div>
</body>
</html>