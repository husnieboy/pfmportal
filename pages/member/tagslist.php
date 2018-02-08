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
                            <i class="fa fa-home fa-fw"></i> Home Page
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable1">



									<thead>



										<tr>



										<th>Ticket No.</th>



										<th>Total Request</th>

										
										<th>Green</th>

										
										<th>Blue</th>

										
										<th>Purple</th>

										

										<th>Status</th>

										

										<th>Date</th>

										

										<th>Time</th>



										</tr>



									</thead>



								



									<tbody>



										<?php 



										$sql = mysqli_query($link,"SELECT * FROM stores WHERE Store_Name='$name'");



										while($tags=mysqli_fetch_array($sql)){



										?>



										<tr>

											

											<td><?php echo $tags['Store_Ticket']; ?></td>

											
											<td><?php echo $tags['Ticket_QTY']; ?></td>
											

											<td><?php echo $tags['stclrgreen']; ?></td>
											

											<td><?php echo $tags['stclrblue']; ?></td>
											

											<td><?php echo $tags['stclrpurple']; ?></td>
											

											<td><?php echo $tags['Ticket_Status']; ?></td>

											

											<td><?php echo $tags['Date']; ?></td>

											

											<td><?php echo $tags['Time']; ?></td>


										</tr>



										<?php } ?>



									</tbody>



								</table>

							</center>
						</div>
						</td>
						</tr>
						<table>
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
</body>

</html>
