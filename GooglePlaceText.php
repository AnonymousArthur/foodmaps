<!DOCTYPE HTML>
<html>
<header>
<title>FeedMe - Results</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="feedme.css">
</header>
<body id='main'>
<div class="title">
<h1>FeedMe</h1>
</div>
<?php
require_once('googlePlaces.php');
$searchArea=$_GET['location'];
echo '<p>Restaurants near '.$searchArea.'</p>';
$apiKey       = 'AIzaSyDbZH9Gk817QYnpNcq21n8w2PaDPu0QhOQ';
$googlePlaces = new googlePlaces($apiKey);

$googlePlaces->setRadius(2000);
$keyword='restaurants in '.$searchArea;
$googlePlaces->setQuery($keyword);
$results = $googlePlaces->textSearch();
foreach($results['result'] as $information){
	//$linkName=str_replace(' ', '+', $information['name'])
	echo "<a href='details.php?restaurant=",$information['name'],"'>",$information['name'],"</a>";
	echo '<br/>';
	if(!empty($information['photos'])){
		foreach($information['photos'] as $p){
			if(!empty($p['photo_reference'])){
				$URL = $googlePlaces->photo($p['photo_reference'],$p['height'],$p['width']);
				$s1 = '<img src="';
				$s2 = '">';
				echo $s1.$URL.$s2;
				echo '<br/><br/>';
			}
		}
	}
}

?>
<a href="index.php"><button class="btn btn-default" type="button">Back</button></a>
<?php include('footer.html');?>
</body>
</html>
