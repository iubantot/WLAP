<?php
  include ('configtest.php');
  $get_file_name = $_GET['id'];
  $get_file_week = $_GET['week'];
  if(isset($_POST['submitbtn'])){
  $dir = "pdf/WLAP/";
  $file_name = $get_file_name;
    $type= ".pdf";
  $target_file = $dir . basename($_FILES["fileUpload"]["name"]);
  $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
  $file_size = $_FILES["fileUpload"]["size"];
  $file_loc = $_FILES['fileUpload']['tmp_name'];
  $class = "WLAP";
  $week = $get_file_week;
  $stat = "Approved";
  $date= date('Y-m-d');
  $time = date("h:i");
  $time1 = date('h:i A', strtotime($time));
  $get_coursecode =  $_GET['coursecode'];

  if ($file_type != "pdf"){ ?> <!--To check the file extension-->
    <script>
      alert('The file is not in a pdf format. Save the file first as pdf file then try upload again.');
      window.location.href="adminWLAP.php";
    </script>
  <?php
  }

  else{
    $new_size = $file_size/1024; //to convert to kb
 require ("sessionadmin.php");
    if(move_uploaded_file($file_loc,$dir.$file_name.$type)){




      $sql="UPDATE file SET FileSize = '$new_size', DateUpload= '$date', TimeUpload= '$time1',UserID= '$IuserID' WHERE FileName = '$file_name' AND Status = '$stat' ";
      $query = mysqli_query($conn,$sql);

      if($query){

        echo "<script>
          alert('Successfuly uploaded.');
          window.location.href='adminWLAP.php';
        </script>";



      }
      ?>

    <?php }
    else{ ?>
      <script>
        alert('Error while uploading the file.');
        window.location.href="adminWLAP.php";
      </script>
    <?php }
  }
  }
  ?>
