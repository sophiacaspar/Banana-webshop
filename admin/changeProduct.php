<?php
include 'db_connect.php';
$cartId = $_SESSION['cartId'];

$join = "SELECT * FROM PRODUCT";

$result = mysql_query($join, $link) or die(mysql_error());

?>

<h3>Update Products</h3>


<table>
<tr>
	<td><b>Name</td>
	<td><b>Description</td>
	<td><b>Stock</td>
	<td><b>Price (€)</td>
	<td> </td>
	</tr>
    <?php 
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
	?>
	<form action="?p=update_product" method="post">
	<tr>
	<input type="hidden" name="prodId" value="<?php echo $row['productId']?>">
	<td><input type="text" style="width:150px;"id="name" name="name" value="<?php echo $row['name'] ?>" maxlength="20" /><?php ?></td>
	<td><input type="text" style="width:180px;" id="description" name="description" value="<?php echo $row['description'] ?>" maxlength="40" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="stock" name="stock" value="<?php echo $row['stock'] ?>" maxlength="6" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="price" name="price" value="<?php echo $row['price'] ?>" maxlength="4" /><?php ?></td>
	<td><input class="text" style="width:90px;" type="submit" value="Update" /> </td>
	</form>
	<form action="?p=remove_product" method="post">
	<td><input type="hidden" name="prodId" value="<?php echo $row['productId']?>">
	<input class="text" style="width:90px;" type="submit" value="Remove" />
	</td>
	</form>
	<?php } }
	?>
	
	</tr>

</table>
<br>

<table>
<tr>
<td><b>Name</td>
<td><b>Description</td>
<td><b>Stock</td>
<td><b>Price (€)</td>
</tr>
<tr>
<form action="?p=add_product" method="post">
	<td><input type="text" style="width:150px;"id="name" name="name" value=" " maxlength="20" /><?php ?></td>
	<td><input type="text" style="width:180px;" id="description" name="description" value="" maxlength="40" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="stock" name="stock" value=" " maxlength="6" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="price" name="price" value=" " maxlength="4" /><?php ?></td>
	<td><input class="text" style="width:130px;" type="submit" value="Add product" /> </td>

</tr>
</form>

</table>





