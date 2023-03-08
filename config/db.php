<?php

    $server= "localhost";
    $host= "root";
    $passowrd="";
    $database="db_taskms";
    $con = mysqli_connect($server,$host,$passowrd,$database);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} else {
    //echo "database connected";
}
?>