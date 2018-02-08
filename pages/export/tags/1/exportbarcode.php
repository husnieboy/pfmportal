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
$store_rep=$_POST['Store_rep'];
$output = "";
$table = "pfmtagsreq"; // Enter Your Table Name 
$sql = @mysql_query("select BarCode from $table WHERE Store_Tags_Name='$store_rep' And Date_Time='$datesales'");
$columns_total = @mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= ''.$heading.'';
}
$output .="\r\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=''.$row["$i"].'';
}
$output .="\r\n";
}

// Download the file

$filename = "Prep.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>
