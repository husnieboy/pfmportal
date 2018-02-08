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
						<tr><a class="btn btn-green" href="index.php">Home</a>  |  </tr>
						<tr><a class="btn btn-green" href="requestvqp.php">VQP REQUEST</a>  |  </tr>
						<tr><a class="btn btn-green" href="tagsdownload.php">TAGS REQUEST</a>  |  </tr>
						<tr><a class="btn btn-green" href="manageuser.php">MANAGE USER</a>  |  </tr>
						<tr><a class="btn btn-green" href="myaccount.php">MYACOUNT</a>  |  </tr>
						<tr><a class="btn btn-green" href="../logout.php">Logout</a></tr>
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
					<input name="user_name" id="user_name" type="text" value="<?php echo $row['user_name'] ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail">Password</label>
					<div class="controls">
						<input name="user_password" id="user_password" type="password" value="<?php echo $row['user_password'] ?>" />
					</div>
					</div>

						<div class="control-group">
					<label class="control-label" for="inputEmail">Full Name</label>
					<div class="controls">
						<input name="store_name" id="store_name" type="text" value="<?php echo $row['store_name'] ?>" />
					</div>
					</div>
					
							<div class="control-group">
					<label class="control-label" for="inputEmail">Contact Number</label>
					<div class="controls">
						<input name="contact_no" type="text" value="<?php echo $row['contact_number'] ?>" />
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