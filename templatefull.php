<?php
error_reporting(0);
session_start();

require 'core/database/connect.php';

require 'core/functions/general.php';
require 'core/functions/users.php';
//$current_file= basename(_FILE_);

$current_file=explode('/',$_SERVER['SCRIPT_NAME']);
$current_file= end($current_file);

if(logged_in()=== true){
	$session_user_id=$_SESSION['user_id'];
	$user_data= user_data($session_user_id,'user_id','enrollment_id','username','password','first_name','last_name','email','email_code','allow_email','state','profile','active','password_recover','password_recover_text','type');
	$session_user_name=$user_data['user_name'];
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

				
		
<!doctype html>
<html>
	<head>
		<title>Rajivjha.in</title>
		<meta charrset="UTF-8">
		<link rel="stylesheet" href="css/screen.css">
		<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<header>
			<h1 class="logo">Logo
			</h1>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="<?php echo $user_data['username'];?>"><?php echo $user_data['first_name'];?></a></li>
					<li><a href="downloads.php">Downloads</a></li>
					<li><a href="forum.php">Forum</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</nav>
		
		</header>
		<div id="container">
		<?php
		if(isset($_GET['username'])===true&&empty($_GET['username'])===false){
	$username=$_GET['username'];
	if(user_exists($username) == 1){
				$user_id=user_id_from_username($username);
				$user1=$user_id;//jiska username dala hai
				$user2=$session_user_id;//jo logged in hai
				//$user_id=user_id_from_email($email);
				$profile_data =user_data($user_id,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
					
					if(user_state($username)!=1){
					$errors[]='Sorry! The page is not accessible at the moment.Link might have destroyed or broken.';
					
				}
					?>

					
					
					<?php 
					
			}
	else{
		$errors[]='We can\'t find that Page on this link.You might be accessing a broken link.';
				
	}
			
}
if(empty($errors)=== false){
		
	?>
	<h2>We tried to Find the Page, but</h2>
<?php

echo output_errors($errors);?>
<?php

}

else{
	
	

?>
				
		<?php include 'includes/profilepic.php';?>
		<?php include 'profile/enrollment.php';?>
		
	
	
	
	
			<aside>
				<?php 
				if(logged_in()===true){
					
					include'includes/widget/loggedin.php';
					//include'includes/widget/logout.php';
					//include'includes/widget/deactivate.php';
				}
				else{
				include'includes/widget/login.php';
				}
				include'includes/widget/user_count.php';
				?>
			
			</aside> 
			<div id="profileinfo">
			<h1 ><div id="profilename"><?php echo $profile_data['first_name'];echo ' '.$profile_data['last_name'];?></h1>
					<p><?php echo $profile_data['email'];?></p>
					<p><?php echo $school;?></p>
					<p><?php echo $branch;?></p>
					<p><?php echo $batch;?></p></div>
				<?php include 'profilebutton.php';?>
	</div>
			<div id="new_post_Area">
			
			</div>
			
</div>
<?php
}
?>
<footer>
			&copy; rajivjha.in 2016 All rights reserved.
		</footer>


			</body>
			
</html>