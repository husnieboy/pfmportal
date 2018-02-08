<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php');
	    ?>

</head>

<body>

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
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home fa-fw"></i> Edit Account
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form class="form-horizontal" action="edit_save_account.php" method="post"> 
				
								<?php

					$result = mysqli_query($link,"SELECT * FROM user where user_id='$row[0]'");
					while($row = mysqli_fetch_array($result))
					  { ?>
					  <div class="thumbnail">
					<div class="control-group">
					<label class="control-label" for="inputEmail">Username</label>
					<div class="controls">
					<input name="user_id" class="form-control" type="hidden" value="<?php echo  $row['user_id'] ?>" />
					<input name="user_name" class="form-control" type="text" value="<?php echo $row['user_name'] ?>" readOnly />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail">Password</label>
					<div class="controls">
						<input name="user_password" class="form-control" type="password" value="<?php echo $row['user_password'] ?>" />
					</div>
					</div>

						<div class="control-group">
					<label class="control-label" for="inputEmail">Name</label>
					<div class="controls">
						<input name="store_name" class="form-control" type="text" value="<?php echo $row['store_name'] ?>" readOnly />
					</div>
					</div>
					
							<div class="control-group">
					<label class="control-label" for="inputEmail">Contact Number</label>
					<div class="controls">
						<input name="contact_number" class="form-control" type="text" value="<?php echo $row['contact_number'] ?>" />
					</div>
					</div>
					
					</div>

					<br>
					

					
					  
					  <?php 
					  }

				?>
				<input name="edit_account" class="btn btn-success" type="submit" value="Update">
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
	