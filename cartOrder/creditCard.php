<form action="?p=pay" method="post">
<br><b>CREDIT CARD</b>
<fieldset>
<p>
<table>
	<tr>
	<td></td><td> <?php errorMsg(); ?> </td>
	</tr>
	<tr>
		<td> Card number </td> 
		<td><input type="password" id="cardNr" name="cardNr" value="" maxlength="20" /></td>
	</tr>

	<td>  </td> 
	<td><input type="checkbox" name="money" value="money" maxlength="20"/>I have enough money</td>
	</tr>

	<td>  </td> 
	<td><input type="checkbox" name="money" value="money" maxlength="20"/>I accept the terms</td>
	</tr>

	<tr>
	<td></td>
	<td><input class="button" type="submit" value="PAY"/></td>
	</tr>

	<tr>
	<td></td>
	<td><a href="?p=cart">Go back to cart</a></td>
	</tr>

</table>
</form>
</fieldset>
