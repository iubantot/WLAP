<?php
require 'session.php';
require 'database.php';

if(isset($_POST['remarks'])){


  $remarks = $_POST['textremarks'];
    $fileid = $_GET['fileid'];
    date_default_timezone_set('asia/manila');
    $date=date('d-m-Y');
    $time = date("h:i");
$time1 = date('h:i A', strtotime($time));
$date1 = date('F d Y', strtotime($date));
$courseorder = $_GET['courseorder'];









  if($remarks != ""){



    $sql = "INSERT INTO remarks (Remarks,Date_Added,Time_Added,FileID,UserID) VALUES ('$remarks', '$date1', '$time1', '$fileid','$IuserID')";


      $query = mysqli_query($conn,$sql);

      if($query){

        echo "<script>
                    alert('Noted!');
                    window.location.href='facWLAPcourses.php?id=$courseorder';
                </script>";



      }

      else {
        echo "Error :" .$sql. "<br>".mysqli_error($conn);

      }


      }

      else{
        echo "<script>
                    alert('please fill-out all fields!');
                    window.location.href='facWLAPcourses.php?id=$courseorder';
                </script>";
      }

    }
    else if(isset($_POST['remarksother'])){


      $remarks = $_POST['textremarks'];
        $fileid = $_GET['fileid'];
        date_default_timezone_set('asia/manila');
        $date=date('d-m-Y');
        $time = date("h:i");
    $time1 = date('h:i A', strtotime($time));
    $date1 = date('F d Y', strtotime($date));
    $courseorder = $_GET['courseorder'];









      if($remarks != ""){



        $sql = "INSERT INTO remarks (Remarks,Date_Added,Time_Added,FileID,UserID) VALUES ('$remarks', '$date1', '$time1', '$fileid','$IuserID')";


          $query = mysqli_query($conn,$sql);

          if($query){

            echo "<script>
                        alert('Noted!');
                        window.location.href='facWLAPothercourses.php?id=$courseorder';
                    </script>";



          }

          else {
            echo "Error :" .$sql. "<br>".mysqli_error($conn);

          }


          }

          else{
            echo "<script>
                        alert('please fill-out all fields!');
                        window.location.href='facWLAPothercourses.php?id=$courseorder';
                    </script>";
          }

        }

        mysqli_close($conn);
    ?>
