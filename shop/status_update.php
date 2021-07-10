<?php
require '../connection.php';
session_start();
echo $_GET['id']; ?>
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
  <title>Status Update</title>
</head>

<body>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#DAEEDC;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" style="color: black;" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        <!-- <a class="nav-item nav-link" style="color: black;" href="makebill.php">Generate Bill <span class="sr-only">(current)</span></a> -->
      </div>
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
    <h1 style="margin-top: 1%;">Status Update</h1>
    <div class="container">
      <form action=<?php echo "update.php?id=" . $_GET['id']; ?> method="POST">
        <div class="row">
          <div class="col-lg-8">
            <table class="table table-borderless table-striped table-earning">
              <thead>
                <tr>
                  <th style="background:#DCDCDC;color:#333;text-align:center">Id</th>
                  <th style="background:#DCDCDC;color:#333;text-align:center">Email</th>
                  <th style="background:#DCDCDC;color:#333;text-align:center">Status Update</th>
                  <th style="background:#DCDCDC;color:#333;text-align:center">Date</th>
                </tr>
              </thead>
              <?php
              include('../connection.php');
              date_default_timezone_set('Asia/Calcutta');
              $current_date =  date('Y-m-d');
              $query = mysqli_query($conn, "SELECT * FROM `slot_tab` WHERE `id`=$_GET[id]");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <tr style="text-align: center;">
                  <td value=<?php echo $row['id'] ?> id="id"><?php echo $row['id'] ?></td>
                  <td>
                    <input  hidden id="row_count" name="row_count" />
                    <input  hidden value="<?php echo $_SESSION['license_number'] ?>" 
                    name="license_number" id="license_number" />
                    <input hidden name="email" id ="email" value=<?php echo $row['email'] ?> />
                    <?php echo $row['email'] ?></td>
                  <td><select class="form-control" id="status">
                      <option disabled selected>Select</option>

                      <option>COMPLETE</option>
                    </select></td>
                  <td>

                    <input type="date" class="form-control" id="date" name="date">
                  </td>
                </tr>
              <?php
              }
              ?>
            </table>
          </div>
          <div class="container">
            <div class="row">
            </div> <br>
            <div class="col-lg-6">
              <table class="table table-borderless table-striped table-earning" id="service_tab">
                <thead>
                  <tr>
                    <th style="background:#DCDCDC;color:#333;text-align:left">Service Name</th>
                    <th style="background:#DCDCDC;color:#333;text-align:left">Service Cost</th>
                    <th style="background:#DCDCDC;color:#333;text-align:left">
                    <input type="button" class="btn btn-sm" value="Add row" onclick="addField();">
                  </th>
                  </tr>
                </thead>
                <tbody>
                  <table id="myTable">
                    <tr>
                      <td><input type="text" name="servicename0" class="form-control"></td>
                      <td><input type="text" name="servicecost0" class="form-control"></td>
                      
                    </tr>
                  </table>
                </tbody>
              </table>
              <?php 
                include('../connection.php');
                $total_cost = mysqli_query($conn, "SELECT `total_cost` FROM `bill_tab` WHERE `total_cost` > '500'");
                while($result1 =mysqli_fetch_array($total_cost)){
                  ?><div class="col-lg-6">
                  <!-- <br><input class="form-control" id="total" name="total" value="<?php echo $result1['cust_email']?>" disabled/> -->
                  <input class="form-control" id="total" name="total" value="<?php echo $result1['total_cost']?>" disabled/>
                    </div>
              <?php
                }
              ?>
              
              <br>
              <!-- <input type="submit" value="Submit" class="btn btn-primary"/> -->
            </div>
          </div><br>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">
      </form>
    </div>
  </section>
</body>
</html>
<script type="text/javascript">
    function addField(argument) {
        var myTable = document.getElementById("myTable");
        var currentIndex = myTable.rows.length; //count of rows
        var currentRow = myTable.insertRow(-1);

        var linksBox = document.createElement("input");
        linksBox.setAttribute("name", "servicename" + currentIndex);
        linksBox.setAttribute("id", "servicename" + currentIndex);
        linksBox.setAttribute("class", "form-control" + currentIndex);

        var keywordsBox = document.createElement("input");
        keywordsBox.setAttribute("name", "servicecost" + currentIndex);
        keywordsBox.setAttribute("id", "servicecost" + currentIndex);
        keywordsBox.setAttribute("class", "form-control" + currentIndex);

        // var addRowBox = document.createElement("input");
        // addRowBox.setAttribute("type", "button");
        // addRowBox.setAttribute("value", "Add row");
        // addRowBox.setAttribute("onclick", "addField();");
        // addRowBox.setAttribute("class", "btn btn-sm");

        var currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(linksBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(keywordsBox);

        // currentCell = currentRow.insertCell(-1);
        // currentCell.appendChild(addRowBox);

        document.getElementById("row_count").setAttribute('value',currentIndex);
    }
</script>