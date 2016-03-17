<?php
include'core/init.php';
redirect_index();

?>

<?php include'includes/overall/header.php';
if(empty($_POST)===false){
	
	
	
	$required_fields=array('username','first_name','gender','age','password','repeatpassword','email');
    //echo '<pre>',print_r($_POST,true),'</pre>'; Testing line
		foreach($_POST as $key=>$value){
			if(empty($value)&&in_array($value,$required_fields)===true){
				$errors[]='Field Marked with asteriks are required.';
				break 1;//it will come out of this loop abnd continue the execution.
			}
			
				
		}
		$a=$_POST['username'];
		$b=$_POST['gender'];
		$c=$_POST['email'];
		$d=$_POST['age'];
		
		
		if (empty($errors)===true){

			if(user_exists($a) === 1||user_exists($c) >1){
				$errors[]='Sorry, The Username  \''.htmlentities($_POST['username']).'\' is already taken.';
				
				
			}
			if(preg_match("/\\s/",$_POST['username'])==true){
				//$regular_expression=preg_match("/\\s/",$_POST['username']);
				//var_dump($regular_expression); This pregmatch return 1 if the statement is true.
				$errors[]='Sorry, The Username  \''.htmlentities($_POST['username']).'\' Contains space.We don\'t allow spaces in username';
				
			}
			if(email_exists($c) === 1||email_exists($c) >1){
				$errors[]='Sorry, The email id \''.htmlentities($_POST['email']).'\' is already in use.';
				
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
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
				
				$errors[]='A valid Email address is required.';
			}
			if($_POST['gender']==='male'){
				$profilepic="images/profile/defaultmale.jpg";
			}
			else if($_POST['gender']==='female'){
				$profilepic="images/profile/defaultfemale.jpg";
				
			}
			
			
				
		}
		
		
	}
	
	




?>
			<h1>Register</h1>
	<?php 
	if(isset($_GET['success'])&&empty($_GET['success'])){
		
		echo 'you\'ve been registered successfully.';
	}
	
	else{
	if(empty($errors)=== true && empty($_POST)===false){
		
	$register_data=array(
		'username' 		=> $_POST['username'],
		'first_name' 	=> $_POST['first_name'],
		'last_name' 	=> $_POST['last_name'],
		'email' 		=> $_POST['email'],
		'password' 		=> $_POST['password'],
		'gender'		=> $_POST['gender'],
		'age'			=> $_POST['age'],
		'profile'		=> $profilepic
	);	
	

	register_user($register_data);
	header('Location:register.php?success');
	exit();
	
	}
	else if(empty($errors)=== false){
		
	?>
	<h2>We tried to Register you, but</h2>
<?php

echo output_errors($errors);
}
	

	?>
					
<form action=" " method="POST"name="RegisterForm" id="RegisterForm">
					 <ul id= "registerform" style="list-style: none;">
	    						
						 <li>User Name*: <br>
						 <input type="text" name="username" required="required" 
						class="tfield" id="username" placeholder="User Name">
						 </li><br>
					     <li>First Name*: <br>
						 <input type="text" name="first_name" required="required" 
						class="tfield" id="first_name" placeholder="First Name">
						 </li><br>
						 <li>Last Name*: <br>
						 <input type="text" name="last_name"  
						class="tfield" id="last_name" placeholder="Last Name">
						 </li><br>
						 <li>Gender*: <br>
						 <input type="text" name="gender"  required="required"
						class="tfield" id="gender" placeholder="Gender">
						 </li><br>
						 <li>Age*: <br>
						 <input type="text" name="age"  required="required"
						class="tfield" id="age" placeholder="Age">
						 </li><br>
						 <li>Email ID*: <br>
						 <input type="email" name="email" required="required">
						 </li><br>
						 <li>Password* :<br>
						 <input type="password" name="password"required="required" 
						class="tfield" id="password" placeholder="Password">
						 </li><br>
						 <li>Repeat Password* :<br>
						 <input type="password" name="repeatpassword" required="required" 
						class="tfield" id="repeatpassword" placeholder="Confirm Password">
						 </li><br>
					    
						 
						 <li><br>
						 <input type="submit" value="Register">
						 </li><br>
						 
					     <li>
						 <a href="login.php">Login</a>
						 </li>
					 
					 </ul>
					 </form>
					
					
				        
                                        
				</form>	  
					
			    
				

	<?php 
	}
	
	include 'includes/overall/footer.php';?>
		
 