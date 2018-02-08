<?php
include('header.php');
?>
<div style="float:left;">
				<form class="form-horizontal" method="POST">

				<div style="position:absolute;top:150px;left:240px;">
				<table>
				<tr>
				<td>
				<label class="control-label">ANSI NO:</label>
				<input type="text" id="ansino" name="ansino" placeholder="ANSI" required/>
				</td>
				</tr>
				<td>
				<label class="control-label">Store NO: </label>
				<input type="text" id="store" name="store" placeholder="STORE" required/>
				</td>
				</tr>
				<tr>
				<td>
				<label class="control-label">JDAPO: </label>
				<input type="text" id="jdapo" name="jdapo" placeholder="JDAPO" required/>
				</td>
				</tr>
				</table>
				
				</div>
				<div style="position:absolute;top:300px;left:410px;">
				<button type="reset" name="reset" id="reset" class="btn">Reset</button>
				<button type="submit" name="dcreg" id="dcreg" class="btn">Save</button>
				</div>
				
				</form>
</div>				
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


if(isset($_POST['dcreg']))
			{	

$cs = odbc_connect ('ansilive', 'pfmadmin', 'M@nager3971' ) or die ( 'Can not connect to server' );



//$sql = "select OHCMMT,OHSLLO,OHOHNO from MMFMSLIB.SODHDR where OHENDT=$todayz and OHCMMT<>'' and OHCNDT=0 order by OHSLLO";

 	 	//$detail=odbc_exec($AS400,$sql);
 	 	//while (odbc_fetch_row($detail)) {

	    $store=$_POST['store'];
	    $jdapo=$_POST['jdapo'];
	    $ansino=$_POST['ansino'];


$sql = "INSERT INTO dbo.tpoapp (ap_pono,ap_stno,ap_refno,ap_terms,ap_deldate)

	    VALUES ('$ansino','$store','$jdapo','7','$deldate')";

 $r = odbc_exec ($cs ,$sql) or die ( 'Query Error' );
 
echo 'FF Inserted'; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $store; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $jdapo; echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo $ansino;
		
		}
//}
//}
?>