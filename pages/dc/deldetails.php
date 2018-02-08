<?php include('../db.php');

include('header.php'); 

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
<head>

 <script>

  $(function() {

    $( "#date" ).datepicker();

  });

  </script>

 <script type="text/javascript">

 $(document).ready(function() {

    $("#responsecontainer").ready(function() {                

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "deldata.php<?php echo '?trip='.$_GET['trip'];?>",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
});

});

var auto_refresh = setInterval(function () {
    $('#responsecontainer').load('slow', function() {
        $(this).load('deldata.php<?php echo '?trip='.$_GET['trip']; ?>', function() {
            $(this).fadeIn('slow');
        });
    });
}, 2000); // refresh every 15000 milliseconds

   // $(document).ready(function(){
     // refreshTable();
  //  });

   // function refreshTable(){
    //    $('#responsecontainer').load('dchisdata.php', function(){
     //      setTimeout(refreshTable, 5000);
     //   });
   // }

</script>

</head>

<body onload="ongetload()">

<div class="container">
	
	<?php

	$tticket=$_GET['trip'];
	$querydcdetails=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$tticket'")or die(mysqli_error());

		$rowdcdetails=mysqli_fetch_array($querydcdetails) ?>
		<div style="position:absolute;top:50px;left:30px;">
			<img src="../img/famlogo.png" alt="Familymart Logo" height="30" width="100"> 
		</div>
		<div style="position:absolute;top:50px;right:50px;">
		<label id="lblpno" name="lblpno" style="position:center;"><b>PFM TRIP TICKET</b></label>
		<label id="lblpno" name="lblpno" style="position:center;"><?php echo 'Trip ID No.:'; echo $tticket;?></label>
		</div>
		<div style="position:absolute;top:140px;left:20px;width:97%;">
		<table cellpadding="0" cellspacing="" border="0" width="80%">
		<tr>
		<td>
		<label style="position:center;"><?php echo 'Tuckers Company:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $rowdcdetails[2];?></label>
		</td>
		<td>
		<label style="position:center;"><?php echo 'Driver Name:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $rowdcdetails[3];?></label>
		</td>
		</tr>
		
		<tr>
		<td>
		<label style="position:center;"><?php echo 'Plate Number:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $rowdcdetails[5];?></label>
		</td>
		<td>
		<label style="position:center;"><?php echo 'Helpers Name:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $rowdcdetails[4];?></label>
		</td>
		
		</tr>
		</table>
		<br>
		<br>
	<table id="reftab" name="reftab" cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover" >

					<thead>

						<tr>

						<th class="list-group-item-info">Location Code</th>
						
						<th class="list-group-item-info">Store Name</th>
						
						<th class="list-group-item-info">Date</th>
						
						<th class="list-group-item-info">Time In</th>
						
						<th class="list-group-item-info">Time Out</th>
						
						<th class="list-group-item-info">Duration</th>
						
						<th class="list-group-item-info">Remarks</th>

						</tr>

					</thead>

				

					<tbody>

						<?php
			
						$query=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tticket' ORDER BY dh_id ASC")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[1]; ?></td>
						
						<td><?php echo $row[2]; ?></td>
						
						<td><?php echo $row[3]; ?></td>
						
						<td><?php echo $row[4]; ?></td>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[6];
						//$start_time = $row[4];
						//$end_time = $row[5]; 

						//$vv =  strtotime($end_time);
						//$bb = strtotime($start_time);
						//$cc=$vv-$bb;
						//echo gmdate("h:i:s", $cc);
						?></td>
						
						<td><input type=""/></a></td>
						</tr>

						<?php } ?>
					</tbody>

	</table>	
				<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<tr>
				<td colspan="4" align="right">
				<?php
				$queryin=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tticket' AND dh_sname='DC - SAN PEDRO' AND dh_timein=''")or die(mysqli_error());
				$rowin=mysqli_fetch_array($queryin);
				$queryout=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tticket' AND dh_sname='DC - SAN PEDRO' AND dh_timeout=''")or die(mysqli_error());
				$rowout=mysqli_fetch_array($queryout);
				?>
				
				<?php
				
				?>
				
				<?php
				
 
				
				
				?>
				
				<p>Total Lapsed Time:<?php 
				$start_time = $rowin[5];
				$end_time = $rowout[4];
				$v =  strtotime($end_time);
				$b = strtotime($start_time);
				$c=$v-$b;
						
				echo '&nbsp&nbsp&nbsp&nbsp&nbsp'; echo gmdate("H:i:s", $c);?></p>
				</td>
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
				
				</tr>
				</table>
				<br/>
				<br/>
				
				<div id="responsecontainer" class="View" align="center">
				<table cellpadding="0" cellspacing="0" border="0" class="table">
				<thead>

						<tr>

						<th></th>
						
						<th></th>
						
						<th></th>
						

						</tr>

					</thead>
				<tbody>

						

						<tr>
		
						<td></td>

						<td></td>
						
						<td></td>
						
						</tr>
						
				</tbody>
				</table>
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<form class="form-horizontal" method="POST">
				<table>
				<thead>

						<tr>

						<th>Type Of Expense</th>
						
						<th>Particulars</th>
						
						<th>Amount</th>
						

						</tr>

					</thead>
				<tbody>

						

						<tr>
		
						<td><select class="form-control" id="toe" name="toe[]" type="text" required>

						<option></option>
						
						<option>Toll Fee</option>
						
						<option>Parking Fee</option></select>
						
						</td>

						<td><input type="text" id="prt" name="prt[]" placeholder="" required/></td>
						
						<td><input type="text" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" id="amt" name="amt[]" placeholder=""  required/></td>
						
						</tr>
						
				</tbody>
				<table>
				<div class="input_fields_wrap">
				</div>
						<tr><td>
						<input type="button" class="add_field_button" value="+"></td></tr>
				</table>
				
				</table>

				<input type="submit" id="multi" name="multi" class="btn" Value="Save"/>
				<a class="btn">Export</a>
				<a href="tripview.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$_GET['whosto']; ?>" class="btn">Print</a>

				</form>
			
	<?php
		if(isset($_POST["multi"]) && $_POST["multi"]!="") {
		$usersCount = count($_POST["toe"]);
		for($i=0;$i<$usersCount;$i++) {
		mysqli_query($link,"INSERT INTO dcexp (ex_triptic,ex_toe,ex_prtc,ex_amt) values('" . $_GET["trip"]. "','" . $_POST["toe"][$i] . "','" . $_POST["prt"][$i] . "','" . $_POST["amt"][$i] . "')")or die(mysqli_error());

		}
	?>
	<script type="text/javascript">

					window.alert("Details Save!");
					window.location.href("Refresh:0; url=deldetails.php<?php echo '?trip='.$_GET['trip']; echo '&whosto='.$_GET['whosto']; ?>");
		
	</script>
	
	<?php
		}
	
	?>
	<script>
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<tr><td><select id="toe" name="toe[]" type="text" required><option></option><option>Toll Fee</option><option>Parking Fee</option></select></td><td><input type="text" id="prt" name="prt[]" placeholder="" required/></td><td><input type="text" id="amt" name="amt[]" placeholder=""  required/></td>></tr><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	});
	</script>