<?php
      require("sessionadmin.php");
    require("database.php");

    $error=''; // Variable To Store Error Message

            // Define $file
            $file=$_GET['id'];

            // SQL query to update status
            $sql="UPDATE File SET Status='Rejected' WHERE FileID = '".$file."'";
            $res = mysqli_query($conn,$sql);
            $sql="Select FileName FROM file WHERE FileID = '".$file."' AND FileClass='WLAP'";
            $file = mysqli_query($conn,$sql);

            if($res){
              if($fileNO = mysqli_fetch_object($file)){
                $file_pend = "pdf_pend/".$fileNO->FileName;
                $file_reject = "pdf_reject/".$fileNO->FileName;
                rename("$file_pend","$file_reject");
                echo    "<script>
                              alert('The file has been rejected. It will notify the concern professor.');
                              window.location.href='adminHome.php';
                          </script>";



      }}

      else {
        echo "Error :" .$sql. "<br>".mysqli_error($conn);

      }

mysqli_close($conn);




?>
