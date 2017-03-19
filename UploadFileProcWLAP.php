<?php
  include ('database.php');

  $get_file_name = $_GET['id'];
  $get_file_week = $_GET['week'];
  $get_coursecode =  $_GET['coursecode'];
  if(isset($_POST['submitbtn'])){
  $dir = "pdf_pend/";
  $type= ".pdf";
  $file_name = $get_file_name;
  $target_file = $dir . basename($_FILES["fileUpload"]["name"]);
  $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
  $file_size = $_FILES["fileUpload"]["size"];
  $file_loc = $_FILES['fileUpload']['tmp_name'];
  $class = "WLAP";
  $week = $get_file_week;
  $stat = "Pending";
  date_default_timezone_set('asia/manila');
  $date= date('Y-m-d');
  $time = date("h:i");
  $time1 = date('h:i A', strtotime($time));
  if ($file_type != "pdf"){ ?> <!--To check the file extension-->
    <script>
      alert('The file is not in a pdf format. Save the file first as pdf file then try upload again.');
      window.location.href="facWLAP.php";
    </script>
  <?php
  }

  else{
    $new_size = $file_size/1024; //to convert to kb
 require ("session.php");
  if(move_uploaded_file($file_loc,$dir.$file_name.$type)){

      $sql="INSERT INTO file(FileType,FileName,FileSize,FileClass,DateUpload,TimeUpload,Week_num_for_WLAP,Status,CourseCode,UserID) VALUES('pdf','$file_name','$new_size','$class','$date','$time1','$week','$stat','$get_coursecode','$IuserID')";
      $query = mysqli_query($conn,$sql);

      if($query){

        echo "<script>
          alert('Successfuly uploaded.');
          window.location.href='facWLAP.php';
        </script>";



      }
      ?>

    <?php }
    else{ ?>
      <script>
        alert('Error while uploading the file.');
        window.location.href="facWLAP.php";
      </script>
    <?php }
  }
}
?>
