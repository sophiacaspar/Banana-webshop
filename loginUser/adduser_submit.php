<?php
/*** begin our session ***/
session_start();

/*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['userName'], $_POST['password'], $_POST['form_token']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the form token is valid ***/
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['userName']) > 20 || strlen($_POST['userName']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['userName']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $password = sha1( $password );
    
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

	$loginId = 5;

	$insertData = "INSERT INTO LOGIN (loginId, userName, password ) VALUES ($loginId, $userName, $password )";

	$result = mysql_query("SELECT loginId FROM LOGIN", $link);
	$num_rows = mysql_num_rows($result);
	

	if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
	} else {
		$result = mysql_query("INSERT INTO LOGIN (loginId, userName, password ) VALUES ($num_rows, '{$userName}', '{$password}')", $link); 

		$message = 'New user added';
	}
	  
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists ';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later"';
        }
    }
}
?>

<p><?php echo $message; ?>
<li><a href="../index.php">Return to userpage</a></li>

