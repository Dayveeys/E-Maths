<?php

function checkinput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function checkstudentlogged()
{
  if (isset($_SESSION['student_bigdata'])) {
    header("location: profile.php");
  }
}

function checkstudentnotlogged()
{
  if (!isset($_SESSION['student_bigdata'])) {
    header("location: login.php");
  }
}

?>
