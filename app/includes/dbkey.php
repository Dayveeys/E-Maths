<?php
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bigdata";
  
  //create connection
  //$connect = new mysqli($servername, $username, $password, $dbname);
  
  //check connection
  // if ($connect->connect_error){
  //   die("connection failed: " . $connect->connect_error);
  // }

    $connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
  echo "Connction failed";
}
 
?>