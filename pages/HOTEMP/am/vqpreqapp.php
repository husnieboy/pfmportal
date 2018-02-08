<?php include('../db.php');

include('header.php'); 

include('../useram.php');
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
						<tr><a href="index.php">Home</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>
					</td>
				</thead>
			</table>
		<br/>
		<div class="alert alert-success"><label>New Employee Request List</label></div>
		<form class="form-horizontal" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">
			<thead>
				<tr>
				<th></th>
				<th>Code</th>
				<th>Employee Name</th>
				<th>Store</th>
				<th>Position</th>
				<th>CE Date</th>
				<th>Status</th>
				</tr>
			</thead>
		
			<tbody>
				<?php 
				$sql = mysqli_query($link,"SELECT * FROM vqpusers WHERE ams_store='$name' AND vqp_status='Pending'");
				$count=mysqli_num_rows($sql);
				while($row=mysqli_fetch_array($sql)){
				?>
				<tr>
					<td><input type="checkbox" name="vqp_id[]" value="<?php echo $row['vqp_id']; ?>" /></td>
					<td><?php echo $row['vqp_code']; ?></td>
					<td><?php echo $row['vqp_name']; ?></td>
					<td><?php echo $row['vqp_store']; ?></td>
					<td><?php echo $row['vqp_position']; ?></td>
					<td><?php echo $row['vqp_date']; ?></td>
					<td align="center">
					<select name="vqp_status[]" id="vqp_status" type="text">
						<option><?php echo $row['vqp_status']; ?></option>
						<option>Approved</option>
					</select>
					</td>
					<input type="Hidden" name="id[]" value="<?php echo $row['vqp_id']; ?>" />
				<?php } ?>
					</tr>
			</tbody>
		</table>
		<table>
				<tr>
				<td colspan="4" align="center"><input class="btn btn-success" type="submit" name="Submit" id="Submit" value="Update">
				<input class="btn btn-Danger" type="submit" name="vqpDel" id="vqpDel" value="Delete">
				</td>
				</tr>
				</table>
				
		</form>
	</center>
	</body>
	
<?php
if(isset($_POST["Submit"]) && $_POST["Submit"]!="") {
$usersCount = count($_POST["vqp_status"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($link,"UPDATE vqpusers SET vqp_status='" . $_POST["vqp_status"][$i] . "' WHERE vqp_id='" . $_POST["id"][$i] . "'");
}
header("Location:vqpreqapp.php");
}
?>
<?php
if(isset($_POST["vqpDel"]) && $_POST["vqpDel"]!="") {
$usersCount = count($_POST["vqp_status"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($link,"DELETE FROM vqpusers WHERE vqp_id='" . $_POST["vqp_id"][$i] . "'");
}
header("Location:vqpreqapp.php");
}
?>
</html>