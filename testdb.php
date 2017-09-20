<?php

$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


// $sql="CREATE TABLE bot.test (
// id varchar(5),
// name varchar(20), 
// middle varchar(20),
// last varchar(20),
// address varchar(50),
// expir date,
// pass varchar(20),
// PRIMARY KEY(id)
// )";

// $sql="CREATE TABLE History (
// HistoryID varchar(100),
// userID varchar(100), 
// date_history DATE,
// weight INT,
// height INT,
// PRIMARY KEY(HistoryID),
// FOREIGN KEY(userID) REFERENCES Users(userID)
// )";   

$sql="CREATE TABLE History (
HistoryID  SERIAL,
userID varchar(100), 
date_history DATE,
weight varchar(3),
height varchar(3),
PRIMARY KEY(HistoryID)
)";   

// $sql="CREATE TABLE Users (
// userID varchar(100),
// name varchar(50),
// date_of_birth DATE,
// PRIMARY KEY(userID)
// )";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 

?>




