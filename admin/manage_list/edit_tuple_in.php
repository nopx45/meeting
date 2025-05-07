<?php
session_start();
include "../../function.php";
include "../../dbconfig.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}

$id = $_POST['id'];
$list_type = $_POST['list_type'];
$list_name = $_POST['list_name'];

$sql[0] = "update list_tb set list_type='$list_type' where id='$id' ";
$sql[1] = "update list_tb set list_name='$list_name' where id='$id' ";

for($i=0;$i<2;$i++) {
    $result = mysql_query($sql[$i]);
}

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
  alert("Edit List Name Success !!");
</script>

<meta http-equiv='refresh' content='0;url=index.php'>

</body>
</html>

<?php
closedb();
?>
