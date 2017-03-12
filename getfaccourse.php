<?php


    require("database.php");
    require("session.php");

?>

<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$q = $_GET['q'];
require("database.php");


$sql="Select distinct T.CourseOrder,T.CourseName,T.CourseCode,T.UserID from (Select distinct c.CourseOrder,c.CourseName,c.CourseCode,s.UserID from schedule s RIGHT JOIN course c ON c.CourseCode = s.CourseCode )AS T WHERE (T.UserID !='".$IuserID."' or T.UserID is NULL) AND T.CourseCode ='".$q."'  ORDER by CourseName";
$result1 = mysqli_query($conn,$sql);

?>

<table class="table table-scroll table-striped" >
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
<div class="tab-content">

</div>

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
