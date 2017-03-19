<?php
      require("sessionadmin.php");
    require("database.php");

    $error=''; // Variable To Store Error Message

            // Define $file
            $file=$_GET['id'];
            $user=$_GET['userid'];
            date_default_timezone_set('asia/manila');
            $date= date('Y-m-d');

            $time = date("h:i");
            $time1 = date('h:i A', strtotime($time));

            // SQL query to update status




            $sql2="Select FileName FROM file WHERE FileID = '".$file."'";
            $file1 = mysqli_query($conn,$sql2);



              if ($fileUP = mysqli_fetch_object($file1)){




                $sql = "UPDATE file SET DateUpload= '".$date."', TimeUpload= '".$time1."', UserID= '".$user."' WHERE FileName = '".$fileUP->FileName."' AND Status ='Approved' ";
                $sql1= "DELETE FROM file WHERE FileID= '".$file."'";
                $file2 = mysqli_query($conn,$sql);
                $file3 = mysqli_query($conn,$sql1);





                $file_pend = "pdf_pend/".$fileUP->FileName.".pdf";
                $file_up = "pdf/WLAP/".$fileUP->FileName.".pdf";
                rename("$file_pend","$file_up");

                echo    "<script>
                            alert('The file has been updated . All of the professor has been notified');
                            window.location.href='adminHome.php';
                        </script>";






  }






mysqli_close($conn);




?>
