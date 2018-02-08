<!DOCTYPE html>
<html lang="en">

<head>

<?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php');
	   include('../javascript.php'); 
?>
<?php
$vqp_id = $_GET['transfer'];
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
                            <i class="fa fa-home fa-fw"></i>Transfer Code Page
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
										<label class="control-label" for="inputEmail">Password</label>
										<div class="controls">
											<input name="vqp_password" id="vqp_password" type="password" maxlength="4" minlength="4" placeholder="Password" value=""/>
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
										<div class="control-group">
										<label class="control-label" for="inputEmail">EOC</label>
										<div class="controls">
											<input name="vqp_date" id="vqp_date" type="text" required/>
										</div>
										</div>
									</div>
						 <?php 
							}
						 ?>
									<input name="vqp_status" id="vqp_status" type="hidden" value="Transfer" placeholder="Status" required />
									<div id="status"></div>
									<input name="edit_account" id="edit_account" class="btn btn-success alert" type="submit" value="Transfer" />
									</form>
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
<script src="../js/checker.js" type="text/javascript"></script>
