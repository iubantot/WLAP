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
                    window.location.href='addPatient.php?id=<?php echo $hospital;?>';
                </script>";
      }

    }

    mysqli_close($conn);
?>
