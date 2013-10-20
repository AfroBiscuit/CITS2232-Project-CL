<?php
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT MAX(staffID), password FROM staff";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
echo "<p>";
echo $row[0], $row[1];
echo "</p>";
?>
