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

$query = "select * from user_tb where id='$id'";
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
input, textarea,select { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; } 
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

  if (form.role.value == "") {
    alert( "Please select Type !" );
    form.role.focus();
    return false ;
  }


  if (form.password.value == "") {
    alert( "Please insert Password !" );
    form.password.focus();
    return false ;
  }

  if (form.fullname.value == "") {
    alert( "Please insert Fullname !" );
    form.fullname.focus();
    return false ;
  }

  if (form.position.value == "") {
    alert( "Please insert Position !" );
    form.position.focus();
    return false ;
  }

  if (form.department.value == "") {
    alert( "Please insert Department !" );
    form.department.focus();
    return false ;
  }

  if (form.email.value == "") {
    alert( "Please insert E-mail !" );
    form.email.focus();
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

<form action="edit_tuple_in.php" name="form1" method="post" onsubmit="return checkform(this);">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b>:: Manage User ::</b></font></td>
  </tr>


  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Username :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><font color="red"><?php echo $row['username']; ?></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB" width="20%"><div align="right">Type :&nbsp;</div></td>
    <td bgcolor="#F2F5F5" width="80%"><div align="left">
<select name="role">
      <option value="">----------- Select Type -----------</option>
      <option value="ผู้ใช้งานทั่วไป" <?php if($row['role'] == "ผู้ใช้งานทั่วไป") echo "selected"; ?>>ผู้ใช้งานทั่วไป</option>
      <option value="ผู้ดูแลระบบ" <?php if($row['role'] == "ผู้ดูแลระบบ") echo "selected"; ?>>ผู้ดูแลระบบ</option>
</select>
   <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Password :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="password" type="text" value="<?php echo $row['password']; ?>" size="60" maxlength="50" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Fullname :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="fullname" type="text" value="<?php echo $row['fullname']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Position :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="position" type="text" value="<?php echo $row['position']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="department" type="text" value="<?php echo $row['department']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">E-mail :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="email" type="text" value="<?php echo $row['email']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="tel" type="text" value="<?php echo $row['tel']; ?>" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Status :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left">

<select name="user_status">
  <option value="Y" <?php if($row['user_status'] == "Y") echo "selected"; ?>>ACTIVE</option>
  <option value="N" <?php if($row['user_status'] == "N") echo "selected"; ?>>NOT ACTIVE</option>
</select>

    </div></td>
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
