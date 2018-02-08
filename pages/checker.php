

<?php include('db.php');

include('header.php');

session_start();



$user = $_SESSION['user_name'];



$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());



$row=mysqli_fetch_row($login);



$_SESSION['user_id'] = $row[0];



$name = $row[4];

$level = $row[3];



if(isset($_POST['user_name']))

{

	$user_name = mysqli_real_escape_string($link,$_POST['user_name']);

	

	if(!empty($user_name))

	{

		$check = mysqli_query($link,"SELECT * FROM user WHERE user_name='$user_name'");

		$user_name_result = mysqli_num_rows($check);

		

		if($user_name_result==0)

		{

			echo "Username Available";

		}

		else if($user_name_result==1)

		{

			echo "Username Not Available";

		}

	}

}
?>

<?php

if(isset($_POST['date']))

{

	$datetime = mysqli_real_escape_string($link,$_POST['date']);

	if(!empty($datetime))

	{

		$check = mysqli_query($link,"SELECT * FROM pfmsales WHERE Store_Name='$name' And TransDate='$datetime'");

		$recieved = mysqli_num_rows($check);

		

		$row = mysqli_fetch_row($check);

		

		if($recieved==0)

		{

			echo "";

			?>

			<script>

			document.getElementById("register").disabled = false;			

			</script>

			<?php

		}

		else if($recieved==1)

		{

			echo "Transaction Date Already Exist! `$row[6]`";

			

			?>

			<script>

			document.getElementById("register").disabled = true;

			</script>

		

			<?php

			

		}

	}

}

?>

<?php

if(isset($_POST['ticket_date']))

{

	$ticket_date = mysqli_real_escape_string($link,$_POST['ticket_date']);

	if(!empty($ticket_date))

	{

		$check = mysqli_query($link,"SELECT * FROM stores WHERE Store_Name='$name' And Date='$ticket_date'");

		$recieved = mysqli_num_rows($check);

		

		$row = mysqli_fetch_row($check);

		

		if($recieved==0)

		{

			echo "";

			?>

			<script>			

			</script>

			<?php

		}

		else if($recieved==1)

		{

			echo "The Store Already Sent Request for Tags! Dated `$row[4]`";

			

			?>

			<script>

			document.getElementById("Process").disabled= true;

			document.getElementById("bar_code").disabled = true;
			
			document.getElementById("delete").disabled = true;

			</script>

		

			<?php

			

		}

	}

}

?>



<?php

if(isset($_POST['SM']))

{

	$datetime = date("F-d-Y");

	$SM = mysqli_real_escape_string($link,$_POST['SM']);

	if(!empty($SM))

	{

		$check = mysqli_query($link,"SELECT * FROM stores WHERE Store_name='$SM' And Date='$datetime'");

		$recieved = mysqli_num_rows($check);

		

		$rowupdate = mysqli_fetch_array($check);

		

		if($recieved==0)

		{

			echo "Select Store";

			?>

			

			<?php

		}

		else if($recieved==1)

		{

			echo "";

			

			?>

			

			<form class="form-horizontal" action="../export/tags/1/exporttags.php" method="POST">

	

			<input name="Store_master" id="Store_master" type="text" value="<?php echo $rowupdate['Store_Name']; ?>" ReadOnly /></br>

			<select name="ticket_status" id="ticket_status" type="text" required>
			
						<option>PRINTED</option>

						<option>VOIDED NO QTY</option>

			</select></br>

			<input type="text" value="<?php echo $rowupdate['Store_Ticket']; ?>" ReadOnly /></br>

			<input type="text" value="<?php echo $rowupdate['Ticket_QTY']; ?>" ReadOnly /></br>

			<input name="user_id" id="user_id" type="Hidden" value="<?php echo $rowupdate['store_ID'] ?>" />
			
			<select name="color_status" id="color_status" type="text" required>
			<option></option>
				<?php
						$query=mysqli_query($link,"SELECT * FROM pfmtagsreq where Store_Tags_Name='$SM' And Date_Time='$datetime' Group By stclr ");

						while($row=mysqli_fetch_array($query))

				{ ?>
						<option><?php echo $row['stclr'];?></option>
				<?php } ?>
			</select><br><br>
			
			<button type="submit" name="ch" id="ch" class="btn btn-info" >Masterfile</button>



			</form>

		

			<?php

			

		}

	}

}

?>
<?php
if(isset($_POST['pno']))
			{	
				$plno=$_POST['pno'];
			
			$check= mysqli_query($link,"SELECT * FROM dcplate WHERE plateno='$plno'");
			$data = mysqli_fetch_array($check, MYSQLI_NUM);
			if($data[0] >= 1) {
			
			?>
				<script type="text/javascript">

					document.getElementById("dcreg").disabled = false;

				</script>
			<?php
			echo '<img src="../img/check.ico" alt="Familymart Logo" height="20" width="20">';
			}
			if($data[0] < 1)
			{
	
			echo '<img src="../img/wrong.png" alt="Familymart Logo" height="20" width="20">';
			?>
			
				<script type="text/javascript">

					document.getElementById("dcreg").disabled = true;

				</script>

			<?php
			}
			}
			?>
			
<?php 
  
  if(isset($_POST['triporig']))
  {
	  
	  $thattic='9005';
	  $triporig=$_POST['triporig'];
	  
	  $qry=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triporig' AND trip_status='OPEN'");
	  $rowdata=mysqli_fetch_array($qry);
	  
	  if($triporig == $thattic)
	  {
		  $datetime=date("H:i:s");
		  $dcname='DC - SAN PEDRO';
		  $dccode=9005;
		  $dateout=date("F-d-Y");
		  mysqli_query($link,"UPDATE dcdetails SET trip_status='CLOSE' WHERE trip_no='$thattic'")or die(mysqli_error());
		  mysqli_query($link,"INSERT INTO dchistory (dh_trpno,dh_timein,dh_lcode,dh_sname,dh_date) values('" .$thattic. "','" .$datetime. "','" .$dccode. "','" .$dcname. "','" .$dateout. "')")or die(mysqli_error());
		  ?> 
			<script type="text/javascript">
							window.alert("Ticket no.! <?php echo $thattic; ?> is now close");
							var popup = window.open('tripview.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$superuser; ?>','name','height=1600,width=1900');
							//var popup = window.open('deldetails.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$superuser; ?>');
							$(popup.document).load(function() {
							alert('loaded');
							//window.open("deldetails.php");
							// do other things
							});
							
							window.close();
			</script>
		  
		  <?php
	  }
	  else
	  {
		  
			?>
			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered"  id="table1">

					<thead>

						<tr>
						
						<th>Plate Number</th>
						
						<th>Date</th>
						
						<th>Trip Ticket ID</th>
						
						<th>Scan Ticket</th>

						</tr>

					</thead>

				

					<tbody>

						<?php

						$query=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triporig' ORDER BY trip_dateopen ASC")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						$tp=$row[1];
						?>

						<tr>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[7]; ?></td>
						
						<td><?php echo $row[1]; ?></td>
						
						<td ><a class="btn btn-success" href="tripview.php<?php echo '?trip='.$row[1]; echo '&fname='; echo '&dateprint='; echo '&plno='; echo '&trancamp='; echo '&helpname='; 
						
						$querytake=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$tp' ORDER BY trip_dateopen ASC")or die(mysqli_error());
						$rowtake=mysqli_fetch_array($querytake)
						?>" onclick="javascript:void window.open('tripview.php<?php echo '?trip='.$row[1]; echo '&whosto=dc'; echo '&fname='.$rowtake[3]; echo '&dateprint='; echo '&plno='.$rowtake[5]; echo '&trancamp='.$rowtake[2]; echo '&helpname='.$rowtake[4]; ?>','1468492012883','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">Print</a></td>
						
						</tr>

						<?php } ?>

					</tbody>

				</table>
				</td>
				</tr>
				</table>
			<?php
	  }
  }
  ?>  
  
  <?php
  if(isset($_POST['ffdate'])){  
						$fdate = $_POST['ffdate'];
						$ffdate = date('ymd', strtotime($fdate));
						$ldate = $_POST['lldate'];
						$lldate = date('ymd', strtotime($ldate));
						
						echo $ffdate; echo $lldate;
						?>
							<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"  id="datatable1">

									<thead>

										<tr>
										
										<th>Date</th>
										
										<th>Trip Ticket ID</th>
										
										<th>Company Name</th>
										
										<th>Driver Name</th>
										
										<th>Plate #</th>
										
										<?php if($level=="2"){ ?><th>Scan Ticket</th><?php }else{} ?>

										</tr>

									</thead>

								

									<tbody>

										<?php

										$query=mysqli_query($link,"SELECT * FROM dcdetails as D2 LEFT JOIN dcrectbl as D3 on(D2.trip_no=D3.tp) WHERE D3.dt BETWEEN '$ffdate' AND '$lldate' AND (DATEDIFF(DATE_ADD(NOW(), INTERVAL 48 HOUR),dctimestamp) >= 2  OR DATEDIFF(DATE_ADD(NOW(), INTERVAL 48 HOUR),dctimestamp) <= 2) ORDER BY dd_id DESC")or die(mysqli_error());

										while($row=mysqli_fetch_array($query)){
										$tp=$row[1];
										?>

										<tr>
										
										<td><?php echo $row[7]; ?></td>
										
										<td><?php echo $row[1]; ?></td>

										<td><?php echo $row[2]; ?></td>
										
										<td><?php echo $row[3]; ?></td>
										
										<td><?php echo $row[5]; ?></td>
										<?php if($level=="2"){?>
										<td ><?php $querytic=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='DC - SAN PEDRO' AND dh_trpno='$tp'")or die(mysqli_error());
										
										$rowtic=mysqli_fetch_array($querytic, MYSQLI_NUM);
										if($rowtic[0] > 1){
										if($row[9]==''){?>
										<a class="btn btn-danger" href="dcticout.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>" onclick="javascript:void window.open('dcticout.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>','1468492012883','width=700,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">Time Out</a>
										<?php }
										
										if($rowtic[0] < 1){
										
										?>
										<?php }}else{}?>
										<a class="btn btn-success" href="tripticket.php<?php echo '?tripno='.$row[1]; echo '&fname='; echo '&dateprint='; echo '&plno='; echo '&trancamp='; echo '&helpname='; 
										
										$querytake=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$tp' ORDER BY trip_dateopen ASC")or die(mysqli_error());
										$rowtake=mysqli_fetch_array($querytake);
										?>" onclick="javascript:void window.open('tripview.php<?php echo '?trip='.$row[1]; echo '&fname='.$rowtake[3]; echo '&dateprint='; echo '&plno='.$rowtake[5]; echo '&trancamp='.$rowtake[2]; echo '&helpname='.$rowtake[4]; ?>','1468492012883','width=1000,height=700,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=150,top=120');return false;">View</a>
										<?php if($row[9]=='OPEN'){?>
										<a class="btn btn-warning" href="dcticclose.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>" onclick="javascript:void window.open('dcticclose.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>','1468492012883','width=700,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">Time In</a></td>
										<?php }else{}?>
										</tr>

										<?php }else{}} ?>

									</tbody>

								</table>
								</div>
								<!-- DataTables JavaScript -->
								<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
								<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
								<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
								<script>
								$(document).ready(function() {
									$('#datatable1').DataTable({
										responsive: true
									});
								});
								</script>
  
  <?php
	  
  }else{}

  ?>
