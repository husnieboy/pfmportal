<?php include('db.php');

include('header.php');

?>

<?php

if(isset($_POST['vqp_code']))

{

	$vqp_code = mysqli_real_escape_string($link,$_POST['vqp_code']);

	

	if(!empty($vqp_code))

	{

		$check = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_code='$vqp_code'");

		$user_name_result = mysqli_num_rows($check);

		

		if($user_name_result==0)

		{

			echo '<span style="color:#0045FF;text-align:center;">Code is Available</span>';

		}

		else if($user_name_result==1)

		{

			echo '<span style="color:#FF0000;text-align:center;">Code is not Available</span>';

		}

	}

}

?>

<?php

if(isset($_POST['vqp_password']))

{

	$vqp_password = mysqli_real_escape_string($link,$_POST['vqp_password']);

	

	if(!empty($vqp_password))

	{

		$check = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_password='$vqp_password'");

		$user_name_result = mysqli_num_rows($check);

		

		if($user_name_result==0)

		{

			echo '<span style="color:#0045FF;text-align:center;"></span>';

		}

		else if($user_name_result==1)

		{

			echo '<span style="color:#FF0000;text-align:center;">Password is not Secured Are You Sure You Want to Use this Password??</span>';

		}

	}

}

?>

<?php

	

if(isset($_POST['vqp_name_select']))

{

	

	$vqp_name_select = mysqli_real_escape_string($link,$_POST['vqp_name_select']);

	if(!empty($vqp_name_select))

	{

		$check = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_name='$vqp_name_select'");
		$row_name=mysqli_fetch_array($check);
		$user_name_result = mysqli_num_rows($check);

		

		if($user_name_result==0)

		{

			echo '<span style="color:#0045FF;text-align:center;"></span>';

		}

		else if($user_name_result==1)

		{

			echo '<span style="color:#FF0000;text-align:center;"></span>';

		

		?>

		<?php 

		$transname = $_POST['vqp_name_select'];

		$c = mysqli_query($link,"SELECT * FROM vqpusers WHERE vqp_name='$transname'");

		$rows = mysqli_fetch_row($c);

		$vqp_id = $rows[0];

		$vqp_store = $rows[4];

		?>

		

		<form class="form-horizontal" action="vqp_check_save.php" method="post"> 

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





					<input name="vqp_code" id="vqp_code" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Code" value="<?php echo $next_id ?>" readonly />

					<input name="vqp_password" id="vqp_password" pattern="^[0-9]*$" type="hidden" maxlength="4" minlength="4" placeholder="Password" value="<?php echo $string; ?>" required />

					<br>
						<p style="color:black;font-size:90%"><i>SELECT STORE</i></p>
						<select id="vqp_store" name="vqp_store" type="text" required>

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from user where user_level='5' ");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option><?php echo $row['store_name'];?></option>

					<?php } ?>
					</select>
					<br>
					<br>
						<p style="color:black;font-size:90%"><i>POSITION</i></p>
						<select id="vqp_position" name="vqp_position" type="text" required >



						<option></option>

						<option>Store Officer</option>

						<option>Team Leader</option>

						<option>Cashier</option>



						</select>

					<br>
					<br>
					<p style="color:black;font-size:90%"><i>CODE EXPIRATION</i></p>
					<input name="vqp_date" id="vqp_date" pattern="^([a-zA-Z]+)-[0-9]{2}-[0-9]{4}$" maxlength="20" type="text" placeholder="EOC" 
					value="<?php $datetime = new DateTime();
					$datetime->add(new DateInterval('P6M'));
					echo $datetime->format('F-d-Y'); ?>" required readonly />
					<p style="color:red;font-size:80%"><i>Automatic Date Pick (6)months</i></p>
					



					<br>
				<input name="vqp_id" id="vqp_id" maxlength="20" type="hidden" placeholder="" value="<?php echo $row_name['vqp_id']; ?>" required />
				<input name="rdate" id="rdate" maxlength="20" type="hidden" placeholder="" value="<?php echo date("F-d-Y"); ?>" required />
				<input name="vqp_status" id="vqp_status" type="hidden" value="Pending" placeholder="Status" required />
				<input name="vqp_name" id="vqp_name" pattern="^[A-z][a-zA-Z\s]*$" maxlength="50" type="hidden" placeholder="Full Name" required />
						

				<div id="status"></div><br>

				<input name="vqpregister" id="vqpregister" class="btn btn-success" type="submit"  value="Request" />

				</form>

		

		<?php

		}

	}

}

?>