<?php
include_once 'phpfiles/global.php';
include_once 'includes/dbkey.php';

checknotlogged();

if ($admin_level != 'super') {
  header("location: index.php");
}

$title = "Administrators";

if (isset($_GET['username']) && $_GET['username'] !== '') {
    $id = $_GET['username'];

  $delSQl = "DELETE FROM reg_admin WHERE username = '$id' AND username != 'dumeoka@visiondatatechs.com'";
  mysqli_select_db($connect, $dbname);
  $successDel = mysqli_query($connect, $delSQl);
 
  if ($successDel) {
    
      $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';   
  }
  else{
    $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">You cannot delete this Admin!</h4>';
    echo mysql_error();
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
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row col-lg-12">
            <a href="reg_admin.php">
              <button style="margin-top: -0.5%;" class="btn btn-success left-block" id="shobtn">Register New</button>
            </a>
          </div><br><!-- /.row -->          
               
          <!-- //Tooltip -->

          <section class="">
          
          <div class="box col-lg-12" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Administrators Details</h3>
              <?php
              if (isset($msg) && $msg !=='') {
                
              ?>
              <p class='pull-right'><?php echo $msg;?></p>
              <?php
              }
              ?>
              <h4 id="delsucs2" class="pull-right" style="color:white; padding:15px; width:500px; background-color:maroon; text-align:center; border-radius:5px;">Sorry this Administrator cannot be deleted!</h4>
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
                <th>Phone number</th>
                <th>Address</th>
                <th>Qualification</th>
                <th>Registration Time</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $sql = "select * from reg_admin where level = 'super'  ORDER BY date_reg DESC";
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
                    $regdate = $found['date_reg'];
                    $regtime = $found['time_reg'];
                    $action ='<div class="row" style="text-align:center;" >
                        <a href="admin.php?username='. $username . '">
                                    <button type="button" onclick="return delet();" class="btn btn-danger btn-md" name="delete" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    
                                    </a>
                                    
                                  </div>';

                      echo "
                        <tr>
                          <td>{$sn}</td>
                          <td>{$fullname}</td>
                          <td>{$username}</td>
                          
                          <td>{$gender}</td>
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
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php require_once("includes/footer.php"); ?>

      <?php
        if (isset($successDel) && $_GET['username'] == 'dumeoka@visiondatatechs.com'){
          ?>
          <script>
            $("#delsucs").hide();
            $("#delsucs2").show();
            setTimeout(function(){
                if ($('#delsucs2').length > 0) {
                  $('#delsucs2').fadeOut("slow");
                }
              }, 5000)   
          </script>
          <?php
          
        }
      ?>

  </body>
</html>