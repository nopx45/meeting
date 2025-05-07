<?php
session_start();
include "../../function.php";
include "../../config.php";
include "../../dbconfig.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}


$id = $_GET['id'];
$c = $_GET['c'];

$sql_select_f = "SELECT * FROM booking_tb WHERE id=$id";
$result_select_f = mysql_query($sql_select_f);
$row_select_f = mysql_fetch_array($result_select_f);

$file_attach_name1_tmp = $row_select_f['file_attach_name1'];
$file_attach_name2_tmp = $row_select_f['file_attach_name2'];
$file_attach_name3_tmp = $row_select_f['file_attach_name3'];
   

if($c == "file_attach_name1")
{
	$sql_ud = "update booking_tb set file_attach_name1='nofile.jpg' where id='$id' ";
	unlink("../../files_attach/$file_attach_name1_tmp");
}
if($c == "file_attach_name2")
{
	$sql_ud = "update booking_tb set file_attach_name2='nofile.jpg' where id='$id' ";
	unlink("../../files_attach/$file_attach_name2_tmp");
}
if($c == "file_attach_name3")
{
	$sql_ud = "update booking_tb set file_attach_name3='nofile.jpg' where id='$id' ";
	unlink("../../files_attach/$file_attach_name3_tmp");
}

$result_ud = mysql_query($sql_ud);
echo mysql_error();


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo $titleweb; ?></title>

<STYLE type=text/css>
  A:link { color: #0000cc; text-decoration:none}
  A:visited {color: #0000cc; text-decoration: none}
  A:hover {color: red; text-decoration: none}
 </STYLE>
<style type="text/css">
<!--
small { font-family: Arial, Helvetica, sans-serif; font-size: 8pt; } 
input, textarea { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; } 
b { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
big { font-family: Arial, Helvetica, sans-serif; font-size: 14pt; } 
strong { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight : extra-bold; } 
font, td { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
BODY { font-size: 9pt; font-family: Arial, Helvetica, sans-serif; } 
-->
</style>

<meta http-equiv='refresh' content='0;url=edit_booking.php?id=<?php echo $id; ?>'>

</head>

<body>



</body>
</html>

<?php
closedb();

?>
