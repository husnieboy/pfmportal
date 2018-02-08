<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../userdc.php');
	    ?>

</head>

<body onload="ongetload()">

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
					$random_string_length =3;
					$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
                            <i class="fa fa-edit fa-fw"></i> Ticket Creation
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
							<form class="form-horizontal" data-toggle="validator" role="form" method="POST">
								
										<label class="control-label">Trip ID Number:</label>
										<?php
										$query  = mysqli_query($link,'SELECT MAX(dd_id) FROM dcdetails');
										$row=mysqli_fetch_row($query);
										$last_id =  $row[0];
										$next = strlen($last_id);
										if(strlen($last_id) == 4){
											
											$strlen = 'TRP' . $last_id . $string ;
										}
										if(strlen($last_id) == 3){
											
											$strlen = 'TRP0' . $last_id . $string ;
										}
										if(strlen($last_id) == 2){
											$strlen =  'TRP00' . $last_id . $string;
										}
										if(strlen($last_id) == 1){
											$strlen = "TRP000" . $last_id . $string;
										}
										
										//$check= mysqli_query($link,"SELECT * FROM dcdetails WHERE dd_id='$string'");
										//$data = mysqli_fetch_array($check, MYSQLI_NUM);
										//if($data[0] < 1) {
										//$random_string_length =2;
										//$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
										//$string2 = '';
										//for ($i = 0; $i < $random_string_length; $i++) {
										//$string2 .= $characters[rand(0, strlen($characters) - 1)];
										//}
										?>
										
										<?php
											//} 
											//else
											//{
											//$random_string_length =2;
											//$characters = '0123456789absdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
											//$string3 = '';
											//for ($i = 0; $i < $random_string_length; $i++) {
											//$string3 .= $characters[rand(0, strlen($characters) - 1)];
											//}
											?>
											
											<?php
											//}
										
										?>
										<label id="lblpno" name="lblpno"><?php echo $strlen ?></label>
										<br>
										<label class="control-label">Trucker's Company:</label>
										<select id="trc" class="form-control" name="trc" required>
										<option></option>
										<?php
										$qrpl=mysqli_query($link,"SELECT * FROM dcplate Group By pl_cmp") or die(mysqli_error());
										while($qrplrow=mysqli_fetch_array($qrpl))
										{
										?>
										<option><?php echo $qrplrow[3]; ?></option>
										<?php
										}
										?>
										</select>
										<label class="control-label">Plate Number:</label>
										<input type="text" class="form-control" pattern="^[A-z][a-zA-Z0-9\s]*$" id="pno" name="pno" placeholder="Plate Number" required/>
										<div id="status"></div>
										<label class="control-label">Driver's Name:</label>
										<input type="text" class="form-control" id="dnl" name="dnl" placeholder="Last Name" onkeyup="drname()" required/>
										<input type="text" class="form-control" id="dnf" name="dnf" placeholder="First Name" onChange="drname()" required/>
										
										<label class="control-label">Helper's Name:</label><label><i>(if applicable)</i></label>
										<input type="text" class="form-control" id="hnl" name="hnl" onkeyup="hlname()" placeholder="Last Name" />
										<input type="text" class="form-control" id="hnf" name="hnf" onChange="hlname()" placeholder="First Name" />
										
										<label class="control-label">DC Personel:</label>
										<input type="text" class="form-control" id="dcnl" name="dcnl" placeholder="DC Personel Name" Value="<?php echo $name; ?>" readOnly />
										
										<label class="control-label">Select Store's:</label>
										<select id="sttrip" class="form-control" name="sttrip" required>
										<option>
										</option>
										<?php
										$qrplu=mysqli_query($link,"SELECT * FROM user WHERE user_level='5' Group By store_name") or die(mysqli_error());
										while($qrplrowu=mysqli_fetch_array($qrplu))
										{
										?>
										<option><?php echo $qrplrowu[4]; ?></option>
										<?php
										}
										?>
										</select>
										
										<!-- /.panel -->
											<div class="panel panel-default">
												<div class="panel-heading">
													<i class="fa fa-list fa-fw"></i>Store Trip List:
												</div>
												<!-- /.panel-heading -->
												
																<div id="stripstatus"></div>
												
																<input type="hidden" class="form-control" id="ndeb" name="ndeb" placeholder="No of Dispatched Bags" />
																<input type="hidden" id="lbltrpno" name="lbltrpno" placeholder="" />
																<input type="hidden" id="fname" name="fname" placeholder="" />
																<input type="hidden" id="hfname" name="hfname" placeholder="" />
																<br/>
																<button type="reset" name="reset" id="register" class="btn btn-info alert">Reset</button>
																<button type="submit" name="dcreg" id="dcreg" class="btn btn-success alert">Save</button>
												
																
														
															
													
												</form>
											</div>
											<!-- /.panel -->
										</div>
										<!-- /.col-lg-8 -->
																
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    
               <!-- <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                     <!--   <div class="panel-body">
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

</body>

</html>
	
				
<script>
$(function() {

    $( "#date" ).datepicker();

  });

  </script>
  <script>
$(function() {
    $('#dnl').change(function() {
       this.value = this.value.toUpperCase();
  });
});
$(function() {
    $('#dnf').change(function() {
		this.value = this.value.toUpperCase();
   });
});

$(function() {
    $('#hnf').change(function() {
       this.value = this.value.toUpperCase();
  });
});

$(function() {
    $('#hnl').change(function() {
       this.value = this.value.toUpperCase();
  });
});

$(function() {
    $('#dcnl').change(function() {
       this.value = this.value.toUpperCase();
  });
});

$(function() {
  $('#pno').keyup(function() {
	this.value = this.value.toUpperCase();
  });
  });
$(function() {
    $('#trc').keyup(function() {
		this.value = this.value.toUpperCase();
   });
});		
function drname()
{
   document.getElementById('fname').value = 
        document.getElementById('dnl').value + ' ' + 
        document.getElementById('dnf').value;
		document.getElementById('lbltrpno').value =
		document.getElementById('lblpno').textContent;
}
function ongetload()
{
		document.getElementById('lbltrpno').value =
		document.getElementById('lblpno').textContent;
}
function hlname()
{
   document.getElementById('hfname').value = 
        document.getElementById('hnl').value + ' ' + 
        document.getElementById('hnf').value;
}
</script>
<script src="../js/checker.js" type="text/javascript"></script>
<?php
if(isset($_POST['dcreg']))
			{	
				$date=date("F-d-Y");
				$trccamp=$_POST['trc'];
				$lbltrpno=$_POST['lbltrpno'];
				$fname=strtoupper($_POST['fname']);
				$hfname=strtoupper($_POST['hfname']);
				$plno=$_POST['pno'];
				$dcloccode=9005;
				$dclocname='DC - SAN PEDRO';
				$dctimeout=date("H:i:s");
				$status='OPEN';
				$dh_dndeb=$_POST['ndeb'];
				$nbox=$_POST['nbox'];
				$sid=$_POST['sid'];
				$stcode=$_POST['stcode'];
				$dcper=$_POST['dcnl'];
				$datestamp=date('Y-m-d H:i:s');
				$daterec=date('ymd');
			
			$check= mysqli_query($link,"SELECT * FROM dcplate WHERE plateno='$plno'");
			$data = mysqli_fetch_array($check, MYSQLI_NUM);
			if($data[0] >= 1) {
			
			mysqli_query($link,"INSERT INTO dcdetails (trip_no,trk_camp,pl_no,drv_name,hlp_name,trip_status,trip_dateopen,dctimestamp,dcperson) values('$lbltrpno','$trccamp','$plno','$fname','$hfname','$status','$date','$datestamp','$dcper')")or die(mysqli_error());
			mysqli_query($link,"INSERT INTO dchistory (dh_lcode,dh_sname,dh_date,dh_trpno,dh_dndeb) values('$dcloccode','$dclocname','$date','$lbltrpno','$dh_dndeb')")or die(mysqli_error());
			mysqli_query($link,"INSERT INTO dcrectbl (tp,dt) values('$lbltrpno','$daterec')")or die(mysqli_error());
			
			for($in=0; $in < count($sid); $in++){
				$nbox_in = $nbox[$in];
				$sid_in = $sid[$in];
				$stcode_in = $stcode[$in];
				//echo $sid[$in]; echo $nbox[$in];
			mysqli_query($link,"UPDATE dcstoretrip SET trpstatus='S', nobox='".$nbox[$in]."' WHERE trip_id='".$sid[$in]."'")or die(mysqli_error("dcstatus"));
			}
			?>
				<script type="text/javascript">

					window.alert("Trip Details Successfully Saved!");
					window.location.href='ticcreate.php';//<?php echo '?tripno='.$lbltrpno; echo '&fname='.$fname; echo '&dateprint='.$date; echo '&plno='.$plno; echo '&trancamp='.$trccamp; echo '&helpname='.$hfname; ?>';
					
				</script>
			<?php

			}
			if($data[0] < 1)
			{
	
				
			?>

				<script type="text/javascript">

					window.alert("Please enter accredited Plate Number!");
					window.location.href='accre.php<?php echo '?pno='.$plno;?>"';

				</script>

			<?php
			}
			}
			?>
</div>
</div>
</div>