<?php
include "function.php";
include "dbconfig.php";
include "config.php";
conndb();

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

  if (form.username.value == "") {
    alert( "Please insert Username !" );
    form.username.focus();
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

  if (!emailCheck(form.email.value)) {
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


function checkform2 ( form )
{

  if (form.username.value == "") {
    alert( "Please insert Username !" );
    form.username.focus();
    return false ;
  }

  if (form.password.value == "") {
    alert( "Please insert Password !" );
    form.password.focus();
    return false ;
  }

  return true ;
}


function emailCheck (emailStr) {

/* The following variable tells the rest of the function whether or not
to verify that the address ends in a two-letter country or well-known
TLD.  1 means check it, 0 means don't. */

var checkTLD=1;

/* The following is the list of known TLDs that an e-mail address must end with. */

var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;

/* The following pattern is used to check if the entered e-mail address
fits the user@domain format.  It also is used to separate the username
from the domain. */

var emailPat=/^(.+)@(.+)$/;

/* The following string represents the pattern for matching all special
characters.  We don't want to allow special characters in the address. 
These characters include ( ) < > @ , ; : \ " . [ ] */

var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";

/* The following string represents the range of characters allowed in a 
username or domainname.  It really states which chars aren't allowed.*/

var validChars="\[^\\s" + specialChars + "\]";

/* The following pattern applies if the "user" is a quoted string (in
which case, there are no rules about which characters are allowed
and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
is a legal e-mail address. */

var quotedUser="(\"[^\"]*\")";

/* The following pattern applies for domains that are IP addresses,
rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
e-mail address. NOTE: The square brackets are required. */

var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;

/* The following string represents an atom (basically a series of non-special characters.) */

var atom=validChars + '+';

/* The following string represents one word in the typical username.
For example, in john.doe@somewhere.com, john and doe are words.
Basically, a word is either an atom or quoted string. */

var word="(" + atom + "|" + quotedUser + ")";

// The following pattern describes the structure of the user

var userPat=new RegExp("^" + word + "(\\." + word + ")*$");

/* The following pattern describes the structure of a normal symbolic
domain, as opposed to ipDomainPat, shown above. */

var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");

/* Finally, let's start trying to figure out if the supplied address is valid. */

/* Begin with the coarse pattern to simply break up user@domain into
different pieces that are easy to analyze. */

var matchArray=emailStr.match(emailPat);

if (matchArray==null) {

/* Too many/few @'s or something; basically, this address doesn't
even fit the general mould of a valid e-mail address. */

alert("Email address seems incorrect (check @ and .'s)");
return false;
}
var user=matchArray[1];
var domain=matchArray[2];

// Start by checking that only basic ASCII characters are in the strings (0-127).

for (i=0; i<user.length; i++) {
if (user.charCodeAt(i)>127) {
alert("Ths username contains invalid characters.");
return false;
   }
}
for (i=0; i<domain.length; i++) {
if (domain.charCodeAt(i)>127) {
alert("Ths domain name contains invalid characters.");
return false;
   }
}

// See if "user" is valid 

if (user.match(userPat)==null) {

// user is not valid

alert("The username doesn't seem to be valid.");
return false;
}

/* if the e-mail address is at an IP address (as opposed to a symbolic
host name) make sure the IP address is valid. */

var IPArray=domain.match(ipDomainPat);
if (IPArray!=null) {

// this is an IP address

for (var i=1;i<=4;i++) {
if (IPArray[i]>255) {
alert("Destination IP address is invalid!");
return false;
   }
}
return true;
}

// Domain is symbolic name.  Check if it's valid.
 
var atomPat=new RegExp("^" + atom + "$");
var domArr=domain.split(".");
var len=domArr.length;
for (i=0;i<len;i++) {
if (domArr[i].search(atomPat)==-1) {
alert("The domain name does not seem to be valid.");
return false;
   }
}

/* domain name seems valid, but now make sure that it ends in a
known top-level domain (like com, edu, gov) or a two-letter word,
representing country (uk, nl), and that there's a hostname preceding 
the domain or country. */

if (checkTLD && domArr[domArr.length-1].length!=2 && 
domArr[domArr.length-1].search(knownDomsPat)==-1) {
alert("The address must end in a well-known domain or two letter " + "country.");
return false;
}

// Make sure there's a host name preceding the domain.

if (len<2) {
alert("This address is missing a hostname!");
return false;
}

// If we've gotten this far, everything's valid!
return true;
}





</script>

<!--  java ใส่เฉพาะตัวเลขในฟอร์ม -->
<SCRIPT language=javascript> 
function CheckNum(){
		if (event.keyCode < 48 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}
</SCRIPT>


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
      <td align="center"><img src="images/meeting_header.jpg"></td>
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


<form action="user_login.php" method="post" name="form1" onsubmit="return checkform2(this);">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
      <tbody>
        <tr>
        <td bgcolor="#000000" height="30" align="center"><font color="#FFFFFF"><b>:: LOG IN ::</b></font></td>
        </tr>
      <tr>
        <td><table align="center" border="0" cellpadding="5" cellspacing="2" width="100%">
          
          <tbody><tr bgcolor="#DFE6F1">
            <td bgcolor="#DFE6F1" width="40%"><div align="left">Username : </div></td>
            <td width="60%" align="left"><input name="username" id="username" type="text" size="19"></td>
          </tr>
          <tr bgcolor="#DFE6F1">
            <td bgcolor="#DFE6F1"><div align="left">Password : </div></td>
            <td align="left"><input name="password" id="password" type="password" size="19"></td>
          </tr>
          <tr bgcolor="#FFEAF4">
            <td colspan="2" align="center"><input name="submit_bt" value="Submit" type="submit"> <input name="reset_bt" value="Cancel" type="reset"></td>
          </tr>

        </tbody></table></td>
        </tr>
    </tbody>
</table>
</form>

<br>

<center>
<a href="register.php"><img src="images/register.jpg" width="150" border="0"><br><< Register here >></a>
</center>


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

<form action="register_in.php" name="form1" method="post" onsubmit="return checkform(this);">
<table width="99%" border="0" align="center" cellpadding="3" cellspacing="2">

  <tr>
    <td bgcolor="#000000" colspan="2" height="30" align="center"><font color="#FFFFFF"><b><< Register >></b></font></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB" width="20%"><div align="right">Username :&nbsp;</div></td>
    <td bgcolor="#F2F5F5" width="80%"><div align="left"><input name="username" type="text" size="60" maxlength="100" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Password :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="password" type="password" size="60" maxlength="50" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Fullname :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="fullname" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Position :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="position" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Department :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="department" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>

  <tr>
    <td bgcolor="#C1CBCB"><div align="right">E-mail :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="email" type="text" size="60" maxlength="200" /> <font color="red">*</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#C1CBCB"><div align="right">Telephone :&nbsp;</div></td>
    <td bgcolor="#F2F5F5"><div align="left"><input name="tel" type="text" size="60" maxlength="200" onkeypress=CheckNum()  /> <font color="red">*</font></div></td>
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
