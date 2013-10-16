<?php
$connection = mysqli_connect('cits2232db.uwac2g.com', '20927611', '20927611');
mysqli_select_db($connection, "test");
$id = mysqli_query($connection, "SELECT userID FROM staff");


$query = "SELECT officeCode, name FROM offices"; //You don't need a ; like you do in SQL
$result = mysqli_query($connection, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result,MYSQLI_NUM)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['officeCode'] . "</td><td>" . $row['name'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($connection); //Make sure to close out the database connection
?>