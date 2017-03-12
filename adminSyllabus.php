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
      .btnPos {
              padding-left: 100px;
              padding-right: 100px;
              padding-bottom: 20px;
              text-align:center;
            }
            .inputFile {
              position: absolute;
              opacity: 0;
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
						<h2 class="page-header">Syllabus</h>
              <span class="pull-right" style="margin-top:-20px;">
              <button type="submit" name="submitbtn" class="btn btn-sub" data-toggle="modal" data-target="#modal_upload" id="up">Add Syllabus</button>
              </span>
					</div>
					<!-- /.col-lg-12 -->
				</div>

				<div class="row">
					<div class="col-lg-7">
						<div class="panel panel-green">
							<div class="panel-heading">
								<i class="fa fa-search fa-fw"></i>&nbsp; Search Syllabus

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

                  <?php
								$t=date('d-m-Y');
								$p=date("D",strtotime($t));
								require ("database.php");
								$sql="Select distinct c.CourseName,s.CourseCode from schedule s INNER JOIN course c ON c.CourseCode = s.CourseCode WHERE s.userID = '".$IuserID."' ORDER by c.CourseName ";
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
													<td id="desc">
														<a data-toggle="modal" data-target="#modal_viewSyllabus<?php echo $course->CourseCode ?>" id="down"><?php echo $course->CourseName;?></a>
													</td>
													<td>
														<a href="DownloadFileAdminSylab.php?down=<?php echo $course->CourseCode; ?>.pdf" id="down"><i class="fa fa-download fa-fw"></i>Download</a>
													</td>
												</tr>
                         <?php } ?>
											</tbody>
										</table>
									</div>
                  <?php
                  $t=date('d-m-Y');
                  $p=date("D",strtotime($t));
                  require ("database.php");
                  $sql="Select distinct T.CourseName,T.CourseCode,T.UserID from (Select distinct c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE T.UserID !='".$IuserID."' or T.UserID is NULL  ORDER by CourseName";
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

                      <br>
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
													<td id="desc">
														<a data-toggle="modal" data-target="#modal_viewSyllabus<?php echo $othercourses->CourseCode;?>" id="down"><?php echo $othercourses->CourseName;?></a>
													</td>
													<td>
                            	<a href="DownloadFileAdminSylab.php?down=<?php echo $othercourses->CourseCode;?>_Syllabus.pdf" id="down"><i class="fa fa-download fa-fw"></i>Download</a>
													</td>
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
				</div>
				<!-- /.row -->

        <?php
         		          require ("database.php");
         		          $sql="Select CourseCode FROM file WHERE Week_num_for_WLAP=0 ";
        		          $result2 = mysqli_query($conn,$sql);
                  	  ?>

				<!-- Popup view of Syllabus -->
        <div class="container-pdf">
 		<?php while ($course = mysqli_fetch_object($result2)){?>
 					<div class="modal fade" id="modal_viewSyllabus<?php echo $course->CourseCode ?>" role="dialog">
 						<div class="modal-dialog modal-lg">
 						  <!-- Modal content-->
 						  <div class="modal-content">
 							<div class="modal-header">

 							  <button type="button" class="close" data-dismiss="modal">&times;</button>
 							  <h4 class="modal-title"><?php echo $course->CourseCode ?> - Syllabus</h4>
 							</div>
 							<div class="modal-body">
 								<div id="pdf-container<?php echo $course->CourseCode?>"></div> <!--contrainer for view pdf -->
 							</div>

 							<!-- /#modal-body -->
 					 	</div>
 					  	<!-- /#modal-content -->
					</div>
        </div>
          <?php }?>
        </div>
				<?php
		          require ("database.php");
		          $sql="Select CourseCode FROM file WHERE Week_num_for_WLAP=0 ";
		          $result2 = mysqli_query($conn,$sql);
         	  ?>

				<!-- Popup view of Syllabus -->
				<div class="container-pdf">
		<?php while ($course = mysqli_fetch_object($result2)){?>
					<div class="modal fade" id="modal_viewSyllabus<?php echo $course->CourseCode ?>" role="dialog">
						<div class="modal-dialog modal-lg">
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">

							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title"><?php echo $course->CourseCode ?> - Syllabus</h4>
							</div>
							<div class="modal-body">
								<div id="pdf-container<?php echo $course->CourseCode?>"></div> <!--contrainer for view pdf -->
							</div>

							<!-- /#modal-body -->
					 	</div>
					  	<!-- /#modal-content -->
					</div>
				</div>
		<?php }?>
			</div>
      <!-- Popup view of Syllabus -->
      <div class="container-pdf">
  <?php while ($course = mysqli_fetch_object($result2)){?>
        <div class="modal fade" id="modal_viewSyllabus1<?php echo $course->CourseCode ?>" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><?php echo $course->CourseCode ?> - Syllabus</h4>
            </div>
            <div class="modal-body">
              <div id="pdf-container<?php echo $course->CourseCode?>"></div> <!--contrainer for view pdf -->
            </div>

            <!-- /#modal-body -->
          </div>
            <!-- /#modal-content -->
        </div>
      </div>
  <?php }?>
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


          <!-- Popup view of Upload -->

          <div class="modal fade" id="modal_upload" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Syllabus</h4>
              </div>
              <div class="modal-body" style="height: 550px;"><br>
                  <form action="UploadFileProcSyllabus.php" method="post" enctype="multipart/form-data">
                    <h3>Add a new Syllabus</h3>
                    Course:&nbsp;
                    <?php
                    require ("database.php");
                    $sql="Select T.CourseCode,T.FileClass from (Select c.CourseCode,f.FileClass from file f RIGHT JOIN course c ON c.CourseCode = f.CourseCode WHERE f.FileClass='Syllabus' OR f.FileClass is NULL )AS T WHERE T.FileClass is NULL ORDER by T.CourseCode ";
                    $course = mysqli_query($conn,$sql);

                    ?>
                    <select class="form-control" id="courseCode" name="code" style="width:125px;" >
<?php while ($coursecode = mysqli_fetch_object($course)){?>


                      <option><?php echo  $coursecode->CourseCode; ?> </option>


                        <?php } ?>
                      </select> <br>
                    <div class="btnPos">
                  <label class="btn btn-sub">
                    <span id="input-value">Choose file</span>
                    <input type="file" name="fileUpload" class="inputFile" id="inFile"/>
                  </label>
                </div>
                  <span class="pull-right" style="margin-top:-20px;">
                  <button type="submit" name="submitbtn" class="btn btn-sub">Upload</button>
                  </span>
                  </form>
                  <script>
                    document.getElementById('inFile').addEventListener('change', function(){
                      myFunction();
                    });
                    function myFunction(){
                        var inputVal = document.getElementById('inFile').value;
                        document.getElementById('input-value').innerHTML=inputVal.substr(12);
                    }
                  </script>

                  <br> <br><p>The format of the file should be pdf.</p>
                  <p>The file will be renamed as (CourseCode)_Syllabus.pdf</p>
                  <?php
                  date_default_timezone_set('asia/manila');
                  $date=date('d-m-Y');
                  $time = date("h:i");
                  ?>
                  <span class="pull-left text-muted small" style="display:block;">
                      Added on <?php echo date('h:i A', strtotime($time))?>  | <?php echo date('F d Y', strtotime($date));?>
                  </span>
              </div>
              <!-- /#modal-body -->
              </div>
              <!-- /#modal-content -->

          </div>
        </div>

          <!-- /#Popup window -->


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

		<!-- PDFObject JavaScript -->
		<script src="js/pdfobject.min.js"></script>

		<script src="js/customJS.js"></script>

		<!-- PDFObject Location to Read and View PDF -->

		<?php
		          require ("database.php");
		          $sql="Select FileName, CourseCode FROM file WHERE Week_num_for_WLAP=0 ";
		          $result3 = mysqli_query($conn,$sql);
        ?>
		<script>
		<?php while ($pdf = mysqli_fetch_object($result3)){?>
						PDFObject.embed(<?php echo "\"pdf/Syllabus/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->CourseCode;?>");
		<?php }?>
		</script>

    <!-- PDFObject Location to Read and View PDF -->

        <?php
                  require ("database.php");
                  $sql="Select FileName, CourseCode FROM file WHERE Week_num_for_WLAP=0 ";
                  $result3 = mysqli_query($conn,$sql);
             ?>
        <script>
        <?php while ($pdf = mysqli_fetch_object($result3)){?>
                PDFObject.embed(<?php echo "\"pdf/Syllabus/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->CourseCode;?>");
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
            xmlhttp.open("GET","getsyllabus.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>

	</body>

</html>
