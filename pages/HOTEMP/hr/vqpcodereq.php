<?php include('../db.php');
include('header.php');
include('../userhr.php');
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
$(function() {
    $('#vqp_nname').keyup(function() {
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
				<div class="alert alert-success"><h5>Welcome <?php echo $name ?></h5></div>

			</div>
			<table>

				<thead>

					<td>

						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpcodereq.php">VQP ENROLLMENT FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a> </tr>



					</td>



				</thead>



			</table>



			<div class="alert alert-success"><label>Enroll New User</label></div>

<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered"  width="80%">
<tr>
<td align="center">

		<form class="form-horizontal" action="vqp_check_save.php" method="post"> 

			<?php
			$query  = mysqli_query($link,'SELECT MAX(vqp_code) FROM vqpusers');
			$row=mysqli_fetch_row($query);
			$last_id =  $row[0];
			$next_id = $last_id+1;
			$random_string_length =7;
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
			$string = '';
			for ($i = 0; $i < $random_string_length; $i++) {
			$string .= $characters[rand(0, strlen($characters) - 1)];
			}
			?>



					<input name="vqp_code" id="vqp_code" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Code" value="<?php echo $next_id ?>" readonly />

					<input name="vqp_password" id="vqp_password" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Password" value="<?php echo $string; ?>" required />
					<br>
					<p style="color:black;font-size:90%"><i>FULL NAME</i></p>
				
					<input name="vqp_name" id="vqp_name" style="text-align:Center;" pattern="^[A-z][a-zA-Z\s]*$" maxlength="50" type="text" placeholder="FullName" required />
					<p style="color:red;font-size:80%"><i>surname, givenname, middlename</i></p>
					<br>
					<p style="color:black;font-size:90%"><i>NICK NAME</i></p>
				
					<input name="vqp_nname" id="vqp_nname" style="text-align:Center;" pattern="^[A-z][a-zA-Z\s]*$" minlength="4" maxlength="5" type="text" placeholder="Alias" required />
					<p style="color:red;font-size:80%"><i>4-5 Letters only</i></p>
					<br>
					
						<p style="color:black;font-size:90%"><i>SELECT STORE</i></p>
						<select id="vqp_store" name="vqp_store" type="text" required>

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from user where user_level='5' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

					<?php } ?>
					</select>
					<br>
					<br>
						<p style="color:black;font-size:90%"><i>POSITION</i></p>
						<select id="vqp_position" name="vqp_position" type="text" required >



						<option></option>

						<option>Store Officer</option>

						<option>Team Leader</option>

						<option>Cashier</option>



						</select>

					<br>
					<br>
					<p style="color:black;font-size:90%"><i>CODE EXPIRATION</i></p>
					<input name="vqp_date" id="vqp_date" pattern="^([a-zA-Z]+)-[0-9]{2}-[0-9]{4}$" maxlength="20" type="text" placeholder="EOC" 
					value="<?php $datetime = new DateTime();
					$datetime->add(new DateInterval('P7D'));
					echo $datetime->format('F-d-Y'); ?>" required readonly />
					<p style="color:red;font-size:80%"><i>Automatic Date Pick (7)Days Training</i></p>
					



					<br>
				<input name="rdate" id="rdate" maxlength="20" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />
				<input name="vqp_status" id="vqp_status" type="hidden" value="Pending" placeholder="Status" required />		

				<div id="status"></div><br>

				<input name="vqpregister" id="vqpregister" class="btn btn-success" type="submit"  value="Enroll" />

				</form>



				



		<br/>



		<div class="alert alert-success2"><label></label></div>



		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">



			<thead>



				<tr>



				<th>VQP POS Code</th>



				<th>Employee Name</th>

				

				<th>Position</th>

				

				<th>CE</th>

				
				<th>Request Status</th>
				
				
				<th></th>
				



				</tr>



			</thead>



		



			<tbody>
				<?php $rDate=date("F-d-Y");

					$datetime = new DateTime();
					$datetime->add(new DateInterval('P7D'));
				?>
				<?php $date7d =$datetime->format('F-d-Y'); ?>


				<?php 



				$sql = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_date='$date7d' AND rDate='$rDate'");



				while($row=mysqli_fetch_array($sql)){



				?>



				<tr>



					<td><?php echo $row['vqp_code']; ?></td>

					

					<td><?php echo $row['vqp_name']; ?></td>

					

					<td><?php echo $row['vqp_position']; ?></td>

					

					<td><?php echo $row['vqp_date']; ?></td>

					

					<td><?php echo $row['vqp_status']; ?></td>
					
					
					<td><a class="btn btn-success" href="../member/vqptrans.php<?php echo '?transfer='.$row['vqp_id']; ?>">Transfer Code</a></td>



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