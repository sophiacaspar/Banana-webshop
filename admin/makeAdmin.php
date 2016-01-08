<?php
include 'db_connect.php';

if(!isset( $_SESSION['userId'] ) || !isAdmin())
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
$adminVar = filter_var($_POST['adminVar'], FILTER_SANITIZE_STRING);

if(isset($_POST['add'])){
	$sqlUpdate = "UPDATE USER SET userType = 2 WHERE userName = '{$userName}'";
} else if(isset($_POST['remove'])){
	$sqlUpdate = "UPDATE USER SET userType = 1 WHERE userName = '{$userName}'";
}else{
	echo "Nothing set";
}

mysql_query($sqlUpdate, $link); 
}
?>
