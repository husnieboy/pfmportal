<?php
include('../db.php');
$rowCount = count($_POST["tags_id"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($link,"DELETE FROM pfmtagsreq WHERE tags_id='" . $_POST["tags_id"][$i] . "'");
}
header("Location:storetags.php");
?>