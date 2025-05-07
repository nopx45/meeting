<?php
include "../../dbconfig.php";
conndb();

$id = $_GET['id'];

$sql1 = "delete from booking_tb where id=$id";
$result1 = mysql_query($sql1);

CloseDB();
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
?>