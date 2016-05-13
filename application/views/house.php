<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/house.css">
	<script type="text/javascript" src="/assets/js/house.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js'></script>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include(dirname(__FILE__).'/partials/header.html'); ?> 
	<?php //var_dump($bedrooms); var_dump($house);?>
  		<?php $zillow_url = "http://www.zillow.com/homes/for_sale/" . str_replace(" ","+",$house['city']) . "/" . str_replace(" ","+",$house['address']); ?>
		
		<h2><?php echo $house['address'] . " " . $house['city'] . ", " . $house['state'] ?></h2> 
		<div id = 'a' class = 'six-m twelve-s'>
	  		<?php $address = str_replace(" ","+",$house['address']) . "," . str_replace(" ","+",$house['city']) . "," . str_replace(" ","+",$house['state']); ?>
		  	<img src="https://maps.googleapis.com/maps/api/streetview?size=400x300&amp;fov=40&amp;location=<?php echo $address ?>&pitch=-0.76&amp;key=AIzaSyDgF_uSIGIONjVyUIPmr1iK_oA8cX8hzFk">
		  	<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address ?>,&zoom=15&size=400x300&maptype=roadmap&markers=color:red%7C<?php echo $address ?>&key=AIzaSyAPk6iNFCYRBFsnbaOZyWrwD9bqUO9y1EI">
			<a href="<?php echo $zillow_url ?>" target="_blank">Check it out on Zillow</a> 
		</div>

		<table class="table table-hover six-m twelve-s" id = 'house_table'>
		    <tbody>
					<?php foreach ($house as $key => $value) {
						if ($key !== 'address' && $key !== 'city' && $key !== 'state') { ?>
							<tr>
								<td><?php echo ucfirst(str_replace("_"," ",$key)) . ":" ?></td>
								<td><?php echo ucfirst($value) ?></td>
							</tr>
						<?php } 
					} 
					foreach ($bedrooms as $bedroom) { 
						foreach ($bedroom as $key => $value) { ?>
						<tr>
							<td><?php echo ucfirst(str_replace("_"," ",$key)) . ":" ?></td>
							<td><?php echo ucfirst($value) ?></td>
						</tr>
					<?php } 
					 } ?>
	    	</tbody>
	  	</table>
	  	<p>Further Comments</p>
	  	<p><?php echo $house['comments'] ?></p>

		<form action = '/delete/<?php echo $house['ID'] ?>' method = 'post'>
			<input type = 'submit' value = 'Delete House' class = 'btn-danger' id = 'delete_button'>
		</form>

	<?php include(dirname(__FILE__).'/partials/footer.html'); ?>

</body>
</html>
