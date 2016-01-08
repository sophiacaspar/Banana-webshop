
	<?php /** VIEW RATES **/
	function rate($result, $i){
	include 'db_connect.php';
	$avgRate = avgRating(mysql_result($result,$i,'productId'));
	$roundRate = round($avgRate, 0, PHP_ROUND_HALF_DOWN);
	$maxRate = 5;
	$numRate = numRate(mysql_result($result,$i,'productId'));
	?> <table align="center"> <tr> <?php

	/** View rates via monkeys **/ 
	for($j=0; $j<$roundRate; $j++){ 
		if(isLoggedIn()){ ?>
			<form action="?p=rate" method="post">
			<td><input type="hidden" id="rate" name="rate" value="<?php echo $j + 1 ?>"></td>
			<td><input type="hidden" id="prodId" name="prodId" value="<?php echo mysql_result($result,$i,'productId')?>"></td>
			<td><input class="rateFill" type="image" src="commentsRatings/monkey.png" alt="Submit"> </td>
</form>
		<?php } else { ?>
		<td><img class="rateFill" src="commentsRatings/monkey.png" alt="monkey"></td>
	<?php } }

	/** View rest of monkeys with lower opacity **/
	for($k=0; $k<($maxRate-$roundRate); $k++){
			if(isLoggedIn()){ ?>
			<form action="?p=rate" method="post">
			<td><input type="hidden" id="rate" name="rate" value="<?php echo $roundRate + $k + 1 ?>"></td>
			<td><input type="hidden" id="prodId" name="prodId" value="<?php echo mysql_result($result,$i,'productId')?>"></td>
			<td><input class="rateTotal" type="image" src="commentsRatings/monkey.png" alt="Submit"></td>
</form>
		<?php } else { ?>
		<td><img class="rateTotal" src="commentsRatings/monkey.png" alt="monkey"></td>
	<?php } }
	echo "</tr></table>";

	echo "<small> [" . $avgRate . "/" . $maxRate . "] " . $numRate . " votes</small>";
}
	?>
