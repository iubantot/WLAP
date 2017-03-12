<?php
      require("sessionadmin.php");
    require("database.php");

    $error=''; // Variable To Store Error Message

            // Define $file
            $file=$_GET['id'];

            // SQL query to update status
            $sql="UPDATE File SET Status='Approved' WHERE FileID = '".$file."'";
            $res = mysqli_query($conn,$sql);
            $sql="Select FileName FROM file WHERE FileID = '".$file."' AND FileClass='WLAP'";
            $file = mysqli_query($conn,$sql);

            if($res){
              if($fileUP = mysqli_fetch_object($file)){
                $file_pend = "pdf_pend/".$fileUP->FileName;
                $file_up = "pdf/WLAP/".$fileUP->FileName;
                rename("$file_pend","$file_up");
                echo    "<script>
                              alert('The file has been updated . All of the professor has been notified');
                              window.location.href='adminHome.php';
                          </script>";
      }}

      else {
        echo "Error :" .$sql. "<br>".mysqli_error($conn);

      }

mysqli_close($conn);




?>
