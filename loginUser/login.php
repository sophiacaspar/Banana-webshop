<?php 
if(isset( $_SESSION['userId'] ))
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {
 ?>
<h2>Login</h2>
<form action="?p=login_submit" method="post">
<fieldset>
<p>
<table>
	<tr>
	<td></td><td> <?php errorMsg(); ?> </td>
	</tr>
	<tr>
		<td> Username </td> 
		<td><input type="text" id="userName" name="userName" value="" maxlength="20" /></td>
	</tr>
	<tr>
<td>Password</td>
<td><input type="password" id="password" name="password" value="" maxlength="20" /></td>
</tr>
<tr>
	<td></td>
	<td><input class="button" type="submit" value="→ Login"/></td>
</tr>
<tr>
	<td></td>
	<td><a href="?p=newuser">Create new user</a></td>
	<td></td>
</tr>
</table>
</form>
</fieldset>
<?php
}
?>


