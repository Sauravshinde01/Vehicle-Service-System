<!DOCTYPE html>
<html>
<header>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'> -->
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../style.css">
</header>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#e3f2fd;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" style="color: black;" href="index.html">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" style="color: black;" href="#services">Services</a>
                <a class="nav-item nav-link" style="color: black;" href="cust-registration.html">Registration</a>
                <a class="nav-item nav-link" style="color: black;" href="#">How-it-Works</a>
                <a class="nav-item nav-link" style="color: black;" href="#">Contacts</a>
            </div>
        </div>
    </nav>
    <h1 style="margin-top: 2%;">Select Services</h1>
    <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <form>
    <table class="table table-borderless table-striped table-earning" style="text-align: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10px;">
    <thead>
            <tr>
                <th style="background:#DCDCDC;color:#333;">Select</th>
              <th style="background:#DCDCDC;color:#333;">Service Name</th>
              <th style="background:#DCDCDC;color:#333;">Time Needed (in hrs)</th>
              <th style="background:#DCDCDC;color:#333;">Cost</th>
            </tr>
          </thead>
          <?php
            include('../connection.php');
            $sql = mysqli_query($conn, "SELECT `service_name`,`time`,`cost` FROM `services`");
            while($row = mysqli_fetch_array($sql)){
                ?>
                <tr>
                <td><input type="checkbox" onclick="addCost()"></td>
                    <td><?php echo $row['service_name'];?></td>
                    <td><?php echo $row['time'];?></td>
                    <td><?php echo $row['cost'];?></td>
                </tr>
                <?php  
            }
          ?>
    </table>
    <input type="submit" class="btn btn-primary">
    </form>
    </div>
    </div>
</body>
</html>
<script>
    function addCost(){
        static time=0, cost=0;
    }
</script>