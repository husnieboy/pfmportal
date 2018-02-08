<?php
include('../db.php');

$user_id=$_POST['user_id'];
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];
$store_name=$_POST['store_name'];
$contact_number=$_POST['contact_number'];
$result = mysqli_query($link,"UPDATE user SET user_name='$user_name', user_password='$user_password', store_name='$store_name', contact_number='$contact_number' where user_id='$user_id'")or die(mysqli_error());

	?>

				<script type="text/javascript">

					window.alert("Username and Password Updated!!");
					window.location.href='index.php';

				</script>

	<?php
?>