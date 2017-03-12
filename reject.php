<?php
      require("sessionadmin.php");
    require("database.php");

    $error=''; // Variable To Store Error Message

            // Define $file
            $file=$_GET['id'];

            // SQL query to update status
            $sql="UPDATE File SET Status='Rejected' WHERE FileID = '".$file."'";
            $res = mysqli_query($conn,$sql);
            if($res){

              echo    "<script>
                              window.location.href='adminHome.php';
                          </script>";



      }

      else {
        echo "Error :" .$sql. "<br>".mysqli_error($conn);

      }

mysqli_close($conn);




?>
