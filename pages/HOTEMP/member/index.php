<?php include('../db.php');

include('header.php');

include('../usermember.php'); 

include('../javascript.php');
?>

<head>

<link href="../css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
		
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

	<body onload="displayTimeBig();">

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

			<table class="table table-bordered">

				<div class="alert alert-success">Time</div>

			</table>

			<div style="float:center;">

				<br>

				<br>

				<br>

				<span id="CountTime" ></span>

				<br>

				<br>

				<br>
			</div>
		<center>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
			<div style="float:left;">
			<div class="bs-example" style="float:right;">
			<div class="list-group">
			<a class="list-group-item active"><span class="glyphicon glyphicon"><b>MEMO's & PROMO'S</b></span><span class="badge"></span></a>
						
			<?php 
			
						$query=mysqli_query($link,"select * from pfmpdf where pdf_type='PDF' ");

						while($row=mysqli_fetch_array($query))

						 { ?>
						<a class="list-group-item" href="<?php echo '/pdffile/'.$row['pdf_source']; ?>"><span class="glyphicon glyphicon-file"><?php echo $row['pdf_name']; ?></span></a>
						

					<?php } ?>
			<a class="list-group-item active" href="area.php"></a>
		    </div>
			</div>
			</div>
			<div style="float:left;">
			<div class="bs-example" style="float:right;">
			<div class="list-group">
			<a class="list-group-item active"><span class="glyphicon glyphicon"><b>PDF MANUAL'S</b></span><span class="badge"></span></a>
						
			<?php 
			
						$query=mysqli_query($link,"select * from pfmpdf where pdf_type='PDF' ");

						while($row=mysqli_fetch_array($query))

						 { ?>
						<a class="list-group-item" href="<?php echo '/pdffile/'.$row['pdf_source']; ?>"><span class="glyphicon glyphicon-file"><?php echo $row['pdf_name']; ?></span></a>
						

					<?php } ?>
			<a class="list-group-item active" href="area.php"></a>
		    </div>
			</div>
			</div>
			</div>
			</table>
		</center>
		<center>

			</body>
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<canvas id="tree" width='400px' height='400px'></canvas>
			<td>
			</tr>
			</table>
		</center>
			<?php
			//include('../cm.php');
			?>
			<div class="modal-footer"><i>PFM IT Dept.</i></div>
			

<script type="text/javascript" src="../js/--snowstorm.js"></script>
<script src="../js/--forchristmas.js" type="text/javascript"></script>
<style type="text/css">
	.list-group{
		width: 400px;
	}
    .bs-example{
    	margin: 100px;
    }
</style>
</html>