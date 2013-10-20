<?php
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
session_start();
$officeID = $_SESSION['officeID'];
$logID = $_SESSION['logID'];
echo $officeID;
echo $logID;
$query = "SELECT isManager FROM memberships WHERE officeCode='$officeID' and staffID = '$logID'";
$result = mysqli_query($connection, $query);
echo "<p>";
while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
echo $row[0];
}
echo "</p>";
?>
