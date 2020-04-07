<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$pk_Child = 1;//$_POST["PK_Child"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT PK_Child, Name, Surname, Score1, Score2, Score3, Score4, Score5, Niveau, Level, FK_Character FROM Child WHERE PK_Child = '" . $pk_Child . "'";

//run the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["PK_Child"] == $pk_Child){
			echo $row["Name"]. "," . $row["Surname"]. "," . $row["Score1"]. "," . $row["Score2"]. "," . $row["Score3"]. "," . $row["Score4"]. "," . $row["Score5"]
			. "," . $row["Niveau"]. "," . $row["Level"]. "," . $row["FK_Character"];
		}
		else {
			echo "No informations";
		}
    }
} else {
    echo "Email does not exist";
}

/*
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
*/
$conn->close();
?>