<?php



	include('../db.php');



	if(isset($_GET['id']))

	{

		//GREEN BLUE PURPLE

		if($_GET['green']=="PRINTED" && $_GET['blue']=="PRINTED" && $_GET['purple']=="PRINTED")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$green=$_GET['green'];

		$blue=$_GET['blue'];

		$purple=$_GET['purple'];

		$status=$_GET['status'];

		

		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$green', stclrblue='$blue', stclrpurple='$purple' WHERE store_ID='$store_ID'";



		$result = mysqli_query($link,$sql);

		header( 'Location: tagsdownload.php' ) ;

		}

		

		//NOQTY

		if($_GET['green']=="" && $_GET['blue']=="" && $_GET['purple']=="")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$green=$_GET['green'];

		$blue=$_GET['blue'];

		$purple=$_GET['purple'];

		$status=$_GET['status'];

		

		$sql = "UPDATE stores SET Ticket_Status='$noqty', stclrgreen='$noqty', stclrblue='$noqty', stclrpurple='$noqty' WHERE store_ID='$store_ID'";



		$result = mysqli_query($link,$sql);

		header( 'Location: tagsdownload.php' ) ;

		}

		

		//blue

		if($_GET['green']=="" && $_GET['blue']=="PRINTED" && $_GET['purple']=="")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$blue=$_GET['blue'];

		$status=$_GET['status'];



		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$noqty', stclrblue='$blue', stclrpurple='$noqty' WHERE store_ID='$store_ID'";

		

		$result = mysqli_query($link,$sql);

		

		header( 'Location: tagsdownload.php' ) ;

		}
			
		

		//bluePurple

		if($_GET['green']=="" && $_GET['blue']=="PRINTED" && $_GET['purple']=="PRINTED")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$blue=$_GET['blue'];

		$purple=$_GET['purple'];

		$status=$_GET['status'];



		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$noqty', stclrblue='$blue', stclrpurple='$purple' WHERE store_ID='$store_ID'";

		

		$result = mysqli_query($link,$sql);

		

		header( 'Location: tagsdownload.php' ) ;

		}
		
		
		
		//blueGreen

		if($_GET['green']=="PRINTED" && $_GET['blue']=="PRINTED" && $_GET['purple']=="")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$blue=$_GET['blue'];

		$green=$_GET['green'];

		$status=$_GET['status'];



		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$green', stclrblue='$blue', stclrpurple='$noqty' WHERE store_ID='$store_ID'";

		

		$result = mysqli_query($link,$sql);

		

		header( 'Location: tagsdownload.php' ) ;

		}


		
		//GreenPurple

		if($_GET['green']=="PRINTED" && $_GET['blue']=="" && $_GET['purple']=="PRINTED")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$purple=$_GET['purple'];

		$green=$_GET['green'];

		$status=$_GET['status'];



		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$green', stclrblue='$noqty', stclrpurple='$purple' WHERE store_ID='$store_ID'";

		

		$result = mysqli_query($link,$sql);

		

		header( 'Location: tagsdownload.php' ) ;

		}





		

		//green

		if($_GET['green']=="PRINTED" && $_GET['blue']=="" && $_GET['purple']=="")

		{



		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$green=$_GET['green'];

		$blue=$_GET['blue'];

		$purple=$_GET['purple'];

		$status=$_GET['status'];

		

		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$green', stclrblue='$noqty', stclrpurple='$noqty' WHERE store_ID='$store_ID'";



		$result = mysqli_query($link,$sql);

		header( 'Location: tagsdownload.php' ) ;

		}

		

		//purple

		if($_GET['green']=="" && $_GET['blue']=="" && $_GET['purple']=="PRINTED")

		{

			

		$noqty="NO QTY";

		

		$store_ID=$_GET['id'];

		$green=$_GET['green'];

		$blue=$_GET['blue'];

		$purple=$_GET['purple'];

		$status=$_GET['status'];

		

		$sql = "UPDATE stores SET Ticket_Status='$status', stclrgreen='$noqty', stclrblue='$noqty', stclrpurple='$purple' WHERE store_ID='$store_ID'";



		$result = mysqli_query($link,$sql);

		header( 'Location: tagsdownload.php' ) ;

		}

		

	}



?>