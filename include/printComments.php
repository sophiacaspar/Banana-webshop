<?php

function printComments($productId) {
	include 'db_connect.php';
	$sqlComment = "SELECT userId, comment FROM COMMENT WHERE productId = {$productId}";
	$comments = mysql_query($sqlComment, $link) or die(mysql_error());
	$nrRatings = mysql_num_rows($comments);

	


	//Make sure that there is no division by zero
	if($nrRatings>0){?>
		<table align = "center">
		<col width="40px" height="40px"/>
		<col width="40px" height="40px"/>
		<col width="400px" />
		<tr>
		<td align="left">
			<h3>User:</h3>
		</td><td></td>
		<td align="center">
			<h3>Comment:</h3>
		</td>
		</tr>				
		<?php
		for($i=0;$i<$nrRatings;$i++){
			$userId = mysql_result($comments,$i,'userId');
			?>
			<tr>
			<td align="left"><?php
			$sqlUser = "SELECT firstName FROM USER WHERE userId = {$userId}";
			$user = mysql_query($sqlUser, $link) or die(mysql_error());
			echo mysql_result($user,0,'firstName');
			?><hr>
			</td><td></td>
			<td align="left">
			<?php
			echo mysql_result($comments,$i,'comment');
			?>
			<hr>
			</td>
			</tr>
			<?php
		}?>
		</table>
		<?php

	} else {
		//else: echo that there are no registered comments for the given product
		echo "There are no comments for this product yet :(";
	}
}

?>
