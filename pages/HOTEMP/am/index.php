<?php include('../db.php');

include('header.php'); 

include('../javascript.php');

include('../useram.php');

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