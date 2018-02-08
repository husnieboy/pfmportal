<!DOCTYPE html>
<html lang="en">

<head>

 <?php include('../db.php'); include('includes.php'); 
	   include('../usermember.php');
	   include('../javascript.php'); 
	   ?>
<script type="text/javascript">

//$('#add input[name=bar_code]').change(function(){

		//	

//});

window.onload = function() {
 var myInput = document.getElementById('bar_code');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}

function oninputs(){

    var test = $('#bar_code').val();

	test2 = test.replace(/\b0+/g, '');

	$('#bar_code').val(test2);

	document.forms['add'].submit();

};

</script>
<?php 

				$monthsales = date("F");

				$datesales = date("F-d-Y");

				

?>

<?php

$totalqty = mysqli_query($link,"SELECT COUNT(*) as Total FROM pfmtagsreq WHERE Store_Tags_Name='$name' And Date_Time='$datesales'")or die(mysqli_error());

$rowqty=mysqli_fetch_array($totalqty);



 ?>

<?php

			$query  = mysqli_query($link,'SELECT MAX(Store_Ticket) FROM stores');

			$row=mysqli_fetch_row($query);

			$last_id =  $row[0];

			$next_id = $last_id+1;

?>
</head>

<body onload="displayTime();">

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
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home fa-fw"></i> Price Tags Request
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<div class="col-md-12 col-md-offset-3">
						<div class="col-md-5">
                            <h3 class="page-header"><i>Scan Item Barcode</h3>
							<form id="add" class="form-horizontal" method="post" action="tags_check.php"> 

								<input name="bar_code" id="bar_code" class="form-control" type="text" OnChange="oninputs()" placeholder="Scan BarCode Here" required autofocus />
								<input name="bar_green" id="bar_green" type="Hidden" Value="GREEN" required/>
								<input name="storecode" id="storecode" type="Hidden" Value="<?php echo $dlcoe; ?>" required/>
								

							</form>
						</div>
						</div>
                        </div>
						
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                            <!--<h3 class="page-header"><i></h3>-->
							<div class="table-responsive">
								<form name="list" method="post" action="" >
							
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable1">

								<thead>

												<tr>



												<th>Check</th>



												<th>BarCode</th>



												<th>Item Description</th>



												<th>Unit Price</th>



												</tr>



								</thead>

								<tbody>

								</form>
								<!--<a class="btn btn-green" style="width:10%" type="submit" name="clrgreen" id="clrgreen" href="storetags.php">Green</a>
								<a class="btn btn-blue" style="width:10%" type="submit" name="clrblue" id="clrblue"href="storetagsblue.php">Blue</a>
								<a class="btn btn-violet" style="width:10%" type="submit" name="clrviolet" id="clrviolet" href="storetagspurple.php">Purple</a>-->
					

								<?php  $datatagstoday = date("F-d-Y"); ?>

								<?php

								$result = mysqli_query($link,"SELECT * FROM pfmtagsreq WHERE Store_Tags_Name='$name' And Date_Time='$datatagstoday' And stclr='Green'");

								$i=0;

								while($row = mysqli_fetch_array($result)) {

								if($i%2==0)

								$classname="evenRow";

								else

								$classname="oddRow";

								?>

								<tr class="<?php if(isset($classname)) echo $classname;?>">

								<td><input type="checkbox" name="tags_id[]" value="<?php echo $row["tags_id"]; ?>" ></td>

								<td><?php echo $row["BarCode"]; ?></td>

								<td><?php echo $row["Item_Description"]; ?></td>

								<td><?php echo $row["Unit_retail"]; ?></td>

								</tr>

								<?php

								$i++;

								}

								?>

								</tbody>

								</table>

								<input class="btn btn-success alert" type="button" name="Edit" value="Edit" onClick="setUpdateAction();" /> <input class="btn btn-danger alert" type="button" name="delete" id="delete" value="Delete"  onClick="setDeleteAction();" /> <input class="btn btn-success alert" type="button" name="Process" id="Process" value="Process Request" /> <a href="tagslist.php" class="btn btn-success alert">View Tags Request Status</a>


								</form>
								<form id="taglist" class="form-horizontal" method="post" action="tagsprocess.php"> 

								<input name="store_name" id="store_name" type="Hidden" placeholder="" value="<?php echo $name ?>" required />

								<input name="ticket_status" id="ticket_status" type="Hidden" placeholder="" value="SUBMITTED"  required />

								<input name="store_ticket" id="store_ticket" type="Hidden" placeholder="" value="<?php echo $next_id ?>"  required />

								<input name="ticket_date" id="ticket_date" type="Hidden" placeholder="" value="<?php echo $datesales ?>"  required />

								<input name="time" id="time" type="Hidden" placeholder=""  required />

								<input name="ticket_QTY" id="ticket_QTY" type="Hidden" placeholder="" value="<?php echo $rowqty['Total']; ?>" required/>

								<input name="sat_sun" id="sat_sun" type="Hidden" placeholder="" value="<?php echo date('l'); ?>" />
								
								<div id="status"></div>

								</form>
						
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
	
<script language="javascript" type="text/javascript">

$( "#Process" ).click(function() {
  $( "#taglist" ).submit();
});

function setUpdateAction() {

if(confirm("Are you sure want to Edit these Request?")) {

document.list.action = "edittags.php";

document.list.submit();

}

}

function setDeleteAction() {

if(confirm("Are you sure want to delete these Request?")) {

document.list.action = "deletetags.php";

document.list.submit();

}

}

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