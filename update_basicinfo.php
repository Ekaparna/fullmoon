<?php
include'core/init.php';
protect_page();

?>

<?php include'includes/overall/header.php';
if(empty($_POST)===false){
	
	
	
	$required_fields=array('oldpassword','password','repeatpassword');
    //echo '<pre>',print_r($_POST,true),'</pre>'; Testing line
		foreach($_POST as $key=>$value){
			if(empty($value)&&in_array($value,$required_fields)===true){
				$errors[]='Field Marked with asteriks are required.';
				break 1;//it will come out of this loop abnd continue the execution.
			}
			
				
		}
		$a=$_POST['oldpassword'];
		$b=$_POST['password'];
		$c=$_POST['repeatpassword'];
	
		
		if (empty($errors)===true){

			if(md5($_POST['oldpassword'])!==$user_data['password']){
				$errors[]='Sorry, your current password is incorrect.';
				
					
			}
			if($_POST['oldpassword'] ===$_POST['password'] ){
				$errors[]='Sorry, your New password should match your any of old password.';
			}
			
			if(strlen($_POST['password'])<6){
				$errors[]='Sorry, The password must be atleast 6 characters';
				
				
			}
			if(strlen($_POST['password'])>30){
				$errors[]='Sorry, The password can be atmax 30 characters';
				
				
			}
			if($_POST['password']!== $_POST['repeatpassword']){
				
				$errors[]='Sorry, The password didn\'t matched.';
				
				
			}
			
			
			
				
		} 
		
		
	}
	
	




?>
			<h1>Change Password</h1>
	<?php 
	if(isset($_GET['success'])&&empty($_GET['success'])){
		
		echo 'your password have been Updated successfully.';
	}
	
	else{
	if(empty($errors)=== true && empty($_POST)===false){
		
	
	change_password($session_user_id,$_POST['password']);
	header('Location:changepassword.php?success');
	exit();
	
	}
	else if(empty($errors)=== false){
		
	?>
	<h2>We tried to Change the password, but</h2>
<?php

echo output_errors($errors);
}
	

	?>
					
<form action=" " method="POST"name="changepasswordForm" id="changepasswordForm">
					 <ul id= "changepasswordform" style="list-style: none;">
	    						
						
						 <li>First Name:<br>
						 <input type="text" name="first_name"required="required" 
						class="tfield" id="password" placeholder=<?php  echo $user_data['first_name'];?> >
						 </li><br>
						 <li>Last Name:<br>
						 <input type="text" name="last_name"required="required" 
						class="tfield" id="last_name" placeholder=<?php  echo $user_data['last_name'];?>>
						 </li><br>
						 <li>Repeat New Password* :<br>
						 <input type="email" name="email" required="required" 
						class="tfield" id="email" placeholder=<?php  echo $user_data['email'];?>>
						 </li><br>
					    
						 
						 <li><br>
						 <input type="submit" value="Update Info">
						 </li><br>
						 
					     
					 
					 </ul>
					 </form>
					
					
				        
                                        
				</form>	  
					
			    
				

	<?php 
	}
	
	include 'includes/overall/footer.php';?>
		
 