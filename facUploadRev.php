<?php
if(isset($_POST['btnSubmit'])){
  include 'configtest.php';
  $upload_dir = "testUploads/";
  $upload_loc = $_FILES['fileToUpload']['tmp_name'];
  $upload_file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
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

    if(move_uploaded_file($upload_loc,$upload_dir.$final_file))
    {
     $sql="INSERT INTO file_upload(name,type,size) VALUES('$final_file','$fileType','$new_size')";
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

<!DOCTYPE html>
<html>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
      <h3>Upload a revision of file</h3>
      <input type="file" name="fileToUpload" />
      <button type="submit" name="btnSubmit">Upload</button>
    </form>
</body>
</html>
