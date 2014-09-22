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
$restaurant_name = $_GET["restaurant"];
$suburb = $_GET["suburb"];
session_start();
echo $restaurant_name,"<img src=",$_SESSION[$restaurant_name]['icon'],">","<br/>";
echo $_SESSION[$restaurant_name]['Address'];



?>

<?php include('footer.html');?>
</body>
</html>
