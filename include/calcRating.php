<?php

function avgRating($productId) {
	include 'db_connect.php';
	$sqlRatings = "SELECT rating FROM RATING where productId = {$productId}";
	$ratings = mysql_query($sqlRatings, $link) or die(mysql_error());
	
	$avgRating = 0;	

	$nrRatings = mysql_num_rows($ratings);

	//Make sure that there is no division by zero
	if($nrRatings>0){
		for($i=0;$i<$nrRatings;$i++){
			$avgRating = $avgRating + mysql_result($ratings,$i,'rating');
		}
		$avgRating = $avgRating/$nrRatings;
		return round($avgRating,2);
		//return round($avgRating, 0, PHP_ROUND_HALF_UP);
	} else {
		//If there are no entries for the product,
		$avgRating = "-";
		return $avgRating;
	}
}

function numRate($productId) {
	include 'db_connect.php';
	$numRate = "SELECT COUNT(ratingId) as numRates FROM RATING where productId = {$productId}";
	$result = mysql_query($numRate, $link) or die(mysql_error());

	return mysql_fetch_assoc($result)["numRates"];
}

?>
