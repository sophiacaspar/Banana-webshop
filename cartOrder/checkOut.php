<?php 

if(!$_SESSION['checkOut']==1)
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {
if(isLoggedIn()){ 
	echo "<h2>CHECK YOUR ORDER</h2>";
	include 'cartOrder/viewUser.php';
	include 'cartOrder/viewCart.php';
	include 'cartOrder/creditCard.php';
	include 'db_connect.php';



	


?>

<?php
}

else{
	include 'loginUser/login.php';
}
}

?>
