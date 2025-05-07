<?php
include "../../function.php";
include "../../dbconfig.php";
include "../../config.php";
conndb();

$room_id = $_POST['room_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$subject = $_POST['subject'];


$query = "select * from booking_tb where booking_date BETWEEN '$start_date' AND '$end_date' AND subject like '%$subject%' ";

if($room_id != "")
{
    $query .= "AND room_id = '$room_id'";
}

$query .= "ORDER BY booking_date DESC";

$result= mysql_query($query);
$total_count = mysql_num_rows($result);

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
    <td bgcolor="#000000" colspan="6" height="30" align="center"><font color="#FFFFFF"><b>:: Report ::</b></font></td>
  </tr>

  <tr>
    <td bgcolor="#F2F5F5" colspan="6" height="30" align="center">Total <font color="red"><b><?php echo $total_count; ?></b></font> Records</td>
  </tr>

                     <tr bgcolor="#C1CBCB">
                      <td width="11%" align="center">Date/Time</td>
                      <td width="37%" align="center">Subject</td>
                      <td width="21%" align="center">Chairman</td>
                      <td width="25%" align="center">Room</td>
                      <td width="6%" align="center">More</td>
                    </tr>

<?php
While($row = mysql_fetch_array($result)){

$room_id_tmp = $row['room_id'];
$strSQL_tmp = "SELECT * FROM room_tb WHERE id = '$room_id_tmp'";
$result_tmp = mysql_query($strSQL_tmp);
$row_tmp = mysql_fetch_array($result_tmp);
$room_name = $row_tmp['room_name'];

?>

                     <tr bgcolor="<?php if($row['booking_status'] == "NOT_ACTIVE") echo "#FCB8B8"; else echo "#F2F5F5"; ?>">
                      <td align="center"><?php echo convert_date($row['booking_date']); ?><br><?php echo convert_time($row['time_start']); ?> - <?php echo convert_time($row['time_end']); ?></td>
                      <td align="left"><?php echo $row['subject']; ?></td>
                      <td align="left"><?php echo $row['header']; ?></td>
                      <td align="left"><?php echo $room_name; ?></td>
                      <td align="center"><a href="../../show_details.php?id=<?php echo $row['id'];?>" onclick="NewWindow(this.href,'show_details','700','500','yes');return false"><img src="../../images/view_icon.gif" width="19" border="0"></a></td>
                    </tr>

<?php
}
?>

<?php
if($total_count == 0){
?>
  <tr>
    <td bgcolor="#F2F5F5" colspan="5" height="30" align="center"><font color="red"><b>NOT FOUND</b></font></td>
  </tr>
<?php
}
?>

                     <tr>
                      <td align="left" colspan="5" height="40"><small>Meeting room reservation with a red background means not yet approved.</small></td>
                    </tr>

</table>

</center>
<center>
<input type="button" name="my_btn" value="==: PRINT :==" onClick="javascript:window.print();javascript:this.style.display='none'">
</center>
<br><br>
</body>
</html>

<?php
closedb();
?>
