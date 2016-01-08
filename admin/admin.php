<?php


if(!isset( $_SESSION['userId'] ) || !isAdmin())
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

?>
<h2>Products</h2>
<fieldset>
<?php include "changeProduct.php";
?>
</fieldset>
<h2>Admin</h2>
<fieldset>
<?php
include "addAdmin.php";
?>
</fieldset>

<?php
}
?>
