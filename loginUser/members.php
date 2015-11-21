<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['loginId']))
{
    $message = 'You must be logged in to access this page';
}
else
{
    try
    {
        /*** connect to database ***/
        /*** mysql hostname ***/
        $mysql_hostname = 'utbweb.its.ltu.se';

        /*** mysql username ***/
        $mysql_username = 'angbru-0';

        /*** mysql password ***/
        $mysql_password = 'sopcas-1';

        /*** database name ***/
        $mysql_dbname = 'angbru0db';


        /*** select the users name from the database ***/
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        /*** $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("SELECT userName FROM LOGIN 
        WHERE loginId = :loginId");

        /*** bind the parameters ***/
        $stmt->bindParam(':loginId', $_SESSION['loginId'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $userName = $stmt->fetchColumn();

        /*** if we have no something is wrong ***/
        if($userName == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome '.$userName;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}

?>

<html>
<head>
<title>Members Only Page</title>
</head>
<body>
<h2><?php echo $message; ?></h2>
</body>
</html>
