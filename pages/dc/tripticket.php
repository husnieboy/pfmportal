<?php include('../db.php'); ?>
						<?php
						
						$tic=$_GET['tripno'];
						
						$queryhi=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' ORDER BY dh_id DESC")or die(mysqli_error());

						$queryhirow=mysqli_fetch_array($queryhi);
							
							?>
							
							
<html>
  <head>
    <style>
	@page {
    margin-left: 0cm;
	}
	@media print {
   
	margin-left: 0mm;
	}
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
		
			/* style sheet for "letter" printing */
			@media print and (width: 8.5in) and (height: 11in) {
			@page {
			margin: 1in;
			}
			}
			@page {
			size: A4 portrait;
			margin: 0%;
			}
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

	<div style="position:absolute;top:0px;right:0px;" id="barcodeTarget" class="barcodeTarget"></div>
    <div id="generator">
		  <input type="text" id="barcodeValue" value="<?php echo $_GET['tripno']; ?>" hidden>
          <input type="radio" name="btype" id="code128" value="code128" checked="checked" hidden>
		  <input type="text" id="bgColor" value="#FFFFFF" size="7" hidden><br />
		  <input type="text" id="color" value="#000000" size="7" hidden>
          <input type="text" id="barWidth" value="2" size="3" hidden>
          <input type="text" id="barHeight" value="30" size="3" hidden>
          <input type="text" id="posX" value="10" size="3" hidden>
          <input type="text" id="posY" value="20" size="3" hidden>
          <input type="radio" id="css" name="renderer" value="css" checked="checked" hidden>
	</div>	  
    
	
    <canvas id="canvasTarget" width="150" height="150"></canvas><br>
		

  <div style="position:absolute;top:56px;left:70px;width:70%;">
		<table cellpadding="3" cellspacing="" border="0" width="100%">
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $_GET['trancamp'];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $_GET['fname'];?></span></label>
		</td>
		</tr>
		
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $_GET['plno'];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $_GET['helpname'];?></span></label>
		</td>
		</tr>
		
		<tr>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; //echo $_GET['plno'];?></span></label>
		</td>
		<td>
		<label style="position:center;"><span style="font-weight:bold;font-size:8pt;"><?php echo ''; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; //echo $_GET['helpname'];?></span></label>
		</td>
		</tr>
		</table>
	</div>
	<div style="position:absolute;top:70px;left:80px;width:50%;">
		<table cellpadding="5" cellspacing="" border="0" width="100%">
		<tr>
		<td>
		
		</td>
		<td>
		
		</td>
		</tr>
		
		<tr>
		<td>
		
		</td>
		<td>
		
		</td>
		
		</tr>
		</table>
	</div>
	<div style="position:absolute;top:165px;left:3px;width:95%;">
		<table id="reftab" name="reftab" cellpadding="5" cellspacing="0" border="0" width="100%" class="table">

					<!--<thead>

						<tr>

						<th><span style="font-weight:bold">LOCATION CODE</span></th>
						
						<th><span style="font-weight:bold">LOCATION NAME</span></th>
						
						<th><span style="font-weight:bold">DATE</span></th>
						
						<th><span style="font-weight:bold">TIME IN</span></th>
						
						<th><span style="font-weight:bold">TIME OUT</span></th>
						
						<th><span style="font-weight:bold">LOGGED BY</span></th>
						
						<th><span style="font-weight:bold">SIGNATURE</span></th>
						
						<th><span style="font-weight:bold">NO. OF DOCUMENT BAGS</span></th>
						
						<th><span style="font-weight:bold">NO. OF DISPATCHED EMPTY BAGS</span></th>
						
						<th><span style="font-weight:bold">NO. OF RETURNED BOXES</span></th>
						
						<th><span style="font-weight:bold">REMARKS</span></th>
						
						</tr>

					</thead>-->

				

					<tbody>

						
						<?php
						
						$tic=$_GET['tripno'];
						$queryhi=mysqli_query($link,"SELECT 
						 B.trip_store as store
						,B.nobox as numb
						,C.us_itcode as storecode
						FROM dcstoretrip as B left join user as C on(B.trip_store=C.store_name)
						WHERE B.trip_ticket_no='$tic' ORDER BY trip_id ASC")or die(mysqli_error());
						
						$queryhi1=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' ORDER BY dh_id ASC")or die(mysqli_error());
						$queryhir=mysqli_fetch_array($queryhi1);
						?>
						<tr>
						
						<td width="1%" style="position:center;font-size:7pt;" align="left">9005</td>
						<td width="7%" style="position:center;font-size:7pt;" align="center"><?php  echo $queryhir['dh_sname']; ?></td>
						
						<td width="4%" style="position:center;font-size:7pt;" align="left"><?php $timedc=$queryhir['dh_date'];
																									echo gmdate('m-d-Y', strtotime($timedc));?></td>
						
						<td width="3%" style="position:center;font-size:7pt;"></td>
							
						<td width="3%" style="position:center;font-size:7pt;" align="left"><?php echo $queryhir['dh_timeout']; ?></td>
						
						<td width="5%" style="position:center;font-size:7pt;"></td>
						
						<td width="3%" style="position:center;font-size:7pt;"></td>
						<td width="3%" style="position:center;font-size:7pt;"></td>
						
						<td width="2%" style="position:center;font-size:7pt;"></td>
						
						<td width="2%" style="position:center;font-size:7pt;"></td>
						
						<td width="5%" style="position:center;font-size:7pt;"></td>
						</tr>
						<?php
						While($queryhirow=mysqli_fetch_array($queryhi)){
							?>
						<tr>
						
						<td width="1%" style="position:center;font-size:7pt;" align="left"><?php echo $queryhirow['storecode']; ?></td>
						
						<td width="8%" style="position:center;font-size:7pt;" align="center"><?php echo $queryhirow['store']; ?></td>
						
						<td width="1%" style="position:center;font-size:7pt;"></td>
						
						<td width="3%" style="position:center;font-size:7pt;"></td>
						
						<td width="3%" style="position:center;font-size:7pt;"></td>
						
						<td width="5%" style="position:center;font-size:7pt;"></td>
						
						<td width="3%" style="position:center;font-size:7pt;"></td>
						
						<td width="3%" style="position:center;font-size:7pt;" align="right"><?php if(!empty($queryhirow['numb'])){echo $queryhirow['numb'];}else{echo '-';} ?></td>
							
						<td width="2%" style="position:center;font-size:7pt;"></td>
						
						<td width="2%" style="position:center;font-size:7pt;"></td>
						
						<td width="10%" style="position:center;font-size:7pt;"></td>
						
						</tr>
						<?php } ?>

					</tbody>

		</table>
		
	</div>
	<!-- <div style="position:absolute;top:240px;left:30px;width:95%;">
		<table id="reftab" name="reftab" cellpadding="10" cellspacing="1" border="1" width="100%" class="table" >

					<thead>

						<tr>

						<th><span style="font-weight:bold">LOCATION CODE</span></th>
						
						<th><span style="font-weight:bold">LOCATION NAME</span></th>
						
						<th><span style="font-weight:bold">DATE</span></th>
						
						<th><span style="font-weight:bold">TIME IN</span></th>
						
						<th><span style="font-weight:bold">TIME OUT</span></th>
						
						<th><span style="font-weight:bold">LOGGED BY</span></th>
						
						<th><span style="font-weight:bold">SIGNATURE</span></th>
						
						<th><span style="font-weight:bold">REMARKS</span></th>
						
						</tr>

					</thead>

				

					<tbody>

						
						<?php
						
						//$tic=$_GET['tripno'];
						
						//$queryhi=mysqli_query($link,"SELECT * FROM dchistory WHERE dh_trpno='$tic' ORDER BY dh_id ASC")or die(mysqli_error());

						//$queryhirow=mysqli_fetch_array($queryhi);
							?>
						<tr>

						<td><?php //echo $queryhirow[1]; ?></td>
						
						<td><?php //echo $queryhirow[2]; ?></td>
						
						<td><?php //echo $queryhirow[3]; ?></td>
						
						<td></td>
						
						<td><?php //echo $queryhirow[5]; ?></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>
						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>

						<tr>

						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						<td></td>
						
						</tr>
						
						<tr>
						<td colspan="8"><span style="font-weight:bold"><p><b>Note:</b><br></p>
						1.Military time format must be used.<br>
						2.The following date format shall be used(MM/DD/YY).<br>
						3.Time and Date to be written must be the same with the system.<br>
						4.In case of system downtime or technical concern, write in the remarks portion for reference.</span>
						</td>
						</tr>
						</tr>
						
						<tr>
						<td colspan="8" align="center" bgColor="#C0C0C0"><span style="font-weight:bold">INDICATE PRINTED NAME,SIGNATURE,AND CURRENT DATE</span><br>
						</td>
						</tr>
						
						<tr>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
		</tr>
		<tr>
						<td style="border:none;" style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
						<td style="border:none;" colspan="1">Prepared by:<br><br>
						<p>_____________________________</p>
						<p align="center">Warehouse Personnel</p></td>
						
						<td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;"></td>
						
						<td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
						<td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
						<td style="border:none;" colspan="1" align="left">Received by:
						<br><br>
						<p>_____________________________</p>
						<p align="center">Trucker</p></td>
						
		</tr>


					</tbody>

		</table>
		<table id="reftab" name="reftab1" cellpadding="10" cellspacing="1" border="2" width="100%" >
		
		</table>
	</div>-->		
  </body>
  
</html>