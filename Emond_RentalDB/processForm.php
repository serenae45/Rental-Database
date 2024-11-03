<!DOCTYPE html>
<html>
<body>

<head>
    <link href="simple.css" type="text/css" rel="stylesheet" >
</head>

<div id="top">
    <h1>Rental Property Database</h1>
</div>
  
<ul>
    <li><a href="rental.html">Rental</a></li>
    <li><a href="makeConnection.php">Property List</a></li>
    <li><a class="active" href="updateDatabase.html">Update Database</a></li>
    <li><a href="groups.php">Rental Groups</a></li>
    <li><a href="avgRent.php">Average Rent</a></li>
</ul>

<div id="content">

<table>
<tr><th>Group ID</th><th>Prefered NumBeds</th><th>Prefered NumBaths</th><th>Max Rent</th><th>Prefered Parking</th><th>Prefered Access</th>
<th>Prefered Accommodation</th><th>Prefered Laundry</th></tr>

<?php
session_start();

$groupID = $_POST["groupID"];
$_SESSION["groupID"] = $groupID;

include 'rentalDBconnect.php';
echo "<br>";

#run a query
echo "<p>"."Here are the current preferences for group number ".$groupID.":"."</p>";
$result=$connection->query("select * from RentalGroup where codeID = ".$groupID);

#process results
#show phpcodechecker
while ($row = $result->fetch()) {
    #var_dump($row);
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>"
    .$row[6]."</td><td>".$row[7]."</td></tr>";
}

$connection = NULL;

?>
</table>
</div>

<p>Enter the new values to update your group preferences:</p>
<form action="processForm2.php" method="post">
<br><br>
<p>Enter preferred number of bedrooms:</p>
<input type="text" name="numBeds">
<p>Enter preferred number of bathrooms:</p>
<input type="text" name="numBaths">
<p>Enter preferred maximum rent:</p>
<input type="text" name="maxRent">
<p>Enter preferred parking (yes/no):</p>
<input type="text" name="parking">
<p>Enter preferred accessibility (yes/no):</p>
<input type="text" name="accessibility">
<p>Enter preferred accomodation (house, room, or appartment):</p>
<input type="text" name="propertyType">
<p>Enter preferred laundry type (shared or ensuite):</p>
<input type="text" name="laundryType">
<br><br>
<input type="submit">
<br><br>
</form>


</body>
</html>