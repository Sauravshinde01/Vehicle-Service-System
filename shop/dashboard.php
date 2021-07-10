<?php
require '../connection.php';
session_start();
?>
<?php
if ((!isset($_SESSION['email'])) || (!isset($_SESSION['password']))) {
  header('location:shop.html');
} else {
  $sqlQuery = "SELECT `license_number` FROM `shop_details` WHERE `license_number` = $_SESSION[license_number]";
  $result = mysqli_query($conn, $sqlQuery);
  mysqli_error($conn);
  $license_number;
  while (!($data = mysqli_fetch_array($result))) {
    header('location:shopdetails.php');
    break;
  }
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop Data</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#DAEEDC;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <!-- <div class="navbar-nav">
        <a class="nav-item nav-link" style="color: black;" href="status_update.php">Generate Bill <span class="sr-only">(current)</span></a>
      </div> -->
    </div>
    <div class="dropdown">
      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right:50px;">
        Profile
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </div>
  </nav>
  <section>
    <h1 style="margin-top: 2%;">Tasks</h1>
    <form>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10 col-md-12 col-sm-6 col-xs-6">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th style="background:#DCDCDC;color:#333;">Id</th>
                  <th style="background:#DCDCDC;color:#333;">Start Time</th>
                  <th style="background:#DCDCDC;color:#333;">End Time</th>
                  <th style="background:#DCDCDC;color:#333;">Email</th>
                  <th style="background:#DCDCDC;color:#333;">License Number</th>
                  <th style="background:#DCDCDC;color:#333;">Status</th>
                  <th style="background:#DCDCDC;color:#333;">Vehicle Type</th>
                  <th style="background:#DCDCDC;color:#333;">Status<br> Update</th>
                </tr>
              </thead>
              <?php
              include('../connection.php');
              date_default_timezone_set('Asia/Calcutta');
              $current_date =  date('Y-m-d');
              $query = mysqli_query($conn, "SELECT * FROM `slot_tab` WHERE `license_number`='$_SESSION[license_number]' AND `status`='PENDING' AND `start_time`>= '$current_date'");

              while ($row = mysqli_fetch_array($query)) {
              ?>

                <tr>
                  <td value=<?php echo $row['id'] ?>><?php echo $row['id'] ?></td>
                  <td value=<?php echo $row['start_time'] ?>><?php echo $row['start_time'] ?></td>
                  <td value=<?php echo $row['end_time'] ?>><?php echo $row['end_time'] ?></td>
                  <td value=<?php echo $row['email'] ?>><?php echo $row['email'] ?></td>
                  <td value=<?php echo $row['license_number'] ?>><?php echo $row['license_number'] ?></td>
                  <td value=<?php echo $row['status'] ?>><?php echo $row['status'] ?></td>
                  <td value=<?php echo $row['vehicle_type'] ?>><?php echo $row['vehicle_type'] ?></td>
                  <td value=<?php echo $row['id']?>><a href=<?php echo "status_update.php?id=".$row['id'];
                   ?> id="edit">Edit</a></td>
                </tr>

              <?php
              }
              ?>
              <tbody>
                <tr>
                  <td></td>
                </tr>
              </tbody>
            </table>
            </select>
          </div>
        </div>
      </div>
    </form>
    <!-- <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
              <th style="background:#DCDCDC;color:#333;">Service Name</th>
              <th style="background:#DCDCDC;color:#333;">Time Needed (in hrs)</th>
              <th style="background:#DCDCDC;color:#333;">Cost</th>
              
            </tr>
          </thead>
        </table> -->
  </section>
</body>


</html>