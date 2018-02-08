<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php');
	   include('../javascript.php'); 
	   ?>

</head>

<body onload="displayTimeBig();">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('menus.php'); ?>
        <!-- /.navbar-top-links -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i>Hi!  </i><?php echo $name; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php include('bars.php'); ?>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home fa-fw"></i> Store Personnel Code Request
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<div class="col-lg-8 col-md-offset-2">
                            <form class="form-horizontal" action="vqp_check_save.php" method="post"> 
								<?php
								$query  = mysqli_query($link,'SELECT MAX(vqp_code) FROM vqpusers');
								$row=mysqli_fetch_row($query);
								$last_id =  $row[0];
								$next_id = $last_id+1;
								?>
								<div class="thumbnail">
								<div class="control-group">
								<div class="controls">
								<input name="vqp_code" class="form-control" id="vqp_code" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Code" value="<?php echo $next_id ?>" readonly />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputEmail">Password</label>
								<div class="controls">
								<input name="vqp_password" class="form-control" id="vqp_password" pattern="^[0-9]*$" type="password" maxlength="4" minlength="4" placeholder="Password" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputEmail">Full Name</label>
								<div class="controls">
								<input name="vqp_name" class="form-control" id="vqp_name" pattern="^[A-z][a-zA-Z\s]*$" maxlength="50" type="text" placeholder="Full Name" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputEmail">Store</label>
								<div class="controls">
								<input name="vqp_store" class="form-control" id="vqp_store" maxlength="50" type="text" value="<?php echo $name ?>" placeholder="Store" readonly />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputEmail">Position</label>
								<div class="controls">
								<select id="vqp_position" class="form-control" name="vqp_position" type="text" required >
								<option></option>
								<option>Store Officer</option>
								<option>Team Leader</option>
								<option>Cashier</option>
								</select>
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="inputEmail">Code Expiration</label>
								<div class="controls">
								<input name="vqp_date" class="form-control" id="vqp_date" pattern="^([a-zA-Z]+)-[0-9]{2}-[0-9]{4}$" maxlength="20" type="date" placeholder="EOC" required />
								</div>
								</div>
								</div>
								<input name="vqpregister" id="vqpregister" class="btn btn-info alert" type="submit"  value="Request" disabled />
								<input name="vqp_am" class="form-control" id="vqp_am" pattern="^[A-z][a-zA-Z\s]*$" maxlength="20" type="hidden" placeholder="" value="<?php echo $vqp_ams ?>" required />
								<input name="vqp_status" class="form-control" id="vqp_status" type="hidden" value="Pending" placeholder="Status" required />
								<div id="status"></div><br>
								

							</form>
							</div>
							<div class="col-lg-12" >
									<div class="alert alert-success2"><label>My Team Account</label></div>
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable1">
										<thead>
											<tr>
											<th>VQP POS Code</th>
											<th>Employee Name</th>
											<th>Position</th>
											<th>CE</th>
											<th>Request Status</th>
											<th></th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$sql = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_store='$name'");
											while($row=mysqli_fetch_array($sql)){
											?>
											<tr>
												<td><?php echo $row['vqp_code']; ?></td>
												<td><?php echo $row['vqp_name']; ?></td>
												<td><?php echo $row['vqp_position']; ?></td>
												<td><?php echo $row['vqp_date']; ?></td>
												<td><?php echo $row['vqp_status']; ?></td>
												<td><a class="btn btn-success" href="../member/vqptrans.php<?php echo '?transfer='.$row['vqp_id']; ?>">Transfer Code</a></td>
											</tr>
											<?php } ?>
										</tbody>
									<tr>
									<td>
									</table>
							</div>			
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                 </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<script>
$(function() {
    $('#vqp_name').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
<!-- DataTables JavaScript -->
								<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
								<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
								<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
								<script>
								$(document).ready(function() {
									$('#datatable1').DataTable({
										responsive: true
									});
								});
								</script>
<script src="../js/checker.js" type="text/javascript"></script>

<script>//$(function() {
		//var chars = "0123456789"; var string_length = 4; var vqp_codesynced = ''; for (var i=0; i<string_length; i++) { var rnum = Math.floor(Math.random() * chars.length); vqp_codesynced += chars.substring(rnum,rnum+1); } document.getElementById('vqp_code').value = vqp_codesynced;});</script>
