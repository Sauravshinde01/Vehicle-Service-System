<?php
require '../connection.php';
session_start();
?>
<?php
if((!isset($_SESSION['email'])) || (!isset($_SESSION['password'])))
{
	header('location:shop.html');
}?>
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

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#DAEEDC;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" style="color: black;" href="shop.html">Home <span class="sr-only">(current)</span></a>
        <!-- <a class="nav-item nav-link" style="color: black;" href="#services">Services</a> -->
        <!-- <a class="nav-item nav-link" style="color: black;" href="#map">Location</a> -->
        <a class="nav-item nav-link" style="color: black;" href="shop-registration.html">Registration</a>
        <!-- <a class="nav-item nav-link" style="color: black;" href="#">How-it-Works</a> -->
        <!-- <a class="nav-item nav-link" style="color: black;" href="#">Contacts</a> -->
      </div>
    </div>
  </nav>
  <h1 style="margin-top: 0%;" class="mb-5 mt-3">Enter Shop Details</h1>
  <div class="container">

    <div class="row">
      <!-- <div class="col-lg-2"></div> -->




      <div class="col-lg-4">

        <form method="POST" action="shopdata.php">
          <div class="form-group">
            <label for="workinghours">Working Hours<span class="star">*</span></label>
            <input type="text" class="form-control" id="workhours" name="workhours" aria-describedby="emailHelp" placeholder="Enter your work hours" required>
            <small id="workinghourshelp" class="form-text text-muted">Eg: 8</small>
          </div>
      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="numofservices">Opening Time <span class="star">*</span></label>
          <input type="text" class="form-control" id="start_time" name="start_time"aria-describedby="emailHelp" name="servicesday" placeholder="Enter amount of vehicles serviced">
          <small id="emailHelp" class="form-text text-muted">Eg: 10:00</small>
        </div>

      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="numofservices">Closing Time<span class="star">*</span></label>
          <input type="text" class="form-control" id="end_time" name="end_time" aria-describedby="emailHelp" name="servicesday" placeholder="Enter amount of vehicles serviced">
          <small id="emailHelp" class="form-text text-muted">Eg: 10:00</small>
        </div>

      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for="licensenum">License Number<span class="star">*</span></label>
          <input class="form-control" disabled value=<?php echo $_SESSION['license_number'];?> >
          <input name="license_number" value=<?php echo $_SESSION['license_number'];?> hidden>

        </div>
      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="Holiday">Holiday<span class="star">*</span></label>
          <select class="form-control" id="holiday" name="holiday" required>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
            <option>Sunday</option>
          </select>
        </div>

      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="numofservices">Services in 1 day<span class="star">*</span></label>
          <input type="text" class="form-control" id="servicesday" aria-describedby="emailHelp" name="servicesday" placeholder="Enter amount of vehicles serviced">
          <small id="emailHelp" class="form-text text-muted">Total number of services
            done in 1 day</small>
        </div>

      </div>
      <div class="col-lg-4">

        <div class="form-group">
          <label for="Maxtime">Maximum time to service 1 vehicle (in hrs)<span class="star">*</span></label>
          <select class="form-control" id="maxtime" name="maxtime" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <!-- services and their amount need to be added -->
      </div>
      
      <div class="col-lg-4">

        <div class="form-group">
          <label for="Vehicles">Types of vehicles serviced<span class="star">*</span></label>
          <select class="form-control" id="vehicletype" name="vehicletype" required>
            <option>2 Wheeler</option>
            <option>4 Wheeler</option>
          </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
      </div>
      

      
      </form>
  
      <!-- https://www.haddadsubaru.com/service/service-appointment.htm -->
      <!-- need to make separate table for services and its cost and time needed for specific service -->
    </div>
    
  </div>


</body>
</head>

</html>


<!-- <script type="text/javascript">
  function addfields(){
    //declaring variable 
    var number = document.getElementById('services').value;
    var table = document.createElement('table');
for (var i = 1; i < number; i++){
    var tr = document.createElement('tr');   

    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td2 = document.createElement('td');

    var text1 = document.createTextNode('Text1');
    var text2 = document.createTextNode('Text2');
    var text2 = document.createTextNode('Text2');

    td1.appendChild(text1);
    td2.appendChild(text2);
    tr.appendChild(td1);
    tr.appendChild(td2);

    table.appendChild(tr);
}
document.body.appendChild(table);
  }
</script> -->

<!-- http://localhost/Vehicle_Service_System/shop/shopdata.php?workhours=9%3A00-8%3A00&holiday=Wednesday&servicesday=20&maxtime=2&vehicles=3&vehicletype=4+Wheeler&servicesnum=2&login=Submit -->