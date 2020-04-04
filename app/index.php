<?php
include_once 'phpfiles/global.php';

if (isset($_SESSION['admin_bigdata'])) {
    $admin_id = $_SESSION['admin_bigdata'];

    $sql = "select * from reg_admin where id = '$admin_id'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      $found = mysqli_fetch_array($query);
      $admin_id = $found['id'];
      $admin_fullname = $found['fullname'];
      $admin_username = $found['username'];
      $admin_security_key = $found['security_key'];
      $admin_level = $found['level'];
      $admin_password = $found['password'];
      $admin_email = $found['email'];
      $admin_gender = $found['gender'];
      $admin_phone = $found['phone'];
      $admin_address = $found['address'];
      $admin_qualification = $found['qualification'];
      $admin_programme = $found['programme'];
      $admin_salary = $found['salary'];
      $admin_block = $found['block'];
      $admin_status = $found['status'];
      $admin_date_reg = $found['date_reg'];
      $admin_time_reg = $found['time_reg'];
    }
  }

checknotlogged();
include_once 'includes/commonlinks2.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dashboard || E-Maths</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../images/favicon.ico" rel="shortcut icon" media="all">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Ionicons 2.0.0 -->
    <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />  
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
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
            Dashboard
            <small>Control panel</small>
          </h1>
          <div class="col-sm-6">
            <span class="w3-right"><?php echo $notify; ?></span>
          </div>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="col-md-12 row" style="z-index: 20;">
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $all_admins; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Administrators & Tutors</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $courses; ?></h3>
                  <p>Courseware</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $programmes; ?></h3>
                  <p>Videos</p>
                </div>
                <div class="icon">
                  <i class="fa  fa-video-camera"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $students; ?></h3>
                  <p>All Students</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->

          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <!-- Calendar -->
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%;"></div>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer"style="text-align:center;">
        <strong>Copyright &copy; <script>var y = new Date(); document.write(y.getFullYear()+" ");</script> 
        E-Maths</strong> All rights reserved | Design by Davis Umeoka
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="js/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>