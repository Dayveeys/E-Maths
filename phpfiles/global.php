<?php
  session_start();
  $connect = mysqli_connect("localhost", "root", "", "bigdata");
  date_default_timezone_set("Africa/Lagos");
  include_once "select_user.php";
  include_once "functions.php";


  $notify = $active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $alert = $alert_contact = "";
 ?>
