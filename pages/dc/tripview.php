<?php include('../db.php');
$tic=$_GET['trip'];
$querydc=mysqli_query($link,"SELECT * FROM dcdetails WHERE trip_no='$tic'")or die(mysqli_error());
$querydcrow=mysqli_fetch_array($querydc);

 ?>
<html>
  <head>
    <style>
      * {
          color:#7F7F7F;
          font-family:Arial,sans-serif;
          font-size:12px;
          font-weight:normal;
      }    
      #config{
          overflow: auto;
          margin-bottom: 10px;
      }
      .config{
          float: left;
          width: 200px;
          height: 250px;
          border: 1px solid #000;
          margin-left: 10px;
      }
      .config .title{
          font-weight: bold;
          text-align: center;
      }
      .config .barcode2D,
      #miscCanvas{
        display: none;
      }
      #submit{
          clear: both;
      }
      #barcodeTarget,
      #canvasTarget{
        margin-top: 20px;
      }
	@media print {
    .control-group {
      display: none;
    }
	}	  
    </style>
    <style type="text/css" media="print">
		window.onload = function() { window.print(); }
		@page { size: landscape; 
		margin: 5px;}
	</style>
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery-barcode.js"></script>
    <script type="text/javascript">
    
      function generateBarcode(){
		//javascript:window.print()
        var value = $("#barcodeValue").val();
        var btype = $("input[name=btype]:checked").val();
        var renderer = $("input[name=renderer]:checked").val();
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: $("#barHeight").val(),
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
  </head>
	
  <body onload="generateBarcode();">
  <div style="position:absolute;top:50px;left:50px;width:90%;height:90%;">
	<table cellpadding="10" cellspacing="" border="1" width="100%" height="100%">
	<tr>
	<td>
	
	<div style="position:absolute;top:20px;left:25px;">
			<img src="../img/famlogo.png" alt="Familymart Logo" height="50" width="200"> 
		</div>
	<div style="position:absolute;top:10px;right:25px;">
    <div id="generator">
	
		<label style="position:center;"><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo date("F-d-Y");; ?><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?><span style="font-weight:bold">PFM TRIP TICKET</span></label>
		
		  <input type="text" id="barcodeValue" value="<?php echo $_GET['trip']; ?>" hidden>
          <input type="radio" name="btype" id="code128" value="code128" checked="checked" hidden>
		  <input type="text" id="bgColor" value="#FFFFFF" size="7" hidden><br />
		  <input type="text" id="color" value="#000000" size="7" hidden>
          <input type="text" id="barWidth" value="2" size="3" hidden>
          <input type="text" id="barHeight" value="50" size="3" hidden>
          <input type="text" id="posX" value="10" size="3" hidden>
          <input type="text" id="posY" value="20" size="3" hidden>
          <input type="radio" id="css" name="renderer" value="css" checked="checked" hidden>
    <div id="barcodeTarget" class="barcodeTarget"></div>
	
    <canvas id="" width="150" height="150"></canvas>
	</div>
		
  </div>
  <div style="position:absolute;top:120px;left:30px;width:70%;">
		<table cellpadding="10" cellspacing="" border="0" width="100%">
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold"><?php echo 'Truckers Company:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $querydcrow[2];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold"><?php echo 'Driver Name:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $querydcrow[3];?></span></label>
		</td>
		</tr>
		
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold"><?php echo 'Plate Number:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $querydcrow[5];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold;"><?php echo 'Checkers Name'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; //echo $_GET['helpname'];?></span></label>
		</td>
		
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold;"><?php echo 'Truck Type'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; //echo $_GET['plno'];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold"><?php echo 'Helpers Name:'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $querydcrow[4];?></span></label>
		</td>
		</tr>
		</tr>
		</table>
	</div>
	
	<div style="position:absolute;top:240px;left:30px;width:95%;">
		<table id="reftab" name="reftab" cellpadding="5" cellspacing="0" border="0" width="100%" class="table">

					<thead>

						<tr>

						<th><span style="font-weight:bold">LOCATION CODE</span></th>
						
						<th><span style="font-weight:bold">LOCATION NAME</span></th>
						
						<th><span style="font-weight:bold">DATE</span></th>
						
						<th><span style="font-weight:bold">TIME IN</span></th>
						
						<th><span style="font-weight:bold">TIME OUT</span></th>
						
						<th width="5%"><span style="font-weight:bold">NO. OF DISPATCHED EMPTY BAGS</span></th>
						
						<th width="5%"><span style="font-weight:bold">NO. OF DOCUMENT BAGS</span></th>
						
						<th width="5%"><span style="font-weight:bold">NO. OF RETURNED BOXES</span></th>
						
						<th><span style="font-weight:bold">Duration</span></th>
						
						<th><span style="font-weight:bold">REMARKS</span></th>
						
						</tr>

					</thead>

				

					<tbody>

						
						<?php
						
						
						
						$queryhi1=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' and dh_timein='' and dh_timeout!='' and dh_sname='DC - SAN PEDRO' ORDER BY dh_id ASC")or die(mysqli_error());

						while($queryhirow1=mysqli_fetch_array($queryhi1)){
						?>	
						<tr>

						<td align="center"><?php echo $queryhirow1[1]; ?></td>
						
						<td align="center"><?php echo $queryhirow1[2]; ?></td>
						
						<td align="center"><?php echo $queryhirow1[3]; ?></td>
						
						<td align="center"><?php echo $queryhirow1[4]; ?></td>
						
						<td align="center"><?php echo $queryhirow1[5]; ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[14])){ echo$queryhirow2[14];}else{echo '-';} ?></td>
						
						<td align="center"><?php //$nodeb="SELECT nobox FROM dcstoretrip WHERE trip_store='".$queryhirow1[2]."' AND trip_ticket_no='$tic'";
						//$querytrip=mysqli_query($link,$nodeb);
						//$rownodeb=mysqli_fetch_array($querytrip);
						//echo $rownodeb['nobox'];
						?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[15])){ echo$queryhirow2[15];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[6])){ echo$queryhirow2[6];}else{echo '-';} ?></td>
						
						<td align="center"><?php echo $queryhirow1[7]; ?></td>
						
						</tr>
						<?php
						}
						?>
						
						
						<?php
						
						
						
						$queryhi2=mysqli_query($link,"SELECT * FROM dcstoretrip as H LEFT JOIN dchistory as D1 on(H.trip_ticket_no=D1.dh_trpno AND H.trip_store=D1.dh_sname) WHERE trip_ticket_no='$tic' GROUP BY H.trip_store ORDER BY trip_id ASC")or die(mysqli_error());

						while($queryhirow2=mysqli_fetch_array($queryhi2)){
						?>	
						<tr>

						<td align="center"><?php $loc=mysqli_query($link,"SELECT us_itcode FROM user WHERE store_name='".$queryhirow2[2]."'")or die(mysqli_error());

						$locrow=mysqli_fetch_array($loc); echo $locrow['us_itcode']; ?></td>
						
						<td align="center"><?php echo $queryhirow2[2]; ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[9])){ echo $queryhirow2[9];}else{echo '-';}; ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[10])){ echo $queryhirow2[10];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[11])){ echo$queryhirow2[11];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[5])){ echo $queryhirow2[5];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[20])){ echo $queryhirow2[20];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[21])){ echo $queryhirow2[21];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[12])){ echo $queryhirow2[12];}else{echo '-';} ?></td>
						
						<td align="center"><?php echo $queryhirow1[13]; ?></td>
						
						</tr>
						<?php
						}
						?>
						
						
						<?php
						
						
						
						$queryhi=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' and dh_timein!='' and dh_timeout='' and dh_sname='DC - SAN PEDRO' ORDER BY dh_id ASC")or die(mysqli_error());

						while($queryhirow=mysqli_fetch_array($queryhi)){
						?>	
						<tr>

						<td align="center"><?php echo $queryhirow[1]; ?></td>
						
						<td align="center"><?php echo $queryhirow[2]; ?></td>
						
						<td align="center"><?php echo $queryhirow[3]; ?></td>
						
						<td align="center"><?php echo $queryhirow[4]; ?></td>
						
						<td align="center"><?php echo $queryhirow[5]; ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[14])){ echo$queryhirow2[14];}else{echo '-';} ?></td>
						
						<td align="center"><?php //$nodeb="SELECT nobox FROM dcstoretrip WHERE trip_store='".$queryhirow[2]."' AND trip_ticket_no='$tic'";
						//$querytrip=mysqli_query($link,$nodeb);
						//$rownodeb=mysqli_fetch_array($querytrip);
						//echo $rownodeb['nobox'];
						?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[15])){ echo$queryhirow2[15];}else{echo '-';} ?></td>
						
						<td align="center"><?php if(!empty($queryhirow2[6])){ echo$queryhirow2[6];}else{echo '-';} ?></td>
						
						<td align="center"><?php echo $queryhirow[7]; ?></td>
						
						</tr>
						<?php
						}
						?>
						<?php
						$queryin=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' AND dh_sname='DC - SAN PEDRO' AND dh_timein=''")or die(mysqli_error());
						$rowin=mysqli_fetch_array($queryin);
						$queryout=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' AND dh_sname='DC - SAN PEDRO' AND dh_timeout=''")or die(mysqli_error());
						$rowout=mysqli_fetch_array($queryout);
						?>
				
						<?php
				
						?>
				
						<?php
				
 
				
				
						?>
							<tr>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						<td style="border:none;"></td>
						
						</tr>
							<tr>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						<td style="border:none;"></td>
						
						</tr>
						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td colspan="5" align="right"><p>Total Time Lapsed:</p></td>
						
						<td align="center"><p><?php 
						$timestamp=mysqli_query($link,"SELECT trip_dateclose,dctimestamp FROM dcdetails WHERE trip_no='$tic' AND DATEDIFF(trip_dateclose,dctimestamp) > 2")or die('timeerror');
						$stamprow=mysqli_fetch_array($timestamp);
						if(!empty($stamprow['trip_dateclose'])){
							$start_stime = $stamprow['dctimestamp'];
							$end_stime = $stamprow['trip_dateclose'];
							$v = strtotime($end_stime);
							$b = strtotime($start_stime);
							$c=$v-$b;	
							echo '&nbsp&nbsp&nbsp&nbsp'; echo gmdate("H:i:s", $c);							
							//echo $stamprow['trip_dateclose'];
							//echo $stamprow['dctimestamp'];
						}else{
						$start_time = $rowin[5];
						$end_time = $rowout[4];
						if(!empty($rowout[4])){
						$v =  strtotime($end_time);
						$b = strtotime($start_time);
						$c=$v-$b;
						echo '&nbsp&nbsp&nbsp&nbsp'; echo gmdate("H:i:s", $c);
						}else{echo '00:00:00';}	
						
						}?></p></td>
						
						<td></td>
						
						</tr>
						

						
						<tr>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						<td style="border:none;"></td>
						
						</tr>
						
						<tr>
						<td colspan="7">
						<table cellpadding="0" cellspacing="0" border="0" width="400" align="left">
				<thead>

						<tr>

						<th><p style="color:white;">Type Of Expense</p></th>
						
						<th><p style="color:white;">Particulars</p></th>
						
						<th><p style="color:white;">Amount</p></th>
						

						</tr>

					</thead>
					<tbody>
					<?php
							$sqptrip=mysqli_query($link,"SELECT * FROM dcexp WHERE ex_triptic='$tic' ORDER By id_exp ASC")or die(mysqli_error());
							while($sqprow=mysqli_fetch_array($sqptrip)){
								
							
					?>
						

						<tr>
		
						<td align="left"><?php echo $sqprow[2]; ?></td>

						<td align="left"><?php echo $sqprow[3]; ?></td>
						
						<td align="right"><?php $comma=$sqprow[4]; echo number_format($comma, 2, '.', ',');?></td>
						
						</tr>
						<?php
						} 
						?>
						<tr>
		
						<td align="left"></td>

						<td align="left"></td>
						
						<td align="right"><p style="color:white;">_________________</font></td>
						
						</tr>
						<tr>
		
						<td align="center"></td>

						<td align="right"><p style="color:white;">Total Amount:</p></td>
						<?php
						$qltol = mysqli_query($link,"SELECT ex_triptic, SUM(ex_amt) as Total FROM dcexp WHERE ex_triptic='$tic' Group By ex_triptic")or die(mysqli_error());

						while($qltolrow=mysqli_fetch_array($qltol)){
						?>						
						<td align="right"><p style="color:white;"><?php $comma=$qltolrow['Total']; echo number_format($comma, 2, '.', ',');?></p></td>
						<?php
						}
						?>
						</tr>
						</tbody>
						</table>
						</td>
						</tr>


					</tbody>

		</table>
		<!--<table id="reftab" name="reftab1" cellpadding="10" cellspacing="1" border="2" width="100%" >
		
		</table>-->
	</div>
	<div style="position:absolute;bottom:20;right:400;";>
	<table>
	<tr>
						
						<td style="border:none;">Prepared by:<br><br>
						<p>_____________________________</p>
						<p align="center">Warehouse Personnel</p></td>
						
						
						
		</tr>
	</table>
	</div>
	<div style="position:absolute;bottom:20;right:20;";>
	<table>
	<tr>
						
						<td style="border:none;" colspan="1" align="left">Received by:
						<br><br>
						<p>_____________________________</p>
						<p align="center">Trucker</p></td>
						
						</tr>
	</table>
	</div>
	</td>
	</tr>
	</table>
	</div>
  </body>
  
</html>