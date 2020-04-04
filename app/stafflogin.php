<?php
include_once 'phpfiles/global.php';

checklogged();

$notify = "<br>";
$username = "";

if (isset($_POST['login'])) {
  $username = checkinput($_POST['email']);
  $password = checkinput($_POST['password']);

  if (!empty($username) || !empty($password)) {
    if (!empty($username)) {
      if (!empty($password)) {
        $password = sha1($password);
        $sql = "select * from reg_admin where email = '$username' and password = '$password' limit 1";
        $query = mysqli_query($connect, $sql);
        if ($query) {
          if (mysqli_num_rows($query) > 0 ) {
            $found = mysqli_fetch_array($query);
            $id = $found['id'];
            $admin_level = $found['level'];
            $block = $found['block'];

            if ($block == "No") {
              $sql = "update reg_admin set status = 'Yes' where id = '$id' limit 1";
              $query = mysqli_query($connect, $sql);
              if ($query) {
                $_SESSION['admin_bigdata'] = $id;
                header("location:index2.php");
              }
            }else {
              $notify = "<span class=\"text-danger\">Your account has been blocked!</span>";
            }
          }else {
            $notify = "<span class=\"text-danger\">Username or password is incorrect!</span>";
          }
        }else {
          $notify = "<span class=\"text-danger\">An error has occured!</span>";
        }
      }else {
        $notify = "<span class=\"text-danger\">Please type in your password!</span>";
      }
    }else {
      $notify = "<span class=\"text-danger\">Please type in your username!</span>";
    }
  }else {
    $notify = "<span class=\"text-danger\">All fields are required!</span>";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="images/favicon.ico" rel="shortcut icon" media="all">
    <title>Admin Login :: E-Maths</title>

    <!-- Bootstrap CSS -->    
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css2/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css2/elegant-icons-style.css" rel="stylesheet" />
    <link href="css2/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css2/style2.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="" style="background-image: url('images/bg.jpg'); background-repeat: no-repeat;">

    <div class="container">

        <div class="col-md-12">
              <h2 style="color:#fff; font-size:40px; text-align:center;">Admin Login</h2>
        </div>

      <form style="margin-top:0%;" class="login-form" action="login.php" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="fa fa-lock"></i></p>
            <p style="color: red; text-align: center;"><?php echo $notify;  ?></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="email" class="form-control" placeholder="Email" value="<?php echo $username;  ?>" id="username" name="email" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" value="" id="pass" required="">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <!-- <span class="pull-right"> <a href="#"> Forgot Password?</a></span> -->
            </label>
            <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
    </div><br>
    <div class="col-md-5 center-block">
      <a class="pull-right" href="signup.php"></a>
    </div>
    <div class="col-md-5 center-block">
      <a class="btn btn-primary" href="../index.php"><i class="fa fa-home"></i> Go Back to Home Page</a>
    </div><br><br>
    <div class="col-md-12 w3_agile-copyright text-center">
        <hr><p style="text-align:center; color:#fff;">
            &copy; <script>var y = new Date(); document.write(y.getFullYear() + " ");</script>
            All rights reserved | Design by Davis Umeoka
        </p>
    </div>

  </body>
</html>
