<?php
include('../db.php');


if (isset($_POST['delete_member'])){

$id=$_POST['selector_member'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM user where user_id='$id[$i]'");
}
header("location: index.php");

}
?>