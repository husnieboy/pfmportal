<?php include('db.php');


session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

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

 <script>

  $(function() {

    $( "#date" ).datepicker();

  });

  </script>

<body onload="ongetload()">

	

		</br>

		</br>
<?php 
include('menu.php');

?>
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>			
	<div id="container" >

			<div id="header">

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

			</div>

			

			<table>

			</table>
	

				<div class="alert alert-success"></div>

			

	
		
		<?php
					$random_string_length =3;
					$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$string = '';
					for ($i = 0; $i < $random_string_length; $i++) {
					$string .= $characters[rand(0, strlen($characters) - 1)];
					}
					
					
		?>
		<form class="form-horizontal" method="POST">
		<table class="table-bordered" align="">
		<tr><th><div class="alert alert-success"></div></th></tr>
		<tr><td>
		<table class="table-hover" align="" >
				<tr><td>
				<label class="control-label">Trip ID Number:</label>
				<?php
				$query  = mysqli_query($link,'SELECT MAX(dd_id) FROM dcdetails');
				$row=mysqli_fetch_row($query);
				$last_id =  $row[0];
				$next = strlen($last_id);
				if(strlen($last_id) == 4){
					
					$strlen = 'TRP' . $last_id . $string ;
				}
				if(strlen($last_id) == 3){
					
					$strlen = 'TRP0' . $last_id . $string ;
				}
				if(strlen($last_id) == 2){
					$strlen =  'TRP00' . $last_id . $string;
				}
				if(strlen($last_id) == 1){
					$strlen = "TRP000" . $last_id . $string;
				}
				
				//$check= mysqli_query($link,"SELECT * FROM dcdetails WHERE dd_id='$string'");
				//$data = mysqli_fetch_array($check, MYSQLI_NUM);
				//if($data[0] < 1) {
				//$random_string_length =2;
				//$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				//$string2 = '';
				//for ($i = 0; $i < $random_string_length; $i++) {
				//$string2 .= $characters[rand(0, strlen($characters) - 1)];
				//}
				?>
				
				<?php
					//} 
					//else
					//{
					//$random_string_length =2;
					//$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					//$string3 = '';
					//for ($i = 0; $i < $random_string_length; $i++) {
					//$string3 .= $characters[rand(0, strlen($characters) - 1)];
					//}
					?>
					
					<?php
					//}
				
				?>
				<label id="lblpno" name="lblpno"><?php echo $strlen ?></label>
				</td></tr>
				<tr><td>
				<label class="control-label">Trucker's Company:</label>
				<select id="trc" class="form-control" name="trc" required>
				<option>
				</option>
				<?php
				$qrpl=mysqli_query($link,"SELECT * FROM dcplate Group By pl_cmp") or die(mysqli_error());
				while($qrplrow=mysqli_fetch_array($qrpl))
				{
				?>
				<option><?php echo $qrplrow[3]; ?></option>
				<?php
				}
				?>
				</td></tr>
				<tr><td>
				<label class="control-label">Plate Number:</label>
				<input type="text" class="form-control" pattern="^[A-z][a-zA-Z0-9\s]*$" id="pno" name="pno" placeholder="Plate Number" required/>
				</td><td><div id="status"></div></td></tr>
				<tr><td>
				<label class="control-label">Driver's Name:</label>
				<input type="text" class="form-control" id="dnl" name="dnl" placeholder="Last Name" onkeyup="drname()" required/>
				<input type="text" class="form-control" id="dnf" name="dnf" placeholder="First Name" onkeyup="drname()" required/>
				</td></tr>
				<tr><td>
				<label class="control-label">Helper's Name:</label><label><i>(if applicable)</i></label>
				<input type="text" class="form-control" id="hnl" name="hnl" onkeyup="hlname()" placeholder="Last Name" />
				<input type="text" class="form-control" id="hnf" name="hnf" onkeyup="hlname()" placeholder="First Name" />
				</td><td>
				
				</td></tr>
				<tr><td>
				<tr><td>
				<label class="control-label">Select Store's:</label>
				<select id="sttrip" class="form-control" name="sttrip" required>
				<option>
				</option>
				<?php
				$qrplu=mysqli_query($link,"SELECT * FROM user WHERE user_level='5' Group By store_name") or die(mysqli_error());
				while($qrplrowu=mysqli_fetch_array($qrplu))
				{
				?>
				<option><?php echo $qrplrowu[4]; ?></option>
				<?php
				}
				?>
				</select>
				</td></tr>
				<tr><td><label class="control-label">Store Trip List:</label>
				<div id="stripstatus"></div>
				</td></tr>
				
				<input type="hidden" class="form-control" id="ndeb" name="ndeb" placeholder="No of Dispatched Bags"/>
				<input type="hidden" id="lbltrpno" name="lbltrpno" placeholder=""/>
				<input type="hidden" id="fname" name="fname" placeholder=""/>
				<input type="hidden" id="hfname" name="hfname" placeholder=""/>
				<tr><td align="right">
				<button type="reset" name="reset" id="register" class="btn btn-info">Reset</button>
				<button type="submit" name="dcreg" id="dcreg" class="btn btn-info">Save</button>
				</td></tr>
			</table>
			</td></tr>
			</form>
</div>			
<script>
$(function() {

    $( "#date" ).datepicker();

  });

  </script>
  <script>
$(function() {
    $('#dnl').change(function() {
       this.value = this.value.toUpperCase();
  });
});
$(function() {
    $('#dnf').change(function() {
		this.value = this.value.toUpperCase();
   });
});

$(function() {
    $('#hnf').change(function() {
       this.value = this.value.toUpperCase();
  });
});

$(function() {
    $('#hnl').change(function() {
       this.value = this.value.toUpperCase();
  });
});
$(function() {
  $('#pno').keyup(function() {
	this.value = this.value.toUpperCase();
  });
  });
$(function() {
    $('#trc').keyup(function() {
		this.value = this.value.toUpperCase();
   });
});		
function drname()
{
   document.getElementById('fname').value = 
        document.getElementById('dnl').value + ' ' + 
        document.getElementById('dnf').value;
		document.getElementById('lbltrpno').value =
		document.getElementById('lblpno').textContent;
}
function ongetload()
{
		document.getElementById('lbltrpno').value =
		document.getElementById('lblpno').textContent;
}
function hlname()
{
   document.getElementById('hfname').value = 
        document.getElementById('hnl').value + ' ' + 
        document.getElementById('hnf').value;
}
</script>
<!--<script src="../js/checker.js" type="text/javascript"></script>-->
<?php
if(isset($_POST['dcreg']))
			{	
				$date=date("F-d-Y");
				$trccamp=$_POST['trc'];
				$lbltrpno=$_POST['lbltrpno'];
				$fname=$_POST['fname'];
				$hfname=$_POST['hfname'];
				$plno=$_POST['pno'];
				$dcloccode=9005;
				$dclocname='DC - SAN PEDRO';
				$dctimeout=date("H:i:s");
				$status='OPEN';
				$dh_dndeb=$_POST['ndeb'];
				$nbox=$_POST['nbox'];
				$sid=$_POST['sid'];
				$stcode=$_POST['stcode'];
			
			$check= mysqli_query($link,"SELECT * FROM dcplate WHERE plateno='$plno'");
			$data = mysqli_fetch_array($check, MYSQLI_NUM);
			if($data[0] >= 1) {
			
			mysqli_query($link,"INSERT INTO dcdetails (trip_no,trk_camp,pl_no,drv_name,hlp_name,trip_status,trip_dateopen) values('$lbltrpno','$trccamp','$plno','$fname','$hfname','$status','$date')")or die(mysqli_error());
			mysqli_query($link,"INSERT INTO dchistory (dh_lcode,dh_sname,dh_date,dh_trpno,dh_dndeb) values('$dcloccode','$dclocname','$date','$lbltrpno','$dh_dndeb')")or die(mysqli_error());
			
			for($in=0; $in < count($sid); $in++){
				$nbox_in = $nbox[$in];
				$sid_in = $sid[$in];
				$stcode_in = $stcode[$in];
				//echo $sid[$in]; echo $nbox[$in];
			mysqli_query($link,"UPDATE dcstoretrip SET trpstatus='S', nobox='".$nbox[$in]."' WHERE trip_id='".$sid[$in]."'")or die(mysqli_error("dcstatus"));
			}
			?>
				<script type="text/javascript">

					window.alert("Trip Details Successfully Saved!");
					window.location.href='index.php';//<?php echo '?tripno='.$lbltrpno; echo '&fname='.$fname; echo '&dateprint='.$date; echo '&plno='.$plno; echo '&trancamp='.$trccamp; echo '&helpname='.$hfname; ?>';

				</script>
			<?php

			}
			if($data[0] < 1)
			{
	
				
			?>

				<script type="text/javascript">

					window.alert("Please enter accredited Plate Number!");
					window.location.href='accre.php<?php echo '?pno='.$plno;?>"';

				</script>

			<?php
			}
			}
			?>
</div>
</div>
</div>

<?php include('modals.php'); ?>