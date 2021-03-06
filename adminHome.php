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
      .container-pdf * > .modal-body{
				width:100%;
				height: calc(100vh - 125px);

			}
			.pdfobject-container{
				width:100%;
				height: calc(100vh - 155px);
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
								<a href="#"><i class="fa fa-3x fa-home fa-fw"></i><br>Home</a>
							</li>
							<li>
								<a href="adminWLAP.php"><i class="fa fa-3x fa-calendar-o fa-fw"></i><br>WLAP</a>
							</li>
							<li>
								<a href="adminSyllabus.php"><i class="fa fa-3x fa-file-text-o fa-fw"></i><br>Syllabus</a>
							</li>
							<li>
								<a href="adminFacultyMgmt.php"><i class="fa fa-3x fa-id-card-o fa-fw"></i><br>Faculty</a>
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
						<h2 class="page-header">Home</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-calendar fa-fw"></i> Schedule
							</div>
							<!-- /.panel-heading -->

							<div class="panel-body">


                <?php

                $t=date('d-m-Y');
                $p=date("D",strtotime($t));
                require ("database.php");
                $sql="Select c.CourseName,s.CourseCode,s.ScheduleDay,s.ScheduleTimeIN,s.ScheduleTimeOUT,s.Section,s.Room from schedule s INNER JOIN course c ON c.CourseCode = s.CourseCode WHERE s.userID = '".$IuserID."' ORDER by c.CourseName ";
                $result1 = mysqli_query($conn,$sql);

                 ?>
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
										<?php while ($schedule = mysqli_fetch_object($result1)){?>
											<tr>
												<td id="code"><?php echo $schedule->CourseCode;?></td>
												<td id="desc"><?php echo $schedule->CourseName;?></td>
												<td id="sec"><?php echo $schedule->Section;?></td>
												<td id="day"><?php echo $schedule->ScheduleDay;?></td>
												<td id="time"><?php echo $schedule->ScheduleTimeIN;?>-<?php echo $schedule->ScheduleTimeOUT;?></td>
												<td id="room"><?php echo $schedule->Room;?></td>
											</tr>
	                         <?php } ?>
									</tbody>
								</table>

								<!-- Tab panes -->
								<div class="tab-content">

								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>

					<div class="col-lg-4">
						<div class="panel panel-green" id="list" style="height:220px;">
							<div class="panel-heading">
								<i class="fa fa-user-o fa-fw"></i> Profile
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body" style="overflow-x:auto; height:178px;">
								<div class="tab-pane fade in active" id="profile">
									<div class="row">
                    <?php
                  require ("database.php");
                  $sql="SELECT ImageName from user where UserID = '".$IuserID."'";
                  $picture = mysqli_query($conn,$sql);
                   ?>
                    <div class="col-lg-6">
<?php while ($pictureofuser = mysqli_fetch_object($picture)){?>
                      <a id="docPhoto"><img class="img-thumbnail" src="<?php echo $pictureofuser->ImageName;?>"></a>
                      <a href="adminUpload.php" style="float:right;" id="changePhoto"><i class="fa fa-pencil fa-fw"></i> Change Photo</a>
                    </div>
  <?php } ?>
										<div class="col-lg-6" id="viewProfile" style="margin-top: -20px;">
											<form role="form"><br>
                        <h5 id="fullName"><?php echo  $vFirstName; ?> <?php echo  $vMiddleName; ?>. <?php echo  $vLastName; ?></h5>
                        <h5 id="num"><em><?php echo  $vcontactnum; ?></em></h5>
                        <h5 id="email"><em><?php echo  $vemail; ?></em></h5>
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>

					<div class="col-lg-4">
						<div class="panel panel-green" id="list" style="height:220px;">
							<div class="panel-heading">
								<i class="fa fa-bell fa-fw"></i> Notifications
								<a data-toggle="modal" data-target="#modal_viewNotif" class="pull-right"><i class="fa fa-expand fa-fw"></i></a>
							</div>


							<!-- /.panel-heading -->
							<div class="panel-body" style="overflow-y:auto; height:176px;">
                <?php
							require ("database.php");
							$sql="SELECT file.FileID,file.CourseCode,file.DateUpload, file.TimeUpload, user.Username,file.UserID FROM file INNER JOIN user on user.UserID = file.UserID  WHERE file.Status = 'Pending' ORDER BY file.DateUpload ASC  ";
							$result1 = mysqli_query($conn,$sql);

							 ?>

								<div class="list-group" style="height:165px;">
                  	<?php while ($notification = mysqli_fetch_object($result1)){?>
									<span href="#" class="list-group-item" style="height:100px;">
										<a data-toggle="modal" data-target="#modal_viewWLAP<?php echo $notification->FileID;?>" id="coursecode">
                    <span hidden class="pull-left text-muted small" style="display:hidden;" ><em id="faculty" name="FileID" ><?php echo $notification->FileID;?></em></span>
										<i class="fa fa-file-text-o fa-fw" ></i>&nbsp;<?php echo $notification->CourseCode;?></a><br>
										<span class="pull-left text-muted small">Revised by: <em id="faculty"><?php echo $notification->Username;?></em></span>
										<span class="pull-right text-muted small" id="datetime"><?php echo $notification->DateUpload;?> | <?php echo $notification->TimeUpload;?></span>
										<div class="row text-center">
											<button type="submit" class="btn btn-sub" style="width:40%;" name="Approve"><i class="fa fa-check"></i><a href="approve.php?id=<?php echo $notification->FileID;?>&userid=<?php echo $notification->UserID;?>"> Approve</a></button>
											<button  type="submit" class="btn btn-sub" style="width:40%;" name="Reject"><i class="fa fa-times"></i><a href="reject.php?id=<?php echo $notification->FileID;?>&userid=<?php echo $notification->UserID;?>"> Reject</a></button>
										</div>
									</span>
                    <?php } ?>
								</div>

								<!-- /.list-group -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
				</div>
				<!-- /.row -->
        <?php
        require ("database.php");
        $sql="SELECT file.FileID,file.CourseCode,file.DateUpload,file.Week_num_for_WLAP, file.TimeUpload, user.Username FROM file INNER JOIN user on user.UserID = file.UserID  WHERE file.Status = 'Pending' ORDER BY file.DateUpload ASC  ";
        $result24 = mysqli_query($conn,$sql);

        ?>



        <div class="container-pdf">
        <?php while ($notification1 = mysqli_fetch_object($result24)){?>
				<!-- Popup for viewing WLAP -->
				<div class="modal fade" id="modal_viewWLAP<?php echo $notification1->FileID;?>" role="dialog">
					<div class="modal-dialog modal-lg">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title" id="coursecode"><?php echo $notification1->CourseCode;?>-WEEK <?php echo $notification1->Week_num_for_WLAP;?></h4>
						  Revised by:&nbsp;<em id="faculty" style="color:#d9d9d9;"><?php echo $notification1->Username;?></em>
						</div>
						<div class="modal-body">
							<div id="pdf-container<?php echo $notification1->FileID;?>"></div>
						</div>
					  </div>
					</div>
				</div>
          <?php } ?>
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
						<div class="modal-body" style="height: 350px;">
							<input type="file" name="fileToUpload" id="fileToUpload"><br>
							<a id="submit"><i class="fa fa-check fa-fw"></i><b>Submit</b></a> &nbsp;&nbsp;
							<a onclick="hidePhotoInput()" id="can"><i class="fa fa-close fa-fw"></i><b>Cancel</b></a>
						</div>
					  </div>
					</div>
				</div>
				<!-- /#Popup window -->
        <?php
      require ("database.php");
      $sql="SELECT file.FileID,file.CourseCode,file.DateUpload, file.TimeUpload, user.Username FROM file INNER JOIN user on user.UserID = file.UserID  WHERE file.Status = 'Pending' ORDER BY file.DateUpload ASC  ";
      $result8 = mysqli_query($conn,$sql);

       ?>

				<!-- Popup for viewing notifications -->
        <div class="modal fade" id="modal_viewNotif" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->

            <div class="modal-content" style="width:500px;">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Notifications</h4>
						</div>
						<div class="modal-body" style="width:500px;">
							<div class="list-group" style="height:165px;">
                <?php while ($notification = mysqli_fetch_object($result8)){?>
								<span href="#" class="list-group-item" style="height:90px;">
									<div class="col-lg-8" style="margin-left:-20px;">
										<a data-dismiss="modal" data-toggle="modal" data-target="#modal_viewWLAP" id="coursecode">
                      <span hidden class="pull-left text-muted small" style="display:hidden;" ><em id="faculty" name="FileID" ><?php echo $notification->FileID;?></em></span>
										<i class="fa fa-file-text-o fa-fw"></i>&nbsp;<?php echo $notification->CourseCode;?></a><br>
										<span class="pull-left text-muted small" style="margin-top:25px;">Revised by: <em id="faculty"><?php echo $notification->Username;?></em></span><br>
										<span class="pull-left text-muted small">Uploaded on: <em><?php echo $notification->DateUpload;?> | <?php echo $notification->TimeUpload;?></em></span>
									</div>
									<div class="col-lg-4" style="margin:-12px 0 0 20px;">
										<button class="btn btn-sub" style="width:100%; margin-bottom:-10px;"><i class="fa fa-check"></i><a href="approve.php?id=<?php echo $notification->FileID;?>"> Approve</a></button><br>
										<button class="btn btn-sub" style="width:100%;"><i class="fa fa-times"></i><a href="reject.php?id=<?php echo $notification->FileID;?>"> Reject</a></button>
									</div>
								</span>
                <?php } ?>
							</div>
							<!-- /.list-group -->




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

    <script src="js/pdfobject.min.js"></script>

		<script src="js/customJS.js"></script>
    <?php

              require ("database.php");
              $sql="SELECT file.FileID,file.CourseCode,file.FileName,file.DateUpload, file.TimeUpload, user.Username FROM file INNER JOIN user on user.UserID = file.UserID  WHERE file.Status = 'Pending' ORDER BY file.DateUpload ASC  ";
              $result3 = mysqli_query($conn,$sql);
        ?>

    <script>
    <?php while ($pdf = mysqli_fetch_object($result3)){?>
            PDFObject.embed(<?php echo "\"pdf_pend/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->FileID;?>");
    <?php }?>
    </script>

	</body>

</html>
