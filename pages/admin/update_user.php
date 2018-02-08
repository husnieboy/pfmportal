<?php

include('../db.php');



	$sql = "UPDATE user SET

		user_name = '".$_POST['user_name']."',

		user_level = '".$_POST['user_level']."',

		store_name = '".$_POST['store_name']."',

		ams = '".$_POST['ams_store']."',

		area_stores = '".$_POST['area_stores']."'

		WHERE

		user_id = ".$_POST['user_id'] ;



	$result = mysqli_query($link,$sql);

	var_dump($sql);

	header( 'Location: ../om/manageuser.php' ) ;

?>