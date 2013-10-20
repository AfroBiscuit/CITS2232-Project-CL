<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Edit Office</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="mm_travel2.css" type="text/css" />
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
<table width="98%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr bgcolor="#3366CC">
    <td colspan="4" rowspan="2" bgcolor="#FFFFFF"><img src="centrelink2.jpg" width="456" height="133" /></td>
    <td width="290" height="112" align="center" valign="bottom" nowrap="nowrap" bgcolor="#FFFFFF" class="style1" id="logo"><div align="left">Centrelink Offices</div></td>
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
    <td colspan="8" bgcolor="#FF9900"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td height="19" colspan="8" bgcolor="#FF9900">&nbsp;<a href="mydetails.php">Details</a>&nbsp;&nbsp;&nbsp;<a href="officelistcheck.php">Offices</a></td>
  </tr>
 <tr>
    <td colspan="8" bgcolor="#FF9900"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
   <td height="39" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
   <td bgcolor="#FFFFFF" valign="top"><h1>Edit Office</h1></td>
   <td colspan="6" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
 </tr>
 <tr>
    <td width="13" height="504" valign="top" bgcolor="#FFFFFF"><span class="style2"></span></td>
    <td width="439" bgcolor="#FFFFFF" valign="top"><form id="form4" name="form4" method="post" action="update_2232_office.php">
      <p align="left">Office Code: 
        <label>
        <input type="text" name="OfficeCode" id="OfficeCode" size="7" value="<?php
$officeCode = $_SESSION['officeID'];
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
echo $officeCode;
?>"/>
        </label>
      </p>
      <p>Office Name:
        <input type="text" name="OfficeName" id="OfficeName" size="30" value="<?php
$query = "SELECT name FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Office Type:
        <input type="text" name="OfficeType" id="OfficeType" size="30" value="<?php
$query = "SELECT officeType FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Type Code:
        <select name="TypeCode" id="TypeCode">
        <option selected="selected"><?php
$query = "SELECT typeCode FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?></option>
          <option value=""></option>
          <option value="R">R</option>
          <option value="RA">RA</option>
          <option value="I">I</option>
          <option value="IO">IO</option>
          <option value="D">D</option>
          <option value="C">C</option>
          <option value="CB">CB</option>
          </select>
      </p>
      <p>Street Address: 
        <input type="text" name="StreetAddress" id="StreetAddress" size="50" value="<?php
$query = "SELECT streetAddress FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Suburb: 
        <input type="text" name="Suburb" id="Suburb" size="30" value="<?php
$query = "SELECT suburb FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Postcode: 
        <input type="text" name="Postcode" id="Postcode" size="10" value="<?php
$query = "SELECT postcode FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>State: 
        <select name="State" id="State">
        <option selected="selected"><?php
$query = "SELECT state FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?></option>
          <option value=""></option>
          <option value="ACT">ACT</option>
          <option value="NSW">NSW</option>
          <option value="NT">NT</option>
          <option value="QLD">QLD</option>
          <option value="WA">WA</option>
          <option value="TAS">TAS</option>
          <option value="SA">SA</option>
          <option value="VIC">VIC</option>
                </select>

      </p>
      <p>Postal: 
        <input type="text" name="Postal" id="Postal" size="40" value="<?php
$query = "SELECT postal FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Open Hours:
        <input type="text" name="OpenHours" id="OpenHours" size="50" value="<?php
$query = "SELECT openHours FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Longitude:
        <input type="text" name="Longitude" id="Longitude" value="<?php
$query = "SELECT longtitude FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
?>"/>
      </p>
      <p>Latitude:
        <input type="text" name="Latitude" id="Latitude" value="<?php
$query = "SELECT latitude FROM offices WHERE officeCode=\"$officeCode\"";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo $row[0];
mysqli_close($connection);
?>"/>
      </p>      
      <p>
        <label>
        <div align="center">
          <input type="submit" name="Update" id="Update" value="Update" />
        </div>
        </label>
    </form>
    </td>
    <td colspan="6" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="13" height="25" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="439" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="4" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="4" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td width="211" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>
