<?php
$connection = mysqli_connect('ec2-54-252-239-151.ap-southeast-2.compute.amazonaws.com', 'root');
mysqli_select_db($connection, "centrelink");
$query = "SELECT isManager, staffID FROM memberships";
echo "<p>";
while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
echo $row[0], $row[1];
}
echo "</p>";
?>
