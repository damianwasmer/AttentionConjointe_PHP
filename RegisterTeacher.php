<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$loginName = $_POST["loginName"];
$loginSurname = $_POST["loginSurname"];
$loginEmail = $_POST["loginEmail"];
$loginPass = $_POST["loginPass"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT Email FROM Teacher WHERE Email = '" . $loginEmail . "'";

//run the query
$result = $conn->query($sql);

//Display the result
if ($result->num_rows > 0) {
	//Tell user that the name is already taken
    // output data of each row
	echo "Username is already taken";
	
    
} else {
    echo "Creating a new tacher";
	//Insert the user and passwort into the database
	$insert = "INSERT INTO Teacher(Name, Surname, Email, Password) VALUES ('" . $loginName . "', '" . $loginSurname . "', '" . $loginEmail . "', '" . $loginPass . "')";
	
	if ($conn->query($insert) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $insert . "<br>" . $conn->error;
	}
}
$conn->close();
?>