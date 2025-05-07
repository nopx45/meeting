<?php
include "function.php";
include "dbconfig.php";
include "config.php";
conndb();
$id = $_GET['id'];

$query = "select * from booking_tb where id='$id'";
$result= mysql_query($query);
$row = mysql_fetch_array($result);


$room_id = $row['room_id'];
$strSQL_tmp = "SELECT * FROM room_tb WHERE id = '$room_id'";
$result_tmp = mysql_query($strSQL_tmp);
$row_tmp = mysql_fetch_array($result_tmp);
$room_name = $row_tmp['room_name'];
$room_pic = $row_tmp['room_pic'];

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

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: <?php echo $room_name; ?> ::</b></font></td>
  </tr>

  <tr>
    <td colspan="2"><br><div align="center"><a href="room_picture/<?php echo $room_pic; ?>" target="_blank"><img src="room_picture/<?php echo $room_pic; ?>" width="300" border="0"></a></div><br></td>
  </tr>

  
  <tr>
    <td width="30%" bgcolor="#C1CBCB"><div align="right">Subject :&nbsp;</div></td>
    <td width="70%" bgcolor="#F2F5F5"><div align="left"><?php echo $row['subject']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Chairman :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['header']; ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Date :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo convert_date($row['booking_date']); ?></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Time :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo convert_time($row['time_start']); ?> - <?php echo convert_time($row['time_end']); ?> น.</div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Equipment :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['checktool']; ?></div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Food :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['checkfood']; ?></div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['department']; ?></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">List of attendees :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['person_meeting']); ?></div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Remarks :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo nl2br($row['remark']); ?></div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Status :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">
<?php 
if($row['booking_status'] == "NOT_ACTIVE")
   echo "Approved";

?></div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Booking by :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><a href="show_person.php?username=<?php echo $row['username']; ?>" onclick="NewWindow(this.href,'show_person','510','250','yes');return false"><?php echo $row['username']; ?></a></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Date/Time Booking :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['datetime_send']; ?></div></td>
  </tr>
</table>

</center>
<br><br>
</body>
</html>

<?php
closedb();
?>
