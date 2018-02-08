<?php include('../db.php');

include('header.php'); 

include('../usermember.php');

include('../javascript.php');	

?>

<head>

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

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

			<div class="alert alert-success">Transfer Form</div>

		</table>

				<?php

				$vqp_id = $_GET['transfer'];

				?>

		<form id="ValidField" class="form-horizontal" action="vqpupdate.php<?php echo '?transfer='.$vqp_id ?>" method="post"> 

				

								<?php

					$result = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_id='$vqp_id'");

					while($row = mysqli_fetch_array($result))

						

					  { ?>

				<div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail">Code</label>

					<div class="controls">

					<input name="user_id" type="hidden" value="<?php echo  $row['vqp_id'] ?>" />

					<input name="vqp_codetr" id="vqp_codetr" pattern="^[A-z][a-zA-Z0-9]*$" type="text" placeholder="Code" value="<?php echo $row['vqp_code']; ?>" readonly/>

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Store Name</label>

					<div class="controls">

						<input name="store_name" type="text" value="<?php echo $row['vqp_store'] ?>" readonly />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Employee Name</label>

					<div class="controls">

						<input name="vqp_nametr" id="vqp_nametr" type="text" value="<?php echo $row['vqp_name'] ?>" readonly />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail">Position</label>

					<div class="controls">

						<select id="vqp_position" name="vqp_position" type="text" required >

						<option></option>

						<option>Store Officer</option>

						<option>Team Leader</option>

						<option>Cashier</option>

						</select>

					</div>

					</div>
			
					
					<div class="control-group">

					<label class="control-label" for="inputEmail">Transfer Store</label>

					<div class="controls">

						<select name="vqp_trans_store" id="vqp_trans_store" type="text" required >

						<option></option>
						
						<?php 

						$query=mysqli_query($link,"select * from user where user_level='5' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

						<?php } ?>
					
						</select>

					</div>

					</div>

					


					<div class="controls">

						<input name="vqp_date" id="vqp_date" type="hidden"/>

					</div>


				</div>



					<br>

					



					

					  

					  <?php 

					  }



				?>

				<input name="vqp_status" id="vqp_status" type="hidden" value="Transfer" placeholder="Status" required />

				<div id="status"></div>

				<input name="edit_account" id="edit_account" class="btn btn-success" type="submit" value="Submit Transfer Request" />

				</form>

				

		<br/>

		<br/>

		</div>		

		</div>		

	</div>

	</center>

	</body>

<script src="../js/checker.js" type="text/javascript"></script>

</html>