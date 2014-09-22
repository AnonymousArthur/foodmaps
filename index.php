<?php header("HTTP/1.1 200 OK"); ?>
<!DOCTYPE html >
<html>
<header>
<title>FeedMe</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="feedme.css">
</header>
<body id="main">
<?php include('title.html');?>
<?php
require_once('geoplugin.php');
$geoplugin = new geoPlugin();
//$geoplugin->locate('60.241.171.5');
$geoplugin->locate();
?>
<div id="searchBox">
<?php
$location=$geoplugin->city.", ".$geoplugin->countryName;
echo "<form action='GooglePlaceText.php'>
<div class='searchBar'>
<input class='form-control' type='text' name='location' placeholder='Your location' value='",$location,"'>
</div>
<div class='searchButton'>
<button class='btn btn-primary' type='submit'>Search</button>
</div>
</form>"
?>
</div>


<!--<a href="phpinfo.php">PHP info</a>-->
<?php include('footer.html');?>

</body>
</html>
