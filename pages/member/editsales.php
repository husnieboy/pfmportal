<?php include('../db.php');

include('header.php');

session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$level = $row[3];

$name = $row[4];

$area = $row[7];

$ams_names = $row[5];



if ($level == 1)

	{

		header('location:../admin/index.php');

	}

if ($level == 2)

	{

		header('location:../dc/index.php');

	}

if ($level == '')

	{

		header('location:../index.php');

	}



include('../javascript.php');

?>
<head>

<script src="../js/simplemath.js"></script>

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>
</head>
<?php

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["sales_id"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($link,"UPDATE pfmsales set Total_Sales='" . $_POST["total_sales"][$i] . "', Store_Name='" . $_POST["store_name"][$i] . "', Process_Week='" . $_POST["process_week"][$i] . "', Process_Month='" . $_POST["process_month"][$i] . "', Time='" . $_POST["time"][$i] . "', TransDate='" . $_POST["Tdate"][$i] . "', Date='" . $_POST["date"][$i] . "', TC='" . $_POST["tc"][$i] . "', AC='" . $_POST["ac"][$i] . "', CVS='" . $_POST["cus"][$i] . "', FS='" . $_POST["fs"][$i] . "', FF='" . $_POST["ff"][$i] . "', RTE='" . $_POST["rte"][$i] . "', Waste='" . $_POST["wt"][$i] . "', FillRate='" . $_POST["fr"][$i] . "', ManHours='" . $_POST["mh"][$i] . "', Remarks='" . $_POST["rm"][$i] . "', Area_Store='" . $_POST["area_store"][$i] . "', Am_Name='" . $_POST["ams"][$i] . "'  WHERE Sales_ID='" . $_POST["sales_id"][$i] . "'");
}
header("Location:sales.php");
}
?>
<html>
<head>
<title>Edit Multiple</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form method="post" action="">
<div style="width:500px;">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" align="center">
<tr class="tableheader">
<td><div class="alert alert-success"><label>EDIT SALE</label></div></td>
</tr>
<?php
if(isset($_POST["sales_id"])){
$rowCount = count($_POST["sales_id"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysqli_query($link,"SELECT * FROM pfmsales WHERE Sales_ID='" . $_POST["sales_id"][$i] . "'");
$row[$i]= mysqli_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="1000" class="tblSaveForm">
<tr>
<td><label></label></td>
<td><input type="hidden" name="sales_id[]" class="txtField" value="<?php echo $row[$i]['Sales_ID']; ?>"></td>
</tr>
<center>
<label class="control-label" for="inputEmail"></label>
<div class="control-group">

				<label class="control-label" for="inputEmail">Sales</label>

				<div class="controls">

				<input type="Number" id="total_sales" name="total_sales[]" placeholder="Total Sale's" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['Total_Sales']; ?>" required readonly />

				</div>

				</div>
				
				<div class="control-group">

				<label class="control-label" for="inputEmail"></label>

				<div class="controls">
				
				<input type="Number" id="tc" name="tc[]" placeholder="TC" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['TC']; ?>" required />

				<input type="Number" id="cus" name="cus[]" placeholder="CVS" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['CVS']; ?>" required />

				<input type="Number" id="ff" name="ff[]" placeholder="FF" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['FF']; ?>" required />

				<input type="Number" id="rte" name="rte[]" placeholder="RTE" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['RTE']; ?>" required /><br><br>
				
				<input type="Number" id="wt" name="wt[]" placeholder="Waste" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['Waste']; ?>" required />

				<input type="Number" id="fr" name="fr[]" placeholder="FillRate" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['FillRate']; ?>" required />

				<input type="Number" id="mh" name="mh[]" placeholder="ManHours" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['ManHours']; ?>" required /><br><br>

				<input type="Number" id="ac" name="ac[]" placeholder="AC" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['AC']; ?>" required readonly />
				
				<input type="Number" id="fs" name="fs[]" placeholder="FS" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" value="<?php echo $row[$i]['FS']; ?>" required readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Store</label>

				<div class="controls">

				<input type="text" id="store_name[]" name="store_name[]" placeholder="Store" value="<?php echo $row[$i]['Store_Name']; ?>" required readonly />

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail" >Week & Month</label>

				<div class="controls">
				
					<select name="process_week[]" id="process_week[]" type="text" required>

						<option></option>

						<option>Week 1</option>
						<option>Week 2</option>
						<option>Week 3</option>
						<option>Week 4</option>
						<option>Week 5</option>
						<option>Week 6</option>
						<option>Week 7</option>
						<option>Week 8</option>
						<option>Week 9</option>
						<option>Week 10</option>
						<option>Week 11</option>
						<option>Week 12</option>
						<option>Week 13</option>
						<option>Week 14</option>
						<option>Week 15</option>
						<option>Week 16</option>
						<option>Week 17</option>
						<option>Week 18</option>
						<option>Week 19</option>
						<option>Week 20</option>
						<option>Week 21</option>
						<option>Week 22</option>
						<option>Week 23</option>
						<option>Week 24</option>
						<option>Week 25</option>
						<option>Week 26</option>
						<option>Week 27</option>
						<option>Week 28</option>
						<option>Week 29</option>
						<option>Week 30</option>
						<option>Week 31</option>
						<option>Week 32</option>
						<option>Week 33</option>
						<option>Week 34</option>
						<option>Week 35</option>
						<option>Week 36</option>
						<option>Week 37</option>
						<option>Week 38</option>
						<option>Week 39</option>
						<option>Week 40</option>
						<option>Week 41</option>
						<option>Week 42</option>
						<option>Week 43</option>
						<option>Week 44</option>
						<option>Week 45</option>
						<option>Week 46</option>
						<option>Week 47</option>
						<option>Week 48</option>
						<option>Week 49</option>
						<option>Week 50</option>
						<option>Week 51</option>
						<option>Week 52</option>

				</select>
				<select id="process_month[]" name="process_month[]" type="text" required>

						<option></option>

						<option>January</option>

						<option>February</option>

						<option>March</option>

						<option>April</option>

						<option>May</option>

						<option>June</option>

						<option>July</option>

						<option>August</option>

						<option>September</option>

						<option>October</option>

						<option>November</option>

						<option>December</option>

				</select>
				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail">Time</label>

				<div class="controls">

				<input type="text" id="time" name="time[]" placeholder="Time" value="<?php echo $row[$i]['Time']; ?>" readonly required/>

				</div>

				</div>

				
				<div class="control-group">

				<label class="control-label" for="inputEmail" >Trans Date</label>

				<div class="controls">

				<input type="text" id="Tdate" name="Tdate[]" value="<?php echo $row[$i]['TransDate']; ?>" placeholder="Transaction Date" required/>

				</div>

				</div>

				

				<div class="control-group">

				<label class="control-label" for="inputEmail" >Upload Date</label>

				<div class="controls">

				<input type="text" id="date" name="date[]" placeholder="Upload Date" value="<?php echo $row[$i]['Date']; ?>" readonly required/>

				</div>

				</div>
				
				<div class="control-group">

				<label class="control-label" for="inputEmail" >Upload Date</label>

				<div class="controls">

				<textarea rows="4" cols="40" type="text" id="rm" name="rm[]" placeholder="Remarks" ><?php echo $row[$i]['Remarks']; ?></textarea>
				<div id="status"></div>
				</div>

				</div>

	

				<div class="control-group">

				<div class="controls">
				</div>

				</div>
				
				<input type="hidden" id="area_store" name="area_store[]" placeholder="area" value="<?php echo $row[$i]['Area_Store']; ?>"/>
				<input type="hidden" id="ams" name="ams[]" placeholder="area" value="<?php echo $row[$i]['Am_Name']; ?>"/>

				</form>
</div>
</div>
</table>
</td>
</tr>
<?php
}
}
?>
<tr>
<td colspan="2"><input type="submit" name="register" id="register" value="Submit" class="btn btn-success"> <a class="btn btn-inverse" href="sales.php">Return</a></td>
</tr>
</table>
</div>
</form>
</center>
<script src="../js/checker.js" type="text/javascript"></script>
</body></html>