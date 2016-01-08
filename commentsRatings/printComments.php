
<?php
function printComments($productId) {
	include 'db_connect.php';
	$sqlComment = "SELECT userId, commentId, comment, commentTimeStamp FROM COMMENT WHERE productId = {$productId}";
	$comments = mysql_query($sqlComment, $link) or die(mysql_error());
	$nrRatings = mysql_num_rows($comments);

	


	//Make sure that there is no division by zero
	if($nrRatings>0){?>
		<table class="comment" align = "center">
		<col width="200px" height="200px"/>
		<col width="400px" />
		<col width="100px" />
		<tr>
		<td align="left">
			<h3>User:</h3>
		</td>
		<td align="center">
			<h3>Comment:</h3>
		</td>
	
		</tr>				
		<?php
		for($i=$nrRatings-1;$i>=0;$i--){ ?>
			<?php
			$userId = mysql_result($comments,$i,'userId'); 
			?>
			<tr>
			<td align="left"><?php
			$sqlUser = "SELECT firstName FROM USER WHERE userId = {$userId}";
			$user = mysql_query($sqlUser, $link) or die(mysql_error());
			echo mysql_result($user,0,'firstName');
			?>
			<br>
			<?php
			echo mysql_result($comments,$i,'commentTimeStamp');
			?>	
			</td>
			<td align="left">
			<?php
			echo mysql_result($comments,$i,'comment');
			
			?>

			<?php

			
			if(isset($_SESSION['userId']) && ($_SESSION['userType'] ==2)){
		
			?>
			
		
			<form action="?p=remove_comment" method="post">
			<input type="hidden" name="commentId" value="<?php echo mysql_result($comments,$i,'commentId');?>">
			<td>
			<input class="box" type="submit" value="Remove" />
			</td>
			</form>
			<!--</tr>--->

			<?php
			} ?>
		</tr>
		<?php
		} ?>
		</table>

		<?php

	} else {
		//else: echo that there are no registered comments for the given product
		echo "There are no comments for this product yet :(";
	}
}

?>
