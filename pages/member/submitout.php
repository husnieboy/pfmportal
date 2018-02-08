<?php include('../db.php');

include('header.php'); 
include('../usermember.php');
include('../javascript.php');

?>

<?php 
				$datetoday=date("F-d-Y");
				//echo date("F-d-Y h:i:s A");
?>
<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
?>


<?php
				 
				$trp = $_GET['driver_code'];
				$in= mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$name' AND dh_trpno='$trp'"); 
				//AND dh_date='$datetoday' OR dh_date='$yesterday'");
				$datafetch = mysqli_fetch_array($in);
				$start_time = $datafetch[4];
				$end_time = date("H:i:s");
				$vv =  strtotime($end_time);
				$bb = strtotime($start_time);
				$cc=$vv-$bb;
				
				$timedut= gmdate("H:i:s", $cc);
				$store=$_GET['store'];
				$timeout=$_GET['tout'];
				$date=$_GET['date'];
				$triptic=$_GET['driver_code'];
				$dc_ams=$_GET['dc_ams'];
				$nodb=$_GET['nodb'];
				$norb=$_GET['norb'];
				$persin=$_GET['persin'];
				$rema=$_GET['rema'];
				
				
					mysqli_query($link,"UPDATE dchistory SET dh_timeout='$timeout', dh_checkout='D', dh_dut='$timedut', dh_sndb='$nodb', dh_snrb='$norb', sperout='".$persin."', dh_rem='".$rema."' WHERE dh_trpno='$triptic' AND dh_sname='$store' AND dh_timeout=''")or die(mysqli_error());
					//mysqli_query($link,"UPDATE dcdetails SET trip_status='CLOSE' WHERE trip_no='$triptic'")or die(mysqli_error());
					mysqli_query($link,"UPDATE dcstore SET dcs_s_trip_status='CLOSE' WHERE dcs_tripno='$triptic'")or die(mysqli_error());
				
?>
<script type="text/javascript">
							
					window.alert("Time OUT And Store Ticket Close!");
					window.location.href='trucks.php';
					
</script>