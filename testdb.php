<?php  
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
//////////////////////////////////////////////////////////////////////
 $sql="DROP TABLE IF EXISTS users_data";
 $sql1="DROP TABLE IF EXISTS Pregnancy_week_data";
 $sql2="DROP TABLE IF EXISTS history_con";
 $sql3="DROP TABLE IF EXISTS history_preg";
 pg_exec($dbconn, $sql) or die(pg_errormessage());
 pg_exec($dbconn, $sql1) or die(pg_errormessage());
 pg_exec($dbconn, $sql2) or die(pg_errormessage());
 pg_exec($dbconn, $sql3) or die(pg_errormessage());
//////////////////////////////////////////////////////////////////////
//*************************
// $sql="CREATE TABLE history (
// historyid  SERIAL,
// date_history DATE,
// users text , 
// weight varchar(3),
// height varchar(3),
// PRIMARY KEY(historyid)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
//**************************
///////////////////////////////////////////////////////////////////////////////////////////////////////
// $query = 'select weight from history ';
// $result = pg_query($query);
// while ($row = pg_fetch_row($result)) {
//  $e =  "น้ำหนัก $row[0] ";
// }
// echo $e;
///////////////////////////////////////////////////////////////////////////////////////////////////////
// $user = "fdsgaegaeewt5444";
// $escaped = pg_escape_string($user);
// $height = "33";
// $weight = "344";
// $sql="INSERT INTO history(date_history,users,weight,height) VALUES(NOW(),'{$escaped}',$weight,$height )";
 // $sql =  pg_query("INSERT INTO history(date_history,users,weight,height) VALUES(NOW(),'{$escaped}',$weight,$height )");
// pg_exec($dbconn, $sql) or die(pg_errormessage());
//************************NEW_TABLE*******************************************************
// $sql="CREATE TABLE users_data (
// user_id  varchar(225),
// user_age varchar(2),
// user_weight varchar(3),
// user_height varchar(3),
// preg_week date,
// PRIMARY KEY(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
// $sql="CREATE TABLE Pregnancy_week_data(
// week_preg varchar(3),
// des_preg text,
// picture_preg varchar(225),
// PRIMARY KEY(week_preg)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
// $sql="CREATE TABLE history_con(
// his_id  SERIAL,
// user_id  varchar(225),
// his_message varchar(3),
// his_date varchar(3),
// PRIMARY KEY(his_id),
// FOREIGN KEY (user_id) REFERENCES users_data(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
// $sql="CREATE TABLE history_preg(
// his_preg_id SERIAL,
// his_preg_week  varchar(2),
// his_preg_weight varchar(3),
// user_id  varchar(225),
// PRIMARY KEY(his_preg_id),
// FOREIGN KEY (his_preg_week) REFERENCES Pregnancy_week_data(week_preg),
// FOREIGN KEY (user_id) REFERENCES users_data(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
 $sql="CREATE TABLE users_data(
 id SERIAL,
 user_id  varchar(50),
 user_age varchar(10),
 user_weight varchar(10),
 user_height varchar(10),
 preg_week date,
 PRIMARY KEY(id)
 )";   
 pg_exec($dbconn, $sql) or die(pg_errormessage());
?>