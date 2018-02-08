<?php include('../db.php');
include('header.php');
$bar_code =$_POST['bar_code'];
include('../usermember.php');
if($bar_code == '')
{
	header('location:storetags.php');
}
include('../javascript.php'); 
?>

<?php
	
if (isset($_POST['tags_barcode'])){
				
$tags_barcode=$_POST['tags_barcode'];

$tags_description=$_POST['tags_description'];

$tags_retail=$_POST['tags_retail'];

$tags_store=$_POST['tags_store'];
				
$tags_date=$_POST['tags_date'];	

$sn = $_POST['sn'];

$bar_color = $_POST['bar_color'];
				
$reslut = mysqli_query($link,"INSERT INTO pfmtagsreq (BarCode,Item_Description,Unit_retail,Store_Tags_Name,Date_Time,SN,stclr) values('$tags_barcode','$tags_description','$tags_retail','$tags_store','$tags_date','$sn','$bar_color')")or die(mysqli_error());
?>
<?php 
if($bar_color == "GREEN")
{	
?>
<script type="text/javascript">
window.location.href='storetags.php';
</script>
<?php
}
?>
<?php 
if($bar_color == "BLUE")
{	
?>
<script type="text/javascript">
window.location.href='storetagsblue.php';
</script>
<?php
}
?>
<?php 
if($bar_color == "PURPLE")
{	
?>
<script type="text/javascript">
window.location.href='storetagspurple.php';
</script>
<?php
}
?>
<?php
}
?>