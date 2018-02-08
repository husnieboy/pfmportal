<?php include('../db.php');

include('header.php'); 
include('../usermember.php');
include('../javascript.php');

?>

<head>

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery"></script>
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

						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="myaccount.php">STORE ACCOUNT</a>  |  </tr>

						<tr><a class="btn btn-green" href="storetags.php">TAG REQUEST FORM</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="trucks.php">DELIVERY DETAILS FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpcodereq.php">VQP REQUEST FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a> </tr>

					</td>

				</thead>

			</table>

			<table class="table table-bordered">
	
				<div class="alert alert-success">Truck Receiving Details</div>

			</table>

			<div style="float:center;">



			<div id="main">
			<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered"  width="80%">
			<tr>
			<td align="center">
			<div class="my-form">

			<form role="form" class="form-horizontal" id="trucks" method="POST">

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Store</label >

				<div class="controls">

				<input type="text" id="store" name="store" placeholder="Store" value="<?php echo $name ?>" readonly required/>

				</div>

				</div>
				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Time</label>

				<div class="controls">

				<input type="text" id="time" name="time" placeholder="Time" readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail" >Date</label>

				<div class="controls">

				<input type="text" id="date" name="date" placeholder="Date" value="<?php echo date("F-d-Y");?>" readonly />

				</div>

				</div>
				


				<div class="control-group">

				<label class="control-label" for="inputEmail">Trip Ticket No.</label>

				<div class="controls">

				<input type="Text" id="driver_code" name="driver_code" placeholder="Trip Ticket" autofocus required />
				<br>
				<br>
				<div id="status"></div><br>
				<input type="hidden" id="dc_ams" name="dc_ams" placeholder="" value="<?php echo $ams ?>" required />
				</div>

				</div>
	


				<div class="control-group">

				<div class="controls">

				</div>

				</div>
				
				</form>
			
			</div>
			</div>
				<?php 
				$datetoday=date("F-d-Y");
				//echo date("F-d-Y h:i:s A");
				?>
				<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				?>
				<?php
				if(isset($_POST['driver_code']))
				{
				$trp = $_POST['driver_code'];
				$in= mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$name' AND dh_trpno='$trp' AND dh_date='$datetoday' OR dh_date='$yesterday'");
				$datafetch = mysqli_fetch_array($in);
				$start_time = $datafetch[4];
				$end_time = date("H:i:s"); 

				$vv =  strtotime($end_time);
				$bb = strtotime($start_time);
				$cc=$vv-$bb;
				$timedut= gmdate("H:i:s", $cc);
				

				}
				
				if(isset($_POST['driver_code']))
				{
				$store=$_POST['store'];
				$time=date("H:i:s");
				$date=$_POST['date'];
				$triptic=$_POST['driver_code'];
				$dc_ams=$_POST['dc_ams'];
				$storedecclose=mysqli_query($link,"SELECT * FROM dcstore WHERE dcs_s_trip_status='CLOSE' AND dcs_tripno='$triptic' AND dcs_sname='$store'");
				$cpcheck = mysqli_fetch_array($storedecclose, MYSQLI_NUM);
				if($cpcheck[0] >= 1){
					
				$openclose= mysqli_query($link,"SELECT * FROM dcstore WHERE dcs_s_trip_status='OPEN' AND dcs_tripno='$triptic' AND dcs_sname='$store'");
				$closeopen = mysqli_fetch_array($openclose, MYSQLI_NUM);
				
				}
				if($cpcheck[0] < 1){
					
				$openclose= mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_status='OPEN' AND trip_no='$triptic'");
				$closeopen = mysqli_fetch_array($openclose, MYSQLI_NUM);
					
				}
			
						
				if($closeopen[0] >= 1)
				{
						
				$in= mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$store' AND dh_checkin='D' AND dh_date='$datetoday' OR dh_date='$yesterday'");
				$data = mysqli_fetch_array($in, MYSQLI_NUM);
				
				
				
				if($data[0] >= 1) {
					
					?>
					<script type="text/javascript">
					
					if(confirm("Are you sure want to Out/Close these Ticket?")) {
					window.location.href="submitout.php<?php echo '?store='.$store; echo '&date='.$date; echo '&driver_code='.$trp; echo '&triptic='.$triptic; echo '&dc_ams='.$dc_ams; ?>";
					<?php
					//mysqli_query($link,"UPDATE dchistory SET dh_timeout='$time', dh_checkout='D', dh_dut='$timedut' WHERE dh_trpno='$triptic' AND dh_sname='$store' AND dh_timeout=''")or die(mysqli_error());
					//mysqli_query($link,"UPDATE dcdetails SET trip_status='CLOSE' WHERE trip_no='$triptic'")or die(mysqli_error());
					//mysqli_query($link,"UPDATE dcstore SET dcs_s_trip_status='CLOSE' WHERE dcs_tripno='$triptic'")or die(mysqli_error());
					?>
					}
					
					</script>
					<?php
					}
				

				if($data[0] < 1)
					{
						$incheck = mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triptic' AND trip_status='OPEN'");
						$checkdata = mysqli_fetch_array($incheck, MYSQLI_NUM);
						
						if($checkdata[0] = 1){
						
						mysqli_query($link,"INSERT INTO dchistory (dh_lcode,dh_sname,dh_date,dh_timein,dh_trpno,dh_checkin) values('$dlcoe','$store','$date','$time','$triptic','D')")or die(mysql_error());
						mysqli_query($link,"INSERT INTO dcstore (dcs_sname,dcs_tripno,dcs_date,dcs_s_trip_status) values('$store','$triptic','$date','OPEN')")or die(mysqli_error());

						
						
						?>
							<script type="text/javascript">
							window.alert("Time IN!");
							window.location.href='trucks.php';
							</script>
						<?php
						}
						if($checkdata[0] < 1){
							
					
						?>
						<script type="text/javascript">
					
							window.alert("Ticket Already Close!");
							window.location.href='trucks.php';
							</script>
						<?php
						}
					  }
					}
					?>
					<?php
					if($closeopen[0] < 1){
						?>
							<script type="text/javascript">
							window.alert("Ticket Already Close!");
							window.location.href='trucks.php';
							</script>
						<?php
					}
				}
		?>

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>Trip Ticket</th>

						<th>Store Name</th>

						<th>Date</th>

						<th>Time IN</th>
						
						<th>Time OUT</th>
						
						<th>Duration</th>

						</tr>

					</thead>

				

					<tbody>

						<?php 

						$query=mysqli_query($link,"SELECT * FROM dchistory where dh_sname='$name' ORDER BY dh_id ASC")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[8]; ?></td>

						<td><?php echo $row[2]; ?></td>

						<td><?php echo $row[3]; ?></td>
						
						<td><?php echo $row[4]; ?></td>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[6]; ?></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>

				

	<div class="modal-footer"><i>PFM IT Dept.</i></div>

		</div>
		</td>
			</tr>
			</table>
	</center>
	
				<input name="sat_sun" id="sat_sun" type="hidden" placeholder="" value="<?php echo date('l'); ?>"/>
				<input class="btn btn-success" type="hidden" name="Process" id="Process" value=""/>
				<input name="bar_code" id="bar_code" type="hidden"/>
				<input name="sales" id="sales" type="Hidden" placeholder="" value=""/>
				<input name="sl" id="sl" type="Hidden" placeholder="" value=""/>
	</body>

<script src="../js/checker.js" type="text/javascript"></script>
<script src="../js/password.js" type="text/javascript"></script>
<?php //date_default_timezone_set("Asia/Manila"); echo date("h:i:s a"); ?>
</html>