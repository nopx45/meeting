<?php
include "../function.php";
include "../dbconfig.php";
include "../config.php";
conndb();

$id = $_POST['id'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$position = $_POST['position'];
$department = $_POST['department'];
$email = $_POST['email'];
$tel = $_POST['tel'];


$sql[0] = "update user_tb set password='$password' where id='$id' ";
$sql[1] = "update user_tb set fullname='$fullname' where id='$id' ";
$sql[2] = "update user_tb set position='$position' where id='$id' ";
$sql[3] = "update user_tb set department='$department' where id='$id' ";
$sql[4] = "update user_tb set email='$email' where id='$id' ";
$sql[5] = "update user_tb set tel='$tel' where id='$id' ";

for($i=0;$i<6;$i++) {
    $result = mysql_query($sql[$i]);
}

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
  alert("แก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว !!");
</script>

<meta http-equiv='refresh' content='0;url=edit_profile.php'>

</body>
</html>

<?php
closedb();
?>
