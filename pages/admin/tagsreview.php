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

						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>

						<tr><a class="btn btn-green" href="requestvqp.php">VQP REQUEST</a>  |  </tr>

						<tr><a class="btn btn-green" href="tagsdownload.php">TAGS REQUEST</a>  |  </tr>

						<tr><a class="btn btn-green" href="manageuser.php">MANAGE USER</a>  |  </tr>

						<tr><a class="btn btn-green" href="myaccount.php">MYACOUNT</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a></tr>

					</td>

				</thead>

			</table>

			<br>

		<div class="row-fluid">

        <div class="span12">

		<table class="table table-bordered">

				<div class="alert alert-success">TAGS</div>

			</table>

			<div style="float:center;">

				

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>Store Name</th>

						<th>Ticket Number</th>

						<th>Ticket Status</th>

						<th>Date</th>

						<th>Time</th>

						<th>Request QTY</th>

						<th>Green</th>
						
						<th>Blue</th>
						
						<th>Purple</th>

						<th>Delete</th>

						</tr>

					</thead>

				

					<tbody>

						<?php 

						$query=mysqli_query($link,"SELECT * FROM stores")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[1]; ?></td>

						<td><?php echo $row[2]; ?></td>

						<td width="40"><?php echo $row[3]; ?></td>

						<td><?php echo $row[4]; ?></td>

						<td><?php echo $row[5]; ?></td>

						<td><?php echo $row[6]; ?></td>

						<td><a id="greenme" name="greenme" class="btn btn-success" href="../export/tags/1/export_review_tags.php<?php echo '?id='.$row['store_ID']; ?><?php echo '&date='.$row['Date']; ?><?php echo '&store_name='.$row['Store_Name']; ?><?php echo '&color_status='."GREEN"; ?>"><?php echo $row['stclrgreen']; ?></a></td>

						<td><a id="blueme" name="blueme" class="btn btn-success" href="../export/tags/1/export_review_tags.php<?php echo '?id='.$row['store_ID']; ?><?php echo '&date='.$row['Date']; ?><?php echo '&store_name='.$row['Store_Name']; ?><?php echo '&color_status='."BLUE"; ?>"><?php echo $row['stclrblue']; ?></a></td>

						<td><a id="purpleme" name="purpleme" class="btn btn-success" href="../export/tags/1/export_review_tags.php<?php echo '?id='.$row['store_ID']; ?><?php echo '&date='.$row['Date']; ?><?php echo '&store_name='.$row['Store_Name']; ?><?php echo '&color_status='."PURPLE"; ?>"><?php echo $row['stclrpurple']; ?></a></td>

						<td><a class="btn btn-danger" href="tags_delete.php<?php echo '?id='.$row['store_ID']; ?>">Delete</a></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>

				

				

	</div>

	</center>

	</body>

</html>