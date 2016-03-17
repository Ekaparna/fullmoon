<?php
include'core/init.php';
protect_page();

?>

<?php include'includes/overall/header.php';
	?>
					

						 
						 <div class="profilepic">
		
		<?php
		if(isset($_FILES['profile'])===true){
			if(empty($_FILES['profile']['name'])===true){
				
				echo 'Please Choose a file!';
			}
			else{
				//
				$allowed=array('jpeg','jpg','png','gif');
				
				$file_name=$_FILES['profile']['name'];
				
				$file_extn= strtolower(end(explode('.',$file_name)));
				
				$file_temp=$_FILES['profile']['tmp_name'];
				$file_size=$_FILES['profile']['size'];
				
				if(in_array($file_extn,$allowed)===true){
					
					user_profile_image($session_user_id,$file_temp,$file_extn);
					header('Location:'.$current_file);
				}
				else{
					
					echo 'Incorrect File Type. Allowed: ';
					echo implode(',',$allowed);
				}
				
				
			}
		}
		
		if(empty($user_data['profile'])===false){
			echo '<img src="',$user_data['profile'],'" alt="',$user_data['first_name'],'\'s Profile Image" >';
		}
		
		
		?>
		<form action=" " method="POST" enctype="multipart/form-data">
		<p>Select The Best Pic of yours :</p><br>
		<input type="file" name="profile">
		<input type="submit" name="Submit">
		</form>
		
		<?php
		
		
		
		?>
		</div>
						
					    
						 
						
						 
					     
					 
					 
					 
					
					
				        
                                        
					  
					
			    
				

	<?php 
	
	
	include 'includes/overall/footer.php';?>
		
 