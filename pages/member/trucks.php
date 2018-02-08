<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php'); 
include('../javascript.php');?>

</head>

<body onload=displayTime();>

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
                            <i class="fa fa-barcode fa-fw"></i> Truck Receiving Details
                            <div class="pull-right">
							
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body centered">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										
									<div class="pull-right">
							
									</div>
									</div>
									
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
									<div class="controls col-lg-12">
												<form role="form" class="form-horizontal" id="trucks" method="POST" align="center>">
												<!--<label class="control-label" for="inputEmail">Store</label>-->
												<input type="hidden" id="store" class="form-control" name="store" placeholder="Store" value="<?php echo $name ?>" readonly required>
												<!--<label class="control-label" for="inputEmail">Time</label>-->
												<input type="hidden" id="time" class="form-control" class="form-control" name="time" placeholder="Time" readonly />
												<!--<label class="control-label" for="inputEmail" >Date</label>-->
												<input type="hidden" id="date" class="form-control" name="date" placeholder="Date" value="<?php echo date("F-d-Y");?>" readonly />
												<?php 	$inputcheck = mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$name' AND dh_date='".date("F-d-Y")."' AND dh_checkin='D' AND dh_checkout=''");
														//AND dh_date='$datetoday' OR dh_date='$yesterday'
														$input = mysqli_fetch_array($inputcheck, MYSQLI_NUM);
														if($input[0] > 1){
														$editable='required';
														} 
												if(!empty($editable)){	
														?>
												<label class="control-label" for="inputEmail">No. of Document Bags</label >
												<input type="text" id="nodb" name="nodb" maxlength="2" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"  placeholder="No. of Docs Bags" <?php  if(!empty($editable)){ echo $editable;} ?> />
												<label class="control-label" for="inputEmail">No. of Returned Boxes</label >
												<input type="text" id="norb" name="norb" maxlength="2" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="No. of Returned Boxes" <?php if(!empty($editable)){ echo $editable;} ?> />
												<label class="control-label" for="inputEmail">Remarks</label >
												<input type="text" id="rema" name="rema" maxlength="30" class="form-control" placeholder="Remarks" />
												<label class="control-label" for="inputEmail">Name</label>
												<input type="text" id="persin" onChange="this.value = this.value.toUpperCase();" class="form-control" class="form-control" name="persin" placeholder="Scan By" required />
												<?php } ?>
												<label class="control-label" for="inputEmail">Scan Trip Ticket No.</label>
												<input type="text" id="driver_code" class="form-control" name="driver_code" placeholder="Scan/Encode Trip Ticket #" autofocus required />
												<br>
												<br>
												<div id="status"></div><br>
												<input type="hidden" id="dc_ams" name="dc_ams" placeholder="" value="<?php echo $ams ?>" required />
												
											
												<input type="submit" id="gowifi" hidden />
												</form>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
								</div>
								
							</div>
                        </div>
                        <!-- /.panel-body -->
						<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list fa-fw"></i>
                        </div>
						
						<div class="panel-body">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable1">

										<thead>

											<tr>

											<th>Trip Ticket</th>

											<th>Store Name</th>

											<th>Date</th>

											<th>Time IN</th>
											
											<th>Time OUT</th>
											
											<th>Duration</th>

											</tr>

										</thead>

									

										<tbody>

											<?php 

											$query=mysqli_query($link,"SELECT * FROM dchistory where dh_sname='$name' ORDER BY dh_id DESC")or die(mysqli_error());

											while($row=mysqli_fetch_array($query)){

											?>

											<tr>

											<td><?php echo $row[8]; ?></td>

											<td><?php echo $row[2]; ?></td>

											<td><?php echo $row[3]; ?></td>
											
											<td><?php echo $row[4]; ?></td>
											
											<td><?php echo $row[5]; ?></td>
											
											<td><?php echo $row[6]; ?></td>

											</tr>

											<?php } ?>

										</tbody>

									</table>

									

						<div class="modal-footer"><i>PFM IT Dept.</i></div>

							</div>
							</td>
								</tr>
								</table>
						</center>
						
									<input name="sat_sun" id="sat_sun" type="hidden" placeholder="" value="<?php echo date('l'); ?>"/>
									<input class="btn btn-success" type="hidden" name="Process" id="Process" value=""/>
									<input name="bar_code" id="bar_code" type="hidden"/>
									<input name="sales" id="sales" type="Hidden" placeholder="" value=""/>
									<input name="sl" id="sl" type="Hidden" placeholder="" value=""/>
						 </div>
					  </div>
					</div>
						</div>
                        <!-- /.panel-heading -->
                     
                    </div>
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


				<?php 
				$datetoday=date("F-d-Y");
				//echo date("F-d-Y h:i:s A");
				?>
				<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				?>
				<?php
				if(isset($_POST['driver_code']))
				{
				$trp = $_POST['driver_code'];
				$in= mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$name' AND dh_trpno='$trp' AND dh_date='$datetoday' OR dh_date='$yesterday'");
				$datafetch = mysqli_fetch_array($in);
				$start_time = $datafetch[4];
				$end_time = date("H:i:s"); 

				$vv =  strtotime($end_time);
				$bb = strtotime($start_time);
				$cc=$vv-$bb;
				$timedut= gmdate("H:i:s", $cc);
				

				}
				
				if(isset($_POST['driver_code']))
				{
				$store=$_POST['store'];
				$time=date("H:i:s");
				$date=$_POST['date'];
				$triptic=$_POST['driver_code'];
				$dc_ams=$_POST['dc_ams'];
				if(!empty($editable)){
				$nodb=$_POST['nodb'];
				$norb=$_POST['norb'];
				$persin=$_POST['persin'];
				$rema=$_POST['rema'];
				}
				
				$storedecclose=mysqli_query($link,"SELECT * FROM dcstore WHERE dcs_s_trip_status='CLOSE' AND dcs_tripno='$triptic' AND dcs_sname='$store'");
				$cpcheck = mysqli_fetch_array($storedecclose, MYSQLI_NUM);
				
				if($cpcheck[0] > 1){
					
					$openclose= mysqli_query($link,"SELECT * FROM dcstore WHERE dcs_s_trip_status='OPEN' AND dcs_tripno='$triptic' AND dcs_sname='$store'");
					$closeopen = mysqli_fetch_array($openclose, MYSQLI_NUM);
				
				}
				if($cpcheck[0] < 1){
					
					$openclose= mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triptic' AND trip_status='OPEN'");
					$closeopen = mysqli_fetch_array($openclose, MYSQLI_NUM);
				}
			
						
				if($closeopen[0] > 1)
				{
					
				$in= mysqli_query($link,"SELECT * FROM dchistory WHERE dh_sname='$store' AND dh_trpno='$triptic' AND dh_checkin='D'");
				//AND dh_date='$datetoday' OR dh_date='$yesterday'
				$data = mysqli_fetch_array($in, MYSQLI_NUM);
				
				
				
				if($data[0] > 1) {
					
					?>
					<script type="text/javascript">
					
					if(confirm("Are you sure want to Out/Close these Ticket?")) {
					window.location.href="submitout.php<?php echo '?store='.$store; echo '&date='.$date; echo '&driver_code='.$trp; echo '&triptic='.$triptic; echo '&dc_ams='.$dc_ams; echo '&nodb='.$nodb; echo '&norb='.$norb; echo '&tout='.$time; echo '&persin='.$persin; echo '&rema='.$rema;  ?>";
					<?php
					//mysqli_query($link,"UPDATE dchistory SET dh_timeout='$time', dh_checkout='D', dh_dut='$timedut' WHERE dh_trpno='$triptic' AND dh_sname='$store' AND dh_timeout=''")or die(mysqli_error());
					//mysqli_query($link,"UPDATE dcdetails SET trip_status='CLOSE' WHERE trip_no='$triptic'")or die(mysqli_error());
					//mysqli_query($link,"UPDATE dcstore SET dcs_s_trip_status='CLOSE' WHERE dcs_tripno='$triptic'")or die(mysqli_error());
					?>
					}
					
					</script>
					<?php
					}
				

				if($data[0] < 1)
					{
						$incheck = mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$triptic' AND trip_status='OPEN'");
						$checkdata = mysqli_fetch_array($incheck, MYSQLI_NUM);
						
						if($checkdata[0] > 1){
						
						$spertrip = mysqli_query($link,"SELECT * FROM dcstoretrip WHERE trip_ticket_no='$triptic' AND trip_store='$name'");
						$pertrip = mysqli_fetch_array($spertrip, MYSQLI_NUM);
						
							if($pertrip[0] > 1){
								mysqli_query($link,"INSERT INTO dchistory (dh_lcode,dh_sname,dh_date,dh_timein,dh_trpno,dh_checkin,sperin,dh_rem) values('$dlcoe','$store','$date','$time','$triptic','D','".$_POST['persin']."','".$_POST['rema']."')")or die(mysql_error());
								mysqli_query($link,"INSERT INTO dcstore (dcs_sname,dcs_tripno,dcs_date,dcs_s_trip_status) values('$store','$triptic','$date','OPEN')")or die(mysqli_error());
								mysqli_query($link,"UPDATE dcstoretrip SET trpstatus='R' WHERE trip_ticket_no='$triptic' AND trip_store='$name'")or die(mysqli_error());
								
						
						
						?>
								<script type="text/javascript">
								window.alert("Time IN!");
								window.location.href='trucks.php';
								</script>
						<?php
							}
							if($pertrip[0] < 1){
								?>
								<script type="text/javascript">
								window.alert("Ticket mismatch! Your Store is not included to trip # <?php echo $triptic ?>");
								window.location.href='trucks.php';
								</script>
								<?php
							} 
						}
						if($checkdata[0] < 1){
							
					
						?>
						<script type="text/javascript">
					
							window.alert("Ticket Already Close+!");
							window.location.href='trucks.php';
							</script>
						<?php
						}
					  }
					}
					?>
					<?php
					if($closeopen[0] < 1){
						?>
							<script type="text/javascript">
							window.alert("Please Type or Scan the Ticket Again");
							window.location.href='trucks.php';
							</script>
						<?php
					}
				}
			?>
								<!-- DataTables JavaScript -->
								<script src="../vendor/datatables/js/jquery-1.12.4.js"></script>
								<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
								<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
								<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
								<script>
								$(document).ready(function() {
									$('#datatable1').DataTable({
										"order": [[ 2, "desc" ]]
									});
								});
								</script>
<script src="../js/checker.js" type="text/javascript"></script>
<script src="../js/password.js" type="text/javascript"></script>
<?php //date_default_timezone_set("Asia/Manila"); echo date("h:i:s a"); ?>
</body>
</html>