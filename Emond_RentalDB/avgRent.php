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
    <li><a href="groups.php">Rental Groups</a></li>
    <li><a class="active" href="#avgRent">Average Rent</a></li>
</ul>

<div id="content">

<h2>Average monthly rent for each category of rental units:</h2>

<table>
<tr><th>Houses</th><th>Appartments</th><th>Rooms</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

#run a query


$house=$connection->query("select avg(RentalProperty.monthlyCost) as havg_cost from RentalProperty join House on RentalProperty.id = House.propertyID");
$appt=$connection->query("select avg(RentalProperty.monthlyCost) as aavg_cost from RentalProperty join Appartment on RentalProperty.id = Appartment.propertyID");
$room=$connection->query("select avg(RentalProperty.monthlyCost) as ravg_cost from RentalProperty join Room on RentalProperty.id = Room.propertyID");


#process results
#show phpcodechecker

while ($row = $house->fetch()) {
    //var_dump($row);
	$Houses = $row['havg_cost'];
}
while ($row = $appt->fetch()){
    $Appartments = $row['aavg_cost'];
}

while ($row = $room->fetch()){
    $Rooms = $row['ravg_cost'];
}
echo "<tr><td>".$Houses."</td><td>".$Appartments."</td><td>".$Rooms."</td></tr>";

$connection = NULL;
?>
</table>
</div>

</body>
</html>