<?php
include 'db_connect.php';

if(!isset( $_SESSION['userId'] ))
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {
$userId = $_SESSION['userId'];

$sqlOrder = "SELECT orderId FROM `ORDER` WHERE userId = '{$userId}'";

$resultOrder = mysql_query($sqlOrder, $link) or die(mysql_error());


?>
<b>ORDERS</b>
<fieldset>
<?php

for($i=0;$i<mysql_num_rows($resultOrder);$i++){ 

$totProd =0;
$currentID = mysql_result($resultOrder,$i,'orderId');

$joinInner = "SELECT `ORDER`.orderId, `ORDER`.orderTimeStamp, `ORDER`.totalPrice, `ORDER`.shippingAddress, ORDERINFO.quantity, ORDERINFO.price, PRODUCT.name, PRODUCT.productId
FROM ORDERINFO 
INNER JOIN `ORDER`
ON `ORDER`.userId = {$userId}
INNER JOIN PRODUCT
ON PRODUCT.productId=ORDERINFO.productId
WHERE PRODUCT.productId=ORDERINFO.productId
AND ORDERINFO.orderId = '{$currentID}'
AND `ORDER`.orderId = '{$currentID}'
AND `ORDER`.userId = {$userId} 
ORDER BY `ORDER`.orderTimeStamp DESC ";
$resultInner = mysql_query($joinInner, $link) or die(mysql_error());
?>
    	<table>
	<tr>
	<td colspan ="3"><b><i><ins>Date:  <?php echo mysql_result($resultInner,0,'orderTimeStamp'); ?></ins></i></b></td>
</tr>
	<td colspan = "3"><b><i><ins><small>Order: <?php echo mysql_result($resultInner,0,'orderId'); ?> </small></ins></i></b></td>
	</tr>
	<tr>
	<td colspan = "3" align="center"><i> <?php echo mysql_result($resultInner,0,'shippingAddress'); ?> 
   </i></td>
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
<?php
}
?>  
