<?php
session_start();
include "../function.php";
include "../dbconfig.php";
include "../config.php";
conndb();

if (!isset($_SESSION['login'])) {
     header("Location: ../index.php");
     exit;
}


function check_availble($reserve_id,$room_id,$booking_date,$chktime_start,$chktime_end)
{

$sql_chk = "SELECT * 
FROM booking_tb 


WHERE 
time_start < '$chktime_end'
 AND  
time_end  > '$chktime_start' AND 
room_id = '$room_id' AND 
booking_date = '$booking_date' AND 
id <> '$reserve_id' ";

$result_chk = mysql_query($sql_chk);

$total_chk = mysql_num_rows($result_chk);

return $total_chk;

}


$id = $_POST['id'];
$subject = $_POST['subject'];
$header = $_POST['header'];
$nummeeting = $_POST['nummeeting'];
$room_id = $_POST['room_id'];
$booking_date = $_POST['booking_date'];
$time_start = $_POST['time_start_hr'].":".$_POST['time_start_min'].":00";
$time_end = $_POST['time_end_hr'].":".$_POST['time_end_min'].":00";

$checktool = $_POST['checktool'];
for ($i=0 ; $i<count($checktool) ; $i++)
{
     $checktool_str .= "- ".$checktool[$i]."<br>";
}

$checkfood = $_POST['checkfood'];
for ($i=0 ; $i<count($checkfood) ; $i++)
{
     $checkfood_str .= "- ".$checkfood[$i]."<br>";
}

$department = $_POST['department'];
$person_meeting = $_POST['person_meeting'];
$remark = $_POST['remark'];



$sql[0] = "update booking_tb set subject='$subject' where id='$id' ";
$sql[1] = "update booking_tb set header='$header' where id='$id' ";
$sql[2] = "update booking_tb set nummeeting='$nummeeting' where id='$id' ";
$sql[3] = "update booking_tb set room_id='$room_id' where id='$id' ";
$sql[4] = "update booking_tb set booking_date='$booking_date' where id='$id' ";
$sql[5] = "update booking_tb set time_start='$time_start' where id='$id' ";
$sql[6] = "update booking_tb set time_end='$time_end' where id='$id' ";
$sql[7] = "update booking_tb set checktool='$checktool_str' where id='$id' ";
$sql[8] = "update booking_tb set checkfood='$checkfood_str' where id='$id' ";
$sql[9] = "update booking_tb set department='$department' where id='$id' ";
$sql[10] = "update booking_tb set person_meeting='$person_meeting' where id='$id' ";
$sql[11] = "update booking_tb set remark='$remark' where id='$id' ";


if( check_availble($id,$room_id,$booking_date,$time_start,$time_end) == 0 )
{

for($i=0;$i<12;$i++) {
    $result = mysql_query($sql[$i]);
    echo mysql_error();
}

}
else
{
?>
<script language='javascript'>
alert("Your booking time is not available !!");
history.go(-1);
</script>
<?php
}



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

<table border="0" cellpadding="0" cellspacing="0" width="1000">
  <tbody><tr>
    <td>

<!-- เริ่ม Code ตารางส่วน Header -->
<table class="bottom_border" border="0" cellpadding="0" cellspacing="0" width="100%"> 
  <tbody>
  <tr>
      <td align="center"><img src="../images/meeting_header.jpg"></td>
  </tr>
</tbody>
</table>
<!-- สิ้นสุด Code ตารางส่วน Header -->


</td>
  </tr>
  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>
        <td class="right_border" bgcolor="#CCCCCC" valign="top" width="15%"><table border="0" cellpadding="0" cellspacing="0" width="260">
          <tbody><tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
    <td>


<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
      <tbody>
        <tr>
        <td bgcolor="#000000" height="30" align="center"><font color="#FFFFFF"><b>:: MENU ::</b></font></td>
        </tr>
      <tr>
        <td><table align="center" border="0" cellpadding="5" cellspacing="2" width="100%">
          <tbody>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="index.php">Home</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="booking_room.php">Booking Meeting Room</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="manage_booking.php">Manage Booking</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="edit_profile.php">Edit Profiles</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../logout.php">Log out</a></div></td>
          </tr>

        </tbody></table></td>
        </tr>
    </tbody>
</table>


    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>


</tbody></table>

</td>
          </tr>
        </tbody></table></td>

        <td bgcolor="#E5E5E5" valign="top" width="85%"><table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
          <tbody><tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Edit Booking ::</b></font></td>
  </tr>
  
  <tr>
    <td width="100%" bgcolor="#C1CBCB" align="center">
<br><b>Edit Booking Success !!</b><br><br>[ <a href="manage_booking.php">OK</a> ]
<br><br>
    </td>
  </tr>

</table>



<br></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>


          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody></table></td>
      </tr>
      <tr>
        <td colspan="2">


<table border="0" cellpadding="0" cellspacing="0" height="10" width="100%">
  <tbody><tr>
    <td></td>
  </tr>
</tbody>
</table>


</td>
        </tr>
    </tbody></table></td>
  </tr>
</tbody></table>

</center>

</body>
</html>

<?php
closedb();
?>
