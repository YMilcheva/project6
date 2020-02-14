<?php

function topHeader($pageTitle){
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<dir class="container-fluid">
<?php
}

function fightForm(){
?>
<div class="row">
    <div class="col">
    		
    </div>
    <div class="col-5">
    	<form action="fight.php" method="post" class="text-center border border-light p-5">
		<div class="form-group">
	<h3 class="font-weight-bold">Fighters:</h3>
	 <input class="form-control mb-4" type="text" name="fighters" placeholder="Please enter fighters">
	</div>
	<hr class="new4" />
	<h3 class="font-weight-bold">Master attributes</h3>
	<div class="form-group">
	<label class="font-weight-bold"> Health:</label>
	 <input class="form-control mb-4" type="text" name="health" min="1"max="20" placeholder="Min:1  Max:20">
</div>
<div class="form-group">
		<label class="font-weight-bold"> Attack:</label>
		<input class="form-control mb-4" type="text" name="attack"min="6"max="10" placeholder="Min:6  Max:10">
</div>
<div class="form-group">
		<label class="font-weight-bold"> Resistance:</label>
			<input class="form-control mb-4" type="text" name="resistance"min="1"max="5" placeholder="Min:1  Max:5">
</div>
	<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Go Fight</button>
	
</form>
    </div>
    <div class="col">
    </div>
  </div>
<?php	
}
