<?php 
include 'db_connect.php';
$cartId = $_SESSION['cartId'];
// Count number of unique products in cart
$sql = "SELECT count( DISTINCT(productId)) FROM CART WHERE cartId = '{$cartId}'";
$nrCart = mysql_query($sql, $link) or die(mysql_error());
$nr = mysql_fetch_row($nrCart);


?>		
	    <ul id="menu">
	    <li><a href="?p=bananas">Bananas</a></li>
	    <li><a href="?p=about">About</a></li>
	    <li><a href="?p=cart">Cart (<?php echo implode($nr)?>)</a></li>

	    <?php if(isLoggedIn()){ ?>
	    <li><a href="?p=mypage">My page</a></li>
	    <li><a href="?p=logout">Logout</a></li>
	    <?php

		}else { 
	    	?> 
	    <li><a href="?p=login">Login</a></li>
	<?php }

		if(isAdmin()){ ?>
			<li><a href="?p=admin">[Admin]</a></li>	
	<?php } 
	?>
	    </ul> 


