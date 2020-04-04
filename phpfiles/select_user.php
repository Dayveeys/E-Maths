<?php

  if (isset($_SESSION['student_bigdata'])) {
    $student_id = $_SESSION['student_bigdata'];
    $sql = "select * from students where id = '$student_id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
      $found = mysqli_fetch_array($result);
      $student_id = $found['id'];
      $student_passport = $found['passport'];
      $student_reg_no = $found['reg_no'];
      $student_firstname = $found['firstname'];
      $student_lastname = $found['lastname'];
      $student_othernames = $found['othernames'];
      $student_email = $found['email'];
      $student_password = $found['password'];
      $student_gender = $found['gender'];
      $student_dob = $found['dob'];
      $student_phone = $found['phone'];
      $student_address = $found['address'];
      $student_state = $found['state'];
      $student_lga = $found['lga'];
      $student_nationality = $found['nationality'];
      $student_programme = $found['programme'];
      $student_degree = $found['degree'];
    }
  }

?>
