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

<?php
include 'rentalDBconnect.php';
echo "<br>";
session_start();

if (isset($_SESSION["groupID"])) {
    $groupID = $_SESSION["groupID"];
}

if (isset($_POST["numBeds"]) && $_POST["numBeds"] !== "") {
    $numBeds = $_POST["numBeds"];
} else {
    $numBeds = "NULL";
}


if (isset($_POST["numBaths"]) && $_POST["numBaths"] !== "") {
    $numBaths = $_POST["numBaths"];
} else {
    $numBaths = "NULL";
}


if (isset($_POST["maxRent"]) && $_POST["maxRent"] !== "") {
    $maxRent = $_POST["maxRent"];
} else {
    $maxRent = "NULL";
}


if (isset($_POST["parking"]) && $_POST["parking"] !== "") {
    $parking = $_POST["parking"];
} else {
    $parking = "NULL";
}

 
if (isset($_POST["accessibility"]) && $_POST["accessibility"] !== "") {
    $accessibility = $_POST["accessibility"];
} else {
    $accessibility = "NULL";
}


if (isset($_POST["propertyType"]) && $_POST["propertyType"] !== "") {
    $propType = $_POST["propertyType"];
} else {
    $propType = "NULL";
}


if (isset($_POST["laundryType"]) && $_POST["laundryType"] !== "") {
    $laundry = $_POST["laundryType"];
} else {
    $laundry = "NULL";
}

$rows = $connection->exec("update RentalGroup set prefNumBeds = ".$numBeds.", prefNumBaths = ".$numBaths.", maxRent = ".$maxRent.", prefParking = ".$parking.", prefAccess = ".$accessibility.", prefAccommodation = ".$propType.", prefLaundry = ".$laundry." where codeID = ".$groupID);

$connection = NULL;

session_destroy();
?>

<table>
<tr><th>Group ID</th><th>Prefered NumBeds</th><th>Prefered NumBaths</th><th>Max Rent</th><th>Prefered Parking</th><th>Prefered Access</th>
<th>Prefered Accommodation</th><th>Prefered Laundry</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

#run a query
echo "<p>"."Here is the updated preferences for group ".$groupID.":"."</p>";
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

</body>
</html>