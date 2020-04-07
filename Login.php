<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$loginEmail = $_POST["loginEmail"];
$loginPass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT Password, PK_Teacher FROM Teacher WHERE Email = '" . $loginEmail . "'";

//run the query
$result = $conn->query($sql);

//Display the result
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["Password"] == $loginPass){
			echo $row["PK_Teacher"];
		}
		else {
			echo "Wrong Credentials";
		}
    }
} else {
    echo "Email does not exist";
}
$conn->close();
?>