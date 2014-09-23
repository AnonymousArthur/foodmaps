<!DOCTYPE HTML>

<?php
session_start();
// store session data
$_SESSION['views']=1;
?>

<html>
<header>
<title>FeedMe - Results</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="feedme.css">
</header>
<body id='main'>
<div id="container" class="js-masonry"
  data-masonry-options='{ "columnWidth": 150, "itemSelector": ".item" }'>
<?php include('title.html');?>
<?php
require_once('googlePlaces.php');
$searchArea=$_GET['location'];
echo '<p>Restaurants near '.$searchArea.'</p>';
$apiKey       = '';
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
				echo "<a href='details.php?restaurant=",$information['name'],"'>",$information['name'],"</a>";
				$_SESSION[$information['name']]['Address']=$information['formatted_address'];
				$_SESSION[$information['name']]['icon']=$information['icon'];
				echo '<br/>';
				$URL = $googlePlaces->photo($p['photo_reference'],$p['height'],$p['width']);
				echo '<img src="',$URL,'">';
				echo '<br/><br/>';
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
