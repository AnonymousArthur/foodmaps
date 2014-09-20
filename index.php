<!DOCTYPE html>
<html>
<header>
<title>Food Maps Prototype</title>
<link rel="stylesheet" href="feedme.css">
</header>
<body>
<h1>Food Maps Prototype v0.1 Alpha</h1>
<p>Select a function</p>
<table border="1">
<form action="GooglePlaceGeo.php">
<tr>
<td><button type="submit">Search</button></td>
<td>Latitude: <input type="text" name="latitude"><br/>Longitude: <input type="text" name="longitude"></td>
<td>Google Place Based on Latitude and Longitude</td>
</tr>
</form>
<form action="GooglePlaceText.php">
<tr>
<td><button type="submit">Search</button></td>
<td>Location: <input type="text" name="location"></td>
<td>Google Place Based on Text</td>
</tr>
</form>
</table>
<a href="phpinfo.php">PHP info</a>
<?php include('footer.html');?>
</body>
</html>
