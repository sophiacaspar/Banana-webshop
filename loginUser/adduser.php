<?php
if(isset( $_SESSION['userId'] ))
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

<h2>Add user</h2>
<form action="?p=adduser_submit" method="post">
<fieldset>

<table>
<tr>
<td><label for="userName">Username</label></td> 
<td><input type="text" id="userName" name="userName" value="" maxlength="20" /> </td>
<td><span id="user-result">  </span></td>
</tr>
<tr>
<td><label for="password">Password</label></td> 
<td><input type="password" id="password" name="password" value="" maxlength="20" /></td>
<td><span id="password-result">  </span></td>
</tr>
<tr>
<td><label for="firstName">First name</label> </td> 
<td><input type="text" id="firstName" name="firstName" value="" maxlength="20" /></td>
<td><span id="first-result">  </span></td>
</tr>
<tr>
<td><label for="lastName">Last name</label></td> 
<td><input type="text" id="lastName" name="lastName" value="" maxlength="20" /></td>
<td><span id="last-result">  </span></td>
</tr>
<tr>
<td><label for="address">Address</label></td> 
<td><input type="text" id="address" name="address" value="" maxlength="20" /></td>
<td><span id="address-result">  </span></td>
</tr>
<tr>
<td><label for="postalCode">Postal code</label></td> 
<td><input type="text" id="postalCode" name="postalCode" value="" maxlength="20" /></td>
<td><span id="postal-result">  </span></td>
</tr>
<tr>
<td><label for="city">City</label></td> 
<td><input type="text" id="city" name="city" value="" maxlength="20" /></td>
<td><span id="city-result">  </span></td>
</tr>
<tr>
<td><label for="country">Country</label></td> 
<td><input type="text" id="country" name="country" value="" maxlength="20" /></td>
<td><span id="country-result">  </span></td>
</tr>
<tr>
<td><label for="mail">Mail</label></td> 
<td><input type="text" id="mail" name="mail" value="" maxlength="40" /></td>
<td><span id="mail-result">  </span></td>
</tr>
<tr>
<td><label for="tfnNr">Phone number</label></td> 
<td><input type="text" id="tfnNr" name="tfnNr" value="" maxlength="20" /></td>
<td><span id="tfn-result">  </span></td>
</tr>
<tr>
<td>
</td><td>
<!--- <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" /> --->
<input class="button" type="submit" value="&rarr; Add user" />
</td>
</tr>
</table>

<?php errorMsg();
?>

</fieldset>
</form>

<?php
}
?>

