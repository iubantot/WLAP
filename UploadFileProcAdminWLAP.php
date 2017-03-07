<?php
  include ('configtest.php');
  $get_file_name = $_GET['id'];
  if(isset($_POST['submitbtn'])){
  $dir = "pdf_pend/";
  $file_name = $dir.$get_file_name.".pdf";
  $target_file = $dir . basename($_FILES["fileUpload"]["name"]);
  $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
  $file_size = $_FILES["fileUpload"]["size"];
  $file_loc = $_FILES['fileUpload']['tmp_name'];
  $class = "WLAP";
  $week = 1;
  $stat = "pending";

  if ($file_type != "pdf"){ ?> <!--To check the file extension-->
    <script>
      alert('The file is not in a pdf format. Save the file first as pdf file then try upload again.');
      window.location.href="adminWLAP.php";
    </script>
  <?php
  }

  else{
    $new_size = $file_size/1024; //to convert to kb

    if(move_uploaded_file($file_loc,$file_name)){
      /*$sql="INSERT INTO file(FileName,FileSize,FileClass,Week_num_for_WLAP,Status) VALUES('$file_name','$new_size','$class','$week', '$stat')";
      mysql_query($sql);*/
      ?>
        <script>
          alert('Successfuly uploaded!.');
          window.location.href="adminWLAP.php";
        </script>
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
