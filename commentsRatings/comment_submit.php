<?php
include 'db_connect.php';



$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$prodId = filter_var($_POST['prodId'], FILTER_SANITIZE_STRING);
$userId = $_SESSION['userId'];

$message = "";
$commentSet = 0;

//If the comment is longer than 2 characters it is added to the COMMENT table.
if(strlen($comment) > 2){
	$commentInsert = "INSERT INTO COMMENT (commentId, userId, productId, comment, commentTimeStamp) VALUES (0, '{$userId}', '{$prodId}', '{$comment}', NOW())";
	$mwh = mysql_query($commentInsert, $link); 
	$message = "Comment ";
	$commentSet = 1;
}

$message = $message. "has been sent!";
echo $message;
echo '<meta http-equiv="Refresh" content="0;url=http://utbweb.its.ltu.se/~angbru-0/?p=bananas">';

?>
