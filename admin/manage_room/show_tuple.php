<?php
session_start();
include "../../function.php";
include "../../dbconfig.php";
include "../../config.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../../index.php");
     exit;
}

$id = $_GET['id'];

$query = "select * from room_tb where id='$id'";
$result= mysql_query($query);
$row = mysql_fetch_array($result);

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

<center>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Meeting Room ::</b></font></td>
  </tr>

  <tr>
    <td colspan="2"><br><div align="center"><a href="../../room_picture/<?php echo $row['room_pic']; ?>" target="_blank"><img src="../../room_picture/<?php echo $row['room_pic']; ?>" width="400" border="0"></a></div><br></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB" width="20%"><div align="right">Room Name :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['room_name']; ?></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Address :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['room_address']); ?></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Number of seats :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['total_seat']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Responsible person :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['response_name']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['department']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['tel']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Remarks :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['remarks']); ?></div></td>
  </tr>

</table>

</center>

</body>
</html>

<?php
closedb();
?>
