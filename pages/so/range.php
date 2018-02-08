
<?php include('../db.php');

include('header.php'); 

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

if ($level == '')

	{

		header('location:../');

	}



?>
<style>
@media print {
		  #buttonex {
			display: none;  /* hide whole page */
		  }
		}
</style>
</head>

<body>

<table cellpadding="0" cellspacing="0" border="1" style="border-style: solid;border-color:#e5e5e5;" class="table"  id="">

					<thead>
						<tr>
						<th colspan="15">
						<table width="100%">
						<tr>
						<td align="left">
						<img src="../img/famlogo.png" alt="Familymart Logo" height="30" width="100">
						<font size="1"><p>Delivery Duration:<?php if(isset($_POST['fdate'])){ echo $_POST['fdate'];?> <?php echo 'to'; ?> <?php echo $_POST['ldate'];}?></p></font>
						</td>
						<td align="right">
						<p><b>TRIP TICKET SUMMARY REPORT</b></p><form method="POST" action="../export/exportrange.php"><input type="hidden" name="dn" value="<?php echo $iuser; ?>" /><input id="buttonex" type="submit" value="Export"/></form><font size="1"><p><?php echo date("m/d/Y H:s"); echo 'H'; ?></p></font>
						</td>
						</tr>
						</table>
						</th>
						</tr>
						
						<tr>
						
						<th><div align="center"><font size="1">TRANSACTION DATE</div></th>
						
						<th><div align="center"><font size="1">TRIP TICKET ID</div></th>
						
						<th><div align="center"><font size="1">DRIVER</div></th>
						
						<th><div align="center"><font size="1">CHECKER</div></th>
						
						<th><div align="center"><font size="1">HELPER</div></th>
						
						<th><div align="center"><font size="1"># OF DISPACHED EMPTY BAGS</div></th>
						
						<th><div align="center"><font size="1">STORE CODE</div></th>
						
						<th><div align="center"><font size="1">STORE NAME</div></th>
						
						<th><div align="center"><font size="1">PERSONNEL</div></th>
						
						<th><div align="center"><font size="1">TIME IN</div></th>
						
						<th><div align="center"><font size="1">TIME OUT</div></th>
						
						<th><div align="center"><font size="1">DURATION TIME</div></th>
						
						<th><div align="center"><font size="1"># OF TURNED OVER DOCUMENT BAGS</div></th>
						
						<th><div align="center"><font size="1"># OF RETURNED BOXES</div></th>
						
						<th><div align="center"><font size="1">REMARKS</div></th>

						</tr>

					</thead>

				

					<tbody>

						<?php
						if(isset($_POST['fdate'])){
							$tempdrop="DROP TABLE `".$iuser."`";
							mysqli_query($link,$tempdrop);
							$tempquery="CREATE TABLE IF NOT EXISTS `".$iuser."` (
										  `id` int(10) NOT NULL AUTO_INCREMENT,
										  `AA` varchar(100) NOT NULL,
										  `BA` varchar(100) NOT NULL,
										  `CA` varchar(100) NOT NULL,
										  `DA` varchar(100) NOT NULL,
										  `EA` varchar(100) NOT NULL,
										  `FA` varchar(100) NOT NULL,
										  `GA` varchar(100) NOT NULL,
										  `HA` varchar(100) NOT NULL,
										  `IA` varchar(100) NOT NULL,
										  `JA` varchar(100) NOT NULL,
										  `KA` varchar(100) NOT NULL,
										  `LA` varchar(100) NOT NULL,
										  `MA` varchar(100) NOT NULL,
										  `NA` varchar(100) NOT NULL,
										  `OA` varchar(100) NOT NULL,
										  `PA` varchar(100) NOT NULL,
										  PRIMARY KEY (`id`)
										) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
						mysqli_query($link,$tempquery);
						
						$fdate = $_POST['fdate'];
						$ffdate = date('ymd', strtotime($fdate));
						$ldate = $_POST['ldate'];
						$lldate = date('ymd', strtotime($ldate));
						$query=mysqli_query($link,"SELECT * FROM dchistory as H LEFT JOIN dcstoretrip as D1 on(H.dh_trpno=D1.trip_ticket_no) LEFT JOIN dcdetails as D2 on(D1.trip_ticket_no=D2.trip_no) LEFT JOIN dcrectbl as D3 on(D2.trip_no=D3.tp) WHERE D3.dt BETWEEN '$ffdate' AND '$lldate' GROUP BY H.dh_trpno ")or die(mysqli_error());

						while($row=mysqli_fetch_array($query)){
						$tp=$row[8];
						?>
						
						
						<?php $AQ=mysqli_query($link,"SELECT * FROM dchistory as H LEFT JOIN dcdetails as D on(H.dh_trpno=D.trip_no) LEFT JOIN dcstoretrip as E on(H.dh_trpno=E.trip_ticket_no) WHERE H.dh_trpno='$tp' and H.dh_dut='' and H.dh_sname='DC - SAN PEDRO' GROUP BY H.dh_trpno ORDER BY H.dh_id ASC")or die(mysqli_error());
							  while($AR=mysqli_fetch_array($AQ)){
						?>

									<tr>

									<td><div align="center"><font size="1"><?php echo $AAAR=$AR[3]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ABAR=$AR[8]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ACAR=$AR[22]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ADAR='-'; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $AEAR=$AR[23]; ?></div></td>
									
									<td width="2%"><div align="center" ><font size="1"><?php if($AR[1]!='9005'){echo $AFAR=$AR[36];}else{echo $AFAR='-';} ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $AGAR=$AR[1]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $AHAR=$AR[2]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php if(!empty($AR[30])){echo $AIAR=$AR[30];}else{echo $AIAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[4])){echo $AJAR=$AR[4];}else{echo $AJAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[5])){echo $AKAR=$AR[5];}else{echo $AKAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[6])){echo $ALAR=$AR[6];}else{echo $ALAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[14])){echo $AMAR=$AR[14];}else{echo $AMAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[15])){echo $ANAR=$AR[15];}else{ echo $ANAR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($AR[7])){echo $AOAR=$AR[7]; }else{ echo $AOAR='-';} ?></div></td>
									
									</tr>
						<?php $tempdc1="INSERT INTO $iuser (AA,BA,CA,DA,EA,FA,GA,HA,IA,JA,KA,LA,MA,NA,OA,PA) VALUES('$AAAR','$ABAR','$ACAR','$ADAR','$AEAR','$AFAR','$AGAR','$AHAR','$AIAR','$AJAR','$AKAR','$ALAR','$AMAR','$ANAR','$AOAR','$iuser')";
							mysqli_query($link,$tempdc1);
							}?>
						<?php $CQ=mysqli_query($link,"SELECT * FROM dcstoretrip as H LEFT JOIN dchistory as D1 on(H.trip_ticket_no=D1.dh_trpno AND H.trip_store=D1.dh_sname) LEFT JOIN dcdetails as D on(H.trip_ticket_no=D.trip_no) WHERE H.trip_ticket_no='$tp' GROUP BY H.trip_store,H.trip_ticket_no ORDER BY H.trip_id ASC")or die(mysqli_error());
							  while($CR=mysqli_fetch_array($CQ)){
						?>

									<tr>

									<td><div align="center"><font size="1"><?php if(!empty($AACR=$CR[9])){ echo $AACR=$CR[9];}else{ echo $AACR'-'; } ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ABCR=$CR[1]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ACCR=$CR[28]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ADCR='-'; ?></div></td>
									
									<td><div align="center"><font size="1"><?php if(!empty($CR[29])){echo $AECR=$CR[28];}else{echo $AECR='-';}?></div></td>
									
									<td width="2%"><div align="center" ><font size="1"><?php if($CR[8]!='9005'){echo $FACR=$CR[5];}else{echo $FACR='-';} ?></div></td>
									
									<td><div align="center"><font size="1"><?php  $loc=mysqli_query($link,"SELECT us_itcode FROM user WHERE store_name='".$CR[2]."'")or die(mysqli_error());

									$locrow=mysqli_fetch_array($loc); echo $GACR=$locrow['us_itcode'];?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $HACR=$CR[2]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php if(!empty($CR[24])){echo $IACR=$CR[24];}else{echo $IACR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($CR[10])){echo $JACR=$CR[10];}else{echo $JACR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php $timeout=mysqli_query($link,"SELECT dh_timeout FROM dchistory WHERE dh_sname='".$CR[2]."' AND dh_trpno='".$CR[1]."' ")or die(mysqli_error());

									$timeoutrow=mysqli_fetch_array($timeout); if(!empty($timeoutrow['dh_timeout'])){echo $KACR=$timeoutrow['dh_timeout'];}else{echo $KACR="-";}  ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($CR[12])){echo $LACR=$CR[12];}else{echo $LACR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($CR[20])){echo $MACR=$CR[20];}else{echo $MACR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($CR[21])){echo $NACR=$CR[21];}else{echo $NACR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($CR[13])){echo $OACR=$CR[13];}else{echo $OACR='-';} ?></div></td>
									
									</tr>
						<?php
							$tempstore="INSERT INTO $iuser (AA,BA,CA,DA,EA,FA,GA,HA,IA,JA,KA,LA,MA,NA,OA,PA) Values('$AACR','$ABCR','$ACCR','$ADCR','$AECR','$FACR','$GACR','$HACR','$IACR','$JACR','$KACR','$LACR','$MACR','$NACR','$OACR','$iuser')";
							mysqli_query($link,$tempstore);						
						}?>
						<?php $BQ=mysqli_query($link,"SELECT * FROM dchistory as H LEFT JOIN dcdetails as D on(H.dh_trpno=D.trip_no) LEFT JOIN dcstoretrip as E on(H.dh_trpno=E.trip_ticket_no) WHERE H.dh_trpno='$tp' and H.dh_dut!='' and H.dh_sname='DC - SAN PEDRO' GROUP BY H.dh_trpno ORDER BY H.dh_id ASC")or die(mysqli_error());
							  while($BR=mysqli_fetch_array($BQ)){
						?>

									<tr>

									<td><div align="center"><font size="1"><?php echo $AABR=$BR[3]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ABBR=$BR[8]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ACBR=$BR[22]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $ADBR='-'; ?></div></td>
									
									<td><div align="center"><font size="1"><?php if(!empty($BR[23])){echo $AEBR=$BR[23];}else{echo $AEBR='-';} ?></div></td>
									
									<td width="2%"><div align="center" ><font size="1"><?php if($BR[1]!='9005'){echo $AFBR=$BR[36];}else{echo $AFBR='-';} ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $AGBR=$BR[1]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php echo $AHBR=$BR[2]; ?></div></td>
									
									<td><div align="center"><font size="1"><?php if(!empty($BR[30])){echo $AIBR=$BR[30];}else{echo $AIBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[4])){echo $AJBR=$BR[4];}else{echo $AJBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[5])){echo $AKBR=$BR[5];}else{echo $AKBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[6])){echo $ALBR=$BR[6];}else{echo $ALBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[14])){echo $AMBR=$BR[14];}else{echo $AMBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[15])){echo $ANBR=$BR[15];}else{echo $ANBR='-';} ?></div></td>
									
									<td width="2%"><div align="center"><font size="1"><?php if(!empty($BR[7])){echo $AOBR=$BR[7];}else{echo $AOBR='-';} ?></div></td>
									
									</tr>
						<?php $tempdc2="INSERT INTO $iuser (AA,BA,CA,DA,EA,FA,GA,HA,IA,JA,KA,LA,MA,NA,OA,PA) Values('$AABR','$ABBR','$ACBR','$ADBR','$AEBR','$AFBR','$AGBR','$AHBR','$AIBR','$AJBR','$AKBR','$ALBR','$AMBR','$ANBR','$AOBR','$iuser')";
							mysqli_query($link,$tempdc2);
							}?>

						<?php }} ?>

					</tbody>

				</table>