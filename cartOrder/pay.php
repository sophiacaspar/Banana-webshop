<?php	
/*** INSERT move items from cart to ORDERINFO ***/

//First, fetch the products and price that match the cart id:

//Then generate an order ID (unique in ORDER, not unique in ORDERINFO

//Then put all of the users items into ORDERINFO

//Then generate an order in ORDER, linked to the proper ORDERINFO and user

//Then put create an order in the ORDER table and link it to the user




$userId = $_SESSION['userId'];
$cartId = $_SESSION['cartId'];
$totPrice = $_SESSION['totPrice'];


//Creates an order row linked to the user in table ORDER
$sqlNewOrder = "INSERT INTO `ORDER` (`orderId`, `userId`, `orderTimeStamp`, `shippedTimeStamp`, `totalPrice`) VALUES ({$cartId}, {$userId}, NOW(), NULL, {$totPrice})";

mysql_query($sqlNewOrder, $link) or die(mysql_error());


//Fetch all of the items in CART linked to the active order.
$join = "SELECT CART.productId, CART.quantity, PRODUCT.price
FROM CART 
INNER JOIN PRODUCT
ON CART.productId=PRODUCT.productId
WHERE CART.cartId = ({$cartId})";

$result = mysql_query($join, $link) or die(mysql_error());

//$num_row = "SELECT COUNT(productId) FROM CART WHERE cartId = '{$cartId}'";
//$row_count = mysql_query($num_row, $link) or die(mysql_error());
$row_count = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);


for($i=0;$i<$row_count;$i++){
$PD = mysql_result($result,$i,'productId');
$QT = mysql_result($result,$i,'quantity');
$PC = mysql_result($result,$i,'price');

	$sqlInsert = "INSERT INTO ORDERINFO (orderId, productId, quantity, price) VALUES ('{$cartId}','{$PD}','{$QT}','{$PC}')";


	$QTupdt = "UPDATE PRODUCT SET stock = stock - {$QT} WHERE productId = '{$PD}'";
	mysql_query($QTupdt, $link) or die(mysql_error());
	mysql_query($sqlInsert, $link) or die(mysql_error());
}

$remove = "DELETE FROM CART WHERE cartId = ('{$cartId}')";
mysql_query($remove, $link) or die(mysql_error());
session_regenerate_id();

echo "<br>Your order has been placed! Thank you.";
$page = $_SERVER['PHP_SELF'];
echo '<meta http-equiv="Refresh" content="3;' . $page . '">';

?>
