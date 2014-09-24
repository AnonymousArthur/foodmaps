<!DOCTYPE HTML>
<html>
<header>
<title>FeedMe - Results</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="feedme.css">
<script src="masonry.pkgd.js"></script>
</head>
<body id='main'>
<?php include('title.html');?>
<?php
session_start();
// store session data
$_SESSION['views']=1;
?>
<?php
require_once('googlePlaces.php');
$searchArea=$_GET['location'];
echo '<p class="rnear">Restaurants near '.$searchArea.'</p>';
?>
<div id="container" class="js-masonry"
  data-masonry-options='{ "columnWidth": 50,"itemSelector": ".item" }'>
<?php
$apiKey       = 'AIzaSyDbZH9Gk817QYnpNcq21n8w2PaDPu0QhOQ';
$googlePlaces = new googlePlaces($apiKey);

$googlePlaces->setRadius(2000);
$keyword='restaurants in '.$searchArea;
$googlePlaces->setQuery($keyword);
$results = $googlePlaces->textSearch();
foreach($results['result'] as $information){	
	if(!empty($information['photos'])){
		foreach($information['photos'] as $p){
			if(!empty($p['photo_reference'])){
				echo '<div class="item">';	
				$_SESSION[$information['name']]['Address']=$information['formatted_address'];
				$_SESSION[$information['name']]['icon']=$information['icon'];
				//echo '<br/>';
				$URL = $googlePlaces->photo($p['photo_reference'],$p['height'],$p['width']);
				$_SESSION[$information['name']]['URL'] = $URL;

				echo '<div class="restaurantSnap">';
				//echo '<img src="',$URL,'" "height="250" width="250">';
				echo "<a href='details.php?restaurant=",$information['name'],"'>";
				echo '<img class="restaurantSnap" src="',$URL,'"></a>';
				echo '</div>';
				echo '<div class="restaurantName">';
				echo "<a href='details.php?restaurant=",$information['name'],"'>";
				echo $information['name'],"</a>";
				echo '</div>';
				echo '</div>';	
			}
		}
	}
}

?>
</div>
<a href="index.php"><button class="btn btn-default" type="button">Back</button></a>
<?php include('footer.html');?>
</body>
</html>
