<?php

$conn;

$server = "localhost"; // มักเป็น localhost (กรณี Host ที่คุณใช้ไม่ได้กำหนดเป็นค่าอย่างอื่น)
$user = "root"; // Username ในการติดต่อฐานข้อมูล
$pass = "12345678"; // Password ในการติดต่อฐานข้อมูล
$dbname = "meeting"; // ชื่อฐานข้อมูลที่ได้สร้างไว้

function conndb() {
  global $conn;
  global $server;
  global $user;
  global $pass;
  global $dbname;
  $conn = mysql_connect($server,$user,$pass);
  mysql_query("SET NAMES utf8");
  if (!$conn)
    die("ไม่สามารถติดต่อกับ MySQL ได้");

  mysql_select_db($dbname,$conn)
    or die("ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
}

function closedb() {
  global $conn;
  mysql_close($conn);
}

?>
