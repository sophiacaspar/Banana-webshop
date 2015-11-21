<?php

/*** begin our session ***/
session_start();


$errorMsg = array(
	"userName" => "t",
	"password" => "",
	"firstName" => "",
	"lastName" => "",
	"address" => "",
	"postalCode" => "",
	"city" => "",
	"country" => "",
	"mail" => "",
	"tfnNr" => "",	
);
$_SESSION['errors'] = $errorMsg;

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>

<head>
<title>PHPRO Login</title>
</head>

<h2>Add user</h2>
<form action="loginUser/adduser_submit.php" method="post">
<fieldset>

<p>
<label for="userName">Username</label>
<input type="text" id="userName" name="userName" value="" maxlength="20" />
<?php echo $_SESSION['errors']["userName"]; ?>
</p>
<p>
<label for="password">Password</label>
<input type="text" id="password" name="password" value="" maxlength="20" />
</p>
<p>
<label for="firstName">First name</label> 
<input type="text" id="firstName" name="firstName" value="" maxlength="20" />
</p>
<p>
<label for="lastName">Last name</label>
<input type="text" id="lastName" name="lastName" value="" maxlength="20" />
</p>
<p>
<label for="address">Address</label>
<input type="text" id="address" name="address" value="" maxlength="20" />
</p>
<p>
<label for="postalCode">Postal code</label>
<input type="text" id="postalCode" name="postalCode" value="" maxlength="20" />
</p>
<p>
<label for="city">City</label>
<input type="text" id="city" name="city" value="" maxlength="20" />
</p>
<p>
<label for="country">Country</label>
<input type="text" id="country" name="country" value="" maxlength="20" />
</p>
<p>
<label for="mail">Mail</label>
<input type="text" id="mail" name="mail" value="" maxlength="20" />
</p>
<p>
<label for="tfnNr">Phone number</label>
<input type="text" id="tfnNr" name="tfnNr" value="" maxlength="20" />
</p>
<p>
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<input type="submit" value="&rarr; Add user" />
</p>

</fieldset>
</form>

