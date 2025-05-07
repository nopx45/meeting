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

$id = $_GET['id'];

$query = "select * from booking_tb where id='$id'";
$result= mysql_query($query);
$row = mysql_fetch_array($result);

$time_start_hr = convert_time_hr($row['time_start']);
$time_start_min = convert_time_min($row['time_start']);

$time_end_hr = convert_time_hr($row['time_end']);
$time_end_min = convert_time_min($row['time_end']);

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

<script language="JavaScript" type="text/javascript" src="../js/chkform_booking_room_e.js"></script>
<script language="JavaScript" type="text/javascript" src="../js/datepicker.js"></script>
<link href="../js/datepickerstyle.css" type="text/css" rel="stylesheet">

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


<form action="edit_booking_in.php" name="form1" method="post" onsubmit="return checkform(this);">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Edit Booking ::</b></font></td>
  </tr>
  
  <tr>
    <td width="30%" bgcolor="#C1CBCB"><div align="right">Subject :&nbsp;</div></td>
    <td width="70%" bgcolor="#F2F5F5"><div align="left"><input name="subject" type="text" value="<?php echo $row['subject']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Chairman :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="header" type="text" value="<?php echo $row['header']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Meeting Room :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">
<select name="room_id">
      <option value="" selected>------------------ Select Meeting Room ------------------</option>

<?php
$strSQL1 = "SELECT * FROM room_tb ORDER BY room_name";
$result1 = mysql_query($strSQL1);

While($row1 = mysql_fetch_array($result1)){
?>
      <option value="<?php echo $row1['id']; ?>" <?php if($row['room_id'] == $row1['id']) echo "selected"; ?>><?php echo $row1['room_name']; ?></option>
<?php
}
?>

</select>
   <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Date :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="booking_date" type="text" value="<?php echo $row['booking_date']; ?>" size="10" maxlength="10" readonly="1" /> <a href="javascript:displayDatePicker('booking_date')"><img border="0" src="../images/formcal.gif" width="16" height="16"></a> <font color="red">*</font></div></td>
  </tr>
  
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Time :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">

<select name="time_start_hr">
  <option value="00" <?php if($time_start_hr == "00") echo "selected"; ?>>00</option>
  <option value="01" <?php if($time_start_hr == "01") echo "selected"; ?>>01</option>
  <option value="02" <?php if($time_start_hr == "02") echo "selected"; ?>>02</option>
  <option value="03" <?php if($time_start_hr == "03") echo "selected"; ?>>03</option>
  <option value="04" <?php if($time_start_hr == "04") echo "selected"; ?>>04</option>
  <option value="05" <?php if($time_start_hr == "05") echo "selected"; ?>>05</option>
  <option value="06" <?php if($time_start_hr == "06") echo "selected"; ?>>06</option>
  <option value="07" <?php if($time_start_hr == "07") echo "selected"; ?>>07</option>
  <option value="08" <?php if($time_start_hr == "08") echo "selected"; ?>>08</option>
  <option value="09" <?php if($time_start_hr == "09") echo "selected"; ?>>09</option>

 <?php
for($i=10;$i<=23;$i++){
?>
  <option value="<?php echo $i; ?>" <?php if($time_start_hr == $i) echo "selected"; ?>><?php echo $i; ?></option>
<?php
}
?>
</select> : 
<select name="time_start_min">
  <option value="00" <?php if($time_start_min == "00") echo "selected"; ?>>00</option>
  <option value="01" <?php if($time_start_min == "01") echo "selected"; ?>>01</option>
  <option value="02" <?php if($time_start_min == "02") echo "selected"; ?>>02</option>
  <option value="03" <?php if($time_start_min == "03") echo "selected"; ?>>03</option>
  <option value="04" <?php if($time_start_min == "04") echo "selected"; ?>>04</option>
  <option value="05" <?php if($time_start_min == "05") echo "selected"; ?>>05</option>
  <option value="06" <?php if($time_start_min == "06") echo "selected"; ?>>06</option>
  <option value="07" <?php if($time_start_min == "07") echo "selected"; ?>>07</option>
  <option value="08" <?php if($time_start_min == "08") echo "selected"; ?>>08</option>
  <option value="09" <?php if($time_start_min == "09") echo "selected"; ?>>09</option>

 <?php
for($i=10;$i<=59;$i++){
?>
  <option value="<?php echo $i; ?>" <?php if($time_start_min == $i) echo "selected"; ?>><?php echo $i; ?></option>
<?php
}
?>
</select>

ถึง 

<select name="time_end_hr">
  <option value="00" <?php if($time_end_hr == "00") echo "selected"; ?>>00</option>
  <option value="01" <?php if($time_end_hr == "01") echo "selected"; ?>>01</option>
  <option value="02" <?php if($time_end_hr == "02") echo "selected"; ?>>02</option>
  <option value="03" <?php if($time_end_hr == "03") echo "selected"; ?>>03</option>
  <option value="04" <?php if($time_end_hr == "04") echo "selected"; ?>>04</option>
  <option value="05" <?php if($time_end_hr == "05") echo "selected"; ?>>05</option>
  <option value="06" <?php if($time_end_hr == "06") echo "selected"; ?>>06</option>
  <option value="07" <?php if($time_end_hr == "07") echo "selected"; ?>>07</option>
  <option value="08" <?php if($time_end_hr == "08") echo "selected"; ?>>08</option>
  <option value="09" <?php if($time_end_hr == "09") echo "selected"; ?>>09</option>

 <?php
for($i=10;$i<=23;$i++){
?>
  <option value="<?php echo $i; ?>" <?php if($time_end_hr == $i) echo "selected"; ?>><?php echo $i; ?></option>
<?php
}
?>
</select> : 
<select name="time_end_min">
  <option value="00" <?php if($time_end_min == "00") echo "selected"; ?>>00</option>
  <option value="01" <?php if($time_end_min == "01") echo "selected"; ?>>01</option>
  <option value="02" <?php if($time_end_min == "02") echo "selected"; ?>>02</option>
  <option value="03" <?php if($time_end_min == "03") echo "selected"; ?>>03</option>
  <option value="04" <?php if($time_end_min == "04") echo "selected"; ?>>04</option>
  <option value="05" <?php if($time_end_min == "05") echo "selected"; ?>>05</option>
  <option value="06" <?php if($time_end_min == "06") echo "selected"; ?>>06</option>
  <option value="07" <?php if($time_end_min == "07") echo "selected"; ?>>07</option>
  <option value="08" <?php if($time_end_min == "08") echo "selected"; ?>>08</option>
  <option value="09" <?php if($time_end_min == "09") echo "selected"; ?>>09</option>

 <?php
for($i=10;$i<=59;$i++){
?>
  <option value="<?php echo $i; ?>" <?php if($time_end_min == $i) echo "selected"; ?>><?php echo $i; ?></option>
<?php
}
?>
</select>
</div></td>
  </tr>
  
 

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Equipment :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">

<?php
$strSQL2 = "SELECT * FROM list_tb WHERE list_type = 'อุปกรณ์ที่ใช้' ORDER BY id";
$result2 = mysql_query($strSQL2);

While($row2 = mysql_fetch_array($result2)){
?>
<input type="checkbox" name="checktool[]" value="<?php echo $row2['list_name']; ?>" <?php if(strpos ($row['checktool'],$row2['list_name']) != ""){echo "checked";} ?> /><?php echo $row2['list_name']; ?><br>
<?php
}
?>

    </div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Food :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">

<?php
$strSQL3 = "SELECT * FROM list_tb WHERE list_type = 'เตรียมอาหาร' ORDER BY id";
$result3 = mysql_query($strSQL3);

While($row3 = mysql_fetch_array($result3)){
?>
<input type="checkbox" name="checkfood[]" value="<?php echo $row3['list_name']; ?>" <?php if(strpos ($row['checkfood'],$row3['list_name']) != ""){echo "checked";} ?> /><?php echo $row3['list_name']; ?><br>
<?php
}
?>
    </div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="department" type="text" value="<?php echo $row['department']; ?>" size="60" maxlength="200" /></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">List of attendees :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">
<textarea name="person_meeting" cols="62" rows="5"><?php echo $row['person_meeting']; ?></textarea>
    </div>
    </td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Remarks :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">
<textarea name="remark" cols="62" rows="5"><?php echo $row['remark']; ?></textarea>
    </div>
    </td>
  </tr>

  <tr>
    <td colspan="2" height="30" align="center"><input name="submit_bt" value="Submit" type="submit"> <input name="reset_bt" value="Cancel" type="reset"></td>
  </tr>

</table>
</form>


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
