<?php 
include('header.php');
?>
<body>

<div class="container">
<h1>DELETE USER</h1>

<?php
include('../db.php');

include('../userom.php'); 

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
<form class="form-horizontal" action="delete_confirm.php<?php echo '?id='.$result['user_id']; ?>" method="post">    


	<div class="thumbnail">
		<div class="control-group">
	    	<label class="control-label" for="user_name">Username </label>&nbsp;
			<input name="user_name" id="user_name" type="text" value="<?=$result['user_name'] ?>" readonly/><br>
				
			<label class="control-label" for="store_name">Name</label>&nbsp;
			<input name="store_name" id="store_name"  type="text" value="<?=$result['store_name'] ?>" readonly /><br>
			
			<label class="control-label" for="ams">AM</label>&nbsp;
			<select id="ams_store" name="ams_store" type="text" readonly >
						<option><?=$result['ams'] ?></option>
				</select><br>
					<div class="control-group">
					<label class="control-label" for="inputEmail">Area</label>
					<div class="controls">
						<select id="area_stores" name="area_stores" type="text" readonly>
						<option><?=$result['area_stores'] ?></option>
				</select>
					</div>
					</div>
			
			<label class="control-label" for="user_level">Level</label>&nbsp;
			<input name="user_level" id="user_level" type="text" value="<?=$result['user_level'] ?>" readonly /><br>

		<input name="user_id" type="hidden" value="<?=$id ?>" />
		   </div>
	</div>
	<input  class="btn btn-danger" type="submit" name="btn_update" value="Delete"/>
</form>
</div>
<font color="red" style=" position: relative;left: 400px;"><?=$error ?></font>
</body>
</html>