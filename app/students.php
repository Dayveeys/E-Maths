<?php
include_once 'phpfiles/global.php';
include_once 'includes/dbkey.php';

checknotlogged();


$title = "Student Details";

if (isset($_GET['id']) && $_GET['id'] !== '') {
    $id = $_GET['id'];

  $delSQl = "DELETE FROM students WHERE id = '$id'";
  mysqli_select_db($connect, $dbname);
  $successDel = mysqli_query($connect, $delSQl);

  if ($successDel) {
    
      $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';   
   
  }else{
    $msg ='<h4 id="" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Not deleted successfully!</h4>';
    echo mysql_error();
  }

    
  }
?>


<?php require_once("includes/commonlinks.php"); ?>
  <body class="skin-blue">
      
      <!--header-->
      <?php require_once("includes/header.php"); ?>
      <!--header-->

      <!-- Left side column. contains the logo and sidebar -->
      <?php require_once("includes/aside.php"); ?>
      <!-- /.sidebar -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
                    
               
          <!-- //Tooltip -->

          <section class="">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Students List</h3>
              <?php
              if (isset($msg) && $msg !=='') {
                
              ?>
              <p class='pull-right'><?php echo $msg;?></p>
              <?php
              }
              ?>
            </div><!-- /.box-header -->
            <div class="box-body responsive">
            <table id="example1" class="table table-bordered table-striped" style="over-flow:scroll;">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Reg number</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Class</th>
                <!-- <th>Date of birth</th>
                <th>Phone number</th>
                <th>Address</th> -->
                <th>State</th>
                <!-- <th>LGA</th> -->
                <th>Nationality</th>
                <th>Registration Time</th>
                <th>View</th>
                <th>Delete</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $sql = "select * from students ORDER BY date_reg DESC";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                  $sn = 0;
                  while ($found = mysqli_fetch_array($result)) {
                    $sn++;
                    $id = $found['id'];
                    $reg_no = $found['reg_no'];
                    $firstname = $found['firstname'];
                    $lastname = $found['lastname'];
                    $othernames = $found['othernames'];
                    $email = $found['email'];
                    $gender = $found['gender'];
                    $programme = $found['programme'];
                    // $dob = $found['dob'];
                    // $phone = $found['phone'];
                    // $address = $found['address'];
                    $state = $found['state'];
                    // $lga = $found['lga'];
                    $nationality = $found['nationality'];
                    $regdate = $found['date_reg'];
                    $regtime = $found['time_reg'];
                    $action ='<div class="col-sm-4" style="text-align:center;" >
                        <a href="students.php?id='. $id . '">
                                    <button type="button" onclick="return delet();" class="btn btn-danger btn-md" name="delete" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    </a>
                                  </div>';

                    $action2 = '<div class="col-sm-4">
                                  <a title="View" href="studview.php?id='. $id .'" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                </div>';

                      echo "
                        <tr>
                          <td>{$sn}</td>
                          <td>{$reg_no}</td>
                          <td>{$firstname} {$lastname} {$othernames}</td>
                          <td>{$email}</td>
                          <td>{$gender}</td>
                          <td>{$programme}</td>
                          <td>{$state}</td>
                          <td>{$nationality}</td>
                          <td>{$regdate} {$regtime}</td>
                          <td>{$action2}</td>
                          <td>{$action}</td>
                        </tr>
                      ";
                  }
                }
              ?>
            </tbody>
            </table>
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php require_once("includes/footer.php"); ?>
<!-- <td>{$dob}</td>
                            <td>{$lga}</td>

                          <td>{$phone}</td>
                          <td>{$address}</td> -->
  </body>
</html>