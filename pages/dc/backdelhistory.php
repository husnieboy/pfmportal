<?php include('../db.php');

include('header.php'); 

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

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

 <script>

  $(function() {

    $( "#date" ).datepicker();

  });

  </script>
</head>

	<body>

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

						<tr><a href="myaccount.php">My Account</a>  |  </tr>
						
						<tr><a href="tagsdownload.php">Download Tags Request</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a></tr>

					</td>

				</thead>

			</table>

			<br/>

			<table class="table table-bordered">

				<div class="alert alert-success">Truck Details <?php echo date("F-d-Y");?> Report</div>

			</table>

				<?php

				if (isset($_POST['register'])){

				$driver_code=$_POST['driver_code'];

				$store=$_POST['store'];

				$time=$_POST['time'];

				$date=$_POST['date'];

				

				mysqli_query($link,"insert into pfmdcdata (Driver_Code,Store,Time,Date) values('$driver_code','$store','$time','$date')")or die(mysql_error());

				

				}

				?>
				<?php 
				$datetoday=date("F-d-Y");
				?>
				<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				?>
				<table cellpadding="0" cellspacing="0" border="0" width="80%">
				<tr>
				<td>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>Driver's Code</th>
						
						<th>Store</th>
						
						<th>Time</th>
						
						<th>Date</th>

						</tr>

					</thead>

				

					<tbody>

						<?php

							$query=mysqli_query($link,"SELECT * FROM pfmdcdata WHERE Date='$datetoday'  ORDER BY Time ASC")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[1]; ?></td>
						
						<td><?php echo $row[2]; ?></td>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[6]; ?></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>
				</td>
				</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
	<div class="alert alert-success">Truck Details <?php echo $yesterday ?>  Report</div>
	<table cellpadding="0" cellspacing="0" border="0" width="80%">
	<tr>
	<td>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme1">

					<thead>

						<tr>

						<th>Driver's Code</th>
						
						<th>Store</th>
						
						<th>Time</th>
						
						<th>Date</th>

						</tr>

					</thead>

				

					<tbody>

						<?php

						$query=mysqli_query($link,"SELECT * FROM pfmdcdata WHERE Date='$yesterday' ORDER BY Time ASC")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[1]; ?></td>
						
						<td><?php echo $row[2]; ?></td>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[6]; ?></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>
				</td>
				</tr>
				</table>
				
	</div>
	
	</center>

	</body>
</html>