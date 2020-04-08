<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$pk_Child = $_POST["PK_Child"];
$name = $_POST["Name"];
$surname = $_POST["Surname"];
$score1 = $_POST["Score1"];
$score2 = $_POST["Score2"];
$score3 = $_POST["Score3"];
$score4 = $_POST["Score4"];
$score5 = $_POST["Score5"];
$niveau = $_POST["Niveau"];
$level = $_POST["Level"];
$fK_Character = $_POST["FK_Character"];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "Update Child SET Name='" . $name . "' ,
Surname='" . $surname . "' ,
Score1='" . $score1 . "' ,
Score2='" . $score2 . "' ,
Score3='" . $score3 . "' ,
Score4='" . $score4 . "' ,
Score5='" . $score5 . "' ,
Niveau='" . $niveau . "' ,
Level='" . $level . "' ,
FK_Character='" . $fK_Character . "' 
WHERE PK_Child = '" . $pk_Child . "'";



//run the query
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>