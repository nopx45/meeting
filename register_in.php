<?php
include "function.php";
include "dbconfig.php";
include "config.php";
conndb();

$role = "ผู้ใช้งานทั่วไป";
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$position = $_POST['position'];
$department = $_POST['department'];
$email = $_POST['email'];
$tel = $_POST['tel'];

// ตรวจสอบ Username ซ้ำ 
$strSQL = "SELECT * FROM user_tb WHERE username = '$username'";
$result = mysql_query($strSQL);
$total = mysql_num_rows($result);
$row = mysql_fetch_array($result);

if(($total > 0))
{
         echo "<script>alert(\"Your Username has already exists !!\");</script>";
         echo "<script language='javascript'>history.go(-1);</script>";
         exit;
}

$insertp ="insert into user_tb 
VALUES ('','$role','$username','$password','$fullname','$position','$department','$email','$tel','Y')";

$result = mysql_query($insertp);

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

</head>

<body>

<script>
  alert("Registration is completed !!");
</script>

<meta http-equiv='refresh' content='0;url=index.php'>

</body>
</html>

<?php
closedb();
?>
