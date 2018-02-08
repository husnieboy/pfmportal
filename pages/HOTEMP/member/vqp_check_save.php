<?php
include('../db.php');
$vqp_id=$_POST['vqp_id'];
$vqp_code=$_POST['vqp_code'];
$vqp_name=$_POST['vqp_name'];
$vqp_password=$_POST['vqp_password'];
$vqp_store=$_POST['vqp_store'];
$vqp_position=$_POST['vqp_position'];
$vqp_date=$_POST['vqp_date'];
$vqp_status=$_POST['vqp_status'];
$rdate=$_POST['rdate'];

$result = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_name='$vqp_name'");
$row = mysqli_fetch_array($result);

if(isset($_POST['vqp_name'],$_POST['vqp_code']))
{
$check= mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_code='$vqp_code' Or vqp_password='$vqp_password'");
$data = mysqli_fetch_array($check, MYSQLI_NUM);
if($data[0] > 1) {
    
	?>

			<?php
			if(isset($_POST['vqp_code']))
			{
				$check= mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_code='$vqp_code' Or vqp_password='$vqp_password'");
				$data = mysqli_fetch_array($check, MYSQLI_NUM);
				if($data[0] > 1) {
			?>
		
		
			<script type="text/javascript">
			window.onload = function(){
			document.forms['list'].submit()

			}
			</script>
		<form name="list" id="list" class="form-horizontal" method="post" action="vqp_check_save.php"> 
			
			<?php
			$query  = mysqli_query($link,'SELECT MAX(vqp_code) FROM vqpusers');
			$row=mysqli_fetch_row($query);
			$last_id =  $row[0];
			$next_id = $last_id+1;
			$random_string_length =7;
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
			$string = '';
			for ($i = 0; $i < $random_string_length; $i++) {
			$string .= $characters[rand(0, strlen($characters) - 1)];
			}
			?>



					<div class="thumbnail">
					<div class="control-group">
					<label class="control-label"  for="inputEmail"></label>
					<div class="controls">
					<input name="vqp_code" id="vqp_code" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Code" value="<?php echo $next_id ?>" readonly />
					</div>
					</div>

					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
					<input name="vqp_password" id="vqp_password" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Password" value="<?php echo $vqp_password ?>" required />
					</div>
					</div>

					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input name="vqp_name" id="vqp_name" pattern="^[A-z][a-zA-Z\s]*$" maxlength="20" type="hidden" placeholder="Full Name" value="<?php echo $vqp_name ?>" required />
					</div>
					</div>

					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input name="vqp_store" id="vqp_store" maxlength="50" type="hidden" value="<?php echo $vqp_store ?>" placeholder="Store"  readonly />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input id="vqp_position" name="vqp_position" type="hidden" value="<?php echo $vqp_position ?>" required >
					</div>
					</div>

					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input name="vqp_date" id="vqp_date" pattern="^([a-zA-Z]+)-[0-9]{2}-[0-9]{4}$" maxlength="20" type="hidden" placeholder="EOC" value="<?php echo $vqp_date ?>" required />
					</div>
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input id="vqp_position" name="vqp_position" type="hidden" value="<?php echo $vqp_position ?>" required >
					</div>
					</div>
					
					<input name="vqp_ams" id="vqp_ams" maxlength="20" type="hidden" placeholder="EOC" value="<?php echo $vqp_ams ?>" required />
					<br>
				<input name="vqp_status" id="vqp_status" type="hidden" value="Pending" placeholder="Status" required />
				<input name="rdate" id="rdate" maxlength="20" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />
				<div id="status"></div><br>

				</form>
			<?php
				}
				}				
			?>

	<?php
				}
				
$check= mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_name='$vqp_name'");
$data = mysqli_fetch_array($check, MYSQLI_NUM);
if($data[0] > 1) {
    
	?>
	
		<script type="text/javascript">

					window.alert("Name Already Exist!!");
					window.location.href='vqpcodereq.php';

				</script>

	<?php
				}
				

if($data[0] < 1)
{
	
  $result = mysqli_query($link,"UPDATE vqpusers SET vqp_code='$vqp_code', vqp_password='$vqp_password', vqp_store='$vqp_store', vqp_position='$vqp_position', vqp_date='$vqp_date', vqp_status='$vqp_status', rDate='$rdate' where vqp_id='$vqp_id'")or die(mysqli_error());

	?>

				<script type="text/javascript">

					window.alert("Code Request Successfully Uploaded!!");
					window.location.href='vqpcodereq.php';

				</script>

	<?php
}
}
?>