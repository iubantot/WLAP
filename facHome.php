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
					<div class="col-lg-8">
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-calendar fa-fw"></i> Schedule
							</div>
							<!-- /.panel-heading -->
              <br>

              <div>
                <form>
                &nbsp;   &nbsp;   &nbsp;  Find course code: &nbsp;
                <select name="users" onchange="showUser(this.value)">

                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>


                </select>
                    </form>
              </div>

							<div class="panel-body" id="txtHint">



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
											<a href="facUpload.php" style="float:right;" id="changePhoto"><i class="fa fa-pencil fa-fw"></i> Change Photo</a>
										</div>
  <?php } ?>
										<div class="col-lg-6" id="viewProfile" style="margin-top: -20px;">
											<form role="form"><br>
												<h5 id="fullName"><?php echo  $vFirstName; ?> <?php echo  $vMiddleName; ?>. <?php echo  $vLastName; ?></h5>
												<h5 id="num"><em><?php echo  $vcontactnum; ?></em></h5>
												<h5 id="email"><em><?php echo  $vemail; ?></em></h5>
											</form>
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
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body" style="overflow-y:auto; height:176px;">
								<?php
							require ("database.php");
							$sql="SELECT file.CourseCode,file.Week_num_for_WLAP, file.DateUpload, file.TimeUpload,file.FileClass, user.Username FROM file INNER JOIN user on user.UserID = file.UserID WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID != '".$IuserID."') ORDER BY file.DateUpload ASC";
							$result1 = mysqli_query($conn,$sql);
							 ?>
               <?php
             require ("database.php");
             $sql1="SELECT file.CourseCode, file.Week_num_for_WLAP ,file.DateUpload,file.FileClass , file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID = '".$IuserID."') ORDER BY file.DateUpload ASC  ";
             $result2 = mysqli_query($conn,$sql1);

              ?>
								<div class="list-group">

									<?php while ($notification = mysqli_fetch_object($result1)){?>
                    <span href="#" class="list-group-item">
										<a data-toggle="modal" data-target="#modal_viewWLAP<?php echo $notification->Week_num_for_WLAP; echo $notification->CourseCode;echo $notification->FileClass;?>" id="coursecode">

                      <i class="fa fa-file-text-o fa-fw"></i>&nbsp;<?php echo $notification->CourseCode;?></a><br>
  										<span class="pull-left text-muted small">Revised by: &nbsp; <em id="faculty"><?php echo $notification->Username;?></em></span> &nbsp;
  										<span class="pull-right text-muted small" id="datetime"><?php echo $notification->DateUpload;?> | <?php echo $notification->TimeUpload;?></span>
                            </span>
                  <?php } ?>
                  <?php while ($notification2 = mysqli_fetch_object($result2)){?>
                    <span href="#" class="list-group-item">
                    <a data-toggle="modal" data-target="#modal_viewWLAP<?php echo $notification2->Week_num_for_WLAP; echo $notification2->CourseCode;echo $notification2->FileClass;?>" id="coursecode">
                      <i class="fa fa-file-text-o fa-fw"></i>&nbsp;<?php echo $notification2->CourseCode;?></a><br>
                      <span class="pull-left text-muted small">Status: <em id="faculty"><?php echo $notification2->Status;?></em></span>
                      <span class="pull-right text-muted small" id="datetime"><?php echo $notification2->DateUpload;?> | <?php echo $notification2->TimeUpload;?></span>
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

				<!-- Popup for viewing WLAP -->
				<?php
		          require ("database.php");
				  $sql="SELECT file.CourseCode, file.Week_num_for_WLAP, file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID = '".$IuserID."') ORDER BY file.DateUpload ASC ";
		          $result5 = mysqli_query($conn,$sql);
				  $sql1="SELECT file.CourseCode, file.Week_num_for_WLAP, file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID != '".$IuserID."') ORDER BY file.DateUpload ASC ";
				  $result6 = mysqli_query($conn,$sql1);
         	  ?>

				<!-- Popup for remarks -->

			<div class="container-pdf">
	<?php while ($notification3 = mysqli_fetch_object($result5)){?>
				<div class="modal fade" id="modal_viewWLAP<?php echo $notification3->Week_num_for_WLAP; echo $notification3->CourseCode;echo $notification3->FileClass;?>" role="dialog">
					<div class="modal-dialog modal-lg">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title"><?php echo $notification3->CourseCode ?>- Week <?php echo $notification3->Week_num_for_WLAP;?></h4>
						  Revised by:&nbsp;<em id="faculty" style="color:#d9d9d9;"><?php echo $notification3->Username;?></em> on
						  <em id="datetime" style="color:#d9d9d9;"><?php echo $notification3->DateUpload;?> | <?php echo $notification3->TimeUpload;?></em>
						</div>
						<div class="modal-body">
							<div id="pdf-container<?php echo $notification3->Week_num_for_WLAP; echo $notification3->CourseCode;echo $notification3->FileClass;?>"></div>
						</div>
					  </div>
					</div>
				</div>
				<?php }?>

	<?php while ($notification3 = mysqli_fetch_object($result6)){?>
				<div class="modal fade" id="modal_viewWLAP<?php echo $notification3->Week_num_for_WLAP; echo $notification3->CourseCode;echo $notification3->FileClass;?>" role="dialog">
					<div class="modal-dialog modal-lg">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title"><?php echo $notification3->CourseCode ?>- Week <?php echo $notification3->Week_num_for_WLAP;?></h4>
						  Revised by:&nbsp;<em id="faculty" style="color:#d9d9d9;"><?php echo $notification3->Username;?></em> on
						  <em id="datetime" style="color:#d9d9d9;"><?php echo $notification3->DateUpload;?> | <?php echo $notification3->TimeUpload;?></em>
						</div>
						<div class="modal-body">
							<div id="pdf-container<?php echo $notification3->Week_num_for_WLAP; echo $notification3->CourseCode; echo $notification3->FileClass;?>"></div>
						</div>
					  </div>
					</div>
				</div>
				<?php }?>
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

		 <!-- PDFObject JavaScript -->
		<script src="js/pdfobject.min.js"></script>

		<script src="js/customJS.js"></script>

		<?php
		          require ("database.php");
		          $sql1="SELECT file.CourseCode, file.FileName, file.Week_num_for_WLAP,file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID = '".$IuserID."' AND file.FileClass='Syllabus') ORDER BY file.DateUpload ASC ";
		          $result1 = mysqli_query($conn,$sql1);
				  $sql2="SELECT file.CourseCode, file.FileName, file.Week_num_for_WLAP,file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID = '".$IuserID."' AND file.FileClass='WLAP') ORDER BY file.DateUpload ASC ";
				  $result2 = mysqli_query($conn,$sql2);
				  $sql3="SELECT file.CourseCode, file.FileName, file.Week_num_for_WLAP,file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID != '".$IuserID."'AND file.FileClass='Syllabus') ORDER BY file.DateUpload ASC ";
				  $result3 = mysqli_query($conn,$sql3);
				  $sql4="SELECT file.CourseCode, file.FileName, file.Week_num_for_WLAP,file.DateUpload,file.FileClass, file.TimeUpload, user.Username, user.userID ,file.Status FROM file INNER JOIN user on user.UserID = file.UserID  WHERE (file.DateUpload > DATE_SUB(CURDATE(), INTERVAL 7 DAY) or file.DateUpload = CURDATE()) AND (user.UserID != '".$IuserID."'AND file.FileClass='WLAP') ORDER BY file.DateUpload ASC ";
				  $result4 = mysqli_query($conn,$sql4);
        ?>

		<script>
		<?php while ($pdf = mysqli_fetch_object($result1)){?>
						PDFObject.embed(<?php echo "\"pdf/Syllabus/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->Week_num_for_WLAP; echo $pdf->CourseCode;echo $pdf->FileClass;?>");
		<?php }?>
		<?php while ($pdf = mysqli_fetch_object($result2)){?>
						PDFObject.embed(<?php echo "\"pdf/WLAP/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->Week_num_for_WLAP; echo $pdf->CourseCode;echo $pdf->FileClass;?>");
		<?php }?>
		<?php while ($pdf = mysqli_fetch_object($result3)){?>
						PDFObject.embed(<?php echo "\"pdf/Syllabus/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->Week_num_for_WLAP; echo $pdf->CourseCode;echo $pdf->FileClass;?>");
		<?php }?>
		<?php while ($pdf = mysqli_fetch_object($result4)){?>
						PDFObject.embed(<?php echo "\"pdf/WLAP/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->Week_num_for_WLAP; echo $pdf->CourseCode;echo $pdf->FileClass;?>");
		<?php }?>
		</script>
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
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

	</body>

</html>
