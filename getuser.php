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


$sql="Select c.CourseName,s.CourseCode,s.ScheduleDay,s.ScheduleTimeIN,s.ScheduleTimeOUT,s.Section,s.Room from schedule s INNER JOIN course c ON c.CourseCode = s.CourseCode WHERE s.userID = '".$IuserID."'	  AND s.ScheduleDay = '".$q."' ORDER by c.CourseName ";
$result1 = mysqli_query($conn,$sql);

?>

<table class="table table-scroll table-striped" >
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
