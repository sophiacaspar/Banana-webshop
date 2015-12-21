<?php
function errorMsg(){
	if(!(isset($_SESSION['msg']))){
		echo "";
		$_SESSION['msg']= "";	
	}else{
		echo $_SESSION['msg'];	
		$_SESSION['msg']= "";
	}	
}

?>
