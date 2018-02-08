<?php include('../db.php');
include('header.php'); 
session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];

$iuser= $row[1];



if ($level == 1)

	{

		header('location:../admin/');

	}
if ($level == 3)

	{

		header('location:../om/');

	}
if ($level == 4)

	{

		header('location:../am/');

	}

if ($level == 5)

	{

		header('location:../member/');

	}

if ($level == '')

	{

		header('location:../');

	}

?>

<head>

<link href="../css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
		
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

	<body onload=displayTime();>

	<center>

		</br>

		</br>

	</center>
			

<div class="modal-footer"><i>PFM IT Dept.</i></div>
<style type="text/css">
	.list-group{
		width: 250px;
	}
    .bs-example{
    	margin: 40px;
    }
</style>
</html>