<?php include('../db.php');

include('header.php'); 
include('../usermember.php');
include('../javascript.php')	

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

						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="myaccount.php">STORE ACCOUNT</a>  |  </tr>

						<tr><a class="btn btn-green" href="storetags.php">TAG REQUEST FORM</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="trucks.php">DELIVERY DETAILS FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpcodereq.php">VQP REQUEST FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a> </tr>

					</td>

				</thead>

			</table>

		<div class="row-fluid">

        <div class="span12">

		<table class="table table-bordered">

			<div class="alert alert-success">Manage My Account</div>

		</table>
<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered"  width="80%">
<tr>
<td align="center">
		<form id="ValidField" class="form-horizontal" action="edit_save_account.php" method="post"> 

				

								<?php



					$result = mysqli_query($link,"SELECT * FROM user where user_id='$row[0]'");

					while($row = mysqli_fetch_array($result))

					  { ?>

					  <div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail">Username</label>

					<div class="controls">

					<input name="user_id" type="hidden" value="<?php echo  $row['user_id'] ?>" />

					<input name="user_name" id="user_name" pattern="^[A-z][a-zA-Z0-9]*$" maxlength="20" minlength="4" type="text" placeholder="Username" value="<?php echo $row[1];?>" readonly /><div id="status"></div>

					</div>

					</div>

					

					

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Password</label>

					<div class="controls">

						<input name="user_password" id="user_password" maxlength="4" minlength="4" type="password" placeholder="Password" required />

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

				<input name="edit_account" id="edit_account" class="btn btn-success" type="submit" value="Update" />

				</form>

				

		<br/>

		<br/>

		</div>		

		</div>		

	</div>

	</center>
</td>
</tr>
</table>
	</body>

<script src="../js/checker.js" type="text/javascript"></script>

</html>