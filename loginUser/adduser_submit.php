<?php
/*** begin our session ***/
session_start();


$errorMsg = $_SESSION['errors'];


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

    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'utbweb.its.ltu.se';

    /*** mysql username ***/
    $mysql_username = 'angbru-0';

    /*** mysql password ***/
    $mysql_password = 'sopcas-1';

    /*** database name ***/
    $mysql_dbname = 'angbru0db';

    $_SESSION['errors']["userName"] = "Username something";

    try
    {

    $link = mysql_connect("utbweb.its.ltu.se", "angbru-0", "sopcas-1");
    mysql_select_db("angbru0db", $link);

    $insertData = "INSERT INTO USER (userName, password, firstName, lastName, address, postalCode, city, country, mail, tfnNr) VALUES ('{$userName}', '{$password}', '{$firstName}', '{$lastName}', '{$address}', '{$postalCode}', '{$city}', '{$country}', '{$mail}', '{$tfnNr}')";


    if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
    } else {
        $result = mysql_query($insertData, $link); 

        $message = 'New user added';
    }
    
    $errorcode = mysql_errno();
    if (mysql_errno() == 1062){
        $message = "Username already exists (if statement)";
        $_SESSION['errors']["userName"] = "Username already exists";
    } else {
        $message = "Not duplicated";
        $_SESSION['errors']["userName"] = "Username OK";
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
}
?>

<script type="text/javascript">
window.setTimeout('history.back();', 1000); // waits 5 seconds before going back
</script>

<p><?php 
echo $_SESSION['errors']["userName"];
?>
