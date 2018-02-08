<?php
include('../db.php');
$id=$_GET['id'];

mysqli_query($link,"DELETE FROM stores where store_ID='$id'")or die(mysqli_error());
header( 'Location:../admin/tagsreview.php' );



?>