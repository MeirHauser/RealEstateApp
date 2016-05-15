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
  	<script type="text/javascript">
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
  	</script>
</head>
<body>
	<div id = 'login_container'>
		<div id = 'login_header'>
			<button class ='btn-success btn-lg' id = 'login_button_top'>LOGIN</button>
			<button class ='btn-primary btn-lg' id = 'sign_up_button_top'>SIGN UP</button>
			<p id = 'logo' class = 'text-primary'>Real Estate Investor</p>
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
    			    <input type = 'text' name = 'password' class="form-control input-lg">
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
			<p>yo</p>
		</div>
	</div>
</body>
</html>
