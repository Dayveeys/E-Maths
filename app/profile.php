<?php include_once 'phpfiles/global.php';
require_once("includes/dbkey2.php");

checknotlogged();

$title = "My Profile"; ?>

<?php
if (isset($_POST['edit'])) {
  $admin_fullname = checkinput($_POST['admin_fullname']);
  $admin_security_key = checkinput($_POST['admin_security_key']);
  $admin_password = checkinput($_POST['admin_password']);
  $c_password = checkinput($_POST['c_password']);
  $admin_email = checkinput($_POST['admin_email']);
  $admin_gender = checkinput($_POST['admin_gender']);
  $admin_programme = checkinput($_POST['admin_programme']);
  $admin_phone = checkinput($_POST['admin_phone']);
  $admin_address = checkinput($_POST['admin_address']);
  $admin_qualification = checkinput($_POST['admin_qualification']);

  if (!empty($admin_fullname)) {
    if (!empty($admin_security_key)) {
      if (!empty($admin_password)) {
        if (!empty($admin_email)) {
          if ($admin_gender != 'choose') {
            if ($admin_programme != 'choose') {
              if (!empty($admin_phone)) {
                if (!empty($admin_address)) {
                  if (!empty($admin_qualification)) {
                    if (filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
                      if (preg_match("/^[0-9]*$/",$admin_phone)) {
                        if (preg_match("/^[a-zA-Z0-9-+,. ]*$/",$admin_address)) {
                          if ($admin_password == $c_password) {
                            // $admin_password = md5($admin_password);
                            $sql = "update reg_admin set fullname = '$admin_fullname', security_key = '$admin_security_key', password = '$admin_password', username = '$admin_email', gender = '$admin_gender', programme = '$admin_programme', phone = '$admin_phone', address = '$admin_address', qualification = '$admin_qualification' where id = '$admin_id' limit 1";
                            $sql2 = "update admin set password = '$admin_password', email = '$admin_email' where id = '$admin_id' limit 1";
                            if (mysqli_query($connect, $sql)) {
                              $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Edited successfully!</h4>';
                            }
                            if (mysqli_query($connect2, $sql2)) {
                              $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Edited successfully!</h4>';
                            }
                          }else {
                            $notify = "<span class=\"btn btn-danger\">Confirm password does not match!</span>";
                          }
                        }else {
                          $notify = "<span class=\"btn btn-danger\">Please type a valid address!</span>";
                        }
                      }else {
                        $notify = "<span class=\"btn btn-danger\">Please type a valid phone number!</span>";
                      }
                    }else {
                      $notify = "<span class=\"btn btn-danger\">Please type a valid email!</span>";
                    }
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
        }else {
          $notify = "<span class=\"btn btn-danger\">Email field is required!</span>";
        }
      }else {
        $notify = "<span class=\"btn btn-danger\">You left password field empty!</span>";
      }
    }else {
      $notify = "<span class=\"btn btn-danger\">Security key field is required!</span>";
    }
  }else {
    $notify = "<span class=\"btn btn-danger\">Full name field is required!</span>";
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
          <div class="row col-lg-12">
              <button style="margin-top: -0.5%;" class="btn btn-success left-block" id="shobtn">Edit Profile</button>
          </div><br><!-- /.row -->          
                  
                  <div style="margin-top: 3%;" id="usereg" class="center-block panel panel-primary" style="width:60%;">
                    <div class="panel-heading">
                      <h3 class="title align-center">Profile Edit Panel<button style="float: right; margin-top: -0.5%;" class="btn btn-default right-block" id="dhbtn">Close</button></h3>
                    </div>
                    <div class="panel-body">
                     
                      <form role="form" action="<?php htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="admin_fullname">Full Name</label>
                            <input required required class="form-control" type="text" name="admin_fullname" value="<?php echo $admin_fullname; ?>" placeholder="Enter your full name here">
                          </div>
                          <div class="form-group">
                            <label for="admin_security_key">Security Key</label>
                            <input required required class="form-control" type="text" name="admin_security_key" value="<?php echo $admin_security_key; ?>" placeholder="Enter your security key here">
                          </div>
                          <div class="form-group">
                            <label for="admin_password">Password</label>
                            <input required required class="form-control" type="password" name="admin_password" value="" placeholder="Enter your new password here">
                          </div>
                          <div class="form-group">
                            <label for="c_password">Confirm Password</label>
                            <input required required class="form-control" type="password" name="c_password" value="" placeholder="Enter new password again">
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="admin_email">Email</label>
                            <input required required class="form-control" type="email" name="admin_email" value="<?php echo $admin_username; ?>" placeholder="Enter your email here">
                          </div>
                          <div class="form-group">
                            <label for="gender">Gender</label>
                            <select required class="form-control w3-margin-bottom" name="admin_gender">
                              <option value="choose">-- Choose --</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="admin_programme">Class</label>
                            <select required class="form-control w3-margin-bottom" name="admin_programme">
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

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="admin_phone">Phone number</label>
                            <input required required class="form-control" type="phone" name="admin_phone"  value="<?php echo $admin_phone; ?>" placeholder="Enter your phone number here">
                          </div>
                          <div class="form-group">
                            <label for="admin_address">Address</label>
                            <input required required class="form-control" type="text" name="admin_address" value="<?php echo $admin_address; ?>" placeholder="Enter your address here">
                          </div>
                          <div class="form-group">
                            <label for="admin_qualification">Qualification</label>
                            <input required required class="form-control" type="text" name="admin_qualification" value="<?php echo $admin_qualification; ?>" placeholder="Enter your qualification here">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input required class="btn bg-color2 hover-opacity w3-text-white" type="submit" name="edit" value="Submit">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><br>
               
          <!-- //Tooltip -->

          <section class="" id="view">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">My Profile</h3>
              <?php
              if (isset($msg) && $msg !=='') {
                
              ?>
              <p class='pull-right'><?php echo $msg;?></p>
              <?php
              }
              ?>
            </div><!-- /.box-header -->
            <div class="box-body responsive">
              <div class="col-lg-6">
                <p style="font-size:15px;"><b>Fullname:</b>  <?php echo "$admin_fullname" ?></p>
                <p style="font-size:15px;"><b>Email:</b>  <?php echo "$admin_username" ?></p>
                <p style="font-size:15px;"><b>Security Key:</b>  <?php echo "$admin_security_key" ?></p>
                <!-- <p style="font-size:15px;"><b>Email:</b>  <?php echo "$admin_email" ?></p> -->
                <p style="font-size:15px;"><b>Gender:</b>  <?php echo "$admin_gender" ?></p>
              </div>
              <div class="col-lg-6">
                <p style="font-size:15px;"><b>Class:</b>  <?php echo "$admin_programme" ?></p>
                <p style="font-size:15px;"><b>Phone number:</b>  <?php echo "$admin_phone" ?></p>
                <p style="font-size:15px;"><b>Address:</b>  <?php echo "$admin_address" ?></p>
                <p style="font-size:15px;"><b>Qualification:</b>  <?php echo "$admin_qualification" ?></p>
              </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php require_once("includes/footer.php"); ?>

  </body>
</html>