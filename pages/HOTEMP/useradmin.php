<?php
session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];

$area = $row[7];

$marea = $row[9];

$ams_names = $row[5];

$ams = $row[5];

$vqp_ams = $row[5];

if ($level == 4)

	{

		header('location:../am/');

	}



if ($level == 2)

	{

		header('location:../dc/');

	}

if ($level == 5)

	{

		header('location:../member/');

	}

if ($level == 3)

	{

		header('location:../om/');

	}

if ($level == 6)

	{

		header('location:../hr/');

	}
if ($level == '')

	{

		header('location:../');

	}
?>