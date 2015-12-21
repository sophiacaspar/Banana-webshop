<?php
include 'db_connect.php';
$cartId = $_SESSION['cartId'];

$join = "SELECT * FROM PRODUCT";

$result = mysql_query($join, $link) or die(mysql_error());

?>

<h3>Update Products</h3>
<form action="?p=update_submit" method="post">
<fieldset>
<table>
<tr>
	<td><b>Name</td>
	<td><b>Description</td>
	<td><b>Stock</td>
	<td><b>Price (€)</td>
	</tr>
    <?php 
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
	?>
	<tr>
	<td><input type="text" style="width:150px;"id="name" name="name" value="<?php echo $row['name'] ?>" maxlength="20" /><?php ?></td>
	<td><input type="text" style="width:180px;" id="description" name="description" value="<?php echo $row['description'] ?>" maxlength="40" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="stock" name="stock" value="<?php echo $row['stock'] ?>" maxlength="6" /><?php ?></td>
	<td><input type="number" style="width:60px;" id="price" name="price" value="<?php echo $row['price'] ?>" maxlength="4" /><?php ?></td>
	<?php } }
	?>
	
	</tr>

</table>

</fieldset>
<br>
</form>

