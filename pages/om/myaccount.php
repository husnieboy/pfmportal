<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['user_name'];
$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];
$name = $row[4];

if ($level == 1)
	{
		header('location:../admin/index.php');
	}
if ($level == 2)
	{
		header('location:../dc/index.php');
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
				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>
			</div>
			<table>
				<thead>
					<td>
						<tr><a href="index.php">Home</a>  |  </tr>

						<tr><a href="sales.php">Sales Details Report</a>  |  </tr>

						<tr><a href="manageuser.php">Manage Users</a>  |  </tr>
						
						<tr><a href="myaccount.php">My Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a>  |  </tr>
						
					</td>
				</thead>
			</table>
			
			<br>
		<div class="row-fluid">
        <div class="span12">
		<table class="table table-bordered">
			<div class="alert alert-success">Manage My Account</div>
		</table>
		<form class="form-horizontal" action="edit_save_account.php" method="post"> 
				
								<?php

					$result = mysqli_query($link,"SELECT * FROM user where user_id='$row[0]'");
					while($row = mysqli_fetch_array($result))
					  { ?>
					  <div class="thumbnail">
					<div class="control-group">
					<label class="control-label" for="inputEmail">Username</label>
					<div class="controls">
					<input name="user_id" type="hidden" value="<?php echo  $row['user_id'] ?>" />
					<input name="user_name" type="text" value="<?php echo $row['user_name'] ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail">Password</label>
					<div class="controls">
						<input name="user_password" type="password" value="<?php echo $row['user_password'] ?>" />
					</div>
					</div>

						<div class="control-group">
					<label class="control-label" for="inputEmail">StoreName</label>
					<div class="controls">
						<input name="store_name" type="text" value="<?php echo $row['store_name'] ?>" readonly />
					</div>
					</div>
					
							<div class="control-group">
					<label class="control-label" for="inputEmail">Contact Number</label>
					<div class="controls">
						<input name="contact_number" type="text" value="<?php echo $row['contact_number'] ?>" readonly />
					</div>
					</div>
					
					</div>

					<br>
					

					
					  
					  <?php 
					  }

				?>
				<input name="edit_account" class="btn btn-success" type="submit" value="Update">
				</form>
				
		<br/>
		<br/>
		</div>		
		</div>		
	</div>
	</center>
	</body>

</html>