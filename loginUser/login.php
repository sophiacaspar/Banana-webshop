<?php 
session_start("login"); ?>
<h2>Login</h2>
<!--<form action="loginUser/login_submit.php" method="post">-->
<form action="?p=login_submit" method="post">
<fieldset>
<p>
<!--<label for="userName">Username</label>-->
<table>
	<tr>
		<td> Username </td> 
		<td><input type="text" id="userName" name="userName" value="" maxlength="20" /></td>
	<tr>
<!--<label for="password">Password</label>-->
<td>Password</td>
<td><input type="text" id="password" name="password" value="" maxlength="20" /></td>
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


