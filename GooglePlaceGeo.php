<!DOCTYPE HTML>
<html>
<header>
<title>Google Place Test</title>
</header>
<body>
<h1>Google Place Test</h1>
<?php
require_once('googlePlaces.php');
$apiKey       = 'AIzaSyDbZH9Gk817QYnpNcq21n8w2PaDPu0QhOQ';
$googlePlaces = new googlePlaces($apiKey);

// Set the longitude and the latitude of the location you want to search near for places

$latitude =$_GET['latitude'];
$longitude = $_GET['longitude'];
if(empty($latitude) || empty($longitude)){
	$latitude   = '-33.8804166';
	$longitude = '151.2107662';
}

$googlePlaces->setTypes('food');
$googlePlaces->setLocation($latitude . ',' . $longitude);
$googlePlaces->setRadius(2000);
$results = $googlePlaces->Search();
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
</body>
</html>
