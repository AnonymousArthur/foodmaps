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
<?php include('title.html');?>
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
	echo "<a href='details.php?restaurant=",$information['name'],"&suburb=",$searchArea,"'>",$information['name'],"</a>";
	$_SESSION[$information['name']]['Address']=$information['formatted_address'];
	$_SESSION[$information['name']]['icon']=$information['icon'];
	echo '<br/>';
	if(!empty($information['photos'])){
		foreach($information['photos'] as $p){
			if(!empty($p['photo_reference'])){
				$URL = $googlePlaces->photo($p['photo_reference'],$p['height'],$p['width']);
				echo '<img src="',$URL,'">';
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
