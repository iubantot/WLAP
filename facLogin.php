<?php
    include('loginuser.php'); // Includes Login Script

    if(isset($_SESSION['login_user'])){

            header("location: facHome.php");

            }


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
			#page-wrapper {
				margin: 0 0 0 0 !important;
			}
			.navbar.navbar-default.navbar-fixed-top {
				background-color: #fff !important;
			}
		</style>

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="img/logo3.png" style="margin-top:-12px;"></a>
					</div>
				</div>
			</nav>

			<div id="page-wrapper"> <br><br><br><br><br>
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
              <div id="carousel-example-generic" class="carousel slide" style="height:300px;">
								<!-- Indicators -->
								<ol class="carousel-indicators hidden-xs">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<img class="img-responsive img-full" src="img/1.png" alt="">
									</div>
									<div class="item">
										<img class="img-responsive img-full" src="img/2.png" alt="">
									</div>
									<div class="item">
										<img class="img-responsive img-full" src="img/3.png" alt="">
									</div>
									<div class="item">
										<img class="img-responsive img-full" src="img/4.png" alt="">
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="icon-prev"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="icon-next"></span>
								</a>
							</div>

						</div>

						<div class="col-lg-5">
							<div class="panel panel-blue">
								<div class="panel-heading">
									<div class="row text-center">
										<h4><b>Faculty Login</b></h4>
									</div>
								</div>
								<!-- /.panel-heading -->

								<div class="panel-body">
									<form role="form"  action="" method="post">
										<div class="col-lg-1"></div>
										<div class="form-group col-lg-10">
											<label for=username>Username</label>
											<input class="form-control" id="Username" name="Username"  type="text" placeholder="Enter username" required><br>
											<label for=pass>Password</label>
											<input class="form-control" id="Password" name="Password" type="password" placeholder="Enter password" required>
											<button type="submit" class="btn btn-sub" name="login"><b>Login &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></b></button>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Footer --><br><br><br><br><br>
				<footer class="text-center">
					<div class="footer-below">
						<div class="container">
							<div class="row">
								<div class="col-lg-12" style="color:#fff;">
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

		<!-- Scripts -->
		<script src="js/jquery.min.js"></script>

		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
