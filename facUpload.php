<?php


    require("database.php");
    require("session.php");

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>WLAP and Syllabus Management System</title>

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
								<a href="facHome.php"><i class="fa fa-3x fa-home fa-fw"></i><br>Home</a>
							</li>
							<li>
								<a href="facWLAP.php"><i class="fa fa-3x fa-calendar-o fa-fw"></i><br>WLAP</a>
							</li>
							<li>
								<a href="facSyllabus.php"><i class="fa fa-3x fa-file-text-o fa-fw"></i><br>Syllabus</a>
							</li>

							<li>
								<a href="logout.php"><i class="fa fa-3x fa-sign-out fa-fw"></i><br>Logout</a>
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
						<h2 class="page-header">Home</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>

				<div class="row">
					<div class="col-lg-10">
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-calendar fa-fw"></i> Upload Profile Picture 
							</div>
							<!-- /.panel-heading -->

							<div class="panel-body">
							<?php

							include 'upload_crop.php';
							?>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>

					


				</div>
				<!-- /.row -->

				<!-- Popup for viewing WLAP -->
				<div class="modal fade" id="modal_viewWLAP" role="dialog">
					<div class="modal-dialog">

					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title" id="coursecode">COE 002A</h4>
						  Revised by:&nbsp;<em id="faculty" style="color:#d9d9d9;">arvillanueva</em> on
						  <em id="datetime" style="color:#d9d9d9;">Jan. 28 | 1:02PM</em>

						</div>
						<div class="modal-body">
							...
						</div>
					  </div>
					</div>
				</div>
				<!-- /#Popup window -->

				<!-- Popup for changing photo -->
				<div class="modal fade" id="modal_changePhoto" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Change Display Photo</h4>
						</div>
						<?php
						include 'upload_crop.php';
						?>
						<!--<div class="modal-body" style="height: 700px;">
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
							<a id="submit"><i class="fa fa-check fa-fw"></i><b>Submit</b></a> &nbsp;&nbsp;
							<a onclick="hidePhotoInput()" id="can"><i class="fa fa-close fa-fw"></i><b>Cancel</b></a>
						</div> -->
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
			<!-- /#page-wrapper -->
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
