<?php
function isLoggedIn() {
	return isset($_SESSION['userId']) && $_SESSION['userId'] != 0;
}

function isAdmin() {
	return isset($_SESSION['userId']) && ($_SESSION['userType'] ==2);
}

?> 
