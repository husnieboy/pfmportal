

<?php include('db.php');

include('header.php');

session_start();



$user = $_SESSION['user_name'];



$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());



$row=mysqli_fetch_row($login);



$_SESSION['user_id'] = $row[0];



$name = $row[4];

	



if(isset($_POST['user_name']))

{

	$user_name = mysqli_real_escape_string($link,$_POST['user_name']);

	

	if(!empty($user_name))

	{

		$check = mysqli_query($link,"SELECT * FROM user WHERE user_name='$user_name'");

		$user_name_result = mysqli_num_rows($check);

		

		if($user_name_result==0)

		{

			echo "Username Available";

		}

		else if($user_name_result==1)

		{

			echo "Username Not Available";

		}

	}

}



if(isset($_POST['store']))

{

	$datetime = date("F-d-Y");

	$store_name = mysqli_real_escape_string($link,$_POST['store']);

	if(!empty($store_name))

	{

		$check = mysqli_query($link,"SELECT * FROM pfmdcdata WHERE Store='$store_name' And Date='$datetime'");

		$recieved = mysqli_num_rows($check);

		

		$row = mysqli_fetch_row($check);

		

		if($recieved==0)

		{

			echo "";

		}

		else if($recieved==1)

		{

			echo "Delivery Already Received @ $row[5] ";

			

			?>

			<script>

			document.getElementById("driver_code").disabled = true; 

			</script>

		

			<?php

			

		}

	}

}

?>

<?php

if(isset($_POST['date']))

{

	$datetime = mysqli_real_escape_string($link,$_POST['date']);

	if(!empty($datetime))

	{

		$check = mysqli_query($link,"SELECT * FROM pfmsales WHERE Store_Name='$name' And TransDate='$datetime'");

		$recieved = mysqli_num_rows($check);

		

		$row = mysqli_fetch_row($check);

		

		if($recieved==0)

		{

			echo "";

			?>

			<script>

			document.getElementById("register").disabled = false;			

			</script>

			<?php

		}

		else if($recieved==1)

		{

			echo "Transaction Date Already Exist! `$row[6]`";

			

			?>

			<script>

			document.getElementById("register").disabled = true;

			</script>

		

			<?php

			

		}

	}

}

?>

<?php

if(isset($_POST['ticket_date']))

{

	$ticket_date = mysqli_real_escape_string($link,$_POST['ticket_date']);

	if(!empty($ticket_date))

	{

		$check = mysqli_query($link,"SELECT * FROM stores WHERE Store_Name='$name' And Date='$ticket_date'");

		$recieved = mysqli_num_rows($check);

		

		$row = mysqli_fetch_row($check);

		

		if($recieved==0)

		{

			echo "";

			?>

			<script>			

			</script>

			<?php

		}

		else if($recieved==1)

		{

			echo "The Store Already Sent Request for Tags! Dated `$row[4]`";

			

			?>

			<script>

			document.getElementById("Process").style.visibility= 'hidden';

			document.getElementById("bar_code").style.visibility = 'hidden';
			
			document.getElementById("delete").disabled = true;

			</script>

		

			<?php

			

		}

	}

}

?>



<?php

if(isset($_POST['SM']))

{

	$datetime = date("F-d-Y");

	$SM = mysqli_real_escape_string($link,$_POST['SM']);

	if(!empty($SM))

	{

		$check = mysqli_query($link,"SELECT * FROM stores WHERE Store_name='$SM' And Date='$datetime'");

		$recieved = mysqli_num_rows($check);

		

		$rowupdate = mysqli_fetch_array($check);

		

		if($recieved==0)

		{

			echo "Select Store";

			?>

			

			<?php

		}

		else if($recieved==1)

		{

			echo "";

			

			?>

			

			<form class="form-horizontal" action="../export/tags/1/exporttags.php" method="POST">

	

			<input name="Store_master" id="Store_master" type="text" value="<?php echo $rowupdate['Store_Name']; ?>" ReadOnly /></br>

			<select name="ticket_status" id="ticket_status" type="text" required>
			
						<option>PRINTED</option>

						<option>VOIDED NO QTY</option>

			</select></br>

			<input type="text" value="<?php echo $rowupdate['Store_Ticket']; ?>" ReadOnly /></br>

			<input type="text" value="<?php echo $rowupdate['Ticket_QTY']; ?>" ReadOnly /></br>

			<input name="user_id" id="user_id" type="Hidden" value="<?php echo $rowupdate['store_ID'] ?>" />
			
			<select name="color_status" id="color_status" type="text" required>
			<option></option>
				<?php
						$query=mysqli_query($link,"SELECT * FROM pfmtagsreq where Store_Tags_Name='$SM' And Date_Time='$datetime' Group By stclr ");

						while($row=mysqli_fetch_array($query))

				{ ?>
						<option><?php echo $row['stclr'];?></option>
				<?php } ?>
			</select><br><br>
			
			<button type="submit" name="ch" id="ch" class="btn btn-info" >Masterfile</button>



			</form>

		

			<?php

			

		}

	}

}

?>