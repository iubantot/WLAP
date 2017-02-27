<?php
	require("database.php");
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_admin'];
	// SQL Query To Fetch Complete Information Of User
	$sql="SELECT user.Username,user.UserID,user.FirstName,user.LastName,LEFT(user.MiddleName,1) as 'MiddleName',user.ContactNum,user.Email,user.TypeofUserNum FROM user  WHERE user.Username ='".$user_check."'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$login_session = $row['Username'];
	$vcontactnum = $row['ContactNum'];
	$vemail = $row['Email'];

	$vFirstName = $row['FirstName'];
	$vLastName = $row['LastName'];
	$vMiddleName = $row['MiddleName'];
	$fkTypeofUserNum = $row['TypeofUserNum'];

	$IuserID = $row['UserID'];


	if(!isset($login_session)){
		mysqli_close($connection); // Closing Connection
		header('Location: adminLogin.php'); // Redirecting To Home Page
	}
?>
