<?php
include_once ('phpfiles/global.php');
require_once("includes/dbkey2.php");
checknotlogged();

if ($admin_level != 'super') {
  header("location: index.php");
}

$title = "Register Admin/Tutor";
$active2 = "bg-white";
$fullname = $username = $security_key = $password = $admin_email = $admin_gender = $admin_programme = $admin_phone = $admin_address = $admin_qualification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = checkinput($_POST['fullname']);
  $username = checkinput($_POST['username']);
  $security_key = checkinput($_POST['security_key']);
  $level = checkinput($_POST['level']);
  $password = checkinput($_POST['password']);
  // $admin_email = checkinput($_POST['admin_email']);
  $admin_gender = checkinput($_POST['admin_gender']);
  $admin_programme = checkinput($_POST['admin_programme']);
  $admin_phone = checkinput($_POST['admin_phone']);
  $admin_address = checkinput($_POST['admin_address']);
  $admin_qualification = checkinput($_POST['admin_qualification']);

  if (!empty($fullname) || !empty($username) || !empty($security_key) || !empty($password)) {
    if (!empty($fullname)) {
      if (!empty($username)) {
        if (!empty($security_key)) {
          if (!empty($password)) {
            if (preg_match("/^[a-zA-Z. ]*$/",$fullname)) {
              //if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                if (preg_match("/^[a-zA-Z0-9 ]*$/",$security_key)) {
                  if ($level != 'choose') {
                     // if (!empty($admin_email)) {
                if ($admin_gender != 'choose') {
                  if ($admin_programme != 'choose') {
                    if (!empty($admin_phone)) {
                      if (!empty($admin_address)) {
                        if (!empty($admin_qualification)) {
                          // if (filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
                            if (preg_match("/^[0-9]*$/",$admin_phone)) {
                              if (preg_match("/^[a-zA-Z0-9-+,. ]*$/",$admin_address)) {
                                
                          if (strlen($password) >= 5) {
                            $sql = "select id from reg_admin where username = '$username'";
                            $check = mysqli_query($connect, $sql);
                            if ($check) {
                              if (!mysqli_num_rows($check) > 0) {
                                // $password = md5($password);
                                $date_reg = date("d/m/Y");
                                $time_reg = date("h:ia");
                                $sql = "insert into reg_admin (fullname, username, level, security_key, password, gender, programme, phone, address, qualification, status, block, date_reg, time_reg)
                                values('$fullname', '$username', '$level', '$security_key', '$password', '$admin_gender', '$admin_programme', '$admin_phone', '$admin_address', '$admin_qualification', 'No', 'No', '$date_reg', '$time_reg')";

                                $sql2 = "insert into admin (email, password)
                                values('$username', '$password')";

                                if (mysqli_query($connect, $sql)) {
                                  $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Successfully Registered!</h4>';
                                  $fullname = $username = $security_key = $password = $admin_email = $admin_gender = $admin_programme = $admin_phone = $admin_address = $admin_qualification = "";
                                }
                                if (mysqli_query($connect2, $sql2)) {
                                  $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Successfully Registered!</h4>';
                                  $password = $username = "";
                                }
                              }else {
                                $notify = "<span class=\"btn btn-danger\">Email already exists!</span>";
                              }
                            }else {
                              $notify = "<span class=\"btn btn-danger\">An error occured!</span>";
                            }
                          }else {
                            $notify = "<span class=\"btn btn-danger\">Password must be 5 and above!</span>";
                          }
                        }else {
                          $notify = "<span class=\"btn btn-danger\">Please type a valid address!</span>";
                       }
                      }else {
                        $notify = "<span class=\"btn btn-danger\">Please type a valid phone number!</span>";
                      }
                    // }else {
                    //   $notify = "<span class=\"btn btn-danger\">Please type a valid email!</span>";
                    // }
                  }else {
                    $notify = "<span class=\"btn btn-danger\">Qualification field is required!</span>";
                  }
                }else {
                  $notify = "<span class=\"btn btn-danger\">Address field is required!</span>";
                }
              }else {
                $notify = "<span class=\"btn btn-danger\">Phone field is required!</span>";
              }
            }else {
              $notify = "<span class=\"btn btn-danger\">Please choose your programme!</span>";
            }
          }else {
            $notify = "<span class=\"btn btn-danger\">Please choose your gender!</span>";
          }
        // }else {
        //   $notify = "<span class=\"btn btn-danger\">Email field is required!</span>";
        //             }
                  }else {
                    $notify = "<span class=\"btn btn-danger\">Please choose level!</span>";
                  }
                }else {
                  $notify = "<span class=\"btn btn-danger\">Choose only alphabets and/or numbers for your security key!</span>";
                }
              // }else {
              //   $notify = "<span class=\"btn btn-danger\"Please type a valid email!</span>";
              // }
            }else {
              $notify = "<span class=\"btn btn-danger\">Enter valid full name!</span>";
            }
          }else {
            $notify = "<span class=\"btn btn-danger\">Password field is required!</span>";
          }
        }else {
          $notify = "<span class=\"btn btn-danger\">Security key field is required!</span>";
        }
      }else {
        $notify = "<span class=\"btn btn-danger\">Email field is required!</span>";
      }
    }else {
      $notify = "<span class=\"btn btn-danger\">Full name field is required!</span>";
    }
  }else {
    $notify = "<span class=\"btn btn-danger\">All fields are required!</span>";
  }
}

?>

<?php require_once("includes/commonlinks.php"); ?>
  <body class="skin-blue">
    <div class="wrapper">
      
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
          <div class="col-sm-6">
            <span class="pull-right"><?php echo $notify; ?></span>
          </div>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!-- //Tooltip -->

          <section class="content">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Registeration Form</h3>
              <?php
              if (isset($msg) && $msg !=='') {
                
              ?>
              <p class='pull-right'><?php echo $msg;?></p>
              <?php
              }
              ?>
            </div><!-- /.box-header -->
            <div class="box-body responsive">
              <form action="reg_admin.php" method="post">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input required class="form-control" type="text" name="fullname" placeholder="Enter Fullname" value="<?php echo $fullname; ?>">
        </div>
        <div class="form-group">
          <label for="username">Email</label>
          <input required class="form-control" type="email" name="username" placeholder="Enter Email" value="<?php echo $username; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="security_key">Security Key</label>
          <input required class="form-control" type="text" name="security_key" placeholder="Enter Security Key" value="<?php echo $security_key; ?>">
        </div>
        <div class="form-group">
          <label for="level">Level</label>
          <select class="form-control" name="level">
            <option value="choose">-- Choose --</option>
            <option value="super">Admin</option>
            <option value="staff">Tutor</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="password">Password</label>
          <input required class="form-control" type="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>">
        </div>
      </div>
      <!-- <div class="col-sm-6">
        <div class="form-group">
          <label for="admin_email">Email</label>
          <input required class="form-control" type="email" name="admin_email" value="<?php //echo $admin_email; ?>">
        </div>
      </div> -->
      <div class="col-sm-6">
          <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control w3-margin-bottom" name="admin_gender">
            <option value="choose">-- Choose --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="admin_programme">Class</label>
          <select class="form-control w3-margin-bottom" name="admin_programme">
            <option value="choose">-- choose --</option>
            <option value="All">All</option>
            <option value="JSSI">JSSI</option>
            <option value="JSS2">JSS2</option>
            <option value="JSS3">JSS3</option>
            <option value="SSS1">SSS1</option>
            <option value="SSS2">SSS2</option>
            <option value="SSS3">SSS3</option>
          </select>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="admin_phone">Phone number</label>
          <input required class="form-control" type="text" name="admin_phone"  value="<?php echo $admin_phone; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="admin_address">Address</label>
          <input required class="form-control" type="text" name="admin_address" value="<?php echo $admin_address; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="admin_qualification">Qualification</label>
          <input required class="form-control" type="text" name="admin_qualification" value="<?php echo $admin_qualification; ?>">
        </div>
      </div>
      </div>
      <div class="col-sm-12">
      <br>
        <div class="form-group">
          <input required class="btn bg-color2 w3-text-white" type="submit" name="submit" value="Register">
            <a href="staff.php" style="float: right;" class="btn btn-success left-block">
              View Tutors
            </a>
        </div>
        
      </div>
    </form>
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <?php require_once("includes/footer.php"); ?>
  </body>
</html>