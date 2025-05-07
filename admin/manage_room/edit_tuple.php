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

<form action="edit_tuple_in.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return checkform(this);">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Manage Room ::</b></font></td>
  </tr>


  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Room Name :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="room_name" type="text" size="60" value="<?php echo $row['room_name']; ?>" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Room Picture :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><INPUT type="file" name="filesattach_name" id="filesattach_name" size="49"></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Address :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><textarea name="room_address" cols="56" rows="3"><?php echo $row['room_address']; ?></textarea> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Number of seats :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="total_seat" type="text" size="10" value="<?php echo $row['total_seat']; ?>" maxlength="10" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Responsible person :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="response_name" type="text" size="60" value="<?php echo $row['response_name']; ?>" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="department" type="text" size="60" value="<?php echo $row['department']; ?>" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="tel" type="text" size="60" value="<?php echo $row['tel']; ?>" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Remarks :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><textarea name="remarks" cols="56" rows="3"><?php echo $row['remarks']; ?></textarea></div></td>
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
