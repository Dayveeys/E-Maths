<?php
include_once 'phpfiles/global.php';

checknotlogged();

$title = "Quiz and Exam";
$active5 = "bg-white";

$search_item = $search_id = "";

if (isset($_GET['success'])) {
  $search_item = $_SESSION['search_item'];
  $search_id = $_SESSION['search_id'];
  $notify = "<span class=\"alert-success w3-padding\">Update successful</span>";
}

if (isset($_POST['grade'])) {
  $id = checkinput($_POST['id']);
  $quiz = checkinput($_POST['quiz']);
  $exam = checkinput($_POST['exam']);

  if (preg_match("/^[0-9]*$/",$quiz)) {
    if (preg_match("/^[0-9]*$/",$exam)) {
      $sql = "update regi_course set quiz = '$quiz', exam = '$exam' where id = '$id' limit 1";
      if (mysqli_query($connect, $sql)) {
        header('location: quiz_exam.php?success');
      }
    }else {
      $search_item = $_SESSION['search_item'];
      $search_id = $_SESSION['search_id'];
      $notify = "<span class=\"alert-danger w3-padding\">Please check and type correct exam score!</span>";
    }
  }else {
    $search_item = $_SESSION['search_item'];
    $search_id = $_SESSION['search_id'];
    $notify = "<span class=\"alert-danger w3-padding\">Please check and type correct quiz score!</span>";
  }
}

if (isset($_POST['search'])) {
  $search_item = checkinput($_POST['search_item']);
  $_SESSION['search_item'] = $search_item;
  $sql = "select * from students where reg_no = '$search_item'";
  $query = mysqli_query($connect, $sql);
  $found = mysqli_fetch_array($query);
  if ($found) {
    $search_id = $found['id'];
    $_SESSION['search_id'] = $search_id;
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Reg number not found!</span>";
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

  <form action="quiz_exam.php" method="post">
    <div class="input-group">
      <input style="min-width: 100px;" class="form-control" type="text" name="search_item" value="<?php echo $search_item ?>" placeholder="Enter Student Reg number">
       <div class="input-group-btn">
        <button type="submit" class="btn bg-color2 w3-text-white" name="search">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </div>
    </div>
  </form>

  <br><br>

  <div class="table-responsive">
    <h5>Search Result:</h5>
    <table class="table table-striped table-hover">
      <tr>
        <th>S/N</th>
        <th>Reg number</th>
        <th>Course title</th>
        <th>Course code</th>
        <th>Credit unit</th>
        <th>Quiz score</th>
        <th>Exam score</th>
        <th></th>
        <th>Total</th>
        <th>Grade</th>
        <th>Weight</th>
        <th>Point</th>
      </tr>
      <?php
        $sql = "select * from regi_course where student_id = '$search_id'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
          if (mysqli_num_rows($result) > 0) {
            $sn = 0;
            $total_credit = 0;
            $total_point = 0;
            while ($found = mysqli_fetch_array($result)) {
              $sn++;
              $id = $found['id'];
              $course_title = $found['course_title'];
              $course_code = $found['course_code'];
              $credit_unit = $found['credit_unit'];
              $quiz = $found['quiz'];
              $exam = $found['exam'];
              $total = $quiz + $exam;
              if ($total > 0 && $total <= 39) {
                $grade = "F";
                $weight = 0;
              }elseif ($total >= 40 && $total <= 49) {
                $grade = "C";
                $weight = 2.0;
              }elseif ($total >= 50 && $total <= 59) {
                $grade = "BC";
                $weight = 2.5;
              }elseif ($total >= 60 && $total <= 69) {
                $grade = "B";
                $weight = 3.0;
              }elseif ($total >= 70 && $total <= 79) {
                $grade = "AB";
                $weight = 3.5;
              }elseif ($total >= 80 && $total <= 100) {
                $grade = "A";
                $weight = "4";
              }else {
                $grade = "";
                $weight = "";
              }
              $point = $credit_unit * $weight;
              $total_credit += $credit_unit;
              $total_point += $point;

              echo "
                <tr>
                  <td>{$sn}</td>
                  <td>{$search_item}</td>
                  <td>{$course_title}</td>
                  <td>{$course_code}</td>
                  <td>{$credit_unit}</td>
                  <form action=\"quiz_exam.php\" method=\"post\">
                    <td><input type=\"text\" class=\"form-control\" name=\"quiz\" value=\"$quiz\"></td>
                    <td><input type=\"text\" class=\"form-control\" name=\"exam\" value=\"$exam\"></td>
                    <td>
                      <input type=\"hidden\" class=\"\" name=\"id\" value=\"$id\">
                      <input type=\"submit\" class=\"btn btn-success\" name=\"grade\" value=\"Grade\">
                    </td>
                  </form>
                  <td>{$total}</td>
                  <td>{$grade}</td>
                  <td>{$weight}</td>
                  <td>{$point}</td>
                </tr>
              ";
            }
            $cgp = $total_point / $total_credit;
            echo "<h3>CGPA = $cgp</h3>";
          }else {
            if ($search_id != "") {
              echo "<h5 class=\"text-danger w3-padding\">No Course registered!</h5>";
            }
          }
        }
      ?>
    </table>
  </div>

</div>

<?php include_once 'footer.php' ?>
