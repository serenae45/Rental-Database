<!DOCTYPE html>
<html>
<head>
    <link href="simple.css" type="text/css" rel="stylesheet" >
</head>

<div id="top">
    <h1>Rental Property Database</h1>
</div>
  
<ul>
    <li><a href="rental.html">Rental</a></li>
    <li><a href="makeConnection.php">Property List</a></li>
    <li><a href="updateDatabase.html">Update Database</a></li>
    <li><a class="active" href="#groups">Rental Groups</a></li>
    <li><a href="avgRent.php">Average Rent</a></li>
</ul>

<div id="content">

<h2>Below is a list of all the rental groups. Enter a group ID into the text box below to show the names of the students and the preferences of the group:</h2>

<table>
<tr><th>Group ID</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

#run a query


$result=$connection->query("select * from RentalGroup");

#process results
#show phpcodechecker

while ($row = $result->fetch()) {
	$groupID = $row['codeID'];
	echo "<tr><td>".$groupID."</td></tr>";
}
$connection = NULL;
?>
</table>
<form action="getGroup.php" method="post">
    <p>Enter the groupID below:</p>
    <input type="text" name="groupID">
    <br><br>
    <input type="submit">
</form>
</div>

</body>
</html>