<?php include('../db.php');

include('header.php'); 

include('../useradmin.php');
?>

<head>

</head>

	<body>



	<center>

	

	</br>

			<div id="container">

			<div id="header">

				<div class="alert alert-success"><h1>Manage User</h1></div>

			</div>

			<table>

				<thead>

					<td>

						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpusersreport.php">VQP USERS</a>  |  </tr>

						<tr><a class="btn btn-green" href="transvqp.php">TRANSFER REQUEST</a>  |  </tr>

						<tr><a class="btn btn-green" href="reqdelvqp.php">DELETE REQUEST</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a></tr>

					</td>

				</thead>

			</table>

		<br/>

		<div class="alert alert-success"><label>Employee Request List</label></div>

		<form class="form-horizontal" method="POST">

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

			<thead>

				<tr>

				<th>Code</th>

				<th>Password</th>

				<th>Employee Name</th>

				<th>EOC Date</th>

				<th>Position</th>

				<th>Store</th>

				<th>Status</th>
				
				<th>Request Date</th>

				</tr>

			</thead>

		

			<tbody>

				<?php 

				$sql = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_status='Pending'");

				$count=mysqli_num_rows($sql);

				while($row=mysqli_fetch_array($sql)){

				?>

				<tr>

					<td><?php echo $row['vqp_code']; ?></td>

					<td><?php echo $row['vqp_password']; ?></td>

					<td><?php echo $row['vqp_name']; ?></td>

					<td><?php echo $row['vqp_date']; ?></td>

					<td><?php echo $row['vqp_position']; ?></td>

					<td><?php echo $row['vqp_store']; ?></td>

					<td align="center">

					<select name="vqp_status[]" id="vqp_status" type="text">

						<option><?php echo $row['vqp_status']; ?></option>

						<option>Activated</option>
						<option>RESERVED</option>

					</select>

					</td>
					<td><?php echo $row['rDate']; ?></td>
					<input type="Hidden" name="adate[]" value="<?php echo date('F-d-Y'); ?>"/>
					<input type="Hidden" name="id[]" value="<?php echo $row['vqp_id']; ?>" />

				<?php } ?>

					</tr>

			</tbody>

		</table>

		<table>

				<tr>

				<td colspan="4" align="center"><input class="btn btn-success" type="submit" name="Submit" id="Submit" value="Update"></td>

				</tr>

				</table>

				

		</form>

	</center>

	</body>

	

<?php

if(isset($_POST["Submit"]) && $_POST["Submit"]!="") {

$usersCount = count($_POST["vqp_status"]);

for($i=0;$i<$usersCount;$i++) {

mysqli_query($link,"UPDATE vqpusers SET vqp_status='" . $_POST["vqp_status"][$i] . "', aDate='" . $_POST["adate"][$i] . "' WHERE vqp_id='" . $_POST["id"][$i] . "'");

}

header("Location:requestvqp.php");

}

?>

</html>