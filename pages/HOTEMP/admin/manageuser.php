<?php include('../db.php');

include('header.php');
include('../javascript.php'); 

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
						<tr><a class="btn btn-green" href="index.php">Home</a>  |  </tr>
						<tr><a class="btn btn-green" href="requestvqp.php">VQP REQUEST</a>  |  </tr>
						<tr><a class="btn btn-green" href="tagsdownload.php">TAGS REQUEST</a>  |  </tr>
						<tr><a class="btn btn-green" href="manageuser.php">MANAGE USER</a>  |  </tr>
						<tr><a class="btn btn-green" href="myaccount.php">MYACOUNT</a>  |  </tr>
						<tr><a class="btn btn-green" href="../logout.php">Logout</a></tr>
					</td>

				</thead>

			</table>

			<div class="alert alert-success"><label>Register New User</label></div>

		<form class="form-horizontal" method="post"> 

				

					<?php

					if (isset($_POST['register'])){

					$user_name=$_POST['user_name'];

					$user_password=$_POST['user_password'];

					$user_level=$_POST['user_level'];

					$store_name=$_POST['store_name'];

					$am_store=$_POST['am_store'];

					$contact_number=$_POST['contact_number'];

					$area_stores=$_POST['area_stores'];
					
					$store_code=$_POST['store_code'];

				

					mysqli_query($link,"insert into user (user_name,user_password,user_level,store_name,ams,contact_number,area_stores,acr) values('$user_name','$user_password','$user_level','$store_name','$am_store','$contact_number','$area_stores','$store_code')")or die(mysqli_error());

					

							}

					?>

					<div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail">Username</label>

					<div class="controls">

					<input name="user_name" type="text" placeholder="Username" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Password</label>

					<div class="controls">

					<input name="user_password" type="Password" placeholder="Password" required />

					</div>

					</div>
					
					
					
					<div class="control-group">

					<label class="control-label" for="inputEmail">Store Code</label>

					<div class="controls">

					<input name="store_code" type="text" maxlength="3" minlength="3" placeholder="Store Code" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">User Level</label>

					<div class="controls">

					<select name="user_level" id="user_level" type="text" onChange="findselected()" required>

						<option></option>

						<option>2</option>
						
						<option>3</option>
						
						<option>4</option>

						<option>5</option>
						
						<option>6</option>

					</select>

					</div>

					</div>



					<div class="control-group">

					<label class="control-label" for="inputEmail">Name</label>

					<div class="controls">

						<input name="store_name" id="store_name" type="text" placeholder="Name" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Sign AM</label>

					<div class="controls">

						<select id="am_store" name="am_store" type="text" >

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from user where user_level='4' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

					<?php } ?>



				</select>

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Area Assignment</label>

					<div class="controls">

						<select id="area_stores" name="area_stores" type="text">

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from area");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['Area_Name'];?></option>

					<?php } ?>



				</select>

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Contact Number</label>

					<div class="controls">

						<input name="contact_number" type="text" placeholder="Contact Number"/>

					</div>

					</div>

					</div>

					<br>

				

				<input type="submit" name="register" class="btn btn-success" value="Save">

				</form>

				

		<br/>

		<div class="alert alert-success"><label>Manager's Account</label></div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

			<thead>

				<tr>

				<th>User name</th>
				
				<th>Password</th>

				<th>User level</th>

				<th>Registered Name</th>

				<th>Edit</th>

				<th>Delete</th>

				</tr>

			</thead>

		

			<tbody>

				<?php 

				$sql = mysqli_query($link,"SELECT * FROM user where user_level='4' ");

				while($row=mysqli_fetch_array($sql)){

				?>

				<tr>

					<td><?php echo $row['user_name']; ?></td>
					
					<td><?php echo $row['user_password']; ?></td>

					<td><?php echo $row['user_level']; ?></td>

					<td><?php echo $row[4]; ?></td>

					<td><a class="btn btn-success" href="edit_user.php<?php echo '?id='.$row['user_id']; ?>">Edit</a></td>

					<td><a class="btn btn-danger" href="delete_user.php<?php echo '?id='.$row['user_id']; ?>">Delete</a></td>



				</tr>

				<?php } ?>

			</tbody>

		</table>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="alert alert-success"><label>Store's Account</label></div>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme1">

			<thead>

				<tr>

				<th>User name</th>
				
				<th>Password</th>

				<th>User level</th>

				<th>Registered Name</th>

				<th>Edit</th>

				<th>Delete</th>

				</tr>

			</thead>

		

			<tbody>

				<?php 

				$sql = mysqli_query($link,"SELECT * FROM user where user_level='5' ");

				while($row=mysqli_fetch_array($sql)){

				?>

				<tr>

					<td><?php echo $row['user_name']; ?></td>
					
					<td><?php echo $row['user_password']; ?></td>

					<td><?php echo $row['user_level']; ?></td>

					<td><?php echo $row[4]; ?></td>

					<td><a class="btn btn-success" href="edit_user.php<?php echo '?id='.$row['user_id']; ?>">Edit</a></td>

					<td><a class="btn btn-danger" href="delete_user.php<?php echo '?id='.$row['user_id']; ?>">Delete</a></td>



				</tr>

				<?php } ?>

			</tbody>

		</table>

	</center>

	</body>



</html>