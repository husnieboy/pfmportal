<?php

include('../db.php');

	$vqp_trans_store=$_POST['vqp_trans_store'];

	$vqp_trans_pass=$_POST['vqp_password'];

	$vqp_position=$_POST['vqp_position'];

	$vqp_date=$_POST['vqp_date'];

	$vqp_status=$_POST['vqp_status'];



	$id=$_GET['transfer'];



				

	$result = mysqli_query($link,"UPDATE vqpusers SET vqp_trans_store='$vqp_trans_store', vqp_password='$vqp_trans_pass', vqp_position='$vqp_position', vqp_date='$vqp_date', vqp_status='$vqp_status' where vqp_id='$id'")or die(mysqli_error());



?>

				<script type="text/javascript">



					window.alert("Successfully Uploaded!!");

					window.location.href='index.php';



				</script>