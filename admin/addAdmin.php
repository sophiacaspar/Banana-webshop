<?php
include 'db_connect.php';

$sqlUsernames = "SELECT userName FROM USER";
$userNames = mysql_query($sqlUsernames, $link) or die(mysql_error());
?>

<table>
<tr>
<td>
<select name="userName" form="addAdmin">
<?php
for($i=0;$i<mysql_num_rows($userNames);$i++){ ?>
	  <option value="<?php echo mysql_result($userNames,$i,'userName');?>"><?php echo mysql_result($userNames,$i,'userName');?></option>
<?php 
}
?>
</select>
</td>
<form action="?p=make_admin" id="addAdmin" method="post">
<td> <input class="text" type="submit" name="add" value="Make admin"> </td>
<td> <input class="text" type="submit" name="remove" value="Remove admin"> </td>
</form>

</tr>
</table>

<!--

	  <option value="<?php echo mysql_result($userNames,$i,'userName');?>"><?php echo mysql_result($userNames,$i,'userName');?></option>
-->


