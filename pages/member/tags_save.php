<?php include('../db.php');
include('header.php');
$bar_code =$_POST['bar_code'];
session_start();
$user = $_SESSION['user_name'];
$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
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
if ($level == 3)
	{
		header('location:../om/');
	}
if ($level == 4)
	{
		header('location:../am/');
	}
if ($level == '')
	{
		header('location:../');
	}
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