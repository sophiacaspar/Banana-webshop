<?php
include 'db_connect.php';


$rating = filter_var($_POST['rating'], FILTER_SANITIZE_STRING);
$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$prodId = filter_var($_POST['prodId'], FILTER_SANITIZE_STRING);
$userId = $_SESSION['userId'];

$message = "";
$commentSet = 0;

//If the comment is longer than 2 characters it is added to the COMMENT table.
if(strlen($comment) > 2){
	$commentInsert = "INSERT INTO COMMENT (commentId, userId, productId, comment) VALUES (0, '{$userId}', '{$prodId}', '{$comment}')";
	$mwh = mysql_query($commentInsert, $link); 
	$message = "Comment ";
	$commentSet = 1;
}

if($rating > 0){
	$ratingInsert = "INSERT INTO RATING (ratingId, userId, productId, rating) VALUES (0, '{$userId}', '{$prodId}', '{$rating}')";
	$mwh = mysql_query($ratingInsert, $link); 
	if($commentSet >0){
		$message = $message."and rating ";
	} else {
		$message = "Rating ";
	}
}
$message = $message. "has been sent!";
echo $message;

?>
