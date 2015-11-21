<?php 
session_start("login");

	if($_SESSION['loginId'] == true){
	?>
	login
	

	<?php } else { ?>
	<p>
		<ul id="menu">
		    <li><a href="?p=login">Login</a></li>
		</ul> 

<?php
	}
	?>

