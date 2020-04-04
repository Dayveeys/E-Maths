<?php
include_once 'phpfiles/global.php';

checknotlogged();

$title = "Content Management";
$active10 = "bg-white";

$e_title = $description = "";

$active1 = "in active";
$active2 = "";
$active3 = "";

if (isset($_GET['success'])) {
  $active1 = "in active";
  $active2 = "";
  $active3 = "";

  $notify = "<span class=\"alert-success w3-padding\">Success!</span>";
}

if (isset($_GET['success2'])) {
  $active1 = "";
  $active2 = "in active";
  $active3 = "";

  $notify = "<span class=\"alert-success w3-padding\">Success!</span>";
}

if (isset($_GET['success3'])) {
  $active1 = "";
  $active2 = "";
  $active3 = "in active";

  $notify = "<span class=\"alert-success w3-padding\">Success!</span>";
}

if (isset($_POST['add'])) {
  $active1 = "";
  $active2 = "";
  $active3 = "in active";

  $e_title = checkinput($_POST['title']);
  $description = checkinput($_POST['description']);

  if (!empty($e_title) && !empty($description)) {
    $date = date("d-m-Y");
    $sql = "insert into events (title, event, date) values ('$e_title', '$description', '$date')";
    $query = mysqli_query($connect, $sql);
    if ($query) {
      header('location: content.php?success3');
    }else {
      echo "string";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Both fields are required!</span>";
  }
}

if (isset($_POST['upload'])) {
  $active1 = "";
  $active2 = "in active";
  $active3 = "";

  $name = $_FILES['photo']['name'];
  $size = $_FILES['photo']['size'];
  $type = $_FILES['photo']['type'];
  $tempname = $_FILES['photo']['tmp_name'];
  $ext = substr($name, strpos($name, '.') + 1);
  $ext = strtolower($ext);

  if (!empty($name)) {
    if ($ext != 'jpg' || $ext != 'jpeg' || $ext != 'png') {
      $name = "vc.$ext";
      if (move_uploaded_file($tempname, "../images/".$name)) {
        $sql = "select * from vc where type = 'photo'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
          if (mysqli_num_rows($query) > 0) {
            $sql = "update vc set content = '$name' where type = 'photo'";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              header('location: content.php?success2');
            }
          }else {
            $sql = "insert into vc (content, type) values ('$name', 'photo')";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              header('location: content.php?success2');
            }
          }
        }
      }else {
        $notify = "<span class=\"alert-danger w3-padding\">An error occured, please try again!</span>";
      }
    }else {
      $notify = "<span class=\"alert-danger w3-padding\">Please select a jpg or png image file!</span>";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Field is empty!</span>";
  }
}

if (isset($_POST['update'])) {
  $active1 = "";
  $active2 = "in active";
  $active3 = "";

  $name = checkinput($_POST['name']);
  $speech = checkinput($_POST['speech']);

  if (!empty($speech)) {
    if (!empty($name)) {
      $sql = "select * from vc where type = 'speech'";
      $query = mysqli_query($connect, $sql);
      if ($query) {
        if (mysqli_num_rows($query) > 0) {
          $sql = "update vc set content = '$speech' where type = 'speech'";
          $query = mysqli_query($connect, $sql);
          if ($query) {
            header('location: content.php?success2');
          }
        }else {
          $sql = "insert into vc (content, type) values ('$speech', 'speech')";
          $query = mysqli_query($connect, $sql);
          if ($query) {
            header('location: content.php?success2');
          }
        }
      }
      $sql = "select * from vc where type = 'name'";
      $query = mysqli_query($connect, $sql);
      if ($query) {
        if (mysqli_num_rows($query) > 0) {
          $sql = "update vc set content = '$name' where type = 'name'";
          $query = mysqli_query($connect, $sql);
          if ($query) {
            header('location: content.php?success2');
          }
        }else {
          $sql = "insert into vc (content, type) values ('$name', 'name')";
          $query = mysqli_query($connect, $sql);
          if ($query) {
            header('location: content.php?success2');
          }
        }
      }
    }else {
      $notify = "<span class=\"alert-danger w3-padding\">Fields cannot be empty!</span>";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Fields cannot be empty!</span>";
  }
}

if (isset($_GET['r'])) {
  $remove = $_GET['r'];

  $sql = "delete from slide where image = '$remove' limit 1";
  $query = mysqli_query($connect, $sql);
  if ($query) {
    unlink("../images/slide/".$remove);
    header('location: content.php?success');
  }
}

if (isset($_POST['slider'])) {
  $name = $_FILES['img']['name'];
  $size = $_FILES['img']['size'];
  $type = $_FILES['img']['type'];
  $tempname = $_FILES['img']['tmp_name'];
  $ext = substr($name, strpos($name, '.') + 1);
  $ext = strtolower($ext);

  if (!empty($name)) {
    if ($ext != 'jpg' || $ext != 'jpeg' || $ext != 'png') {
      $name = rand(0000,9999).rand(000,999).".$ext";
      if (move_uploaded_file($tempname, "../images/slide/".$name)) {
        $sql = "insert into slide (image)
        values('$name')";
        $query = mysqli_query($connect, $sql);
        if ($query) {
          header('location: content.php?success');
        }
      }else {
        $notify = "<span class=\"alert-danger w3-padding\">An error occured, please try again!</span>";
      }
    }else {
      $notify = "<span class=\"alert-danger w3-padding\">Please select a jpg or png image file!</span>";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">Field is empty!</span>";
  }
}


include_once 'header.php' ?>

<div class="w3-container">
  <br>
  <div class="row">
    <div class="col-sm-6">
      <h3><?php echo $title; ?></h3>
    </div>
    <div class="col-sm-6">
      <span class="w3-right"><?php echo $notify; ?></span>
    </div>
  </div>
  <hr>

  <ul class="nav nav-tabs">
    <li class="<?php echo $active1; ?>"><a data-toggle="tab" href="#home">Slide</a></li>
    <li class="<?php echo $active2; ?>"><a data-toggle="tab" href="#menu1">Vice Chancellor</a></li>
    <li class="<?php echo $active3; ?>"><a data-toggle="tab" href="#menu2">Events</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade <?php echo $active1; ?>">
      <h3>Slide</h3>
      <div class="row">
        <div class="col-sm-6">
          <form action="content.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <p>Select image file:</p>
              <input class="form-control" type="file" name="img" value="">
            </div>
            <div class="form-group">
              <input class="btn bg-color2" type="submit" name="slider" value="Submit">
            </div>
          </form>
        </div>
        <div class="col-sm-6">
          Slider Images:<hr>
          <?php
            $sql = "select * from slide";
            $query = mysqli_query($connect, $sql);
            $sn = 1;
            while ($found = mysqli_fetch_array($query)) {
              $image = $found['image'];
              $remove = "<a href=\"content.php?r={$image}\" class=\"w3-text-red\">Remove</a>";
              echo "
                {$sn}) <img src=\"../images/slide/{$image}\" width=\"200px\" /> <a href=\"../images/slide/{$image}\">{$image}</a> {$remove} <hr>
              ";
              $sn++;
            }
          ?>
        </div>
      </div>
    </div>

    <div id="menu1" class="tab-pane fade <?php echo $active2; ?>">
      <div class="row">
        <br>
        <div class="col-sm-6">
          <?php
            $sql = "select * from vc where type = 'name'";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              $found = mysqli_fetch_array($query);
              $name = $found['content'];
            }

            $sql = "select * from vc where type = 'speech'";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              $found = mysqli_fetch_array($query);
              $speech = $found['content'];
            }

            $sql = "select * from vc where type = 'photo'";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              $found = mysqli_fetch_array($query);
              $photo = $found['content'];
            }
          ?>

          <form action="content.php" method="post">
            <div class="form-group">
              <label>VC's fullname:</label>
              <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
              <label>VC's speech:</label>
              <textarea class="form-control" name="speech" rows="4"><?php echo $speech; ?></textarea>
            </div>
            <div class="form-group">
              <input class="btn bg-color2 w3-text-white" type="submit" name="update" value="Update">
            </div>
          </form>
        </div>
        <div class="col-sm-6">
          <?php echo "<img src=\"../images/$photo\" width=\"200px\" />"; ?>
          <br><br>
          <form action="content.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>VC's photo:</label>
              <input class="form-control" type="file" name="photo" value="">
            </div>
            <div class="form-group">
              <input class="btn bg-color2 w3-text-white" type="submit" name="upload" value="Upload">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="menu2" class="tab-pane fade <?php echo $active3; ?>">
      <h3>Events</h3>
      <div class="row">
        <div class="col-sm-6">
          <?php
            $sql = "select * from events";
            $query = mysqli_query($connect, $sql);
            if ($query) {
              while ($found = mysqli_fetch_array($query)) {
                $etitle = $found['title'];
                $event = $found['event'];

                echo "
                  <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">{$etitle}</div>
                    <div class=\"panel-body\">{$event}</div>
                  </div>
                ";
              }
            }
          ?>
        </div>
        <div class="col-sm-6">
          <h5>Add Event:</h5>
          <form action="content.php" method="post">
            <div class="form-group">
              <label>Title:</label>
              <input class="form-control" type="text" name="title" value="<?php echo $e_title; ?>">
            </div>
            <div class="form-group">
              <label>Descripton:</label>
              <textarea class="form-control" name="description" rows="4"><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
              <input class="btn bg-color2 w3-text-white" type="submit" name="add" value="Add Event">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include_once 'footer.php' ?>
