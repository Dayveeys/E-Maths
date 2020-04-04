<?php
$servername2 = "localhost";
  $username2 = "root";
  $password2 = "";
  $dbname2 = "project";
  
  //create connection
  //$connect = new mysqli($servername, $username, $password, $dbname);
  
  //check connection
  // if ($connect->connect_error){
  //   die("connection failed: " . $connect->connect_error);
  // }

    $connect2 = mysqli_connect($servername2, $username2, $password2, $dbname2);
if (!$connect2) {
  echo "Connction failed";
}
 
?>