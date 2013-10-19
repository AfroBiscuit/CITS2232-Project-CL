<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Offices</title>
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
  	<td height="19" colspan="8" bgcolor="#FF9900">&nbsp;<a href="mydetails.php">Details</a>&nbsp;&nbsp;&nbsp;<a href="full_list_admin.php">All Offices</a></td>
  </tr>
 <tr>
    <td colspan="8" bgcolor="#FF9900"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
   <td height="42" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
   <td bgcolor="#FFFFFF" valign="top"><h1>My Offices</h1></td>
   <td colspan="6" valign="top" bgcolor="#FFFFFF"><h1>Search Offices</h1></td>
 </tr>
 <tr>
   <td height="27" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
   <td bgcolor="#FFFFFF" valign="top">&nbsp;</td>
   <td colspan="6" valign="top" bgcolor="#FFFFFF"><div align="center"><form id="form7" name="form7" method="post" action="new_office.php">
     <input type="submit" name="newoffice" id="newoffice" value="New Office" />
   </form></div></td>
 </tr>
 <tr>
    <td width="13" height="504" valign="top" bgcolor="#FFFFFF"><span class="style2"></span></td>
    <td width="439" bgcolor="#FFFFFF" valign="top"><?php
$staffID=$logID;
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT name, officeCode FROM offices WHERE officeCode in (SELECT officecode from memberships where staffid=$staffID)";
$result = mysqli_query($connection, $query);
echo "<p>";
while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
echo "<form id=\"office\" name=\"office\" method=\"post\" action=\"office_admin.php\"><input name=\"$row[0]\" type=\"submit\" id=\"$row[0]\" value=\"$row[0]\" /><input name=\"officeCode\" type=\"hidden\" id=\"officeCode\" value=\"$row[1]\" /></form>" ;
}
echo "</p>";
mysqli_close($connection);
?></td>
    <td colspan="6" valign="top" bgcolor="#FFFFFF"><span class="style2"><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	</span><form id="form3" name="form3" method="post" action="searchresults_admin.php">
	  <p>Office Name: 
	  <label>
	  <input type="text" name="searchname" id="searchname" size="30" />
	  </label>
	  </p>
      <p>Type Code:
        <label>
        <select name="searchtypecode" id="searchtypecode">
          <option value=""></option>
          <option value="R">R</option>
          <option value="RA">RA</option>
          <option value="I">I</option>
          <option value="IO">IO</option>
          <option value="D">D</option>
          <option value="C">C</option>
          <option value="CB">CB</option>
          </select>
        </label>
      </p>
      <p>Street Address: 
        <label>
        <input type="text" name="searchstreet" id="searchstreet" size="50" />
        </label>
      </p>
      <p>Suburb: 
        <label>
        <input type="text" name="searchsuburb" id="searchsuburb" size="30" />
        </label>
      </p>
      <p>Postcode: 
        <label>
        <input type="text" name="searchpostcode" id="searchpostcode" size="10" />
        </label>
      </p>
      <p>State: 
        <label></label>
        <label>
        <select name="searchstate" id="searchstate">
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
        </label>
      </p>
      <p>Within Radius: 
        <label>
        <input type="text" name="searchradius" id="searchradius" size="10" />
        </label>
      </p>
      <p align="center">
        <label>
        <input type="submit" name="search" id="search" value="Search" />
        </label>
      </p></form>
      <span class="style2"><br />
&nbsp;<br />	
	<br />	  
	  </span></td>
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
