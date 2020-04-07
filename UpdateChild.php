<?php

//Connection to the DB
require 'ConnectionSettings.php';

//variables submited by user
$pk_Child = 1;//$_POST["PK_Child"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$score1 = $_POST["score1"];
$score2 = $_POST["score2"];
$score3 = $_POST["score3"];
$score4 = $_POST["score4"];
$score5 = $_POST["score5"];
$niveau = $_POST["niveau"];
$level = $_POST["level"];
$fK_Character = $_POST["fK_Character"];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "Update Child SET Name='" . $pk_Child . "' ,
Surname='" . $surname . "' ,
Score1='" . $score1 . "' ,
Score2='" . $score1 . "' ,
Score3='" . $score1 . "' ,
Score4='" . $score1 . "' ,
Score5='" . $score1 . "' ,
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