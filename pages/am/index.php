<?php include('../db.php');

include('header.php'); 

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

		header('location:../admin/');

	}

if ($level == 2)

	{

		header('location:../dc/');

	}
if ($level == 3)

	{

		header('location:../om/');

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

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

	<body onload="displayTimeBig();">

	<center>

		</br>

		</br>

			<div id="container">

			<div id="header">

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

			</div>

			

			<table>

				<thead>

					<td>

						<tr><a href="index.php">Home</a>  |  </tr>

						<tr><a href="sales.php">Sales Details Report</a>  |  </tr>
						
						<tr><a href="trucks.php">Deliveries</a>  |  </tr>
						
						<tr><a href="myaccount.php">My Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a></tr>

					</td>

				</thead>

			</table>

			<br/>

			<table class="table table-bordered">

				<div class="alert alert-success">Time</div>

			</table>

			<div style="float:center;">

				<br>

				<br>

				<br>

				<span id="CountTime" ></span>

				<br>

				<br>

				<br>

			</div>

			</center>

	

			</body>

			<div class="modal-footer"><i>PFM IT Dept.</i></div>

</html>