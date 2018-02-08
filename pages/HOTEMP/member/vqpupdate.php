<?php $rDate=date("F-d-Y");

	$datetime = new DateTime();
	$datetime->add(new DateInterval('P6M'));
?>
<?php $date6m =$datetime->format('F-d-Y'); ?>
<?php

include('../db.php');

	$vqp_trans_store=$_POST['vqp_trans_store'];

	$vqp_position=$_POST['vqp_position'];

	$vqp_date=$_POST['vqp_date'];

	$vqp_status=$_POST['vqp_status'];



	$id=$_GET['transfer'];



				

	$result = mysqli_query($link,"UPDATE vqpusers SET vqp_trans_store='$vqp_trans_store', vqp_position='$vqp_position', vqp_date='$date6m', vqp_status='$vqp_status', rDate='$rDate' where vqp_id='$id'")or die(mysqli_error());



?>

				<script type="text/javascript">



					window.alert("Successfully Uploaded!!");

					window.location.href='vqpcodereq.php';



				</script>