<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/house.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
	  	$(function() {
	    	$('table tr').click(function() {
	    		var location = $(this).attr('id');
	    		console.log(location);
	    		window.location = location;
			});
	  	});
	</script>
</head>
<body>

<div class="container">
  <h2>All Houses</h2>           
  <table class="table table-hover" id = 'houses_table'>
    <thead>
      <tr>
      	<?php foreach ($houses[0] as $key => $value) {
      		if ($key !== 'ID' && $key !== 'user_id' && $key !== 'updated_at') { ?>
      			<th><?php echo str_replace("_", " ", $key) ?></th>
      		<?php }	
      	 } ?>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($houses as $house) { ?>
    		<tr id = "/house/<?php echo $house['ID']?>">
    			<?php foreach ($house as $key => $value) {
    				if ($key !== 'ID' && $key !== 'user_id' && $key !== 'updated_at') { ?>
    					<td><?php echo $value ?></td>
    			<?php }
    			
    			 } ?>
    		</tr>
    	<?php } ?>
      <tr>
    </tbody>
  </table>
  <a href="/new"><button class ='btn-primary' id = 'add_house'>Add a house</button></a>
</div>
	
</body>
</html>