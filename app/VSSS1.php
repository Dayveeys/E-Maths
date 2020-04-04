<?php require_once("includes/dbkey.php"); ?>
<?php
include_once 'phpfiles/global.php';
checknotlogged();

// if (isset($_GET['res']) && $_GET['res'] !== '' && $_GET['res'] == 'yes') {

//     $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';
//   }
 $passport='';

  if (isset($_GET['ID']) && $_GET['ID'] !== '') {
    $ID = $_GET['ID'];
    $passport = $_GET["passport"];

    
    $passportDir = 'uploads/courseware/';
    $passportFullDir = $passportDir.$passport;

 

  $delSQl = "DELETE FROM videos WHERE ID = '$ID'";
  mysqli_select_db($connect, $dbname);
  $successDel = mysqli_query($connect, $delSQl);

  if ($successDel) {
    if (unlink($passportFullDir)) {
      $msg ='<h4 id="delsucs" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Deleted successfully!</h4>';
    }
    
   
  }else{
    $msg ='<h4 id="" class="pull-right" style="color:white; padding:15px; width:300px; background-color:green; text-align:center; border-radius:5px;">Not deleted successfully!</h4>';
    echo mysql_error();
  }

    
  }

?>



<?php
  //declare variables empty
  $name = $phone = $email = "";
  
  //declare test_input function
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //declare the variables
    
    $phone = test_input($_POST["topic"]);
    $module = test_input($_POST["module"]);
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["description"]);
    $passport = $_FILES["passport"];
    $passportTmp  = $passport['tmp_name'];
    $passportfilename = strtolower($passport["name"]);
    $passportfilesize = $passport["size"];
    $passportfilext = end(explode('.',$passportfilename));
    $passportDir = 'uploads/courseware/';
    $passportFullDir = '';
    
    //validate input
    if ($passportfilesize <= 0){
      $error = "Please Upload a Video of Not More Than 50mb!";
    }
    else if ($passportfilesize >= 100242880){
      $error = "File Cannot Be More Than 100mb!";
    }
    else if (empty($_POST["module"])){
      $error = "Please Enter Module!";
    }
    else if (empty($_POST["name"])){
      $error = "Please Enter Your Title!";
    }
    else if (empty($_POST["description"])){
      $error = "Description Is Required!";
    }
    else if (file_exists($passportfilename))
      {
         $msg = "<p class='label label-danger'>". $_FILES["file"]["name"] . " already exists. -
         Use another material. </p>";
      }
    else {
        $passportfilename = time().'.'.$passportfilext;

        $passportFullDir = $passportDir.$passportfilename;
        move_uploaded_file($passportTmp,$passportFullDir);
      $sql = "INSERT INTO videos (topic, title, module, class, description, media)
      VALUES ('$phone', '$name', '$module', 'SSS1', '$email', '$passportfilename')";
      if ($connect->query($sql) === TRUE){
        ?>
          <style>
            #tooltipm{
              display:block;
            }
          </style>
        <?php
        $name = $sname = $phone = $email = "";
      }
      else{
        echo "Error: " . $sql . "<br>" .$connect->error;
      }
      $connect->close();
    }
  }
  
  if (isset($error) && $error !== ""){
    ?>
      <style>
        #error{
          text-align:center;
          display:block;
          width:98.1%;
        }
      </style>
    <?php
  }
  else{
    ?>
      <style>
        #error{
          display:none;
        }
      </style>
    <?php
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
            Video Upload for SSS1
            <small>Control panel</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row col-lg-12">
              <button class="btn btn-success left-block" id="shobtn">Upload New Video</button>
              <a href="VSSS1.php"><button id="viewbtn" class="btn btn-warning pull-center">View Uploaded Videos</button></a>
          </div><br><!-- /.row -->          
                  
                  <div style="margin-top: 3%;" id="usereg" class="center-block panel panel-primary" style="width:60%;">
                    <div class="panel-heading">
                      <h3 class="title align-center">Video Upload Panel<button style="float: right; margin-top: -0.5%;" class="btn btn-default right-block" id="dhbtn">Close</button></h3>
                    </div>
                    <div class="panel-body">
                      <!-- Tooltip -->
                        <div id="tooltipm" class="tooltipm">
                          <h3>
                            Video Successfully Uploaded!<br>
                          </h3>
                        </div><br><br>
                      <!-- //Tooltip -->  
                      <form role="form" action="<?php htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <span class="error" id="error" style="margin-bottom:3%;"><?php echo $error;?></span>
                        <div class="box-body">
                          <label>
                          Click here to insert Video to be Uploaded <i style="font-size: 10px;">(Only video files are allowed)</i></label>
                          <input required type="file" class="form-control btn btn-primary btn-file center-block" style="overflow:hidden;white-space:normal;text-overflow:clip;" name="passport" id="">
                          <br><br>
                          

                          <div class="form-group">
                            <label for="admin_programme">Module</label>
                            <select required type="text" class="form-control" id="module" name="module">
                              <option value="choose">-- choose --</option>
                              <option value="All">All</option>
                              <option value="Number Theory">Number Theory</option>
                              <option value="Computation 1">Computation 1</option>
                              <option value="Algebra 1">Algebra 1</option>
                              <option value="Algebra 2">Algebra 2</option>
                              <option value="Measurement 1">Measurement 1</option>
                              <option value="Computation 2">Computation 2</option>
                              <option value="Consumer Arithmetic">Consumer Arithmetic</option>
                              <option value="Geometry 2">Geometry 2</option>
                              <option value="SSS1">Measurement 2</option>
                              <option value="Relations">Relations</option>
                              <option value="Statistics">Statistics</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="topic">Sub-Topic <i style="font-size: 10px;">(This is optional, only to be entered if needed)</i></label>
                            <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter Video Sub-Topic under the selected Module">
                          </div>
                          <div class="form-group">
                            <label for="name">Title</label>
                            <input required type="text" class="form-control" name="name" id="name" placeholder="Enter Video Title">
                          </div>
                          <div class="form-group">
                            <label for="email">Brief Description</label>
                            <textarea id="description" class="form-control textarea" style="height: 100px;" type="text" name="description" placeholder="Enter a brief Description of the Video"></textarea>
                          </div>
                          <!--<div class="checkbox">
                            <label>
                              <input required type="checkbox"> Remember me
                            </label>
                          </div>-->
                        </div><!-- /.box-body -->

                        <div class="box-footer" style>
                          <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div><br>
               
          <!-- //Tooltip -->

          <section class="content" id="view">
          
          <div class="box" style="font-size:12px;">
            <div class="box-header">
              <h3 class="box-title">Uploaded Video</h3>
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
                    <th>MODULE</th>
                    <th>SUB-TOPIC</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>VIDEO</th>
                    <th>DATE UPLOADED</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($connect,"SELECT * FROM videos WHERE class ='SSS1' ORDER BY DateCreated DESC");
                    
                    if (mysqli_num_rows ($query)> 0) {
                      $counter = 0;
                      while ($rows = mysqli_fetch_array($query) ){
                        $serialnumber = ++$counter;
                        $ID = $rows['ID'];
                        $module = $rows['module'];
                        $email = $rows['topic'];
                        $name = $rows['title'];
                        $phone = $rows['description'];
                        $passport = $rows['media'];
                        $regdate = $rows['DateCreated'];
                        $action ='<div class="row" style="text-align:center;" >
                        <a href="VSSS1.php?ID='. $ID . ' && passport='.$passport.'">
                                    <button type="button" onclick="return delet();" class="btn btn-danger btn-md" name="delete" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    
                                    </a>
                                    
                                  </div>';

                        echo '<tr><td>'.$serialnumber.'</td><td>'.$module.'</td><td>'.$email.'</td><td>'.$name.'</td>
                        <td>'.$phone.'</td><td>'.$passport.'</td><td>'.$regdate.'</td><td>'.$action.'</td></tr>';
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