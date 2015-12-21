<?php
/*** Connect to database and fetch all the entries from user ***/
include 'db_connect.php';
$cartId = $_SESSION['cartId'];

$join = "SELECT CART.cartId, CART.productId, PRODUCT.name, CART.quantity, PRODUCT.price
FROM CART 
INNER JOIN PRODUCT
ON CART.productId=PRODUCT.productId
WHERE CART.cartId = ({$cartId})";

$result = mysql_query($join, $link) or die(mysql_error());
$totProd = 0;
$totPrice = 0;

?>
   <br> 
	<br>
<fieldset>
    <table>
	<tr>
	<td><b>Product</td>
	<td><b>Quantity</td>
	<td></td>
	<td></td>
	<td></td>
	<td><b>Price</td>
	</tr>
    <?php 
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $row["name"]?></td>
	<td align="center"><?php echo $row["quantity"]?></td>

	<td><form action="?p=cart_submit" method="post">
	<input type="hidden" name="prodId" value="<?php echo $row['productId']?>">
	<input type="hidden" id="quantity" name="quantity" value="-1">
	<input class="changeCart" type="submit" value="-">
	</form></td>

	<td><form action="?p=cart_submit" method="post">
	<input type="hidden" name="prodId" value="<?php echo $row['productId']?>">
	<input type="hidden" id="quantity" name="quantity" value="1">
	<input class="changeCart" type="submit" value="+">
	</form></td>

	<td><form action="?p=cart_submit" method="post">
	<input type="hidden" name="prodId" value="<?php echo $row['productId']?>">
	<input type="hidden" id="quantity" name="quantity" value="0">
	<input class="removeFromCart" type="submit" value="REMOVE">
	</form></td>

	<td align="right"><?php echo $row["price"]?>€</td>
	</tr>

<?php    
	$totProd = $totProd + $row["quantity"];
	$totPrice = $totPrice + $row["quantity"] * $row["price"];

}
} else {
}?>
	<tr>
	<td><h2>TOTAL</td>
	<td align="center"><h2><?php echo $totProd?></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><h2><?php echo $totPrice?>€</td>
	</tr>
</table> 
</fieldset>   
<br>

<?php
if (mysql_num_rows($result) > 0){ ?>
	<ul id="menu"> <li><a href="?p=checkOut">CHECK OUT CART</a></li>  </ul>
<?php } ?>

