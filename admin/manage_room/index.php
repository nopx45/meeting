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

  if (form.room_name.value == "") {
    alert( "Please insert Room Name !" );
    form.room_name.focus();
    return false ;
  }

  if (form.room_address.value == "") {
    alert( "Please insert Address !" );
    form.room_address.focus();
    return false ;
  }

  if (form.total_seat.value == "") {
    alert( "Please insert Number of seats !" );
    form.total_seat.focus();
    return false ;
  }

  if (form.response_name.value == "") {
    alert( "Please insert Responsible person !" );
    form.response_name.focus();
    return false ;
  }

  if (form.department.value == "") {
    alert( "Please insert Department !" );
    form.department.focus();
    return false ;
  }

  if (form.tel.value == "") {
    alert( "Please insert Telephone !" );
    form.tel.focus();
    return false ;
  }

  return true ;
}

</script>

<script Language="Javascript">
<!--
function Conf(object) {
              if (confirm("Please confirm delete ?") == true) {
          return true;
                }
          return false;
                }
//-->
</script>

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

<form action="add_room_in.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return checkform(this);">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Manage Room ::</b></font></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Room Name :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="room_name" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Room Picture :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><INPUT type="file" name="filesattach_name" id="filesattach_name" size="49"></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Address :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><textarea name="room_address" cols="56" rows="3"></textarea> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Number of seats :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="total_seat" type="text" size="10" maxlength="10" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Responsible person :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="response_name" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="department" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="tel" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Remarks :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><textarea name="remarks" cols="56" rows="3"></textarea></div></td>
  </tr>

  <tr>
    <td colspan="2" height="30" align="center"><input name="submit_bt" value="Submit" type="submit"> <input name="reset_bt" value="Cancel" type="reset"></td>
  </tr>

</table>
</form>

<br>

<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="7" height="30" align="center"><font color="#FFFFFF"><b>:: All Meeting Room ::</b></font></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB" width="5%"><div align="center">No.</div></td>
    <td bgcolor="#C1CBCB" width="64%"><div align="center">Room Name</div></td>
    <td bgcolor="#C1CBCB" width="15%"><div align="center">Number of seats</div></td>
    <td bgcolor="#C1CBCB" width="7%"><div align="center">View</div></td>
    <td bgcolor="#C1CBCB" width="7%"><div align="center">Edit</div></td>
    <td bgcolor="#C1CBCB" width="7%"><div align="center">Delete</div></td>
  </tr>

<?php
$strSQL = "SELECT * FROM room_tb ORDER BY room_name";
$result = mysql_query($strSQL);

$no = 1;
While($row = mysql_fetch_array($result)){
?>

  <tr>
    <td bgcolor="#F2F5F5"><div align="center"><?php echo $no; ?></div></td>
    <td bgcolor="#F2F5F5"><div align="left"><?php echo $row['room_name']; ?></div></td>
    <td bgcolor="#F2F5F5"><div align="center"><?php echo $row['total_seat']; ?></div></td>
    <td bgcolor="#F2F5F5"><div align="center"><a href="show_tuple.php?id=<?php echo $row['id'];?>" onclick="NewWindow(this.href,'show_tuple','700','500','yes');return false"><img src="../../images/view_icon.gif" width="19" border="0"></a></div></td>
    <td bgcolor="#F2F5F5"><div align="center"><a href="edit_tuple.php?id=<?php echo $row['id'];?>"><img src="../../images/edit.gif" width="19" border="0"></a></div></td>
    <td bgcolor="#F2F5F5"><div align="center"><a href="delete_tuple.php?id=<?php echo $row['id'];?>" OnClick="return Conf(this)"><img src="../../images/delete.png" width="19" border="0"></a></div></td>
  </tr>

<?php
$no++;
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
