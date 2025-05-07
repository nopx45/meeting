<?php
session_start();
include "../../dbconfig.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}

$id = $_GET['id'];

$sql_select = "SELECT * FROM room_tb WHERE id=$id";
$result_select = mysql_query($sql_select);
$row_select = mysql_fetch_array($result_select);

$picture_name = $row_select['room_pic'];

if($picture_name != "nofile.jpg"){
     unlink("../../room_picture/$picture_name");
}

$sql1 = "delete from room_tb where id=$id";
$result1 = mysql_query($sql1);

CloseDB();
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
?>