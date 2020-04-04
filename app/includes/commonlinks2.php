<?php

  $sql = "select * from videos";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) > 0) {
    $programmes = mysqli_num_rows($query);
  }else {
    $programmes = "0";
  }

  $sql = "select * from courseware";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) > 0) {
    $courses = mysqli_num_rows($query);
  }else {
    $courses = "0";
  }

  $sql = "select * from students";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) > 0) {
    $students = mysqli_num_rows($query);
  }else {
    $candidates = "0";
  }

  $sql = "select * from reg_admin";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) > 0) {
    $all_admins = mysqli_num_rows($query);
  }else {
    $all_admins = "0";
  }

?>