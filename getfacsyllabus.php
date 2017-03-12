<?php


    require("database.php");
    require("session.php");

?>

<!DOCTYPE html>
<html>
<head>
<style>
.container-pdf * > .modal-body{
  width:100%;
  height: calc(100vh - 125px);

}
.pdfobject-container{
  width:100%;
  height: calc(100vh - 155px);
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
require("database.php");


$sql="Select distinct T.CourseOrder,T.CourseName,T.CourseCode,T.UserID from (Select distinct c.CourseOrder,c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE T.CourseCode ='".$q."'  ORDER by CourseName";
$result1 = mysqli_query($conn,$sql);

?>

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
<div class="tab-content">

</div>
<?php
$q = $_GET['q'];
              require ("database.php");
              $sql="Select CourseCode FROM file WHERE Week_num_for_WLAP=0 AND CourseCode ='".$q."'";
              $result2 = mysqli_query($conn,$sql);
              ?>

<!-- Popup view of Syllabus -->
<div class="container-pdf">
<?php while ($course = mysqli_fetch_object($result2)){?>
  <div class="modal fade" id="modal_viewSyllabu1s<?php echo $course->CourseCode ?>" role="dialog">
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
                      $q = $_GET['q'];
         		          require ("database.php");
         		          $sql="Select CourseCode FROM file WHERE Week_num_for_WLAP=0 AND CourseCode ='".$q."'";
        		          $result2 = mysqli_query($conn,$sql);
                  	  ?>

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

  <?php
                $q = $_GET['q'];
                require ("database.php");
                $sql="Select FileName, CourseCode FROM file WHERE Week_num_for_WLAP=0 AND CourseCode ='".$q."'";
                $result3 = mysqli_query($conn,$sql);
          ?>
      <script>
      <?php while ($pdf = mysqli_fetch_object($result3)){?>
              PDFObject.embed(<?php echo "\"pdf/Syllabus/"; echo $pdf->FileName ; echo ".pdf\"";?>, "#pdf-container<?php echo $pdf->CourseCode;?>");
      <?php }?>
      </script>

      <!-- PDFObject Location to Read and View PDF -->


<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<script src="js/customJS.js"></script>
<!-- PDFObject Location to Read and View PDF -->




</body>
</html>
