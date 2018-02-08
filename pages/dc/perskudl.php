<?php
include('../db.php');
include('header.php');
set_time_limit(0);
$deldate=date(("Y-m-d"),strtotime('-1 day'));
include('../javascript.php');
?>
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>
<body onload=displayTime();>
<center>
<div class="alert alert-success">Date Range View</div>

	<form class="form-horizontal" method="POST">
	<div class="control-group">

				<label class="control-label" for="inputEmail" >Select Date</label>

				<div class="controls">

				<input type="text" id="ffdate" name="ffdate" placeholder="From Date" required/>
				<input type="text" id="lldate" name="lldate" placeholder="To Date" required/>
				<button type="submit" name="SRange" class="btn btn-info">Submit</button>
				</div>

				</div>
				
	</form>
</div>
</center>
<?php 
if(isset($deldate)){
	//$datefrom=$_POST['ffdate'];
	//$dateto=$_POST['lldate'];
	

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

						
						
						$cs = odbc_connect ('ansilive', 'pfmadmin', 'M@nager3971' ) or die ( 'Can not connect to server' );
						
						$query="SELECT a.branch,a.repdate,b.code,c.pd_desc,sum(b.qty) as TOTQTY,sum(b.amount) as TOTAMT FROM [HOVQPBOS].[dbo].[HistMain] a inner join [HOVQPBOS].[dbo].[histsub] b on a.transact=b.transact and a.branch=b.branch inner join [HOVQPBOS].[dbo].[mproduct] c on b.code = c.pd_prodid WHERE b.type='P' and a.repdate between '$deldate 00:00:00' and '$deldate 00:00:00' group by a.branch,a.repdate,b.code,c.pd_desc";

						$rs = odbc_exec($cs, $query);
						
						while($arr = odbc_fetch_array($rs)){
							$branch=$arr['branch'];
							$repdate=$arr['repdate'];
							$code=$arr['code'];
							$pd_desc=$arr['pd_desc'];
							$TOTQTY=$arr['TOTQTY'];
							$TOTAMT=$arr['TOTAMT'];
						?>
						<?php
						
						$sql = mysqli_query($link,"INSERT INTO tempdata (branch,repdate,code,pd_desc,TOTQTY,TOTAMT) VALUES ('$branch','$repdate','$code','$pd_desc','$TOTQTY','$TOTAMT')");

						?>
						<tr>

						<td><?php echo $arr['branch']; ?></td>

						<td><?php echo $arr['repdate']; ?></td>

						<td><?php echo $arr['code']; ?></td>

						<td><?php echo $arr['pd_desc']; ?></td>

						<td><?php echo $arr['TOTQTY']; ?></td>

						<td><?php echo $arr['TOTAMT']; ?></td>

						</tr>

						<?php }  ?>

					</tbody>

				</table>
<?php
}
?>	
</body>			