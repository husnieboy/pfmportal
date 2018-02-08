<?php include('../db.php');



include('header.php');
include('../usermember.php');

include('../javascript.php')	



?>

<head>

		

<link rel="stylesheet" href="../js/jquery-ui.css">



<script src="../js/jquery-ui.min.js"></script>



<script src="../js/jquery-ui.js"></script>



</head>

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

<body onload=displayTime();>



	<center>



		</br>



		</br>



			<div id="container">



			<div id="header">



				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>



			</div>



			<table>



				<thead>



					<td>



						<tr><a class="btn btn-green" href="index.php">HOME</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="myaccount.php">STORE ACCOUNT</a>  |  </tr>

						<tr><a class="btn btn-green" href="storetags.php">TAG REQUEST FORM</a>  |  </tr>
						
						<tr><a class="btn btn-green" href="trucks.php">DELIVERY DETAILS FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="vqpcodereq.php">VQP REQUEST FORM</a>  |  </tr>

						<tr><a class="btn btn-green" href="../logout.php">LOGOUT</a> </tr>



					</td>



				</thead>



			</table>



		<div class="row-fluid">



        <div class="span12">



		
<div class="alert alert-success"><label>Scan BarCode for Request</label></div>

<form id="add" class="form-horizontal" method="post" action="tags_check.php"> 





					<input name="bar_code" id="bar_code" type="text" OnChange="oninputs()" placeholder="Scan BarCode Here" required autofocus />
					<input name="bar_blue" id="bar_blue" type="Hidden" Value="BLUE" required/>
					

</form>



		
<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered alert-blue" width="80%">
<tr class="tableheader">
<td><div class="alert alert-success2"><label align="center">Blue</label></div></td>
</tr>
<td align="center">
<label for="inputEmail"></label>
<form name="list" method="post" action="" >

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

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

<div class="alert alert-success2"><label>Edit/Delete BarCode for Request</label></div>

<a href="tagslist.php" class="btn">View Tags Request Status</a>
<br>
<br>
<a class="btn btn-green" style="width:10%" type="submit" name="clrgreen" id="clrgreen" href="storetags.php">Green</a>
<a class="btn btn-blue" style="width:10%" type="submit" name="clrblue" id="clrblue"href="storetagsblue.php">Blue</a>
<a class="btn btn-violet" style="width:10%" type="submit" name="clrviolet" id="clrviolet" href="storetagspurple.php">Purple</a>
<br>

<?php  $datatagstoday = date("F-d-Y"); ?>

<?php

$result = mysqli_query($link,"SELECT * FROM pfmtagsreq WHERE Store_Tags_Name='$name' And Date_Time='$datatagstoday' And stclr='Blue'");

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

<input class="btn btn-success" type="button" name="Edit" value="Edit" onClick="setUpdateAction();" /> <input class="btn btn-danger" type="button" name="delete" id="delete" value="Delete"  onClick="setDeleteAction();" />

</form>
</table>
<script language="javascript" type="text/javascript">

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

</br>

</br>

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

<form id="taglist" class="form-horizontal" method="post" action="tagsprocess.php"> 





	<input name="store_name" id="store_name" type="Hidden" placeholder="" value="<?php echo $name ?>" required />

	<input name="ticket_status" id="ticket_status" type="Hidden" placeholder="" value="SUBMITTED"  required />

	<input name="store_ticket" id="store_ticket" type="Hidden" placeholder="" value="<?php echo $next_id ?>"  required />

	<input name="ticket_date" id="ticket_date" type="Hidden" placeholder="" value="<?php echo $datesales ?>"  required />

	<input name="time" id="time" type="Hidden" placeholder=""  required />

	<input name="ticket_QTY" id="ticket_QTY" type="Hidden" placeholder="" value="<?php echo $rowqty['Total']; ?>" required/>

	<input name="sat_sun" id="sat_sun" type="Hidden" placeholder="" value="<?php echo date('l'); ?>"/>
	
	<input name="sales" id="sales" type="hidden" placeholder="" value="<?php echo $area; ?>"/>
	
	<input class="btn btn-success" style="width:80%" type="submit" name="Process" id="Process" value="Process Request" />

	<div id="status"></div>

</form>

</br>

</br>

<script src="../js/checker.js" type="text/javascript"></script>

	</body>

</body></html>