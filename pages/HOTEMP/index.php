<?php
$u_agent = $_SERVER['HTTP_USER_AGENT']; 
$ub = false; 

if(preg_match('/MSIE/i',$u_agent)) 
{ 
	echo '<script language="javascript">';
	echo 'alert("Error! System Detected IE Browser is Open! Please use Chrome/FireFox Browser Only!")';
	echo '</script>';
	include("errormessage.php");
	exit(0);
}
?>
<?php include('header.php'); 
$login=mysqli_query($link,"select * from user")or die(mysql_error());

$row=mysqli_fetch_row($login);

$level = $row[3];



session_start();

session_destroy();

session_start();			

if (isset($_SESSION['user_name'])){

	if ($level == 1)

		{

			header('location:admin/');

		}

						

	if ($level == 2)

		{

			header('location:dc/');

		}

	if ($level == 3)

		{

			header('location:om/');

		}

	if ($level == 4)

		{

			header('location:am/');

		}
	if ($level == 5)

		{

			header('location:member/');

		}
	if ($level == 6)

		{

			header('location:hr/');

		}

}



?>



	<body>
	<div class="row-fluid">

        <div class="span12">

	<center>

		</br>

		</br>
<table cellpadding="0" cellspacing="0" border="0" class="table-striped table-bordered"  width="20%">
<tr>
<td align="center">
		<div id="container">

			<div id="header">

				<div class="alert alert-success2"><label>System Login</label></div>

			</div>

			

			<form method="post"> 

			<table>

				<tr>

					<td><label>UserName</label></td>

					<td><input type="text" id="user_name" name="user_name" placeholder="Username" required></td>

				</tr>

				

				<tr>

					<td><label>Password</label></td>

					<td><input type="password" id="password" name="password" placeholder="Password" required></td>

				</tr>

				

				<tr>

					<td></td>

					<td><button type="submit" id="submit" name="submit" class="btn btn-success">Login</button></td>

				</tr>

				

			

			</table>

			</form>		

			<?php

				if (isset($_POST['submit'])){

				$username=$_POST['user_name'];

				$password=($_POST['password']);

				

				$login=mysqli_query($link,"select * from user where user_name='$username' and user_password='$password'")or die(mysqli_error());

				$count=mysqli_num_rows($login);

				

				$row=mysqli_fetch_row($login);

				$level = $row[3];

				

				

				if ($count > 0){

				

				$_SESSION['user_name']=$row[1];

					if ($level == 1)

						{

							header('location:admin/');

						}

						

					if ($level == 2)

						{

							header('location:dc/');

						}

					if ($level == 3)

						{

							header('location:om/');

						}

					if ($level == 4)

						{

							header('location:am/');

						}
					if ($level == 5)

						{

							header('location:member/');

						}	

					if ($level == 6)

						{

							header('location:hr/');

						}

				}

				

				else{ ?>

				<script type="text/javascript">

					alert("Error Login! Wrong Combination of Username and Password!");

				</script>

				<!--<div class="alert alert-error">Error login! Please check your username or password</div>

				--><?php

				}}

				?>

				

				

			

				

		</div>

	

	

	</center>

</div>

</div>
	</body>
<footer class="modal-footer"><i>PFM IT Dept.</i></footer>
</td>
</tr>
</table>
</html>