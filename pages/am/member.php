<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['username'];
$login=mysqli_query($link,"select * from user where username='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];
$name = $row[4];

if ($level == 2)
	{
		header('location:../member/index.php');
	}

if ($level == '')
	{
		header('location:../index.php');
	}
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
						<tr><a href="../schedule_admin/index.php">Scheduling</a>  |  </tr>
						<tr><a href="sales.php">Sales</a>  |  </tr>
						<tr><a href="reservation.php">Reservation</a>  |  </tr>
						<tr><a href="priest.php">Priest</a>  |  </tr>
						<tr><a href="lay.php">Lay</a>  |  </tr>
						<tr><a href="choir.php">Choir</a>  |  </tr>
						<tr><a href="member.php">Member</a>  |  </tr>
						<tr><a href="myaccount.php">myAccount</a>  |  </tr>
						<tr><a href="announcement.php">Announcements</a>  |  </tr>
						<tr><a href="help.php">Help</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br>
		<div class="row-fluid">
        <div class="span12">
				
				<table class="table table-bordered">
			<div class="alert alert-success">Manage Members</div>
		</table>
				
				<form class="form-horizontal" method="POST">
				<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="run" placeholder="Username" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="text" id="inputPassword" name="rp" placeholder="Password" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">First Name</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="fn" placeholder="First Name" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Last Name</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="ln" placeholder="Last Name" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Contact No</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="cn" placeholder="Contact No" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">User Level</label>
				<div class="controls">
					<select name="ul" required>
						<option></option>
						<option value=2>User</option>
						<option value=1>Admin</option>
					</select>
				</div>
				</div>
				
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register3" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				
				<?php
				if (isset($_POST['register3'])){
				$run=$_POST['run'];
				$rp=$_POST['rp'];
				$fn =$_POST['fn'];
				$ln =$_POST['ln'];
				$cn =$_POST['cn'];
				$ul =$_POST['ul'];
				
				mysqli_query($link,"insert into user (username,password,user_level,first_name,last_name,contact_no) values('$run','$rp','$ul','$fn','$ln','$cn')")or die(mysqli_error());
				
				}
				?>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Level</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact No</th>
							<th>Delete</th>
						</tr>
					</thead>
				
					<tbody>
						<?php 
						$query=mysqli_query($link,"select * from user where user_id != $row[0]")or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['user_id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['user_level']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['contact_no']; ?></td>
						<td><a class="btn btn-danger" href="delete_member.php<?php echo '?id='.$row['user_id']; ?>">Delete</a></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>

		</div>		
		</div>	
	</div>
	</center>
	</body>

</html>