<?php
$search_done = false;

if (isset( $_GET['textinput'] )) {
	searchExactString($_GET['textinput']);
}

function searchExactString($word) {
	$containers = [];

	$file = file_get_contents('search.json');
	$dictionary = json_decode($file, true); // decode the JSON into an associative array

	foreach ($dictionary as $key => $value) {
		if ( starts($key, $word) ) 
			echo '<br>' . $key . '=> ' . $value;
		
	}

	$search_done = true;
}

function starts ($haystack, $needle) {
	return stripos($haystack, $needle, 0) === 0;
}

?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<body>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>SEARCH</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Text Input</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="enter the exact string" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="searchbutton"></label>
  <div class="col-md-4">
    <button id="searchbutton" name="searchbutton" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>
</body>

</html>