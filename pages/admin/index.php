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
						<tr><a class="btn btn-green" href="myaccount.php">MYACCOUNT</a>  |  </tr>
						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a></tr>
					</td>
				</thead>
			</table>
			<br/>
			<div class="alert alert-success"><label>MONITORING REVIEW LIST</label></div>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
			</table>
			</div>
	</center>
	
	<center>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
			<div class="bs-example" style="float:left;">
			<div class="list-group">
			<div class="alert alert-success2"><label>YOUR VQP PENDING REQUEST</label></div>
			</div>	
			</div>
			
			<div class="bs-example" style="float:left;">
			<div class="list-group">
			<div class="alert alert-success2"><label>EXPIRED VQP USER</label></div>
			</div>	
			</div>
			
			<div class="bs-example" style="float:right;">
			<div class="list-group">
			<div class="alert alert-success2"><label>YOUR TAG PENDING REQUEST </label></div>
			</div>
			</div>
			</table>
		</center>
		<center>
	</body>
<style type="text/css">
	.list-group{
		width: 300px;
	}
    .bs-example{
    	margin: 60px;
    }
</style>
</html>