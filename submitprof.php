<?php
require 'sessionadmin.php';
require 'database.php';

if(isset($_POST['submit'])){

  $lastname = $_POST['LN'];
  $firstname = $_POST['FN'];
  $middlename = $_POST['MN'];
  $number = $_POST['cnumber'];
  $email = $_POST['email'];
  $arr = explode(' ',trim($firstname));
  $username = strtolower(substr($arr[0], 0, 1)) . strtolower(substr($arr[1], 0, 1)) .strtolower(substr($middlename, 0, 1)) .  strtolower($lastname);









  if(($lastname != "") && ($firstname != "") && ($number != "")){



    $sql = "INSERT INTO user (LastName,FirstName,MiddleName,ContactNum,Email,Username,Password,TypeofUserNum,ImageName) VALUES ('$lastname', '$firstname', '$middlename', '$number', '$email', '$username','$lastname', '1','img/black.png')";


      $query = mysqli_query($conn,$sql);

      if($query){

        echo "<script>
                    alert('The Faculty has been added. Welcome To CPE Department !');
                    window.location.href='adminFacultyMgmt.php';
                </script>";



      }

      else {
        echo "Error :" .$sql. "<br>".mysqli_error($conn);

      }


      }

      else{
        echo "<script>
                    alert('please fill-out all fields!');
                    window.location.href='adminFacultyMgmtSchedule.php?id=<?php echo $userID;?>';
                </script>";
      }

    }
    else if(isset($_POST['submitschedule'])){

        $coursecode = $_POST['code'];
        $section = $_POST['section'];
        $day = $_POST['day'];
        $time = $_POST['timeIN'];
        $time2 = $_POST['timeOUT'];
        $room = $_POST['room'];
        $user = $_GET['userid'];
        $start= date('h:i a ', strtotime($time));
        $end= date('h:i a ', strtotime($time2));









        if(($coursecode != "") && ($section != "") && ($day != "")){



          $sql2 = "INSERT INTO schedule (ScheduleDay,ScheduleTimeIN,ScheduleTimeOUT,Section,Room,CourseCode,UserID) VALUES ('$day', '$start', '$end', '$section', '$room','$coursecode','$user')";


            $query2 = mysqli_query($conn,$sql2);

            if($query2){

              echo "<script>
                          alert('The Schedule has been added !');
                          window.location.href='adminAddSchedule.php?userid=$user';
                      </script>";



            }

            else {
              echo "Error :" .$sql. "<br>".mysqli_error($conn);

            }


            }

            else{
              echo "<script>
                          alert('please fill-out all fields!');
                          window.location.href='adminAddSchedule.php?userid=$user';
                      </script>";
            }

    }
    elseif(isset($_POST['remarks'])){


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
