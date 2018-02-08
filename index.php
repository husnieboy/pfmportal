



	<body><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PFM Portal System - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="./pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./pages/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./pages/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="user_name" placeholder="User" name="email" type="user" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" Value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./pages/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./pages/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./pages/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./pages/dist/js/sb-admin-2.js"></script>

</body>

</html>

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
<?php include('db.php');
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
	if ($level == 7)

		{

			header('location:so/');

		}

}



?>
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

							header('location:pages/admin/');

						}

						

					if ($level == 2)

						{

							header('location:pages/dc/');

						}

					if ($level == 3)

						{

							header('location:pages/om/');

						}

					if ($level == 4)

						{

							header('location:pages/am/');

						}
					if ($level == 5)

						{

							header('location:pages/member/');

						}	

					if ($level == 6)

						{

							header('location:pages/hr/');

						}
					if ($level == 7)

						{

						header('location:pages/so/');

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