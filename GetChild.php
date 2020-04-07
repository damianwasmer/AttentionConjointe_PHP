<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
//$loginUser = $_POST["loginUser"];
//$loginPass = $_POST["loginPass"];
$pk_Child = $_POST["PK_Child"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT Name, Surname, Niveau FROM Child WHERE PK_Child = '" . $pk_Child . "'";

//run the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	//after the array is created
	echo json_encode($rows);
} else {
    echo "0";
}
$conn->close();
?>