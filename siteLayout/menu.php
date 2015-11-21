<!--<?php 
#session_start("login");
?>	-->	
		<ul id="menu">
	    <li><a href="?p=bananas">Bananas</a></li>
	    <li><a href="?p=about">About</a></li>
	    <li><a href="?p=cart">Cart (0)</a></li>

	    <?php if($_SESSION['loginId'] == true){ ?>
	    <li><a href="?p=mypage">My page</a></li>
	    <li><a href="?p=logout">Logout</a></li>

	    <?php } else { 
	    	?> 
	    <li><a href="?p=login">Login</a></li>
	<?php } 
	?>
	    </ul> 




<!--
			<ul id="menu">
	    <li><a href="?p=bananas">Bananas</a></li>
	    <li><a href="?p=about">About</a></li>
	    <li><a href="?p=cart">Cart (0)</a></li>
	    <li><a href="?p=user">User</a></li>

	    </ul> 
	    -->