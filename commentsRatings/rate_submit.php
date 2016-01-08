<?php
/*** CONNECT TO DATABASE ***/
include 'db_connect.php';

$rate = filter_var($_POST['rate'], FILTER_SANITIZE_STRING);
$prodId = filter_var($_POST['prodId'], FILTER_SANITIZE_STRING);
$userId = $_SESSION['userId'];

$checkUser = "SELECT * FROM RATING WHERE userId = '{$userId}' AND productId = '{$prodId}'";
$check = mysql_query($checkUser, $link) or die(mysql_error());

if (mysql_num_rows($check) > 0) {
	echo "<br>You've already rated";
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="3;' . $page . '">';
} else {
	$ratingInsert = "INSERT INTO RATING (ratingId, userId, productId, rating) VALUES (0, '{$userId}', '{$prodId}', '{$rate}')";
	mysql_query($ratingInsert, $link);
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

}




?>
