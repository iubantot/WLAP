<?php
	require("database.php");
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$sql="SELECT account.AccountID,account.Username,user.UserID,user.FirstName,user.LastName,LEFT(user.MiddleName,1) as 'MiddleName',user.ContactNum,user.Email,account.TypeofUserNum FROM user Left Join account on account.AccountID = user.AccountID WHERE account.Username ='".$user_check."'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$login_session = $row['Username'];
	$vcontactnum = $row['ContactNum'];
	$vemail = $row['Email'];

	$vFirstName = $row['FirstName'];
	$vLastName = $row['LastName'];
	$vMiddleName = $row['MiddleName'];
	$fkTypeofUserNum = $row['TypeofUserNum'];

	$IaccountID = $row['AccountID'];
	$IuserID = $row['UserID'];


	if(!isset($login_session)){
		mysqli_close($connection); // Closing Connection
		header('Location: facLogin.php'); // Redirecting To Home Page
	}
?>
