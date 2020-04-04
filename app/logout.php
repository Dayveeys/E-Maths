<?php
  include_once "phpfiles/global.php";

  if (isset($_SESSION['admin_bigdata'])) {
    $id = $_SESSION['admin_bigdata'];
    $last_login = date('Y-m-d h:i:s a');
    $sql = "update reg_admin set status = 'No', last_login = '$last_login' where id = '$admin_id'";
    $query = mysqli_query($connect, $sql);
    if ($query) {

      unset($_SESSION['admin_bigdata']);
      header("location:login.php");
    }
  }




 ?>
