<!DOCTYPE html>
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
        if(isset($_GET['p']) && $_GET['p']=='bananas') include('siteLayout/content/bananas.php');
        else if(isset($_GET['p']) && $_GET['p']=='about') include('siteLayout/content/about.php');
        else if(isset($_GET['p']) && $_GET['p']=='cart') include('siteLayout/content/cart.php');
        else if(isset($_GET['p']) && $_GET['p']=='user') include('loginUser/noLogin.php');
        else if(isset($_GET['p']) && $_GET['p']=='login') include('loginUser/login.php');
        else if(isset($_GET['p']) && $_GET['p']=='newuser') include('loginUser/adduser.php');
        else if(isset($_GET['p']) && $_GET['p']=='login_submit') include('loginUser/login_submit.php');
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
