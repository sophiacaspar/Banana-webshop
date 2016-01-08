<?php
$prodId = $_POST['prodId'];
?>
<fieldset>
<table>
<form action="?p=comment_submit" method="post">
<tr>
<td><label for="userName">Comment</label></td> 
<td><input type="text" style="height:70px" id="comment" name="comment" value="" maxlength="400" /> </td>
<input type="hidden" name="prodId" value="<?php echo $prodId ?>">
</tr>
<tr>
<td>
</td><td>
<!--- <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" /> --->
<input class="button" type="submit" value=" Add comment" />
</td>
</tr>
</table>
</fieldset>

