<?php
session_start();
include "config.php";
include "dbconfig.php";
conndb();

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login ....</title>
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
big { font-family: Arial, Helvetica, sans-serif; font-size: 20pt; } 
strong { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight : extra-bold; } 
font, td { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
BODY { font-size: 12pt; font-family: Arial, Helvetica, sans-serif; } 
-->
</style>

</head>

<body>
<center>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

         $username = $_POST['username'];
         $password = $_POST['password'];

         $sql_login = "select * from user_tb where username = '$username' AND password = '$password'";
         $result_login = mysql_query($sql_login);
         $total_login = mysql_num_rows($result_login);
         $row_login = mysql_fetch_array($result_login);


         if($row_login['user_status'] == "N")
         {
	echo "<script>alert(\"Your username is not activated. Please contact the Administrator !!\");</script><meta http-equiv='refresh' content='0;url=index.php'>" ;
         }
         else if($row_login > 0)
         {

              if($row_login['role'] == "ผู้ดูแลระบบ")
              {
	  $_SESSION['login'] = "true";
	  $_SESSION['role'] = "ผู้ดูแลระบบ";
	  $_SESSION['username'] = $row_login['username'];
	  echo "<meta http-equiv='refresh' content='0;url=admin/index.php'>" ;
              }

              if($row_login['role'] == "ผู้ใช้งานทั่วไป")
              {
	  $_SESSION['login'] = "true";
	  $_SESSION['role'] = "ผู้ใช้งานทั่วไป";
	  $_SESSION['username'] = $row_login['username'];
	  echo "<meta http-equiv='refresh' content='0;url=user/index.php'>" ;
              }

         }
         else
         {
              echo "<script>alert(\"Your Username or Password is wrong !!\");</script>";
              echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
         }

}
?>
</body>
</html>


