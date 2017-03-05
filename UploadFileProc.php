<?php
if(isset($_POST['submitbtn'])){
  include ("configtest.php");
  $upload_dir = "UploadedFile/";
  $upload_loc = $_FILES['fileToUpload']['tmp_name'];
  $upload_file = rand(1000,100000)."-".$_FILES['file']['name'];
  $upload_size = $_FILES['fileToUpload']['size'];
  $fileType = pathinfo($upload_file,PATHINFO_EXTENSION);
  //to check if the file is a word document/pdf document
  if($fileType != "doc" && $fileType != "docx" && $fileType != "dot" && $fileType != "pdf"){
?>
    <script>
    alert('Sorry. This file is not a word or pdf file.');
          window.location.href='facWLAP.php';
    </script>
    <?php
  }
  else {
    $new_size = $upload_size/1024;
    $new_file_name = strtolower($upload_file);
    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
     $sql="INSERT INTO file(FileType, FileName, FileSize) VALUES('$fileType', '$final_file', '$new_size')";
     mysql_query($sql);
     ?>
     <script>
     alert('successfully uploaded');
          window.location.href='facWLAP.php';
           </script>
     <?php
    }
    else
    {
     ?>
     <script>
     alert('error while uploading file');
          window.location.href='facWLAP.php';
           </script>
     <?php
    }
   }
 }
?>
