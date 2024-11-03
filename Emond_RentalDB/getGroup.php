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
    <li><a class="active" href="groups.php">Rental Groups</a></li>
    <li><a href="avgRent.php">Average Rent</a></li>
</ul>

<div id="content">

<?php
$groupID = $_POST["groupID"];
?>

<table>
<tr><th>First Name</th><th>Last Name</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

#run a query
echo "<p>"."Here is the list of students in group ".$groupID.":"."</p>";

$result1=$connection->query("select Renter.personID as personID, Renter.rentalGroupCode as groupCode, Person.fname as fname, Person.lname as lname from Renter join Person on Renter.personID=Person.id where Renter.RentalGroupCode = ".$groupID);
while ($row = $result1->fetch()) {
    #var_dump($row);
    echo "<tr><td>".$row['fname']."</td><td>".$row['lname']."</td></tr>";
}

$connection = NULL;
?>

</table>
<table>
<tr><th>Group ID</th><th>Prefered NumBeds</th><th>Prefered NumBaths</th><th>Max Rent</th><th>Prefered Parking</th><th>Prefered Access</th>
<th>Prefered Accommodation</th><th>Prefered Laundry</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

echo "<p>"."Here are the preferences for group ".$groupID.":"."</p>";
$result2=$connection->query("select * from RentalGroup where codeID = ".$groupID);
#process results
#show phpcodechecker
while ($row = $result2->fetch()) {
    #var_dump($row);
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>"
    .$row[6]."</td><td>".$row[7]."</td></tr>";
}

$connection = NULL;
?>

</table>
</div>

</body>
</html>