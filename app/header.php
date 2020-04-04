<?php

  $sql = "select * from programmes";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) > 0) {
    $programmes = mysqli_num_rows($query);
  }else {
    $programmes = "0";
  }

  $sql = "select * from courses";
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
<!DOCTYPE html>
<html>
<title><?php echo $title; ?> - Admin - Enugu State University of Science and Technology</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../images/favicon.png">
<style>
  body {background: #FFF;}
</style>
<body>

<nav class="w3-sidenav w3-collapse w3-animate-left w3-light-grey" style="width:200px;">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-closenav w3-blue-grey w3-text-white w3-large w3-hide-large">Close ×</a>
  <h5 style="padding: 13.5px;" class="w3-margin-0 w3-blue-grey">Admin Panel</h5>

  <a class="<?php echo $active1; ?> w3-padding" href="index.php"><span class="fa fa-home"></span>  Dashboard</a>
  <?php
    if ($admin_level == 'super') {
      echo '
        <a class="'.$active2.' w3-padding" href="reg_admin.php"><span class="fa fa-user-plus"></span>  Register Admin/Staff</a>
        <a class="'.$active3.' w3-padding" href="staff.php"><span class="glyphicon glyphicon-user"></span>  Staff details</a>
        <a class="'.$active4.' w3-padding" href="students.php"><span class="fa fa-user"></span>  Students details</a>
        <a class="'.$active10.' w3-padding" href="content.php"><span class="glyphicon glyphicon-list"></span>  Content Management</a>
      ';
    }
  ?>
  <a class="<?php echo $active5; ?> w3-padding" href="quiz_exam.php"><span class="fa fa-question-circle"></span>  Quiz and Exam</a>
  <a class="<?php echo $active6; ?> w3-padding" href="courses.php"><span class="fa fa-book"></span>  Registerable Courses</a>
  <a class="<?php echo $active7; ?> w3-padding" href="programmes.php"><span class="fa fa-graduation-cap"></span>  Programmes</a>
  <?php
    if ($admin_level == 'super') {
      echo '
        <a class="'.$active8.' w3-padding" href="staff_salary.php"><span class="glyphicon glyphicon-usd"></span>  Staff Salary</a>
        <a class="'.$active9.' w3-padding" href="operations.php"><span class="glyphicon glyphicon-save-file"></span>  Operations</a>
      ';
    }
  ?>
</nav>

<div class="w3-main" style="margin-left:200px">
<header class="w3-container w3-blue-grey">
  <span class="w3-opennav w3-large w3-hide-large" onclick="w3_open()">☰</span>
  <div class="clear"></div>
  <h3 class="w3-left">Enugu State University of Science and Technology</h3>
  <div class="w3-right" style="padding: 12px 12px 2px 0;">
    <span class="w3-margin-right">You are logged in as: <b><?php echo $admin_username; ?></b></span> <?php if ($admin_level != 'super'){echo '<span class="w3-margin-right">Level: <b>'.$admin_level.'</b></span>';} ?> <a href="profile.php" class="w3-text-white w3-margin-right">View Profile</a>
    <a class="w3-text-white w3-margin-right" href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
  </div>
</header>
