<?php
include_once 'phpfiles/global.php';

checknotlogged();

$title = "Operations";
$active9 = "bg-white";

if (isset($_GET['success'])) {
  $notify = "<span class=\"alert-success w3-padding\">Added successfully!</span>";
}

if (isset($_POST['submit'])) {
  $description = $_POST['description'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];

  if (!empty($description) || !empty($amount) || !empty($date)) {
    if (!empty($description)) {
      if (!empty($amount)) {
        if (!empty($date)) {
          if (preg_match("/^[0-9]*$/",$amount)) {
            if (preg_match("/^[0-9\/]*$/",$date)) {
              $sql = "insert into operations (description, amount, date)
              values ('$description', '$amount', '$date')";
              $check = mysqli_query($connect, $sql);
              if ($check) {
                header ('location: operations.php?success');
              }
            }else {
              $notify = "<span class=\"alert-danger w3-padding\">Enter valid date!</span>";
            }
          }else {
            $notify = "<span class=\"alert-danger w3-padding\">Enter valid amount!</span>";
          }
        }else {
          $notify = "<span class=\"alert-danger w3-padding\">Date is empty!</span>";
        }
      }else {
        $notify = "<span class=\"alert-danger w3-padding\">Amount is empty!</span>";
      }
    }else {
      $notify = "<span class=\"alert-danger w3-padding\">Description is empty!</span>";
    }
  }else {
    $notify = "<span class=\"alert-danger w3-padding\">All fields are required!</span>";
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

  <h5 class="w3-margin-bottom">Add Operation:</h5>
  <form action="operations.php" method="post">
    <div class="row">
      <div class="col-sm-4">
        <label for="programme">Expense Description:</label>
        <input class="form-control w3-margin-bottom" type="text" name="description" value="" placeholder="Eg: 1 litre of fuel">
      </div>
      <div class="col-sm-4">
        <label for="hod">Amount:</label>
        <input class="form-control w3-margin-bottom" type="text" name="amount" value="" placeholder="Eg: 5000">
      </div>
      <div class="col-sm-4">
        <label for="hod">Date:</label>
        <input class="form-control w3-margin-bottom" type="text" name="date" value="" placeholder="DD/MM/YYYY">
      </div>
    </div>
    <input class="btn bg-color2 w3-text-white" type="submit" name="submit" value="Submit">
  </form>

  <br><br>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <tr>
        <th>S/N</th>
        <th>Expense</th>
        <th>Amount</th>
        <th>Date</th>
      </tr>

      <?php
        $sql = "select * from operations";
        $result = mysqli_query($connect, $sql);
        if ($result) {
          $sn = 0;
          $amount_sum = 0;
          while ($found = mysqli_fetch_array($result)) {
            $sn++;
            $id = $found['id'];
            $description = $found['description'];
            $amount = $found['amount'];
            $amount_sum += $amount;
            $date = $found['date'];

            echo "
              <tr>
                <td>{$sn}</td>
                <td>{$description}</td>
                <td>N{$amount}</td>
                <td>{$date}</td>
              </tr>
            ";
          }
          echo "
            <tr>
              <th></th>
              <th></th>
              <th>Total = N$amount_sum</th>
              <th></th>
            </tr>
          ";
        }
      ?>
    </table>
  </div>

</div>

<?php include_once 'footer.php' ?>
