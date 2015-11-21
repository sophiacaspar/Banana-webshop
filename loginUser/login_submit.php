<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['userId'] ))
{
    $message = 'Users is already logged in';
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

    /*** now we can encrypt the password ***/
    /***$password = sha1( $password );
    
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

	$result = mysql_query("SELECT userId, userName, password FROM LOGIN 
                    WHERE userName = '{$userName}' AND password = '{$password}'", $link);
	

	$row = mysql_fetch_array($result);
  	$loginId = $row["userId"];
	


        /*** if we have no result then fail boat ***/
        if($userId == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['userId'] = $userId;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<p><?php echo $message; ?>
    <ul id="menu">
        <li><a href="?p=bananas">Return to userpage</a></li>
    </ul> 

