<?php
include 'db_connect.php';
$cartId = $_SESSION['cartId'];
$userId = $_SESSION['userId'];

$user = "SELECT * FROM USER WHERE userId = '{$userId}'";

$result = mysql_query($user, $link) or die(mysql_error());
$info = mysql_fetch_assoc($result)

?>
<b>SHIPPING INFO</b>
<fieldset>
    <table>
	<tr>
	<td><b>Name: </b></td>
	<td><?php echo  $info['firstName'] . " " . $info['lastName']?></td>
	</tr>

	<tr>
	<td><b>Address: </b></td>
	<td><?php echo  $info['address']?></td>
	</tr>

	<tr>
	<td><b>Postal code: </b></td>
	<td><?php echo  $info['postalCode']?></td>
	</tr>

	<tr>
	<td><b>City: </b></td>
	<td><?php echo  $info['city']?></td>
	</tr>

	<tr>
	<td><b>Country: </b></td>
	<td><?php echo  $info['country']?></td>
	</tr>

	<tr>
	<td><b>Mail: </b></td>
	<td><?php echo  $info['mail']?></td>
	</tr>

	<tr>
	<td><b>Phone: </b></td>
	<td><?php echo  $info['tfnNr']?></td>
	</tr>

	<tr>
	<td></td>
	<td><a href="?p=mypage">Change info</a>

</table> 
</fieldset>  
<br>
<br> 
