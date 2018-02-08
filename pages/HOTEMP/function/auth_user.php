<?
$user = $_SESSION['username'];
$login=mysql_query("select * from user where username='$user'")or die(mysql_error());
$row=mysql_fetch_row($login);
$level = $row[3];

if ($level == 1)
	{
		header('location:../admin/index.php');
	}
if ($level == '')
	{
		header('location:../index.php');
	}
?>