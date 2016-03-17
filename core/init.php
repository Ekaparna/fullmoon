<?php
error_reporting(0);
session_start();

require 'database/connect.php';

require 'functions/general.php';
require 'functions/users.php';
//$current_file= basename(_FILE_);

$current_file=explode('/',$_SERVER['SCRIPT_NAME']);
$current_file= end($current_file);

if(logged_in()=== true){
	$session_user_id=$_SESSION['user_id'];
	$user_data= user_data($session_user_id,'user_id','enrollment_id','username','password','first_name','last_name','email','email_code','allow_email','state','profile','active','password_recover','password_recover_text','type');
	$session_user_name=$user_data['username'];
	$session_enrollment_no=$user_data['enrollment_id'];
	
	if(user_active($user_data['username'])!=1){
					session_destroy();	
					header('Location:index.php');
					exit();
				}
				/*
				if($current_file!=='changepassword.php'&& $current_file!=='logout.php' && $user_data['password_recover']==1){
					
					header('Location:changepassword.php/force');
					exit();
				}*/
	
}
$errors=array();
	
?>