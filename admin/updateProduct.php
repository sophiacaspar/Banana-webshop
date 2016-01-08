<?php
include 'db_connect.php';
if(!isset( $_SESSION['userId'] ) || !isAdmin())
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

//Filter all of the inputs for the new product
$prodId = filter_var($_POST['prodId'], FILTER_SANITIZE_STRING);
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
$stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);


//Check if name already exists?
//Maybe later
$sqlNameCheck = "SELECT name FROM PRODUCT WHERE 1";
$existingNames = mysql_query($sqlNameCheck, $link);

//if(name = name){$_SESSION['msg'] = "Name already exists!";}



//Add the new product to the PRODUCT table
$sqlNewProduct = "UPDATE PRODUCT SET name='{$name}', description='{$description}', stock='{$stock}', price='{$price}' WHERE productId = '{$prodId}'";


mysql_query($sqlNewProduct, $link);
$_SESSION['msg'] = "Product updated!";
errorMsg();

echo '<meta http-equiv="Refresh" content="1;url=http://utbweb.its.ltu.se/~angbru-0/?p=admin">';
}
?>
