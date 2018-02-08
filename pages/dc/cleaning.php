<?php include('../db.php'); ?>
<?php mysqli_query($link,"DELETE FROM dcstoretrip WHERE trpstatus=''")or die(mysqli_error("cleaning"));
?>			