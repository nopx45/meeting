<?php
include "function.php";
include "dbconfig.php";
include "config.php";
conndb();

$username = $_GET['username'];

$query = "select * from user_tb where username='$username'";
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

<table width="500" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: User Information of <?php echo $row['username']; ?> ::</b></font></td>
  </tr>


  <tr>
    <td width="30%" bgcolor="#C1CBCB"><div align="right">Type :&nbsp;</div></td>
    <td width="70%" bgcolor="#F2F5F5"><div align="left"><?php echo $row['role']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Fullname :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['fullname']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Position :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['position']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['department']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">E-mail :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['email']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['tel']; ?></div></td>
  </tr>

</table>

</center>
<br><br>
</body>
</html>

<?php
closedb();
?>
