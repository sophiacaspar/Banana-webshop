<?php
include 'db_connect.php';
if(!isset( $_SESSION['userId'] ) || !isAdmin())
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

//Filter all of the inputs for the new product
$prodId = filter_var($_POST['prodId'], FILTER_SANITIZE_STRING);


//Add the new product to the PRODUCT table
$sqlNewProduct = "DELETE FROM PRODUCT WHERE productId = '{$prodId}'";


mysql_query($sqlNewProduct, $link);
$_SESSION['msg'] = "Product removed!";
errorMsg();
}

?>
