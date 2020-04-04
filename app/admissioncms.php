<?php
if (isset($_GET['res']) && $_GET['res'] !== '' && $_GET['res'] == 'yes') {

    $msg ='<h4 id="delsuc" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';
  }


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "khsenuguorg";
  
  //create connection
  //$connect = new mysqli($servername, $username, $password, $dbname);
  
  //check connection
  // if ($connect->connect_error){
  //   die("connection failed: " . $connect->connect_error);
  // }

    $connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
  echo "Connction failed";
}
 
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin CMS Admission :: Kings High School Enugu</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../images/favicon.ico" rel="shortcut icon" media="all">
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
   <!-- FontAwesome 4.3.0 -->
    <link href="plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <!--data table-->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
            Admission Applications
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admission Applications</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <div class="box" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">List Of Applications For Admission Into KHS Enugu</h3>
              <?php
              if (isset($msg) && $msg !=='') {
                
              ?>
              <p class='pull-right'><?php echo $msg;?></p>
              <?php
              }
              ?>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped" style="over-flow:scroll;">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>NAME</th>
                    <th>CLASS</th>
                    <th>GENDER</th>
                    <th>PHONE</th>
                    <th>BIRTHDAY</th>
                    <th>FATHER</th>
                    <th>MOTHER</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>PASSPORT</th>
                    <th>DATE</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($connect,"SELECT * FROM admission");
                    

                    if (mysqli_num_rows($query)> 0) {
                      $counter = 0;
                      while ($rows = mysqli_fetch_array($query) ){
                        $serialnumber = ++$counter;
                        $name = $rows['name'];
                        $surname = $rows['surname'];
                        $class = $rows['class'];
                        $gender = $rows['gender'];
                        $phone = $rows['phone'];
                        $birthday = $rows['birthday'];
                        $fathername = $rows['fathername'];
                        $mothername = $rows['mothername'];
                        $email = $rows['email'];
                        $permaddress = $rows['permaddress'];
                        $passport = $rows['passport'];
                        $regdate = $rows['regdate'];
                        $action ='<div class="row" style="text-align:center;" >
                                    <a href="'.$rows["serialnumber"].'"><button type="button" class="btn btn-primary btn-xs" ydata-toggle="tooltip" data-placement="bottom" title="Admit"><i class="fa fa-plus"></i></button></a>
                                    <a href="http://localhost/www/www.khsenugu.org/FinishedDesign/admin CMS/delete.php?id='.$rows["serialnumber"].'"><button type="button" onclick="return delet();" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button></a>
                                  </div>';

                        echo '<tr><td>'.$serialnumber.'</td><td>'.$name.' '.$surname.'</td><td>'.$class.'</td><td>'.$gender.'</td><td>'.$phone.'</td><td>'.$birthday.'</td><td>'.$fathername.'</td><td>'.$mothername.'</td><td>'.$email.'</td><td>'.$permaddress.'</td>
                        <td>'.'<img src="../uploads/'.$passport.'" height="110" width="100" alt="Photo" class="img-responsive"/>'.'</td><td>'.$regdate.'</td><td>'.$action.'</td></tr>';
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <footer class="main-footer"style="text-align:center;">
        <strong>Copyright &copy; <script>var y = new Date(); document.write(y.getFullYear()+" ");</script> 
        Kings High School Enugu</strong> All rights reserved | Design by <a href="www.visiondatatechs.com">Vision Data-Techs (Nig) Ltd</a>
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
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
     
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
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>

   
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });

      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
      });

      function delet()
      {
          var chk=confirm("Are You Sure To Permanently Delete This !");
          if(chk)
          {
            return true;  
          }
          else{
              return false;
          }
      }
    </script>

    <?php
    if (isset($msg)){
      ?>
      <script>
        setTimeout(function(){
            if ($('#delsuc').length > 0) {
              $('#delsuc').fadeOut("slow");
            }
          }, 5000)   
      </script>
      <?php
    }
    ?>
  </body>
</html>