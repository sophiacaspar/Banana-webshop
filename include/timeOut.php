<?php
include 'db_connect.php';
$cartId = $_SESSION['cartId'];


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 15 (1800s) minutes ago
// Empty cart
	$remove = "DELETE FROM CART WHERE cartId = ('{$cartId}')";
	$emptyCart = mysql_query($remove, $link) or die(mysql_error());

    	session_unset();     // unset $_SESSION variable for the run-time 
    	session_destroy();   // destroy session data in storage

	if(isLoggedIn()){
		$_SESSION['userId'] = 0;
	}

	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


?>
