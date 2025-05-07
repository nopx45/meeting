<html>
<head>
<title>:: ติดตั้งระบบ ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
BODY {
    FONT-FAMILY: Arial, Helvetica, sans-serif
}
</style>
</head>
<body>
<?php

include "dbconfig.php";
conndb();


$sql[0] = "CREATE TABLE `booking_tb` (
  `id` int(5) NOT NULL auto_increment primary key,
  `subject` varchar(200) NOT NULL,
  `header` varchar(200) NOT NULL,
  `nummeeting` varchar(10) NOT NULL,
  `room_id` varchar(5) NOT NULL,
  `booking_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `checktool` text DEFAULT NULL,
  `checkfood` text DEFAULT NULL,
  `department` varchar(200) NOT NULL,
  `person_meeting` text NOT NULL,
  `remark` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `datetime_send` varchar(50) NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  `txt_tmp1` text DEFAULT NULL,
  `txt_tmp2` text DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8
" ;

$sql[1] = "CREATE TABLE `list_tb` (
  `id` int(5) NOT NULL auto_increment primary key,
  `list_type` varchar(200) NOT NULL,
  `list_name` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8
" ;

$sql[2] = "CREATE TABLE `user_tb` (
  `id` int(5) NOT NULL auto_increment primary key,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `user_status` varchar(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8
" ;

$sql[3] = "CREATE TABLE `room_tb` (
  `id` int(5) NOT NULL auto_increment primary key,
  `room_name` varchar(200) NOT NULL,
  `room_pic` varchar(100) NOT NULL,
  `room_address` varchar(500) NOT NULL,
  `total_seat` varchar(10) NOT NULL,
  `response_name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8
" ;

$sql[4] = "INSERT INTO `user_tb` VALUES (1, 'ผู้ดูแลระบบ', 'admin', 'admin', 'กรอกชื่อ-นามสกุล', 'กรอกตำแหน่ง', 'กรอกสังกัด', 'กรอกอีเมล์', 'กรอกเบอร์โทรศัพท์','Y')" ;
$sql[5] = "INSERT INTO `user_tb` VALUES (2, 'ผู้ใช้งานทั่วไป', 'user', 'user', 'กรอกชื่อ-นามสกุล', 'กรอกตำแหน่ง', 'กรอกสังกัด', 'กรอกอีเมล์', 'กรอกเบอร์โทรศัพท์','Y')" ;
$sql[6] = "INSERT INTO `room_tb` VALUES (1, 'ห้องประชุมใหญ่', 'nofile.jpg', 'ห้อง 344 ชั้น 3 ตึก 4 \r\nบริษัท AAA จำกัด (มหาชน)', '200', 'กรอกชื่อ-นามสกุล', 'ฝ่ายอาคารและสถานที่', '021234567', '-')" ;
$sql[7] = "INSERT INTO `room_tb` VALUES (2, 'ห้องประชุมเล็ก', 'nofile.jpg', 'ห้อง 234 ชั้น 2 ตึก 3 \r\nบริษัท AAA จำกัด (มหาชน)', '50', 'กรอกชื่อ-นามสกุล', 'ฝ่ายอาคารและสถานที่', '021234567', '-')" ;
$sql[8] = "INSERT INTO `list_tb` VALUES (1, 'เตรียมอาหาร', 'อาหารว่างเช้า')" ;
$sql[9] = "INSERT INTO `list_tb` VALUES (2, 'เตรียมอาหาร', 'อาหารกลางวัน')" ;
$sql[10] = "INSERT INTO `list_tb` VALUES (3, 'เตรียมอาหาร', 'อาหารว่างบ่าย')" ;
$sql[11] = "INSERT INTO `list_tb` VALUES (4, 'อุปกรณ์ที่ใช้', 'เครื่องฉายโปรเจคเตอร์')" ;
$sql[12] = "INSERT INTO `list_tb` VALUES (5, 'อุปกรณ์ที่ใช้', 'คอมพิวเตอร์โน๊ตบุ๊ค')" ;
$sql[13] = "INSERT INTO `list_tb` VALUES (6, 'อุปกรณ์ที่ใช้', 'ไมโครโฟน')" ;
$sql[14] = "INSERT INTO `list_tb` VALUES (7, 'อุปกรณ์ที่ใช้', 'Pointer')" ;
$sql[15] = "INSERT INTO `list_tb` VALUES (8, 'อุปกรณ์ที่ใช้', 'กล้องวิดีโอ')" ;
$sql[16] = "INSERT INTO `list_tb` VALUES (9, 'อุปกรณ์ที่ใช้', 'กล้องถ่ายภาพ')" ;


for($i=0;$i<17;$i++) {
      $result = mysql_query($sql[$i]);
}


if($result) {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"138\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลเสร็จสมบูรณ์ !!</font><br><br>
    <font size=\"4\"><a href=\"javascript:window.close()\">[ ตกลง ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}
else {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"270\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลล้มเหลว !!</font><br><br>
<p align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"red\"><small>อาจเกิดจากสาเหตุดังต่อไปนี้ ....</font><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. มีการสร้างตารางชื่อซ้ำกันอยู่แล้ว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. กำหนดค่าในไฟล์ dbconfig.php ผิดพลาด<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. ยังไม่ได้สร้างฐานข้อมูล<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. ยังไม่ได้สร้าง Username , Password สำหรับ ฐานข้อมูล<br>
</small></p>
    <font size=\"4\"><a href=\"javascript:location.reload(true);\">[ ลองใหม่ ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}

?>
</body>
</html>