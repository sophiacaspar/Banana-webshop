<?php
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
<b>PRODUCTS</b>
<fieldset>
    <table>
	<tr>
	<td><b>Product</td>
	<td><b>Quantity</td>
	<td align="right"><b>Price</td>
	</tr>
    <?php 
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $row["name"]?></td>
	<td align="center"><?php echo $row["quantity"]?></td>
	<td align="right"><?php echo $row["price"]?>€</td>
	<?php
	$availableStock = "SELECT stock FROM PRODUCT where productId = {$row["productId"]}";
	$stock = mysql_query($availableStock, $link) or die(mysql_error());
	$stockAvailable = mysql_result($stock,0,'stock');
	if($stockAvailable<$row["quantity"]){
	?>
		<td>
		<?php
		$tooMany = $row["quantity"]-$stockAvailable;
		echo $tooMany." will be shipped later, due to banana problems.";
		?>	
 		</td>
	<?php	
	}
	?>
	
	</tr>

<?php    
	$totProd = $totProd + $row["quantity"];
	$totPrice = $totPrice + $row["quantity"] * $row["price"];
	$_SESSION['totPrice'] =  $totPrice;

}
} else {
}?>
	<tr>
	<td><h2>TOTAL</td>
	<td align="center"><h2><?php echo $totProd?></td>
	<td align="right"><h2><?php echo $totPrice?>€</td>
	</tr>
</table> 
</fieldset>   
