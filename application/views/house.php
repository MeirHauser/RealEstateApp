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

	  });
  </script>
</head>
<?php 
	$address = str_replace(" ","+",$house['address']) . "," . str_replace(" ","+",$house['city']) . "," . str_replace(" ","+",$house['state']);?>
	
	<div class="container"> 
	<h2><?php echo $house['address'] . " " . $house['city'] . ", " . $house['state'] ?></h2>        
	<table class="table table-hover" id = 'house_table'>
	    <tbody>
				<?php foreach ($house as $key => $value) {
					if ($key !== 'ID' && $key !== 'user_id' && $key !== 'address' && $key !== 'city' && $key !== 'state') { ?>
						<tr>
						<td><?php echo ucfirst($key) . ":" ?></td>
						<td><?php echo $value ?></td>
						</tr>
					<?php } 
				} ?>
    	</tbody>
  	</table>
	  	<div id = 'a'>
		  	<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address ?>,&zoom=15&size=400x300&maptype=roadmap
			&markers=color:red%7C<?php echo $address ?>
			&key=AIzaSyAPk6iNFCYRBFsnbaOZyWrwD9bqUO9y1EI">
			<img src="https://maps.googleapis.com/maps/api/streetview?size=400x300&location=<?php echo $address ?>&pitch=-0.76&key=">
		</div>
		<form action = '/delete/<?php echo $house['ID'] ?>' method = 'post'>
			<input type = 'submit' value = 'Delete House' class = 'btn-danger' id = 'delete_button'>
		</form>
		<a href="/all_houses" id = 'all_houses'>Back to Houses</a>
	</div>
