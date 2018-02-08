<?php
include('../db.php');
include('header.php');
set_time_limit(0);
include('../javascript.php');
?>
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>
<body onload=displayTime();>
<center>
<div class="alert alert-success">Date Range View</div>

	<form class="form-horizontal" action="perskudets.php<?php if(isset($_POST['ffdate'])){echo '?datef='.$_POST['ffdate']; echo '&datet='.$_POST['lldate'];} ?>" method="GET">
		<div class="control-group">

				<label class="control-label" for="inputEmail" >Select Date</label>

				<div class="controls">

				<input type="text" id="ffdate" name="ffdate" placeholder="From Date" required/>
				<input type="text" id="lldate" name="lldate" placeholder="To Date" required/>
				<button type="submit" name="SRange" class="btn btn-info">Submit</button>
				</div>

				</div>
				
	</form>
</center>
<?php 
if(isset($_GET['lldate'])){
	$datefrom=$_GET['ffdate'];
	$dateto=$_GET['lldate'];
	

?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>branch</th>

						<th>repdate</th>

						<th>code</th>

						<th>pd_desc</th>

						<th>TOTQTY</th>

						<th>TOTAMT</th>

						</tr>

					</thead>

				

					<tbody>

						<?php
						$sql = mysqli_query($link,"SELECT * FROM tempdata WHERE repdate BETWEEN '$datefrom 00:00:00' AND '$dateto 00:00:00'")or die(mysqli_error());

						while($row=mysqli_fetch_array($sql)){
						
						
						?>
						<?php
						
						
						?>
						<tr>

						<td><?php echo $row['branch']; ?></td>

						<td><?php echo $row['repdate']; ?></td>

						<td><?php echo $row['code']; ?></td>

						<td><?php echo $row['pd_desc']; ?></td>

						<td><?php echo $row['TOTQTY']; ?></td>

						<td><?php echo $row['TOTAMT']; ?></td>

						</tr>

						<?php }  ?>

					</tbody>

				</table>
				<a href="../export/skusale/exportskuecpay.php<?php echo '?datef='.$_GET['ffdate']; echo '&datet='.$_GET['lldate']; ?>" class="btn">Export ECPAY Only</a>	
				<a href="../export/skusale/exportskumonth.php<?php echo '?datef='.$_GET['ffdate']; echo '&datet='.$_GET['lldate']; ?>" class="btn">Export Month SKU Sales</a>	

<?php
}
?>

</body>			