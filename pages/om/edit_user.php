<?php 
include('header.php');
?>
<body>

<div class="container">
<h1>EDIT USER</h1>

<?php
include('../db.php');
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
if ($level == 4)
	{
		header('location:../am/');
	}
if ($level == 5)
	{
		header('location:../member/');
	}
if ($level == '')
	{
		header('location:../');
	}
	
	$id=$_GET['id'];
	$sql = "SELECT * FROM 
			user 
			 WHERE
			 user_id = $id
			 ";
	$result = mysqli_fetch_array(mysqli_query($link,$sql));

	if(!empty($_GET['error']) && $_GET['error']== '101'){
		$error = "The password did not match!";
	}else{
		$error = "";
	}

	?>
<form class="form-horizontal" action="update_user.php" method="post">    


	<div class="thumbnail">
		<div class="control-group">
	    	<label class="control-label" for="user_name">Username </label>&nbsp;
			<input name="user_name" id="user_name" type="text" value="<?=$result['user_name'] ?>" readonly/><br>
				
			<label class="control-label" for="store_name">Name</label>&nbsp;
			<input name="store_name" id="store_name"  type="text" value="<?=$result['store_name'] ?>" required/><br>
			
			<label class="control-label" for="ams">AM</label>&nbsp;
			<select id="ams_store" name="ams_store" type="text" >
						<option></option>
					<?php 
						$query=mysqli_query($link,"select * from user where user_level='4' ");
						while($row=mysqli_fetch_array($query))
						 { ?>
						<option><?php echo $row['store_name'];?></option>
					<?php } ?>

				</select><br>
					<div class="control-group">
					<label class="control-label" for="inputEmail">Area</label>
					<div class="controls">
						<select id="area_stores" name="area_stores" type="text">
						<option></option>
					<?php 
						$query=mysqli_query($link,"select * from area");
						while($row=mysqli_fetch_array($query))
						 { ?>
						<option><?php echo $row['Area_Name'];?></option>
					<?php } ?>

				</select>
					</div>
					</div>
			
			<label class="control-label" for="user_level">Level</label>&nbsp;
			<input name="user_level" id="user_level" type="text" value="<?=$result['user_level'] ?>" readonly/><br>

		<input name="user_id" type="hidden" value="<?=$id ?>" />
		   </div>
	</div>
	<input  class="btn btn-success" type="submit" name="btn_update" value="update"/>
</form>

</div>
<font color="red" style=" position: relative;left: 400px;"><?=$error ?></font>
</body>
</html>