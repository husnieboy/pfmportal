<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];

if ($level == 1)

	{

		header('location:../admin/');

	}



if ($level == 2)

	{

		header('location:../dc/');

	}

if ($level == 4)

	{

		header('location:../am/');

	}

if ($level == 5)

	{

		header('location:../member/');

	}

if ($level == 6)

	{

		header('location:../hr/');

	}
if ($level == '')

	{

		header('location:../');

	}
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> List of Pending Trip Ticket
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
									<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover"  id="">

									<thead>

										<tr>
										
										<th class="list-group-item-info">Date</th>
										
										<th class="list-group-item-info">Trip Ticket ID</th>
										
										<th class="list-group-item-info">Truck Company Name</th>
										
										<th class="list-group-item-info">Driver Name</th>
										
										<th class="list-group-item-info">Plate Number</th>
										
										<th class="list-group-item-info"></th>

										</tr>

									</thead>

								

									<tbody>

										<?php

										$query=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_status='OPEN' AND DATEDIFF(NOW(),dctimestamp) > 2  ORDER BY dd_id DESC")or die(mysqli_error());
										//$query=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_status='OPEN' AND DATEDIFF(DATE_ADD(NOW(), INTERVAL 48 HOUR),dctimestamp) > 2  ORDER BY dd_id DESC")or die(mysqli_error());

										while($row=mysqli_fetch_array($query)){
										$tp=$row[1];
										?>

										<tr>
										
										<td><?php echo $row[7]; ?></td>
										
										<td><?php echo $row[1]; ?></td>

										<td><?php echo $row[2]; ?></td>
										
										<td><?php echo $row[3]; ?></td>
										
										<td><?php echo $row[5]; ?></td>
										
										<td ><?php $querytic=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='DC - SAN PEDRO' AND dh_trpno='$tp' AND dh_timeout=''")or die(mysqli_error());
										
										$rowtic=mysqli_fetch_array($querytic, MYSQLI_NUM);
										if($rowtic[0] > 1){
										?>
										<!--<a class="btn btn-danger" href="dcticout.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>" onclick="javascript:void window.open('dcticout.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>','1468492012883','width=700,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">Time Out</a>-->
										<?php }
										
										if($rowtic[0] < 1){
										
										?>
										<?php } ?>
										<a class="btn btn-success" href="tripticket.php<?php echo '?tripno='.$row[1]; echo '&fname='; echo '&dateprint='; echo '&plno='; echo '&trancamp='; echo '&helpname='; 
										
										$querytake=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$tp' ORDER BY trip_dateopen ASC")or die(mysqli_error());
										$rowtake=mysqli_fetch_array($querytake);
										?>" onclick="javascript:void window.open('tripview.php<?php echo '?trip='.$row[1]; echo '&fname='.$rowtake[3]; echo '&dateprint='; echo '&plno='.$rowtake[5]; echo '&trancamp='.$rowtake[2]; echo '&helpname='.$rowtake[4]; ?>','1468492012883','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">View</a>
										
										<!--<a class="btn btn-warning" href="dcticclose.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>" onclick="javascript:void window.open('dcticclose.php<?php echo '?trip='.$row[1]; echo '&whosto='.$user; ?>','1468492012883','width=700,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=240,top=200');return false;">Time In</a>-->
										</td>
										
										</tr>

										<?php } ?>

									</tbody>

								</table>
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
	