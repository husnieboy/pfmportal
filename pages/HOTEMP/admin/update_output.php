<?php

include('../db.php');



$sql = "UPDATE pfmdcdata SET 

		Driver_Code = '".$_POST['driver_code']."' ,

		Store = '".$_POST['store']."',

		Time = ".$_POST['time'].",

		Date = ".$_POST['date'].",

		WHERE

		ID = ".$_POST['up_id'] ;





		

	$result = mysqli_query($link,$sql);

	header( 'Location: http://localhost/warehouse/admin/output.php' ) ;

?>