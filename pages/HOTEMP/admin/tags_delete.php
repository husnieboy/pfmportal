<?php 
include('header.php');
?>
<body>

<div class="container">
<h1>DELETE</h1>

<?php
include('../db.php');
include('../useradmin.php');
	$id=$_GET['id'];
	$sql = "SELECT * FROM 
			stores 
			 WHERE
			 store_ID = $id
			 ";
	$result = mysqli_fetch_array(mysqli_query($link,$sql));

	if(!empty($_GET['error']) && $_GET['error']== '101'){
		$error = "The password did not match!";
	}else{
		$error = "";
	}

	?>
<form class="form-horizontal" action="tags_delete_confirm.php<?php echo '?id='.$result['store_ID']; ?>" method="post">    


	<div class="thumbnail">
		<div class="control-group">
	    	
			<input type="text" value="<?=$result['Store_Name'] ?>" readonly /><br>
				
			
			<input type="text" value="<?=$result['Store_Ticket'] ?>" readonly /><br>
			
		<input name="user_id" type="hidden" value="<?=$id ?>" />
		   </div>
	</div>
	<input  class="btn btn-danger" type="submit" name="btn_update" value="Delete"/>
</form>
</div>
<font color="red" style=" position: relative;left: 400px;"><?=$error ?></font>
</body>
</html>