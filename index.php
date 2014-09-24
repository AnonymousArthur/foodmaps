<!DOCTYPE html >
<!-- testing that I can use git, hi its jack -->
<html>
<head>
<title>FeedMe</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="feedme.css">
<script src="masonry.pkgd.js"></script>
</head>
<body id="main">
<?php include('title.html');?>
<?php
require_once('geoplugin.php');
$geoplugin = new geoPlugin();
//$geoplugin->locate('1.144.131.146');
$geoplugin->locate();
?>
<div class="aParent">
<div id="searchBox">
<?php
$location=$geoplugin->city.", ".$geoplugin->countryName;
echo "<form action='GooglePlaceText.php'>
<div class='searchBar'>";
if ($geoplugin->city == ''){
	echo "<input class='form-control' type='text' name='location' placeholder='We&nbsp;can&#39;t&nbsp;find you,&nbsp;please&nbsp;enter&nbsp;your&nbsp;location' >";
}else{
	echo "<input class='form-control' type='text' name='location' placeholder='Your location' value='",$location,"'>";
}
echo "</div>
<div class='searchButton'>
<button class='btn btn-primary' type='submit'>Search</button>
</div>
</form>";
?>
</div>
</div>
<!--<a href="phpinfo.php">PHP info</a>-->
<?php include('footer.html');?>
</body>
</html>
