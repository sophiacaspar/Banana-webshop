<?php 

if(isLoggedIn()){ 
	echo "<h2>CONTROL YOUR ORDER</h2>";
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


?>
