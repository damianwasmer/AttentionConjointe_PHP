<?php

//Connection to the DB
require 'ConnectionSettings.php';

//User submited variables
$pk_Teacher = $_POST["PK_Teacher"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT PK_Child FROM Child WHERE FK_Teacher = '" . $pk_Teacher . "'";

//run the query
$result = $conn->query($sql);

//Display the result
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