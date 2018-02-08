<html>
<head>
<title>PFM Franchise Orders</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="rrg.css" type="text/css">
<?php
$today = date("Y-m-d",strtotime('+8 hours'));
//include("odbc.php");
ignore_user_abort(true);
set_time_limit(0);


$jdapodate=date(("Y-m-d"),strtotime('-16 hours'));

  echo "\t<tr class=\"normal\" align=\"center\">\n";
  //   echo "\t<td><img src='graph2.php'></td>\n";

 echo "\t</tr>\n";
function fdate($datex){
$len=strlen($datex);
if($len < 4 or $len == 0 or $datex == "")
	return 0;
$yy=substr($datex,$len-4,4);
$mo=substr($datex,$len-6,2);
$day=substr($datex,$len-8,2);

$datetrn="$yy$mo$day";
}
?>
</table>
<font color="#000000" face="Lucida Sans Unicode" size="2"><center>SODA created&nbsp;|&nbsp;&nbsp;<?php echo $today; ?> |&nbsp;
<table width="40%" height="1" border="0" align="center">
  <tr>
    <td width="2%" bgcolor="#EDFEDF" class="normal"><div align="center"><font  size="2" color="#990033" face="Arial, Helvetica, sans-serif"></font>BRANCH</div></td>
     <td width="15%" bgcolor="#EDFEDF" class="normal"><div align="center"><font  size="2" color="#990033" face="Arial, Helvetica, sans-serif"></font>BRANCH</div></td>
    <td width="5%" bgcolor="#EDFEDF" class="normal"><div align="center"><font size="2" color="#990033" face="Arial, Helvetica, sans-serif"></font>ORDER_COUNT</div></td>
 </tr>

<?php

$cs = odbc_connect ('ansilive', 'pfmadmin', 'M@nager3971' ) or die ( 'Can not connect to server' );


$sql = "select b.st_no,b.st_name
        from dbo.mstores b where b.st_no not in(0000,1001,1018,1007,1011,1012,1017,1020,1023,1024,1027,1013,1034) order by b.st_no";
 $r = odbc_exec ($cs ,$sql) or die ( 'Query Error' );

// loop the result
	//echo $sql;
while (odbc_fetch_row($r)){
			//echo $sql;
		$branch=odbc_result($r,1);
		$branchx=odbc_result($r,2);

	$sqlx = "select a.im_branch,count(a.im_invno)
        from dbo.tinvmain a
        where a.im_invtype='H' and a.im_postdate between '$jdapodate 06:01:00.000' and '$today 06:00:00.000' and a.im_srcdest in(40000,40001,40002,40003,40004,40005,40006,40007,40008,40009,40010,40011,40012,40013,40014,40015,40016,40017,40018,40019,40020,40021,40022,40023,40024,40025,40026,40027,40028,40029,40030,40031,40032,40033,40034,40035,40036,40037,40038,40039,40040,40041,40042,40043,40044,40045,40046,40047,40048,40049,40050,40051,40052,40053,40054,40055,40056,40057,40058,40059,40060,40061,40062,40063,40064,40065,40066,40067,40068,40069,40070,40071,40072,40073,40074,40075,40076,40077,40078,40079,40080,40081,40082,40083,40084,40085,40086,40087,40088,40089,40090,40091,40092,40093,40094,40095,40096,40097,40098,40099,40100,40101,099998)  and a.im_branch=$branch and a.im_candate='1900-01-01 00:00:00'
        group by a.im_branch";

 $rx = odbc_exec ($cs ,$sqlx) or die ( 'Query Error' );

// loop the result
	//echo $sql;
odbc_fetch_row($rx);

$invno=odbc_result($rx,2);



		  echo "\t<tr class=\"big\" align=\"right\">\n";
		  echo "\t<td align=\"center\">$branch</td>\n";
		  echo "\t<td align=\"right\">$branchx</td>\n";
if ($invno==""){ ?>
<td><blink> <font color="#ff0000"><b>PLS CALL </blink></td>
<?php }else{
		  echo "\t<td>$invno</td>\n";
}
}
?>