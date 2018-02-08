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

$area = $row[7];



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

<link href="../css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
		
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

	<body onload=displayTime();TakeTheRed();>

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
			?>
				<div class="control-group">

				<table>					

					<?php 

					$sql = mysqli_query($link,"SELECT Process_Week,Process_Month,Am_Name, SUM(Total_Sales) as Total FROM pfmsales WHERE Process_Month='$monthsales' And Am_Name='$name' Group By Process_Week")or die(mysqli_error());

					while($row=mysqli_fetch_array($sql)){

					?>

					<ol style="list-style-type:square">

					<li><?php echo $row['Process_Week']; ?> Total Sales of <?php echo date("F"); ?>:<b><i><?php echo $row['Total'];?></i></b></li>

					</ol>

					<?php } ?>

						

				</table>

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________</p>

					<table>					

					<?php 

					$sqlmonth = mysqli_query($link,"SELECT Process_Month,Am_Name, SUM(Total_Sales) as Total FROM pfmsales WHERE Process_Month='$monthsales' And Am_Name='$name' Group By Process_Month")or die(mysqli_error());

					while($row=mysqli_fetch_array($sqlmonth)){

					?>

					<ul style="list-style-type:square">

					<li><p>Total Sales of <?php echo $row['Process_Month']; ?>:<b><i><?php echo $row['Total'];?></i></b></p></li>

					</ul>

					<?php } ?>

				</table>

				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

			<div style="float:left;">

						<?php 

						$query=mysqli_query($link,"SELECT * FROM pfmsales WHERE Am_Name='$name' And TransDate='$yesterday' Group By Store_Name")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						?>
		
						<div class="bs-example" style="float:left;">
						<div class="list-group">
						<a class="list-group-item active"><span class="glyphicon glyphicon"><b><?php echo $row['Store_Name']; ?></b></span><span class="badge">Details</span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">Total Sale</span><span class="badge"><?php $comma=$row['Total_Sales']; echo number_format($comma, 2, '.', ','); ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">AC</span><span class="badge"><?php echo $row['AC']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">TC</span><span class="badge"><?php echo $row['TC']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">CVS</span><span class="badge"><?php echo $row['CVS']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">FF</span><span class="badge"><?php echo $row['FF']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">RTE</span><span class="badge"><?php echo $row['RTE']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">Time</span><span class="badge"><?php echo $row['Time']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">Trans Date</span><span class="badge"><?php echo $row['TransDate']; ?></span></a>
						<a class="list-group-item"><span class="glyphicon glyphicon-file">Upload Date</span><span class="badge"><?php echo $row['Date']; ?></span></a>
						<a class="list-group-item active" href="area.php<?php echo '?area='.$row['Store_Name']; ?>">View Store Sales Report</a>
						</div>
						</div>
						
						<?php } ?>
			</div>
				</table>	

	</div>

<center>
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
				<select id="sname" name="sname" type="text" required>
				<?php
				$query=mysqli_query($link,"select * from user where user_level='4' AND user_name='$user' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

					<?php } ?>
					
						<?php 

						$query=mysqli_query($link,"select * from user where user_level='5' AND ams='$name' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

					<?php } ?>
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
		width: 300px;
	}
    .bs-example{
    	margin: 20px;
    }
</style>
</html>