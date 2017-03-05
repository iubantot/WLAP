<?php
include ("configtest.php");
if(isset($_POST['submitbtn'])){
  $up_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['id']); // simple file name validation
  $up_file = filter_var($up_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
  $dir = "UploadedFile/";
  $file = $up_file."-".;
  $file_size = $_FILES['fileToUpload']['size'];
  $file_type = $_FILES['file']['type'];
  $file_loc = $_FILES['fileToUpload']['tmp_name'];

  if($file_type != "pdf"){ //to check if the file was a pdf file ?>
    <script>
      alert('The file was not a pdf file.');
      window.location.href = 'facWLAP.php';
    </script>
  <?php }
  else{
    $new_size = $file_size/1024; //convert size to kb

    if(move_uploaded_file($file_loc,$dir.$file)){
      $sql = "INSERT INTO file()"//PAAYOS NALANG NUN QUERY DTO HAHAHA
      mysql_query($sql);
      ?>
      <script>
        alert('File uploaded succesfully.');
        window.location.href = 'facWLAP.php'; 
      </script>
    <?php }

    else{ ?>
      <script>
        alert('Error while uploading the file.');
        window.location.href = 'facWLAP.php';
      </script>
    <?php }
  }
}
?>
