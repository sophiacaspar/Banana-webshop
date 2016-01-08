<?php	
/*** INSERT move items from cart to ORDERINFO ***/

//First, fetch the products and price that match the cart id:

//Then generate an order ID (unique in ORDER, not unique in ORDERINFO

//Then put all of the users items into ORDERINFO

//Then generate an order in ORDER, linked to the proper ORDERINFO and user

//Then put create an order in the ORDER table and link it to the user
if(!isset( $_SESSION['userId'] ) || !$_SESSION['checkOut']==1)
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {




$userId = $_SESSION['userId'];
$cartId = $_SESSION['cartId'];
$totPrice = $_SESSION['totPrice'];


$sqlAddress = "SELECT address, postalCode, city, country FROM USER WHERE userId = {$userId}";
$addressQ = mysql_query($sqlAddress, $link) or die(mysql_error());

$address = mysql_result($addressQ,0,'address');
$postalCode = mysql_result($addressQ,0,'postalCode');
$city = mysql_result($addressQ,0,'city');
$country = mysql_result($addressQ,0,'country');

$shippingAddress =  $address." ".$postalCode." ".$city." ".$country;


//Creates an order row linked to the user in table ORDER
$sqlNewOrder = "INSERT INTO `ORDER` (`orderId`, `userId`, `orderTimeStamp`, `shippedTimeStamp`, `totalPrice`, `shippingAddress`) VALUES ('{$cartId}', {$userId}, NOW(), NOW(), {$totPrice}, '{$shippingAddress}')";

mysql_query($sqlNewOrder, $link) or die(mysql_error());


//Fetch all of the items in CART linked to the active order.
$join = "SELECT CART.productId, CART.quantity, PRODUCT.price
FROM CART 
INNER JOIN PRODUCT
ON CART.productId=PRODUCT.productId
WHERE CART.cartId = '{$cartId}'";

$result = mysql_query($join, $link) or die(mysql_error());

//$num_row = "SELECT COUNT(productId) FROM CART WHERE cartId = '{$cartId}'";
//$row_count = mysql_query($num_row, $link) or die(mysql_error());
$row_count = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);


for($i=0;$i<$row_count;$i++){
$PD = mysql_result($result,$i,'productId');
$QT = mysql_result($result,$i,'quantity');
$PC = mysql_result($result,$i,'price');

	mysql_query("BEGIN TRANSACTION", $link);
	$sqlInsert = "INSERT INTO ORDERINFO (orderId, productId, quantity, price) VALUES ('{$cartId}','{$PD}','{$QT}','{$PC}')";

	$QTupdt = "UPDATE PRODUCT SET stock = stock - {$QT} WHERE productId = '{$PD}'";
	
	$result1 = mysql_query($QTupdt, $link);
	$result2 = mysql_query($sqlInsert, $link);

	if(!$result1 and !$result2){
		mysql_query("ROLLBACK TRANSACTION", $link);
		echo "transaction rolled back";
		exit;
	} else {
		mysql_query("COMMIT TRANSACTION", $link);
		echo "<br>Your order has been placed! Thank you.";
	}
}

$remove = "DELETE FROM CART WHERE cartId = '{$cartId}'";
mysql_query($remove, $link) or die(mysql_error());
session_regenerate_id();


$page = $_SERVER['PHP_SELF'];
echo '<meta http-equiv="Refresh" content="3;' . $page . '">';
}
?>
