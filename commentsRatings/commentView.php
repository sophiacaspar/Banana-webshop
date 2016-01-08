<div id="" style="overflow-y:scroll; height:500px;">
<?php

printComments($_POST['prodId']);
?>
</div>
<?php
if(isset( $_SESSION['userId'] ))
{
include 'commentAdd.php';
}
?>
