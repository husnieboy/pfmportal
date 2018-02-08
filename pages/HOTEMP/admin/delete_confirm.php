<?php
include('../db.php');
$id=$_GET['id'];

mysqli_query($link,"delete from user where user_id='$id'")or die(mysqli_error());
header( 'Location:../om/manageuser.php' );



?>