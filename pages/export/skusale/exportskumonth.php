<?php
                date_default_timezone_set("Asia/Manila");

/*******EDIT LINES 3-8*******/

//$name=$_POST['name'];

$DB_Server = "localhost"; //MySQL Server    

$DB_Username = "root"; //MySQL Username     

$DB_Password = "";             //MySQL Password     

$DB_DBName = "datame";         //MySQL Database Name  

$DB_TBLName = "tempdata"; //MySQL Table Name   

$filename = "PFMdata" . date('Ymd');        //File Name



$fdate=$_GET['datef'];

$ldate=$_GET['datet'];

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    

//create MySQL connection   

$sql = "SELECT tempid,branch,repdate,code,pd_desc,TOTQTY,TOTAMT FROM $DB_TBLName WHERE code IN('100032'
,'100033'
,'100034'
,'100035'
,'100036'
,'100037'
,'100038'
,'100039'
,'100040'
,'100041'
,'100042'
,'100043'
,'100049'
,'100044'
,'100045'
,'100046'
,'100047'
,'100048'
,'100050'
,'100051'
,'100052'
,'903623'
,'904450') AND repdate BETWEEN '$fdate 00:00:00' AND '$ldate 00:00:00' ";

$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_error());

//select database   

$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_error());   

//execute query 

$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_error());    



$file_ending = "xls";

//header info for browser

header("Content-Type: application/xls");    

header("Content-Disposition: attachment; filename=$filename.$file_ending");  

header("Pragma: no-cache"); 

header("Expires: 0");

/*******Start of Formatting for Excel*******/   

//define separator (defines columns in excel & tabs in word)

$sep = "\t"; //tabbed character

//start of printing column names as names of MySQL fields

for ($i = 1; $i < 7; $i++) {

echo mysql_field_name($result,$i) . "\t";

}

print("\n");    

//end of printing column names  

//start while loop to get data

    while($row = mysql_fetch_row($result))

    {

        $schema_insert = "";

        for($j=1; $j<mysql_num_fields($result);$j++)

        {

            if(!isset($row[$j]))

                $schema_insert .= "NULL".$sep;

            elseif ($row[$j] != "")

                $schema_insert .= "$row[$j]".$sep;

            else

                $schema_insert .= "".$sep;

        }

        $schema_insert = str_replace($sep."$", "", $schema_insert);

        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);

        $schema_insert .= "\t";

        print(trim($schema_insert));

        print "\n";

    }

