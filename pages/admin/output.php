<?php include('../db.php');
include('header.php'); 
include('../useradmin.php');
?>
	<body>
	<center>
		</br>
		</br>
			<div id="container">
			<div id="header">
				<div class="alert alert-success"><label>Welcome Admin</label></div>
			</div>
			<table>
				<thead>
					<td>
						<tr><a href="index.php">Home</a>  |  </tr>
						<tr><a href="output.php">Output</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br>
		<div class="row-fluid">
        <div class="span12">
		<table class="table table-bordered">
				<div class="alert alert-success">Truck Details Report</div>
			</table>
			<div style="float:center;">


			<form class="form-horizontal" method="POST">
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Driver's Code</label>
				<div class="controls">
				<input type="text" id="driver_code" name="driver_code" placeholder="Driver's Code" required>
				</div>
				</div>
				
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Store</label required>
				<div class="controls">
				<input type="text" id="store" name="store" placeholder="Store" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Time</label>
				<div class="controls">
				<input type="text" id="time" name="time" placeholder="Time" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Date</label>
				<div class="controls">
				<input type="text" id="date" name="date" placeholder="Date" required>
				</div>
				</div>
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				<?php
				if (isset($_POST['register'])){
				$driver_code=$_POST['driver_code'];
				$store=$_POST['store'];
				$time=$_POST['time'];
				$date=$_POST['date'];
				
				mysqli_query($link,"insert into pfmdcdata (Driver_Code,Store,Time,Date) values('$driver_code','$store','$time','$date')")or die(mysql_error());
				
				}
				?>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
						<th>Driver's Code</th>
						<th>Store</th>
						<th>Time</th>
						<th>Date</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
					</thead>
				
					<tbody>
						<?php 
						$query=mysqli_query($link,"select pfmdcdata.ID,pfmdcdata.Driver_Code,pfmdcdata.Store,pfmdcdata.Time,pfmdcdata.Date FROM pfmdcdata")or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><a class="btn btn-success" href="edit_output.php<?php echo '?id='.$row['ID']; ?>">Edit</a></td>
						<td><a class="btn btn-danger" href="delete_output.php<?php echo '?id='.$row['ID']; ?>">Delete</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				
				
	</div>
	</center>
	</body>
</html>