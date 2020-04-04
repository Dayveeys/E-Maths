<?php
include_once 'phpfiles/global.php';

checknotlogged();

$title = "Registerable Courses";
$active6 = "bg-white";

$course_title = $course_code = "";

if (isset($_GET['success'])) {
  $notify = "<span class=\"alert-success w3-padding\">Added successfully!</span>";
}

if (isset($_POST['submit'])) {
  $course_title = checkinput($_POST['course_title']);
  $course_code = checkinput($_POST['course_code']);
  $programme = checkinput($_POST['programme']);
  $credit_unit = checkinput($_POST['credit_unit']);
  $price = checkinput($_POST['price']);

  if (!empty($course_title) || !empty($course_code)) {
    if (preg_match("/^[a-zA-Z0-9 ]*$/",$course_title)) {
      if (preg_match("/^[A-Z0-9 ]*$/",$course_code)) {
        $sql = "select id from courses where course_title = '$course_title' and programme = '$programme'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
          if (!mysqli_num_rows($result) > 0) {
            $sql = "insert into courses (course_title, course_code, programme, credit_unit, price)
            values ('$course_title', '$course_code', '$programme', '$credit_unit', '$price')";
            $check_query = mysqli_query($connect, $sql);
            if ($check_query) {
              header ('location: courses.php?success');
            }
          }else {
            $notify = "<span class=\"alert-danger w3-padding\">Course already added</span>";
          }
        }
      }else {
        $notify = "<span class=\"alert-danger w3-padding\">Invalid Course Code</span>";
      }
    }else {
      $notify = "<span class=\"alert-danger w3-padding\">Invalid Course Title</span>";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Fields cannot be empty!</span>";
  }
}

include_once 'header.php' ?>

<div class="w3-container">
  <br>
  <div class="row">
    <div class="col-sm-6">
      <h3><?php echo $title; ?></h3>
    </div>
    <div class="col-sm-6">
      <span class="w3-right"><?php echo $notify; ?></span>
    </div>
  </div>
  <hr>

  <?php
    if ($admin_level == 'super') {
      echo '
      <h5 class="w3-margin-bottom">Register a course:</h5>
      <form action="courses.php" method="post">
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="course_title">Course Title:</label>
              <input type="text" class="form-control" value="'.$course_title.'" name="course_title" placeholder="Enter Course Title">
            </div>

            <div class="form-group">
              <label for="course_code">Course Code:</label>
              <input type="text" class="form-control" value="'.$course_code.'" name="course_code" placeholder="Enter Course Code">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="programme">Programme:</label>
              <select class="form-control" value="" name="programme">
                <option value="choose">-- choose --</option>
                <option value="General Course">General Course</option>
                ';
                  $sql = "select * from programmes";
                  $query = mysqli_query($connect, $sql);
                  while ($found = mysqli_fetch_array($query)) {
                    $programme = $found['programmes'];

                    echo "
                      <option value=\"$programme\">$programme</option>
                    ";
                  }
                echo '
              </select>
            </div>

            <div class="form-group">
              <label for="credit_unit">Credit unit:</label>
              <select class="form-control" value="" name="credit_unit">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="price">Price:</label>
              <select class="form-control" value="" name="price">
                <option value="2000">N2000</option>
                <option value="2500">N2500</option>
              </select>
            </div>
          </div>

          <div class="col-sm-12">
            <input type="submit" class="btn bg-color2 w3-text-white" name="submit" value="Submit">
          </div>
        </div>
      </form>

      <br><br>
      ';
    }
  ?>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <tr>
        <th>S/N</th>
        <th>Course Title</th>
        <th>Course Code</th>
        <th>Programme</th>
        <th>Credit Unit</th>
        <th>Price</th>
      </tr>

      <?php
        $sql = "select * from courses";
        $result = mysqli_query($connect, $sql);
        if ($result) {
          $sn = 0;
          while ($found = mysqli_fetch_array($result)) {
            $sn++;
            $id = $found['id'];
            $course_title = $found['course_title'];
            $course_code = $found['course_code'];
            $programme = $found['programme'];
            $credit_unit = $found['credit_unit'];
            $price = $found['price'];

            echo "
              <tr>
                <td>{$sn}</td>
                <td>{$course_title}</td>
                <td>{$course_code}</td>
                <td>{$programme}</td>
                <td>{$credit_unit}</td>
                <td>N{$price}</td>
              </tr>
            ";
          }
        }
      ?>
    </table>
  </div>

</div>

<?php include_once 'footer.php' ?>
