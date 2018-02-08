<?php

include('../db.php');

$store_name=$_POST['store_name'];

$ticket_status=$_POST['ticket_status'];

$store_ticket=$_POST['store_ticket'];

$ticket_date=$_POST['ticket_date'];

$time=$_POST['time'];

$ticket_QTY=$_POST['ticket_QTY'];



if(isset($_POST['store_name'],$_POST['store_ticket']))

{

$check= mysqli_query($link,"SELECT * FROM stores WHERE Store_Ticket='$store_ticket'");

$data = mysqli_fetch_array($check, MYSQLI_NUM);

if($data[0] > 1) {

    

	?>



			<?php

			if(isset($_POST['store_ticket']))

			{

				$check= mysqli_query($link,"SELECT * FROM stores WHERE Store_Ticket='$store_ticket'");

				$data = mysqli_fetch_array($check, MYSQLI_NUM);

				if($data[0] > 1) {

			?>

		

		

			<script type="text/javascript">

			window.onload = function(){

			document.forms['list'].submit()



			}

			</script>

		<form name="list" id="list" class="form-horizontal" method="post" action="tagsprocess.php"> 

			

			<?php

			$query  = mysqli_query($link,'SELECT MAX(store_ticket) FROM stores');

			$row=mysqli_fetch_row($query);

			$last_id =  $row[0];

			$next_id = $last_id+1;

			?>







					<div class="thumbnail">

					<div class="control-group">

					<label class="control-label"  for="inputEmail"></label>

					<div class="controls">

					<input name="store_ticket" id="store_ticket" pattern="^[0-9]*$" type="hidden" placeholder="" value="<?php echo $next_id ?>" readonly />

					</div>

					</div>



					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

					<input name="store_name" id="store_name" type="hidden" placeholder="" value="<?php echo $store_name ?>" required />

					</div>

					</div>



					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

						<input name="ticket_status" id="ticket_status" type="hidden" placeholder="" value="<?php echo $ticket_status ?>" required />

					</div>

					</div>



					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

						<input name="ticket_date" id="ticket_date" type="hidden" value="<?php echo $ticket_date ?>" placeholder=""  readonly />

					</div>

					</div>

					

					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

						<input id="time" name="time" type="hidden" value="<?php echo $time ?>" required >

					</div>

					</div>



					<div class="control-group">

					<label class="control-label" for="inputEmail"></label>

					<div class="controls">

						<input name="ticket_QTY" id="ticket_QTY" type="hidden" placeholder="" value="<?php echo $ticket_QTY ?>" required />

					</div>

					</div>

					</div>

					<br>

				</form>

			<?php

				}

				}				

			?>



	<?php

				}

				

$check= mysqli_query($link,"SELECT * FROM stores WHERE Date='$ticket_date' AND Store_Name='$store_name'");

$data = mysqli_fetch_array($check, MYSQLI_NUM);

if($data[0] > 1) {

    

	?>

	

		<script type="text/javascript">



					window.alert("Request for <?php echo date("F-d-Y"); ?> already exist!!");

					window.location.href='storetags.php';



				</script>



	<?php

				}

				



if($data[0] < 1)

{

	

  mysqli_query($link,"INSERT INTO stores (Store_Name,Store_Ticket,Ticket_Status,Date,Time,Ticket_QTY) values('$store_name','$store_ticket','$ticket_status','$ticket_date','$time','$ticket_QTY')")or die(mysqli_error());



	?>



				<script type="text/javascript">



					window.alert("Request Successfully Submitted!!");

					window.location.href='storetags.php';



				</script>



	<?php

}

}

?>