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
  	<script src="/assets/js/login.js"></script>
</head>
<body>
	<div id = 'login_container'>
		<div id = 'login_header'>
			<p id = 'logo' class = 'text-primary'>Real Estate Investor</p>
			<!-- buttons that enable form to toggle between login and sign up using jQuery-->
			<div>
				<button class ='btn-success btn-lg' id = 'login_button_top'>LOGIN</button>
				<button class ='btn-primary btn-lg' id = 'sign_up_button_top'>SIGN UP</button>
			</div>
		</div>
		<img src="http://www.newgeography.com/files/imagecache/Chart_Story_Inset/bigstock-Friendly-neighborhood-a-child-15280499.jpg">
		<div id = 'sign_in_box'>
			<form action = 'login' method = 'post'>
				<div class="form-group sign_up_name">
                	<label for="first_name">First Name:</label>
    			    <input type = 'text' name = 'first_name' class="form-control input-lg">
              	</div>
              	<div class="form-group sign_up_name">
                	<label for="last_name">Last Name:</label>
    			    <input type = 'text' name = 'last_name' class="form-control input-lg">
              	</div>
				<div class="form-group">
                	<label for="email">Email:</label>
    			    <input type = 'text' name = 'email' class="form-control input-lg">
              	</div>
              	<div class="form-group">
                	<label for="password">Password:</label>
    			    <input type = 'password' name = 'password' class="form-control input-lg">
              	</div>
              	<input type = 'submit' value = 'Log In' class ='btn-primary' id = 'login_button'>
			</form>
			<?php if(!empty($errors)){ ?>
				<div class = 'alert alert-warning'><?php echo $errors; ?></div>
			<?php }
			if(!empty($logout)){ ?>
				<div class = 'alert alert-warning'><?php echo $logout; ?></div>
			<?php }
			if(!empty($login)){ ?>
				<div class = 'alert alert-warning'><?php echo $login; ?></div>
			<?php } ?>
		</div>
		<button id = 'view_video' class ='btn-primary'>View a short video demonstration</button>
	</div>
	<div id = 'overlay'></div>
	<iframe id = 'video' width="560" height="315" src="https://www.youtube.com/embed/qQIxZIhIYKg" frameborder="0" allowfullscreen></iframe>
</body>
</html>
