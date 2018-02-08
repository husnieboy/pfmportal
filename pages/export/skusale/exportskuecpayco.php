<?php
                date_default_timezone_set("Asia/Manila");

/*******EDIT LINES 3-8*******/

//$name=$_POST['name'];

$DB_Server = "localhost"; //MySQL Server    

$DB_Username = "root"; //MySQL Username     

$DB_Password = "";             //MySQL Password     

$DB_DBName = "datame";         //MySQL Database Name  

$DB_TBLName = "tempdataco"; //MySQL Table Name   

$filename = "PFMdataco" . date('Ymd');        //File Name



$fdate=$_GET['datef'];

$ldate=$_GET['datet'];

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    

//create MySQL connection   

$sql = "SELECT tempid,branch,repdate,code,pd_desc,SUM(TOTQTY),SUM(TOTAMT) FROM $DB_TBLName WHERE code IN ('904257','904290','904291','904292','904293','904294','904295','904296','904297','904298','904299','904300','904301','904302','904303','904305','904304','904306','904307','904308','904309','904310','904311','904312','904313','904314','904315','904316','904317','904318','904319','904320','904321','904322','904323','904324','904325','904326','904327','904328','904329','904330','904331','904332','904333','904334','904335','904336','904337','904338','904339','904340','904341','904342','904343','904344','904345','904346','904347','904348','904349','904350','904351','904352','904353','904354','904238','904239','904240','904241','904243','904244','904245','904246','904247','904248','904249','904250','904251','904242','904252','904253','904254','904255','904256','904363','904364') AND repdate BETWEEN '$fdate 00:00:00' AND '$ldate 00:00:00' GROUP BY code,branch,repdate";

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

