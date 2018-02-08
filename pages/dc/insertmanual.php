<?php
include('header.php');

?>
<center>
<div class="alert alert-success">Manual Input</div>
<div>
				<form class="form-horizontal" method="POST">
				<table>
				<tr>
				<td>
				<label class="control-label">ANSI NO:</label>
				<input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="ansino" name="ansino" placeholder="ANSI" autofocus required/>
				</td>
				</tr>
				<td>
				<label class="control-label">Store NO: </label>
				<input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="store" name="store" placeholder="STORE" required/>
				</td>
				</tr>
				<tr>
				<td>
				<label class="control-label">JDAPO: </label>
				<input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="jdapo" name="jdapo" placeholder="JDAPO" required/>
				</td>
				</tr>
</div>
				
				</table>
				
				<button type="reset" name="reset" id="reset" class="btn">Reset</button>
				<button type="submit" name="dcreg" id="dcreg" class="btn">Save</button>
				</form>
</div>
	<div class="alert alert-success">Search JDA PO</div>
	<div>
				<form class="form-horizontal" method="POST">
				<table>
				<tr>
				<td>
				<label class="control-label">Search PO:</label>
				<input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="pojda" name="pojda" placeholder="JDA PO" required/>
				</td>
				</tr>
				</table>
				<button type="reset" name="reset" id="reset" class="btn">Reset</button>
				<button type="submit" name="sjda" id="sjda" class="btn">Search</button>
				</form>
	</div>
	
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableme">

					<thead>

						<tr>

						<th>Ansi No.</th>

						<th>Store No.</th>

						<th>Ref. No.</th>

						<th>Terms</th>

						<th>Del Date</th>

						</tr>

					</thead>

				

					<tbody>

						<?php

		if(isset($_POST['sjda'])){
							
						$jdase=$_POST['pojda'];
						
						$cs = odbc_connect ('ansilive', 'pfmadmin', 'M@nager3971' ) or die ( 'Can not connect to server' );
						
						$query="SELECT * FROM [HOVQPBOS].[dbo].[tpoapp] where ap_refno='$jdase' OR ap_pono='$jdase'";

						$rs = odbc_exec($cs,$query);
						
						while($arr = odbc_fetch_array($rs)){
						?>
						<tr>

						<td><?php echo $arr['ap_pono']; ?></td>

						<td><?php echo $arr['ap_stno']; ?></td>

						<td><?php echo $arr['ap_refno']; ?></td>

						<td><?php echo $arr['ap_terms']; ?></td>

						<td><?php echo $arr['ap_deldate']; ?></td>

						</tr>

						<?php }  ?>

					</tbody>

				</table>
				<?php
				}
				?>	
	<?php
	
	?>
	<script>
	//$(document).ready(function() {
    //var max_fields      = 10; //maximum input boxes allowed
    //var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    //var add_button      = $(".add_field_button"); //Add button ID
   
    //var x = 1; //initlal text box count
    //$(add_button).click(function(e){ //on add input button click
    //    e.preventDefault();
     //   if(x < max_fields){ //max input box allowed
        //    x++; //text box increment
     //       $(wrapper).append('<tr><td><label class="control-label">ANSI NO:</label><input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="ansino" name="ansino[]" placeholder="ANSI" required/></td/></tr><tr><td><label class="control-label">Store NO: </label><input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="store" name="store[]" placeholder="STORE" required/></td></tr><tr><td><label class="control-label">JDAPO: </label><input ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" type="text" id="jdapo" name="jdapo[]" placeholder="JDAPO" required/></td></tr><tr><td>&nbsp;&nbsp;&nbsp;</td></tr><tr><td>&nbsp;&nbsp;&nbsp;</td></tr><tr><td>&nbsp;&nbsp;&nbsp;</td></tr><a href="#" class="remove_field">Remove</a></div>'); //add input box
     //   }
    //});
   
    //$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    //    e.preventDefault(); $(this).parent('div').remove(); x--;
    //})
	//});
	</script>
	
<?php
//include("odbc.php");
ignore_user_abort(true);
set_time_limit(0);

$today=date("Y-m-d");

$tentyp['01']=1;
$tentyp['11']=2;
$tentyp['03']=4;
$tentyp['06']=6;



$todayz = date("ymd",strtotime('+8 hours'));
$deldate=date(("Y-m-d"),strtotime('+6 day'));
$todayx = date("Y-m-d",strtotime('+8 hours'));

//include("mysql.php");

//$sqlc="SELECT * FROM fctlog where daterun='$todayx' and proctype='ansiupdatesoda'";
//$resultc=mysql_query($sqlc,$db1);
//$num=mysql_num_rows($resultc);

//if ($num ==1){

 //echo "Date $todayx already done processing";

 //} else {

//mysql_query("insert into fctlog values('".$todayx."',now(),'ansiupdatesoda')");

		
if(isset($_POST["dcreg"]))
			{	

$cs = odbc_connect ('ansilive', 'pfmadmin', 'M@nager3971' ) or die ( 'Can not connect to server' );



//$sql = "select OHCMMT,OHSLLO,OHOHNO from MMFMSLIB.SODHDR where OHENDT=$todayz and OHCMMT<>'' and OHCNDT=0 order by OHSLLO";

 	 	//$detail=odbc_exec($AS400,$sql);
 	 	//while (odbc_fetch_row($detail)) {

	    $store=$_POST['store'];
	    $jdapo=$_POST['jdapo'];
	    $ansino=$_POST['ansino'];

		//$usersCount = count($_POST["ansino"]);
//for($i=0;$i<$usersCount;$i++) {
		
$sqlc="SELECT * FROM dbo.tpoapp WHERE ap_refno='$jdapo'";
$resultc=odbc_exec($cs,$sqlc);
$num=odbc_num_rows($resultc);

if ($num ==1){
	 echo "JDA $jdapo already Exist!!!";
?>

<script type="text/javascript">

					window.alert("JDA # <?php echo $jdapo; ?> already Exist!!!");
					window.location.href="insertmanual.php";
</script>
	
<?php


 }else{ ?>

 <?php 
 
	 
$sql = "INSERT INTO dbo.tpoapp (ap_pono,ap_stno,ap_refno,ap_terms,ap_deldate) VALUES ('$ansino','$store','$jdapo','7','$deldate')";

 $r = odbc_exec ($cs ,$sql) or die ( 'Query Error' );
 
echo 'FF Inserted'; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $store; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $jdapo; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $ansino; echo'<br><br>';
//}	
	}
	}
//}
//}
?>