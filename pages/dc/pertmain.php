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
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
			<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				$date = strtotime('F-d-Y');
			?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Delivery Status
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
						<?php 

							$query=mysqli_query($link,"SELECT * FROM dcdetails WHERE dcticpass='OPEN' AND DATEDIFF(NOW(),dctimestamp) < 2 GROUP By trip_no ORDER BY dd_id DESC")or die(mysqli_error());

							while($row=mysqli_fetch_array($query)){
							$area = $row['trip_no'];
							$pl_no = $row['pl_no'];

							?>
							<a class="list-group-item" href="tripview.php<?php echo '?trip='.$row[1]; echo '&fname='; echo '&dateprint='; echo '&plno='; echo '&trancamp='; echo '&helpname='; ?>" onclick="javascript:void window.open('tripview.php<?php echo '?trip='.$row[1]; echo '&fname='.$row[3]; echo '&dateprint='; echo '&plno='.$row[5]; echo '&trancamp='.$row[2]; echo '&helpname='.$row[4]; ?>','1468492012883','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;"><span class="glyphicon glyphicon-barcode">&nbsp;<?php echo $row['trip_no']; ?> |-| <?php echo $row['pl_no']; ?></span><span class="badge">View Report</span></a>
							<?php 

							$queryA=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$area'")or die(mysqli_error());

							while($rowA=mysqli_fetch_array($queryA)){

							?>
							<?php } ?>
						<?php } ?>
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
                           <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a>
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
	<script src="../js/checker.js" type="text/javascript"></script>
	
</body>

</html>
	
<style type="text/css">
	.list-group{
		width: 250px;
	}
    .bs-example{
    	margin: 40px;
    }
</style>
