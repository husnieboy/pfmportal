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
  <h3>SCAN TRIP TICKET BELOW</h3>
  <form form role="form" class="form-horizontal" id="trucks" method="POST">
  <input type="text" id="triporig" name="triporig" placeholder="TripTicket" style="text-align:Center;" autofocus required/>
  </form>
  
  <?php 
  
  if(isset($_POST['triporig']))
  {
	  
	  $thattic=$_GET['trip'];
	  $triporig=$_POST['triporig'];
	  
	  $qry=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triporig' AND trip_status='OPEN'");
	  $rowdata=mysqli_fetch_array($qry);
	  
	  if($triporig == $thattic)
	  {
		  $datetime=date("H:i:s");
		  $dcname='DC - SAN PEDRO';
		  $dccode=9005;
		  $dateout=date("F-d-Y");
		  mysqli_query($link,"UPDATE dcdetails SET trip_status='OPEN', dcticpass='OPEN' WHERE trip_no='$thattic'")or die(mysqli_error());
		  mysqli_query($link,"UPDATE dchistory SET dh_timeout='" .$datetime. "' WHERE dh_trpno='" . $_GET["trip"]. "'")or die(mysqli_error());
		  //mysqli_query($link,"INSERT INTO dchistory (dh_lcode,dh_sname,dh_date,dh_timeout,dh_trpno) values('$dcloccode','$dclocname','$date','$dctimeout','$lbltrpno')")or die(mysqli_error());
		  ?> 
			<script type="text/javascript">
							window.alert("Ticket <?php echo $thattic; ?> Out!");
							//window.alert("Ticket no.! <?php echo $thattic; ?> is now close");
							//var popup = window.open('deldetails.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$superuser; ?>','name','height=1600,width=1900');
							//var popup = window.open('deldetails.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$superuser; ?>');
							//$(popup.document).load(function() {
							//alert('loaded');
							//window.open("deldetails.php");
							// do other things
							//});
							//var delh = window.open('delhistory.php'),
							//	delh = window.self;

							//	hWndB.onunload = function(){ delh.location.reload(); }
							
							
							window.close();
			</script>
		  
		  <?php
	  }
	  else
	  {
		  
			?>
			<script type="text/javascript">
							window.alert("Invalid/Mismatch Ticket Number!");
							window.location.href='dcticout.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$superuser; ?>';	
							
			</script>
			<?php
	  }
  }
  ?>
 