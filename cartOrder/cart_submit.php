<?php
/*** CONNECT TO DATABASE ***/
include 'db_connect.php';


$cartId = $_SESSION['cartId'];
include 'cartOrder/changeCart.php';

if(!empty($_POST['prodId'])){
	changeCart($_POST['prodId'],$_POST['quantity']);
}


echo '<meta http-equiv="Refresh" content="0;url=http://utbweb.its.ltu.se/~angbru-0/?p=cart">';

?>
