<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$name = $_POST["name"];
$surname = $_POST["surname"];
$fk_Character = $_POST["fk_Character"];
$fk_Teacher = $_POST["fk_Teacher"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT Name FROM Child WHERE Name = '" . $name . "'";
$sql2 = "SELECT Surname FROM Child WHERE Surname = '" . $surname . "'";

//run the query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Display the result
if ($result->num_rows > 0 && $result2->num_rows > 0) {
	//Tell user that the this child is already taken
	echo "Name is already taken";
	
    
} else {
    echo "Creating a new Child";
	//Insert the user and passwort into the database
	$insert = "INSERT INTO Child(Name, Surname, Score1, Score2, Score3, Score4, Score5, Level, Niveau, FK_character, FK_Teacher) 
	VALUES ('" . $name . "', '" . $surname . "','0-0-0-0-0', '0-0-0-0-0', '0-0-0-0-0', '0-0-0-0-0', '0-0-0-0-0', '1', '1', '" . $fk_Character . "', '" . $fk_Teacher . "')";
	
	if ($conn->query($insert) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $insert . "<br>" . $conn->error;
	}
}
$conn->close();
?>