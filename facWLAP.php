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
								<a href="#"><i class="fa fa-3x fa-calendar-o fa-fw"></i><br>WLAP</a>
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
						<h2 class="page-header">WLAP</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>

				<div class="row">
					<div class="col-lg-7">
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-search fa-fw"></i>&nbsp; Search WLAP
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#mycourses" data-toggle="tab">My Courses</a>
									</li>
									<li><a href="#other" data-toggle="tab">Other Courses</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content"><br>

										<div class="form-group">

										</div>

									<?php

								$t=date('d-m-Y');
								$p=date("D",strtotime($t));
								require ("database.php");
								$sql="Select distinct c.CourseOrder,c.CourseName,s.CourseCode from schedule s INNER JOIN course c ON c.CourseCode = s.CourseCode WHERE s.userID = '".$IuserID."' ORDER by c.CourseName ";
								$result1 = mysqli_query($conn,$sql);

								 ?>
									<div class="tab-pane fade in active" id="mycourses">
										<table class="table table-scroll table-striped">
											<thead>
												<tr>
													<th>Course Code</th>
													<th>Descriptive Title</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody style="width:80%; height:50%;">
												<?php while ($course = mysqli_fetch_object($result1)){?>
    										<tr>
    											<td id="code"><?php echo $course->CourseCode;?></td>
    											<td id="desc"><?php echo $course->CourseName;?></td>
    											<td><a onclick="showWLAPList()" href="facWLAPcourses.php?id=<?php echo $course->CourseOrder;?>">View list</a></td>
    										</tr>
                             <?php } ?>
											</tbody>
										</table>
									</div>
                  <?php

                  $t=date('d-m-Y');
                  $p=date("D",strtotime($t));
                  require ("database.php");
                  $sql="Select distinct T.CourseOrder,T.CourseName,T.CourseCode,T.UserID from (Select distinct c.CourseOrder,c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE T.UserID !='".$IuserID."' or T.UserID is NULL   ORDER by CourseName";
                  $result1 = mysqli_query($conn,$sql);

                   ?>
									<div class="tab-pane fade" id="other">
                    <?php

                    $t=date('d-m-Y');
                    $p=date("D",strtotime($t));
                    require ("database.php");
                    $sql="Select distinct T.CourseCode from (Select distinct c.CourseOrder,c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE T.UserID !='".$IuserID."' or T.UserID is NULL  ORDER by CourseName";
                    $result2 = mysqli_query($conn,$sql);

                     ?>
                    <form>
                    &nbsp;   &nbsp;   &nbsp;  Find course code: &nbsp;
                    <select name="users" onchange="showUser(this.value)">
                      <?php while ($othercourses = mysqli_fetch_object($result2)){?>
                      <option value="<?php echo $othercourses->CourseCode;?>"><?php echo $othercourses->CourseCode;?></option>

                      <?php } ?>
                    </select>
                        </form>


                      <div class="panel-body" id="txtHint">
										<table class="table table-scroll table-striped">
											<thead>
												<tr>
													<th>Course Code</th>
													<th>Descriptive Title</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody style="width:80%; height:50%;">
												<?php while ($othercourses = mysqli_fetch_object($result1)){?>
    										<tr>
    											<td id="code"><?php echo $othercourses->CourseCode;?></td>
    											<td id="desc"><?php echo $othercourses->CourseName;?></td>
    											<td><a href="facWLAPothercourses.php?id=<?php echo $othercourses->CourseOrder;?>">View list</a></td>
    										</tr>
                             <?php } ?>
											</tbody>
										</table>
                  </div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-6 -->

					
					<!-- /.col-lg-4 -->

				</div>
				<!-- /.row -->

				<!-- Popup for remarks -->

				<!-- /#Popup window -->

				<!-- Popup view of WLAP -->

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
     <script>
 function showUser(str) {
     if (str == "") {
         document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         if (window.XMLHttpRequest) {
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
         } else {
             // code for IE6, IE5
             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("txtHint").innerHTML = this.responseText;
             }
         };
         xmlhttp.open("GET","getfaccourse.php?q="+str,true);
         xmlhttp.send();
     }
 }
 </script>
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
