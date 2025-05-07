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
          <tbody>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
<center>
<a href="../show_all_room.php" onclick="NewWindow(this.href,'show_tuple','700','500','yes');return false"><img src="../images/all_room_label.jpg" border="0"></a>
</center>
<br>
            </td>
          </tr>
          <tr>
            <td>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#F39898" height="30" align="center"><font color="#000000"><b>Before booking a Meeting room , Please check the status of your meeting room. Is the Meeting room available on the Day/Time you want ?</b></font></td>
  </tr>

  <tr>
    <td align="center">
<?php
include "calendar.php";
?>
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td align="center">
			
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>


<?php

if($date != "")
{
?>
              <tr>
                <td align="center" bgcolor="#000000" height="30"><font color="#FFFFFF"><b>:: Meeting room on <?php echo DateThai($date); ?> ::</b></font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>


<?php
$strSQL = "SELECT * FROM booking_tb WHERE booking_date = '$date' ORDER BY room_id,time_start";
$result = mysql_query($strSQL);
$total_login = mysql_num_rows($result);

?>


                  <div align="center">Total <font color="red"><b><?php echo $total_login; ?></b></font> Records</div><br>

	<table bordercolorlight="#999999" bordercolordark="#FFFFFF" align="center" border="0" bordercolor="#FFFFFF" cellpadding="2" cellspacing="1" height="25" width="100%">
                    <tbody>
                     <tr bgcolor="#C1CBCB">
                      <td width="49%" align="center">Subject</td>
                      <td width="29%" align="center">Room</td>
                      <td width="14%" align="center">Time</td>
                      <td width="8%" align="center">More</td>
                    </tr>
<?php
While($row = mysql_fetch_array($result)){

$room_id = $row['room_id'];
$strSQL_tmp = "SELECT * FROM room_tb WHERE id = '$room_id'";
$result_tmp = mysql_query($strSQL_tmp);
$row_tmp = mysql_fetch_array($result_tmp);
$room_name = $row_tmp['room_name'];

?>
                     <tr bgcolor="<?php if($row['booking_status'] == "NOT_ACTIVE") echo "#FCB8B8"; else echo "#F2F5F5"; ?>">
                      <td align="left"><?php echo $row['subject']; ?></td>
                      <td align="left"><?php echo $room_name; ?></td>
                      <td align="center"><?php echo convert_time($row['time_start']); ?> - <?php echo convert_time($row['time_end']); ?></td>
                      <td align="center"><a href="../show_details.php?id=<?php echo $row['id'];?>" onclick="NewWindow(this.href,'show_tuple','700','500','yes');return false"><img src="../images/view_icon.gif" width="19" border="0"></a></td>
                    </tr>
<?php
}
?>

                     <tr>
                      <td align="left" colspan="4" height="40"><small>Meeting room reservation with a red background means not yet approved.</small></td>
                    </tr>

                    </tbody>
	</table>
	</div>

                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
<?php
}
?>



                  </tbody>
	</table>
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
