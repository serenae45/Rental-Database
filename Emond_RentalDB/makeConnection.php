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
    <li><a class="active" href="#makeConnection">Property List</a></li>
    <li><a href="updateDatabase.html">Update Database</a></li>
	<li><a href="groups.php">Rental Groups</a></li>
	<li><a href="avgRent.php">Average Rent</a></li>
</ul>

<div id="content">

<h2>List of all the property IDs along with the names of the owner(s) and the manager (if applicable):</h2>
<p> This data was taken from the rental database.</p>

<table>
<tr><th>Property ID</th><th>Manager First Name</th><th>Manager Surname</th><th>Owner First Name</th><th>Owner Surname</th></tr>

<?php
include 'rentalDBconnect.php';
echo "<br>";

#run a query


$result=$connection->query("select managerFname, managerLname, ownerFname, ownerLname, ManagerInfo.propertyID from (select RentalProperty.id as propertyID,
 Person.fname as managerFname, Person.lname as managerLname from RentalProperty left join Person on RentalProperty.managerID = Person.id) as ManagerInfo 
 join (select RentalProperty.id as propertyID, Person.fname as ownerFname, Person.lname as ownerLname from (RentalProperty left join Owns
  on RentalProperty.id = Owns.propertyID) left join Person on Owns.ownerID = Person.id) as OwnerInfo on OwnerInfo.propertyID = ManagerInfo.propertyID");
echo "<br>";

#process results
#show phpcodechecker

while ($row = $result->fetch()) {
	$propertyID = $row['propertyID'];
	$managerFN = $row['managerFname'];
	$managerLN = $row['managerLname'];
	$ownerFN = $row['ownerFname'];
	$ownerLN = $row['ownerLname'];
	echo "<tr><td>".$propertyID."</td><td>".$managerFN."</td><td>".$managerLN."</td><td>".$ownerFN."</td><td>".$ownerLN."</td></tr>";
}
$connection = NULL;
?>
</table>
</div>

</body>
</html>