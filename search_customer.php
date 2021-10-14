<?php 
session_start();
$connect = mysqli_connect('localhost','root','', 'munsi_');

$current_user = $_SESSION['email'];

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$query = "SELECT * FROM `contacts` WHERE CONCAT(`firstName`, `lastName`, `companyName`) LIKE '%".$name."%'";
	$result = mysqli_query($connect, $query);
	if($result){
		while ($row = mysqli_fetch_array($result)) {
			echo"<div class='nameOfUser'>".$row['firstName']." ".$row['lastName']."</div>";
		}
	}
	else{
		echo "Nothing Found";
	}

}

if (isset($_POST['userName'])) {
	$userName = $_POST['userName'];	
	$output= ' ';
	$query_two = "SELECT `billingAddress`,`billingCity`,`billingState`,`billingCountry`,`billingPinCode` FROM `contacts` WHERE CONCAT(`firstName`,'".$output."', `lastName`) = '".$userName."'";
	$billResult = mysqli_query($connect, $query_two);

	$row = mysqli_fetch_array($billResult);
	echo $row['billingAddress'].", ".$row['billingCity'].", ".$row['billingState'].", ".$row['billingCountry'].", "."\nPin Code :".$row['billingPinCode'];
}

if (isset($_POST['company'])) {
	$userName = $_POST['company'];	
	$output= ' ';
	$query_three = "SELECT `companyName` FROM `contacts` WHERE CONCAT(`firstName`,'".$output."', `lastName`) = '".$userName."'";
	$billResult = mysqli_query($connect, $query_three);

	$row = mysqli_fetch_array($billResult);
	echo $row['companyName'];
}
?>