<?php
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);
    $query = "select question from sequents order by id asc limit 4";
    $result = pg_query($query);
      while ($row = pg_fetch_row($result)) {
       echo  $seqcode = $row[1] ;
       // echo $seqcode1 =   $row[1] ;
       // echo $seqcode2 =   $row[2] ;
       // echo $seqcode3 =   $row[3] ;
      }