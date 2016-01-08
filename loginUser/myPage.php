<?php
if(!isset( $_SESSION['userId'] ))
{
	$page = $_SERVER['PHP_SELF'];
	echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

} else {

/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;

?>

<head>

<!--- Username unique check!!!!!!! --->
<script src="loginUser/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="text/javascript">

$(document).ready(function() {	
	var x_timer;   
	$("#userName").keyup(function (e){
	clearTimeout(x_timer);
	var user_name = $(this).val();
	x_timer = setTimeout(function(){
	    check_username_ajax(user_name);
	}, 1000);
	});

	$("#password").keyup(function (e){
        clearTimeout(x_timer);
        var pass_word = $(this).val();
        x_timer = setTimeout(function(){
            check_password_ajax(pass_word);
        }, 1000);
    	});

	$("#firstName").keyup(function (e){
        clearTimeout(x_timer);
        var first_name = $(this).val();
        x_timer = setTimeout(function(){
            check_firstname_ajax(first_name);
        }, 1000);
    	});

	$("#lastName").keyup(function (e){
        clearTimeout(x_timer);
        var last_name = $(this).val();
        x_timer = setTimeout(function(){
            check_lastname_ajax(last_name);
        }, 1000);
    	});

	$("#address").keyup(function (e){
        clearTimeout(x_timer);
        var add_ress = $(this).val();
        x_timer = setTimeout(function(){
            check_address_ajax(add_ress);
        }, 1000);
    	});

	$("#postalCode").keyup(function (e){
        clearTimeout(x_timer);
        var post_all = $(this).val();
        x_timer = setTimeout(function(){
            check_postal_ajax(post_all);
        }, 1000);
    	});

	$("#city").keyup(function (e){
        clearTimeout(x_timer);
        var ci_ty = $(this).val();
        x_timer = setTimeout(function(){
            check_city_ajax(ci_ty);
        }, 1000);
    	}); 

	$("#country").keyup(function (e){
        clearTimeout(x_timer);
        var coun_try = $(this).val();
        x_timer = setTimeout(function(){
            check_country_ajax(coun_try);
        }, 1000);
    	});    

	$("#mail").keyup(function (e){
        clearTimeout(x_timer);
        var ma_il = $(this).val();
        x_timer = setTimeout(function(){
            check_mail_ajax(ma_il);
        }, 1000);
    	});  

	$("#tfnNr").keyup(function (e){
        clearTimeout(x_timer);
        var tfn_nr = $(this).val();
        x_timer = setTimeout(function(){
            check_tfn_ajax(tfn_nr);
        }, 1000);
    	});  

	function check_password_ajax(password){
	var password = $("#password").val();
	$.post('loginUser/username-checker.php', {'password':password}, function(data) {
	$("#password-result").html(data);
	});
	}
	function check_username_ajax(userName){
	var userName = $("#userName").val();
	$.post('loginUser/username-checker.php', {'userName':userName}, function(data) {
	$("#user-result").html(data);
	});
	}
	function check_firstname_ajax(firstName){
	var firstName = $("#firstName").val();
	$.post('loginUser/username-checker.php', {'firstName':firstName}, function(data) {
	$("#first-result").html(data);
	});
	}
	function check_lastname_ajax(lastName){
	var lastName = $("#lastName").val();
	$.post('loginUser/username-checker.php', {'lastName':lastName}, function(data) {
	$("#last-result").html(data);
	});
	}
	function check_address_ajax(address){
	var address = $("#address").val();
	$.post('loginUser/username-checker.php', {'address':address}, function(data) {
	$("#address-result").html(data);
	});
	}
	function check_postal_ajax(postalCode){
	var postalCode = $("#postalCode").val();
	$.post('loginUser/username-checker.php', {'postalCode':postalCode}, function(data) {
	$("#postal-result").html(data);
	});
	}
	function check_city_ajax(city){
	var city = $("#city").val();
	$.post('loginUser/username-checker.php', {'city':city}, function(data) {
	$("#city-result").html(data);
	});
	}
	function check_country_ajax(country){
	var country = $("#country").val();
	$.post('loginUser/username-checker.php', {'country':country}, function(data) {
	$("#country-result").html(data);
	});
	}
	function check_mail_ajax(mail){
	var mail = $("#mail").val();
	$.post('loginUser/username-checker.php', {'mail':mail}, function(data) {
	$("#mail-result").html(data);
	});
	}
	function check_tfn_ajax(tfnNr){
	var tfnNr = $("#tfnNr").val();
	$.post('loginUser/username-checker.php', {'tfnNr':tfnNr}, function(data) {
	$("#tfn-result").html(data);
	});
	}
});
</script>


</head>

<h2>My page</h2>
<form action="?p=update_submit" method="post">
<fieldset>
<table>
<tr>
<td><label for="userName">Username</label></td> 
<td><?php echo $_SESSION['userName']; ?><input type="hidden" id="userName" name="userName" value="<?php echo $_SESSION['userName'] ?>" maxlength="20" /> </td><td><span id="user-result">  </span>
</tr>
<tr>
<td><label for="password">Password</label></td> 
<td><input type="password" id="password" name="password" value="<?php echo $_SESSION['password'] ?>" maxlength="20" size="20" /></td><td><span id="password-result">  </span></td>
</tr>
<tr>
<td><label for="firstName">First name</label> </td> 
<td><input type="text" id="firstName" name="firstName" value="<?php echo $_SESSION['firstName'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="lastName">Last name</label></td> 
<td><input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION['lastName'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="address">Address</label></td> 
<td><input type="text" id="address" name="address" value="<?php echo $_SESSION['address'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="postalCode">Postal code</label></td> 
<td><input type="text" id="postalCode" name="postalCode" value="<?php echo $_SESSION['postalCode'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="city">City</label></td> 
<td><input type="text" id="city" name="city" value="<?php echo $_SESSION['city'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="country">Country</label></td> 
<td><input type="text" id="country" name="country" value="<?php echo $_SESSION['country'] ?>" maxlength="20" /></tr>
</tr>
<tr>
<td><label for="mail">Mail</label></td> 
<td><input type="text" id="mail" name="mail" value="<?php echo $_SESSION['mail'] ?>" maxlength="40" /></tr>
</tr>
<tr>
<td><label for="tfnNr">Phone number</label></td> 
<td><input type="text" id="tfnNr" name="tfnNr" value="<?php echo $_SESSION['tfnNr'] ?>" maxlength="20" /></tr>
</tr>
<td></td><td> <?php errorMsg() ?> </td>
<tr>
<td>
<p align="right">  </p> 
</td><td>
<input class="button" type="submit" value="&rarr; Update info" />
<td>
</tr>
</table>

<?php errorMsg();
?>

</fieldset>
<br>
</form>
<form action="?p=order_history" method="post"> 
<input class="button" type="submit" value="Order History" />
</form>

<?php
}
?>
