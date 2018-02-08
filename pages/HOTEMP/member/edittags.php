<?php include('../db.php');

include('header.php');
include('../usermember.php');
include('../javascript.php');

?>
<?php

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["tags_id"]);
for($i=0;$i<$usersCount;$i++) {
mysqli_query($link,"UPDATE pfmtagsreq set BarCode='" . $_POST["BarCode"][$i] . "', Item_Description='" . $_POST["Item_Description"][$i] . "', Unit_retail='" . $_POST["Unit_retail"][$i] . "', Store_Tags_Name='" . $_POST["Store_Tags_Name"][$i] . "' WHERE tags_id='" . $_POST["tags_id"][$i] . "'");
}
header("Location:storetags.php");
}
?>
<html>
<head>
<title>Edit Multiple</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<center>
<form method="post" action="">
<div style="width:500px;">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" align="center">
<tr class="tableheader">
<td><div class="alert alert-success"><label>EDIT PRICE TAGS</label></div></td>
</tr>
<?php
if(isset($_POST["tags_id"])) {
$rowCount = count($_POST["tags_id"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysqli_query($link,"SELECT * FROM pfmtagsreq WHERE tags_id='" . $_POST["tags_id"][$i] . "'");
$row[$i]= mysqli_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label></label></td>
<td><input type="hidden" name="tags_id[]" class="txtField" value="<?php echo $row[$i]['tags_id']; ?>"></td>
</tr>
<div class="control-group">

<label class="control-label" for="inputEmail">BarCode</label>

<div class="controls">

<input type="text" name="BarCode[]" class="txtField" value="<?php echo $row[$i]['BarCode']; ?>" readonly>

</div>
</div>

<div class="control-group">

<label class="control-label" for="inputEmail">Item Description</label>

<div class="controls">

<input type="text" name="Item_Description[]" class="txtField" value="<?php echo $row[$i]['Item_Description']; ?>" readonly>

</div>
</div>

<div class="control-group">

<label class="control-label" for="inputEmail">Store</label>

<div class="controls">

<input type="text" name="Store_Tags_Name[]" class="txtField" value="<?php echo $row[$i]['Store_Tags_Name']; ?>" readonly>

</div>
</div>

<div class="control-group">

<label class="control-label" for="inputEmail">Unit retail</label>

<div class="controls">

<input type="text" name="Unit_retail[]" class="txtField" value="<?php echo $row[$i]['Unit_retail']; ?>" required>

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
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-success"> <a class="btn btn-inverse" href="storetags.php">Return</a></td>
</tr>
</table>
</div>
</form>
</center>
</body></html>