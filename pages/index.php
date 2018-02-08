<?php include('../db.php');

include('header.php'); 

include('../javascript.php');
session_start();

$user = $_SESSION['user_name'];

$login=mysqli_query($link,"select * from user where user_name='$user'")or die(mysqli_error());

$row=mysqli_fetch_row($login);

$_SESSION['user_id'] = $row[0];

$level = $row[3];

$name = $row[4];



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
if ($level == '')

	{

		header('location:../');

	}


?>

<head>

<link href="../css1/bootstrap.min.css" rel="stylesheet" />
<link href="../css/navbar-fixed-side.css" rel="stylesheet" />
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

</head>

	<body onload="displayTimeBig();">

	<center>

		</br>

		</br>
		
<div class="row">
    <div class="col-sm-3 col-lg-2">
	  <div class="container-fluid">
	<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">HOME<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
        
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">FORMS<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-credit-card"></span></a>
        <ul class="dropdown-menu forAnimate" role="menu">
						
		<li><a href="myaccount.php">STORE ACCOUNT</a></li>

		<li><a href="storetags.php">TAG REQUEST FORM</a></li>
						
		<li><a href="trucks.php">DELIVERY DETAILS FORM</a></li>

		<li><a href="vqpcodereq.php">VQP REQUEST FORM</a></li>

         </ul>
        </li>          
        <li ><a href="../logout.php">LOGOUT<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-fire"></span></a></li>
      </ul>
    </div>
  </div>
 </div>
    <div class="col-sm-9 col-lg-10">

			<div id="container">

			<div id="header">

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

			</div>

			

			<table>


			</table>

			<table class="">

				<div class="alert alert-success">Time</div>

			</table>

			<div style="float:center;">

				<br>

				<br>

				<br>

				<span id="CountTime" ></span>

				<br>

				<br>

				<br>
			</div>
		<center>
			<table cellpadding="0" cellspacing="0" border="0" >
			<div class="bs-example" style="float:left;">
			<div class="list-group">
			<!--<div class="alert alert-success"><label>WHAT IS HOT</label></div>
			</div>	class="table table-striped table-bordered"
			</div>
			
			<div class="bs-example" style="float:right;">
			<div class="list-group">
			<div class="alert alert-success"><label>WHAT IS NEW</label></div>
			</div>
			</div>
			</table>-->
		</center>
		<center>

			
			<table cellpadding="0" cellspacing="0" border="0">
			<tr>
			<canvas id="tree" width='400px' height='400px'></canvas>
			<td>
			</tr>
			</table>
		</center>
			<?php
			//include('../cm.php');
			?>
			</body>
</div>
</div>
</div>
			<div class="modal-footer"><i>PFM IT Dept.</i></div>
			

<script type="text/javascript" src="../js/--snowstorm.js"></script>
<script src="../js/--forchristmas.js" type="text/javascript"></script>
<style type="text/css">
	.list-group{
		width: 450px;
	}
    .bs-example{
    	margin: 85px;
    }
</style>
</html>