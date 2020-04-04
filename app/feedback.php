<?php require_once("includes/dbkey2.php"); ?>
<?php
include_once 'phpfiles/global.php';

// if (isset($_GET['res']) && $_GET['res'] !== '' && $_GET['res'] == 'yes') {

//     $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';
//   }


?>



<?php

  if (isset($_GET['id']) && $_GET['id'] !== '') {
    $ID = $_GET['id'];

  $delSQl = "DELETE FROM feedback WHERE id = '$ID'";
  mysqli_select_db($connect2, $dbname2);
  $successDel = mysqli_query($connect2, $delSQl);

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
            Feedback
            <small>Control panel</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <section class="content">
          
          <div class="box" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Feedback from users</h3>
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
                    <th>SUBJECT</th>
                    <th>EMAIL</th>
                    <th>FEEDBACK</th>
                    <th>DATE SENT</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($connect2,"SELECT * FROM feedback ORDER BY date DESC");
                    
                    if (mysqli_num_rows ($query)> 0) {
                      $counter = 0;
                      while ($rows = mysqli_fetch_array($query) ){
                        $serialnumber = ++$counter;
                        $ID = $rows['id'];
                        $module = $rows['name'];
                        $email = $rows['subject'];
                        $name = $rows['email'];
                        $phone = $rows['feedback'];
                        $regtime = $rows['time'];
                        $regdate = $rows['date'];
                        $action ='<div class="row" style="text-align:center;" >
                        <a href="feedback.php?id='. $ID . '">
                                    <button type="button" onclick="return delet();" class="btn btn-danger btn-md" name="delete" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    
                                    </a>
                                    
                                  </div>';

                        echo '<tr><td>'.$serialnumber.'</td><td>'.$module.'</td><td>'.$email.'</td><td>'.$name.'</td>
                        <td>'.$phone.'</td><td>'.$regdate.'<br>'.$regtime.'</td><td>'.$action.'</td></tr>';
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php require_once("includes/footer.php"); ?>

  </body>
</html>