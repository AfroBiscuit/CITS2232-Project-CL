<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Office Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../mm_travel2.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
.style1 {
	color: #009999;
	font-size: 36px;
}
body {
	background-color: #009999;
	margin-left: 200px;
	margin-right: 200px;
	margin-top: 0px;
	margin-bottom: 0px;
}
.style2 {color: #FFFFFF}
.style3 {font-size: 14px}
-->
</style>
</head>
<body>
<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td colspan="3" rowspan="2" bgcolor="#FFFFFF">
	<img src="../centrelink2.jpg" width="456" height="133" /></td>
    <td width="290" height="111" align="center" valign="bottom" nowrap="nowrap" bgcolor="#FFFFFF" class="style1" id="logo"><div align="left">Centrelink Offices</div></td>
    <td width="38" align="center" valign="bottom" nowrap="nowrap" bgcolor="#FFFFFF" class="style1" id="logo">&nbsp;</td>
    <td width="4" align="center" valign="bottom" nowrap="nowrap" bgcolor="#FF9900" class="style1" id="logo">&nbsp;</td>
    <th align="center" valign="bottom" nowrap="nowrap" bgcolor="#FFFFFF" class="style1" id="logo"><form id="form1" name="form1" method="post" action="logout.php">
      <div align="center">
        <p class="style3">Logged in as <?php session_start(); $logID = $_SESSION['logID']; echo $logID ?></p>
        <p class="style3">
          <label>
          <input type="submit" name="Logout" id="Logout" value="Logout" />
          </label>
        </p>
        <label></label>
      </div>
    </form></th>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="19" align="center" valign="top" bgcolor="#FFFFFF" id="tagline">&nbsp; </td>
    <td align="center" valign="top" bgcolor="#FFFFFF" id="tagline">&nbsp;</td>
    <td align="center" valign="top" bgcolor="#FF9900" id="tagline">&nbsp;</td>
    <td align="center" valign="top" bgcolor="#FFFFFF" id="tagline">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#FF9900"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td height="19" colspan="7" bgcolor="#FF9900">&nbsp;<a href="details.php">Details</a>&nbsp;&nbsp;&nbsp;<a href="managerofficelist.php">Offices</a></td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#FF9900"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
   <td height="36" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
   <td bgcolor="#FFFFFF" valign="top"><h1>Office Details</h1></td>
   <td colspan="5" valign="top" bgcolor="#FFFFFF"><h1>Staff Member List</h1></td>
 </tr>
 <tr>
    <td width="13" height="468" valign="top" bgcolor="#FFFFFF"><span class="style2"></span></td>
    <td width="439" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><form id="form6" name="form6" method="post" action="edit_office.php">
      <p align="left">Office Code:</p>
      <p>Office Name:</p>
      <p>Office Type:</p>
      <p>Type Code:</p>
      <p>Street Address: </p>
      <p>Suburb: </p>
      <p>Postcode: </p>
      <p>State: </p>
      <p>Postal: </p>
      <p>Open Hours:</p>
      <p>Longitude:</p>
      <p>Latitude:</p>
      <p align="center">
          <label>
          <input type="submit" name="edit" id="edit" value="Edit" />
          </label>
        </p>
    </form></td>
    <td colspan="5" valign="top" bgcolor="#FFFFFF"><?php
$query = "SELECT firstName, lastName, staffID FROM staff WHERE staffID in (SELECT staffID FROM memberships WHERE officeCode=\"$officeCode\")";
$result = mysqli_query($connection, $query);
echo "<p>";
while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
echo "<form id=\"staff\" name=\"staff\" method=\"post\" action=\"admindetails.php\"><input name=\"$row[0] $row[1]\" type=\"submit\" id=\"$row[0] $row[1]\" value=\"$row[0] $row[1]\" /><input name=\"staffID\" type=\"hidden\" id=\"staffID\" value=\"$row[2]\" /></form>" ;
}
echo "</p>";
mysqli_close($connection);?>
    <form id="form7" name="form7" method="post" action="office_manager.php"><p align="center">
      <input type="submit" name="join_office" id="join_office" value="Join Office" />
    </p>
    </form></td>
  </tr>
  <tr>
    <td width="13" height="25" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="439" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="4" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td width="211" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>