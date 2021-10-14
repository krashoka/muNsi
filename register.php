<?php
	session_start();
	$connect = mysqli_connect('localhost','root','','munsi_');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$_SESSION['email']=$email;
	$check="SELECT * FROM `users` WHERE `email` = '".$email."'";
	$rs = mysqli_query($connect,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 1) {
	    echo "<script>alert('You are already registered! Please sign in to your account')</script>";

		echo "<script>window.location.assign('login_page.php')</script>";
	}
	else
	{
		$query = "INSERT INTO `users`(`email`,`password`) VALUES ('".$email."','".$password."')";
		$result= mysqli_query($connect,$query);
		if ($result)
	    {
	        echo "<script>alert('You are now registered')</script>";
	        echo "<script>window.location.assign('registration_1.html')</script>";
	    }
	    else
	    {
	        echo "Error adding user in database<br/>";
	    }
		
	}
 ?>