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

<script>
function checkform ( form )
{

  if (form.start_date.value == "") {
    alert( "Please select Start Date !" );
    form.start_date.focus();
    return false ;
  }

  if (form.end_date.value == "") {
    alert( "Please select End Date !" );
    form.end_date.focus();
    return false ;
  }

  popup(form);

  return true ;
}

function popup(myform) 
{ 
if (! window.focus)return true; 
var d = new Date(); 

windowname = d.getTime(); 
window.open('', windowname, 'top=100,left=100,height=600,width=1100,location=no,resizable=no,scrollbars=yes,status=no,menubar=yes'); 
myform.target=windowname; 
return true; 
} 

</script>

<script language="JavaScript" type="text/javascript" src="../../js/datepicker.js"></script>
<link href="../../js/datepickerstyle.css" type="text/css" rel="stylesheet">

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
      <td align="center"><img src="../../images/meeting_header.jpg"></td>
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
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../index.php">Home</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../manage_booking/index.php">Manage Booking</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../manage_user/index.php">Manage User</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../manage_room/index.php">Manage Room</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../manage_list/index.php">Manage List</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../manage_report/index.php">Report</a></div></td>
          </tr>
          <tr>
            <td bgcolor="#DFE6F1"><div align="left">&gt <a href="../../logout.php">Log out</a></div></td>
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

<form action="show_report.php" name="form1" method="post" onsubmit="return checkform(this);">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Report ::</b></font></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB" width="20%"><div align="right">Room Name :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">
<select name="room_id">
      <option value="" selected>---------------------------- All ----------------------------</option>

<?php
$strSQL1 = "SELECT * FROM room_tb ORDER BY room_name";
$result1 = mysql_query($strSQL1);

While($row1 = mysql_fetch_array($result1)){
?>
      <option value="<?php echo $row1['id']; ?>"><?php echo $row1['room_name']; ?></option>
<?php
}
?>

</select>
   </div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Start Date :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="start_date" type="text" size="10" readonly="1" /> <a href="javascript:displayDatePicker('start_date')"><img border="0" src="../../images/formcal.gif" width="16" height="16"></a> <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">End Date :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="end_date" type="text" size="10" readonly="1" /> <a href="javascript:displayDatePicker('end_date')"><img border="0" src="../../images/formcal.gif" width="16" height="16"></a> <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Subject :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="subject" type="text" size="57" maxlength="200" /></div></td>
  </tr>

  <tr>
    <td colspan="2" height="30" align="center"><input name="submit_bt" value="Submit" type="submit"> <input name="reset_bt" value="Cancel" type="reset"></td>
  </tr>

</table>
</form>

<br>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="3" height="30" align="center"><font color="#FFFFFF"><b>:: Summary of Meeting Room Use ::</b></font></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB" width="88%"><div align="center">Room Name</div></td>
    <td bgcolor="#C1CBCB" width="12%"><div align="center">Total</div></td>
  </tr>

<?php
$strSQL = "SELECT room_id,count(*) AS total_use FROM booking_tb GROUP BY room_id";
$result = mysql_query($strSQL);

While($row = mysql_fetch_array($result)){

$room_id = $row['room_id'];
$strSQL_tmp = "SELECT * FROM room_tb WHERE id = '$room_id'";
$result_tmp = mysql_query($strSQL_tmp);
$row_tmp = mysql_fetch_array($result_tmp);
$room_name = $row_tmp['room_name'];

?>

  <tr>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $room_name; ?></div></td>
    <td bgcolor="#F2F5F5"><div align="center"><?php echo $row['total_use']; ?></div></td>
  </tr>

<?php
}
?>
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
