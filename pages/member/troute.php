<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php');?>

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
                <div class="panel panel-default">
				<?php $TL=mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trpstatus='S' AND trip_store='".$name."'");
					  while($TLR=mysqli_fetch_array($TL)){	   
							?>
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Truck Route 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
                            <ul class="timeline">
								<?php $TLu=mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_ticket_no='".$TLR[1]."' ORDER BY trip_id DESC");
								while($TLRu=mysqli_fetch_array($TLu)){ ?>
								<?php 
									$random = Array("timeline","timeline-inverted","timeline","timeline"); 
									$random_keys=array_rand($random,3);
									 ?>
								<?php $TLi=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='".$TLRu[2]."' AND dh_trpno='".$TLR[1]."' ORDER BY dh_id DESC");
								$TLRi=mysqli_fetch_array($TLi); ?>
                                <li class="<?php echo $random[$random_keys[0]]; ?>">
									<?php  ?>
                                    <div class="timeline-badge <?php if(!empty(info-success)) ?>"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?php echo $TLRu[2]; ?></h4>
											
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> </small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p></p>
											</div>
                                    </div>
                                </li>
								
							<?php }?>
                            </ul>
                        </div>
					  <?php } ?>
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