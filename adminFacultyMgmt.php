<?php


    require("database.php");
    require("sessionadmin.php");

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Admin | WLAP and Syllabus Management System</title>

		<!-- Styles -->
		<style>
			body {
				background:none !important;
				background-color: #fff !important;
			}
		</style>

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="img/logo.png" style="margin-top:-12px;"></a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-nav navbar-right" style="margin-right:25px;">
					<li><a href="#"><i class="fa fa-user-circle-o fa-fw"></i>&nbsp;<?php echo  $vFirstName; ?> <?php echo  $vMiddleName; ?>. <?php echo  $vLastName; ?></a></li>
				</ul>

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse text-center">
						<ul class="nav" id="side-menu">
							<li>
								<a href="adminHome.php"><i class="fa fa-3x fa-home fa-fw"></i><br>Home</a>
							</li>
							<li>
								<a href="adminWLAP.php"><i class="fa fa-3x fa-calendar-o fa-fw"></i><br>WLAP</a>
							</li>
							<li>
								<a href="adminSyllabus.php"><i class="fa fa-3x fa-file-text-o fa-fw"></i><br>Syllabus</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-3x fa-id-card-o fa-fw"></i><br>Faculty</a>
							</li>
							<li>
								<a href="adminlogout.php"><i class="fa fa-3x fa-sign-out fa-fw"></i><br>Logout</a>
							</li>

						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="page-header">WLAP</h2>
					</div>
					<!-- /.col-lg-12 -->
				</div>

				<div class="row">
					<div class="col-lg-5">
						<!-- Faculty List -->
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-search fa-fw"></i>&nbsp; Search Faculty
							</div>
							<!-- /.panel-heading -->

							<div class="panel-body" style="height:415px;">
								<form class="navbar-form">
									<div class="form-group">
									  <input type="text" placeholder="Search for..." class="form-control">
									  <a data-toggle="modal" data-target="#modal_addFaculty" style="margin-left:100px;"><b>+ Add Faculty</b></a>
									</div>
								</form>
								<table class="table table-scroll table-striped">
									<thead>
										<tr>
											<th>Faculty Name</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody style="width:89%; height:60%;">
										<tr>
											<td id="name">Verlyn C. Vicente</td>
											<td><a onclick="showFacSchedule()">View Schedule</a></td>
										</tr>
									</tbody>
								</table>

							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-4 -->

					<div class="col-lg-7">
						<div class="panel panel-green" style="display:none;" id="facSched">
							<div class="panel-heading">
								<i class="fa fa-calendar fa-fw"></i>&nbsp; Faculty 114153 Schedule
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<!-- Tab panes -->
								<form class="navbar-form">
									<div class="form-group">
									  <input type="text" placeholder="Search for..." class="form-control">
									</div>
								</form>
								<table class="table table-scroll table-striped">
									<thead>
										<tr>
											<th>Course Code</th>
											<th>Descriptive Title</th>
											<th>Section</th>
											<th>Day</th>
											<th>Time</th>
											<th>Room</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td id="code"><a data-toggle="modal" data-target="#modal_viewRemarks">COE 002A</a></td>
											<td id="desc">Introduction to Intellectual Property</td>
											<td id="sec">CPE42FC1</td>
											<td id="day">Friday</td>
											<td id="time">04:30PM-07:30PM</td>
											<td id="room">Q-3206</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-6 -->

				</div>
				<!-- /.row -->

				<!-- Popup add faculty -->
				<div class="modal fade" id="modal_addFaculty" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content" style="width:500px; height:520px;">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">+ Add Faculty</h4>
						</div>
						<div class="modal-body">
              <form action ="submitprof.php" method="post" class="form" role="form">
							<div class="form-group col-lg-10">
								<label for=lname>Last Name</label>
								<input class="form-control" id="lname" type="text" name="LN" placeholder="Enter last name" required><br>
								<label for=fname>First Name</label>
								<input class="form-control" id="fname" type="text" name="FN" placeholder="Enter first name" required><br>
								<label for=mname>Middle Name</label>
								<input class="form-control" id="mname" type="text" name="MN" placeholder="Enter middle name"><br>
								<label for=num>Contact Number</label>
								<input class="form-control" id="num" type="text" name="cnumber" placeholder="Enter contact number" required><br>
								<label for=email>Email Address</label>
								<input class="form-control" id="email" type="email" name="email" placeholder="Enter email address" required>
								<button type="Submit" name="submit" class="btn btn-sub"><b>Submit &nbsp;<i class="fa fa-arrow-right"></i></b></button>
							</div>
            </form>
						</div>
					  </div>
					</div>
				</div>
				<!-- /#Popup window -->

				<!-- Popup for remarks -->
				<div class="modal fade" id="modal_viewRemarks" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">COE 002A Remarks</h4>
						</div>
						<div class="modal-body">
							<table class="table table-scroll table-striped">
								<thead>
									<tr>
										<th>WLAP</th>
										<th>Remarks</th>
									</tr>
								</thead>

								<tbody style="height:470px;">
									<tr>
										<td><a data-toggle="modal" data-target="#modal_viewWLAP">Week 1</a></td>
										<td>This week, blablabla asfdasas asfasfa asfasd asdas asdasd asdasd asd</td>
									</tr>
								</tbody>
							</table>
						</div>
					  </div>
					</div>
				</div>
				<!-- /#Popup window -->

				<!-- Popup view of WLAP -->
				<div class="modal fade" id="modal_viewWLAP" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">COE 002A - Week 1</h4>
						</div>
						<div class="modal-body">
							...
						</div>
					  </div>
					</div>
				</div>
				<!-- /#Popup window -->

				<!-- Footer -->
				<footer class="text-center">
					<div class="footer-below">
						<div class="container">
							<div class="row">
								<div class="col-lg-12" style="color:#666666;">
									Copyright &copy; WLAP and Syllabus Management System 2017
								</div>
							</div>
						</div>
					</div>
				</footer>

			</div>
			<!--/#page-wrapper -->
		</div>
		<!-- /#wrapper -->

		 <!-- jQuery -->
		<script src="js/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="js/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="js/sb-admin-2.js"></script>

		<script src="js/customJS.js"></script>

	</body>

</html>
