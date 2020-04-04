<?php
include_once 'phpfiles/global.php';
include_once 'includes/dbkey.php';

checknotlogged();

if ($admin_level != 'super') {
  header("location: index.php");
}

$title = "Full Student Details";

              if (isset($_GET['id'])) {
                $key = $_GET['id'];
                $sql = "select * from students where id = '$key'";
                $result = mysqli_query($connect, $sql);
                $found = mysqli_fetch_array($result);
                    $id = $found['id'];
                    $reg_no = $found['reg_no'];
                    $firstname = $found['firstname'];
                    $lastname = $found['lastname'];
                    $othernames = $found['othernames'];
                    $email = $found['email'];
                    $gender = $found['gender'];
                    $programme = $found['programme'];
                    $dob = $found['dob'];
                    $phone = $found['phone'];
                    $address = $found['address'];
                    $state = $found['state'];
                    $lga = $found['lga'];
                    $nationality = $found['nationality'];
                    $regdate = $found['date_reg'];
                    $regtime = $found['time_reg'];
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
            <a href="students.php">
              <button style="margin-top: -0.5%;" class="btn btn-success left-block" id="shobtn">Back</button>
            </a>
          </div><br><!-- /.row -->          
               
          <!-- //Tooltip -->

          <section class="">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Full details for <?php echo "$firstname&nbsp;$lastname" ?></h3>
              </div><!-- /.box-header -->
            <div class="box-body responsive">
              
                        <div class="col-lg-6">
                        <p style="font-size:15px;"><b>Registration Number:</b>  <?php echo "$reg_no" ?></p>
                        <p style="font-size:15px;"><b>First name:</b>  <?php echo "$firstname" ?></p>
                        <p style="font-size:15px;"><b>Last name:</b>  <?php echo "$lastname" ?></p>
                        <p style="font-size:15px;"><b>Other names:</b>  <?php echo "$othernames" ?></p>
                        <p style="font-size:15px;"><b>Email:</b>  <?php echo "$email" ?></p>
                        <p style="font-size:15px;"><b>Gender:</b>  <?php echo "$gender" ?></p>
                        <p style="font-size:15px;"><b>Class:</b>  <?php echo "$programme" ?></p>
                      </div>
                      <div class="col-lg-6">
                        <p style="font-size:15px;"><b>Phone number:</b>  <?php echo "$phone" ?></p>
                        <p style="font-size:15px;"><b>Address:</b>  <?php echo "$address" ?></p>
                        <p style="font-size:15px;"><b>State:</b>  <?php echo "$state" ?></p>
                        <p style="font-size:15px;"><b>LGA:</b>  <?php echo "$lga" ?></p>
                        <p style="font-size:15px;"><b>Nationality:</b>  <?php echo "$nationality" ?></p>
                        <p style="font-size:15px;"><b>Registration Date:</b>  <?php echo "$regdate &nbsp; $regtime" ?></p>
                      </div>
                      
                 
             
            </table>
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php require_once("includes/footer.php"); ?>

  </body>
</html>