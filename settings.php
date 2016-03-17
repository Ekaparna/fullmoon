<?php
include'core/init.php';
protect_page();
		$flag_a=0;
		$flag_b=0;
		$flag_c=0;
		$flag_success=0;
		$recieve_email_status=$user_data['allow_email'];
		
		
?>

<?php include'includes/overall/header.php';
if(empty($_POST)===false){
	
	
	
	$required_fields=array('first_name','email');
    //echo '<pre>',print_r($_POST,true),'</pre>'; Testing line
		foreach($_POST as $key=>$value){
			if(empty($value)&&in_array($value,$required_fields)===true){
				$errors[]='Field Marked with asteriks are required.';
				break 1;//it will come out of this loop abnd continue the execution.
			}
			
				
		}
		$a=$_POST['first_name'];
		$b=$_POST['last_name'];
		$c=$_POST['email'];
	
		if (empty($errors)===true){

			if($_POST['first_name']!==$user_data['first_name']){
				$flag_a=1;
					
			}
			if($_POST['last_name']!==$user_data['last_name']){
				$flag_b=1;
					
			}
			if(filter_var($c, FILTER_VALIDATE_EMAIL)===false){
				
				$errors[]='A valid Email address is required.';
			}
			
			
			if($_POST['email']!== $user_data['email']){
				$flag_c=1;	
				if(email_exists($c) === 1){
				$errors[]='Sorry, The email id \''.htmlentities($_POST['email']).'\' is already in use.';
				
			}
			}
			
			
			
			
			
			
			
			
				
		} 
		
		
	}
	
	




?>
			<h1>Basic Information</h1>
	<?php 
	if(isset($_GET['success'])&&empty($_GET['success'])){
		
		echo 'your Basic Information have been Updated successfully.';
	}
	
	else{
	if(empty($errors)=== true && empty($_POST)===false){
	
		$allow_email=($_POST['allow_email']=='on') ? 1:0;
		
	if($flag_a==1){
	update_first_name($session_user_id,$_POST['first_name']);
	}
	if($flag_b==1){
	update_last_name($session_user_id,$_POST['last_name']);
	}
	if($flag_c==1){
	update_email($session_user_id,$_POST['email']);
	}
	
	if($allow_email==1){
	update_yes_recieve_email($session_user_id);
	}
	else if($allow_email==0){
		update_no_recieve_email($session_user_id);
	
	}
	header('Location:settings.php?success');
	exit();
	
	}
	else if(empty($errors)=== false){
		
	?>
	<h2>We tried to Update the settings, but</h2>
<?php

echo output_errors($errors);
}
	
	else{
		?>
	<!--<form name="updatebasicinfoForm" id="updatebasicinfoForm">
					 <ul id= "updatebasicinfoform" style="list-style: none;">
	    					
						
						 <li>First Name*:<br>
						 <input type="text" name="first_name"required="required" 
						class="tfield" id="first_name" =<?php // echo $user_data['first_name'];?> >
						 </li><br>
						 <li>Last Name:<br>
						 <input type="text" name="last_name"required="required" 
						class="tfield" id="last_name" value=<?php  //echo $user_data['last_name'];?>>
						 </li><br>
						 <li>Email* :<br>
						 <input type="email" name="email" required="required" 
						class="tfield" id="email" value=<?php  //echo $user_data['email'];?>>
						 </li><br>
					    
						
						 
					     
					 
					 </ul>
					 </form>
					-->
	 
		<?php			
	
	
	
	
		
		
	?>
					
		<form action=" " method="POST"name="updatebasicinfoForm" id="updatebasicinfoForm">
					 <ul id= "updatebasicinfoform" style="list-style: none;">
	    					
						
						 <li>First Name*:<br>
						 <input type="text" name="first_name"required="required" 
						class="tfield" id="first_name" value=<?php  echo $user_data['first_name'];?> >
						 </li><br>
						 <li>Last Name:<br>
						 <input type="text" name="last_name"required="required" 
						class="tfield" id="last_name" value=<?php  echo $user_data['last_name'];?>>
						 </li><br>
						 <li>Email* :<br>
						 <input type="email" name="email" required="required" 
						class="tfield" id="email" value=<?php  echo $user_data['email'];?>>
						 </li><br>
					    <li>
						
						<?php
						//if($user_data['allow_email']==0	)
						if($recieve_email_status==1	)
						{
							?>
							<input type="checkbox" name="allow_email" checked="checked">
							
							<?php
						}
						else{
							?>
							<input type="checkbox" name="allow_email" >
							
							<?php
						}
							?> 
							Would yo like to recieve email from us
						</li>
						
						 
						 <li><br>
						 <input type="submit" value="Update Info">
						 </li><br>
								     
					 
					 </ul>
					 </form>
					
					
				        
                                        
				
					
			    
				

	<?php 
	
	}
	}
	include 'includes/overall/footer.php';
?>