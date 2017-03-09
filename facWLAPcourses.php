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
									<form class="navbar-form">
										<div class="form-group">
										  <input type="text" placeholder="Search for..." class="form-control">
										</div>
									</form>
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
    											<td><a href="facWLAPcourses.php?id=<?php echo $course->CourseOrder;?>">View list</a></td>
    										</tr>
                             <?php } ?>
											</tbody>
										</table>
									</div>
									<?php

                  $t=date('d-m-Y');
                  $p=date("D",strtotime($t));
                  require ("database.php");
                  $sql="Select distinct T.CourseOrder,T.CourseName,T.CourseCode,T.UserID from (Select distinct c.CourseOrder,c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE T.UserID is NULL ORDER by CourseName";
                  $result1 = mysqli_query($conn,$sql);

                   ?>
									<div class="tab-pane fade" id="other">
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
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-6 -->

					<div class="col-lg-4">
            <!-- WLAP List of My Courses -->
          <?php
          $courseorder=$_GET['id'];
          require ("database.php");
          $sql="Select CourseCode from course WHERE CourseOrder = '".$courseorder."'";
          $result1 = mysqli_query($conn,$sql);
          $sql="Select file.FileName, file.CourseCode, file.Week_num_for_WLAP from file INNER JOIN course ON file.CourseCode=course.CourseCode WHERE CourseOrder = '".$courseorder."' AND file.FileClass='WLAP'";
          $result5 = mysqli_query($conn,$sql);

           ?>
            <div class="panel panel-green" id="WLAPList">
              <?php while ($course = mysqli_fetch_object($result1)){?>
              <div class="panel-heading" id="code">
              <?php echo $course->CourseCode;?> WLAP List
              </div>
              <?php } ?>
              <!-- /.panel-heading -->

              <div class="panel-body" style="overflow-y:auto; height:415px;">
                <div class="list-group">
                <?php while ($weeks = mysqli_fetch_object($result5)){ ?>
                  <span href="#" class="list-group-item">
                    <a data-toggle="modal" data-target="#modal_viewWLAP<?php echo $weeks->Week_num_for_WLAP;?>" id="week" href="">Week <?php echo $weeks->Week_num_for_WLAP;?></a>
                    <a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-cog fa-fw"></i><i class="fa fa-caret-down fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="DownloadFileWLAP.php?down=<?php echo $weeks->FileName; ?>.pdf" id="down"><i class="fa fa-download fa-fw"></i>Download</a></li>
                      <li><a data-toggle="modal" data-target="#modal_upload<?php echo $weeks->FileName;?>" id="up"><i class="fa fa-upload fa-fw"></i>Upload Revision</a></li>
                      <li><a data-toggle="modal" data-target="#modal_remarks" id="rem"><i class="fa fa-pencil-square-o fa-fw"></i>Add Remarks</a></li>
                    </ul>
                  </span>
                 <?php } ?>
                </div>
              </div>
              <!-- /.panel-body -->
            </div>
						<!-- /.panel -->

						<!-- WLAP List of Other Courses -->
						<div class="panel panel-green"  style="display:none;"  id="WLAPList2">
							<div class="panel-heading" id="code">
								CPE 501 WLAP List
							</div>
							<!-- /.panel-heading -->

							<div class="panel-body" style="overflow-y:auto; height:415px;">
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="list-group">
										<span href="#" class="list-group-item">
											<a data-toggle="modal" data-target="#modal_viewWLAP" id="week">Week 1</a>
											<a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												<i class="fa fa-cog fa-fw"></i><i class="fa fa-caret-down fa-fw"></i>
											</a>
											<ul class="dropdown-menu">
												<li><a onclick="" id="down"><i class="fa fa-download fa-fw"></i>Download</a></li>
											</ul>
										</span>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->

					</div>
					<!-- /.col-lg-4 -->

				</div>
				<!-- /.row -->
			<?php
		          $courseorder=$_GET['id'];
		          require ("database.php");
		          $sql="Select file.CourseCode, file.Week_num_for_WLAP from file INNER JOIN course ON file.CourseCode=course.CourseCode WHERE CourseOrder = '".$courseorder."' AND file.FileClass='WLAP'";
		          $result2 = mysqli_query($conn,$sql);
         	  ?>

				<!-- Popup for remarks -->

			<div class="container-pdf">
	<?php while ($course = mysqli_fetch_object($result2)){?>
				<div class="modal fade" id="modal_viewWLAP<?php echo $course->Week_num_for_WLAP;?>" role="dialog">
					<div class="modal-dialog modal-lg">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title"><?php echo $course->CourseCode ?>- Week <?php echo $course->Week_num_for_WLAP;?></h4>
						</div>
						<div class="modal-body">
							<div id="pdf-container<?php echo $course->Week_num_for_WLAP;?>"></div>
						</div>
					  </div>
					</div>
				</div>
				<?php }?>
			</div>

				<!-- /#Popup window -->

          <?php
          $courseorder=$_GET['id'];
          require ("database.php");
          $sql="Select CourseCode from course WHERE CourseOrder = '".$courseorder."'";
          $result2 = mysqli_query($conn,$sql);
           ?>
				<!-- Popup view of WLAP -->
				<div class="modal fade" id="modal_remarks" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
              <?php
              while ($course = mysqli_fetch_object($result2)){?>
  						  <button type="button" class="close" data-dismiss="modal">&times;</button>
  						  <h4 class="modal-title"><?php echo $course->CourseCode; ?>- Week 1 Remarks</h4>
              <?php }?>
						</div>
						<div class="modal-body" style="height: 350px;"><br>
							<div class="form-group">
								Add remarks here:
								<textarea class="form-control" rows="6" id="comment"></textarea>
							</div>

							<span class="pull-right" style="margin-top:-20px;">
								<button href="facHome.php" class="btn btn-sub"><b>Submit</b></button>
							</span>
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


        <?php
        $courseorder=$_GET['id'];
        require ("database.php");
        $sql="Select file.FileName, file.CourseCode, file.Week_num_for_WLAP from file INNER JOIN course ON file.CourseCode=course.CourseCode WHERE CourseOrder = '".$courseorder."' AND file.FileClass='WLAP'";
        $result5 = mysqli_query($conn,$sql);
        ?>

          <!-- Popup view of Upload -->
          <?php while($file = mysqli_fetch_object($result5)){ ?>
          <div class="modal fade" id="modal_upload<?php echo $file->FileName;?>" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo $file->CourseCode; ?>- Upload File</h4>
              </div>
              <div class="modal-body" style="height: 350px;"><br>
                  <form action="UploadFileProcWLAP.php?id=<?php echo $file->FileName;?>.pdf&week=<?php echo $file->Week_num_for_WLAP;?> " method="post" enctype="multipart/form-data">
                    <h3>Upload a revision of file</h3>
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
                  <p>The format of the file should be pdf.</p>
                  <p>The file will be renamed as <?php echo $file->FileName; ?>.pdf</p>
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
          <!-- /#Popup window -->
        </div>
        <?php } ?>
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
		          $courseorder=$_GET['id'];
		          require ("database.php");
		          $sql="Select FileName, Week_num_for_WLAP from file INNER JOIN course ON file.CourseCode=course.CourseCode WHERE course.CourseOrder = '".$courseorder."' AND file.FileClass='WLAP'";
		          $result3 = mysqli_query($conn,$sql);
        ?>

		<script>
		<?php while ($pdf = mysqli_fetch_object($result3)){?>
						PDFObject.embed(<?php echo "\"pdf/WLAP/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->Week_num_for_WLAP;?>");
		<?php }?>
		</script>

	</body>

</html>
