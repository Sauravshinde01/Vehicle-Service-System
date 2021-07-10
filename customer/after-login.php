<?php
require '../connection.php';
session_start();
$state;
$city;
?>
<?php
if ((!isset($_SESSION['email'])) || (!isset($_SESSION['password']))) {
	header('location:index.html');
} ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>After-Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body id="after-login-body">
	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#e3f2fd;">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" style="color: black;" href="index.html">Home <span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" style="color: black;" href="#services">Services</a>
				<!-- <a class="nav-item nav-link" style="color: black;" href="cust-registration.html">Registration</a> -->
				<!-- <a class="nav-item nav-link" style="color: black;" href="#">How-it-Works</a> -->
				<a class="nav-item nav-link" style="color: black;" href="#">Contacts</a>
			</div>
			<div class="dropdown">
      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
	  style="margin-right: 10%;">
        Profile
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-4">
				<h1 style="margin-top: 10%;">CHECK FOR AVAILABILITY</h1>
				<form id="after-login" style="margin-top: 15%;padding: 20px;" method="POST" action="slotbooking.php">
					<div class="form-group">
						<label>Select State<span class="star">*</span></label>
						<!-- <input type="hidden" name="country" id="countryId" value="IN"/>
					<select name="state" class="states order-alpha form-control" id="stateId"> -->
						<select onchange="getCity()" id="state" class="form-control" required>
							<option value disabled selected name="shop_state">Select State</option>
							<?php
							include('../connection.php');
							$query = mysqli_query($conn, "SELECT `shop_state` FROM `shop_reg`");
							// $result=mysqli_query($conn, $query);
							while ($row = mysqli_fetch_array($query)) {
								// echo "<option value='" . $row['shop_state'] . "'>" . $row['shop_state'] . "</option>";

							?>
								<option name="shop_state" value="<?php echo $row['shop_state'] ?>" class="form-group">
												<?php
													echo $row['shop_state'];
												?>
								</option>
					<?php
							}
					?>
					</select><br>
					<!-- </select> -->
					<!-- <label class="mt-3">Select State<span class="star">*</span></label>
					<select name="city" class="cities order-alpha form-control" id="cityId"> -->
					<label class="mt-1">Select City<span class="star">*</span></label>
					<!-- <input type="hidden" name="country" id="countryId" value="IN"/>
					<select name="state" class="states order-alpha form-control" id="stateId"> -->

					<select id="city" value="city" onchange="getShop()" class="form-control" required>
						<option value disabled selected>Select City</option>
					</select>

					<label class="mt-3">Vehicle Type</label>
					<select id="vehicle_type" name="vehicle_type" class="form-control" required>
						<option>2 Wheeler</option>
						<option>4 Wheeler</option>
					</select>
					<br>
					<label>Select Service Center<span class="star">*</span></label>
					<!-- <input type="hidden" name="country" id="countryId" value="IN"/>
					<select name="state" class="states order-alpha form-control" id="stateId"> -->
					<select id="service_center" class="form-control" name="shop_name" required>
						<option value disabled selected name="shop_name">Select Service Center</option>
						
					</select><br>
					<label for="birthday">Date</label>
					<input type="date" id="date" name="date" class="form-control" onblur="getslot()"><br>
				<label class="mt-3">Select Slot</label>
				<select id="slot" name="slot" class="form-control" required>

					<option disabled>Select Slot</option>
				</select>
				<br>
				<input name="email" value=<?php echo $_SESSION['email']; ?> hidden>
				<input type="submit" name="submit" class="btn btn-primary">
					</div>
				</form><br>

			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<img src="assets/vespa.png" height="auto" width="100%" id="vespa">
			</div>
		</div>
	</div>
	<section>
  <div class="map-responsive">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119981.38704996664!2d73.73344035729534!3d19.99094929628815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1625326120967!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
    </div>
</section>
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-3" id="contact-logo">
					<i class="fa fa-facebook" style="font-size:24px; color: white; "></i>
					<a href="https://www.facebook.com/">https://www.facebook.com/</a>
				</div>
				<div class="col-lg-3" id="contact-logo">
					<i class="fa fa-twitter" style="font-size:24px; color: white; "></i>
					<a href="https://twitter.com/">https://twitter.com/</a>
				</div>
				<div class="col-lg-3" id="contact-logo">
					<i class="fa fa-instagram" style="font-size:24px; color: white; "></i>
					<a href="https://www.instagram.com">https://www.instagram.com</a>
				</div>
				<div class="col-lg-3" id="contact-logo">
					<i class="fa fa-youtube" style="font-size:24px; color: white; "></i><br>
				</div>
			</div>
		</div>
	</section>
	
</body>

</html>

<script>
	function getCity() {
		var xhttp = new XMLHttpRequest();

		selectElement = document.querySelector('#state');

		output =
			selectElement.options[selectElement.selectedIndex].value;

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("city").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "ajacall.php?state=" + output, true);
		xhttp.send();
	}

	function getShop() {
		console.log("hello");
		var xhttp = new XMLHttpRequest();

		selectElement = document.querySelector('#state');

		state =
			selectElement.options[selectElement.selectedIndex].value;

			selectElement = document.querySelector('#city');

		city =
				selectElement.options[selectElement.selectedIndex].value;

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("service_center").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "scheduling_ajax.php?state=" + output+"&city="+city, true);
		xhttp.send();
	}

	function getslot() {
		var xhttp = new XMLHttpRequest();
		var date = document.getElementById("date").value;

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("slot").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "getslot.php?date=" + date, true);
		xhttp.send();
	}

</script>