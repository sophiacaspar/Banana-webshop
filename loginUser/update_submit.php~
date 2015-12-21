<?php
/*** begin our session ***/

$fail = 0;
$message = "";

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
 	$message = $message . "Invalid email format"; $fail = 1;
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

/*** first check that both the username, password and form token have been sent ***/
/***if(!isset( $_POST['userName'], $_POST['password'], $_POST['form_token']))
{
    //$message = 'Please enter a valid username and password';
}
/*** check the form token is valid 
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/*** check the username is the correct length 
elseif (strlen( $_POST['userName']) > 20 || strlen($_POST['userName']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length 
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters 
elseif (ctype_alnum($_POST['userName']) != true)
{
    /*** if there is no match 
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters 
elseif (ctype_alnum($_POST['password']) != true)
{
        /*** if there is no match 
        $message = "Password must be alpha numeric";
}
***/
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

	$message = "Okej?";

	/*** now we can encrypt the password ***/

	/*** connect to database ***/
	/*** mysql hostname ***/
	$mysql_hostname = 'utbweb.its.ltu.se';

	/*** mysql username ***/
	$mysql_username = 'angbru-0';

	/*** mysql password ***/
	$mysql_password = 'sopcas-1';

	/*** database name ***/
	$mysql_dbname = 'angbru0db';


	try
	{

	$link = mysql_connect("utbweb.its.ltu.se", "angbru-0", "sopcas-1");
	mysql_select_db("angbru0db", $link);

	/*** Check if the password has changed, if so sha1 the new one ***/
	$oldPW = mysql_query("SELECT password FROM USER 
                    WHERE userName = '{$userName}'", $link);
	$rowPW = mysql_fetch_array($oldPW);
	if($password!=$rowPW['password']){
		$password = sha1($password);	
	}
	
	$insertData = "UPDATE USER SET
	password='{$password}', firstName='{$firstName}', lastName='{$lastName}', address='{$address}', postalCode='{$postalCode}', city='{$city}', country='{$country}', mail='{$mail}', tfnNr='{$tfnNr}' 
	WHERE userName = '{$userName}'";

	$message = 'Adding new user';

	if (!$link) {
	    die("Connection failed: " . mysqli_connect_error());
	} else {
	$result = mysql_query($insertData, $link); 

	$message = 'User info updated';
	}


	/*** Fetch updated info ***/
	$newdata = mysql_query("SELECT * FROM USER 
                    WHERE userName = '{$userName}'", $link);
	

	$rowdata = mysql_fetch_array($newdata);
  	$userId = $rowdata["userId"];
	
	$_SESSION['userName'] = $rowdata["userName"];
	$_SESSION['password'] = $rowdata["password"];
	$_SESSION['firstName'] = $rowdata["firstName"];
	$_SESSION['lastName'] = $rowdata["lastName"];
	$_SESSION['address'] = $rowdata["address"];
	$_SESSION['postalCode'] = $rowdata["postalCode"];
	$_SESSION['city'] = $rowdata["city"];
	$_SESSION['country'] = $rowdata["country"];
	$_SESSION['mail'] = $rowdata["mail"];
	$_SESSION['tfnNr'] = $rowdata["tfnNr"];

	}
	catch(Exception $e)
	{
	/*** check if the username already exists ***/
	if( $e->getCode() == 1062)
	{
	    $message = 'Username already exists';
	}
	else
	{
	    /*** if we are here, something has gone wrong with the database ***/
	    $message = 'We are unable to process your request. Please try again later"';
	}
	}
	$_SESSION['msg'] = $message;

	;?>
	<script type="text/javascript">
		window.setTimeout('history.back();', 1); // waits 5 seconds before going back
	</script>
	<?php
	
}else{?>
<script type="text/javascript">
		window.setTimeout('history.back();', 1); // waits 5 seconds before going back
</script>
<?php
}
?>







