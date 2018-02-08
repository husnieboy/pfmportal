<?php include('../db.php');

include('header.php'); 

include('../javascript.php');

include('../userom.php'); 


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

				<div class="alert alert-success">Sale's Report</div>

			</table>

				
	</center>
			<?php 
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
			<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				$date = strtotime('F-d-Y');
			?>
				<div class="control-group">

				<table>					

					<?php 

					$sql = mysqli_query($link,"SELECT Process_Week,Process_Month, SUM(Total_Sales) as Total FROM pfmsales WHERE Process_Month='$monthsales' Group By Process_Week")or die(mysqli_error());

					while($row=mysqli_fetch_array($sql)){

					?>

					<ol style="list-style-type:square">

					<li><?php echo $row['Process_Week']; ?> Total Sales of <?php echo date("F"); ?>:<b><i><?php $comma=$row['Total']; echo number_format($comma, 2, '.', ',');?></i></b></li>

					</ol>

					<?php } ?>

						

				</table>

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________</p>

					<table>					

					<?php 

					$sqlmonth = mysqli_query($link,"SELECT Process_Month, SUM(Total_Sales) as Total FROM pfmsales WHERE Process_Month='$monthsales' Group By Process_Month")or die(mysqli_error());

					while($row=mysqli_fetch_array($sqlmonth)){

					?>

					<ul style="list-style-type:square">

					<li><p>Total Sales of <?php echo $row['Process_Month']; ?>:<b><i><?php $comma=$row['Total']; echo number_format($comma, 2, '.', ','); ?></i></b></p></li>

					</ul>

					<?php } ?>

				</table>

				</div>
	

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">

				

					<tbody>

						<?php 

						$query=mysqli_query($link,"SELECT * FROM area GROUP By Area_Name")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						$area = $row['Area_Name'];

						?>
						<a class="list-group-item active" href="area.php<?php echo '?area='.$row['Area_Name']; ?>"><span class="glyphicon glyphicon-camera"><?php echo $row['Area_Name']; ?></span><span class="badge">View Area Sales Report</span></a>
						<?php 

						$queryA=mysqli_query($link,"SELECT Total_Sales,Store_Name, SUM(Total_Sales) as Total, COUNT(Store_Name) as C FROM pfmsales WHERE Area_Store='$area' And TransDate='$yesterday' GROUP By Store_Name")or die(mysqli_error());

						while($rowA=mysqli_fetch_array($queryA)){

						?>
						<a class="list-group-item"><span class="glyphicon glyphicon-file"><?php echo $rowA['Store_Name']; ?></span><span class="badge">Total Sales:      <?php $comma=$rowA['Total']; echo number_format($comma, 2, '.', ',');?></span></a>
						<?php } ?>
						<?php } ?>

					</tbody>

				</table>	
	</div>

<center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="alert alert-success">Date Range View</div>

	<form class="form-horizontal" action="daterangeview.php" method="POST">
	<div class="control-group">

				<label class="control-label" for="inputEmail" >Select Date</label>

				<div class="controls">

				<input type="text" id="fdate" name="fdate" placeholder="From Date" required/>
				<input type="text" id="ldate" name="ldate" placeholder="To Date" required/>
				<select id="stname" name="stname" type="text" required>

						<option>QC</option>

					</select>
				<button type="submit" name="SRange" class="btn btn-info">Submit</button>
				</div>

				</div>
				
	</form>

</center>

</body>

</div>
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