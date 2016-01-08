<!DOCTYPE html>
<?php session_start();
include 'db_connect.php';
include 'include/checkLogin.php';
include 'include/stringToAscii.php';
include 'include/calcRating.php';
include 'commentsRatings/printComments.php';
$sessionId = session_id();
$_SESSION['cartId'] = $sessionId;// string_to_ascii($sessionId);//
include 'include/timeOut.php';
include 'include/errorMessage.php';


?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Banana4U</title>

    </head>

<body>

<div class="wrapper">
<div align="center">
    <div class="header">
    <?php include 'siteLayout/header.php';?>
    </div>

    <div class="menu">
        <?php include 'siteLayout/menu.php';?>
    </div>

    <div class="content">
        <?php
	/** Default menu **/
        if(isset($_GET['p']) && $_GET['p']=='bananas') include('siteLayout/content/bananas.php');
        else if(isset($_GET['p']) && $_GET['p']=='about') include('siteLayout/content/about.php');
        else if(isset($_GET['p']) && $_GET['p']=='cart') include('cartOrder/cart.php');

	/** User **/
        else if(isset($_GET['p']) && $_GET['p']=='login') include('loginUser/login.php');
        else if(isset($_GET['p']) && $_GET['p']=='newuser') include('loginUser/adduser.php');
        else if(isset($_GET['p']) && $_GET['p']=='login_submit') include('loginUser/login_submit.php');
	else if(isset($_GET['p']) && $_GET['p']=='update_submit') include('loginUser/update_submit.php');
	else if(isset($_GET['p']) && $_GET['p']=='adduser_submit') include('loginUser/adduser_submit.php');
        else if(isset($_GET['p']) && $_GET['p']=='logout') include('loginUser/logout.php');
        else if(isset($_GET['p']) && $_GET['p']=='mypage') include('loginUser/myPage.php');
	else if(isset($_GET['p']) && $_GET['p']=='order_history') include('cartOrder/order_history.php');

	/*** cart and order stuffs ***/
        else if(isset($_GET['p']) && $_GET['p']=='cart_submit') include('cartOrder/cart_submit.php'); 
	else if(isset($_GET['p']) && $_GET['p']=='checkOut') include('cartOrder/checkOut.php');
	else if(isset($_GET['p']) && $_GET['p']=='pay') include('cartOrder/pay.php');
	else if(isset($_GET['p']) && $_GET['p']=='comment') include('commentsRatings/commentView.php');
	else if(isset($_GET['p']) && $_GET['p']=='commentAdd') include('commentsRatings/commentAdd.php');
	else if(isset($_GET['p']) && $_GET['p']=='comment_submit') include('commentsRatings/comment_submit.php');
	else if(isset($_GET['p']) && $_GET['p']=='rate') include('commentsRatings/rate_submit.php');

	/*** ADMIN ***/
	else if(isset($_GET['p']) && $_GET['p']=='admin') include('admin/admin.php');
	else if(isset($_GET['p']) && $_GET['p']=='update_product') include('admin/updateProduct.php');
	else if(isset($_GET['p']) && $_GET['p']=='add_product') include('admin/addProduct.php');
	else if(isset($_GET['p']) && $_GET['p']=='remove_product') include('admin/removeProduct.php');
	else if(isset($_GET['p']) && $_GET['p']=='remove_comment') include('admin/removeComment.php');
	else if(isset($_GET['p']) && $_GET['p']=='make_admin') include('admin/makeAdmin.php');

	/** Defalt page **/
        else include ('siteLayout/content/bananas.php');
        ?>
    </div>

    <div class="bottom">
        <?php include 'siteLayout/bottom.php';?>
    </div>

</div>
</div>
</body>
    </html>
