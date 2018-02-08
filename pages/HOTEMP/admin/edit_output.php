<?php 
include('header.php');
include('../useradmin.php');
?>
<body>
<br/>
<center>
<div id="header">
	<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>
</div>
<div class="container">

<?php
include('../db.php');

	$id=$_GET['id'];
	$sql = "select * FROM pfmdcdata where ID=$id";
	$result = mysqli_fetch_array(mysqli_query($link,$sql));

	?>
	<form class="form-horizontal" action="update_output.php" method="POST">
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Driver's Code</label>
				<div class="controls">
				<input type="text" id="driver_code" name="driver_code" placeholder="Driver's Code" value="<?php echo $result[1] ?>" required />
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Store</label required>
				<div class="controls">
				<input type="text" id="store" name="store" placeholder="Store" value="<?php echo $result[2] ?>" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Time</label>
				<div class="controls">
				<input type="text" id="time" name="time" placeholder="Time" value="<?php echo $result[3] ?>" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail" >Date</label>
				<div class="controls">
				<input type="text" id="date" name="date" placeholder="Date" value="<?php echo $result[4] ?>"  required>
				</div>
				</div>
				
				
				<div class="control-group">
				<div class="controls">
				<input name="up_id" type="hidden" value="<?= $id ?>" />
				</div>
				</div>
				<button type="submit" class="btn btn-info">update</button>
				<a href="output.php" class="btn btn-inverse">return</a>
				</form>
		


</div>
</center>
</body>
</html>