<?php include('../db.php');
include('header.php'); 
include('../javascript.php');
include('../userom.php');

?>
<head>
<link rel="stylesheet" href="../js/jquery-ui.css">
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery-ui.js"></script>
</head>
	<body onload=displayTime();>
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

						<tr><a href="manageuser.php">Manage Users</a>  |  </tr>
						
						<tr><a href="myaccount.php">My Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a>  |  </tr>
						
					</td>
				</thead>
			</table>
			<br/>
			<table class="table table-bordered">
				<div class="alert alert-success">Truck Receiving Details</div>
			</table>
			<div style="float:center;">


				
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
						$query=mysqli_query($link,"SELECT * FROM pfmdcdata Group BY Time ASC")or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php //date_default_timezone_set("Asia/Manila"); echo date("h:i:s a"); ?>
	<div class="modal-footer"><i>PFM IT Dept.</i></div>
	</div>
	</center>
	</body>
</html>