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
  <script src="/assets/js/house.js"></script>
</head>
<body>
  <?php include(dirname(__FILE__).'/partials/header.html'); ?>

	<div id="container">
		<h2>Add A House</h2>
    <!-- create form that creates a new house and place form into Bootstrap accordian tabs -->
  	<form action ='submit_house' method = 'post'>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class = 'white px'>Location</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="form-group">
                <label for="address">Address:</label>
    			      <input type = 'text' name = 'address' class="form-control">
              </div>
              <div class="form-group">
                <label for="city">City:</label>
  			        <input type = 'text' name = 'city' class="form-control">
              </div>
              <!-- get array of all states and place in select tag -->
              <?php include(dirname(__DIR__).'/helpers/SiteFunctions.php'); ?>
              <?php $states = getStates(); ?>
              <div class="form-group">
                <label for="state">State:</label>
    			      <select class="form-control" name = 'state'>
                  <?php
                    foreach ($states as $key => $value) { ?>
                      <option value=<?php echo $key ?>><?php echo $value ?></option>
                    <?php }
                  ?>
                </select>
              </div> 
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class = 'white px'>General Details</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="form-group">
                <label for="square_footage">Sqaure Footage:</label>
                <input type = 'number' name = 'square_footage' class="form-control">
              </div>
              <div class="form-group">
                <label for="year_built">Year Built:</label>
                <input type = 'number' name = 'year_built' class="form-control">
              </div>
              <div class="form-group">
                <label for="heating">Heating</label>
                <select class="form-control" name = 'heating' onchange = 'CheckColors(this.value)' id = 'select'>
                  <option value="forced air">Forced Air</option>
                  <option value="radiator">Radiator</option>
                  <option value='other'>Other</option>
                </select>
                <input class="form-control" type="text" name="" id="other" style='display:none; margin-top:10px;' placeholder = 'other'>
              </div>
              <div class="form-group">
                <label for="cooling">Cooling</label>
                <select class="form-control" name = 'cooling' onchange = 'CheckCooling(this.value)'>
                  <option value="central air">Central Air</option>
                  <option value="window unit">Window Unit</option>
                  <option value='other'>Other</option>
                </select>
                <input class="form-control" type="text" name="" style='display:none; margin-top:10px;' placeholder = 'other'>
              </div>
              <div class="form-group">
                <label for="comment">Further Comments:</label>
                <textarea class="form-control" rows="3" cols = '10' name = 'general_comments'></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class = 'white px'>Kitchen</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="form-group">
                <label for="kitchen_style">Style:</label>
                <input type = 'text' name = 'kitchen_style' class="form-control">
              </div>
            	<div class="form-group">
                <label for="kitchen_size">Size:</label>
                <input type = 'text' name = 'kitchen_size' class="form-control">
              </div>
              <div class="form-group">
                <label for="comment">Further Comments:</label>
                <textarea class="form-control" rows="3" cols = '10' name = 'kitchen_comments'></textarea>
              </div>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class = 'white px'>Bedrooms</a>
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <div class="panel-body" id ="bedroom_body">
              <div class="form-group">
                <label for="state">Number:</label>
                <input type = 'number' name = 'bedroom_number' class="form-control">
              </div>
              <div class="form-group">
                <label for="bedroom_1">Bedroom 1 Details:</label>
                <input type = 'text' name = 'bedroom_1_details' class="form-control">
              </div>
              <p class = 'text-primary' id = 'add_bedroom'><span id = 'yo' class="glyphicon glyphicon-plus text-primary"></span>add bedroom</p>
              <div class="form-group">
                <label for="bedroom_comments">Further Comments:</label>
                <textarea class="form-control" rows="3" cols = '10' name = 'bedroom_comments'></textarea>
              </div>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" class = 'white px'>Yards</a>
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="form-group">
                <label for="front_yard">Front Yard:</label>
                <input type = 'text' name = 'front_yard' class="form-control">
              </div>
              <div class="form-group">
                <label for="backyard:">Backyard:</label>
                <input type = 'text' name = 'backyard' class="form-control">
              </div>
              <div class="form-group">
                <label for="comment">Further Comments:</label>
                <textarea class="form-control" rows="3" cols = '10' name = 'yard_comments'></textarea>
              </div>
        	  </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading accordian_heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" class = 'white px'>Further Comments</a>
            </h4>
          </div>
          <div id="collapse6" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="form-group">
                <label for="comment">Comments:</label>
                <textarea class="form-control" rows="5" name = 'comments'></textarea>
              </div>
        	  </div>
          </div>
        </div>
      </div>
      <input type = 'submit' value = 'Add House' id = 'submit_button' class ='btn-success'>
    </form>
  </div>

  <?php include(dirname(__FILE__).'/partials/footer.html'); ?>
</body>
</html>