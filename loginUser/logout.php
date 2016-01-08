<?php

// Empty cart
$cartId = $_SESSION['cartId'];

$remove = "DELETE FROM CART WHERE cartId = '{$cartId}'";
$emptyCart = mysql_query($remove, $link) or die(mysql_error());

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();

$_SESSION['userId'] = 0;
$_SESSION['userType'] = 0;

if(!isset( $_SESSION['userId'] ))
{
	include 'index.php';
}
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

?>
