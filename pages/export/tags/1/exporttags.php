<?php 
                date_default_timezone_set("Asia/Manila");
				$monthsales = date("F");
				$datesales = date("F-d-Y");
?>
<?php

// Database Connection

$host="localhost";
$uname="root";
$pass="";
$database = "datame";  

$connection= @mysql_connect($host,$uname,$pass); 

echo mysql_error();

//or die("Database Connection Failed");
$selectdb= @mysql_select_db($database) or 
die("Database could not be selected"); 
$result= @mysql_select_db($database)
or die("database cannot be selected <br>");

// Fetch Record from Database
$store_master=$_POST['Store_master'];
$ticket_status=$_POST['ticket_status'];
$store_ID=$_POST['user_id'];
$color=$_POST['color_status'];


if(isset($_POST['color_status']) && $_POST['color_status'] == "GREEN")
{

@mysql_query("UPDATE stores SET stclrgreen='PRINTED' WHERE store_ID='$store_ID'")or die(mysqli_error());

$output = "";
$table = "pfmtagsreq"; // Enter Your Table Name 
$sql = @mysql_query("select BarCode,Item_Description,Unit_retail,SN from $table WHERE Store_Tags_Name='$store_master' And Date_Time='$datesales' And stclr='$color'");
$columns_total = @mysql_num_fields($sql);


// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= ''.$heading.',';
}
$output .="\r\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=''.$row["$i"].',';
}
$output .="\r\n";
}

// Download the file

$filename = "masterfile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;	
exit;
}

if(isset($_POST['color_status']) && $_POST['color_status'] == "BLUE")
	
{

@mysql_query("UPDATE stores SET stclrblue='PRINTED' WHERE store_ID='$store_ID'")or die(mysqli_error());

$output = "";
$table = "pfmtagsreq"; // Enter Your Table Name 
$sql = @mysql_query("select BarCode,Item_Description,Unit_retail,SN from $table WHERE Store_Tags_Name='$store_master' And Date_Time='$datesales' And stclr='$color'");
$columns_total = @mysql_num_fields($sql);


// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= ''.$heading.',';
}
$output .="\r\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=''.$row["$i"].',';
}
$output .="\r\n";
}

// Download the file

$filename = "masterfile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;	
exit;
}

if(isset($_POST['color_status']) && $_POST['color_status'] == "PURPLE")
	
{

@mysql_query("UPDATE stores SET stclrpurple='PRINTED' WHERE store_ID='$store_ID'")or die(mysqli_error());

$output = "";
$table = "pfmtagsreq"; // Enter Your Table Name 
$sql = @mysql_query("select BarCode,Item_Description,Unit_retail,SN from $table WHERE Store_Tags_Name='$store_master' And Date_Time='$datesales' And stclr='$color'");
$columns_total = @mysql_num_fields($sql);


// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= ''.$heading.',';
}
$output .="\r\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=''.$row["$i"].',';
}
$output .="\r\n";
}

// Download the file

$filename = "masterfile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;	
exit;
}
?>

