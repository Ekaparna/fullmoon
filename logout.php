<?php
session_start();

	$session_user_id=$_SESSION['user_id'];
$con = mysqli_connect("localhost","root","","users");
$query="UPDATE `users` SET `online`=0 WHERE `user_id`=$session_user_id ";
	
	mysqli_query($con,$query);
session_destroy();

header('Location:index.php');
?>