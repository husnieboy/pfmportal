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

$iuser= $row[1];



if ($level == 1)

	{

		header('location:../admin/');

	}
if ($level == 3)

	{

		header('location:../om/');

	}
if ($level == 4)

	{

		header('location:../am/');

	}

if ($level == 5)

	{

		header('location:../member/');

	}
	
if ($level == 2)

	{

		header('location:../dc/');

	}

if ($level == '')

	{

		header('location:../');

	}



?>
<head>
<link href="../css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
		
<link rel="stylesheet" href="../js/jquery-ui.css">

<script src="../js/jquery-ui.min.js"></script>

<script src="../js/jquery-ui.js"></script>

<script src="../js/simplemath.js"></script>
<center>

			<div id="container">

			<div id="header">

				<div class="alert alert-success"><label>Welcome <?php echo $name ?></label></div>

			</div>

			

			<table>

				<thead>

					<td>

						<tr><a href="index.php">Home</a>  |  </tr>

						<tr><a href="reports.php">Reports</a>  |  </tr>
						
						<tr><a href="myaccount.php">My Account</a>  |  </tr>

						<tr><a href="../logout.php">Logout</a> </tr>

					</td>

				</thead>

			</table>

			<br/>
	
			<table class="table table-bordered">

				<div class="alert alert-success"></div>

			</table>
			
	</center>
    
    <style type="text/css">
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}

.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
body{ background: #EDECEC; padding:20px}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, '');
        });
		
		
    </script>
</head>
<body onload=displayTime();>
	<div class="container">
	<div class="row">
		                                <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Per/Store Logs</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Per/Truck Report</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
										<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered"  id="">

					<thead>

						<tr>

						<th>Store Name</th>
						
						<th>Time In</th>
						
						<th>Time Out</th>
						
						<th>Duration</th>
						
						<th>Trip Ticket</th>

						</tr>

					</thead>

				

					<tbody>
						<form action="" method="POST">
						<input id="Tdate" name="Tdate" placeholder="September-07-2016"/>
						<input type="submit" class="btn" id="sch" name="sch"/>
						</form>

						<?php
						if(isset($_POST['sch'])){
							$datenow=$_POST['Tdate'];
							$datenows=date('F-d-Y');
						$query=mysqli_query($link,"SELECT * FROM dchistory where dh_sname not in('DC - SAN PEDRO') AND dh_date='$datenow'")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						$tp=$row[1];
						?>

						<tr>

						<td><?php echo $row[2]; ?></td>
						
						<td><?php echo $row[4]; ?></td>
						
						<td><?php echo $row[5]; ?></td>
						
						<td><?php echo $row[6]; ?></td>
						
						<td><?php echo $row[8]; ?></td>

						<?php }
						}						
						?>

					</tbody>

				</table>
				</td>
				</tr>
				</table>
										</div>
                                        <div role="tabpanel" class="tab-pane" id="profile">
										<?php 
				$monthsales = date("F");
				$datesales = date("F-d-Y");
			?>
			<?php
				$dateyesterday= isset($_GET['date']) ? $_GET['date'] : date('F-d-Y');
				$yesterday = gmdate('F-d-Y', strtotime($dateyesterday.' -1 day'));
				$date = strtotime('F-d-Y');
			?>
	

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">

				

					<tbody>

						<?php 

						$query=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_status='OPEN' GROUP By trip_no")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						$area = $row['trip_no'];
						$pl_no = $row['pl_no'];

						?>
						<a class="list-group-item active" href="#<?php echo '?area='.$row['trip_no']; ?>"><span class="glyphicon glyphicon-camera"><?php echo $row['trip_no']; ?> |-| <?php echo $row['pl_no']; ?></span><span class="badge">View Report</span></a>
						<?php 

						$queryA=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$area'")or die(mysqli_error());

						while($rowA=mysqli_fetch_array($queryA)){

						?>
						<a class="list-group-item"><span class="glyphicon glyphicon-file"><?php echo $rowA['dh_sname']; ?></span><span class="badge">TIME OUT:<?php echo $rowA['dh_timeout']; ?></span><span class="badge">TIME IN:<?php echo $rowA['dh_timein']; ?></span><span class="badge">DATE:<?php echo $rowA['dh_date']; ?></span></a>
						<?php } ?>
						<?php } ?>

					</tbody>

				</table>	
	</div>
										</div>
                                    </div>
</div>
                                </div>
	</div>
</div>
	<script type="text/javascript">
	
	</script>
</body>
</html>
<style type="text/css">
	.list-group{
		width: 250px;
	}
    .bs-example{
    	margin: 40px;
    }
</style>