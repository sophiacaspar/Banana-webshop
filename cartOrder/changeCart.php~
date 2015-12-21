<?php
function changeCart($prodId,$quantity){
	global $link, $cartId;
	$id = filter_var($prodId, FILTER_SANITIZE_STRING);
	$quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
	$check = "SELECT * FROM CART WHERE (cartId = '{$cartId}' AND productId = '{$id}')";
	$checking = mysql_query($check, $link) or die(mysql_error());

	
if($quantity > 0){
		/** Checks if product already exists in cart
			Updates quantity if product exists with current cartId **/
		if(mysql_num_rows($checking) > 0){
			$sql_insert = "UPDATE CART SET quantity = quantity +1 WHERE (cartId = '{$cartId}' AND productId = '{$id}')";
		
		/** Add product to cart **/
		} else {
			$sql_insert = "INSERT INTO CART (cartId, productId, quantity) VALUES ('{$cartId}','{$id}','{$quantity}')";
		} 

/** Remove product **/
}else if($quantity == 0 || mysql_fetch_assoc($checking)['quantity']<= 1){
	$sql_insert = "DELETE FROM CART WHERE cartId = '{$cartId}' AND productId = '{$id}'";
}

/** Reduce quantity of product **/
else{
	$sql_insert = "UPDATE CART SET quantity = quantity -1 WHERE (cartId = '{$cartId}' AND productId = '{$id}')";
}

	$result = mysql_query($sql_insert, $link) or die(mysql_error());
}



?>
