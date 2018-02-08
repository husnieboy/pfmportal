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

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

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

			<br/>
	</div>
			<?php 
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered" width="80%">
<tr class="tableheader">
<td><div class="alert alert-success2"><label>DOWNLOAD PRICE TAGS</label></div></td>
</tr>
<tr>
<td align="center">
<label for="inputEmail">Store Master File Tags</label>

					<div>

						<select id="SM" name="SM" type="text" width="80%" required>

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from stores where Date='$datesales' And Ticket_Status='SUBMITTED'");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['Store_Name'];?></option>
						
						<?php } ?>
						
					</select>
					
				</div>
	<div id="status"></div>
				<br/>
				<a class="btn btn-success" href="tagsreview.php">Tags Review</a>
				</br>
<tr>
<td><p><b>Note:</b><br/> <i>Only File With Date <?php echo $datesales ?> Will Be Downloaded!!<br/> This is Per Day Request Only!!</i></p>
</td>
</tr>
</table>

<br>

<div class="alert alert-success"><label>CHNAGE STATUS</label></div>

<div class="row-fluid">

        <div class="span12">

			<div style="float:center;" id="refre">
			<table cellpadding="0" cellspacing="0" border="0" width="80%">
			<tr>
			<td>	

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">
				

					<thead>

						<tr>

						<th>Store Name</th>

						<th>TicketNo.</th>
						
						<th>Green</th>
						
						<th>Blue</th>
						
						<th>Purple</th>

						<th>TicketStatus</th>

						<th>Date</th>

						<th>Time</th>

						<th>RequestQTY</th>

						<th></th>

						</tr>

					</thead>

				

					<tbody>

						<?php 

						$query=mysqli_query($link,"SELECT * FROM stores WHERE (stclrgreen='PRINTED' Or stclrblue='PRINTED' Or stclrpurple='PRINTED') And Ticket_Status='SUBMITTED'")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){

						?>

						<tr>

						<td><?php echo $row[1]; ?></td>

						<td><?php echo $row[2]; ?></td>
						
						<td><?php echo $row[7]; ?></td>

						<td><?php echo $row[8]; ?></td>

						<td><?php echo $row[9]; ?></td>

						<td><?php echo $row[3]; ?></td>

						<td><?php echo $row[4]; ?></td>

						<td><?php echo $row[5]; ?></td>

						<td><?php echo $row[6]; ?></td>

						<td><a class="btn btn-danger" href="processtags.php<?php echo '?id='.$row['store_ID']; ?><?php echo '&green='.$row['stclrgreen']; ?><?php echo '&blue='.$row['stclrblue']; ?><?php echo '&purple='.$row['stclrpurple']; ?><?php echo '&status='.'DONE'; ?>">Process</a></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>

			</td>
	</tr>			
	</table>
				

	</div>


<script src="../js/checker.js" type="text/javascript"></script>
</body>