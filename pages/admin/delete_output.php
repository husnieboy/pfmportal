<?php
include('../db.php');
$id=$_GET['id'];

mysqli_query($link,"delete from pfmdcdata where ID='$id'")or die(mysqli_error());
header('location:output.php');



?>