<?php include('../db.php');
include('header.php');
$bar_code =$_POST['bar_code'];
$storecode =$_POST['storecode'];
session_start();
$user = $_SESSION['user_name'];
$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];
$name = $row[4];
$sn = $row[8];

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
<head>

<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>
<body>
<?php
$result = mysqli_query($link,"SELECT * FROM basedata WHERE BarCode='$bar_code'");
$row = mysqli_fetch_array($result);

if(isset($_POST['bar_green'])){
	$tagscolorgreen = $_POST['bar_green'];
}
if(isset($_POST['bar_blue'])){
	$tagscolorblue = $_POST['bar_blue'];
}
if(isset($_POST['bar_purple'])){
	$tagscolorpurple = $_POST['bar_purple'];
}
if(isset($_POST['bar_code']))
{
$check= mysqli_query($link,"SELECT * FROM basedata WHERE BARCODE='$bar_code' AND STORECODE='$storecode'");
$data = mysqli_fetch_array($check, MYSQLI_NUM);
if($data[0] > 1) {
	
    
			?>
			<?php
			if(isset($_POST['bar_green']) && $_POST['bar_green']  == "GREEN")
			{?>
			<script type="text/javascript">
			window.onload = function(){
			document.forms['list'].submit()

			}

				</script>
			<form name="list" id="list" class="form-horizontal" method="post" action="tags_save.php"> 
			
			<input name="bar_code" id="bar_code" type="Hidden" placeholder="" value="<?php echo $bar_code ?>" required />
			<input name="storecode" id="storecode" type="Hidden" placeholder="" value="<?php echo $storecode ?>" required />

			<div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_barcode" id="tags_barcode" type="hidden" placeholder="" value="<?php echo $bar_code ?>" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_description" id="tags_description"  type="hidden" placeholder="" value="<?php echo $row[2]; ?>" required />

					</div>

					</div>
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_retail" id="tags_retail" type="hidden" placeholder="" value="<?php echo $row[3]; ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_store" id="tags_store" type="hidden" placeholder="" value="<?php echo $name ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="tags_date" id="tags_date" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="sn" id="sn" type="hidden" placeholder="" value="<?php echo $sn ?>" required />
					<input  name="bar_color" id="bar_color" type="hidden" placeholder="" value="<?php echo $tagscolorgreen ?>" required />

					</div>

					</div>

			<?php
			} 
			?>
			<?php
			if(isset($_POST['bar_blue']) && $_POST['bar_blue'] == "BLUE")
			{?>
			<script type="text/javascript">
			window.onload = function(){
			document.forms['list'].submit()

			}

				</script>
			<form name="list" id="list" class="form-horizontal" method="post" action="tags_save.php"> 
			
			<input name="bar_code" id="bar_code" type="Hidden" placeholder="" value="<?php echo $bar_code ?>" required />

			<div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_barcode" id="tags_barcode" type="hidden" placeholder="" value="<?php echo $bar_code ?>" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_description" id="tags_description"  type="hidden" placeholder="" value="<?php echo $row[2]; ?>" required />

					</div>

					</div>
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_retail" id="tags_retail" type="hidden" placeholder="" value="<?php echo $row[3]; ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_store" id="tags_store" type="hidden" placeholder="" value="<?php echo $name ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="tags_date" id="tags_date" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="sn" id="sn" type="hidden" placeholder="" value="<?php echo $sn ?>" required />
					<input  name="bar_color" id="bar_color" type="hidden" placeholder="" value="<?php echo $tagscolorblue ?>" required />

					</div>

					</div>

			<?php
			} 
			?>
			<?php
			if(isset($_POST['bar_purple']) && $_POST['bar_purple'] == "PURPLE")
			{?>
			<script type="text/javascript">
			window.onload = function(){
			document.forms['list'].submit()

			}

				</script>
			<form name="list" id="list" class="form-horizontal" method="post" action="tags_save.php"> 
			
			<input name="bar_code" id="bar_code" type="Hidden" placeholder="" value="<?php echo $bar_code ?>" required />

			<div class="thumbnail">

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_barcode" id="tags_barcode" type="hidden" placeholder="" value="<?php echo $bar_code ?>" required />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_description" id="tags_description"  type="hidden" placeholder="" value="<?php echo $row[2]; ?>" required />

					</div>

					</div>
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_retail" id="tags_retail" type="hidden" placeholder="" value="<?php echo $row[3]; ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="tags_store" id="tags_store" type="hidden" placeholder="" value="<?php echo $name ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="tags_date" id="tags_date" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />

					</div>

					</div>
					
					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input  name="sn" id="sn" type="hidden" placeholder="" value="<?php echo $sn ?>" required />
					<input  name="bar_color" id="bar_color" type="hidden" placeholder="" value="<?php echo $tagscolorpurple ?>" required />

					</div>

					</div>

			<?php
			} 
			?>
			<?php
}	

if($data[0] < 1)
{
	?>

				<script type="text/javascript">

					window.alert("BarCode Not Found!!");
					window.location.href='storetags.php';

				</script>

	<?php
}
}
?>
