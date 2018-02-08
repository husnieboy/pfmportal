<?php include('../db.php');

include('header.php'); 

session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];

$area = $row[7];

$ams_names = $row[5];



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
if ($level == 4)

	{

		header('location:../am/');

	}
	
if ($level == '')

	{

		header('location:../');

	}
	
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

						<tr><a href="storetags.php">HOME</a>  |  </tr>

						<tr><a href="sales.php">SALES DETAILS FORM</a>  |  </tr>

						<tr><a href="trucks.php">DELIVERIES DETAILS FORM</a>  |  </tr>

						<tr><a href="myaccount.php">STORE ACCOUNT</a>  |  </tr>

						<tr><a href="../logout.php">LOGOUT</a>  |  </tr>

					</td>

				</thead>

			</table>

			<table class="table table-bordered">

				<div class="alert alert-success">SALES FORM</div>

			</table>

			<div style="float:center;">

			<?php 
				$monthsales = date("F");
				$datetime = date("F-d-Y");
				$ddate = "$datetime";
				$date = new DateTime($ddate);
				$week = $date->format("W");
			?>



			<form class="form-horizontal" method="POST">

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Sales</label>

				<div class="controls">

				<input type="Number" id="total_sales" name="total_sales" placeholder="Total Sale's" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail"></label>

				<div class="controls">
				
				<input type="Number" id="tc" name="tc" placeholder="TC" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />

				<input type="Number" id="cus" name="cus" placeholder="CVS" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />

				<input type="Number" id="ff" name="ff" placeholder="FF" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />

				<input type="Number" id="rte" name="rte" placeholder="RTE" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required /><br><br>
				
				<input type="Number" id="wt" name="wt" placeholder="Waste" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />

				<input type="Number" id="fr" name="fr" placeholder="FillRate" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />

				<input type="Number" id="mh" name="mh" placeholder="ManHours" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required /><br><br>

				<input type="Number" id="ac" name="ac" placeholder="AC" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required readonly />
				
				<input type="Number" id="fs" name="fs" placeholder="FS" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Store</label>

				<div class="controls">

				<input type="text" id="store_name" name="store_name" placeholder="Store" value="<?php echo $name ?>" required readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail" >Week & Month</label>

				<div class="controls">
				
				<input type="text" name="process_week" id="process_week" placeholder="Store" value="<?php echo 'Week '; echo $week ?>" required readonly />

				<input type="text" id="process_month" name="process_month" placeholder="Month" value="<?php echo date("F"); ?>" readonly required />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Time</label>

				<div class="controls">

				<input type="text" id="time" name="time" placeholder="Time" readonly required/>

				</div>

				</div>

				
				<div class="control-group">

				<label class="control-label" for="inputEmail" >Trans Date</label>

				<div class="controls">

				<input type="text" id="Tdate" name="Tdate" placeholder="Transaction Date" required/>

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail" >Upload Date</label>

				<div class="controls">

				<input type="text" id="date" name="date" placeholder="Upload Date" value="<?php echo date("F-d-Y"); ?>" readonly required/>

				</div>

				</div>
				
				<div class="control-group">

				<label class="control-label" for="inputEmail" >Upload Date</label>

				<div class="controls">

				<textarea rows="4" cols="40" type="text" id="rm" name="rm" placeholder="Remarks" value="<?php echo date("F-d-Y"); ?>" ></textarea>

				</div>

				</div>

	

				<div class="control-group">

				<div class="controls">

				<button type="submit" name="register" id="register" class="btn btn-info">Save</button>
				<div id="status"></div>
				</div>

				</div>
				
				
				<input type="hidden" id="area_store" name="area_store" placeholder="area" value="<?php echo $area ?>"/>
				<input type="hidden" id="ams" name="ams" placeholder="area" value="<?php echo $ams_names ?>"/>
				<input name="sat_sun" id="sat_sun" type="hidden" placeholder="" value="<?php echo date('l'); ?>"/>
				<input class="btn btn-success" type="hidden" name="Process" id="Process" value=""/>
				<input name="bar_code" id="bar_code" type="hidden"/>
				<input name="sales" id="sales" type="Hidden" placeholder="" value=""/>
				<input name="sl" id="sl" type="Hidden" placeholder="" value=""/>
				
				

				</form>

				
				<?php

				if (isset($_POST['register'])){

				$total_sales=$_POST['total_sales'];

				$store_name=$_POST['store_name'];

				$process_week=$_POST['process_week'];

				$process_month=$_POST['process_month'];

				$time=$_POST['time'];
				
				$tdate=$_POST['Tdate'];

				$date=$_POST['date'];

				$tc=$_POST['tc'];

				$ac=$_POST['ac'];

				$cus=$_POST['cus'];
				
				$ff=$_POST['ff'];

				$fs=$_POST['fs'];

				$rte=$_POST['rte'];
				
				$wt=$_POST['wt'];

				$fr=$_POST['fr'];

				$mh=$_POST['mh'];
				
				$rm=$_POST['rm'];
				
				$area_store=$_POST['area_store'];
				
				$ams =$_POST['ams'];

				

				mysqli_query($link,"insert into pfmsales (Total_Sales,Store_Name,Process_Week,Process_Month,Time,TransDate,Date,TC,AC,CVS,FS,FF,RTE,Waste,FillRate,ManHours,Remarks,Area_Store,Am_Name) values('$total_sales','$store_name','$process_week','$process_month','$time','$tdate','$date','$tc','$ac','$cus','$fs','$ff','$rte','$wt','$fr','$mh','$rm','$area_store','$ams')")or die(mysqli_error());

				

				}

				?>

	
	<div class="alert alert-success"><label>Sales Report</label></div>
	</center>
	<div class="control-group">

				<table>					

					<?php 

					$sql = mysqli_query($link,"SELECT Process_Week,Process_Month, SUM(Total_Sales) as Total FROM pfmsales WHERE Store_Name='$name' And Process_Month='$monthsales' Group By Process_Week")or die(mysqli_error());

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

					$sqlmonth = mysqli_query($link,"SELECT Process_Month, SUM(Total_Sales) as Total FROM pfmsales WHERE Store_Name='$name' And Process_Month='$monthsales' Group By Process_Month")or die(mysqli_error());

					while($row=mysqli_fetch_array($sqlmonth)){

					?>

					<ul style="list-style-type:square">

					<li><p>Total Sales of <?php echo $row['Process_Month']; ?>:<b><i><?php echo $row['Total'];?></i></b></p></li>

					</ul>

					<?php } ?>

				</table>

				</div>

	<center>
	<form name="list" method="post" action="">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">
<thead>
				<tr>
						<th></th>
						
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
</form>
<?php  $datatagstoday = date("F-d-Y"); ?>
<?php
$result = mysqli_query($link,"SELECT * FROM pfmsales WHERE Store_Name='$name' ORDER BY Time ASC");
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><input type="checkbox" name="sales_id[]" value="<?php echo $row['Sales_ID']; ?>" ></td>
						<td><?php echo $row[6]; ?></td>

						<td><?php echo $row[5]; ?></td>

						<td><?php echo $row[1]; ?></td>

						<td><?php echo $row[8]; ?></td>

						<td><?php echo $row[9]; ?></td>

						<td><?php echo $row[10]; ?></td>

						<td><?php echo $row[11]; ?></td>
						
						<td><?php echo $row[12]; ?></td>

						<td><?php echo $row[13]; ?></td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
<input class="btn btn-success" type="button" name="Edit" value="Edit" onClick="setUpdateAction();" />
</form>
<script language="javascript" type="text/javascript">
function setUpdateAction() {
if(confirm("Are you sure want to Edit these Request?")) {
document.list.action = "editsales.php";
document.list.submit();
}
}
</script>
	</div>

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
				<button type="submit" name="SRange" class="btn btn-info">Submit</button>
				</div>

				</div>
				
	</form>

	</center>

</body>

</div>
<script src="../js/checker.js" type="text/javascript"></script>
<div class="modal-footer"><i>PFM IT Dept.</i></div>

</html>