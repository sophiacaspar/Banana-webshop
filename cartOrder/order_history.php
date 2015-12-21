<?php
include 'db_connect.php';
$userId = $_SESSION['userId'];

$sqlOrder = "SELECT orderId FROM `ORDER` WHERE userId = '{$userId}'";

$resultOrder = mysql_query($sqlOrder, $link) or die(mysql_error());
//$result = mysql_query($join, $link) or die(mysql_error());


?>
<b>ORDERS</b>
<fieldset>
<?php

for($i=0;$i<mysql_num_rows($resultOrder);$i++){ 

$totProd =0;
$currentID = mysql_result($resultOrder,$i,'orderId');

//I have no idea why this one produces orderNumber amounts of each row... Working on it.
$joinInner = "SELECT `ORDER`.orderId, `ORDER`.orderTimeStamp, `ORDER`.totalPrice, ORDERINFO.quantity, ORDERINFO.price, PRODUCT.name, PRODUCT.productId
FROM ORDERINFO 
INNER JOIN `ORDER`
ON `ORDER`.userId = {$userId}
INNER JOIN PRODUCT
ON PRODUCT.productId=ORDERINFO.productId
WHERE PRODUCT.productId=ORDERINFO.productId
AND ORDERINFO.orderId = {$currentID}
AND `ORDER`.orderId = {$currentID}
AND `ORDER`.userId = {$userId} ";
$resultInner = mysql_query($joinInner, $link) or die(mysql_error());
?>
    	<table>
	<tr>
	<td colspan = "3"><b><i><ins>Order: <?php echo mysql_result($resultInner,0,'orderId'); ?> 
  |  Date:  <?php echo mysql_result($resultInner,0,'orderTimeStamp'); ?></ins></i></b></td>
	</tr>
	<tr>
	<td><b>Product name</td>
	<td align="center"><b>Quantity</td>
	<td align="center"><b>Price</td>
	</tr>
    	<?php 

	
	
	//Divide order specific order length with total number of orders, to get the correct index
	for($j=0;$j<(mysql_num_rows($resultInner));$j++){ 
		?>
		<tr>
		<td><?php echo mysql_result($resultInner,$j,'name')?></td>
		<td align="center"><?php echo mysql_result($resultInner,$j,'quantity')?></td>
		<td align="center"><?php echo mysql_result($resultInner,$j,'price')?>€</td>
		
		<form action="?p=commentAdd" method="post">
		<td>
		<input type="hidden" name="prodId" value="<?php echo mysql_result($resultInner,$j,'productId')?>">
		<input class="text" type="submit" value="Add comment">
		</form>
		</td>	
		</tr>
		<?php  
		$totProd = $totProd + mysql_result($resultInner,$j,'quantity');

	}
	$totPrice = mysql_result($resultInner,0,'totalPrice');?>
	<tr>
	<td><h3>TOTAL</td>
	<td align="center"><h3><?php echo $totProd?></td>
	<td align="center"><h3><?php echo $totPrice?>€</td>
	</tr>
 
<?php

}
?>
</table>
</fieldset>   
