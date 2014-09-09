<!DOCTYPE HTML>
<html>
<header>
<title>Google Place Test</title>
</header>
<body>
<h1>Google Place Test</h1>
<?php
require_once('/Users/Arthur/Sites/foodmaps/googlePlaces.php');
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
}
?>
<a href="index.php"><button type="button">Back</button></a>
<?php include('/Users/Arthur/Sites/foodmaps/footer.html');?>
</body>
</html>