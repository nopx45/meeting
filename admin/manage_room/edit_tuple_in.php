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

$id = $_POST['id'];
$room_name = $_POST['room_name'];
$room_address = $_POST['room_address'];
$total_seat = $_POST['total_seat'];
$response_name = $_POST['response_name'];
$department = $_POST['department'];
$tel = $_POST['tel'];
$remarks = $_POST['remarks'];


// หาชื่อรูปเก่า
$sql_select = "SELECT * FROM room_tb WHERE id=$id";
$result_select = mysql_query($sql_select);
$row_select = mysql_fetch_array($result_select);

$picture_name = $row_select['room_pic'];




if (is_uploaded_file($_FILES['filesattach_name']['tmp_name'])) 
{

        $filename = $_FILES['filesattach_name']['name'];

        $dot_position = strrpos($filename,".");
        $file_type = substr($filename,0-(strlen($filename)-$dot_position));

        $filename = date("dmyHis").$file_type;
        $path = "../../room_picture/";

        if (file_exists($path . $_FILES['filesattach_name']['name'])) {
                      echo "<center><font color=\"#800000\">Error !! Your file has already exists name, Pleasy change filename .</font></center><br>\n"; exit; }

        $res = copy($_FILES['filesattach_name']['tmp_name'], $path.$filename);
        if (!$res) { echo "<center><font color=\"#800000\">Error !! ไม่สามารถ Upload ไฟล์ได้</font></center><br>\n"; exit; } 

        $sql[0] = "update room_tb set room_name='$room_name' where id='$id' ";
        $sql[1] = "update room_tb set room_address='$room_address' where id='$id' ";
        $sql[2] = "update room_tb set total_seat='$total_seat' where id='$id' ";
        $sql[3] = "update room_tb set response_name='$response_name' where id='$id' ";
        $sql[4] = "update room_tb set department='$department' where id='$id' ";
        $sql[5] = "update room_tb set tel='$tel' where id='$id' ";
        $sql[6] = "update room_tb set remarks='$remarks' where id='$id' ";
        $sql[7] = "update room_tb set room_pic='$filename' where id='$id' ";

        for($i=0;$i<8;$i++) {
            $result = mysql_query($sql[$i]);
        }
        echo mysql_error();

        if($picture_name != "nofile.jpg"){
             unlink("../../room_picture/$picture_name");
        }

}
else
{

$sql[0] = "update room_tb set room_name='$room_name' where id='$id' ";
$sql[1] = "update room_tb set room_address='$room_address' where id='$id' ";
$sql[2] = "update room_tb set total_seat='$total_seat' where id='$id' ";
$sql[3] = "update room_tb set response_name='$response_name' where id='$id' ";
$sql[4] = "update room_tb set department='$department' where id='$id' ";
$sql[5] = "update room_tb set tel='$tel' where id='$id' ";
$sql[6] = "update room_tb set remarks='$remarks' where id='$id' ";

for($i=0;$i<7;$i++) {
    $result = mysql_query($sql[$i]);
}
echo mysql_error();

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

<script>
  alert("Edit Meeting Room Success !!");
</script>

<meta http-equiv='refresh' content='0;url=index.php'>

</body>
</html>

<?php
closedb();
?>
