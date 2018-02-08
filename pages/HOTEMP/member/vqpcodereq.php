<?php include('../db.php');
include('header.php');
include('../usermember.php');
include('../javascript.php'); 
?>
<head>
<link rel="stylesheet" href="../js/jquery-ui.css">
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script>
$(function() {
    $('#vqp_name').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
</head>
	<body>
	<center>
	</br>
			<div id="container">
			<div id="header">
				<div class="alert alert-success"><h5>Request POS/VQP Code for the Store <?php echo $name ?></h5></div>

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



			<div class="alert alert-success"><label>Register New User</label></div>

<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered"  width="80%">
<tr>
<td align="center">

		<form class="form-horizontal" action="" method="post"> 



						<p style="color:BLUE;font-size:90%"><i>SELECT YOUR NAME HERE</i></p>
						<select id="vqp_name_select" name="vqp_name_select" type="text" >

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from vqpusers where vqp_store='' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['vqp_name'];?></option>

					<?php } ?>



				</select>

					<div id="status"></div><br>

				</form>



				



		<br/>



		<div class="alert alert-success2"><label>My Team Account</label></div>



		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">



			<thead>



				<tr>



				<th>VQP POS Code</th>



				<th>Employee Name</th>

				

				<th>Position</th>

				

				<th>CE</th>

				
				<th>Request Status</th>
				
				
				<th></th>
				
				
				<th></th>



				</tr>



			</thead>



		



			<tbody>



				<?php 



				$sql = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_store='$name'");



				while($row=mysqli_fetch_array($sql)){



				?>



				<tr>



					<td><?php echo $row['vqp_code']; ?></td>

					

					<td><?php echo $row['vqp_name']; ?></td>

					

					<td><?php echo $row['vqp_position']; ?></td>

					

					<td><?php echo $row['vqp_date']; ?></td>

					

					<td><?php echo $row['vqp_status']; ?></td>
					
					
					<td><a class="btn btn-success" href="../member/vqptrans.php<?php echo '?transfer='.$row['vqp_id']; ?>">Transfer Code</a></td>
					<td><a class="btn btn-success" href="../member/Under_Construction.gif">Change Password</a></td>


				</tr>



				<?php } ?>



			</tbody>



		</table>

<tr>
<td>
</table>
	</center>
		</div>


	</body>
<script src="../js/checker.js" type="text/javascript"></script>

<script>//$(function() {
		//var chars = "0123456789"; var string_length = 4; var vqp_codesynced = ''; for (var i=0; i<string_length; i++) { var rnum = Math.floor(Math.random() * chars.length); vqp_codesynced += chars.substring(rnum,rnum+1); } document.getElementById('vqp_code').value = vqp_codesynced;});</script>
</html>