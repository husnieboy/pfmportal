<?php include('../db.php');

include('header.php');
include('../javascript.php'); 

include('../usermember.php');

include('../javascript.php')	

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

						<tr><a class="btn btn-green" href="#">HOME</a>  |  </tr>

						<tr><a class="btn btn-green" href="myaccount.php">STORE ACCOUNT</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="storetags.php">TAGS REQUEST FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpcodereq.php">VQP REQUEST FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a></tr>

					</td>

				</thead>

			</table>

		<div class="row-fluid">

        <div class="span12">

		<table class="table table-bordered">

		</table>
</br>
<div class="alert alert-success" width="80%"><label>TAGS REQUEST STATUS</label></div>

<table cellpadding="0" cellspacing="0" border="0" width="80%">
<tr>
<td>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme1">



			<thead>



				<tr>



				<th>Ticket No.</th>



				<th>Total Request</th>

				
				<th>Green</th>

				
				<th>Blue</th>

				
				<th>Purple</th>

				

				<th>Status</th>

				

				<th>Date</th>

				

				<th>Time</th>



				</tr>



			</thead>



		



			<tbody>



				<?php 



				$sql = mysqli_query($link,"SELECT * FROM stores WHERE Store_Name='$name'");



				while($tags=mysqli_fetch_array($sql)){



				?>



				<tr>

					

					<td><?php echo $tags['Store_Ticket']; ?></td>

					
					<td><?php echo $tags['Ticket_QTY']; ?></td>
					

					<td><?php echo $tags['stclrgreen']; ?></td>
					

					<td><?php echo $tags['stclrblue']; ?></td>
					

					<td><?php echo $tags['stclrpurple']; ?></td>
					

					<td><?php echo $tags['Ticket_Status']; ?></td>

					

					<td><?php echo $tags['Date']; ?></td>

					

					<td><?php echo $tags['Time']; ?></td>


				</tr>



				<?php } ?>



			</tbody>



		</table>

	</center>
</div>
</td>
</tr>
<table>

	</body>
</body></html>