<?php 
include'core/init.php';
redirect_index();
?>
<?php
if(empty ($_POST)=== false){	
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$submit_email=0;
	$submit_username=0;
	
	/*Check weather Email id exists or not */	
			/*
			
			
			if(email_exists($email) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/
	/*Check weather user exists or not */	
			/*
			
			
			if(user_exists($username) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/
	
	$sql = "SELECT user_id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($con, $sql); 
	$email_check = mysqli_num_rows($query);

	/*
	echo $email_check;
	*/
    
	
	$sql_username = "SELECT user_id FROM users WHERE username='$username' LIMIT 1";
	$query_username = mysqli_query($con, $sql_username); 
	$username_check = mysqli_num_rows($query_username);
	
	/*
	echo $username_check;
	*/
	
	
	/*
	
	A method to check wheather the file login.php is successfully fetching the data or not.
	
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	echo $username, ' ', $password;
	
	*/
	
	
	/*Check if Email id or username field is filled .*/
	if(empty($email)===true && empty($username)===true){
		
		//$errors[]='value';
		$errors[]='You need to enter either a username or Email id';
		//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'You need to enter either a username or Email id.'</span>";
       
	}
	else if(empty($email)===true){
		
		$submit_username=1;
	}
	
	else if(empty($username)===true){
		
		$submit_email=1;
	}
	
			
		/*Check if password field is not left empty.*/
		
		if(empty($password)===true){
			
			//$errors[]='value';
			$errors[]='You need to enter a password';
			//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'You need to enter the password'</span>";
			
		}
		
			
			/*Check from Email id*/
			
				
				
				if($submit_email==1){
					//if ($email_check < 1){ 
					if (email_exists($email) != 1){ 
					$errors[]='We can\'t find you friend.Email is not registered with us. Have you registered yourself yet?';
						//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Email is not registered with us.'</span>";
						
					}
					
				else if(email_active($email)!=1){
					$errors[]='You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.'</span>";
					
				}
				
					else{
						//to demonstrate the functionality of function output_errors we have added this if part
						if(strlen($password)>32){
							$errors[]='Password too long';
						}
						
						
						
						  $sql_checkpassword_email = "SELECT user_id FROM users WHERE password='$password' AND email='$email' ";
							$query_checkpassword_email = mysqli_query($con, $sql_checkpassword_email); 
							$password_check = mysqli_num_rows($query_checkpassword_email);
								
								$login= login_email($email,$password);
								if($login === false){
																	
									
									$errors[]='Password Did not matched using Email as comparator. if you forgot your Password, let us help you.';
					
								}
								else{
									
									//set the user session
									$_SESSION["user_id"]=$login;
								
								
									change_state_active($_SESSION["user_id"]);	
									
									//redirect to home
									header('Location: index.php');
									exit();
								}
								/*
							
									if($password_check>0){
										$result=$con->query("SELECT * from users WHERE email='$email'
										AND password='$password' ")	;	//The password here compared is not encrypted , hence take care.
										
										$row= $result->fetch_array(MYSQLI_BOTH);
										
										
										$_SESSION["user_id"]=$row['user_id'];
												
										header('Location: index.php');
									
									}
									else{
										$errors[]='Password Did not matched using Email id as comparator. if you forgot your Password, let us help you';
										//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>Password did not matched using Email Id as comparator.</span>";
									
									
										
									}
									*/
									
					}
				}
				
				
			
			
			/*Check from username*/
					
				else if($submit_username==1){
					
					//if ($username_check < 1){ 
					if (user_exists($username) != 1){ 
					$errors[]='We can\'t find you friend.Username is not registered with us. Have you registered yourself yet?';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>We can\'t find you friend.Username is not registered with us. Have you registered yourself yet?'</span>";
					
				}
				
				else if(user_active($username)!=1){
					$errors[]='You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.'</span>";
					
				}
				
				else{
					$sql_checkpassword_username = "SELECT user_id FROM users WHERE password='$password' AND username='$username' ";
				$query_checkpassword_username = mysqli_query($con, $sql_checkpassword_username); 
				$password_check = mysqli_num_rows($query_checkpassword_username);
				
				$login= login_username($username,$password);
								if($login === false){
																	
									
									$errors[]='Password Did not matched using username as comparator. if you forgot your Password, let us help you.';
					
								}
								else{
									
									//set the user session
									$_SESSION["user_id"]=$login;
								
									change_state_active($_SESSION["user_id"]);	
									set_status_online($_SESSION["user_id"]);
									//redirect to home
									header('Location: index.php');
									exit();
								}
				/*				
				if($password_check>0){
				
				$result=$con->query("SELECT * from users WHERE username='$username'
					AND password='$password' ")	;	
					
					$row= $result->fetch_array(MYSQLI_BOTH);
					
					//session_start();
					
					$_SESSION["user_id"]=$row['user_id'];
							
					header('Location: profile.php');
				
				}
				else{
					$errors[]='Password Did not matched using username as comparator. if you forgot your Password, let us help you.';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>Password did not matched using username as comparator.</span>";
				
				
					
				}	
				*/	
				}
				}
				
				/*
				To get User Id from Email id or username 
				
				$user_id_username=user_id_from_username($username);
				$user_id_email=user_id_from_email($email);
				echo $user_id_username;
				echo $user_id_email;
				
				*/
				//print_r($errors);
}

else {
	

	$errors[]='No data recieved.';
}

?>

<?php
/*
else{
		$login= login($username,$password);
		if($login=== false){
			
			$errors[]='Username password is incorrect combination';
		}
		else{
			
			//set the user session
			//redirect to home
			
		}
}
*/

include'includes/overall/header.php';
if(empty($errors)=== false){
	?>
	<h2>We tried to log you in, but</h2>
<?php

echo output_errors($errors);
}

?>			

<?php include 'includes/overall/footer.php';?>

