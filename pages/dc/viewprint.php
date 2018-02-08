<?php 

include('../db.php');

include('header.php');

$superuser = $_GET['whosto'];

//$user = $_SESSION[$superuser];

$login=mysqli_query($link,"select * from user where user_name='$superuser'")or die(mysqli_error());

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

<script for="window" event="onload">
      // Hack to bypass the confirm alert on window close.
      window.opener = window.top;
      window.open('', '_self', '');
</script>
  <center>
  <h3>TRUCK REVIEW SCAN/TYPE TRIP TICKET BELOW</h3>
  <form form role="form" class="form-horizontal" id="trucks" method="POST">
  <input type="text" id="triporig" name="triporig" placeholder="TripTicket" style="text-align:Center;" autofocus required/>
  </form>
  
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
 
 