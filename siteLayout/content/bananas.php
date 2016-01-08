<?php
include 'db_connect.php';
include 'commentsRatings/rate.php';
// Fetch the products ordered by product ID
$sql = "SELECT * FROM PRODUCT ORDER BY productId";
$result = mysql_query($sql, $link) or die(mysql_error());

$maxIndex = mysql_num_rows($result);


?>

<p>POPULAR BANANAS</p>


<?php 
// VARNING! This solution is based on the assumption that all product IDs are...
// ... sorted in increasing order from 1 to ..-. max


//Loop increment by two to get the desired look.
for($i = 0; $i < $maxIndex; $i++){
	//If i is even insert new paragraph to create two columns	
	if($i % 2 == 0){
		?> <p> <?php	
	}
?> 
	<div class="imgbox" id="imgbox1"><b><?php echo mysql_result($result,$i,'name')?></b><br>
	<form action="?p=cart_submit" method="post">
	<?php echo mysql_result($result,$i,'description')?><br>
	<img class="thumbnail" src="<?php echo mysql_result($result,$i,'picture')?>" width="107" height="90" alt="Yellow"><br>
            
	<h3><?php echo mysql_result($result,$i,'price')?> €</h3>
	<input type="hidden" name="prodId" value="<?php echo mysql_result($result,$i,'productId')?>">
	<input type="hidden" id="quantity" name="quantity" value="1">
	<input class="button" type="submit" value="BUY">
	
	</form>	
	<form action="?p=comment" method="post">
	<input type="hidden" name="prodId" value="<?php echo mysql_result($result,$i,'productId')?>">
	<input class="button" type="submit" value="COMMENTS">
	
	</form><br>


	<?php 
	/** Function from commentsRatings/, to show and make rate-monkeys clickable. **/
	rate($result, $i); ?>

	</div>
        
<?php
} ?>


