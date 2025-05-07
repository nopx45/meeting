<?php
include "function.php";
include "dbconfig.php";
conndb();

$query = "select * from room_tb order by room_name";
$result= mysql_query($query);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>:: Meeting Room ::</title>

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

<script language="javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable,menubar=yes'
win = window.open(mypage,myname,settings)
}
</script>

</head>

<body>

<center>

<table width="670" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Meeting Room ::</b></font></td>
  </tr>

</table>

<br>



<?php
while ($row = mysql_fetch_array($result))
{
?>

<table width="650" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#EEA2A2" colspan="2" height="30" align="center"><font color="#000000"><?php echo $row['room_name']; ?></font></td>
  </tr>
  <tr>
    <td colspan="2"><br><div align="center"><a href="room_picture/<?php echo $row['room_pic']; ?>" target="_blank"><img src="room_picture/<?php echo $row['room_pic']; ?>" width="400" border="0"></a></div><br></td>
  </tr>

  <tr>
    <td width="150" bgcolor="#C1CBCB"><div align="right">Address :&nbsp;</div></td>
    <td width="500" bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['room_address']); ?></div></td>
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
    <td bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['remarks']); ?></div>
    </td>
  </tr>

</table>

<br>

<?php
}
?>


</center>
<br><br>
</body>
</html>

<?php
closedb();
?>
