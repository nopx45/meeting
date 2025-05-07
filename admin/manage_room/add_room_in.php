<?php
session_start();
include "../../function.php";
include "../../dbconfig.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}

$room_name = $_POST['room_name'];
$room_address = $_POST['room_address'];
$total_seat = $_POST['total_seat'];
$response_name = $_POST['response_name'];
$department = $_POST['department'];
$tel = $_POST['tel'];
$remarks = $_POST['remarks'];


$filename = $_FILES['filesattach_name']['name'];

$dot_position = strrpos($filename,".");
$file_type = substr($filename,0-(strlen($filename)-$dot_position));

$filename = date("dmyHis").$file_type;
$path = "../../room_picture/";


if (is_uploaded_file($_FILES['filesattach_name']['tmp_name'])) {

        if (file_exists($path . $_FILES['filesattach_name']['name'])) {
                      echo "<center><font color=\"#800000\">Error !! Your file has already exists name, Pleasy change filename .</font></center><br>\n"; exit; }

        $res = copy($_FILES['filesattach_name']['tmp_name'], $path.$filename);
        if (!$res) { echo "<center><font color=\"#800000\">Error !! ไม่สามารถ Upload ไฟล์ได้</font></center><br>\n"; exit; } 

}
else
    $filename = "nofile.jpg";


$insertp ="insert into room_tb 
VALUES ('','$room_name','$filename','$room_address','$total_seat','$response_name','$department','$tel','$remarks')";

$result = mysql_query($insertp);

echo mysql_error();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Please wait ...</title>

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

</head>

<body>

<script>
  alert("Add New Meeting Room Success !!");
</script>

<meta http-equiv='refresh' content='0;url=index.php'>

</body>
</html>

<?php
closedb();
?>
