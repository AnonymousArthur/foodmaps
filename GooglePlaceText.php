<!DOCTYPE HTML>
<html>
<header>
<title>Google Place Test</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</header>
<body>
<h1>Google Place Test</h1>
<?php
require_once('googlePlaces.php');
$searchArea=$_GET['location'];
echo '<p>Restaurant near '.$searchArea.'</p>';
$apiKey       = 'AIzaSyDbZH9Gk817QYnpNcq21n8w2PaDPu0QhOQ';
$googlePlaces = new googlePlaces($apiKey);

$googlePlaces->setRadius(2000);
$keyword='restaurants in '.$searchArea;
$googlePlaces->setQuery($keyword);
$results = $googlePlaces->textSearch();
foreach($results['result'] as $information){
	echo $information['name'];
	echo '<br/>';
	if(!empty($information['photos'])){
		foreach($information['photos'] as $p){
			if(!empty($p['photo_reference'])){
				$URL = $googlePlaces->photo($p['photo_reference'],$p['height'],$p['width']);
				$s1 = '<img src="';
				$s2 = '">';
				echo $s1.$URL.$s2;
				//echo $p['photo_reference'];
				echo '<br/><br/>';
			}
		}
	}
}
?>
<a href="index.php"><button type="button">Back</button></a>
<?php include('footer.html');?>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
</ul>
</body>
</html>
