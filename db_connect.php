<?php
$host = 'utbweb.its.ltu.se';
$db_name = 'angbru0db';
$username = 'angbru-0';
$password = 'sopcas-1';

$link = mysql_connect($host, $username, $password);
	mysql_select_db($db_name, $link);
?>
