<?php

    require("database.php");

    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['login'])) {
        if (empty($_POST['Username']) || empty($_POST['Password'])) {
            $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $Vusername=$_POST['Username'];
            $Vpassword=$_POST['Password'];
            // SQL query to fetch information of registerd users and finds user match.
            $sql="SELECT count(*) AS Total FROM user WHERE Username = '".$Vusername."' AND Password = '".$Vpassword."'AND TypeofUserNum = 2";
            $res = mysqli_query($conn,$sql);
            while ($userdata = mysqli_fetch_array($res)) {
                $total = $userdata['Total'];

            }
            if ($total == 1) {
                $_SESSION['login_admin']=$Vusername; // Initializing Session
                echo    "<script>
                            alert('Access Granted!');
                            window.location.href='sessionadmin.php';
                        </script>";
            }
			else{
                echo    "<script>
                            alert('Access Denied. Incorrect Username or Password');
                            window.location.href='adminLogin.php';
                        </script>";
            }


        }
    }
?>
