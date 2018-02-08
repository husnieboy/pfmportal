<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['user_name'];
$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];
$name = $row[4];

if ($level == 1)
	{
		header('location:../admin/index.php');
	}
if ($level == 3)
	{
		header('location:../member/index.php');
	}
if ($level == '')
	{
		header('location:../index.php');
	}
?>
<body>

	<center>

		</br>

		</br>

	<div id="container">

			<div id="header">

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

			</div>

			

			<table>

				<thead>

					<td>

						<tr><a href="index.php">Home</a>  |  </tr>

						<tr><a href="myaccount.php">My Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a>  |  </tr>

					</td>

				</thead>

			</table>

			<br/>
	</div>
			<?php 
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
	<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered">
<tr class="tableheader">
<td><div class="alert alert-success"><label>EDIT PRICE TAGS</label></div></td>
</tr>
<tr>
<td align="center">
<label for="inputEmail">Store Master File Tags</label>

					<div>

						<select id="SM" name="SM" type="text" required>

						<option></option>

					<?php 

						$query=mysqli_query($link,"select * from stores where Date='$datesales' And Ticket_Status='SUBMITTED'");

						while($row=mysqli_fetch_array($query))

						 { ?>

						<option value="<?php echo $row['Store_Name'];?>"><?php echo $row['Store_Name'];?></option>
						
						<?php } ?>
						
					</select>
					
				</div>
	<div id="status"></div>
				<br/>
<tr>
<td><p><b>Note:</b><br/> <i>Only File With Date <?php echo $datesales ?> Will Be Downloaded!!<br/> This is Per Day Request Only!!</i></p>
</td>
</tr>
</table>

<script src="../js/checker.js" type="text/javascript"></script>