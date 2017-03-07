<?php
$path = "pdf/Syllabus/"; // change the path to fit your websites document structure

$dl_file = $_GET['down'];
$fullPath = $path.$dl_file;

if (file_exists($path.$dl_file)){
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
}
else{
  ?>
  <script>
    alert('Sorry. This file does not exists!.');
    window.location.href='facSyllabus.php';
  </script>
   <?php
 }
 fclose ($fd);
 exit;
?>
