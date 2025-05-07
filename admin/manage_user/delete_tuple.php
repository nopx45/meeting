<?php
session_start();
include "../../dbconfig.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}

$id = $_GET['id'];

$sql1 = "delete from user_tb where id=$id";
$result1 = mysql_query($sql1);

CloseDB();
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
?>