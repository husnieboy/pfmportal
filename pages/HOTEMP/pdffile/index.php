<?php include('../db.php');

include('../javascript.php');

session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];



if ($level == 1)

	{

		header('location:../');

	}

if ($level == 2)

	{

		header('location:../');

	}
if ($level == 3)

	{

		header('location:../');

	}
if ($level == 5)

	{

		header('location:../');

	}

if ($level == '')

	{

		header('location:../');

	}

?>

			<div class="modal-footer"><i>PFM IT Dept.</i></div>

</html>