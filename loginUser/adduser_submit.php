<?php
/*** CONNECT TO DATABASE ***/
include 'db_connect.php';
$fail = 0;
$message = "";
if(isset( $_SESSION['userId'] ))
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

/*** Error check against preset conditions on front end side ***/
if(strlen($_POST['userName']) < 4){
	$message = $message . "Username is too short <br/r>";$fail = 1;
}
if(strlen($_POST['password']) < 4){
	$message = $message . "Password is too short <br/r>";$fail = 1;
}
if(strlen($_POST['firstName']) < 4){
	$message = $message . "First name is too short <br/r>";$fail = 1;
}
if (preg_match('/[^A-Za-z]+/', $_POST['firstName']))
{
  $message = $message . "First name can only contain letters <br/r>";$fail = 1;
}
if(strlen($_POST['lastName']) < 4){
	$message = $message . "Last name is too short <br/r>";$fail = 1;
}
if (preg_match('/[^A-Za-z]+/', $_POST['lastName']))
{
  $message = $message . "Last name can only contain letters <br/r>";$fail = 1;
}
if(strlen($_POST['address']) < 4){
	$message = $message . "Address is too short <br/r>";$fail = 1;
}
if(strlen($_POST['postalCode']) < 4){
	$message = $message . "Postal code is too short <br/r>";$fail = 1;
}
if (!(is_numeric($_POST['postalCode'])))
{
  $message = $message . "Postal code can only contain numbers <br/r>";$fail = 1;
}
if(strlen($_POST['city']) < 4){
	$message = $message . "City is too short <br/r>";$fail = 1;
}
if (preg_match('/[^A-Za-z]+/', $_POST['city']))
{
  $message = $message . "City can only contain letters <br/r>";$fail = 1;
}
if(strlen($_POST['country']) < 4){
	$message = $message . "Country is too short <br/r>";$fail = 1;
}
if (preg_match('/[^A-Za-z]+/', $_POST['country']))
{
  $message = $message . "Country name can only contain letters <br/r>";$fail = 1;
}
if(strlen($_POST['mail']) < 4){
	$message = $message . "Mail is too short <br/r>";$fail = 1;
}
if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
 	$message = $message . "Invalid email format <br/r>"; $fail = 1;
}
if(strlen($_POST['tfnNr']) < 4){
	$message = $message . "Phone number is too short <br/r>";$fail = 1;
}
if (!(is_numeric($_POST['tfnNr'])))
{
  $message = $message . "Phone number can only contain numbers <br/r>";$fail = 1;
}
/*** Add error messages to msg session variable for printing ***/
$_SESSION['msg']=$message;

if($fail == 0){
	/*** if we are here the data is valid and we can insert it into database ***/
	$userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
	$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$postalCode = filter_var($_POST['postalCode'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
	$mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
	$tfnNr = filter_var($_POST['tfnNr'], FILTER_SANITIZE_STRING);


	/*** now we can encrypt the password ***/
	$password = sha1( $password );

	try
	{

	$insertData = "INSERT INTO USER (userName, password, firstName, lastName, address, postalCode, city, country, mail, tfnNr) VALUES ('{$userName}', '{$password}', '{$firstName}', '{$lastName}', '{$address}', '{$postalCode}', '{$city}', '{$country}', '{$mail}', '{$tfnNr}')";


	$message = 'Adding new user';

	if (!$link) {
	    die("Connection failed: " . mysqli_connect_error());
	} else {
	$result = mysql_query($insertData, $link); 

		$message = 'New user added';
		$_SESSION['msg'] = $message;
	}

	$errorcode = mysql_errno();
	if (mysql_errno() == 1062){
	$message = "Username already exists (if statement)";
	} else {
		$message = "New user added";
		$_SESSION['msg'] = $message;
	}
	/***$message = $errorcode;***/



	}
	catch(Exception $e)
	{
	/*** check if the username already exists ***/
	if( $e->getCode() == 1062)
	{
	    $message = 'Username already exists (exception cast)';
	}
	else
	{
	    /*** if we are here, something has gone wrong with the database ***/
	    $message = 'We are unable to process your request. Please try again later"';
	}
	}
	$_SESSION['msg'] = "New user added";
	errorMsg();	
	?>
    	<ul id="menu">
        	<li><a href="?p=login">Go to login</a></li>
    	</ul> 	
	<?php
	
}else{
?>
	<script type="text/javascript">
	window.setTimeout('history.back();', 1); // waits 5 seconds before going back
	</script>
<?php
} 
}
?>






