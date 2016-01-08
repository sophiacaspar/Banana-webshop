<?php
include 'db_connect.php';
if(!isset( $_SESSION['userId'] ) || !isAdmin())
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

//Filter all of the inputs for the new product
$commentId = filter_var($_POST['commentId'], FILTER_SANITIZE_STRING);


//Add the new product to the PRODUCT table
$sqlNewProduct = "DELETE FROM COMMENT WHERE commentId = '{$commentId}'";
mysql_query($sqlNewProduct, $link);
$_SESSION['msg'] = "Comment removed!";
errorMsg();

echo '<meta http-equiv="Refresh" content="1;url=http://utbweb.its.ltu.se/~angbru-0/?p=bananas">';
}

?>
