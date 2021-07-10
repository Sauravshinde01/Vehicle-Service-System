<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Production Management System</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="js/jquery-ui.css">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
			include('static.php');
		?>
            <!-- MAIN CONTENT-->
            <div class="main-content" style="padding-top:100px">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
							<form action="newpart.php" method="post" class="form-horizontal">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add New Part Record</strong>
                                    </div>
                                    <div class="card-body card-block">
										<table style="border-collapse:separate;border-spacing:48px 20px;">
                                            
												<td>Part Name:</td>
												 <td>
													<input type="text" id="part" placeholder="Enter part name" name="part_name" class="form-control" required/>
												</td>
												<td>Part Number:</td>
												 <td>
													<input type="text" id="part_no"  placeholder="Enter part number" name="part_number" class="form-control" required/>
												</td>
											</tr>
											<tr>
                                                <td>Revision Number: </td>
												<td>
                                                    <input type="text" id="rev_no" placeholder="Enter Revision number" name="rev_no" class="form-control"  required>
                                                </td>	
												<td>No. of Setups: </td>
												<td>
                                                    <input type="number" id="no_of_setup" name="no_of_setup" class="form-control" onblur="create()" required></td>
											</tr>
										</table>
										<caption>Add Setups :</caption><br>
										<table id="setup_table" class="table table-borderless table-striped table-earning" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th style="background:#DCDCDC;color:#333;">Setup No</th>                                                
                                                <th style="background:#DCDCDC;color:#333;">Machine Number</th>
                                                <th style="background:#DCDCDC;color:#333;">Program Number</th>
                                                <th style="background:#DCDCDC;color:#333;">Time</th>
                                                <th style="background:#DCDCDC;color:#333;">Cost</th>
                                            </tr>
                                        </thead>
										<tbody id="replace">
                                        <tr>
                                                <td><input type="text" id="setup_no" name="setup_no1" value="1" class="form-control" disabled style="text-align:center;"></td>
                                                <td><input type="text" id="machine" name="machine_number1" class="form-control"></td>
                                                <td><input type="text" name="program_number1" class="form-control"></td>
                                                <td><input type="text" name="time1" class="form-control"></td>
                                                <td><input type="text" name="cost1" class="form-control"></td>
                                            </tr>
										</tbody>
                                    </table>
                                    </div>
                                    <div class="card-footer"><center>
										<input type="submit" value="Submit" action name="submit" class="btn btn-success btn-sm"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="reset" value="Reset" class="btn btn-primary btn-sm"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="dashboard.html"><input type="button" value="Cancel" class="btn btn-danger btn-sm"/></a></center>
									</div>  
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<script>
		$(function(){
			$("#part").autocomplete({
                source: "msearch.php?tbox=part",
			});

            $("#machine").autocomplete({
                source: "msearch.php?tbox=machine",
			});
        });

    function create() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("replace").innerHTML = this.responseText;
               // alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "create.php?setup="+document.getElementById("no_of_setup").value, true);
        xmlhttp.send();
    }
</script>