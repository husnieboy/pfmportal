<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../userdc.php');?>

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
			<?php
		
					$random_string_length =7;
					$characters = '0123456789';
					$string = '';
					for ($i = 0; $i < $random_string_length; $i++) {
					$string .= $characters[rand(0, strlen($characters) - 1)];
					}
			?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Registration
                            <div class="pull-right">
                                <div class="btn-group">
                                    <!--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>-->
                
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div>
							<form class="form-horizontal" method="POST">
								
								<label class="control-label">Plate Number: </label>
								<input type="text" pattern="^[A-z][a-zA-Z0-9\s]*$" class="form-control" id="plno" name="plno" placeholder="Plate" required/>
								
								<label class="control-label">Truck Company: </label>
								<input type="text" pattern="^[a-zA-Z0-9\s]*$" id="tcomp" class="form-control" name="tcomp" placeholder="Company" required/>
							
								<label class="control-label">Truck Rate: </label>
								<input type="text" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" class="form-control" step="0.01" id="trate" name="trate" placeholder="Rate" required/>
								
								<br/>
								
								<button type="reset" class="btn btn-info alert" name="reset" id="reset" class="btn">Reset</button>
								<button type="submit" class="btn btn-success alert" name="dcreg" id="dcreg" class="btn">Save</button>
			
				
							</form>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i>
                        </div>
                        <!-- /.panel-heading -->
                     
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <!--<div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <!--<div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <!--<a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-4 -->
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

    $( "#date" ).datepicker();

  });

  </script>
  <script>

$(function() {
    $('#plno').keyup(function() {
       this.value = this.value.toUpperCase();
  });
});
$(function() {
    $('#tcomp').keyup(function() {
       this.value = this.value.toUpperCase();
  });
});
</script>
<script src="../js/checker.js" type="text/javascript"></script>
<?php

if(isset($_POST['dcreg']))
			{	
				$date=date("F-d-Y");
				//$trccamp=$_GET['trc'];
				//$lbltrpno=$_GET['lbltrpno'];
				//$fname=$_GET['fname'];
				//$hfname=$_GET['hfname'];
				$plno=$_POST['plno'];
				$dcloccode=9005;
				$dclocname='DC - SAN PEDRO';
				$dctimeout=date("H:i:s");
				$tcomp=$_POST['tcomp'];
				$trate=$_POST['trate'];
			
			$check= mysqli_query($link,"SELECT * FROM dcplate WHERE plateno='$plno'");
			$data = mysqli_fetch_array($check, MYSQLI_NUM);
			if($data[0] >= 1) {
			
			?>
				<script type="text/javascript">

					window.alert("Already Exist!");
					window.location.href='accre.php';

				</script>
			<?php

			}
			if($data[0] < 1)
			{
	
			mysqli_query($link,"INSERT INTO dcplate (plateno,pl_cmp,pl_rate) values('$plno','$tcomp','$trate')")or die(mysqli_error());
			
			?>
			

				<script type="text/javascript">
					
					window.alert("Plate Number Successfully Saved!");
					window.location.href='accre.php';

				</script>

			<?php
			}
			}
			?>