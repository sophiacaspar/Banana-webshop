<?php
include 'db_connect.php';

/*** check if the users is already logged in ***/
if(isset( $_SESSION['userId'] ))
{
    $message = 'Users is already logged in';
	include 'index.php';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['userName'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
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
    try
    {

	$password = sha1( $password );

	$result = mysql_query("SELECT * FROM USER 
                    WHERE userName = '{$userName}' AND password = '{$password}'", $link);
	

	$row = mysql_fetch_array($result);
  	$userId = $row["userId"];
	$userType = $row["userType"];
	
	$_SESSION['userName'] = $row["userName"];
	$_SESSION['password'] = $row["password"];
	$_SESSION['firstName'] = $row["firstName"];
	$_SESSION['lastName'] = $row["lastName"];
	$_SESSION['address'] = $row["address"];
	$_SESSION['postalCode'] = $row["postalCode"];
	$_SESSION['city'] = $row["city"];
	$_SESSION['country'] = $row["country"];
	$_SESSION['mail'] = $row["mail"];
	$_SESSION['tfnNr'] = $row["tfnNr"];
	//$_SESSION['userType'] = $row["userType"];



        /*** if we have no result then fail boat ***/
        if($userId == false)
        {
                $message = 'Login Failed'; 
		$_SESSION['msg']=$message;
		?>
		<script type="text/javascript">
		window.setTimeout('history.back();', 1); // waits 5 seconds before going back
		</script>
		<?php

        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['userId'] = $userId;
		$_SESSION['userType'] = $userType;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';

		$_SESSION['msg']=$message; 
		errorMsg();
	// Refreshes site
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
	
}
?>



