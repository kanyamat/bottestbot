<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

$check = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight FROM history_preg" );
$data = array();
                while ($row= pg_fetch_assoc($check)) {
                  //echo $result = $row[0],$row[1]."</br>";
                  $data[] = $row;

                } 

echo json_encode($data);

// Print out rows
// $data = array();
// while ( $row = $check->fetch_assoc() ) {
//   $data[] = $row;
// }
// echo json_encode($data);

// while ( $row = fetch_assoc($check) ) {
// // while ( $row = $check->fetch_assoc() ) {
//   echo $row['his_preg_week'] . ' | ' . $row['his_preg_weight'] . "<>";
// }

// $check2 = pg_query($dbconn,"SELECT user_weight FROM user_data" );
//                 while ($row= pg_fetch_row($check2)) {
              
//                  echo $result2 = $row[0];
  
//                }
// $query = "SELECT industry,count(industry) FROM company GROUP BY industry ";
// $res_c = $mysqli->query($query);
 
// if (!$result) {
//     die('<p><strong style="color:#FF0000">!! Invalid query...:</strong> ' . $mysqli->error.'</p>');
// }



// Print out rows
// while ( $row = $result->fetch_assoc() ) {
//   echo $row['category'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "n";
// }

// // Close the connection
// mysqli_close($link);


?>