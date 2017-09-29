<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

$check_q = pg_query($dbconn,"SELECT  his_preg_week, his_preg_weight FROM history_preg WHERE  user_id = '{$user_id}' ");

 while ($row = pg_fetch_row($check_q)) {
                  echo $answer1 = $row[0]; 
                  echo $weight = $row[1]; 

                }
//       echo $answer1;

?>
