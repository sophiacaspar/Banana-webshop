<?php
include '../db_connect.php';
if(isset($_POST["userName"])&&(strlen($_POST['userName']) > 3))
{
	    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	    }

	$userName = filter_var($_POST["userName"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);


	$result = mysql_query("SELECT userName FROM USER WHERE userName='{$userName}'", $link);
	$num_rows = mysql_num_rows($result);

	if(empty($userName)){
		return;
	}	

	if($num_rows>0){
		//die('<img src="loginUser/cross.png" />');
		echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";

	}else{
		//die('<img src="loginUser/check.png" />');
		echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";

	}
}elseif(!(isset($_POST["userName"])&&(strlen($_POST['userName']) > 3))){
	//echo "<img src=", "loginUser/none.png"," />";

}

/*** Check password length ***/
if(isset($_POST["password"])&&(strlen($_POST['password']) > 3))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif(isset($_POST["password"])&&(strlen($_POST['password']) < 3)){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check firstname lenght and only letters ***/
if(isset($_POST["firstName"])&&(strlen($_POST['firstName']) > 3)&&!(preg_match('/[^A-Za-z]+/', $_POST['firstName'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif((isset($_POST["firstName"]))&&((strlen($_POST['firstName']) < 3)||(preg_match('/[^A-Za-z]+/', $_POST['firstName'])))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check lastName lenght and only letters ***/
if(isset($_POST["lastName"])&&(strlen($_POST['lastName']) > 3)&&!(preg_match('/[^A-Za-z]+/', $_POST['lastName'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif((isset($_POST["lastName"]))&&((strlen($_POST['lastName']) < 3)||(preg_match('/[^A-Za-z]+/', $_POST['lastName'])))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check city lenght and only letters ***/
if(isset($_POST["city"])&&(strlen($_POST['city']) > 3)&&!(preg_match('/[^A-Za-z]+/', $_POST['city'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif((isset($_POST["city"]))&&((strlen($_POST['city']) < 3)||(preg_match('/[^A-Za-z]+/', $_POST['city'])))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check country lenght and only letters ***/
if(isset($_POST["country"])&&(strlen($_POST['country']) > 3)&&!(preg_match('/[^A-Za-z]+/', $_POST['country'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif((isset($_POST["country"]))&&((strlen($_POST['country']) < 3)||(preg_match('/[^A-Za-z]+/', $_POST['country'])))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check address lenght ***/
if(isset($_POST["address"])&&(strlen($_POST['address']) > 3))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif(isset($_POST["address"])&&(strlen($_POST['address']) < 3)){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check postalcode lenght and is numeric ***/
if(isset($_POST["postalCode"])&&(is_numeric($_POST['postalCode'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif(isset($_POST["postalCode"])&&!(is_numeric($_POST['postalCode']))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check postalcode lenght and is numeric ***/
if(isset($_POST["tfnNr"])&&(is_numeric($_POST['tfnNr'])))
{
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}elseif(isset($_POST["tfnNr"])&&!(is_numeric($_POST['tfnNr']))){
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}

/*** Check postalcode lenght and is numeric ***/
if(isset($_POST["mail"])&&(!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))))
{
	echo "<img src=", "loginUser/cross.png ", " width=", "50%", " height=","50%"," />";
}elseif(isset($_POST["mail"])&&(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))){
	echo "<img src=", "loginUser/check.png ", " width=", "50%", " height=","50%"," />";
}


?>
