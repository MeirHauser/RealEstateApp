<!DOCTYPE html>
<html ng-app="my_app">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/house.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js'></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src='/assets/angular_factories_controllers.js'></script>
  <script type="text/javascript">
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
    });
  </script>
</head>
<body>
  <?php include(dirname(__FILE__).'/partials/header.html'); ?> 
  <div class="" ng-controller = 'HouseController' id = 'container_main_page'>
    <div class="form-group" id = 'search_box'>
      <input type = 'text' ng-model="house_name" class="form-control input-m" placeholder = 'Search Houses'>
      <span class="glyphicon glyphicon-search">
    </div> 
    <div class="all_houses">
      <div class="twelve-s six-m four-l three-l house"  ng-repeat="house in houses | filter:house_name | orderBy:'created_at':true">
        <h4 class = 'bg-primary white'>{{ house.address }}
          <a href>
            <span class="glyphicon glyphicon-remove" ng-click='removeHouse(house.ID)'></span>
          </a>
        </h4>
        <div>
          <a href="house/{{ house.ID }}">
            <img class = 'google_image' src="https://maps.googleapis.com/maps/api/streetview?size=300x300&amp;fov=40&amp;location={{ house.image }}&amp;pitch=-0.76&amp;key=AIzaSyDgF_uSIGIONjVyUIPmr1iK_oA8cX8hzFk"> 
          </a>
          <p>{{ house.city + ', ' + house.state | uppercase}}</p>
          <p>Created: {{ house.created_at | date }}</p>
        </div>
        <a href="house/{{ house.ID }}" class = 'details'>view details</a>
      </div>
    </div>
  </div>
  <?php include(dirname(__FILE__).'/partials/footer.html'); ?> 
</body>
</html>