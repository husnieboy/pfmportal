<?php include('../db.php');

include('../useram.php');

?>
<?php 
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
			<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
			?>
<?php 
	
	$irt=$name;
	$idrt = $_GET['area'];
	$queryo=mysqli_query($link,"SELECT * FROM pfmsales WHERE Store_Name='$idrt' And TransDate='$yesterday' ORDER BY Time ASC")or die(mysqli_error());

	$row1=mysqli_fetch_array($queryo);
	$rt = $row1[19];
		if ($rt != $irt)

		{
		header('location:../am/sales.php');
		}
		


?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">



					<thead>



						<tr>



						<th>Total Sale's</th>


						<th>TC</th>


						<th>AC</th>


						<th>CVS</th>


						<th>FF</th>


						<th>RTE</th>


						<th>Store</th>
						

						<th>Time</th>

						
						<th>T_Date</th>


						<th>U_Date</th>



						</tr>



					</thead>



				



					<tbody>



						<?php 
						$id=$_GET['area'];

						$query=mysqli_query($link,"SELECT * FROM pfmsales where pfmsales.Store_Name='$id' And Am_Name='$name' ORDER BY Time ASC")or die(mysqli_error());



						while($row=mysqli_fetch_array($query)){



						?>



						<tr>


						<td><?php $comma=$row[1]; echo number_format($comma, 2, '.', ','); ?></td>


						<td><?php echo $row[8]; ?></td>


						<td><?php echo $row[9]; ?></td>


						<td><?php echo $row[10]; ?></td>


						<td><?php echo $row[11]; ?></td>


						<td><?php echo $row[12]; ?></td>


						<td><?php echo $row[2]; ?></td>

						
						<td><?php echo $row[5]; ?></td>


						<td><?php echo $row[6]; ?></td>


						<td><?php echo $row[7]; ?></td>


						</tr>



						<?php } ?>



					</tbody>



				</table>	

				

				

				<a class="btn btn-success" href="sales.php">Return</a>