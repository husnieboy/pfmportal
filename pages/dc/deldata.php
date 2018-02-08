<?php  include('../db.php');
include('header.php'); 
session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];

$iuser= $row[1];



if ($level == 1)

	{

		header('location:../admin/');

	}
if ($level == 3)

	{

		header('location:../om/');

	}
if ($level == 4)

	{

		header('location:../am/');

	}

if ($level == 5)

	{

		header('location:../member/');

	}

if ($level == '')

	{

		header('location:../');

	}
$gettrip=$_GET['trip'];

?>	
<script>

//var table = $('#tableme1').dataTable();
 
 // // Example call to load a new file
 // table.fnReloadAjax( 'media/examples_support/json_source2.txt' );
 
  // Example call to reload from original file
  //table.fnReloadAjax();
	</script>
	<table cellpadding="0" cellspacing="0" border="0" width="400" align="left">
				<thead>

						<tr>

						<th>Type Of Expense</th>
						
						<th>Particulars</th>
						
						<th>Amount</th>
						

						</tr>

					</thead>
					<tbody>
					<?php
							$sqptrip=mysqli_query($link,"SELECT * FROM dcexp WHERE ex_triptic='$gettrip' ORDER By id_exp ASC")or die(mysqli_error());
							while($sqprow=mysqli_fetch_array($sqptrip)){
								
							
					?>
						

						<tr>
		
						<td align="left"><?php echo $sqprow[2]; ?></td>

						<td align="left"><?php echo $sqprow[3]; ?></td>
						
						<td align="right"><?php $comma=$sqprow[4]; echo number_format($comma, 2, '.', ',');?></td>
						
						</tr>
						<?php
						} 
						?>
						<tr>
		
						<td align="left"></td>

						<td align="left"></td>
						
						<td align="right">_________________</td>
						
						</tr>
						<tr>
		
						<td align="center"></td>

						<td align="right">Total Amount:</td>
						<?php
						$qltol = mysqli_query($link,"SELECT ex_triptic, SUM(ex_amt) as Total FROM dcexp WHERE ex_triptic='$gettrip' Group By ex_triptic")or die(mysqli_error());

						while($qltolrow=mysqli_fetch_array($qltol)){
						?>						
						<td align="right"><?php $comma=$qltolrow['Total']; echo number_format($comma, 2, '.', ',');?></td>
						<?php
						}
						?>
						</tr>
				</tbody>
				</table>
				<br/>
				<br/>
	</div>

	</div>