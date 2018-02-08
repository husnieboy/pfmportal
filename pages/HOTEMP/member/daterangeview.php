<?php include('../db.php');

include('header.php'); 
include('../usermember.php');
include('../javascript.php');
?>

<head>

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

<script src="../js/simplemath.js"></script>
<style>
textarea {
    resize: none;
}
</style>
</head>

	<body onload=displayTime();>

	<center>

		</br>

		</br>

			<div id="container">

			<div id="header">

				<div class="alert alert-success"><label>WELCOME <?php echo $name ?></label></div>

			</div>

			

			<table>

				<thead>

					<td>

						<tr><a href="index.php">Home</a>  |  </tr>

						<tr><a href="sales.php">Sales Details Form</a>  |  </tr>

						<tr><a href="trucks.php">Deliveries Details Form</a>  |  </tr>

						<tr><a href="myaccount.php">Store Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a>  |  </tr>

					</td>

				</thead>

			</table>

			<table class="table table-bordered">

				<div class="alert alert-success">Sales Report</div>

			</table>

			<div style="float:center;">

			<?php 
				$monthsales = date("F");
				$datetime = date("F-d-Y");
				$ddate = "$datetime";
				$date = new DateTime($ddate);
				$week = $date->format("W");
			?>


				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>Date</th>

						<th>Time</th>

						<th>Total Sale's</th>

						<th>TC</th>

						<th>AC</th>

						<th>CVS</th>

						<th>FS</th>

						<th>RTE</th>
						
						<th>FF</th>

						</tr>

					</thead>

				

					<tbody>

						<?php 
						if(isset($_POST['fdate']))
						{
							$fdate=$_POST['fdate'];
							$ldate=$_POST['ldate'];
						$query=mysqli_query($link,"SELECT * FROM pfmsales WHERE Store_Name='$name' AND Date BETWEEN '$fdate' AND '$ldate'")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[7]; ?></td>

						<td><?php echo $row[5]; ?></td>

						<td><?php echo $row[1]; ?></td>

						<td><?php echo $row[8]; ?></td>

						<td><?php echo $row[9]; ?></td>

						<td><?php echo $row[10]; ?></td>

						<td><?php echo $row[11]; ?></td>
						
						<td><?php echo $row[12]; ?></td>

						<td><?php echo $row[13]; ?></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>	

	</div>
<form class="form-horizontal" action="../export/1/export.php" method="POST">
	<div class="control-group">
				<div class="controls">

				<input type="hidden" id="fdate" name="fdate" value="<?php echo $fdate ?>" required/>
				<input type="hidden" id="ldate" name="ldate" value="<?php echo $ldate ?>" required/>
				<input type="hidden" id="name" name="name" value="<?php echo $name ?>" required/>
				<button type="submit" name="SRange" class="btn btn-info">Export</button>
				</div>

				</div>
				
	</form>
	<?php }?>
<div class="modal-footer"><i>PFM IT Dept.</i></div>

</html>