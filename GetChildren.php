<?php
//Connection to the DB
require 'ConnectionSettings.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully, now we will show the users. <br><br>";

//Query
$sql = "SELECT Name, Surname FROM Child";

//run the query
$result = $conn->query($sql);

//Display the result
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"]. " - Surname: " . $row["Surname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>