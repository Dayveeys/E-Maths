<?php
include_once 'phpfiles/global.php';
include_once 'includes/dbkey.php';

checknotlogged();

if ($admin_level != 'super') {
  header("location: index.php");
}

$title = "Tutor Details";

if (isset($_GET['id']) && $_GET['id'] !== '') {
    $id = $_GET['id'];

  $delSQl = "DELETE FROM reg_admin WHERE id = '$id'";
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
          <div class="row col-lg-12">
            <a href="reg_admin.php">
              <button style="margin-top: -0.5%;" class="btn btn-success left-block" id="shobtn">Register New Admin/Tutor</button>
            </a>
          </div><br><!-- /.row -->          
               
          <!-- //Tooltip -->

          <section class="">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Tutors Details</h3>
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
                  <th>Fullname</th>
                  <th>Email</th>
                  <!-- <th>Email</th> -->
                  <th>Gender</th>
                  <th>Class</th>
                  <th>Phone number</th>
                  <th>Address</th>
                  <th>Qualification</th>
                  <th>Registration Time</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $sql = "select * from reg_admin where level = 'staff'  ORDER BY date_reg DESC";
                  $result = mysqli_query($connect, $sql);
                  if ($result) {
                    $sn = 0;
                    while ($found = mysqli_fetch_array($result)) {
                      $sn++;
                      $id = $found['id'];
                      $fullname = $found['fullname'];
                      $username = $found['username'];
                      $password = $found['password'];
                      // $email = $found['email'];
                      $gender = $found['gender'];
                      $phone = $found['phone'];
                      $address = $found['address'];
                      $qualification = $found['qualification'];
                      $programme = $found['programme'];
                      $regdate = $found['date_reg'];
                      $regtime = $found['time_reg'];
                      $action ='<div class="row" style="text-align:center;" >
                          <a href="staff.php?id='. $id . '">
                                      <button type="button" onclick="return delet();" class="btn btn-danger btn-md" name="delete" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
                                      
                                      </a>
                                      
                                    </div>';

                        echo "
                          <tr>
                            <td>{$sn}</td>
                            <td>{$fullname}</td>
                            <td>{$username}</td>
                            <td>{$email}</td>
                            <td>{$gender}</td>
                            <td>{$programme}</td>
                            <td>{$phone}</td>
                            <td>{$address}</td>
                            <td>{$qualification}</td>
                            <td>{$regdate} {$regtime}</td>
                            <td>{$action}</td>
                          </tr>
                        ";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div>
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div>
      <?php require_once("includes/footer.php"); ?>
  </body>
</html>