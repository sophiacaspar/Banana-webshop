<?php 
session_start("login"); ?>
<h2>Login</h2>
<form action="loginUser/login_submit.php" method="post">
<fieldset>
<p>
<!--<label for="userName">Username</label>-->
Username: <br> <input type="text" id="userName" name="userName" value="" maxlength="20" />
<p>
<!--<label for="password">Password</label>-->
Password: <br><input type="text" id="password" name="password" value="" maxlength="20" />
<p>
<input class="button" type="submit" value="→ Login" />
</form>
<p>
<a href="?p=newuser">Create new user</a>
</fieldset>


